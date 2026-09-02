<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berkas Pendaftaran - PPDB SMK Maarif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
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
        .help-card h4 { font-size: 12px; margin-bottom: 2px; }
        .help-card p { font-size: 10px; color: #a0c4be; margin-bottom: 8px; }
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
        .btn-help:hover { background-color: #e6f4ea; }

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

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        .main-content.expanded { margin-left: 0; width: 100%; }

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
        .btn-toggle-menu:hover { background-color: #f0f0f0; }
        .page-title { font-size: 18px; font-weight: 700; color: #022c22; }

        .profile-wrapper { position: relative; }
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
        .profile-btn:hover { background-color: #f0f0f0; }
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
        }
        .profile-text { text-align: right; line-height: 1.2; }
        .profile-text .name { font-weight: 700; font-size: 13px; color: #333; }
        .profile-text .nisn { font-size: 11px; color: #666; }
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
        .profile-dropdown.show { display: flex; }
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
        .dropdown-item:hover { background-color: #f5f5f5; }
        .dropdown-item.logout { color: #d9534f; border-top: 1px solid #eeeeee; }

        .content-body { padding: 30px; }

        .card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 25px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 15px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 16px;
            margin-top: 15px;
        }
        .stat-item { display: flex; align-items: center; gap: 12px; }
        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: #e6f4ea;
            color: #047857;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        .stat-info p { font-size: 11px; color: #6b7280; }
        .stat-info h5 { font-size: 13px; font-weight: 700; color: #111827; }
        .badge-active {
            background: #d1fae5;
            color: #047857;
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 12px;
            font-weight: 600;
        }

        .table-responsive { width: 100%; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th {
            background-color: #f9fafb;
            color: #4b5563;
            font-weight: 600;
            text-align: left;
            padding: 12px 14px;
            border-bottom: 2px solid #e5e7eb;
        }
        td { padding: 14px; border-bottom: 1px solid #e5e7eb; vertical-align: middle; }
        .file-info { display: flex; align-items: center; gap: 10px; font-weight: 600; }
        .file-icon-box {
            width: 32px;
            height: 32px;
            background-color: #e6f4ea;
            color: #047857;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .badge-status-table {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }
        .status-verified { background: #d1fae5; color: #047857; }
        .status-process { background: #fef3c7; color: #b45309; }
        .status-empty { background: #f3f4f6; color: #6b7280; }
        .status-revision {
            background: #fef3c7;
            color: #b45309;
            border: 1px solid #dfe68a;
            cursor: pointer;
        }
        .status-revision:hover { background: #fde68a; }

        .revision-alert-box {
            background-color: #fffbebf8;
            border: 1px solid #fcc34d;
            border-radius: 10px;
            padding: 16px;
            display: none;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 25px;       
        }
        .revision-alert-box .rev-icon {
            width: 36px;
            height: 36px;
            background: #fef3c7;
            color: #d97706;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 16px;
        }
        .revision-alert-box h5 { font-size: 13px; font-weight: 700; color: #92400e; }
        .revision-alert-box p { font-size: 12px; color: #b45309; margin-top: 2px; }

        .action-btns { display: flex; gap: 6px; }
        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid #e5e7eb;
            background: white;
            color: #374151;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s;
        }
        .btn-action:hover { background-color: #f3f4f6; }
        .btn-action.btn-upload {
            background-color: #047857;
            color: white;
            border: none;
        }
        .btn-action.btn-upload:hover { background-color: #022c22; }
        .btn-action.is-changed {
            border-color: #b45309;
            color: #b45309;
            background-color: #fef3c7;
        }

        .note-card {
            background-color: #e6f4ea;
            border: 1px solid #a7f3d0;
            border-radius: 10px;
            padding: 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 25px;
        }
        .note-icon {
            width: 36px;
            height: 36px;
            background: white;
            color: #047857;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 16px;
        }
        .note-text h5 { font-size: 13px; font-weight: 700; color: #022c22; }
        .note-text p { font-size: 11px; color: #047857; }

        .footer-action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        .btn-secondary {
            background: white;
            border: 1px solid #d1d5db;
            color: #374151;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }
        .btn-secondary:hover { background: #f9fafb; }
        .btn-primary {
            background: #047857;
            border: none;
            color: white;
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 2px 6px rgba(4, 120, 87, 0.3);
        }
        .btn-primary:hover { background: #022c22; }
        .btn-primary:disabled {
            background: #9ca3af;
            box-shadow: none;
            cursor: not-allowed;
        }
        .unsaved-alert {
            font-size: 12px;
            color: #b45309;
            font-weight: 600;
            display: none;
            align-items: center;
            gap: 6px;
        }

        .modal-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .modal-overlay.show { display: flex; }
        .modal-content {
            background: #ffffff;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            position: relative;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 12px;
            margin-bottom: 15px;
        }
        .modal-header h3 { font-size: 16px; color: #022c22; font-weight: 700; }
        .modal-close { font-size: 22px; cursor: pointer; color: #888; font-weight: bold; }
        .modal-close:hover { color: #000; }
        .modal-body { text-align: center; }
        .empty-file-box { padding: 30px 10px; color: #64748b; }
        .empty-file-box i { font-size: 45px; color: #cbd5e1; margin-bottom: 10px; }
        .empty-file-box p { font-size: 13px; font-weight: 500; }
        .preview-img { max-width: 100%; max-height: 350px; border-radius: 8px; border: 1px solid #e2e8f0; }

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
            .card { padding: 18px; }

            .stat-grid { padding: 12px; gap: 12px; }

            table { min-width: 720px; }
            th, td { padding: 10px 12px; font-size: 12.5px; }

            .footer-action-bar {
                flex-direction: column;
                align-items: stretch;
            }
            .footer-action-bar > div {
                flex-direction: column;
                align-items: stretch !important;
                width: 100%;
            }
            .btn-secondary, .btn-primary {
                width: 100%;
                justify-content: center;
            }
            .unsaved-alert {
                justify-content: center;
                margin-bottom: 4px;
            }

            .modal-content {
                width: 92%;
                padding: 16px;
            }
        }

        @media (max-width: 480px) {
            .sidebar { width: 240px; left: -240px; }
            .sidebar.collapsed { left: 0; }
        }
    </style>
</head>
<body>

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
                <a href="{{ url('/berkas_pendaftaran') }}" class="active"><i class="fa-solid fa-file-lines"></i> Berkas Pendaftaran</a>
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
    </div>

    <div class="main-content" id="mainContent">

        <div class="top-navbar">
            <div style="display: flex; align-items: center; gap: 12px;">
                <button class="btn-toggle-menu" onclick="toggleSidebar()" title="Toggle Sidebar Menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="page-title">Berkas Pendaftaran</div>
            </div>

            <div class="profile-wrapper">
                <button class="profile-btn" onclick="toggleProfileDropdown(event)">
                    <div class="profile-text">
                        <div class="name" id="namaSiswaDisplay">{{ $pendaftar->nama_lengkap ?? 'Calon Siswa' }}</div>
                        <div class="nisn" id="nisnSiswaDisplay">NISN: {{ $pendaftar->nisn ?? '-' }}</div>
                    </div>
                    <div class="profile-avatar" id="avatarLetter"><i class="fa-solid fa-user"></i></div>
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

            <div class="card">
                <h3 style="font-size: 16px; color: #111827; margin-bottom: 4px;">Kelola Berkas Pendaftaran</h3>
                <p style="font-size: 12px; color: #6b7280;">Berikut berkas-berkas yang telah diunggah dan status verifikasinya.</p>
                
                <div class="stat-grid">
                    <div class="stat-item">
                        <div class="stat-icon"><i class="fa-regular fa-calendar-check"></i></div>
                        <div class="stat-info">
                            <p>Periode Pendaftaran</p>
                            <h5>01 Mei 2026 – 30 Juni 2026</h5>
                        </div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-icon"><i class="fa-solid fa-shield-halved"></i></div>
                        <div class="stat-info">
                            <p>Status Pendaftaran</p>
                            <h5><span class="badge-active">Aktif</span></h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h4 style="font-size: 14px; font-weight: 700; color: #111827; margin-bottom: 16px;">
                    <i class="fa-solid fa-folder-open" style="color: #047857; margin-right: 6px;"></i> Daftar Berkas Persyaratan
                </h4>

                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 50px;">No.</th>
                                <th>Nama Berkas</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th>Tanggal Upload</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="berkasTableBody">
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="revision-alert-box" id="revisionAlertBox">
                <div class="rev-icon" id="revIconBox"><i class="fa-solid fa-triangle-exclamation"></i></div>
                <div>
                    <h5 id="revisionTitleText">Perlu Revisi Berkas!</h5>
                    <p id="revisionNoteText">Silakan periksa dan unggah ulang berkas yang diminta oleh tim verifikator.</p>
                </div>
            </div>

            <div class="note-card">
                <div class="note-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="note-text">
                    <h5>Catatan Penting</h5>
                    <p>Pastikan semua berkas diunggah dengan jelas (format PDF/JPG/PNG max 2MB). Berkas yang tidak terbaca dapat memperlambat proses verifikasi.</p>
                </div>
            </div>

            <div class="footer-action-bar">
                <a href="{{ url('/dashboard_siswa') }}" class="btn-secondary" id="btnKembali">
                    <i class="fa-solid fa-arrow-left"></i> Kembali
                </a>
                
                <div style="display: flex; align-items: center; gap: 15px;">
                    <span class="unsaved-alert" id="unsavedAlert">
                        <i class="fa-solid fa-circle-exclamation"></i> Ada perubahan berkas yang belum disimpan
                    </span>
                    <button class="btn-primary" id="btnSimpan" disabled>
                        <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
                    </button>
                </div>
            </div>

        </div>
    </div>

    <div id="previewModal" class="modal-overlay" onclick="closeModal()">
        <div class="modal-content" onclick="event.stopPropagation()">
            <div class="modal-header">
                <h3 id="modalTitle">Lihat Berkas</h3>
                <span class="modal-close" onclick="closeModal()">&times;</span>
            </div>
            <div class="modal-body" id="modalBody">
            </div>
        </div>
    </div>

    <input type="file" id="fileInputPicker" accept="image/*,application/pdf" style="display: none;">

    <script>
        let berkasList = [];

        function getDynamicBerkasList() {
            const list = [
                { key: "kk", nama: "Fotokopi Kartu Keluarga (KK)", keterangan: "Kartu Keluarga", status: "belum", tanggal: "-", icon: "fa-file-lines" },
                { key: "akta", nama: "Fotokopi Akta Kelahiran", keterangan: "Akta Kelahiran", status: "belum", tanggal: "-", icon: "fa-file-lines" },
                { key: "ktp-ayah", nama: "Fotokopi KTP Ayah", keterangan: "KTP Ayah Kandung / Wali", status: "belum", tanggal: "-", icon: "fa-id-card" },
                { key: "ktp-ibu", nama: "Fotokopi KTP Ibu", keterangan: "KTP Ibu Kandung / Wali", status: "belum", tanggal: "-", icon: "fa-id-card" },
                { key: "foto", nama: "Pas Foto Formal 3x4", keterangan: "Pas Foto Formal 3x4", status: "belum", tanggal: "-", icon: "fa-image" },
                { key: "skl", nama: "Surat Keterangan Lulus (SKL) / Ijazah", keterangan: "SKL / Ijazah SMP/MTs", status: "belum", tanggal: "-", icon: "fa-file-lines" }
            ];

            const localData = localStorage.getItem("dataSiswaSPMB") || localStorage.getItem("list_pendaftar");
            let isKip = false;
            let isGel2 = false;

            const statusKpsStorage = localStorage.getItem('penerima_kps_status');
            if (statusKpsStorage && (statusKpsStorage.toLowerCase() === 'ya' || statusKpsStorage === 'true')) {
                isKip = true;
            }

            const gelombangStorage = localStorage.getItem('gelombang_pendaftaran');
            if (gelombangStorage && gelombangStorage.includes('2')) {
                isGel2 = true;
            }

            if (localData) {
                try {
                    const parsed = JSON.parse(localData);
                    const dataSiswa = Array.isArray(parsed) ? (parsed[0] || {}) : parsed;
                    
                    const kpsVal = String(dataSiswa.kpsKip || dataSiswa.kps || "").toLowerCase();
                    if (kpsVal.includes("ya") || kpsVal.includes("kip") || kpsVal.includes("kks") || kpsVal.includes("pkh") || kpsVal.includes("true")) {
                        isKip = true;
                    }

                    const gelVal = String(dataSiswa.gelombang || "").toLowerCase();
                    if (gelVal.includes("2")) {
                        isGel2 = true;
                    }
                } catch (e) {}
            }

            if (isKip) {
                list.push({ key: "kps", nama: "Penerima KIP / KKS / PKH", keterangan: "Dokumen/Foto Kartu KIP/KKS/PKH", status: "belum", tanggal: "-", icon: "fa-credit-card" });
            }

            if (isGel2) {
                list.push({ key: "pembayaran", nama: "Bukti Transfer Pembayaran", keterangan: "Bukti Bayar Pendaftaran Gelombang 2", status: "belum", tanggal: "-", icon: "fa-file-invoice" });
            }

            return list;
        }

        let selectedRowIndex = null;
        let hasChanges = false;

        function loadSavedData() {
            berkasList = getDynamicBerkasList();

            // CATATAN: Nama & NISN siswa sudah ditampilkan langsung dari server
            // ({{ $pendaftar->nama_lengkap }} / {{ $pendaftar->nisn }}) di HTML,
            // jadi tidak lagi ditimpa oleh data localStorage siswa lain.

            let currentBerkas = {};
            try {
                const rawBerkas = localStorage.getItem("berkas_pendaftar_current");
                currentBerkas = (rawBerkas && rawBerkas !== "undefined") ? JSON.parse(rawBerkas) : {};
            } catch (e) {
                currentBerkas = {};
            }

            const statusDokumenMap = currentBerkas.statusDokumen || {};

            berkasList.forEach(item => {
                let targetKey = item.key;
                if (item.key === 'kps') targetKey = 'kip';
                if (item.key === 'pembayaran') targetKey = 'bayar';

                const savedData = currentBerkas[targetKey] || currentBerkas[item.key] || localStorage.getItem('file_' + item.key);
                
                if (savedData) {
                    try {
                        const parsed = typeof savedData === 'string' ? JSON.parse(savedData) : savedData;
                        item.fileData = parsed.fileData || parsed;
                        item.fileName = parsed.fileName || parsed.namaFile || "Dokumen";
                        
                        if (statusDokumenMap[targetKey]) {
                            item.status = statusDokumenMap[targetKey];
                        } else if (parsed.status) {
                            item.status = parsed.status;
                        } else {
                            item.status = 'menunggu';
                        }

                        item.tanggal = parsed.tanggal || "Baru saja";
                    } catch (e) {
                        item.fileData = savedData;
                        item.status = statusDokumenMap[targetKey] || 'menunggu';
                        item.tanggal = "Baru saja";
                    }
                } else {
                    item.status = statusDokumenMap[targetKey] || 'belum';
                }
            });
        }

        function renderTable() {
            const tbody = document.getElementById('berkasTableBody');
            tbody.innerHTML = '';

            let currentBerkas = {};
            try {
                const rawBerkas = localStorage.getItem("berkas_pendaftar_current");
                currentBerkas = (rawBerkas && rawBerkas !== "undefined") ? JSON.parse(rawBerkas) : {};
            } catch(e) {
                currentBerkas = {};
            }

            const catatanRevisi = currentBerkas._catatanRevisi || "Mohon periksa kembali berkas/dokumen Anda yang ditandai revisi.";

            const hasAnyRevisi = berkasList.some(item => item.status === 'revisi');
            const revisionAlert = document.getElementById('revisionAlertBox');
            const revisionTitle = document.getElementById('revisionTitleText');
            const revisionNote = document.getElementById('revisionNoteText');

            if (hasAnyRevisi) {
                revisionAlert.style.display = 'flex';
                revisionTitle.innerText = "Ada Berkas yang Perlu Revisi!";
                revisionNote.innerText = catatanRevisi;
            } else {
                revisionAlert.style.display = 'none';
            }

            berkasList.forEach((item, index) => {
                let statusHtml = '';
                let actionHtml = '';

                if (item.status === 'terverifikasi' || item.status === 'verified') {
                    statusHtml = `<span class="badge-status-table status-verified"><i class="fa-solid fa-circle-check"></i> Terverifikasi</span>`;
                    actionHtml = `
                        <button class="btn-action" onclick="viewFile(${index})"><i class="fa-solid fa-eye"></i> Lihat</button>
                        <button class="btn-action ${item.isChanged ? 'is-changed' : ''}" onclick="triggerFilePicker(${index})"><i class="fa-solid fa-rotate"></i> Ganti</button>
                        <button class="btn-action" onclick="downloadFile(${index})"><i class="fa-solid fa-download"></i> Unduh</button>
                    `;
                } else if (item.status === 'revisi') {
                    statusHtml = `<span class="badge-status-table status-revision" onclick="showRevisionNote('${catatanRevisi}')" title="Klik untuk lihat catatan revisi"><i class="fa-solid fa-pen-to-square"></i> Perlu Revisi</span>`;
                    actionHtml = `
                        <button class="btn-action" onclick="viewFile(${index})"><i class="fa-solid fa-eye"></i> Lihat</button>
                        <button class="btn-action btn-upload" onclick="triggerFilePicker(${index})"><i class="fa-solid fa-upload"></i> Unggah Ulang</button>
                    `;
                } else if (item.fileData) {
                    statusHtml = `<span class="badge-status-table status-process"><i class="fa-solid fa-spinner"></i> Menunggu Verifikasi</span>`;
                    actionHtml = `
                        <button class="btn-action" onclick="viewFile(${index})"><i class="fa-solid fa-eye"></i> Lihat</button>
                        <button class="btn-action ${item.isChanged ? 'is-changed' : ''}" onclick="triggerFilePicker(${index})"><i class="fa-solid fa-rotate"></i> Ganti</button>
                        <button class="btn-action" onclick="downloadFile(${index})"><i class="fa-solid fa-download"></i> Unduh</button>
                    `;
                } else {
                    statusHtml = `<span class="badge-status-table status-empty"><i class="fa-solid fa-circle-xmark"></i> Belum Diunggah</span>`;
                    actionHtml = `
                        <button class="btn-action btn-upload" onclick="triggerFilePicker(${index})"><i class="fa-solid fa-upload"></i> Unggah</button>
                    `;
                }

                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${index + 1}</td>
                    <td>
                        <div class="file-info">
                            <div class="file-icon-box"><i class="fa-solid ${item.icon}"></i></div>
                            <span>${item.nama}</span>
                        </div>
                    </td>
                    <td style="color: #6b7280;">${item.keterangan}</td>
                    <td>${statusHtml}</td>
                    <td style="color: #6b7280; font-size: 12px;">${item.tanggal}</td>
                    <td style="text-align: center;">
                        <div class="action-btns" style="justify-content: center;">${actionHtml}</div>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        function showRevisionNote(catatan) {
            alert("Catatan Verifikasi dari Admin / Verifikator:\n\n" + catatan);
        }

        function triggerFilePicker(index) {
            selectedRowIndex = index;
            const picker = document.getElementById('fileInputPicker');
            picker.value = '';
            picker.click();
        }

        document.getElementById('fileInputPicker').addEventListener('change', function(e) {
            if (e.target.files.length > 0 && selectedRowIndex !== null) {
                const file = e.target.files[0];
                const fileName = file.name;
                
                const reader = new FileReader();
                reader.onload = function(evt) {
                    const now = new Date();
                    const tglStr = now.toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' }) + " " + now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' }) + " WIB";

                    const item = berkasList[selectedRowIndex];
                    item.fileData = evt.target.result;
                    item.fileName = fileName;
                    item.status = 'menunggu';
                    item.tanggal = tglStr;
                    item.isChanged = true;

                    let currentBerkas = {};
                    try {
                        const rawBerkas = localStorage.getItem("berkas_pendaftar_current");
                        currentBerkas = (rawBerkas && rawBerkas !== "undefined") ? JSON.parse(rawBerkas) : {};
                    } catch(e) { currentBerkas = {}; }

                    let targetKey = item.key;
                    if (item.key === 'kps') targetKey = 'kip';
                    if (item.key === 'pembayaran') targetKey = 'bayar';

                    if (!currentBerkas.statusDokumen) currentBerkas.statusDokumen = {};
                    currentBerkas.statusDokumen[targetKey] = 'menunggu';

                    currentBerkas[targetKey] = {
                        fileName: fileName,
                        namaFile: fileName,
                        fileData: evt.target.result,
                        status: 'menunggu',
                        tanggal: tglStr
                    };

                    localStorage.setItem("berkas_pendaftar_current", JSON.stringify(currentBerkas));
                    localStorage.setItem('file_' + item.key, JSON.stringify(currentBerkas[targetKey]));

                    hasChanges = true;
                    document.getElementById('btnSimpan').disabled = false;
                    document.getElementById('unsavedAlert').style.display = 'inline-flex';

                    renderTable();
                };
                reader.readAsDataURL(file);
            }
        });

        function viewFile(index) {
            const item = berkasList[index];
            const modal = document.getElementById('previewModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');

            modalTitle.innerText = "Lihat " + item.nama;

            if (item.fileData) {
                if (item.fileData.startsWith('data:application/pdf')) {
                    modalBody.innerHTML = `<embed src="${item.fileData}" type="application/pdf" width="100%" height="350px" />`;
                } else {
                    modalBody.innerHTML = `<img src="${item.fileData}" alt="${item.nama}" class="preview-img">`;
                }
            } else {
                modalBody.innerHTML = `
                    <div class="empty-file-box">
                        <i class="fa-solid fa-folder-open"></i>
                        <p>Belum ada berkas yang diunggah untuk <strong>${item.nama}</strong>.</p>
                    </div>
                `;
            }

            modal.classList.add('show');
        }

        function downloadFile(index) {
            const item = berkasList[index];
            if (item.fileData) {
                const downloadLink = document.createElement('a');
                downloadLink.href = item.fileData;
                downloadLink.download = item.nama.replace(/\s+/g, '_') + '_Pendaftaran';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            } else {
                alert("Gagal mengunduh berkas " + item.nama + ".");
            }
        }

        function closeModal() {
            document.getElementById('previewModal').classList.remove('show');
        }

        document.getElementById('btnSimpan').addEventListener('click', function() {
            if (!hasChanges) return;
            berkasList.forEach(item => item.isChanged = false);
            hasChanges = false;
            
            document.getElementById('btnSimpan').disabled = true;
            document.getElementById('unsavedAlert').style.display = 'none';
            alert('Perubahan berkas berhasil disimpan!');
            renderTable();
        });

        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.getElementById('mainContent').classList.toggle('expanded');
        }

        function isMobileView() {
            return window.innerWidth <= 992;
        }

        document.querySelectorAll('.menu-nav a').forEach(function(link) {
            link.addEventListener('click', function() {
                if (isMobileView()) {
                    document.getElementById('sidebar').classList.remove('collapsed');
                    document.getElementById('mainContent').classList.remove('expanded');
                }
            });
        });

        document.addEventListener('click', function(event) {
            if (!isMobileView()) return;
            const sidebarEl = document.getElementById('sidebar');
            if (!sidebarEl.classList.contains('collapsed')) return;

            const toggleBtn = document.querySelector('.btn-toggle-menu');
            const clickedInsideSidebar = sidebarEl.contains(event.target);
            const clickedToggleBtn = toggleBtn && toggleBtn.contains(event.target);

            if (!clickedInsideSidebar && !clickedToggleBtn) {
                sidebarEl.classList.remove('collapsed');
                document.getElementById('mainContent').classList.remove('expanded');
            }
        });

        let wasMobileView = isMobileView();
        window.addEventListener('resize', function() {
            const nowMobileView = isMobileView();
            if (nowMobileView !== wasMobileView) {
                document.getElementById('sidebar').classList.remove('collapsed');
                document.getElementById('mainContent').classList.remove('expanded');
                wasMobileView = nowMobileView;
            }
        });

        function toggleProfileDropdown(event) {
            event.stopPropagation();
            document.getElementById('profileDropdown').classList.toggle('show');
        }

        window.addEventListener('click', function() {
            const dropdown = document.getElementById('profileDropdown');
            if (dropdown && dropdown.classList.contains('show')) dropdown.classList.remove('show');
        });

        function hubungiAdminWA() {
            const elemNama = document.getElementById('namaSiswaDisplay');
            const namaSiswa = elemNama ? elemNama.innerText.trim() : "Calon Siswa";
            const noAdmin = "622933195678";
            const urlWA = `https://wa.me/${noAdmin}?text=${encodeURIComponent(`Halo Admin SPMB, nama saya *${namaSiswa}*. Saya butuh bantuan pendaftaran.`)}`;
            window.open(urlWA, '_blank');
        }

        function logoutSystem() {
            if (confirm("Apakah Anda yakin ingin keluar dari sistem?")) window.location.href = "{{ url('/log-in') }}";
        }

        document.addEventListener('DOMContentLoaded', function() {
            loadSavedData();
            renderTable();
        });
    </script>
</body>
</html>