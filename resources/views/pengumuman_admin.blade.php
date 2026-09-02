<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengumuman — Admin PPDB SMK Maarif</title>
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

        .top-action-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .btn-add-pengumuman {
            background-color: var(--dark);
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.2s;
        }

        .btn-add-pengumuman:hover {
            background-color: var(--accent);
        }

        .table-container {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 13px;
        }

        th {
            background-color: #f1f5f9;
            color: var(--dark);
            padding: 14px 18px;
            font-weight: 600;
            border-bottom: 1px solid var(--line);
        }

        td {
            padding: 14px 18px;
            border-bottom: 1px solid var(--line);
            color: var(--ink);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .badge-status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-status.published {
            background-color: #d1fae5;
            color: #047857;
        }

        .badge-status.draft {
            background-color: #fef3c7;
            color: #d97706;
        }

        .action-btns {
            display: flex;
            gap: 8px;
        }

        .btn-act {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 12px;
            transition: opacity 0.2s;
        }

        .btn-act:hover {
            opacity: 0.8;
        }

        .btn-act.edit {
            background-color: #e0f2fe;
            color: #0284c7;
        }

        .btn-act.delete {
            background-color: #fee2e2;
            color: #dc2626;
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
            width: 520px;
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
        .form-group select, 
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 13px;
            outline: none;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
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

        /* ==================== RESPONSIVE ==================== */
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

            .modal-overlay {
                padding: 16px;
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

            .top-action-bar {
                margin-bottom: 16px;
            }

            .btn-add-pengumuman {
                width: 100%;
                justify-content: center;
            }

            .table-container {
                overflow-x: auto;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px 12px;
                white-space: nowrap;
            }

            .modal-box {
                width: 100%;
                max-width: 420px;
                max-height: 90vh;
                overflow-y: auto;
                padding: 18px;
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

        @media (max-width: 480px) {
            .modal-box {
                border-radius: 10px;
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
                <a href="{{ url('/seleksi_kelulusan') }}"><i class="fa-solid fa-award"></i> Seleksi Kelulusan</a>

                <!-- DROPDOWN MENU CMS & INFORMASI -->
                <div class="menu-dropdown-wrap">
                    <button class="dropdown-btn active" id="btnCmsDropdown" onclick="toggleCmsMenu()">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <i class="fa-solid fa-sliders"></i> CMS & Informasi
                        </div>
                        <i class="fa-solid fa-chevron-down arrow-icon rotate" id="arrowCms"></i>
                    </button>
                    
                    <div class="dropdown-container show" id="dropdownCmsContainer">
                        <a href="{{ url('/kuota') }}"><i class="fa-solid fa-list-check"></i> Kuota Jurusan</a>
                        <a href="{{ url('/pengumuman_admin') }}" class="active"><i class="fa-solid fa-bullhorn"></i> Kelola Pengumuman</a>
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
                <div class="page-title">Kelola Pengumuman PPDB</div>
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
            <div class="top-action-bar">
               <button class="btn-add-pengumuman" onclick="openAddModal()">
                    <i class="fa-solid fa-plus"></i> Tambah Pengumuman
                </button>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px;">NO</th>
                            <th>JUDUL PENGUMUMAN</th>
                            <th>TANGGAL</th>
                            <th>TARGET PESERTA</th>
                            <th>STATUS</th>
                            <th style="width: 100px; text-align: center;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyPengumuman">
                        <!-- Render via JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH/EDIT PENGUMUMAN -->
    <div class="modal-overlay" id="modalPengumuman">
        <div class="modal-box">
            <div class="modal-header">
                <h3 class="modal-title" id="modalTitle">Tambah Pengumuman Baru</h3>
                <button class="btn-close-modal" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="formPengumuman" onsubmit="savePengumuman(event)">
                <input type="hidden" id="editId">
                <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text" id="inputJudul" placeholder="Contoh: Jadwal Tes Gelombang 1" required>
                </div>
                <div class="form-group">
                    <label>Target Peserta</label>
                    <select id="inputTarget">
                        <option value="Semua Calon Siswa">Semua Calon Siswa</option>
                        <option value="PPLG">Khusus PPLG</option>
                        <option value="BCF">Khusus BCF</option>
                        <option value="MPLB">Khusus MPLB</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Isi Pengumuman</label>
                    <textarea id="inputIsi" placeholder="Tuliskan rinci pengumuman di sini..." required></textarea>
                </div>
                <div class="form-group">
                    <label>Status Publikasi</label>
                    <select id="inputStatus">
                        <option value="Dipublikasikan">Dipublikasikan</option>
                        <option value="Draf">Draf (Disimpan)</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-save">Simpan Pengumuman</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Mengambil data awal dari localStorage atau dummy jika belum ada
        function loadInitialData() {
            const saved = localStorage.getItem("data_pengumuman");
            if (saved) {
                return JSON.parse(saved);
            }
            
            const defaultData = [
                {
                    id: 1,
                    judul: "Jadwal Pelaksanaan Tes Wawancara Gelombang 1",
                    tanggal: "06 Aug 2026",
                    target: "Semua Calon Siswa",
                    isi: "Tes wawancara dan minat bakat akan dilaksanakan secara tatap muka pada tanggal 10 Agustus 2026.",
                    status: "Dipublikasikan"
                },
                {
                    id: 2,
                    judul: "Persyaratan Berkas Tambahan Jurusan PPLG",
                    tanggal: "04 Aug 2026",
                    target: "PPLG",
                    isi: "Bagi calon siswa PPLG wajib membawa portofolio project sederhana jika ada.",
                    status: "Dipublikasikan"
                },
                {
                    id: 3,
                    judul: "Draft Pengumuman Daftar Ulang Gelombang 1",
                    tanggal: "01 Aug 2026",
                    target: "Semua Calon Siswa",
                    isi: "Informasi alur pembayaran dan verifikasi ulang siswa diterima.",
                    status: "Draf"
                }
            ];
            
            localStorage.setItem("data_pengumuman", JSON.stringify(defaultData));
            return defaultData;
        }

        let listPengumuman = loadInitialData();

        function renderTable() {
            const tbody = document.getElementById("tbodyPengumuman");
            tbody.innerHTML = "";

            if (listPengumuman.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6" style="text-align:center; color:#888; padding: 20px;">Belum ada pengumuman.</td></tr>`;
                return;
            }

            listPengumuman.forEach((p, idx) => {
                const tr = document.createElement("tr");
                tr.innerHTML = `
                    <td>${idx + 1}</td>
                    <td><strong>${p.judul}</strong></td>
                    <td>${p.tanggal}</td>
                    <td><span style="font-size: 12px; color: var(--ink-soft);">${p.target}</span></td>
                    <td>
                        <span class="badge-status ${p.status === 'Dipublikasikan' ? 'published' : 'draft'}">
                            ${p.status}
                        </span>
                    </td>
                    <td>
                        <div class="action-btns" style="justify-content: center;">
                            <button class="btn-act edit" title="Edit" onclick="openEditModal(${p.id})"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn-act delete" title="Hapus" onclick="deletePengumuman(${p.id})"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function syncToLocalStorage() {
            localStorage.setItem("data_pengumuman", JSON.stringify(listPengumuman));
        }

        function openAddModal() {
            document.getElementById("editId").value = "";
            document.getElementById("modalTitle").innerText = "Tambah Pengumuman Baru";
            document.getElementById("formPengumuman").reset();
            document.getElementById("modalPengumuman").classList.add("show");
        }

        function openEditModal(id) {
            const p = listPengumuman.find(item => item.id === id);
            if(!p) return;

            document.getElementById("editId").value = p.id;
            document.getElementById("modalTitle").innerText = "Edit Pengumuman";
            document.getElementById("inputJudul").value = p.judul;
            document.getElementById("inputTarget").value = p.target;
            document.getElementById("inputIsi").value = p.isi;
            document.getElementById("inputStatus").value = p.status;

            document.getElementById("modalPengumuman").classList.add("show");
        }

        function closeModal() {
            document.getElementById("modalPengumuman").classList.remove("show");
        }

        function savePengumuman(e) {
            e.preventDefault();
            const id = document.getElementById("editId").value;
            const judul = document.getElementById("inputJudul").value;
            const target = document.getElementById("inputTarget").value;
            const isi = document.getElementById("inputIsi").value;
            const status = document.getElementById("inputStatus").value;

            if(id) {
                const item = listPengumuman.find(p => p.id == id);
                if(item) {
                    item.judul = judul;
                    item.target = target;
                    item.isi = isi;
                    item.status = status;
                }
            } else {
                const now = new Date();
                const opt = { day: '2-digit', month: 'short', year: 'numeric' };
                const tglFormatted = now.toLocaleDateString('id-ID', opt);

                const newObj = {
                    id: Date.now(),
                    judul: judul,
                    tanggal: tglFormatted,
                    target: target,
                    isi: isi,
                    status: status
                };
                listPengumuman.unshift(newObj);
            }

            syncToLocalStorage();
            closeModal();
            renderTable();
            alert("Pengumuman berhasil disimpan!");
        }

        function deletePengumuman(id) {
            if(confirm("Apakah Anda yakin ingin menghapus pengumuman ini?")) {
                listPengumuman = listPengumuman.filter(p => p.id !== id);
                syncToLocalStorage();
                renderTable();
                alert("Pengumuman berhasil dihapus!");
            }
        }

        function toggleCmsMenu() {
            const container = document.getElementById("dropdownCmsContainer");
            const arrow = document.getElementById("arrowCms");
            const btn = document.getElementById("btnCmsDropdown");

            container.classList.toggle("show");
            arrow.classList.toggle("rotate");
            btn.classList.toggle("active");
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

        function logoutSystem() {
            if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
                alert("Anda telah keluar.");
                window.location.href = "{{ url('/login') }}";
            }
        }

        document.addEventListener("DOMContentLoaded", renderTable);
    </script>
</body>
</html>