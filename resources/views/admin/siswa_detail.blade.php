<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Detail Siswa</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
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
            padding: 40px 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        /* Header Page */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 1.75rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #0f172a;
        }

        /* Profile Card */
        .card-profile {
            background: white;
            padding: 30px;
            border-radius: 24px;
            box-shadow: var(--shadow-md);
            margin-bottom: 25px;
            border: 1px solid #f1f5f9;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
        }

        .info-item span.label {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .info-item span.value {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-main);
        }

        /* Nilai Section */
        .card-nilai {
            background: white;
            border-radius: 24px;
            box-shadow: var(--shadow-md);
            overflow: hidden;
            border: 1px solid #f1f5f9;
        }

        .card-header {
            padding: 20px 30px;
            border-bottom: 1px solid #f1f5f9;
            background: #ffffff;
        }

        .card-header h3 {
            font-size: 1.1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: #f8fafc;
            text-align: left;
            padding: 16px 30px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            border-bottom: 1px solid #f1f5f9;
        }

        td {
            padding: 16px 30px;
            font-size: 0.95rem;
            border-bottom: 1px solid #f8fafc;
        }

        tr:last-child td {
            border-bottom: none;
        }

        /* Badge Nilai */
        .badge-nilai {
            display: inline-block;
            padding: 6px 14px;
            background: rgba(79, 70, 229, 0.1);
            color: var(--primary);
            border-radius: 10px;
            font-weight: 800;
            font-size: 0.9rem;
        }

        .empty-state {
            padding: 40px;
            text-align: center;
            color: var(--text-muted);
            font-style: italic;
        }

        /* Action Footer */
        .footer-actions {
            margin-top: 30px;
            display: flex;
            justify-content: flex-start;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: white;
            color: var(--text-main);
            text-decoration: none;
            border-radius: 14px;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .btn-back:hover {
            background: #f1f5f9;
            transform: translateX(-4px);
            color: var(--primary);
        }

        @media (max-width: 600px) {
            .card-profile { grid-template-columns: 1fr; }
            th, td { padding: 12px 20px; }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="page-header">
        <h2>Detail Siswa</h2>
    </div>

    <div class="card-profile">
        <div class="info-item">
            <span class="label">Nama Lengkap</span>
            <span class="value">{{ $siswa->nama_siswa }}</span>
        </div>
        <div class="info-item">
            <span class="label">NIS</span>
            <span class="value">{{ $siswa->nis }}</span>
        </div>
        <div class="info-item">
            <span class="label">Kelas</span>
            <span class="value">
                <i class="fas fa-graduation-cap" style="color: var(--primary); margin-right: 5px;"></i>
                {{ $siswa->kelas->nama_kelas }}
            </span>
        </div>
    </div>

    <div class="card-nilai">
        <div class="card-header">
            <h3><i class="fas fa-chart-line" style="color: var(--primary);"></i> Nilai Mata Pelajaran</h3>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Mata Pelajaran</th>
                        <th style="text-align: right;">Hasil Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswa->nilai as $n)
                        <tr>
                            <td style="font-weight: 500;">{{ $n->mapel->nama_mapel ?? '-' }}</td>
                            <td style="text-align: right;">
                                <span class="badge-nilai">
                                    {{ $n->nilai }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="empty-state">
                                <i class="fas fa-info-circle"></i> Belum ada data nilai yang diinput.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer-actions">
        <a href="{{ route('admin.kelas.detail', $siswa->id_kelas) }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Kembali ke List Kelas
        </a>
    </div>

</div>

</body>
</html>