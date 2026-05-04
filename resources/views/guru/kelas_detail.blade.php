<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Kelas - Guru</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Inter, system-ui, sans-serif;
        background: #f1f5f9;
        color: #0f172a;
    }

    .container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 0 20px;
    }

    .card {
        background: #fff;
        padding: 24px;
        border-radius: 16px;
        box-shadow: 0 2px 6px rgba(0,0,0,.05);
        margin-bottom: 20px;
    }

    h2 { margin-bottom: 8px; }
    h3 { margin-bottom: 16px; color: #334155; }

    /* progress */
    .progress {
        height: 8px;
        background: #e2e8f0;
        border-radius: 20px;
        overflow: hidden;
        margin-top: 10px;
    }

    .progress-bar {
        height: 100%;
        background: #3b82f6;
    }

    /* filter group - lebih rapi */
    .filter-group {
        display: flex;
        gap: 12px;
        margin-bottom: 20px;
        flex-wrap: wrap;
        align-items: center;
    }

    .filter-label {
        font-size: 0.85rem;
        color: #64748b;
        font-weight: 500;
    }

    .filter-buttons {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .filter-btn {
        padding: 6px 16px;
        border-radius: 20px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.2s ease;
        background: #f1f5f9;
        color: #475569;
    }

    .filter-btn:hover {
        background: #e2e8f0;
        transform: translateY(-1px);
    }

    .filter-btn.active {
        background: #3b82f6;
        color: white;
        box-shadow: 0 2px 4px rgba(59, 130, 246, 0.3);
    }

    .filter-btn.sudah.active {
        background: #10b981;
    }

    .filter-btn.belum.active {
        background: #ef4444;
    }

    /* table */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #f8fafc;
        padding: 12px;
        text-align: left;
        font-weight: 600;
        color: #1e293b;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #e2e8f0;
    }

    tr:hover { background: #f9fafb; }

    /* badge */
    .badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-block;
    }

    .badge-success {
        background: #dcfce7;
        color: #166534;
    }

    .badge-danger {
        background: #fee2e2;
        color: #991b1b;
    }

    .badge-muted {
        background: #f1f5f9;
        color: #64748b;
    }

    /* button aksi */
    .btn {
        padding: 6px 14px;
        border-radius: 6px;
        color: #fff;
        text-decoration: none;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.2s ease;
        display: inline-block;
    }

    .btn-primary { 
        background: #3b82f6; 
    }
    .btn-primary:hover { 
        background: #2563eb; 
        transform: translateY(-1px);
    }

    .btn-warning { 
        background: #f59e0b; 
    }
    .btn-warning:hover { 
        background: #d97706;
        transform: translateY(-1px);
    }

    .empty {
        text-align: center;
        padding: 40px;
        color: #94a3b8;
    }

    /* Footer buttons */
    .footer-buttons {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
        display: flex;
        justify-content: flex-end;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #64748b;
        color: white;
        padding: 8px 18px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .btn-back:hover {
        background: #475569;
        transform: translateY(-1px);
    }

    /* Statistik kecil */
    .stats-badge {
        display: inline-flex;
        gap: 16px;
        margin-top: 12px;
        flex-wrap: wrap;
    }

    .stat-item {
        font-size: 0.8rem;
        color: #64748b;
        background: #f8fafc;
        padding: 4px 12px;
        border-radius: 20px;
    }

    .stat-item strong {
        color: #3b82f6;
        font-weight: 700;
    }

    /* Responsif */
    @media (max-width: 700px) {
        .container {
            padding: 0 16px;
        }
        .card {
            padding: 18px;
        }
        th, td {
            padding: 8px;
            font-size: 0.85rem;
        }
        .btn {
            padding: 4px 10px;
            font-size: 0.75rem;
        }
        .filter-group {
            flex-direction: column;
            align-items: flex-start;
        }
        .footer-buttons {
            justify-content: stretch;
        }
        .footer-buttons .btn-back {
            width: 100%;
            justify-content: center;
        }
        table {
            font-size: 0.8rem;
        }
    }
</style>
</head>

<body>

<div class="container">

    {{-- INFO KELAS --}}
    <div class="card">
        <h2>📚 Kelas {{ $kelas->nama_kelas }}</h2>

        @php
            $total = $kelas->siswa->count();
            $terisi = $kelas->siswa->filter(fn($s) => isset($nilai[$s->id]) && !is_null($nilai[$s->id]->nilai))->count();
            $belum = $total - $terisi;
            $persen = $total > 0 ? ($terisi / $total) * 100 : 0;
            $lulus = $kelas->siswa->filter(fn($s) => isset($nilai[$s->id]) && $nilai[$s->id]->nilai >= 75)->count();
            $remedial = $terisi - $lulus;
        @endphp

        <div class="stats-badge">
            <span class="stat-item">👨‍🎓 <strong>{{ $total }}</strong> Siswa</span>
            <span class="stat-item">✅ <strong>{{ $terisi }}</strong> Sudah Dinilai</span>
            <span class="stat-item">⏳ <strong>{{ $belum }}</strong> Belum Dinilai</span>
            <span class="stat-item">🎓 <strong>{{ $lulus }}</strong> Lulus</span>
            <span class="stat-item">📖 <strong>{{ $remedial }}</strong> Remedial</span>
        </div>

        <div class="progress">
            <div class="progress-bar" style="width: {{ $persen }}%"></div>
        </div>
        <p style="font-size: 0.8rem; color: #64748b; margin-top: 8px;">Progress pengisian nilai: {{ number_format($persen, 0) }}%</p>
    </div>

    {{-- TABEL --}}
    <div class="card">
        <div class="filter-group">
            <span class="filter-label">Filter Status:</span>
            <div class="filter-buttons">
                <a href="{{ request()->fullUrlWithQuery(['filter' => null]) }}"
                   class="filter-btn {{ $filter == null ? 'active' : '' }}">
                    Semua ({{ $total }})
                </a>

                <a href="{{ request()->fullUrlWithQuery(['filter' => 'sudah']) }}"
                   class="filter-btn sudah {{ $filter == 'sudah' ? 'active' : '' }}">
                    Sudah Dinilai ({{ $terisi }})
                </a>

                <a href="{{ request()->fullUrlWithQuery(['filter' => 'belum']) }}"
                   class="filter-btn belum {{ $filter == 'belum' ? 'active' : '' }}">
                    Belum Dinilai ({{ $belum }})
                </a>
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th width="50">No</th>
                        <th width="100">NIS</th>
                        <th width="100">Nama Siswa</th>
                        <th width="100">Nilai</th>
                        <th width="100">Status</th>
                        <th width="10">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $s)
                        @php
                            $kkm = 75;
                            $n = $nilai[$s->id]->nilai ?? null;
                        @endphp

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nis }}</td>
                            <td><strong>{{ $s->nama_siswa }}</strong></td>

                            {{-- NILAI --}}
                            <td>
                                @if($n !== null)
                                    <span class="badge {{ $n >= $kkm ? 'badge-success' : 'badge-danger' }}">
                                        {{ $n }}
                                    </span>
                                @else
                                    <span class="badge badge-muted"> </span>
                                @endif
                            </td>

                            {{-- STATUS --}}
                            <td>
                                @if($n === null)
                                    <span class="badge badge-muted">Belum</span>
                                @elseif($n >= $kkm)
                                    <span class="badge badge-success">Lulus</span>
                                @else
                                    <span class="badge badge-danger">Remedial</span>
                                @endif
                            </td>

                            {{-- AKSI --}}
                            <td>
                                <a href="{{ route('guru.nilai.get', $s->id) }}"
                                   class="btn {{ $n ? 'btn-warning' : 'btn-primary' }}">
                                    {{ $n ? 'Edit' : 'Input' }}
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="empty">📭 Tidak ada siswa di kelas ini</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- TOMBOL KEMBALI --}}
    <div class="footer-buttons">
        <a href="{{ route('guru.dashboard') }}" class="btn-back">
            Kembali
        </a>
    </div>

</div>

</body>
</html>