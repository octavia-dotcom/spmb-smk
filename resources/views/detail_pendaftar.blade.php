<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftar — Admin PPDB SMK Maarif</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --dark: #022c22;
            --accent: #047857;
            --accent-light: #ecfdf5;
            --bg: #f8f9fa;
            --card: #ffffff;
            --ink: #111827;
            --ink-soft: #6b7280;
            --line: #e5e7eb;
        }

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Poppins', sans-serif; 
        }

        body { 
            background: var(--bg); 
            color: var(--ink); 
            display: flex; 
            overflow-x: hidden; 
        }

        /* SIDEBAR ADMIN */
        .sidebar {
            width: 260px; 
            background-color: var(--dark); 
            color: #ffffff; 
            min-height: 100vh; 
            position: fixed;
            left: 0; 
            top: 0; 
            display: flex; 
            flex-direction: column; 
            justify-content: space-between; 
            padding: 20px 15px 15px 15px; 
            z-index: 100; 
            transition: all 0.2s ease;
        }

        .sidebar.collapsed { 
            left: -260px; 
        }

        .sidebar-header { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            padding-bottom: 20px; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1); 
            margin-bottom: 20px; 
        }

        .logo-sekolah-img { 
            width: 45px; 
            height: 45px; 
            object-fit: contain; 
            border-radius: 4px; 
        }

        .school-title h1 { 
            font-size: 13px; 
            text-transform: uppercase; 
            letter-spacing: 0.5px; 
            font-weight: 700; 
            line-height: 1.2; 
        }

        .school-title h2 { 
            font-size: 11px; 
            color: #a0c4be; 
            font-weight: normal; 
        }

        .admin-tag { 
            display: inline-block; 
            background-color: #0c5243; 
            font-size: 10px; 
            padding: 2px 6px; 
            border-radius: 4px; 
            margin-top: 4px; 
            color: #e6f4ea; 
        }

        .menu-nav { 
            display: flex; 
            flex-direction: column; 
            gap: 8px; 
        }

        .menu-nav a { 
            color: #ffffff; 
            text-decoration: none; 
            padding: 12px 15px; 
            border-radius: 6px; 
            font-size: 14px; 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            transition: background 0.2s; 
        }

        .menu-nav a:hover, 
        .menu-nav a.active { 
            background-color: rgba(255, 255, 255, 0.15); 
            font-weight: bold; 
        }

        .dropdown-btn { 
            width: 100%; 
            background: none; 
            border: none; 
            color: #ffffff; 
            padding: 11px 14px; 
            border-radius: 8px; 
            font-size: 13px; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            cursor: pointer; 
            transition: background 0.2s; 
        }

        .dropdown-btn:hover, 
        .dropdown-btn.active { 
            background-color: rgba(255, 255, 255, 0.15); 
        }

        .dropdown-container { 
            display: none; 
            flex-direction: column; 
            gap: 4px; 
            padding-left: 20px; 
            margin-top: 4px; 
        }

        .dropdown-container.show { 
            display: flex; 
        }

        .dropdown-container a { 
            font-size: 12.5px; 
            padding: 8px 12px; 
            opacity: 0.85; 
        }

        .arrow-icon { 
            font-size: 10px; 
            transition: transform 0.3s ease; 
        }

        .arrow-icon.rotate { 
            transform: rotate(180deg); 
        }

        .sidebar-bottom { 
            display: flex; 
            flex-direction: column; 
            gap: 12px; 
            padding-top: 15px; 
            border-top: 1px solid rgba(255, 255, 255, 0.1); 
        }

        .admin-profile-card { 
            background-color: rgba(255, 255, 255, 0.08); 
            border-radius: 12px; 
            padding: 12px 14px; 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            border: 1px solid rgba(255, 255, 255, 0.05); 
            text-decoration: none; 
            cursor: pointer; 
            transition: background-color 0.2s;
        }

        .admin-profile-card:hover {
            background-color: rgba(255, 255, 255, 0.14);
        }

        .admin-avatar { 
            width: 42px; 
            height: 42px; 
            border-radius: 50%; 
            background-color: #a0a0a0; 
            color: #ffffff; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 20px; 
            flex-shrink: 0; 
        }

        .admin-info .name { 
            font-size: 13px; 
            font-weight: 700; 
            color: #ffffff; 
            line-height: 1.2; 
        }

        .admin-info .role { 
            font-size: 11px; 
            color: #a0c4be; 
            margin-top: 2px; 
        }

        .btn-logout-sidebar { 
            background-color: transparent; 
            color: #ff9999; 
            border: 1px solid rgba(217, 83, 79, 0.4); 
            padding: 10px; 
            border-radius: 8px; 
            cursor: pointer; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            gap: 8px; 
            font-size: 13px; 
            font-weight: 600; 
            width: 100%; 
            transition: all 0.2s;
        }
        .btn-logout-sidebar:hover {
            background-color: #d9534f;
            color: #ffffff;
            border-color: #d9534f;
        }

        /*COPYRIGHT FOOTER SIDEBAR*/
        .sidebar-copyright {
            font-size: 10px;
            color: #a0c4be;
            text-align: center;
            line-height: 1.4;
            margin-top: 4px;
        }
        /* MAIN CONTENT */
        .main-content { 
            margin-left: 260px; 
            width: calc(100% - 260px); 
            min-height: 100vh; 
            transition: all 0.2s ease; 
        }

        .main-content.expanded { 
            margin-left: 0; 
            width: 100%; 
        }

        .top-navbar { 
            background-color: #ffffff; 
            height: 65px; 
            padding: 0 30px; 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            border-bottom: 1px solid var(--line); 
            position: sticky; 
            top: 0; 
            z-index: 90; 
        }

        .btn-toggle-menu { 
            background: transparent; 
            border: none; 
            font-size: 18px; 
            color: var(--dark); 
            cursor: pointer; 
            padding: 8px; 
        }

        .page-title { 
            font-size: 18px; 
            font-weight: 700; 
            color: var(--dark); 
        }

        .profile-wrapper { 
            position: relative; 
            cursor: pointer; 
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
        }

        .profile-avatar { 
            width: 36px; 
            height: 36px; 
            border-radius: 50%; 
            background-color: #04352b; 
            color: white; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: bold; 
            font-size: 16px; 
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

        .profile-text .role { 
            font-size: 11px; 
            color: #777; 
        }

        .profile-dropdown {
            position: absolute;
            right: 0;
            top: 50px;
            background: #ffffff;
            border: 1px solid var(--line);
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

        .content-body { 
            padding: 30px; 
        }

        .panel { 
            background: var(--card); 
            border-radius: 16px; 
            padding: 30px; 
            border: 1px solid var(--line); 
        }

        .panel-head { 
            display: flex; 
            gap: 20px; 
            align-items: center; 
            margin-bottom: 24px; 
        }

        .avatar-big { 
            width: 72px; 
            height: 72px; 
            border-radius: 50%; 
            background: var(--accent-light); 
            color: var(--accent); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 30px; 
            border: 2px solid #a7f3d0; 
        }

        .stat-row { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
            gap: 16px; 
            background: #fafcfb; 
            border: 1px solid var(--line); 
            border-radius: 12px; 
            padding: 16px 20px; 
            margin-bottom: 26px; 
        }

        .stat { 
            display: flex; 
            align-items: center; 
            gap: 14px; 
        }

        .stat-icon { 
            width: 42px; 
            height: 42px; 
            border-radius: 10px; 
            background: var(--accent-light); 
            color: var(--accent); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 18px; 
        }

        .stat-label { 
            font-size: 12px; 
            color: var(--ink-soft); 
        }

        .stat-value { 
            font-size: 14px; 
            font-weight: 700; 
            color: var(--dark); 
        }

        .badge { 
            display: inline-block; 
            font-size: 11px; 
            font-weight: 700; 
            padding: 3px 10px; 
            border-radius: 20px; 
            background: var(--accent-light); 
            color: var(--accent); 
            border: 1px solid #a7f3d0; 
        }

        .section { 
            border: 1px solid var(--line); 
            border-radius: 14px; 
            padding: 22px; 
            margin-bottom: 22px; 
        }

        .section-head { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            margin-bottom: 18px; 
        }

        .section-icon { 
            width: 34px; 
            height: 34px; 
            border-radius: 8px; 
            background: var(--accent-light); 
            color: var(--accent); 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 15px; 
        }

        .section-title { 
            font-size: 15px; 
            font-weight: 700; 
            color: var(--dark); 
        }

        .grid-2 { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); 
            gap: 20px; 
        }

        .grid-3 { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); 
            gap: 20px; 
        }

        .field-list { 
            display: flex; 
            flex-direction: column; 
            gap: 10px; 
        }

        .field { 
            display: grid; 
            grid-template-columns: 140px 15px 1fr; 
            font-size: 13px; 
        }

        .field-label { 
            font-weight: 600; 
            color: var(--ink); 
        }

        .field-sep { 
            color: var(--ink-soft); 
        }

        .field-val { 
            color: var(--ink-soft); 
            font-weight: 500; 
            word-break: break-word; 
        }

        .subcard { 
            background: #fafcfb; 
            border: 1px solid var(--line); 
            border-radius: 12px; 
            padding: 16px 18px; 
        }

        .subcard-title { 
            font-size: 12px; 
            font-weight: 700; 
            color: var(--accent); 
            text-transform: uppercase; 
            margin-bottom: 12px; 
            display: flex; 
            align-items: center; 
            gap: 8px; 
        }

        .subcard-title::before { 
            content: ""; 
            width: 6px; 
            height: 6px; 
            background: var(--accent); 
            border-radius: 50%; 
        }

        .jurusan-card { 
            border: 1px solid var(--line); 
            border-radius: 12px; 
            padding: 18px; 
            background: #fafcfb; 
        }

        .jurusan-eyebrow { 
            font-size: 11px; 
            font-weight: 700; 
            color: var(--accent); 
            text-transform: uppercase; 
            margin-bottom: 6px; 
        }

        .jurusan-code { 
            font-size: 18px; 
            font-weight: 800; 
            color: var(--dark); 
        }

        .footer-actions { 
            display: flex; 
            justify-content: flex-end; 
            gap: 12px; 
            margin-top: 10px; 
        }

        .btn-back { 
            display: inline-flex; 
            align-items: center; 
            gap: 8px; 
            background: #ffffff; 
            color: #374151; 
            border: 1px solid #d1d5db; 
            border-radius: 10px; 
            padding: 11px 22px; 
            font-size: 13px; 
            font-weight: 600; 
            text-decoration: none; 
        }

        .btn-edit { 
            display: inline-flex; 
            align-items: center; 
            gap: 8px; 
            background: var(--dark); 
            color: #fff; 
            border: none; 
            border-radius: 10px; 
            padding: 11px 22px; 
            font-size: 13px; 
            font-weight: 600; 
            text-decoration: none; 
        }

        .btn-edit:hover { 
            background: var(--accent); 
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 768px) {
            .sidebar {
                box-shadow: 4px 0 20px rgba(0, 0, 0, 0.25);
            }

            /* Backdrop gelap di belakang sidebar saat dibuka di mobile */
            body.sidebar-mobile-open::after {
                content: "";
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.45);
                z-index: 95;
            }

            .main-content,
            .main-content.expanded {
                margin-left: 0;
                width: 100%;
            }

            .top-navbar {
                padding: 0 16px;
                height: 58px;
            }

            .page-title {
                font-size: 15px;
            }

            .profile-text {
                display: none;
            }

            .profile-dropdown {
                width: 150px;
            }

            .content-body {
                padding: 16px;
            }

            .panel {
                padding: 18px;
            }

            .panel-head {
                gap: 14px;
            }

            .avatar-big {
                width: 56px;
                height: 56px;
                font-size: 24px;
            }

            .stat-row {
                padding: 14px 16px;
                gap: 12px;
                margin-bottom: 18px;
            }

            .section {
                padding: 16px;
            }

            .field {
                grid-template-columns: 120px 10px 1fr;
            }

            .footer-actions {
                justify-content: stretch;
            }

            .btn-back, .btn-edit {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .field { grid-template-columns: 1fr; row-gap: 2px; }
            .field-sep { display: none; }
            .field-label { font-size: 11.5px; color: var(--ink-soft); font-weight: 600; }
            .field-val { font-size: 13px; }

            .avatar-big { width: 48px; height: 48px; font-size: 20px; }
        }
    </style>
</head>
<body>

    <div class="sidebar" id="sidebar">
        <div>
            <div class="sidebar-header">
                <img src="{{ asset('img/logo.smk.png') }}" alt="Logo SMK" class="logo-sekolah-img" onerror="this.onerror=null; this.style.display='none';">
                <div class="school-title">
                    <h1>SMK Maarif</h1>
                    <h2>Walisongo Kajoran</h2>
                    <span class="admin-tag">Admin Panel</span>
                </div>
            </div>

            <div class="menu-nav">
                <a href="{{ url('/dashboard_admin') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <a href="{{ url('/list_pendaftar') }}" class="active"><i class="fa-solid fa-users"></i> Pendaftar</a>
                <a href="{{ url('/verifikasi_berkas') }}"><i class="fa-solid fa-file-circle-check"></i> Verifikasi Berkas</a>
                <a href="{{ url('/seleksi_kelulusan') }}"><i class="fa-solid fa-award"></i>Seleksi Kelulusan</a>
                <div class="menu-dropdown-wrap">
                    <button class="dropdown-btn" id="btnCmsDropdown" onclick="toggleCmsMenu()">
                        <div style="display: flex; align-items: center; gap: 12px;"><i class="fa-solid fa-sliders"></i> CMS & Informasi</div>
                        <i class="fa-solid fa-chevron-down arrow-icon" id="arrowCms"></i>
                    </button>
                    <div class="dropdown-container" id="dropdownCmsContainer">
                        <a href="{{ url('/kuota') }}"><i class="fa-solid fa-list-check"></i> Kuota Jurusan</a>
                        <a href="{{ url('/pengumuman_admin') }}"><i class="fa-solid fa-bullhorn"></i> Kelola Pengumuman</a>
                        <a href="{{ url('/cms_landing') }}"><i class="fa-solid fa-window-restore"></i> Pengaturan Landing Page</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-bottom">
            <a href="{{ url('/profil_admin') }}" class="admin-profile-card">
                <div class="admin-avatar"><i class="fa-solid fa-user"></i></div>
                <div class="admin-info">
                    <div class="name">Admin SPMB</div>
                    <div class="role">Administrator</div>
                </div>
            </a>

            <button class="btn-logout-sidebar" onclick="logoutSystem()">
                <i class="fa-solid fa-right-from-bracket"></i> Keluar
            </button>

            <div class="sidebar-copyright">
                &copy; 2026 SMK Ma'arif Walisongo Kajoran<br>All Rights Reserved
            </div>
        </div>
    </div>

    <div class="main-content" id="mainContent">
        <div class="top-navbar">
            <div style="display: flex; align-items: center; gap: 12px;">
                <button class="btn-toggle-menu" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
                <div class="page-title">Detail Data Pendaftar</div>
            </div>
            <div class="profile-wrapper">
                <button class="profile-btn" onclick="toggleProfileDropdown(event)">
                    <div class="profile-text"><div class="name">Admin SPMB</div><div class="role">Administrator</div></div>
                    <div class="profile-avatar"><i class="fa-solid fa-user"></i></div>
                    <i class="fa-solid fa-chevron-down" style="font-size: 11px; color: #888;"></i>
                </button>

                <div class="profile-dropdown" id="profileDropdown">
                    <a href="{{ url('/profil_admin') }}" class="dropdown-item">
                        <i class="fa-solid fa-user"></i> Profil Admin
                    </a>
                    <button class="dropdown-item logout" onclick="logoutSystem()">
                        <i class="fa-solid fa-right-from-bracket"></i> Keluar
                    </button>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="panel">
                <div class="panel-head">
                    <div class="avatar-big"><img src="{{ asset('img/logo.smk.png') }}" alt="Logo Sekolah" style="width:100%;height:100%;object-fit:contain;border-radius:50%;" onerror="this.onerror=null; this.style.display='none'; this.insertAdjacentHTML('afterend', '<i class=\'fa-solid fa-user-graduate\'></i>');"></div>
                    <div>
                        <h2 class="panel-title" id="val_namaHeader">{{ $pendaftar->nama_lengkap ?? '-' }}</h2>
                        <p class="panel-sub" id="val_subHeader">NISN: {{ $pendaftar->nisn ?? '-' }} — {{ $pendaftar->asal_sekolah ?? '-' }}</p>
                    </div>
                </div>

                <div class="stat-row">
                    <div class="stat"><div class="stat-icon"><i class="fa-solid fa-calendar-days"></i></div><div><div class="stat-label">Tanggal Daftar</div><div class="stat-value" id="val_tglDaftar">{{ optional($pendaftar->created_at)->format('d M Y') ?? '-' }}</div></div></div>
                    <div class="stat"><div class="stat-icon"><i class="fa-solid fa-id-card"></i></div><div><div class="stat-label">No. Pendaftaran</div><div class="stat-value" id="val_noReg">{{ $pendaftar->no_pendaftaran ?? '-' }}</div></div></div>
                    <div class="stat"><div class="stat-icon"><i class="fa-solid fa-layer-group"></i></div><div><div class="stat-label">Gelombang</div><div class="stat-value" id="val_gelombang">{{ $pendaftar->gelombang ?? '-' }}</div></div></div>
                    <div class="stat"><div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div><div><div class="stat-label">Status Pendaftaran</div><div class="stat-value"><span class="badge" id="val_status">{{ $pendaftar->status_pendaftaran ?? '-' }}</span></div></div></div>
                </div>

                <!-- SECTION A: BIODATA SISWA -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-user"></i></div><h3 class="section-title">A. Biodata Siswa</h3></div>
                    <div class="grid-2">
                        <div class="field-list">
                            <div class="field"><span class="field-label">Nama Lengkap</span><span class="field-sep">:</span><span class="field-val" id="val_nama">{{ $pendaftar->nama_lengkap ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">NISN</span><span class="field-sep">:</span><span class="field-val" id="val_nisn">{{ $pendaftar->nisn ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Asal Sekolah</span><span class="field-sep">:</span><span class="field-val" id="val_sekolah">{{ $pendaftar->asal_sekolah ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Tempat Lahir</span><span class="field-sep">:</span><span class="field-val" id="val_tempatLahir">{{ $pendaftar->tempat_lahir ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Tanggal Lahir</span><span class="field-sep">:</span><span class="field-val" id="val_tglLahir">{{ $pendaftar->tanggal_lahir ? \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->format('d M Y') : '-' }}</span></div>
                            <div class="field"><span class="field-label">Jenis Kelamin</span><span class="field-sep">:</span><span class="field-val" id="val_jk">{{ $pendaftar->jenis_kelamin === 'L' ? 'Laki-laki' : ($pendaftar->jenis_kelamin === 'P' ? 'Perempuan' : '-') }}</span></div>
                        </div>
                        <div class="field-list">
                            <div class="field"><span class="field-label">Nomor HP Siswa</span><span class="field-sep">:</span><span class="field-val" id="val_hp">{{ $pendaftar->no_hp ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Ukuran Fisik</span><span class="field-sep">:</span><span class="field-val" id="val_fisik">{{ $pendaftar->tinggi_badan ? rtrim(rtrim(number_format($pendaftar->tinggi_badan, 2, '.', ''), '0'), '.') : '-' }} cm / {{ $pendaftar->berat_badan ? rtrim(rtrim(number_format($pendaftar->berat_badan, 2, '.', ''), '0'), '.') : '-' }} kg</span></div>
                            <div class="field"><span class="field-label">Jumlah Saudara</span><span class="field-sep">:</span><span class="field-val" id="val_saudara">{{ $pendaftar->jumlah_saudara_kandung ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Agama</span><span class="field-sep">:</span><span class="field-val" id="val_agama">{{ $pendaftar->agama ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Kebutuhan Khusus</span><span class="field-sep">:</span><span class="field-val" id="val_kebutuhanKhusus">{{ $pendaftar->kebutuhan_khusus ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Penerima KPS/KKS/KIP</span><span class="field-sep">:</span><span class="field-val" id="val_kpsKip">{{ $pendaftar->is_penerima_bantuan ?? '-' }}</span></div>
                        </div>
                    </div>
                </div>

                <!-- SECTION B: DATA ORANG TUA / WALI -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-users"></i></div><h3 class="section-title">B. Data Orang Tua / Wali</h3></div>
                    <div class="grid-3">
                        <div class="subcard">
                            <div class="subcard-title">Data Ayah</div>
                            <div class="field-list">
                                <div class="field"><span class="field-label">Nama Ayah</span><span class="field-sep">:</span><span class="field-val" id="val_namaAyah">{{ $dataOrangTua->nama_ayah ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Pendidikan</span><span class="field-sep">:</span><span class="field-val" id="val_pendidikanAyah">{{ $dataOrangTua->pendidikan_terakhir_ayah ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Pekerjaan</span><span class="field-sep">:</span><span class="field-val" id="val_pekerjaanAyah">{{ $dataOrangTua->pekerjaan_ayah ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Tahun Lahir</span><span class="field-sep">:</span><span class="field-val" id="val_tahunAyah">{{ $dataOrangTua->tahun_lahir_ayah ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Penghasilan</span><span class="field-sep">:</span><span class="field-val" id="val_penghasilanAyah">{{ $dataOrangTua->penghasilan_ayah_bulanan ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">No. Telepon</span><span class="field-sep">:</span><span class="field-val" id="val_hpAyah">{{ $dataOrangTua->no_hp_ayah ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Kebutuhan Khusus</span><span class="field-sep">:</span><span class="field-val" id="val_khususAyah">{{ $dataOrangTua->ayah_kebutuhan_khusus ?? '-' }}</span></div>
                            </div>
                        </div>
                        <div class="subcard">
                            <div class="subcard-title">Data Ibu</div>
                            <div class="field-list">
                                <div class="field"><span class="field-label">Nama Ibu</span><span class="field-sep">:</span><span class="field-val" id="val_namaIbu">{{ $dataOrangTua->nama_ibu ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Pendidikan</span><span class="field-sep">:</span><span class="field-val" id="val_pendidikanIbu">{{ $dataOrangTua->pendidikan_terakhir_ibu ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Pekerjaan</span><span class="field-sep">:</span><span class="field-val" id="val_pekerjaanIbu">{{ $dataOrangTua->pekerjaan_ibu ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Tahun Lahir</span><span class="field-sep">:</span><span class="field-val" id="val_tahunIbu">{{ $dataOrangTua->tahun_lahir_ibu ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Penghasilan</span><span class="field-sep">:</span><span class="field-val" id="val_penghasilanIbu">{{ $dataOrangTua->penghasilan_ibu_bulanan ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">No. Telepon</span><span class="field-sep">:</span><span class="field-val" id="val_hpIbu">{{ $dataOrangTua->no_hp_ibu ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Kebutuhan Khusus</span><span class="field-sep">:</span><span class="field-val" id="val_khususIbu">{{ $dataOrangTua->ibu_kebutuhan_khusus ?? '-' }}</span></div>
                            </div>
                        </div>
                        <div class="subcard">
                            <div class="subcard-title">Data Wali</div>
                            <div class="field-list">
                                <div class="field"><span class="field-label">Nama Wali</span><span class="field-sep">:</span><span class="field-val" id="val_namaWali">{{ $dataOrangTua->nama_wali ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Pendidikan</span><span class="field-sep">:</span><span class="field-val" id="val_pendidikanWali">{{ $dataOrangTua->pendidikan_terakhir_wali ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Pekerjaan</span><span class="field-sep">:</span><span class="field-val" id="val_pekerjaanWali">{{ $dataOrangTua->pekerjaan_wali ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">Penghasilan</span><span class="field-sep">:</span><span class="field-val" id="val_penghasilanWali">{{ $dataOrangTua->penghasilan_wali_bulanan ?? '-' }}</span></div>
                                <div class="field"><span class="field-label">No. Telepon</span><span class="field-sep">:</span><span class="field-val" id="val_hpWali">{{ $dataOrangTua->no_hp_wali ?? '-' }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION C: DATA TEMPAT TINGGAL -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-house"></i></div><h3 class="section-title">C. Data Tempat Tinggal Siswa</h3></div>
                    <div class="grid-2">
                        <div class="field-list">
                            <div class="field"><span class="field-label">Provinsi</span><span class="field-sep">:</span><span class="field-val" id="val_provinsi" data-wilayah="province" data-code="{{ $pendaftar->provinsi ?? '' }}">{{ $pendaftar->provinsi ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Kabupaten / Kota</span><span class="field-sep">:</span><span class="field-val" id="val_kabupaten" data-wilayah="regency" data-code="{{ $pendaftar->kabupaten ?? '' }}">{{ $pendaftar->kabupaten ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Kecamatan</span><span class="field-sep">:</span><span class="field-val" id="val_kecamatan" data-wilayah="district" data-code="{{ $pendaftar->kecamatan ?? '' }}">{{ $pendaftar->kecamatan ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Desa / Kelurahan</span><span class="field-sep">:</span><span class="field-val" id="val_kelurahan" data-wilayah="village" data-code="{{ $pendaftar->desa ?? '' }}">{{ $pendaftar->desa ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Kode Pos</span><span class="field-sep">:</span><span class="field-val" id="val_kodePos">{{ $pendaftar->kode_pos ?? '-' }}</span></div>
                        </div>
                        <div class="field-list">
                            <div class="field"><span class="field-label">Alamat Lengkap</span><span class="field-sep">:</span><span class="field-val" id="val_alamatLengkap">{{ $pendaftar->alamat_lengkap ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">RT / RW</span><span class="field-sep">:</span><span class="field-val" id="val_rtRw">RT {{ $pendaftar->rt ?? '-' }} / RW {{ $pendaftar->rw ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Jenis Tinggal</span><span class="field-sep">:</span><span class="field-val" id="val_jenisTinggal">{{ $pendaftar->jenis_tinggal ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Alat Transportasi</span><span class="field-sep">:</span><span class="field-val" id="val_transportasi">{{ $pendaftar->alat_transportasi_ke_sekolah ?? '-' }}</span></div>
                            <div class="field"><span class="field-label">Jarak ke Sekolah</span><span class="field-sep">:</span><span class="field-val" id="val_jarakSekolah">{{ $pendaftar->jarak_ke_sekolah ?? '-' }}</span></div>
                        </div>
                    </div>
                </div>

                <!-- SECTION D: PILIHAN JURUSAN & GELOMBANG -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-graduation-cap"></i></div><h3 class="section-title">D. Pilihan Jurusan & Gelombang Pendaftaran</h3></div>
                    <div class="grid-2">
                        <div class="jurusan-card"><div class="jurusan-eyebrow">Pilihan 1 (Utama)</div><div class="jurusan-code" id="val_j1">{{ $pendaftar->jurusanPilihan1->nama_jurusan ?? $pendaftar->jurusan_pilihan_1 ?? '-' }}</div></div>
                        <div class="jurusan-card"><div class="jurusan-eyebrow">Pilihan 2 (Kedua)</div><div class="jurusan-code" id="val_j2">{{ $pendaftar->jurusanPilihan2->nama_jurusan ?? $pendaftar->jurusan_pilihan_2 ?? '-' }}</div></div>
                    </div>
                </div>

                <!-- SECTION E: DATA ASAL SEKOLAH -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-school"></i></div><h3 class="section-title">E. Data Asal Sekolah</h3></div>
                    <div class="field-list">
                        <div class="field"><span class="field-label">Asal Sekolah</span><span class="field-sep">:</span><span class="field-val" id="val_asalSekolah">{{ $pendaftar->asal_sekolah ?? '-' }}</span></div>
                    </div>
                </div>

                <div class="footer-actions">
                    <a href="{{ url('/list_pendaftar') }}" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                    <a href="{{ url('/edit_pendaftar_admin/'.($pendaftar->id_pendaftar ?? '')) }}" id="btnEditLink" class="btn-edit"><i class="fa-solid fa-pen-to-square"></i> Edit Data</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data sudah dirender langsung dari server (Blade), tidak perlu JS loader lagi.

        function toggleCmsMenu() {
            document.getElementById("dropdownCmsContainer").classList.toggle("show");
            document.getElementById("arrowCms").classList.toggle("rotate");
            document.getElementById("btnCmsDropdown").classList.toggle("active");
        }

        function toggleProfileDropdown(event) {
            event.stopPropagation();
            document.getElementById('profileDropdown').classList.toggle('show');
        }

        document.addEventListener('click', function() {
            const dropdown = document.getElementById('profileDropdown');
            if (dropdown && dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }
        });

        function toggleSidebar() {
            const isOpen = !document.getElementById('sidebar').classList.contains('collapsed');
            setSidebarState(!isOpen);
        }

        /* PERILAKU SIDEBAR RESPONSIVE: DESKTOP MENDORONG KONTEN, MOBILE OVERLAY */
        const MOBILE_BREAKPOINT = 768;

        function isMobileView() {
            return window.innerWidth <= MOBILE_BREAKPOINT;
        }

        function setSidebarState(open) {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('collapsed', !open);
            mainContent.classList.toggle('expanded', !open);
            if (isMobileView()) {
                document.body.classList.toggle('sidebar-mobile-open', open);
            } else {
                document.body.classList.remove('sidebar-mobile-open');
            }
        }

        // Di mobile, sidebar tertutup secara default agar tidak menutupi konten
        let wasMobileView = isMobileView();
        setSidebarState(!wasMobileView);

        // Tutup sidebar otomatis saat tap di luar area sidebar (khusus mobile)
        document.addEventListener('click', function(event) {
            if (!isMobileView()) return;
            const sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('collapsed')) return;

            const toggleBtn = document.querySelector('.btn-toggle-menu');
            const clickedInsideSidebar = sidebar.contains(event.target);
            const clickedToggleBtn = toggleBtn && toggleBtn.contains(event.target);

            if (!clickedInsideSidebar && !clickedToggleBtn) {
                setSidebarState(false);
            }
        });

        // Tutup sidebar otomatis saat salah satu menu diklik di mobile
        document.querySelectorAll('.menu-nav a').forEach(function(link) {
            link.addEventListener('click', function() {
                if (isMobileView()) {
                    setSidebarState(false);
                }
            });
        });

        // Reset state saat ukuran layar berpindah lintas breakpoint mobile/desktop
        window.addEventListener('resize', function() {
            const nowMobileView = isMobileView();
            if (nowMobileView !== wasMobileView) {
                setSidebarState(!nowMobileView);
                wasMobileView = nowMobileView;
            }
        });

        function logoutSystem() {
            if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
                window.location.href = "log-in.html";
            }
        }

        // Data sudah langsung ter-render dari server, tidak perlu dipanggil manual

        /* ==========================================
           RESOLVE KODE WILAYAH (ID) -> NAMA WILAYAH
           Sumber: API publik emsifa/wilayah-indonesia
           https://www.emsifa.com/api-wilayah-indonesia/
        ========================================== */
        const WILAYAH_API_BASE = 'https://www.emsifa.com/api-wilayah-indonesia/api';
        const WILAYAH_ENDPOINT = {
            province: 'province',
            regency: 'regency',
            district: 'district',
            village: 'village'
        };

        // cache di sessionStorage biar tidak fetch berulang tiap buka halaman ini
        function getWilayahCache(key) {
            try {
                const raw = sessionStorage.getItem('wilayah_' + key);
                return raw ? JSON.parse(raw) : null;
            } catch (e) { return null; }
        }
        function setWilayahCache(key, value) {
            try { sessionStorage.setItem('wilayah_' + key, JSON.stringify(value)); } catch (e) {}
        }

        async function resolveWilayahName(type, code) {
            if (!code || code === '-' ) return null;
            const cacheKey = type + '_' + code;
            const cached = getWilayahCache(cacheKey);
            if (cached) return cached.name;

            try {
                const res = await fetch(`${WILAYAH_API_BASE}/${WILAYAH_ENDPOINT[type]}/${code}.json`);
                if (!res.ok) throw new Error('Gagal ambil data wilayah: ' + res.status);
                const data = await res.json();
                if (data && data.name) {
                    setWilayahCache(cacheKey, data);
                    return data.name;
                }
                return null;
            } catch (err) {
                console.error(`Gagal resolve nama wilayah (${type}, kode ${code}):`, err);
                return null;
            }
        }

        async function renderNamaWilayah() {
            const spans = document.querySelectorAll('[data-wilayah]');
            for (const span of spans) {
                const type = span.getAttribute('data-wilayah');
                const code = span.getAttribute('data-code');
                if (!code) continue; // biarkan tampil '-' kalau memang kosong

                const nama = await resolveWilayahName(type, code);
                if (nama) {
                    span.textContent = nama;
                } else {
                    // fallback: kalau API gagal / kode tidak ditemukan, biarkan kode aslinya tampil
                    span.textContent = code;
                }
            }
        }

        document.addEventListener('DOMContentLoaded', renderNamaWilayah);
    </script>
</body>
</html>