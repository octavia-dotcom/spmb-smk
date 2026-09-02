<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jurusan BCF - SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* ==========================================================================
           1. RESET & DASAR GLOBAL
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            color: #334155;
            padding-bottom: 50px;
            overflow-x: hidden;
        }
        .container {
            width: 100%;
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ==========================================================================
           2. TOP BAR & NAVBAR HEADERS (PERSIS HOME.HTML)
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

        .logo-sekolah, .logo-smkhebat, .logo-vokasi, .logo-akreditasi, .logo-akreditasi-nav { 
            height: 45px; 
            width: auto; 
        }

        /* Menu Navigasi Tengah */
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
        
        /* Tombol Log In Hijau di Kanan Navbar (Desktop) */
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
        }
        .btn-cta:hover { 
            background-color: #047857; 
        }

        /* Tombol Profil Ber-Avatar di Kanan Navbar Desktop */
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

        /* Lingkaran Avatar */
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

        /* Khusus Container Tombol Login/Profil di dalam Menu Dropdown Mobile */
        .mobile-only-action {
            display: none; 
            width: 100%;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed #cbd5e1;
            margin-left: -5px;
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
        .mobile-login-btn:hover {
            background-color: #047857;
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
           3. HERO JURUSAN SECTION
           ========================================================================== */
        .hero-jurusan {
            background-color: #003a3b;
            background-image: linear-gradient(135deg, #003a3b 30%, rgba(0, 58, 59, 0.85) 70%, rgba(0, 58, 59, 0.4) 100%), url('img/bcfone.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            color: #ffffff;
            margin-top: -110px;          
            padding-top: 150px;          
            padding-bottom: 60px;
        }
        .hero-title-group {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 15px;
        }
        .hero-number {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 20px;
            font-weight: 700;
            border: 1px solid rgba(255,255,255,0.4);
            padding: 6px 12px;
            border-radius: 8px;
            line-height: 1;
            margin-top: 5px;
            flex-shrink: 0;
        }
        .hero-text-content h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 5px;
            line-height: 1.2;
        }
        .hero-text-content h2 {
            font-size: 15px;
            color: #00cc84;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .hero-desc {
            font-size: 14px;
            max-width: 680px;
            line-height: 1.6;
            opacity: 0.9;
            margin-bottom: 35px;
            width: 100%;
        }

        .hero-badges-container {
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 15px;
            padding: 12px 25px;
            display: inline-flex;
            gap: 30px;
            background: rgba(255,255,255,0.02);
            flex-wrap: wrap;
        }
        .hero-badge-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .badge-icon {
            width: 50px;
            height: 50px;
            background: rgba(0, 204, 132, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
        }
        .badge-icon img { 
            width: 40px; 
            height: 40px; 
            object-fit: contain; 
        }
        .badge-info-text { 
            display: flex; 
            flex-direction: column; 
        }
        .badge-info-text .title { 
            font-size: 11px; 
            font-weight: 700; 
            line-height: 1.2; 
        }
        .badge-info-text .sub { 
            font-size: 9px; 
            opacity: 0.7; 
        }
        .main-content-section { 
            padding: 40px 0; 
            border-radius: 30px 30px 0 0; 
        }

        /* ==========================================================================
           4. LAYOUT TIGA KOLOM & KARIER
           ========================================================================== */
        .detail-jurusan-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            align-items: stretch;
            gap: 20px;
            width: 100%;
            max-width: 1400px; 
            margin: 40px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }
        
        .main-detail-card, .tabel-kompetensi-card, .right-panel-wrapper .panel-card {
            background: #ECF5E2;
            border-radius: 16px;
            padding: 25px 22px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
            border: 1px solid #e2e8f0;
        }
        
        .section-block { margin-bottom: 25px; }
        .section-block:last-child { margin-bottom: 0; }
        
        .detail-jurusan-grid h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 16px;
            color: #003a3b;
            font-weight: 700;
            margin-bottom: 12px;
            border-bottom: 2px solid #dbead8;
            padding-bottom: 8px;
        }

        .detail-jurusan-grid p {
            font-size: 13px;
            line-height: 1.6;
            color: #475569;
        }

        .karier-flex-container {
             display: flex;
             flex-direction: row;
             justify-content: space-between;
             gap: 10px;
             margin-top: 20px;
             width: 100%;
             flex-wrap: wrap;
        }

        .karier-circle-item {
             display: flex;
             flex-direction: column;
             align-items: center;
             text-align: center;
             flex: 1;
             background: none;
             border: none;
             padding: 0;
             box-shadow: none;
             min-width: 70px;
        }

        .karier-circle {
             width: 50px !important;
             height: 50px !important;
             background-color: #ffffff !important;
             border: 1px solid #e2e8f0 !important;
             border-radius: 50% !important;
             display: flex !important;
             align-items: center !important;
             justify-content: center !important;
             margin-bottom: 8px !important;
             flex-shrink: 0 !important;
             box-shadow: 0 4px 8px rgba(0,0,0,0.04) !important;
        }

        .karier-circle img {
             width: 35px;
             height: 35px;
             object-fit: contain;
        }

        .karier-text-wrapper span {
             font-size: 11px;
             font-weight: 600;
             color: #334155;
             display: block;
             line-height: 1.3;
             white-space: normal; 
             max-width: 75px;
             word-wrap: break-word;
        }

        .tabel-pelajaran {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }
        .tabel-pelajaran th, .tabel-pelajaran td {
            padding: 10px 12px;
            text-align: left;
            font-size: 12.5px;
        }
        .tabel-pelajaran th {
            background-color: #007a53;
            color: #ffffff;
            font-weight: 600;
        }
        .tabel-pelajaran tr {
            border-bottom: 1px solid #e2e8f0;
        }
        .tabel-pelajaran tr:last-child {
            border-bottom: none;
        }
        .tabel-pelajaran tr:nth-child(even) {
            background-color: #f8fafc;
        }

        /* ==========================================================================
           5. SIDEBAR KANAN
           ========================================================================== */
        .right-panel-wrapper { 
            display: flex; 
            flex-direction: column; 
            gap: 25px; 
        }
        
        .panel-card {
            background-color: #ECF5E2 !important; 
            border: 1px solid #e2e8f0 !important;   
            padding: 22px; 
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
        }
        
        .panel-card h4 { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            font-size: 15px; 
            color: #334155; 
            font-weight: 700; 
            margin-bottom: 12px; 
        }
        
        .panel-card p.sub-label { 
            font-size: 12.5px; 
            color: #64748b; 
            margin-bottom: 15px; 
        }

        .kuota-display { 
            display: flex; 
            align-items: baseline; 
            gap: 8px; 
            margin-bottom: 12px; 
        }
        .kuota-number { 
            font-size: 42px; 
            font-weight: 800; 
            color: #004d40; 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            line-height: 1; 
        }
        .kuota-unit { 
            font-size: 14px; 
            font-weight: 600; 
            color: #475569; 
        }

        .progress-container { 
            background: #ffffff; 
            border-radius: 6px; 
            height: 6px; 
            width: 100%; 
            overflow: hidden; 
            margin-bottom: 6px; 
        }
        .progress-bar { 
            background: #007a53; 
            height: 100%; 
            width: 85%; 
        }
        .progress-text { 
            font-size: 11px; 
            color: #64748b; 
            text-align: right; 
        }

        .panel-list { 
            list-style: none; 
            padding: 0; 
        }
        .panel-list li { 
            font-size: 13.5px; 
            color: #475569; 
            margin-bottom: 10px; 
            line-height: 1.6; 
            padding-left: 14px; 
            position: relative; 
        }
        .panel-list li::before { 
            content: "•"; 
            color: #007a53; 
            position: absolute; 
            left: 0; 
            font-weight: bold; 
        }
        .panel-list li:last-child { 
            margin-bottom: 0; 
        }

        .panel-section-item {
            padding: 5px 0;
        }
        .panel-section-item:first-child {
            padding-top: 0;
        }
        .panel-section-item:last-child {
            padding: 2px 0;
        }
        .panel-divider {
            border: none;
            border-top: 1px solid #dbead8; 
            margin: 15px 0;
        }

        /* ==========================================================================
           6. LOWER CTA BANNER
           ========================================================================== */
        .bottom-cta-banner {
            grid-column: 1 / -1; 
            background-color: #003a3b;
            border-radius: 20px;
            padding: 35px 40px;
            color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            gap: 30px;
            width: 100%;
        }
        .cta-left {
            display: flex;
            align-items: center;
            gap: 15px;
            flex: 1;
        }
        .cta-icon-circle {
            width: 60px;
            height: 60px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .toga-banner-img {
            width: 50px;       
            height: 50px;      
            object-fit: contain;
        }
        .cta-info-text {
            flex: 1;
            border: none;
        }
        .cta-info-text h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 20px;
            color: #ffffff;
            font-weight: 800;
            margin-bottom: 11px;
            border-bottom: none;
            padding-bottom: 0;
        }
        .cta-info-text p {
            font-size: 10px;
            color: #ffffff;
            opacity: 0.85;
            line-height: 1.4;
        }
        
        .cta-button-group {
            display: flex;
            gap: 12px;
            flex-shrink: 0;
        }
        .btn-secondary {
            background: #ffffff;
            color: #003a3b;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 600;
            transition: 0.2s;
            white-space: nowrap;
        }
        .btn-secondary:hover { background: #e2e8f0; }
        
        .btn-primary {
            background: #007a53;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 600;
            transition: 0.2s;
            white-space: nowrap;
        }
        .btn-primary:hover { background: #005f40; }

        .panel-section-item h4 {
            display: flex;
            align-items: center; 
            gap: 8px;            
        }

        .badge-icon i { font-size: 20px; color: #ffffff; }
        .karier-circle i { font-size: 22px; color: #007a53; }

        .panel-section-item h4 img {
            width: 35px;  
            height: 35px; 
            flex-shrink: 0;          
            object-fit: contain;     
        }

        /* ==========================================================================
           7. MEDIA QUERIES (RESPONSIF PERSIS HOME.HTML)
           ========================================================================== */
        @media (max-width: 1200px) {
            .detail-jurusan-grid {
                grid-template-columns: 1fr 1fr !important;
            }
            .right-panel-wrapper {
                grid-column: span 2;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                width: 90%;
                padding: 5px 15px;
            }

            /* Sembunyikan tombol luar desktop di HP */
            .btn-cta, .btn-profile-desktop {
                display: none !important;
            }
            
            /* Tampilkan elemen tombol di dalam menu dropdown mobile */
            .mobile-only-action {
                display: block !important;
            }
            
            /* Menu Navigasi Tengah tampil sebagai dropdown di HP persis home.html */
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
                display: flex !important;
            }

            .nav-menu a:not(.mobile-login-btn):not(.mobile-profile-btn) {
                margin: 10px 0;
                width: 100%;
                padding-bottom: 8px;
                border-bottom: 1px solid #f1f5f9;
            }

            .hamburger-btn {
                display: flex !important;
            }

            .detail-jurusan-grid {
                grid-template-columns: 1fr !important; 
                gap: 20px;
                padding: 0 10px;
            } 
            .right-panel-wrapper {
                grid-column: span 1;
            }
            .bottom-cta-banner { flex-direction: column; text-align: center; gap: 20px; padding: 25px 20px; }
            .cta-left { flex-direction: column; text-align: center; }
            .cta-button-group { justify-content: center; width: 100%; }
            .hero-text-content h1 { font-size: 24px; }
        }
    </style>
</head>
<body>
    
    <header class="navbar">
        <div class="container nav-container">
            <div class="logo-group">
                <img id="navLogoSekolah" src="{{ asset('img/logo.smk.png') }}" alt="Logo" class="logo-sekolah">
                <img id="navLogoSmkHebat" src="{{ asset('img/logo-smk-hebat.png') }}" alt="SMK Hebat" class="logo-smkhebat">
                <img id="navLogoVokasi" src="{{ asset('img/logo-smk-vokasi.png') }}" alt="Vokasi" class="logo-vokasi">
                <img id="navLogoAkreditasi" src="{{ asset('img/akreditasi.png') }}" alt="Akreditasi A" class="logo-akreditasi-nav">
            </div>
            
            <nav class="nav-menu" id="navMenuDropdown">
                <a href="{{ url('/home') }}">Beranda</a>
                <a href="{{ url('/daftar') }}">Pendaftaran</a>
                <a href="{{ url('/jurusan') }}" class="active">Jurusan</a>
                <a href="{{ url('/informasi') }}">Informasi</a>
                <a href="{{ url('/kontak') }}">Kontak</a>
                
                <!-- Tombol Login / Profil khusus tampilan Mobile -->
                <div class="mobile-only-action">
                    <a href="{{ url('/login') }}" class="mobile-login-btn" id="mobileLoginBtn">Log in</a>
                    <a href="{{ url('/biodata_siswa') }}" class="mobile-profile-btn" id="mobileProfileBtn">
                        <div class="profile-avatar-circle">
                            <img src="{{ asset('img/user.png') }}" alt="Avatar Profil" id="mobileUserAvatar">
                        </div>
                        <span>Profil Saya</span>
                    </a>
                </div>
            </nav>

            <div class="nav-right-actions">
                <!-- Tombol Log In Hijau Desktop -->
                <a href="{{ url('/login') }}" class="btn-cta" id="desktopLoginBtn">Log in</a>
                
                <!-- Tombol Profil Ber-Avatar Desktop -->
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

    <section class="hero-jurusan">
        <div class="container">
            <div class="hero-title-group">
                <div class="hero-number"><span id="detNomor">02</span></div>
                <div class="hero-text-content">
                    <h1 id="detTitle">Broadcasting Dan Perfilman</h1>
                    <h2 id="detSubJudul">Mencetak Talenta Industri Kreatif</h2>
                </div>
            </div>
            <p class="hero-desc" id="detHeroDesc">
                Jurusan Broadcasting dan Perfilman membekali siswa dengan kemampuan merancang, memproduksi, 
                dan mengembangkan berbagai karya audio visual, mulai dari penyiaran, fotografi, videografi, hingga 
                perfilman yang kreatif, inovatif, dan profesional.
            </p>
            
            <div class="hero-badges-container" id="detHeroBadges">
                <div class="hero-badge-item">
                    <div class="badge-icon">
                        <img src="{{ asset('img/Production.png') }}" alt="Coding">
                    </div>
                    <div class="badge-info-text">
                        <span class="title">Production</span>
                        <span class="sub">Video & Film</span>
                    </div>
                </div>

                <div class="hero-badge-item">
                    <div class="badge-icon">
                        <img src="{{ asset('img/photography.png') }}" alt="Game">
                    </div>
                    <div class="badge-info-text">
                        <span class="title">Photography</span>
                        <span class="sub">Creative Visual</span>
                    </div>
                </div>

                <div class="hero-badge-item">
                    <div class="badge-icon">
                        <img src="{{ asset('img/editing.png') }}" alt="Mobile">
                    </div>
                    <div class="badge-info-text">
                        <span class="title">Editing</span>
                        <span class="sub">Audio & Video </span>
                    </div>
                </div>

                <div class="hero-badge-item">
                    <div class="badge-icon">
                        <img src="{{ asset('img/tv & mediadigital.png') }}" alt="Database">
                    </div>
                    <div class="badge-info-text">
                        <span class="title">Broadcasting</span>
                        <span class="sub">TV & Digital Media.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="container main-content-section">
        <div class="detail-jurusan-grid">
            
            <section class="main-detail-card">
                <div class="section-block">
                    <h3>Tentang Jurusan</h3>
                    <p id="detTentang1">Program keahlian <strong>Broadcasting Dan Perfilman (BCF)</strong> merupakan salah satu kompetensi keahlian unggulan yang berfokus pada dunia penyiaran, produksi media, fotografi, videografi, serta industri kreatif digital. Peserta didik akan mempelajari proses produksi konten mulai dari tahap perencanaan, pengambilan gambar, pengolahan audio dan video, hingga menghasilkan karya yang berkualitas dan siap dipublikasikan.</p>
                    <p style="margin-top: 10px;" id="detTentang2">Di jurusan ini, siswa tidak hanya belajar mengoperasikan kamera dan perangkat multimedia, tetapi juga dibekali kemampuan menulis naskah, menyusun konsep produksi, melakukan penyuntingan video, mengatur pencahayaan (lighting), hingga memahami teknik penyiaran televisi, radio, dan media digital. Pembelajaran berbasis proyek (Project Based Learning) menjadikan siswa lebih siap menghadapi kebutuhan industri kreatif dan dunia kerja.</p>
                </div>

                <div class="section-block">
                    <h3>Peluang Karier</h3>
                    <div class="karier-flex-container" id="detKarier">
                        <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/videographer.png') }}" alt="videographer"></div>
                            <div class="karier-text-wrapper"><span>Video Grapher</span></div>
                        </div>
                        <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/edit.png') }}" alt="videoeditor"></div>
                            <div class="karier-text-wrapper"><span>Video Editor</span></div>
                        </div>
                        <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/photographer.png') }}" alt="photographer"></div>
                            <div class="karier-text-wrapper"><span>Photo Grapher</span></div>
                        </div>
                         <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/broadcaster.png') }}" alt="broadcaster"></div>
                            <div class="karier-text-wrapper"><span>Broadcaster</span></div>
                        </div> 
                         <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/content creator.png') }}" alt="content"></div>
                            <div class="karier-text-wrapper"><span>Content Creator</span></div>
                        </div>   
                    </div>
                </div>
            </section>

            <section class="tabel-kompetensi-card">
                <h3>Mata Pelajaran Kompetensi</h3>
                <p style="margin-bottom: 12px;">Berikut adalah daftar mata pelajaran produktif yang akan dipelajari pada Broadcasting Dan Perfilman (BCF):</p>
                
                <table class="tabel-pelajaran">
                    <thead>
                        <tr>
                            <th style="width: 40px;">No</th>
                            <th>Mata Pelajaran Keahlian</th>
                        </tr>
                    </thead>
                    <tbody id="detMapelBody">
                        <tr><td>1</td><td>Dasar-Dasar Broadcasting dan Perfilman</td></tr>
                        <tr><td>2</td><td>Fotografi Digital</td></tr>
                        <tr><td>3</td><td>Videografi</td></tr>
                        <tr><td>4</td><td>Teknik Kamera & Pencahayaan (Lighting)</td></tr>
                        <tr><td>5</td><td>Penyutingan Audio & Video (Editing)</td></tr>
                        <tr><td>6</td><td>Produksi Program Tv,Film & Konten Digital</td></tr>
                        <tr><td>7</td><td>Penulisan Naskah (Script Writing)</td></tr>
                        <tr><td>8</td><td>Broadcasting & Live Streaming</td></tr>
                        <tr><td>9</td><td>Desain Grafis untuk Media Digital</td></tr>
                        <tr><td>10</td><td>Manajemen Produksi & Event Broadcasting</td></tr>
                    </tbody>
                </table>
            </section>

            <aside class="right-panel-wrapper">
                <div class="panel-card">
                    <div class="panel-section-item">
                        <h4><img src="{{ asset('img/orang31.png') }}" alt="icon kuota">Informasi Kuota</h4>
                        <p class="sub-label">Tersedia untuk Tahun ajaran 2027/2028</p>
                        <div class="kuota-display">
                            <span class="kuota-number">60</span>
                            <span class="kuota-unit">Siswa</span>
                        </div>
                        <div class="progress-container"><div class="progress-bar"></div></div>
                        <p class="progress-text">72% Kuota Terpenuhi</p>
                    </div>

                    <hr class="panel-divider">
                    <div class="panel-section-item">
                        <h4><img src="{{ asset('img/gedung2.png') }}" alt="icon gedung"> Fasilitas Pendukung</h4>
                        <ul class="panel-list" id="detFasilitas">
                            <li>Studio Broadcasting & Produksi</li>
                            <li>Kamera DSLR/Mirroless & Peralatan Videografi</li>
                            <li>Laboratorium Editing Audio & Video</li>
                            <li>Internet Berkecepatan Tinggi</li>
                        </ul>
                    </div>

                    <hr class="panel-divider">
                    <div class="panel-section-item">
                        <h4>Peluang Lanjut & Sertifikasi</h4>
                        <ul class="panel-list" id="detSertifikasi">
                            <li>Lanjut ke D3/D4/S1 Ilmu Komunikasi</li>
                            <li>Lanjut ke D3/D4/S1 Desain Komunikasi Visual (DKV)</li>
                            <li>Sertifikasi BNSP Bidang Broadcasing & Perfilman</li>
                        </ul>
                    </div>
                </div>
            </aside>

            <div class="bottom-cta-banner">
                <div class="cta-left">
                    <div class="cta-icon-circle">
                        <img src="{{ asset('img/toga.png') }}" alt="Icon Toga" class="toga-banner-img">
                    </div>
                    <div class="cta-info-text">
                        <h3>Siap menjadi bagian dari generasi digital kreatif?</h3>
                        <p>Bergabunglah bersama kami dan kembangkan potensimu dibidang teknologi perangkat lunak dan gim!</p>
                    </div>
                </div>
                <div class="cta-button-group">
                    <a href="{{ url('/jurusan') }}" class="btn-secondary">← Kembali</a>
                    <a href="{{ url('/daftar') }}" class="btn-primary">Daftar Sekarang →</a>
                </div>
            </div>

        </div>
    </main>

<script>
/* ==========================================================================
   SINKRONISASI DENGAN CMS (localStorage: landing_page_config)
   ========================================================================== */
(function () {
    let config;
    try { config = JSON.parse(localStorage.getItem('landing_page_config')); } catch (e) { config = null; }
    if (!config) return;

    function setSrc(id, value) { if (!value) return; const el = document.getElementById(id); if (el) el.src = value; }
    function setText(id, value) { if (!value) return; const el = document.getElementById(id); if (el) el.textContent = value; }

    if (config.home && config.home.navbarLogos) {
        setSrc('navLogoSekolah', config.home.navbarLogos.logoSekolah);
        setSrc('navLogoSmkHebat', config.home.navbarLogos.logoSmkHebat);
        setSrc('navLogoVokasi', config.home.navbarLogos.logoVokasi);
        setSrc('navLogoAkreditasi', config.home.navbarLogos.logoAkreditasi);
    }

    if (!config.jurusan || !Array.isArray(config.jurusan.list)) return;

    const CURRENT_FILE = 'detail_jurusan_bcf.html';
    const norm = s => String(s || '').trim().toLowerCase();
    const item = config.jurusan.list.find(x => norm(x.link) === norm(CURRENT_FILE));
    if (!item) return;

    setText('detNomor', item.nomor);
    setText('detTitle', item.namaLengkap);
    setText('detSubJudul', item.subJudulDetail);
    setText('detHeroDesc', item.deskripsi);

    if (Array.isArray(item.detail.badges) && item.detail.badges.length) {
        const wrap = document.getElementById('detHeroBadges');
        if (wrap) wrap.innerHTML = item.detail.badges.map(b => `
            <div class="hero-badge-item">
                <div class="badge-icon"><i class="fa-solid ${b.icon || 'fa-star'}"></i></div>
                <div class="badge-info-text">
                    <span class="title">${b.title || ''}</span>
                    <span class="sub">${b.sub || ''}</span>
                </div>
            </div>`).join('');
    }

    setText('detTentang1', item.detail.tentang1);
    setText('detTentang2', item.detail.tentang2);

    if (Array.isArray(item.detail.karier) && item.detail.karier.length) {
        const wrap = document.getElementById('detKarier');
        if (wrap) wrap.innerHTML = item.detail.karier.map(k => `
            <div class="karier-circle-item">
                <div class="karier-circle"><i class="fa-solid ${k.icon || 'fa-star'}"></i></div>
                <div class="karier-text-wrapper"><span>${k.label || ''}</span></div>
            </div>`).join('');
    }

    if (Array.isArray(item.detail.mapel) && item.detail.mapel.length) {
        const tbody = document.getElementById('detMapelBody');
        if (tbody) tbody.innerHTML = item.detail.mapel.map((m, i) => `<tr><td>${i + 1}</td><td>${m.text || ''}</td></tr>`).join('');
    }

    if (Array.isArray(item.detail.fasilitas) && item.detail.fasilitas.length) {
        const ul = document.getElementById('detFasilitas');
        if (ul) ul.innerHTML = item.detail.fasilitas.map(f => `<li>${f.text || ''}</li>`).join('');
    }

    if (Array.isArray(item.detail.sertifikasi) && item.detail.sertifikasi.length) {
        const ul = document.getElementById('detSertifikasi');
        if (ul) ul.innerHTML = item.detail.sertifikasi.map(s => `<li>${s.text || ''}</li>`).join('');
    }
})();

/* ==========================================================================
   SKRIP TOGGLE HAMBURGER MENU MOBILE & STATUS LOGIN (PERSIS HOME.HTML)
   ========================================================================== */
document.addEventListener("DOMContentLoaded", function () {
    const hamburgerBtn = document.getElementById('hamburgerToggle');
    const navMenuDropdown = document.getElementById('navMenuDropdown');

    if (hamburgerBtn && navMenuDropdown) {
        hamburgerBtn.addEventListener('click', function () {
            navMenuDropdown.classList.toggle('active-menu');
        });
    }

    // SIMULASI STATUS LOGIN (Sesuaikan jika memiliki sistem login lokal)
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
   SINKRONISASI KUOTA JURUSAN BCF DARI LOCALSTORAGE (ADMIN KUOTA)
   ========================================================================== */
(function () {
    let savedKuotaList = null;
    try {
        savedKuotaList = JSON.parse(localStorage.getItem('data_kuota_jurusan'));
    } catch (e) {
        savedKuotaList = null;
    }

    if (Array.isArray(savedKuotaList)) {
        const dataBCF = savedKuotaList.find(j => j.kode === "BCF");
        if (dataBCF) {
            const kapasitas = dataBCF.kapasitas;
            const terisi = dataBCF.terisi;
            const persen = Math.round((terisi / kapasitas) * 100);

            const kuotaNumberEl = document.querySelector('.right-panel-wrapper .kuota-number');
            if (kuotaNumberEl) kuotaNumberEl.textContent = kapasitas;

            const progressBarEl = document.querySelector('.right-panel-wrapper .progress-bar');
            if (progressBarEl) progressBarEl.style.width = persen + '%';

            const progressTextEl = document.querySelector('.right-panel-wrapper .progress-text');
            if (progressTextEl) progressTextEl.textContent = `${persen}% Kuota Terpenuhi (${terisi} dari ${kapasitas} Terisi)`;
        }
    }
})();
</script>
</body>
</html>