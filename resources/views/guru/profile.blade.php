<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Guru</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            transition: 0.3s;
        }

        input:focus, textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102,126,234,0.5);
        }

        textarea {
            resize: none;
            height: 80px;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #667eea;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            background: #5a67d8;
        }

        .error {
            background: #ffe5e5;
            color: #d8000c;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Lengkapi Profil Guru</h2>

    @if(session('error'))
        <div class="error">{{ session('error') }}</div>
    @endif

   <form method="POST" action="/guru/profile">
    @csrf

    <input type="text" name="nip" placeholder="NIP" value="{{ $guru->nip ?? '' }}">

    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="{{ auth()->user()->name ?? '' }}">

    <textarea name="alamat" placeholder="Alamat">{{ $guru->alamat ?? '' }}</textarea>

    <input type="text" name="no_hp" placeholder="No HP" value="{{ $guru->no_hp ?? '' }}">

    <!-- DROPDOWN MAPEL -->
    <select name="id_mapel" required>
        <option value="">-- Pilih Mata Pelajaran --</option>
        @foreach($mapels as $mapel)
            <option value="{{ $mapel->id }}"
                {{ isset($guru) && $guru->id_mapel == $mapel->id ? 'selected' : '' }}>
                {{ $mapel->nama_mapel }}
            </option>
        @endforeach
    </select>

    <button type="submit">Simpan</button>
</form>
</div>

</body>
</html>