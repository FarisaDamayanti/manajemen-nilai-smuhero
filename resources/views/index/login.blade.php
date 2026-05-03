<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Manajemen Sekolah</title>

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

        .card {
            background: white;
            padding: 40px 35px;
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
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
            margin-bottom: 20px;
        }

        label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #334155;
            display: block;
            margin-bottom: 6px;
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

        .remember-group {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: normal;
            font-size: 0.85rem;
            color: #475569;
            cursor: pointer;
        }

        .checkbox-label input {
            width: auto;
            margin: 0;
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.85rem;
            color: #667eea;
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.2s;
        }

        button:hover {
            background: #556cd6;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(102, 126, 234, 0.3);
        }

        .error {
            background: #fee2e2;
            color: #dc2626;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 10px;
            font-size: 0.85rem;
        }

        .register-link {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            font-size: 0.85rem;
            color: #64748b;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>Login</h2>
    <div class="subtitle">
        Masukkan kredensial Anda untuk mengakses sistem
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label>Alamat Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" required autofocus>
        </div>

        <div class="form-group">
            <label>Kata Sandi</label>
            <input type="password" name="password" placeholder="Masukkan kata sandi" required>
        </div>

        <button type="submit">Login</button>
    </form>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- <div class="register-link">
        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
    </div> -->
</div>

</body>
</html>