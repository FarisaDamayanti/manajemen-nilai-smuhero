<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kelas - Manajemen Sekolah</title>

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

        .btn-back {
            background: #64748b;
            color: white;
            padding: 6px 16px;
            border-radius: 8px;
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

        /* Card */
        .card {
            background: white;
            border-radius: 16px;
            padding: 24px 28px;
            margin-bottom: 28px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #eef2ff;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            border-left: 4px solid #3b82f6;
            padding-left: 14px;
            margin: 0;
        }

        /* Button */
        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
            transition: 0.2s;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-1px);
        }

        /* Kelas Grid */
        .kelas-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .kelas-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 20px;
            transition: 0.2s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .kelas-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            border-color: #cbd5e1;
        }

        .kelas-card h4 {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: #0f172a;
        }

        .info {
            margin-bottom: 16px;
        }

        .info p {
            font-size: 0.9rem;
            color: #475569;
            margin-bottom: 6px;
        }

        .info .siswa-count {
            font-weight: 700;
            color: #3b82f6;
            font-size: 1.1rem;
        }

        .btn-mini {
            display: inline-block;
            font-size: 0.8rem;
            padding: 6px 14px;
            background: #3b82f6;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.2s;
            margin-top: 8px;
        }

        .btn-mini:hover {
            background: #2563eb;
        }

        .empty-state {
            text-align: center;
            padding: 60px;
            color: #64748b;
            font-style: italic;
        }

        /* Footer button */
        .footer-buttons {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end; /* Memaksa elemen flex ke kanan */
        }

        .footer-buttons .btn-back {
            display: inline-flex; /* Pastikan tombol tetap inline-flex */
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
            .header-section {
                flex-direction: column;
                align-items: flex-start;
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
            <a href="{{ route('admin.dashboard') }}">Home</a>
            <a href="{{ route('admin.kelas') }}" class="active">Kelas</a>
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
    <div class="card">
        <div class="header-section">
            <div class="header-left">
                <h2>Data Kelas</h2>
            </div>
            <a href="{{ route('kelas.create') }}" class="btn-primary">+ Tambah Kelas</a>
        </div>

        <div class="kelas-grid">
            @forelse($kelas as $k)
                <div class="kelas-card">
                    <h4>{{ $k->nama_kelas }}</h4>
                    <div class="info">
                        <p>
                            <span class="siswa-count">{{ $k->siswa->count() }}</span> 
                            Siswa Terdaftar
                        </p>
                    </div>
                    <a href="{{ route('admin.kelas.detail', $k->id) }}" class="btn-mini">
                        Lihat Detail
                    </a>
                </div>
            @empty
                <div class="empty-state">
                    Belum ada kelas yang terdaftar
                </div>
            @endforelse
        </div>
        <!-- Tombol Kembali di sini (di bawah tabel) -->
        <div class="footer-buttons">
            <a href="{{ route('admin.dashboard') }}" class="btn-back">
                Kembali
            </a>
        </div>
    </div>
</div>
</body>
</html>