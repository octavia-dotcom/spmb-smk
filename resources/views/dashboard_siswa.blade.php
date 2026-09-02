<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - PPDB SMK Maarif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* RESET & GLOBAL STYLING */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #f8f9fa;
            display: flex;
            color: #333;
            overflow-x: hidden;
        }

        /* SIDEBAR NAVIGASI SISWA */
        .sidebar {
            width: 260px;
            background-color: #022c22;
            color: #ffffff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 15px 15px 15px;
            z-index: 100;
            transition: all 0.3s ease;
        }
        .sidebar.collapsed {
            left: -260px;
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            margin-bottom: 15px;
        }
        .logo-sekolah-img {
            width: 42px;
            height: 42px;
            object-fit: contain;
            border-radius: 4px;
        }
        .school-title h1 {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            line-height: 1.2;
            font-weight: 700;
        }
        .school-title h2 {
            font-size: 11px;
            color: #a0c4be;
            font-weight: 400;
        }
        .siswa-tag {
            display: inline-block;
            background-color: #0c5243;
            font-size: 10px;
            padding: 2px 8px;
            border-radius: 4px;
            margin-top: 4px;
            color: #a7f3d0;
            font-weight: 600;
        }

        .menu-nav {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .menu-nav a {
            color: #ffffff;
            text-decoration: none;
            padding: 11px 14px;
            border-radius: 8px;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: background 0.2s;
        }
        .menu-nav a:hover, .menu-nav a.active {
            background-color: rgba(255, 255, 255, 0.15);
            font-weight: 600;
        }

        /* CARD BANTUAN SIDEBAR */
        .help-card {
            background-color: rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            padding: 12px;
            text-align: center;
            margin-bottom: 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
        .help-card h4 {
            font-size: 12px;
            margin-bottom: 2px;
        }
        .help-card p {
            font-size: 10px;
            color: #a0c4be;
            margin-bottom: 8px;
        }
        .btn-help {
            background: #ffffff;
            color: #022c22;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            width: 100%;
            transition: background 0.2s;
        }
        .btn-help:hover {
            background-color: #e6f4ea;
        }

        /* BOTTOM SIDEBAR: LOGOUT & COPYRIGHT */
        .sidebar-bottom {
            display: flex;
            flex-direction: column;
            gap: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            padding-top: 12px;
        }
        .btn-logout-sidebar {
            background-color: rgba(217, 83, 79, 0.2);
            color: #ffb3b3;
            border: 1px solid rgba(217, 83, 79, 0.3);
            padding: 9px;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 600;
            width: 100%;
            transition: all 0.2s;
        }
        .btn-logout-sidebar:hover {
            background-color: #d9534f;
            color: #ffffff;
        }
        .sidebar-copyright {
            font-size: 10px;
            color: #a0c4be;
            text-align: center;
            line-height: 1.3;
        }

        /* MAIN CONTENT AREA */
        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        .main-content.expanded {
            margin-left: 0;
            width: 100%;
        }

        /* TOPBAR HEADER */
        .top-navbar {
            background-color: #ffffff;
            height: 65px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 90;
        }
        
        .btn-toggle-menu {
            background: transparent;
            border: none;
            font-size: 18px;
            color: #022c22;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8px 10px;
            border-radius: 6px;
            transition: background 0.2s;
        }
        .btn-toggle-menu:hover {
            background-color: #f0f0f0;
        }

        .page-title {
            font-size: 18px;
            font-weight: 700;
            color: #022c22;
        }

        /* PROFILE DROPDOWN ATAS KANAN */
        .profile-wrapper {
            position: relative;
        }
        .profile-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px 10px;
            border-radius: 8px;
            transition: background 0.2s;
        }
        .profile-btn:hover {
            background-color: #f0f0f0;
        }
        .profile-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #022c22;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
            overflow: hidden;
        }
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-text {
            text-align: right;
            line-height: 1.2;
        }
        .profile-text .name {
            font-weight: 700;
            font-size: 13px;
            color: #333;
        }
        .profile-text .nisn {
            font-size: 11px;
            color: #666;
        }
        .profile-dropdown {
            position: absolute;
            right: 0;
            top: 50px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            width: 170px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            display: none;
            flex-direction: column;
            overflow: hidden;
            z-index: 100;
        }
        .profile-dropdown.show {
            display: flex;
        }
        .dropdown-item {
            padding: 12px 16px;
            font-size: 13px;
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }
        .dropdown-item:hover {
            background-color: #f5f5f5;
        }
        .dropdown-item.logout {
            color: #d9534f;
            border-top: 1px solid #eeeeee;
        }

        /* CONTENT BODY */
        .content-body {
            padding: 30px;
        }

        /* BANNER WELCOME HARMONIS */
        .welcome-banner {
            background: linear-gradient(135deg, #022c22 0%, #047857 100%);
            color: white;
            border-radius: 12px;
            padding: 24px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(2, 44, 34, 0.15);
        }
        .welcome-text h2 {
            font-size: 20px;
            margin-bottom: 6px;
        }
        .welcome-text p {
            font-size: 13px;
            color: #ecfdf5;
        }
        .welcome-text .welcome-subtext {
            font-size: 13.5px;
            color: #d1fae5;
            margin-bottom: 8px;
            display: none;
        }
        .welcome-text .welcome-subtext.show {
            display: block;
        }
        .welcome-text .welcome-info {
            font-size: 12px;
            color: #a7f3d0;
        }
        .badge-status {
            background-color: #fef3c7;
            color: #b45309;
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        /* CARD STYLE UMUM */
        .card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 25px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .card-title i {
            color: #047857;
        }

        /* PROGRES STEPPER HORIZONTAL (5 STEP) */
        .stepper-container {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin: 20px 0 10px 0;
        }
        .stepper-progress-line {
            position: absolute;
            top: 20px;
            left: 10%;
            width: 80%;
            height: 3px;
            background-color: #e5e7eb;
            z-index: 1;
        }
        .stepper-progress-fill {
            position: absolute;
            top: 20px;
            left: 10%;
            width: 0%;
            height: 3px;
            background-color: #047857;
            z-index: 2;
            transition: width 0.4s ease;
        }
        .step-item {
            position: relative;
            z-index: 3;
            text-align: center;
            flex: 1;
        }
        .step-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background-color: #ffffff;
            border: 3px solid #e5e7eb;
            color: #9ca3af;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px auto;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .step-item.completed .step-icon {
            background-color: #047857;
            border-color: #047857;
            color: white;
        }
        .step-item.active .step-icon {
            background-color: #ffffff;
            border-color: #047857;
            color: #047857;
            box-shadow: 0 0 0 4px rgba(4, 120, 87, 0.15);
        }
        .step-label {
            font-size: 12px;
            font-weight: 600;
            color: #4b5563;
        }
        .step-item.completed .step-label,
        .step-item.active .step-label {
            color: #047857;
            font-weight: 700;
        }
        .step-date {
            font-size: 11px;
            color: #9ca3af;
            margin-top: 3px;
        }

        /* GRID DUA KOLOM BAWAH */
        .grid-two-col {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        }

        /* MENU QUICK ACTION (4 KARTU) */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .menu-card {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: #333;
            transition: all 0.2s;
        }
        .menu-card:hover {
            border-color: #047857;
            background-color: #f0fdf4;
            transform: translateY(-2px);
        }
        .menu-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background-color: #e6f4ea;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }
        .menu-text h4 {
            font-size: 13px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 2px;
        }
        .menu-text p {
            font-size: 11px;
            color: #6b7280;
        }

        /* TIMELINE AGENDA */
        .timeline-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .timeline-item {
            display: flex;
            gap: 14px;
            align-items: flex-start;
        }
        .timeline-date-box {
            background-color: #f0fdf4;
            color: #047857;
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            padding: 6px 10px;
            text-align: center;
            min-width: 55px;
        }
        .timeline-date-box .day {
            font-size: 14px;
            font-weight: 700;
            line-height: 1;
        }
        .timeline-date-box .month {
            font-size: 9px;
            text-transform: uppercase;
            font-weight: 600;
            margin-top: 2px;
        }
        .timeline-content h4 {
            font-size: 13px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 2px;
        }
        .timeline-content p {
            font-size: 11px;
            color: #6b7280;
        }

        /* ==========================================================================
           RESPONSIVE — TABLET & MOBILE (tidak mengubah struktur, hanya tampilan)
           ========================================================================== */

        @media (max-width: 992px) {
            /* Sidebar jadi off-canvas: default tersembunyi, muncul saat toggle */
            .sidebar {
                left: -260px;
                box-shadow: 0 0 0 rgba(0,0,0,0);
            }
            .sidebar.collapsed {
                left: 0;
                box-shadow: 0 0 40px rgba(0,0,0,0.35);
            }

            /* Konten utama selalu full width di layar sempit */
            .main-content,
            .main-content.expanded {
                margin-left: 0;
                width: 100%;
            }

            .grid-two-col {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .top-navbar {
                padding: 0 16px;
                height: 60px;
            }
            .page-title {
                font-size: 15px;
            }
            .profile-text {
                display: none;
            }
            .profile-btn {
                gap: 8px;
                padding: 4px;
            }
            .profile-dropdown {
                width: 150px;
            }

            .content-body {
                padding: 16px;
            }

            .welcome-banner {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
                padding: 20px;
            }
            .badge-status {
                align-self: flex-start;
            }

            .card {
                padding: 18px;
            }

            /* Stepper progres: lepas dari garis presisi %, biarkan wrap 2 baris */
            .stepper-container {
                flex-wrap: wrap;
                row-gap: 22px;
                column-gap: 10px;
            }
            .stepper-progress-line,
            .stepper-progress-fill {
                display: none;
            }
            .step-item {
                flex: 1 1 40%;
                min-width: 90px;
            }
            .step-icon {
                width: 36px;
                height: 36px;
                font-size: 12px;
            }
            .step-label {
                font-size: 11px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .welcome-text h2 {
                font-size: 17px;
            }
            .welcome-text p,
            .welcome-info {
                font-size: 12px;
            }
            .badge-status {
                font-size: 11px;
                padding: 7px 14px;
            }
            .sidebar {
                width: 240px;
                left: -240px;
            }
            .sidebar.collapsed {
                left: 0;
            }
            .step-item {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar" id="sidebar">
        <div>
            <div class="sidebar-header">
                <img src="{{ asset('img/logo.smk.png') }}" alt="Logo SMK" class="logo-sekolah-img" onerror="this.src='https://via.placeholder.com/42';">
                <div class="school-title">
                    <h1>SMK MAARIF WALISONGO KAJORAN</h1>
                    <h2>SPMB 2027/2028</h2>
                    <span class="siswa-tag">Siswa Panel</span>
                </div>
            </div>

            <div class="menu-nav">
                <a href="{{ url('/dashboard_siswa') }}" class="active"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
                <a href="{{ url('/biodata_siswa') }}"><i class="fa-solid fa-user-gear"></i> Profil Pendaftar</a>
                <a href="{{ url('/berkas_pendaftaran') }}"><i class="fa-solid fa-file-lines"></i> Berkas Pendaftaran</a>
                <a href="{{ url('/cetak_kartu') }}"><i class="fa-solid fa-address-card"></i> Cetak Kartu</a>
                <a href="{{ url('/pengumuman_siswa') }}"><i class="fa-solid fa-bullhorn"></i> Pengumuman</a>
            </div>
        </div>

        <div>
             <div class="help-card">
                <i class="fa-solid fa-headset" style="font-size: 18px; margin-bottom: 4px; color: #a7f3d0;"></i>
                <h4>Butuh bantuan?</h4>
                <p>Hubungi kami jika ada kendala pendaftaran</p>
                <button class="btn-help" onclick="hubungiAdminWA()">Hubungi kami &rarr;</button>
            </div>
            
            <div class="sidebar-bottom">
                <button class="btn-logout-sidebar" onclick="logoutSystem()">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </button>
                <div class="sidebar-copyright">
                    &copy; 2026 SMK Ma'arif Walisongo Kajoran<br>All Rights Reserved
                </div>
            </div>
        </div>
    </div>

    <div class="main-content" id="mainContent">

        <div class="top-navbar">
            <div style="display: flex; align-items: center; gap: 12px;">
                <button class="btn-toggle-menu" onclick="toggleSidebar()" title="Toggle Sidebar Menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="page-title">Dashboard Pendaftaran</div>
            </div>

            <!-- PROFILE TOPBAR DENGAN ID LENGKAP -->
            <div class="profile-wrapper">
                <button class="profile-btn" onclick="toggleProfileDropdown(event)">
                    <div class="profile-text">
                        <div class="name" id="namaSiswaDisplay">{{ $pendaftar->nama_lengkap ?? 'Calon Siswa' }}</div>
                        <div class="nisn" id="nisnSiswaDisplay">{{ $pendaftar?->nisn ?? 'NISN: 0081234567' }}</div>
                    </div>
                    <div class="profile-avatar" id="avatarDisplay"><i class="fa-solid fa-user"></i></div>
                    <i class="fa-solid fa-chevron-down" style="font-size: 11px; color: #888;"></i>
                </button>

                <div class="profile-dropdown" id="profileDropdown">
                    <button class="dropdown-item" onclick="window.location.href='{{ url('/biodata_siswa') }}'">
                        <i class="fa-solid fa-user"></i> Profil
                    </button>
                    <button class="dropdown-item logout" onclick="logoutSystem()">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </div>
            </div>
        </div>

        <div class="content-body">

            <!-- WELCOME BANNER YANG BISA BACA NAMA, NO PENDAFTARAN & JURUSAN -->
            <div class="welcome-banner">
                <div class="welcome-text">
                    <h2 id="welcomeHeading">Selamat Datang, <span id="bannerNamaSiswa">{{ $pendaftar->nama_lengkap ?? 'Calon Siswa' }}</span>! 👋</h2>
                    <p id="welcomeSubtext" class="welcome-subtext"></p>
                    <p class="welcome-info">No. Pendaftaran: <strong id="bannerNoPendaftaran">{{ $pendaftar->no_pendaftaran ?? 'Belum Daftar' }}</strong> | Pilihan 1: <strong id="bannerJurusan">{{ $pendaftar?->jurusanPilihan1?->kode_jurusan ?? '-' }}</strong></p>
                </div>
                <div class="badge-status" id="statusBadge">
                    <i class="fa-solid fa-spinner fa-spin"></i> Berkas Sedang Diverifikasi
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <i class="fa-solid fa-bars-staggered"></i> Status Progres Pendaftaran
                    </div>
                </div>

                <div class="stepper-container">
                    <div class="stepper-progress-line"></div>
                    <div class="stepper-progress-fill" id="progressFill"></div>

                    <div class="step-item {{ !empty(auth()->user()) ? 'completed' : '' }}" id="step1">
                        <div class="step-icon">1</div>
                        <div class="step-label">1. Buat Akun</div>
                        <div class="step-date" id="dateStep1">{{ optional(auth()->user())->created_at?->format('d M Y') ?? '-' }}</div>
                    </div>

                    <div class="step-item {{ !empty($pendaftar?->nama_lengkap) ? 'completed' : '' }}" id="step2">
                        <div class="step-icon">2</div>
                        <div class="step-label">2. Isi Formulir</div>
                        <div class="step-date" id="dateStep2">{{ optional($pendaftar)->created_at?->format('d M Y') ?? 'Belum' }}</div>
                    </div>

                    <div class="step-item {{ !empty($pendaftar?->dokumenPendaftar?->is_lengkap) ? 'completed' : '' }}" id="step3">
                        <div class="step-icon">3</div>
                        <div class="step-label">3. Upload Berkas</div>
                        <div class="step-date" id="dateStep3">{{ optional($pendaftar?->dokumenPendaftar)->created_at?->format('d M Y') ?? 'Belum' }}</div>
                    </div>

                    <div class="step-item {{ optional($pendaftar)->status_verifikasi == 'Diverifikasi' || optional($pendaftar)->status_pendaftaran == 'Lulus' ? 'completed' : '' }}" id="step4">
                        <div class="step-icon">4</div>
                        <div class="step-label">4. Verifikasi Admin</div>
                        <div class="step-date" id="dateStep4">{{ optional($pendaftar)->status_verifikasi ?? 'Proses...' }}</div>
                    </div>

                    <div class="step-item {{ optional($pendaftar)->status_pendaftaran == 'Lulus' ? 'completed' : '' }}" id="step5">
                        <div class="step-icon">5</div>
                        <div class="step-label">5. Pengumuman</div>
                        <div class="step-date" id="dateStep5">{{ optional($pendaftar)->status_pendaftaran == 'Lulus' ? 'Lulus' : '-' }}</div>
                    </div>
                </div>
            </div>

            <div class="grid-two-col">

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fa-solid fa-grip"></i> Menu Pendaftaran
                        </div>
                    </div>

                    <div class="menu-grid">
                        <a href="{{ url('/biodata_siswa') }}" class="menu-card">
                            <div class="menu-icon"><i class="fa-solid fa-id-card"></i></div>
                            <div class="menu-text">
                                <h4>Biodata Diri</h4>
                                <p>Lihat & update data profil pendaftar</p>
                            </div>
                        </a>

                        <a href="{{ url('/berkas_pendaftaran') }}" class="menu-card">
                            <div class="menu-icon"><i class="fa-solid fa-file-arrow-up"></i></div>
                            <div class="menu-text">
                                <h4>Upload Berkas</h4>
                                <p>Cek & unggah kelengkapan berkas</p>
                            </div>
                        </a>

                        <a href="{{ url('/cetak_kartu') }}" class="menu-card">
                            <div class="menu-icon"><i class="fa-solid fa-print"></i></div>
                            <div class="menu-text">
                                <h4>Cetak Kartu</h4>
                                <p>Cetak bukti fisik pendaftaran</p>
                            </div>
                        </a>

                        <a href="{{ url('/pengumuman_siswa') }}" class="menu-card">
                            <div class="menu-icon"><i class="fa-solid fa-bullhorn"></i></div>
                            <div class="menu-text">
                                <h4>Pengumuman</h4>
                                <p>Lihat status kelulusan seleksi</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fa-solid fa-calendar-days"></i> Agenda SPMB
                        </div>
                    </div>

                    <div class="timeline-list">
                        <div class="timeline-item">
                            <div class="timeline-date-box">
                                <div class="day">15</div>
                                <div class="month">MEI</div>
                            </div>
                            <div class="timeline-content">
                                <h4>Batas Akhir Upload Berkas</h4>
                                <p>Terakhir unggah dokumen persyaratan.</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-date-box">
                                <div class="day">20</div>
                                <div class="month">MEI</div>
                            </div>
                            <div class="timeline-content">
                                <h4>Tes Minat Bakat</h4>
                                <p>Pelaksanaan secara offline di SMK.</p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-date-box">
                                <div class="day">01</div>
                                <div class="month">JUN</div>
                            </div>
                            <div class="timeline-content">
                                <h4>Pengumuman Hasil Seleksi</h4>
                                <p>Pengumuman kelulusan akhir.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- SCRIPT GABUNGAN UNTUK SINKRONISASI DATA LOG IN, LOCALSTORAGE & DINAMIK PROGRES -->
    <script>
        /* 0. AMBIL STATUS KELULUSAN DARI HALAMAN ADMIN "SELEKSI & KELULUSAN" (list_pendaftar) */
        function getStatusSeleksiSiswa(noPendaftaran, nama) {
            try {
                const listPendaftar = JSON.parse(localStorage.getItem("list_pendaftar") || "[]");
                if (!Array.isArray(listPendaftar) || listPendaftar.length === 0) return "Belum Diproses";

                // Cocokkan dulu berdasarkan No. Pendaftaran (paling akurat)
                let match = listPendaftar.find(item => (item.noReg || item.noPendaftaran) === noPendaftaran);

                // Kalau tidak ketemu, cocokkan berdasarkan nama (case-insensitive)
                if (!match && nama) {
                    match = listPendaftar.find(item => item.nama && item.nama.toLowerCase() === nama.toLowerCase());
                }

                return match ? (match.statusSeleksi || "Belum Diproses") : "Belum Diproses";
            } catch (e) {
                return "Belum Diproses";
            }
        }

        /* 1. SINKRONISASI DATA PROFILE & PROGRES PENDAFTARAN */
        function loadProfileData() {
            if (!localStorage.getItem("session_user")) {
                localStorage.setItem("session_user", JSON.stringify({ nama: "Calon Siswa 1", nisn: "0081234567" }));
            }
            if (!localStorage.getItem("data_pendaftaran")) {
                localStorage.setItem("data_pendaftaran", JSON.stringify({
                    nama: "Calon Siswa 1",
                    nisn: "0081234567",
                    noPendaftaran: "SPMB-2027-0001",
                    jurusan1: "PPLG"
                }));
            }

            const sessionData = localStorage.getItem("session_user");
            const dataFormulir = localStorage.getItem("data_pendaftaran");
            const berkasSiswa = localStorage.getItem("berkas_pendaftaran") || localStorage.getItem("berkas_pendaftar_current");
            const pasFoto = localStorage.getItem("pas_foto_siswa");

            // MEMBACA STATUS LENGKAP ADMIN / BERKAS
            const currentBerkas = JSON.parse(localStorage.getItem("berkas_pendaftar_current") || "{}");
            const globalStatus = currentBerkas._statusGlobal || localStorage.getItem("status_verifikasi_admin") || "process";

            let nama = "Calon Siswa 1";
            let nisn = "0081234567";
            let noPendaftaran = "SPMB-2027-0001";
            let jurusan = "PPLG";

            if (sessionData) {
                const user = JSON.parse(sessionData);
                if (user.nama) nama = user.nama;
                if (user.nisn) nisn = user.nisn;
            }

            if (dataFormulir) {
                const form = JSON.parse(dataFormulir);
                if (form.nama) nama = form.nama;
                if (form.nisn) nisn = form.nisn;
                if (form.noPendaftaran) noPendaftaran = form.noPendaftaran;
                if (form.jurusan1) jurusan = form.jurusan1;
            }

            const elNama = document.getElementById("namaSiswaDisplay");
            const elNisn = document.getElementById("nisnSiswaDisplay");
            const elBannerNama = document.getElementById("bannerNamaSiswa");
            const elBannerNo = document.getElementById("bannerNoPendaftaran");
            const elBannerJurusan = document.getElementById("bannerJurusan");

            if (elNama && elNama.innerText.trim() === "") elNama.innerText = nama;
            if (elNisn && elNisn.innerText.includes("0081234567")) elNisn.innerText = "NISN: " + nisn;
            if (elBannerNama && elBannerNama.innerText.trim() === "") elBannerNama.innerText = nama;
            if (elBannerNo && elBannerNo.innerText.includes("Belum")) elBannerNo.innerText = noPendaftaran;

            const elAvatar = document.getElementById("avatarDisplay");
            if (pasFoto && elAvatar) {
                elAvatar.innerHTML = `<img src="${pasFoto}" alt="Avatar">`;
            } else if (elAvatar) {
                elAvatar.innerHTML = `<i class="fa-solid fa-user"></i>`;
            }

            // === PENGECEKAN DINAMIS PROGRES STEPPER ===
            let completedSteps = 0;

            // STEP 1: BUAT AKUN
            const elStep1 = document.getElementById('step1');
            if (sessionData || elStep1.classList.contains('completed')) {
                if(!elStep1.classList.contains('completed')) elStep1.className = 'step-item completed';
                elStep1.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-check"></i>';
                completedSteps++;
            } else {
                elStep1.className = 'step-item';
                elStep1.querySelector('.step-icon').innerText = '1';
            }

            // STEP 2: ISI FORMULIR
            const elStep2 = document.getElementById('step2');
            if (dataFormulir || elStep2.classList.contains('completed')) {
                if(!elStep2.classList.contains('completed')) elStep2.className = 'step-item completed';
                elStep2.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-check"></i>';
                completedSteps++;
            } else {
                elStep2.className = 'step-item';
                elStep2.querySelector('.step-icon').innerText = '2';
            }

            // STEP 3: UPLOAD BERKAS
            const elStep3 = document.getElementById('step3');
            if (berkasSiswa || elStep3.classList.contains('completed')) {
                if(!elStep3.classList.contains('completed')) elStep3.className = 'step-item completed';
                elStep3.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-check"></i>';
                completedSteps++;
            } else {
                elStep3.className = 'step-item';
                elStep3.querySelector('.step-icon').innerText = '3';
            }

            // STEP 4: VERIFIKASI ADMIN & BADGE STATUS BANNER
            const elStep4 = document.getElementById('step4');
            const elStatusBadge = document.getElementById('statusBadge');
            const dateStep4 = document.getElementById('dateStep4');
            const elStep5 = document.getElementById('step5');
            const dateStep5 = document.getElementById('dateStep5');
            const elWelcomeHeading = document.getElementById('welcomeHeading');
            const elWelcomeSubtext = document.getElementById('welcomeSubtext');

            // AMBIL STATUS KELULUSAN YANG DITENTUKAN ADMIN DI HALAMAN SELEKSI & KELULUSAN
            const statusSeleksi = getStatusSeleksiSiswa(noPendaftaran, nama);

            if (statusSeleksi === "Lulus") {
                elStep4.className = 'step-item completed';
                elStep4.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-check"></i>';
                if (dateStep4) dateStep4.innerText = "Selesai";
                completedSteps++;

                if (elStatusBadge) {
                    elStatusBadge.style.backgroundColor = '#d1fae5';
                    elStatusBadge.style.color = '#047857';
                    elStatusBadge.innerHTML = '<i class="fa-solid fa-circle-check"></i> Selamat! Anda Lulus';
                }

                if (elWelcomeHeading) elWelcomeHeading.textContent = "Selamat! Anda Dinyatakan Lulus 🎉";
                if (elWelcomeSubtext) {
                    elWelcomeSubtext.textContent = "Selamat bergabung! Semoga sukses dan semangat meraih prestasi bersama kami! 💚";
                    elWelcomeSubtext.classList.add('show');
                }

                elStep5.className = 'step-item completed';
                elStep5.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-check"></i>';
                if (dateStep5) dateStep5.innerText = "Lulus";
                completedSteps++;

            } else if (statusSeleksi === "Tidak Lulus") {
                elStep4.className = 'step-item completed';
                elStep4.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-check"></i>';
                if (dateStep4) dateStep4.innerText = "Selesai";
                completedSteps++;

                if (elStatusBadge) {
                    elStatusBadge.style.backgroundColor = '#fef2f2';
                    elStatusBadge.style.color = '#991b1b';
                    elStatusBadge.innerHTML = '<i class="fa-solid fa-circle-xmark"></i> Mohon Maaf, Anda Belum Lolos';
                }

                if (elWelcomeHeading) elWelcomeHeading.textContent = "Mohon Maaf, Anda Belum Lulus 🙏";
                if (elWelcomeSubtext) {
                    elWelcomeSubtext.textContent = "Tetap semangat! Jangan menyerah, masih banyak kesempatan untuk meraih cita-cita. 🌟";
                    elWelcomeSubtext.classList.add('show');
                }

                elStep5.className = 'step-item completed';
                elStep5.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-xmark"></i>';
                if (dateStep5) dateStep5.innerText = "Tidak Lulus";
                completedSteps++;

            } else if (statusSeleksi === "Cadangan") {
                elStep4.className = 'step-item active';
                elStep4.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-user-clock"></i>';
                if (dateStep4) dateStep4.innerText = "Cadangan";

                if (elStatusBadge) {
                    elStatusBadge.style.backgroundColor = '#fff7ed';
                    elStatusBadge.style.color = '#9a3412';
                    elStatusBadge.innerHTML = '<i class="fa-solid fa-user-clock"></i> Anda Masuk Daftar Cadangan';
                }

                if (elWelcomeHeading) elWelcomeHeading.textContent = "Anda Masuk Daftar Cadangan ⏳";
                if (elWelcomeSubtext) {
                    elWelcomeSubtext.textContent = "Tetap semangat dan jangan menyerah! Kesempatan masih terbuka untuk Anda. 💚";
                    elWelcomeSubtext.classList.add('show');
                }

                elStep5.className = 'step-item';
                elStep5.querySelector('.step-icon').innerText = '5';
                if (dateStep5) dateStep5.innerText = "-";

            } else if (globalStatus === "verified" || globalStatus === "disetujui") {
                elStep4.className = 'step-item completed';
                elStep4.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-check"></i>';
                if (dateStep4) dateStep4.innerText = "Terverifikasi";
                completedSteps++;

                if (elStatusBadge) {
                    elStatusBadge.style.backgroundColor = '#d1fae5';
                    elStatusBadge.style.color = '#047857';
                    elStatusBadge.innerHTML = '<i class="fa-solid fa-circle-check"></i> Berkas Terverifikasi';
                }

                // Nama sudah benar dari server (Blade), tidak perlu ditimpa JS lagi
                if (elWelcomeSubtext) elWelcomeSubtext.classList.remove('show');

                elStep5.className = 'step-item';
                elStep5.querySelector('.step-icon').innerText = '5';
                if (dateStep5) dateStep5.innerText = "-";
            } else if (globalStatus === "pending") {
                elStep4.className = 'step-item active';
                elStep4.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-clock"></i>';
                if (dateStep4) dateStep4.innerText = "Dipending";

                if (elStatusBadge) {
                    elStatusBadge.style.backgroundColor = '#fef3c7';
                    elStatusBadge.style.color = '#92400e';
                    elStatusBadge.innerHTML = '<i class="fa-solid fa-clock"></i> Pendaftaran Dipending / Belum Lengkap';
                }

                // Nama sudah benar dari server (Blade), tidak perlu ditimpa JS lagi
                if (elWelcomeSubtext) elWelcomeSubtext.classList.remove('show');

                elStep5.className = 'step-item';
                elStep5.querySelector('.step-icon').innerText = '5';
                if (dateStep5) dateStep5.innerText = "-";
            } else if (globalStatus === "revisi") {
                elStep4.className = 'step-item active';
                elStep4.querySelector('.step-icon').innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i>';
                if (dateStep4) dateStep4.innerText = "Perlu Revisi";

                if (elStatusBadge) {
                    elStatusBadge.style.backgroundColor = '#fef2f2';
                    elStatusBadge.style.color = '#991b1b';
                    elStatusBadge.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Perlu Revisi Berkas';
                }

                // Nama sudah benar dari server (Blade), tidak perlu ditimpa JS lagi
                if (elWelcomeSubtext) elWelcomeSubtext.classList.remove('show');

                elStep5.className = 'step-item';
                elStep5.querySelector('.step-icon').innerText = '5';
                if (dateStep5) dateStep5.innerText = "-";
            } else {
                if(!elStep4.classList.contains('completed')) {
                    elStep4.className = 'step-item active';
                    elStep4.querySelector('.step-icon').innerText = '4';
                    if (dateStep4 && dateStep4.innerText.trim() === "") dateStep4.innerText = "Proses...";
                } else {
                    completedSteps++;
                }

                if (elStatusBadge) {
                    elStatusBadge.style.backgroundColor = '#fef3c7';
                    elStatusBadge.style.color = '#b45309';
                    elStatusBadge.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Berkas Sedang Diverifikasi';
                }

                // Nama sudah benar dari server (Blade), tidak perlu ditimpa JS lagi
                if (elWelcomeSubtext) elWelcomeSubtext.classList.remove('show');

                elStep5.className = 'step-item';
                elStep5.querySelector('.step-icon').innerText = '5';
                if (dateStep5) dateStep5.innerText = "-";
            }

            // ATUR GARIS HIJAU PENUH SESUAI JUMLAH STEP YANG SELESAI
            const progressFill = document.getElementById('progressFill');
            if (progressFill) {
                const widths = { 0: '0%', 1: '10%', 2: '32%', 3: '53%', 4: '75%', 5: '80%' };
                progressFill.style.width = widths[completedSteps] || '0%';
            }
        }

        window.addEventListener("DOMContentLoaded", loadProfileData);

        /* AUTO REFRESH KETIKA ADMIN MENGUBAH STATUS KELULUSAN DI TAB LAIN */
        window.addEventListener("storage", function(e) {
            if (e.key === "list_pendaftar" || e.key === "berkas_pendaftar_current" || e.key === "status_verifikasi_admin") {
                loadProfileData();
            }
        });

        /* 2. HUBUNGI ADMIN VIA WHATSAPP */
        function hubungiAdminWA() {
            const elemNama = document.getElementById('namaSiswaDisplay');
            const namaSiswa = elemNama ? elemNama.innerText.trim() : "Calon Siswa";
            const noAdmin = "622933195678";
            const teksPesan = `Halo Admin SPMB SMK Ma'arif Walisongo Kajoran, nama saya *${namaSiswa}*. Saya mau bertanya/mengajukan kendala terkait pendaftaran online. Mohon bantuannya, terima kasih!`;
            const urlWA = `https://wa.me/${noAdmin}?text=${encodeURIComponent(teksPesan)}`;
            window.open(urlWA, '_blank');
        }

        /* 3. TOGGLE SIDEBAR */
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        }

        /* 3b. PERILAKU SIDEBAR KHUSUS MOBILE/TABLET (<=992px) */
        function isMobileView() {
            return window.innerWidth <= 992;
        }

        document.querySelectorAll('.menu-nav a').forEach(function(link) {
            link.addEventListener('click', function() {
                if (isMobileView()) {
                    const sidebar = document.getElementById('sidebar');
                    const mainContent = document.getElementById('mainContent');
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                }
            });
        });

        document.addEventListener('click', function(event) {
            if (!isMobileView()) return;
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.querySelector('.btn-toggle-menu');
            if (!sidebar.classList.contains('collapsed')) return;

            const clickedInsideSidebar = sidebar.contains(event.target);
            const clickedToggleBtn = toggleBtn && toggleBtn.contains(event.target);

            if (!clickedInsideSidebar && !clickedToggleBtn) {
                const mainContent = document.getElementById('mainContent');
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
            }
        });

        let wasMobileView = isMobileView();
        window.addEventListener('resize', function() {
            const nowMobileView = isMobileView();
            if (nowMobileView !== wasMobileView) {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');
                sidebar.classList.remove('collapsed');
                mainContent.classList.remove('expanded');
                wasMobileView = nowMobileView;
            }
        });

        /* 4. TOGGLE PROFILE DROPDOWN */
        function toggleProfileDropdown(event) {
            event.stopPropagation();
            document.getElementById('profileDropdown').classList.toggle('show');
        }

        window.addEventListener('click', function() {
            const dropdown = document.getElementById('profileDropdown');
            if (dropdown && dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }
        });

        /* 5. LOGOUT SYSTEM (HAPUS SESSION USER) */
        function logoutSystem() {
            if (confirm("Apakah Anda yakin ingin keluar dari sistem?")) {
                localStorage.removeItem("session_user");
                window.location.href = "{{ url('/login') }}";
            }
        }
    </script>
</body>
</html>