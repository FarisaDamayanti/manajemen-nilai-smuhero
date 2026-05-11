<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Data Guru</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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

        /* Container & Card */
        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 24px;
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            box-shadow: var(--shadow-md);
            border: 1px solid #f1f5f9;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        h2::before {
            content: '';
            width: 5px;
            height: 24px;
            background: var(--primary);
            border-radius: 10px;
        }

        /* Stats Section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-item {
            background: #f8fafc;
            padding: 20px;
            border-radius: 18px;
            border: 1px solid #f1f5f9;
            display: flex;
            flex-direction: column;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-muted);
        }

        /* Buttons */
        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 12px 24px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.2);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.3);
        }

        .btn-back {
            background: #f1f5f9;
            color: var(--text-muted);
            padding: 10px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: var(--text-main);
        }

        /* Table Styling */
        .table-container {
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
            margin-bottom: 32px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 16px 20px;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #f1f5f9;
        }

        td {
            padding: 18px 20px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }

        .td-no { width: 60px; font-weight: 700; color: var(--text-muted); }
        .td-name { font-weight: 700; color: #0f172a; }
        .td-nip { font-family: monospace; color: var(--text-muted); font-size: 0.9rem; }

        .mapel-badge {
            background: rgba(79, 70, 229, 0.1);
            color: var(--primary);
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: 700;
            display: inline-block;
        }

        .empty-state {
            padding: 60px;
            text-align: center;
            color: var(--text-muted);
            font-style: italic;
        }

        .footer-action {
            display: flex;
            justify-content: flex-end;
            padding-top: 20px;
            border-top: 2px solid #f8fafc;
        }

        @media (max-width: 768px) {
            .header-section { flex-direction: column; align-items: flex-start; gap: 20px; }
            .btn-primary { width: 100%; justify-content: center; }
            .nav-links { display: none; }
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
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.kelas') }}">Kelas</a>
            <a href="{{ route('admin.mapel') }}">Mapel</a>
            <a href="{{ route('admin.guru') }}"class="active">Guru</a>
            <a href="{{ route('admin.capaian') }}">Capaian</a>
        </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</nav>

<div class="container">
    <div class="card">
        <div class="header-section">
            <h2>Data Guru</h2>
            <a href="{{ route('guru.create') }}" class="btn-primary">+ Tambah Guru Baru</a>
        </div>

        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-value">{{ $guru->count() }}</span>
                <span class="stat-label">Tenaga Pengajar Aktif</span>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th class="td-no">No</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>Mata Pelajaran</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($guru as $g)
                        <tr>
                            <td class="td-no">{{ $loop->iteration }}</td>
                            <td class="td-name">{{ $g->nama_lengkap }}</td>
                            <td class="td-nip">{{ $g->nip ?? 'N/A' }}</td>
                            <td>
                                <span class="mapel-badge">
                                    {{ $g->mapel->nama_mapel ?? 'Belum Ditentukan' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty-state">Belum ada data guru yang terdaftar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="footer-action">
            <a href="{{ route('admin.dashboard') }}" class="btn-back">Kembali ke Dashboard</a>
        </div>
    </div>
</div>

</body>
</html>