<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PPDB SMK Maarif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          onerror="this.onerror=null;this.href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css';">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .select-periode {
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            color: #04352b;
            background-color: #ffffff;
            outline: none;
            cursor: pointer;
            transition: border-color 0.2s;
        }
        .select-periode:focus {
            border-color: #047857;
        }

        .btn-see-all {
            color: #047857;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 4px 8px;
            border-radius: 4px;
            transition: background 0.2s;
        }
        .btn-see-all:hover {
            background-color: #e6f4ea;
        }
        .panel-body {
            padding: 20px;
        }

        .chart-container {
            position: relative;
            height: 280px;
            width: 100%;
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
        .badge-pending { background-color: #fdecea; color: #c0392b; }
        .badge-revisi { background-color: #fef3c7; color: #b45309; }

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
                padding: 0 16px;
                height: 58px;
            }
            .page-title {
                font-size: 15px;
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
            .panel-body {
                padding: 14px;
            }
            .chart-container {
                height: 220px;
            }
            table {
                font-size: 12px;
            }
            th, td {
                padding: 10px 12px;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            .chart-container {
                height: 200px;
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
                <a href="{{ url('/dashboard_admin') }}" class="active"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                <a href="{{ url('/list_pendaftar') }}"><i class="fa-solid fa-users"></i> Pendaftar</a>
                <a href="{{ url('/verifikasi_berkas') }}"><i class="fa-solid fa-file-circle-check"></i> Verifikasi Berkas</a>
                <a href="{{ url('/seleksi_kelulusan') }}"><i class="fa-solid fa-award"></i> Seleksi Kelulusan</a>

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
                        <a href="{{ url('/pengumuman_admin') }}"><i class="fa-solid fa-bullhorn"></i> Kelola Pengumuman</a>
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
                <div class="page-title">Dashboard Admin</div>
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
                        <div class="number" id="stat-total">{{ $totalPendaftar ?? 0 }}</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #e6f4ea; color: #137333;">
                        <i class="fa-solid fa-file-circle-check"></i>
                    </div>
                    <div class="stat-info">
                        <h4>Berkas Diverifikasi</h4>
                        <div class="number" id="stat-verif">{{ $berkasDiverifikasi ?? 0 }}</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #fef7e0; color: #b06000;">
                        <i class="fa-solid fa-spinner"></i>
                    </div>
                    <div class="stat-info">
                        <h4>Sedang Diproses</h4>
                        <div class="number" id="stat-proses">{{ $sedangDiproses ?? 0 }}</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #e8f0fe; color: #1a73e8;">
                        <i class="fa-solid fa-user-check"></i>
                    </div>
                    <div class="stat-info">
                        <h4>Diterima</h4>
                        <div class="number" id="stat-diterima">{{ $diterima ?? 0 }}</div>
                    </div>
                </div>
            </div>

            <!-- GRAFIK PENDAFTAR PER JURUSAN -->
            <div class="card-panel">
                <div class="panel-header">
                    <span>Grafik Pendaftar Berdasarkan Jurusan</span>
                    <select class="select-periode" id="filterPeriode" onchange="updateChartPeriode()">
                        <option value="semua">Semua Waktu</option>
                        <option value="7hari">7 Hari Terakhir</option>
                        <option value="30hari">30 Hari Terakhir</option>
                        <option value="mingguan">Per Minggu</option>
                        <option value="bulanan">Per Bulan</option>
                    </select>
                </div>
                <div class="panel-body">
                    <div class="chart-container">
                        <canvas id="dashboardChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- PENDAFTAR TERBARU -->
            <div class="card-panel">
                <div class="panel-header">
                    <span>Pendaftar Terbaru</span>
                    <a href="{{ url('/list_pendaftar') }}" class="btn-see-all">
                        Lihat Semua <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 40px; text-align: center;">No</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama Lengkap</th>
                                <th>Asal Sekolah</th>
                                <th>Gelombang</th>
                                <th>Pilihan Jurusan 1</th>
                                <th>Pilihan Jurusan 2</th>
                                <th>Status Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody id="pendaftarTableBody">
                            @forelse (($pendaftarTerbaru ?? []) as $index => $pendaftar)
                            <tr>
                                <td style="text-align: center; color: #777;">{{ $index + 1 }}</td>
                                <td><span style="font-family: monospace; font-weight: 600; color: #047857;">{{ $pendaftar->no_pendaftaran }}</span></td>
                                <td><strong>{{ $pendaftar->nama_lengkap }}</strong></td>
                                <td>{{ $pendaftar->asal_sekolah }}</td>
                                <td>{{ $pendaftar->gelombang }}</td>
                                <td>{{ $pendaftar->jurusan_pilihan_1 }}</td>
                                <td>{{ $pendaftar->jurusan_pilihan_2 }}</td>
                                <td>
                                    @php
                                        $statusRealVerif = $pendaftar->verifikasi->status_verifikasi ?? 'menunggu';
                                        $badgeClass = 'badge-proses'; $iconClass = 'fa-spinner'; $labelStatus = 'Sedang Diproses';
                                        if ($statusRealVerif === 'lengkap') {
                                            $badgeClass = 'badge-verif'; $iconClass = 'fa-file-circle-check'; $labelStatus = 'Terverifikasi';
                                        } elseif ($statusRealVerif === 'revisi') {
                                            $badgeClass = 'badge-revisi'; $iconClass = 'fa-pen-to-square'; $labelStatus = 'Perlu Revisi';
                                        } elseif ($statusRealVerif === 'kurang' || $statusRealVerif === 'ditolak') {
                                            $badgeClass = 'badge-pending'; $iconClass = 'fa-clock'; $labelStatus = 'Belum Lengkap';
                                        }
                                    @endphp
                                    <span class="badge {{ $badgeClass }}"><i class="fa-solid {{ $iconClass }}"></i> {{ $labelStatus }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="8" style="text-align: center; color: #888;">Belum ada pendaftar terbaru.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
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

        // PLUGIN CUSTOM: MENAMPILKAN ANGKA DI ATAS SETIAP BATANG GRAFIK
        const barValueLabelsPlugin = {
            id: 'barValueLabels',
            afterDatasetsDraw(chart) {
                const { ctx } = chart;
                chart.data.datasets.forEach((dataset, i) => {
                    const meta = chart.getDatasetMeta(i);
                    if (meta.hidden) return;
                    meta.data.forEach((bar, index) => {
                        const value = dataset.data[index];
                        ctx.save();
                        ctx.fillStyle = '#04352b';
                        ctx.font = 'bold 12px Segoe UI, Tahoma, Geneva, Verdana, sans-serif';
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';
                        ctx.fillText(value, bar.x, bar.y - 6);
                        ctx.restore();
                    });
                });
            }
        };
        Chart.register(barValueLabelsPlugin);

        let myChart = null;

        const chartJurusanData = @json($chartJurusanCounts ?? ['PPLG' => 0, 'BCF' => 0, 'MPLB' => 0]);

        function loadDashboardData() {
            initChart([
                chartJurusanData.PPLG ?? 0,
                chartJurusanData.BCF ?? 0,
                chartJurusanData.MPLB ?? 0
            ]);
        }

        function initChart(dataJurusan) {
            const ctx = document.getElementById('dashboardChart').getContext('2d');

            if (myChart) {
                myChart.destroy();
            }

            const maxDataValue = Math.max(...dataJurusan, 0);
            const suggestedMax = Math.max(maxDataValue + 1, 4);

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['PPLG', 'BCF', 'MPLB'],
                    datasets: [{
                        label: 'Total Pendaftar',
                        data: dataJurusan,
                        backgroundColor: ['#047857', '#0284c7', '#d97706'],
                        borderRadius: 8,
                        barThickness: 45
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    layout: {
                        padding: { top: 24 }
                    },
                    plugins: {
                        legend: { display: false },
                        tooltip: { mode: 'index', intersect: false }
                    },
                    scales: {
                        x: { grid: { display: false }, ticks: { font: { size: 12, weight: '600' }, color: '#444' } },
                        y: { beginAtZero: true, suggestedMax: suggestedMax, grid: { color: '#f0f0f0' }, ticks: { stepSize: 1, precision: 0, font: { size: 11 }, color: '#888' } }
                    }
                }
            });
        }

        function updateChartPeriode() {
            loadDashboardData();
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
            const isOpen = !sidebar.classList.contains('collapsed');
            setSidebarState(!isOpen);
        }

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

        let wasMobileView = isMobileView();
        setSidebarState(!wasMobileView);

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

        document.querySelectorAll('.menu-nav a').forEach(function(link) {
            link.addEventListener('click', function() {
                if (isMobileView()) {
                    setSidebarState(false);
                }
            });
        });

        window.addEventListener('resize', function() {
            const nowMobileView = isMobileView();
            if (nowMobileView !== wasMobileView) {
                setSidebarState(!nowMobileView);
                wasMobileView = nowMobileView;
            }
        });

        function logoutSystem() {
            if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
                alert("Anda telah keluar.");
                window.location.href = "{{ url('/login') }}";
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            loadDashboardData();
        });
    </script>
</body>
</html>