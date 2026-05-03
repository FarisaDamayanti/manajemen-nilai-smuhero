<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //register
    // public function create() //blade
    // {
    //     // kalau sudah login → redirect
    //     if (Auth::check()) {

    //         if (Auth::user()->role == 'admin') {
    //             return redirect('/admin/dashboard');
    //         } else {
    //             return redirect('/guru/dashboard');
    //         }
    //     }

    //     return view('index.register'); // pastikan file ini ada
    // }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => ['required'],
    //         'email' => ['required', 'email', 'unique:users'],
    //         'password' => ['required', 'confirmed'],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => 'guru',
    //     ]);

    //     Auth::login($user);

    //     return redirect('/guru/dashboard');
    // }

    // login
    public function createLogin() //blade
    {
        // kalau sudah login → redirect
        if (Auth::check()) {

            if (Auth::user()->role == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/guru/dashboard');
            }
        }

        return view('index/login'); // pastikan file ini ada
    }

    public function storeLogin(Request $request)
    {
       $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            ]);

        // cek apakah email terdaftar
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email belum terdaftar',
            ]);
        }

        // coba login
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'password' => 'Password salah',
            ]);
        }

        // kalau berhasil login
        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/guru/dashboard');
        }
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('index');
    }
}
