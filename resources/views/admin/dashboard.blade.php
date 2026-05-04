<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Manajemen Sekolah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
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

        .btn-back {
            background: #64748b;
            color: white;
            padding: 6px 16px;
            border-radius: 40px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-back:hover {
            background: #475569;
            transform: translateY(-1px);
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

        /* Card Umum */
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

        h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0;
            color: #0f172a;
            border-left: none;
            padding-left: 0;
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

        /* Header section untuk flex antara judul dan tombol */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 20px;
        }

        /* Statistik Section */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #e2e8f0;
        }

        .stat-card {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 12px;
            padding: 16px;
            text-align: center;
            transition: 0.2s;
            border: 1px solid #e2e8f0;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #3b82f6;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #64748b;
            font-weight: 500;
        }

        .stat-detail {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 8px;
            padding-top: 6px;
            border-top: 1px solid #e2e8f0;
        }

        /* Statistik ringkasan global */
        .summary-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .summary-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            border: 1px solid #eef2ff;
            transition: 0.2s;
        }

        .summary-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .summary-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: #0f172a;
        }

        .summary-label {
            font-size: 0.85rem;
            color: #64748b;
            margin-top: 6px;
        }

        .summary-icon {
            font-size: 2rem;
            margin-bottom: 8px;
        }

        /* Detail info dalam card */
        .card-content {
            margin-top: 8px;
        }

        /* responsif */
        @media (max-width: 900px) {
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }
            .summary-stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }
        }

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
            .header-section {
                flex-direction: column;
                align-items: flex-start;
            }
            .stats-container {
                grid-template-columns: 1fr;
            }
            .summary-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="nav-left">
        <div class="logo">
            <div class="logo-icon">A</div>
            <span class="logo-text">Admin</span>
        </div>

        <div class="nav-links">
            <a href="{{ route('admin.dashboard') }}" class="active">Home</a>
            <a href="{{ route('admin.kelas') }}">Kelas</a>
            <a href="{{ route('admin.mapel') }}">Mapel</a>
            <a href="{{ route('admin.guru') }}">Guru</a>
        </div>
    </div>

    <div class="user-info">
        <form class="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</div>

<div class="container">
    {{-- Card Selamat Datang --}}
    <div class="card">
        <h2>Selamat datang, {{ auth()->user()->name }}</h2>
        <div class="role-badge">
            {{ ucfirst(auth()->user()->role) }}
        </div>
        <p style="margin-top: 12px; color: #475569;">Anda memiliki akses penuh untuk mengelola data siswa, guru, mata pelajaran, dan kelas.</p>
    </div>

    {{-- Statistik Ringkasan Global --}}
    <div class="summary-stats">
        <div class="summary-card">
            <div class="summary-icon">📚</div>
            <div class="summary-number">{{ $totalKelas ?? $kelas->count() ?? 0 }}</div>
            <div class="summary-label">Total Kelas</div>
        </div>
        <div class="summary-card">
            <div class="summary-icon">👨‍🏫</div>
            <div class="summary-number">{{ $totalGuru ?? $guru->count() ?? 0 }}</div>
            <div class="summary-label">Total Guru</div>
        </div>
        <div class="summary-card">
            <div class="summary-icon">📖</div>
            <div class="summary-number">{{ $totalMapel ?? $mapel->count() ?? 0 }}</div>
            <div class="summary-label">Total Mata Pelajaran</div>
        </div>
        <div class="summary-card">
            <div class="summary-icon">👨‍🎓</div>
            <div class="summary-number">{{ $totalSiswa ?? $siswa->count() ?? 0 }}</div>
            <div class="summary-label">Total Siswa</div>
        </div>
    </div>

    {{-- Kelola Kelas dengan Statistik --}}
    <div class="card">
        <div class="header-section">
            <h3>📚 Data Kelas</h3>
            <a href="{{ route('admin.kelas') }}" class="btn-primary">Kelola Daftar Kelas</a>
        </div>
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number">{{ $kelas->count() ?? 0 }}</div>
                <div class="stat-label">Total Kelas</div>
                <div class="stat-detail">Semua kelas yang tersedia</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $kelas->sum(function($k) { return $k->siswa->count(); }) ?? 0 }}</div>
                <div class="stat-label">Total Siswa</div>
                <div class="stat-detail">Terdaftar di semua kelas</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ number_format($kelas->avg(function($k) { return $k->siswa->count(); }) ?? 0, 1) }}</div>
                <div class="stat-label">Rata-rata/kelas</div>
                <div class="stat-detail">Siswa per kelas</div>
            </div>
        </div>
    </div>

    {{-- Kelola Guru dengan Statistik --}}
    <div class="card">
        <div class="header-section">
            <h3>👨‍🏫 Data Guru</h3>
            <a href="{{ route('admin.guru') }}" class="btn-primary">Kelola Daftar Guru</a>
        </div>
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number">{{ $guru->count() ?? 0 }}</div>
                <div class="stat-label">Total Guru</div>
                <div class="stat-detail">Semua guru terdaftar</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $guru->filter(function($g) { return $g->kelas->count() > 0; })->count() ?? 0 }}</div>
                <div class="stat-label">Guru Aktif</div>
                <div class="stat-detail">Memiliki kelas mengajar</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ number_format($guru->avg(function($g) { return $g->kelas->count(); }) ?? 0, 1) }}</div>
                <div class="stat-label">Rata-rata Kelas/Guru</div>
                <div class="stat-detail">Beban mengajar</div>
            </div>
        </div>
    </div>

    {{-- Kelola Mapel dengan Statistik --}}
    <div class="card">
        <div class="header-section">
            <h3>📖 Data Mapel</h3>
            <a href="{{ route('admin.mapel') }}" class="btn-primary">Kelola Daftar Mapel</a>
        </div>
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-number">{{ $mapel->count() ?? 0 }}</div>
                <div class="stat-label">Total Mapel</div>
                <div class="stat-detail">Semua mata pelajaran</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $mapel->filter(fn($m) => ($m->gurus?->count() ?? 0) > 0)->count() }}</div>
                <div class="stat-label">Mapel dengan Guru</div>
                <div class="stat-detail">Sudah memiliki pengajar</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $mapel->filter(fn($m) => ($m->gurus?->count() ?? 0) == 0)->count() }}</div>
                <div class="stat-label">Mapel Tanpa Guru</div>
                <div class="stat-detail">Perlu ditugaskan</div>
            </div>
        </div>
    </div>
</div>

</body>
</html>