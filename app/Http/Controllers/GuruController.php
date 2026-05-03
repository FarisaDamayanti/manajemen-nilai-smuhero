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

        if (!$guru || !$guru->nama_lengkap || !$guru->nip) {
            return redirect()->route('guru.profile')
                ->with('error', 'Silakan lengkapi profil terlebih dahulu!');
        }

        // ambil kelas yang diajar guru
        $kelas = Kelas::whereHas('guru', function ($q) use ($guru) {
            $q->where('id_guru', $guru->id);
        })->with('siswa')->get();

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

    return view('guru.kelas', compact('kelas', 'guru', 'nilai', 'siswa', 'filter'));
}

    // public function sudahDinilai()
    // {
    //     $guru = Auth::user()->guru;

    //     $nilai = Nilai::where('id_mapel', $guru->id_mapel)
    //         ->with('siswa')
    //         ->get();

    //     return view('guru.nilai_sudah', compact('nilai'));
    // }

    // public function belumDinilai()
    // {
    //     $guru = Auth::user()->guru;

    //     $sudah = Nilai::where('id_mapel', $guru->id_mapel)
    //         ->pluck('id_siswa');

    //     $belum = Siswa::whereNotIn('id', $sudah)->get();

    //     return view('guru.nilai_belum', compact('belum'));
    // }
}