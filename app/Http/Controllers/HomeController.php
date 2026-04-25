<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // kalau sudah login → langsung redirect
        if (Auth::check()) {

            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/guru/dashboard');
            }
        }

        // kalau belum login tampilkan landing page
        return view('index/home');
    }
}
