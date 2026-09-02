<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Pendaftar Baru — Admin SPMB SMK Ma'arif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
    font-size: 14px;
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

  .panel {
    background: var(--card);
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
    border: 1px solid var(--line);
    margin-bottom: 25px;
  }

  .panel-head {
    display: flex;
    gap: 22px;
    align-items: center;
    flex-wrap: wrap;
  }

  .avatar-big {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: var(--accent-light);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: var(--accent);
    font-size: 32px;
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
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 12px;
    background: #d1fae5;
    color: var(--accent);
  }

  .section {
    background: white;
    border: 1px solid var(--line);
    border-radius: 12px;
    padding: 24px 28px;
    margin-bottom: 25px;
  }

  .section-head {
    display: flex;
    align-items: center;
    gap: 11px;
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
    flex-shrink: 0;
    font-size: 16px;
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
    grid-template-columns: 1fr 1fr 1fr;
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

  .field input[type=text],
  .field input[type=number],
  .field input[type=tel],
  .field input[type=date],
  .field select {
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

  .field input:focus,
  .field select:focus {
    border-color: var(--dark);
    box-shadow: 0 0 0 3px rgba(2, 44, 34, 0.1);
  }

  .field input.invalid,
  .field select.invalid {
    border-color: var(--danger);
    background: var(--danger-light);
  }

  .radio-group {
    display: flex;
    gap: 24px;
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
    background: #fdfdfd;
    border: 1px solid var(--line);
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
  }

  .parent-block-title {
    font-size: 14px;
    font-weight: 700;
    color: var(--accent);
    margin-bottom: 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px dashed var(--line);
    padding-bottom: 10px;
  }

  .form-footer {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 14px;
    margin-top: 15px;
  }

  .btn-back {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    border: 1px solid #d1d5db;
    background: #fff;
    color: #374151;
    font-size: 13px;
    font-weight: 600;
    padding: 11px 22px;
    border-radius: 8px;
    cursor: pointer;
    text-decoration: none;
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
    border-radius: 8px;
    padding: 11px 24px;
    font-size: 13px;
    font-weight: 600;
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
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    z-index: 100;
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.25s ease;
    pointer-events: none;
  }

  .toast.show {
    opacity: 1;
    transform: translateY(0);
  }

  @media (max-width: 920px) {
    .sidebar {
      position: fixed;
      z-index: 100;
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

    /* Sembunyikan teks nama/role di topbar mobile, sisakan avatar + panah */
    .user-name,
    .user-role {
      display: none;
    }

    .row-2,
    .row-3 {
      grid-template-columns: 1fr;
    }

    .panel,
    .section {
      padding: 18px;
    }

    .panel-head {
      gap: 16px;
    }

    .avatar-big {
      width: 56px;
      height: 56px;
      font-size: 24px;
    }

    .info-strip {
      gap: 18px;
    }

    .form-footer {
      flex-direction: column-reverse;
      align-items: stretch;
    }

    .btn-back,
    .btn-save {
      width: 100%;
      justify-content: center;
    }

    .toast {
      left: 16px;
      right: 16px;
      top: 16px;
    }
  }

  @media (max-width: 480px) {
    .avatar-big {
      width: 48px;
      height: 48px;
      font-size: 20px;
    }

    .info-strip {
      gap: 14px;
    }
  }
</style>
</head>
<body>

  <!-- SIDEBAR NAVIGASI ADMIN -->
  <aside class="sidebar" id="sidebar">
    <div>
      <div class="sidebar-header">
        <img src="img/logo.smk.png" alt="Logo SMK" class="logo-sekolah-img" onerror="this.src='https://via.placeholder.com/42';">
        <div class="school-title">
          <h1>SMK MAARIF WALISONGO KAJORAN</h1>
          <h2>SPMB 2027/2028</h2>
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
            <a href="{{ url('/kuota') }}"><i class="fa-solid fa-list-check"></i> Kuota Jurusan</a>
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
        <button class="menu-toggle" id="menuToggle" aria-label="Buka/tutup sidebar">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div>
          <h1 class="page-title">Tambah Pendaftar Baru (Manual)</h1>
        </div>
      </div>

      <div class="user-chip-wrap">
        <button class="user-chip" id="userChipBtn" type="button">
          <div>
            <div class="name">{{ Auth::user()->name }}</div>
            <div class="role">{{ Auth::user()->role ?? 'Administrator' }}</div>
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

    <form id="tambahForm" onsubmit="return false;">

      <!-- INFO PANEL -->
      <div class="panel">
        <div class="panel-head">
          <div class="avatar-big">
            <i class="fa-solid fa-user-plus"></i>
          </div>
          <div class="info-strip">
            <div class="info-item">
              <div class="info-icon"><i class="fa-solid fa-id-card"></i></div>
              <div><p class="info-label">No. Pendaftaran (Otomatis)</p><p class="info-value">SPMB-2027-000125</p></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="fa-solid fa-shield-halved"></i></div>
              <div><p class="info-label">Status Pendaftaran</p><p class="info-value"><span class="badge">Baru Ditambahkan</span></p></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="fa-regular fa-calendar-check"></i></div>
              <div><p class="info-label">Tanggal Input</p><p class="info-value" id="currentDateDisplay">08 Agustus 2026</p></div>
            </div>
          </div>
        </div>
      </div>

      <!-- A. DATA CALON SISWA -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-user"></i></div>
          <h3 class="section-title">A. Data Calon Siswa</h3>
        </div>

        <div class="row-3">
          <div class="field"><label>Nama Lengkap<span class="req">*</span></label><input type="text" name="nama_lengkap" class="req" placeholder="Masukkan nama lengkap"></div>
          <div class="field"><label>NISN<span class="req">*</span></label><input type="text" name="nisn" class="req" placeholder="Contoh: 0081234567"></div>
          <div class="field"><label>Asal Sekolah<span class="req">*</span></label><input type="text" name="asal_sekolah" class="req" placeholder="Contoh: SMP N 1 Kajoran"></div>
        </div>

        <div class="row-3">
          <div class="field"><label>Tempat Lahir<span class="req">*</span></label><input type="text" name="tempat_lahir" class="req" placeholder="Kota lahir"></div>
          <div class="field"><label>Tanggal Lahir<span class="req">*</span></label><input type="date" name="tanggal_lahir" class="req"></div>
          <div class="field">
            <label>Jenis Kelamin<span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-option"><input type="radio" name="jenis_kelamin" value="L" checked> Laki-laki</label>
              <label class="radio-option"><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
            </div>
          </div>
        </div>

        <div class="row-3">
          <div class="field">
            <label>Agama<span class="req">*</span></label>
            <select class="req" name="agama">
              <option value="">-- Pilih Agama --</option>
              <option selected>Islam</option><option>Kristen</option><option>Katolik</option><option>Hindu</option><option>Buddha</option><option>Konghucu</option>
            </select>
          </div>
          <div class="field"><label>Ukuran Tinggi (cm)<span class="req">*</span></label><input type="number" name="tinggi_badan" class="req" placeholder="Contoh: 165"></div>
          <div class="field"><label>Ukuran Berat (kg)<span class="req">*</span></label><input type="number" name="berat_badan" class="req" placeholder="Contoh: 55"></div>
        </div>

        <div class="row-3">
          <div class="field"><label>Jumlah Saudara<span class="req">*</span></label><input type="number" name="jumlah_saudara_kandung" class="req" value="0"></div>
          <div class="field">
            <label>Memiliki Kebutuhan Khusus?<span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-option"><input type="radio" name="kebutuhan_khusus" value="Ya"> Ya</label>
              <label class="radio-option"><input type="radio" name="kebutuhan_khusus" value="Tidak" checked> Tidak</label>
            </div>
          </div>
          <div class="field">
            <label>Penerima KPS / KKS / KIP?<span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-option"><input type="radio" name="is_penerima_bantuan" value="Ya"> Ya</label>
              <label class="radio-option"><input type="radio" name="is_penerima_bantuan" value="Tidak" checked> Tidak</label>
            </div>
          </div>
        </div>

        <div class="row-1">
          <div class="field"><label>Nomor HP / WA Siswa<span class="req">*</span></label><input type="tel" name="no_hp" class="req" placeholder="Contoh: 081234567890"></div>
        </div>
      </div>

      <!-- B. DATA TEMPAT TINGGAL -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-house"></i></div>
          <h3 class="section-title">B. Data Tempat Tinggal</h3>
        </div>

        <div class="row-1">
          <div class="field"><label>Alamat Lengkap<span class="req">*</span></label><input type="text" name="alamat_lengkap" class="req" placeholder="Dusun / Jalan, No. Rumah"></div>
        </div>

        <div class="row-3">
          <div class="field"><label>Provinsi<span class="req">*</span></label>
            <select class="req" name="provinsi"><option value="">-- Pilih Provinsi --</option><option selected>Jawa Tengah</option><option>Jawa Barat</option><option>Jawa Timur</option><option>DI Yogyakarta</option></select>
          </div>
          <div class="field"><label>Kabupaten<span class="req">*</span></label>
            <select class="req" name="kabupaten"><option value="">-- Pilih Kabupaten --</option><option selected>Magelang</option><option>Purworejo</option><option>Temanggung</option><option>Wonosobo</option></select>
          </div>
          <div class="field"><label>Kecamatan<span class="req">*</span></label>
            <select class="req" name="kecamatan"><option value="">-- Pilih Kecamatan --</option><option selected>Kajoran</option><option>Salaman</option><option>Borobudur</option><option>Secang</option></select>
          </div>
        </div>

        <div class="row-2">
          <div class="field"><label>Desa / Kelurahan<span class="req">*</span></label>
            <select class="req" name="desa"><option value="">-- Pilih Desa --</option><option selected>Kajoran</option><option>Madukoro</option><option>Wuwuharjo</option></select>
          </div>
          <div class="field"><label>Kode Pos<span class="req">*</span></label><input type="text" name="kode_pos" class="req" placeholder="Contoh: 56161"></div>
        </div>

        <div class="row-2">
          <div class="field"><label>RT<span class="req">*</span></label><input type="text" name="rt" maxlength="3" class="req" placeholder="Contoh: 002"></div>
          <div class="field"><label>RW<span class="req">*</span></label><input type="text" name="rw" maxlength="3" class="req" placeholder="Contoh: 004"></div>
          <div class="field"><label>Jenis Tinggal<span class="req">*</span></label>
            <select class="req" name="jenis_tinggal">
              <option value="">-- Pilih Jenis Tinggal --</option>
              <option selected>Bersama Orang Tua</option><option>Kos/Kontrak</option><option>Asrama</option><option>Wali</option>
            </select>
          </div>
        </div>

        <div class="row-2">
          <div class="field"><label>Alat Transportasi<span class="req">*</span></label>
            <select class="req" name="alat_transportasi_ke_sekolah">
              <option value="">-- Pilih Transportasi --</option>
              <option selected>Sepeda Motor</option><option>Jalan Kaki</option><option>Sepeda</option><option>Angkutan Umum</option><option>Antar Jemput</option>
            </select>
          </div>
          <div class="field"><label>Jarak ke Sekolah<span class="req">*</span></label>
            <select class="req" name="jarak_ke_sekolah">
              <option value="">-- Pilih Jarak --</option>
              <option>&lt; 1 km</option><option>1 - 3 km</option><option selected>3 - 5 km</option><option>5 - 10 km</option><option>&gt; 10 km</option>
            </select>
          </div>
        </div>
      </div>

      <!-- C. DATA ORANG TUA / WALI -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-users"></i></div>
          <h3 class="section-title">C. Data Orang Tua / Wali</h3>
        </div>

        <!-- DATA AYAH -->
        <div class="parent-block">
          <div class="parent-block-title"><i class="fa-solid fa-person"></i> Data Ayah Kandung</div>
          <div class="row-2">
            <div class="field"><label>Nama Ayah<span class="req">*</span></label><input type="text" name="nama_ayah" class="req" placeholder="Nama lengkap ayah"></div>
            <div class="field"><label>Pekerjaan Ayah<span class="req">*</span></label><input type="text" name="pekerjaan_ayah" class="req" placeholder="Pekerjaan ayah"></div>
          </div>
          <div class="row-2">
            <div class="field"><label>Penghasilan Bulanan<span class="req">*</span></label>
              <select class="req" name="penghasilan_ayah_bulanan">
                <option value="">-- Pilih Penghasilan --</option>
                <option>TIDAK BERPENGHASILAN/ TIDAK BEKERJA</option>
                <option>KURANG DARI RP. 1.000.000</option>
                <option selected>RP. 1.000.000 - RP. 1.999.999</option>
                <option>RP. 2.000.000 - RP. 4.999.999</option>
                <option>RP. 5.000.000 - RP. 20.000.000</option>
                <option>RP. lebih dari RP. 20.000.000</option>
              </select>
            </div>
            <div class="field"><label>Memiliki Kebutuhan Khusus?<span class="req">*</span></label>
              <div class="radio-group">
                <label class="radio-option"><input type="radio" name="ayah_kebutuhan_khusus" value="Ya"> Ya</label>
                <label class="radio-option"><input type="radio" name="ayah_kebutuhan_khusus" value="Tidak" checked> Tidak</label>
              </div>
            </div>
          </div>
          <div class="row-3">
            <div class="field"><label>Pendidikan Terakhir<span class="req">*</span></label>
              <select class="req" name="pendidikan_terakhir_ayah"><option value="">-- Pilih Pendidikan --</option><option>SD</option><option>SMP</option><option selected>SMA/SMK</option><option>D3</option><option>S1</option><option>S2/S3</option></select>
            </div>
            <div class="field"><label>Tahun Lahir<span class="req">*</span></label><input type="number" name="tahun_lahir_ayah" class="req" placeholder="Tahun lahir ayah"></div>
            <div class="field"><label>Nomor Telepon<span class="req">*</span></label><input type="tel" name="no_hp_ayah" class="req" placeholder="No. HP Ayah"></div>
          </div>
        </div>

        <!-- DATA IBU -->
        <div class="parent-block">
          <div class="parent-block-title"><i class="fa-solid fa-person-dress"></i> Data Ibu Kandung</div>
          <div class="row-2">
            <div class="field"><label>Nama Ibu<span class="req">*</span></label><input type="text" name="nama_ibu" class="req" placeholder="Nama lengkap ibu"></div>
            <div class="field"><label>Pekerjaan Ibu<span class="req">*</span></label><input type="text" name="pekerjaan_ibu" class="req" placeholder="Pekerjaan ibu"></div>
          </div>
          <div class="row-2">
            <div class="field"><label>Penghasilan Bulanan<span class="req">*</span></label>
              <select class="req" name="penghasilan_ibu_bulanan">
                <option value="">-- Pilih Penghasilan --</option>
                <option selected>TIDAK BERPENGHASILAN/ TIDAK BEKERJA</option>
                <option>KURANG DARI RP. 1.000.000</option>
                <option>RP. 1.000.000 - RP. 1.999.999</option>
                <option>RP. 2.000.000 - RP. 4.999.999</option>
                <option>RP. 5.000.000 - RP. 20.000.000</option>
                <option>RP. lebih dari RP. 20.000.000</option>
              </select>
            </div>
            <div class="field"><label>Memiliki Kebutuhan Khusus?<span class="req">*</span></label>
              <div class="radio-group">
                <label class="radio-option"><input type="radio" name="ibu_kebutuhan_khusus" value="Ya"> Ya</label>
                <label class="radio-option"><input type="radio" name="ibu_kebutuhan_khusus" value="Tidak" checked> Tidak</label>
              </div>
            </div>
          </div>
          <div class="row-3">
            <div class="field"><label>Pendidikan Terakhir<span class="req">*</span></label>
              <select class="req" name="pendidikan_terakhir_ibu"><option value="">-- Pilih Pendidikan --</option><option>SD</option><option selected>SMP</option><option>SMA/SMK</option><option>D3</option><option>S1</option><option>S2/S3</option></select>
            </div>
            <div class="field"><label>Tahun Lahir<span class="req">*</span></label><input type="number" name="tahun_lahir_ibu" class="req" placeholder="Tahun lahir ibu"></div>
            <div class="field"><label>Nomor Telepon<span class="req">*</span></label><input type="tel" name="no_hp_ibu" class="req" placeholder="No. HP Ibu"></div>
          </div>
        </div>

        <div class="row-1" style="margin-bottom: 10px;">
          <div class="field">
            <label>Apakah Memiliki / Tinggal Bersama Wali? (Opsional)</label>
            <div class="radio-group">
              <label class="radio-option"><input type="radio" name="punya_wali" value="ya" onclick="toggleFormWali(true)"> Ya</label>
              <label class="radio-option"><input type="radio" name="punya_wali" value="tidak" checked onclick="toggleFormWali(false)"> Tidak</label>
            </div>
          </div>
        </div>

        <div class="parent-block" id="blockWali" style="display: none;">
          <div class="parent-block-title"><i class="fa-solid fa-user-shield"></i> Data Wali</div>
          <div class="row-2">
            <div class="field"><label>Nama Wali</label><input type="text" id="wali_nama" name="nama_wali"></div>
            <div class="field"><label>Pekerjaan Wali</label><input type="text" id="wali_pekerjaan" name="pekerjaan_wali"></div>
          </div>
          <div class="row-1">
            <div class="field"><label>Penghasilan Bulanan Wali</label>
              <select id="wali_penghasilan" name="penghasilan_wali_bulanan">
                <option value="">-- Pilih Penghasilan Wali --</option>
                <option>TIDAK BERPENGHASILAN/ TIDAK BEKERJA</option>
                <option>KURANG DARI RP. 1.000.000</option>
                <option>RP. 1.000.000 - RP. 1.999.999</option>
                <option>RP. 2.000.000 - RP. 4.999.999</option>
                <option>RP. 5.000.000 - RP. 20.000.000</option>
                <option>RP. lebih dari RP. 20.000.000</option>
              </select>
            </div>
          </div>
          <div class="row-2">
            <div class="field"><label>Pendidikan Terakhir</label>
              <select id="wali_pendidikan" name="pendidikan_terakhir_wali"><option value="">-- Pilih Pendidikan --</option><option>SD</option><option>SMP</option><option>SMA/SMK</option><option>D3</option><option>S1</option><option>S2/S3</option></select>
            </div>
            <div class="field"><label>Nomor Telepon</label><input type="tel" id="wali_telepon" name="no_hp_wali"></div>
          </div>
        </div>

      </div>

      <!-- D. PILIHAN JURUSAN -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-list-check"></i></div>
          <h3 class="section-title">D. Pilihan Jurusan</h3>
        </div>

        <div class="row-2">
          <div class="field"><label>Pilihan Jurusan 1<span class="req">*</span></label>
            <select class="req jurusan-select" id="jurusan_pilihan_1" data-slot="0"></select>
          </div>
          <div class="field"><label>Pilihan Jurusan 2<span class="req">*</span></label>
            <select class="req jurusan-select" id="jurusan_pilihan_2" data-slot="1"></select>
          </div>
        </div>
      </div>

      <!-- E. GELOMBANG & PEMBAYARAN -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-money-check-dollar"></i></div>
          <h3 class="section-title">E. Gelombang & Pembayaran</h3>
        </div>

        <div class="row-2">
          <div class="field"><label>Gelombang Pendaftaran<span class="req">*</span></label>
            <select class="req" name="gelombang">
              <option value="">-- Pilih Gelombang --</option>
              <option value="Gelombang 1">Gelombang 1</option>
              <option value="Gelombang 2">Gelombang 2</option>
            </select>
          </div>
          <div class="field"><label>Metode Pembayaran</label>
            <select name="metode_pembayaran">
              <option value="">-- Pilih Metode --</option>
              <option value="Transfer Bank">Transfer Bank</option>
              <option value="Tunai">Tunai</option>
            </select>
          </div>
        </div>
      </div>

      <div class="form-footer">
        <a href="{{ url('/list_pendaftar') }}" class="btn-back">
          <i class="fa-solid fa-arrow-left"></i> Batal
        </a>
        <button type="button" class="btn-save" id="btnSimpan">
          <i class="fa-solid fa-floppy-disk"></i> Simpan Pendaftar Baru
        </button>
      </div>
    </form>
  </main>

<div class="toast" id="toast">
  <i class="fa-solid fa-circle-check" style="color: #a7f3d0;"></i>
  <span id="toastMsg">Pendaftar baru berhasil ditambahkan!</span>
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

function toggleFormWali(isPunyaWali) {
  const blockWali = document.getElementById("blockWali");
  blockWali.style.display = isPunyaWali ? "block" : "none";
}

const sidebar = document.getElementById("sidebar");
const mainContent = document.getElementById("mainContent");

/* PERILAKU SIDEBAR RESPONSIVE: DESKTOP MENDORONG KONTEN, MOBILE OVERLAY */
const MOBILE_BREAKPOINT = 920;

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

// Di mobile, sidebar tertutup secara default agar tidak menutupi konten
let wasMobileView = isMobileView();
setSidebarState(!wasMobileView);

document.getElementById("menuToggle").addEventListener("click", () => {
  const isOpen = !sidebar.classList.contains("collapsed");
  setSidebarState(!isOpen);
});

// Tutup sidebar otomatis saat tap di luar area sidebar (khusus mobile)
document.addEventListener("click", (e) => {
  if (!isMobileView()) return;
  if (sidebar.classList.contains("collapsed")) return;

  const menuToggleBtn = document.getElementById("menuToggle");
  const clickedInsideSidebar = sidebar.contains(e.target);
  const clickedToggleBtn = menuToggleBtn.contains(e.target);

  if (!clickedInsideSidebar && !clickedToggleBtn) {
    setSidebarState(false);
  }
});

// Tutup sidebar otomatis saat salah satu menu diklik di mobile
document.querySelectorAll(".menu-nav a").forEach((link) => {
  link.addEventListener("click", () => {
    if (isMobileView()) {
      setSidebarState(false);
    }
  });
});

// Reset state saat ukuran layar berpindah lintas breakpoint mobile/desktop
window.addEventListener("resize", () => {
  const nowMobileView = isMobileView();
  if (nowMobileView !== wasMobileView) {
    setSidebarState(!nowMobileView);
    wasMobileView = nowMobileView;
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

/* LOGIKA SELEKSI JURUSAN */
const jurusanOptions = [
  { kode: "PPLG", nama: "Pengembangan Perangkat Lunak dan Gim" },
  { kode: "BCF",  nama: "Broadcasting dan Perfilman" },
  { kode: "MPLB", nama: "Manajemen Perkantoran dan Layanan Bisnis" }
];

const jurusanSelects = [
  document.getElementById("jurusan_pilihan_1"),
  document.getElementById("jurusan_pilihan_2")
];

const jurusanDefaults = ["PPLG", "BCF"];

function renderJurusanOptions() {
  const chosen = jurusanSelects.map(sel => sel.dataset.value || "");
  jurusanSelects.forEach((sel, slotIdx) => {
    const currentValue = chosen[slotIdx];
    sel.innerHTML = "";
    const emptyOpt = document.createElement("option");
    emptyOpt.value = "";
    emptyOpt.textContent = "— Pilih Jurusan —";
    sel.appendChild(emptyOpt);

    jurusanOptions.forEach(opt => {
      const takenElsewhere = chosen.some((v, i) => i !== slotIdx && v === opt.kode);
      const option = document.createElement("option");
      option.value = opt.kode;
      option.textContent = `${opt.kode} — ${opt.nama}`;
      option.disabled = takenElsewhere;
      if (opt.kode === currentValue) option.selected = true;
      sel.appendChild(option);
    });
  });
}

jurusanSelects.forEach((sel, i) => {
  sel.dataset.value = jurusanDefaults[i] || "";
  sel.addEventListener("change", () => {
    sel.dataset.value = sel.value;
    renderJurusanOptions();
  });
});
renderJurusanOptions();

const form = document.getElementById("tambahForm");
const toast = document.getElementById("toast");
const toastMsg = document.getElementById("toastMsg");

function showToast(msg, isError = false) {
  toastMsg.textContent = msg;
  toast.style.background = isError ? "#dc2626" : "#022c22";
  toast.classList.add("show");
  clearTimeout(showToast._t);
  showToast._t = setTimeout(() => toast.classList.remove("show"), 3200);
}

function validateForm() {
  let firstInvalid = null;
  let isValid = true;
  
  form.querySelectorAll("input.req, select.req").forEach(el => {
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

document.getElementById("btnSimpan").addEventListener("click", () => {
  if (!validateForm()) {
    showToast("Ada data wajib yang belum diisi. Periksa kembali formulir.", true);
    return;
  }

  const btnSimpan = document.getElementById("btnSimpan");
  const formData = new FormData(form);
  formData.append("jurusan_pilihan_1", jurusanSelects[0].value);
  formData.append("jurusan_pilihan_2", jurusanSelects[1].value);

  btnSimpan.disabled = true;
  btnSimpan.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Menyimpan...';

  fetch("{{ url('/tambah_pendaftar') }}", {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
      "Accept": "application/json"
    },
    body: formData
  })
    .then(async (res) => {
      const data = await res.json().catch(() => ({}));
      if (!res.ok) {
        throw new Error(data.message || "Gagal menyimpan data pendaftar.");
      }
      return data;
    })
    .then((data) => {
      showToast(data.message || "Pendaftar baru berhasil ditambahkan!");
      setTimeout(() => {
        window.location.href = "{{ url('/list_pendaftar') }}";
      }, 1200);
    })
    .catch((err) => {
      showToast(err.message || "Terjadi kesalahan, coba lagi.", true);
      btnSimpan.disabled = false;
      btnSimpan.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> Simpan Pendaftar Baru';
    });
});

function logoutSystem() {
  if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
    fetch("{{ url('/logout') }}", {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
      }
    }).finally(() => {
      window.location.href = "{{ url('/login') }}";
    });
  }
}
</script>
</body>
</html>