<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Capaian Pembelajaran</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
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

        /* Table */
        .table-wrapper {
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #f1f5f9;
            margin-bottom: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
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
            font-size: 0.9rem;
            vertical-align: middle;
        }

        .td-mapel { font-weight: 700; color: #0f172a; }
        
        .badge-tingkat {
            background: #e0e7ff;
            color: #4338ca;
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .deskripsi-text {
            color: var(--text-muted);
            max-width: 400px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }

        /* Action Buttons */
        .action-icons {
            display: flex;
            gap: 10px;
        }

        .icon-btn {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .icon-btn.edit { background: #fffbeb; color: #d97706; }
        .icon-btn.edit:hover { background: #fef3c7; }

        .icon-btn.delete { background: #fef2f2; color: #dc2626; }
        .icon-btn.delete:hover { background: #fee2e2; }

        .empty-state {
            padding: 60px;
            text-align: center;
            color: var(--text-muted);
        }

        .footer-buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .header-section { flex-direction: column; align-items: flex-start; gap: 20px; }
            .deskripsi-text { max-width: 200px; }
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
            <a href="{{ route('admin.guru') }}">Guru</a>
            <a href="{{ route('admin.capaian') }}"class="active">Capaian</a>
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
            <h2>Capaian Pembelajaran</h2>
            <a href="{{ route('admin.capaian.create') }}" class="btn-primary">
                <i class="fas fa-plus"></i> Tambah CP
            </a>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if(session('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonColor: '#4f46e5'
            });
        </script>
        @endif

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th style="width: 60px">No</th>
                        <th>Mata Pelajaran</th>
                        <th>Tingkat</th>
                        <th>Deskripsi Capaian</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($capaian as $i => $cp)
                    <tr>
                        <td style="color: var(--text-muted); font-weight: 600;">{{ $i + 1 }}</td>
                        <td class="td-mapel">{{ $cp->mapel->nama_mapel ?? '-' }}</td>
                        <td>
                            <span class="badge-tingkat">Kelas {{ $cp->tingkat }}</span>
                        </td>
                        <td>
                            <div class="deskripsi-text" title="{{ $cp->deskripsi }}">
                                {{ $cp->deskripsi }}
                            </div>
                        </td>
                        <td>
                            <div class="action-icons">
                                <a href="{{ route('capaian.edit', $cp->id) }}" class="icon-btn edit" title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('capaian.delete', $cp->id) }}" method="POST" id="delete-form-{{ $cp->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="icon-btn delete" title="Hapus Data" 
                                            onclick="confirmDelete('{{ $cp->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            <i class="fas fa-folder-open" style="font-size: 2rem; margin-bottom: 10px; display: block; opacity: 0.5;"></i>
                            Belum ada data capaian pembelajaran.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="footer-buttons">
            <a href="{{ route('admin.dashboard') }}" class="btn-back">Kembali ke Dashboard</a>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data capaian pembelajaran akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>

</body>
</html>