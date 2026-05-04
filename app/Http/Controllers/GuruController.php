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
    // Ambil data guru yang sedang login
    $guru = auth()->user()->guru;
    
    // Ambil kelas yang diampu oleh guru ini
    $kelas = $guru->kelas; // atau sesuai relasi Anda
    
    // Ambil semua nilai untuk mata pelajaran guru ini
    $nilai = Nilai::where('id_mapel', $guru->id_mapel)->get()->keyBy('id_siswa');
    
    // Hitung total siswa dari semua kelas yang diampu
    $totalSiswa = $kelas->sum(function($k) {
        return $k->siswa->count();
    });
    
    // Hitung nilai yang sudah masuk
    $nilaiMasuk = $nilai->filter(function($n) {
        return !is_null($n->nilai);
    })->count();
    
    // Hitung rata-rata keseluruhan
    $rataRataKeseluruhan = $nilai->avg('nilai') ?? 0;
    
    // Nilai tertinggi dan terendah
    $nilaiTertinggi = $nilai->max('nilai') ?? 0;
    $nilaiTerendah = $nilai->min('nilai') ?? 0;
    
    return view('guru.dashboard', [
        'kelas' => $kelas,
        'nilai' => $nilai,
        'totalSiswa' => $totalSiswa,
        'nilaiMasuk' => $nilaiMasuk,
        'rataRataKeseluruhan' => $rataRataKeseluruhan,
        'nilaiTertinggi' => $nilaiTertinggi,
        'nilaiTerendah' => $nilaiTerendah,
    ]);
}

    // form isi profile
    public function profile()
    {
        $guru = Auth::user()->guru;
        $mapels = Mapel::all(); // ambil semua mapel

        return view('guru/profile', compact('guru', 'mapels'));
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
    
    public function inputNilai($id_siswa)
    {
        $guru = Auth::user()->guru;

        $siswa = Siswa::findOrFail($id_siswa);

        return view('guru/nilai', compact('siswa', 'guru'));
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
            ->with('success', 'Nilai berhasil ditambah');
    }

    public function kelas()
    {
        $kelas = Kelas::all();
        $guru = Auth::user()->guru;
        $nilai = Nilai::where('id_mapel', $guru->id_mapel)
        ->get()
        ->keyBy('id_siswa');
        return view('guru.kelas', compact('kelas', 'guru', 'nilai'));
    }

    public function lihatKelas(Request $request, $id)
{
    $guru = Auth::user()->guru;

    $kelas = Kelas::with('siswa')->findOrFail($id);

    $filter = $request->filter;

    $nilai = Nilai::where('id_mapel', $guru->id_mapel)
        ->get()
        ->keyBy('id_siswa');

    $siswa = $kelas->siswa;

    // FILTER LOGIC
    if ($filter == 'sudah') {
        $siswa = $siswa->filter(fn($s) => isset($nilai[$s->id]));
    } elseif ($filter == 'belum') {
        $siswa = $siswa->filter(fn($s) => !isset($nilai[$s->id]));
    }

    return view('guru.kelas_detail', compact('kelas', 'guru', 'nilai', 'siswa', 'filter'));
}
}