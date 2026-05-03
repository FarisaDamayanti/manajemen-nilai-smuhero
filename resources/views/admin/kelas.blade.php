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

        h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #0f172a;
            border-left: 4px solid #3b82f6;
            padding-left: 14px;
        }

        h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin: 0;
            color: #0f172a;
            background: #f8fafc;
            padding: 10px 16px;
            border-radius: 10px;
            display: inline-block;
        }

        .kelas-section {
            margin-bottom: 32px;
        }

        .kelas-section:last-child {
            margin-bottom: 0;
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

        /* Tabel */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            margin-top: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        th {
            background: #f8fafc;
            text-align: left;
            padding: 12px 16px;
            font-weight: 600;
            color: #1e293b;
            border-bottom: 2px solid #e2e8f0;
        }

        td {
            padding: 10px 16px;
            border-bottom: 1px solid #f0f2f5;
            color: #334155;
        }

        tr:hover td {
            background-color: #fafcff;
        }

        .empty-row td {
            text-align: center;
            color: #94a3b8;
            padding: 40px;
            font-style: italic;
        }

        /* Nilai Badge */
        .nilai-badge {
            background: #f1f5f9;
            padding: 4px 10px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
            color: #0f172a;
        }

        .nilai-high {
            background: #dcfce7;
            color: #166534;
        }

        .nilai-medium {
            background: #fef3c7;
            color: #d97706;
        }

        .nilai-low {
            background: #fee2e2;
            color: #dc2626;
        }

        /* Statistik Kelas */
        .class-stats {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .stat-item {
            background: #f8fafc;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 0.85rem;
        }

        .stat-label {
            color: #64748b;
        }

        .stat-value {
            font-weight: 700;
            color: #1e293b;
            margin-left: 6px;
        }

        /* Responsif */
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
            th, td {
                padding: 8px 12px;
            }
            h3 {
                font-size: 1.1rem;
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
            <h2>Data Kelas</h2>
            <a href="{{ route('kelas.create') }}" class="btn-primary">Tambah Kelas</a>
        </div>

        @forelse($kelas as $k)
            <div class="kelas-section">
                <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
                    <h3>{{ $k->nama_kelas }}</h3>
                    <div class="class-stats">
                        <div class="stat-item">
                            <span class="stat-label">Jumlah Siswa:</span>
                            <span class="stat-value">{{ $k->siswa->count() }}</span>
                        </div>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>NIS</th>
                                <th>Rata-rata</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($k->siswa as $s)
                            <tr>
                                <td><strong>{{ $s->nama_siswa }}</strong></td>
                                <td>{{ $s->nis }}</td>
                                <td>
                                    @php
                                        $nilaiRata = $s->nilai_rata ?? 0;
                                        $nilaiClass = 'nilai-badge';
                                        if ($nilaiRata >= 85) {
                                            $nilaiClass .= ' nilai-high';
                                        } elseif ($nilaiRata >= 70) {
                                            $nilaiClass .= ' nilai-medium';
                                        } elseif ($nilaiRata > 0) {
                                            $nilaiClass .= ' nilai-low';
                                        }
                                    @endphp
                                    <span class="{{ $nilaiClass }}">
                                        {{ number_format($nilaiRata, 2) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-row">
                                <td colspan="3">Belum ada siswa di kelas ini</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="empty-row" style="text-align: center; padding: 60px 20px; color: #94a3b8;">
                Belum ada data kelas
            </div>
        @endforelse
    </div>
</div>

</body>
</html>