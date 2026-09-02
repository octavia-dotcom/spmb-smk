<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Berkas Pendaftaran - SMK Ma'arif Walisongo Kajoran[cite: 15]</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
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
            max-width: 1000px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 30px;
            padding: 40px 50px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
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
        .logo-group { display: flex; align-items: center; gap: 12px; }
        .logo-sekolah { height: 45px; width: auto; }
        .logo-smkhebat { height: 45px; width: auto; }
        .logo-vokasi { height: 45px; width: auto; }
        .logo-akreditasi-nav { height: 45px; width: auto; }

        .nav-menu { display: flex; align-items: center; }
        .nav-menu a {
            text-decoration: none;
            color: #475569;
            margin: 0 15px;
            font-weight: 600;
            font-size: 15px;
            transition: color 0.3s;
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
            transition: background-color 0.3s;
        }
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
        .btn-profile-desktop:hover { background-color: #064e3b; }

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

        .register-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px dashed #e2e8f0;
            padding-bottom: 25px;
            margin-bottom: 30px;
        }
        .header-title-group { display: flex; align-items: center; gap: 15px; }
        .icon-add-user {
            width: 45px; height: 45px;
            background-color: #e6f4f0;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
        }
        .icon-add-user img { width: 50px; height: 50px; object-fit: contain; }
        .header-text h1 { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            font-size: 18px; 
            font-weight: 800; 
            color: #02403f; 
        }
        .header-text p { font-size: 12px; color: #64748b; }

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
        .step-item.completed .step-number { background-color: #e6f4f0; color: #02403f; border: 1px solid #02403f; }
        .step-item.active .step-number { background-color: #02403f; color: #ffffff; }
        .step-text { font-size: 11px; font-weight: 600; color: #475569; }
        .step-line { width: 30px; height: 1px; background-color: #cbd5e1; }

        .section-title-group {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 14px;
            font-weight: 700;
            color: #02403f;
            margin: 25px 0 15px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .section-title-group:first-of-type { margin-top: 0; }

        .badge-status {
            font-size: 10px;
            padding: 3px 8px;
            border-radius: 6px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .badge-wajib { background-color: #fee2e2; color: #dc2626; }
        .badge-opsional { background-color: #fef3c7; color: #d97706; }

        .upload-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }
        .upload-card {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background: #ffffff;
            justify-content: space-between;
            position: relative;
        }
        .card-info { display: flex; gap: 10px; align-items: flex-start; }
        .card-info img { width: 45px; height: 45px; object-fit: contain; flex-shrink: 0; }
        .card-info div p:first-child { font-size: 12px; font-weight: 700; color: #334155; }
        .card-info div p:last-child { font-size: 10px; color: #94a3b8; line-height: 1.2; }

        .upload-action-btn {
            background-color: #f1f5f9;
            border: 2px dashed #cbd5e1;
            border-radius: 8px;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .upload-action-btn:hover {
            background-color: #f0f7f4;
            border-color: #00cc84;
        }
        .upload-action-btn img { width: 18px; height: 18px; object-fit: contain; }
        .upload-action-btn span { font-size: 11px; font-weight: 600; color: #475569; }
        
        .file-name-display {
            font-size: 10px;
            color: #047857;
            font-weight: 600;
            text-align: center;
            word-break: break-all;
            margin-top: -4px;
        }
        
        .hidden-file-input { display: none !important; }

        .action-buttons {
            display: flex; justify-content: space-between; align-items: center;
            margin-top: 30px; border-top: 1px dashed #e2e8f0; padding-top: 25px;
        }
        .btn-back {
            border: 1px solid #02403f; background: transparent; color: #02403f;
            padding: 10px 25px; border-radius: 8px; font-weight: 600; font-size: 13px;
            text-decoration: none; display: inline-flex; align-items: center; gap: 8px;
        }
        .btn-finish {
            background-color: #02403f; border: none; color: #ffffff;
            padding: 11px 50px; border-radius: 8px; font-weight: 600; font-size: 13px;
            cursor: pointer; display: inline-flex; align-items: center; gap: 8px;
        }
        @media (max-width: 768px) {
            .register-container {
                padding: 20px 15px;
                border-radius: 20px;
            }
            .register-header {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }
            .upload-grid { 
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
                <img id="navLogoSekolah" src="{{ asset('img/logo.smk.png') }}" alt="Logo SMK Ma'arif" class="logo-sekolah">
                <img id="navLogoSmkHebat" src="{{ asset('img/logo-smk-hebat.png') }}" alt="Logo SMK Bisa Hebat" class="logo-smkhebat">
                <img id="navLogoVokasi" src="{{ asset('img/logo-smk-vokasi.png') }}" alt="Logo SMK Vokasi" class="logo-vokasi">
                <img id="navLogoAkreditasi" src="{{ asset('img/akreditasi.png') }}" alt="Akreditasi A" class="logo-akreditasi-nav">
            </div>

            <nav class="nav-menu" id="navMenuDropdown">
                <a href="{{ url('/home') }}">Beranda</a>
                <a href="{{ url('/buat-akun') }}">Pendaftaran</a>
                <a href="{{ url('/jurusan') }}">Jurusan</a>
                <a href="{{ url('/informasi') }}">Informasi</a>
                <a href="{{ url('/kontak') }}">Kontak</a>

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
                <a href="{{ url('/login') }}" class="btn-cta" id="desktopLoginBtn">Log in</a>

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
                <div class="icon-add-user"><img src="{{ asset('img/unggah.png') }}" alt="Icon"></div>
                <div class="header-text">
                    <h1 id="berkasJudul">Unggah Berkas & Pembayaran</h1>
                    <p id="berkasDesc">Lengkapi dokumen pendukung pendaftaran kamu</p>
                </div>
            </div>
            <div class="stepper-groups">
                <div class="step-item completed">
                    <div class="step-number">1</div>
                    <span class="step-text">Buat Akun</span>
                </div>
                <div class="step-line"></div>
                <div class="step-item completed">
                    <div class="step-number">2</div>
                    <span class="step-text">Isi Formulir</span>
                </div>
                <div class="step-line"></div>
                <div class="step-item active">
                    <div class="step-number">3</div>
                    <span class="step-text">Unggah Berkas & Pembayaran</span>
                </div>
            </div>
        </header>

        <main>
            @if ($errors->any())
            <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <strong>Perhatian!</strong> Pendaftaran gagal disimpan karena ada kekurangan:
                <ul style="margin-top: 5px; margin-bottom: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="formUnggahBerkas" action="{{ route('berkas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- DOKUMEN WAJIB -->
                <div class="section-title-group">
                    <span>A. Dokumen Wajib Unggah</span>
                    <span class="badge-status badge-wajib">Wajib</span>
                </div>

                <div class="upload-grid">
                    <!-- KARTU KELUARGA -->
                    <div class="upload-card">
                        <div class="card-info">
                            <img src="{{ asset('img/berkas.png') }}" alt="KK">
                            <div><p id="docTitle-kk">Kartu Keluarga (KK)</p><p id="docMeta-kk">Format: PDF/JPG/PNG. Maks 2MB</p></div>
                        </div>
                        <label for="input-kk" class="upload-action-btn">
                            <img src="{{ asset('img/upload.png') }}" alt="Upload Icon">
                            <span>Upload File</span>
                        </label>
                        <div id="name-kk" class="file-name-display"></div>
                        <input type="file" id="input-kk" name="kk" class="hidden-file-input" accept=".pdf, .jpg, .jpeg, .png" onchange="simpanBerkasLokal(this, 'kk')">
                    </div>

                    <!-- AKTA KELAHIRAN -->
                    <div class="upload-card">
                        <div class="card-info">
                            <img src="{{ asset('img/akte.png') }}" alt="Akta">
                            <div><p id="docTitle-akta">Akta Kelahiran</p><p id="docMeta-akta">Format: PDF/JPG/PNG. Maks 2MB</p></div>
                        </div>
                        <label for="input-akta" class="upload-action-btn">
                            <img src="{{ asset('img/upload.png') }}" alt="Upload Icon">
                            <span>Upload File</span>
                        </label>
                        <div id="name-akta" class="file-name-display"></div>
                        <input type="file" id="input-akta" name="akta" class="hidden-file-input" accept=".pdf, .jpg, .jpeg, .png" onchange="simpanBerkasLokal(this, 'akta')">
                    </div>

                    <!-- KTP AYAH -->
                    <div class="upload-card">
                        <div class="card-info">
                            <img src="{{ asset('img/ktp.png') }}" alt="KTP Ayah">
                            <div><p id="docTitle-ktp-ayah">KTP Ayah</p><p id="docMeta-ktp-ayah">Format: PDF/JPG/PNG. Maks 1MB</p></div>
                        </div>
                        <label for="input-ktp-ayah" class="upload-action-btn">
                            <img src="{{ asset('img/upload.png') }}" alt="Upload Icon">
                            <span>Upload File</span>
                        </label>
                        <div id="name-ktp-ayah" class="file-name-display"></div>
                        <input type="file" id="input-ktp-ayah" name="ktp_ayah" class="hidden-file-input" accept=".pdf, .jpg, .jpeg, .png" onchange="simpanBerkasLokal(this, 'ktp-ayah')">
                    </div>

                    <!-- KTP IBU -->
                    <div class="upload-card">
                        <div class="card-info">
                            <img src="{{ asset('img/ktp_ibu.png') }}" alt="KTP Ibu">
                            <div><p id="docTitle-ktp-ibu">KTP Ibu</p><p id="docMeta-ktp-ibu">Format: PDF/JPG/PNG. Maks 1MB</p></div>
                        </div>
                        <label for="input-ktp-ibu" class="upload-action-btn">
                            <img src="{{ asset('img/upload.png') }}" alt="Upload Icon">
                            <span>Upload File</span>
                        </label>
                        <div id="name-ktp-ibu" class="file-name-display"></div>
                        <input type="file" id="input-ktp-ibu" name="ktp_ibu" class="hidden-file-input" accept=".pdf, .jpg, .jpeg, .png" onchange="simpanBerkasLokal(this, 'ktp-ibu')">
                    </div>

                    <!-- KARTU PENERIMA KPS / KIP / PKH -->
                    <div class="upload-card" id="kartu-upload-kps" style="display: none;">
                        <div class="card-info">
                            <img src="{{ asset('img/kip.png') }}" alt="KPS"> 
                            <div><p id="docTitle-kps">Penerima KIP / KKS / PKH</p><p id="docMeta-kps">Format: PDF/JPG/PNG. Maks 1MB</p></div>
                        </div>
                        <label for="input-kps" class="upload-action-btn">
                            <img src="{{ asset('img/upload.png') }}" alt="Upload Icon">
                            <span>Upload File</span>
                        </label>
                        <div id="name-kps" class="file-name-display"></div>
                        <input type="file" id="input-kps" name="berkas_bantuan" class="hidden-file-input" accept=".pdf, .jpg, .jpeg, .png" onchange="simpanBerkasLokal(this, 'kps')">
                    </div>

                    <!-- BUKTI TRANSFER PEMBAYARAN GELOMBANG 2 -->
                    <div class="upload-card" id="kartu-upload-pembayaran" style="display: none;">
                        <div class="card-info">
                            <img src="{{ asset('img/transfer.png') }}" alt="Bukti Transfer">
                            <div><p id="docTitle-pembayaran">Bukti Bayar Gelombang 2 (Rp20.000)</p><p id="docMeta-pembayaran">Format: PDF/JPG/PNG. Maks 2MB</p></div>
                        </div>
                        <label for="input-pembayaran" class="upload-action-btn">
                            <img src="{{ asset('img/upload.png') }}" alt="Upload Icon">
                            <span>Upload Bukti</span>
                        </label>
                        <div id="name-pembayaran" class="file-name-display"></div>
                        <input type="file" id="input-pembayaran" name="bukti_pembayaran" class="hidden-file-input" accept=".pdf, .jpg, .jpeg, .png" onchange="simpanBerkasLokal(this, 'pembayaran')">
                    </div>
                </div>

                <!-- DOKUMEN OPSIONAL -->
                <div class="section-title-group">
                    <span>B. Dokumen Pendukung (Dapat Menyusul)</span>
                    <span class="badge-status badge-opsional">Opsional</span>
                </div>

                <div class="upload-grid">
                    <!-- PAS FOTO SISWA -->
                    <div class="upload-card">
                        <div class="card-info">
                            <img src="{{ asset('img/buatakun.png') }}" alt="Pas Foto">
                            <div><p id="docTitle-foto">Pas Foto Formal 3x4</p><p id="docMeta-foto">Format: JPG/PNG. Maks 2MB</p></div>
                        </div>
                        <label for="input-foto" class="upload-action-btn">
                            <img src="{{ asset('img/upload.png') }}" alt="Upload Icon">
                            <span>Upload Foto</span>
                        </label>
                        <div id="name-foto" class="file-name-display"></div>
                        <input type="file" id="input-foto" name="pas_foto" class="hidden-file-input" accept=".jpg, .jpeg, .png" onchange="simpanBerkasLokal(this, 'foto')">
                    </div>

                    <!-- SURAT KETERANGAN LULUS / IJAZAH -->
                    <div class="upload-card">
                        <div class="card-info">
                            <img src="{{ asset('img/skl.png') }}" alt="Ijazah">
                            <div><p id="docTitle-skl">SKL / Ijazah SMP/MTs</p><p id="docMeta-skl">Format: PDF/JPG/PNG. Maks 2MB</p></div>
                        </div>
                        <label for="input-skl" class="upload-action-btn">
                            <img src="{{ asset('img/upload.png') }}" alt="Upload Icon">
                            <span>Upload File</span>
                        </label>
                        <div id="name-skl" class="file-name-display"></div>
                        <input type="file" id="input-skl" name="skl" class="hidden-file-input" accept=".pdf, .jpg, .jpeg, .png" onchange="simpanBerkasLokal(this, 'skl')">
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ url('/formulir') }}" class="btn-back">← Kembali</a>
                    <button type="submit" class="btn-finish">Selesai Pendaftaran →</button>
                </div>
            </form>
        </main>
    </div>

    <script>
        /* ==========================================================================
           SCRIPT TOGGLE HAMBURGER & STATUS LOGIN (DESKTOP & MOBILE)
           ========================================================================== */
        document.addEventListener("DOMContentLoaded", function () {
            const hamburgerBtn = document.getElementById('hamburgerToggle');
            const navMenuDropdown = document.getElementById('navMenuDropdown');

            if (hamburgerBtn && navMenuDropdown) {
                hamburgerBtn.addEventListener('click', function () {
                    navMenuDropdown.classList.toggle('active-menu');
                });

                const navLinks = navMenuDropdown.querySelectorAll('a:not(.mobile-login-btn):not(.mobile-profile-btn)');
                navLinks.forEach(link => {
                    link.addEventListener('click', function () {
                        navMenuDropdown.classList.remove('active-menu');
                    });
                });
            }

            // SIMULASI LOGIN (Ubah ke true jika ingin menguji tampilan saat sudah login)
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

        // SIMPAN BERKAS KE LOCALSTORAGE & SYNC KE BERKAS PENDAFTAR CURRENT
        function simpanBerkasLokal(input, keyLokal) {
            const displayDiv = document.getElementById('name-' + keyLokal);
            if (input.files && input.files[0]) {
                const file = input.files[0];
                displayDiv.innerHTML = "✓ Terunggah: " + file.name;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const now = new Date();
                    const tanggalStr = now.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' }) + " " + now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }) + " WIB";
                    
                    const infoBerkas = {
                        fileName: file.name,
                        namaFile: file.name,
                        fileData: e.target.result,
                        tanggal: tanggalStr,
                        status: "menunggu"
                    };

                    localStorage.setItem('file_' + keyLokal, JSON.stringify(infoBerkas));

                    let currentBerkas = JSON.parse(localStorage.getItem("berkas_pendaftar_current") || "{}");
                    let targetKey = keyLokal;
                    if (keyLokal === 'kps') {
                        targetKey = 'kip';
                    } else if (keyLokal === 'pembayaran') {
                        targetKey = 'bayar';
                    }

                    currentBerkas[targetKey] = infoBerkas;
                    localStorage.setItem("berkas_pendaftar_current", JSON.stringify(currentBerkas));
                };
                reader.readAsDataURL(file);
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const keys = ['kk', 'akta', 'ktp-ayah', 'ktp-ibu', 'kps', 'pembayaran', 'foto', 'skl'];
            const currentBerkas = JSON.parse(localStorage.getItem("berkas_pendaftar_current") || "{}");

            keys.forEach(k => {
                let targetKey = k;
                if (k === 'kps') targetKey = 'kip';
                if (k === 'pembayaran') targetKey = 'bayar';

                const saved = currentBerkas[targetKey] || localStorage.getItem('file_' + k);
                if (saved) {
                    try {
                        const parsed = typeof saved === 'string' ? JSON.parse(saved) : saved;
                        const displayDiv = document.getElementById('name-' + k);
                        if (displayDiv && (parsed.fileName || parsed.namaFile)) {
                            displayDiv.innerHTML = "✓ Terunggah: " + (parsed.fileName || parsed.namaFile);
                        }
                    } catch(e){}
                }
            });

            const dataSiswa = JSON.parse(localStorage.getItem("dataSiswaSPMB") || "{}");
            const statusKps = localStorage.getItem('penerima_kps_status') || dataSiswa.kpsKip || dataSiswa.kps || "";
            const kartuKps = document.getElementById('kartu-upload-kps');
            
            if (kartuKps && String(statusKps).toLowerCase().match(/(ya|kip|kks|pkh|true)/)) {
                kartuKps.style.display = 'flex';
            }

            const gelombangPilihan = localStorage.getItem('gelombang_pendaftaran') || dataSiswa.gelombang || "";
            const metodeBayar = localStorage.getItem('metode_pembayaran') || "";
            const kartuPembayaran = document.getElementById('kartu-upload-pembayaran');
            
            if (kartuPembayaran && (String(gelombangPilihan).includes('2') || metodeBayar === 'transfer')) {
                kartuPembayaran.style.display = 'flex';
            }
        });
    </script>

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

        if (!config.pendaftaran || !config.pendaftaran.berkas) return;
        const b = config.pendaftaran.berkas;

        setText('berkasJudul', b.judul);
        setText('berkasDesc', b.desc);

        const urutanKartu = ['kk', 'akta', 'ktp-ayah', 'ktp-ibu', 'kps', 'pembayaran', 'foto', 'skl'];
        if (Array.isArray(b.list) && b.list.length) {
            urutanKartu.forEach((key, i) => {
                const item = b.list[i];
                if (!item) return;
                setText('docTitle-' + key, item.judul);
                const meta = [item.format ? `Format: ${item.format}` : '', item.maxSize ? `Maks ${item.maxSize}` : '']
                    .filter(Boolean).join('. ');
                setText('docMeta-' + key, meta);
            });
        }
    })();
    </script>
</body>
</html>