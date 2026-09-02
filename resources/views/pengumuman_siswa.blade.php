<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - PPDB SMK Maarif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        /* WELCOME BANNER */
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
            font-size: 18px;
            margin-bottom: 4px;
        }
        .welcome-text p {
            font-size: 12px;
            color: #ecfdf5;
        }
        .badge-update {
            background-color: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        /* CARD TABEL PENGUMUMAN */
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

        /* TABEL PENGUMUMAN */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        .announcement-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        .announcement-table th {
            font-size: 12px;
            font-weight: 600;
            color: #4b5563;
            padding: 12px 14px;
            border-bottom: 1px solid #e5e7eb;
            background-color: #f9fafb;
        }
        .announcement-table td {
            padding: 16px 14px;
            border-bottom: 1px solid #f3f4f6;
            font-size: 13px;
            vertical-align: middle;
        }
        .announcement-table tr:hover {
            background-color: #fbfbfb;
        }

        .row-num {
            text-align: center;
            font-weight: 600;
            color: #6b7280;
            width: 50px;
        }

        /* ITEM TITLE & ICON */
        .item-flex {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }
        .item-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: #e6f4ea;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 14px;
        }
        .item-text .title {
            font-weight: 600;
            color: #111827;
            font-size: 13px;
            line-height: 1.3;
        }
        .item-text .desc {
            font-size: 11px;
            color: #6b7280;
            margin-top: 3px;
            line-height: 1.4;
        }

        /* DATE & BADGES */
        .date-cell {
            font-size: 11px;
            color: #6b7280;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-align: center;
        }
        .badge-pengumuman {
            background-color: #e6f4ea;
            color: #047857;
        }

        /* BUTTON DETAIL */
        .btn-detail {
            background: #ffffff;
            border: 1px solid #d1d5db;
            color: #374151;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
        }
        .btn-detail:hover {
            border-color: #047857;
            color: #047857;
            background-color: #f0fdf4;
        }

        /* MODAL STYLING */
        .modal-backdrop {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(2, 44, 34, 0.4);
            align-items: center;
            justify-content: center;
            padding: 20px;
            z-index: 1000;
        }
        .modal-backdrop.active {
            display: flex;
        }
        .modal-card {
            background: #ffffff;
            border-radius: 12px;
            width: 100%;
            max-width: 520px;
            padding: 24px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            border-bottom: 1px solid #f3f4f6;
            padding-bottom: 12px;
        }
        .modal-header h3 {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
            line-height: 1.3;
        }
        .btn-close-modal {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: #9ca3af;
        }
        .btn-close-modal:hover {
            color: #111827;
        }
        .modal-body {
            font-size: 13px;
            color: #4b5563;
            line-height: 1.6;
            white-space: pre-line;
        }

        /* ==========================================================================
           RESPONSIVE — TABLET & MOBILE (tidak mengubah struktur, hanya tampilan)
           ========================================================================== */
        @media (max-width: 992px) {
            .sidebar {
                left: -260px;
            }
            .sidebar.collapsed {
                left: 0;
                box-shadow: 0 0 40px rgba(0,0,0,0.35);
            }
            .main-content,
            .main-content.expanded {
                margin-left: 0;
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .top-navbar {
                padding: 0 16px;
                height: 60px;
            }
            .page-title { font-size: 15px; }
            .profile-text { display: none; }
            .profile-btn { gap: 8px; padding: 4px; }
            .profile-dropdown { width: 150px; }

            .content-body { padding: 15px; }

            .welcome-banner {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
                padding: 20px;
            }
            .badge-update { align-self: flex-start; }

            .card { padding: 18px; }

            .announcement-table { min-width: 640px; }
            .announcement-table th,
            .announcement-table td { padding: 10px 12px; font-size: 12.5px; }

            .modal-card {
                width: 92%;
                padding: 18px;
            }
        }

        @media (max-width: 480px) {
            .sidebar { width: 240px; left: -240px; }
            .sidebar.collapsed { left: 0; }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR NAVIGASI SISWA -->
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
                <a href="{{ url('/dashboard_siswa') }}"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
                <a href="{{ url('/biodata_siswa') }}"><i class="fa-solid fa-user-gear"></i> Profil Pendaftar</a>
                <a href="{{ url('/berkas_pendaftaran') }}"><i class="fa-solid fa-file-lines"></i> Berkas Pendaftaran</a>
                <a href="{{ url('/cetak_kartu') }}"><i class="fa-solid fa-address-card"></i> Cetak Kartu</a>
                <a href="{{ url('/pengumuman_siswa') }}" class="active"><i class="fa-solid fa-bullhorn"></i> Pengumuman</a>
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

    <!-- MAIN CONTENT AREA -->
    <div class="main-content" id="mainContent">

        <!-- TOPBAR HEADER -->
        <div class="top-navbar">
            <div style="display: flex; align-items: center; gap: 12px;">
                <button class="btn-toggle-menu" onclick="toggleSidebar()" title="Toggle Sidebar Menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="page-title">Pengumuman</div>
            </div>

            <!-- PROFILE TOPBAR -->
            <div class="profile-wrapper">
                <button class="profile-btn" onclick="toggleProfileDropdown(event)">
                    <div class="profile-text">
                        <div class="name" id="namaSiswaDisplay">{{ $pendaftar->nama_lengkap ?? 'Calon Siswa' }}</div>
                        <div class="nisn" id="nisnSiswaDisplay">NISN: {{ $pendaftar->nisn ?? '-' }}</div>
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

            <!-- WELCOME BANNER -->
            <div class="welcome-banner">
                <div class="welcome-text">
                    <h2>Hai, <span id="bannerNamaSiswa">{{ $pendaftar->nama_lengkap ?? 'Calon Siswa' }}</span>! 👋</h2>
                    <p>Berikut adalah informasi dan pengumuman terbaru resmi dari panitia SPMB.</p>
                </div>
                <div class="badge-update">
                    <i class="fa-solid fa-clock"></i> Terakhir diperbarui: Hari ini
                </div>
            </div>

            <!-- CARD DAFTAR PENGUMUMAN -->
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <i class="fa-solid fa-bullhorn"></i> Daftar Pengumuman
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="announcement-table">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th>Judul Pengumuman</th>
                                <th>Tanggal</th>
                                <th>Target Peserta</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="announcementTableBody">
                            <!-- Render otomatis dari JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- MODAL DETAIL PENGUMUMAN -->
    <div class="modal-backdrop" id="modalDetail">
        <div class="modal-card">
            <div class="modal-header">
                <h3 id="modalTitle">Judul Pengumuman</h3>
                <button class="btn-close-modal" id="btnCloseModal"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="modal-body" id="modalBody">
                Detail isi pengumuman akan tampil di sini...
            </div>
        </div>
    </div>

    <!-- SCRIPT LOGIK & DATA PENGUMUMAN DINAMIS -->
    <script>
        /* 1. RENDER TABEL PENGUMUMAN DENGAN FILTER JURUSAN & STATUS */
        function renderTable() {
            const tbody = document.getElementById('announcementTableBody');
            
            // Ambil data pengumuman dari localStorage
            const storedData = localStorage.getItem("data_pengumuman");
            let announcements = storedData ? JSON.parse(storedData) : [];

            // Ambil data pilihan jurusan siswa dari localStorage formulir
            const dataFormulir = JSON.parse(localStorage.getItem("data_pendaftaran")) || {};
            const jurusanSiswa = dataFormulir.jurusanPilihan || dataFormulir.jurusan || [];

            // Filter pengumuman berdasarkan status "Dipublikasikan" DAN Target Jurusan
            const publicAnnouncements = announcements.filter(item => {
                if (item.status !== "Dipublikasikan") return false;

                // Jika pengumuman ditujukan untuk semua calon siswa, selalu tampilkan
                if (item.target === "Semua Calon Siswa") return true;

                // Jika target spesifik, cek apakah cocok dengan jurusan pilihan siswa
                if (Array.isArray(jurusanSiswa)) {
                    return jurusanSiswa.includes(item.target);
                } else {
                    return jurusanSiswa === item.target;
                }
            });

            if (publicAnnouncements.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 25px; color: #888;">
                            Belum ada pengumuman resmi yang sesuai dengan jurusan pilihanmu.
                        </td>
                    </tr>
                `;
                return;
            }

            tbody.innerHTML = publicAnnouncements.map((item, index) => {
                const shortDesc = item.isi.length > 70 ? item.isi.substring(0, 70) + "..." : item.isi;
                return `
                    <tr>
                        <td class="row-num">${index + 1}</td>
                        <td>
                            <div class="item-flex">
                                <div class="item-icon">
                                    <i class="fa-solid fa-bullhorn"></i>
                                </div>
                                <div class="item-text">
                                    <div class="title">${item.judul}</div>
                                    <div class="desc">${shortDesc}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="date-cell">
                                <i class="fa-regular fa-calendar"></i>
                                <span>${item.tanggal}</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-pengumuman">${item.target}</span>
                        </td>
                        <td style="text-align: center;">
                            <button class="btn-detail" onclick="openModal(${item.id})">Lihat Detail</button>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        /* 2. AVATAR FOTO (nama & NISN sudah benar dari server, tidak perlu ditimpa lagi) */
        function loadProfileData() {
            const pasFoto = localStorage.getItem("pas_foto_siswa");

            const elAvatar = document.getElementById("avatarDisplay");
            if (pasFoto && elAvatar) {
                elAvatar.innerHTML = `<img src="${pasFoto}" alt="Avatar">`;
            } else if (elAvatar) {
                elAvatar.innerHTML = `<i class="fa-solid fa-user"></i>`;
            }
        }

        /* 3. TOGGLE SIDEBAR NAVIGASI */
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
            if (!sidebar.classList.contains('collapsed')) return;

            const toggleBtn = document.querySelector('.btn-toggle-menu');
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

        /* 5. MODAL DETAIL PENGUMUMAN */
        const modalDetail = document.getElementById('modalDetail');
        const btnCloseModal = document.getElementById('btnCloseModal');

        function openModal(id) {
            const storedData = localStorage.getItem("data_pengumuman");
            const announcements = storedData ? JSON.parse(storedData) : [];
            const item = announcements.find(p => p.id == id);
            
            if (item) {
                document.getElementById('modalTitle').textContent = item.judul;
                document.getElementById('modalBody').textContent = item.isi;
                modalDetail.classList.add('active');
            }
        }

        btnCloseModal.addEventListener('click', () => {
            modalDetail.classList.remove('active');
        });

        modalDetail.addEventListener('click', (e) => {
            if (e.target === modalDetail) {
                modalDetail.classList.remove('active');
            }
        });

        /* 6. HUBUNGI ADMIN VIA WHATSAPP */
        function hubungiAdminWA() {
            const elemNama = document.getElementById('namaSiswaDisplay');
            const namaSiswa = elemNama ? elemNama.innerText.trim() : "Calon Siswa";
            const noAdmin = "622933195678";
            const teksPesan = `Halo Admin SPMB SMK Ma'arif Walisongo Kajoran, nama saya *${namaSiswa}*. Saya mau bertanya/mengajukan kendala terkait pengumuman pendaftaran. Mohon bantuannya, terima kasih!`;
            const urlWA = `https://wa.me/${noAdmin}?text=${encodeURIComponent(teksPesan)}`;
            window.open(urlWA, '_blank');
        }

        /* 7. LOGOUT SYSTEM */
        function logoutSystem() {
            if (confirm("Apakah Anda yakin ingin keluar dari sistem?")) {
                fetch("{{ url('/logout') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    }
                }).finally(() => {
                    localStorage.removeItem("session_user");
                    window.location.href = "{{ url('/login') }}";
                });
            }
        }

        /* INITIALIZATION */
        window.addEventListener("DOMContentLoaded", () => {
            loadProfileData();
            renderTable();
        });
    </script>
</body>
</html>