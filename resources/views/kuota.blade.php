<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kuota Jurusan — Admin PPDB SMK Maarif</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
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
            --danger: #dc2626;
            --warning: #d97706;
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

        /* DROPDOWN MENU CMS SIDEBAR */
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

        .dropdown-container a:hover, 
        .dropdown-container a.active {
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
            transition: background 0.2s;
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

        /* PROFILE DROPDOWN TOPBAR */
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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

        /* BODY CONTENT */
        .content-body {
            padding: 30px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background-color: var(--accent-light);
            color: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .stat-info h4 {
            font-size: 12px;
            color: var(--ink-soft);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .stat-info .number {
            font-size: 22px;
            font-weight: 700;
            color: var(--dark);
        }

        /* KARTU JURUSAN GRID */
        .jurusan-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .jurusan-card {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .jurusan-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transform: translateY(-2px);
        }

        .card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .code-badge {
            background: var(--accent-light);
            color: var(--accent);
            font-weight: 700;
            font-size: 14px;
            padding: 6px 12px;
            border-radius: 8px;
            border: 1px solid #a7f3d0;
        }

        .status-badge {
            font-size: 11px;
            font-weight: 600;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .status-badge.open {
            background: #d1fae5;
            color: #047857;
        }

        .status-badge.closed {
            background: #fee2e2;
            color: #dc2626;
        }

        .jurusan-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: var(--ink-soft);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .progress-bar-bg {
            width: 100%;
            height: 8px;
            background: #e2e8f0;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .progress-bar-fill {
            height: 100%;
            background: var(--accent);
            border-radius: 10px;
            transition: width 0.3s ease;
        }

        .btn-edit-kuota {
            width: 100%;
            background: #ffffff;
            color: var(--dark);
            border: 1px solid var(--line);
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
        }

        .btn-edit-kuota:hover {
            background: var(--dark);
            color: #ffffff;
            border-color: var(--dark);
        }

        /* MODAL STYLING */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 200;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-box {
            background: #ffffff;
            width: 420px;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--line);
        }

        .modal-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--dark);
        }

        .btn-close-modal {
            background: none;
            border: none;
            font-size: 18px;
            color: var(--ink-soft);
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 6px;
        }

        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-cancel {
            background: #ffffff;
            border: 1px solid #d1d5db;
            padding: 9px 16px;
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-save {
            background: var(--accent);
            color: white;
            border: none;
            padding: 9px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-save:hover {
            background: var(--dark);
        }

        @media (max-width: 992px) {
            .stats-grid, .jurusan-grid {
                grid-template-columns: 1fr;
            }
        }

        /* ==================== RESPONSIVE MOBILE ==================== */
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
            }

            .stat-info .number {
                font-size: 18px;
            }

            .jurusan-grid {
                gap: 14px;
            }

            .jurusan-card {
                padding: 18px;
            }

            .modal-overlay {
                padding: 16px;
            }

            .modal-box {
                width: 100%;
                max-width: 420px;
            }

            .modal-footer {
                flex-direction: column-reverse;
            }

            .modal-footer .btn-cancel,
            .modal-footer .btn-save {
                width: 100%;
                justify-content: center;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR ADMIN -->
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
                <a href="{{ url('/seleksi_kelulusan') }}"><i class="fa-solid fa-award"></i>Seleksi Kelulusan</a>

                <!-- DROPDOWN MENU CMS & INFORMASI -->
                <div class="menu-dropdown-wrap">
                    <button class="dropdown-btn active" id="btnCmsDropdown" onclick="toggleCmsMenu()">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <i class="fa-solid fa-sliders"></i> CMS & Informasi
                        </div>
                        <i class="fa-solid fa-chevron-down arrow-icon rotate" id="arrowCms"></i>
                    </button>
                    
                    <div class="dropdown-container show" id="dropdownCmsContainer">
                        <a href="{{ url('/kouta') }}" class="active"><i class="fa-solid fa-list-check"></i> Kuota Jurusan</a>
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

    <!-- MAIN CONTENT -->
    <div class="main-content" id="mainContent">
        <div class="top-navbar">
            <div style="display: flex; align-items: center; gap: 12px;">
                <button class="btn-toggle-menu" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
                <div class="page-title">Kelola Kuota Jurusan</div>
            </div>

            <!-- TOPBAR DROPDOWN PROFIL ADMIN -->
            <div class="profile-wrapper">
                <button class="profile-btn" onclick="toggleProfileDropdown(event)">
                    <div class="profile-text">
                        <div class="name">{{ Auth::user()->name }}</div>
                        <div class="role">{{ Auth::user()->role ?? 'Administrator' }}</div>
                    </div>
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
            <!-- RINGKASAN KUOTA TOTAL -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-layer-group"></i></div>
                    <div class="stat-info">
                        <h4>Total Kuota Sekolah</h4>
                        <div class="number" id="totalKapasitas">324 Siswa</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background:#e0f2fe; color:#0284c7;"><i class="fa-solid fa-user-check"></i></div>
                    <div class="stat-info">
                        <h4>Kuota Terisi</h4>
                        <div class="number" id="totalTerisi">180 Siswa</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon" style="background:#fef3c7; color:#d97706;"><i class="fa-solid fa-chart-pie"></i></div>
                    <div class="stat-info">
                        <h4>Sisa Kuota</h4>
                        <div class="number" id="totalSisa">144 Siswa</div>
                    </div>
                </div>
            </div>

            <!-- LIST JURUSAN -->
            <div class="jurusan-grid" id="jurusanContainer">
                <!-- Card Jurusan akan terisi via JS -->
            </div>
        </div>
    </div>

    <!-- MODAL EDIT KUOTA -->
    <div class="modal-overlay" id="modalEdit">
        <div class="modal-box">
            <div class="modal-header">
                <h3 class="modal-title" id="modalJurusanNama">Edit Kuota Jurusan</h3>
                <button class="btn-close-modal" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="formEditKuota" onsubmit="saveKuota(event)">
                <input type="hidden" id="editKodeJurusan">
                <div class="form-group">
                    <label>Kapasitas Maksimal (Siswa)</label>
                    <input type="number" id="editKapasitas" min="1" required>
                </div>
                <div class="form-group">
                    <label>Siswa Terisi (Saat ini)</label>
                    <input type="number" id="editTerisi" min="0" required>
                </div>
                <div class="form-group">
                    <label>Status Pendaftaran</label>
                    <select id="editStatus">
                        <option value="Buka">Buka (Menerima Siswa)</option>
                        <option value="Tutup">Tutup (Kuota Penuh / Ditutup)</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-save">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Data Kuota Jurusan — LANGSUNG DARI DATABASE BACKEND
        let dataKuota = @json($jurusan);

        function renderKuota() {
            const container = document.getElementById("jurusanContainer");
            container.innerHTML = "";

            let grandTotalKapasitas = 0;
            let grandTotalTerisi = 0;

            dataKuota.forEach(j => {
                grandTotalKapasitas += j.kapasitas;
                grandTotalTerisi += j.terisi;

                const persen = Math.round((j.terisi / j.kapasitas) * 100);
                const sisa = j.kapasitas - j.terisi;

                const cardHtml = `
                    <div class="jurusan-card">
                        <div>
                            <div class="card-header">
                                <span class="code-badge">${j.kode}</span>
                                <span class="status-badge ${j.status === 'Buka' ? 'open' : 'closed'}">
                                    <i class="fa-solid ${j.status === 'Buka' ? 'fa-door-open' : 'fa-lock'}"></i> Pendaftaran ${j.status}
                                </span>
                            </div>
                            <h3 class="jurusan-title">${j.nama}</h3>
                            <div class="progress-info">
                                <span>Terisi: <strong>${j.terisi} / ${j.kapasitas}</strong></span>
                                <span>${persen}%</span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-bar-fill" style="width: ${persen}%;"></div>
                            </div>
                            <p style="font-size: 12px; color: var(--ink-soft); margin-bottom: 18px;">
                                Sisa Kuota Tersedia: <strong style="color: var(--dark);">${sisa} Kursi</strong>
                            </p>
                        </div>
                        <button class="btn-edit-kuota" onclick="openModal('${j.kode}')">
                            <i class="fa-solid fa-pen-to-square"></i> Edit Kuota Jurusan
                        </button>
                    </div>
                `;
                container.innerHTML += cardHtml;
            });

            document.getElementById("totalKapasitas").innerText = `${grandTotalKapasitas} Siswa`;
            document.getElementById("totalTerisi").innerText = `${grandTotalTerisi} Siswa`;
            document.getElementById("totalSisa").innerText = `${grandTotalKapasitas - grandTotalTerisi} Siswa`;
        }

        function openModal(kode) {
            const item = dataKuota.find(j => j.kode === kode);
            if (!item) return;

            document.getElementById("editKodeJurusan").value = item.kode;
            document.getElementById("modalJurusanNama").innerText = `Edit Kuota (${item.kode})`;
            document.getElementById("editKapasitas").value = item.kapasitas;
            document.getElementById("editTerisi").value = item.terisi;
            document.getElementById("editStatus").value = item.status;

            document.getElementById("modalEdit").classList.add("show");
        }

        function closeModal() {
            document.getElementById("modalEdit").classList.remove("show");
        }

        function saveKuota(e) {
            e.preventDefault();
            const kode = document.getElementById("editKodeJurusan").value;
            const kap = parseInt(document.getElementById("editKapasitas").value);
            const isi = parseInt(document.getElementById("editTerisi").value);
            const st = document.getElementById("editStatus").value;

            if (isi > kap) {
                alert("Jumlah terisi tidak boleh melebihi kapasitas!");
                return;
            }

            const item = dataKuota.find(j => j.kode === kode);
            if (item) {
                item.kapasitas = kap;
                item.terisi = isi;
                item.status = st;
            }

            closeModal();
            renderKuota();
            alert("Data kuota jurusan berhasil diperbarui!");
        }

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

        window.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profileDropdown');
            if (dropdown && dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }

            // Penanganan tutup sidebar otomatis khusus mobile saat klik di luar area
            if (!isMobileView()) return;
            if (sidebar.classList.contains('collapsed')) return;

            const toggleBtn = document.querySelector('.btn-toggle-menu');
            const clickedInsideSidebar = sidebar.contains(event.target);
            const clickedToggleBtn = toggleBtn && toggleBtn.contains(event.target);

            if (!clickedInsideSidebar && !clickedToggleBtn) {
                setSidebarState(false);
            }
        });

        function logoutSystem() {
            if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
                alert("Anda telah keluar.");
                window.location.href = "{{ url('/login') }}";
            }
        }

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

        // Atur kondisi awal sidebar berdasarkan ukuran layar
        setSidebarState(!isMobileView());

        // Sesuaikan ulang saat layar di-resize
        window.addEventListener('resize', function() {
            if (!isMobileView() && document.body.classList.contains('sidebar-mobile-open')) {
                document.body.classList.remove('sidebar-mobile-open');
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            renderKuota();
        });
    </script>
</body>
</html>