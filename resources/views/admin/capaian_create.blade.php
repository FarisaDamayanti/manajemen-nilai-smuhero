<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Tambah Capaian Pembelajaran</h2>

<form action="{{ route('admin.capaian.store') }}" method="POST">
    @csrf

    <label>Mapel</label>
    <select name="id_mapel" required>
        @foreach($mapel as $m)
            <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
        @endforeach
    </select>
    <br><br>

    <label>Tingkat Kelas</label>
    <input type="number" name="tingkat" required>
    <br><br>

    <label>Deskripsi</label>
    <textarea name="deskripsi" required></textarea>
    <br><br>

    <button type="submit">Simpan</button>
</form>
</body>
</html>