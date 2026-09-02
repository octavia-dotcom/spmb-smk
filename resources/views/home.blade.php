<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMB SMK Ma'arif Walisongo Kajoran</title>
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
            background-color: #f8fafc;
            color: #334155;
        }

        .container {
             width: 100%;
             max-width: 100%; 
             padding: 0 5%;  
             margin: 0;       
        }

        /* ==========================================================================
           2. NAVBAR ATAS (KOTAK PUTIH KAPSUL MELAYANG)
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

        .logo-sekolah { height: 45px; width: auto; }
        .logo-smkhebat { height: 45px; width: auto; }
        .logo-vokasi { height: 45px; width: auto; }
        .logo-akreditasi-nav { height: 45px; width: auto; }

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
            display: none; /* Disembunyikan di Desktop */
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
            padding: 12px;
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

        .mobile-profile-btn {
            display: none; /* Diatur via JS jika sudah login */
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
           3. HERO SECTION & BACKGROUND
           ========================================================================== */
        .hero {
            background-color: #003a3b;
            background-image: linear-gradient(to right, rgba(0, 58, 59, 1) 30%, rgba(0, 58, 59, 0.8) 50%, rgba(0, 58, 59, 0.15) 100%), url('img/sekolah.png');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            padding: 40px 0 140px 0;
            position: relative;
            overflow: hidden;
            margin-top: -110px;
            padding-top: 150px;
        }

        .hero-container {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 40px;
            align-items: center;
            position: relative;
            z-index: 5;
        }

        .sub-title {
            color: #6ee7b7;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .hero-text h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 48px;
            font-weight: 800;
            line-height: 1.2;
        }

        .highlight {
            color: #5eead4;
        }

        .desc {
            color: #e2e8f0;
            margin-top: 20px;
            line-height: 1.6;
            max-width: 550px;
            font-size: 15px;
        }

        .badge-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 30px;
            max-width: 850px;
        }

        .badge-card {
            display: flex;
            align-items: center;
            background: rgba(0, 43, 44, 0.65);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 14px 20px;
            border-radius: 12px;
            color: #ffffff;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .badge-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .badge-icon-box {
            width: 42px;
            height: 42px;
            margin-right: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .badge-icon-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .badge-card:not(:last-child) .badge-icon-box img {
            filter: brightness(0) invert(1); 
        }

        .btn-group {
            margin-top: 40px;
            display: flex;
            gap: 15px;
            position: relative;
            z-index: 10;
        }

        .btn-primary {
            background-color: white;
            color: #022c22;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 12px;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            transition: 0.3s;
        }

        .btn-primary:hover {
            background-color: #e2e8f0;
        }

        .btn-secondary {
            border: 1px solid rgba(255,255,255,0.4);
            color: white;
            text-decoration: none;
            padding: 15px 25px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .hero-image {
            display: flex;
            justify-content: center;
            position: relative;
        }

        .image-box {
            width: 100%;
            max-width: 340px;
            height: auto;
            padding: 0px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            margin-top: 32px;
        }

        .foto-hero {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 14px;
        }
        
        /* ==========================================================================
           4. TIMELINE & KOTAK INFO SEKOLAH
           ========================================================================== */
        .ppdb-flow-container {
            padding: 0 3%;
            margin-top: -80px;
            position: relative;
            z-index: 10;
        }

        .ppdb-flow-card {
            display: flex;
            width: 100%;
            margin: 0 auto;
            height: 260px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .ppdb-sidebar-green {
            width: 280px;
            background: linear-gradient(135deg, #003a3b 0%, #046e56 100%);
            padding: 35px 25px;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-shrink: 0;
        }

        .ppdb-sidebar-green h3 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .ppdb-sidebar-green p {
            font-size: 13px;
            color: #ccfbf1;
            line-height: 1.5;
            margin-bottom: 25px;
        }

        .ppdb-flow-steps {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 0 20px;
            position: relative;
        }

        .ppdb-step-line {
            position: absolute;
            top: 35%;
            left: 8%;
            width: 84%;
            height: 2px;
            border-top: 2px dashed #cbd5e1;
            z-index: 1;
        }

        .flow-step-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .flow-icon-circle {
            width: 95px;
            height: 95px;
            background: #ffffff;
            border-radius: 50%;
            box-shadow: 0 8px 20px rgba(0,0,0,0.06);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            border: 1px solid #f1f5f9;
        }

        .flow-icon-circle img {
            width: 80%;
            height: 80%;
            object-fit: contain;
        }

        .flow-step-num {
            font-size: 12px;
            font-weight: 700;
            color: #94a3b8;
            margin-bottom: 3px;
        }

        .flow-step-title {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 5px;
        }

        .flow-step-desc {
            font-size: 11px;
            color: #64748b;
            max-width: 120px;
            line-height: 1.4;
        }

        @media (max-width: 992px) {
            .ppdb-flow-card { 
                flex-direction: column; 
                height: auto; 
            }
            .ppdb-sidebar-green { 
                width: 100%; 
                text-align: center; 
                align-items: center; 
            }
            .ppdb-flow-steps { 
                flex-direction: column; 
                padding: 40px 0; 
                gap: 30px; 
            }
            .ppdb-step-line { 
                display: none; 
            }
        }

        /* KOTAK INFO SEKOLAH */
        .info-school-section {
            padding: 40px 0 0 0;
        }

        .info-school-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            width: 100%;
            max-width: 1500px;
            margin: 40px auto 100 auto;
            padding: 0 5%;
            box-sizing: border-box;
        }

        .info-box-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.04);
            border: 1px solid #e2e8f0;
            padding: 35px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .info-box-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: #003a3b;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 12px;
        }

        .info-box-title img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .visi-wrapper {
            background: #f8fafc;
            border-left: 4px solid #047857;
            padding: 15px 20px;
            border-radius: 0 12px 12px 0;
            margin-bottom: 25px;
        }

        .visi-label {
            font-size: 12px;
            font-weight: 700;
            color: #047857;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .visi-text {
            font-size: 15px;
            font-weight: 600;
            color: #0f172a;
            font-style: italic;
            line-height: 1.5;
        }

        .misi-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .misi-list li {
            font-size: 13px;
            line-height: 1.6;
            color: #475569;
            position: relative;
            padding-left: 25px;
        }

        .misi-list li::before {
            content: "✓";
            position: absolute;
            left: 0;
            top: 0;
            color: #047857;
            font-weight: 900;
            font-size: 15px;
        }

        .jadwal-timeline {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 30px;
        }

        .jadwal-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to right, #f8fafc, #ffffff);
            padding: 14px 20px;
            border-radius: 12px;
            border: 1px solid #f1f5f9;
        }

        .jadwal-gel {
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
        }

        .jadwal-tgl {
            font-size: 13px;
            font-weight: 600;
            color: #047857;
            background: #e6f4ea;
            padding: 4px 12px;
            border-radius: 30px;
        }

        .unit-usaha-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-top: 10px;
        }

        .unit-usaha-item {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 8px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }

        .unit-usaha-item:hover {
            border-color: #047857;
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .unit-usaha-item img {
            max-width: 150%;
            max-height: 150%;
            object-fit: contain;
        }

        @media (max-width: 992px) {
            .info-school-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
        }

        /* ==========================================================================
           5. RESPONSIVE MOBILE & HAMBURGER
           ========================================================================== */
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
                display: block;
            }
            
            /* Menu Navigasi Tengah tampil sebagai dropdown di HP */
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

            .hero-container {
                grid-template-columns: 1fr;
            }

            .hero-text h1 {
                font-size: 32px;
            }

            .badge-container {
                grid-template-columns: repeat(2, 1fr);
            }
        } 
        
        /* ==========================================================================
           6. FITUR UTAMA & FOOTER
           ========================================================================== */
        .fitur-section {
            margin-top: -30px;
            padding: 30px 3% 60px 3%;
            text-align: center;
        }

        .fitur-title-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 40px;
            margin-top: 50px;
        }

        .fitur-line {
            flex: 1;
            max-width: 150px;
            height: 2px;
            background: linear-gradient(to right, transparent, #047857, transparent);
        }

        .fitur-title-wrapper h2 {
            color: #003a3b;
            font-size: 24px;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .fitur-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            justify-content: center;
            gap: 15px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .fitur-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-align: left;
            box-shadow: 0 4px 15px rgba(0,0,0,0.01);
            transition: all 0.3s ease;
            width: 100%;
        }

        .fitur-card:hover {
            transform: translateY(-3px);
            border-color: #047857;
            box-shadow: 0 6px 20px rgba(4, 120, 87, 0.08);
        }

        .fitur-icon-box {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .fitur-icon-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .fitur-info h4 {
            font-size: 13px;
            color: #0f172a;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .fitur-info p {
            font-size: 11px;
            color: #64748b;
            line-height: 1.4;
        }

        @media (max-width: 1024px) {
            .fitur-grid { grid-template-columns: repeat(3, 1fr); }
        }
        
        @media (max-width: 768px) {
            .fitur-grid { 
                grid-template-columns: repeat(2, 1fr); 
                gap: 10px;
            }
            .fitur-card {
                padding: 12px;
                gap: 8px;
            }
            .fitur-icon-box {
                width: 35px;
                height: 35px;
            }
            .fitur-info h4 {
                font-size: 11px;
            }
            .fitur-info p {
                font-size: 9px;
            }
        }
        
        .footer-section {
            background-color: #003a3b;
            color: #ffffff;
            padding: 60px 5% 30px 5%;
            margin-top: 60px;
            font-family: sans-serif;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            justify-content: space-between;
            max-width: 1250px;
            margin: 0 auto;
        }

        .footer-info-col {
            flex: 1;
            min-width: 300px;
        }

        .footer-info-col h3 {
            font-size: 22px;
            color: #5eead4;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .footer-info-col p {
            font-size: 14px;
            color: #e2e8f0;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .sosmed-wrapper {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .sosmed-link {
            width: 45px;
            height: 45px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .sosmed-link:hover {
            transform: scale(1.1);
            background-color: rgba(255, 255, 255, 0.2); 
        }

        .sosmed-link img {
            width: 25px;
            height: 25px;
            object-fit: contain;
        }

        .footer-maps-col {
            flex: 1;
            min-width: 300px;
            max-width: 600px;
        }

        .footer-maps-col h3 {
            font-size: 18px;
            color: #5eead4;
            margin-bottom: 15px;
        }

        .map-responsive {
            overflow: hidden;
            border-radius: 12px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            height: 250px;
        }

        .map-responsive iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .footer-copyright { 
            text-align: center;
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 13px;
            color: #94a3b8;
        }

        @media (max-width: 768px) {
            .footer-container { flex-direction: column; }
            .footer-maps-col { max-width: 100%; }
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

            <!-- Menu Navigasi Tengah + Tombol Login di Dalam Dropdown Mobile -->
            <nav class="nav-menu" id="navMenuDropdown">
                <a href="{{ url('/') }}" class="active">Beranda</a>
                <a href="{{ url('/daftar') }}">Pendaftaran</a>
                <a href="{{ url('/jurusan') }}">Jurusan</a>
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

    <section class="hero" id="heroSection">
        <div class="container hero-container">
            <div class="hero-text">
                <p class="sub-title" id="heroSubTitle">SISTEM PENERIMAAN MURID BARU</p>
                <h1><span id="heroTitleLine1">SMK MA'ARIF</span> <br><span class="highlight" id="heroTitleLine2">WALISONGO KAJORAN</span></h1>
                <p class="desc" id="heroDesc">Membentuk generasi unggul, berkarakter, berkompeten dan berdaya saing global melalui pendidikan vokasi berkualitas dan berlandaskan nilai-nilai Islam.</p>
                
                <div class="badge-container" id="heroBadges">
                    <div class="badge-card">
                        <div class="badge-icon-box"><img src="{{ asset('img/toga.png') }}" alt="Sekolah Islam Berprestasi"></div>
                        <span>Sekolah Islam Berprestasi</span>
                    </div>
                    <div class="badge-card">
                        <div class="badge-icon-box"><img src="{{ asset('img/settings.png') }}" alt="Kompeten di Bidangnya"></div>
                        <span>Kompeten di Bidangnya</span>
                    </div>
                    <div class="badge-card">
                        <div class="badge-icon-box"><img src="{{ asset('img/orang3.png') }}" alt="Siap Kerja & Wirausaha"></div>
                        <span>Siap Kerja & Wirausaha</span>
                    </div>
                    <div class="badge-card">
                        <div class="badge-icon-box"><img src="{{ asset('img/globe.png') }}" alt="Berwawasan Global"></div>
                        <span>Berwawasan Global</span>
                     </div>
                </div>

                <div class="btn-group">
                    <a href="{{ url('/daftar') }}" class="btn-primary" id="heroBtn1">Daftar Sekarang  →</a>
                    <a href="{{ url('/jurusan') }}" class="btn-secondary" id="heroBtn2">Lihat Jurusan </a>
                </div>
            </div>

            <div class="hero-image">
                <div class="image-box">
                    <img src="{{ asset('img/spmb.jpeg') }}" alt="Siswa Berjas Hijau" class="foto-hero" id="heroFotoSiswa">
                </div>
            </div>
        </div>
    </section>

    <!-- BAGIAN PPDB FLOW -->
    <section class="ppdb-flow-container">
        <div class="ppdb-flow-card">
            <div class="ppdb-sidebar-green">
                <h3 id="ppdbTitle">SISTEM SPMB ONLINE</h3>
                <p id="ppdbDesc">"Solusi praktis pendaftaran bagi calon siswa baru yang terkendala jarak dan waktu. Nikmati kemudahan pengisian formulir hingga unggah berkas cukup lewat smartphone Anda."</p>
            </div>
            <div class="ppdb-flow-steps" id="ppdbSteps">
                <div class="ppdb-step-line"></div>
                <div class="flow-step-item">
                    <div class="flow-icon-circle"><img src="{{ asset('img/orangtambah.png') }}" alt="Buat Akun"></div>
                    <div class="flow-step-num">LANGKAH 1</div>
                    <div class="flow-step-title">Buat Akun</div>
                    <div class="flow-step-desc">Log in dan lengkapi data diri anda untuk membuat akun pendaftaran.</div>
                </div>
                <div class="flow-step-item">
                    <div class="flow-icon-circle"><img src="{{ asset('img/note.png') }}" alt="Isi Formulir"></div>
                    <div class="flow-step-num">LANGKAH 2</div>
                    <div class="flow-step-title">Isi Formulir</div>
                    <div class="flow-step-desc">Isi formulir biodata siswa secara lengkap dan benar.</div>
                </div>
                <div class="flow-step-item">
                    <div class="flow-icon-circle"><img src="{{ asset('img/i_cloud.png') }}" alt="Unggah Berkas"></div>
                    <div class="flow-step-num">LANGKAH 3</div>
                    <div class="flow-step-title">Unggah Berkas</div>
                    <div class="flow-step-desc">Upload berkas administrasi seperti KK dan Akta Kelahiran.</div>
                </div>
                <div class="flow-step-item">
                    <div class="flow-icon-circle"><img src="{{ asset('img/centang.png') }}" alt="Verifikasi"></div>
                    <div class="flow-step-num">LANGKAH 4</div>
                    <div class="flow-step-title">Verifikasi Data</div>
                    <div class="flow-step-desc">Tunggu proses pengecekan berkas oleh panitia sekolah.</div>
                </div>
                <div class="flow-step-item">
                    <div class="flow-icon-circle"><img src="{{ asset('img/badge_reward.png') }}" alt="Pengumuman"></div>
                    <div class="flow-step-num">LANGKAH 5</div>
                    <div class="flow-step-title">Pengumuman</div>
                    <div class="flow-step-desc">Lihat hasil seleksi penerimaan langsung di dashboard.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- KOTAK INFO SEKOLAH -->
    <section class="info-school-section">
        <div class="info-school-grid">
            <div class="info-box-card">
                <div class="info-box-title"><img src="{{ asset('img/visi & misi.png') }}" alt="ikon">Visi & Misi Sekolah</div>
                <div class="visi-wrapper">
                    <div class="visi-label">VISI</div>
                    <div class="visi-text" id="visiText">“Sekolah Kejuruan yang unggul, Bertaqwa Berkarakter, Terampil, dan Professional”</div>
                </div>
                <div class="visi-label" style="margin-bottom: 10px;">MISI</div>
                <ul class="misi-list" id="misiList">
                    <li>Menanamkan nilai-nilai Islam Ahlussunah Wal Jama’ah nilai-nilai kebangsaan dengan berkarakter tinggi dan berakhlak mulia.</li>
                    <li>Meningkatkan mutu penyelenggaraan pendidikan sehingga menghasilkan lulusan yang memiliki kompetensi yang kompetitif.</li>
                    <li>Meningkatkan keterampilan di bidang kejuruan.</li>
                    <li>Memiliki kompetensi dan membangun jiwa wirausaha yang handal.</li>
                    <li>Melaksanakan sistem pendidikan berbasis teknologi informasi dan komunikasi.</li>
                </ul>
            </div>

            <div class="info-box-card">
                <div class="info-box-title"><img src="{{ asset('img/informasi.png') }}" alt="ikon">Informasi Pendaftaran</div>
                <div class="visi-label" style="margin-bottom: 12px;">JADWAL GELOMBANG</div>
                <div class="jadwal-timeline" id="jadwalTimeline">
                    <div class="jadwal-item"><span class="jadwal-gel">Gelombang 1</span><span class="jadwal-tgl">Januari - Maret 2026</span></div>
                    <div class="jadwal-item"><span class="jadwal-gel">Gelombang 2</span><span class="jadwal-tgl">April - Juli 2026</span></div>
                </div>
                <div class="visi-label" style="margin-bottom: 10px;">Syarat Pendaftaran</div>
                <ul class="misi-list" id="syaratList">
                    <li>Mengisi Formulir Pendaftaran</li>
                    <li>Foto Copy Kartu Keluarga</li>
                    <li>Pas foto ukuran 3x4 [4 lembar] </li>
                    <li>Pas foto ukuran 4x6 [2 lembar]</li>
                    <li>Biaya pendaftaran Rp.20.000 [Khusus gel. II]</li>
                    <li>Foto Copy KIP,PKH,KPS,KIS, bagi yang memiliki</li>
                    <li>Foto copy KTP kedua orang tua</li>
                    <li>Foto copy Akta Kelahiran</li>
                </ul>
            </div>

            <div class="info-box-card">
                <div class="info-box-title"><img src="{{ asset('img/unit_usaha.png') }}" alt="ikon">Unit Usaha Sekolah</div>
                <div class="unit-usaha-grid" id="unitUsahaGrid">
                    <div class="unit-usaha-item"><img src="{{ asset('img/NANO.png') }}" alt="Usaha 1"></div>
                    <div class="unit-usaha-item"><img src="{{ asset('img/ANANTARA.png') }}" alt="Usaha 2"></div>
                    <div class="unit-usaha-item"><img src="{{ asset('img/RADIKSA.png') }}" alt="Usaha 3"></div>
                    <div class="unit-usaha-item"><img src="{{ asset('img/NJE.png') }}" alt="Usaha 4"></div>
                    <div class="unit-usaha-item"><img src="{{ asset('img/TEFA.png') }}" alt="Usaha 5"></div>
                    <div class="unit-usaha-item"><img src="{{ asset('img/wandeQTA.png') }}" alt="Usaha 6"></div>
                    <div class="unit-usaha-item"><img src="{{ asset('img/mwtv.png') }}" alt="Usaha 7"></div>
                </div>
                <div class="visi-label" style="margin-top: 25px; margin-bottom: 12px;">KEUNGGULAN & PRAKTIK KERJA</div>
                <ul class="misi-list" id="keunggulanList">
                    <li><strong>Praktik Langsung:</strong> Siswa dilatih langsung mengelola bisnis riil di seluruh jaringan Unit Usaha Sekolah.</li>
                    <li><strong>Kesiapan Kerja:</strong> Lulusan memiliki pengalaman kerja nyata yang diakui oleh dunia usaha dan industri.</li>
                    <li><strong>Peluang Wirausaha:</strong> Inkubator bisnis sekolah siap mencetak lulusan menjadi pengusaha muda mandiri.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- FITUR UTAMA -->
    <section class="container fitur-section">
        <div class="fitur-title-wrapper">
            <div class="fitur-line"></div>
            <h2>● Fitur Utama ●</h2>
            <div class="fitur-line"></div>
        </div>
        <div class="fitur-grid" id="fiturGrid">
            <div class="fitur-card">
                <div class="fitur-icon-box"><img src="{{ asset('img/pc.png') }}" alt="PPDB"></div>
                <div class="fitur-info"><h4>PPDB Online</h4><p>Pendaftaran online mudah, cepat dan terpercaya.</p></div>
            </div>
            <div class="fitur-card">
                <div class="fitur-icon-box"><img src="{{ asset('img/ikon.png') }}" alt="Info"></div>
                <div class="fitur-info"><h4>Informasi Lengkap</h4><p>Informasi jurusan, biaya, jadwal dan berita terbaru.</p></div>
            </div>
            <div class="fitur-card">
                <div class="fitur-icon-box"><img src="{{ asset('img/note.png') }}" alt="Status"></div>
                <div class="fitur-info"><h4>Cek Status</h4><p>Pantau status pendaftaran secara real-time.</p></div>
            </div>
            <div class="fitur-card">
                <div class="fitur-icon-box"><img src="{{ asset('img/toa.png') }}" alt="Pengumuman"></div>
                <div class="fitur-info"><h4>Pengumuman</h4><p>Informasi hasil seleksi dapat diakses dengan mudah.</p></div>
            </div>
            <div class="fitur-card">
                <div class="fitur-icon-box"><img src="{{ asset('img/telepon.png') }}" alt="Kontak"></div>
                <div class="fitur-info"><h4>Kontak Cepat</h4><p>Hubungi kami untuk informasi lebih lanjut.</p></div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer-section">
        <div class="footer-container">
            <div class="footer-info-col">
                <h3>SMK Ma'arif Walisongo Kajoran</h3>
                <p>Jl.KH.Ridwan Sidowangi Kajoran, Magelang, Jawa Tengah 56163.<br>Mencetak generasi yang Smart, Religious, dan Professional.</p>
               <div class="sosmed-wrapper">
                    <a href="https://www.instagram.com/officialsmkmw9" class="sosmed-link" target="_blank"><img src="{{ asset('img/instagram.png') }}" alt="IG"></a>
                    <a href="https://www.tiktok.com/@officialsmkmw9" class="sosmed-link" target="_blank"><img src="{{ asset('img/tiktok.png') }}" alt="TikTok"></a>
                    <a href="https://www.youtube.com/@officialsmkmaarifwalisongo1198" class="sosmed-link" target="_blank"><img src="{{ asset('img/youtube.png') }}" alt="YT"></a>
                    <a href="https://www.facebook.com" class="sosmed-link" target="_blank"><img src="{{ asset('img/fecebook.png') }}" alt="FB"></a>
                    <a href="https://wa.me/02933195678" class="sosmed-link" target="_blank"><img src="{{ asset('img/whatsaap.png') }}" alt="WA"></a>
                </div>
            </div>
            <div class="footer-maps-col">
                <h3>Lokasi Sekolah</h3>
                <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.820849844561!2d110.09843167476278!3d-7.485024792527013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a9079770d82a3%3A0xbc67a5962af92284!2sSMK%20Ma&#39;arif%20Walisongo%20Kajoran!5e0!3m2!1sid!2sid!4v1782578283304!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2026 SMK Ma'arif Walisongo Kajoran Tim TEFA. All Rights Reserved.</p>
        </div>
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

        // SIMULASI LOGIN (Ubah ke true untuk menguji tampilan saat sudah login)
        const isUserLoggedIn = false; 

        // Desktop elements
        const desktopLoginBtn = document.getElementById('desktopLoginBtn');
        const desktopProfileBtn = document.getElementById('desktopProfileBtn');

        // Mobile elements
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
       SINKRONISASI DENGAN CMS
       ========================================================================== */
    (function () {
        let config;
        try { config = JSON.parse(localStorage.getItem('landing_page_config')); } catch (e) { config = null; }
        if (!config || !config.home) return; 
        const h = config.home;

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

        if (h.navbarLogos) {
            setSrc('navLogoSekolah', h.navbarLogos.logoSekolah);
            setSrc('navLogoSmkHebat', h.navbarLogos.logoSmkHebat);
            setSrc('navLogoVokasi', h.navbarLogos.logoVokasi);
            setSrc('navLogoAkreditasi', h.navbarLogos.logoAkreditasi);
        }

        if (h.hero) {
            const hr = h.hero;
            setText('heroSubTitle', hr.sub);
            setText('heroTitleLine1', hr.title1);
            setText('heroTitleLine2', hr.title2);
            setText('heroDesc', hr.desc);

            const btn1 = document.getElementById('heroBtn1');
            if (btn1) {
                btn1.textContent = hr.btn1Text ? hr.btn1Text : "Daftar Sekarang  →";
                if (hr.btn1Link) btn1.href = hr.btn1Link;
            }
            
            const btn2 = document.getElementById('heroBtn2');
            if (btn2) {
                btn2.textContent = hr.btn2Text ? hr.btn2Text : "Lihat Jurusan";
                if (hr.btn2Link) btn2.href = hr.btn2Link;
            }
            
            if (hr.bgImage) {
                const heroSection = document.getElementById('heroSection');
                if (heroSection) heroSection.style.backgroundImage =
                    `linear-gradient(to right, rgba(0, 58, 59, 1) 30%, rgba(0, 58, 59, 0.8) 50%, rgba(0, 58, 59, 0.15) 100%), url('${hr.bgImage}')`;
            }
            setSrc('heroFotoSiswa', hr.fotoSiswa);
        }

        if (Array.isArray(h.badges) && h.badges.length) {
            const wrap = document.getElementById('heroBadges');
            if (wrap) {
                const cards = wrap.querySelectorAll('.badge-card');
                h.badges.forEach((b, i) => {
                    const card = cards[i];
                    if (!card) return;
                    const span = card.querySelector('span');
                    if (span && b.label) span.textContent = b.label;
                });
            }
        }

        if (h.ppdb) {
            setText('ppdbTitle', h.ppdb.title);
            setText('ppdbDesc', h.ppdb.desc);
            if (Array.isArray(h.ppdb.steps) && h.ppdb.steps.length) {
                const container = document.getElementById('ppdbSteps');
                if (container) {
                    const items = container.querySelectorAll('.flow-step-item');
                    h.ppdb.steps.forEach((s, i) => {
                        const item = items[i];
                        if (!item) return;
                        const titleEl = item.querySelector('.flow-step-title');
                        const descEl = item.querySelector('.flow-step-desc');
                        if (titleEl && s.title) titleEl.textContent = s.title;
                        if (descEl && s.desc) descEl.textContent = s.desc;
                    });
                }
            }
        }

        if (h.visi) {
            setText('visiText', h.visi.text ? `“${h.visi.text}”` : undefined);
            if (Array.isArray(h.visi.misi) && h.visi.misi.length) {
                const list = document.getElementById('misiList');
                if (list) list.innerHTML = h.visi.misi.map(m => `<li>${m.text || ''}</li>`).join('');
            }
        }

        if (h.pendaftaranInfo) {
            if (Array.isArray(h.pendaftaranInfo.jadwal) && h.pendaftaranInfo.jadwal.length) {
                const el = document.getElementById('jadwalTimeline');
                if (el) el.innerHTML = h.pendaftaranInfo.jadwal.map(j => `
                    <div class="jadwal-item">
                        <span class="jadwal-gel">${j.gelombang || ''}</span>
                        <span class="jadwal-tgl">${j.tanggal || ''}</span>
                    </div>`).join('');
            }
            if (Array.isArray(h.pendaftaranInfo.syarat) && h.pendaftaranInfo.syarat.length) {
                const el = document.getElementById('syaratList');
                if (el) el.innerHTML = h.pendaftaranInfo.syarat.map(s => `<li>${s.text || ''}</li>`).join('');
            }
        }

        if (h.unitUsaha && Array.isArray(h.unitUsaha.logos) && h.unitUsaha.logos.length > 0) {
            const grid = document.getElementById('unitUsahaGrid');
            if (grid) {
                grid.innerHTML = h.unitUsaha.logos.map(u => `
                    <div class="unit-usaha-item">
                        <img src="${u.logo || ''}" alt="${u.nama || 'Logo Usaha'}" onerror="this.src='{{ asset('img/NANO.png') }}';">
                    </div>`).join('');
            }
        }

        if (h.unitUsaha && Array.isArray(h.unitUsaha.keunggulan) && h.unitUsaha.keunggulan.length > 0) {
            const list = document.getElementById('keunggulanList');
            if (list) list.innerHTML = h.unitUsaha.keunggulan.map(k => `<li><strong>${k.label || ''}:</strong> ${k.desc || ''}</li>`).join('');
        }

        if (Array.isArray(h.fitur) && h.fitur.length) {
            const grid = document.getElementById('fiturGrid');
            if (grid) {
                const cards = grid.querySelectorAll('.fitur-card');
                h.fitur.forEach((f, i) => {
                    const card = cards[i];
                    if (!card) return;
                    const titleEl = card.querySelector('h4');
                    const descEl = card.querySelector('p');
                    if (titleEl && f.title) titleEl.textContent = f.title;
                    if (descEl && f.desc) descEl.textContent = f.desc;
                });
            }
        }
    })();
    </script>
</body>
</html>