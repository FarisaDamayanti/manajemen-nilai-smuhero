<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas - Manajemen Sekolah</title>

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
            border-left: 5px solid #3b82f6;
            padding-left: 14px;
            margin: 0;
        }

        /* Button Styles */
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
            font-family: inherit;
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

        .btn-secondary {
            background: #10b981;
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

        .btn-secondary:hover {
            background: #059669;
            transform: translateY(-1px);
        }

        /* Form Styles */
        .form-group {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        select {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            background: white;
            font-family: inherit;
            font-size: 14px;
            cursor: pointer;
            transition: border-color 0.2s;
            min-width: 250px;
        }

        select:hover {
            border-color: #3b82f6;
        }

        select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Section Styles */
        .section {
            margin-bottom: 40px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 20px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e2e8f0;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #1e293b;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: #3b82f6;
            border-radius: 2px;
        }

        /* Guru Grid */
        .guru-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 16px;
        }

        .guru-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .guru-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
            border-color: #cbd5e1;
        }

        .guru-name {
            font-size: 16px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .guru-mapel {
            font-size: 13px;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 12px;
        }

        .badge-mapel {
            display: inline-block;
            padding: 4px 12px;
            background: #eef2ff;
            color: #1e40af;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .guru-info {
            font-size: 12px;
            color: #94a3b8;
            border-top: 1px solid #f1f5f9;
            padding-top: 10px;
            margin-top: 8px;
        }

        .empty-text {
            color: #64748b;
            font-style: italic;
            padding: 40px;
            text-align: center;
            background: #f8fafc;
            border-radius: 12px;
        }

        /* Table Styles */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            margin-top: 20px;
            border: 1px solid #e2e8f0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        th {
            background: #f8fafc;
            text-align: left;
            padding: 14px 16px;
            font-weight: 600;
            color: #1e293b;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 12px 16px;
            border-bottom: 1px solid #f0f2f5;
            color: #334155;
        }

        tr:hover td {
            background-color: #fafcff;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .empty-row td {
            text-align: center;
            color: #94a3b8;
            padding: 40px;
            font-style: italic;
        }

        .text-center {
            text-align: center;
        }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 40px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .badge-green {
            background: #dcfce7;
            color: #166534;
        }

        /* Footer button */
        .footer-buttons {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
        }

        /* Alert messages */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .guru-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 16px;
            }
        }

        @media (max-width: 768px) {
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
            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }
            .form-group {
                width: 100%;
                flex-direction: column;
            }
            select {
                width: 100%;
            }
            .btn-primary, .btn-secondary, .btn-back {
                width: 100%;
                justify-content: center;
                text-align: center;
            }
            th, td {
                padding: 10px 12px;
            }
            .guru-grid {
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
            <div class="logo-icon">A</div>
            <span class="logo-text">Admin</span>
        </div>

        <div class="nav-links">
            <a href="{{ route('admin.dashboard') }}">Home</a>
            <a href="{{ route('admin.guru') }}">Guru</a>
            <a href="{{ route('admin.kelas') }}" class="active">Kelas</a>
            <a href="{{ route('admin.mapel') }}">Mapel</a>
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
                <h2>Detail Kelas: {{ $kelas->nama_kelas }}</h2>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Section Guru -->
        <div class="section">
            <div class="section-header">
                <div class="section-title">Guru Pengajar</div>
                
                <form action="{{ route('admin.assign.guru') }}" method="POST" class="form-group">
                    @csrf
                    <input type="hidden" name="id_kelas" value="{{ $kelas->id }}">
                    
                    <select name="id_guru" required>
                        <option value="">-- Pilih Guru untuk ditambah ke kelas--</option>
                        @foreach($gurus as $g)
                            <option value="{{ $g->id }}">
                                {{ $g->nama_lengkap }} ({{ $g->mapel->nama_mapel ?? '-' }})
                            </option>
                        @endforeach
                    </select>
                    
                    <button type="submit" class="btn-primary">Tambah Guru</button>
                </form>
            </div>

            @if($kelas->guru->count() > 0)
                <div class="guru-grid">
                    @foreach($kelas->guru as $g)
                        <div class="guru-card">
                            <div class="guru-name">{{ $g->nama_lengkap }}</div>
                            <div class="guru-mapel">
                                <span class="badge-mapel">{{ $g->mapel->nama_mapel ?? '-' }}</span>
                            </div>
                            <div class="guru-info">
                                NIP: {{ $g->nip ?? '-' }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="empty-text">Belum ada guru yang ditugaskan</p>
            @endif
        </div>

        <!-- Section Siswa -->
        <div class="section">
            <div class="section-header">
                <div class="section-title">Daftar Siswa</div>
                
                <a href="{{ route('siswa.create', $kelas->id) }}" class="btn-secondary">
                    + Tambah Siswa
                </a>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Siswa</th>
                            <th width="150">NIS</th>
                            <th width="150">Nilai Rata-Rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kelas->siswa as $s)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->nis }}</td>
                                <td>
                                    <span class="badge badge-green">
                                        {{ number_format($s->nilai_avg_nilai ?? 0, 2) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr class="empty-row">
                                <td colspan="4">Belum ada siswa yang terdaftar</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Tombol Kembali di bawah -->
        <div class="footer-buttons">
            <a href="{{ route('admin.kelas') }}" class="btn-back">
                Kembali
            </a>
        </div>
        </div>
    </div>
</div>

</body>
</html>