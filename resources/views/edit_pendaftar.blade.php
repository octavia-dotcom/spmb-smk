<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pendaftar — Admin PPDB SMK Maarif</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --dark: #022c22;
            --accent: #047857;
            --accent-2: #02403f;
            --accent-light: #ecfdf5;
            --bg: #f8f9fa;
            --card: #ffffff;
            --ink: #111827;
            --ink-soft: #6b7280;
            --line: #e5e7eb;
            --danger: #dc2626;
            --danger-light: #fee2e2;
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

        /* ---------- PANEL INFO (gaya edit_data_siswa) ---------- */
        .panel { 
            background: var(--card); 
            border-radius: 16px; 
            padding: 30px; 
            border: 1px solid var(--line); 
            margin-bottom: 25px;
        }

        .panel-head { 
            display: flex; 
            gap: 20px; 
            align-items: center;
            flex-wrap: wrap;
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
            flex-shrink: 0;
        }

        .info-strip {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            flex: 1;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .info-icon {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            background: var(--accent-light);
            color: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .info-label {
            font-size: 11px;
            color: var(--ink-soft);
            margin: 0 0 2px;
        }

        .info-value {
            font-size: 13px;
            font-weight: 700;
            color: var(--dark);
            margin: 0;
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

        /* ---------- SECTION FORM ---------- */
        .section { 
            background: #fff;
            border: 1px solid var(--line); 
            border-radius: 14px; 
            padding: 24px 28px; 
            margin-bottom: 22px; 
        }

        .section-head { 
            display: flex; 
            align-items: center; 
            gap: 12px; 
            margin-bottom: 22px; 
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
            flex-shrink: 0;
        }

        .section-title { 
            font-size: 16px; 
            font-weight: 700; 
            color: var(--dark);
            margin: 0;
        }

        .row-1 {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .row-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .field label {
            display: block;
            font-size: 12.5px;
            font-weight: 600;
            color: #344054;
            margin-bottom: 8px;
            line-height: 1.4;
        }
        .field label .req {
            color: var(--danger);
            margin-left: 2px;
        }
        .field input[type=text], .field input[type=number], .field input[type=tel], .field input[type=date], .field select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #d0d5dd;
            border-radius: 8px;
            font-size: 13px;
            color: var(--ink);
            background: #fff;
            outline: none;
            transition: all 0.2s;
        }
        .field input:focus, .field select:focus {
            border-color: var(--dark);
            box-shadow: 0 0 0 3px rgba(2, 44, 34, 0.1);
        }
        .field input.invalid, .field select.invalid {
            border-color: var(--danger);
            background: var(--danger-light);
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            align-items: center;
            padding: 10px 16px;
            background-color: #f8fafc;
            border: 1px solid #d0d5dd;
            border-radius: 8px;
            min-height: 44px;
            width: 100%;
        }
        .radio-option {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            cursor: pointer;
            color: var(--ink);
            font-weight: 500;
        }
        .radio-option input {
            width: 16px;
            height: 16px;
            accent-color: var(--accent-2);
            cursor: pointer;
        }

        .parent-block {
            background: #fafcfb;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .parent-block:last-child { margin-bottom: 0; }
        .parent-block-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--accent);
            text-transform: uppercase;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px dashed var(--line);
            padding-bottom: 10px;
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
            margin-bottom: 10px;
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
            cursor: pointer;
        }
        .btn-back:hover {
            background: #f9fafb;
        }

        .btn-save { 
            display: inline-flex; 
            align-items: center; 
            gap: 8px; 
            background: var(--accent); 
            color: #fff; 
            border: none; 
            border-radius: 10px; 
            padding: 11px 24px; 
            font-size: 13px; 
            font-weight: 600; 
            text-decoration: none; 
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(4, 120, 87, 0.3);
        }

        .btn-save:hover { 
            background: var(--dark); 
        }

        .toast {
            position: fixed;
            top: 22px;
            right: 22px;
            background: var(--dark);
            color: #fff;
            padding: 14px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 200;
            opacity: 0;
            transform: translateY(-10px);
            transition: all .25s ease;
            pointer-events: none;
        }
        .toast.show {
            opacity: 1;
            transform: translateY(0);
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

            .info-strip {
                gap: 18px;
            }

            .section {
                padding: 18px;
            }

            .row-2, .row-3 {
                grid-template-columns: 1fr;
            }

            .footer-actions {
                justify-content: stretch;
            }

            .btn-back, .btn-save {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .avatar-big { width: 48px; height: 48px; font-size: 20px; }
        }
    </style>
</head>
<body>

    <div class="sidebar" id="sidebar">
        <div>
            <div class="sidebar-header">
                <img src="{{ asset('img/logo.smk.png') }}" alt="Logo SMK" class="logo-sekolah-img" onerror="this.onerror=null;this.src='data:image/svg+xml;charset=UTF-8,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2245%22 height=%2245%22%3E%3Crect width=%2245%22 height=%2245%22 rx=%224%22 fill=%22%23047857%22/%3E%3C/svg%3E';">
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
            <button class="btn-logout-sidebar" onclick="logoutSystem()"><i class="fa-solid fa-right-from-bracket"></i> Keluar</button>

            <div class="sidebar-copyright">
                &copy; 2026 SMK Ma'arif Walisongo Kajoran<br>All Rights Reserved
            </div>
        </div>
    </div>

    <div class="main-content" id="mainContent">
        <div class="top-navbar">
            <div style="display: flex; align-items: center; gap: 12px;">
                <button class="btn-toggle-menu" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
                <div class="page-title">Edit Data Pendaftar</div>
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
            @if(session('success'))
                <div class="panel" style="border-left:4px solid #047857; margin-bottom:14px;">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="panel" style="border-left:4px solid #dc2626; margin-bottom:14px;">{{ session('error') }}</div>
            @endif
            @if($errors->any())
                <div class="panel" style="border-left:4px solid #dc2626; margin-bottom:14px;">
                    <strong>Periksa kembali formulir:</strong>
                    <ul style="margin:6px 0 0 18px;">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="editForm" action="{{ url('/edit_pendaftar/'.$pendaftar->id_pendaftar) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- PANEL INFO RINGKAS -->
                <div class="panel">
                    <div class="panel-head">
                        <div class="avatar-big"><i class="fa-solid fa-user-graduate"></i></div>
                        <div class="info-strip">
                            <div class="info-item">
                                <div class="info-icon"><i class="fa-solid fa-id-card"></i></div>
                                <div><p class="info-label">No. Pendaftaran</p><p class="info-value">{{ $pendaftar->no_pendaftaran ?? '-' }}</p></div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fa-solid fa-calendar-days"></i></div>
                                <div><p class="info-label">Tanggal Daftar</p><p class="info-value">{{ optional($pendaftar->created_at)->format('d M Y') ?? '-' }}</p></div>
                            </div>
                            <div class="info-item">
                                <div class="info-icon"><i class="fa-solid fa-circle-check"></i></div>
                                <div><p class="info-label">Status Pendaftaran</p><p class="info-value"><span class="badge">{{ $pendaftar->status_pendaftaran ?? 'Aktif' }}</span></p></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION A: BIODATA SISWA -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-user"></i></div><h3 class="section-title">A. Biodata Siswa</h3></div>

                    <div class="row-2">
                        <div class="field"><label>Nama Lengkap<span class="req">*</span></label><input type="text" name="nama_lengkap" class="req" value="{{ old('nama_lengkap', $pendaftar->nama_lengkap) }}"></div>
                        <div class="field"><label>NISN<span class="req">*</span></label><input type="text" name="nisn" class="req" value="{{ old('nisn', $pendaftar->nisn) }}"></div>
                    </div>

                    <div class="row-2">
                        <div class="field"><label>Asal Sekolah<span class="req">*</span></label><input type="text" name="asal_sekolah" class="req" value="{{ old('asal_sekolah', $pendaftar->asal_sekolah) }}"></div>
                        <div class="field"><label>Nomor HP Siswa<span class="req">*</span></label><input type="text" name="no_hp" class="req" value="{{ old('no_hp', $pendaftar->no_hp) }}"></div>
                    </div>

                    <div class="row-2">
                        <div class="field"><label>Tempat Lahir<span class="req">*</span></label><input type="text" name="tempat_lahir" class="req" value="{{ old('tempat_lahir', $pendaftar->tempat_lahir) }}"></div>
                        <div class="field"><label>Tanggal Lahir<span class="req">*</span></label><input type="date" name="tanggal_lahir" class="req" value="{{ old('tanggal_lahir', optional($pendaftar->tanggal_lahir)->format('Y-m-d') ?? $pendaftar->tanggal_lahir) }}"></div>
                    </div>

                    <div class="row-2">
                        <div class="field">
                            <label>Ukuran Fisik (Tinggi & Berat)<span class="req">*</span></label>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                                <input type="number" name="tinggi_badan" class="req" placeholder="Tinggi (cm)" value="{{ old('tinggi_badan', $pendaftar->tinggi_badan) }}">
                                <input type="number" name="berat_badan" class="req" placeholder="Berat (kg)" value="{{ old('berat_badan', $pendaftar->berat_badan) }}">
                            </div>
                        </div>
                        <div class="field"><label>Jumlah Saudara<span class="req">*</span></label><input type="number" name="jumlah_saudara_kandung" class="req" value="{{ old('jumlah_saudara_kandung', $pendaftar->jumlah_saudara_kandung) }}"></div>
                    </div>

                    <div class="row-2">
                        <div class="field">
                            <label>Jenis Kelamin<span class="req">*</span></label>
                            <div class="radio-group">
                                <label class="radio-option"><input type="radio" name="jenis_kelamin" value="L" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'L' ? 'checked' : '' }}> Laki-laki</label>
                                <label class="radio-option"><input type="radio" name="jenis_kelamin" value="P" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'P' ? 'checked' : '' }}> Perempuan</label>
                            </div>
                        </div>
                        <div class="field"><label>Agama<span class="req">*</span></label><input type="text" name="agama" class="req" value="{{ old('agama', $pendaftar->agama) }}"></div>
                    </div>

                    <div class="row-2">
                        <div class="field">
                            <label>Memiliki Kebutuhan Khusus?<span class="req">*</span></label>
                            <div class="radio-group">
                                <label class="radio-option"><input type="radio" name="kebutuhan_khusus" value="Ya" {{ old('kebutuhan_khusus', $pendaftar->kebutuhan_khusus) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                <label class="radio-option"><input type="radio" name="kebutuhan_khusus" value="Tidak" {{ old('kebutuhan_khusus', $pendaftar->kebutuhan_khusus) == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                            </div>
                        </div>
                        <div class="field">
                            <label>Penerima KPS/KKS/KIP?<span class="req">*</span></label>
                            <div class="radio-group">
                                <label class="radio-option"><input type="radio" name="is_penerima_bantuan" value="Ya" {{ old('is_penerima_bantuan', $pendaftar->is_penerima_bantuan) == 'Ya' ? 'checked' : '' }}> Ya</label>
                                <label class="radio-option"><input type="radio" name="is_penerima_bantuan" value="Tidak" {{ old('is_penerima_bantuan', $pendaftar->is_penerima_bantuan) == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION B: DATA ORANG TUA / WALI -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-users"></i></div><h3 class="section-title">B. Data Orang Tua / Wali</h3></div>

                    <!-- DATA AYAH -->
                    <div class="parent-block">
                        <div class="parent-block-title"><i class="fa-solid fa-person"></i> Data Ayah</div>
                        <div class="row-2">
                            <div class="field"><label>Nama Ayah</label><input type="text" name="nama_ayah" value="{{ old('nama_ayah', $dataOrangTua->nama_ayah ?? '') }}"></div>
                            <div class="field">
                                <label>Pendidikan Terakhir</label>
                                @php $pendAyah = old('pendidikan_terakhir_ayah', $dataOrangTua->pendidikan_terakhir_ayah ?? ''); @endphp
                                <select name="pendidikan_terakhir_ayah">
                                    <option value="" disabled {{ $pendAyah == '' ? 'selected' : '' }}>Pilih Pendidikan Terakhir</option>
                                    <option value="Tidak Sekolah" {{ $pendAyah == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                                    <option value="SD / MI / Sederajat" {{ $pendAyah == 'SD / MI / Sederajat' ? 'selected' : '' }}>SD / MI / Sederajat</option>
                                    <option value="SMP / MTs / Sederajat" {{ $pendAyah == 'SMP / MTs / Sederajat' ? 'selected' : '' }}>SMP / MTs / Sederajat</option>
                                    <option value="SMA / MA / SMK" {{ $pendAyah == 'SMA / MA / SMK' ? 'selected' : '' }}>SMA / MA / SMK</option>
                                    <option value="D1 / D2 / D3" {{ $pendAyah == 'D1 / D2 / D3' ? 'selected' : '' }}>D1 / D2 / D3</option>
                                    <option value="S1 / D4" {{ $pendAyah == 'S1 / D4' ? 'selected' : '' }}>S1 / D4</option>
                                    <option value="S2 / S3" {{ $pendAyah == 'S2 / S3' ? 'selected' : '' }}>S2 / S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-2">
                            <div class="field"><label>Pekerjaan Ayah</label><input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $dataOrangTua->pekerjaan_ayah ?? '') }}"></div>
                            <div class="field"><label>Tahun Lahir</label><input type="text" name="tahun_lahir_ayah" value="{{ old('tahun_lahir_ayah', $dataOrangTua->tahun_lahir_ayah ?? '') }}"></div>
                        </div>
                        <div class="row-2">
                            <div class="field">
                                <label>Penghasilan Bulanan</label>
                                @php $pengAyah = old('penghasilan_ayah_bulanan', $dataOrangTua->penghasilan_ayah_bulanan ?? ''); @endphp
                                <select name="penghasilan_ayah_bulanan">
                                    <option value="" disabled {{ $pengAyah == '' ? 'selected' : '' }}>Pilih Penghasilan Bulanan</option>
                                    <option value="Tidak Berpenghasilan" {{ $pengAyah == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan / Tidak Bekerja</option>
                                    <option value="Kurang dari Rp 1.000.000" {{ $pengAyah == 'Kurang dari Rp 1.000.000' ? 'selected' : '' }}>Kurang dari Rp 1.000.000</option>
                                    <option value="Rp 1.000.000 - Rp 1.999.999" {{ $pengAyah == 'Rp 1.000.000 - Rp 1.999.999' ? 'selected' : '' }}>Rp 1.000.000 - Rp 1.999.999</option>
                                    <option value="Rp 2.000.000 - Rp 4.999.999" {{ $pengAyah == 'Rp 2.000.000 - Rp 4.999.999' ? 'selected' : '' }}>Rp 2.000.000 - Rp 4.999.999</option>
                                    <option value="Rp 5.000.000 - Rp 20.000.000" {{ $pengAyah == 'Rp 5.000.000 - Rp 20.000.000' ? 'selected' : '' }}>Rp 5.000.000 - Rp 20.000.000</option>
                                    <option value="Lebih dari Rp 20.000.000" {{ $pengAyah == 'Lebih dari Rp 20.000.000' ? 'selected' : '' }}>Lebih dari Rp 20.000.000</option>
                                </select>
                            </div>
                            <div class="field"><label>Nomor Telepon Ayah</label><input type="text" name="no_hp_ayah" value="{{ old('no_hp_ayah', $dataOrangTua->no_hp_ayah ?? '') }}"></div>
                        </div>
                        <div class="row-1">
                            <div class="field">
                                <label>Memiliki Kebutuhan Khusus?</label>
                                @php $khususAyah = old('ayah_kebutuhan_khusus', $dataOrangTua->ayah_kebutuhan_khusus ?? 'Tidak'); @endphp
                                <div class="radio-group">
                                    <label class="radio-option"><input type="radio" name="ayah_kebutuhan_khusus" value="Ya" {{ $khususAyah == 'Ya' ? 'checked' : '' }}> Ya</label>
                                    <label class="radio-option"><input type="radio" name="ayah_kebutuhan_khusus" value="Tidak" {{ $khususAyah == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DATA IBU -->
                    <div class="parent-block">
                        <div class="parent-block-title"><i class="fa-solid fa-person-dress"></i> Data Ibu</div>
                        <div class="row-2">
                            <div class="field"><label>Nama Ibu</label><input type="text" name="nama_ibu" value="{{ old('nama_ibu', $dataOrangTua->nama_ibu ?? '') }}"></div>
                            <div class="field">
                                <label>Pendidikan Terakhir</label>
                                @php $pendIbu = old('pendidikan_terakhir_ibu', $dataOrangTua->pendidikan_terakhir_ibu ?? ''); @endphp
                                <select name="pendidikan_terakhir_ibu">
                                    <option value="" disabled {{ $pendIbu == '' ? 'selected' : '' }}>Pilih Pendidikan Terakhir</option>
                                    <option value="Tidak Sekolah" {{ $pendIbu == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                                    <option value="SD / MI / Sederajat" {{ $pendIbu == 'SD / MI / Sederajat' ? 'selected' : '' }}>SD / MI / Sederajat</option>
                                    <option value="SMP / MTs / Sederajat" {{ $pendIbu == 'SMP / MTs / Sederajat' ? 'selected' : '' }}>SMP / MTs / Sederajat</option>
                                    <option value="SMA / MA / SMK" {{ $pendIbu == 'SMA / MA / SMK' ? 'selected' : '' }}>SMA / MA / SMK</option>
                                    <option value="D1 / D2 / D3" {{ $pendIbu == 'D1 / D2 / D3' ? 'selected' : '' }}>D1 / D2 / D3</option>
                                    <option value="S1 / D4" {{ $pendIbu == 'S1 / D4' ? 'selected' : '' }}>S1 / D4</option>
                                    <option value="S2 / S3" {{ $pendIbu == 'S2 / S3' ? 'selected' : '' }}>S2 / S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-2">
                            <div class="field"><label>Pekerjaan Ibu</label><input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $dataOrangTua->pekerjaan_ibu ?? '') }}"></div>
                            <div class="field"><label>Tahun Lahir</label><input type="text" name="tahun_lahir_ibu" value="{{ old('tahun_lahir_ibu', $dataOrangTua->tahun_lahir_ibu ?? '') }}"></div>
                        </div>
                        <div class="row-2">
                            <div class="field">
                                <label>Penghasilan Bulanan</label>
                                @php $pengIbu = old('penghasilan_ibu_bulanan', $dataOrangTua->penghasilan_ibu_bulanan ?? ''); @endphp
                                <select name="penghasilan_ibu_bulanan">
                                    <option value="" disabled {{ $pengIbu == '' ? 'selected' : '' }}>Pilih Penghasilan Bulanan</option>
                                    <option value="Tidak Berpenghasilan" {{ $pengIbu == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan / Tidak Bekerja</option>
                                    <option value="Kurang dari Rp 1.000.000" {{ $pengIbu == 'Kurang dari Rp 1.000.000' ? 'selected' : '' }}>Kurang dari Rp 1.000.000</option>
                                    <option value="Rp 1.000.000 - Rp 1.999.999" {{ $pengIbu == 'Rp 1.000.000 - Rp 1.999.999' ? 'selected' : '' }}>Rp 1.000.000 - Rp 1.999.999</option>
                                    <option value="Rp 2.000.000 - Rp 4.999.999" {{ $pengIbu == 'Rp 2.000.000 - Rp 4.999.999' ? 'selected' : '' }}>Rp 2.000.000 - Rp 4.999.999</option>
                                    <option value="Rp 5.000.000 - Rp 20.000.000" {{ $pengIbu == 'Rp 5.000.000 - Rp 20.000.000' ? 'selected' : '' }}>Rp 5.000.000 - Rp 20.000.000</option>
                                    <option value="Lebih dari Rp 20.000.000" {{ $pengIbu == 'Lebih dari Rp 20.000.000' ? 'selected' : '' }}>Lebih dari Rp 20.000.000</option>
                                </select>
                            </div>
                            <div class="field"><label>Nomor Telepon Ibu</label><input type="text" name="no_hp_ibu" value="{{ old('no_hp_ibu', $dataOrangTua->no_hp_ibu ?? '') }}"></div>
                        </div>
                        <div class="row-1">
                            <div class="field">
                                <label>Memiliki Kebutuhan Khusus?</label>
                                @php $khususIbu = old('ibu_kebutuhan_khusus', $dataOrangTua->ibu_kebutuhan_khusus ?? 'Tidak'); @endphp
                                <div class="radio-group">
                                    <label class="radio-option"><input type="radio" name="ibu_kebutuhan_khusus" value="Ya" {{ $khususIbu == 'Ya' ? 'checked' : '' }}> Ya</label>
                                    <label class="radio-option"><input type="radio" name="ibu_kebutuhan_khusus" value="Tidak" {{ $khususIbu == 'Tidak' ? 'checked' : '' }}> Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DATA WALI -->
                    <div class="parent-block">
                        <div class="parent-block-title"><i class="fa-solid fa-user-shield"></i> Data Wali</div>
                        <div class="row-2">
                            <div class="field"><label>Nama Wali</label><input type="text" name="nama_wali" value="{{ old('nama_wali', $dataOrangTua->nama_wali ?? '') }}"></div>
                            <div class="field">
                                <label>Pendidikan Terakhir Wali</label>
                                @php $pendWali = old('pendidikan_terakhir_wali', $dataOrangTua->pendidikan_terakhir_wali ?? ''); @endphp
                                <select name="pendidikan_terakhir_wali">
                                    <option value="" disabled {{ $pendWali == '' ? 'selected' : '' }}>Pilih Pendidikan Terakhir</option>
                                    <option value="-" {{ $pendWali == '-' ? 'selected' : '' }}>-</option>
                                    <option value="Tidak Sekolah" {{ $pendWali == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                                    <option value="SD / MI / Sederajat" {{ $pendWali == 'SD / MI / Sederajat' ? 'selected' : '' }}>SD / MI / Sederajat</option>
                                    <option value="SMP / MTs / Sederajat" {{ $pendWali == 'SMP / MTs / Sederajat' ? 'selected' : '' }}>SMP / MTs / Sederajat</option>
                                    <option value="SMA / MA / SMK" {{ $pendWali == 'SMA / MA / SMK' ? 'selected' : '' }}>SMA / MA / SMK</option>
                                    <option value="D1 / D2 / D3" {{ $pendWali == 'D1 / D2 / D3' ? 'selected' : '' }}>D1 / D2 / D3</option>
                                    <option value="S1 / D4" {{ $pendWali == 'S1 / D4' ? 'selected' : '' }}>S1 / D4</option>
                                    <option value="S2 / S3" {{ $pendWali == 'S2 / S3' ? 'selected' : '' }}>S2 / S3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-2">
                            <div class="field"><label>Pekerjaan Wali</label><input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali', $dataOrangTua->pekerjaan_wali ?? '') }}"></div>
                            <div class="field">
                                <label>Penghasilan Bulanan</label>
                                @php $pengWali = old('penghasilan_wali_bulanan', $dataOrangTua->penghasilan_wali_bulanan ?? ''); @endphp
                                <select name="penghasilan_wali_bulanan">
                                    <option value="" disabled {{ $pengWali == '' ? 'selected' : '' }}>Pilih Penghasilan Bulanan</option>
                                    <option value="-" {{ $pengWali == '-' ? 'selected' : '' }}>-</option>
                                    <option value="Tidak Berpenghasilan" {{ $pengWali == 'Tidak Berpenghasilan' ? 'selected' : '' }}>Tidak Berpenghasilan / Tidak Bekerja</option>
                                    <option value="Kurang dari Rp 1.000.000" {{ $pengWali == 'Kurang dari Rp 1.000.000' ? 'selected' : '' }}>Kurang dari Rp 1.000.000</option>
                                    <option value="Rp 1.000.000 - Rp 1.999.999" {{ $pengWali == 'Rp 1.000.000 - Rp 1.999.999' ? 'selected' : '' }}>Rp 1.000.000 - Rp 1.999.999</option>
                                    <option value="Rp 2.000.000 - Rp 4.999.999" {{ $pengWali == 'Rp 2.000.000 - Rp 4.999.999' ? 'selected' : '' }}>Rp 2.000.000 - Rp 4.999.999</option>
                                    <option value="Rp 5.000.000 - Rp 20.000.000" {{ $pengWali == 'Rp 5.000.000 - Rp 20.000.000' ? 'selected' : '' }}>Rp 5.000.000 - Rp 20.000.000</option>
                                    <option value="Lebih dari Rp 20.000.000" {{ $pengWali == 'Lebih dari Rp 20.000.000' ? 'selected' : '' }}>Lebih dari Rp 20.000.000</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-1">
                            <div class="field"><label>Nomor Telepon Wali</label><input type="text" name="no_hp_wali" value="{{ old('no_hp_wali', $dataOrangTua->no_hp_wali ?? '') }}"></div>
                        </div>
                    </div>
                </div>

                <!-- SECTION C: DATA TEMPAT TINGGAL -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-house"></i></div><h3 class="section-title">C. Data Tempat Tinggal Siswa</h3></div>

                    <div class="row-2">
                        <div class="field"><label>Provinsi</label><input type="text" name="provinsi" value="{{ old('provinsi', $pendaftar->provinsi) }}"></div>
                        <div class="field"><label>Kabupaten / Kota</label><input type="text" name="kabupaten" value="{{ old('kabupaten', $pendaftar->kabupaten) }}"></div>
                    </div>

                    <div class="row-2">
                        <div class="field"><label>Kecamatan</label><input type="text" name="kecamatan" value="{{ old('kecamatan', $pendaftar->kecamatan) }}"></div>
                        <div class="field"><label>Desa / Kelurahan</label><input type="text" name="desa" value="{{ old('desa', $pendaftar->desa) }}"></div>
                    </div>

                    <div class="row-2">
                        <div class="field"><label>Kode Pos</label><input type="text" name="kode_pos" value="{{ old('kode_pos', $pendaftar->kode_pos) }}"></div>
                        <div class="field">
                            <label>RT / RW</label>
                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                                <input type="text" name="rt" placeholder="RT" value="{{ old('rt', $pendaftar->rt) }}">
                                <input type="text" name="rw" placeholder="RW" value="{{ old('rw', $pendaftar->rw) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row-1">
                        <div class="field"><label>Alamat Lengkap</label><input type="text" name="alamat_lengkap" value="{{ old('alamat_lengkap', $pendaftar->alamat_lengkap) }}"></div>
                    </div>

                    <div class="row-2">
                        <div class="field">
                            <label>Jenis Tinggal</label>
                            @php $jenisTinggal = old('jenis_tinggal', $pendaftar->jenis_tinggal); @endphp
                            <select name="jenis_tinggal">
                                <option value="" disabled {{ !$jenisTinggal ? 'selected' : '' }}>Pilih Jenis Tinggal</option>
                                <option value="Rumah (Bersama Orang Tua)" {{ $jenisTinggal == 'Rumah (Bersama Orang Tua)' ? 'selected' : '' }}>Rumah (Bersama Orang Tua)</option>
                                <option value="Asrama" {{ $jenisTinggal == 'Asrama' ? 'selected' : '' }}>Asrama</option>
                                <option value="Kos / Kontrak" {{ $jenisTinggal == 'Kos / Kontrak' ? 'selected' : '' }}>Kos / Kontrak</option>
                                <option value="Pondok Pesantren" {{ $jenisTinggal == 'Pondok Pesantren' ? 'selected' : '' }}>Pondok Pesantren</option>
                            </select>
                        </div>
                        <div class="field"><label>Alat Transportasi</label><input type="text" name="alat_transportasi_ke_sekolah" value="{{ old('alat_transportasi_ke_sekolah', $pendaftar->alat_transportasi_ke_sekolah) }}"></div>
                    </div>

                    <div class="row-1">
                        <div class="field"><label>Jarak ke Sekolah</label><input type="text" name="jarak_ke_sekolah" value="{{ old('jarak_ke_sekolah', $pendaftar->jarak_ke_sekolah) }}"></div>
                    </div>
                </div>

                <!-- SECTION D: PILIHAN JURUSAN & GELOMBANG -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-graduation-cap"></i></div><h3 class="section-title">D. Pilihan Jurusan & Gelombang Pendaftaran</h3></div>

                    @php
                        $jurusan1 = old('jurusan_pilihan_1', $pendaftar->jurusan_pilihan_1);
                        $jurusan2 = old('jurusan_pilihan_2', $pendaftar->jurusan_pilihan_2);
                        $gelombang = old('gelombang', $pendaftar->gelombang);
                    @endphp
                    <div class="row-2">
                        <div class="field">
                            <label>Pilihan 1 (Utama)<span class="req">*</span></label>
                            <div class="radio-group">
                                <label class="radio-option"><input type="radio" name="jurusan_pilihan_1" value="PPLG" class="req" {{ $jurusan1 == 'PPLG' ? 'checked' : '' }}> PPLG</label>
                                <label class="radio-option"><input type="radio" name="jurusan_pilihan_1" value="BCF" class="req" {{ $jurusan1 == 'BCF' ? 'checked' : '' }}> BCF</label>
                                <label class="radio-option"><input type="radio" name="jurusan_pilihan_1" value="MPLB" class="req" {{ $jurusan1 == 'MPLB' ? 'checked' : '' }}> MPLB</label>
                            </div>
                        </div>
                        <div class="field">
                            <label>Pilihan 2 (Kedua)<span class="req">*</span></label>
                            <div class="radio-group">
                                <label class="radio-option"><input type="radio" name="jurusan_pilihan_2" value="PPLG" class="req" {{ $jurusan2 == 'PPLG' ? 'checked' : '' }}> PPLG</label>
                                <label class="radio-option"><input type="radio" name="jurusan_pilihan_2" value="BCF" class="req" {{ $jurusan2 == 'BCF' ? 'checked' : '' }}> BCF</label>
                                <label class="radio-option"><input type="radio" name="jurusan_pilihan_2" value="MPLB" class="req" {{ $jurusan2 == 'MPLB' ? 'checked' : '' }}> MPLB</label>
                            </div>
                        </div>
                    </div>

                    <div class="row-2">
                        <div class="field">
                            <label>Gelombang Pendaftaran<span class="req">*</span></label>
                            <select name="gelombang" class="req">
                                <option value="" disabled {{ !$gelombang ? 'selected' : '' }}>Pilih Gelombang Pendaftaran</option>
                                <option value="Gelombang 1" {{ $gelombang == 'Gelombang 1' ? 'selected' : '' }}>Gelombang 1 (Januari - Maret 2026)</option>
                                <option value="Gelombang 2" {{ $gelombang == 'Gelombang 2' ? 'selected' : '' }}>Gelombang 2 (April - Juli 2026)</option>
                            </select>
                        </div>
                        <div class="field">
                            {{-- Catatan: kolom status_pendaftaran belum divalidasi di AdminController@updatePendaftar,
                                 jadi field ini murni tampilan dan belum ikut kesimpen kalau diubah.
                                 Tambahkan 'status_pendaftaran' => 'required|string' di $validated controller kalau mau ini aktif. --}}
                            <label>Status Pendaftaran</label>
                            <select name="status_pendaftaran">
                                <option value="" disabled {{ !$pendaftar->status_pendaftaran ? 'selected' : '' }}>Pilih Status</option>
                                <option value="Aktif" {{ $pendaftar->status_pendaftaran == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Menunggu Verifikasi" {{ $pendaftar->status_pendaftaran == 'Menunggu Verifikasi' ? 'selected' : '' }}>Menunggu Verifikasi</option>
                                <option value="Terverifikasi" {{ $pendaftar->status_pendaftaran == 'Terverifikasi' ? 'selected' : '' }}>Terverifikasi</option>
                                <option value="Diterima" {{ $pendaftar->status_pendaftaran == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="Ditolak" {{ $pendaftar->status_pendaftaran == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- SECTION E: DATA ASAL SEKOLAH -->
                <div class="section">
                    <div class="section-head"><div class="section-icon"><i class="fa-solid fa-school"></i></div><h3 class="section-title">E. Data Asal Sekolah</h3></div>
                    <div class="row-1">
                        <div class="field"><label>Asal Sekolah<span class="req">*</span></label><input type="text" name="asal_sekolah" class="req" value="{{ old('asal_sekolah', $pendaftar->asal_sekolah) }}"></div>
                    </div>
                </div>

                <div class="footer-actions">
                    <a href="{{ url('/list_pendaftar') }}" id="btnKembali" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Batal</a>
                    <button type="submit" class="btn-save" id="btnSimpan"><i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="toast" id="toast">
        <i class="fa-solid fa-circle-check" style="color: #a7f3d0;"></i>
        <span id="toastMsg">Perubahan berhasil disimpan.</span>
    </div>

    <script>
        function showToast(msg, isError = false) {
            const toast = document.getElementById('toast');
            const toastMsg = document.getElementById('toastMsg');
            toastMsg.textContent = msg;
            toast.style.background = isError ? "#dc2626" : "#022c22";
            toast.classList.add("show");
            clearTimeout(showToast._t);
            showToast._t = setTimeout(() => toast.classList.remove("show"), 3200);
        }

        function validateForm() {
            let firstInvalid = null;
            let isValid = true;
            document.querySelectorAll("input.req, select.req").forEach(el => {
                const value = (el.value || "").toString().trim();
                const invalid = value === "";
                el.classList.toggle("invalid", invalid);
                if (invalid) {
                    isValid = false;
                    if (!firstInvalid) firstInvalid = el;
                }
            });
            if (firstInvalid) firstInvalid.scrollIntoView({ behavior: "smooth", block: "center" });
            return isValid;
        }

        // Form disubmit beneran ke backend (POST + @method('PUT')), jadi cukup
        // cegah submit kalau ada field wajib yang masih kosong.
        document.getElementById('editForm').addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
                showToast("Ada data wajib yang belum diisi. Periksa kembali formulir.", true);
            }
        });

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

    </script>
</body>
</html>