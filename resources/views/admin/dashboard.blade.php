<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #0f172a;
            --accent: #8b5cf6;
            --success: #10b981;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --shadow-sm: 0 4px 6px -1px rgb(0 0 0 / 0.05);
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
            color: var(--text-main);
            line-height: 1.6;
        }

        /* Navbar Modern */
        .navbar {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            padding: 0 40px;
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 20px;
            color: white;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3);
        }

        .logo-text {
            font-weight: 800;
            font-size: 1.4rem;
            letter-spacing: -0.5px;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            color: #94a3b8;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a:hover, .nav-links a.active {
            color: white;
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
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background: #ef4444;
            color: white;
        }

        /* Container */
        .container {
            max-width: 1300px;
            margin: 40px auto;
            padding: 0 24px;
        }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, var(--primary) 0%, #8b5cf6 100%);
            color: white;
            border-radius: 24px;
            padding: 40px;
            margin-bottom: 32px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.2);
        }

        /* efek glow bulat */
        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            right: -50px;
            top: -50px;
            width: 200px;
            height: 200px;
            background: var(--primary);
            opacity: 0.05;
            border-radius: 50%;
        }

        .welcome-card p {
            color: var(--bg-body);
        }

        .welcome-card h2 {
            margin-bottom: 10px;
        }

        .role-badge {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 6px 16px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-top: 10px;
            backdrop-filter: blur(5px);
        }

        /* Summary Grid */
        .summary-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-bottom: 40px;
        }

        .summary-card {
            background: white;
            border-radius: 20px;
            padding: 24px;
            text-align: center;
            box-shadow: var(--shadow-sm);
            border: 1px solid #f1f5f9;
            transition: all 0.3s ease;
        }

        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .summary-icon {
            font-size: 2.5rem;
            margin-bottom: 12px;
            display: block;
        }

        .summary-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-dark);
            line-height: 1;
        }

        .summary-label {
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.9rem;
            margin-top: 8px;
        }

        /* Section Card */
        .section-card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            margin-bottom: 32px;
            box-shadow: var(--shadow-sm);
            border: 1px solid #eef2ff;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        h3 {
            font-size: 1.4rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.3);
        }

        /* Stats Grid Inside Section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .stat-item {
            background: #f8fafc;
            padding: 20px;
            border-radius: 16px;
            border: 1px solid #f1f5f9;
        }

        .stat-num {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            display: block;
        }

        .stat-name {
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-muted);
        }

        .stat-desc {
            font-size: 0.75rem;
            color: #94a3b8;
            margin-top: 4px;
        }

        @media (max-width: 1024px) {
            .summary-stats { grid-template-columns: repeat(2, 1fr); }
            .stats-grid { grid-template-columns: 1fr 1fr; }
        }

        @media (max-width: 640px) {
            .navbar { padding: 0 20px; flex-direction: column; height: auto; padding-bottom: 20px; }
            .nav-links { gap: 15px; margin: 15px 0; }
            .summary-stats { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: 1fr; }
            .header-section { flex-direction: column; align-items: flex-start; gap: 15px; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-left">
        <div class="logo">
            <div class="logo-icon">🎓</div>
            <span class="logo-text">EduPoint</span>
        </div>

        <div class="nav-links">
            <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
            <a href="{{ route('admin.kelas') }}">Kelas</a>
            <a href="{{ route('admin.mapel') }}">Mapel</a>
            <a href="{{ route('admin.guru') }}">Guru</a>
            <a href="{{ route('admin.capaian') }}">Capaian</a>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</nav>

<div class="container">
    {{-- Welcome Section --}}
    <div class="welcome-card">
        <h2 style="font-size: 2rem; font-weight: 800; letter-spacing: -1px;">Halo, {{ auth()->user()->name }} 👋</h2>
        <div class="role-badge">{{ auth()->user()->role }}</div>
        <p style="margin-top: 15px; max-width: 600px;">
            Selamat datang di panel kendali pusat. Pantau dan kelola seluruh ekosistem akademik sekolah dengan mudah dan cepat.
        </p>
    </div>

    {{-- Global Summary --}}
    <div class="summary-stats">
        <div class="summary-card">
            <span class="summary-icon">🏫</span>
            <div class="summary-number">{{ $totalKelas ?? $kelas->count() ?? 0 }}</div>
            <div class="summary-label">Total Kelas</div>
        </div>
        <div class="summary-card">
            <span class="summary-icon">👨‍🏫</span>
            <div class="summary-number">{{ $totalGuru ?? $guru->count() ?? 0 }}</div>
            <div class="summary-label">Total Pengajar</div>
        </div>
        <div class="summary-card">
            <span class="summary-icon">📚</span>
            <div class="summary-number">{{ $totalMapel ?? $mapel->count() ?? 0 }}</div>
            <div class="summary-label">Mata Pelajaran</div>
        </div>
        <div class="summary-card">
            <span class="summary-icon">🎓</span>
            <div class="summary-number">{{ $totalSiswa ?? $siswa->count() ?? 0 }}</div>
            <div class="summary-label">Total Siswa</div>
        </div>
    </div>

    {{-- Data Kelas --}}
    <div class="section-card">
        <div class="header-section">
            <h3>🏢 Manajemen Kelas</h3>
            <a href="{{ route('admin.kelas') }}" class="btn-primary">Kelola Kelas</a>
        </div>
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-num">{{ $kelas->count() ?? 0 }}</span>
                <span class="stat-name">Kelas Terdaftar</span>
                <p class="stat-desc">Ruang kelas aktif</p>
            </div>
            <div class="stat-item">
                <span class="stat-num">{{ $kelas->sum(fn($k) => $k->siswa->count()) ?? 0 }}</span>
                <span class="stat-name">Peserta Didik</span>
                <p class="stat-desc">Total seluruh siswa</p>
            </div>
        </div>
    </div>

    {{-- Data Guru --}}
    <div class="section-card">
        <div class="header-section">
            <h3>🧑‍🏫 Manajemen Pengajar</h3>
            <a href="{{ route('admin.guru') }}" class="btn-primary">Kelola Guru</a>
        </div>
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-num">{{ $guru->count() ?? 0 }}</span>
                <span class="stat-name">Total Guru</span>
                <p class="stat-desc">SDM pengajar terdaftar</p>
            </div>
            <div class="stat-item">
                <span class="stat-num">{{ $guru->filter(fn($g) => $g->kelas->count() > 0)->count() ?? 0 }}</span>
                <span class="stat-name">Guru Aktif</span>
                <p class="stat-desc">Mengampu kelas saat ini</p>
            </div>
        </div>
    </div>

    {{-- Data Mapel --}}
    <div class="section-card">
        <div class="header-section">
            <h3>📖 Kurikulum & Mapel</h3>
            <a href="{{ route('admin.mapel') }}" class="btn-primary">Kelola Mapel</a>
        </div>
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-num">{{ $mapel->count() ?? 0 }}</span>
                <span class="stat-name">Mata Pelajaran</span>
                <p class="stat-desc">Total dalam kurikulum</p>
            </div>
            <div class="stat-item" style="border-left: 4px solid var(--success);">
                <span class="stat-num" style="color: var(--success);">{{ $mapel->filter(fn($m) => ($m->gurus?->count() ?? 0) > 0)->count() }}</span>
                <span class="stat-name">Sudah Terisi</span>
                <p class="stat-desc">Memiliki pengampu</p>
            </div>
            <div class="stat-item" style="border-left: 4px solid #f87171;">
                <span class="stat-num" style="color: #f87171;">{{ $mapel->filter(fn($m) => ($m->gurus?->count() ?? 0) == 0)->count() }}</span>
                <span class="stat-name">Belum Terisi</span>
                <p class="stat-desc">Membutuhkan pengajar</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>