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
            --bg-body: #c7d2fe; /* Background gradasi biru seperti gambar */
            --white: #ffffff;
            --glass: rgba(255, 255, 255, 0.7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #a5b4fc 0%, #e0e7ff 100%);
            min-height: 100vh;
            color: #1e293b;
            padding: 20px;
        }

        /* MAIN WRAPPER (Gaya Glassmorphism Luar) */
        .main-wrapper {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
        }

        /* NAVBAR */
        .navbar {
            background: var(--glass);
            border-radius: 15px;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .brand-logo { font-size: 24px; color: #1e293b; }
        .brand-name { font-size: 1.4rem; font-weight: 800; color: #1e293b; }

        .nav-links { display: flex; gap: 20px; }
        .nav-links a { 
            text-decoration: none; color: #64748b; font-weight: 600; 
            padding: 8px 16px; border-radius: 10px; transition: 0.3s;
        }
        .nav-links a.active { background: #cbd5e1; color: var(--primary); }

        .user-profile { display: flex; align-items: center; gap: 12px; }
.user-name {
    font-size: 0.9rem;
    font-weight: 700;
}

.user-role {
    font-size: 0.75rem;
    color: var(--secondary);
}

.profile-avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid transparent;
    transition: 0.3s;
}

.profile-avatar:hover {
    border-color: var(--primary);
    transform: scale(1.05);
}

        /* DASHBOARD GRID */
        .dashboard-content {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
        }

        /* WELCOME CARD */
        .welcome-card {
            background: linear-gradient(135deg, #e0e7ff 0%, #ddd6fe 100%);
            border-radius: 25px;
            padding: 40px;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome-card h2 { font-size: 2.2rem; font-weight: 850; line-height: 1.2; margin-bottom: 15px; }
        .welcome-card p { color: #475569; font-size: 1.1rem; max-width: 70%; }
        
        .mascot-img {
            position: absolute;
            right: 20px;
            bottom: -10px;
            width: 250px;
            filter: drop-shadow(0 10px 20px rgba(0,0,0,0.1));
        }

        .hore-label {
            background: rgba(255,255,255,0.5);
            padding: 15px 25px;
            border-radius: 15px;
            margin-top: 30px;
            font-weight: 800;
            font-size: 1.2rem;
            display: inline-block;
            width: fit-content;
        }

        /* MINI CALENDAR */
        .calendar-card {
            background: var(--glass);
            border-radius: 25px;
            padding: 20px;
        }

        .cal-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 15px; }
        .cal-title { font-weight: 800; font-size: 1.1rem; }
        
        /* Simullasi Kalender Bulanan di Gambar */
        .cal-table { width: 100%; border-collapse: collapse; text-align: center; font-size: 0.8rem; }
        .cal-table th { padding: 5px; color: #64748b; }
        .cal-table td { padding: 8px; font-weight: 600; }
        .today { background: var(--primary); color: white; border-radius: 50%; width: 30px; height: 30px; display: inline-flex; align-items: center; justify-content: center; }

        /* STATS GRID */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .stat-box {
            padding: 20px;
            border-radius: 18px;
            text-align: left;
            position: relative;
        }
        .stat-box.green { background: #4ade80; }
        .stat-box.red { background: #f87171; }
        .stat-box.yellow { background: #facc15; }
        .stat-box.light-yellow { background: #fef08a; }

        .stat-num { font-size: 1.8rem; font-weight: 800; display: block; }
        .stat-label { font-size: 0.75rem; font-weight: 600; opacity: 0.8; }

        /* KELAS ANDA AJAR */
        .kelas-section {
            background: var(--glass);
            border-radius: 25px;
            padding: 20px;
            margin-top: 20px;
        }
        .kelas-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 15px;
        }
        .kelas-item {
            background: white;
            padding: 15px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .circle-progress {
            width: 40px; height: 40px; border-radius: 50%;
            border: 4px solid #e2e8f0; border-top-color: var(--primary);
            display: flex; align-items: center; justify-content: center; font-size: 0.6rem; font-weight: 700;
        }
        .btn-mini {
            background: #f1f5f9; border: none; padding: 5px 10px; 
            border-radius: 8px; font-size: 0.7rem; font-weight: 700; cursor: pointer;
        }
    </style>
</head>
<body>

<div class="main-wrapper">
    <nav class="navbar">
        <a href="#" class="brand">
            <div class="brand-logo">🎓</div>
            <div class="brand-name">EduPoint</div>
        </a>
        <div class="nav-links">
            <a href="" class="active">Dashboard</a>
            <a href="{{ route('guru.kelas') }}">Manajemen Kelas</a>
        </div>
        <div class="user-profile">
            <div style="text-align: right">
                <span style="font-weight: 800; font-size: 0.9rem; display: block;">{{ auth()->user()->name }}</span>
                <span style="font-size: 0.7rem; color: #64748b;">{{ auth()->user()->guru->mapel->nama_mapel }}</span>
            </div>
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
    <div class="dashboard-content">
        <div class="welcome-card">
            <div class="welcome-text">
                <h2>Selamat Datang,<br> {{ auth()->user()->name }} 👋</h2>
                <p>Kelola dan input data nilai siswa anda.</p>
            </div>
            
            <div class="hore-label">
                SEMANGAT untuk mengajar hari ini! <br>
                -admin
            </div>

            <div class="mascot-img" style="font-size: 150px; right: 40px; bottom: 20px; position: absolute;">🦉</div>
        </div>

        <div class="right-col">
            <div class="calendar-card">
                <div class="cal-top">
                    <span class="cal-title">Mini-Calendar</span>
                    <span style="font-size: 1.5rem;">⭐</span>
                </div>
                <p style="font-size: 0.7rem; color: #64748b; margin-bottom: 10px;">May</p>
                
                <table class="cal-table">
                    <tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>
                    <tr><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td></tr>
                    <tr><td>8</td><td>9</td><td>10</td><td>11</td><td class="today">{{ date('d') }}</td><td>13</td><td>14</td></tr>
                    <tr><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td></tr>
                    </table>
            </div>

            <p style="font-weight: 800; margin: 20px 0 10px;">Stats Grid</p>
            <div class="stats-container">
                <div class="stat-box green">
                    <span class="stat-num">{{ $kelas->count() ?? 0 }}</span>
                    <span class="stat-label">Total Kelas</span>
                </div>

                <div class="stat-box red">
                    <span class="stat-num">{{ $totalSiswa ?? 0 }}</span>
                    <span class="stat-label">Total Siswa</span>
                </div>

                <div class="stat-box yellow">
                    <span class="stat-num">
                        {{ number_format($rataRataKeseluruhan ?? 0, 2) }}
                    </span>
                    <span class="stat-label">Rata-rata Nilai</span>
                </div>

                <div class="stat-box light-yellow">
                    <span class="stat-num">
                        {{ ($totalSiswa ?? 0) - ($nilaiMasuk ?? 0) }}
                    </span>
                    <span class="stat-label">Belum Dinilai</span>
                </div>
            </div>
        </div>
    </div>

    <div class="kelas-section">
    <p style="font-weight: 800; margin-bottom: 15px;">Kelas yang Anda Ajar</p>

    <div class="kelas-grid">
        @forelse($kelas->take(3) as $k)
            @php
                $totalSiswaKelas = $k->siswa->count();

                $nilaiMasukKelas = $k->siswa->filter(function($s) use ($nilai) {
                    return isset($nilai[$s->id]) && !is_null($nilai[$s->id]->nilai);
                })->count();

                $persentase = $totalSiswaKelas > 0 
                    ? ($nilaiMasukKelas / $totalSiswaKelas) * 100 
                    : 0;

                // warna dinamis (opsional biar lebih hidup)
                $warna = $persentase < 50 ? '#f87171' : ($persentase < 100 ? '#facc15' : '#4ade80');
            @endphp

            <div class="kelas-item">
                <div class="circle-progress" 
                     style="border-top-color: {{ $warna }};">
                    {{ number_format($persentase, 0) }}
                </div>

                <div>
                    <p style="font-size: 0.7rem; font-weight: 800;">
                        {{ $k->nama_kelas }}
                    </p>

                    <button 
                        onclick="window.location='{{ route('guru.kelas.lihat', $k->id) }}'"
                        class="btn-mini">
                        Kelola Nilai
                    </button>
                </div>
            </div>
        @empty
            <div style="text-align:center; padding:20px;">
                Tidak ada kelas
            </div>
        @endforelse
    </div>
</div>
</div>

</body>
</html>