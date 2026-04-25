<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    // dashboard guru
    public function index()
    {
        $guru = Auth::user()->guru;

        // cek apakah belum ada atau belum lengkap
        if (!$guru || !$guru->nama_lengkap || !$guru->nip) {
            return redirect()->route('guru.profile')
                ->with('error', 'Silakan lengkapi profil terlebih dahulu!');
        }

          // ambil kelas + siswa
        $kelas = Kelas::with('siswa')->get();

        // ambil nilai sesuai mapel guru
        $nilai = Nilai::where('id_mapel', $guru->id_mapel)
            ->get()
            ->keyBy('id_siswa');

        return view('guru.dashboard', compact('guru', 'kelas', 'nilai'));
    }

    // form isi profile
    public function profile()
    {
        $guru = Auth::user()->guru;
        $mapels = Mapel::all(); // ambil semua mapel

        return view('guru.profile', compact('guru', 'mapels'));
    }

    // simpan / update profile
    public function storeProfile(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_mapel' => 'required|exists:mapels,id',
        ]);

       Guru::updateOrCreate(
            [   'id_user' => Auth::id(),
            ],
            [
                'nama_lengkap' => auth()->user()->name,
                'nip' => $request->nip,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'id_mapel' => $request->id_mapel,
            ]
        );

        return redirect('/guru/dashboard')
            ->with('success', 'Profil berhasil disimpan!');
    }  
    
    public function inputNilai()
    {
        $guru = Auth::user()->guru;

        $siswa = Siswa::all(); // semua siswa dari admin

        return view('guru.nilai', compact('siswa', 'guru'));
    }

    public function storeNilai(Request $request)
    {
        $guru = Auth::user()->guru;

        $request->validate([
            'id_siswa' => 'required|exists:siswas,id',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        Nilai::updateOrCreate(
            [
                'id_siswa' => $request->id_siswa,
                'id_mapel' => $guru->id_mapel,
            ],
            [
                'id_guru' => $guru->id,
                'nilai' => $request->nilai,
            ]
        );

        return redirect('/guru/dashboard')
            ->with('success', 'Siswa berhasil ditambah');
    }
}