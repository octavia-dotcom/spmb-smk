<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Pendaftaran — SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <style>
        :root {
            --dark: #022c22;
            --accent: #047857;
            --accent-light: #e6f4ea;
            --bg: #f8f9fa;
            --line: #e2e8f0;
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
            color: #333;
            display: flex;
            overflow-x: hidden;
        }

        /* SIDEBAR NAVIGASI */
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
            font-weight: 700;
            line-height: 1.2;
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

        .menu-nav a:hover, 
        .menu-nav a.active {
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
            background-color: #e6f4ea;
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
            transition: background 0.2s;
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

        /* TOPBAR & USER CHIP */
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

        .nisn-display {
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

        /* CONTAINER KARTU & TOMBOL */
        .card-container-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 24px;
            margin-top: 10px;
        }

        .card-pendaftaran {
            width: 100%;
            max-width: 820px;
            background: #ffffff;
            border: 2px solid #1e4d3b;
            border-radius: 20px;
            padding: 24px 30px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
            position: relative;
        }

        .card-header-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #1e4d3b;
            padding-bottom: 16px;
            margin-bottom: 20px;
        }

        .brand-logo-title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo-title img {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .brand-text h3 {
            font-size: 14px;
            font-weight: 700;
            color: #1e4d3b;
            line-height: 1.2;
            text-transform: uppercase;
        }

        .brand-text p {
            font-size: 11px;
            color: #555;
        }

        .card-main-title {
            text-align: left;
            border-left: 2px solid #ddd;
            padding-left: 15px;
        }

        .card-main-title h2 {
            font-size: 22px;
            font-weight: 800;
            color: #022c22;
            letter-spacing: 0.5px;
        }

        .card-main-title p {
            font-size: 13px;
            color: #555;
        }

        .badge-status-aktif {
            background: #e6f4ea;
            color: #047857;
            border: 1px solid #a7f3d0;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .card-body-area {
            display: grid;
            grid-template-columns: 210px 1fr;
            gap: 24px;
            margin-bottom: 20px;
        }

        .photo-box {
            width: 210px;
            height: 260px;
            border-radius: 16px;
            background-color: #047857;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a7f3d0;
            border: 2px dashed #047857;
        }

        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .photo-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            color: #ffffff;
            text-align: center;
            padding: 10px;
        }

        .photo-placeholder i {
            font-size: 64px;
            color: #a7f3d0;
        }

        .photo-placeholder span {
            font-size: 11px;
            color: #a7f3d0;
            font-weight: 500;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table td {
            padding: 6px 0;
            font-size: 13.5px;
            vertical-align: top;
        }

        .details-table td.label-col {
            width: 170px;
            color: #4b5563;
            font-weight: 500;
        }

        .details-table td.sep-col {
            width: 15px;
            color: #4b5563;
        }

        .details-table td.val-col {
            font-weight: 700;
            color: #111827;
        }

        .details-table td.val-col.highlight-green {
            color: #047857;
        }

        .card-footer-area {
            border-top: 1px solid var(--line);
            padding-top: 16px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .reg-num-title {
            font-size: 10px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .reg-num-value {
            font-size: 24px;
            font-weight: 800;
            color: #022c22;
            border-bottom: 2px solid #a7f3d0;
            display: inline-block;
            padding-bottom: 4px;
            margin-bottom: 10px;
        }

        .reg-date-title {
            font-size: 10px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
        }

        .reg-date-val {
            font-size: 12px;
            font-weight: 600;
            color: #374151;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 2px;
        }

        .pengesahan-title {
            font-size: 10px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .pengesahan-location {
            font-size: 12px;
            color: #374151;
            margin-top: 4px;
        }

        .pengesahan-role {
            font-size: 12px;
            font-weight: 700;
            color: #111827;
            margin-top: 2px;
        }

        .notice-banner {
            background: #f0fdf4;
            border-radius: 10px;
            padding: 10px 16px;
            font-size: 12px;
            color: #166534;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 16px;
        }

        /* TOMBOL AKSI CETAK & BAGIKAN */
        .action-buttons {
            display: flex;
            gap: 16px;
            width: 100%;
            max-width: 820px;
            justify-content: center;
        }

        .btn-action-print {
            flex: 1;
            background: var(--accent);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 4px 10px rgba(4,120,87,0.2);
            transition: background 0.2s;
        }

        .btn-action-print:hover {
            background: var(--dark);
        }

        .btn-action-share {
            flex: 1;
            background: #ffffff;
            color: #047857;
            border: 2px solid #047857;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s;
        }

        .btn-action-share:hover {
            background: #e6f4ea;
        }

        /* ==================== RESPONSIVE ==================== */

        @media (max-width: 992px) {
            .card-pendaftaran,
            .action-buttons {
                max-width: 100%;
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

            .main,
            .main.expanded {
                margin-left: 0;
                width: 100%;
                padding: 0 16px 40px;
            }

            .topbar {
                margin: 0 -16px 18px -16px;
                padding: 0 16px;
                height: 58px;
                flex-wrap: nowrap;
            }

            .page-title {
                font-size: 14px;
            }

            .user-name {
                font-size: 12px;
            }

            .nisn-display {
                font-size: 10px;
            }

            .avatar {
                width: 32px;
                height: 32px;
                font-size: 12px;
            }

            .card-container-wrapper {
                gap: 16px;
                margin-top: 6px;
            }

            .card-pendaftaran {
                padding: 18px 16px;
                border-radius: 14px;
            }

            .card-header-area {
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .brand-logo-title {
                flex-wrap: wrap;
                row-gap: 10px;
            }

            .card-main-title {
                border-left: none;
                padding-left: 0;
            }

            .badge-status-aktif {
                align-self: flex-start;
            }

            .card-body-area {
                grid-template-columns: 1fr;
                justify-items: center;
                gap: 18px;
            }

            .photo-box {
                width: 160px;
                height: 200px;
            }

            .details-table {
                width: 100%;
            }

            .details-table td.label-col {
                width: 130px;
                font-size: 12px;
            }

            .details-table td.val-col {
                font-size: 12px;
            }

            .card-footer-area {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-action-print,
            .btn-action-share {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .card-main-title h2 {
                font-size: 18px;
            }

            .card-main-title p {
                font-size: 11px;
            }

            .brand-text h3 {
                font-size: 12px;
            }

            .brand-text p {
                font-size: 10px;
            }

            .details-table td.label-col {
                width: 100px;
                font-size: 11px;
            }

            .details-table td.val-col {
                font-size: 11px;
            }

            .reg-num-value {
                font-size: 20px;
            }

            .notice-banner {
                font-size: 11px;
                padding: 8px 12px;
            }
        }

        /* CSS KHUSUS CETAK/PRINT */
        @media print {
            body {
                background: white;
            }
            .sidebar, 
            .topbar, 
            .action-buttons {
                display: none !important;
            }
            .main {
                margin-left: 0 !important;
                width: 100% !important;
                padding: 0 !important;
            }
            .card-container-wrapper {
                margin-top: 0;
            }
            .card-pendaftaran {
                box-shadow: none;
                width: 100%;
                max-width: 100%;
                border: 2px solid #1e4d3b;
                page-break-inside: avoid;
                padding: 24px 30px;
                border-radius: 20px;
            }

            /* PAKSA LAYOUT DESKTOP SAAT CETAK/PDF, ABAIKAN MEDIA QUERY MOBILE
               (dialog print/save-as-pdf sering memakai lebar viewport yang kecil,
               sehingga tanpa override ini tampilan cetak jatuh ke breakpoint mobile) */
            .card-header-area {
                flex-direction: row !important;
                align-items: center !important;
                gap: 0 !important;
            }

            .card-main-title {
                border-left: 2px solid #ddd !important;
                padding-left: 15px !important;
            }

            .card-body-area {
                display: grid !important;
                grid-template-columns: 210px 1fr !important;
                justify-items: stretch !important;
                gap: 24px !important;
            }

            .photo-box {
                width: 210px !important;
                height: 260px !important;
            }

            .details-table td.label-col {
                width: 170px !important;
                font-size: 13.5px !important;
            }

            .details-table td.val-col {
                font-size: 13.5px !important;
            }

            .card-footer-area {
                grid-template-columns: 1fr 1fr !important;
                gap: 20px !important;
            }

            .card-main-title h2 {
                font-size: 22px !important;
            }

            .card-main-title p {
                font-size: 13px !important;
            }

            .brand-text h3 {
                font-size: 14px !important;
            }

            .brand-text p {
                font-size: 11px !important;
            }

            .reg-num-value {
                font-size: 24px !important;
            }

            .notice-banner {
                font-size: 12px !important;
                padding: 10px 16px !important;
            }
        }
    </style>
</head>
<body>

  <!-- SIDEBAR NAVIGASI -->
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
        <a href="{{ url('/biodata_siswa') }}"><i class="fa-solid fa-user-gear"></i> Profil Pendaftaran</a>
        <a href="{{ url('/berkas_pendaftaran') }}"><i class="fa-solid fa-file-lines"></i> Berkas Pendaftaran</a>
        <a href="{{ url('/cetak_kartu') }}" class="active"><i class="fa-solid fa-address-card"></i> Cetak Kartu</a>
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
        <div class="sidebar-bottom">
          <div class="sidebar-copyright">
            &copy; 2026 SMK Ma'Arif Walisongo Kajoran<br>All Rights Reserved
          </div>
        </div>
      </div>
    </div>
  </aside>

  <!-- MAIN AREA -->
  <main class="main" id="mainContent">
    <div class="topbar">
      <div class="topbar-left">
        <button class="menu-toggle" id="menuToggle"><i class="fa-solid fa-bars"></i></button>
        <h1 class="page-title">Kartu Pendaftaran Siswa</h1>
      </div>

      <!-- PROFIL -->
      <div class="user-chip-wrap">
        <button class="user-chip" id="userChipBtn" type="button">
          <div>
            <div class="user-name" id="namaSiswaDisplay">{{ $pendaftar->nama_lengkap ?? 'Calon Siswa' }}</div>
            <div class="nisn-display" id="nisnSiswaDisplay">NISN: {{ $pendaftar->nisn ?? '-' }}</div>
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

    <div class="card-container-wrapper">
      
      <!-- DESAIN KARTU -->
      <div class="card-pendaftaran" id="printableCard">
        
        <div class="card-header-area">
          <div class="brand-logo-title">
            <img src="{{ asset('img/logo.smk.png') }}" alt="Logo" onerror="this.src='https://via.placeholder.com/50';">
            <div class="brand-text">
              <h3>SMK Ma'arif Walisongo Kajoran</h3>
              <p>Jl.Kh Ridwan Sidowangi Kajoran 56163</p>
            </div>
            <div class="card-main-title">
              <h2>KARTU PENDAFTARAN</h2>
              <p>SPMB Tahun Ajaran 2027/2028</p>
            </div>
          </div>
          <div class="badge-status-aktif">
            <i class="fa-solid fa-circle" style="font-size: 5px;"></i> Pendaftaran Aktif
          </div>
        </div>

        <div class="card-body-area">
          <div class="photo-box" id="photoContainer">
            @if(!empty($pendaftar?->dokumen && $pendaftar->dokumen->pas_foto))
              <img src="{{ asset('storage/' . $pendaftar->dokumen->pas_foto) }}" alt="Pas Foto" style="width: 100%; height: 100%; object-fit: cover;">
            @else
              <div class="photo-placeholder">
                <i class="fa-solid fa-user"></i>
                <span>Foto Belum Diunggah</span>
              </div>
            @endif
          </div>

          <table class="details-table">
            <tr>
              <td class="label-col">Nama Lengkap</td>
              <td class="sep-col">:</td>
              <td class="val-col">{{ strtoupper($pendaftar->nama_lengkap ?? '-') }}</td>
            </tr>
            <tr>
              <td class="label-col">NISN</td>
              <td class="sep-col">:</td>
              <td class="val-col">{{ $pendaftar->nisn ?? '-' }}</td>
            </tr>
            <tr>
              <td class="label-col">Nomor Pendaftaran</td>
              <td class="sep-col">:</td>
              <td class="val-col highlight-green">{{ $pendaftar->no_pendaftaran ?? '-' }}</td>
            </tr>
            <tr>
              <td class="label-col">Tempat, Tanggal Lahir</td>
              <td class="sep-col">:</td>
              <td class="val-col">{{ $pendaftar?->tempat_lahir ?? '-' }}, {{ $pendaftar->tanggal_lahir ?? '-' }}</td>
            </tr>
            <tr>
              <td class="label-col">Jenis Kelamin</td>
              <td class="sep-col">:</td>
              <td class="val-col">
                @if($pendaftar?->jenis_kelamin == 'P' || strtolower($pendaftar?->jenis_kelamin) == 'perempuan')
                    Perempuan
                @elseif($pendaftar?->jenis_kelamin == 'L' || strtolower($pendaftar?->jenis_kelamin) == 'laki-laki')
                    Laki-Laki
                @else
                    {{ $pendaftar?->jenis_kelamin ?? '-' }}
                @endif
              </td>
            </tr>
            <tr>
              <td class="label-col">Asal Sekolah</td>
              <td class="sep-col">:</td>
              <td class="val-col">{{ $pendaftar->asal_sekolah ?? '-' }}</td>
            </tr>
            <tr>
              <td class="label-col">Jurusan Pilihan</td>
              <td class="sep-col">:</td>
              <td class="val-col">{{ $pendaftar->jurusanPilihan1->nama_jurusan ?? '-' }}</td>
            </tr>
          </table>
        </div>

        <div class="card-footer-area">
          <div>
            <div class="reg-num-title">NOMOR PENDAFTARAN</div>
            <div class="reg-num-value">{{ $pendaftar->no_pendaftaran ?? '-' }}</div>
            <div class="reg-date-title">TANGGAL PENDAFTARAN</div>
            <div class="reg-date-val">
              <i class="fa-regular fa-calendar-days"></i> 
              <span>{{ $pendaftar?->created_at ? $pendaftar?->created_at->translatedFormat('d M Y') : '-' }}</span>
            </div>
          </div>

          <div>
            <div class="pengesahan-title">PENGESAHAN PANITIA SPMB</div>
            <div class="pengesahan-location">
                Kajoran, {{ $pendaftar?->created_at ? $pendaftar?->created_at->translatedFormat('d M Y') : date('d M Y') }}
            </div>
            <div class="pengesahan-role">Panitia SPMB</div>
          </div>
        </div>

        <div class="notice-banner">
          <i class="fa-solid fa-circle-info"></i> Kartu ini wajib dibawa saat proses seleksi dan daftar ulang.
        </div>

      </div>

      <!-- TOMBOL CETAK DAN BAGIKAN -->
      <div class="action-buttons">
        <button class="btn-action-print" onclick="cetakPDFDirect()">
          <i class="fa-solid fa-print"></i> Cetak Kartu Pendaftaran
        </button>
        <button class="btn-action-share" onclick="bagikanKartuPDF()">
          <i class="fa-solid fa-share-nodes"></i> Bagikan Kartu
        </button>
      </div>

    </div>
  </main>

<script>
  /* TOGGLE SIDEBAR NAVIGASI (RESPONSIVE: DESKTOP MENDORONG KONTEN, MOBILE OVERLAY) */
  const sidebar = document.getElementById("sidebar");
  const mainContent = document.getElementById("mainContent");
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

  let wasMobile = isMobileView();
  setSidebarState(!wasMobile);

  document.getElementById("menuToggle").addEventListener("click", () => {
    const isOpen = !sidebar.classList.contains("collapsed");
    setSidebarState(!isOpen);
  });

  document.addEventListener("click", (e) => {
    if (!isMobileView()) return;
    const menuToggleBtn = document.getElementById("menuToggle");
    const clickedInsideSidebar = sidebar.contains(e.target);
    const clickedToggle = menuToggleBtn.contains(e.target);
    if (!clickedInsideSidebar && !clickedToggle && !sidebar.classList.contains("collapsed")) {
      setSidebarState(false);
    }
  });

  window.addEventListener("resize", () => {
    const nowMobile = isMobileView();
    if (nowMobile !== wasMobile) {
      setSidebarState(!nowMobile);
      wasMobile = nowMobile;
    }
  });

  /* TOGGLE PROFILE DROPDOWN */
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

  /* CETAK LANGSUNG KE PDF */
  function cetakPDFDirect() {
    window.print();
  }

  /* FITUR BAGIKAN KARTU */
  async function bagikanKartuPDF() {
    const card = document.getElementById("printableCard");

    try {
      const canvas = await html2canvas(card, {
        scale: 2,
        useCORS: true,
        allowTaint: false,
        logging: false
      });

      let imgData;
      try {
        imgData = canvas.toDataURL("image/png");
      } catch (e) {
        alert("Mode pratinjau lokal terdeteksi. Gunakan tombol 'Cetak Kartu Pendaftaran' atau jalankan melalui Web Server.");
        return;
      }

      const { jsPDF } = window.jspdf;
      const pdf = new jsPDF("p", "mm", "a4");
      const pdfWidth = pdf.internal.pageSize.getWidth();
      const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

      pdf.addImage(imgData, "PNG", 0, 10, pdfWidth, pdfHeight);
      const pdfBlob = pdf.output("blob");

      const noPendaftaran = "{{ $pendaftar->no_pendaftaran ?? 'SPMB' }}";
      const namaSiswa = "{{ $pendaftar->nama_lengkap ?? 'Siswa' }}";
      const fileName = `Kartu_Pendaftaran_${noPendaftaran}.pdf`;
      const file = new File([pdfBlob], fileName, { type: "application/pdf" });

      if (navigator.canShare && navigator.canShare({ files: [file] })) {
        await navigator.share({
          title: "Kartu Pendaftaran SPMB",
          text: `Berikut Kartu Pendaftaran SPMB SMK Ma'arif Walisongo Kajoran atas nama ${namaSiswa}.`,
          files: [file]
        });
      } else {
        pdf.save(fileName);
        alert("File PDF Kartu Pendaftaran berhasil diunduh.");
      }
    } catch (err) {
      console.error("Gagal membagikan kartu:", err);
      window.print();
    }
  }

  function hubungiAdminWA() {
    const namaSiswa = "{{ $pendaftar->nama_lengkap ?? 'Calon Siswa' }}";
    const noAdmin = "622933195678";
    const teksPesan = `Halo Admin SPMB SMK Ma'arif Walisongo Kajoran, nama saya *${namaSiswa}*. Saya mau bertanya/mengajukan kendala terkait pendaftaran online. Mohon bantuannya, terima kasih!`;
    const urlWA = `https://wa.me/${noAdmin}?text=${encodeURIComponent(teksPesan)}`;
    window.open(urlWA, '_blank');
  }

  function logoutSystem() {
    if (confirm("Apakah Anda yakin ingin keluar dari sistem?")) { 
      window.location.href = "{{ url('/login') }}"; 
    }
  }
</script>
</body>
</html>