<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun - SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tambahan FontAwesome untuk ikon mata (lihat/sembunyikan password) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
          gap: 80px; 
          padding: 5px 5px 40px 5px; 
         }

        .register-container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 30px;
            padding: 40px 50px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
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
            width: 50px;
            height: 50px;
            background-color: #e6f4f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .icon-add-user img {
           width: 50px !important;
           height: 50px !important;
           flex-shrink: 0;
           object-fit: contain;
        }
        .header-text h1 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: #02403f;
        }
        .header-text p {
            font-size: 10px;
            color: #64748b;
        }

        /* Steps Progress Bar */
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
           4. FORM INPUTS & LAYOUT
           ========================================================================== */
        .form-section-title {
            font-size: 14px;
            font-weight: 700;
            color: #007a53;
            margin-bottom: 20px;
        }
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            column-gap: 40px;
            row-gap: 20px;
            margin-bottom: 35px;
        }
        .form-control {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .form-control label {
            font-size: 12px;
            font-weight: 600;
            color: #334155;
        }
        .form-control label span {
            color: #ef4444;
            margin-left: 2px;
        }
        .form-control input, .form-control select, .form-control textarea {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            outline: none;
            transition: border-color 0.2s;
        }
        .form-control input:focus, .form-control select:focus, .form-control textarea:focus {
            border-color: #007a53;
        }

        /* Tambahan styling khusus wrapper input password agar ikon mata berada di dalam kotak */
        .password-wrapper {
            position: relative;
            width: 100%;
        }
        .password-wrapper input {
            width: 100%;
            padding-right: 40px;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #64748b;
            font-size: 14px;
        }
        .toggle-password:hover {
            color: #007a53;
        }

        /* ==========================================================================
           5. BUTTONS ACTION & RESPONSIVE MOBILE
           ========================================================================== */
        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
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
            transition: background 0.2s;
            text-decoration: none !important;
        }
        .btn-next:hover {
            background-color: #012b2a;
        }

        /* ==========================================================================
           6. FOOTER INFORMASI
           ========================================================================== */
        .register-footer {
            width: 100%;
            max-width: 1000px;
            margin: 30px auto 0 auto;
            display: grid;
            grid-template-columns: 1.2fr 0.9fr 0.9fr 1fr;
            gap: 25px;
            color: #ffffff;
            opacity: 0.9;
            font-size: 11px;
            padding-top: 10px;
        }
        
        .footer-info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            border-left: 2px solid #EBE0D0; 
            padding-left: 15px;             
        }

        .footer-icon {
            width: 35px !important;    
            height: 35px !important;   
            flex-shrink: 0;            
            object-fit: contain;       
            margin-top: 0 !important;
        }

        .footer-info-item > div {
            margin-top: -3px !important;
            line-height: 1.3 !important;
        }

        .quote-text {
            font-style: italic;
        }

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

            .register-header { 
                flex-direction: column; 
                gap: 20px; 
                align-items: flex-start; 
            }
            .form-grid { 
                grid-template-columns: 1fr; 
            }
            .register-footer { 
                grid-template-columns: 1fr; 
                gap: 20px; 
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
                <img src="{{ asset('img/logo-smk-vokasi.png') }}" alt="Logo SMK Vokasi" class="logo-vokasi" id="navLogoVokasi">
                <img src="{{ asset('img/akreditasi.png') }}" alt="Akreditasi A" class="logo-akreditasi-nav" id="navLogoAkreditasi">
            </div>

            <!-- Menu Navigasi Tengah & Tombol Login/Profil Dropdown HP -->
            <nav class="nav-menu" id="navMenuDropdown">
                <a href="{{ url('/home') }}">Beranda</a>
                <a href="{{ url('/daftar') }}" class="active">Pendaftaran</a>
                <a href="{{ url('/jurusan') }}">Jurusan</a>
                <a href="{{ url('/informasi') }}">Informasi</a>
                <a href="{{ url('/kontak') }}">Kontak</a>
                
                <!-- Tombol Login / Profil khusus tampilan Mobile -->
                <div class="mobile-only-action">
                    <a href="{{ url('/login') }}" class="mobile-login-btn" id="mobileLoginBtn">Log in</a>
                    <a href="{{ url('/profil') }}" class="mobile-profile-btn" id="mobileProfileBtn">
                        <div class="profile-avatar-circle">
                            <img src="{{ asset('img/user-default.png') }}" alt="Avatar Profil" id="mobileUserAvatar">
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
                <div class="icon-add-user img">
                  <img src="{{ asset('img/orangtambah.png') }}" alt="daftar akun">
                </div>
                <div class="header-text">
                    <h1 id="akunJudul">Pendaftaran Akun</h1>
                    <p id="akunDesc">Langkah pertama untuk bergabung bersama SMK Ma'arif Walisongo Kajoran</p>
                </div>
            </div>

            <div class="stepper-groups">
                <div class="step-item active">
                    <div class="step-number">1</div>
                    <span class="step-text">Buat Akun</span>
                </div>
                <div class="step-line"></div>
                <div class="step-item inactive">
                    <div class="step-number">2</div>
                    <span class="step-text">Isi Formulir</span>
                </div>
                <div class="step-line"></div>
                <div class="step-item inactive">
                    <div class="step-number">3</div>
                    <span class="step-text">Unggah Berkas</span>
                </div>
            </div>
        </header>

        <main>
            <div class="form-section-title">Data Akun</div>
            
            <form action="{{ route('register.proses') }}" method="POST">
                @csrf
                <div class="form-grid" id="akunFieldsGrid">
                    <div class="form-control">
                        <label for="name">Nama Lengkap<span>*</span></label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                    </div>
                    
                    <div class="form-control">
                        <label for="whatsapp">No. HP / WhatsApp<span>*</span></label>
                        <input type="tel" id="whatsapp" name="no_hp" placeholder="Masukkan no. HP aktif" required>
                    </div>
                    
                    <div class="form-control">
                        <label for="email">Email<span>*</span></label>
                        <input type="email" id="email" name="email" placeholder="Masukkan alamat email" required>
                    </div>
                    
                    <div class="form-control">
                        <label for="password">Password<span>*</span></label>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" placeholder="Masukkan password akun" required>
                            <button type="button" class="toggle-password" onclick="togglePasswordVisibility('password', this)">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="action-buttons">
                    <a href="{{ url('/home') }}" class="btn-back">← Kembali</a>
                    <button type="submit" class="btn-next" style="border: none; cursor: pointer;">Selanjutnya →</button>
                </div>
            </form>
        </main>
    </div>

    <footer class="register-footer">
        <div class="footer-info-item">
            <img src="{{ asset('img/lokasi.png') }}" alt="Icon" class="footer-icon">
            <div>
                <strong>SMK Ma'arif Walisongo Kajoran</strong><br>
                Jl. KH. Ridwan, Sidowangi, Kajoran, Kab. Magelang, Jawa Tengah 56163.
            </div>
        </div>
        
        <div class="footer-info-item">
            <img src="{{ asset('img/kontak.png') }}" alt="Icon" class="footer-icon">
            <div>
                <strong>Hubungi Kami</strong><br>
                (0293) 3195678<br>
                www.ppdb.smkmaarifwalisongokajoran.sch.id
            </div>
        </div>
        
        <div class="footer-info-item">
            <img src="{{ asset('img/jam.png') }}" alt="Icon" class="footer-icon">
            <div>
                <strong>Jam Operasional</strong><br>
                Senin - Jumat<br>
                07.00 - 12.00
            </div>
        </div>
        
        <div class="footer-info-item">
            <div class="quote-text">
                "Menyiapkan generasi islami, kompeten dan berakhlakul karimah."
            </div>
        </div>
    </footer>

    <script>
        /* ==========================================================================
           FUNGSI TOGGLE LIHAT / SEMBUNYIKAN PASSWORD
           ========================================================================== */
        function togglePasswordVisibility(fieldId, btnElement) {
            const passwordInput = document.getElementById(fieldId);
            const icon = btnElement.querySelector('i');
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }

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

            // SIMULASI LOGIN (Ubah ke true jika mendeteksi user sudah masuk/login)
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

            if (!config.pendaftaran || !config.pendaftaran.akun) return;
            const a = config.pendaftaran.akun;

            setText('akunJudul', a.judul);
            setText('akunDesc', a.desc);

            if (Array.isArray(a.fields) && a.fields.length) {
                const grid = document.getElementById('akunFieldsGrid');
                if (grid) {
                    const slug = (s, i) => String(s || 'field' + i).toLowerCase().trim()
                        .replace(/[^a-z0-9]+/g, '_').replace(/^_+|_+$/g, '');
                    grid.innerHTML = a.fields.map((f, i) => {
                        const fid = slug(f.label, i);
                        const req = f.required === 'ya';
                        const opts = (f.options || '').split(',').map(o => o.trim()).filter(Boolean);
                        let inputHtml = '';
                        
                        const isPassword = (f.label || '').toLowerCase().includes('password');

                        if (f.type === 'select') {
                            inputHtml = `<select id="${fid}" name="${fid}" ${req ? 'required' : ''}>
                                <option value="" disabled selected>${f.helper || 'Pilih salah satu'}</option>
                                ${opts.map(o => `<option value="${o}">${o}</option>`).join('')}
                            </select>`;
                        } else if (f.type === 'radio' || f.type === 'checkbox') {
                            inputHtml = opts.map(o => `
                                <label style="display:flex;align-items:center;gap:6px;font-weight:400;font-size:13px;">
                                    <input type="${f.type}" name="${fid}" value="${o}"> ${o}
                                </label>`).join('');
                        } else if (f.type === 'textarea') {
                            inputHtml = `<textarea id="${fid}" name="${fid}" ${req ? 'required' : ''} placeholder="${f.helper || ''}"></textarea>`;
                        } else if (f.type === 'info') {
                            return `<div class="form-control" style="grid-column:span 2;">
                                <div style="background:#e6f4f0;border:1px solid #02403f;padding:12px 15px;border-radius:8px;font-size:13px;color:#02403f;">${f.helper || f.label || ''}</div>
                            </div>`;
                        } else {
                            if (isPassword || f.type === 'password') {
                                inputHtml = `<div class="password-wrapper">
                                    <input type="password" id="${fid}" name="${fid}" ${req ? 'required' : ''} placeholder="${f.helper || ''}">
                                    <button type="button" class="toggle-password" onclick="togglePasswordVisibility('${fid}', this)">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>`;
                            } else {
                                const type = f.type === 'number' ? 'tel' : f.type === 'date' ? 'date' : 'text';
                                inputHtml = `<input type="${type}" id="${fid}" name="${fid}" ${req ? 'required' : ''} placeholder="${f.helper || ''}">`;
                            }
                        }
                        return `<div class="form-control">
                            <label for="${fid}">${f.label || ''}${req ? '<span>*</span>' : ''}</label>
                            ${inputHtml}
                        </div>`;
                    }).join('');
                }
            }
        })();
    </script>
</body>
</html>