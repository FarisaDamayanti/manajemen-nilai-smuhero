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
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 12px;
            color: #1e293b;
        }

        /* Button Kembali */
        .btn-back {
            background: #64748b;
            color: white;
            padding: 8px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: #475569;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(71, 85, 105, 0.2);
        }

        /* Kelas Grid */
        .kelas-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 16px;
        }

        .kelas-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px;
            transition: 0.2s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .kelas-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            border-color: #cbd5e1;
        }

        .kelas-card .info p {
            font-size: 0.85rem;
            color: #475569;
            margin-bottom: 6px;
        }

        .progress {
            height: 8px;
            background: #e2e8f0;
            border-radius: 50px;
            margin: 12px 0;
            overflow: hidden;
        }

        .progress .bar {
            height: 100%;
            background: #3b82f6;
            border-radius: 50px;
            transition: width 0.3s ease;
        }

        .btn-mini {
            display: inline-block;
            font-size: 0.75rem;
            padding: 6px 14px;
            background: #3b82f6;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 10px;
            transition: 0.2s;
            font-weight: 500;
        }

        .btn-mini:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }

        .empty-row {
            text-align: center;
            color: #94a3b8;
            padding: 40px;
            font-style: italic;
            background: #f8fafc;
            border-radius: 12px;
            grid-column: 1/-1;
        }

        /* Footer buttons */
        .footer-buttons {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
        }

        /* Responsif */
        @media (max-width: 900px) {
            .kelas-grid {
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
            .kelas-grid {
                grid-template-columns: 1fr;
            }
            .footer-buttons {
                justify-content: stretch;
            }
            .footer-buttons .btn-back {
                width: 100%;
                justify-content: center;
            }
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
            <a href="{{ route('guru.dashboard') }}">Dashboard</a>
            <a href="{{ route('guru.kelas') }}" class="active">Kelas</a>
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
    <!-- Daftar Kelas -->
    <div class="card">
        <h3>🏫 Kelas Saya</h3>
        
        @php
            $totalSiswaAll = 0;
            $totalNilaiMasuk = 0;
        @endphp

        <div class="kelas-grid">
            @forelse($kelas as $k)
                @php
                    $totalSiswaKelas = $k->siswa->count();
                    $totalSiswaAll += $totalSiswaKelas;
                    
                    $nilaiMasukKelas = $k->siswa->filter(function($s) use ($nilai) {
                        return isset($nilai[$s->id]) && !is_null($nilai[$s->id]->nilai);
                    })->count();
                    $totalNilaiMasuk += $nilaiMasukKelas;
                    
                    $persentase = $totalSiswaKelas > 0 ? ($nilaiMasukKelas / $totalSiswaKelas) * 100 : 0;
                    
                    $rataKelas = $k->siswa->avg(function($s) use ($nilai) {
                        return isset($nilai[$s->id]) && !is_null($nilai[$s->id]->nilai) ? $nilai[$s->id]->nilai : null;
                    }) ?? 0;
                @endphp

                <div class="kelas-card">
                    <h4>{{ $k->nama_kelas }}</h4>
                    
                    <div class="info">
                        <p>👨‍🎓 <b>{{ $totalSiswaKelas }}</b> Siswa</p>
                        <p>📝 <b>{{ $nilaiMasukKelas }}</b> Nilai Terisi</p>
                        <p>⭐ Rata-rata: <b>{{ number_format($rataKelas, 1) }}</b></p>
                    </div>

                    <div class="progress">
                        <div class="bar" style="width: {{ $persentase }}%;"></div>
                    </div>
                    <div style="font-size: 0.7rem; color: #64748b; text-align: right; margin-top: 4px;">
                        {{ number_format($persentase, 0) }}% terisi
                    </div>

                    <a href="{{ route('guru.kelas.lihat', $k->id) }}" class="btn-mini">Kelola Nilai</a>
                </div>
            @empty
                <div class="empty-row">
                    Belum ada kelas yang diampu
                </div>
            @endforelse
        </div>

        <!-- Tombol Kembali -->
        <div class="footer-buttons">
            <a href="{{ route('guru.dashboard') }}" class="btn-back">
                Kembali
            </a>
        </div>
    </div>
</div>

</body>
</html>