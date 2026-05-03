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
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        h3 {
            margin-bottom: 16px;
            color: #334155;
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

        .nilai-badge {
            background: #e0f2fe;
            color: #0369a1;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .empty {
            text-align: center;
            padding: 20px;
            color: #94a3b8;
        }

        /* PROGRESS */
        .progress {
            height: 8px;
            background: #e2e8f0;
            border-radius: 20px;
            margin-top: 10px;
            overflow: hidden;
        }

        .bar {
            height: 100%;
            background: #3b82f6;
        }

        /* kembali */
        .btn-back {
            display: inline-block;
            margin-bottom: 16px;
            background: #e2e8f0;
            color: #1e293b;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: 0.2s;
        }

        .btn-back:hover {
            background: #cbd5f5;
        }
    </style>
</head>
<body>

<!-- NAVBAR
<div class="navbar">
    <div class="nav-left">
        <div class="logo">
            <div class="logo-icon">G</div>
            <span class="logo-text">Guru</span>
        </div>

        <div class="nav-links">
            <a href="{{ route('guru.dashboard') }}" class="active">Dashboard</a>
            <a href="{{ route('guru.nilai') }}">Input Nilai</a>
            <a href="{{ route('guru.sudah') }}">Sudah Dinilai</a>
            <a href="{{ route('guru.belum') }}">Belum Dinilai</a>
        </div>
    </div>

    <div class="user-info">
        <span class="user-name">{{ auth()->user()->name }}</span>
        <form class="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</div> -->

<!-- CONTENT -->
<div class="container">

    <!-- INFO KELAS -->
    <div class="card">
        <h2>📘 Detail Kelas: {{ $kelas->nama_kelas }}</h2>

        @php
            $total = $kelas->siswa->count();
            $terisi = $kelas->siswa->filter(fn($s) => isset($nilai[$s->id]))->count();
            $persen = $total > 0 ? ($terisi / $total) * 100 : 0;
        @endphp

        <p>{{ $terisi }} / {{ $total }} siswa sudah dinilai</p>

        <div class="progress">
            <div class="bar" style="width: {{ $persen }}%"></div>
        </div>
    </div>

    <!-- TABEL SISWA -->
    <div class="card">
    <h3>Daftar Siswa</h3>

    <div style="display:flex; gap:10px; margin-bottom:15px;">

    <a href="{{ request()->fullUrlWithQuery(['filter' => null]) }}"
       style="padding:6px 12px; border-radius:6px;
       background: {{ request('filter') == null ? '#3b82f6' : '#e2e8f0' }};
       color: {{ request('filter') == null ? 'white' : '#1e293b' }};
       text-decoration:none;">
        Semua
    </a>

    <a href="{{ request()->fullUrlWithQuery(['filter' => 'sudah']) }}"
       style="padding:6px 12px; border-radius:6px;
       background: {{ request('filter') == 'sudah' ? '#16a34a' : '#e2e8f0' }};
       color: {{ request('filter') == 'sudah' ? 'white' : '#1e293b' }};
       text-decoration:none;">
        Sudah
    </a>

    <a href="{{ request()->fullUrlWithQuery(['filter' => 'belum']) }}"
       style="padding:6px 12px; border-radius:6px;
       background: {{ request('filter') == 'belum' ? '#dc2626' : '#e2e8f0' }};
       color: {{ request('filter') == 'belum' ? 'white' : '#1e293b' }};
       text-decoration:none;">
        Belum
    </a>

</div>

    <table>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Nilai</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        @forelse ($siswa as $s)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s->nis }}</td>
            <td>{{ $s->nama_siswa }}</td>

            <!-- NILAI -->
            @php $kkm = 75; @endphp

<td>
    @if(isset($nilai[$s->id]))
        @php $n = $nilai[$s->id]->nilai; @endphp

        @if($n >= $kkm)
            <span class="nilai-badge" style="background:#dcfce7; color:#166534;">
                {{ $n }}
            </span>
        @else
            <span class="nilai-badge" style="background:#fee2e2; color:#991b1b;">
                {{ $n }}
            </span>
        @endif
    @else
        
    @endif
</td>

            <!-- STATUS -->
            <td>
    @if(isset($nilai[$s->id]))
        @php $n = $nilai[$s->id]->nilai; @endphp

        @if($n >= $kkm)
            <span class="nilai-badge" style="background:#dcfce7; color:#166534;">
                Lulus
            </span>
        @else
            <span class="nilai-badge" style="background:#fee2e2; color:#991b1b;">
                Remedial
            </span>
        @endif
    @else
        <span class="nilai-badge" style="background:#e2e8f0; color:#475569;">
            Belum
        </span>
    @endif
</td>

            <!-- AKSI -->
            <td>
    @if(isset($nilai[$s->id]))
        <a href="{{ route('guru.nilai.get', $s->id) }}"
           style="padding:6px 10px; background:#f59e0b; color:white; border-radius:6px; text-decoration:none;">
            Edit
        </a>
    @else
        <a href="{{ route('guru.nilai.get', $s->id) }}"
           style="padding:6px 10px; background:#3b82f6; color:white; border-radius:6px; text-decoration:none;">
            Input
        </a>
    @endif
</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="empty">
                Tidak ada siswa di kelas ini
            </td>
        </tr>
        @endforelse
    </table>
</div>
    
    <!-- kembali -->
    <a href="{{ route('guru.dashboard') }}" class="btn-back">← Kembali</a>

</div>

</body>
</html>