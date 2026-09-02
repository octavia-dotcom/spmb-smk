<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar - PPDB SMK Maarif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .top-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .btn-toggle-menu {
            background: none;
            border: none;
            font-size: 20px;
            color: #333;
            cursor: pointer;
            padding: 5px;
        }
        .page-title {
            font-size: 18px;
            font-weight: 700;
            color: #04352b;
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

        /* FILTER PANEL */
        .filter-panel {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 10px 10px 0 0;
            padding: 16px 20px;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .filter-top-row {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }
        .search-box {
            position: relative;
            flex: 1.2;
            min-width: 240px;
        }
        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 14px;
        }
        .search-box input {
            width: 100%;
            padding: 9px 12px 9px 36px;
            border: 1px solid #d0d0d0;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
            transition: border-color 0.2s;
        }
        .search-box input:focus {
            border-color: #047857;
        }
        
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .filter-group label {
            font-size: 11px;
            font-weight: 600;
            color: #04352b;
        }
        .select-filter {
            padding: 8px 12px;
            border: 1px solid #d0d0d0;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
            background-color: white;
            color: #333;
            cursor: pointer;
            min-width: 140px;
        }
        .select-filter:focus {
            border-color: #047857;
        }

        .btn-reset {
            background-color: #ffffff;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            margin-top: auto;
            height: 38px;
        }
        .btn-reset:hover {
            background-color: #e6f4ea;
        }

        .btn-primary {
            background-color: #023a2e;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            text-decoration: none;
            white-space: nowrap;
            margin-top: auto;
            height: 38px;
        }
        .btn-primary:hover {
            background-color: #045242;
        }

        .filter-bottom-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .btn-export {
            background-color: #ffffff;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 7px 14px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }
        .btn-export:hover {
            background-color: #e6f4ea;
        }

        /* TABEL STYLING */
        .table-container {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #e0e0e0;
            border-top: none;
            border-radius: 0 0 10px 10px;
            background: white;
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
            font-size: 11px;
            white-space: nowrap;
        }
        td {
            padding: 14px 16px;
            border-bottom: 1px solid #eeeeee;
            vertical-align: middle;
            white-space: nowrap;
        }
        tr:hover {
            background-color: #fcfcfc;
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
        .badge-lunas { background-color: #e6f4ea; color: #137333; }
        .badge-belum { background-color: #fee2e2; color: #dc2626; }
        .badge-revisi { background-color: #fef3c7; color: #b45309; }
        .badge-pending { background-color: #fdecea; color: #c0392b; }

        .action-group {
            display: flex;
            justify-content: center;
            gap: 6px;
        }
        .btn-action {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            border: 1px solid transparent;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            transition: all 0.2s;
            text-decoration: none;
        }
        .btn-action.view {
            background-color: #e6f4ea;
            color: #047857;
            border-color: #a7f3d0;
        }
        .btn-action.view:hover {
            background-color: #047857;
            color: #ffffff;
        }
        .btn-action.edit {
            background-color: #e0f2fe;
            color: #0284c7;
            border-color: #bae6fd;
        }
        .btn-action.edit:hover {
            background-color: #0284c7;
            color: #ffffff;
        }
        .btn-action.delete {
            background-color: #fee2e2;
            color: #dc2626;
            border-color: #fca5a5;
        }
        .btn-action.delete:hover {
            background-color: #dc2626;
            color: #ffffff;
        }

        /* STYLING KHUSUS UNTUK CETAK KOP SURAT (PORTRAIT A4) */
        .print-only {
            display: none;
        }

        @media print {
            @page {
                size: A4 portrait;
                margin: 10mm;
            }
            body {
                background: white !important;
                color: #000 !important;
            }
            .sidebar, .top-navbar, .stats-grid, .filter-panel, .action-group, th.col-aksi, td.col-aksi {
                display: none !important;
            }
            .main-content {
                margin-left: 0 !important;
                width: 100% !important;
            }
            .content-body {
                padding: 0 !important;
            }
            .print-only {
                display: block !important;
            }
            
            /* STYLING KOP SURAT CETAK PORTRAIT */
            .kop {
                position: relative;
                min-height: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 8px;
            }
            .logo {
                position: absolute;
                left: 5px;
                top: 50%;
                transform: translateY(-50%);
                width: 70px;
                height: 70px;
                object-fit: contain;
            }
            .identitas {
                width: 100%;
                text-align: center;
            }
            .nama-sekolah {
                font-size: 18px;
                font-weight: bold;
                color: #075c3b;
                letter-spacing: 0.5px;
            }
            .jenis-sekolah {
                margin-top: 2px;
                font-size: 11px;
                font-weight: bold;
                letter-spacing: 1px;
            }
            .alamat {
                margin-top: 4px;
                font-size: 9.5px;
                line-height: 1.3;
            }
            .kontak {
                margin-top: 2px;
                font-size: 8.5px;
                line-height: 1.3;
            }
            .garis-kop {
                margin-top: 6px;
                border-top: 2.5px solid #075c3b;
            }
            .garis-kop::after {
                content: "";
                display: block;
                margin-top: 2px;
                border-top: 1px solid #075c3b;
            }
            .judul-cetak {
                text-align: center;
                margin: 12px 0;
            }
            .judul-cetak h1 {
                font-size: 14px;
                margin-bottom: 2px;
            }
            .judul-cetak p {
                font-size: 10px;
            }
            .ttd-cetak {
                width: 200px;
                margin-left: auto;
                margin-top: 25px;
                text-align: center;
                font-size: 10px;
            }
            .ruang-ttd {
                height: 45px;
            }

            /* FORMAT TABEL DENGAN LEBAR YANG PAS UNTUK PORTRAIT */
            .table-container {
                border: none !important;
            }
            table {
                width: 100% !important;
                border-collapse: collapse !important;
                font-size: 9px !important;
                table-layout: auto !important;
            }
            th, td {
                border: 1px solid #9da8a3 !important;
                padding: 5px 6px !important;
                white-space: normal !important;
            }
            th {
                background-color: #075c3b !important;
                color: white !important;
                text-align: center !important;
            }
            td {
                text-align: left !important;
            }
            td:first-child {
                text-align: center !important;
            }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR NAVIGASI -->
    <div class="sidebar" id="sidebar">
        <div>
            <div class="sidebar-header">
                <img src="img/logo.smk.png" alt="Logo SMK" class="logo-sekolah-img" onerror="this.src='https://via.placeholder.com/45';">
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

                <!-- DROPDOWN MENU CMS & INFORMASI -->
                <div class="menu-dropdown-wrap">
                    <button class="dropdown-btn" id="btnCmsDropdown" onclick="toggleCmsMenu()">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <i class="fa-solid fa-sliders"></i> CMS & Informasi
                        </div>
                        <i class="fa-solid fa-chevron-down arrow-icon" id="arrowCms"></i>
                    </button>
                    
                    <div class="dropdown-container" id="dropdownCmsContainer">
                        <a href="{{ url('/kouta') }}"><i class="fa-solid fa-list-check"></i> Kuota Jurusan</a>
                        <a href="{{ url('/pengumuman_admin') }}"><i class="fa-solid fa-bullhorn"></i> Kelola Pengumuman</a>
                        <a href="{{ url('/cms_landing') }}"><i class="fa-solid fa-window-restore"></i> Pengaturan Landing Page</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDEBAR BOTTOM PROFILE -->
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
                <div class="page-title">Data Pendaftar</div>
            </div>

            <div class="profile-wrapper">
                <button class="profile-btn" onclick="toggleProfileDropdown(event)">
                    <div class="profile-text">
                        <div class="name">{{ Auth::user()->name }}</div>
                        <div class="role">{{ Auth::user()->role ?? 'Administrator' }}</div>
                    </div>
                    <div class="profile-avatar">A</div>
                    <i class="fa-solid fa-chevron-down" style="font-size: 11px; color: #888;"></i>
                </button>

                <!-- TOPBAR DROPDOWN PROFILE -->
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

            <!-- KOP SURAT KHUSUS PRINT -->
            <div class="print-only">
                <header class="kop">
                    <img src="img/logo.smk.png" alt="Logo SMK" class="logo" onerror="this.src='https://via.placeholder.com/70';">
                    <div class="identitas">
                        <div class="nama-sekolah">SMK MA'ARIF WALISONGO KAJORAN</div>
                        <div class="jenis-sekolah">SEKOLAH MENENGAH KEJURUAN</div>
                        <div class="alamat">Jl. KH Ridwan Sidowangi Kajoran Magelang Jawa Tengah 56163</div>
                        <div class="kontak">Telp/WA: (0293) 3195678 &nbsp;|&nbsp; Email: smkmwalisongokajoran@yahoo.com</div>
                        <div class="kontak">Website: smkmaarifwalisongokajoran.sch.id</div>
                    </div>
                </header>
                <div class="garis-kop"></div>
                
                <section class="judul-cetak">
                    <h1>LAPORAN DATA PENDAFTAR</h1>
                    <p>SPMB SMK MA'ARIF WALISONGO KAJORAN</p>
                    <p><strong>TAHUN PELAJARAN 2027/2028</strong></p>
                </section>
            </div>

            <!-- 4 KARTU STATISTIK RINGKASAN (DINAMIS & OTOMATIS) -->
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

            <!-- FILTER & SEARCH PANEL -->
            <div class="filter-panel">
                <div class="filter-top-row">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="searchInput" placeholder="Cari nama / no pendaftaran..." onkeyup="filterData()">
                    </div>

                    <div class="filter-group">
                        <select class="select-filter" id="filterJurusan" onchange="filterData()">
                            <option value="">Semua Jurusan</option>
                            <option value="PPLG">PPLG</option>
                            <option value="BCF">BCF</option>
                            <option value="MPLB">MPLB</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <select class="select-filter" id="filterGelombang" onchange="filterData()">
                            <option value="">Semua Gelombang</option>
                            <option value="Gelombang 1">Gelombang 1</option>
                            <option value="Gelombang 2">Gelombang 2</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <select class="select-filter" id="filterStatus" onchange="filterData()">
                            <option value="">Semua Status</option>
                            <option value="Berkas Diverifikasi">Berkas Diverifikasi</option>
                            <option value="Sedang Diproses">Sedang Diproses</option>
                            <option value="Diterima">Diterima</option>
                        </select>
                    </div>

                    <button class="btn-reset" onclick="resetFilter()">
                        <i class="fa-solid fa-rotate-right"></i> Reset Filter
                    </button>

                    <button class="btn-primary" onclick="window.location.href=('/tambah_pendaftar')">
                        <i class="fa-solid fa-plus"></i> Tambah Pendaftar
                    </button>
                </div>

                <div class="filter-bottom-row">
                    <button class="btn-export" onclick="cetakLaporan()">
                        <i class="fa-solid fa-print" style="color: #047857; font-size: 15px;"></i> Cetak Laporan
                    </button>
                </div>
            </div>

            <!-- TABEL PENDAFTAR -->
            <div class="table-container">
                <table>
                    <thead>
    <tr id="tableHeaderRow">
        <th style="width: 30px; text-align: center;">No</th>
        <th>No. Pendaftaran</th>
        <th>Nama Lengkap</th>
        <th>Asal Sekolah</th>
        <th>Jurusan 1</th>
        <th>Jurusan 2</th>
        <th>Gelombang</th>
        <th>Status Verifikasi</th>
        <th>Tgl Daftar</th>
        <th class="col-aksi" style="text-align: center; width: 90px;">Aksi</th>
    </tr>
</thead>
<tbody>
    @forelse($pendaftarTerbaru as $index => $pendaftar)
    @php
        $statusRealVerif = $pendaftar->status_verifikasi ?? 'menunggu';
        $badgeClass = 'badge-proses'; $iconClass = 'fa-spinner'; $labelStatus = 'Sedang Diproses';
        if ($statusRealVerif === 'lengkap') {
            $badgeClass = 'badge-verif'; $iconClass = 'fa-file-circle-check'; $labelStatus = 'Terverifikasi';
        } elseif ($statusRealVerif === 'revisi') {
            $badgeClass = 'badge-revisi'; $iconClass = 'fa-pen-to-square'; $labelStatus = 'Perlu Revisi';
        } elseif ($statusRealVerif === 'kurang' || $statusRealVerif === 'ditolak') {
            $badgeClass = 'badge-pending'; $iconClass = 'fa-clock'; $labelStatus = 'Belum Lengkap';
        }
    @endphp
    <tr>
        <td style="text-align: center; color: #777;">{{ $index + 1 }}</td>
        <td><span style="font-family: monospace; font-weight: 600; color: #047857;">{{ $pendaftar->no_pendaftaran }}</span></td>
        <td><strong>{{ $pendaftar->nama_lengkap }}</strong><br><small style="color: #777;">NISN: {{ $pendaftar->nisn ?? '-' }}</small></td>
        <td>{{ $pendaftar->asal_sekolah }}</td>
        <td><span style="font-weight: 600; color: #04352b;">{{ $pendaftar->jurusan_pilihan_1 }}</span></td>
        <td><span style="color: #666;">{{ $pendaftar->jurusan_pilihan_2 }}</span></td>
        <td>{{ $pendaftar->gelombang }}</td>
        <td>
            <span class="badge {{ $badgeClass }}"><i class="fa-solid {{ $iconClass }}"></i> {{ $labelStatus }}</span>
        </td>
        <td>{{ $pendaftar->created_at->format('d-m-Y') }}</td>
        <td class="col-aksi">
            <div class="action-group">
                <a href="{{ url('/detail_pendaftar/'.$pendaftar->id_pendaftar) }}" class="btn-action view" title="Lihat Detail">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <a href="{{ url('/edit_pendaftar/'.$pendaftar->id_pendaftar) }}" class="btn-action edit" title="Edit Data">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <button class="btn-action delete" title="Hapus Data" onclick="hapusDataPendaftar('{{ $pendaftar->id }}')">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="10" style="text-align: center; color: #888; padding: 25px;">Tidak ada data yang sesuai.</td>
    </tr>
    @endforelse
</tbody>
                </table>
            </div>

            <!-- FOOTER TANDA TANGAN KHUSUS PRINT -->
            <div class="print-only">
                <div class="ttd-cetak">
                    <p>Kajoran, <span id="tanggalSurat"></span></p>
                    <p>Admin SPMB</p>
                    <div class="ruang-ttd"></div>
                    <strong>__________________________</strong>
                </div>
            </div>

        </div>
    </div>

    <script>
        // DATA PENDAFTAR — LANGSUNG DARI DATABASE
        // (dikirim controller AdminController::listPendaftar via $pendaftarTerbaru)
        function getStorageData() {
            const dariDatabase = @json($pendaftarTerbaru);

            let dataList = dariDatabase.map((item) => {
                return {
                    id_pendaftar: String(item.id_pendaftar),
                    noReg: item.no_pendaftaran || '-',
                    nama: item.nama_lengkap || '-',
                    sekolah: item.asal_sekolah || '-',
                    nisn: item.nisn || '-',
                    jurusan1: item.jurusan_pilihan_1 || '-',
                    jurusan2: item.jurusan_pilihan_2 || '-',
                    gelombang: item.gelombang || '-',
                    status: item.status_verifikasi || 'menunggu',
                    statusAdmin: item.metode_pembayaran || '-',
                    tglDaftar: item.created_at ? item.created_at.substring(0, 10) : '-'
                };
            });

            //Logika Pengurutan (Sorting) Otomatis
            dataList.sort((a, b) => {
                let regA = a.noReg || '';
                let regB = b.noReg || '';
                return regA.localeCompare(regB, undefined, { numeric: true, sensitivity: 'base' });
            });

            return dataList;
        }

        function toggleCmsMenu() {
            const container = document.getElementById("dropdownCmsContainer");
            const arrow = document.getElementById("arrowCms");
            const btn = document.getElementById("btnCmsDropdown");

            container.classList.toggle("show");
            arrow.classList.toggle("rotate");
            btn.classList.toggle("active");
        }

        // 2. HITUNG KARTU STATISTIK OTOMATIS
        function updateStatistikCards(dataList) {
            let total = dataList.length;
            let verif = 0;
            let proses = 0;
            let diterima = 0;

            dataList.forEach(item => {
                const status = (item.status || '').toLowerCase();
                if (status.includes('diverifikasi') || status.includes('verifikasi')) {
                    verif++;
                } else if (status.includes('diterima') || status.includes('lulus')) {
                    diterima++;
                } else {
                    proses++;
                }
            });

            document.getElementById("stat-total").innerText = total;
            document.getElementById("stat-verif").innerText = verif;
            document.getElementById("stat-proses").innerText = proses;
            document.getElementById("stat-diterima").innerText = diterima;
        }

        // 3. RENDER TABEL DINAMIS
        function renderTable(dataList, isGelombang2 = false) {
            const tbody = document.getElementById('pendaftarTableBody');
            const headerRow = document.getElementById('tableHeaderRow');

            if (isGelombang2) {
                headerRow.innerHTML = `
                    <th style="width: 30px; text-align: center;">No</th>
                    <th>No. Pendaftaran</th>
                    <th>Nama Lengkap</th>
                    <th>Asal Sekolah</th>
                    <th>Jurusan 1</th>
                    <th>Jurusan 2</th>
                    <th>Gelombang</th>
                    <th>Status Verifikasi</th>
                    <th>Status Administrasi (Rp 20.000)</th>
                    <th>Tgl Daftar</th>
                    <th class="col-aksi" style="text-align: center; width: 90px;">Aksi</th>
                `;
            } else {
                headerRow.innerHTML = `
                    <th style="width: 30px; text-align: center;">No</th>
                    <th>No. Pendaftaran</th>
                    <th>Nama Lengkap</th>
                    <th>Asal Sekolah</th>
                    <th>Jurusan 1</th>
                    <th>Jurusan 2</th>
                    <th>Gelombang</th>
                    <th>Status Verifikasi</th>
                    <th>Tgl Daftar</th>
                    <th class="col-aksi" style="text-align: center; width: 90px;">Aksi</th>
                `;
            }

            let rowsHtml = '';
            const totalCol = isGelombang2 ? 11 : 10;

            if (dataList.length === 0) {
                tbody.innerHTML = `<tr><td colspan="${totalCol}" style="text-align: center; color: #888; padding: 25px;">Tidak ada data yang sesuai.</td></tr>`;
                return;
            }

            dataList.forEach((siswa, index) => {
                let badgeClass = "badge-proses";
                let iconClass = "fa-spinner";
                let labelStatus = "Sedang Diproses";

                if (siswa.status === "lengkap") {
                    badgeClass = "badge-verif";
                    iconClass = "fa-file-circle-check";
                    labelStatus = "Terverifikasi";
                } else if (siswa.status === "revisi") {
                    badgeClass = "badge-revisi";
                    iconClass = "fa-pen-to-square";
                    labelStatus = "Perlu Revisi";
                } else if (siswa.status === "kurang" || siswa.status === "ditolak") {
                    badgeClass = "badge-pending";
                    iconClass = "fa-clock";
                    labelStatus = "Belum Lengkap";
                }

                let badgeAdminClass = siswa.statusAdmin === "Lunas" ? "badge-lunas" : "badge-belum";
                let iconAdminClass = siswa.statusAdmin === "Lunas" ? "fa-circle-check" : "fa-circle-xmark";

                let colAdminTd = isGelombang2 ? `
                    <td>
                        <span class="badge ${badgeAdminClass}">
                            <i class="fa-solid ${iconAdminClass}"></i> ${siswa.statusAdmin || 'Belum Lunas'}
                        </span>
                    </td>
                ` : '';

                rowsHtml += `
                    <tr>
                        <td style="text-align: center; color: #777;">${index + 1}</td>
                        <td><span style="font-family: monospace; font-weight: 600; color: #047857;">${siswa.noReg || siswa.noPendaftaran}</span></td>
                        <td><strong>${siswa.nama}</strong><br><small style="color: #777;">NISN: ${siswa.nisn || '-'}</small></td>
                        <td>${siswa.sekolah || siswa.asalSekolah || '-'}</td>
                        <td><span style="font-weight: 600; color: #04352b;">${siswa.jurusan1 || 'PPLG'}</span></td>
                        <td><span style="color: #666;">${siswa.jurusan2 || 'BCF'}</span></td>
                        <td>${siswa.gelombang || 'Gelombang 1'}</td>
                        <td><span class="badge ${badgeClass}"><i class="fa-solid ${iconClass}"></i> ${labelStatus}</span></td>
                        ${colAdminTd}
                        <td>${siswa.tglDaftar || '03 Agu 2026'}</td>
                        <td class="col-aksi">
                            <div class="action-group">
                                <a href="/detail_pendaftar/${siswa.id_pendaftar}" class="btn-action view" title="Lihat Detail">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="/edit_pendaftar/${siswa.id_pendaftar}" class="btn-action edit" title="Edit Data">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button class="btn-action delete" title="Hapus Data" onclick="hapusDataPendaftar('${siswa.id_pendaftar}')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            });

            tbody.innerHTML = rowsHtml;
        }

        // 4. HAPUS DATA DENGAN UPDATE LOCALSTORAGE & RE-RENDER
        function hapusDataPendaftar(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data pendaftar ini?")) {
                let currentData = getStorageData();
                currentData = currentData.filter(item => item.id_pendaftar !== id && item.noReg !== id);
                localStorage.setItem("list_pendaftar", JSON.stringify(currentData));
                
                initPageData();
            }
        }

        // 5. FILTERING
        function filterData() {
            const dataPendaftar = getStorageData();
            const searchVal = document.getElementById('searchInput').value.toLowerCase();
            const filterJurusan = document.getElementById('filterJurusan').value;
            const filterGelombang = document.getElementById('filterGelombang').value;
            const filterStatus = document.getElementById('filterStatus').value;

            const filtered = dataPendaftar.filter(siswa => {
                const noPendaftaran = siswa.noReg || siswa.noPendaftaran || '';
                const asalSekolah = siswa.sekolah || siswa.asalSekolah || '';

                const matchSearch = siswa.nama.toLowerCase().includes(searchVal) || 
                                    asalSekolah.toLowerCase().includes(searchVal) ||
                                    (siswa.nisn && siswa.nisn.toLowerCase().includes(searchVal)) ||
                                    noPendaftaran.toLowerCase().includes(searchVal);

                const matchJurusan = filterJurusan === "" || siswa.jurusan1 === filterJurusan || siswa.jurusan2 === filterJurusan;
                const matchGelombang = filterGelombang === "" || siswa.gelombang === filterGelombang;
                const matchStatus = filterStatus === "" || (siswa.status || '').toLowerCase().includes(filterStatus.toLowerCase());

                return matchSearch && matchJurusan && matchGelombang && matchStatus;
            });

            const isGelombang2 = filterGelombang === "Gelombang 2";
            renderTable(filtered, isGelombang2);
        }

        function resetFilter() {
            document.getElementById('searchInput').value = '';
            document.getElementById('filterJurusan').value = '';
            document.getElementById('filterGelombang').value = '';
            document.getElementById('filterStatus').value = '';
            initPageData();
        }

        function initPageData() {
            const dataList = getStorageData();
            updateStatistikCards(dataList);
            renderTable(dataList, false);
        }

        function cetakLaporan() {
            window.print();
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

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        }

        function logoutSystem() {
            if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
                alert("Anda telah keluar.");
                window.location.href = ('/login');
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            initPageData();

            const tanggal = new Date().toLocaleDateString("id-ID", {
                day: "numeric",
                month: "long",
                year: "numeric"
            });
            const elTanggal = document.getElementById("tanggalSurat");
            if (elTanggal) {
                elTanggal.textContent = tanggal;
            }
        });
    </script>
</body>
</html>