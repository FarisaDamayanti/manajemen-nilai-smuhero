<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - EduPoint</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #64748b;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --bg-body: #f8fafc;
            --card-bg: rgba(255, 255, 255, 0.9);
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
            letter-spacing: -0.5px;
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

        .user-section {
            display: flex;
            align-items: center;
            gap: 20px;
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
            transform: scale(1.05);
        }

        /* Container & Cards */
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 24px;
        }

        /* Update Layout Welcome agar Split */
.welcome-section {
    display: flex;
    gap: 24px;
    margin-bottom: 32px;
}

.welcome-card {
    flex: 2; /* Bagian teks lebih lebar */
    background: linear-gradient(135deg, var(--primary-hover) 0%, #8b5cf6 100%);
    color: white;
    padding: 40px;
    border-radius: 30px; /* Lebih bulat biar gemes */
    position: relative;
    overflow: hidden;
    margin-bottom: 0; /* Margin pindah ke container section */
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* Widget Kalender */
.mini-calendar {
    flex: 1; /* Bagian kalender lebih ramping */
    background: white;
    border-radius: 30px;
    border: 1px solid #e2e8f0;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

.cal-header {
    background: var(--text-main); /* Hitam tegas */
    color: white;
    padding: 15px;
    text-align: center;
    font-weight: 800;
    font-size: 0.8rem;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.cal-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    flex-grow: 1;
}

.cal-day {
    font-size: 1rem;
    font-weight: 600;
    color: var(--secondary);
    margin-bottom: 5px;
}

.cal-date {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1;
    color: var(--primary); /* Warna senada dashboard */
    letter-spacing: -2px;
}

.cal-month {
    margin-top: 5px;
    font-weight: 700;
    color: var(--text-main);
    background: var(--soft-blue);
    padding: 4px 12px;
    border-radius: 10px;
    font-size: 0.9rem;
}

/* Responsif untuk HP */
@media (max-width: 768px) {
    .welcome-section {
        flex-direction: column;
    }
}

        .badge-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .badge {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .section-title h3 {
            font-size: 1.4rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-item {
            background: white;
            padding: 24px;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            transition: 0.3s;
            text-align: left;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary);
        }

        .stat-icon {
            font-size: 1.5rem;
            margin-bottom: 12px;
            width: 50px;
            height: 50px;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 14px;
        }

        .stat-val {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--text-main);
        }

        .stat-label {
            color: var(--secondary);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Kelas Cards */
        .kelas-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }
        .kelas-card {
            background: white;
            border-radius: 20px;
            padding: 28px;
            border: 1px solid #e2e8f0;
            transition: 0.3s ease;
        }

        .kelas-card:hover {
            box-shadow: var(--shadow-md);
            transform: scale(1.02);
        }

        .kelas-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .kelas-name {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--primary);
        }

        .progress-container {
            margin: 20px 0;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .progress-bar {
            height: 10px;
            background: #f1f5f9;
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(to right, var(--primary), #8b5cf6);
            border-radius: 20px;
            transition: width 1s ease-in-out;
        }

        .btn-action {
            width: 100%;
            background: var(--bg-body);
            color: var(--primary);
            padding: 12px;
            border-radius: 12px;
            text-decoration: none;
            display: block;
            text-align: center;
            font-weight: 700;
            font-size: 0.9rem;
            border: 1px solid var(--primary);
            transition: 0.3s;
        }

        .btn-action:hover {
            background: var(--primary);
            color: white;
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

        .user-info {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        /* nama */
        .user-name {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--text-main);
        }

        /* role */
        .user-role {
            font-size: 0.75rem;
            color: var(--secondary);
        }

        /* Utilities */
        .text-success { color: var(--success); }
        .text-accent { color: var(--accent); }
        .text-danger { color: var(--danger); }

        @media (max-width: 768px) {
            .navbar { padding: 0 20px; }
            .nav-links { display: none; }
            .welcome-card { padding: 25px; }
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
            <a href="{{ route('guru.dashboard') }}" class="active">Dashboard</a>
            <a href="{{ route('guru.kelas') }}">Manajemen Kelas</a>
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

    <div class="user-info">
        <div class="user-name">{{ auth()->user()->name }}</div>
        <div class="user-role">{{ auth()->user()->guru->mapel->nama_mapel }}</div>
    </div>
</div>
</nav>

<div class="container">
    <div class="welcome-section">
    <div class="welcome-card">
        <div style="z-index: 2; position: relative;">
            <span style="background: rgba(255,255,255,0.2); padding: 5px 12px; border-radius: 10px; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.5px;">
                DASHBOARD GURU
            </span>
            <h2 style="margin-top: 15px;">Selamat Datang, {{auth()->user()->name}}! 👋</h2>
            <p style="opacity: 0.9; max-width: 400px;">
                Semangat mengajar hari ini! Ada beberapa nilai siswa yang perlu divalidasi.
            </p>
        </div>
        <div style="position: absolute; top: -20px; right: -20px; width: 150px; height: 150px; background: rgba(255,255,255,0.1); border-radius: 50%;"></div>
    </div>

    <div class="mini-calendar">
        <div class="cal-header">
            Jadwal Mengajar
        </div>
        <div class="cal-body">
            <div class="cal-day">{{ date('l') == 'Monday' ? 'Senin' : (date('l') == 'Tuesday' ? 'Selasa' : (date('l') == 'Wednesday' ? 'Rabu' : (date('l') == 'Thursday' ? 'Kamis' : (date('l') == 'Friday' ? 'Jumat' : (date('l') == 'Saturday' ? 'Sabtu' : 'Minggu'))))) }}</div>
            <div class="cal-date">{{ date('d') }}</div>
            <div class="cal-month">{{ date('F Y') }}</div>
        </div>
    </div>
</div>

    <div class="section-title">
        <h3><span style="font-size: 1.5rem;">📊</span> Ringkasan Performa</h3>
    </div>
    
    <div class="stats-grid">
        <div class="stat-item">
            <div class="stat-icon">🏫</div>
            <div class="stat-val">{{ $kelas->count() ?? 0 }}</div>
            <div class="stat-label">Total Kelas</div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">👨‍🎓</div>
            <div class="stat-val">{{ $totalSiswa ?? 0 }}</div>
            <div class="stat-label">Total Siswa</div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">📈</div>
            <div class="stat-val text-success">{{ number_format($rataRataKeseluruhan ?? 0, 1) }}</div>
            <div class="stat-label">Rata-rata Nilai</div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">⚠️</div>
            <div class="stat-val text-danger">{{ ($totalSiswa ?? 0) - ($nilaiMasuk ?? 0) }}</div>
            <div class="stat-label">Belum Dinilai</div>
        </div>
    </div>

    <div class="section-title">
        <h3><span style="font-size: 1.5rem;">🏫</span> Kelas yang Anda Ajar</h3>
        <a href="{{ route('guru.kelas') }}" style="color: var(--primary); font-weight: 700; text-decoration: none; font-size: 0.9rem;">Lihat Semua →</a>
    </div>

    <div class="kelas-container">
        @forelse($kelas->take(3) as $k)
            @php
                $totalSiswaKelas = $k->siswa->count();
                $nilaiMasukKelas = $k->siswa->filter(function($s) use ($nilai) {
                    return isset($nilai[$s->id]) && !is_null($nilai[$s->id]->nilai);
                })->count();
                $persentase = $totalSiswaKelas > 0 ? ($nilaiMasukKelas / $totalSiswaKelas) * 100 : 0;
            @endphp
            <div class="kelas-card">
                <div class="kelas-header">
                    <div class="kelas-name">{{ $k->nama_kelas }}</div>
                    <div style="background: #e0e7ff; color: #4338ca; padding: 4px 10px; border-radius: 8px; font-size: 0.75rem; font-weight: 700;">
                        AKTIF
                    </div>
                </div>
                
                <div style="font-size: 0.9rem; color: var(--secondary);">
                    Siswa: <strong>{{ $totalSiswaKelas }}</strong> terdaftar
                </div>

                <div class="progress-container">
                    <div class="progress-label">
                        <span>Progress Penilaian</span>
                        <span>{{ number_format($persentase, 0) }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $persentase }}%;"></div>
                    </div>
                </div>

                <a href="{{ route('guru.kelas.lihat', $k->id) }}" class="btn-action">Kelola Nilai</a>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 50px; background: white; border-radius: 20px; border: 2px dashed #e2e8f0; color: #94a3b8;">
                <div style="font-size: 3rem; margin-bottom: 10px;">📭</div>
                <p>Belum ada jadwal kelas untuk Anda.</p>
            </div>
        @endforelse
    </div>
</div>

</body>
</html>