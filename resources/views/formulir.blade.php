<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Formulir Pendaftaran - SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ==========================================================================
           1. RESET & GLOBAL STYLES
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #02403f;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            gap: 50px;
            padding: 5px 5px 40px 5px;
        }
        .register-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 30px;
            padding: 40px 50px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            height: auto;
        }

        /* ==========================================================================
           2. NAVBAR ATAS (KOTAK PUTIH KAPSUL MELAYANG - DISAMAKAN DENGAN BERANDA)
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

        /* Tombol Profil Ber-Avatar di Kanan Navbar (Desktop - Muncul Saat Login) */
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

        /* Lingkaran Avatar di dalam Tombol Profil Desktop */
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

        /* Tombol Login Khusus Dropdown HP (Default Sembunyi di Desktop) */
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

        .mobile-login-btn:hover {
            background-color: #047857;
        }

        /* Tombol Profil Khusus Dropdown HP (Muncul saat sudah login) */
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
           3. HEADER & STEPPER PROGRESS
           ========================================================================== */
        .register-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px dashed #e2e8f0;
            padding-bottom: 25px;
            margin-bottom: 30px;
        }
        .header-title-group {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .icon-add-user {
            width: 45px;
            height: 45px;
            background-color: #e6f4f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .icon-add-user img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }
        .header-text h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: #02403f;
        }
        .header-text p {
            font-size: 12px;
            color: #64748b;
        }

        .stepper-groups {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .step-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .step-number {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            font-family: 'Plus Jakarta Sans', sans-serif;
            flex-shrink: 0;
        }
        .step-item.completed .step-number {
            background-color: #e6f4f0;
            color: #02403f;
            border: 1px solid #02403f;
        }
        .step-item.active .step-number {
            background-color: #02403f;
            color: #ffffff;
        }
        .step-item.inactive .step-number {
            border: 1px solid #cbd5e1;
            color: #94a3b8;
            background: #ffffff;
        }
        .step-text {
            font-size: 11px;
            font-weight: 600;
            color: #475569;
        }
        .step-item.inactive .step-text {
            color: #94a3b8;
        }
        .step-line {
            width: 30px;
            height: 1px;
            background-color: #cbd5e1;
        }

        /* ==========================================================================
           4. FORM LAYOUT & INPUT STYLES
           ========================================================================== */
        .form-section-title {
            font-size: 14px;
            font-weight: 700;
            color: #007a53;
            margin-bottom: 25px;
            position: relative;
        }
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px 30px;
            margin-bottom: 35px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .form-row-split {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        .form-group label {
            font-size: 12px;
            font-weight: 600;
            color: #344054;
        }
        .form-group label span {
            color: #d92d20;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 10px 14px;
            background: #ffffff;
            border: 1px solid #d0d5dd;
            border-radius: 8px;
            font-size: 13px;
            color: #1e293b;
            font-family: inherit;
            outline: none;
            transition: all 0.2s;
        }
        .form-group input:focus, .form-group select:focus {
            border-color: #02403f;
            box-shadow: 0 0 0 4px rgba(2, 64, 63, 0.1);
        }
        
        .radio-group-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 20px;
            background-color: #f8fafc;
            padding: 10px 14px;
            border: 1px solid #d0d5dd;
            border-radius: 8px;
            min-height: 41px;
            align-items: center;
        }
        
        .checkbox-group-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
            background-color: #f8fafc;
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            margin-top: 5px;
        }
        .selection-option {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            color: #344054;
        }
        .selection-option input {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #02403f;
        }

        .conditional-box {
            display: none; 
            grid-column: span 2;
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .parent-subtitle-only {
            display: block;
            grid-column: span 2;
            font-size: 13px;
            font-weight: 400;
            color: #64748b;
            margin-top: -18px;
            margin-bottom: 15px;
            text-transform: none;
        }
        .divider-data-ibu {
            grid-column: span 2;
            margin-top: 30px;
            margin-bottom: 10px;
            font-weight: 700;
            font-size: 14px;
            color: #007a53;
            border-top: 1px dashed #cbd5e1;
            padding-top: 20px;
        }

        /* ==========================================================================
           5. ACTION BUTTONS & RESPONSIVE NAVBAR MOBILE
           ========================================================================== */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 50px;
            border-top: 1px dashed #e2e8f0;
            padding-top: 25px;
        }
        .btn-back {
            border: 1px solid #02403f;
            background: transparent;
            color: #02403f;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }
        .btn-back:hover {
            background-color: #f0f7f4;
        }
        .btn-next {
            background-color: #02403f;
            border: none;
            color: #ffffff;
            padding: 11px 50px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none !important;
            transition: background 0.2s;
        }
        .btn-next:hover {
            background-color: #012b2a;
        }

        @media (max-width: 768px) {
            .register-header {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }
            .form-grid {
                grid-template-columns: 1fr;
            }
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
    </style>
</head>
<body>

    <header class="navbar">
        <div class="nav-container">
            <div class="logo-group">
               <img src="{{ asset('img/logo.smk.png') }}" alt="Logo SMK Ma'arif" class="logo-sekolah" id="navLogoSekolah">
               <img src="{{ asset('img/logo-smk-hebat.png') }}" alt="Logo SMK Bisa Hebat" class="logo-smkhebat" id="navLogoSmkHebat">
               <img src="{{ asset('img/logo-smk-vokasi.png') }}" alt="Logo SMK Bisa Vokasi" class="logo-vokasi" id="navLogoSmkVokasi">
               <img src="{{ asset('img/akreditasi.png') }}" alt="Akreditasi A" class="logo-akreditasi-nav" id="navLogoAkreditasi">
            </div>

            <!-- Menu Navigasi Tengah & Tombol Login/Profil Dropdown HP -->
            <nav class="nav-menu" id="navMenuDropdown">
                <a href="{{ url('/home') }}">Beranda</a>
                <a href="{{ url('/daftar') }}">Pendaftaran</a>
                <a href="{{ url('/jurusan') }}">Jurusan</a>
                <a href="{{ url('/informasi') }}">Informasi</a>
                <a href="{{ url('/kontak') }}">Kontak</a>
                
                <!-- Tombol Login / Profil khusus tampilan Mobile -->
                 <div class="mobile-only-action">
                    <a href="{{ url('/login') }}" class="mobile-login-btn" id="mobileLoginBtn">Log in</a>
                    <a href="{{ url('/profil') }}" class="mobile-profile-btn" id="mobileProfileBtn">
                        <div class="profile-avatar-circle">
                            <img src="{{ asset('img/user-default.png') }}" alt="avatar Profile" id="mobileUserAvatar">
                        </div>
                        <span>Profil Saya</span>
                    </a>
                 </div>
            </nav>
            
            <div class="nav-right-actions">
                <!-- Tombol Log In Hijau Desktop -->
                <a href="{{ url('/login') }}" class="btn-cta" id="desktopLoginBtn">Log in</a>
                
                <!-- Tombol Profil Ber-Avatar (Desktop) -->
                <a href="{{ url('/profil') }}" class="btn-profile-desktop" id="desktopProfileBtn">
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

    <div class="register-container">
        <header class="register-header">
            <div class="header-title-group">
                <div class="icon-add-user">
                    <img src="{{ asset('img/isifor.png') }}" alt="daftar akun">
                </div>
                <div class="header-text">
                    <h1 id="formulirJudul">Pengisian Formulir</h1>
                    <p id="formulirDesc">Silakan lengkapi data calon peserta didik baru dengan benar</p>
                </div>
            </div>
            <div class="stepper-groups">
                <a href="{{ url('/daftar') }}" style="text-decoration: none;">
                <div class="step-item completed">
                    <div class="step-number">1</div>
                    <span class="step-text">Buat Akun</span>
                </div>
                </a>
                <div class="step-line"></div>
                <a href="{{ url('/formulir') }}" style="text-decoration: none;">
                <div class="step-item active">
                    <div class="step-number">2</div>
                    <span class="step-text">Isi Formulir</span>
                </div>
                </a>
                <div class="step-line"></div>
                <a href="{{ url('/unggah-berkas') }}" style="text-decoration: none;">
                <div class="step-item inactive">
                    <div class="step-number">3</div>
                    <span class="step-text">Unggah Berkas</span>
                </div>
                </a>
            </div>
        </header>
        
        <main>
            @if ($errors->any())
            <div style="background: #ffe6e6; color: #d8000c; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                <strong>Perhatian! Ada data yang belum lengkap:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="formPendaftaran" action="{{ url('/daftar') }}" method="POST">
                @csrf
                
                <div class="form-section-title">Data Lengkap Calon Siswa</div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label>Nama Lengkap Calon Siswa<span>*</span></label>
                        <input type="text" id="input_nama_lengkap_calon_siswa" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Asal Sekolah<span>*</span></label>
                        <input type="text" id="input_asal_sekolah" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required>
                    </div>

                    <div class="form-group">
                        <label>NISN <span>*</span></label>
                        <input type="number" id="input_NISN" name="nisn" value="{{ old('nisn') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Hp Siswa (aktif)<span>*</span></label>
                        <input type="number" id="input_nomor_hp_siswa" name="no_hp" value="{{ old('no_hp') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir<span>*</span></label>
                        <input type="text" id="input_tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Ukuran Fisik (Tinggi & Berat) <span>*</span></label>
                        <div class="form-row-split">
                            <input type="number" id="input_tinggi" name="tinggi_badan" value="{{ old('tinggi_badan') }}" placeholder="Tinggi (cm)" required>
                            <input type="number" id="input_berat" name="berat_badan" value="{{ old('berat_badan') }}" placeholder="Berat (kg)" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir<span>*</span></label>
                        <input type="date" id="input_tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Saudara<span>*</span></label>
                        <input type="number" id="input_jumlah_saudara" name="jumlah_saudara_kandung" value="{{ old('jumlah_saudara_kandung') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin <span>*</span></label>
                        <div class="radio-group-container">
                            <label class="selection-option">
                                <input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} required> Laki-laki
                            </label>
                            <label class="selection-option">
                                <input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }} required> Perempuan
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Memiliki Kebutuhan Khusus? <span>*</span></label>
                        <div class="radio-group-container">
                            <label class="selection-option">
                                <input type="radio" name="kebutuhan_khusus" value="ya" {{ old('kebutuhan_khusus') == 'ya' ? 'checked' : '' }} required> Ya
                            </label>
                            <label class="selection-option">
                                <input type="radio" name="kebutuhan_khusus" value="tidak" {{ old('kebutuhan_khusus') == 'tidak' ? 'checked' : '' }} required> Tidak
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Agama<span>*</span></label>
                        <input type="text" id="input_agama" name="agama" value="{{ old('agama') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Penerima KPS / KKS / KIP? <span>*</span></label>
                        <div class="radio-group-container">
                            <label class="selection-option">
                                <input type="radio" name="is_penerima_bantuan" value="ya" onclick="toggleKphCard(true)" required> Ya
                            </label>
                            <label class="selection-option">
                                <input type="radio" name="is_penerima_bantuan" value="tidak" onclick="toggleKphCard(false)" required> Tidak
                            </label>
                        </div>
                    </div>

                    <div class="form-group conditional-box" id="kph-card-selection">
                        <label>Pilih Jenis Kartu yang Dimiliki <span>*</span></label>
                        <div class="checkbox-group-container">
                            <label class="selection-option">
                                <input type="checkbox" name="jenis_bantuan[]" value="KPS"> KPS (Kartu Perlindungan Sosial)
                            </label>
                            <label class="selection-option">
                                <input type="checkbox" name="jenis_bantuan[]" value="KKS"> KKS (Kartu Keluarga Sejahtera)
                            </label>
                            <label class="selection-option">
                                <input type="checkbox" name="jenis_bantuan[]" value="KIP"> KIP (Kartu Indonesia Pintar)
                            </label>
                        </div>
                    </div>

                    <div class="form-section-title" style="grid-column: span 2; margin-top: 25px; margin-bottom: 5px;">Data Orang Tua</div>
                    <span class="parent-subtitle-only">Data Ayah</span>

                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" id="input_nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}">
                    </div>

                    <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <select id="pendidikan_ayah" name="pendidikan_terakhir_ayah" class="form-control">
                            <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                            <option value="tidak_sekolah" {{ old('pendidikan_terakhir_ayah') == 'tidak_sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                            <option value="sd" {{ old('pendidikan_terakhir_ayah') == 'sd' ? 'selected' : '' }}>SD / MI / Sederajat</option> 
                            <option value="smp" {{ old('pendidikan_terakhir_ayah') == 'smp' ? 'selected' : '' }}>SMP / Mts / Sederajat</option>
                            <option value="sma" {{ old('pendidikan_terakhir_ayah') == 'sma' ? 'selected' : '' }}>SMA / MA / SMK</option>
                            <option value="diploma" {{ old('pendidikan_terakhir_ayah') == 'diploma' ? 'selected' : '' }}>D1 / D2/ D3</option>
                            <option value="s1" {{ old('pendidikan_terakhir_ayah') == 's1' ? 'selected' : '' }}>S2 (Magister)</option>
                            <option value="s2" {{ old('pendidikan_terakhir_ayah') == 's2' ? 'selected' : '' }}>S3 (Doktor)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan Ayah</label>
                        <input type="text" id="input_pekerjaan_ayah" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}">
                    </div>

                    <div class="form-group">
                        <label>Tahun Lahir</label>
                        <input type="text" id="input_tahun_lahir_ayah" name="tahun_lahir_ayah" value="{{ old('tahun_lahir_ayah') }}">
                    </div>

                    <div class="form-group">
                        <label>Penghasilan Bulanan</label>
                        <select id="penghasilan_ayah_select" name="penghasilan_ayah_bulanan" class="form-control">
                            <option value="" disabled selected>Pilih Penghasilan Bulanan</option>
                            <option value="tidak_berpenghasilan" {{ old('penghasilan_ayah_bulanan') == 'tidak_berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan / Tidak Bekerja</option>
                            <option value="kurang_1jt" {{ old('penghasilan_ayah_bulanan') == 'kurang_1jt' ? 'selected' : '' }}>Kurang dari Rp 1.000.000</option>
                            <option value="1jt_2jt" {{ old('penghasilan_ayah_bulanan') == '1jt_2jt' ? 'selected' : '' }}>Rp 1.000.000 - Rp 1.999.999</option>
                            <option value="2jt_5jt" {{ old('penghasilan_ayah_bulanan') == '2jt_5jt' ? 'selected' : '' }}>Rp 2.000.000 - Rp 4.999.999</option>
                            <option value="5jt_20jt" {{ old('penghasilan_ayah_bulanan') == '5jt_20jt' ? 'selected' : '' }}>Rp 5.000.000 - Rp 20.000.000</option>
                            <option value="lebih_20jt" {{ old('penghasilan_ayah_bulanan') == 'lebih_20jt' ? 'selected' : '' }}>Lebih dari Rp 20.000.000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon Ayah</label>
                        <input type="text" id="input_nomor_telepon_ayah" name="no_hp_ayah" value="{{ old('no_hp_ayah') }}">
                    </div>

                    <div class="form-group">
                        <label>Memiliki Kebutuhan Khusus?</label>
                        <div class="radio-group-container">
                            <label class="selection-option">
                                <input type="radio" name="ayah_kebutuhan_khusus" value="ya" {{ old('ayah_kebutuhan_khusus') == 'ya' ? 'checked' : '' }}> Ya
                            </label>
                            <label class="selection-option">
                                <input type="radio" name="ayah_kebutuhan_khusus" value="tidak" {{ old('ayah_kebutuhan_khusus') == 'tidak' ? 'checked' : '' }}> Tidak
                            </label>
                        </div>
                    </div>

                    <div class="divider-data-ibu">Data Ibu</div>

                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" id="input_nama_ibu" name="nama_ibu" value="{{ old('nama_ibu') }}">
                    </div>

                    <div class="form-group">
                        <label>Pendidikan Terakhir</label>
                        <select id="pendidikan_ibu" name="pendidikan_terakhir_ibu" class="form-control">
                            <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                            <option value="tidak_sekolah" {{ old('pendidikan_terakhir_ibu') == 'tidak_sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                            <option value="sd" {{ old('pendidikan_terakhir_ibu') == 'sd' ? 'selected' : '' }}>SD / MI / Sederajat</option> 
                            <option value="smp" {{ old('pendidikan_terakhir_ibu') == 'smp' ? 'selected' : '' }}>SMP / Mts / Sederajat</option>
                            <option value="sma" {{ old('pendidikan_terakhir_ibu') == 'sma' ? 'selected' : '' }}>SMA / MA / SMK</option>
                            <option value="diploma" {{ old('pendidikan_terakhir_ibu') == 'diploma' ? 'selected' : '' }}>D1 / D2/ D3</option>
                            <option value="s1" {{ old('pendidikan_terakhir_ibu') == 's1' ? 'selected' : '' }}>S2 (Magister)</option>
                            <option value="s2" {{ old('pendidikan_terakhir_ibu') == 's2' ? 'selected' : '' }}>S3 (Doktor)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan Ibu</label>
                        <input type="text" id="input_pekerjaan_ibu" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}">
                    </div>

                    <div class="form-group">
                        <label>Tahun Lahir</label>
                        <input type="text" id="input_tahun_lahir_ibu" name="tahun_lahir_ibu" value="{{ old('tahun_lahir_ibu') }}">
                    </div>

                    <div class="form-group">
                        <label>Penghasilan Bulanan</label>
                        <select id="penghasilan_ibu_select" name="penghasilan_ibu_bulanan" class="form-control">
                            <option value="" disabled selected>Pilih Penghasilan Bulanan</option>
                            <option value="tidak_berpenghasilan" {{ old('penghasilan_ibu_bulanan') == 'tidak_berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan / Tidak Bekerja</option>
                            <option value="kurang_1jt" {{ old('penghasilan_ibu_bulanan') == 'kurang_1jt' ? 'selected' : '' }}>Kurang dari Rp 1.000.000</option>
                            <option value="1jt_2jt" {{ old('penghasilan_ibu_bulanan') == '1jt_2jt' ? 'selected' : '' }}>Rp 1.000.000 - Rp 1.999.999</option>
                            <option value="2jt_5jt" {{ old('penghasilan_ibu_bulanan') == '2jt_5jt' ? 'selected' : '' }}>Rp 2.000.000 - Rp 4.999.999</option>
                            <option value="5jt_20jt" {{ old('penghasilan_ibu_bulanan') == '5jt_20jt' ? 'selected' : '' }}>Rp 5.000.000 - Rp 20.000.000</option>
                            <option value="lebih_20jt" {{ old('penghasilan_ibu_bulanan') == 'lebih_20jt' ? 'selected' : '' }}>Lebih dari Rp 20.000.000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon Ibu</label>
                        <input type="text" id="input_nomor_telepon_ibu" name="no_hp_ibu" value="{{ old('no_hp_ibu') }}">
                    </div>

                    <div class="form-group">
                        <label>Memiliki Kebutuhan Khusus? </label>
                        <div class="radio-group-container">
                            <label class="selection-option">
                                <input type="radio" name="ibu_kebutuhan_khusus" value="ya" {{ old('ibu_kebutuhan_khusus') == 'ya' ? 'checked' : '' }}> Ya
                            </label>
                            <label class="selection-option">
                                <input type="radio" name="ibu_kebutuhan_khusus" value="tidak" {{ old('ibu_kebutuhan_khusus') == 'tidak' ? 'checked' : '' }}> Tidak
                            </label>
                        </div>
                    </div>

                    <div class="divider-data-ibu" style="margin-top: 25px;">Data Wali (Diisi jika tidak tinggal dengan Orang Tua)</div>

                    <div class="form-group">
                        <label>Nama Wali</label>
                        <input type="text" id="input_nama_wali" name="nama_wali" value="{{ old('nama_wali') }}">
                    </div>

                    <div class="form-group">
                        <label>Pendidikan Terakhir Wali</label>
                        <select id="pendidikan_wali" name="pendidikan_terakhir_wali" class="form-control"> 
                            <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                            <option value="tidak_sekolah" {{ old('pendidikan_terakhir_wali') == 'tidak_sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                            <option value="sd" {{ old('pendidikan_terakhir_wali') == 'sd' ? 'selected' : '' }}>SD / MI / Sederajat</option> 
                            <option value="smp" {{ old('pendidikan_terakhir_wali') == 'smp' ? 'selected' : '' }}>SMP / Mts / Sederajat</option>
                            <option value="sma" {{ old('pendidikan_terakhir_wali') == 'sma' ? 'selected' : '' }}>SMA / MA / SMK</option>
                            <option value="diploma" {{ old('pendidikan_terakhir_wali') == 'diploma' ? 'selected' : '' }}>D1 / D2/ D3</option>
                            <option value="s1" {{ old('pendidikan_terakhir_wali') == 's1' ? 'selected' : '' }}>S2 (Magister)</option>
                            <option value="s2" {{ old('pendidikan_terakhir_wali') == 's2' ? 'selected' : '' }}>S3 (Doktor)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan Wali</label>
                        <input type="text" id="input_pekerjaan_wali" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}">
                    </div>

                    <div class="form-group">
                        <label>Penghasilan Bulanan</label>
                        <select id="penghasilan_wali_select" name="penghasilan_wali_bulanan" class="form-control">
                            <option value="" disabled selected>Pilih Penghasilan Bulanan</option>
                            <option value="tidak_berpenghasilan" {{ old('penghasilan_wali_bulanan') == 'tidak_berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan / Tidak Bekerja</option>
                            <option value="kurang_1jt" {{ old('penghasilan_wali_bulanan') == 'kurang_1jt' ? 'selected' : '' }}>Kurang dari Rp 1.000.000</option>
                            <option value="1jt_2jt" {{ old('penghasilan_wali_bulanan') == '1jt_2jt' ? 'selected' : '' }}>Rp 1.000.000 - Rp 1.999.999</option>
                            <option value="2jt_5jt" {{ old('penghasilan_wali_bulanan') == '2jt_5jt' ? 'selected' : '' }}>Rp 2.000.000 - Rp 4.999.999</option>
                            <option value="5jt_20jt" {{ old('penghasilan_wali_bulanan') == '5jt_20jt' ? 'selected' : '' }}>Rp 5.000.000 - Rp 20.000.000</option>
                            <option value="lebih_20jt" {{ old('penghasilan_wali_bulanan') == 'lebih_20jt' ? 'selected' : '' }}>Lebih dari Rp 20.000.000</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon Wali</label>
                        <input type="text" id="input_nomor_telepon_wali" name="no_hp_wali" value="{{ old('no_hp_wali') }}">
                    </div>

                    <div class="form-section-title" style="grid-column: span 2; margin-top: 25px;">Data Tempat Tinggal Siswa</div>
                    
                    <div class="form-group">
                        <label>Provinsi<span>*</span></label>
                        <select id="provinsi" name="provinsi_kode" class="form-control" required>
                            <option value="">Pilih Provinsi</option>
                        </select>
                        <input type="hidden" id="provinsi_nama" name="provinsi" value="{{ old('provinsi') }}">
                    </div>

                    <div class="form-group">
                        <label>Alamat Lengkap<span>*</span></label>
                        <input type="text" id="input_alamat_lengkap" name="alamat_lengkap" value="{{ old('alamat_lengkap') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Kabupaten / Kota<span>*</span></label>
                        <select id="kabupaten" name="kabupaten_kode" class="form-control" required disabled>
                            <option value="">Pilih Kabupaten</option>
                        </select>
                        <input type="hidden" id="kabupaten_nama" name="kabupaten" value="{{ old('kabupaten') }}">
                    </div>

                    <div class="form-group">
                        <label>RT / RW <span>*</span></label>
                        <div class="form-row-split">
                            <input type="number" id="input_rt" name="rt" value="{{ old('rt') }}" placeholder="RT" required>
                            <input type="number" id="input_rw" name="rw" value="{{ old('rw') }}" placeholder="RW" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Kecamatan<span>*</span></label>
                        <select id="kecamatan" name="kecamatan_kode" class="form-control" required disabled>
                            <option value="">Pilih Kecamatan</option>
                        </select>
                        <input type="hidden" id="kecamatan_nama" name="kecamatan" value="{{ old('kecamatan') }}">
                    </div>

                    <div class="form-group">
                        <label for="jenis_tinggal">Jenis Tinggal<span>*</span></label>
                        <select id="jenis_tinggal" name="jenis_tinggal" required>
                            <option value="" disabled selected>Pilih Jenis Tinggal</option>
                            <option value="Bersama Orang Tua" {{ old('jenis_tinggal') == 'Bersama Orang Tua' ? 'selected' : '' }}>Rumah (Bersama Orang Tua)</option>
                            <option value="Wali" {{ old('jenis_tinggal') == 'Wali' ? 'selected' : '' }}>Asrama</option>
                            <option value="Kos" {{ old('jenis_tinggal') == 'Kos' ? 'selected' : '' }}>Kos / Kontrak</option>
                            <option value="Pondok" {{ old('jenis_tinggal') == 'Pondok' ? 'selected' : '' }}>Pondok Pesantren</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Desa/Kelurahan<span>*</span></label>
                        <select id="kelurahan" name="desa_kode" class="form-control" required disabled>
                            <option value="">Pilih Kelurahan/Desa</option>
                        </select>
                        <input type="hidden" id="desa_nama" name="desa" value="{{ old('desa') }}">
                    </div>

                    <div class="form-group">
                        <label>Alat Transportasi <span>*</span></label>
                        <input type="text" id="input_alat_transportasi" name="alat_transportasi_ke_sekolah" value="{{ old('alat_transportasi_ke_sekolah') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Kode Pos <span>*</span></label>
                        <input type="number" id="input_kode_pos" name="kode_pos" value="{{ old('kode_pos') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Jarak ke Sekolah<span>*</span></label>
                        <input type="text" id="input_jarak_kesekolah" name="jarak_ke_sekolah" value="{{ old('jarak_ke_sekolah') }}" required>
                    </div>

                    <!-- SEKSI PILIHAN JURUSAN & GELOMBANG -->
                    <div class="form-section-title" style="grid-column: span 2; margin-top: 25px;">Pilihan Jurusan & Gelombang Pendaftaran</div>
                    
                    <div class="form-group">
                        <label>Pilihan Kompetensi Keahlian (Jurusan 1) <span>*</span></label>
                        <div class="radio-group-container">
                            <label class="selection-option"><input type="radio" name="jurusan_pilihan_1" value="PPLG" required>PPLG</label>
                            <label class="selection-option"><input type="radio" name="jurusan_pilihan_1" value="BCF" required>BCF</label>
                            <label class="selection-option"><input type="radio" name="jurusan_pilihan_1" value="MPLB" required>MPLB</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Pilihan Kompetensi Keahlian (Jurusan 2) <span>*</span></label>
                        <div class="radio-group-container">
                            <label class="selection-option"><input type="radio" name="jurusan_pilihan_2" value="PPLG" required>PPLG</label>
                            <label class="selection-option"><input type="radio" name="jurusan_pilihan_2" value="BCF" required>BCF</label>
                            <label class="selection-option"><input type="radio" name="jurusan_pilihan_2" value="MPLB" required>MPLB</label>
                        </div>
                    </div>

                    <!-- DROPDOWN GELOMBANG PENDAFTARAN -->
                    <div class="form-group" style="grid-column: span 2;">
                        <label>Pilih Gelombang Pendaftaran <span>*</span></label>
                        <select id="gelombang_pendaftaran" name="gelombang" class="form-control" onchange="toggleGelombang(this.value)" required>
                            <option value="" disabled selected>Pilih Gelombang Pendaftaran</option>
                            <option value="Gelombang 1" {{ old('gelombang') == 'Gelombang 1' ? 'selected' : '' }}>Gelombang 1 (Januari - Maret 2026)</option>
                            <option value="Gelombang 2" {{ old('gelombang') == 'Gelombang 2' ? 'selected' : '' }}>Gelombang 2 (April - Juli 2026)</option>
                        </select>
                    </div>

                    <!-- METODE PEMBAYARAN -->
                    <div class="form-group conditional-box" id="metode-pembayaran-container" style="grid-column: span 2;">
                        <label id="labelMetodePembayaran">Pilih Metode Pembayaran Pendaftaran (Rp 20.000) <span>*</span></label>
                        <select id="metode_pembayaran" name="metode_pembayaran" class="form-control" onchange="toggleMetodePembayaran(this.value)">
                            <option value="" disabled selected>Pilih Metode Pembayaran</option>
                            <option value="langsung" {{ old('metode_pembayaran') == 'langsung' ? 'selected' : '' }}>Bayar Langsung di Sekolah (Cash)</option>
                            <option value="transfer" {{ old('metode_pembayaran') == 'transfer' ? 'selected' : '' }}>Transfer Bank (Via TF)</option>
                        </select>
                    </div>

                    <!-- KOTAK INFORMASI REKENING -->
                    <div class="form-group conditional-box" id="info-rekening-box" style="grid-column: span 2;">
                        <div style="background-color: #e6f4f0; border: 1px solid #02403f; padding: 15px 20px; border-radius: 8px; font-size: 13px; color: #02403f;">
                            <strong> Informasi Rekening Pembayaran:</strong><br>
                            Bank: <strong id="txtRekBank">Bank Jateng</strong><br>
                            No. Rekening: <strong id="txtRekNomor">3-012-34567-8</strong><br>
                            Atas Nama: <strong id="txtRekAtasNama">SMK Ma'arif Walisongo Kajoran</strong><br>
                            <small id="txtRekCatatan" style="color: #64748b; margin-top: 5px; display: block;">*Silakan lakukan transfer sesuai biaya pendaftaran, lalu simpan bukti transfer untuk diunggah di halaman berikutnya.</small>
                        </div>
                    </div>

                </div> 
                
                <div class="action-buttons">
                    <a href="{{ url('/daftar') }}" class="btn-back">← Kembali</a>
                    <button type="submit" class="btn-next">Selanjutnya →</button>
                </div>
            </form>
        </main>
    </div>

    <script>
    /* ==========================================================================
       SCRIPT TOGGLE HAMBURGER & STATUS LOGIN (DESKTOP & MOBILE)
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
            if (mobileLoginBtn) mobileLoginBtn.style.display = 'flex';
            if (mobileProfileBtn) mobileProfileBtn.style.display = 'none';
        }
    });

    function toggleKphCard(isSelectIya) {
        const cardSelectionBox = document.getElementById('kph-card-selection');
        const checkboxes = document.querySelectorAll('input[name="jenis_bantuan[]"]');
        
        if (isSelectIya) {
            cardSelectionBox.style.display = 'block';
            localStorage.setItem('penerima_kps_status', 'ya');
        } else {
            cardSelectionBox.style.display = 'none';
            checkboxes.forEach(cb => { cb.checked = false; });
            localStorage.setItem('penerima_kps_status', 'tidak');
        }
    }

    function toggleGelombang(val) {
        const containerPembayaran = document.getElementById('metode-pembayaran-container');
        const selectPembayaran = document.getElementById('metode_pembayaran');
        const infoRekeningBox = document.getElementById('info-rekening-box');

        localStorage.setItem('gelombang_pendaftaran', val);

        if (val === 'Gelombang 2') {
            containerPembayaran.style.display = 'block';
            selectPembayaran.setAttribute('required', 'required');
        } else {
            containerPembayaran.style.display = 'none';
            infoRekeningBox.style.display = 'none';
            selectPembayaran.removeAttribute('required');
            selectPembayaran.value = "";
            localStorage.setItem('metode_pembayaran', 'gratis');
        }
    }

    function toggleMetodePembayaran(val) {
        const infoRekening = document.getElementById('info-rekening-box');
        
        if (val === 'transfer') {
            infoRekening.style.display = 'block';
            localStorage.setItem('metode_pembayaran', 'transfer');
        } else {
            infoRekening.style.display = 'none';
            localStorage.setItem('metode_pembayaran', 'langsung');
        }
    }
    </script>

    <script>
        const baseAPI = 'https://www.emsifa.com/api-wilayah-indonesia/api';

        const selectProvinsi = document.getElementById('provinsi');
        const selectKabupaten = document.getElementById('kabupaten');
        const selectKecamatan = document.getElementById('kecamatan');
        const selectKelurahan = document.getElementById('kelurahan');

        fetch(baseAPI + '/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                provinces.forEach(prov => {
                    let option = document.createElement('option');
                    option.value = prov.id;
                    option.textContent = prov.name;
                    selectProvinsi.appendChild(option);
                });
                loadSavedWilayah();
            })
            .catch(err => console.error('Gagal memuat provinsi:', err));

        selectProvinsi.addEventListener('change', function() {
            loadKabupaten(this.value);
        });

        function loadKabupaten(provId, selectedKabId = null) {
            selectKabupaten.innerHTML = '<option value="">Pilih Kabupaten</option>';
            selectKecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
            selectKelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
            selectKecamatan.disabled = true;
            selectKelurahan.disabled = true;

            if (provId) {
                fetch(baseAPI + '/regencies/' + provId + '.json')
                    .then(response => response.json())
                    .then(regencies => {
                        regencies.forEach(kab => {
                            let option = document.createElement('option');
                            option.value = kab.id;
                            option.textContent = kab.name;
                            selectKabupaten.appendChild(option);
                        });
                        selectKabupaten.disabled = false;
                        if (selectedKabId) selectKabupaten.value = selectedKabId;
                    });
            } else {
                selectKabupaten.disabled = true;
            }
        }

        selectKabupaten.addEventListener('change', function() {
            loadKecamatan(this.value);
        });

        function loadKecamatan(kabId, selectedKecId = null) {
            selectKecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
            selectKelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
            selectKecamatan.disabled = true;
            selectKelurahan.disabled = true;

            if (kabId) {
                fetch(baseAPI + '/districts/' + kabId + '.json')
                    .then(response => response.json())
                    .then(districts => {
                        districts.forEach(kec => {
                            let option = document.createElement('option');
                            option.value = kec.id;
                            option.textContent = kec.name;
                            selectKecamatan.appendChild(option);
                        });
                        selectKecamatan.disabled = false;
                        if (selectedKecId) selectKecamatan.value = selectedKecId;
                    });
            } else {
                selectKecamatan.disabled = true;
            }
        }

        selectKecamatan.addEventListener('change', function() {
            loadKelurahan(this.value);
        });

        function loadKelurahan(kecId, selectedKelId = null) {
            selectKelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';

            if (kecId) {
                fetch(baseAPI + '/villages/' + kecId + '.json')
                    .then(response => response.json())
                    .then(villages => {
                        villages.forEach(des => {
                            let option = document.createElement('option');
                            option.value = des.id;
                            option.textContent = des.name;
                            selectKelurahan.appendChild(option);
                        });
                        selectKelurahan.disabled = false;
                        if (selectedKelId) selectKelurahan.value = selectedKelId;
                    });
            } else {
                selectKelurahan.disabled = true;
            }
        }
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const jurusan1Radios = document.querySelectorAll('input[name="jurusan_pilihan_1"]');
        const jurusan2Radios = document.querySelectorAll('input[name="jurusan_pilihan_2"]');

        function updateJurusanOptions() {
            let val1 = "";
            let val2 = "";

            jurusan1Radios.forEach(r => { if (r.checked) val1 = r.value; });
            jurusan2Radios.forEach(r => { if (r.checked) val2 = r.value; });

            jurusan2Radios.forEach(radio => {
                if (radio.value === val1) {
                    radio.disabled = true;
                    if (radio.checked) radio.checked = false;
                } else {
                    radio.disabled = false;
                }
            });

            jurusan1Radios.forEach(radio => {
                if (radio.value === val2) {
                    radio.disabled = true;
                    if (radio.checked) radio.checked = false;
                } else {
                    radio.disabled = false;
                }
            });
        }

        jurusan1Radios.forEach(radio => radio.addEventListener('change', updateJurusanOptions));
        jurusan2Radios.forEach(radio => radio.addEventListener('change', updateJurusanOptions));
    });
    </script>

    <script>
        // Pastikan yang terkirim ke server adalah NAMA wilayah (bukan kode API),
        // diambil langsung dari teks opsi yang sedang terpilih, tepat sebelum form disubmit.
        document.getElementById('formPendaftaran').addEventListener('submit', function(e) {
            function namaTerpilih(select) {
                if (!select || select.selectedIndex < 0) return '';
                const opt = select.options[select.selectedIndex];
                return opt ? opt.textContent : '';
            }
            const namaProvinsi = namaTerpilih(selectProvinsi);
            const namaKabupaten = namaTerpilih(selectKabupaten);
            const namaKecamatan = namaTerpilih(selectKecamatan);
            const namaDesa = namaTerpilih(selectKelurahan);

            // Guard: kalau ada yang masih kosong (misal fetch ke API wilayah gagal
            // atau user belum sempat memilih), tahan submit dan kasih tahu usernya
            // daripada diam-diam kesimpan NULL ke database.
            if (!namaProvinsi || !namaKabupaten || !namaKecamatan || !namaDesa) {
                e.preventDefault();
                alert('Data Provinsi/Kabupaten/Kecamatan/Desa belum lengkap terpilih. Silakan pilih ulang mulai dari Provinsi, dan pastikan koneksi internet stabil.');
                return false;
            }

            document.getElementById('provinsi_nama').value = namaProvinsi;
            document.getElementById('kabupaten_nama').value = namaKabupaten;
            document.getElementById('kecamatan_nama').value = namaKecamatan;
            document.getElementById('desa_nama').value = namaDesa;
        });

        function loadSavedWilayah() {
            const savedData = JSON.parse(localStorage.getItem('data_pendaftaran'));
            if (!savedData) return;

            if (savedData.provinsi) {
                selectProvinsi.value = savedData.provinsi;
                loadKabupaten(savedData.provinsi, savedData.kabupaten);
            }
            if (savedData.kabupaten) {
                loadKecamatan(savedData.kabupaten, savedData.kecamatan);
            }
            if (savedData.kecamatan) {
                loadKelurahan(savedData.kecamatan, savedData.kelurahan);
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const savedData = JSON.parse(localStorage.getItem('data_pendaftaran'));
            if (savedData) {
                if (savedData.nama && !document.getElementById('input_nama_lengkap_calon_siswa').value) document.getElementById('input_nama_lengkap_calon_siswa').value = savedData.nama;
                if (savedData.asalSekolah && !document.getElementById('input_asal_sekolah').value) document.getElementById('input_asal_sekolah').value = savedData.asalSekolah;
                if (savedData.nisn && !document.getElementById('input_NISN').value) document.getElementById('input_NISN').value = savedData.nisn;
                if (savedData.hp && !document.getElementById('input_nomor_hp_siswa').value) document.getElementById('input_nomor_hp_siswa').value = savedData.hp;
                if (savedData.tempatLahir && !document.getElementById('input_tempat_lahir').value) document.getElementById('input_tempat_lahir').value = savedData.tempatLahir;
                if (savedData.tinggi && !document.getElementById('input_tinggi').value) document.getElementById('input_tinggi').value = savedData.tinggi;
                if (savedData.berat && !document.getElementById('input_berat').value) document.getElementById('input_berat').value = savedData.berat;
                if (savedData.tglLahir && !document.getElementById('input_tanggal_lahir').value) document.getElementById('input_tanggal_lahir').value = savedData.tglLahir;
                if (savedData.jumlahSaudara && !document.getElementById('input_jumlah_saudara').value) document.getElementById('input_jumlah_saudara').value = savedData.jumlahSaudara;
                if (savedData.agama && !document.getElementById('input_agama').value) document.getElementById('input_agama').value = savedData.agama;

                // Data Ayah
                if (savedData.namaAyah && !document.getElementById('input_nama_ayah').value) document.getElementById('input_nama_ayah').value = savedData.namaAyah;
                if (savedData.pendidikanAyah && !document.getElementById('pendidikan_ayah').value) document.getElementById('pendidikan_ayah').value = savedData.pendidikanAyah;
                if (savedData.pekerjaanAyah && !document.getElementById('input_pekerjaan_ayah').value) document.getElementById('input_pekerjaan_ayah').value = savedData.pekerjaanAyah;
                if (savedData.tahunAyah && !document.getElementById('input_tahun_lahir_ayah').value) document.getElementById('input_tahun_lahir_ayah').value = savedData.tahunAyah;
                if (savedData.penghasilanAyah && !document.getElementById('penghasilan_ayah_select').value) document.getElementById('penghasilan_ayah_select').value = savedData.penghasilanAyah;
                if (savedData.hpAyah && !document.getElementById('input_nomor_telepon_ayah').value) document.getElementById('input_nomor_telepon_ayah').value = savedData.hpAyah;

                // Data Ibu
                if (savedData.namaIbu && !document.getElementById('input_nama_ibu').value) document.getElementById('input_nama_ibu').value = savedData.namaIbu;
                if (savedData.pendidikanIbu && !document.getElementById('pendidikan_ibu').value) document.getElementById('pendidikan_ibu').value = savedData.pendidikanIbu;
                if (savedData.pekerjaanIbu && !document.getElementById('input_pekerjaan_ibu').value) document.getElementById('input_pekerjaan_ibu').value = savedData.pekerjaanIbu;
                if (savedData.tahunIbu && !document.getElementById('input_tahun_lahir_ibu').value) document.getElementById('input_tahun_lahir_ibu').value = savedData.tahunIbu;
                if (savedData.penghasilanIbu && !document.getElementById('penghasilan_ibu_select').value) document.getElementById('penghasilan_ibu_select').value = savedData.penghasilanIbu;
                if (savedData.hpIbu && !document.getElementById('input_nomor_telepon_ibu').value) document.getElementById('input_nomor_telepon_ibu').value = savedData.hpIbu;
            }
        });
    </script>
</body>
</html>