<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Manajemen Sekolah</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            padding: 40px 35px;
            border-radius: 20px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.25);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e293b;
        }

        .subtitle {
            text-align: center;
            color: #64748b;
            font-size: 0.85rem;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9rem;
            transition: all 0.2s;
            outline: none;
            font-family: inherit;
        }

        input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        input::placeholder {
            color: #94a3b8;
        }

        .error {
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 5px;
            text-align: left;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.2s;
            margin-top: 10px;
        }

        button:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(59, 130, 246, 0.3);
        }

        .link {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            font-size: 0.85rem;
            color: #64748b;
        }

        .link a {
            text-decoration: none;
            color: #3b82f6;
            font-weight: 600;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Daftar Akun</h2>
        <div class="subtitle">
            Buat akun untuk mengakses sistem
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <input type="text" name="name" placeholder="Nama lengkap" value="{{ old('name') }}">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="email" name="email" placeholder="Alamat email" value="{{ old('email') }}">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password" placeholder="Kata sandi">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Konfirmasi kata sandi">
            </div>

            <button type="submit">Daftar</button>
        </form>

        <div class="link">
            Sudah punya akun? 
            <a href="{{ route('login') }}">Login disini</a>
        </div>
    </div>
</div>

</body>
</html>