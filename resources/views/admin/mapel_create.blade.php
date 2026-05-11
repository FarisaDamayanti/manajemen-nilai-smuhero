<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Tambah Mata Pelajaran</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --error: #ef4444;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
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
        }

        .container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 40px;
            border-radius: 24px;
            box-shadow: var(--shadow-md);
            border: 1px solid #f1f5f9;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
            color: #0f172a;
        }

        p.subtitle {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 32px;
        }

        /* Form Styling */
        label {
            font-weight: 700;
            display: block;
            margin-bottom: 10px;
            font-size: 0.85rem;
            color: var(--text-main);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input {
            width: 100%;
            padding: 14px 16px;
            border-radius: 14px;
            border: 2px solid #e2e8f0;
            font-family: inherit;
            font-size: 1rem;
            color: var(--text-main);
            transition: all 0.3s ease;
            margin-bottom: 4px;
        }

        input::placeholder {
            color: #cbd5e1;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        /* Error Messages */
        .error-container {
            background: rgba(239, 68, 68, 0.05);
            border-left: 4px solid var(--error);
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 24px;
        }

        .error-container ul {
            list-style: none;
        }

        .error-container li {
            color: var(--error);
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 32px;
        }

        .btn {
            padding: 14px 20px;
            border-radius: 14px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            flex: 1;
        }

        .btn-simpan {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.2);
        }

        .btn-simpan:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.3);
        }

        .btn-back {
            background: #f1f5f9;
            color: var(--text-muted);
        }

        .btn-back:hover {
            background: #e2e8f0;
            color: var(--text-main);
        }

        /* Small decoration */
        .header-accent {
            width: 40px;
            height: 6px;
            background: var(--primary);
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">
    <div class="card">
        <div class="header-accent"></div>
        <h2>Tambah Mapel</h2>
        <p class="subtitle">Tambahkan mata pelajaran baru ke dalam sistem EduPoint.</p>

        @if ($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mapel.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nama_mapel">Nama Mata Pelajaran</label>
                <input 
                    type="text" 
                    id="nama_mapel"
                    name="nama_mapel" 
                    placeholder="Misal: Fisika Terapan"
                    required
                    autocomplete="off"
                >
            </div>

            <div class="button-group">
                <a href="{{ route('admin.mapel') }}" class="btn btn-back">Batal</a>
                <button type="submit" class="btn btn-simpan">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>