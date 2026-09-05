<!DOCTYPE html>
<html lang="id">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verifikasi Berkas — Admin SPMB SMK Ma'arif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    --dark: #022c22;
    --accent: #047857;
    --accent-2: #02403f;
    --accent-light: #e6f4ea;
    --bg: #f8f9fa;
    --card: #ffffff;
    --ink: #333333;
    --ink-soft: #64748b;
    --line: #e2e8f0;
    --danger: #dc2626;
    --danger-light: #fee2e2;
    --warning: #d97706;
    --warning-light: #fef3c7;
    --success: #16a34a;
    --success-light: #dcfce7;
    --sidebar-w: 260px;
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
  }

  body {
    background: var(--bg);
    color: var(--ink);
    display: flex;
    overflow-x: hidden;
  }

  /* ---------- SIDEBAR NAVIGASI ADMIN ---------- */
  .sidebar {
    width: var(--sidebar-w);
    background-color: var(--dark);
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

  .admin-tag {
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

  .menu-nav a:hover,
  .menu-nav a.active {
    background-color: rgba(255, 255, 255, 0.15);
    font-weight: 600;
  }

  /* DROPDOWN MENU SIDEBAR */
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
    padding-left: 18px;
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
    gap: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.12);
    padding-top: 12px;
  }

  .admin-profile-card {
    background-color: rgba(255, 255, 255, 0.08);
    border-radius: 10px;
    padding: 10px 12px;
    display: flex;
    align-items: center;
    gap: 10px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    text-decoration: none;
    cursor: pointer;
  }

  .admin-profile-card:hover {
    background-color: rgba(255, 255, 255, 0.14);
  }

  .admin-avatar-ico {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #a0a0a0;
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
  }

  .admin-info .name {
    font-size: 12px;
    font-weight: 700;
    color: #ffffff;
  }

  .admin-info .role {
    font-size: 10px;
    color: #a0c4be;
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

  /* ---------- MAIN CONTENT ---------- */
  .main {
    margin-left: 260px;
    width: calc(100% - 260px);
    min-height: 100vh;
    padding: 0 30px 60px;
    transition: all 0.3s ease;
  }

  .main.expanded {
    margin-left: 0;
    width: 100%;
  }

  .topbar {
    background-color: #ffffff;
    height: 65px;
    margin: 0 -30px 25px -30px;
    padding: 0 30px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--line);
    position: sticky;
    top: 0;
    z-index: 90;
  }

  .topbar-left {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .menu-toggle {
    background: transparent;
    border: none;
    font-size: 18px;
    color: var(--dark);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 8px 10px;
    border-radius: 6px;
    transition: background 0.2s;
  }

  .menu-toggle:hover {
    background-color: #f0f0f0;
  }

  .page-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark);
    margin: 0;
  }

  .user-chip-wrap {
    position: relative;
  }

  .user-chip {
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

  .user-chip:hover {
    background-color: #f0f0f0;
  }

  .user-name {
    font-size: 13px;
    font-weight: 700;
    text-align: right;
    color: #333;
    line-height: 1.2;
  }

  .user-role {
    font-size: 11px;
    color: #666;
    text-align: right;
  }

  .avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: var(--dark);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 16px;
  }

  .user-dropdown {
    position: absolute;
    right: 0;
    top: 50px;
    background: #ffffff;
    border: 1px solid var(--line);
    border-radius: 8px;
    width: 170px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    display: none;
    flex-direction: column;
    overflow: hidden;
    z-index: 100;
  }

  .user-dropdown.open {
    display: flex;
  }

  .user-dropdown a,
  .user-dropdown button {
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

  .user-dropdown a:hover,
  .user-dropdown button:hover {
    background-color: #f5f5f5;
  }

  .user-dropdown .logout-item {
    color: #d9534f;
    border-top: 1px solid #eeeeee;
  }

  /* STATS CARDS */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
    gap: 16px;
    margin-bottom: 25px;
  }

  .stat-card {
    background: white;
    border: 1px solid var(--line);
    border-radius: 10px;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .stat-icon {
    width: 44px;
    height: 44px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
  }

  .stat-icon.pending { background: var(--danger-light); color: var(--danger); }
  .stat-icon.process { background: var(--warning-light); color: var(--warning); }
  .stat-icon.verified { background: var(--success-light); color: var(--success); }

  .stat-info .num { font-size: 20px; font-weight: 700; color: var(--dark); }
  .stat-info .txt { font-size: 12px; color: var(--ink-soft); }

  /* SECTION TABLE */
  .section-card {
    background: white;
    border: 1px solid var(--line);
    border-radius: 12px;
    padding: 20px;
  }

  .table-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
  }

  .search-box {
    position: relative;
    width: 280px;
  }

  .search-box input {
    width: 100%;
    padding: 8px 12px 8px 36px;
    border: 1px solid var(--line);
    border-radius: 6px;
    font-size: 12.5px;
    outline: none;
  }

  .search-box i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--ink-soft);
    font-size: 13px;
  }

  .table-responsive {
    width: 100%;
    overflow-x: auto;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
    text-align: left;
  }

  th {
    background: #f8fafc;
    color: var(--ink-soft);
    padding: 12px 16px;
    font-weight: 600;
    border-bottom: 1px solid var(--line);
    white-space: nowrap;
  }

  td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--line);
    vertical-align: middle;
  }

  td.text-nowrap {
    white-space: nowrap;
  }

  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
  }

  .status-badge.pending { background: var(--danger-light); color: var(--danger); }
  .status-badge.process { background: var(--warning-light); color: var(--warning); }
  .status-badge.verified { background: var(--success-light); color: var(--success); }

  .action-group {
    display: flex;
    gap: 6px;
  }

  .btn-action {
    border: none;
    padding: 7px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: all 0.2s;
  }

  .btn-check {
    background: var(--accent);
    color: white;
  }
  .btn-check:hover { background: var(--dark); }

  .btn-view-docs {
    background: #e0f2fe;
    color: #0284c7;
    border: 1px solid #bae6fd;
  }
  .btn-view-docs:hover {
    background: #0284c7;
    color: white;
  }

  /* MODAL DETAIL VERIFIKASI BERKAS */
  .modal-overlay {
    position: fixed;
    top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0,0,0,0.5);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 200;
    padding: 20px;
  }

  .modal-overlay.open { display: flex; }

  .modal-content {
    background: white;
    width: 100%;
    max-width: 900px;
    max-height: 90vh;
    border-radius: 12px;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
  }

  .modal-header {
    padding: 16px 24px;
    border-bottom: 1px solid var(--line);
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f8fafc;
  }

  .modal-header h3 { font-size: 16px; color: var(--dark); }

  .btn-close {
    background: none;
    border: none;
    font-size: 18px;
    color: var(--ink-soft);
    cursor: pointer;
  }

  .modal-body {
    padding: 24px;
    overflow-y: auto;
    display: flex;
    flex-direction: column;
    gap: 20px;
  }

  .doc-grid {
    display: grid;
    grid-template-columns: repeat( auto-fit, minmax(260px, 1fr) );
    gap: 16px;
  }

  .doc-card {
    border: 1px solid var(--line);
    border-radius: 8px;
    padding: 14px;
    background: #fafafa;
  }

  .doc-title {
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .doc-preview {
    width: 100%;
    height: 150px;
    background: #eee;
    border-radius: 6px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin-bottom: 12px;
    border: 1px dashed #ccc;
    color: #888;
    gap: 6px;
  }

  .doc-status-select {
    width: 100%;
    padding: 8px;
    font-size: 12px;
    border-radius: 6px;
    border: 1px solid var(--line);
    outline: none;
  }

  .revision-note-area {
    margin-top: 10px;
  }

  .revision-note-area label {
    display: block;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 6px;
    color: var(--danger);
  }

  .revision-note-area textarea {
    width: 100%;
    height: 80px;
    padding: 10px;
    font-size: 12.5px;
    border: 1px solid var(--line);
    border-radius: 6px;
    outline: none;
    resize: none;
  }

  .modal-footer {
    padding: 16px 24px;
    border-top: 1px solid var(--line);
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    background: #f8fafc;
  }

  .btn-secondary {
    background: #e2e8f0;
    color: #333;
    border: none;
    padding: 9px 18px;
    border-radius: 6px;
    font-size: 12.5px;
    font-weight: 600;
    cursor: pointer;
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
    z-index: 300;
    opacity: 0;
    transform: translateY(-10px);
    transition: all .25s ease;
    pointer-events: none;
  }

  .toast.show { opacity: 1; transform: translateY(0); }

  /* ==================== RESPONSIVE ==================== */

  /* TABLET / LAYAR SEDANG */
  @media (max-width: 992px) {
    .stats-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  /* MOBILE: SIDEBAR JADI OVERLAY, LAYOUT MENYESUAIKAN */
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

    .main,
    .main.expanded {
      margin-left: 0;
      width: 100%;
      padding: 0 15px 40px;
    }

    .topbar {
      margin: 0 -15px 20px -15px;
      padding: 0 15px;
      height: 58px;
    }

    .page-title {
      font-size: 15px;
    }

    /* Sembunyikan teks nama/role profil di topbar mobile, sisakan avatar + panah */
    .user-name,
    .user-role {
      display: none;
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
    }

    .stat-info .num { font-size: 17px; }
    .stat-info .txt { font-size: 11px; }

    .section-card {
      padding: 14px;
    }

    .table-header {
      flex-direction: column;
      align-items: stretch;
    }

    .search-box {
      width: 100%;
    }

    table {
      font-size: 12px;
    }

    th, td {
      padding: 10px 12px;
    }

    .action-group {
      flex-wrap: wrap;
    }

    .btn-action {
      padding: 7px 10px;
      font-size: 11.5px;
    }

    .doc-grid { grid-template-columns: 1fr; }

    .modal-body {
      padding: 16px;
    }

    .modal-header {
      padding: 14px 16px;
    }

    .modal-footer {
      padding: 14px 16px;
      flex-direction: column-reverse;
    }

    .modal-footer .btn-secondary,
    .modal-footer .btn-check {
      width: 100%;
      justify-content: center;
    }
  }

  /* LAYAR SANGAT KECIL (HP KECIL) */
  @media (max-width: 480px) {
    .stats-grid {
      grid-template-columns: 1fr;
    }

    .school-title h1 {
      font-size: 11px;
    }
  }
</style>
</head>
<body>

  <!-- SIDEBAR NAVIGASI ADMIN -->
  <aside class="sidebar" id="sidebar">
    <div>
      <div class="sidebar-header">
        <img src="{{ asset('img/logo.smk.png') }}" alt="Logo SMK" class="logo-sekolah-img" onerror="this.src='https://via.placeholder.com/42';">
        <div class="school-title">
          <h1>SMK MAARIF WALISONGO KAJORAN</h1>
          <h2>SPMB 2027/2028</h2>
          <span class="admin-tag">Admin Panel</span>
        </div>
      </div>

      <div class="menu-nav">
        <a href="{{ url('/dashboard_admin') }}"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
        <a href="{{ url('/list_pendaftar') }}"><i class="fa-solid fa-users"></i> Pendaftar</a>
        <a href="{{ url('/verifikasi_berkas') }}" class="active"><i class="fa-solid fa-file-circle-check"></i> Verifikasi Berkas</a>
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
            <a href="{{ url('/kouta') }}"><i class="fa-solid fa-list-check"></i> Kuota Jurusan</a>
            <a href="{{ url('/pengumuman_admin') }}"><i class="fa-solid fa-bullhorn"></i> Pengumuman</a>
            <a href="{{ url('/cms_landing') }}"><i class="fa-solid fa-window-restore"></i> Pengaturan Landing Page</a>
          </div>
        </div>
      </div>
    </div>

    <div>
      <div class="sidebar-bottom">
        <a href="{{ url('/profil_admin') }}" class="admin-profile-card">
          <div class="admin-avatar-ico"><i class="fa-solid fa-user"></i></div>
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
  </aside>

  <!-- MAIN CONTENT AREA -->
  <main class="main" id="mainContent">
    <div class="topbar">
      <div class="topbar-left">
        <button class="menu-toggle" id="menuToggle"><i class="fa-solid fa-bars"></i></button>
        <h1 class="page-title">Verifikasi Berkas Siswa</h1>
      </div>

      <div class="user-chip-wrap">
        <button class="user-chip" id="userChipBtn" type="button">
          <div>
            <div class="user-name">{{ Auth::user()->name }}</div>
            <div class="user-role">{{ Auth::user()->role ?? 'Administrator' }}</div>
          </div>
          <div class="avatar"><i class="fa-solid fa-user"></i></div>
          <i class="fa-solid fa-chevron-down" style="font-size: 11px; color: #888;"></i>
        </button>

        <div class="user-dropdown" id="userDropdown">
          <a href="{{ url('/profil_admin') }}"><i class="fa-solid fa-user"></i> Profil Admin</a>
          <button class="logout-item" type="button" onclick="logoutSystem()"><i class="fa-solid fa-right-from-bracket"></i> Keluar</button>
        </div>
      </div>
    </div>

    <!-- CARDS STATISTIK -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon pending"><i class="fa-solid fa-clock"></i></div>
        <div class="stat-info">
          <div class="num" id="stat-pending">0</div>
          <div class="txt">Pending / Belum Lengkap</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon process"><i class="fa-solid fa-spinner"></i></div>
        <div class="stat-info">
          <div class="num" id="stat-process">0</div>
          <div class="txt">Sedang Diverifikasi</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon verified"><i class="fa-solid fa-circle-check"></i></div>
        <div class="stat-info">
          <div class="num" id="stat-verified">0</div>
          <div class="txt">Terverifikasi</div>
        </div>
      </div>
    </div>

    <!-- TABEL VERIFIKASI -->
    <div class="section-card">
      <div class="table-header">
        <h3 style="font-size: 15px;">Daftar Berkas Masuk</h3>
        <div class="search-box">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" id="searchInput" placeholder="Cari NISN / Nama Siswa..." onkeyup="filterTable()">
        </div>
      </div>

      <div class="table-responsive">
        <table>
          <thead>
            <tr>
              <th style="width: 50px; text-align: center">No.</th>
              <th>No. Pendaftaran</th>
              <th>Nama Siswa</th>
              <th>NISN</th>
              <th>Asal Sekolah</th>
              <th>Status Berkas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="verifikasiTableBody">
            @foreach($pendaftar as $index => $p)
            <tr>
              <td style="text-align: center; color: #666; font-weight: 600;">{{ $index + 1 }}</td>
              <td class="text-nowrap"><strong>{{ $p->no_pendaftaran }}</strong></td>
              <td><strong>{{ $p->nama_lengkap }}</strong></td>
              <td>{{ $p->nisn }}</td>
              <td>{{ $p->asal_sekolah }}</td>
              <td>
                <span class="status-badge" id="badge-{{ $p->id_pendaftar }}">{{ $p->status_verifikasi }}</span>
              </td>
              <td>
                <div class="action-group">
                  <button class="btn-action btn-view-docs" onclick="openModal('{{ $p->id_pendaftar }}', false)"><i class="fa-solid fa-folder-open"></i> Lihat</button>
                  <button class="btn-action btn-check" onclick="openModal('{{ $p->id_pendaftar }}', true)"><i class="fa-solid fa-magnifying-glass-plus"></i> Verifikasi</button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <!-- MODAL DETAIL / VERIFIKASI BERKAS SISWA -->
  <div class="modal-overlay" id="modalVerifikasi">
    <div class="modal-content">
      <div class="modal-header">
        <h3 id="modalTitle">Periksa Berkas — Calon Siswa</h3>
        <button class="btn-close" onclick="closeModal()"><i class="fa-solid fa-xmark"></i></button>
      </div>

      <div class="modal-body">
        <p style="font-size: 12.5px; color: var(--ink-soft);" id="modalDesc">
          Daftar berkas yang diunggah oleh calon siswa. Silakan pilih status verifikasi pada tiap berkas.
        </p>

        <div class="doc-grid" id="docGridContainer">
          <!-- ELEMEN DOKUMEN RENDERING DINAMIS -->
        </div>

        <!-- FORM CATATAN REVISI / CATATAN VERIFIKASI -->
        <div class="revision-note-area" id="revisionArea">
          <label><i class="fa-solid fa-comment-dots"></i> Catatan Verifikasi / Catatan Revisi</label>
          <textarea id="catatanRevisi" placeholder="Contoh: Foto KK kurang jelas, mohon upload ulang versi asli..."></textarea>
        </div>
      </div>

      <!-- FOOTER MODAL -->
      <div class="modal-footer" id="modalFooter">
        <button class="btn-secondary" onclick="closeModal()">Batal</button>
        <button class="btn-action btn-check" onclick="terapkanAksiVerifikasi()"><i class="fa-solid fa-check-double"></i> Terapkan Aksi</button>
      </div>
    </div>
  </div>

  <div class="toast" id="toast">
    <i class="fa-solid fa-circle-check" style="color: #a7f3d0;"></i>
    <span id="toastMsg">Hasil verifikasi berhasil disimpan!</span>
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

  let dataVerifikasi = [];
  let currentActiveId = null;

  const sidebar = document.getElementById("sidebar");
  const mainContent = document.getElementById("mainContent");

  /* PERILAKU SIDEBAR RESPONSIVE: DESKTOP MENDORONG KONTEN, MOBILE OVERLAY */
  const MOBILE_BREAKPOINT = 768;

  function isMobileView() {
    return window.innerWidth <= MOBILE_BREAKPOINT;
  }

  function setSidebarState(open) {
    sidebar.classList.toggle("collapsed", !open);
    mainContent.classList.toggle("expanded", !open);
    if (isMobileView()) {
      document.body.classList.toggle("sidebar-mobile-open", open);
    } else {
      document.body.classList.remove("sidebar-mobile-open");
    }
  }

  document.getElementById("menuToggle").addEventListener("click", () => {
    const isOpen = !sidebar.classList.contains("collapsed");
    setSidebarState(!isOpen);
  });

  // Di mobile, sidebar tertutup secara default agar tidak menutupi konten
  setSidebarState(!isMobileView());

  // Tutup sidebar otomatis saat tap di luar area sidebar (khusus mobile)
  document.addEventListener("click", (event) => {
    if (!isMobileView()) return;
    if (sidebar.classList.contains("collapsed")) return;

    const clickedInsideSidebar = sidebar.contains(event.target);
    const clickedToggleBtn = document.getElementById("menuToggle").contains(event.target);

    if (!clickedInsideSidebar && !clickedToggleBtn) {
      setSidebarState(false);
    }
  });

  // Sesuaikan ulang saat layar di-resize (misal rotasi HP / geser jendela)
  window.addEventListener("resize", () => {
    if (!isMobileView() && document.body.classList.contains("sidebar-mobile-open")) {
      document.body.classList.remove("sidebar-mobile-open");
    }
  });

  const userChipBtn = document.getElementById("userChipBtn");
  const userDropdown = document.getElementById("userDropdown");
  userChipBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    userDropdown.classList.toggle("open");
  });
  document.addEventListener("click", (e) => {
    if (!userDropdown.contains(e.target) && e.target !== userChipBtn) {
      userDropdown.classList.remove("open");
    }
  });

  // DATA PENDAFTAR & BERKAS — DARI DATABASE LARAVEL
  function loadPendaftarData() {
    const pendaftarDariDatabase = @json($pendaftar);

    dataVerifikasi = pendaftarDariDatabase.map((item) => {
      return {
        id: String(item.id_pendaftar),
        noReg: item.no_pendaftaran || "-",
        nama: item.nama_lengkap || "-",
        sekolah: item.asal_sekolah || "-",
        nisn: item.nisn || "-",
        statusBerkas: item.status_verifikasi || "menunggu",
        catatanRevisi: item.catatan_revisi || ""
      };
    });
  }

  function renderTable(listData) {
    const tbody = document.getElementById('verifikasiTableBody');
    let rowsHtml = '';

    if (listData.length === 0) {
      tbody.innerHTML = `<tr><td colspan="7" style="text-align: center; color: #888; padding: 25px;">Tidak ada data berkas yang sesuai.</td></tr>`;
      return;
    }

    listData.forEach((siswa, index) => {
      let badgeHtml = '';
      if (siswa.statusBerkas === 'kurang') {
        badgeHtml = `<span class="status-badge pending" id="badge-${siswa.id}"><i class="fa-solid fa-clock"></i> Pending / Belum Lengkap</span>`;
      } else if (siswa.statusBerkas === 'ditolak') {
        badgeHtml = `<span class="status-badge pending" style="background:#fee2e2; color:#dc2626;" id="badge-${siswa.id}"><i class="fa-solid fa-circle-xmark"></i> Ditolak</span>`;
      } else if (siswa.statusBerkas === 'revisi') {
        badgeHtml = `<span class="status-badge pending" style="background:#fef3c7; color:#b45309;" id="badge-${siswa.id}"><i class="fa-solid fa-pen-to-square"></i> Perlu Revisi</span>`;
      } else if (siswa.statusBerkas === 'menunggu') {
        badgeHtml = `<span class="status-badge process" id="badge-${siswa.id}"><i class="fa-solid fa-spinner"></i> Sedang Diverifikasi</span>`;
      } else {
        badgeHtml = `<span class="status-badge verified" id="badge-${siswa.id}"><i class="fa-solid fa-circle-check"></i> Terverifikasi</span>`;
      }

      rowsHtml += `
        <tr>
          <td style="text-align: center; color: #666; font-weight: 600;">${index + 1}</td>
          <td class="text-nowrap"><strong>${siswa.noReg}</strong></td>
          <td><strong>${siswa.nama}</strong></td>
          <td>${siswa.nisn}</td>
          <td>${siswa.sekolah}</td>
          <td>${badgeHtml}</td>
          <td>
            <div class="action-group">
              <button class="btn-action btn-view-docs" onclick="openModal('${siswa.id}', false)"><i class="fa-solid fa-folder-open"></i> Lihat</button>
              <button class="btn-action btn-check" onclick="openModal('${siswa.id}', true)"><i class="fa-solid fa-magnifying-glass-plus"></i> Verifikasi</button>
            </div>
          </td>
        </tr>
      `;
    });

    tbody.innerHTML = rowsHtml;
    updateStats();
  }

  function updateStats() {
    let pending = 0, process = 0, verified = 0;
    dataVerifikasi.forEach(s => {
      if (s.statusBerkas === 'kurang' || s.statusBerkas === 'revisi' || s.statusBerkas === 'ditolak') pending++;
      else if (s.statusBerkas === 'menunggu') process++;
      else if (s.statusBerkas === 'lengkap') verified++;
    });
    document.getElementById('stat-pending').textContent = pending;
    document.getElementById('stat-process').textContent = process;
    document.getElementById('stat-verified').textContent = verified;
  }

  function filterTable() {
    const val = document.getElementById('searchInput').value.toLowerCase();
    const filtered = dataVerifikasi.filter(s => 
      s.nama.toLowerCase().includes(val) || 
      s.nisn.toLowerCase().includes(val) ||
      s.noReg.toLowerCase().includes(val) ||
      s.sekolah.toLowerCase().includes(val)
    );
    renderTable(filtered);
  }

  async function openModal(id, isEdit) {
    currentActiveId = id;
    const siswa = dataVerifikasi.find(s => s.id === id);
    if (!siswa) return;

    document.getElementById('modalTitle').textContent = isEdit ? `Verifikasi Berkas — ${siswa.nama}` : `Berkas Ter-Upload — ${siswa.nama}`;
    document.getElementById('catatanRevisi').value = siswa.catatanRevisi || "";

    const revisionArea = document.getElementById('revisionArea');
    const modalFooter = document.getElementById('modalFooter');

    const docGrid = document.getElementById("docGridContainer");
    docGrid.innerHTML = "<p style='font-size:12.5px;color:var(--ink-soft);'>Memuat berkas...</p>";

    // Buka modal duluan (biar nggak keliatan nge-freeze), datanya nyusul
    document.getElementById('modalVerifikasi').classList.add('open');

    // Ambil data dokumen ASLI milik siswa ini dari server (bukan localStorage,
    // biar nggak ketimpa/nyampur sama data siswa lain)
    let dokumenServer = {};
    let isPenerimaBantuan = false;
    let tampilkanBuktiTransfer = false;
    try {
        const res = await fetch(`/verifikasi_berkas/${id}/detail`);
        if (!res.ok) throw new Error('Gagal ambil detail berkas: ' + res.status);
        const json = await res.json();
        dokumenServer = json.dokumen || {};
        isPenerimaBantuan = json.is_penerima_bantuan || false;
        tampilkanBuktiTransfer = json.tampilkan_bukti_transfer || false;
    } catch (err) {
        console.error('Gagal memuat berkas siswa:', err);
        docGrid.innerHTML = "<p style='font-size:12.5px;color:#b91c1c;'>Gagal memuat berkas dari server. Coba tutup dan buka lagi.</p>";
        if (isEdit) {
            revisionArea.style.display = 'block';
            modalFooter.style.display = 'flex';
        } else {
            revisionArea.style.display = 'none';
            modalFooter.style.display = 'none';
        }
        return;
    }

    docGrid.innerHTML = "";

    let masterDocs = [
      { key: "foto", serverKey: "pas_foto", title: "Pas Foto Formal 3x4", icon: "fa-image" },
      { key: "kk", serverKey: "kk", title: "Kartu Keluarga (KK)", icon: "fa-file-lines" },
      { key: "akta", serverKey: "akta", title: "Akta Kelahiran", icon: "fa-file-lines" },
      { key: "ktp-ayah", serverKey: "ktp_ayah", title: "KTP Ayah", icon: "fa-id-card" },
      { key: "ktp-ibu", serverKey: "ktp_ibu", title: "KTP Ibu", icon: "fa-id-card" },
      { key: "skl", serverKey: "skl", title: "SKL / Ijazah SMP", icon: "fa-file-lines" },
      { key: "kip", serverKey: "kip", title: "KIP / KKS / PKH", icon: "fa-credit-card" },
      { key: "bayar", serverKey: "bukti_pembayaran", title: "Bukti Transfer Pembayaran", icon: "fa-file-invoice" }
    ];

    // Kartu KIP/KKS/PKH dan Bukti Transfer cuma ditampilkan kalau memang relevan
    // buat siswa ini, biar nggak nahan status "Lengkap" gara-gara dokumen yang
    // emang nggak wajib buat dia.
    masterDocs = masterDocs.filter(doc => {
      if (doc.key === 'kip') return isPenerimaBantuan;
      if (doc.key === 'bayar') return tampilkanBuktiTransfer;
      return true;
    });

    masterDocs.forEach(doc => {
      const info = dokumenServer[doc.serverKey] || { sudah_upload: false, url: null, dicentang_admin: false };

      let fileName = info.sudah_upload ? "Dokumen Tersimpan" : "Belum Diunggah";
      let fileData = info.url || null;
      let statusDoc = info.dicentang_admin ? "terverifikasi" : "menunggu";

      let previewContent = `<i class="fa-solid ${doc.icon}" style="font-size: 32px;"></i><span style="font-size: 11px; text-align: center; padding: 0 5px;">${fileName}</span>`;

      if (fileData) {
        const isImage = /\.(png|jpe?g|gif|webp)$/i.test(fileData);
        if (isImage) {
          previewContent = `<img src="${fileData}" style="width: 100%; height: 100%; object-fit: cover;">`;
        } else {
          previewContent = `<i class="fa-solid fa-file-pdf" style="font-size: 32px;"></i><span style="font-size: 11px; text-align: center; padding: 0 5px;">${fileName}</span>`;
        }
      }

      const card = document.createElement("div");
      card.className = "doc-card";
      card.innerHTML = `
        <div class="doc-title">
          <span>${doc.title}</span>
          ${fileData ? `<a href="${fileData}" target="_blank" style="font-size: 11px; color: var(--accent);">Lihat Asli</a>` : ''}
        </div>
        <div class="doc-preview">
          ${previewContent}
        </div>
        ${isEdit ? `
        <select class="doc-status-select" data-key="${doc.key}">
          <option value="terverifikasi" ${statusDoc === 'terverifikasi' ? 'selected' : ''}>✓ Verifikasi Berkas (Disetujui)</option>
          <option value="revisi" ${statusDoc === 'revisi' ? 'selected' : ''}>⚠ Perlu Revisi</option>
          <option value="pending" ${statusDoc === 'pending' ? 'selected' : ''}>⏱ Pending / Belum Lengkap</option>
          <option value="menunggu" ${statusDoc === 'menunggu' ? 'selected' : ''}>⏳ Menunggu / Belum Diperiksa</option>
        </select>` : ''}
      `;
      docGrid.appendChild(card);
    });

    if (isEdit) {
      revisionArea.style.display = 'block';
      modalFooter.style.display = 'flex';
    } else {
      revisionArea.style.display = 'none';
      modalFooter.style.display = 'none';
    }
  }

  function viewFullDoc(title, docKey) {
    // CATATAN: fungsi ini sudah tidak dipakai lagi oleh docGridContainer,
    // karena "Lihat Asli" sekarang langsung pakai link <a href> ke URL
    // dokumen asli dari server (lihat openModal()). Dibiarkan di sini
    // supaya tidak ada referensi lain yang error kalau masih memanggilnya.
    alert("Gunakan tombol 'Lihat Asli' pada kartu dokumen untuk membuka berkas.");
  }

  function closeModal() {
    document.getElementById('modalVerifikasi').classList.remove('open');
  }

  function showToast(msg) {
    const toast = document.getElementById('toast');
    document.getElementById('toastMsg').textContent = msg;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
  }

  const KEY_TO_CEK_FIELD = {
    'foto': 'cek_pas_foto',
    'kk': 'cek_kk',
    'akta': 'cek_akte',
    'ktp-ayah': 'cek_ktp_ayah',
    'ktp-ibu': 'cek_ktp_ibu',
    'skl': 'cek_skl',
    'kip': 'cek_kip',
    'bayar': 'cek_bukti_pembayaran'
  };

  function terapkanAksiVerifikasi() {
    const siswa = dataVerifikasi.find(s => s.id === currentActiveId);
    const catatan = document.getElementById('catatanRevisi').value;

    if (!siswa) return;

    const selects = document.querySelectorAll('.doc-status-select');

    let hasRevisi = false;
    let hasPending = false;
    let allVerified = true;
    const cekPayload = {};

    selects.forEach(select => {
      const key = select.getAttribute('data-key');
      const valStatus = select.value;

      if (valStatus === 'revisi') hasRevisi = true;
      if (valStatus === 'pending') hasPending = true;
      if (valStatus !== 'terverifikasi') allVerified = false;

      const cekField = KEY_TO_CEK_FIELD[key];
      if (cekField) {
        cekPayload[cekField] = valStatus === 'terverifikasi';
      }
    });

    let statusVerifikasi = 'menunggu';
    if (hasRevisi) {
      statusVerifikasi = 'revisi';
    } else if (hasPending) {
      statusVerifikasi = 'kurang';
    } else if (allVerified && selects.length > 0) {
      statusVerifikasi = 'lengkap';
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch(`/verifikasi_berkas/${siswa.id}/update`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        'Accept': 'application/json'
      },
      body: JSON.stringify({
        ...cekPayload,
        status_verifikasi: statusVerifikasi,
        catatan_revisi: catatan
      })
    })
      .then(res => {
        if (!res.ok) throw new Error('Gagal menyimpan verifikasi');
        return res.json();
      })
      .then(() => {
        siswa.statusBerkas = statusVerifikasi;
        siswa.catatanRevisi = catatan;
        renderTable(dataVerifikasi);
        updateStats();
        showToast('Aksi verifikasi berhasil disimpan ke database!');
        closeModal();
      })
      .catch(() => {
        alert('Gagal menyimpan verifikasi ke server. Coba lagi.');
      });
  }

  function logoutSystem() {
    if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
      window.location.href = ('/login');
    }
  }

  document.addEventListener("DOMContentLoaded", function() {
    loadPendaftarData();
    renderTable(dataVerifikasi);
  });
</script>
</body>
</html>