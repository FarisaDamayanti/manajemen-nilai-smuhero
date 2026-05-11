<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Detail Kelas</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #64748b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --shadow-sm: 0 4px 6px -1px rgb(0 0 0 / 0.1);
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

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 24px;
        }

        /* Card Header Kelas */
        .header-card {
            background: linear-gradient(135deg, var(--primary) 0%, #8b5cf6 100%);
            color: white;
            padding: 32px;
            border-radius: 24px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-md);
            position: relative;
            overflow: hidden;
        }

        .header-card::after {
            content: '📚';
            position: absolute;
            right: -10px;
            bottom: -10px;
            font-size: 8rem;
            opacity: 0.1;
            transform: rotate(-15deg);
        }

        .header-card h2 {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 16px;
        }

        /* Stats Badge Modern */
        .stats-container {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .stat-tag {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            padding: 8px 16px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .stat-tag strong {
            font-weight: 800;
            margin-left: 4px;
        }

        /* Progress Bar Modern */
        .progress-section {
            margin-top: 24px;
            max-width: 500px;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            margin-bottom: 8px;
            font-weight: 700;
            opacity: 0.9;
        }

        .progress-bg {
            height: 10px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: white;
            border-radius: 20px;
            transition: width 0.8s ease;
        }

        /* Main Table Card */
        .table-card {
            background: white;
            border-radius: 24px;
            padding: 30px;
            border: 1px solid #e2e8f0;
            box-shadow: var(--shadow-sm);
        }

        /* Filter Modern */
        .filter-wrapper {
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .filter-title {
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--secondary);
        }

        .filter-pill {
            display: flex;
            background: #f1f5f9;
            padding: 5px;
            border-radius: 14px;
            gap: 5px;
        }

        .pill-item {
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--secondary);
            transition: 0.3s;
        }

        .pill-item:hover {
            color: var(--primary);
        }

        .pill-item.active {
            background: white;
            color: var(--primary);
            box-shadow: var(--shadow-sm);
        }

        /* Table Design */
        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        th {
            padding: 15px;
            text-align: left;
            font-size: 0.85rem;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 700;
        }

        td {
            padding: 15px;
            background: #fcfdfe;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.95rem;
        }

        td:first-child { border-left: 1px solid #f1f5f9; border-top-left-radius: 12px; border-bottom-left-radius: 12px; }
        td:last-child { border-right: 1px solid #f1f5f9; border-top-right-radius: 12px; border-bottom-right-radius: 12px; }

        tr:hover td {
            background: #f8fafc;
            border-color: var(--primary);
        }

        /* Badge Styles */
        .badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
        }

        .b-success { background: #dcfce7; color: var(--success); }
        .b-danger { background: #fee2e2; color: var(--danger); }
        .b-muted { background: #f1f5f9; color: var(--secondary); }

        /* Action Buttons */
        .btn-action {
            padding: 8px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 700;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-input { background: #e0e7ff; color: var(--primary); }
        .btn-input:hover { background: var(--primary); color: white; }

        .btn-edit { background: #fef3c7; color: var(--warning); }
        .btn-edit:hover { background: var(--warning); color: white; }

        /* Footer */
        .footer-action {
            margin-top: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-back-link {
            text-decoration: none;
            color: var(--secondary);
            font-weight: 700;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }

        .btn-back-link:hover { color: var(--primary); }

        @media (max-width: 768px) {
            .container { padding: 15px; }
            .header-card { padding: 20px; }
            .stats-container { gap: 8px; }
        }
    </style>
</head>
<body>

<div class="container">

    {{-- INFO KELAS --}}
    <div class="header-card">
        <h2>Kelas {{ $kelas->nama_kelas }}</h2>

        @php
            $total = $kelas->siswa->count();
            $terisi = $kelas->siswa->filter(fn($s) => isset($nilai[$s->id]) && !is_null($nilai[$s->id]->nilai))->count();
            $belum = $total - $terisi;
            $persen = $total > 0 ? ($terisi / $total) * 100 : 0;
            $lulus = $kelas->siswa->filter(fn($s) => isset($nilai[$s->id]) && $nilai[$s->id]->nilai >= 75)->count();
            $remedial = $terisi - $lulus;
        @endphp

        <div class="stats-container">
            <div class="stat-tag">👨‍🎓 Total: <strong>{{ $total }}</strong></div>
            <div class="stat-tag">✅ Dinilai: <strong>{{ $terisi }}</strong></div>
            <div class="stat-tag">⏳ Belum: <strong>{{ $belum }}</strong></div>
            <div class="stat-tag">🎓 Lulus: <strong>{{ $lulus }}</strong></div>
            <div class="stat-tag">📖 Remed: <strong>{{ $remedial }}</strong></div>
        </div>

        <div class="progress-section">
            <div class="progress-label">
                <span>Progress Pengisian Nilai</span>
                <span>{{ number_format($persen, 0) }}%</span>
            </div>
            <div class="progress-bg">
                <div class="progress-fill" style="width: {{ $persen }}%"></div>
            </div>
        </div>
    </div>

    {{-- TABEL DATA SISWA --}}
    <div class="table-card">
        <div class="filter-wrapper">
            <span class="filter-title">Tampilkan:</span>
            <div class="filter-pill">
                <a href="{{ request()->fullUrlWithQuery(['filter' => null]) }}" 
                   class="pill-item {{ $filter == null ? 'active' : '' }}">
                   Semua
                </a>
                <a href="{{ request()->fullUrlWithQuery(['filter' => 'sudah']) }}" 
                   class="pill-item {{ $filter == 'sudah' ? 'active' : '' }}">
                   Sudah Dinilai
                </a>
                <a href="{{ request()->fullUrlWithQuery(['filter' => 'belum']) }}" 
                   class="pill-item {{ $filter == 'belum' ? 'active' : '' }}">
                   Belum Dinilai
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>NIS</th>
                        <th>Siswa</th>
                        <th width="120">Nilai</th>
                        <th width="150">Status</th>
                        <th>Capaian Kompetensi</th>
                        <th width="100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $s)
                        @php
                            $kkm = 75;
                            $n = $nilai[$s->id]->nilai ?? null;
                        @endphp
                        <tr>
                            <td style="text-align: center; color: var(--secondary); font-weight: 700;">{{ $loop->iteration }}</td>
                            <td><div style="font-size: 1rem; font-weight: 700; color: var(--text-main);">{{ $s->nis }}</div></td>
                            <td>
                                <div style="font-weight: 700; color: var(--text-main);">{{ $s->nama_siswa }}</div>
                            </td>
                            <td>
                                @if($n !== null)
                                    <div style="font-size: 1.1rem; font-weight: 800; color: {{ $n >= $kkm ? 'var(--success)' : 'var(--danger)' }}">
                                        {{ $n }}
                                    </div>
                                @else
                                    <span style="color: #cbd5e1;">—</span>
                                @endif
                            </td>
                            <td>
                                @if($n === null)
                                    <span class="badge b-muted">BELUM INPUT</span>
                                @elseif($n >= $kkm)
                                    <span class="badge b-success">LULUS</span>
                                @else
                                    <span class="badge b-danger">REMEDIAL</span>
                                @endif
                            </td>
                            <td style="font-size: 0.85rem; color: #475569; max-width: 300px;">
                                {{ $s->deskripsi ?? 'Belum ada catatan capaian.' }}
                            </td>
                            <td>
                                @if(!is_null($n))
                                    <a href="{{ route('guru.nilai.get', $s->id) }}" class="btn-action btn-edit">
                                        EDIT
                                    </a>
                                @else
                                    <a href="{{ route('guru.nilai.get', $s->id) }}" class="btn-action btn-input">
                                        INPUT
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 50px; color: var(--secondary);">
                                📭 Tidak ada data siswa ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer-action">
        <a href="{{ route('guru.dashboard') }}" class="btn-back-link">
            <span>←</span> Kembali 
        </a>
    </div>

</div>

</body>
</html>