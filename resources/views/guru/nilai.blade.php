<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai - Manajemen Sekolah</title>

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

        /* Container */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 24px;
        }

        /* Card */
        .card {
            background: white;
            border-radius: 20px;
            padding: 32px 36px;
            box-shadow: 0 8px 20px -6px rgba(0, 0, 0, 0.08), 0 2px 4px -2px rgba(0, 0, 0, 0.02);
            border: 1px solid #eef2ff;
        }

        h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 8px;
            border-left: 4px solid #3b82f6;
            padding-left: 16px;
        }

        .subtitle {
            color: #64748b;
            font-size: 0.85rem;
            margin-bottom: 28px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        /* Info Guru */
        .info-guru {
            background: #f8fafc;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-label {
            font-size: 0.8rem;
            color: #64748b;
        }

        .info-value {
            font-weight: 600;
            color: #1e293b;
            background: white;
            padding: 4px 12px;
            border-radius: 40px;
            font-size: 0.85rem;
        }

        .mapel-badge {
            background: #fef3c7;
            color: #d97706;
        }

        /* Form */
        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        select, input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9rem;
            transition: all 0.2s;
            outline: none;
            font-family: inherit;
            background: white;
        }

        select:focus, input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        /* Button */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
            font-size: 0.9rem;
            border: none;
            cursor: pointer;
            flex: 1;
        }

        .btn-primary:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(59, 130, 246, 0.3);
        }

        .btn-secondary {
            background: #f1f5f9;
            color: #475569;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
            font-size: 0.9rem;
            border: 1px solid #e2e8f0;
            cursor: pointer;
            text-align: center;
            flex: 1;
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        /* Alert */
        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 24px;
            border-left: 4px solid #22c55e;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 24px;
            border-left: 4px solid #ef4444;
        }

        .error-text {
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 5px;
        }

        /* Responsif */
        @media (max-width: 640px) {
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
                margin: 24px auto;
            }
            .card {
                padding: 24px 20px;
            }
            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<!-- <div class="navbar">
    <div class="nav-left">
        <div class="logo">
            <div class="logo-icon">G</div>
            <span class="logo-text">Guru</span>
        </div>

        <div class="nav-links">
            <a href="{{ route('guru.dashboard') }}">Dashboard</a>
            <a href="{{ route('guru.nilai') }}" class="active">Input Nilai</a>
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

<div class="container">    

    <div class="card">
        <h2>Input Nilai Siswa</h2>
        <div class="subtitle">
            Masukkan nilai untuk mata pelajaran yang Anda ajar
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Info Guru -->
        <div class="info-guru">
            <div class="info-item">
                <span class="info-label">Guru:</span>
                <span class="info-value">{{ auth()->user()->name }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">Mata Pelajaran:</span>
                <span class="info-value mapel-badge">
                    {{ auth()->user()->guru->mapel->nama_mapel ?? '-' }}
                </span>
            </div>
        </div>

        <form method="POST" action="{{ route('guru.nilai') }}">
            @csrf
            
             <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">

            <div>
                <label>Nama Siswa</label>
                <input type="text" value="{{ $siswa->nama_siswa }}" readonly>
            </div>

            <div class="form-group">
                <label>Nilai (0 - 100)</label>
                <input type="number" name="nilai" min="0" max="100" step="0.01" value="{{ old('nilai') }}" required placeholder="Masukkan nilai siswa">
                @error('nilai')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="button-group">
                <button type="submit" class="btn-primary">Simpan Nilai</button>
                <a href="{{ route('guru.dashboard') }}" class="btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>