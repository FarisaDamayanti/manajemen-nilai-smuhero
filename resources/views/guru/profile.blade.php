<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduPoint - Profil Guru</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #64748b;
            --danger: #ef4444;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --shadow-md: 0 10px 15px -3px rgb(0 0 0 / 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .profile-card {
            background: white;
            width: 100%;
            max-width: 450px;
            border-radius: 32px;
            padding: 40px;
            box-shadow: var(--shadow-md);
            text-align: center;
            position: relative;
            border: 1px solid #eef2ff;
        }

        /* Banner Dekoratif */
        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 120px;
            background: linear-gradient(135deg, var(--primary) 0%, #8b5cf6 100%);
            border-radius: 32px 32px 0 0;
            z-index: 1;
        }

        .profile-content {
            position: relative;
            z-index: 2;
        }

        /* Foto Profil */
        .avatar-wrapper {
            width: 140px;
            height: 140px;
            margin: 0 auto 20px;
            padding: 5px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .avatar-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 4px;
            color: var(--text-main);
        }

        .nip-text {
            color: var(--secondary);
            font-size: 0.9rem;
            margin-bottom: 24px;
            display: block;
            font-weight: 500;
        }

        /* Info Detail */
        .info-grid {
            background: #f1f5f9;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 30px;
            display: grid;
            gap: 12px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
        }

        .info-label {
            color: var(--secondary);
            font-weight: 600;
        }

        .info-value {
            color: var(--text-main);
            font-weight: 700;
        }

        /* Tombol */
        .action-buttons {
            display: grid;
            gap: 12px;
        }

        .btn {
            padding: 14px;
            border-radius: 14px;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            border: none;
            font-family: inherit;
        }

        .btn-edit {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        .btn-edit:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(79, 70, 229, 0.3);
        }

        .btn-logout {
            background: #fff;
            color: var(--danger);
            border: 2px solid #fee2e2;
        }

        .btn-logout:hover {
            background: #fee2e2;
        }

        /* Link Kembali */
        .back-link {
            display: block;
            margin-top: 20px;
            color: var(--secondary);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .back-link:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>

<div class="profile-card">
    <div class="profile-content">
        <div class="avatar-wrapper">
            <img src="{{ $guru->foto ? asset('storage/'.$guru->foto) : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=4f46e5&color=fff' }}" alt="Foto Guru">
        </div>

        <h2>{{ $user->name }}</h2>
        <span class="nip-text">NIP. {{ $guru->nip ?? 'Belum Diatur' }}</span>

        <div class="info-grid">
            <div class="info-row">
                <span class="info-label">Mata Pelajaran</span>
                <span class="info-value">{{ $guru->mapel->nama_mapel ?? 'Belum diatur' }}</span>
            </div>

            <div class="info-row">
                <span class="info-label">Alamat</span>
                <span class="info-value">{{ $guru->alamat ?? 'Belum diatur' }}</span>
            </div>

            <div class="info-row">
                <span class="info-label">No. HP</span>
                <span class="info-value">{{ $guru->no_hp ?? 'Belum diatur' }}</span>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('guru.profile.edit') }}" class="btn btn-edit">
                Edit Profil
            </a>
            
            <form method="POST" action="{{ route('logout') }}" style="width: 100%;">
                @csrf
                <button type="submit" class="btn btn-logout" style="width: 100%;">
                    Log Out
                </button>
            </form>
        </div>

        <a href="{{ route('guru.dashboard') }}" class="back-link">← Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>