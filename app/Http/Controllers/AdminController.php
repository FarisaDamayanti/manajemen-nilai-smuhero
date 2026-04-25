<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // tampilkan dashboard admin
    public function index()
    {
        $kelas = Kelas::with('siswa')->get();

        return view('admin/dashboard', compact('kelas'));
    }

    public function createSiswa()
    {
        $kelas = Kelas::all();
        return view('admin/siswa', compact('kelas'));
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required',
            'id_kelas' => 'required|exists:kelas,id',
        ]);

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'nis' => $request->nis,
            'id_kelas' => $request->id_kelas
        ]);

        return redirect('/admin/dashboard')
            ->with('success', 'Siswa berhasil ditambah');
    }

    public function guru()
    {
        $guru = Guru::with('mapel')->get();

        return view('admin.guru', compact('guru'));
    }

    public function kelas()
    {
        $kelas = Kelas::with('siswa')->get();

        return view('admin.kelas', compact('kelas'));
    }
    
}