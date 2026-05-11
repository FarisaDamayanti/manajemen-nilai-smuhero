<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Manajemen Kelas</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-dark: #0f172a;
            --accent: #8b5cf6;
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

        /* Navbar EduPoint */
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
            text-decoration: none;
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

        /* Card Section */
        .card {
            background: white;
            border-radius: 24px;
            padding: 32px;
            box-shadow: var(--shadow-sm);
            border: 1px solid #eef2ff;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f1f5f9;
        }

        h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--primary-dark);
            letter-spacing: -0.5px;
        }

        /* Tombol Utama */
        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 12px 24px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.3);
        }

        /* Kelas Grid */
        .kelas-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .kelas-card {
            background: #f8fafc;
            border: 1px solid #eef2ff;
            border-radius: 20px;
            padding: 24px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .kelas-card:hover {
            background: white;
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: var(--primary);
        }

        .kelas-card h4 {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary-dark);
        }

        .info-siswa {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .siswa-count {
            color: var(--primary);
            font-weight: 800;
            font-size: 1.1rem;
        }

        .btn-mini {
            width: 100%;
            text-align: center;
            background: white;
            color: var(--primary);
            border: 2px solid #eef2ff;
            padding: 10px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            transition: 0.3s;
        }

        .kelas-card:hover .btn-mini {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        /* Footer Section */
        .footer-buttons {
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back {
            background: white;
            color: var(--text-muted);
            padding: 12px 24px;
            border-radius: 14px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            border: 2px solid #eef2ff;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back:hover {
            background: #f1f5f9;
            color: var(--primary-dark);
            border-color: #cbd5e1;
        }

        .empty-state {
            grid-column: span 3;
            text-align: center;
            padding: 60px;
            background: #f8fafc;
            border-radius: 20px;
            border: 2px dashed #e2e8f0;
            color: var(--text-muted);
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 1024px) { .kelas-grid { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 640px) {
            .navbar { padding: 0 20px; flex-direction: column; height: auto; padding-bottom: 20px; }
            .nav-links { gap: 15px; margin: 15px 0; flex-wrap: wrap; justify-content: center; }
            .kelas-grid { grid-template-columns: 1fr; }
            .header-section { flex-direction: column; align-items: flex-start; gap: 15px; }
            .btn-primary { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-left">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <div class="logo-icon">🎓</div>
            <span class="logo-text">EduPoint</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.kelas') }}" class="active">Kelas</a>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    let action = "{{ session('success') }}";
    let message = '';

    if(action === 'tambah') message = 'Data berhasil ditambahkan';
    else if(action === 'edit') message = 'Data berhasil diupdate';
    else if(action === 'hapus') message = 'Data berhasil dihapus';

    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
</script>
@endif

<div class="container">
    <div class="card">
        <div class="header-section">
            <h2>🏫 Data Kelas</h2>
            <a href="{{ route('kelas.create') }}" class="btn-primary">+ Tambah Kelas Baru</a>
        </div>

        <div class="kelas-grid">
            @forelse($kelas as $k)
                <div class="kelas-card">
                    <h4>{{ $k->nama_kelas }}</h4>
                    <div class="info-siswa">
                        <span class="siswa-count">{{ $k->siswa->count() }}</span> 
                        Siswa Terdaftar
                    </div>
                    <a href="{{ route('admin.kelas.detail', $k->id) }}" class="btn-mini">
                        Buka Manajemen Kelas
                    </a>
                </div>
            @empty
                <div class="empty-state">
                    <p>Belum ada kelas yang terdaftar di database.</p>
                </div>
            @endforelse
        </div>

        <div class="footer-buttons">
            <a href="{{ route('admin.dashboard') }}" class="btn-back">
                <span>←</span> Kembali ke Dashboard
            </a>
        </div>
    </div>
</div>

</body>
</html>