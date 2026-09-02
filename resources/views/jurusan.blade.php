<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Jurusan - SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* ==========================================================================
           1. RESET & DASAR (Kunci Halaman Putih Bersih)
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff; /* 💡 BASE BODY WAJIB PUTIH */
            color: #1e293b;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .container {
            width: 100%;
            max-width: 1240px;
            margin: 0 auto;
            padding: 0 20px;
            box-sizing: border-box;
        }

        /* ==========================================================================
           2. AREA ATAS KHUSUS BACKGROUND HIJAU (HERO & NAVBAR)
           ========================================================================== */
        .top-hero-wrapper {
            background: linear-gradient(to right, rgba(0, 58, 59, 1) 30%, rgba(0, 58, 59, 0.8) 50%, rgba(0, 58, 59, 0.15) 100%), 
                        url('img/sekolah.png');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            padding-bottom: 260px;
            position: relative;
        }

        /* NAVBAR ATAS KOTAK PUTIH */
        .navbar {
            background-color: #ffffff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: sticky;
            top: 20px;
            z-index: 1000;
            width: 94%;
            margin: 0 auto;
            border-radius: 15px;
            padding: 5px 25px;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 15px;
        }

        .logo-group {
            display: flex;
            align-items: center;
            gap: 15px;
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
            transition: 0.3s;
        }
        .nav-menu a.active { color: #007a53; }
        .nav-menu a:hover { color: #007a53; }

        .btn-login {
            background-color: #064e3b;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 35px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 15px;
            transition: 0.3s;
        }

       /* HERO TEXT INFO */
        .hero-section { 
            padding: 100px 0 20px 0; 
            width: 94%;
            max-width: none;
        }
        .hero-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            align-items: center;
        }

        .breadcrumb {
            color: #6ee7b7;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
            font-weight: 700;
            display: block;
            text-align: left;
        }

        .hero-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
        }

        .hero-section h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 40px;
            font-weight: 800;
            line-height: 1.2;
            text-align: left;
            width: 100%;
        }
        .highlight { color: #5eead4; }

        .hero-desc {
            color: #cbd5e1;
            margin-top: 15px;
            font-size: 15px;
            line-height: 1.6;
            max-width: 500px;
            text-align: left;
        }

       .quote-box {
            background: rgba(0, 43, 44, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(8px);
            border-radius: 24px;
            padding: 25px;
        }
        .quote-icon { font-size: 35px; color: #ffffff; margin-bottom: 5px; line-height: 1; }
        .quote-box p { font-size: 13.5px; line-height: 1.6; color: #ffffff; margin-bottom: 15px; }

        /* DEKORASI JUDUL JURUSAN DI AREA HIJAU */
        .fitur-title-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin: 60px auto 0 auto;
            width: 100%;
            max-width: 500px;
            transform: translateY(55px);
        }

        .fitur-title-wrapper h2 {
            color: #ffffff;            
            font-size: 24px;
            font-weight: 700;
            white-space: nowrap;
        }
        .fitur-line { flex: 1; height: 2px; }
        .fitur-title-wrapper .fitur-line:first-child { background: linear-gradient(to left, #5eead4, transparent); }
        .fitur-title-wrapper .fitur-line:last-child { background: linear-gradient(to right, #5eead4, transparent); }

        /* ==========================================================================
           3. AREA BAWAH: HALAMAN PUTIH + 3 KARTU MELAYANG NAIK
           ========================================================================== */
        .bottom-white-content {
            background-color: #ffffff;
            padding-top: 60px;
            position: relative;
            z-index: 10;
        }

        .jurusan-grid-melayang {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: -240px;
            position: relative;
            z-index: 100;
        }

        /* CARD STYLING */
        .card-jurusan-baru {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-jurusan-baru:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* CONTAINER GAMBAR */
        .image-container-card {
            width: 100%;
            height: auto;
            aspect-ratio: 1 / 1;
            position: relative;
            background-color: #f8fafc;
            overflow: hidden;
        }
        .card-img-baru {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            display: block;
        }

        /* BADGE NOMOR JURUSAN DI ATAS GAMBAR KARTU */
        .badge-nomor {
            position: absolute;
            bottom: 15px;
            left: 20px;
            background-color: #064e3b;
            color: #ffffff;
            font-size: 13px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 6px;
            z-index: 10;
        }

        /* ISIAN TEKS KARTU */
        .card-body-baru {
            padding: 25px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            position: relative;
        }

        .card-body-baru h3 {
            color: #0f172a;
            font-size: 18px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .card-body-baru .main-desc {
            font-size: 13px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* CHECKLIST KEAHLIAN (HIJAU BULAT) */
        .checklist-jurusan {
            list-style: none;
            margin-bottom: 25px;
        }
        .checklist-jurusan li {
            font-size: 12.5px;
            color: #334155;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
        }
        .checklist-jurusan li::before {
            content: "✓";
            display: flex;
            align-items: center;
            justify-content: center;
            width: 18px;
            height: 18px;
            background-color: #064e3b;
            color: #ffffff;
            border-radius: 50%;
            font-size: 10px;
            font-weight: 800;
            flex-shrink: 0;
        }

        /* TOMBOL LIHAT SELENGKAPNYA */
        .btn-card-baru {
            background-color: #064e3b;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            align-self: flex-start;
            margin-top: auto; 
            transition: 0.3s;
        }
        .btn-card-baru:hover { background-color: #032b21; }

        .ikon-pojok-kartu {
            position: absolute;
            bottom: 15px;
            right: 15px;
            width: 85px;
            height: auto;
            opacity: 0.1;
            pointer-events: none;
        }

        /* ==========================================================================
           4. SEKTOR FITUR UNGGULAN (BAR HIJAU DI BAWAH)
           ========================================================================== */
        .fitur-title-white {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin: 70px auto 30px auto;
            width: 100%;
            max-width: 500px;
        }
        .fitur-title-white h2 { color: #064e3b; font-size: 24px; font-weight: 700; white-space: nowrap; }
        .fitur-title-white .fitur-line:first-child { background: linear-gradient(to left, #064e3b, transparent); }
        .fitur-title-white .fitur-line:last-child { background: linear-gradient(to right, #064e3b, transparent); }

        .keunggulan-bar {
            background-color: #002b2c; 
            border-radius: 20px;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0;
            width: 100%;
            max-width: 1385px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .keunggulan-item { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            flex: 1; 
            background: transparent; 
            backdrop-filter: none; 
            padding: 10px 20px; 
            border-radius: 0; 
            border: none;
        }

        .keunggulan-item:not(:last-child) {
            border-right: 1px solid rgba(255, 255, 255, 0.15);
        }
        .keunggulan-icon { width: 35px; height: 35px; object-fit: contain; flex-shrink: 0; }
        .keunggulan-text h4 { font-size: 13.5px; color: #ffffff; font-weight: 700; margin: 0; }
        .keunggulan-text p { font-size: 11px; margin: 0; white-space: nowrap; color: #a7f3d0; }

        /* ==========================================================================
           5. RESPONSIVE (HP & TABLET)
           ========================================================================== */
        @media (max-width: 1024px) {
            .jurusan-grid-melayang { grid-template-columns: repeat(2, 1fr); margin-top: -120px; }
            .keunggulan-bar { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        }
        
        @media (max-width: 768px) {
            .navbar { width: 90%; padding: 5px 15px; }
            
            /* Sembunyikan tombol login desktop & tampilkan tombol hamburger */
            .btn-login.btn-profile-desktop { display: none !important; }
            .hamburger-btn { display: block !important; }

            /* Dropdown Menu Mobile */
            .nav-menu {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: #ffffff;
                position: absolute;
                top: 70px;
                left: 0;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
                padding: 20px;
            }
            .nav-menu.active { 
                display: flex !important; 
            }
            .nav-menu a { 
                margin: 10px 0; 
                width: 100%; 
                color: #334155; 
            }

            .mobile-only-action { 
                display: block !important; 
                width: 100%;
                margin-top: 15px;
                padding-top: 15px;
                border-top: 1px dashed #cbd5e1;
            }
            .mobile-login-btn {
                background-color: #064e3b;
                color: #ffffff !important;
                text-align: center;
                padding: 15px;
                border-radius: 12px;
                font-weight: 700;
                text-decoration: none;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                box-shadow: 0 4px 10px rgba(6, 78, 59, 0.2);
                position: relative;
                right: 10px;
            }

            .hero-grid, .jurusan-grid-melayang, .keunggulan-bar { grid-template-columns: 1fr; }
            .hero-section h1 { font-size: 26px; }
            .jurusan-grid-melayang { margin-top: -30px; gap: 20px; }
            
            .keunggulan-bar { padding: 20px; gap: 15px; }
            .keunggulan-item:not(:last-child) { border-right: none; border-bottom: 1px solid rgba(255, 255, 255, 0.15); padding-bottom: 15px; }
        }
    </style>
</head>
<body>

    <div class="top-hero-wrapper">
        
        <div style="padding-top: 20px;">
            <header class="navbar">
                <div class="nav-container">
                    <div class="logo-group">
                        <img src="{{ asset('img/logo.smk.png') }}" alt="Logo" class="logo-sekolah">
                        <img src="{{ asset('img/logo-smk-hebat.png') }}" alt="SMK Hebat" class="logo-smkhebat">
                        <img src="{{ asset('img/logo-smk-vokasi.png') }}" alt="Vokasi" class="logo-vokasi">
                        <img src="{{ asset('img/akreditasi.png') }}" alt="Akreditasi" class="logo-akreditasi-nav">
                    </div>
                    
                    <nav class="nav-menu" id="navMenu">
                        <a href="{{ url('/home') }}">Beranda</a>
                        <a href="{{ url('/daftar') }}">Pendaftaran</a>
                        <a href="{{ url('/jurusan') }}" class="active">Jurusan</a>
                        <a href="{{ url('/informasi') }}">Informasi</a>
                        <a href="{{ url('/kontak') }}">Kontak</a>
                        
                        <div class="mobile-only-action" style="display: none;">
                            <a href="{{ url('/login') }}" class="mobile-login-btn">Log in</a>
                        </div>
                    </nav>

                    <a href="{{ url('/login') }}" class="btn-login btn-profile-desktop">Log in</a>

                    <button class="hamburger-btn" id="hamburgerBtn" style="background: none; border: none; cursor: pointer; display: none;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02403f" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </button>
                </div>
            </header>
        </div>

        <section class="container hero-section">
            <div class="hero-grid">
                <div class="hero-left">
                    <p class="breadcrumb">Jurusan / Kompetensi Keahlian</p>
                    <h1>PROGRAM KEAHLIAN <br><span class="highlight">SMK MA'ARIF WALISONGO KAJORAN</span></h1>
                    <p class="hero-desc">Dapatkan pendidikan vokasi berkualitas dengan fasilitas lengkap dan guru profesional siap mengantarkanmu menjadi generasi hebat dan kompeten.</p>
                </div>

                <div class="hero-right">
                    <div class="quote-box">
                        <div class="quote-icon">❛❛</div>
                        <p>SMK Ma'arif Walisongo Kajoran memiliki 3 program keahlian unggulan yang siap membekali kamu dengan keterampilan masa depan.</p>
                        <div style="display: flex; gap: 8px;">
                            <img src="{{ asset('img/logo-smk-hebat.png') }}" style="height: 35px; opacity: 0.9;">
                            <img src="{{ asset('img/logo-smk-vokasi.png') }}" style="height: 35px; opacity: 0.9;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="fitur-title-wrapper">
            <div class="fitur-line"></div>
            <h2>● Pilihan Jurusan ●</h2>
            <div class="fitur-line"></div>
        </div>

    </div> 

    <div class="bottom-white-content">
        <div class="container">
            
            <div class="jurusan-grid-melayang">
                
                <div class="card-jurusan-baru">
                    <div class="image-container-card">
                        <div class="badge-nomor">01</div>
                        <img src="{{ asset('img/pplg.jpg') }}" alt="PPLG" class="card-img-baru">
                    </div>
                    <div class="card-body-baru">
                        <h3>Pengembangan Perangkat Lunak dan Gim (PPLG)</h3>
                        <p class="main-desc">Mempelajari pembuatan perangkat lunak, aplikasi, dan gim mulai dari perancangan, pemrograman, hingga pengujian.</p>
                        
                        <ul class="checklist-jurusan">
                            <li>Pemrograman Web & Mobile</li>
                            <li>Desain UI/UX</li>
                            <li>Game Development</li>
                            <li>Database & Software Engineering</li>
                        </ul>

                        <img src="{{ asset('img/ikonpplg.png') }}" class="ikon-pojok-kartu">
                        <a href="{{ url('/detail-jurusan-pplg') }}" class="btn-card-baru">Lihat Selengkapnya →</a>
                    </div>
                </div>

                <div class="card-jurusan-baru">
                    <div class="image-container-card">
                        <div class="badge-nomor">02</div>
                        <img src="{{ asset('img/bcf.jpg') }}" alt="Broadcasting" class="card-img-baru">
                    </div>
                    <div class="card-body-baru">
                        <h3>Broadcasting dan Perfilman (BCF)</h3>
                        <p class="main-desc">Menggali kreativitas di dunia penyiaran dan perfilman, mulai dari produksi, pengambilan gambar, hingga penyuntingan.</p>
                        
                        <ul class="checklist-jurusan">
                            <li>Produksi Program TV & Radio</li>
                            <li>Teknik Kamera & Lighting</li>
                            <li>Video Editing</li>
                            <li>Film Making</li>
                        </ul>

                        <img src="{{ asset('img/logobcf.png') }}" class="ikon-pojok-kartu">
                        <a href="{{ url('/detail_jurusan_bcf') }}" class="btn-card-baru">Lihat Selengkapnya →</a>
                    </div>
                </div>

                <div class="card-jurusan-baru">
                    <div class="image-container-card">
                        <div class="badge-nomor">03</div>
                        <img src="{{ asset('img/mplb.jpg') }}" alt="MPLB" class="card-img-baru">
                    </div>
                    <div class="card-body-baru">
                        <h3>Manajemen Perkantoran dan Layanan Bisnis (MPLB)</h3>
                        <p class="main-desc">Membekali keterampilan administrasi perkantoran modern dan layanan bisnis yang profesional dan berdaya saing.</p>
                        
                        <ul class="checklist-jurusan">
                            <li>Administrasi Perkantoran</li>
                            <li>Korespondensi & Kearsipan</li>
                            <li>Layanan Pelanggan</li>
                            <li>Manajemen Bisnis</li>
                        </ul>

                        <img src="{{ asset('img/logomplb.png') }}" class="ikon-pojok-kartu">
                        <a href="{{ url('/detail_jurusan_mplb') }}" class="btn-card-baru">Lihat Selengkapnya →</a>
                    </div>
                </div>

            </div> 

            <section class="fitur-title-white">
                <div class="fitur-line"></div>
                <h2>● Fitur Unggulan ●</h2>
                <div class="fitur-line"></div>
            </section>

            <div class="keunggulan-bar">
                <div class="keunggulan-item">
                    <img src="{{ asset('img/toga.png') }}" alt="Icon Guru" class="keunggulan-icon">
                    <div class="keunggulan-text">
                        <h4>Guru Profesional</h4>
                        <p>& Kompeten</p>
                    </div>
                </div>
                <div class="keunggulan-item">
                    <img src="{{ asset('img/gedung.png') }}" alt="Icon Fasilitas" class="keunggulan-icon">
                    <div class="keunggulan-text">
                        <h4>Fasilitas Lengkap</h4>
                        <p>dan Modern</p>
                    </div>
                </div>
                <div class="keunggulan-item">
                    <img src="{{ asset('img/dasi.png') }}" alt="Icon Kerja" class="keunggulan-icon">
                    <div class="keunggulan-text">
                        <h4>Siap Kerja &</h4>
                        <p>Berwirausaha</p>
                    </div>
                </div>
                <div class="keunggulan-item">
                    <img src="{{ asset('img/globe.png') }}" alt="Icon Global" class="keunggulan-icon">
                    <div class="keunggulan-text">
                        <h4>Berwawasan</h4>
                        <p>Global</p>
                    </div>
                </div>
                <div class="keunggulan-item">
                    <img src="{{ asset('img/badge_reward1.png') }}" alt="Icon Karakter" class="keunggulan-icon">
                    <div class="keunggulan-text">
                        <h4>Berkarakter &</h4>
                        <p>Berakhlakul Karimah</p>
                    </div>
                </div>
            </div>

        </div>
    </div> 

    <!-- Script JavaScript untuk Tombol Hamburger Mobile -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const navMenu = document.getElementById('navMenu');

            if (hamburgerBtn && navMenu) {
                hamburgerBtn.addEventListener('click', function () {
                    navMenu.classList.toggle('active');
                });

                const navLinks = navMenu.querySelectorAll('a:not(.mobile-login-btn)');
                navLinks.forEach(link => {
                    link.addEventListener('click', function () {
                        navMenu.classList.remove('active');
                    });
                });
            }
        });
    </script>
</body>
</html>