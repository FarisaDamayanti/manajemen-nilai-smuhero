<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Tambah Capaian Pembelajaran</title>
    
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
            max-width: 600px;
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

        .form-group {
            margin-bottom: 24px;
        }

        label {
            font-weight: 700;
            display: block;
            margin-bottom: 10px;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 14px 16px;
            border-radius: 14px;
            border: 2px solid #e2e8f0;
            font-family: inherit;
            font-size: 1rem;
            color: var(--text-main);
            transition: all 0.3s ease;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
            line-height: 1.5;
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
            margin-top: 10px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
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
            .card { padding: 30px 20px; }
            .button-group { flex-direction: column-reverse; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="header-accent"></div>
        <h2>Tambah Capaian</h2>
        <p class="subtitle">Tentukan standar kompetensi untuk mata pelajaran dan tingkat kelas tertentu.</p>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if(session('success'))
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Capaian pembelajaran telah disimpan.',
                    icon: 'success',
                    confirmButtonColor: '#4f46e5'
                });
            </script>
        @endif

        <form action="{{ route('admin.capaian.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="id_mapel">Mata Pelajaran</label>
                <select id="id_mapel" name="id_mapel" required>
                    <option value="">-- Pilih Mapel --</option>
                    @foreach($mapel as $m)
                        <option value="{{ $m->id }}" {{ old('id_mapel') == $m->id ? 'selected' : '' }}>
                            {{ $m->nama_mapel }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tingkat">Tingkat Kelas</label>
                <input type="number" id="tingkat" name="tingkat" placeholder="Contoh: 10" value="{{ old('tingkat') }}" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Capaian</label>
                <textarea id="deskripsi" name="deskripsi" placeholder="Tuliskan detail capaian pembelajaran di sini..." required>{{ old('deskripsi') }}</textarea>
            </div>

            <div class="button-group">
                <a href="{{ route('admin.capaian') }}" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-simpan">
                    <i class="fas fa-save"></i> Simpan Capaian
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>