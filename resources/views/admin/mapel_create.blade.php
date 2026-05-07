<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mapel - Manajemen Sekolah</title>

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

        /* Container */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            border-left: 4px solid #3b82f6;
            padding-left: 10px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            margin-bottom: 16px;
        }

        .btn {
            background: #3b82f6;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background: #2563eb;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .back {
            display: inline-block;
            margin-bottom: 15px;
            color: #3b82f6;
            text-decoration: none;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s;
            flex: 1;
        }

        .btn-back {
            background: #64748b;
            color: white;
        }

        .btn-back:hover {
            background: #475569;
        }

        .btn-simpan {
            background: #3b82f6;
            color: white;
        }

        .btn-simpan:hover {
            background: #2563eb;
        }
    </style>
</head>

<body>

<!-- CONTENT -->
<div class="container">
    <div class="card">

        <h2>Tambah Mata Pelajaran</h2>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mapel.store') }}" method="POST">
            @csrf

            <label>Nama Mapel</label>
            <input type="text" name="nama_mapel" placeholder="Contoh: Matematika">

            <div class="button-group">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-back">Kembali</a>
                <button type="submit" class="btn btn-simpan">Simpan</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>