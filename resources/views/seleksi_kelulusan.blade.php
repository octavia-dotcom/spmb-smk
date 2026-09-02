<!DOCTYPE html>
<html lang="id">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleksi & Kelulusan - PPDB SMK Maarif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          onerror="this.onerror=null;this.href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css';">
    <style>
        /* RESET & GLOBAL STYLING */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f8f9fa;
            display: flex;
            color: #333;
        }

        /* SIDEBAR NAVIGASI */
        .sidebar {
            width: 260px;
            background-color: #022c22;
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
        .menu-nav a:hover, .menu-nav a.active {
            background-color: rgba(255, 255, 255, 0.15);
            font-weight: bold;
        }

        /* STYLING MENU DROPDOWN SIDEBAR */
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

        .dropdown-btn:hover, .dropdown-btn.active {
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

        .dropdown-container a:hover, .dropdown-container a.active {
            opacity: 1;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .arrow-icon {
            font-size: 10px;
            transition: transform 0.3s ease;
        }

        .arrow-icon.rotate {
            transform: rotate(180deg);
        }

        /* SIDEBAR BOTTOM */
        .sidebar-bottom {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding-top: 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* USER PROFILE CARD SIDEBAR */
        .admin-profile-card {
            background-color: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 12px 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: background-color 0.2s;
            border: 1px solid rgba(255, 255, 255, 0.05);
            text-decoration: none;
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

        /* BUTTON KELUAR SIDEBAR */
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

        /* COPYRIGHT FOOTER SIDEBAR */
        .sidebar-copyright {
            font-size: 10px;
            color: #a0c4be;
            text-align: center;
            line-height: 1.4;
            margin-top: 4px;
        }

        /* MAIN CONTENT AREA */
        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            padding: 0;
            transition: all 0.2s ease;
        }
        .main-content.expanded {
            margin-left: 0;
            width: 100%;
        }

        /* TOPBAR HEADER */
        .top-navbar {
            background-color: #ffffff;
            min-height: 65px;
            padding: 14px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e0e0e0;
            position: sticky;
            top: 0;
            z-index: 90;
        }
        .top-left {
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }
        .btn-toggle-menu {
            background: none;
            border: none;
            font-size: 20px;
            color: #333;
            cursor: pointer;
            padding: 5px;
            margin-top: 4px;
        }
        .page-title {
            font-size: 22px;
            font-weight: 800;
            color: #04352b;
        }
        .page-subtitle {
            font-size: 13px;
            color: #6b7280;
            margin-top: 4px;
        }

        /* PROFILE DROPDOWN ATAS KANAN */
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
            transition: background 0.2s;
        }
        .profile-btn:hover {
            background-color: #f0f0f0;
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
            font-size: 14px;
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

        /* BODY CONTENT CONTAINER */
        .content-body {
            padding: 30px;
        }

        /* 4 KARTU STATISTIK RINGKASAN */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }
        .stat-card {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background-color: #e8f5e9;
            color: #04352b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }
        .stat-info h4 {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }
        .stat-info .number {
            font-size: 22px;
            font-weight: 700;
            color: #04352b;
        }

        /* PANEL CARD */
        .card-panel {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
            overflow: hidden;
            margin-bottom: 25px;
        }
        .panel-header {
            font-size: 15px;
            font-weight: 700;
            color: #04352b;
            padding: 16px 20px;
            border-bottom: 1px solid #eeeeee;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .panel-header::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 5px;
            background-color: #04352b;
        }

        .panel-body {
            padding: 20px;
        }

        /* TABEL STYLING */
        .table-container {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 13px;
        }
        th {
            background-color: #f9fbf0;
            padding: 14px 16px;
            color: #04352b;
            font-weight: 700;
            border-bottom: 1px solid #e0e0e0;
            text-transform: uppercase;
            font-size: 12px;
            white-space: nowrap;
        }
        td {
            padding: 14px 16px;
            border-bottom: 1px solid #eeeeee;
            vertical-align: middle;
            white-space: nowrap;
        }
        .badge {
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        .badge-verif { background-color: #e6f4ea; color: #137333; }
        .badge-proses { background-color: #fef7e0; color: #b06000; }
        .badge-diterima { background-color: #e8f0fe; color: #1a73e8; }
        .badge-lulus { background-color: #e6f4ea; color: #137333; }
        .badge-tidak-lulus { background-color: #fce8e6; color: #c5221f; }
        .badge-cadangan { background-color: #fef2e0; color: #b06000; }
        .badge-belum { background-color: #e8f0fe; color: #1a73e8; }

        /* FILTER BAR */
        .filter-bar {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            padding: 20px;
            border-bottom: 1px solid #eeeeee;
        }
        .search-box {
            flex: 1;
            min-width: 220px;
            position: relative;
        }
        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 13px;
        }
        .search-box input {
            width: 100%;
            padding: 10px 14px 10px 36px;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
            font-family: 'Segoe UI', sans-serif;
        }
        .search-box input:focus { border-color: #047857; }
        .filter-group { display: flex; flex-direction: column; gap: 5px; }
        .filter-group label { font-size: 11.5px; color: #666; font-weight: 600; }
        .filter-group select {
            padding: 9px 12px;
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            font-size: 12.5px;
            color: #333;
            background-color: #ffffff;
            outline: none;
            min-width: 150px;
            cursor: pointer;
        }
        .filter-group select:focus { border-color: #047857; }
        .btn-reset-filter {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid #dcdcdc;
            color: #333;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 12.5px;
            font-weight: 600;
            cursor: pointer;
            align-self: flex-end;
        }
        .btn-reset-filter:hover { background-color: #f5f5f5; }

        /* ACTION BUTTONS ROW */
        .action-buttons-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
            padding: 0 20px 20px;
        }
        .action-buttons-left { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn-action {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 8px;
            font-size: 12.5px;
            font-weight: 700;
            cursor: pointer;
            border: 1px solid transparent;
        }
        .btn-action-primary { background-color: #04352b; color: #ffffff; }
        .btn-action-primary:hover { background-color: #0c5243; }
        .btn-action-outline { background-color: #ffffff; color: #04352b; border-color: #dcdcdc; }
        .btn-action-outline:hover { background-color: #f5f5f5; }
        .btn-action-export { background-color: #ffffff; color: #137333; border-color: #cdeccf; }
        .btn-action-export:hover { background-color: #e6f4ea; }

        /* STATUS SELECT DI TABEL */
        .status-select {
            padding: 7px 10px;
            border: 1px solid #dcdcdc;
            border-radius: 6px;
            font-size: 12px;
            color: #333;
            background-color: #ffffff;
            outline: none;
            cursor: pointer;
        }
        .status-select:focus { border-color: #047857; }

        /* INFO NOTE BAWAH TABEL */
        .info-note {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            background-color: #f9fbf9;
            border: 1px solid #eeeeee;
            border-radius: 10px;
            padding: 16px 18px;
            margin-top: 20px;
        }
        .info-note i {
            color: #047857;
            font-size: 15px;
            margin-top: 2px;
        }
        .info-note .title { font-size: 13px; font-weight: 700; color: #04352b; margin-bottom: 3px; }
        .info-note .desc { font-size: 12px; color: #666; }

        .empty-row td {
            text-align: center;
            padding: 30px 10px;
            color: #999;
        }

        /* ==================== RESPONSIVE ==================== */

        @media (max-width: 992px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                box-shadow: 4px 0 20px rgba(0, 0, 0, 0.25);
            }

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
                padding: 12px 16px;
            }

            .top-left {
                gap: 10px;
            }

            .page-title {
                font-size: 17px;
            }

            .page-subtitle {
                font-size: 12px;
            }

            .profile-text {
                display: none;
            }

            .content-body {
                padding: 16px;
            }

            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 12px;
                margin-bottom: 16px;
            }

            .stat-card {
                padding: 14px;
                gap: 10px;
            }

            .stat-icon {
                width: 38px;
                height: 38px;
                font-size: 16px;
                border-radius: 8px;
            }

            .stat-info h4 {
                font-size: 10px;
            }

            .stat-info .number {
                font-size: 18px;
            }

            .panel-header {
                flex-wrap: wrap;
                gap: 10px;
                padding: 14px 16px;
                font-size: 14px;
            }

            .filter-bar {
                padding: 14px 16px;
                gap: 10px;
            }

            .search-box {
                flex: 1 1 100%;
                min-width: 0;
            }

            .filter-group select {
                min-width: 0;
                flex: 1;
            }

            .btn-reset-filter {
                align-self: stretch;
                justify-content: center;
            }

            .action-buttons-row {
                padding: 0 16px 16px;
                flex-direction: column;
                align-items: stretch;
            }

            .action-buttons-left {
                flex-direction: column;
            }

            .action-buttons-left .btn-action,
            .action-buttons-row > .btn-action {
                width: 100%;
                justify-content: center;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px 12px;
            }

            .info-note {
                padding: 14px;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR NAVIGASI -->
    <div class="sidebar" id="sidebar">
        <div>
            <div class="sidebar-header">
                <img src="{{ asset('img/logo.smk.png') }}" alt="Logo SMK" class="logo-sekolah-img" onerror="this.src='https://via.placeholder.com/45';">
                <div class="school-title">
                    <h1>SMK Maarif</h1>
                    <h2>Walisongo Kajoran</h2>
                    <span class="admin-tag">Admin Panel</span>
                </div>
            </div>
            
            <div class="menu-nav">
                <a href="{{ url('/dashboard_admin') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <a href="{{ url('/list_pendaftar') }}"><i class="fa-solid fa-users"></i> Pendaftar</a>
                <a href="{{ url('/verifikasi_berkas') }}"><i class="fa-solid fa-file-circle-check"></i> Verifikasi Berkas</a>
                <a href="{{ url('/seleksi_kelulusan') }}" class="active"><i class="fa-solid fa-award"></i> Seleksi & Kelulusan</a>

                <!-- DROPDOWN MENU CMS & INFORMASI -->
                <div class="menu-dropdown-wrap">
                    <button class="dropdown-btn" id="btnCmsDropdown" onclick="toggleCmsMenu()">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <i class="fa-solid fa-sliders"></i> CMS & Informasi
                        </div>
                        <i class="fa-solid fa-chevron-down arrow-icon" id="arrowCms"></i>
                    </button>
                    
                    <div class="dropdown-container" id="dropdownCmsContainer">
                        <a href="{{ url('/kuota') }}"><i class="fa-solid fa-list-check"></i> Kuota Jurusan</a>
                        <a href="{{ url('/pemngumuman_admin') }}"><i class="fa-solid fa-bullhorn"></i> Kelola Pengumuman</a>
                        <a href="{{ url('/cms_landing') }}"><i class="fa-solid fa-window-restore"></i> Pengaturan Landing Page</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- BOTTOM SIDEBAR NAVIGASI KE PROFIL ADMIN -->
        <div class="sidebar-bottom">
            <a href="{{ url('/profil_admin') }}" class="admin-profile-card">
                <div class="admin-avatar">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="admin-info">
                    <div class="name">{{ Auth::user()->name }}</div>
                    <div class="role">{{ Auth::user()->role ?? 'Administrator' }}</div>
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

    <!-- MAIN CONTENT AREA -->
    <div class="main-content" id="mainContent">

        <div class="top-navbar">
            <div class="top-left">
                <button class="btn-toggle-menu" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div>
                    <div class="page-title">Seleksi & Kelulusan</div>
                    <div class="page-subtitle">Kelola status seleksi dan kelulusan calon siswa.</div>
                </div>
            </div>

            <div class="profile-wrapper">
                <button class="profile-btn" onclick="toggleProfileDropdown(event)">
                    <div class="profile-text">
                        <div class="name">{{ Auth::user()->name }}</div>
                        <div class="role">{{ Auth::user()->role ?? 'Administrator' }}</div>
                    </div>
                    <div class="profile-avatar"><i class="fa-solid fa-user"></i></div>
                    <i class="fa-solid fa-chevron-down" style="font-size: 11px; color: #888;"></i>
                </button>

                <!-- DROPDOWN TOPBAR NAVIGASI KE PROFIL ADMIN -->
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

            <!-- 4 KARTU STATISTIK RINGKASAN -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="stat-info">
                        <h4>Total Pendaftar</h4>
                        <div class="number" id="stat-total">0</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #e6f4ea; color: #137333;">
                        <i class="fa-solid fa-file-circle-check"></i>
                    </div>
                    <div class="stat-info">
                        <h4>Berkas Diverifikasi</h4>
                        <div class="number" id="stat-verif">0</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #fef7e0; color: #b06000;">
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                    <div class="stat-info">
                        <h4>Sedang Diproses</h4>
                        <div class="number" id="stat-proses">0</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #e8f0fe; color: #1a73e8;">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div class="stat-info">
                        <h4>Diterima</h4>
                        <div class="number" id="stat-diterima">0</div>
                    </div>
                </div>
            </div>

            <!-- PANEL TABEL SELEKSI & KELULUSAN -->
            <div class="card-panel">
                <div class="panel-header">
                    <span>Data Seleksi & Kelulusan Calon Siswa</span>
                </div>

                <!-- FILTER BAR -->
                <div class="filter-bar">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="filterSearch" placeholder="Cari nama / no pendaftaran...">
                    </div>
                    <div class="filter-group">
                        <label>Jurusan</label>
                        <select id="filterJurusan">
                            <option value="">Semua Jurusan</option>
                            <option value="PPLG">PPLG</option>
                            <option value="BCF">BCF</option>
                            <option value="MPLB">MPLB</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Gelombang</label>
                        <select id="filterGelombang">
                            <option value="">Semua Gelombang</option>
                            <option value="Gelombang 1">Gelombang 1</option>
                            <option value="Gelombang 2">Gelombang 2</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Status Seleksi</label>
                        <select id="filterStatusSeleksi">
                            <option value="">Semua Status</option>
                            <option value="Lulus">Lulus</option>
                            <option value="Tidak Lulus">Tidak Lulus</option>
                            <option value="Cadangan">Cadangan</option>
                            <option value="Belum Diproses">Belum Diproses</option>
                        </select>
                    </div>
                    <button class="btn-reset-filter" id="btnResetFilter">
                        <i class="fa-solid fa-rotate-right"></i> Reset Filter
                    </button>
                </div>

                <!-- ACTION BUTTONS -->
                <div class="action-buttons-row">
                    <div class="action-buttons-left">
                        <button class="btn-action btn-action-primary" id="btnTentukanHasil">
                            <i class="fa-solid fa-circle-check"></i> Tentukan Hasil Seleksi
                        </button>
                        <button class="btn-action btn-action-outline" id="btnImportHasil">
                            <i class="fa-solid fa-file-arrow-up"></i> Import Hasil Seleksi
                        </button>
                    </div>
                    <button class="btn-action btn-action-export" id="btnExportExcel">
                        <i class="fa-solid fa-file-excel"></i> Export Excel
                    </button>
                </div>

                <!-- TABEL -->
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 36px;"><input type="checkbox" id="checkAll"></th>
                                <th style="width: 40px; text-align: center;">No</th>
                                <th>No Pendaftaran</th>
                                <th>Nama Calon Siswa</th>
                                <th>Jurusan Pilihan</th>
                                <th>Gelombang</th>
                                <th>Nilai Akhir</th>
                                <th>Status Seleksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="seleksiTableBody">
                            <!-- diisi otomatis oleh JS -->
                        </tbody>
                    </table>
                </div>

                <div style="padding: 0 20px 20px;">
                    <div class="info-note">
                        <i class="fa-solid fa-circle-info"></i>
                        <div>
                            <div class="title">Informasi</div>
                            <div class="desc">Gunakan fitur "Tentukan Hasil Seleksi" untuk mengubah status kelulusan beberapa siswa sekaligus.</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function toggleCmsMenu() {
            const container = document.getElementById("dropdownCmsContainer");
            const arrow = document.getElementById("arrowCms");
            const btn = document.getElementById("btnCmsDropdown");

            container.classList.toggle("show");
            arrow.classList.toggle("rotate");
            btn.classList.toggle("active");
        }

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

        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');

        const MOBILE_BREAKPOINT = 768;

        function isMobileView() {
            return window.innerWidth <= MOBILE_BREAKPOINT;
        }

        function setSidebarState(open) {
            sidebar.classList.toggle('collapsed', !open);
            mainContent.classList.toggle('expanded', !open);
            if (isMobileView()) {
                document.body.classList.toggle('sidebar-mobile-open', open);
            } else {
                document.body.classList.remove('sidebar-mobile-open');
            }
        }

        function toggleSidebar() {
            const isOpen = !sidebar.classList.contains('collapsed');
            setSidebarState(!isOpen);
        }

        setSidebarState(!isMobileView());

        document.addEventListener('click', function(event) {
            if (!isMobileView()) return;
            if (sidebar.classList.contains('collapsed')) return;

            const toggleBtn = document.querySelector('.btn-toggle-menu');
            const clickedInsideSidebar = sidebar.contains(event.target);
            const clickedToggleBtn = toggleBtn && toggleBtn.contains(event.target);

            if (!clickedInsideSidebar && !clickedToggleBtn) {
                setSidebarState(false);
            }
        });

        window.addEventListener('resize', function() {
            if (!isMobileView() && document.body.classList.contains('sidebar-mobile-open')) {
                document.body.classList.remove('sidebar-mobile-open');
            }
        });

        function logoutSystem() {
            if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
                alert("Anda telah keluar.");
                window.location.href = ('/login');
            }
        }

        /* =====================================================================
           DATA SELEKSI & KELULUSAN — LANGSUNG DARI DATABASE
           (dikirim controller AdminController::seleksiKelulusan)
           ===================================================================== */

        function getStorageData() {
            const pendaftarDariDatabase = @json($pendaftar);

            return pendaftarDariDatabase.map((item) => {
                return {
                    id: String(item.id_pendaftar),
                    noReg: item.no_pendaftaran || '-',
                    nama: item.nama_lengkap || '-',
                    jurusan1: item.jurusan_pilihan_1 || '-',
                    gelombang: item.gelombang || '-',
                    nilaiAkhir: item.nilai_akhir,
                    statusSeleksi: item.status_seleksi || 'Belum Diproses',
                    statusVerifikasi: item.status_verifikasi || 'menunggu'
                };
            });
        }

        let seleksiData = [];

        const STATUS_BADGE_CLASS = {
            "Lulus": "badge-lulus",
            "Tidak Lulus": "badge-tidak-lulus",
            "Cadangan": "badge-cadangan",
            "Belum Diproses": "badge-belum"
        };
        const STATUS_ICON = {
            "Lulus": "fa-circle-check",
            "Tidak Lulus": "fa-circle-xmark",
            "Cadangan": "fa-user-clock",
            "Belum Diproses": "fa-hourglass-half"
        };

        /* ---------- KARTU STATISTIK ATAS ---------- */
        function renderStats() {
            const total = seleksiData.length;
            const verif = seleksiData.filter(s => s.statusVerifikasi === 'lengkap').length;
            const proses = seleksiData.filter(s => s.statusVerifikasi === 'menunggu').length;
            const diterima = seleksiData.filter(s => s.statusSeleksi === "Lulus").length;

            document.getElementById('stat-total').textContent = total;
            document.getElementById('stat-verif').textContent = verif;
            document.getElementById('stat-proses').textContent = proses;
            document.getElementById('stat-diterima').textContent = diterima;
        }

        /* ---------- TABEL SELEKSI & KELULUSAN (dengan filter) ---------- */
        function renderSeleksiTable() {
            const tbody = document.getElementById('seleksiTableBody');
            const searchVal = (document.getElementById('filterSearch').value || '').toLowerCase().trim();
            const jurusanVal = document.getElementById('filterJurusan').value;
            const gelombangVal = document.getElementById('filterGelombang').value;
            const statusVal = document.getElementById('filterStatusSeleksi').value;

            const filtered = seleksiData
                .map((s, originalIndex) => ({ ...s, originalIndex }))
                .filter(s => {
                    const noPendaftaran = s.noReg || s.noPendaftaran || '';
                    const matchSearch = !searchVal ||
                        s.nama.toLowerCase().includes(searchVal) ||
                        noPendaftaran.toLowerCase().includes(searchVal);
                    
                    const matchJurusan = !jurusanVal || s.jurusan1 === jurusanVal || s.jurusan === jurusanVal;
                    const matchGelombang = !gelombangVal || s.gelombang === gelombangVal;
                    
                    const currentStatusSeleksi = s.statusSeleksi || "Belum Diproses";
                    const matchStatus = !statusVal || currentStatusSeleksi === statusVal;
                    
                    return matchSearch && matchJurusan && matchGelombang && matchStatus;
                });

            if (filtered.length === 0) {
                tbody.innerHTML = `<tr class="empty-row"><td colspan="9">
                    ${seleksiData.length === 0 ? 'Belum ada data pendaftar untuk diseleksi.' : 'Tidak ada data yang cocok dengan pencarian/filter.'}
                </td></tr>`;
                return;
            }

            tbody.innerHTML = filtered.map((s, i) => {
                const noPendaftaran = s.noReg || s.noPendaftaran || '-';
                const jurusanDisplay = s.jurusan1 || s.jurusan || '-';
                const statusSeleksi = s.statusSeleksi || 'Belum Diproses';
                const nilaiDisplay = (s.nilaiAkhir !== undefined && s.nilaiAkhir !== null) ? Number(s.nilaiAkhir).toFixed(2) : '-';

                return `
                <tr>
                    <td><input type="checkbox" class="rowCheck" data-index="${s.originalIndex}"></td>
                    <td style="text-align:center; color:#777;">${i + 1}</td>
                    <td><span style="font-family: monospace; font-weight: 600; color: #047857;">${noPendaftaran}</span></td>
                    <td><strong>${s.nama}</strong></td>
                    <td>${jurusanDisplay}</td>
                    <td>${s.gelombang || 'Gelombang 1'}</td>
                    <td>${nilaiDisplay}</td>
                    <td><span class="badge ${STATUS_BADGE_CLASS[statusSeleksi]}"><i class="fa-solid ${STATUS_ICON[statusSeleksi]}"></i> ${statusSeleksi}</span></td>
                    <td>
                        <select class="status-select" onchange="updateStatusSeleksi(${s.originalIndex}, this.value)">
                            <option value="Belum Diproses" ${statusSeleksi === 'Belum Diproses' ? 'selected' : ''}>Belum Diproses</option>
                            <option value="Lulus" ${statusSeleksi === 'Lulus' ? 'selected' : ''}>Lulus</option>
                            <option value="Tidak Lulus" ${statusSeleksi === 'Tidak Lulus' ? 'selected' : ''}>Tidak Lulus</option>
                            <option value="Cadangan" ${statusSeleksi === 'Cadangan' ? 'selected' : ''}>Cadangan</option>
                        </select>
                    </td>
                </tr>
            `}).join('');
        }

        /* ---------- UBAH STATUS SELEKSI DAN SIMPAN PERMANEN KE DATABASE ---------- */
        function simpanSeleksiKeServer(idPendaftar, statusSeleksi, nilaiAkhir) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            return fetch(`/seleksi_kelulusan/${idPendaftar}/update`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    status_seleksi: statusSeleksi,
                    nilai_akhir: nilaiAkhir
                })
            }).then(res => {
                if (!res.ok) throw new Error('Gagal menyimpan ke server');
                return res.json();
            });
        }

        function updateStatusSeleksi(index, newStatus) {
            const siswa = seleksiData[index];
            siswa.statusSeleksi = newStatus;

            simpanSeleksiKeServer(siswa.id, newStatus, siswa.nilaiAkhir)
                .then(() => {
                    renderStats();
                    renderSeleksiTable();
                })
                .catch(() => {
                    alert('Gagal menyimpan status seleksi ke server. Coba lagi.');
                });
        }

        /* ---------- FILTER LISTENERS ---------- */
        ['filterSearch', 'filterJurusan', 'filterGelombang', 'filterStatusSeleksi'].forEach(id => {
            document.getElementById(id).addEventListener('input', renderSeleksiTable);
            document.getElementById(id).addEventListener('change', renderSeleksiTable);
        });
        
        document.getElementById('btnResetFilter').addEventListener('click', () => {
            document.getElementById('filterSearch').value = '';
            document.getElementById('filterJurusan').value = '';
            document.getElementById('filterGelombang').value = '';
            document.getElementById('filterStatusSeleksi').value = '';
            renderSeleksiTable();
        });

        /* ---------- CHECKBOX "PILIH SEMUA" ---------- */
        document.getElementById('checkAll').addEventListener('change', function() {
            document.querySelectorAll('.rowCheck').forEach(cb => cb.checked = this.checked);
        });

        /* ---------- TOMBOL AKSI MASSAL ---------- */
        document.getElementById('btnTentukanHasil').addEventListener('click', () => {
            const checkedBoxes = document.querySelectorAll('.rowCheck:checked');
            if (checkedBoxes.length === 0) {
                alert('Pilih minimal satu calon siswa terlebih dahulu (centang di kolom paling kiri).');
                return;
            }

            const pilihanStatus = prompt("Masukkan status kelulusan untuk siswa yang dipilih:\n(Ketik: Lulus / Tidak Lulus / Cadangan / Belum Diproses)", "Lulus");

            if (pilihanStatus && ["Lulus", "Tidak Lulus", "Cadangan", "Belum Diproses"].includes(pilihanStatus)) {
                const permintaan = Array.from(checkedBoxes).map(cb => {
                    const idx = cb.getAttribute('data-index');
                    const siswa = seleksiData[idx];
                    siswa.statusSeleksi = pilihanStatus;
                    return simpanSeleksiKeServer(siswa.id, pilihanStatus, siswa.nilaiAkhir);
                });

                Promise.all(permintaan)
                    .then(() => {
                        renderStats();
                        renderSeleksiTable();
                        alert(`Status ${checkedBoxes.length} siswa berhasil diperbarui menjadi "${pilihanStatus}".`);
                    })
                    .catch(() => {
                        alert('Sebagian atau semua data gagal disimpan ke server. Coba lagi.');
                    });
            } else if (pilihanStatus !== null) {
                alert("Status tidak valid. Harap masukan pilihan yang sesuai.");
            }
        });

        document.getElementById('btnImportHasil').addEventListener('click', () => {
            alert('Fitur import hasil seleksi dari file Excel akan berfungsi penuh saat terhubung dengan database.');
        });
        
        document.getElementById('btnExportExcel').addEventListener('click', () => {
            alert('Fitur export data seleksi ke file Excel akan berfungsi penuh saat terhubung dengan database.');
        });

        /* INIT LOAD DATA */
        document.addEventListener("DOMContentLoaded", function() {
            seleksiData = getStorageData();
            renderStats();
            renderSeleksiTable();
        });
    </script>
</body>
</html>