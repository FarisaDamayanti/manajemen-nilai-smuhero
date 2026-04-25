<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Manajemen Sekolah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
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

        /* Card Umum */
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

        h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0;
            color: #0f172a;
            border-left: none;
            padding-left: 0;
        }

        /* Button */
        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(59, 130, 246, 0.3);
        }

        /* Tabel */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 12px;
            margin-top: 12px;
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

        .empty-row td {
            text-align: center;
            color: #94a3b8;
            padding: 32px;
            font-style: italic;
        }

        .nilai-badge {
            background: #f1f5f9;
            padding: 4px 10px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-block;
            color: #0f172a;
        }

        /* Header section untuk flex antara judul dan tombol */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        /* responsif */
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
                padding: 10px 12px;
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
            <a href="{{ route('admin.dashboard') }}" class="active">Home</a>
            <a href="{{ route('admin.guru') }}">Guru</a>
            <a href="{{ route('admin.kelas') }}">Kelas</a>
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
    {{-- Card Selamat Datang --}}
    <div class="card">
        <h2>Selamat datang, {{ auth()->user()->name }}</h2>
        <div class="role-badge">
            {{ ucfirst(auth()->user()->role) }}
        </div>
        <p style="margin-top: 12px; color: #475569;">Anda memiliki akses penuh untuk mengelola data siswa, guru, dan kelas.</p>
    </div>

    {{-- Menu Admin - Tambah Siswa (sama seperti guru) --}}
    <div class="card">
        <div class="header-section">
            <h3>Kelola Siswa</h3>
            <a href="{{ route('siswaCreate') }}" class="btn-primary">Tambah Siswa</a>
        </div>
    </div>

    {{-- LOOP KELAS --}}
    @foreach($kelas as $k)
    <div class="card">
        <h3 style="border-left: 4px solid #3b82f6; padding-left: 14px; margin-bottom: 18px;">{{ $k->nama_kelas }}</h3>

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
                        <td>{{ $s->nama_siswa }}</td>
                        <td>{{ $s->nis }}</td>
                        <td>
                            <span class="nilai-badge">{{ number_format($s->nilai_rata ?? 0, 2) }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr class="empty-row">
                        <td colspan="3">Belum ada siswa</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endforeach
</div>

</body>
</html>