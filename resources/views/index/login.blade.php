<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - EduPoint Manajemen Sekolah</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
/* --- STYLE DASAR TETAP DIPERTAHANKAN --- */
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: 'Inter', sans-serif; min-height: 100vh; display: flex; background-color: #ffffff; }
.container { display: flex; width: 100%; }

/* SISI KIRI */
.left { flex: 1; display: flex; justify-content: center; align-items: center; padding: 60px; }
.form-wrapper { width: 100%; max-width: 400px; }

.brand { display: flex; align-items: center; gap: 10px; margin-bottom: 30px; }
.brand-logo { width: 40px; height: 40px; background: #6d8bb7; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: #F2E199; font-size: 1.2rem; }
.brand-name { font-weight: 700; font-size: 1.2rem; color: #191939; }

.welcome-text h2 { font-size: 2.2rem; font-weight: 700; color: #191939; margin-bottom: 8px; }
.welcome-text p { color: #64748b; font-size: 0.95rem; margin-bottom: 35px; line-height: 1.5; }

.form-group { margin-bottom: 18px; position: relative; }

input {
width: 100%;
padding: 14px 22px;
border-radius: 50px;
border: 1.5px solid #e2e8f0;
font-size: 0.95rem;
transition: all 0.3s ease;
}

input:focus {
outline: none;
border-color: #6FB8E6;
box-shadow: 0 0 0 4px rgba(111, 184, 230, 0.1);
}

.is-invalid {
border-color: #dc2626 !important;
background-color: #fff1f2;
box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.1) !important;
}

.error-message {
color: #dc2626;
font-size: 0.75rem;
margin-top: 5px;
margin-left: 20px;
font-weight: 500;
display: none;
}

.error-message.show { display: block; }

.forgot-password { display: block; text-align: right; font-size: 0.85rem; color: #1B3A68; text-decoration: none; margin: -8px 15px 25px 0; font-weight: 500; }
.btn-login { width: 100%; padding: 14px; background: #36367a; color: white; border: none; border-radius: 50px; font-weight: 600; font-size: 1rem; cursor: pointer; transition: 0.3s; }
.btn-login:hover { background: #1e0b37; transform: translateY(-2px); }

/* DIVIDER & SOCIAL LOGIN */
.divider { display: flex; align-items: center; text-align: center; margin: 25px 0; color: #cbd5e1; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; }
.divider::before, .divider::after { content: ''; flex: 1; border-bottom: 1px solid #f1f5f9; }
.divider:not(:empty)::before { margin-right: 1em; }
.divider:not(:empty)::after { margin-left: 1em; }
.social-login { display: flex; justify-content: center; gap: 15px; margin-bottom: 30px; }
.social-item { width: 50px; height: 50px; border-radius: 50%; border: 1px solid #f1f5f9; display: flex; justify-content: center; align-items: center; cursor: pointer; transition: 0.2s; }
.register-link { text-align: center; font-size: 0.9rem; color: #64748b; }
.register-link a { color: #1B3A68; text-decoration: none; font-weight: 600; }

/* SISI KANAN - DIPERBARUI UNTUK GAMBAR PNG */
.right {
flex: 1.2;
margin: 0;
display: flex;
flex-direction: column;
justify-content: center;
align-items: center;
padding: 0;
overflow: hidden; /* Tambahkan ini agar elemen tidak keluar */
}

.illustration-box {
width: 100%;
max-width: 450px; /* Diperlebar sedikit agar kartu tugas terlihat jelas */
text-align: center;
}

/* --- TAMBAHAN STYLE UNTUK GAMBAR BARU --- */
.new-illustration {
width: 100%; /* Gambar akan memenuhi kotak */
height: auto; /* Mempertahankan rasio aspek */
margin-bottom: 20px; /* Jarak ke titik-titik di bawah */
}
/* --- AKHIR TAMBAHAN STYLE GAMBAR --- */


@media (max-width: 992px) { .right { display: none; } }
</style>
</head>
<body>

<div class="container">

    <!-- GAMBAR (kiri) -->
    <div class="left">
        <img src="{{ asset('images/ilustrasi-login.jpeg') }}" 
             alt="Ilustrasi EduPoint" 
             class="new-illustration">
    </div>

    <!-- LOGIN (kanan) -->
    <div class="right">
        <div class="form-wrapper">

            <div class="brand">
                <div class="brand-logo">🎓</div>
                <div class="brand-name">EduPoint</div>
            </div>

            <div class="welcome-text">
                <h2>Welcome Back!</h2>
                <p>Kelola data siswa dan  rekap nilai dalam <br> satu dashboard yang efisien.</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input type="email" name="email"
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        placeholder="Masukkan Email"
                        value="{{ old('email') }}" required>

                    @if($errors->has('email'))
                        <span class="error-message show">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" name="password"
                        class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                        placeholder="Masukkan Kata Sandi" required>

                    @if($errors->has('password'))
                        <span class="error-message show">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <a href="#" class="forgot-password">Lupa Password?</a>

                <button type="submit" class="btn-login">Login</button>
            </form>

            <div class="divider">Atau masuk dengan</div>

            <div class="social-login">
                <div class="social-item">
                    <img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png" width="20">
                </div>
                <div class="social-item">🔑</div>
            </div>

            <div class="register-link">
                Belum punya akun? <a href="#">Hubungi Admin IT</a>
            </div>

        </div>
    </div>

</div>

</body>
</html>