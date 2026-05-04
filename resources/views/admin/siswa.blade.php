<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - Manajemen Sekolah</title>

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

        /* NAVBAR (copy sama persis) */
        .navbar {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            padding: 0 32px;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: #e2e8f0;
            text-decoration: none;
        }

        .nav-links a.active {
            color: white;
            border-bottom: 2px solid #3b82f6;
        }

        /* CONTAINER */
        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            border-left: 4px solid #3b82f6;
            padding-left: 10px;
        }

        .btn {
            background: #3b82f6;
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f9fafb;
        }

        .empty {
            text-align: center;
            color: #94a3b8;
            padding: 40px;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-links">
        <a href="{{ route('admin.dashboard') }}">Home</a>
        <a href="{{ route('admin.guru') }}">Guru</a>
        <a href="{{ route('admin.kelas') }}">Kelas</a>
        <a href="{{ route('admin.mapel') }}">Mapel</a>
        <a href="{{ route('admin.siswa') }}" class="active">Siswa</a>
    </div>
</div>

<!-- CONTENT -->
<div class="container">
    <div class="card">

        <h2>Data Siswa</h2>

        <!-- tombol tetap -->
        <a href="{{ route('siswa.create') }}" class="btn">+ Tambah Siswa</a>

        <!-- TABEL KAMU (tidak diubah) -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                </tr>
            </thead>

            <tbody>
                @forelse($siswa as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->nama_siswa }}</td>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->kelas->nama_kelas ?? '-' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="empty">Belum ada siswa</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

</body>
</html>