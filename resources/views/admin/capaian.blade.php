<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Capaian Pembelajaran</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        h2 {
            margin: 0;
            border-left: 4px solid #3b82f6;
            padding-left: 10px;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
            display: inline-block;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-back {
            background: #64748b;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: 0.2s;
            display: inline-block;
        }

        .btn-back:hover {
            background: #475569;
        }

        /* Button group untuk tombol di bawah - posisi kanan */
        .footer-buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 24px;
        }

        /* Tabel Styling */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
        }

        th {
            background: #3b82f6;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        tr:hover {
            background: #f8fafc;
        }

        /* Alternating row colors */
        tr:nth-child(even) {
            background: #f9fafb;
        }

        tr:nth-child(even):hover {
            background: #f8fafc;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #64748b;
            font-size: 16px;
        }

        /* Aksi button dalam tabel */
        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            background: #f59e0b;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            transition: 0.2s;
            display: inline-block;
        }

        .btn-edit:hover {
            background: #d97706;
        }

        .btn-delete {
            background: #ef4444;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 12px;
            transition: 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #dc2626;
        }

        /* Flash message styling */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border-left: 4px solid #22c55e;
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 16px;
            }

            th, td {
                padding: 8px;
                font-size: 14px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
            }

            .footer-buttons {
                justify-content: stretch;
            }

            .btn-back {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Daftar Capaian Pembelajaran</h2>
        <a href="{{ route('admin.capaian.create') }}" class="btn-primary">+ Tambah CP</a>
    </div>

    {{-- Flash message sukses --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mapel</th>
                    <th>Tingkat Kelas</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($capaian as $i => $cp)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $cp->mapel->nama_mapel ?? '-' }}</td>
                    <td>Kelas {{ $cp->tingkat }}</td>
                    <td>{{ $cp->deskripsi }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="empty-state">Belum ada data capaian pembelajaran. Silakan tambah CP terlebih dahulu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tombol kembali di bawah posisi kanan -->
    <div class="footer-buttons">
        <a href="{{ route('admin.dashboard') }}" class="btn-back">Kembali</a>
    </div>
</div>

</body>
</html>