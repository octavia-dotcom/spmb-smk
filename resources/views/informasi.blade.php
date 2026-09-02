<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi - SPMB SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ==========================================================================
           1. RESET & DASAR
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #334155;
            background: linear-gradient(160deg, #012a2b 0%, #033f3d 35%, #045c4a 70%, #057a5e 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
             width: 100%;
             max-width: 100%;
             padding: 0 5%;
             margin: 0;
        }

        /* ==========================================================================
           2. NAVBAR ATAS (KOTAK PUTIH KAPSUL MELAYANG) — RESPONSIF SEPERTI HOME
           ========================================================================== */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            position: sticky;
            top: 20px;
            z-index: 1000;
            width: 94%;
            margin: 20px auto 0 auto;
            border-radius: 15px;
            padding: 5px 25px;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 15px;
            position: relative;
        }

        .logo-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-sekolah, .logo-smkhebat, .logo-vokasi, .logo-akreditasi-nav {
            height: 45px;
            width: auto;
        }

        .nav-menu {
            display: flex;
            align-items: center;
        }

        .nav-menu a {
            text-decoration: none;
            color: #475569;
            margin: 0 15px;
            font-weight: 600;
            font-size: 15px;
            transition: color 0.3s;
        }

        .nav-menu a:hover, .nav-menu a.active {
            color: #047857;
        }

        .nav-right-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* Tombol Log In Desktop */
        .btn-cta {
            background-color: #064e3b;
            color: white;
            text-decoration: none;
            padding: 10px 28px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 15px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-cta:hover {
            background-color: #047857;
        }

        /* Tombol Profil Desktop */
        .btn-profile-desktop {
            display: none; 
            background-color: #047857;
            color: white;
            text-decoration: none;
            padding: 6px 18px 6px 6px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(4, 120, 87, 0.2);
            transition: background-color 0.3s;
        }
        
        .btn-profile-desktop:hover {
            background-color: #064e3b;
        }

        .profile-avatar-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.8);
        }

        .profile-avatar-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Aksi Mobile (Dalam Dropdown) */
        .mobile-only-action {
            display: none;
            width: 100%;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed #cbd5e1;
        }

        .mobile-login-btn {
            background-color: #064e3b;
            color: #ffffff !important;
            text-align: center;
            padding: 12px;
            border-radius: 12px;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .mobile-profile-btn {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: #047857;
            color: white;
            text-align: center;
            padding: 10px 15px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            width: 100%;
        }

        /* Tombol Hamburger */
        .hamburger-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            flex-direction: column;
            justify-content: space-between;
            width: 22px;
            height: 16px;
            padding: 0;
        }

        .hamburger-btn span {
            display: block;
            width: 100%;
            height: 2.5px;
            background-color: #064e3b;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        /* ==========================================================================
           3. HALAMAN INFORMASI KONTEN
           ========================================================================== */
        .page-content {
            padding: 45px 0 60px 0;
            flex: 1;
        }

        .info-card {
            background: #ffffff;
            border-radius: 22px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.18);
            padding: 35px;
            margin-bottom: 30px;
        }

        .info-card-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
        }

        .info-icon-badge {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .info-icon-badge img {
            width: 70px;
            height: 70px;
            object-fit: contain;
        }

        .info-card-header h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 21px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .info-card-header p {
            font-size: 14px;
            color: #64748b;
        }

        .gelombang-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .gelombang-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 24px;
            display: flex;
            flex-direction: column;
        }

        .gelombang-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4px;
        }

        .gelombang-top h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 17px;
            font-weight: 700;
            color: #0f172a;
        }

        .status-badge {
            font-size: 11px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 20px;
        }

        .status-dibuka { background: #d1fae5; color: #047857; }
        .status-tunggu { background: #f1f5f9; color: #64748b; }
        .status-tutup { background: #fee2e2; color: #b91c1c; }

        .gelombang-tanggal {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 18px;
        }

        .gelombang-steps {
            position: relative;
            display: flex;
            justify-content: space-between;
            padding: 10px 0 20px 0;
            border-top: 1px solid #e2e8f0;
            margin-bottom: 18px;
        }

        .gelombang-step-line {
            position: absolute;
            top: 45px;
            left: 8%;
            width: 84%;
            height: 2px;
            border-top: 2px dashed #cbd5e1;
            z-index: 1;
        }

        .gelombang-step {
            position: relative;
            z-index: 2;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding-top: 18px;
        }

        .gelombang-step-icon {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .gelombang-step-icon img {
            width: 65%;
            height: 65%;
            object-fit: contain;
        }

        .gelombang-step-title {
            font-size: 12.5px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .gelombang-step-date {
            font-size: 11px;
            color: #94a3b8;
        }

        .gelombang-btn {
            display: block;
            text-align: center;
            width: 100%;
            padding: 13px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14.5px;
            text-decoration: none;
            transition: 0.3s;
            margin-top: auto;
        }

        .btn-daftar { background-color: #064e3b; color: #ffffff; }
        .btn-daftar:hover { background-color: #047857; }
        .btn-coming-soon { background-color: #ffffff; color: #047857; border: 1.5px solid #d1fae5; cursor: default; }

        .bawah-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 30px;
            align-items: stretch;
        }

        .cara-daftar-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
            padding: 10px 0 30px 0;
        }

        .cara-daftar-line {
            position: absolute;
            top: 42px;
            left: 8%;
            width: 84%;
            height: 2px;
            border-top: 2px dashed #cbd5e1;
            z-index: 1;
        }

        .cara-step {
            position: relative;
            z-index: 2;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 0 8px;
        }

        .cara-step-icon {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            background: #ecfdf5;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .cara-step-icon img {
            width: 50%;
            height: 50%;
            object-fit: contain;
        }

        .cara-step-num {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #047857;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: -32px 0 10px 0;
            border: 3px solid #ffffff;
        }

        .cara-step-title {
            font-size: 13.5px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 6px;
        }

        .cara-step-desc {
            font-size: 11.5px;
            color: #64748b;
            line-height: 1.5;
            max-width: 130px;
        }

        .notice-box {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background: #f0fdf4;
            border: 1px solid #dcfce7;
            border-radius: 14px;
            padding: 16px 18px;
            margin-top: 10px;
        }

        .notice-icon {
            width: 50px;
            height: 50px;
            object-fit: contain;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .notice-box p {
            font-size: 13px;
            color: #475569;
            line-height: 1.6;
        }

        .notice-box strong { color: #047857; }

        .jadwal-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            gap: 16px;
            margin-bottom: 16px;
        }

        .jadwal-icon-box {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .jadwal-icon-box img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .jadwal-info { flex: 1; }

        .jadwal-top-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 10px;
        }

        .jadwal-info h4 {
            font-size: 14.5px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
        }

        .jadwal-tanggal {
            font-size: 13px;
            font-weight: 600;
            color: #047857;
            margin-bottom: 6px;
        }

        .jadwal-desc {
            font-size: 12.5px;
            color: #64748b;
            line-height: 1.5;
        }

        .durasi-badge {
            background: #d1fae5;
            color: #047857;
            font-size: 11.5px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 20px;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .footer-copyright {
            text-align: center;
            padding: 20px 0;
            font-size: 13px;
            color: #e2e8f0;
            background: rgba(1, 42, 43, 0.4);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* ==========================================================================
           4. RESPONSIVE MOBILE UNTUK NAVBAR & LAYOUT
           ========================================================================== */
        @media (max-width: 768px) {
            .navbar {
                width: 90%;
                padding: 5px 15px;
            }

            .btn-cta, .btn-profile-desktop {
                display: none !important;
            }
            
            .mobile-only-action {
                display: block;
            }
            
            .nav-menu {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background-color: #ffffff;
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
                border: 1px solid #e2e8f0;
                z-index: 1100;
            }

            .nav-menu.active-menu {
                display: flex;
            }

            .nav-menu a:not(.mobile-login-btn):not(.mobile-profile-btn) {
                margin: 10px 0;
                width: 100%;
                padding-bottom: 8px;
                border-bottom: 1px solid #f1f5f9;
            }

            .hamburger-btn {
                display: flex;
            }
        }

        @media (max-width: 992px) {
            .gelombang-grid { grid-template-columns: 1fr; }
            .bawah-grid { grid-template-columns: 1fr; }
            .gelombang-steps, .cara-daftar-steps { flex-wrap: wrap; gap: 20px; }
            .gelombang-step-line, .cara-daftar-line { display: none; }
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="nav-container">
            <div class="logo-group">
                <img src="{{ asset('img/logo.smk.png') }}" alt="Logo SMK Ma'arif" class="logo-sekolah" id="navLogoSekolah">
                <img src="{{ asset('img/logo-smk-hebat.png') }}" alt="Logo SMK Bisa Hebat" class="logo-smkhebat" id="navLogoSmkHebat">
                <img src="{{ asset('img/logo-smk-vokasi.png') }}" alt="Logo SMK Vokasi" class="logo-vokasi" id="navLogoVokasi">
                <img src="{{ asset('img/akreditasi.png') }}" alt="Akreditasi A" class="logo-akreditasi-nav" id="navLogoAkreditasi">
            </div>

            <nav class="nav-menu" id="navMenuDropdown">
                <a href="{{ url('/home') }}">Beranda</a>
                <a href="{{ url('/daftar') }}">Pendaftaran</a>
                <a href="{{ url('/jurusan') }}">Jurusan</a>
                <a href="{{ url('/informasi') }}" class="active">Informasi</a>
                <a href="{{ url('/kontak') }}">Kontak</a>

                <div class="mobile-only-action">
                    <a href="{{ url('/login') }}" class="mobile-login-btn" id="mobileLoginBtn">Log in</a>
                    <a href="{{ url('/biodata-siswa') }}" class="mobile-profile-btn" id="mobileProfileBtn">
                        <div class="profile-avatar-circle">
                            <img src="{{ asset('img/user.png') }}" alt="Avatar Profil" id="mobileUserAvatar">
                        </div>
                        <span>Profil Saya</span>
                    </a>
                </div>
            </nav>

            <div class="nav-right-actions">
                <a href="{{ url('/login') }}" class="btn-cta" id="desktopLoginBtn">Log in</a>
                
                <a href="{{ url('/profil') }}" class="btn-profile-desktop" id="desktopProfileBtn">
                    <div class="profile-avatar-circle">
                        <img src="{{ asset('img/user.png') }}" alt="Avatar Profil" id="desktopUserAvatar">
                    </div>
                    <span>Profil Saya</span>
                </a>

                <button class="hamburger-btn" id="hamburgerToggle" aria-label="Menu Navigasi">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <main class="page-content">
        <div class="container">

            <!-- ================= GELOMBANG PENDAFTARAN ================= -->
            <div class="info-card">
                <div class="info-card-header">
                    <div class="info-icon-badge">
                        <img src="{{ asset('img/jadwal.png') }}" alt="ikon kalender">
                    </div>
                    <div>
                        <h2>Gelombang Pendaftaran</h2>
                        <p>Pilih gelombang pendaftaran yang tersedia.</p>
                    </div>
                </div>

                <div class="gelombang-grid" id="gelombangGrid">

                    <!-- Gelombang 1 -->
                    <div class="gelombang-card">
                        <div class="gelombang-top">
                            <h3>Gelombang 1</h3>
                            <span class="status-badge status-dibuka">DIBUKA</span>
                        </div>
                        <div class="gelombang-tanggal">1 Januari – 31 Maret 2026</div>

                        <div class="gelombang-steps">
                            <div class="gelombang-step-line"></div>
                            <div class="gelombang-step">
                                <div class="gelombang-step-icon"><img src="{{ asset('img/note.png') }}" alt="ikon pendaftaran"></div>
                                <div class="gelombang-step-title">Pendaftaran</div>
                                <div class="gelombang-step-date">1 Jan – 31 Mar 2026</div>
                            </div>
                            <div class="gelombang-step">
                                <div class="gelombang-step-icon"><img src="{{ asset('img/pilihan jurusan.png') }}" alt="ikon tes seleksi"></div>
                                <div class="gelombang-step-title">Tes Seleksi</div>
                                <div class="gelombang-step-date">5 – 7 Apr 2026</div>
                            </div>
                            <div class="gelombang-step">
                                <div class="gelombang-step-icon"><img src="{{ asset('img/pengumuman.png') }}" alt="ikon pengumuman"></div>
                                <div class="gelombang-step-title">Pengumuman</div>
                                <div class="gelombang-step-date">12 Apr 2026</div>
                            </div>
                            <div class="gelombang-step">
                                <div class="gelombang-step-icon"><img src="{{ asset('img/i_cloud.png') }}" alt="ikon daftar ulang"></div>
                                <div class="gelombang-step-title">Daftar Ulang</div>
                                <div class="gelombang-step-date">15 – 18 Apr 2026</div>
                            </div>
                        </div>

                        <a href="{{ url('/buat-akun') }}" class="gelombang-btn btn-daftar">Daftar Sekarang →</a>
                    </div>

                    <!-- Gelombang 2 -->
                    <div class="gelombang-card">
                        <div class="gelombang-top">
                            <h3>Gelombang 2</h3>
                            <span class="status-badge status-tunggu">AKAN DIBUKA</span>
                        </div>
                        <div class="gelombang-tanggal">1 April – 31 Juli 2026</div>

                        <div class="gelombang-steps">
                            <div class="gelombang-step-line"></div>
                            <div class="gelombang-step">
                                <div class="gelombang-step-icon"><img src="{{ asset('img/note.png') }}" alt="ikon pendaftaran"></div>
                                <div class="gelombang-step-title">Pendaftaran</div>
                                <div class="gelombang-step-date">1 Apr – 31 Jul 2026</div>
                            </div>
                            <div class="gelombang-step">
                                <div class="gelombang-step-icon"><img src="{{ asset('img/pilihan jurusan.png') }}" alt="ikon tes seleksi"></div>
                                <div class="gelombang-step-title">Tes Seleksi</div>
                                <div class="gelombang-step-date">2 – 4 Agu 2026</div>
                            </div>
                            <div class="gelombang-step">
                                <div class="gelombang-step-icon"><img src="{{ asset('img/pengumuman.png') }}" alt="ikon pengumuman"></div>
                                <div class="gelombang-step-title">Pengumuman</div>
                                <div class="gelombang-step-date">9 Agu 2026</div>
                            </div>
                            <div class="gelombang-step">
                                <div class="gelombang-step-icon"><img src="{{ asset('img/i_cloud.png') }}" alt="ikon daftar ulang"></div>
                                <div class="gelombang-step-title">Daftar Ulang</div>
                                <div class="gelombang-step-date">11 – 14 Agu 2026</div>
                            </div>
                        </div>

                        <a href="#" class="gelombang-btn btn-coming-soon">Coming Soon</a>
                    </div>

                </div>
            </div>

            <div class="bawah-grid">

                <!-- Cara Daftar Menggunakan Web SPMB Online -->
                <div class="info-card">
                    <div class="info-card-header">
                        <div class="info-icon-badge">
                            <img src="{{ asset('img/orangtambah.png') }}" alt="ikon cara daftar">
                        </div>
                        <div>
                            <h2>Cara Daftar Menggunakan Web SPMB Online</h2>
                            <p>Ikuti langkah-langkah berikut untuk melakukan pendaftaran.</p>
                        </div>
                    </div>

                    <div class="cara-daftar-steps" id="caraDaftarSteps">
                        <div class="cara-daftar-line"></div>

                        <div class="cara-step">
                            <div class="cara-step-icon"><img src="{{ asset('img/orangtambah.png') }}" alt="ikon buat akun"></div>
                            <div class="cara-step-num">1</div>
                            <div class="cara-step-title">Buat Akun</div>
                            <div class="cara-step-desc">Daftar akun dengan mengisi data diri secara lengkap.</div>
                        </div>

                        <div class="cara-step">
                            <div class="cara-step-icon"><img src="{{ asset('img/note.png') }}" alt="ikon lengkapi data"></div>
                            <div class="cara-step-num">2</div>
                            <div class="cara-step-title">Lengkapi Data</div>
                            <div class="cara-step-desc">Isi formulir pendaftaran dan unggah berkas yang diperlukan.</div>
                        </div>

                        <div class="cara-step">
                            <div class="cara-step-icon"><img src="{{ asset('img/pilihan jurusan.png') }}" alt="ikon pilih jurusan"></div>
                            <div class="cara-step-num">3</div>
                            <div class="cara-step-title">Pilih Jurusan</div>
                            <div class="cara-step-desc">Pilih jurusan sesuai dengan minat dan kemampuan Anda.</div>
                        </div>

                        <div class="cara-step">
                            <div class="cara-step-icon"><img src="{{ asset('img/i_cloud.png') }}" alt="ikon kirim pendaftaran"></div>
                            <div class="cara-step-num">4</div>
                            <div class="cara-step-title">Kirim Pendaftaran</div>
                            <div class="cara-step-desc">Periksa kembali data lalu kirim pendaftaran Anda.</div>
                        </div>

                        <div class="cara-step">
                            <div class="cara-step-icon"><img src="{{ asset('img/centang.png') }}" alt="ikon pantau status"></div>
                            <div class="cara-step-num">5</div>
                            <div class="cara-step-title">Pantau Status</div>
                            <div class="cara-step-desc">Pantau status pendaftaran melalui dashboard akun Anda.</div>
                        </div>
                    </div>

                    <div class="notice-box">
                        <img src="{{ asset('img/pengumuman.png') }}" alt="ikon info" class="notice-icon">
                        <p id="caraDaftarNoticeText">Pastikan semua data dan berkas sudah benar sebelum dikirim. Informasi lebih lanjut dapat dilihat pada menu <strong>Pengumuman</strong>.</p>
                    </div>
                </div>

                <!-- Jadwal MPLS & PTA -->
                <div class="info-card" id="jadwalInfoCard">
                    <div class="info-card-header">
                        <div class="info-icon-badge">
                            <img src="{{ asset('img/jadwal.png') }}" alt="ikon jadwal">
                        </div>
                        <div>
                            <h2>Jadwal MPLS & PTA</h2>
                            <p>Jadwal kegiatan untuk siswa baru.</p>
                        </div>
                    </div>

                    <div class="jadwal-card">
                        <div class="jadwal-icon-box">
                            <img src="{{ asset('img/cstmr.png') }}" alt="ikon MPLS">
                        </div>
                        <div class="jadwal-info">
                            <div class="jadwal-top-row">
                                <h4>MPLS (Masa Pengenalan Lingkungan Sekolah)</h4>
                                <span class="durasi-badge">3 Hari</span>
                            </div>
                            <div class="jadwal-tanggal">14 – 16 Juli 2026</div>
                            <p class="jadwal-desc">Kegiatan pengenalan lingkungan sekolah bagi siswa baru.</p>
                        </div>
                    </div>

                    <div class="jadwal-card">
                        <div class="jadwal-icon-box">
                            <img src="{{ asset('img/pta.png') }}" alt="ikon PTA">
                        </div>
                        <div class="jadwal-info">
                            <div class="jadwal-top-row">
                                <h4>PTA (Penerimaan Tamu Ambalan)</h4>
                                <span class="durasi-badge">5 Hari</span>
                            </div>
                            <div class="jadwal-tanggal">21 – 25 Juli 2026</div>
                            <p class="jadwal-desc">Kegiatan penilaian tengah semester awal.</p>
                        </div>
                    </div>

                    <div class="notice-box">
                        <img src="{{ asset('img/pengumuman.png') }}" alt="ikon info" class="notice-icon">
                        <p id="jadwalNoticeText">Jadwal dapat berubah sewaktu-waktu. Selalu pantau pengumuman terbaru.</p>
                    </div>
                </div>

            </div>

        </div>
    </main>

    <footer class="footer-copyright">
        copyright © 2026 SMK Ma'arif Walisongo Kajoran. All Rights Reserved.
    </footer>

    <script>
    /* ==========================================================================
       SCRIPT TOGGLE HAMBURGER & STATUS LOGIN
       ========================================================================== */
    document.addEventListener("DOMContentLoaded", function() {
        const hamburgerBtn = document.getElementById('hamburgerToggle');
        const navMenuDropdown = document.getElementById('navMenuDropdown');

        if (hamburgerBtn && navMenuDropdown) {
            hamburgerBtn.addEventListener('click', function() {
                navMenuDropdown.classList.toggle('active-menu');
            });
        }

        const isUserLoggedIn = false; 

        const desktopLoginBtn = document.getElementById('desktopLoginBtn');
        const desktopProfileBtn = document.getElementById('desktopProfileBtn');
        const mobileLoginBtn = document.getElementById('mobileLoginBtn');
        const mobileProfileBtn = document.getElementById('mobileProfileBtn');

        if (isUserLoggedIn) {
            if (desktopLoginBtn) desktopLoginBtn.style.display = 'none';
            if (desktopProfileBtn) desktopProfileBtn.style.display = 'flex';
            if (mobileLoginBtn) mobileLoginBtn.style.display = 'none';
            if (mobileProfileBtn) mobileProfileBtn.style.display = 'flex';
        } else {
            if (desktopLoginBtn) desktopLoginBtn.style.display = 'flex';
            if (desktopProfileBtn) desktopProfileBtn.style.display = 'none';
            if (mobileLoginBtn) mobileLoginBtn.style.display = 'block';
            if (mobileProfileBtn) mobileProfileBtn.style.display = 'none';
        }
    });

    /* ==========================================================================
       SINKRONISASI DENGAN CMS (DENGAN SAFE FALLBACK)
       ========================================================================== */
    (function () {
        let config;
        try { config = JSON.parse(localStorage.getItem('landing_page_config')); } catch (e) { config = null; }
        if (!config || !config.informasi) return;
        const inf = config.informasi;

        function setSrc(id, value) {
            if (!value) return;
            const el = document.getElementById(id);
            if (el) el.src = value;
        }

        function setText(id, value) {
            if (value === undefined || value === null || value === '') return;
            const el = document.getElementById(id);
            if (el) el.textContent = value;
        }

        if (config.home && config.home.navbarLogos) {
            setSrc('navLogoSekolah', config.home.navbarLogos.logoSekolah);
            setSrc('navLogoSmkHebat', config.home.navbarLogos.logoSmkHebat);
            setSrc('navLogoVokasi', config.home.navbarLogos.logoVokasi);
            setSrc('navLogoAkreditasi', config.home.navbarLogos.logoAkreditasi);
        }

        if (Array.isArray(inf.gelombang) && inf.gelombang.length) {
            const grid = document.getElementById('gelombangGrid');
            if (grid) {
                const cards = grid.querySelectorAll('.gelombang-card');
                inf.gelombang.forEach((g, i) => {
                    const card = cards[i];
                    if (!card) return;

                    const namaEl = card.querySelector('.gelombang-top h3');
                    if (namaEl && g.nama) namaEl.textContent = g.nama;

                    const statusEl = card.querySelector('.status-badge');
                    if (statusEl && g.status) {
                        statusEl.textContent = g.status;
                        statusEl.classList.remove('status-dibuka', 'status-tunggu', 'status-tutup');
                        let statusClass = 'status-tunggu';
                        if (g.status === 'DIBUKA') statusClass = 'status-dibuka';
                        else if (g.status === 'DITUTUP') statusClass = 'status-tutup';
                        statusEl.classList.add(statusClass);
                    }

                    const periodeEl = card.querySelector('.gelombang-tanggal');
                    if (periodeEl && g.periode) periodeEl.textContent = g.periode;

                    const steps = card.querySelectorAll('.gelombang-step');
                    const stepData = [
                        [g.step1Judul, g.step1Tanggal], [g.step2Judul, g.step2Tanggal],
                        [g.step3Judul, g.step3Tanggal], [g.step4Judul, g.step4Tanggal]
                    ];
                    steps.forEach((stepEl, si) => {
                        const [judul, tanggal] = stepData[si] || [];
                        const judulEl = stepEl.querySelector('.gelombang-step-title');
                        const tanggalEl = stepEl.querySelector('.gelombang-step-date');
                        if (judulEl && judul) judulEl.textContent = judul;
                        if (tanggalEl && tanggal) tanggalEl.textContent = tanggal;
                    });

                    const btnEl = card.querySelector('.gelombang-btn');
                    if (btnEl) {
                        const aktif = g.status === 'DIBUKA';
                        btnEl.classList.remove('btn-daftar', 'btn-coming-soon');
                        if (aktif) {
                            btnEl.classList.add('btn-daftar');
                            btnEl.href = "{{ url('/buat-akun') }}";
                            const teks = (g.tombolTeks || '').trim();
                            const teksMasihNutup = /coming\s*soon|tutup|belum\s*dibuka/i.test(teks);
                            btnEl.textContent = (teks && !teksMasihNutup) ? teks : 'Daftar Sekarang  →';
                        } else {
                            btnEl.classList.add('btn-coming-soon');
                            btnEl.href = '#';
                            btnEl.textContent = 'Coming Soon';
                        }
                    }
                });
            }
        }

        if (inf.caraDaftar) {
            setText('caraDaftarNoticeText', inf.caraDaftar.notice);
            if (Array.isArray(inf.caraDaftar.steps) && inf.caraDaftar.steps.length) {
                const container = document.getElementById('caraDaftarSteps');
                if (container) {
                    const items = container.querySelectorAll('.cara-step');
                    inf.caraDaftar.steps.forEach((s, i) => {
                        const item = items[i];
                        if (!item) return;
                        const titleEl = item.querySelector('.cara-step-title');
                        const descEl = item.querySelector('.cara-step-desc');
                        if (titleEl && s.title) titleEl.textContent = s.title;
                        if (descEl && s.desc) descEl.textContent = s.desc;
                    });
                }
            }
        }

        if (inf.jadwalKegiatan) {
            setText('jadwalNoticeTest', inf.jadwalKegiatan.notice);
            if (Array.isArray(inf.jadwalKegiatan.list) && inf.jadwalKegiatan.list.length) {
                const wrap = document.getElementById('jadwalInfoCard');
                if (wrap) {
                    const cards = wrap.querySelectorAll('.jadwal-card');
                    inf.jadwalKegiatan.list.forEach((k, i) => {
                        const card = cards[i];
                        if (!card) return;
                        const judulEl = card.querySelector('.jadwal-top-row h4');
                        const durasiEl = card.querySelector('.durasi-badge');
                        const tanggalEl = card.querySelector('.jadwal-tanggal');
                        const descEl = card.querySelector('.jadwal-desc');
                        if (judulEl && k.judul) judulEl.textContent = k.judul;
                        if (durasiEl && k.durasi) durasiEl.textContent = k.durasi;
                        if (tanggalEl && k.tanggal) tanggalEl.textContent = k.tanggal;
                        if (descEl && k.desc) descEl.textContent = k.desc;
                    });
                }
            }
        }
    })();
    </script>

</body>
</html>