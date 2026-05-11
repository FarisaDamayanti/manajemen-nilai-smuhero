<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Tambah Guru</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --error: #ef4444;
            --shadow-md: 0 10px 15px -3px rgba(0,0,0,0.04), 0 4px 6px -2px rgba(0,0,0,0.02);
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
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            width: 100%;
            max-width: 650px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid #f1f5f9;
        }

        .header-accent {
            width: 45px;
            height: 6px;
            background: var(--primary);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.75rem;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
            color: #0f172a;
        }

        p.subtitle {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 35px;
        }

        /* Form Controls */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .full-width {
            grid-column: span 2;
        }

        label {
            font-weight: 700;
            display: block;
            margin-bottom: 10px;
            font-size: 0.85rem;
            color: var(--text-main);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input, select {
            width: 100%;
            padding: 14px 16px;
            border-radius: 14px;
            border: 2px solid #e2e8f0;
            font-family: inherit;
            font-size: 1rem;
            color: var(--text-main);
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        /* Validation Error */
        .error-box {
            background: rgba(239, 68, 68, 0.05);
            border-left: 4px solid var(--error);
            padding: 16px;
            border-radius: 14px;
            margin-bottom: 30px;
        }

        .error-box ul {
            list-style: none;
        }

        .error-box li {
            color: var(--error);
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn {
            padding: 16px 24px;
            border-radius: 16px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            flex: 1;
        }

        .btn-simpan {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
        }

        .btn-simpan:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.35);
        }

        .btn-back {
            background: #f1f5f9;
            color: var(--text-muted);
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: var(--text-main);
        }

        @media (max-width: 600px) {
            .form-grid { grid-template-columns: 1fr; }
            .full-width { grid-column: span 1; }
            .card { padding: 30px 20px; }
        }
    </style>
</head>

<body>

<div class="container">
    <div class="card">
        <div class="header-accent"></div>
        <h2>Tambah Tenaga Pengajar</h2>
        <p class="subtitle">Daftarkan guru baru untuk mengelola kelas dan materi pelajaran.</p>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('guru.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="form-group full-width">
                    <label for="nama_guru">Nama Lengkap</label>
                    <input type="text" id="nama_guru" name="nama_guru" placeholder="Masukkan nama lengkap dengan gelar" value="{{ old('nama_guru') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" placeholder="contoh@edupoint.com" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="nip">NIP / ID Guru</label>
                    <input type="text" id="nip" name="nip" placeholder="Masukkan nomor induk" value="{{ old('nip') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" placeholder="Min. 8 karakter" required>
                </div>

                <div class="form-group">
                    <label for="id_mapel">Mata Pelajaran</label>
                    <select id="id_mapel" name="id_mapel" required>
                        <option value="">Pilih Mapel</option>
                        @foreach($mapel as $m)
                            <option value="{{ $m->id }}" {{ old('id_mapel') == $m->id ? 'selected' : '' }}>
                                {{ $m->nama_mapel }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="button-group">
                <a href="{{ route('admin.guru') }}" class="btn btn-back">Batal</a>
                <button type="submit" class="btn btn-simpan">Simpan Data Guru</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>