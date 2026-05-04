<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // tampilkan dashboard admin
    public function index()
    {
        $kelas = Kelas::all();
        $guru = Guru::all();
        $mapel = Mapel::all();
        $siswa = Siswa::all();

        return view('admin/dashboard', compact('kelas', 'guru', 'mapel', 'siswa'));
    }

    public function showKelas($id)
    {
        $kelas = Kelas::with(['siswa' => function($q){
            $q->withAvg('nilai', 'nilai');
        }, 'guru'])->findOrFail($id);

        $gurus = Guru::with('mapel')->get();

        return view('admin.kelas_detail', compact('kelas', 'gurus'));
    }

    public function siswa()
{
    $siswa = Siswa::with('kelas')->get();

    return view('admin.siswa', compact('siswa'));
}

    public function createSiswa($id_kelas)
{
    $kelas = Kelas::findOrFail($id_kelas);

    return view('admin.siswa_create', compact('kelas'));
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

        return redirect()->route('admin.kelas.detail', $request->id_kelas)
    ->with('success', 'Siswa berhasil ditambah');
    }

    public function guru()
    {
        $guru = Guru::with('mapel')->get();

        return view('admin/guru', compact('guru'));
    }

    public function createGuru()
    {
        $mapel = Mapel::all();
        return view('admin/guru_create', compact('mapel'));
    }

    public function storeGuru(Request $request)
{
    $request->validate([
        'nama_guru' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'nip' => 'required',
        'id_mapel' => 'required',
    ]);

    // 1. buat user login
    $user = User::create([
        'name' => $request->nama_guru,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'guru',
    ]);

    // 2. buat data guru
    Guru::create([
        'id_user' => $user->id,
        'nama_lengkap' => $request->nama_guru,
        'nip' => $request->nip,
        'id_mapel' => $request->id_mapel,
    ]);

    return redirect()->route('admin.guru')
        ->with('success', 'Guru berhasil ditambahkan & bisa login');
}

    // tambah kelas guru
    public function assignGuru(Request $request)
{
    $request->validate([
        'id_guru' => 'required|exists:gurus,id',
        'id_kelas' => 'required|exists:kelas,id',
    ]);

    $kelas = Kelas::findOrFail($request->id_kelas);

    $kelas->guru()->syncWithoutDetaching([$request->id_guru]);

    return back()->with('success', 'Guru berhasil ditambahkan ke kelas');
}

    public function kelas()
    {
        $kelas = Kelas::with('siswa')->get();

        return view('admin/kelas', compact('kelas'));
    }

    public function createKelas()
    {
        return view('admin/kelas_create');
    }

    public function storeKelas(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
        ]);

        return redirect('/admin/kelas')
            ->with('success', 'Kelas berhasil ditambah');
    }

    //mapel
    public function mapel()
    {
        $mapel = Mapel::all();
        return view('admin/mapel', compact('mapel'));
    }
    public function createMapel()
    {
        return view('admin/mapel_create');
    }

    public function storeMapel(Request $request)
{
    $request->validate([
        'nama_mapel' => 'required|unique:mapels,nama_mapel',
    ]);

    Mapel::create([
        'nama_mapel' => $request->nama_mapel,
    ]);

    return redirect('/admin/mapel')
        ->with('success', 'Mapel berhasil ditambah');
}
}