<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Biodata Siswa — SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root{
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
  *{box-sizing:border-box;margin:0;padding:0;font-family:'Poppins',sans-serif;}
  body{background:var(--bg);color:var(--ink);display:flex;overflow-x:hidden;}

  /* ---------- SIDEBAR NAVIGASI SISWA ---------- */
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
  .sidebar.collapsed { left: -260px; }

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
    color: var(--dark); 
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
    background-color: var(--accent-light); 
  }

  .sidebar-bottom { 
    display: flex; 
    flex-direction: column; 
    gap: 10px; 
    border-top: 1px solid rgba(255, 255, 255, 0.12); 
    padding-top: 12px; 
  }
  .btn-logout-sidebar { 
    background-color: rgba(217, 83, 79, 0.2); 
    color: #ffb3b3; border: 1px solid rgba(217, 83, 79, 0.3); 
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
    box-shadow: 0 4px 12px rgba(0,0,0,0.1); 
    display: none; 
    flex-direction: column; 
    overflow: hidden; 
    z-index: 100; 
  }
  .user-dropdown.open { 
    display: flex; 
  }
  .user-dropdown a, .user-dropdown button { 
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
  .user-dropdown a:hover, .user-dropdown button:hover { 
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
    box-shadow: 0 2px 5px rgba(0,0,0,0.02); 
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

  .checkbox-group-container {
    display: flex;
    flex-direction: column;
    gap: 12px;
    background-color: #f8fafc;
    padding: 15px;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
  }

  .conditional-box {
    display: none;
    animation: fadeIn 0.3s ease-in-out;
  }
  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-5px); }
    to { opacity: 1; transform: translateY(0); }
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

  @media (max-width:920px){
    .sidebar {
      left: -260px;
      position: fixed; 
      z-index: 100; 
    }
    .sidebar.collapsed {
      left: 0;
      box-shadow: 0 0 40px rgba(0,0,0,0.35);
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
      height: 60px;
    }
    .page-title { font-size: 15px; }
    .user-name, .user-role { display: none; }
    .user-chip { gap: 8px; padding: 4px; }
    .user-dropdown { width: 150px; }

    .panel { padding: 18px; }
    .avatar-big { width: 56px; height: 56px; font-size: 24px; }
    .info-strip { gap: 18px; }

    .section { padding: 18px; }

    .row-2 {
      grid-template-columns: 1fr;
    }

    .form-footer {
      justify-content: stretch;
      flex-wrap: wrap;
    }
    .btn-back, .btn-save {
      flex: 1 1 auto;
      justify-content: center;
    }
  }

  @media (max-width:480px){
    .sidebar { width: 240px; left: -240px; }
    .sidebar.collapsed { left: 0; }
    .avatar-big { width: 48px; height: 48px; font-size: 20px; }
    .panel-head { gap: 14px; }
  }
</style>
</head>
<body>

  <!-- SIDEBAR NAVIGASI SISWA -->
  <aside class="sidebar" id="sidebar">
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
        <a href="{{ url('/biodata_siswa') }}" class="active"><i class="fa-solid fa-user-gear"></i> Profil Pendaftaran</a>
        <a href="{{ url('/berkas_pendaftaran') }}"><i class="fa-solid fa-file-lines"></i> Berkas Pendaftaran</a>
        <a href="{{ url('/cetak_kartu') }}"><i class="fa-solid fa-address-card"></i> Cetak Kartu</a>
        <a href="{{ url('/pengumuman_siswa') }}"><i class="fa-solid fa-bullhorn"></i> Pengumuman</a>
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
  </aside>

  <!-- MAIN CONTENT AREA -->
  <main class="main" id="mainContent">
    <div class="topbar">
      <div class="topbar-left">
        <button class="menu-toggle" id="menuToggle" aria-label="Buka/tutup sidebar">
          <i class="fa-solid fa-bars"></i>
        </button>
        <div>
          <h1 class="page-title">Edit Biodata Siswa</h1>
        </div>
      </div>

      <div class="user-chip-wrap">
        <button class="user-chip" id="userChipBtn" type="button">
          <div>
            <div class="user-name" id="namaSiswaDisplay">Calon Siswa 1</div>
            <div class="user-role" id="nisnDisplay">NISN: 0081234567</div>
          </div>
          <div class="avatar"><i class="fa-solid fa-user"></i></div>
          <i class="fa-solid fa-chevron-down" style="font-size: 11px; color: #888;"></i>
        </button>
        <div class="user-dropdown" id="userDropdown">
          <a href="{{ url('/biodata_siswa') }}"><i class="fa-solid fa-user"></i> Profil</a>
          <button class="logout-item" type="button" onclick="logoutSystem()"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
        </div>
      </div>
    </div>

    <form id="editForm" onsubmit="return false;">

      <!-- INFO PANEL -->
      <div class="panel">
        <div class="panel-head">
          <div class="avatar-big">
            <i class="fa-solid fa-user-pen"></i>
          </div>
          <div class="info-strip">
            <div class="info-item">
              <div class="info-icon"><i class="fa-solid fa-id-card"></i></div>
              <div><p class="info-label">No. Pendaftaran</p><p class="info-value" id="val_noPendaftaran">{{ $pendaftar->no_pendaftaran ?? 'SPMB-2027-000123' }}</p></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="fa-solid fa-shield-halved"></i></div>
              <div><p class="info-label">Status Pendaftaran</p><p class="info-value"><span class="badge">Aktif</span></p></div>
            </div>
            <div class="info-item">
              <div class="info-icon"><i class="fa-regular fa-calendar-check"></i></div>
              <div><p class="info-label">Terakhir Diperbarui</p><p class="info-value" id="lastUpdated">-</p></div>
            </div>
          </div>
        </div>
      </div>

      <!-- A. DATA CALON SISWA -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-user"></i></div>
          <h3 class="section-title">Data Lengkap Calon Siswa</h3>
        </div>

        <div class="row-2">
          <div class="field"><label>Nama Lengkap Calon Siswa<span class="req">*</span></label><input type="text" id="input_nama" class="req"></div>
          <div class="field"><label>Asal Sekolah<span class="req">*</span></label><input type="text" id="input_asalSekolah" class="req"></div>
        </div>

        <div class="row-2">
          <div class="field"><label>NISN<span class="req">*</span></label><input type="number" id="input_nisn" class="req"></div>
          <div class="field"><label>Nomor Hp Siswa (aktif)<span class="req">*</span></label><input type="number" id="input_hp" class="req"></div>
        </div>

        <div class="row-2">
          <div class="field"><label>Tempat Lahir<span class="req">*</span></label><input type="text" id="input_tempatLahir" class="req"></div>
          <div class="field">
            <label>Ukuran Fisik (Tinggi & Berat)<span class="req">*</span></label>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
              <input type="number" id="input_tinggi" class="req" placeholder="Tinggi (cm)">
              <input type="number" id="input_berat" class="req" placeholder="Berat (kg)">
            </div>
          </div>
        </div>

        <div class="row-2">
          <div class="field"><label>Tanggal Lahir<span class="req">*</span></label><input type="date" id="input_tglLahir" class="req"></div>
          <div class="field"><label>Jumlah Saudara<span class="req">*</span></label><input type="number" id="input_jumlahSaudara" class="req"></div>
        </div>

        <div class="row-2">
          <div class="field">
            <label>Jenis Kelamin<span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-option"><input type="radio" name="jenis_kelamin" value="L"> Laki-laki</label>
              <label class="radio-option"><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
            </div>
          </div>
          <div class="field">
            <label>Memiliki Kebutuhan Khusus?<span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-option"><input type="radio" name="kebutuhan_khusus" value="ya"> Ya</label>
              <label class="radio-option"><input type="radio" name="kebutuhan_khusus" value="tidak"> Tidak</label>
            </div>
          </div>
        </div>

        <div class="row-2">
          <div class="field"><label>Agama<span class="req">*</span></label><input type="text" id="input_agama" class="req"></div>
          <div class="field">
            <label>Penerima KPS / KKS / KIP?<span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-option"><input type="radio" name="is_penerima_bantuan" value="ya" onclick="toggleKphCard(true)"> Ya</label>
              <label class="radio-option"><input type="radio" name="is_penerima_bantuan" value="tidak" onclick="toggleKphCard(false)"> Tidak</label>
            </div>
          </div>
        </div>

        <div class="row-1 conditional-box" id="kph-card-selection">
          <div class="field">
            <label>Pilih Jenis Kartu yang Dimiliki</label>
            <div class="checkbox-group-container">
              <label class="radio-option"><input type="checkbox" name="jenis_bantuan" value="KPS"> KPS (Kartu Perlindungan Sosial)</label>
              <label class="radio-option"><input type="checkbox" name="jenis_bantuan" value="KKS"> KKS (Kartu Keluarga Sejahtera)</label>
              <label class="radio-option"><input type="checkbox" name="jenis_bantuan" value="KIP"> KIP (Kartu Indonesia Pintar)</label>
            </div>
          </div>
        </div>
      </div>

      <!-- B. DATA ORANG TUA / WALI -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-users"></i></div>
          <h3 class="section-title">Data Orang Tua / Wali</h3>
        </div>

        <!-- DATA AYAH -->
        <div class="parent-block">
          <div class="parent-block-title"><i class="fa-solid fa-person"></i> Data Ayah</div>
          <div class="row-2">
            <div class="field"><label>Nama Ayah<span class="req">*</span></label><input type="text" id="input_namaAyah" class="req"></div>
            <div class="field">
              <label>Pendidikan Terakhir<span class="req">*</span></label>
              <select id="select_pendidikanAyah" class="req">
                <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                <option value="tidak_sekolah">Tidak Sekolah</option>
                <option value="sd">SD / MI / Sederajat</option> 
                <option value="smp">SMP / Mts / Sederajat</option>
                <option value="sma">SMA / MA / SMK</option>
                <option value="diploma">D1 / D2 / D3</option>
                <option value="s1">S1 / D4</option>
                <option value="s2">S2 / S3</option>
              </select>
            </div>
          </div>

          <div class="row-2">
            <div class="field"><label>Pekerjaan Ayah<span class="req">*</span></label><input type="text" id="input_pekerjaanAyah" class="req"></div>
            <div class="field"><label>Tahun Lahir<span class="req">*</span></label><input type="text" id="input_tahunAyah" class="req"></div>
          </div>

          <div class="row-2">
            <div class="field">
              <label>Penghasilan Bulanan<span class="req">*</span></label>
              <select id="select_penghasilanAyah" class="req">
                <option value="" disabled selected>Pilih Penghasilan Bulanan</option>
                <option value="tidak_berpenghasilan">Tidak Berpenghasilan / Tidak Bekerja</option>
                <option value="kurang_1jt">Kurang dari Rp 1.000.000</option>
                <option value="1jt_2jt">Rp 1.000.000 - Rp 1.999.999</option>
                <option value="2jt_5jt">Rp 2.000.000 - Rp 4.999.999</option>
                <option value="5jt_20jt">Rp 5.000.000 - Rp 20.000.000</option>
                <option value="lebih_20jt">Lebih dari Rp 20.000.000</option>
              </select>
            </div>
            <div class="field"><label>Nomor Telepon Ayah<span class="req">*</span></label><input type="text" id="input_hpAyah" class="req"></div>
          </div>

          <div class="row-1">
            <div class="field">
              <label>Memiliki Kebutuhan Khusus?<span class="req">*</span></label>
              <div class="radio-group">
                <label class="radio-option"><input type="radio" name="ayah_kebutuhan_khusus" value="ya"> Ya</label>
                <label class="radio-option"><input type="radio" name="ayah_kebutuhan_khusus" value="tidak"> Tidak</label>
              </div>
            </div>
          </div>
        </div>

        <!-- DATA IBU -->
        <div class="parent-block">
          <div class="parent-block-title"><i class="fa-solid fa-person-dress"></i> Data Ibu</div>
          <div class="row-2">
            <div class="field"><label>Nama Ibu<span class="req">*</span></label><input type="text" id="input_namaIbu" class="req"></div>
            <div class="field">
              <label>Pendidikan Terakhir<span class="req">*</span></label>
              <select id="select_pendidikanIbu" class="req">
                <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                <option value="tidak_sekolah">Tidak Sekolah</option>
                <option value="sd">SD / MI / Sederajat</option> 
                <option value="smp">SMP / Mts / Sederajat</option>
                <option value="sma">SMA / MA / SMK</option>
                <option value="diploma">D1 / D2 / D3</option>
                <option value="s1">S1 / D4</option>
                <option value="s2">S2 / S3</option>
              </select>
            </div>
          </div>

          <div class="row-2">
            <div class="field"><label>Pekerjaan Ibu<span class="req">*</span></label><input type="text" id="input_pekerjaanIbu" class="req"></div>
            <div class="field"><label>Tahun Lahir<span class="req">*</span></label><input type="text" id="input_tahunIbu" class="req"></div>
          </div>

          <div class="row-2">
            <div class="field">
              <label>Penghasilan Bulanan<span class="req">*</span></label>
              <select id="select_penghasilanIbu" class="req">
                <option value="" disabled selected>Pilih Penghasilan Bulanan</option>
                <option value="tidak_berpenghasilan">Tidak Berpenghasilan / Tidak Bekerja</option>
                <option value="kurang_1jt">Kurang dari Rp 1.000.000</option>
                <option value="1jt_2jt">Rp 1.000.000 - Rp 1.999.999</option>
                <option value="2jt_5jt">Rp 2.000.000 - Rp 4.999.999</option>
                <option value="5jt_20jt">Rp 5.000.000 - Rp 20.000.000</option>
                <option value="lebih_20jt">Lebih dari Rp 20.000.000</option>
              </select>
            </div>
            <div class="field"><label>Nomor Telepon Ibu<span class="req">*</span></label><input type="text" id="input_hpIbu" class="req"></div>
          </div>

          <div class="row-1">
            <div class="field">
              <label>Memiliki Kebutuhan Khusus?<span class="req">*</span></label>
              <div class="radio-group">
                <label class="radio-option"><input type="radio" name="ibu_kebutuhan_khusus" value="ya"> Ya</label>
                <label class="radio-option"><input type="radio" name="ibu_kebutuhan_khusus" value="tidak"> Tidak</label>
              </div>
            </div>
          </div>
        </div>

        <!-- DATA WALI -->
        <div class="parent-block">
          <div class="parent-block-title"><i class="fa-solid fa-user-shield"></i> Data Wali (Diisi jika tidak tinggal dengan Orang Tua)</div>
          <div class="row-2">
            <div class="field"><label>Nama Wali</label><input type="text" id="input_nama_wali"></div>
            <div class="field">
              <label>Pendidikan Terakhir Wali</label>
              <select id="pendidikan_wali">
                <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                <option value="tidak_sekolah">Tidak Sekolah</option>
                <option value="sd">SD / MI / Sederajat</option> 
                <option value="smp">SMP / Mts / Sederajat</option>
                <option value="sma">SMA / MA / SMK</option>
                <option value="diploma">D1 / D2 / D3</option>
                <option value="s1">S1 / D4</option>
                <option value="s2">S2 / S3</option>
              </select>
            </div>
          </div>

          <div class="row-2">
            <div class="field"><label>Pekerjaan Wali</label><input type="text" id="input_pekerjaan_wali"></div>
            <div class="field">
              <label>Penghasilan Bulanan</label>
              <select id="penghasilan_wali_select">
                <option value="" disabled selected>Pilih Penghasilan Bulanan</option>
                <option value="tidak_berpenghasilan">Tidak Berpenghasilan / Tidak Bekerja</option>
                <option value="kurang_1jt">Kurang dari Rp 1.000.000</option>
                <option value="1jt_2jt">Rp 1.000.000 - Rp 1.999.999</option>
                <option value="2jt_5jt">Rp 2.000.000 - Rp 4.999.999</option>
                <option value="5jt_20jt">Rp 5.000.000 - Rp 20.000.000</option>
                <option value="lebih_20jt">Lebih dari Rp 20.000.000</option>
              </select>
            </div>
          </div>

          <div class="row-1">
            <div class="field"><label>Nomor Telepon Wali</label><input type="text" id="input_nomor_telepon_wali"></div>
          </div>
        </div>

      </div>

      <!-- C. DATA TEMPAT TINGGAL SISWA -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-house"></i></div>
          <h3 class="section-title">Data Tempat Tinggal Siswa</h3>
        </div>

        <div class="row-2">
          <div class="field">
            <label>Provinsi<span class="req">*</span></label>
            <select id="provinsi" class="req">
              <option value="">Pilih Provinsi</option>
            </select>
          </div>
          <div class="field"><label>Alamat Lengkap<span class="req">*</span></label><input type="text" id="input_alamatLengkap" class="req"></div>
        </div>

        <div class="row-2">
          <div class="field">
            <label>Kabupaten / Kota<span class="req">*</span></label>
            <select id="kabupaten" class="req" disabled>
              <option value="">Pilih Kabupaten</option>
            </select>
          </div>
          <div class="field">
            <label>RT / RW<span class="req">*</span></label>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
              <input type="number" id="input_rt" class="req" placeholder="RT">
              <input type="number" id="input_rw" class="req" placeholder="RW">
            </div>
          </div>
        </div>

        <div class="row-2">
          <div class="field">
            <label>Kecamatan<span class="req">*</span></label>
            <select id="kecamatan" class="req" disabled>
              <option value="">Pilih Kecamatan</option>
            </select>
          </div>
          <div class="field">
            <label>Jenis Tinggal<span class="req">*</span></label>
            <select id="select_jenisTinggal" class="req">
              <option value="" disabled selected>Pilih Jenis Tinggal</option>
              <option value="Rumah (Bersama Orang Tua)">Rumah (Bersama Orang Tua)</option>
              <option value="Wali">Asrama</option>
              <option value="Kos">Kos / Kontrak</option>
              <option value="Pondok Pesantren">Pondok Pesantren</option>
            </select>
          </div>
        </div>

        <div class="row-2">
          <div class="field">
            <label>Desa/Kelurahan<span class="req">*</span></label>
            <select id="kelurahan" class="req" disabled>
              <option value="">Pilih Kelurahan/Desa</option>
            </select>
          </div>
          <div class="field"><label>Alat Transportasi<span class="req">*</span></label><input type="text" id="input_transportasi" class="req"></div>
        </div>

        <div class="row-2">
          <div class="field"><label>Kode Pos<span class="req">*</span></label><input type="number" id="input_kodePos" class="req"></div>
          <div class="field"><label>Jarak ke Sekolah<span class="req">*</span></label><input type="text" id="input_jarakSekolah" class="req"></div>
        </div>
      </div>

      <!-- D. PILIHAN JURUSAN & GELOMBANG PENDAFTARAN -->
      <div class="section">
        <div class="section-head">
          <div class="section-icon"><i class="fa-solid fa-graduation-cap"></i></div>
          <h3 class="section-title">Pilihan Jurusan & Gelombang Pendaftaran</h3>
        </div>

        <div class="row-2">
          <div class="field">
            <label>Pilihan Kompetensi Keahlian (Jurusan 1)<span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-option"><input type="radio" name="jurusan_1" value="PPLG"> PPLG</label>
              <label class="radio-option"><input type="radio" name="jurusan_1" value="BCF"> BCF</label>
              <label class="radio-option"><input type="radio" name="jurusan_1" value="MPLB"> MPLB</label>
            </div>
          </div>

          <div class="field">
            <label>Pilihan Kompetensi Keahlian (Jurusan 2)<span class="req">*</span></label>
            <div class="radio-group">
              <label class="radio-option"><input type="radio" name="jurusan_2" value="PPLG"> PPLG</label>
              <label class="radio-option"><input type="radio" name="jurusan_2" value="BCF"> BCF</label>
              <label class="radio-option"><input type="radio" name="jurusan_2" value="MPLB"> MPLB</label>
            </div>
          </div>
        </div>

        <div class="row-1">
          <div class="field">
            <label>Pilih Gelombang Pendaftaran<span class="req">*</span></label>
            <select id="gelombang_pendaftaran" class="req" onchange="toggleGelombang(this.value)">
              <option value="" disabled selected>Pilih Gelombang Pendaftaran</option>
              <option value="Gelombang 1">Gelombang 1 (Januari - Maret 2026)</option>
              <option value="Gelombang 2">Gelombang 2 (April - Juli 2026)</option>
            </select>
          </div>
        </div>

        <!-- METODE PEMBAYARAN KONDISIONAL -->
        <div class="row-1 conditional-box" id="metode-pembayaran-container">
          <div class="field">
            <label>Pilih Metode Pembayaran Pendaftaran (Rp 20.000)<span class="req">*</span></label>
            <select id="metode_pembayaran" onchange="toggleMetodePembayaran(this.value)">
              <option value="" disabled selected>Pilih Metode Pembayaran</option>
              <option value="langsung">Bayar Langsung di Sekolah (Cash)</option>
              <option value="transfer">Transfer Bank (Via TF)</option>
            </select>
          </div>
        </div>

        <!-- INFO REKENING -->
        <div class="row-1 conditional-box" id="info-rekening-box">
          <div style="background-color: #e6f4f0; border: 1px solid #02403f; padding: 15px 20px; border-radius: 8px; font-size: 13px; color: #02403f;">
            <strong><i class="fa-solid fa-building-columns"></i> Informasi Rekening Pembayaran:</strong><br>
            Bank: <strong>Bank Jateng</strong><br>
            No. Rekening: <strong>3-012-34567-8</strong><br>
            Atas Nama: <strong>SMK Ma'arif Walisongo Kajoran</strong><br>
            <small style="color: #64748b; margin-top: 5px; display: block;">*Silakan lakukan transfer sesuai biaya pendaftaran, lalu simpan bukti transfer untuk diunggah.</small>
          </div>
        </div>

      </div>

      <div class="form-footer">
        <a href="{{ url('/biodata_siswa') }}" class="btn-back" id="btnKembali">
          <i class="fa-solid fa-arrow-left"></i> Kembali
        </a>
        <button type="button" class="btn-save" id="btnSimpan">
          <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
        </button>
      </div>
    </form>
  </main>

<div class="toast" id="toast">
  <i class="fa-solid fa-circle-check" style="color: #a7f3d0;"></i>
  <span id="toastMsg">Perubahan berhasil disimpan.</span>
</div>

<script>
// UI CONTROLS & DROPDOWN TOGGLES
const sidebar = document.getElementById("sidebar");
const mainContent = document.getElementById("mainContent");
document.getElementById("menuToggle").addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
  mainContent.classList.toggle("expanded");
});

/* PERILAKU SIDEBAR KHUSUS MOBILE/TABLET (<=920px) */
function isMobileView() {
  return window.innerWidth <= 920;
}

document.querySelectorAll('.menu-nav a').forEach(function(link) {
  link.addEventListener('click', function() {
    if (isMobileView()) {
      sidebar.classList.remove('collapsed');
      mainContent.classList.remove('expanded');
    }
  });
});

document.addEventListener('click', function(event) {
  if (!isMobileView()) return;
  if (!sidebar.classList.contains('collapsed')) return;

  const menuToggleBtn = document.getElementById('menuToggle');
  const clickedInsideSidebar = sidebar.contains(event.target);
  const clickedToggleBtn = menuToggleBtn && menuToggleBtn.contains(event.target);

  if (!clickedInsideSidebar && !clickedToggleBtn) {
    sidebar.classList.remove('collapsed');
    mainContent.classList.remove('expanded');
  }
});

let wasMobileView = isMobileView();
window.addEventListener('resize', function() {
  const nowMobileView = isMobileView();
  if (nowMobileView !== wasMobileView) {
    sidebar.classList.remove('collapsed');
    mainContent.classList.remove('expanded');
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

function toggleKphCard(isSelectIya) {
  const cardSelectionBox = document.getElementById('kph-card-selection');
  const checkboxes = document.querySelectorAll('input[name="jenis_kartu"]');
  
  if (isSelectIya) {
    cardSelectionBox.style.display = 'block';
  } else {
    cardSelectionBox.style.display = 'none';
    checkboxes.forEach(cb => { cb.checked = false; });
  }
}

function toggleGelombang(val) {
  const containerPembayaran = document.getElementById('metode-pembayaran-container');
  const selectPembayaran = document.getElementById('metode_pembayaran');
  const infoRekeningBox = document.getElementById('info-rekening-box');

  if (val && val.includes('Gelombang 2')) {
    containerPembayaran.style.display = 'block';
    selectPembayaran.classList.add('req');
  } else {
    containerPembayaran.style.display = 'none';
    infoRekeningBox.style.display = 'none';
    selectPembayaran.classList.remove('req', 'invalid');
    selectPembayaran.value = "";
  }
}

function toggleMetodePembayaran(val) {
  const infoRekening = document.getElementById('info-rekening-box');
  if (val === 'transfer') {
    infoRekening.style.display = 'block';
  } else {
    infoRekening.style.display = 'none';
  }
}

// SINKRONISASI JURUSAN 1 & 2
document.addEventListener("DOMContentLoaded", function () {
  const jurusan1Radios = document.querySelectorAll('input[name="jurusan_1"]');
  const jurusan2Radios = document.querySelectorAll('input[name="jurusan_2"]');

  function sinkronisasiJurusan() {
    let valueTerpilihJ1 = "";
    jurusan1Radios.forEach(radio => {
      if (radio.checked) valueTerpilihJ1 = radio.value;
    });
    jurusan2Radios.forEach(radio => {
      if (radio.value === valueTerpilihJ1) {
        radio.disabled = true;
        if (radio.checked) radio.checked = false;
      } else {
        radio.disabled = false;
      }
    });
  }

  jurusan1Radios.forEach(radio => radio.addEventListener('change', sinkronisasiJurusan));
  jurusan2Radios.forEach(radio => radio.addEventListener('change', sinkronisasiJurusan));
});

// MEMUAT REGION API EMSIFA (PROVINSI, KABUPATEN, KECAMATAN, KELURAHAN)
const baseAPI = 'https://www.emsifa.com/api-wilayah-indonesia/api';
const selectProvinsi = document.getElementById('provinsi');
const selectKabupaten = document.getElementById('kabupaten');
const selectKecamatan = document.getElementById('kecamatan');
const selectKelurahan = document.getElementById('kelurahan');

async function loadProvinces() {
  try {
    const response = await fetch(baseAPI + '/provinces.json');
    const provinces = await response.json();
    provinces.forEach(prov => {
      let option = document.createElement('option');
      option.value = prov.id;
      option.textContent = prov.name;
      selectProvinsi.appendChild(option);
    });
  } catch(err) {
    console.error('Gagal memuat provinsi:', err);
  }
}

selectProvinsi.addEventListener('change', async function() {
  await loadKabupaten(this.value);
});

async function loadKabupaten(provId, selectedVal = '') {
  selectKabupaten.innerHTML = '<option value="">Pilih Kabupaten</option>';
  selectKecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
  selectKelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
  selectKecamatan.disabled = true;
  selectKelurahan.disabled = true;

  if (provId) {
    try {
      const response = await fetch(baseAPI + '/regencies/' + provId + '.json');
      const regencies = await response.json();
      regencies.forEach(kab => {
        let option = document.createElement('option');
        option.value = kab.id;
        option.textContent = kab.name;
        selectKabupaten.appendChild(option);
      });
      selectKabupaten.disabled = false;
      if (selectedVal) selectKabupaten.value = selectedVal;
    } catch(err) { console.error(err); }
  } else {
    selectKabupaten.disabled = true;
  }
}

selectKabupaten.addEventListener('change', async function() {
  await loadKecamatan(this.value);
});

async function loadKecamatan(kabId, selectedVal = '') {
  selectKecamatan.innerHTML = '<option value="">Pilih Kecamatan</option>';
  selectKelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';
  selectKecamatan.disabled = true;
  selectKelurahan.disabled = true;

  if (kabId) {
    try {
      const response = await fetch(baseAPI + '/districts/' + kabId + '.json');
      const districts = await response.json();
      districts.forEach(kec => {
        let option = document.createElement('option');
        option.value = kec.id;
        option.textContent = kec.name;
        selectKecamatan.appendChild(option);
      });
      selectKecamatan.disabled = false;
      if (selectedVal) selectKecamatan.value = selectedVal;
    } catch(err) { console.error(err); }
  } else {
    selectKecamatan.disabled = true;
  }
}

selectKecamatan.addEventListener('change', async function() {
  await loadKelurahan(this.value);
});

async function loadKelurahan(kecId, selectedVal = '') {
  selectKelurahan.innerHTML = '<option value="">Pilih Kelurahan/Desa</option>';

  if (kecId) {
    try {
      const response = await fetch(baseAPI + '/villages/' + kecId + '.json');
      const villages = await response.json();
      villages.forEach(des => {
        let option = document.createElement('option');
        option.value = des.id;
        option.textContent = des.name;
        selectKelurahan.appendChild(option);
      });
      selectKelurahan.disabled = false;
      if (selectedVal) selectKelurahan.value = selectedVal;
    } catch(err) { console.error(err); }
  } else {
    selectKelurahan.disabled = true;
  }
}

// BACA DATA DARI LOCALSTORAGE & AUTO-FILL KETIKA HALAMAN DIMUAT
document.addEventListener('DOMContentLoaded', async function() {
  await loadProvinces();
  const data = JSON.parse(localStorage.getItem('data_pendaftaran'));

  if (data) {
    if (data.nama) {
      document.getElementById('namaSiswaDisplay').innerText = data.nama;
      document.getElementById('input_nama').value = data.nama;
    }
    if (data.nisn) {
      document.getElementById('nisnDisplay').innerText = 'NISN: ' + data.nisn;
      document.getElementById('input_nisn').value = data.nisn;
    }
    if (data.lastUpdated) {
      document.getElementById('lastUpdated').innerText = data.lastUpdated;
    }

    if (data.asalSekolah) document.getElementById('input_asalSekolah').value = data.asalSekolah;
    if (data.hp) document.getElementById('input_hp').value = data.hp;
    if (data.tempatLahir) document.getElementById('input_tempatLahir').value = data.tempatLahir;
    if (data.tglLahir) document.getElementById('input_tglLahir').value = data.tglLahir;
    if (data.tinggi) document.getElementById('input_tinggi').value = data.tinggi;
    if (data.berat) document.getElementById('input_berat').value = data.berat;
    if (data.jumlahSaudara) document.getElementById('input_jumlahSaudara').value = data.jumlahSaudara;
    if (data.agama) document.getElementById('input_agama').value = data.agama;

    if (data.jenisKelamin) {
      const radioJK = document.querySelector(`input[name="jenis_kelamin"][value="${data.jenisKelamin}"]`);
      if (radioJK) radioJK.checked = true;
    }

    if (data.kebutuhanKhusus) {
      const radioKhusus = document.querySelector(`input[name="kebutuhan_khusus"][value="${data.kebutuhanKhusus}"]`);
      if (radioKhusus) radioKhusus.checked = true;
    }

    if (data.penerimaKps) {
      const radioKps = document.querySelector(`input[name="penerima_kps"][value="${data.penerimaKps}"]`);
      if (radioKps) radioKps.checked = true;
      if (data.penerimaKps === 'ya') {
        toggleKphCard(true);
        if (data.jenisKartu && Array.isArray(data.jenisKartu)) {
          data.jenisKartu.forEach(val => {
            const cb = document.querySelector(`input[name="jenis_kartu"][value="${val}"]`);
            if (cb) cb.checked = true;
          });
        }
      } else {
        toggleKphCard(false);
      }
    }

    if (data.namaAyah) document.getElementById('input_namaAyah').value = data.namaAyah;
    if (data.pendidikanAyah) document.getElementById('select_pendidikanAyah').value = data.pendidikanAyah;
    if (data.pekerjaanAyah) document.getElementById('input_pekerjaanAyah').value = data.pekerjaanAyah;
    if (data.tahunAyah) document.getElementById('input_tahunAyah').value = data.tahunAyah;
    if (data.penghasilanAyah) document.getElementById('select_penghasilanAyah').value = data.penghasilanAyah;
    if (data.hpAyah) document.getElementById('input_hpAyah').value = data.hpAyah;
    if (data.khususAyah) {
      const radioKhususAyah = document.querySelector(`input[name="kebutuhan_khusus_ayah"][value="${data.khususAyah}"]`);
      if (radioKhususAyah) radioKhususAyah.checked = true;
    }

    if (data.namaIbu) document.getElementById('input_namaIbu').value = data.namaIbu;
    if (data.pendidikanIbu) document.getElementById('select_pendidikanIbu').value = data.pendidikanIbu;
    if (data.pekerjaanIbu) document.getElementById('input_pekerjaanIbu').value = data.pekerjaanIbu;
    if (data.tahunIbu) document.getElementById('input_tahunIbu').value = data.tahunIbu;
    if (data.penghasilanIbu) document.getElementById('select_penghasilanIbu').value = data.penghasilanIbu;
    if (data.hpIbu) document.getElementById('input_hpIbu').value = data.hpIbu;
    if (data.khususIbu) {
      const radioKhususIbu = document.querySelector(`input[name="kebutuhan_khusus_ibu"][value="${data.khususIbu}"]`);
      if (radioKhususIbu) radioKhususIbu.checked = true;
    }

    if (data.namaWali) document.getElementById('input_nama_wali').value = data.namaWali;
    if (data.pendidikanWali) document.getElementById('pendidikan_wali').value = data.pendidikanWali;
    if (data.pekerjaanWali) document.getElementById('input_pekerjaan_wali').value = data.pekerjaanWali;
    if (data.penghasilanWali) document.getElementById('penghasilan_wali_select').value = data.penghasilanWali;
    if (data.hpWali) document.getElementById('input_nomor_telepon_wali').value = data.hpWali;

    if (data.alamatLengkap) document.getElementById('input_alamatLengkap').value = data.alamatLengkap;
    if (data.rt) document.getElementById('input_rt').value = data.rt;
    if (data.rw) document.getElementById('input_rw').value = data.rw;
    if (data.jenisTinggal) document.getElementById('select_jenisTinggal').value = data.jenisTinggal;
    if (data.transportasi) document.getElementById('input_transportasi').value = data.transportasi;
    if (data.kodePos) document.getElementById('input_kodePos').value = data.kodePos;
    if (data.jarakSekolah) document.getElementById('input_jarakSekolah').value = data.jarakSekolah;

    if (data.provinsi) {
      selectProvinsi.value = data.provinsi;
      await loadKabupaten(data.provinsi, data.kabupaten);
      if (data.kabupaten) {
        await loadKecamatan(data.kabupaten, data.kecamatan);
        if (data.kecamatan) {
          await loadKelurahan(data.kecamatan, data.kelurahan);
        }
      }
    }

    if (data.jurusan1) {
      const radioJ1 = document.querySelector(`input[name="jurusan_1"][value="${data.jurusan1}"]`);
      if (radioJ1) radioJ1.checked = true;
    }
    if (data.jurusan2) {
      const radioJ2 = document.querySelector(`input[name="jurusan_2"][value="${data.jurusan2}"]`);
      if (radioJ2) radioJ2.checked = true;
    }
    if (data.gelombang) {
      document.getElementById('gelombang_pendaftaran').value = data.gelombang;
      toggleGelombang(data.gelombang);
    }
    if (data.metodePembayaran) {
      document.getElementById('metode_pembayaran').value = data.metodePembayaran;
      toggleMetodePembayaran(data.metodePembayaran);
    }
  }
});

// VALIDASI FORM & SIMPAN PERUBAHAN
const form = document.getElementById("editForm");
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

  const existingData = JSON.parse(localStorage.getItem('data_pendaftaran')) || {};

  const now = new Date();
  const tanggal = now.toLocaleDateString("id-ID", { day: "2-digit", month: "long", year: "numeric" });
  const jam = now.toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit" });
  const updatedTimestamp = `${tanggal}, ${jam} WIB`;
  document.getElementById("lastUpdated").textContent = updatedTimestamp;

  const selectedJK = document.querySelector('input[name="jenis_kelamin"]:checked')?.value || 'L';
  const selectedKhususSiswa = document.querySelector('input[name="kebutuhan_khusus"]:checked')?.value || 'tidak';
  const selectedPenerimaKps = document.querySelector('input[name="penerima_kps"]:checked')?.value || 'tidak';

  const jenisKartuArr = [];
  if (selectedPenerimaKps === 'ya') {
    document.querySelectorAll('input[name="jenis_kartu"]:checked').forEach(cb => {
      jenisKartuArr.push(cb.value);
    });
  }

  const selectedKhususAyah = document.querySelector('input[name="kebutuhan_khusus_ayah"]:checked')?.value || 'tidak';
  const selectedKhususIbu = document.querySelector('input[name="kebutuhan_khusus_ibu"]:checked')?.value || 'tidak';
  const selectedJ1 = document.querySelector('input[name="jurusan_1"]:checked')?.value || 'PPLG';
  const selectedJ2 = document.querySelector('input[name="jurusan_2"]:checked')?.value || 'BCF';

  const selectProv = document.getElementById('provinsi');
  const selectKab = document.getElementById('kabupaten');
  const selectKec = document.getElementById('kecamatan');
  const selectKel = document.getElementById('kelurahan');

  const selectPendAyah = document.getElementById('select_pendidikanAyah');
  const selectPenghasilanAyah = document.getElementById('select_penghasilanAyah');
  const selectPendIbu = document.getElementById('select_pendidikanIbu');
  const selectPenghasilanIbu = document.getElementById('select_penghasilanIbu');
  const selectPendWali = document.getElementById('pendidikan_wali');
  const selectPenghasilanWali = document.getElementById('penghasilan_wali_select');

  const updatedData = {
    ...existingData,
    lastUpdated: updatedTimestamp,
    nama: document.getElementById('input_nama').value.trim(),
    nisn: document.getElementById('input_nisn').value.trim(),
    asalSekolah: document.getElementById('input_asalSekolah').value.trim(),
    hp: document.getElementById('input_hp').value.trim(),
    tempatLahir: document.getElementById('input_tempatLahir').value.trim(),
    tglLahir: document.getElementById('input_tglLahir').value,
    tinggi: document.getElementById('input_tinggi').value.trim(),
    berat: document.getElementById('input_berat').value.trim(),
    jumlahSaudara: document.getElementById('input_jumlahSaudara').value.trim(),
    jenisKelamin: selectedJK,
    kebutuhanKhusus: selectedKhususSiswa,
    agama: document.getElementById('input_agama').value.trim(),
    penerimaKps: selectedPenerimaKps,
    jenisKartu: jenisKartuArr,

    namaAyah: document.getElementById('input_namaAyah').value.trim(),
    pendidikanAyah: selectPendAyah.value,
    pendidikanAyahText: selectPendAyah.options[selectPendAyah.selectedIndex]?.text || '-',
    pekerjaanAyah: document.getElementById('input_pekerjaanAyah').value.trim(),
    tahunAyah: document.getElementById('input_tahunAyah').value.trim(),
    penghasilanAyah: selectPenghasilanAyah.value,
    penghasilanAyahText: selectPenghasilanAyah.options[selectPenghasilanAyah.selectedIndex]?.text || '-',
    hpAyah: document.getElementById('input_hpAyah').value.trim(),
    khususAyah: selectedKhususAyah,

    namaIbu: document.getElementById('input_namaIbu').value.trim(),
    pendidikanIbu: selectPendIbu.value,
    pendidikanIbuText: selectPendIbu.options[selectPendIbu.selectedIndex]?.text || '-',
    pekerjaanIbu: document.getElementById('input_pekerjaanIbu').value.trim(),
    tahunIbu: document.getElementById('input_tahunIbu').value.trim(),
    penghasilanIbu: selectPenghasilanIbu.value,
    penghasilanIbuText: selectPenghasilanIbu.options[selectPenghasilanIbu.selectedIndex]?.text || '-',
    hpIbu: document.getElementById('input_hpIbu').value.trim(),
    khususIbu: selectedKhususIbu,

    namaWali: document.getElementById('input_nama_wali').value.trim() || '-',
    pendidikanWali: selectPendWali.value,
    pendidikanWaliText: selectPendWali.options[selectPendWali.selectedIndex]?.text || '-',
    pekerjaanWali: document.getElementById('input_pekerjaan_wali').value.trim() || '-',
    penghasilanWali: selectPenghasilanWali.value,
    penghasilanWaliText: selectPenghasilanWali.options[selectPenghasilanWali.selectedIndex]?.text || '-',
    hpWali: document.getElementById('input_nomor_telepon_wali').value.trim() || '-',

    provinsi: selectProv.value,
    provinsiText: selectProv.options[selectProv.selectedIndex]?.text || '-',
    kabupaten: selectKab.value,
    kabupatenText: selectKab.options[selectKab.selectedIndex]?.text || '-',
    kecamatan: selectKec.value,
    kecamatanText: selectKec.options[selectKec.selectedIndex]?.text || '-',
    kelurahan: selectKel.value,
    kelurahanText: selectKel.options[selectKel.selectedIndex]?.text || '-',
    alamatLengkap: document.getElementById('input_alamatLengkap').value.trim(),
    rt: document.getElementById('input_rt').value.trim(),
    rw: document.getElementById('input_rw').value.trim(),
    jenisTinggal: document.getElementById('select_jenisTinggal').value,
    transportasi: document.getElementById('input_transportasi').value.trim(),
    kodePos: document.getElementById('input_kodePos').value.trim(),
    jarakSekolah: document.getElementById('input_jarakSekolah').value.trim(),

    jurusan1: selectedJ1,
    jurusan2: selectedJ2,
    gelombang: document.getElementById('gelombang_pendaftaran').value,
    metodePembayaran: document.getElementById('metode_pembayaran').value || 'gratis'
  };

  localStorage.setItem('data_pendaftaran', JSON.stringify(updatedData));

  showToast("Perubahan berhasil disimpan.");

  setTimeout(() => {
    window.location.href = "{{ url('/biodata_siswa') }}";
  }, 1200);
});

function hubungiAdminWA() {
  const elemNama = document.getElementById('namaSiswaDisplay');
  const namaSiswa = elemNama ? elemNama.innerText.trim() : "Calon Siswa";
  const noAdmin = "622933195678";
  const teksPesan = `Halo Admin SPMB SMK Ma'arif Walisongo Kajoran, nama saya *${namaSiswa}*. Saya mau bertanya/mengajukan kendala terkait pendaftaran online. Mohon bantuannya, terima kasih!`;
  const urlWA = `https://wa.me/${noAdmin}?text=${encodeURIComponent(teksPesan)}`;
  window.open(urlWA, '_blank');
}

function logoutSystem() {
  if (confirm("Apakah Anda yakin ingin keluar dari sistem?")) {
    window.location.href = "{{ url('/log-in') }}";
  }
}
</script>
</body>
</html>