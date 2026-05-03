<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belum Dinilai - Guru</title>

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

        /* CONTAINER */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        h2 {
            margin-bottom: 20px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f9fafb;
        }

        /* BUTTON */
        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.85rem;
        }

        .btn-primary:hover {
            background: #2563eb;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-left">
        <div class="logo">
            <div class="logo-icon">G</div>
            <span class="logo-text">Guru</span>
        </div>

        <div class="nav-links">
            <a href="{{ route('guru.dashboard') }}">Dashboard</a>
            <!-- <a href="{{ route('guru.nilai') }}">Input Nilai</a> -->
            <a href="{{ route('guru.sudah') }}">Sudah Dinilai</a>
            <a href="{{ route('guru.belum') }}" class="active">Belum Dinilai</a>
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

<!-- CONTENT -->
<div class="container">
    <div class="card">
        <h2>Daftar Siswa Belum Dinilai</h2>
        <p style="margin-bottom:15px; color:#475569;">
            Total: <b>{{ count($belum) }}</b> siswa belum dinilai
        </p>

        <table>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>

            @forelse ($belum as $b)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $b->nis }}</td>
                <td>{{ $b->nama_siswa }}</td>
                <td>
                    <a href="{{ route('guru.nilai') }}" class="btn-primary">
                        Input Nilai
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center; padding:20px;">
                    Semua siswa sudah dinilai 🎉
                </td>
            </tr>
            @endforelse
        </table>
    </div>
</div>

</body>
</html>