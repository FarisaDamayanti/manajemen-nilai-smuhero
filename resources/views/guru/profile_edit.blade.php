<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Edit Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #64748b;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
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
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .edit-card {
            background: white;
            width: 100%;
            max-width: 500px;
            border-radius: 28px;
            padding: 35px;
            box-shadow: var(--shadow-md);
            border: 1px solid #eef2ff;
        }

        .header {
            margin-bottom: 30px;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.5px;
        }

        p.subtitle {
            color: var(--secondary);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        /* Grouping Form */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: #475569;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            font-family: inherit;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        /* File Upload Styling */
        .file-upload {
            position: relative;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input[type="file"] {
            font-size: 0.9rem;
            color: var(--secondary);
            background: #f8fafc;
            padding: 10px;
            border-radius: 12px;
            border: 2px dashed #cbd5e1;
            cursor: pointer;
        }

        input[type="file"]::-webkit-file-upload-button {
            background: var(--primary);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 600;
            margin-right: 12px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="file"]::-webkit-file-upload-button:hover {
            background: var(--primary-hover);
        }

        /* Preview Image */
        .current-photo {
            width: 80px;
            height: 80px;
            border-radius: 15px;
            object-fit: cover;
            margin-bottom: 10px;
            border: 3px solid #f1f5f9;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 35px;
        }

        .btn {
            flex: 1;
            padding: 14px;
            border-radius: 14px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            font-family: inherit;
            border: none;
        }

        .btn-save {
            background: linear-gradient(135deg, var(--primary) 0%, #8b5cf6 100%);
            color: white;
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
        }
    </style>
</head>
<body>

<div class="edit-card">
    <div class="header">
        <h2>Perbarui Profil</h2>
        <p class="subtitle">Sesuaikan identitas Anda sebagai pengajar.</p>
    </div>

    <form method="POST" action="{{ route('guru.profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nip">Nomor Induk Pegawai (NIP)</label>
            <input type="text" id="nip" name="nip" value="{{ $guru->nip }}" placeholder="Masukkan NIP resmi Anda">
        </div>

        <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" 
            value="{{ $guru->alamat }}" 
            placeholder="Masukkan alamat lengkap">
        </div>

        <div class="form-group">
            <label for="no_hp">Nomor HP</label>
            <input type="text" id="no_hp" name="no_hp" 
                value="{{ $guru->no_hp }}" 
                placeholder="Contoh: 08123456789">
        </div>

        <div class="form-group">
            <label>Foto Profil</label>
            <div class="file-upload">
                @if($guru->foto)
                    <img src="{{ asset('storage/'.$guru->foto) }}" class="current-photo" alt="Foto Saat Ini">
                @endif
                <input type="file" name="foto" accept="image/*">
                <p style="font-size: 0.75rem; color: #94a3b8;">Format: JPG, PNG. Maksimal 2MB.</p>
            </div>
        </div>

        <div class="button-group">
            <a href="{{ route('guru.profile') }}" class="btn btn-cancel">Batal</a>
            <button type="submit" class="btn btn-save">Simpan Perubahan</button>
        </div>
    </form>
</div>

</body>
</html>