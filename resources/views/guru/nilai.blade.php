<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Input Nilai</title>
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
            max-width: 700px;
            margin: 60px auto;
            padding: 0 24px;
        }

        /* Card Styling */
        .card {
            background: white;
            border-radius: 24px;
            padding: 40px;
            box-shadow: var(--shadow-md);
            border: 1px solid #eef2ff;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--primary), #8b5cf6);
        }

        h2 {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: var(--secondary);
            font-size: 0.95rem;
            margin-bottom: 32px;
        }

        /* Guru & Mapel Info */
        .instructor-box {
            display: flex;
            gap: 12px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .badge-info {
            background: #f1f5f9;
            padding: 8px 16px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #475569;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .badge-info strong {
            color: var(--primary);
        }

        .badge-mapel {
            background: #e0e7ff;
            color: var(--primary);
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 24px;
        }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: #334155;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 14px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
            color: var(--text-main);
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        input[readonly] {
            background-color: #f8fafc;
            border-color: #f1f5f9;
            color: #94a3b8;
            cursor: not-allowed;
            font-weight: 600;
        }

        input::placeholder {
            color: #cbd5e1;
        }

        /* Alerts */
        .alert {
            padding: 16px;
            border-radius: 14px;
            margin-bottom: 24px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }

        .error-msg {
            color: var(--danger);
            font-size: 0.8rem;
            font-weight: 600;
            margin-top: 6px;
        }

        /* Buttons */
        .action-area {
            display: flex;
            gap: 16px;
            margin-top: 40px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border-radius: 14px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            font-family: inherit;
        }

        .btn-save {
            background: linear-gradient(135deg, var(--primary) 0%, #8b5cf6 100%);
            color: white;
            border: none;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.3);
            filter: brightness(1.1);
        }

        .btn-cancel {
            background: white;
            color: var(--secondary);
            border: 2px solid #e2e8f0;
        }

        .btn-cancel:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: var(--text-main);
        }

        @media (max-width: 640px) {
            .card { padding: 30px 20px; }
            .action-area { flex-direction: column-reverse; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Input Nilai Siswa</h2>
        <p class="subtitle">Silakan masukkan nilai kompetensi untuk siswa berikut.</p>

        @if(session('success'))
            <div class="alert alert-success">
                ✅ {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                ⚠️ {{ session('error') }}
            </div>
        @endif

        <div class="instructor-box">
            <div class="badge-info">
                <span>Guru:</span> <strong>{{ auth()->user()->name }}</strong>
            </div>
            <div class="badge-info badge-mapel">
                <span>Mapel:</span> <strong>{{ auth()->user()->guru->mapel->nama_mapel ?? '-' }}</strong>
            </div>
        </div>

        <form method="POST" action="{{ route('guru.nilai') }}">
            @csrf
            
            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">

            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" value="{{ $siswa->nama_siswa }}" readonly>
            </div>

            <div class="form-group">
                <label for="nilai">Nilai Akhir (0 - 100)</label>
                <input type="number" 
                       id="nilai"
                       name="nilai" 
                       min="0" 
                       max="100" 
                       step="0.01" 
                       value="{{ old('nilai') }}" 
                       required 
                       placeholder="Contoh: 85.5">
                @error('nilai')
                    <div class="error-msg">{{ $message }}</div>
                @enderror
            </div>

            <div class="action-area">
                <a href="{{ route('guru.kelas.lihat', $siswa->id_kelas) }}" class="btn btn-cancel">Batal</a>
                <button type="submit" class="btn btn-save">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>