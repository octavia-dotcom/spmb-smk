<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jurusan MPLB - SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" onerror="this.onerror=null;this.href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css';">
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
            background-color: #ffffff;
            color: #1e293b;
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
           2. TOP BAR & NAVBAR HEADERS
           ========================================================================== */
        .top-header-area {
            background: linear-gradient(135deg, #003a3b 30%, rgba(0, 58, 59, 0.85) 70%, rgba(0, 58, 59, 0.4) 100%), url('img/mplbone.png');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            width: 100%;
        }

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
            gap: 15px;
        }
        .logo-sekolah, .logo-smkhebat, .logo-vokasi, .logo-akreditasi { 
            height: 45px; 
            width: auto; 
        }

        .nav-menu { 
            display: flex; 
            align-items: center;
        }
        .nav-menu a {
            text-decoration: none;
            color: #334155;
            margin: 0 15px;
            font-weight: 600;
            font-size: 15px;
            transition: color 0.3s;
        }
        .nav-menu a:hover, .nav-menu a.active { 
            color: #007a53; 
        }
        
        .btn-cta {
            background-color: #064e3b;
            color: white;
            text-decoration: none;
            padding: 10px 35px;
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

        .hamburger-btn {
            background: none; 
            border: none; 
            cursor: pointer; 
            display: none;
        }

        /* ==========================================================================
           3. HERO JURUSAN SECTION
           ========================================================================== */
        .hero-jurusan {
            background-color: #003a3b;
            background-image: linear-gradient(135deg, #003a3b 30%, rgba(0, 58, 59, 0.85) 70%, rgba(0, 58, 59, 0.4) 100%), url('img/mplbone.png');
            color: #ffffff;
            margin-top: -110px;          
            padding-top: 140px;          
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
           4. LAYOUT TIGA KOLOM
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

        /* Karier Flex Container */
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
             min-width: 70px;
             background: none;
             border: none;
             padding: 0;
             box-shadow: none;
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

        /* Desain Tabel Kompetensi */
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
            display: flex;
            align-items: center; 
            gap: 8px;            
        }
        .panel-card h4 img {
            width: 35px;  
            height: 35px; 
            flex-shrink: 0;          
            object-fit: contain;     
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

        .panel-section-item { padding: 5px 0; }
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
        }
        .cta-info-text h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 20px;
            color: #ffffff;
            font-weight: 800;
            margin-bottom: 6px;
        }
        .cta-info-text p {
            font-size: 12px;
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

        /* ==========================================================================
           7. RESPONSIVE MEDIA QUERIES (Sinkronisasi Hamburger & Mobile Menu)
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
            
            .btn-cta { 
                display: none !important; 
            }
            .hamburger-btn { 
                display: block !important; 
            }

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
                z-index: 1001;
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

            .mobile-login-btn:hover {
                background-color: #047857; 
            }

            .detail-jurusan-grid {
                grid-template-columns: 1fr !important; 
                gap: 20px;
                padding: 0 10px;
            } 
            .right-panel-wrapper {
                grid-column: span 1;
            }
            .bottom-cta-banner { 
                flex-direction: column; 
                text-align: center; 
                gap: 20px; 
                padding: 25px 20px; 
            }
            .cta-left { 
                flex-direction: column; 
                text-align: center; 
            }
            .cta-button-group { 
                justify-content: center; 
                width: 100%; 
            }
            .hero-text-content h1 { 
                font-size: 24px; 
            }
        }
    </style>
</head>
<body>
    
    <header class="navbar">
        <div class="container nav-container">
            <div class="logo-group">
                <img id="navLogoSekolah" src="{{ asset('img/logo.smk.png') }}" alt="Logo" class="logo-sekolah">
                <img id="navLogoVokasi" src="{{ asset('img/logo-smk-vokasi.png') }}" alt="Vokasi" class="logo-vokasi">
                <img id="navLogoSmkHebat" src="{{ asset('img/logo-smk-hebat.png') }}" alt="SMK Hebat" class="logo-smkhebat">
                <img id="navLogoAkreditasi" src="{{ asset('img/akreditasi.png') }}" alt="Akreditasi A" class="logo-akreditasi">
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

            <a href="{{ url('/login') }}" class="btn-cta">Log in</a>

            <button class="hamburger-btn" id="hamburgerBtn" aria-label="Menu Toggle">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#02403f" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
        </div>
    </header>

    <section class="hero-jurusan">
        <div class="container">
            <div class="hero-title-group">
                <div class="hero-number"><span id="detNomor">03</span></div>
                <div class="hero-text-content">
                    <h1 id="detTitle">Manajemen Perkantoran Dan Layanan Bisnis</h1>
                    <h2 id="detSubJudul">Professional Administrasi Modern</h2>
                </div>
            </div>
            <p class="hero-desc" id="detHeroDesc">
                Jurusan Manajemen Perkantoran dan Layanan Bisnis membekali siswa dengan kemampuan mengelola 
                administrasi perkantoran, pelayanan pelanggan, serta kegiatan bisnis secara profesional, efektif, dan 
                berbasis teknologi.
            </p>
            
            <div class="hero-badges-container" id="detHeroBadges">
                <div class="hero-badge-item">
                    <div class="badge-icon"><img src="{{ asset('img/administrasi.png') }}" alt="Administration"></div>
                    <div class="badge-info-text"><span class="title">Administration</span><span class="sub">Office Management</span></div>
                </div>
                <div class="hero-badge-item">
                    <div class="badge-icon"><img src="{{ asset('img/customer.png') }}" alt="Customer Service"></div>
                    <div class="badge-info-text"><span class="title">Customer Service</span><span class="sub">Creative Visual</span></div>
                </div>
                <div class="hero-badge-item">
                    <div class="badge-icon"><img src="{{ asset('img/office comunication.png') }}" alt="Correspondence"></div>
                    <div class="badge-info-text"><span class="title">Correspondence</span><span class="sub">Office Communication</span></div>
                </div>
                <div class="hero-badge-item">
                    <div class="badge-icon"><img src="{{ asset('img/microsoftoffice.png') }}" alt="Digital Office"></div>
                    <div class="badge-info-text"><span class="title">Digital Office</span><span class="sub">Microsoft Office</span></div>
                </div>
            </div>
        </div>
    </section>

    <main class="container main-content-section">
        <div class="detail-jurusan-grid">
            
            <section class="main-detail-card">
                <div class="section-block">
                    <h3>Tentang Jurusan</h3>
                    <p id="detTentang1">Program keahlian <strong>Manajemen Perkantoran dan Layanan Bisnis (MPLB)</strong> merupakan salah satu kompetensi keahlian yang berfokus pada bidang administrasi, pelayanan bisnis, serta pengelolaan perkantoran modern. Peserta didik akan mempelajari berbagai keterampilan administrasi yang didukung dengan pemanfaatan teknologi informasi untuk meningkatkan efektivitas dan produktivitas kerja.</p>
                    <p style="margin-top: 10px;" id="detTentang2">Di jurusan ini, siswa tidak hanya belajar mengelola dokumen dan surat-menyurat, tetapi juga dibekali kemampuan berkomunikasi secara profesional, memberikan pelayanan prima kepada pelanggan, mengoperasikan aplikasi perkantoran, mengelola arsip, hingga memahami dasar-dasar kewirausahaan dan manajemen bisnis sesuai dengan kebutuhan dunia kerja.</p>
                </div>

                <div class="section-block">
                    <h3>Peluang Karier</h3>
                    <div class="karier-flex-container" id="detKarier">
                        <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/comunication.png') }}" alt="Receptionist"></div>
                            <div class="karier-text-wrapper"><span>Receptionist</span></div>
                        </div>
                        <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/human.png') }}" alt="Human Resource"></div>
                            <div class="karier-text-wrapper"><span>Human Resource</span></div>
                        </div>
                        <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/secretary.png') }}" alt="Secretary"></div>
                            <div class="karier-text-wrapper"><span>Secretary</span></div>
                        </div>
                        <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/cstmr.png') }}" alt="Customer Service"></div>
                            <div class="karier-text-wrapper"><span>Customer Service</span></div>
                        </div> 
                        <div class="karier-circle-item">
                            <div class="karier-circle"><img src="{{ asset('img/Business Administration.png') }}" alt="Business Administration"></div>
                            <div class="karier-text-wrapper"><span>Business Administrasi</span></div>
                        </div>   
                    </div>
                </div>
            </section>

            <section class="tabel-kompetensi-card">
                <h3>Mata Pelajaran Kompetensi</h3>
                <p style="margin-bottom: 12px;">Berikut adalah daftar mata pelajaran produktif yang akan dipelajari pada Program Keahlian Manajemen Perkantoran dan Layanan Bisnis (MPLB):</p>
                
                <table class="tabel-pelajaran">
                    <thead>
                        <tr>
                            <th style="width: 40px;">No</th>
                            <th>Mata Pelajaran Keahlian</th>
                        </tr>
                    </thead>
                    <tbody id="detMapelBody">
                        <tr><td>1</td><td>Dasar-Dasar Manajemen Perkantoran</td></tr>
                        <tr><td>2</td><td>Administrasi Perkantoran Modern</td></tr>
                        <tr><td>3</td><td>Korespondensi Bisnis</td></tr>
                        <tr><td>4</td><td>Pengelolaan Arsip Digital</td></tr>
                        <tr><td>5</td><td>Pelayanan Pelanggan (Customer Service)</td></tr>
                        <tr><td>6</td><td>Komunikasi Bisnis</td></tr>
                        <tr><td>7</td><td>Otomatisasi & Layanan Bisnis</td></tr>
                        <tr><td>8</td><td>Kewirausahaan & Layanan Bisnis</td></tr>
                        <tr><td>9</td><td>Pengelolaan Rapat dan Agenda Kerja</td></tr>
                    </tbody>
                </table>
            </section>

            <aside class="right-panel-wrapper">
                <div class="panel-card">
                    <div class="panel-section-item">
                        <h4><img src="{{ asset('img/orang31.png') }}" alt="icon kuota">Informasi Kuota</h4>
                        <p class="sub-label">Tersedia untuk Tahun ajaran 2027/2028</p>
                        <div class="kuota-display">
                            <span class="kuota-number">80</span>
                            <span class="kuota-unit">Siswa</span>
                        </div>
                        <div class="progress-container"><div class="progress-bar"></div></div>
                        <p class="progress-text">72% Kuota Terpenuhi</p>
                    </div>

                    <hr class="panel-divider">
                    <div class="panel-section-item">
                        <h4><img src="{{ asset('img/gedung2.png') }}" alt="icon gedung"> Fasilitas Pendukung</h4>
                        <ul class="panel-list" id="detFasilitas">
                            <li>Laboratorium Komputer</li>
                            <li>Ruang Praktik Administrasi</li>
                            <li>Internet Berkecepatan Tinggi</li>
                        </ul>
                    </div>

                    <hr class="panel-divider">
                    <div class="panel-section-item">
                        <h4>Peluang Lanjut & Sertifikasi</h4>
                        <ul class="panel-list" id="detSertifikasi">
                            <li>Lanjut ke D3/D4/S1 Manajemen Bisnis</li>
                            <li>Sertifikasi Microsoft Office</li>
                            <li>Praktik Kerja Lapangan (PKL) di Dunia Usaha & Dunia Industri (DUDI)</li> 
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
                        <h3>Siap menjadi bagian dari tenaga administrasi profesional?</h3>
                        <p>Bergabunglah bersama kami dan kembangkan potensimu di bidang manajemen perkantoran dan layanan bisnis modern!</p>
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

    const CURRENT_FILE = 'detail_jurusan_mplb.html';
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
   SINKRONISASI KUOTA JURUSAN MPLB DARI LOCALSTORAGE (ADMIN KUOTA)
   ========================================================================== */
(function () {
    let savedKuotaList = null;
    try {
        savedKuotaList = JSON.parse(localStorage.getItem('data_kuota_jurusan'));
    } catch (e) {
        savedKuotaList = null;
    }

    if (Array.isArray(savedKuotaList)) {
        const dataMPLB = savedKuotaList.find(j => j.kode === "MPLB");
        if (dataMPLB) {
            const kapasitas = dataMPLB.kapasitas;
            const terisi = dataMPLB.terisi;
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