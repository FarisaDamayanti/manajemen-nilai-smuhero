<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h2 {
            margin-bottom: 20px;
            border-left: 4px solid #3b82f6;
            padding-left: 10px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #334155;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
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
            font-size: 0.85rem;
            margin-bottom: 10px;
        }

        .back {
            display: inline-block;
            margin-bottom: 15px;
            text-decoration: none;
            color: #3b82f6;
        }
    </style>
</head>
<body>

<div class="container">

    <a href="{{ route('admin.guru') }}" class="back">← Kembali</a>

    <h2>Tambah Guru</h2>

    {{-- error validation --}}
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        
        <label>Nama Guru</label>
        <input type="text" name="nama_guru" placeholder="Masukkan nama guru" required>
        
        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan email guru" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>
    
        <label>NIP</label>
        <input type="text" name="nip" placeholder="Masukkan NIP" required>

        <label>Mata Pelajaran</label>
        <select name="id_mapel" required>
            <option value="">-- Pilih Mapel --</option>
            @foreach($mapel as $m)
                <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn">Simpan Guru</button>
    </form>

</div>

</body>
</html>