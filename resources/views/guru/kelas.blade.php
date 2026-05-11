<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Kelas Saya</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #64748b;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --shadow-sm: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            background-image: radial-gradient(at 0% 0%, rgba(79, 70, 229, 0.05) 0px, transparent 50%), 
                              radial-gradient(at 100% 100%, rgba(139, 92, 246, 0.05) 0px, transparent 50%);
            color: var(--text-main);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Navbar Modern */
        .navbar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0 40px;
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow-sm);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-logo {
            font-size: 28px;
            background: white;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
        }

        .brand-name {
            font-size: 1.4rem;
            font-weight: 800;
            background: linear-gradient(to right, var(--primary), #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 32px;
            margin-left: 50px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--secondary);
            font-weight: 600;
            font-size: 0.95rem;
            transition: 0.3s;
            position: relative;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--primary);
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary);
            border-radius: 10px;
        }

        .logout-btn {
            background: #fee2e2;
            color: #ef4444;
            padding: 8px 18px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
        }

        /* Main Container */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 24px;
        }

        .page-header {
            margin-bottom: 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-main);
        }

        .page-title p {
            color: var(--secondary);
            font-size: 1rem;
        }

        /* Grid Kelas */
        .kelas-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 24px;
        }

        .kelas-card {
            background: white;
            border-radius: 24px;
            padding: 30px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .kelas-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary);
        }

        .kelas-card h4 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
            color: #475569;
        }

        .info-item b {
            color: var(--text-main);
        }

        /* Progress Bar Modern */
        .progress-wrapper {
            margin: 20px 0;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            margin-bottom: 8px;
            font-weight: 700;
            color: var(--secondary);
        }

        .progress-bg {
            height: 10px;
            background: #f1f5f9;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(to right, var(--primary), #8b5cf6);
            border-radius: 20px;
            transition: width 0.5s ease;
        }

        /* Buttons */
        .btn-manage {
            display: block;
            width: 100%;
            padding: 12px;
            background: var(--primary);
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.9rem;
            transition: 0.3s;
        }

        .btn-manage:hover {
            background: var(--primary-hover);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: white;
            color: var(--secondary);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.9rem;
            border: 1px solid #e2e8f0;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #f8fafc;
            color: var(--text-main);
            border-color: #cbd5e1;
        }

        .empty-state {
            grid-column: 1/-1;
            text-align: center;
            padding: 60px;
            background: white;
            border-radius: 24px;
            border: 2px dashed #e2e8f0;
        }

        .profile-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
            transition: 0.3s;
        }

        .profile-avatar:hover {
            border-color: var(--primary);
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .navbar { padding: 0 20px; }
            .nav-links { display: none; }
            .kelas-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div style="display: flex; align-items: center;">
        <a href="#" class="brand">
            <div class="brand-logo">🎓</div>
            <div class="brand-name">EduPoint</div>
        </a>
        <div class="nav-links">
            <a href="{{ route('guru.dashboard') }}">Dashboard</a>
            <a href="{{ route('guru.kelas') }}" class="active">Manajemen Kelas</a>
        </div>
    </div>

    <div class="user-section">
        <a href="{{ route('guru.profile') }}">
        <img 
            src="{{ auth()->user()->guru && auth()->user()->guru->foto 
                ? asset('storage/'.auth()->user()->guru->foto) 
                : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name) }}" 
            alt="Profile"
            class="profile-avatar">
    </a>
    </div>
</nav>

<div class="container">
    <div class="page-header">
        <div class="page-title">
            <h2>🏫 Daftar Kelas</h2>
            <p>Kelola nilai dan pantau statistik tiap kelas Anda.</p>
        </div>
        <a href="{{ route('guru.dashboard') }}" class="btn-back">
            ← Kembali
        </a>
    </div>

    <div class="kelas-grid">
        @forelse($kelas as $k)
            @php
                $totalSiswaKelas = $k->siswa->count();
                $nilaiMasukKelas = $k->siswa->filter(function($s) use ($nilai) {
                    return isset($nilai[$s->id]) && !is_null($nilai[$s->id]->nilai);
                })->count();
                $persentase = $totalSiswaKelas > 0 ? ($nilaiMasukKelas / $totalSiswaKelas) * 100 : 0;
                $rataKelas = $k->siswa->avg(function($s) use ($nilai) {
                    return isset($nilai[$s->id]) && !is_null($nilai[$s->id]->nilai) ? $nilai[$s->id]->nilai : null;
                }) ?? 0;
            @endphp

            <div class="kelas-card">
                <h4>{{ $k->nama_kelas }}</h4>
                
                <div class="info-list">
                    <div class="info-item">
                        <span>👥</span>
                        <span>Total Siswa: <b>{{ $totalSiswaKelas }}</b></span>
                    </div>
                    <div class="info-item">
                        <span>📝</span>
                        <span>Nilai Terisi: <b>{{ $nilaiMasukKelas }}</b></span>
                    </div>
                    <div class="info-item">
                        <span>⭐</span>
                        <span>Rata-rata: <b>{{ number_format($rataKelas, 1) }}</b></span>
                    </div>
                </div>

                <div class="progress-wrapper">
                    <div class="progress-header">
                        <span>Progress Penilaian</span>
                        <span>{{ number_format($persentase, 0) }}%</span>
                    </div>
                    <div class="progress-bg">
                        <div class="progress-fill" style="width: {{ $persentase }}%;"></div>
                    </div>
                </div>

                <a href="{{ route('guru.kelas.lihat', $k->id) }}" class="btn-manage">
                    Kelola Nilai Kelas
                </a>
            </div>
        @empty
            <div class="empty-state">
                <div style="font-size: 3rem; margin-bottom: 10px;">📂</div>
                <h3 style="color: #64748b;">Belum ada kelas pengampu</h3>
                <p style="color: #94a3b8;">Silakan hubungi admin jika jadwal belum muncul.</p>
            </div>
        @endforelse
    </div>
</div>

</body>
</html>