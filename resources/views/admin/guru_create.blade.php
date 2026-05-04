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
            box-sizing: border-box;
        }

        /* Button group - dua tombol sejajar */
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
            display: inline-block;
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

        .error {
            color: #dc2626;
            font-size: 0.85rem;
            margin-bottom: 10px;
            background: #fef2f2;
            padding: 10px;
            border-radius: 8px;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

<div class="container">

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
        <input type="text" name="nama_guru" placeholder="Masukkan nama guru" value="{{ old('nama_guru') }}" required>
        
        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan email guru" value="{{ old('email') }}" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>
    
        <label>NIP</label>
        <input type="text" name="nip" placeholder="Masukkan NIP" value="{{ old('nip') }}" required>

        <label>Mata Pelajaran</label>
        <select name="id_mapel" required>
            <option value="">-- Pilih Mapel --</option>
            @foreach($mapel as $m)
                <option value="{{ $m->id }}" {{ old('id_mapel') == $m->id ? 'selected' : '' }}>{{ $m->nama_mapel }}</option>
            @endforeach
        </select>

        <!-- Button group: Kembali di kiri, Simpan di kanan -->
        <div class="button-group">
            <a href="{{ route('admin.guru') }}" class="btn btn-back">Kembali</a>
            <button type="submit" class="btn btn-simpan">Simpan Guru</button>
        </div>
    </form>

</div>

</body>
</html>