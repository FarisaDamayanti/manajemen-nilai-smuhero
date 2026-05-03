<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa - Manajemen Sekolah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            padding: 40px 35px;
            border-radius: 20px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.25);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e293b;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            font-size: 0.85rem;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #334155;
            display: block;
            margin-bottom: 6px;
        }

        input, select {
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

        input:focus, select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.2s;
            margin-top: 10px;
        }

        button:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(59, 130, 246, 0.3);
        }

        .back-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }

        .back-link a {
            text-decoration: none;
            color: #64748b;
            font-size: 0.85rem;
            transition: 0.2s;
        }

        .back-link a:hover {
            color: #3b82f6;
        }

        .error {
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 5px;
            text-align: left;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #22c55e;
            font-size: 0.85rem;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #ef4444;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Tambah Siswa</h2>
        <div class="subtitle">
            Masukkan data siswa baru
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

        <form method="POST" action="{{ route('siswa.store') }}">
            @csrf

            <div class="form-group">
                <label>Nama Siswa</label>
                <input type="text" name="nama_siswa" placeholder="Masukkan nama lengkap siswa" value="{{ old('nama_siswa') }}" required>
                @error('nama_siswa')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>NIS (Nomor Induk Siswa)</label>
                <input type="text" name="nis" placeholder="Masukkan NIS" value="{{ old('nis') }}" required>
                @error('nis')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Kelas</label>
                <select name="id_kelas" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach($kelas as $k)
                        <option value="{{ $k->id }}" {{ old('id_kelas') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
                @error('id_kelas')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Simpan Siswa</button>
        </form>

        <div class="back-link">
            <a href="{{ route('admin.dashboard') }}">← Kembali ke Dashboard</a>
        </div>
    </div>
</div>

</body>
</html>