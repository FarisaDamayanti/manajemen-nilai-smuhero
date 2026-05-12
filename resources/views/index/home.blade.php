<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Transformasi Manajemen Sekolah Modern</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --secondary: #8b5cf6;
            --accent: #f59e0b;
            --bg-light: #f8fafc;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --glass: rgba(255, 255, 255, 0.7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Dekorasi Latar Belakang */
        .blob {
            position: absolute;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            filter: blur(80px);
            border-radius: 50%;
            z-index: -1;
        }

        /* NAVBAR */
        nav {
            padding: 25px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: rgba(248, 250, 252, 0.8);
            backdrop-filter: blur(15px);
            z-index: 1000;
            transition: all 0.3s;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .brand-logo {
            font-size: 24px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            color: white;
            box-shadow: 0 8px 15px rgba(79, 70, 229, 0.3);
        }

        .brand-name {
            font-weight: 800;
            font-size: 1.4rem;
            color: var(--text-dark);
            letter-spacing: -0.5px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            margin-left: 30px;
            font-size: 0.95rem;
            transition: 0.3s;
        }

        .nav-links a:hover { color: var(--primary); }

        .btn-nav-login {
            background: var(--text-dark);
            color: white !important;
            padding: 12px 28px;
            border-radius: 14px;
            transition: 0.3s;
        }

        .btn-nav-login:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(0,0,0,0.15); }

        /* HERO SECTION */
        .hero {
            padding: 80px 8% 120px;
            display: flex;
            align-items: center;
            gap: 50px;
            position: relative;
        }

        .hero-content { flex: 1; }

        .badge-hero {
            display: inline-block;
            padding: 8px 16px;
            background: rgba(79, 70, 229, 0.1);
            color: var(--primary);
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 3.8rem;
            line-height: 1.1;
            font-weight: 800;
            margin-bottom: 25px;
            letter-spacing: -2px;
            background: linear-gradient(to right, #0f172a, #4f46e5);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.15rem;
            color: var(--text-muted);
            margin-bottom: 40px;
            max-width: 520px;
        }

        .hero-btns { display: flex; gap: 20px; }

        .btn-cta {
            padding: 18px 35px;
            border-radius: 18px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-main {
            background: var(--primary);
            color: white;
            box-shadow: 0 15px 30px rgba(79, 70, 229, 0.3);
        }

        .btn-outline {
            border: 2px solid #e2e8f0;
            color: var(--text-dark);
            background: white;
        }

        .btn-cta:hover { transform: translateY(-5px); }

        .hero-image-wrapper {
            flex: 1;
            position: relative;
            display: flex;
            justify-content: flex-end;
        }

        .hero-img {
            width: 100%;
            max-width: 550px;
            border-radius: 30px;
            box-shadow: var(--shadow-md);
            z-index: 2;
        }

        /* Floating Card Decoration */
        .float-card {
            position: absolute;
            background: white;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            z-index: 3;
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* FEATURES SECTION */
        .features {
            padding: 100px 8%;
            background: #ffffff;
            border-radius: 60px 60px 0 0;
        }

        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 70px;
        }

        .section-header h2 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            letter-spacing: -1px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .feature-card {
            padding: 45px;
            border-radius: 30px;
            background: var(--bg-light);
            border: 1px solid #f1f5f9;
            transition: 0.4s;
        }

        .feature-card:hover {
            background: white;
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(0,0,0,0.05);
            border-color: var(--primary);
        }

        .icon-box {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 25px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.03);
        }

        .feature-card h3 { margin-bottom: 15px; font-weight: 700; }
        .feature-card p { color: var(--text-muted); font-size: 0.95rem; }

        /* FOOTER */
        footer {
            padding: 80px 8% 40px;
            background: #0f172a;
            color: white;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 100px;
            margin-bottom: 60px;
        }

        .footer-about p {
            color: #94a3b8;
            margin-top: 20px;
            max-width: 350px;
        }

        .footer-links h4 { margin-bottom: 25px; font-size: 1.1rem; }
        .footer-links ul { list-style: none; }
        .footer-links li { margin-bottom: 15px; }
        .footer-links a { color: #94a3b8; text-decoration: none; transition: 0.3s; }
        .footer-links a:hover { color: var(--primary); padding-left: 8px; }

        .copyright {
            padding-top: 40px;
            border-top: 1px solid #1e293b;
            text-align: center;
            color: #64748b;
            font-size: 0.9rem;
        }

        /* RESPONSIVE */
        @media (max-width: 1100px) {
            .hero { flex-direction: column; text-align: center; padding-top: 50px; }
            .hero h1 { font-size: 3rem; }
            .hero p { margin: 0 auto 40px; }
            .hero-btns { justify-content: center; }
            .hero-image-wrapper { justify-content: center; }
            .feature-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <div class="blob" style="top: -100px; left: -100px;"></div>
    <div class="blob" style="top: 40%; right: -200px; background: rgba(245, 158, 11, 0.05);"></div>

    <nav>
        <a href="#" class="brand">
            <div class="brand-logo"><i class="fas fa-graduation-cap"></i></div>
            <div class="brand-name">EduPoint</div>
        </a>
        <div class="nav-links">
            <a href="#fitur">Fitur</a>
            <a href="#tentang">Tentang</a>
            <a href="{{ route('login') }}" class="btn-nav-login">Masuk Sistem</a>
        </div>
    </nav>

    <header class="hero">
        <div class="hero-content" data-aos="fade-right">
            <span class="badge-hero">Sistem Informasi Sekolah</span>
            <h1>Kelola Sekolah <br> Jadi Lebih <span style="color: var(--primary);">Smart.</span></h1>
            <p>Platform all-in-one untuk manajemen data siswa, pemantauan nilai, hingga profil guru dalam satu ekosistem digital yang dinamis.</p>
            
            <div class="hero-btns">
                <a href="{{ route('login') }}" class="btn-cta btn-main">
                    Mulai Sekarang
                </a>
                <a href="https://www.instagram.com/reel/DX1h2Hfzdd9/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="btn-cta btn-outline">
                        🎬 Demo Video
                    </a>
            </div>
        </div>

        <div class="hero-image-wrapper" data-aos="fade-left">
            <div class="float-card" style="top: 20%; left: -30px;">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="background: #dcfce7; color: #166534; padding: 10px; border-radius: 12px;"><i class="fas fa-user-check"></i></div>
                    <div>
                        <div style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted);">SISWA BARU</div>
                        <div style="font-size: 0.9rem; font-weight: 800;">+120 Terdaftar</div>
                    </div>
                </div>
            </div>

            <div class="float-card" style="bottom: 15%; right: -20px; animation-delay: 1s;">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div style="background: #fef3c7; color: #92400e; padding: 10px; border-radius: 12px;"><i class="fas fa-star"></i></div>
                    <div>
                        <div style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted);">RATA-RATA NILAI</div>
                        <div style="font-size: 0.9rem; font-weight: 800;">A+ (92.5)</div>
                    </div>
                </div>
            </div>

            <img src="https://img.freepik.com/free-vector/learning-concept-illustration_114360-6186.jpg?t=st=1715442542~exp=1715446142~hmac=5099b2f67645163469036f0655546175b9f7a7501a403061596706059637171d&w=826" alt="EduPoint Dashboard" class="hero-img">
        </div>
    </header>

    <section class="features" id="fitur">
        <div class="section-header" data-aos="fade-up">
            <span style="color: var(--primary); font-weight: 800; font-size: 0.9rem;">WHY EDUPOINT?</span>
            <h2>Solusi Pengelolaan Terpadu</h2>
            <p>Kami merancang fitur yang fokus pada kemudahan akses data dan transparansi informasi akademik.</p>
        </div>

        <div class="feature-grid">
            <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box"><i class="fas fa-users"></i></div>
                <h3>Pusat Data Siswa</h3>
                <p>Arsip digital siswa yang lengkap mulai dari biodata, riwayat kelas, hingga catatan kedisiplinan yang terorganisir.</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box"><i class="fas fa-chart-pie"></i></div>
                <h3>Analisis Nilai</h3>
                <p>Visualisasi perkembangan nilai siswa per semester memudahkan guru dalam melakukan evaluasi belajar secara objektif.</p>
            </div>

            <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box"><i class="fas fa-id-card"></i></div>
                <h3>Profil Guru</h3>
                <p>Manajemen data pendidik dan tenaga kependidikan yang terintegrasi dengan jadwal mengajar dan kelas binaan.</p>
            </div>
        </div>
    </section>

    <section class="how-it-works" id="tentang" style="padding: 100px 8%; background: #f1f5f9;">
        <div class="section-header" data-aos="fade-up">
            <span style="color: var(--primary); font-weight: 800; font-size: 0.9rem;">PROSES MUDAH</span>
            <h2>Langkah Digitalisasi Sekolah</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; position: relative;">
            <div class="step-card" data-aos="zoom-in" data-aos-delay="100" style="text-align: center;">
                <div style="width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-weight: 800; font-size: 1.2rem; box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);">1</div>
                <h4 style="margin-bottom: 10px;">Registrasi Akun</h4>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Admin mendaftarkan user guru ke dalam sistem EduPoint.</p>
            </div>
            <div class="step-card" data-aos="zoom-in" data-aos-delay="200" style="text-align: center;">
                <div style="width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-weight: 800; font-size: 1.2rem; box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);">2</div>
                <h4 style="margin-bottom: 10px;">Input Data</h4>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Guru login Menggunakan akun yang diberikan admin.</p>
            </div>
            <div class="step-card" data-aos="zoom-in" data-aos-delay="300" style="text-align: center;">
                <div style="width: 60px; height: 60px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-weight: 800; font-size: 1.2rem; box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);">3</div>
                <h4 style="margin-bottom: 10px;">Kelola & Pantau</h4>
                <p style="font-size: 0.9rem; color: var(--text-muted);">Mulai kelola nilai dan pantau perkembangan siswa secara real-time.</p>
            </div>
        </div>
    </section>

    <section class="testimonials" style="padding: 100px 8%; background: white;">
        <div style="display: flex; align-items: center; gap: 60px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;" data-aos="fade-right">
                <h2 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 20px;">Apa Kata Mereka?</h2>
                <p style="color: var(--text-muted); margin-bottom: 30px;">EduPoint telah dipercaya oleh berbagai institusi pendidikan untuk mempercepat proses birokrasi dan administrasi sekolah.</p>
                <div style="display: flex; gap: 15px;">
                    <div style="padding: 20px; background: var(--bg-light); border-radius: 20px; flex: 1;">
                        <h3 style="color: var(--primary); font-size: 1.8rem; font-weight: 800;">50+</h3>
                        <p style="font-size: 0.8rem; font-weight: 600; color: var(--text-muted);">Sekolah Aktif</p>
                    </div>
                    <div style="padding: 20px; background: var(--bg-light); border-radius: 20px; flex: 1;">
                        <h3 style="color: var(--primary); font-size: 1.8rem; font-weight: 800;">10k+</h3>
                        <p style="font-size: 0.8rem; font-weight: 600; color: var(--text-muted);">Siswa Terdaftar</p>
                    </div>
                </div>
            </div>
            <div style="flex: 1; min-width: 300px;" data-aos="fade-left">
                <div style="background: var(--bg-light); padding: 40px; border-radius: 30px; position: relative; border-left: 5px solid var(--primary);">
                    <i class="fas fa-quote-left" style="font-size: 2rem; color: #cbd5e1; position: absolute; top: 20px; right: 30px;"></i>
                    <p style="font-style: italic; font-size: 1.1rem; margin-bottom: 25px; color: var(--text-dark);">"Sejak menggunakan EduPoint, penginputan nilai rapor siswa jadi 3x lebih cepat. Guru-guru tidak lagi kesulitan mencari data fisik siswa karena semua sudah tersentralisasi."</p>
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=4f46e5&color=fff" style="width: 50px; height: 50px; border-radius: 50%;" alt="User">
                        <div>
                            <h4 style="font-weight: 700;">Drs. Budi Santoso</h4>
                            <p style="font-size: 0.8rem; color: var(--text-muted);">Kepala Sekolah SMA Negeri 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="padding: 60px 8% 100px;" id="bantuan">
        <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); padding: 60px; border-radius: 40px; text-align: center; color: white;" data-aos="zoom-out">
            <h2 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 20px;">Siap Digitalisasi Sekolah Anda?</h2>
            <p style="opacity: 0.8; margin-bottom: 35px; max-width: 600px; margin-left: auto; margin-right: auto;">Bergabunglah dengan ribuan pengajar lainnya dan rasakan kemudahan pengelolaan siswa yang belum pernah ada sebelumnya.</p>
            <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
                <a href="{{ route('login') }}" class="btn-cta btn-main" style="background: white; color: var(--text-dark);">Daftar Sekarang</a>
                <a href="https://www.instagram.com/ch4444c?igsh=MTYwZmJ2MHB3Nm9lbQ==" class="btn-cta" style="border: 1px solid rgba(255,255,255,0.3); color: white;" target="_blank" 
                    rel="noopener noreferrer"
                    class="btn-cta btn-outline">Hubungi Tim Kami</a>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-grid">
            <div class="footer-about">
                <a href="#" class="brand" style="margin-bottom: 20px;">
                    <div class="brand-logo"><i class="fas fa-graduation-cap"></i></div>
                    <div class="brand-name" style="-webkit-text-fill-color: white;">EduPoint</div>
                </a>
                <p>Solusi teknologi masa depan untuk dunia pendidikan Indonesia. Mempermudah administrasi, memaksimalkan potensi.</p>
            </div>
            <div class="footer-links">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#hero-content">Beranda</a></li>
                    <li><a href="#fitur">Fitur Utama</a></li>
                    <li><a href="#tentang">Cara Kerja</a></li>
                    <li><a href="#bantuan">Bantuan</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h4>Kontak</h4>
                <ul>
                    <li><a href="#"><i class="fas fa-envelope"></i> info@edupoint.com</a></li>
                    <li><a href="#"><i class="fas fa-phone"></i> +62 812 3456 7890</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jakarta, Indonesia</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            © 2026 EduPoint System. Dikembangkan untuk pendidikan Indonesia.
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>
</html>