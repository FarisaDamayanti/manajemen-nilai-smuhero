<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - Manajemen Sekolah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif;
            background: #f1f5f9;
            color: #0f172a;
            line-height: 1.5;
        }

        /* Navbar */
        .navbar {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            padding: 0 32px;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            color: white;
        }

        .logo-text {
            font-weight: 700;
            font-size: 1.2rem;
            letter-spacing: -0.3px;
            color: white;
        }

        .nav-links {
            display: flex;
            gap: 28px;
            align-items: center;
        }

        .nav-links a {
            color: #e2e8f0;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            font-size: 0.95rem;
            padding-bottom: 6px;
            border-bottom: 2px solid transparent;
        }

        .nav-links a:hover {
            color: white;
            border-bottom-color: rgba(255, 255, 255, 0.5);
        }

        .nav-links a.active {
            color: white;
            border-bottom-color: #3b82f6;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-name {
            font-size: 0.9rem;
            color: #e2e8f0;
        }

        .logout-form button {
            background: rgba(239, 68, 68, 0.85);
            color: white;
            border: none;
            padding: 6px 16px;
            border-radius: 40px;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.85rem;
            transition: 0.2s;
        }

        .logout-form button:hover {
            background: #ef4444;
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 28px auto;
            padding: 0 24px;
        }

        /* Card */
        .card {
            background: white;
            border-radius: 16px;
            padding: 24px 28px;
            margin-bottom: 28px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #eef2ff;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
        }

        .role-badge {
            display: inline-block;
            background: #eef2ff;
            color: #1e40af;
            padding: 4px 12px;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 4px;
        }

        .mapel-badge {
            display: inline-block;
            background: #fef3c7;
            color: #d97706;
            padding: 4px 12px;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-left: 8px;
        }

        h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #0f172a;
            border-left: 4px solid #3b82f6;
            padding-left: 14px;
        }

        h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 20px 0 12px 0;
            color: #334155;
            background: #f8fafc;
            padding: 8px 12px;
            border-radius: 8px;
        }

        /* Button */
        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(59, 130, 246, 0.3);
        }

        /* Tabel */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        th {
            background: #f8fafc;
            text-align: left;
            padding: 12px 16px;
            font-weight: 600;
            color: #1e293b;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 10px 16px;
            border-bottom: 1px solid #f0f2f5;
            color: #334155;
        }

        tr:hover td {
            background-color: #fafcff;
        }

        .nilai-cell {
            font-weight: 600;
        }

        .nilai-cell span {
            background: #f1f5f9;
            padding: 4px 10px;
            border-radius: 40px;
            display: inline-block;
        }

        .empty-row td {
            text-align: center;
            color: #94a3b8;
            padding: 32px;
            font-style: italic;
        }

        /* Statistik */
        .stats {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .stat-card {
            background: #f8fafc;
            padding: 12px 20px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #3b82f6;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #64748b;
        }

        /* Responsif */
        @media (max-width: 700px) {
            .navbar {
                padding: 0 20px;
                flex-wrap: wrap;
                height: auto;
                padding: 12px 20px;
                gap: 10px;
            }
            .nav-left {
                flex-wrap: wrap;
                gap: 16px;
            }
            .container {
                padding: 0 16px;
            }
            .card {
                padding: 18px;
            }
            th, td {
                padding: 8px 12px;
            }
        }

        .kelas-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-top: 16px;
        }

        .kelas-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 16px;
            transition: 0.2s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .kelas-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .kelas-card h4 {
            margin-bottom: 10px;
            border: none;
            padding: 0;
            background: none;
        }

        .kelas-card .info p {
            font-size: 0.85rem;
            color: #475569;
            margin-bottom: 4px;
        }

        .progress {
            height: 6px;
            background: #e2e8f0;
            border-radius: 50px;
            margin: 10px 0;
            overflow: hidden;
        }

        .progress .bar {
            height: 100%;
            background: #3b82f6;
            border-radius: 50px;
        }

        .btn-mini {
            display: inline-block;
            font-size: 0.8rem;
            padding: 6px 10px;
            background: #3b82f6;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 8px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="nav-left">
        <div class="logo">
            <div class="logo-icon">G</div>
            <span class="logo-text">Guru</span>
        </div>

        <div class="nav-links">
            <a href="{{ route('guru.dashboard') }}" class="active">Dashboard</a>
            <!-- <a href="{{ route('guru.nilai') }}">Input Nilai</a> -->
            <!-- <a href="{{ route('guru.sudah') }}">Sudah Dinilai</a>
            <a href="{{ route('guru.belum') }}">Belum Dinilai</a> -->
        </div>
    </div>

    <div class="user-info">
        <span class="user-name">{{ auth()->user()->name }}</span>
        <form class="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    <!-- Card Selamat Datang -->
    <div class="card">
        <h2>Selamat datang, {{ auth()->user()->name }}</h2>
        <div>
            <span class="role-badge">Guru</span>
            <span class="mapel-badge">
                {{ auth()->user()->guru->mapel->nama_mapel ?? 'Mata Pelajaran' }}
            </span>
        </div>
        <p style="margin-top: 16px; color: #475569;">
            Anda dapat mengelola nilai siswa untuk mata pelajaran yang Anda ajar.
        </p>
    </div>

    <!-- Tombol Tambah Nilai
    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
            <h3 style="margin-bottom: 0; border-left: none; padding-left: 0;">Kelola Nilai</h3>
            <a href="{{ route('guru.nilai') }}" class="btn-primary">Tambah Nilai</a>
        </div>
    </div> -->

    <div class="card">
    <h3>Kelas Saya</h3>

    <div class="kelas-grid">
        @foreach($kelas as $k)
            @php
                $totalSiswa = $k->siswa->count();
                $nilaiMasuk = $k->siswa->filter(function($s) use ($nilai) {
                    return isset($nilai[$s->id]) && !is_null($nilai[$s->id]->nilai);
                })->count();
            @endphp

            <div class="kelas-card">
                <h4>{{ $k->nama_kelas }}</h4>

                <div class="info">
                    <p><b>{{ $totalSiswa }}</b> Siswa</p>
                    <p><b>{{ $nilaiMasuk }}</b> Nilai Terisi</p>
                </div>

                <div class="progress">
                    <div class="bar"
                        style="width: {{ $totalSiswa > 0 ? ($nilaiMasuk / $totalSiswa) * 100 : 0 }}%;">
                    </div>
                </div>

                <a href="{{ route('guru.kelas.lihat', $k->id) }}" class="btn-mini">Lihat Kelas</a>
            </div>
        @endforeach
    </div>

</body>
</html>