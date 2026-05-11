<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Edit Data Siswa</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --error: #ef4444;
            --success: #22c55e;
            --shadow-lg: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .container {
            width: 100%;
            max-width: 500px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: var(--shadow-lg);
            border: 1px solid #f1f5f9;
        }

        .header-accent {
            width: 45px;
            height: 6px;
            background: #f59e0b; /* Warna amber untuk identitas mode Edit */
            border-radius: 10px;
            margin: 0 auto 20px;
        }

        h2 {
            text-align: center;
            font-size: 1.6rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            text-align: center;
            font-size: 0.9rem;
            color: var(--text-muted);
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #f1f5f9;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-main);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--text-main);
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        /* Readonly / Info Style for Class */
        .class-info {
            background: #f1f5f9;
            padding: 12px 16px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #475569;
            font-weight: 600;
            border: 2px solid transparent;
        }

        /* Alerts */
        .alert {
            padding: 14px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-success { background: #f0fdf4; color: var(--success); border: 1px solid #dcfce7; }
        .alert-error { background: #fef2f2; color: var(--error); border: 1px solid #fee2e2; }

        .error-msg {
            font-size: 0.75rem;
            color: var(--error);
            font-weight: 600;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Button Styling */
        .btn-update {
            width: 100%;
            padding: 16px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
            margin-top: 10px;
        }

        .btn-update:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.3);
        }

        .back-link-container {
            margin-top: 25px;
            text-align: center;
            border-top: 1px solid #f1f5f9;
            padding-top: 20px;
        }

        .back-link {
            text-decoration: none;
            color: var(--text-muted);
            font-size: 0.9rem;
            font-weight: 600;
            transition: color 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .back-link:hover {
            color: var(--primary);
        }

        @media (max-width: 480px) {
            .card { padding: 30px 20px; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="header-accent"></div>
        <h2>Edit Siswa</h2>
        <p class="subtitle">Perbarui informasi profil siswa</p>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('siswa.update', $siswa->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_siswa">Nama Lengkap</label>
                <input type="text" id="nama_siswa" name="nama_siswa"
                    value="{{ old('nama_siswa', $siswa->nama_siswa) }}" placeholder="Masukkan nama siswa" required>
                @error('nama_siswa')
                    <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nis">NIS / Nomor Induk</label>
                <input type="text" id="nis" name="nis"
                    value="{{ old('nis', $siswa->nis) }}" placeholder="Masukkan NIS" required>
                @error('nis')
                    <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Kelas Saat Ini</label>
                <input type="hidden" name="id_kelas" value="{{ $kelas->id }}">
                <div class="class-info">
                    <i class="fas fa-graduation-cap" style="color: var(--primary);"></i>
                    <span>{{ $kelas->nama_kelas }}</span>
                </div>
                @error('id_kelas')
                    <div class="error-msg"><i class="fas fa-info-circle"></i> {{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-update">
                <i class="fas fa-user-check"></i> Perbarui Data Siswa
            </button>
        </form>

        <div class="back-link-container">
            <a href="{{ route('admin.kelas.detail', $kelas->id)}}" class="back-link">
                <i class="fas fa-arrow-left"></i> Kembali ke Detail Kelas
            </a>
        </div>
    </div>
</div>

</body>
</html>