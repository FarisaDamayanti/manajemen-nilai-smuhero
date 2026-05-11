<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Tambah Kelas</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-dark: #0f172a;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --shadow: 0 10px 15px -3px rgb(0 0 0 / 0.04), 0 4px 6px -4px rgb(0 0 0 / 0.04);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg-body);
            color: var(--text-main);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            max-width: 500px;
            width: 90%;
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: var(--shadow);
            border: 1px solid #eef2ff;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 24px;
            color: var(--primary-dark);
            letter-spacing: -0.5px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            font-size: 0.9rem;
            color: var(--text-main);
        }

        input {
            width: 100%;
            padding: 12px 16px;
            margin-bottom: 20px;
            border: 2px solid #f1f5f9;
            border-radius: 14px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f8fafc;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            background: white;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        /* Group Tombol */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        .btn {
            padding: 14px 20px;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            font-size: 0.9rem;
            font-weight: 700;
            transition: all 0.3s ease;
            flex: 1;
        }

        .btn-back {
            background: white;
            color: var(--text-muted);
            border: 2px solid #f1f5f9;
        }

        .btn-back:hover {
            background: #f1f5f9;
            color: var(--primary-dark);
        }

        .btn-simpan {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        .btn-simpan:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.3);
        }

        /* Error Style */
        .error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 16px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-size: 0.85rem;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
            font-weight: 600;
        }

        @media (max-width: 480px) {
            .container {
                padding: 24px;
            }
            .button-group {
                flex-direction: column-reverse;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Tambah Kelas Baru</h2>

    {{-- Alert Error Validation --}}
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" placeholder="Misal: XII RPL 1" value="{{ old('nama_kelas') }}" required>
        </div>

        <div class="form-group">
            <label>Tingkatan</label>
            <input type="text" name="tingkat" placeholder="Misal: 12" value="{{ old('tingkat') }}" required>
        </div>

        <div class="button-group">
            <a href="{{ route('admin.kelas') }}" class="btn btn-back">Batal</a>
            <button type="submit" class="btn btn-simpan">Simpan Data</button>
        </div>
    </form>

</div>

</body>
</html>