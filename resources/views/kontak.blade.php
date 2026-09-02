<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak | SPMB SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          onerror="this.onerror=null;this.href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css';">

    <style>
        /* ==========================================================================
           1. RESET & DASAR
           ========================================================================== */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }

        .container { width: 100%; padding: 0 5%; margin: 0; }
        img { display: block; }
        svg { display: block; }

        /* ==========================================================================
           2. NAVBAR
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

        .logo-group { display: flex; align-items: center; gap: 12px; }

        .logo-sekolah, .logo-smkhebat, .logo-vokasi, .logo-akreditasi-nav {
            height: 45px;
            width: auto;
        }

        .nav-menu { display: flex; align-items: center; }

        .nav-menu a {
            text-decoration: none;
            color: #475569;
            margin: 0 15px;
            font-weight: 600;
            font-size: 15px;
            transition: color 0.3s;
            position: relative;
            padding-bottom: 4px;
        }

        .nav-menu a:hover, .nav-menu a.active { color: #047857; }

        .nav-right-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

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
            gap: 8px;
            transition: background-color 0.3s;
        }

        .btn-cta svg { width: 16px; height: 16px; }
        .btn-cta:hover { background-color: #047857; }

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

        .mobile-only-action {
            display: none;
            width: 100%;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed #cbd5e1;
        }

        .mobile-login-btn {
            background-color: #064e3b;
            color: white !important;
            text-align: center;
            padding: 12px;
            border-radius: 10px;
            font-weight: 700;
            margin-top: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            width: 100%;
        }

        .mobile-login-btn:hover { background-color: #047857; }

        .mobile-profile-btn {
            display: none;
            background-color: #047857;
            color: white !important;
            text-align: center;
            padding: 10px 15px;
            border-radius: 10px;
            font-weight: 600;
            margin-top: 5px;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            width: 100%;
        }

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
           3. HERO "HUBUNGI KAMI"
           ========================================================================== */
        .hero-info {
            background-color: #003a3b;
            background-image: linear-gradient(to right, rgba(0, 58, 59, 1) 35%, rgba(0, 58, 59, 0.88) 55%, rgba(0, 58, 59, 0.35) 100%), url('{{ asset("img/sekolah.png") }}');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            position: relative;
            overflow: hidden;
            margin-top: -110px;
            padding: 150px 0 130px 0;
        }

        .hero-info-inner { position: relative; z-index: 5; max-width: 620px; }

        .hero-info .sub-title {
            color: #6ee7b7;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 3px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }

        .hero-info h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 46px;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .hero-info h1 .highlight { color: #5eead4; }

        .hero-info .desc {
            color: #e2e8f0;
            line-height: 1.7;
            font-size: 15px;
            max-width: 540px;
        }

        .hero-badges { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 32px; }

        .hero-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(0, 43, 44, 0.55);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 12px 18px;
            border-radius: 12px;
            color: #ffffff;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .hero-badge:hover { background: rgba(255, 255, 255, 0.12); transform: translateY(-2px); }

        .hero-badge-icon {
            width: 30px; height: 30px;
            border-radius: 8px;
            background: rgba(255,255,255,0.12);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            color: #5eead4;
        }

        .hero-badge-icon svg { width: 16px; height: 16px; }

        /* ==========================================================================
           4. IKON UMUM & KARTU DASAR
           ========================================================================== */
        .icon-badge svg, .contact-icon svg, .form-icon svg, .method-icon svg, .faq-icon svg, .social-icon svg {
            width: 55%;
            height: 55%;
        }

        .section-card {
            background: #ffffff;
            border-radius: 22px;
            box-shadow: 0 15px 40px rgba(0, 58, 59, 0.10);
            border: 1px solid #eef2f6;
            padding: 34px;
            position: relative;
            z-index: 6;
        }

        .section-card-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
        }

        .icon-badge {
            width: 42px; height: 42px;
            border-radius: 50%;
            background: #064e3b;
            color: #ffffff;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .section-card-header h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 17px;
            font-weight: 700;
            color: #0f172a;
        }

        .section-card-header p { font-size: 12.5px; color: #64748b; margin-top: 2px; }

        /* ==========================================================================
           5. GRID KONTAK UTAMA
           ========================================================================== */
        .kontak-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr 1fr;
            gap: 24px;
            margin: -90px 5% 24px 5%;
            align-items: stretch;
        }

        .contact-list { display: flex; flex-direction: column; gap: 20px; }
        .contact-item { display: flex; gap: 14px; align-items: flex-start; }

        .contact-icon {
            width: 34px; height: 34px;
            border-radius: 50%;
            background: #ecfdf5;
            color: #047857;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .contact-text h4 { font-size: 13.5px; font-weight: 700; color: #0f172a; margin-bottom: 3px; }
        .contact-text p { font-size: 12.5px; color: #64748b; line-height: 1.55; }

        .form-group { position: relative; margin-bottom: 14px; }
        .form-icon {
            position: absolute;
            left: 16px; top: 14px;
            color: #94a3b8;
            width: 18px; height: 18px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 13px 16px 13px 44px;
            font-family: 'Poppins', sans-serif;
            font-size: 13.5px;
            color: #334155;
            outline: none;
            transition: border-color 0.2s;
            appearance: none;
            background-color: #ffffff;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus { border-color: #047857; }

        .form-group select {
            color: #64748b;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
        }

        .form-group textarea { resize: none; min-height: 110px; padding-top: 13px; }
        .form-group .form-icon.textarea-icon { top: 14px; }

        .btn-submit {
            width: 100%;
            background: #064e3b;
            color: #ffffff;
            border: none;
            padding: 15px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 14.5px;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: background-color 0.25s;
        }
        .btn-submit:hover { background: #047857; }
        .btn-submit svg { width: 16px; height: 16px; }

        .jam-table { display: flex; flex-direction: column; margin-bottom: 22px; }
        .jam-row {
            display: flex;
            justify-content: space-between;
            padding: 11px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
        }
        .jam-row:last-child { border-bottom: none; }
        .jam-row .jam-hari { font-weight: 700; color: #0f172a; }
        .jam-row .jam-waktu { color: #64748b; }

        .kontak-melalui-title {
            font-size: 13.5px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .method-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f8fafc;
            border: 1px solid #eef2f6;
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 10px;
            text-decoration: none;
            transition: all 0.2s;
        }
        .method-item:hover { background: #f0fdf4; border-color: #d1fae5; }

        .method-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            color: #ffffff;
            flex-shrink: 0;
        }
        .method-icon.wa { background: #22c55e; }
        .method-icon.mail { background: #2563eb; }
        .method-icon.loc { background: #ef4444; }
        .method-icon.other { background: #64748b; }

        .method-text { flex: 1; }
        .method-text h5 { font-size: 13px; font-weight: 700; color: #0f172a; }
        .method-text p { font-size: 11.5px; color: #64748b; margin-top: 1px; }
        .method-chevron { color: #94a3b8; width: 16px; height: 16px; }

        /* ==========================================================================
           6. LOKASI & FAQ
           ========================================================================== */
        .bottom-grid2 {
            display: grid;
            grid-template-columns: 1.15fr 1fr;
            gap: 24px;
            margin: 0 5% 24px 5%;
            align-items: stretch;
        }

        .lokasi-card { display: flex; flex-direction: column; }
        .map-wrap {
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            flex: 1;
            min-height: 260px;
            position: relative;
        }
        .map-wrap iframe { width: 100%; height: 100%; min-height: 260px; border: 0; }

        .map-address-chip {
            position: absolute;
            left: 14px; bottom: 14px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
            padding: 12px 16px;
            max-width: 240px;
            pointer-events: none;
        }
        .map-address-chip h5 { font-size: 12.5px; font-weight: 700; color: #0f172a; margin-bottom: 3px; }
        .map-address-chip p { font-size: 11px; color: #64748b; line-height: 1.5; }

        .faq-icon { background: #064e3b; }
        .faq-item {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            margin-bottom: 10px;
            overflow: hidden;
        }
        .faq-question {
            width: 100%;
            background: #f8fafc;
            border: none;
            padding: 14px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            font-weight: 600;
            color: #0f172a;
            cursor: pointer;
            text-align: left;
        }
        .faq-question .faq-chevron {
            width: 16px; height: 16px;
            color: #64748b;
            transition: transform 0.25s;
            flex-shrink: 0;
        }
        .faq-item.open .faq-question .faq-chevron { transform: rotate(180deg); }
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.25s ease;
            background: #ffffff;
        }
        .faq-item.open .faq-answer { max-height: 200px; }
        .faq-answer p { padding: 14px 16px; font-size: 12.5px; color: #64748b; line-height: 1.6; }

        /* ==========================================================================
           7. MEDIA SOSIAL
           ========================================================================== */
        .social-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0 5% 60px 5%;
            flex-wrap: wrap;
            gap: 20px;
        }
        .social-bar .left { display: flex; gap: 14px; align-items: center; }
        .social-bar h4 { font-size: 14.5px; font-weight: 700; color: #0f172a; }
        .social-bar .left p { font-size: 12.5px; color: #64748b; margin-top: 2px; }
        .social-icons { display: flex; gap: 12px; }

        .social-icon {
            width: 42px; height: 42px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            color: #ffffff;
            text-decoration: none;
            transition: transform 0.2s;
        }
        .social-icon:hover { transform: translateY(-3px); }
        .social-icon.ig { background: linear-gradient(135deg, #f58529, #dd2a7b, #8134af, #515bd4); }
        .social-icon.fb { background: #1877f2; }
        .social-icon.yt { background: #ff0000; }
        .social-icon.tt { background: #000000; }
        .social-icon.other { background: #334155; }

        .icon-badge i, .contact-icon i, .method-icon i, .hero-badge-icon i, .faq-icon i, .social-icon i {
            font-size: 15px;
        }

        /* ==========================================================================
           8. RESPONSIVE MOBILE & HAMBURGER
           ========================================================================== */
        @media (max-width: 1100px) {
            .kontak-grid { grid-template-columns: 1fr; margin-top: -60px; }
            .bottom-grid2 { grid-template-columns: 1fr; }
        }

        @media (max-width: 768px) {
            .navbar { width: 90%; padding: 5px 15px; }
            .btn-cta, .btn-profile-desktop { display: none !important; }
            .mobile-only-action { display: block; }
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
            .nav-menu.active-menu { display: flex; }
            .nav-menu a:not(.mobile-login-btn):not(.mobile-profile-btn) {
                margin: 10px 0;
                width: 100%;
                padding-bottom: 8px;
                border-bottom: 1px solid #f1f5f9;
            }
            .mobile-login-btn, .mobile-profile-btn { display: flex; width: 100%; }
            .hamburger-btn { display: flex; }
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="nav-container">
            <div class="logo-group">
                <img id="navLogoSekolah" src="{{ asset('img/logo.smk.png') }}" alt="Logo SMK Ma'arif" class="logo-sekolah">
                <img id="navLogoSmkHebat" src="{{ asset('img/logo-smk-hebat.png') }}" alt="Logo SMK Bisa Hebat" class="logo-smkhebat">
                <img id="navLogoVokasi" src="{{ asset('img/logo-smk-vokasi.png') }}" alt="Logo SMK Vokasi" class="logo-vokasi">
                <img id="navLogoAkreditasi" src="{{ asset('img/akreditasi.png') }}" alt="Akreditasi A" class="logo-akreditasi-nav">
            </div>

            <nav class="nav-menu" id="navMenuDropdown">
                <a href="{{ url('home.html') }}">Beranda</a>
                <a href="{{ url('buat akun.html') }}">Pendaftaran</a>
                <a href="{{ url('jurusan.html') }}">Jurusan</a>
                <a href="{{ url('informasi.html') }}">Informasi</a>
                <a href="{{ url('kontak.html') }}" class="active">Kontak</a> 

                <div class="mobile-only-action">
                    <a href="{{ url('log-in.html') }}" class="mobile-login-btn" id="mobileLoginBtn">Log in</a>
                    <a href="{{ url('profil_admin.html') }}" class="mobile-profile-btn" id="mobileProfileBtn">
                        <div class="profile-avatar-circle">
                            <img src="{{ asset('img/user.png') }}" alt="Avatar Profil" id="mobileUserAvatar">
                        </div>
                        <span>Profil Saya</span>
                    </a>
                </div>
            </nav>
            
            <div class="nav-right-actions">
                <a href="{{ url('log-in.html') }}" class="btn-cta" id="desktopLoginBtn">Log in</a>
                
                <a href="{{ url('profil.html') }}" class="btn-profile-desktop" id="desktopProfileBtn">
                    <div class="profile-avatar-circle">
                        <img src="{{ asset('img/user-default.png') }}" alt="Avatar Profil" id="desktopUserAvatar">
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

    <section class="hero-info" id="kkHeroSection">
        <div class="container hero-info-inner">
            <div class="sub-title" id="kkSubTxt">SPMB SMK Ma'arif Walisongo Kajoran</div>
            <h1><span id="kkTitle1Txt">Hubungi</span> <span class="highlight" id="kkTitle2Txt">Kami</span></h1>
            <p class="desc" id="kkDescTxt">Kami siap membantu proses pendaftaran peserta didik baru SMK Ma'arif Walisongo Kajoran. Jangan ragu menghubungi kami jika memiliki pertanyaan.</p>

            <div class="hero-badges" id="kkHeroBadgesWrap">
                <div class="hero-badge">
                    <span class="hero-badge-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 5a2 2 0 0 1 2-2h3l2 5-2.5 1.5a11 11 0 0 0 5 5L14 12l5 2v3a2 2 0 0 1-2 2h-1C9.6 19 5 14.4 5 8V5z"></path></svg>
                    </span>
                    Respon Cepat
                </div>
                <div class="hero-badge">
                    <span class="hero-badge-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                    </span>
                    6 Hari Layanan
                </div>
                <div class="hero-badge">
                    <span class="hero-badge-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 6-9 12-9 12S3 16 3 10a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </span>
                    Kajoran, Magelang
                </div>
            </div>
        </div>
    </section>

    <div class="kontak-grid">
        <section class="section-card">
            <div class="section-card-header">
                <div class="icon-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                </div>
                <div><h2>Informasi Kontak</h2></div>
            </div>

            <div class="contact-list" id="kontakListWrap">
                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 6-9 12-9 12S3 16 3 10a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </div>
                    <div class="contact-text">
                        <h4>Alamat Sekolah</h4>
                        <p>Jl.KH.Ridwan Sidowangi Kajoran, Magelang<br>Jawa Tengah 56163</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    </div>
                    <div class="contact-text">
                        <h4>Telepon</h4>
                        <p>(0293) 3195678</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 5a2 2 0 0 1 2-2h3l2 5-2.5 1.5a11 11 0 0 0 5 5L14 12l5 2v3a2 2 0 0 1-2 2h-1C9.6 19 5 14.4 5 8V5z"></path></svg>
                    </div>
                    <div class="contact-text">
                        <h4>WhatsApp Admin PPDB</h4>
                        <p>029-3319-5678</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="m22 7-10 6L2 7"></path></svg>
                    </div>
                    <div class="contact-text">
                        <h4>Email</h4>
                        <p>smkmwalisongokajoran@yahoo.com</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                    </div>
                    <div class="contact-text">
                        <h4>Website</h4>
                        <p>smkmaarifwalisongokajoran.sch.id/en</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-card">
            <div class="section-card-header">
                <div class="icon-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </div>
                <div>
                    <h2 id="kkFormTitleTxt">Kirim Pesan</h2>
                    <p id="kkFormSubTxt">Sampaikan pertanyaan atau informasi yang ingin Anda tanyakan.</p>
                </div>
            </div>

            <form onsubmit="return false;">
                <div class="form-group">
                    <svg class="form-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <input type="text" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <svg class="form-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="m22 7-10 6L2 7"></path></svg>
                    <input type="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <svg class="form-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 5a2 2 0 0 1 2-2h3l2 5-2.5 1.5a11 11 0 0 0 5 5L14 12l5 2v3a2 2 0 0 1-2 2h-1C9.6 19 5 14.4 5 8V5z"></path></svg>
                    <input type="text" placeholder="Nomor WhatsApp">
                </div>
                <div class="form-group">
                    <svg class="form-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><path d="M14 2v6h6"></path><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                    <select id="kkFormSubjekSelect">
                        <option value="" disabled selected>Pilih Subjek</option>
                        <option>Pendaftaran</option>
                        <option>Jurusan</option>
                        <option>Beasiswa</option>
                        <option>Lainnya</option>
                    </select>
                </div>
                <div class="form-group">
                    <svg class="form-icon textarea-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3a2.85 2.85 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5z"></path></svg>
                    <textarea placeholder="Pesan Anda"></textarea>
                </div>

                <button type="submit" class="btn-submit">
                    Kirim Pesan
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                </button>
            </form>
        </section>

        <section class="section-card">
            <div class="section-card-header">
                <div class="icon-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                </div>
                <div><h2>Jam Pelayanan</h2></div>
            </div>

            <div class="jam-table" id="jamTableWrap">
                <div class="jam-row"><span class="jam-hari">Senin - Kamis</span><span class="jam-waktu">07.00 - 12.00 WIB</span></div>
                <div class="jam-row"><span class="jam-hari">Jumat</span><span class="jam-waktu">07.00 - 11.30 WIB</span></div>
                <div class="jam-row"><span class="jam-hari">Sabtu</span><span class="jam-waktu">07.00 - 12.00 WIB</span></div>
                <div class="jam-row"><span class="jam-hari">Minggu & Hari Libur</span><span class="jam-waktu">Tutup</span></div>
            </div>

            <div class="kontak-melalui-title">Hubungi Kami Melalui</div>

            <div id="metodeKontakWrap">
                <a href="https://wa.me/02933195678" class="method-item">
                    <div class="method-icon wa">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 5a2 2 0 0 1 2-2h3l2 5-2.5 1.5a11 11 0 0 0 5 5L14 12l5 2v3a2 2 0 0 1-2 2h-1C9.6 19 5 14.4 5 8V5z"></path></svg>
                    </div>
                    <div class="method-text">
                        <h5>Chat WhatsApp</h5>
                        <p>Klik untuk chat langsung</p>
                    </div>
                    <svg class="method-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>

                <a href="mailto:smkmwalisongokajoran@yahoo.com" class="method-item">
                    <div class="method-icon mail">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"></rect><path d="m22 7-10 6L2 7"></path></svg>
                    </div>
                    <div class="method-text">
                        <h5>Kirim Email</h5>
                        <p>Kirim pertanyaan via email</p>
                    </div>
                    <svg class="method-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>

                <a href="https://maps.app.goo.gl/gfkDG7RiJBxH7sQMA" class="method-item">
                    <div class="method-icon loc">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 6-9 12-9 12S3 16 3 10a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    </div>
                    <div class="method-text">
                        <h5>Lihat Lokasi</h5>
                        <p>Temukan lokasi kami di Maps</p>
                    </div>
                    <svg class="method-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
            </div>
        </section>
    </div>

    <div class="bottom-grid2">
        <section class="section-card lokasi-card">
            <div class="section-card-header">
                <div class="icon-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 6-9 12-9 12S3 16 3 10a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <div><h2>Lokasi Kami</h2></div>
            </div>

            <div class="map-wrap">
                <iframe id="kkLokasiIframe" src="https://www.google.com/maps?q=SMK+Ma%27arif+Walisongo+Kajoran,+Magelang&output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="map-address-chip">
                    <h5 id="kkLokasiNamaTxt">SMK Ma'arif Walisongo Kajoran</h5>
                    <p id="kkLokasiAlamatTxt">Jl. Walisongo No.1, Kajoran, Magelang, Jawa Tengah 56163</p>
                </div>
            </div>
        </section>

        <section class="section-card">
            <div class="section-card-header">
                <div class="icon-badge faq-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                </div>
                <div><h2>Frequently Asked Questions</h2></div>
            </div>

            <div id="faqListWrap">
                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Bagaimana jika lupa password akun?
                        <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="faq-answer">
                        <p>Klik "Lupa Password" pada halaman login, lalu ikuti instruksi reset password yang dikirim melalui email terdaftar Anda.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Apakah bisa daftar langsung ke sekolah?
                        <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="faq-answer">
                        <p>Pendaftaran hanya dilakukan secara online melalui website SPMB ini. Panitia dapat membantu jika Anda datang langsung ke sekolah.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question" onclick="toggleFaq(this)">
                        Bagaimana cara mengetahui hasil seleksi?
                        <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="faq-answer">
                        <p>Hasil seleksi dapat dilihat melalui dashboard akun Anda pada tanggal pengumuman sesuai gelombang pendaftaran yang diikuti.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="section-card social-bar">
        <div class="left">
            <div class="icon-badge" style="position: relative; margin-right: 14px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="9" width="20" height="12" rx="2"></rect><path d="M16 3H8L6 9h12z"></path></svg>
            </div>
            <div>
                <h4>Ikuti Kami di Media Sosial</h4>
                <p>Dapatkan informasi terbaru seputar kegiatan dan PPDB kami.</p>
            </div>
        </div>

        <div class="social-icons" id="socialIconsWrap">
            <a href="https://www.instagram.com/officialsmkmw9?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="social-icon ig" aria-label="Instagram">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:20px;height:20px;"><rect x="2" y="2" width="20" height="20" rx="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            </a>
            <a href="https://www.facebook.com/pages/SMKS%20MA%60ARIF%20WALISONGO%20KAJORAN/1631217363784893/#" class="social-icon fb" aria-label="Facebook">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;"><path d="M13.5 21v-8.5H16l.5-3.5h-3V6.8c0-1 .3-1.7 1.7-1.7H16.5V2c-.3 0-1.4-.1-2.6-.1-2.6 0-4.4 1.6-4.4 4.5V9H7v3.5h2.5V21h4z"></path></svg>
            </a>
            <a href="https://www.youtube.com/@officialsmkmaarifwalisongo1198" class="social-icon yt" aria-label="YouTube">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width:20px;height:20px;"><path d="M9.5 8.5v7l6-3.5z"></path><rect x="2" y="5" width="20" height="14" rx="4" fill="none" stroke="currentColor" stroke-width="2"></rect></svg>
            </a>
            <a href="https://www.tiktok.com/@officialsmkmw9?is_from_webapp=1&sender_device=pc" class="social-icon tt" aria-label="TikTok">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width:18px;height:18px;"><path d="M14 2h3a5 5 0 0 0 4 4.5V10a8 8 0 0 1-4-1.1V15a6 6 0 1 1-6-6c.3 0 .7 0 1 .08V12.2a2.6 2.6 0 1 0 1.8 2.5V2z"></path></svg>
            </a>
        </div>
    </div>

    <footer class="footer-section" style="background:#003a3b; color:#e2e8f0; text-align:center; padding: 26px 5%; font-size: 13px; margin-top: 40px;">
        <p>© 2026 SMK Ma'arif Walisongo Kajoran. All Rights Reserved.</p>
    </footer>

    <script>
        function toggleFaq(btn) {
            const item = btn.closest('.faq-item');
            const wasOpen = item.classList.contains('open');
            document.querySelectorAll('.faq-item.open').forEach(el => el.classList.remove('open'));
            if (!wasOpen) item.classList.add('open');
        }

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
                if (mobileLoginBtn) mobileLoginBtn.style.display = 'flex';
                if (mobileProfileBtn) mobileProfileBtn.style.display = 'none';
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

            if (!config.kontak) return;
            const k = config.kontak;

            if (k.hero) {
                setText('kkSubTxt', k.hero.sub);
                setText('kkTitle1Txt', k.hero.title1);
                setText('kkTitle2Txt', k.hero.title2);
                setText('kkDescTxt', k.hero.desc);
                if (k.hero.bgImage) {
                    const section = document.getElementById('kkHeroSection');
                    if (section) section.style.backgroundImage =
                        `linear-gradient(to right, rgba(0, 58, 59, 1) 35%, rgba(0, 58, 59, 0.88) 55%, rgba(0, 58, 59, 0.35) 100%), url('${k.hero.bgImage}')`;
                }
                if (Array.isArray(k.hero.badges) && k.hero.badges.length) {
                    const wrap = document.getElementById('kkHeroBadgesWrap');
                    if (wrap) wrap.innerHTML = k.hero.badges.map(b => `
                        <div class="hero-badge">
                            <span class="hero-badge-icon"><i class="fa-solid ${b.icon || 'fa-star'}"></i></span>
                            ${b.label || ''}
                        </div>`).join('');
                }
            }

            if (Array.isArray(k.kontakList) && k.kontakList.length) {
                const wrap = document.getElementById('kontakListWrap');
                if (wrap) wrap.innerHTML = k.kontakList.map(c => `
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fa-solid ${c.icon || 'fa-circle-info'}"></i></div>
                        <div class="contact-text">
                            <h4>${c.judul || ''}</h4>
                            <p>${(c.isi || '').replace(/\n/g, '<br>')}</p>
                        </div>
                    </div>`).join('');
            }

            if (k.form) {
                setText('kkFormTitleTxt', k.form.title);
                setText('kkFormSubTxt', k.form.sub);
                if (Array.isArray(k.form.subjek) && k.form.subjek.length) {
                    const sel = document.getElementById('kkFormSubjekSelect');
                    if (sel) sel.innerHTML = '<option value="" disabled selected>Pilih Subjek</option>' +
                        k.form.subjek.map(s => `<option>${s}</option>`).join('');
                }
            }

            if (Array.isArray(k.jamPelayanan) && k.jamPelayanan.length) {
                const wrap = document.getElementById('jamTableWrap');
                if (wrap) wrap.innerHTML = k.jamPelayanan.map(j => `
                    <div class="jam-row"><span class="jam-hari">${j.hari || ''}</span><span class="jam-waktu">${j.waktu || ''}</span></div>`).join('');
            }

            if (Array.isArray(k.metodeKontak) && k.metodeKontak.length) {
                const wrap = document.getElementById('metodeKontakWrap');
                const colorClass = icon => icon === 'fa-comment' ? 'wa' : icon === 'fa-envelope' ? 'mail' : icon === 'fa-location-dot' ? 'loc' : 'other';
                if (wrap) wrap.innerHTML = k.metodeKontak.map(m => `
                    <a href="${m.link || '#'}" class="method-item">
                        <div class="method-icon ${colorClass(m.icon)}"><i class="fa-solid ${m.icon || 'fa-link'}"></i></div>
                        <div class="method-text">
                            <h5>${m.judul || ''}</h5>
                            <p>${m.desc || ''}</p>
                        </div>
                        <svg class="method-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </a>`).join('');
            }

            if (k.lokasi) {
                setText('kkLokasiNamaTxt', k.lokasi.nama);
                setText('kkLokasiAlamatTxt', k.lokasi.alamat);
                if (k.lokasi.embed) { const el = document.getElementById('kkLokasiIframe'); if (el) el.src = k.lokasi.embed; }
            }

            if (Array.isArray(k.faq) && k.faq.length) {
                const wrap = document.getElementById('faqListWrap');
                if (wrap) wrap.innerHTML = k.faq.map(f => `
                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleFaq(this)">
                            ${f.pertanyaan || ''}
                            <svg class="faq-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div class="faq-answer">
                            <p>${f.jawaban || ''}</p>
                        </div>
                    </div>`).join('');
            }

            if (Array.isArray(k.sosmed) && k.sosmed.length) {
                const wrap = document.getElementById('socialIconsWrap');
                const iconMap = {
                    instagram: 'fa-instagram', facebook: 'fa-facebook-f', youtube: 'fa-youtube', tiktok: 'fa-tiktok'
                };
                if (wrap) wrap.innerHTML = k.sosmed.map(s => `
                    <a href="${s.link || '#'}" class="social-icon ${['instagram','facebook','youtube','tiktok'].includes(s.platform) ? (s.platform === 'instagram' ? 'ig' : s.platform === 'facebook' ? 'fb' : s.platform === 'youtube' ? 'yt' : 'tt') : 'other'}" aria-label="${s.platform || 'Sosial'}">
                        <i class="fa-brands ${iconMap[s.platform] || 'fa-link'}"></i>
                    </a>`).join('');
            }
        })();
    </script>
</body>
</html>