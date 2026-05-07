<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Capaian Pembelajaran</h2>

<a href="{{ route('admin.capaian.create') }}" class="btn btn-primary">+ Tambah CP</a>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Mapel</th>
        <th>Tingkat</th>
        <th>Deskripsi</th>
    </tr>

    @foreach($capaian as $i => $cp)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $cp->mapel->nama_mapel }}</td>
        <td>{{ $cp->tingkat }}</td>
        <td>{{ $cp->deskripsi }}</td>
    </tr>
    @endforeach
</table>
</body>
</html>