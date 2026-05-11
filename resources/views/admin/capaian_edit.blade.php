<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Capaian Pembelajaran</title>

<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 40px 35px;
            border-radius: 20px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 20px 35px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            color: #1e293b;
        }

        .subtitle {
            text-align: center;
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 25px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 6px;
            color: #334155;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1.5px solid #e2e8f0;
            font-size: 0.9rem;
            outline: none;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102,126,234,0.1);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #2563eb;
            transform: translateY(-2px);
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .error {
            font-size: 0.75rem;
            color: red;
            margin-top: 4px;
        }

        .back-link {
            margin-top: 20px;
            text-align: center;
        }

        .back-link a {
            text-decoration: none;
            font-size: 0.85rem;
            color: #64748b;
        }

        .back-link a:hover {
            color: #3b82f6;
        }

        .button-group 
        {
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
            display: inline-block;
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

<div class="card">
    <h2>Edit Capaian</h2>
    <div class="subtitle">Perbarui capaian pembelajaran</div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert-error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('capaian.update', $capaian->id) }}">
        @csrf

        <div class="form-group">
            <label>Mapel</label>
            <select name="id_mapel">
                @foreach($mapel as $m)
                    <option value="{{ $m->id }}"
                        {{ old('id_mapel', $capaian->id_mapel) == $m->id ? 'selected' : '' }}>
                        {{ $m->nama_mapel }}
                    </option>
                @endforeach
            </select>
            @error('id_mapel')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Tingkat</label>
            <input type="number" name="tingkat"
                value="{{ old('tingkat', $capaian->tingkat) }}">
            @error('tingkat')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ old('deskripsi', $capaian->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="button-group">
            <a href="{{ route('admin.capaian') }}" class="btn btn-back">Kembali</a>
            <button type="submit" class="btn btn-simpan">Update Capaian</button>
        </div>
    </form>
</div>

</body>
</html>