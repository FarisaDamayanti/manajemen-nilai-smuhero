<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Detail Kelas</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

        /* Main Content */
        .container {
            max-width: 1200px;
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

        .header-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f8fafc;
        }

        h2 {
            font-size: 1.6rem;
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        /* Section Styling */
        .section {
            margin-bottom: 48px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title::before {
            content: '';
            width: 5px;
            height: 22px;
            background: var(--primary);
            border-radius: 10px;
        }

        /* Guru Grid */
        .guru-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .guru-card {
            background: #f8fafc;
            border: 1px solid #f1f5f9;
            border-radius: 18px;
            padding: 20px;
            transition: 0.3s;
        }

        .guru-card:hover {
            border-color: var(--primary);
            background: white;
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
        }

        .guru-name {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 4px;
        }

        .badge-mapel {
            display: inline-block;
            padding: 4px 12px;
            background: #eef2ff;
            color: var(--primary);
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            margin-bottom: 12px;
        }

        /* Form Controls */
        select {
            padding: 10px 16px;
            border-radius: 12px;
            border: 2px solid #f1f5f9;
            font-family: inherit;
            font-size: 0.9rem;
            min-width: 280px;
        }

        .btn-action {
            padding: 10px 20px;
            border-radius: 12px;
            border: none;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-add { background: var(--primary); color: white; }
        .btn-success {
            background: var(--success);
            color: white;
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-2px);
        }
        .btn-back { background: #f1f5f9; color: var(--text-muted); }

        /* Table */
        .table-wrapper {
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 16px;
            text-align: left;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px;
            border-top: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }

        /* Action Icons */
        .action-group {
            display: flex;
            gap: 8px;
        }

        .icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .icon-detail { background: #e0e7ff; color: #4338ca; }
        .icon-edit { background: #fef3c7; color: #d97706; }
        .icon-delete { background: #fee2e2; color: #dc2626; }

        .icon-btn:hover { transform: scale(1.1); }

        @media (max-width: 768px) {
            .section-header, .header-title { flex-direction: column; align-items: flex-start; gap: 15px; }
            select { width: 100%; }
            .guru-grid { grid-template-columns: 1fr; }
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

<div class="container">
    <div class="card">
        <div class="header-title">
            <h2>Detail Kelas: {{ $kelas->nama_kelas }}</h2>
            <a href="{{ route('admin.kelas') }}" class="btn-action btn-back"> Kembali</a>
        </div>

        @if(session('success'))
            <script>
                Swal.fire({
                    toast: true, position: 'top-end', icon: 'success',
                    title: 'Berhasil!', text: 'Data telah diperbarui.',
                    showConfirmButton: false, timer: 3000, timerProgressBar: true
                });
            </script>
        @endif

        <div class="section">
            <div class="section-header">
                <div class="section-title">Guru Pengajar</div>
                <form action="{{ route('admin.assign.guru') }}" method="POST" style="display:flex; gap:10px; flex-wrap:wrap;">
                    @csrf
                    <input type="hidden" name="id_kelas" value="{{ $kelas->id }}">
                    <select name="id_guru" required>
                        <option value="">Pilih Guru Pengajar...</option>
                        @foreach($gurus as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_lengkap }} ({{ $g->mapel->nama_mapel ?? '-' }})</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn-action btn-add">Plot Guru</button>
                </form>
            </div>

            

            @if($kelas->guru->count() > 0)
                <div class="guru-grid">
                    @foreach($kelas->guru as $g)
                        <div class="guru-card">
                            <div class="guru-name">{{ $g->nama_lengkap }}</div>
                            <span class="badge-mapel">{{ $g->mapel->nama_mapel ?? '-' }}</span>
                            <div style="font-size: 0.8rem; color: var(--text-muted);">NIP: {{ $g->nip ?? '-' }}</div>
                        </div>
                    @endforeach
                </div>
            @else
                <div style="text-align:center; padding:30px; background:#f8fafc; border-radius:18px; color:var(--text-muted);">
                    Belum ada guru yang ditugaskan di kelas ini.
                </div>
            @endif
        </div>

        <div class="section">
            <div class="section-header">
                <div class="section-title">Daftar Siswa</div>
                <a href="{{ route('siswa.create', $kelas->id) }}" class="btn-action btn-success" >+ Tambah Siswa</a>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Rata-Rata</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelas->siswa as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="font-weight:600;">{{ $s->nis }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>
                                    <span style="font-weight:700; color:var(--secondary);">
                                        {{ number_format($s->nilai_avg_nilai ?? 0, 2) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-group">
                                        <a href="{{ route('siswa.detail', $s->id) }}" class="icon-btn icon-detail" title="Detail">👁️</a>
                                        <a href="{{ route('siswa.edit', $s->id) }}" class="icon-btn icon-edit" title="Edit">✏️</a>
                                        <form action="{{ route('siswa.delete', $s->id) }}" method="POST" onsubmit="return confirm('Hapus siswa ini?')">
                                            @csrf @method('DELETE')
                                            <button class="icon-btn icon-delete" title="Hapus">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" style="text-align:center; padding:40px; color:var(--text-muted);">Belum ada siswa terdaftar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>