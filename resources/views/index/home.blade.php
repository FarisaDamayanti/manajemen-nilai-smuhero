<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Sekolah</title>

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
            max-width: 380px;
            text-align: center;
            box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.25);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        h1 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 12px;
            letter-spacing: -0.3px;
        }

        .subtitle {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 30px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 20px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: none;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            text-align: center;
        }

        .btn-register {
            background-color: #3b82f6;
            color: white;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(59, 130, 246, 0.3);
        }

        .btn-register:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(59, 130, 246, 0.4);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 25px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider span {
            padding: 0 12px;
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .btn-login {
            background-color: #f1f5f9;
            color: #1e293b;
            border: 1px solid #e2e8f0;
        }

        .btn-login:hover {
            background-color: #e2e8f0;
            transform: translateY(-2px);
        }

        .footer {
            margin-top: 25px;
            font-size: 0.7rem;
            color: #94a3b8;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h1>Manajemen Sekolah</h1>
        <div class="subtitle">
            Silakan daftar untuk mengakses sistem
        </div>

        <a href="{{ route('register') }}">
            <button class="btn btn-register">Daftar Akun Baru</button>
        </a>

        <div class="divider">
            <span>atau</span>
        </div>

        <a href="{{ route('login') }}">
            <button class="btn btn-login">Login</button>
        </a>

        <div class="footer">
            Sistem Informasi Manajemen Sekolah
        </div>
    </div>
</div>

</body>
</html>