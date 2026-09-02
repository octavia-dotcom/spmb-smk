<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profil Admin — SPMB SMK Ma'arif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      onerror="this.onerror=null;this.href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css';">
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
    --line: #e0e0e0;
    --sidebar-w: 260px;
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
  }

  body {
    background-color: var(--bg);
    color: var(--ink);
    display: flex;
    overflow-x: hidden;
  }

  /* ---------- SIDEBAR NAVIGASI ADMIN ---------- */
  .sidebar {
    width: var(--sidebar-w);
    background-color: var(--dark);
    color: #ffffff;
    min-height: 100vh;
    height: 100vh;
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
    font-weight: 600;
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

  .admin-profile-card:hover, .admin-profile-card.active {
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

  /* ---------- MAIN CONTENT AREA ---------- */
  .main-content {
    margin-left: 260px;
    width: calc(100% - 260px);
    min-height: 100vh;
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
    border-bottom: 1px solid var(--line);
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

  .profile-avatar-top {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background-color: #04352b;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 15px;
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

  /* BODY CONTENT CONTAINER */
  .content-body {
    padding: 30px;
  }

  /* HEADER PROFILE CARD */
  .profile-banner {
    background: var(--card);
    border: 1px solid var(--line);
    border-radius: 12px;
    padding: 24px;
    display: flex;
    align-items: center;
    gap: 24px;
    margin-bottom: 25px;
  }

  .profile-avatar-wrap {
    position: relative;
  }

  .profile-avatar-main {
    width: 84px;
    height: 84px;
    border-radius: 50%;
    background: var(--accent-light);
    color: var(--accent);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 36px;
    border: 3px solid #ffffff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  }

  .profile-info h2 {
    font-size: 20px;
    font-weight: 700;
    color: var(--dark);
    margin-bottom: 4px;
  }

  .profile-info p {
    font-size: 13px;
    color: var(--ink-soft);
    margin-bottom: 8px;
  }

  .role-badge {
    display: inline-block;
    background: var(--accent-light);
    color: var(--accent);
    padding: 3px 10px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
  }

  /* SECTION & FORM */
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

  .row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
  }

  .field label {
    display: block;
    font-size: 12.5px;
    font-weight: 600;
    color: #344054;
    margin-bottom: 8px;
  }

  .field input {
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

  .field input:focus {
    border-color: var(--dark);
    box-shadow: 0 0 0 3px rgba(2, 44, 34, 0.1);
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
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    z-index: 100;
    opacity: 0;
    transform: translateY(-10px);
    transition: all .25s ease;
    pointer-events: none;
  }

  .toast.show {
    opacity: 1;
    transform: translateY(0);
  }

  /* OVERLAY UNTUK SIDEBAR MODE MOBILE */
  .sidebar-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);
    z-index: 99;
    opacity: 0;
    transition: opacity 0.25s ease;
  }

  .sidebar-overlay.show {
    display: block;
    opacity: 1;
  }

  /* ---------- RESPONSIVE: TABLET ---------- */
  @media (max-width: 992px) {
    .content-body {
      padding: 22px;
    }
    .row-2 {
      grid-template-columns: 1fr;
    }
  }

  /* ---------- RESPONSIVE: MOBILE ---------- */
  @media (max-width: 768px) {
    .sidebar {
      left: 0;
      transform: translateX(-100%);
      box-shadow: 4px 0 20px rgba(0, 0, 0, 0.25);
    }

    .sidebar.mobile-open {
      transform: translateX(0);
    }

    .main-content {
      margin-left: 0;
      width: 100%;
    }

    .top-navbar {
      padding: 0 16px;
      height: 60px;
    }

    .page-title {
      font-size: 16px;
    }

    .content-body {
      padding: 15px;
    }

    .profile-banner {
      flex-direction: column;
      text-align: center;
      padding: 20px 16px;
      gap: 14px;
    }

    .profile-info h2 {
      font-size: 18px;
    }

    .section {
      padding: 20px 16px;
    }

    .section-title {
      font-size: 15px;
    }

    .btn-save {
      width: 100%;
      justify-content: center;
    }
  }

  /* ---------- RESPONSIVE: MOBILE KECIL ---------- */
  @media (max-width: 480px) {
    .profile-text {
      display: none;
    }

    .top-navbar {
      padding: 0 12px;
    }

    .profile-btn {
      padding: 6px;
    }

    .profile-avatar-main {
      width: 68px;
      height: 68px;
      font-size: 28px;
    }

    .row-2 {
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
        <img src="img/logo.smk.png" alt="Logo SMK" class="logo-sekolah-img" onerror="this.src='https://via.placeholder.com/45';">
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

    <!-- BOTTOM SIDEBAR NAVIGASI -->
    <div class="sidebar-bottom">
      <a href="{{ url('/profil_admin') }}" class="admin-profile-card active">
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
  </aside>

  <!-- MAIN CONTENT AREA -->
  <main class="main-content" id="mainContent">
    <div class="top-navbar">
      <div class="top-left">
        <button class="btn-toggle-menu" onclick="toggleSidebar()">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div class="page-title">Profil Admin</div>
      </div>

      <div class="profile-wrapper">
        <button class="profile-btn" onclick="toggleProfileDropdown(event)">
          <div class="profile-text">
             <div class="name">{{ Auth::user()->name }}</div>
            <div class="role">{{ Auth::user()->role ?? 'Administrator' }}</div>
          </div>
          <div class="profile-avatar-top"><i class="fa-solid fa-user"></i></div>
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
      <!-- PROFILE BANNER -->
      <div class="profile-banner">
        <div class="profile-avatar-wrap">
          <div class="profile-avatar-main"><i class="fa-solid fa-user-shield"></i></div>
        </div>
        <div class="profile-info">
          <h2>{{ $admin->name }}</h2>
          <p>Petugas Verifikator & Pengelola Data Pendaftaran</p>
          <span class="role-badge"><i class="fa-solid fa-shield-halved"></i> {{ ucfirst($admin->role ?? 'Administrator') }}</span>
        </div>
      </div>

      <!-- INFORMASI PROFIL -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-id-card"></i></div>
          <h3 class="section-title">Informasi Akun Admin</h3>
        </div>

        <form id="formProfil" action="{{ url('/profil_admin/update') }}" method="POST">
          @csrf
          <div class="row-2">
            <div class="field">
              <label>Nama Lengkap Admin</label>
              <input type="text" name="name" value="{{ old('name', $admin->name) }}" required>
            </div>
            <div class="field">
              <label>Username</label>
              <input type="text" name="username" value="{{ old('username', $admin->username) }}" required>
            </div>
          </div>

          <div class="row-2">
            <div class="field">
              <label>Email Pengelola</label>
              <input type="email" name="email" value="{{ old('email', $admin->email) }}" required>
            </div>
            <div class="field">
              <label>Nomor Telepon / WhatsApp</label>
              <input type="tel" name="no_hp" value="{{ old('no_hp', $admin->no_hp) }}">
            </div>
          </div>

          <button type="submit" class="btn-save">
            <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan Profil
          </button>
        </form>
      </div>

      <!-- UBAH KATA SANDI -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-key"></i></div>
          <h3 class="section-title">Keamanan / Ubah Kata Sandi</h3>
        </div>

        <form id="formSandi" action="{{ url('/profil_admin/password') }}" method="POST">
          @csrf
          <div class="row-2">
            <div class="field">
              <label>Kata Sandi Lama</label>
              <input type="password" name="password_lama" placeholder="Masukkan kata sandi lama" required>
            </div>
          </div>

          <div class="row-2">
            <div class="field">
              <label>Kata Sandi Baru</label>
              <input type="password" name="password_baru" placeholder="Minimal 6 karakter" required minlength="6">
            </div>
            <div class="field">
              <label>Konfirmasi Kata Sandi Baru</label>
              <input type="password" name="password_baru_confirmation" placeholder="Ulangi kata sandi baru" required minlength="6">
            </div>
          </div>

          <button type="submit" class="btn-save">
            <i class="fa-solid fa-lock"></i> Update Kata Sandi
          </button>
        </form>
      </div>
    </div>
  </main>

  <div class="toast" id="toast">
    <i class="fa-solid fa-circle-check" style="color: #a7f3d0;"></i>
    <span id="toastMsg">Profil berhasil diperbarui!</span>
  </div>

<script>
  /* TOGGLE SIDEBAR (desktop: collapse | mobile: drawer + overlay) */
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    if (window.innerWidth <= 768) {
      const isOpen = sidebar.classList.toggle('mobile-open');
      toggleSidebarOverlay(isOpen);
    } else {
      sidebar.classList.toggle('collapsed');
      mainContent.classList.toggle('expanded');
    }
  }

  /* OVERLAY UNTUK SIDEBAR MOBILE */
  function toggleSidebarOverlay(show) {
    let overlay = document.getElementById('sidebarOverlay');
    if (!overlay) {
      overlay = document.createElement('div');
      overlay.id = 'sidebarOverlay';
      overlay.className = 'sidebar-overlay';
      overlay.addEventListener('click', function() {
        document.getElementById('sidebar').classList.remove('mobile-open');
        toggleSidebarOverlay(false);
      });
      document.body.appendChild(overlay);
    }
    overlay.classList.toggle('show', show);
  }

  /* RAPIKAN STATE SAAT UKURAN LAYAR BERUBAH */
  window.addEventListener('resize', function() {
    const sidebar = document.getElementById('sidebar');
    if (window.innerWidth > 768) {
      sidebar.classList.remove('mobile-open');
      toggleSidebarOverlay(false);
    }
  });

  /* DROPDOWN CMS SIDEBAR */
  function toggleCmsMenu() {
    const container = document.getElementById("dropdownCmsContainer");
    const arrow = document.getElementById("arrowCms");
    const btn = document.getElementById("btnCmsDropdown");

    container.classList.toggle("show");
    arrow.classList.toggle("rotate");
    btn.classList.toggle("active");
  }

  /* DROPDOWN USER TOPBAR */
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

  /* TOAST NOTIFIKASI */
  function showToast(msg) {
    const toast = document.getElementById('toast');
    document.getElementById('toastMsg').textContent = msg;
    toast.classList.add('show');
    setTimeout(() => toast.classList.remove('show'), 3000);
  }

  function logoutSystem() {
    if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
      alert("Anda telah keluar.");
      window.location.href =('/login');
    }
  }

  @if(session('success'))
    window.addEventListener('DOMContentLoaded', () => showToast(@json(session('success'))));
  @endif
  @if($errors->any())
    window.addEventListener('DOMContentLoaded', () => showToast(@json($errors->first())));
  @endif
</script>
</body>
</html>