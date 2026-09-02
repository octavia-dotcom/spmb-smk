<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengaturan Landing Page - Admin SPMB SMK Ma'arif Walisongo</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      onerror="this.onerror=null;this.href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css';">
<style>
/* ==========================================================================
RESET & GLOBAL (disamakan dengan dashboard_admin.html)
========================================================================== */
* {
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background-color:#f8f9fa;
    display:flex;
    color:#333;
}

/* SIDEBAR NAVIGASI */
.sidebar {
    width:260px;
    background-color:#022c22;
    color:#ffffff;
    min-height:100vh;
    position:fixed;
    left:0;
    top:0;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
    padding:20px 15px 15px 15px;
    z-index:100;
    transition:all .2s ease;
}

.sidebar.collapsed {
    left:-260px;
}

.sidebar-header {
    display:flex;
    align-items:center;
    gap:12px;
    padding-bottom:20px;
    border-bottom:1px solid rgba(255,255,255,.1);
    margin-bottom:20px;
}

.logo-sekolah-img {
    width:45px;
    height:45px;
    object-fit:contain;
    border-radius:4px;
}

.school-title h1 {
    font-size:13px;
    text-transform:uppercase;
    letter-spacing:.5px;
}

.school-title h2 {
    font-size:11px;
    color:#a0c4be;
    font-weight:normal;
}

.admin-tag {
    display:inline-block;
    background-color:#0c5243;
    font-size:10px;
    padding:2px 6px;
    border-radius:4px;
    margin-top:4px;
    color:#e6f4ea;
}

.menu-nav {
    display:flex;
    flex-direction:column;
    gap:8px;
}

.menu-nav a {
    color:#ffffff;
    text-decoration:none;
    padding:12px 15px;
    border-radius:6px;
    font-size:14px;
    display:flex;
    align-items:center;
    gap:12px;
    transition:background .2s;
}

.menu-nav a:hover, .menu-nav a.active {
    background-color:rgba(255,255,255,.15);
    font-weight:bold;
}

.dropdown-btn {
    width:100%;
    background:none;
    border:none;
    color:#ffffff;
    padding:11px 14px;
    border-radius:8px;
    font-size:13px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    cursor:pointer;
    transition:background .2s;
}

.dropdown-btn:hover, .dropdown-btn.active {
    background-color:rgba(255,255,255,.15);
}

.dropdown-container {
    display:none;
    flex-direction:column;
    gap:4px;
    padding-left:20px;
    margin-top:4px;
}

.dropdown-container.show {
    display:flex;
}

.dropdown-container a {
    font-size:12.5px;
    padding:8px 12px;
    opacity:.85;
}

.dropdown-container a:hover, .dropdown-container a.active {
    opacity:1;
    background-color:rgba(255,255,255,.1);
}

.arrow-icon {
    font-size:10px;
    transition:transform .3s ease;
}

.arrow-icon.rotate {
    transform:rotate(180deg);
}

.sidebar-bottom {
    display:flex;
    flex-direction:column;
    gap:12px;
    padding-top:15px;
    border-top:1px solid rgba(255,255,255,.1);
}

.admin-profile-card {
    background-color:rgba(255,255,255,.08);
    border-radius:12px;
    padding:12px 14px;
    display:flex;
    align-items:center;
    gap:12px;
    cursor:pointer;
    transition:background-color .2s;
    border:1px solid rgba(255,255,255,.05);
    text-decoration:none;
}

.admin-profile-card:hover {
    background-color:rgba(255,255,255,.14);
}

.admin-avatar {
    width:42px;
    height:42px;
    border-radius:50%;
    background-color:#a0a0a0;
    color:#ffffff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:20px;
    flex-shrink:0;
}

.admin-info .name {
    font-size:13px;
    font-weight:700;
    color:#ffffff;
    line-height:1.2;
}

.admin-info .role {
    font-size:11px;
    color:#a0c4be;
    margin-top:2px;
}

.btn-logout-sidebar {
    background-color:transparent;
    color:#ff9999;
    border:1px solid rgba(217,83,79,.4);
    padding:10px;
    border-radius:8px;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    font-size:13px;
    font-weight:600;
    width:100%;
    transition:all .2s;
}

.btn-logout-sidebar:hover {
    background-color:#d9534f;
    color:#ffffff;
    border-color:#d9534f;
}

.sidebar-copyright {
    font-size:10px;
    color:#a0c4be;
    text-align:center;
    line-height:1.4;
    margin-top:4px;
}

/* MAIN CONTENT */
.main-content {
    margin-left:260px;
    width:calc(100% - 260px);
    padding:0;
    transition:all .2s ease;
}

.main-content.expanded {
    margin-left:0;
    width:100%;
}

.top-navbar {
    background-color:#ffffff;
    height:65px;
    padding:0 30px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    border-bottom:1px solid #e0e0e0;
    position:sticky;
    top:0;
    z-index:90;
}

.top-left {
    display:flex;
    align-items:center;
    gap:15px;
}

.btn-toggle-menu {
    background:none;
    border:none;
    font-size:20px;
    color:#333;
    cursor:pointer;
    padding:5px;
}

.page-title {
    font-size:18px;
    font-weight:700;
    color:#04352b;
}

.profile-wrapper {
    position:relative;
    cursor:pointer;
}

.profile-btn {
    display:flex;
    align-items:center;
    gap:12px;
    background:none;
    border:none;
    cursor:pointer;
    padding:6px 10px;
    border-radius:8px;
    transition:background .2s;
}

.profile-btn:hover {
    background-color:#f0f0f0;
}

.profile-avatar {
    width:36px;
    height:36px;
    border-radius:50%;
    background-color:#04352b;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    font-size:16px;
}

.profile-text {
    text-align:right;
    line-height:1.2;
}

.profile-text .name {
    font-weight:700;
    font-size:13px;
    color:#333;
}

.profile-text .role {
    font-size:11px;
    color:#777;
}

.profile-dropdown {
    position:absolute;
    right:0;
    top:50px;
    background:#ffffff;
    border:1px solid #e0e0e0;
    border-radius:8px;
    width:170px;
    box-shadow:0 4px 12px rgba(0,0,0,.1);
    display:none;
    flex-direction:column;
    overflow:hidden;
    z-index:100;
}

.profile-dropdown.show {
    display:flex;
}

.dropdown-item {
    padding:12px 16px;
    font-size:13px;
    color:#333;
    text-decoration:none;
    display:flex;
    align-items:center;
    gap:10px;
    border:none;
    background:none;
    width:100%;
    text-align:left;
    cursor:pointer;
}

.dropdown-item:hover {
    background-color:#f5f5f5;
}

.dropdown-item.logout {
    color:#d9534f;
    border-top:1px solid #eeeeee;
}

.content-body {
    padding:30px;
}

/* ==========================================================================
PAGE HEADER + TABS
========================================================================== */
.page-header-row {
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin-bottom:22px;
    flex-wrap:wrap;
    gap:14px;
}

.page-header-text h2 {
    font-size:24px;
    font-weight:800;
    color:#04352b;
    margin-bottom:4px;
}

.page-header-text p {
    font-size:13.5px;
    color:#667085;
}

.page-header-actions {
    display:flex;
    gap:10px;
}

.btn {
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 18px;
    border-radius:8px;
    font-size:13.5px;
    font-weight:700;
    cursor:pointer;
    border:1px solid transparent;
    transition:all .15s;
    text-decoration:none;
    white-space:nowrap;
}

.btn-primary {
    background-color:#04352b;
    color:#fff;
}

.btn-primary:hover {
    background-color:#065e4c;
}

.btn-outline {
    background-color:#fff;
    color:#04352b;
    border-color:#c9d6d1;
}

.btn-outline:hover {
    background-color:#f2f7f5;
}

.btn-sm {
    padding:7px 12px;
    font-size:12.5px;
}

.btn-danger-outline {
    background:#fff;
    color:#d9534f;
    border-color:#f1c4c1;
}

.btn-danger-outline:hover {
    background-color:#fdf2f1;
}

.tabs-row {
    display:flex;
    gap:6px;
    border-bottom:1px solid #e5e7eb;
    margin-bottom:26px;
    overflow-x:auto;
}

.tab-btn {
    display:flex;
    align-items:center;
    gap:8px;
    padding:12px 18px;
    font-size:13.5px;
    font-weight:700;
    color:#667085;
    background:none;
    border:none;
    border-bottom:3px solid transparent;
    cursor:pointer;
    white-space:nowrap;
    transition:all .15s;
}

.tab-btn i {
    font-size:13px;
}

.tab-btn:hover {
    color:#04352b;
}

.tab-btn.active {
    color:#04352b;
    border-bottom-color:#04352b;
}

.tab-panel {
    display:none;
}

.tab-panel.active {
    display:block;
}

.placeholder-panel {
    background:#fff;
    border:1px dashed #d5dcda;
    border-radius:12px;
    padding:70px 30px;
    text-align:center;
    color:#8a9791;
}

.placeholder-panel i {
    font-size:34px;
    margin-bottom:14px;
    color:#a9c8bd;
}

.placeholder-panel h3 {
    color:#455a52;
    font-size:16px;
    margin-bottom:6px;
}

.placeholder-panel p {
    font-size:13px;
    max-width:380px;
    margin:0 auto;
}

/* ==========================================================================
SECTION CARD (reuse gaya card-panel dashboard)
========================================================================== */
.card-panel {
    background:#ffffff;
    border:1px solid #e0e0e0;
    border-radius:10px;
    box-shadow:0 2px 6px rgba(0,0,0,.02);
    overflow:hidden;
    margin-bottom:22px;
}

.panel-header {
    font-size:15px;
    font-weight:700;
    color:#04352b;
    padding:16px 20px;
    border-bottom:1px solid #eeeeee;
    position:relative;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:12px;
}

.panel-header::before {
    content:'';
    position:absolute;
    left:0;
    top:0;
    bottom:0;
    width:5px;
    background-color:#04352b;
}

.panel-header-text {
    display:flex;
    flex-direction:column;
    gap:3px;
}

.panel-header-text small {
    font-size:11.5px;
    font-weight:500;
    color:#8a9791;
}

.panel-header-icon {
    width:34px;
    height:34px;
    border-radius:8px;
    background:#e6f4ea;
    color:#04352b;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
    flex-shrink:0;
}

.panel-header-left {
    display:flex;
    align-items:center;
    gap:12px;
}

.panel-body {
    padding:22px;
}

/* ==========================================================================
FORM FIELDS UMUM
========================================================================== */
.field-grid {
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:16px;
}

.field-grid.cols-3 {
    grid-template-columns:repeat(3,1fr);
}

.field-group {
    display:flex;
    flex-direction:column;
    gap:6px;
    margin-bottom:14px;
}

.field-group label {
    font-size:12.5px;
    font-weight:700;
    color:#455a52;
}

.field-group input[type=text], .field-group input[type=url], .field-group textarea, .field-group select {
    border:1px solid #d7dedb;
    border-radius:8px;
    padding:10px 12px;
    font-size:13px;
    color:#1f2a26;
    outline:none;
    transition:border-color .15s;
    width:100%;
    font-family:inherit;
}

.field-group input:focus, .field-group textarea:focus, .field-group select:focus {
    border-color:#04352b;
}

.field-group textarea {
    resize:vertical;
    min-height:64px;
}

.color-input-row {
    display:flex;
    align-items:center;
    gap:8px;
    border:1px solid #d7dedb;
    border-radius:8px;
    padding:6px 10px;
}

.color-input-row input[type=color] {
    width:26px;
    height:26px;
    border:none;
    padding:0;
    background:none;
    cursor:pointer;
}

.color-input-row span {
    font-size:12px;
    color:#5b6a64;
    font-family:monospace;
}

.section-note {
    font-size:12px;
    color:#8a9791;
    margin-bottom:16px;
    line-height:1.5;
}

/* ==========================================================================
LIST ITEM (badge, langkah, jadwal, fitur, sosmed, misi, syarat, keunggulan)
========================================================================== */
.list-wrap {
    display:flex;
    flex-direction:column;
    gap:10px;
    margin-bottom:14px;
}

.list-item-row {
    display:flex;
    align-items:flex-start;
    gap:12px;
    border:1px solid #e6eae8;
    border-radius:10px;
    padding:12px 14px;
    background:#fbfcfb;
}

.list-item-row.editing {
    background:#f4faf7;
    border-color:#bfe0d1;
}

.list-item-index {
    width:22px;
    height:22px;
    border-radius:50%;
    background:#04352b;
    color:#fff;
    font-size:11px;
    font-weight:700;
    display:flex;
    align-items:center;
    justify-content:center;
    flex-shrink:0;
    margin-top:2px;
}

.list-item-content {
    flex:1;
    display:flex;
    align-items:flex-start;
    gap:12px;
    font-size:13px;
    color:#33403c;
}

.row-icon {
    width:30px;
    height:30px;
    border-radius:8px;
    background:#e6f4ea;
    color:#04352b;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:13px;
    flex-shrink:0;
}

.row-icon.small {
    width:8px;
    height:8px;
    background:none;
    color:#04352b;
    font-size:8px;
    margin-top:6px;
}

.row-sub {
    font-size:12px;
    color:#7c8a85;
    margin-top:2px;
    line-height:1.4;
}

.list-item-actions {
    display:flex;
    gap:6px;
    flex-shrink:0;
}

.btn-icon-only {
    width:30px;
    height:30px;
    border-radius:7px;
    border:1px solid #d7dedb;
    background:#fff;
    color:#455a52;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    font-size:12px;
    transition:all .15s;
}

.btn-icon-only:hover {
    background:#f2f7f5;
}

.btn-icon-only.danger {
    color:#d9534f;
}

.btn-icon-only.danger:hover {
    background:#fdf2f1;
    border-color:#f1c4c1;
}

.empty-list {
    text-align:center;
    padding:26px;
    color:#9aa8a3;
    font-size:12.5px;
    border:1px dashed #dde4e1;
    border-radius:10px;
}

.edit-form-grid {
    flex:1;
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:12px;
}

.edit-form-grid .full {
    grid-column:1 / -1;
}

.edit-form-actions {
    display:flex;
    gap:8px;
    align-items:flex-end;
    padding-bottom:2px;
}

.btn-add-item {
    align-self:flex-start;
}

/* ==========================================================================
HERO PREVIEW (mini)
========================================================================== */
.hero-editor-grid {
    display:grid;
    grid-template-columns:0.95fr 1.05fr;
    gap:26px;
    align-items:start;
}

@media (max-width:1150px) {
    .hero-editor-grid {
        grid-template-columns:1fr;
    }

}

.hero-mini-preview {
    border-radius:14px;
    overflow:hidden;
    border:1px solid #e0e0e0;
    background:#003a3b linear-gradient(to right, rgba(0,58,59,.95) 35%, rgba(0,58,59,.55) 100%);
    background-size:cover;
    background-position:center;
    padding:26px 22px 22px 22px;
    color:#fff;
    position:relative;
    min-height:330px;
}

.hero-mini-preview .mp-sub {
    font-size:10.5px;
    font-weight:700;
    letter-spacing:2px;
    margin-bottom:8px;
}

.hero-mini-preview .mp-title {
    font-family:inherit;
    font-size:22px;
    font-weight:800;
    line-height:1.25;
    margin-bottom:10px;
}

.hero-mini-preview .mp-desc {
    font-size:11.5px;
    line-height:1.6;
    max-width:320px;
    margin-bottom:16px;
}

.mp-badges {
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:8px;
    margin-bottom:18px;
    max-width:360px;
}

.mp-badge-card {
    display:flex;
    align-items:center;
    gap:8px;
    background:rgba(0,43,44,.6);
    border:1px solid rgba(255,255,255,.15);
    border-radius:8px;
    padding:8px 10px;
    font-size:10px;
}

.mp-badge-card i {
    font-size:12px;
}

.mp-btn-group {
    display:flex;
    gap:10px;
}

.mp-btn-primary {
    padding:9px 16px;
    border-radius:8px;
    font-weight:700;
    font-size:11.5px;
}

.mp-btn-secondary {
    padding:9px 14px;
    border-radius:8px;
    font-weight:600;
    font-size:11.5px;
    border:1px solid;
}

.preview-caption {
    text-align:center;
    font-size:11.5px;
    color:#8a9791;
    margin-top:10px;
    font-weight:600;
}

/* ==========================================================================
UPLOAD BOX GAMBAR
========================================================================== */
.upload-box {
    display:flex;
    align-items:center;
    gap:14px;
    border:1px solid #e0e0e0;
    border-radius:10px;
    padding:12px;
    background:#fbfcfb;
    margin-bottom:14px;
}

.upload-thumb {
    width:64px;
    height:64px;
    border-radius:8px;
    object-fit:cover;
    background:#e9edec;
    flex-shrink:0;
}

.upload-info {
    flex:1;
    min-width:0;
}

.upload-name {
    font-size:13px;
    font-weight:700;
    color:#1f2a26;
    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;
}

.upload-meta {
    font-size:11.5px;
    color:#8a9791;
    margin-top:2px;
}

.upload-actions {
    display:flex;
    gap:8px;
    flex-shrink:0;
}

.file-label {
    display:inline-flex;
    align-items:center;
    gap:6px;
}

/* Grid Unit Usaha logo (khusus, punya gambar) */
.logo-grid {
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(150px,1fr));
    gap:12px;
    margin-bottom:14px;
}

.logo-item {
    border:1px solid #e6eae8;
    border-radius:10px;
    padding:12px;
    text-align:center;
    background:#fbfcfb;
    position:relative;
}

.logo-item img {
    width:100%;
    height:56px;
    object-fit:contain;
    margin-bottom:8px;
}

.logo-item input[type=text] {
    width:100%;
    text-align:center;
    border:1px solid #d7dedb;
    border-radius:6px;
    padding:6px;
    font-size:12px;
    margin-bottom:8px;
}

.logo-item-actions {
    display:flex;
    gap:6px;
    justify-content:center;
}

.logo-add-card {
    border:1.5px dashed #c9d6d1;
    border-radius:10px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    gap:6px;
    color:#7c8a85;
    font-size:12px;
    font-weight:600;
    cursor:pointer;
    min-height:132px;
    background:#fbfcfb;
}

.logo-add-card:hover {
    background:#f2f7f5;
    border-color:#04352b;
    color:#04352b;
}

.logo-add-card i {
    font-size:20px;
}

/* ==========================================================================
SUB-STEPPER HALAMAN PENDAFTARAN (Buat Akun / Formulir / Unggah Berkas)
========================================================================== */
.substep-nav {
    display:flex;
    align-items:center;
    gap:14px;
    background:#fff;
    border:1px solid #e0e0e0;
    border-radius:12px;
    padding:16px 22px;
    margin-bottom:22px;
    flex-wrap:wrap;
}

.substep-btn {
    display:flex;
    align-items:center;
    gap:10px;
    background:none;
    border:none;
    cursor:pointer;
    padding:6px 8px;
    border-radius:8px;
    transition:background .15s;
}

.substep-btn:hover {
    background:#f2f7f5;
}

.substep-num {
    width:30px;
    height:30px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:13px;
    font-weight:700;
    border:1px solid #cbd5e1;
    color:#94a3b8;
    background:#fff;
    flex-shrink:0;
}

.substep-btn.active .substep-num {
    background:#04352b;
    color:#fff;
    border-color:#04352b;
}

.substep-label {
    font-size:13px;
    font-weight:700;
    color:#94a3b8;
}

.substep-btn.active .substep-label {
    color:#04352b;
}

.substep-line {
    flex:1;
    min-width:20px;
    height:1px;
    background:#e2e8f0;
}

.substep-panel {
    display:none;
}

.substep-panel.active {
    display:block;
}

.type-badge {
    display:inline-block;
    font-size:10.5px;
    font-weight:700;
    padding:2px 8px;
    border-radius:20px;
    background:#e6f4ea;
    color:#04352b;
}

.req-badge-yes {
    color:#c0392b;
    font-weight:700;
}

.req-badge-no {
    color:#8a9791;
    font-weight:600;
}

/* TOAST */
#toast {
    position:fixed;
    bottom:26px;
    right:26px;
    background:#04352b;
    color:#fff;
    padding:13px 20px;
    border-radius:9px;
    font-size:13px;
    font-weight:600;
    display:flex;
    align-items:center;
    gap:10px;
    box-shadow:0 8px 24px rgba(0,0,0,.2);
    z-index:999;
    opacity:0;
    transform:translateY(10px);
    pointer-events:none;
    transition:all .25s;
}

#toast.show {
    opacity:1;
    transform:translateY(0);
}

#toast i {
    color:#5eead4;
}

/* ==========================================================================
RESPONSIVE
========================================================================== */
@media (max-width:992px) {
    .field-grid, .field-grid.cols-3 {
        grid-template-columns:1fr;
    }
    .mp-badges {
        max-width:100%;
    }
}

/* MOBILE: SIDEBAR JADI OVERLAY, LAYOUT MENYESUAIKAN */
@media (max-width:768px) {

    .sidebar {
        box-shadow:4px 0 20px rgba(0,0,0,.25);
    }

    /* Backdrop gelap di belakang sidebar saat dibuka di mobile */
    body.sidebar-mobile-open::after {
        content:"";
        position:fixed;
        inset:0;
        background:rgba(0,0,0,.45);
        z-index:95;
    }

    .main-content,
    .main-content.expanded {
        margin-left:0;
        width:100%;
    }

    .top-navbar {
        padding:0 16px;
        height:58px;
    }

    .page-title {
        font-size:15px;
    }

    /* Sembunyikan teks nama/role profil di topbar mobile, sisakan avatar + panah */
    .profile-text {
        display:none;
    }

    .content-body {
        padding:16px;
    }

    .page-header-row {
        flex-direction:column;
        align-items:stretch;
    }

    .page-header-actions {
        flex-wrap:wrap;
    }

    .page-header-actions .btn {
        flex:1;
        justify-content:center;
    }

    .tabs-row {
        gap:2px;
    }

    .tab-btn {
        padding:10px 12px;
        font-size:12.5px;
    }

    .panel-header {
        padding:14px 16px;
        flex-wrap:wrap;
    }

    .panel-body {
        padding:16px;
    }

    .field-grid, .field-grid.cols-3 {
        grid-template-columns:1fr;
        gap:0;
    }

    .edit-form-grid {
        grid-template-columns:1fr;
    }

    .hero-mini-preview {
        padding:20px 16px 18px 16px;
        min-height:auto;
    }

    .mp-badges {
        grid-template-columns:1fr 1fr;
    }

    .substep-nav {
        padding:14px 16px;
        gap:10px;
    }

    .substep-label {
        display:none;
    }

    .substep-line {
        min-width:12px;
    }

    .logo-grid {
        grid-template-columns:repeat(auto-fill,minmax(120px,1fr));
    }

    .list-item-row {
        flex-wrap:wrap;
    }

    .list-item-content {
        flex-wrap:wrap;
    }

    .list-item-actions {
        width:100%;
        justify-content:flex-end;
    }

    .upload-box {
        flex-wrap:wrap;
    }

    .upload-actions {
        width:100%;
        justify-content:flex-end;
    }

    #toast {
        left:16px;
        right:16px;
        bottom:16px;
    }
}
</style>
</head>
<body>

    <!-- SIDEBAR NAVIGASI -->
    <div class="sidebar" id="sidebar">
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
                <a href="{{ url('/seleksi_kelulusan') }}"><i class="fa-solid fa-award"></i>Seleksi Kelulusan</a>

                <div class="menu-dropdown-wrap">
                    <button class="dropdown-btn active" id="btnCmsDropdown" onclick="toggleCmsMenu()">
                        <div style="display:flex;align-items:center;gap:12px;">
                            <i class="fa-solid fa-sliders"></i> CMS & Informasi
                        </div>
                        <i class="fa-solid fa-chevron-down arrow-icon rotate" id="arrowCms"></i>
                    </button>

                    <div class="dropdown-container show" id="dropdownCmsContainer">
                        <a href="{{ url('/kuota') }}"><i class="fa-solid fa-list-check"></i> Kuota Jurusan</a>
                        <a href="{{ url('/pengumuman_admin') }}"><i class="fa-solid fa-bullhorn"></i> Kelola Pengumuman</a>
                        <a href="{{ url('/cms_landing') }}" class="active"><i class="fa-solid fa-window-restore"></i> Pengaturan Landing Page</a>
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
            <div class="sidebar-copyright">&copy; 2026 SMK Ma'arif Walisongo Kajoran<br>All Rights Reserved</div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content" id="mainContent">

        <div class="top-navbar">
            <div class="top-left">
                <button class="btn-toggle-menu" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
                <div class="page-title">Pengaturan Landing Page</div>
            </div>
            <div class="profile-wrapper">
                <button class="profile-btn" onclick="toggleProfileDropdown(event)">
                    <div class="profile-text">
                        <div class="name">{{ Auth::user()->name }}</div>
                        <div class="role">{{ Auth::user()->role ?? 'Administrator' }}</div>
                    </div>
                    <div class="profile-avatar"><i class="fa-solid fa-user"></i></div>
                    <i class="fa-solid fa-chevron-down" style="font-size:11px;color:#888;"></i>
                </button>
                <div class="profile-dropdown" id="profileDropdown">
                    <a href="{{ url('/profil_admin') }}" class="dropdown-item"><i class="fa-solid fa-user"></i> Profil Admin</a>
                    <button class="dropdown-item logout" onclick="logoutSystem()"><i class="fa-solid fa-right-from-bracket"></i> Keluar</button>
                </div>
            </div>
        </div>

        <div class="content-body">

            <div class="page-header-row">
                <div class="page-header-text">
                    <h2>Pengaturan Landing Page</h2>
                    <p>Kelola konten yang tampil di website publik SPMB. Setiap bagian bisa ditambah, diedit, atau dihapus sesuai kebutuhan.</p>
                </div>
                <div class="page-header-actions">
                    <button class="btn btn-outline" onclick="pratinjauHalaman()"><i class="fa-solid fa-arrow-up-right-from-square"></i> Pratinjau Halaman</button>
                    <button class="btn btn-primary" onclick="simpanSemua()"><i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
                </div>
            </div>

            <!-- TABS HALAMAN -->
            <div class="tabs-row" id="tabsRow">
                <button class="tab-btn active" data-tab="home" onclick="switchTab('home')"><i class="fa-solid fa-house"></i> Halaman Home</button>
                <button class="tab-btn" data-tab="pendaftaran" onclick="switchTab('pendaftaran')"><i class="fa-regular fa-file-lines"></i> Halaman Pendaftaran</button>
                <button class="tab-btn" data-tab="jurusan" onclick="switchTab('jurusan')"><i class="fa-solid fa-graduation-cap"></i> Halaman Jurusan</button>
                <button class="tab-btn" data-tab="informasi" onclick="switchTab('informasi')"><i class="fa-solid fa-circle-info"></i> Halaman Informasi</button>
                <button class="tab-btn" data-tab="kontak" onclick="switchTab('kontak')"><i class="fa-solid fa-phone"></i> Halaman Kontak</button>
                <button class="tab-btn" data-tab="login" onclick="switchTab('login')"><i class="fa-solid fa-lock"></i> Halaman Login</button>
            </div>

            <!-- ======================= TAB: HALAMAN HOME ======================= -->
            <div class="tab-panel active" id="tab-home">

                <!-- 0. LOGO & HEADER NAVBAR -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-house-flag"></i></div>
                            <div class="panel-header-text">Logo & Header Navbar
                                <small>4 logo yang tampil berjejer di kapsul navigasi paling atas halaman publik</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="field-grid">
                            <div class="field-group">
                                <label>Logo Sekolah</label>
                                <div class="upload-box">
                                    <img id="thumbLogoSekolah" class="upload-thumb" src="img/logo.smk.png" onerror="this.src=placeholderImg();">
                                    <div class="upload-info">
                                        <div class="upload-name" id="nameLogoSekolah">logo.smk.png</div>
                                        <div class="upload-meta">PNG transparan disarankan</div>
                                    </div>
                                    <div class="upload-actions">
                                        <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="handleImageUpload(event,'thumbLogoSekolah','nameLogoSekolah')"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="field-group">
                                <label>Logo SMK Bisa Hebat</label>
                                <div class="upload-box">
                                    <img id="thumbLogoSmkHebat" class="upload-thumb" src="img/logo-smk-hebat.png" onerror="this.src=placeholderImg();">
                                    <div class="upload-info">
                                        <div class="upload-name" id="nameLogoSmkHebat">logo-smk-hebat.png</div>
                                        <div class="upload-meta">PNG transparan disarankan</div>
                                    </div>
                                    <div class="upload-actions">
                                        <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="handleImageUpload(event,'thumbLogoSmkHebat','nameLogoSmkHebat')"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="field-group">
                                <label>Logo SMK Vokasi</label>
                                <div class="upload-box">
                                    <img id="thumbLogoVokasi" class="upload-thumb" src="img/logo-smk-vokasi.png" onerror="this.src=placeholderImg();">
                                    <div class="upload-info">
                                        <div class="upload-name" id="nameLogoVokasi">logo-smk-vokasi.png</div>
                                        <div class="upload-meta">PNG transparan disarankan</div>
                                    </div>
                                    <div class="upload-actions">
                                        <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="handleImageUpload(event,'thumbLogoVokasi','nameLogoVokasi')"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="field-group">
                                <label>Logo Akreditasi</label>
                                <div class="upload-box">
                                    <img id="thumbLogoAkreditasi" class="upload-thumb" src="img/akreditasi.png" onerror="this.src=placeholderImg();">
                                    <div class="upload-info">
                                        <div class="upload-name" id="nameLogoAkreditasi">akreditasi.png</div>
                                        <div class="upload-meta">PNG transparan disarankan</div>
                                    </div>
                                    <div class="upload-actions">
                                        <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="handleImageUpload(event,'thumbLogoAkreditasi','nameLogoAkreditasi')"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 1. BANNER UTAMA (HERO) -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-image"></i></div>
                            <div class="panel-header-text">
                                Banner Utama (Hero)
                                <small>Bagian paling atas halaman, langsung dilihat pengunjung pertama kali</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="hero-editor-grid">
                            <div>
                                <div class="hero-mini-preview" id="heroPreview">
                                    <div class="mp-sub" id="mpSub"></div>
                                    <div class="mp-title" id="mpTitle"></div>
                                    <div class="mp-desc" id="mpDesc"></div>
                                    <div class="mp-badges" id="mpBadges"></div>
                                    <div class="mp-btn-group">
                                        <span class="mp-btn-primary" id="mpBtn1"></span>
                                        <span class="mp-btn-secondary" id="mpBtn2"></span>
                                    </div>
                                </div>
                                <div class="preview-caption">Pratinjau Tampilan Hero</div>
                            </div>

                            <div>
                                <div class="field-group">
                                    <label>Sub Judul</label>
                                    <div class="field-grid">
                                        <input type="text" id="heroSub" value="SISTEM PENERIMAAN MURID BARU" oninput="onHeroInput()">
                                        <div class="color-input-row"><input type="color" id="heroSubColor" value="#6ee7b7" oninput="onHeroInput()"><span>Warna Teks</span></div>
                                    </div>
                                </div>
                                <div class="field-group">
                                    <label>Judul Utama (baris 1 / baris 2)</label>
                                    <div class="field-grid">
                                        <input type="text" id="heroTitle1" value="SMK MA'ARIF" oninput="onHeroInput()">
                                        <input type="text" id="heroTitle2" value="WALISONGO KAJORAN" oninput="onHeroInput()">
                                    </div>
                                    <div class="color-input-row" style="max-width:220px;margin-top:6px;"><input type="color" id="heroTitleColor" value="#5eead4" oninput="onHeroInput()"><span>Warna Judul Baris 2</span></div>
                                </div>
                                <div class="field-group">
                                    <label>Deskripsi</label>
                                    <textarea id="heroDesc" oninput="onHeroInput()">Membentuk generasi unggul, berkarakter, berkompeten dan berdaya saing global melalui pendidikan vokasi berkualitas dan berlandaskan nilai-nilai Islam.</textarea>
                                </div>

                                <div class="field-group">
                                    <label>Tombol Utama 1</label>
                                    <div class="field-grid cols-3">
                                        <input type="text" id="heroBtn1Text" value="Daftar Sekarang" oninput="onHeroInput()" placeholder="Teks Tombol">
                                        <input type="text" id="heroBtn1Link" value="/pendaftaran" oninput="onHeroInput()" placeholder="Link">
                                        <div class="color-input-row"><input type="color" id="heroBtn1Color" value="#ffffff" oninput="onHeroInput()"><span>Warna</span></div>
                                    </div>
                                </div>
                                <div class="field-group">
                                    <label>Tombol Utama 2</label>
                                    <div class="field-grid cols-3">
                                        <input type="text" id="heroBtn2Text" value="Lihat Jurusan" oninput="onHeroInput()" placeholder="Teks Tombol">
                                        <input type="text" id="heroBtn2Link" value="/jurusan" oninput="onHeroInput()" placeholder="Link">
                                        <div class="color-input-row"><input type="color" id="heroBtn2Color" value="#ffffff" oninput="onHeroInput()"><span>Warna</span></div>
                                    </div>
                                </div>

                                <div class="field-group">
                                    <label>Gambar Background Hero</label>
                                    <div class="upload-box">
                                        <img id="thumbBg" class="upload-thumb" src="img/sekolah.png" onerror="this.src=placeholderImg();">
                                        <div class="upload-info">
                                            <div class="upload-name" id="nameBg">sekolah.png</div>
                                            <div class="upload-meta">Disarankan 1920 x 1080 px</div>
                                        </div>
                                        <div class="upload-actions">
                                            <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="handleImageUpload(event,'thumbBg','nameBg')"></label>
                                            <button class="btn btn-danger-outline btn-sm" onclick="hapusGambar('thumbBg','nameBg')"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="field-group">
                                    <label>Gambar Foto Siswa (sisi kanan hero)</label>
                                    <div class="upload-box">
                                        <img id="thumbHeroFoto" class="upload-thumb" src="img/spmb.jpeg" onerror="this.src=placeholderImg();">
                                        <div class="upload-info">
                                            <div class="upload-name" id="nameHeroFoto">spmb.jpeg</div>
                                            <div class="upload-meta">Disarankan rasio potret, latar transparan</div>
                                        </div>
                                        <div class="upload-actions">
                                            <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="handleImageUpload(event,'thumbHeroFoto','nameHeroFoto')"></label>
                                            <button class="btn btn-danger-outline btn-sm" onclick="hapusGambar('thumbHeroFoto','nameHeroFoto')"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. BADGE KEUNGGULAN DI HERO -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-shield"></i></div>
                            <div class="panel-header-text">Badge Keunggulan
                                <small>4 kotak kecil di bawah deskripsi hero (mis. "Sekolah Islam Berprestasi")</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.badges.addItem()"><i class="fa-solid fa-plus"></i> Tambah Badge</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-badges"></div>
                    </div>
                </div>

                <!-- 3. SISTEM SPMB ONLINE (ALUR PENDAFTARAN) -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-timeline"></i></div>
                            <div class="panel-header-text">Alur Sistem SPMB Online
                                <small>Kotak hijau berisi judul, deskripsi, dan langkah-langkah pendaftaran</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.steps.addItem()"><i class="fa-solid fa-plus"></i> Tambah Langkah</button>
                    </div>
                    <div class="panel-body">
                        <div class="field-grid">
                            <div class="field-group">
                                <label>Judul Kotak Hijau</label>
                                <input type="text" id="ppdbTitle" value="SISTEM SPMB ONLINE">
                            </div>
                            <div class="field-group">
                                <label>Deskripsi Kotak Hijau</label>
                                <input type="text" id="ppdbDesc" value="Solusi praktis pendaftaran bagi calon siswa baru yang terkendala jarak dan waktu.">
                            </div>
                        </div>
                        <div class="section-note">Langkah akan otomatis diberi nomor urut ("LANGKAH 1", "LANGKAH 2", dst) sesuai urutan pada daftar di bawah.</div>
                        <div class="list-wrap" id="list-steps"></div>
                    </div>
                </div>

                <!-- 4. VISI & MISI -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-bullseye"></i></div>
                            <div class="panel-header-text">Visi & Misi Sekolah
                                <small>Kolom pertama pada bagian informasi sekolah</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.misi.addItem()"><i class="fa-solid fa-plus"></i> Tambah Poin Misi</button>
                    </div>
                    <div class="panel-body">
                        <div class="field-group">
                            <label>Visi</label>
                            <textarea id="visiText">Sekolah Kejuruan yang unggul, Bertaqwa Berkarakter, Terampil, dan Professional</textarea>
                        </div>
                        <label style="font-size:12.5px;font-weight:700;color:#455a52;display:block;margin-bottom:8px;">Misi (daftar poin)</label>
                        <div class="list-wrap" id="list-misi"></div>
                    </div>
                </div>

                <!-- 5. INFORMASI PENDAFTARAN -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            <div class="panel-header-text">Informasi Pendaftaran
                                <small>Kolom kedua: jadwal gelombang & syarat pendaftaran</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">
                            <label style="font-size:12.5px;font-weight:700;color:#455a52;">Jadwal Gelombang</label>
                            <button class="btn btn-outline btn-sm" onclick="managers.jadwal.addItem()"><i class="fa-solid fa-plus"></i> Tambah Gelombang</button>
                        </div>
                        <div class="list-wrap" id="list-jadwal"></div>

                        <div style="display:flex;justify-content:space-between;align-items:center;margin:18px 0 8px 0;">
                            <label style="font-size:12.5px;font-weight:700;color:#455a52;">Syarat Pendaftaran</label>
                            <button class="btn btn-outline btn-sm" onclick="managers.syarat.addItem()"><i class="fa-solid fa-plus"></i> Tambah Syarat</button>
                        </div>
                        <div class="list-wrap" id="list-syarat"></div>
                    </div>
                </div>

                <!-- 6. UNIT USAHA SEKOLAH -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-store"></i></div>
                            <div class="panel-header-text">Unit Usaha Sekolah
                                <small>Kolom ketiga: logo unit usaha & poin keunggulan praktik kerja</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <label style="font-size:12.5px;font-weight:700;color:#455a52;display:block;margin-bottom:8px;">Logo Unit Usaha</label>
                        <div class="logo-grid" id="grid-unitusaha"></div>

                        <div style="display:flex;justify-content:space-between;align-items:center;margin:18px 0 8px 0;">
                            <label style="font-size:12.5px;font-weight:700;color:#455a52;">Keunggulan & Praktik Kerja</label>
                            <button class="btn btn-outline btn-sm" onclick="managers.keunggulan.addItem()"><i class="fa-solid fa-plus"></i> Tambah Poin</button>
                        </div>
                        <div class="list-wrap" id="list-keunggulan"></div>
                    </div>
                </div>

                <!-- 7. FITUR UTAMA -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-star"></i></div>
                            <div class="panel-header-text">Fitur Utama
                                <small>5 kartu fitur di bagian bawah halaman (mis. "PPDB Online")</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.fitur.addItem()"><i class="fa-solid fa-plus"></i> Tambah Fitur</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-fitur"></div>
                    </div>
                </div>

                <!-- 8. FOOTER -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-shoe-prints"></i></div>
                            <div class="panel-header-text">Footer
                                <small>Info sekolah, sosial media, peta lokasi, dan teks hak cipta</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="field-grid">
                            <div class="field-group">
                                <label>Nama Sekolah</label>
                                <input type="text" id="footerNama" value="SMK Ma'arif Walisongo Kajoran">
                            </div>
                            <div class="field-group">
                                <label>Link Google Maps (embed)</label>
                                <input type="text" id="footerMaps" value="https://www.google.com/maps/embed?pb=...">
                            </div>
                        </div>
                        <div class="field-group">
                            <label>Alamat & Deskripsi Singkat</label>
                            <textarea id="footerAlamat">Jl. KH. Ridwan Sidowangi Kajoran, Magelang, Jawa Tengah 56163. Mencetak generasi yang Smart, Religious, dan Professional.</textarea>
                        </div>
                        <div class="field-group">
                            <label>Teks Hak Cipta</label>
                            <input type="text" id="footerCopyright" value="© 2026 SMK Ma'arif Walisongo Kajoran Tim TEFA. All Rights Reserved.">
                        </div>

                        <div style="display:flex;justify-content:space-between;align-items:center;margin:18px 0 8px 0;">
                            <label style="font-size:12.5px;font-weight:700;color:#455a52;">Tautan Sosial Media</label>
                            <button class="btn btn-outline btn-sm" onclick="managers.sosmed.addItem()"><i class="fa-solid fa-plus"></i> Tambah Sosial Media</button>
                        </div>
                        <div class="list-wrap" id="list-sosmed"></div>
                    </div>
                </div>

            </div>

            <!-- ======================= TAB LAIN (placeholder, menyusul) ======================= -->
            <div class="tab-panel" id="tab-pendaftaran">

                <div class="section-note" style="margin-bottom:0;">Halaman Pendaftaran terdiri dari 3 langkah berurutan yang dilalui calon siswa. Pilih langkah di bawah untuk mengatur konten pada halaman tersebut.</div>

                <!-- SUB-STEPPER -->
                <div class="substep-nav" id="substepNav">
                    <button class="substep-btn active" data-step="akun" onclick="switchPendaftaranStep('akun')">
                        <div class="substep-num">1</div><span class="substep-label">Buat Akun</span>
                    </button>
                    <div class="substep-line"></div>
                    <button class="substep-btn" data-step="formulir" onclick="switchPendaftaranStep('formulir')">
                        <div class="substep-num">2</div><span class="substep-label">Isi Formulir</span>
                    </button>
                    <div class="substep-line"></div>
                    <button class="substep-btn" data-step="berkas" onclick="switchPendaftaranStep('berkas')">
                        <div class="substep-num">3</div><span class="substep-label">Unggah Berkas & Pembayaran</span>
                    </button>
                </div>

                <!-- ===== LANGKAH 1: BUAT AKUN ===== -->
                <div class="substep-panel active" id="substep-akun">
                    <div class="card-panel">
                        <div class="panel-header">
                            <div class="panel-header-left">
                                <div class="panel-header-icon"><i class="fa-solid fa-user-plus"></i></div>
                                <div class="panel-header-text">Judul & Deskripsi Halaman<small>Teks yang tampil di header halaman "Buat Akun"</small></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="field-grid">
                                <div class="field-group"><label>Judul Halaman</label><input type="text" id="akunJudul" value="Pendaftaran Akun"></div>
                                <div class="field-group"><label>Deskripsi Singkat</label><input type="text" id="akunDesc" value="Langkah pertama untuk bergabung bersama SMK Ma'arif Walisongo Kajoran"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-panel">
                        <div class="panel-header">
                            <div class="panel-header-left">
                                <div class="panel-header-icon"><i class="fa-solid fa-list-check"></i></div>
                                <div class="panel-header-text">Field Formulir Buat Akun<small>Kolom isian yang wajib diisi calon siswa di langkah ini</small></div>
                            </div>
                            <button class="btn btn-outline btn-sm" onclick="managers.akunFields.addItem()"><i class="fa-solid fa-plus"></i> Tambah Field</button>
                        </div>
                        <div class="panel-body">
                            <div class="list-wrap" id="list-akunFields"></div>
                        </div>
                    </div>
                </div>

                <!-- ===== LANGKAH 2: ISI FORMULIR ===== -->
                <div class="substep-panel" id="substep-formulir">
                    <div class="card-panel">
                        <div class="panel-header">
                            <div class="panel-header-left">
                                <div class="panel-header-icon"><i class="fa-solid fa-file-lines"></i></div>
                                <div class="panel-header-text">Judul & Deskripsi Halaman<small>Teks yang tampil di header halaman "Isi Formulir"</small></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="field-grid">
                                <div class="field-group"><label>Judul Halaman</label><input type="text" id="formulirJudul" value="Pengisian Formulir"></div>
                                <div class="field-group"><label>Deskripsi Singkat</label><input type="text" id="formulirDesc" value="Silakan lengkapi data calon peserta didik baru dengan benar"></div>
                            </div>
                        </div>
                    </div>

                    <div class="section-note">Formulir dibagi menjadi beberapa bagian (section). Setiap bagian bisa diberi judul sendiri dan berisi beberapa field pertanyaan yang bisa ditambah, diedit, atau dihapus bebas. Field bertipe Provinsi/Kabupaten/Kecamatan/Kelurahan pada bagian "Data Tempat Tinggal" terisi otomatis lewat API Wilayah Indonesia dan tidak perlu diubah pilihannya secara manual.</div>

                    <div style="display:flex;justify-content:flex-end;margin-bottom:14px;">
                        <button class="btn btn-primary btn-sm" onclick="addFormSection()"><i class="fa-solid fa-plus"></i> Tambah Bagian (Section) Baru</button>
                    </div>

                    <div id="formSectionsWrap"></div>

                    <div class="card-panel">
                        <div class="panel-header">
                            <div class="panel-header-left">
                                <div class="panel-header-icon"><i class="fa-solid fa-building-columns"></i></div>
                                <div class="panel-header-text">Info Rekening (muncul jika metode pembayaran Transfer)<small>Ditampilkan sebagai kotak info di bagian Metode Pembayaran, khusus Gelombang 2</small></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="field-group">
                                <label>Biaya Pendaftaran Gelombang 2</label>
                                <input type="text" id="biayaGelombang2" value="Rp 20.000">
                            </div>
                            <div class="field-grid cols-3">
                                <div class="field-group"><label>Nama Bank</label><input type="text" id="rekBank" value="Bank Jateng"></div>
                                <div class="field-group"><label>Nomor Rekening</label><input type="text" id="rekNomor" value="3-012-34567-8"></div>
                                <div class="field-group"><label>Atas Nama</label><input type="text" id="rekAtasNama" value="SMK Ma'arif Walisongo Kajoran"></div>
                            </div>
                            <div class="field-group">
                                <label>Catatan Tambahan</label>
                                <textarea id="rekCatatan">Silakan lakukan transfer sesuai biaya pendaftaran, lalu simpan bukti transfer untuk diunggah di halaman berikutnya.</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== LANGKAH 3: UNGGAH BERKAS ===== -->
                <div class="substep-panel" id="substep-berkas">
                    <div class="card-panel">
                        <div class="panel-header">
                            <div class="panel-header-left">
                                <div class="panel-header-icon"><i class="fa-solid fa-cloud-arrow-up"></i></div>
                                <div class="panel-header-text">Judul & Deskripsi Halaman<small>Teks yang tampil di header halaman "Unggah Berkas"</small></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="field-grid">
                                <div class="field-group"><label>Judul Halaman</label><input type="text" id="berkasJudul" value="Unggah Berkas & Pembayaran"></div>
                                <div class="field-group"><label>Deskripsi Singkat</label><input type="text" id="berkasDesc" value="Lengkapi dokumen pendukung pendaftaran kamu"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-panel">
                        <div class="panel-header">
                            <div class="panel-header-left">
                                <div class="panel-header-icon"><i class="fa-solid fa-folder-open"></i></div>
                                <div class="panel-header-text">Daftar Dokumen yang Diunggah<small>Kartu unggah dokumen yang tampil di halaman ini, termasuk yang kondisional</small></div>
                            </div>
                            <button class="btn btn-outline btn-sm" onclick="managers.berkasList.addItem()"><i class="fa-solid fa-plus"></i> Tambah Dokumen</button>
                        </div>
                        <div class="panel-body">
                            <div class="list-wrap" id="list-berkasList"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-panel" id="tab-jurusan">

                <!-- 1. HERO HALAMAN JURUSAN -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-image"></i></div>
                            <div class="panel-header-text">
                                Banner Atas (Hero) Halaman Jurusan
                                <small>Bagian hijau paling atas di halaman jurusan.html, sebelum daftar kartu jurusan</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="hero-editor-grid">
                            <div>
                                <div class="hero-mini-preview" id="jrHeroPreview" style="min-height:280px;">
                                    <div class="mp-sub" id="jrpBreadcrumb" style="color:#6ee7b7;"></div>
                                    <div class="mp-title" id="jrpTitle" style="font-size:19px;"></div>
                                    <div class="mp-desc" id="jrpDesc" style="max-width:280px;"></div>
                                    <div style="border:1px solid rgba(255,255,255,.2);border-radius:14px;padding:14px;background:rgba(0,43,44,.65);max-width:300px;margin-top:6px;">
                                        <div style="font-size:20px;margin-bottom:4px;">❛❛</div>
                                        <div id="jrpQuote" style="font-size:10.5px;line-height:1.6;"></div>
                                    </div>
                                </div>
                                <div class="preview-caption">Pratinjau Hero Halaman Jurusan</div>
                            </div>

                            <div>
                                <div class="field-group">
                                    <label>Teks Breadcrumb</label>
                                    <input type="text" id="jrBreadcrumb" value="Jurusan / Kompetensi Keahlian" oninput="updateJurusanHeroPreview()">
                                </div>
                                <div class="field-group">
                                    <label>Judul Baris 1 / Baris 2 (highlight)</label>
                                    <div class="field-grid">
                                        <input type="text" id="jrTitle1" value="PROGRAM KEAHLIAN" oninput="updateJurusanHeroPreview()">
                                        <input type="text" id="jrTitle2" value="SMK MA'ARIF WALISONGO KAJORAN" oninput="updateJurusanHeroPreview()">
                                    </div>
                                </div>
                                <div class="field-group">
                                    <label>Deskripsi Hero</label>
                                    <textarea id="jrDesc" oninput="updateJurusanHeroPreview()">Dapatkan pendidikan vokasi berkualitas dengan fasilitas lengkap dan guru profesional siap mengantarkanmu menjadi generasi hebat dan kompeten.</textarea>
                                </div>
                                <div class="field-group">
                                    <label>Teks Kutipan (Quote Box)</label>
                                    <textarea id="jrQuote" oninput="updateJurusanHeroPreview()">SMK Ma'arif Walisongo Kajoran memiliki 3 program keahlian unggulan yang siap membekali kamu dengan keterampilan masa depan.</textarea>
                                </div>
                                <div class="field-group">
                                    <label>Gambar Background Hero</label>
                                    <div class="upload-box">
                                        <img id="jrThumbBg" class="upload-thumb" src="img/sekolah.png" onerror="this.src=placeholderImg();">
                                        <div class="upload-info">
                                            <div class="upload-name" id="jrNameBg">sekolah.png</div>
                                            <div class="upload-meta">Disarankan 1920 x 1080 px</div>
                                        </div>
                                        <div class="upload-actions">
                                            <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="handleImageUpload(event,'jrThumbBg','jrNameBg')"></label>
                                            <button class="btn btn-danger-outline btn-sm" onclick="hapusGambar('jrThumbBg','jrNameBg')"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. DAFTAR PROGRAM KEAHLIAN -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                            <div class="panel-header-text">
                                Daftar Program Keahlian (Kartu Jurusan)
                                <small>Setiap kartu di sini otomatis membentuk halaman detail-nya sendiri (PPLG, BCF, MPLB, dst)</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="addJurusanItem()"><i class="fa-solid fa-plus"></i> Tambah Jurusan</button>
                    </div>
                    <div class="panel-body">
                        <p class="section-note"><i class="fa-solid fa-circle-info"></i> Data kuota siswa tiap jurusan diatur khusus di menu <strong>Kuota Jurusan</strong>, tidak diulang di sini.</p>
                        <div id="jurusanListWrap"></div>
                    </div>
                </div>

                <!-- 3. FITUR UNGGULAN BAWAH -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-star"></i></div>
                            <div class="panel-header-text">Fitur Unggulan
                                <small>Baris ikon paling bawah halaman jurusan (mis. "Guru Profesional & Kompeten")</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.jurusanFitur.addItem()"><i class="fa-solid fa-plus"></i> Tambah Fitur</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-jurusanFitur"></div>
                    </div>
                </div>

            </div>
            <div class="tab-panel" id="tab-informasi">

                <!-- 1. GELOMBANG PENDAFTARAN -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-calendar-days"></i></div>
                            <div class="panel-header-text">Gelombang Pendaftaran
                                <small>Kartu gelombang beserta 4 tahapannya (Pendaftaran, Tes Seleksi, Pengumuman, Daftar Ulang)</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.gelombang.addItem()"><i class="fa-solid fa-plus"></i> Tambah Gelombang</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-gelombang"></div>
                    </div>
                </div>

                <!-- 2. CARA DAFTAR -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-list-ol"></i></div>
                            <div class="panel-header-text">Cara Daftar Menggunakan Web SPMB Online
                                <small>Alur 5 langkah pendaftaran online</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.caraDaftar.addItem()"><i class="fa-solid fa-plus"></i> Tambah Langkah</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-caraDaftar"></div>
                        <div class="field-group" style="margin-top:6px;">
                            <label>Teks Kotak Catatan (notice box)</label>
                            <textarea id="caraDaftarNotice">Pastikan semua data dan berkas sudah benar sebelum dikirim. Informasi lebih lanjut dapat dilihat pada menu Pengumuman.</textarea>
                        </div>
                    </div>
                </div>

                <!-- 3. JADWAL MPLS & PTA -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-calendar-check"></i></div>
                            <div class="panel-header-text">Jadwal MPLS & PTA
                                <small>Jadwal kegiatan untuk siswa baru setelah dinyatakan diterima</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.jadwalKegiatan.addItem()"><i class="fa-solid fa-plus"></i> Tambah Kegiatan</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-jadwalKegiatan"></div>
                        <div class="field-group" style="margin-top:6px;">
                            <label>Teks Kotak Catatan (notice box)</label>
                            <textarea id="jadwalNotice">Jadwal dapat berubah sewaktu-waktu. Selalu pantau pengumuman terbaru.</textarea>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-panel" id="tab-kontak">

                <!-- 1. HERO HUBUNGI KAMI -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-image"></i></div>
                            <div class="panel-header-text">Banner Atas (Hero) Halaman Kontak
                                <small>Bagian hijau paling atas di kontak.html</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="field-group">
                            <label>Sub Judul Kecil (di atas judul besar)</label>
                            <input type="text" id="kkHeroSub" value="SPMB SMK Ma'arif Walisongo Kajoran">
                        </div>
                        <div class="field-group">
                            <label>Judul Besar (kata biasa / kata highlight)</label>
                            <div class="field-grid">
                                <input type="text" id="kkHeroTitle1" value="Hubungi">
                                <input type="text" id="kkHeroTitle2" value="Kami">
                            </div>
                        </div>
                        <div class="field-group">
                            <label>Deskripsi</label>
                            <textarea id="kkHeroDesc">Kami siap membantu proses pendaftaran peserta didik baru SMK Ma'arif Walisongo Kajoran. Jangan ragu menghubungi kami jika memiliki pertanyaan.</textarea>
                        </div>
                        <div class="field-group">
                            <label>Gambar Background Hero</label>
                            <div class="upload-box">
                                <img id="kkThumbBg" class="upload-thumb" src="img/sekolah.png" onerror="this.src=placeholderImg();">
                                <div class="upload-info">
                                    <div class="upload-name" id="kkNameBg">sekolah.png</div>
                                    <div class="upload-meta">Disarankan 1920 x 1080 px</div>
                                </div>
                                <div class="upload-actions">
                                    <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="handleImageUpload(event,'kkThumbBg','kkNameBg')"></label>
                                    <button class="btn btn-danger-outline btn-sm" onclick="hapusGambar('kkThumbBg','kkNameBg')"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                        </div>
                        <div style="display:flex;justify-content:space-between;align-items:center;margin:16px 0 8px 0;">
                            <label style="font-size:12.5px;font-weight:700;color:#455a52;">Badge Kecil di Hero (mis. "Respon Cepat")</label>
                            <button class="btn btn-outline btn-sm" onclick="managers.kontakHeroBadges.addItem()"><i class="fa-solid fa-plus"></i> Tambah Badge</button>
                        </div>
                        <div class="list-wrap" id="list-kontakHeroBadges"></div>
                    </div>
                </div>

                <!-- 2. INFORMASI KONTAK -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-address-card"></i></div>
                            <div class="panel-header-text">Informasi Kontak
                                <small>Daftar alamat, telepon, WhatsApp, email, dan website</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.kontakList.addItem()"><i class="fa-solid fa-plus"></i> Tambah Kontak</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-kontakList"></div>
                    </div>
                </div>

                <!-- 3. FORM KIRIM PESAN -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-paper-plane"></i></div>
                            <div class="panel-header-text">Form Kirim Pesan
                                <small>Judul kartu dan daftar pilihan subjek pesan</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="field-grid">
                            <div class="field-group">
                                <label>Judul Kartu</label>
                                <input type="text" id="kkFormTitle" value="Kirim Pesan">
                            </div>
                            <div class="field-group">
                                <label>Sub Judul Kartu</label>
                                <input type="text" id="kkFormSub" value="Sampaikan pertanyaan atau informasi yang ingin Anda tanyakan.">
                            </div>
                        </div>
                        <div class="field-group">
                            <label>Pilihan Subjek (pisahkan dengan koma)</label>
                            <input type="text" id="kkFormSubjek" value="Pendaftaran, Jurusan, Beasiswa, Lainnya">
                        </div>
                    </div>
                </div>

                <!-- 4. JAM PELAYANAN -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-clock"></i></div>
                            <div class="panel-header-text">Jam Pelayanan</div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.jamPelayanan.addItem()"><i class="fa-solid fa-plus"></i> Tambah Baris</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-jamPelayanan"></div>
                    </div>
                </div>

                <!-- 5. METODE KONTAK CEPAT -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-comments"></i></div>
                            <div class="panel-header-text">Hubungi Kami Melalui
                                <small>Tombol pintasan WhatsApp, Email, dan Lokasi</small>
                            </div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.metodeKontak.addItem()"><i class="fa-solid fa-plus"></i> Tambah Metode</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-metodeKontak"></div>
                    </div>
                </div>

                <!-- 6. LOKASI -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-location-dot"></i></div>
                            <div class="panel-header-text">Lokasi Kami</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="field-group">
                            <label>Nama Lokasi</label>
                            <input type="text" id="kkLokasiNama" value="SMK Ma'arif Walisongo Kajoran">
                        </div>
                        <div class="field-group">
                            <label>Alamat Lengkap</label>
                            <textarea id="kkLokasiAlamat">Jl. Walisongo No.1, Kajoran, Magelang, Jawa Tengah 56163</textarea>
                        </div>
                        <div class="field-group">
                            <label>Link Google Maps Embed (untuk iframe)</label>
                            <input type="text" id="kkLokasiEmbed" value="https://www.google.com/maps?q=SMK+Ma%27arif+Walisongo+Kajoran,+Magelang&output=embed">
                        </div>
                    </div>
                </div>

                <!-- 7. FAQ -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-circle-question"></i></div>
                            <div class="panel-header-text">Frequently Asked Questions</div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.faq.addItem()"><i class="fa-solid fa-plus"></i> Tambah FAQ</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-faq"></div>
                    </div>
                </div>

                <!-- 8. MEDIA SOSIAL -->
                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-share-nodes"></i></div>
                            <div class="panel-header-text">Media Sosial</div>
                        </div>
                        <button class="btn btn-outline btn-sm" onclick="managers.sosmed.addItem()"><i class="fa-solid fa-plus"></i> Tambah Akun</button>
                    </div>
                    <div class="panel-body">
                        <div class="list-wrap" id="list-sosmed"></div>
                    </div>
                </div>

            </div>
            <div class="tab-panel" id="tab-login">

                <div class="card-panel">
                    <div class="panel-header">
                        <div class="panel-header-left">
                            <div class="panel-header-icon"><i class="fa-solid fa-lock"></i></div>
                            <div class="panel-header-text">Halaman Log in
                                <small>Kartu login yang dilihat siswa dan admin sebelum masuk sistem</small>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="field-group">
                            <label>Logo Sekolah</label>
                            <div class="upload-box">
                                <img id="lgThumbLogo" class="upload-thumb" src="img/logo.smk.png" onerror="this.src=placeholderImg();">
                                <div class="upload-info">
                                    <div class="upload-name" id="lgNameLogo">logo.smk.png</div>
                                    <div class="upload-meta">PNG transparan disarankan</div>
                                </div>
                                <div class="upload-actions">
                                    <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="handleImageUpload(event,'lgThumbLogo','lgNameLogo')"></label>
                                </div>
                            </div>
                        </div>
                        <div class="field-grid">
                            <div class="field-group">
                                <label>Judul Sambutan</label>
                                <input type="text" id="lgJudul" value="Selamat Datang">
                            </div>
                            <div class="field-group">
                                <label>Sub Judul</label>
                                <input type="text" id="lgSub" value="Masuk untuk melanjutkan ke sistem penerimaan peserta didik baru">
                            </div>
                        </div>

                        <div class="section-note">Kolom Login</div>
                        <div class="field-grid">
                            <div class="field-group">
                                <label>Label Kolom Akun</label>
                                <input type="text" id="lgLabelUser" value="Username">
                            </div>
                            <div class="field-group">
                                <label>Placeholder Kolom Akun</label>
                                <input type="text" id="lgPlaceholderUser" value="Masukkan username">
                            </div>
                            <div class="field-group">
                                <label>Label Kolom Password</label>
                                <input type="text" id="lgLabelPass" value="Password">
                            </div>
                            <div class="field-group">
                                <label>Placeholder Kolom Password</label>
                                <input type="text" id="lgPlaceholderPass" value="Masukkan password">
                            </div>
                            <div class="field-group">
                                <label>Teks Tombol Masuk</label>
                                <input type="text" id="lgBtnSubmit" value="Log in">
                            </div>
                            <div class="field-group">
                                <label>Nomor WhatsApp "Lupa Password"</label>
                                <input type="text" id="lgLupaPassword" value="02933195678">
                            </div>
                        </div>

                        <div class="section-note">Ajakan Buat Akun & Navigasi</div>
                        <div class="field-grid">
                            <div class="field-group">
                                <label>Teks Pemisah</label>
                                <input type="text" id="lgSeparator" value="Belum punya akun?">
                            </div>
                            <div class="field-group">
                                <label>Teks Tombol Buat Akun</label>
                                <input type="text" id="lgBtnRegisterText" value="Buat Akun">
                            </div>
                            <div class="field-group">
                                <label>Link Tombol Buat Akun</label>
                                <input type="text" id="lgBtnRegisterLink" value="buat akun.html">
                            </div>
                            <div class="field-group">
                                <label>Teks Tombol Kembali</label>
                                <input type="text" id="lgBtnBackText" value="← Kembali">
                            </div>
                            <div class="field-group">
                                <label>Link Tombol Kembali</label>
                                <input type="text" id="lgBtnBackLink" value="home.html">
                            </div>
                            <div class="field-group">
                                <label>Teks Bantuan (paling bawah)</label>
                                <input type="text" id="lgHelpText" value="Butuh bantuan? Hubungi kami">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div id="toast"><i class="fa-solid fa-circle-check"></i><span id="toastMsg">Tersimpan</span></div>

<script>
    /* ==========================================================================
       SIMPAN & MUAT PENGATURAN (localStorage <-> halaman publik)
       ========================================================================== */
    const LANDING_STORAGE_KEY = 'landing_page_config';

    function val(id) {
        const el = document.getElementById(id);
        return el ? el.value : '';
    }
    function setVal(id, value) {
        if (value === undefined || value === null) return;
        const el = document.getElementById(id);
        if (el) el.value = value;
    }
    function imgSrc(id) {
        const el = document.getElementById(id);
        return el ? el.getAttribute('src') : '';
    }
    function setImgSrc(id, value) {
        if (!value) return;
        const el = document.getElementById(id);
        if (el) el.src = value;
    }

    function collectHomeData() {
        return {
            navbarLogos: {
                logoSekolah: imgSrc('thumbLogoSekolah'),
                logoSmkHebat: imgSrc('thumbLogoSmkHebat'),
                logoVokasi: imgSrc('thumbLogoVokasi'),
                logoAkreditasi: imgSrc('thumbLogoAkreditasi')
            },
            hero: {
                sub: val('heroSub'), subColor: val('heroSubColor'),
                title1: val('heroTitle1'), title2: val('heroTitle2'), titleColor: val('heroTitleColor'),
                desc: val('heroDesc'),
                btn1Text: val('heroBtn1Text'), btn1Link: val('heroBtn1Link'), btn1Color: val('heroBtn1Color'),
                btn2Text: val('heroBtn2Text'), btn2Link: val('heroBtn2Link'), btn2Color: val('heroBtn2Color'),
                bgImage: imgSrc('thumbBg'), fotoSiswa: imgSrc('thumbHeroFoto')
            },
            badges: managers.badges.data.map(({ icon, label }) => ({ icon, label })),
            ppdb: {
                title: val('ppdbTitle'), desc: val('ppdbDesc'),
                steps: managers.steps.data.map(({ icon, title, desc }) => ({ icon, title, desc }))
            },
            visi: {
                text: val('visiText'),
                misi: managers.misi.data.map(({ text }) => ({ text }))
            },
            pendaftaranInfo: {
                jadwal: managers.jadwal.data.map(({ gelombang, tanggal }) => ({ gelombang, tanggal })),
                syarat: managers.syarat.data.map(({ text }) => ({ text }))
            },
            unitUsaha: {
                logos: unitUsaha.map(({ nama, logo }) => ({ nama, logo })),
                keunggulan: managers.keunggulan.data.map(({ label, desc }) => ({ label, desc }))
            },
            fitur: managers.fitur.data.map(({ icon, title, desc }) => ({ icon, title, desc }))
        };
    }

    function simpanPengaturanLanding() {
        let config = {};
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)) || {}; } catch (e) { config = {}; }
        config.home = collectHomeData();
        config.lastUpdated = new Date().toISOString();
        localStorage.setItem(LANDING_STORAGE_KEY, JSON.stringify(config));
        toast('Halaman Home tersimpan & diterapkan ke halaman publik', 'fa-circle-check');
    }

    function loadSavedHomeData() {
        let config;
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)); } catch (e) { config = null; }
        if (!config || !config.home) return;
        const h = config.home;

        if (h.navbarLogos) {
            setImgSrc('thumbLogoSekolah', h.navbarLogos.logoSekolah);
            setImgSrc('thumbLogoSmkHebat', h.navbarLogos.logoSmkHebat);
            setImgSrc('thumbLogoVokasi', h.navbarLogos.logoVokasi);
            setImgSrc('thumbLogoAkreditasi', h.navbarLogos.logoAkreditasi);
        }
        if (h.hero) {
            setVal('heroSub', h.hero.sub); setVal('heroSubColor', h.hero.subColor);
            setVal('heroTitle1', h.hero.title1); setVal('heroTitle2', h.hero.title2); setVal('heroTitleColor', h.hero.titleColor);
            setVal('heroDesc', h.hero.desc);
            setVal('heroBtn1Text', h.hero.btn1Text); setVal('heroBtn1Link', h.hero.btn1Link); setVal('heroBtn1Color', h.hero.btn1Color);
            setVal('heroBtn2Text', h.hero.btn2Text); setVal('heroBtn2Link', h.hero.btn2Link); setVal('heroBtn2Color', h.hero.btn2Color);
            setImgSrc('thumbBg', h.hero.bgImage);
            setImgSrc('thumbHeroFoto', h.hero.fotoSiswa);
        }
        if (Array.isArray(h.badges) && h.badges.length) managers.badges.data = h.badges.map(x => ({ id: uid(), ...x }));
        if (h.ppdb) {
            setVal('ppdbTitle', h.ppdb.title); setVal('ppdbDesc', h.ppdb.desc);
            if (Array.isArray(h.ppdb.steps) && h.ppdb.steps.length) managers.steps.data = h.ppdb.steps.map(x => ({ id: uid(), ...x }));
        }
        if (h.visi) {
            setVal('visiText', h.visi.text);
            if (Array.isArray(h.visi.misi) && h.visi.misi.length) managers.misi.data = h.visi.misi.map(x => ({ id: uid(), ...x }));
        }
        if (h.pendaftaranInfo) {
            if (Array.isArray(h.pendaftaranInfo.jadwal) && h.pendaftaranInfo.jadwal.length) managers.jadwal.data = h.pendaftaranInfo.jadwal.map(x => ({ id: uid(), ...x }));
            if (Array.isArray(h.pendaftaranInfo.syarat) && h.pendaftaranInfo.syarat.length) managers.syarat.data = h.pendaftaranInfo.syarat.map(x => ({ id: uid(), ...x }));
        }
        if (h.unitUsaha) {
            if (Array.isArray(h.unitUsaha.logos) && h.unitUsaha.logos.length) unitUsaha = h.unitUsaha.logos.map(x => ({ id: uid(), ...x }));
            if (Array.isArray(h.unitUsaha.keunggulan) && h.unitUsaha.keunggulan.length) managers.keunggulan.data = h.unitUsaha.keunggulan.map(x => ({ id: uid(), ...x }));
        }
        if (Array.isArray(h.fitur) && h.fitur.length) managers.fitur.data = h.fitur.map(x => ({ id: uid(), ...x }));

        managers.badges.render(); managers.steps.render(); managers.misi.render();
        managers.jadwal.render(); managers.syarat.render(); managers.keunggulan.render(); managers.fitur.render();
        renderUnitUsaha();
        updateHeroPreview();
    }
    /* ==========================================================================
       NAVIGASI DASAR (sama seperti dashboard_admin.html)
       ========================================================================== */
    function toggleCmsMenu() {
        document.getElementById("dropdownCmsContainer").classList.toggle("show");
        document.getElementById("arrowCms").classList.toggle("rotate");
        document.getElementById("btnCmsDropdown").classList.toggle("active");
    }
    function toggleProfileDropdown(event) {
        event.stopPropagation();
        document.getElementById('profileDropdown').classList.toggle('show');
    }
    window.addEventListener('click', function () {
        const dropdown = document.getElementById('profileDropdown');
        if (dropdown && dropdown.classList.contains('show')) dropdown.classList.remove('show');
    });

    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');

    /* PERILAKU SIDEBAR RESPONSIVE: DESKTOP MENDORONG KONTEN, MOBILE OVERLAY */
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

    // Di mobile, sidebar tertutup secara default agar tidak menutupi konten
    setSidebarState(!isMobileView());

    // Tutup sidebar otomatis saat tap di luar area sidebar (khusus mobile)
    document.addEventListener('click', function (event) {
        if (!isMobileView()) return;
        if (sidebar.classList.contains('collapsed')) return;

        const toggleBtn = document.querySelector('.btn-toggle-menu');
        const clickedInsideSidebar = sidebar.contains(event.target);
        const clickedToggleBtn = toggleBtn && toggleBtn.contains(event.target);

        if (!clickedInsideSidebar && !clickedToggleBtn) {
            setSidebarState(false);
        }
    });

    // Sesuaikan ulang saat layar di-resize (misal rotasi HP / geser jendela)
    window.addEventListener('resize', function () {
        if (!isMobileView() && document.body.classList.contains('sidebar-mobile-open')) {
            document.body.classList.remove('sidebar-mobile-open');
        }
    });

    function logoutSystem() {
        if (confirm("Apakah Anda yakin ingin keluar dari sistem admin?")) {
            alert("Anda telah keluar.");
            window.location.href = ('/login');
        }
    }

    function switchTab(tab) {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.toggle('active', b.dataset.tab === tab));
        document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
        document.getElementById('tab-' + tab).classList.add('active');
    }

    /* ==========================================================================
       SUB-STEPPER HALAMAN PENDAFTARAN
       ========================================================================== */
    function switchPendaftaranStep(step) {
        document.querySelectorAll('#substepNav .substep-btn').forEach(b => b.classList.toggle('active', b.dataset.step === step));
        document.querySelectorAll('.substep-panel').forEach(p => p.classList.remove('active'));
        document.getElementById('substep-' + step).classList.add('active');
    }

    /* ==========================================================================
       UTILITAS
       ========================================================================== */
    let idCounter = 1;
    function uid() { return 'itm' + (idCounter++); }
    function escapeHtml(str) {
        return String(str == null ? '' : str)
            .replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }
    function capitalize(s){ return s.charAt(0).toUpperCase()+s.slice(1); }
    function placeholderImg() {
        return 'data:image/svg+xml;utf8,' + encodeURIComponent(
            '<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"><rect width="64" height="64" fill="#e9edec"/><text x="32" y="38" font-size="10" text-anchor="middle" fill="#9aa8a3" font-family="sans-serif">No Image</text></svg>'
        );
    }
    let toastTimer = null;
    function toast(msg, icon) {
        const t = document.getElementById('toast');
        document.getElementById('toastMsg').textContent = msg;
        t.querySelector('i').className = 'fa-solid ' + (icon || 'fa-circle-check');
        t.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => t.classList.remove('show'), 2200);
    }
    function handleImageUpload(event, imgId, nameId) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById(imgId).src = e.target.result;
            if (nameId) document.getElementById(nameId).textContent = file.name;
            toast('Gambar berhasil diganti', 'fa-image');
            updateHeroPreview();
        };
        reader.readAsDataURL(file);
    }
    function hapusGambar(imgId, nameId) {
        if (!confirm('Hapus gambar ini?')) return;
        document.getElementById(imgId).src = placeholderImg();
        if (nameId) document.getElementById(nameId).textContent = 'Belum ada gambar';
        toast('Gambar dihapus', 'fa-trash');
        updateHeroPreview();
    }
    function simpanSemua() {
        const activeTab = document.querySelector('.tab-btn.active');
        const tabName = activeTab ? activeTab.dataset.tab : 'home';
        if (tabName === 'home') {
            simpanPengaturanLanding();
        } else if (tabName === 'pendaftaran') {
            simpanPengaturanPendaftaran();
        } else if (tabName === 'jurusan') {
            simpanPengaturanJurusan();
        } else if (tabName === 'login') {
            simpanPengaturanLogin();
        } else if (tabName === 'kontak') {
            simpanPengaturanKontak();
        } else {
            toast('Halaman ini belum tersambung ke publik (menyusul)', 'fa-circle-info');
        }
    }

    function halamanPublikAktif() {
        const activeTab = document.querySelector('.tab-btn.active');
        const tabName = activeTab ? activeTab.dataset.tab : 'home';
        if (tabName === 'pendaftaran') {
            const activeStep = document.querySelector('.substep-btn.active');
            const step = activeStep ? activeStep.dataset.step : 'akun';
            return { akun: 'buat akun.html', formulir: 'formulir.html', berkas: 'unggah_berkas.html' }[step] || 'buat akun.html';
        }
        if (tabName === 'jurusan') return 'jurusan.html';
        if (tabName === 'login') return ('/login');
        if (tabName === 'kontak') return ('/kouta');
        // Tab lain: baru "home" yang sudah tersambung ke publik, sisanya menyusul.
        return 'home.html';
    }

    function pratinjauHalaman() {
        simpanSemua();
        window.open(halamanPublikAktif(), '_blank');
    }

    const ICON_OPTIONS = [
        ['fa-user-graduate','Topi Wisuda'], ['fa-gear','Roda Gigi'], ['fa-people-group','Kelompok Orang'],
        ['fa-earth-asia','Globe / Dunia'], ['fa-user-plus','Tambah Akun'], ['fa-file-lines','Formulir'],
        ['fa-cloud-arrow-up','Unggah Berkas'], ['fa-circle-check','Centang / Verifikasi'], ['fa-award','Penghargaan'],
        ['fa-desktop','Komputer / Online'], ['fa-circle-info','Informasi'], ['fa-magnifying-glass','Kaca Pembesar'],
        ['fa-bullhorn','Toa / Pengumuman'], ['fa-phone','Telepon'], ['fa-shield-heart','Perisai Hati'],
        ['fa-graduation-cap','Topi Sarjana'], ['fa-building','Gedung / Fasilitas'], ['fa-trophy','Piala'],
        ['fa-star','Bintang']
    ];
    function iconOptionsHtml(selected) {
        return ICON_OPTIONS.map(([v,l]) => `<option value="${v}" ${v===selected?'selected':''}>${l}</option>`).join('');
    }

    /* ==========================================================================
       LIST MANAGER GENERIK (untuk badge, langkah, jadwal, fitur, sosmed, misi, syarat, keunggulan)
       ========================================================================== */
    function ListManager(cfg) {
        this.key = cfg.key;
        this.data = cfg.data;
        this.containerId = cfg.containerId;
        this.fields = cfg.fields;
        this.emptyItem = cfg.emptyItem;
        this.renderRow = cfg.renderRow;
        this.afterRender = cfg.afterRender;
        this.confirmDeleteMsg = cfg.confirmDeleteMsg || 'Hapus item ini?';
    }
    ListManager.prototype.render = function () {
        const container = document.getElementById(this.containerId);
        container.innerHTML = '';
        if (this.data.length === 0) {
            container.innerHTML = '<div class="empty-list">Belum ada data. Klik tombol "Tambah" di atas untuk menambahkan.</div>';
        }
        this.data.forEach((item, idx) => {
            const row = document.createElement('div');
            row.className = 'list-item-row' + (item._editing ? ' editing' : '');
            if (item._editing) {
                row.innerHTML = this.buildEditForm(item);
            } else {
                row.innerHTML = `
                    <div class="list-item-index">${idx + 1}</div>
                    <div class="list-item-content">${this.renderRow(item)}</div>
                    <div class="list-item-actions">
                        <button class="btn-icon-only" title="Edit" onclick="managers.${this.key}.editItem('${item.id}')"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-icon-only danger" title="Hapus" onclick="managers.${this.key}.deleteItem('${item.id}')"><i class="fa-solid fa-trash"></i></button>
                    </div>`;
            }
            container.appendChild(row);
        });
        if (this.afterRender) this.afterRender();
    };
    ListManager.prototype.buildEditForm = function (item) {
        const fieldsHtml = this.fields.map(f => {
            const val = item[f.key] == null ? '' : item[f.key];
            const inputId = `f_${this.key}_${f.key}_${item.id}`;
            let inputHtml = '';
            if (f.type === 'textarea') {
                inputHtml = `<textarea id="${inputId}">${escapeHtml(val)}</textarea>`;
            } else if (f.type === 'icon-select') {
                inputHtml = `<select id="${inputId}">${iconOptionsHtml(val)}</select>`;
            } else if (f.type === 'select') {
                inputHtml = `<select id="${inputId}">${f.options.map(([v,l]) => `<option value="${v}" ${v===val?'selected':''}>${l}</option>`).join('')}</select>`;
            } else {
                inputHtml = `<input type="text" id="${inputId}" value="${escapeHtml(val)}">`;
            }
            return `<div class="field-group ${f.full ? 'full' : ''}"><label>${f.label}</label>${inputHtml}</div>`;
        }).join('');
        return `
            <div class="edit-form-grid">${fieldsHtml}</div>
            <div class="edit-form-actions">
                <button class="btn-icon-only" title="Simpan" style="background:#04352b;color:#fff;border-color:#04352b;" onclick="managers.${this.key}.saveItem('${item.id}')"><i class="fa-solid fa-check"></i></button>
                <button class="btn-icon-only" title="Batal" onclick="managers.${this.key}.cancelEdit('${item.id}')"><i class="fa-solid fa-xmark"></i></button>
            </div>`;
    };
    ListManager.prototype.addItem = function () {
        const item = this.emptyItem();
        item.id = uid();
        item._editing = true;
        item._isNew = true;
        this.data.push(item);
        this.render();
        const container = document.getElementById(this.containerId);
        container.lastElementChild && container.lastElementChild.scrollIntoView({ behavior: 'smooth', block: 'center' });
    };
    ListManager.prototype.editItem = function (id) {
        const item = this.data.find(d => d.id === id);
        if (item) { item._editing = true; this.render(); }
    };
    ListManager.prototype.cancelEdit = function (id) {
        const item = this.data.find(d => d.id === id);
        if (!item) return;
        if (item._isNew) {
            this.data = this.data.filter(d => d.id !== id);
        } else {
            item._editing = false;
        }
        this.render();
    };
    ListManager.prototype.saveItem = function (id) {
        const item = this.data.find(d => d.id === id);
        if (!item) return;
        this.fields.forEach(f => {
            const el = document.getElementById(`f_${this.key}_${f.key}_${id}`);
            if (el) item[f.key] = el.value;
        });
        item._editing = false;
        item._isNew = false;
        this.render();
        toast('Perubahan disimpan');
    };
    ListManager.prototype.deleteItem = function (id) {
        if (!confirm(this.confirmDeleteMsg)) return;
        this.data = this.data.filter(d => d.id !== id);
        this.render();
        toast('Item dihapus', 'fa-trash');
    };

    /* ==========================================================================
       DATA AWAL (mengikuti isi home.html saat ini)
       ========================================================================== */
    const managers = {};

    // --- Badge Keunggulan ---
    managers.badges = new ListManager({
        key: 'badges',
        data: [
            { id: uid(), icon: 'fa-user-graduate', label: 'Sekolah Islam Berprestasi' },
            { id: uid(), icon: 'fa-gear', label: 'Kompeten di Bidangnya' },
            { id: uid(), icon: 'fa-people-group', label: 'Siap Kerja & Wirausaha' },
            { id: uid(), icon: 'fa-earth-asia', label: 'Berwawasan Global' }
        ],
        containerId: 'list-badges',
        fields: [{ key: 'icon', label: 'Ikon', type: 'icon-select' }, { key: 'label', label: 'Teks Label', type: 'text' }],
        emptyItem: () => ({ icon: 'fa-star', label: 'Label Baru' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid ${item.icon}"></i></div><span style="align-self:center;">${escapeHtml(item.label)}</span>`,
        afterRender: () => updateHeroPreview(),
        confirmDeleteMsg: 'Hapus badge ini dari hero?'
    });

    // --- Langkah Alur SPMB ---
    managers.steps = new ListManager({
        key: 'steps',
        data: [
            { id: uid(), icon: 'fa-user-plus', title: 'Buat Akun', desc: 'Log in dan lengkapi data diri anda untuk membuat akun pendaftaran.' },
            { id: uid(), icon: 'fa-file-lines', title: 'Isi Formulir', desc: 'Isi formulir biodata siswa secara lengkap dan benar.' },
            { id: uid(), icon: 'fa-cloud-arrow-up', title: 'Unggah Berkas', desc: 'Upload berkas administrasi seperti KK dan Akta Kelahiran.' },
            { id: uid(), icon: 'fa-circle-check', title: 'Verifikasi Data', desc: 'Tunggu proses pengecekan berkas oleh panitia sekolah.' },
            { id: uid(), icon: 'fa-award', title: 'Pengumuman', desc: 'Lihat hasil seleksi penerimaan langsung di dashboard.' }
        ],
        containerId: 'list-steps',
        fields: [{ key: 'icon', label: 'Ikon', type: 'icon-select' }, { key: 'title', label: 'Judul Langkah', type: 'text' }, { key: 'desc', label: 'Deskripsi', type: 'textarea', full: true }],
        emptyItem: () => ({ icon: 'fa-circle-check', title: 'Langkah Baru', desc: 'Deskripsi langkah baru.' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid ${item.icon}"></i></div><div><strong>${escapeHtml(item.title)}</strong><div class="row-sub">${escapeHtml(item.desc)}</div></div>`,
        confirmDeleteMsg: 'Hapus langkah ini dari alur SPMB?'
    });

    // --- Misi ---
    managers.misi = new ListManager({
        key: 'misi',
        data: [
            { id: uid(), text: 'Menanamkan nilai-nilai Islam Ahlussunah Wal Jama\u2019ah dan nilai-nilai kebangsaan dengan berkarakter tinggi dan berakhlak mulia.' },
            { id: uid(), text: 'Meningkatkan mutu penyelenggaraan pendidikan sehingga menghasilkan lulusan yang memiliki kompetensi kompetitif.' },
            { id: uid(), text: 'Meningkatkan keterampilan di bidang kejuruan.' },
            { id: uid(), text: 'Memiliki kompetensi dan membangun jiwa wirausaha yang handal.' },
            { id: uid(), text: 'Melaksanakan sistem pendidikan berbasis teknologi informasi dan komunikasi.' }
        ],
        containerId: 'list-misi',
        fields: [{ key: 'text', label: 'Poin Misi', type: 'textarea', full: true }],
        emptyItem: () => ({ text: 'Poin misi baru.' }),
        renderRow: item => `<div class="row-icon small"><i class="fa-solid fa-circle"></i></div><span>${escapeHtml(item.text)}</span>`,
        confirmDeleteMsg: 'Hapus poin misi ini?'
    });

    // --- Jadwal Gelombang ---
    managers.jadwal = new ListManager({
        key: 'jadwal',
        data: [
            { id: uid(), gelombang: 'Gelombang 1', tanggal: 'Januari - Maret 2026' },
            { id: uid(), gelombang: 'Gelombang 2', tanggal: 'April - Juli 2026' }
        ],
        containerId: 'list-jadwal',
        fields: [{ key: 'gelombang', label: 'Nama Gelombang', type: 'text' }, { key: 'tanggal', label: 'Periode Tanggal', type: 'text' }],
        emptyItem: () => ({ gelombang: 'Gelombang Baru', tanggal: 'Bulan - Bulan Tahun' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid fa-calendar-days"></i></div><div><strong>${escapeHtml(item.gelombang)}</strong><div class="row-sub">${escapeHtml(item.tanggal)}</div></div>`,
        confirmDeleteMsg: 'Hapus jadwal gelombang ini?'
    });

    // --- Syarat Pendaftaran ---
    managers.syarat = new ListManager({
        key: 'syarat',
        data: [
            { id: uid(), text: 'Mengisi Formulir Pendaftaran' },
            { id: uid(), text: 'Foto Copy Kartu Keluarga' },
            { id: uid(), text: 'Pas foto ukuran 3x4 (4 lembar)' },
            { id: uid(), text: 'Pas foto ukuran 4x6 (2 lembar)' },
            { id: uid(), text: 'Biaya pendaftaran Rp 20.000 (Khusus gel. II)' },
            { id: uid(), text: 'Foto Copy KIP, PKH, KPS, KIS bagi yang memiliki' },
            { id: uid(), text: 'Foto copy KTP kedua orang tua' },
            { id: uid(), text: 'Foto copy Akta Kelahiran' }
        ],
        containerId: 'list-syarat',
        fields: [{ key: 'text', label: 'Syarat Pendaftaran', type: 'text', full: true }],
        emptyItem: () => ({ text: 'Syarat baru.' }),
        renderRow: item => `<div class="row-icon small"><i class="fa-solid fa-circle"></i></div><span>${escapeHtml(item.text)}</span>`,
        confirmDeleteMsg: 'Hapus syarat ini?'
    });

    // --- Keunggulan & Praktik Kerja ---
    managers.keunggulan = new ListManager({
        key: 'keunggulan',
        data: [
            { id: uid(), label: 'Praktik Langsung', desc: 'Siswa dilatih langsung mengelola bisnis riil di seluruh jaringan Unit Usaha Sekolah.' },
            { id: uid(), label: 'Kesiapan Kerja', desc: 'Lulusan memiliki pengalaman kerja nyata yang diakui oleh dunia usaha dan industri.' },
            { id: uid(), label: 'Peluang Wirausaha', desc: 'Inkubator bisnis sekolah siap mencetak lulusan menjadi pengusaha muda mandiri.' }
        ],
        containerId: 'list-keunggulan',
        fields: [{ key: 'label', label: 'Judul Singkat', type: 'text' }, { key: 'desc', label: 'Deskripsi', type: 'textarea', full: true }],
        emptyItem: () => ({ label: 'Judul Baru', desc: 'Deskripsi keunggulan baru.' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid fa-check"></i></div><div><strong>${escapeHtml(item.label)}:</strong><span class="row-sub">${escapeHtml(item.desc)}</span></div>`,
        confirmDeleteMsg: 'Hapus poin keunggulan ini?'
    });

    // --- Fitur Utama ---
    managers.fitur = new ListManager({
        key: 'fitur',
        data: [
            { id: uid(), icon: 'fa-desktop', title: 'PPDB Online', desc: 'Pendaftaran online mudah, cepat dan terpercaya.' },
            { id: uid(), icon: 'fa-circle-info', title: 'Informasi Lengkap', desc: 'Informasi jurusan, biaya, jadwal dan berita terbaru.' },
            { id: uid(), icon: 'fa-magnifying-glass', title: 'Cek Status', desc: 'Pantau status pendaftaran secara real-time.' },
            { id: uid(), icon: 'fa-bullhorn', title: 'Pengumuman', desc: 'Informasi hasil seleksi dapat diakses dengan mudah.' },
            { id: uid(), icon: 'fa-phone', title: 'Kontak Cepat', desc: 'Hubungi kami untuk informasi lebih lanjut.' }
        ],
        containerId: 'list-fitur',
        fields: [{ key: 'icon', label: 'Ikon', type: 'icon-select' }, { key: 'title', label: 'Judul Fitur', type: 'text' }, { key: 'desc', label: 'Deskripsi', type: 'textarea', full: true }],
        emptyItem: () => ({ icon: 'fa-star', title: 'Fitur Baru', desc: 'Deskripsi fitur baru.' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid ${item.icon}"></i></div><div><strong>${escapeHtml(item.title)}</strong><div class="row-sub">${escapeHtml(item.desc)}</div></div>`,
        confirmDeleteMsg: 'Hapus kartu fitur ini?'
    });

    // --- Sosial Media (footer) ---
    managers.sosmed = new ListManager({
        key: 'sosmed',
        data: [
            { id: uid(), platform: 'instagram', url: 'https://www.instagram.com/officialsmkmw9' },
            { id: uid(), platform: 'tiktok', url: 'https://www.tiktok.com/@officialsmkmw9' },
            { id: uid(), platform: 'youtube', url: 'https://www.youtube.com/@officialsmkmaarifwalisongo1198' },
            { id: uid(), platform: 'facebook', url: 'https://www.facebook.com/pages/SMKS-MAARIF-WALISONGO-KAJORAN' },
            { id: uid(), platform: 'whatsapp', url: 'https://wa.me/02933195678' }
        ],
        containerId: 'list-sosmed',
        fields: [
            { key: 'platform', label: 'Platform', type: 'select', options: [['instagram','Instagram'],['tiktok','TikTok'],['youtube','YouTube'],['facebook','Facebook'],['whatsapp','WhatsApp']] },
            { key: 'url', label: 'Link URL', type: 'text' }
        ],
        emptyItem: () => ({ platform: 'instagram', url: 'https://' }),
        renderRow: item => `<div class="row-icon"><i class="fa-brands fa-${item.platform}"></i></div><div><strong>${capitalize(item.platform)}</strong><div class="row-sub">${escapeHtml(item.url)}</div></div>`,
        confirmDeleteMsg: 'Hapus tautan sosial media ini?'
    });

    /* ==========================================================================
       KOMPONEN FIELD FORMULIR (dipakai di Buat Akun & Isi Formulir)
       ========================================================================== */
    const FIELD_TYPE_OPTIONS = [
        ['text','Teks Singkat'], ['number','Angka'], ['textarea','Area Teks Panjang'], ['date','Tanggal'],
        ['select','Pilihan Dropdown'], ['radio','Pilihan Radio (satu jawaban)'],
        ['checkbox','Pilihan Checkbox (bisa lebih dari satu)'], ['info','Kotak Informasi (bukan input)']
    ];
    function fieldTypeLabel(type) { const f = FIELD_TYPE_OPTIONS.find(o => o[0] === type); return f ? f[1] : type; }
    function fieldTypeIcon(type) {
        return { text:'fa-i-cursor', number:'fa-hashtag', textarea:'fa-align-left', date:'fa-calendar-day',
                 select:'fa-caret-down', radio:'fa-circle-dot', checkbox:'fa-square-check', info:'fa-circle-info' }[type] || 'fa-i-cursor';
    }
    const FORM_FIELD_DEFS = [
        { key:'label', label:'Label Pertanyaan', type:'text', full:true },
        { key:'type', label:'Tipe Input', type:'select', options: FIELD_TYPE_OPTIONS },
        { key:'required', label:'Wajib Diisi?', type:'select', options:[['ya','Ya, Wajib'],['tidak','Tidak, Opsional']] },
        { key:'options', label:'Pilihan Jawaban (pisahkan dengan koma, khusus Dropdown/Radio/Checkbox)', type:'text', full:true },
        { key:'helper', label:'Placeholder / Catatan Bantuan (opsional)', type:'text', full:true }
    ];
    function fieldRowRenderer(item) {
        const reqHtml = item.required === 'ya' ? '<span class="req-badge-yes">Wajib</span>' : '<span class="req-badge-no">Opsional</span>';
        return `<div class="row-icon"><i class="fa-solid ${fieldTypeIcon(item.type)}"></i></div>
            <div>
                <strong>${escapeHtml(item.label)}</strong>
                <span class="type-badge">${escapeHtml(fieldTypeLabel(item.type))}</span> ${reqHtml}
                ${item.options ? `<div class="row-sub">Pilihan: ${escapeHtml(item.options)}</div>` : ''}
                ${item.helper ? `<div class="row-sub">${escapeHtml(item.helper)}</div>` : ''}
            </div>`;
    }
    function emptyFormField() { return { label: 'Pertanyaan Baru', type: 'text', required: 'ya', options: '', helper: '' }; }

    // --- Field Formulir: Buat Akun ---
    managers.akunFields = new ListManager({
        key: 'akunFields',
        data: [
            { id: uid(), label: 'Nama Lengkap', type: 'text', required: 'ya', options: '', helper: '' },
            { id: uid(), label: 'No. HP / WhatsApp', type: 'number', required: 'ya', options: '', helper: '' },
            { id: uid(), label: 'Email', type: 'text', required: 'ya', options: '', helper: '' },
            { id: uid(), label: 'Password', type: 'text', required: 'ya', options: '', helper: 'Minimal 8 karakter' }
        ],
        containerId: 'list-akunFields',
        fields: FORM_FIELD_DEFS,
        emptyItem: emptyFormField,
        renderRow: fieldRowRenderer,
        confirmDeleteMsg: 'Hapus field ini dari formulir Buat Akun?'
    });

    // --- Daftar Dokumen: Unggah Berkas ---
    const BERKAS_FIELD_DEFS = [
        { key:'judul', label:'Nama Dokumen', type:'text', full:true },
        { key:'format', label:'Format Diizinkan', type:'text' },
        { key:'maxSize', label:'Ukuran Maksimal', type:'text' },
        { key:'kondisi', label:'Kapan Ditampilkan', type:'select', options:[['selalu','Selalu Wajib'],['opsional','Opsional (boleh menyusul)'],['kps','Kondisional • jika Penerima KPS/KIP = Ya'],['transfer','Kondisional • jika Metode Pembayaran = Transfer']] }
    ];
    function kondisiLabel(k) { return { selalu:'Wajib diunggah', opsional:'Opsional • boleh menyusul', kps:'Kondisional • muncul jika Penerima KPS/KIP = Ya', transfer:'Kondisional • muncul jika Metode Pembayaran = Transfer' }[k] || k; }
    managers.berkasList = new ListManager({
        key: 'berkasList',
        data: [
            { id: uid(), judul: 'Kartu Keluarga (KK)', format: 'PDF/JPG/PNG', maxSize: '2MB', kondisi: 'selalu' },
            { id: uid(), judul: 'Akta Kelahiran', format: 'PDF/JPG/PNG', maxSize: '2MB', kondisi: 'selalu' },
            { id: uid(), judul: 'KTP Ayah', format: 'PDF/JPG/PNG', maxSize: '1MB', kondisi: 'selalu' },
            { id: uid(), judul: 'KTP Ibu', format: 'PDF/JPG/PNG', maxSize: '1MB', kondisi: 'selalu' },
            { id: uid(), judul: 'Penerima KIP / KKS / PKH', format: 'PDF/JPG/PNG', maxSize: '1MB', kondisi: 'kps' },
            { id: uid(), judul: 'Bukti Bayar Gelombang 2 (Rp20.000)', format: 'PDF/JPG/PNG', maxSize: '2MB', kondisi: 'transfer' },
            { id: uid(), judul: 'Pas Foto Formal 3x4', format: 'JPG/PNG', maxSize: '2MB', kondisi: 'opsional' },
            { id: uid(), judul: 'SKL / Ijazah SMP/MTs', format: 'PDF/JPG/PNG', maxSize: '2MB', kondisi: 'opsional' }
        ],
        containerId: 'list-berkasList',
        fields: BERKAS_FIELD_DEFS,
        emptyItem: () => ({ judul: 'Dokumen Baru', format: 'PDF/JPG/PNG', maxSize: '2MB', kondisi: 'selalu' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid fa-file-lines"></i></div>
            <div><strong>${escapeHtml(item.judul)}</strong>
            <div class="row-sub">Format: ${escapeHtml(item.format)} • Maks ${escapeHtml(item.maxSize)}</div>
            <div class="row-sub">${kondisiLabel(item.kondisi)}</div></div>`,
        confirmDeleteMsg: 'Hapus dokumen ini dari daftar unggah berkas?'
    });

    Object.values(managers).forEach(m => m.render());

    /* ==========================================================================
       SIMPAN & MUAT — HALAMAN PENDAFTARAN (akun, formulir, berkas)
       ========================================================================== */
    function collectPendaftaranData() {
        return {
            akun: {
                judul: val('akunJudul'), desc: val('akunDesc'),
                fields: managers.akunFields.data.map(({ label, type, required, options, helper }) => ({ label, type, required, options, helper }))
            },
            formulir: {
                judul: val('formulirJudul'), desc: val('formulirDesc'),
                biayaGelombang2: val('biayaGelombang2'),
                rekBank: val('rekBank'), rekNomor: val('rekNomor'),
                rekAtasNama: val('rekAtasNama'), rekCatatan: val('rekCatatan')
            },
            berkas: {
                judul: val('berkasJudul'), desc: val('berkasDesc'),
                list: managers.berkasList.data.map(({ judul, format, maxSize, kondisi }) => ({ judul, format, maxSize, kondisi }))
            }
        };
    }

    function simpanPengaturanPendaftaran() {
        let config = {};
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)) || {}; } catch (e) { config = {}; }
        config.pendaftaran = collectPendaftaranData();
        config.lastUpdated = new Date().toISOString();
        localStorage.setItem(LANDING_STORAGE_KEY, JSON.stringify(config));
        toast('Halaman Pendaftaran tersimpan & diterapkan ke halaman publik', 'fa-circle-check');
    }

    function loadSavedPendaftaranData() {
        let config;
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)); } catch (e) { config = null; }
        if (!config || !config.pendaftaran) return;
        const p = config.pendaftaran;
        if (p.akun) {
            setVal('akunJudul', p.akun.judul); setVal('akunDesc', p.akun.desc);
            if (Array.isArray(p.akun.fields) && p.akun.fields.length) managers.akunFields.data = p.akun.fields.map(x => ({ id: uid(), ...x }));
        }
        if (p.formulir) {
            setVal('formulirJudul', p.formulir.judul); setVal('formulirDesc', p.formulir.desc);
            setVal('biayaGelombang2', p.formulir.biayaGelombang2);
            setVal('rekBank', p.formulir.rekBank); setVal('rekNomor', p.formulir.rekNomor);
            setVal('rekAtasNama', p.formulir.rekAtasNama); setVal('rekCatatan', p.formulir.rekCatatan);
        }
        if (p.berkas) {
            setVal('berkasJudul', p.berkas.judul); setVal('berkasDesc', p.berkas.desc);
            if (Array.isArray(p.berkas.list) && p.berkas.list.length) managers.berkasList.data = p.berkas.list.map(x => ({ id: uid(), ...x }));
        }
        managers.akunFields.render();
        managers.berkasList.render();
    }
    loadSavedPendaftaranData();

    /* ==========================================================================
       SECTION FORMULIR BERTINGKAT (Isi Formulir - Langkah 2)
       Setiap section punya judul sendiri + daftar field sendiri (add/edit/hapus)
       ========================================================================== */
    let formSections = [
        {
            id: uid(), title: 'Data Lengkap Calon Siswa',
            fields: [
                { id: uid(), label: 'Nama Lengkap Calon Siswa', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Asal Sekolah', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'NISN', type: 'number', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Nomor HP Siswa (Aktif)', type: 'number', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Tempat Lahir', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Tanggal Lahir', type: 'date', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Tinggi Badan (cm)', type: 'number', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Berat Badan (kg)', type: 'number', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Jumlah Saudara', type: 'number', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Jenis Kelamin', type: 'radio', required: 'ya', options: 'Laki-laki, Perempuan', helper: '' },
                { id: uid(), label: 'Agama', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Memiliki Kebutuhan Khusus?', type: 'radio', required: 'ya', options: 'Ya, Tidak', helper: '' },
                { id: uid(), label: 'Penerima KPS / KKS / KIP?', type: 'radio', required: 'ya', options: 'Ya, Tidak', helper: '' },
                { id: uid(), label: 'Jenis Kartu yang Dimiliki', type: 'checkbox', required: 'tidak', options: 'KPS, KKS, KIP', helper: 'Muncul jika Penerima KPS/KIP dijawab Ya' }
            ]
        },
        {
            id: uid(), title: 'Data Orang Tua - Ayah',
            fields: [
                { id: uid(), label: 'Nama Ayah', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Pendidikan Terakhir Ayah', type: 'select', required: 'ya', options: 'Tidak Sekolah, SD/MI, SMP/MTs, SMA/MA/SMK, D1/D2/D3, S1, S2/S3', helper: '' },
                { id: uid(), label: 'Pekerjaan Ayah', type: 'text', required: 'tidak', options: '', helper: '' },
                { id: uid(), label: 'Tahun Lahir Ayah', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Penghasilan Bulanan Ayah', type: 'select', required: 'ya', options: 'Tidak Berpenghasilan, < Rp1.000.000, Rp1.000.000-1.999.999, Rp2.000.000-4.999.999, Rp5.000.000-20.000.000, > Rp20.000.000', helper: '' },
                { id: uid(), label: 'Nomor Telepon Ayah', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Memiliki Kebutuhan Khusus?', type: 'radio', required: 'tidak', options: 'Ya, Tidak', helper: '' }
            ]
        },
        {
            id: uid(), title: 'Data Orang Tua - Ibu',
            fields: [
                { id: uid(), label: 'Nama Ibu', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Pendidikan Terakhir Ibu', type: 'select', required: 'ya', options: 'Tidak Sekolah, SD/MI, SMP/MTs, SMA/MA/SMK, D1/D2/D3, S1, S2/S3', helper: '' },
                { id: uid(), label: 'Pekerjaan Ibu', type: 'text', required: 'tidak', options: '', helper: '' },
                { id: uid(), label: 'Tahun Lahir Ibu', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Penghasilan Bulanan Ibu', type: 'select', required: 'ya', options: 'Tidak Berpenghasilan, < Rp1.000.000, Rp1.000.000-1.999.999, Rp2.000.000-4.999.999, Rp5.000.000-20.000.000, > Rp20.000.000', helper: '' },
                { id: uid(), label: 'Nomor Telepon Ibu', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Memiliki Kebutuhan Khusus?', type: 'radio', required: 'tidak', options: 'Ya, Tidak', helper: '' }
            ]
        },
        {
            id: uid(), title: 'Data Wali (Opsional)',
            fields: [
                { id: uid(), label: 'Nama Wali', type: 'text', required: 'tidak', options: '', helper: 'Diisi jika siswa tidak tinggal bersama orang tua' },
                { id: uid(), label: 'Pendidikan Terakhir Wali', type: 'select', required: 'tidak', options: 'Tidak Sekolah, SD/MI, SMP/MTs, SMA/MA/SMK, D1/D2/D3, S1, S2/S3', helper: '' },
                { id: uid(), label: 'Pekerjaan Wali', type: 'text', required: 'tidak', options: '', helper: '' },
                { id: uid(), label: 'Penghasilan Bulanan Wali', type: 'select', required: 'tidak', options: 'Tidak Berpenghasilan, < Rp1.000.000, Rp1.000.000-1.999.999, Rp2.000.000-4.999.999, Rp5.000.000-20.000.000, > Rp20.000.000', helper: '' },
                { id: uid(), label: 'Nomor Telepon Wali', type: 'text', required: 'tidak', options: '', helper: '' }
            ]
        },
        {
            id: uid(), title: 'Data Tempat Tinggal Siswa',
            fields: [
                { id: uid(), label: 'Provinsi', type: 'select', required: 'ya', options: '', helper: 'Otomatis dari API Wilayah Indonesia' },
                { id: uid(), label: 'Kabupaten / Kota', type: 'select', required: 'ya', options: '', helper: 'Otomatis mengikuti pilihan Provinsi' },
                { id: uid(), label: 'Kecamatan', type: 'select', required: 'ya', options: '', helper: 'Otomatis mengikuti pilihan Kabupaten' },
                { id: uid(), label: 'Desa / Kelurahan', type: 'select', required: 'ya', options: '', helper: 'Otomatis mengikuti pilihan Kecamatan' },
                { id: uid(), label: 'Alamat Lengkap', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'RT', type: 'number', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'RW', type: 'number', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Kode Pos', type: 'number', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Jenis Tinggal', type: 'select', required: 'tidak', options: 'Bersama Orang Tua, Asrama, Kos/Kontrak, Pondok Pesantren', helper: '' },
                { id: uid(), label: 'Alat Transportasi ke Sekolah', type: 'text', required: 'ya', options: '', helper: '' },
                { id: uid(), label: 'Jarak ke Sekolah', type: 'text', required: 'ya', options: '', helper: '' }
            ]
        },
        {
            id: uid(), title: 'Pilihan Jurusan & Gelombang Pendaftaran',
            fields: [
                { id: uid(), label: 'Pilihan Kompetensi Keahlian (Jurusan 1)', type: 'radio', required: 'ya', options: 'PPLG, BCF, MPLB', helper: 'Daftar pilihan mengikuti data di menu Kuota Jurusan' },
                { id: uid(), label: 'Pilihan Kompetensi Keahlian (Jurusan 2)', type: 'radio', required: 'ya', options: 'PPLG, BCF, MPLB', helper: 'Tidak boleh sama dengan Jurusan 1' },
                { id: uid(), label: 'Pilih Gelombang Pendaftaran', type: 'select', required: 'ya', options: 'Gelombang 1 (Januari - Maret 2026), Gelombang 2 (April - Juli 2026)', helper: 'Daftar gelombang mengikuti data di menu Informasi > Gelombang Pendaftaran. Memilih Gelombang 2 akan menampilkan kolom Metode Pembayaran' }
            ]
        },
        {
            id: uid(), title: 'Metode Pembayaran (khusus Gelombang 2)',
            fields: [
                { id: uid(), label: 'Pilih Metode Pembayaran Pendaftaran (Rp 20.000)', type: 'select', required: 'ya', options: 'Bayar Langsung di Sekolah (Cash), Transfer Bank', helper: 'Memilih Transfer Bank akan menampilkan kotak Info Rekening di bawah' }
            ]
        }
    ];

    function renderFormSections() {
        const wrap = document.getElementById('formSectionsWrap');
        wrap.innerHTML = '';
        formSections.forEach((sec, idx) => {
            const card = document.createElement('div');
            card.className = 'card-panel';
            card.innerHTML = `
                <div class="panel-header">
                    <div class="panel-header-left" style="flex:1;">
                        <div class="panel-header-icon">${idx + 1}</div>
                        <input type="text" value="${escapeHtml(sec.title)}" oninput="renameFormSection('${sec.id}', this.value)"
                            style="border:none;font-size:15px;font-weight:700;color:#04352b;background:transparent;outline:none;width:100%;max-width:360px;">
                    </div>
                    <div style="display:flex;gap:8px;flex-shrink:0;">
                        <button class="btn btn-outline btn-sm" onclick="managers['formSection_${sec.id}'].addItem()"><i class="fa-solid fa-plus"></i> Tambah Field</button>
                        <button class="btn-icon-only danger" title="Hapus Bagian Ini" onclick="deleteFormSection('${sec.id}')"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="list-wrap" id="formSectionFieldsList_${sec.id}"></div>
                </div>`;
            wrap.appendChild(card);

            if (!managers['formSection_' + sec.id]) {
                managers['formSection_' + sec.id] = new ListManager({
                    key: 'formSection_' + sec.id,
                    data: sec.fields,
                    containerId: 'formSectionFieldsList_' + sec.id,
                    fields: FORM_FIELD_DEFS,
                    emptyItem: emptyFormField,
                    renderRow: fieldRowRenderer,
                    confirmDeleteMsg: 'Hapus field ini dari bagian "' + sec.title + '"?'
                });
            }
            managers['formSection_' + sec.id].render();
        });
    }
    function addFormSection() {
        const sec = { id: uid(), title: 'Bagian Baru', fields: [] };
        formSections.push(sec);
        renderFormSections();
        toast('Bagian baru ditambahkan, silakan isi field-nya', 'fa-plus');
        setTimeout(() => {
            const el = document.getElementById('formSectionFieldsList_' + sec.id);
            if (el) el.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 50);
    }
    function deleteFormSection(id) {
        const sec = formSections.find(s => s.id === id);
        if (!sec) return;
        if (!confirm(`Hapus seluruh bagian "${sec.title}" beserta semua field di dalamnya?`)) return;
        formSections = formSections.filter(s => s.id !== id);
        delete managers['formSection_' + id];
        renderFormSections();
        toast('Bagian dihapus', 'fa-trash');
    }
    function renameFormSection(id, val) {
        const sec = formSections.find(s => s.id === id);
        if (sec) sec.title = val;
    }
    renderFormSections();

    /* ==========================================================================
       UNIT USAHA (logo + nama) - komponen khusus karena berisi gambar
       ========================================================================== */
    let unitUsaha = [
        { id: uid(), nama: 'NANO', logo: '' },
        { id: uid(), nama: 'ANANTARA', logo: '' },
        { id: uid(), nama: 'RADIKSA', logo: '' },
        { id: uid(), nama: 'NJE', logo: '' },
        { id: uid(), nama: 'TEFA', logo: '' },
        { id: uid(), nama: 'WandeQTA', logo: '' },
        { id: uid(), nama: 'MWTV', logo: '' }
    ];
    function renderUnitUsaha() {
        const grid = document.getElementById('grid-unitusaha');
        grid.innerHTML = '';
        unitUsaha.forEach(item => {
            const card = document.createElement('div');
            card.className = 'logo-item';
            card.innerHTML = `
                <img src="${item.logo || placeholderImg()}" onerror="this.src=placeholderImg();">
                <input type="text" value="${escapeHtml(item.nama)}" onchange="renameUnitUsaha('${item.id}', this.value)">
                <div class="logo-item-actions">
                    <label class="btn-icon-only" title="Ganti Logo"><i class="fa-solid fa-arrow-up-from-bracket"></i>
                        <input type="file" accept="image/*" hidden onchange="uploadUnitUsahaLogo(event,'${item.id}')">
                    </label>
                    <button class="btn-icon-only danger" title="Hapus" onclick="deleteUnitUsaha('${item.id}')"><i class="fa-solid fa-trash"></i></button>
                </div>`;
            grid.appendChild(card);
        });
        const addCard = document.createElement('div');
        addCard.className = 'logo-add-card';
        addCard.innerHTML = `<i class="fa-solid fa-plus"></i><span>Tambah Logo</span><input type="file" accept="image/*" hidden id="addUnitUsahaInput" onchange="addUnitUsaha(event)">`;
        addCard.onclick = () => document.getElementById('addUnitUsahaInput').click();
        grid.appendChild(addCard);
    }
    function renameUnitUsaha(id, val) {
        const item = unitUsaha.find(u => u.id === id);
        if (item) { item.nama = val; toast('Nama unit usaha diperbarui'); }
    }
    function uploadUnitUsahaLogo(event, id) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const item = unitUsaha.find(u => u.id === id);
            if (item) { item.logo = e.target.result; renderUnitUsaha(); toast('Logo diperbarui', 'fa-image'); }
        };
        reader.readAsDataURL(file);
    }
    function addUnitUsaha(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            unitUsaha.push({ id: uid(), nama: 'Unit Usaha Baru', logo: e.target.result });
            renderUnitUsaha();
            toast('Logo unit usaha ditambahkan', 'fa-plus');
        };
        reader.readAsDataURL(file);
    }
    function deleteUnitUsaha(id) {
        if (!confirm('Hapus logo unit usaha ini?')) return;
        unitUsaha = unitUsaha.filter(u => u.id !== id);
        renderUnitUsaha();
        toast('Logo dihapus', 'fa-trash');
    }
    renderUnitUsaha();
    loadSavedHomeData();

    /* ==========================================================================
       HALAMAN JURUSAN - HERO (live preview)
       ========================================================================== */
    function updateJurusanHeroPreview() {
        const breadcrumb = document.getElementById('jrBreadcrumb').value;
        const t1 = document.getElementById('jrTitle1').value;
        const t2 = document.getElementById('jrTitle2').value;
        const desc = document.getElementById('jrDesc').value;
        const quote = document.getElementById('jrQuote').value;
        document.getElementById('jrpBreadcrumb').textContent = breadcrumb;
        document.getElementById('jrpTitle').innerHTML = `${escapeHtml(t1)}<br><span style="color:#5eead4">${escapeHtml(t2)}</span>`;
        document.getElementById('jrpDesc').textContent = desc;
        document.getElementById('jrpQuote').textContent = quote;
        const bg = document.getElementById('jrThumbBg').src;
        const prev = document.getElementById('jrHeroPreview');
        if (bg && !bg.startsWith('data:image/svg')) {
            prev.style.backgroundImage = `linear-gradient(to right, rgba(0,58,59,.92) 40%, rgba(0,58,59,.55) 100%), url('${bg}')`;
        } else {
            prev.style.backgroundImage = 'none';
        }
    }
    updateJurusanHeroPreview();

    /* ==========================================================================
       HALAMAN JURUSAN - DAFTAR PROGRAM KEAHLIAN
       (setiap item berisi data kartu jurusan.html + data lengkap halaman detailnya)
       ========================================================================== */
    function emptyTextItem(placeholder) { return () => ({ id: uid(), text: placeholder || 'Poin baru.' }); }
    const TEXT_LIST_FIELDS = [{ key: 'text', label: 'Isi Poin', type: 'text', full: true }];
    const textRowRenderer = item => `<div class="row-icon small"><i class="fa-solid fa-circle"></i></div><span>${escapeHtml(item.text)}</span>`;
    const ICON_LABEL_FIELDS = [{ key: 'icon', label: 'Ikon', type: 'icon-select' }, { key: 'label', label: 'Label', type: 'text' }];
    const iconLabelRenderer = item => `<div class="row-icon"><i class="fa-solid ${item.icon}"></i></div><span style="align-self:center;">${escapeHtml(item.label)}</span>`;
    const BADGE_HERO_FIELDS = [{ key: 'icon', label: 'Ikon', type: 'icon-select' }, { key: 'title', label: 'Baris 1 (mis. "Coding &")', type: 'text' }, { key: 'sub', label: 'Baris 2 (mis. "Programming")', type: 'text' }];
    const badgeHeroRenderer = item => `<div class="row-icon"><i class="fa-solid ${item.icon}"></i></div><div><strong>${escapeHtml(item.title)}</strong><div class="row-sub">${escapeHtml(item.sub)}</div></div>`;

    function ensureJurusanSubManagers(item) {
        const defs = [
            ['jurusan_checklist_' + item.id, item.checklist, 'jurusanChecklistList_' + item.id, TEXT_LIST_FIELDS, emptyTextItem('Poin keunggulan baru.'), textRowRenderer, 'Hapus poin checklist ini?'],
            ['jurusan_badges_' + item.id, item.detail.badges, 'jurusanBadgesList_' + item.id, BADGE_HERO_FIELDS, () => ({ id: uid(), icon: 'fa-star', title: 'Judul', sub: 'Sub Judul' }), badgeHeroRenderer, 'Hapus badge hero detail ini?'],
            ['jurusan_karier_' + item.id, item.detail.karier, 'jurusanKarierList_' + item.id, ICON_LABEL_FIELDS, () => ({ id: uid(), icon: 'fa-star', label: 'Karier Baru' }), iconLabelRenderer, 'Hapus peluang karier ini?'],
            ['jurusan_mapel_' + item.id, item.detail.mapel, 'jurusanMapelList_' + item.id, TEXT_LIST_FIELDS, emptyTextItem('Mata pelajaran baru.'), textRowRenderer, 'Hapus mata pelajaran ini?'],
            ['jurusan_fasilitas_' + item.id, item.detail.fasilitas, 'jurusanFasilitasList_' + item.id, TEXT_LIST_FIELDS, emptyTextItem('Fasilitas baru.'), textRowRenderer, 'Hapus fasilitas ini?'],
            ['jurusan_sertifikasi_' + item.id, item.detail.sertifikasi, 'jurusanSertifikasiList_' + item.id, TEXT_LIST_FIELDS, emptyTextItem('Peluang lanjut / sertifikasi baru.'), textRowRenderer, 'Hapus poin ini?']
        ];
        defs.forEach(([key, data, containerId, fields, emptyItem, renderRow, confirmDeleteMsg]) => {
            if (!managers[key]) {
                managers[key] = new ListManager({ key, data, containerId, fields, emptyItem, renderRow, confirmDeleteMsg });
            }
        });
    }

    function emptyJurusanItem(nomor) {
        return {
            id: uid(),
            nomor: nomor || '0' + (jurusanList.length + 1),
            slug: 'JURUSAN', namaLengkap: 'Nama Program Keahlian Baru', subJudulDetail: 'Tagline singkat jurusan',
            link: 'detail_jurusan_baru.html', gambarCard: '', iconPojok: '',
            deskripsi: 'Deskripsi singkat program keahlian ini.',
            checklist: [{ id: uid(), text: 'Poin keunggulan 1' }, { id: uid(), text: 'Poin keunggulan 2' }],
            detail: {
                tentang1: 'Paragraf pertama tentang jurusan ini.',
                tentang2: 'Paragraf kedua, penjelasan lebih rinci mengenai kompetensi yang dipelajari.',
                badges: [{ id: uid(), icon: 'fa-star', title: 'Kompetensi', sub: 'Utama' }],
                karier: [{ id: uid(), icon: 'fa-briefcase', label: 'Profesi Baru' }],
                mapel: [{ id: uid(), text: 'Mata Pelajaran Produktif 1' }],
                fasilitas: [{ id: uid(), text: 'Fasilitas pendukung 1' }],
                sertifikasi: [{ id: uid(), text: 'Sertifikasi / kelanjutan studi 1' }]
            },
            _expanded: false
        };
    }

    let jurusanList = [
        {
            id: uid(), nomor: '01', slug: 'PPLG', namaLengkap: 'Pengembangan Perangkat Lunak dan Gim (PPLG)',
            subJudulDetail: 'Rekayasa Perangkat Lunak Masa Depan', link: 'detail_jurusan_pplg.html',
            gambarCard: 'img/pplgedit.jpeg', iconPojok: 'img/ikonpplg.png',
            deskripsi: 'Mempelajari pembuatan perangkat lunak, aplikasi, dan gim mulai dari perancangan, pemrograman, hingga pengujian.',
            checklist: [
                { id: uid(), text: 'Pemrograman Web & Mobile' }, { id: uid(), text: 'Desain UI/UX' },
                { id: uid(), text: 'Game Development' }, { id: uid(), text: 'Database & Software Engineering' }
            ],
            detail: {
                tentang1: 'Program keahlian Pengembangan Perangkat Lunak dan Gim (PPLG) merupakan salah satu kompetensi keahlian unggulan di bidang Teknologi Informasi dan Komunikasi yang secara khusus mendalami tata cara pembuatan, perancangan, pengembangan software, hingga manajemen kualitas perangkat lunak.',
                tentang2: 'Di jurusan ini, siswa tidak hanya belajar mengetik baris kode (coding), tetapi juga dilatih untuk menganalisis kebutuhan sistem, merancang basis data yang efisien, serta membangun aplikasi berbasis web, mobile, hingga pengembangan industri gim (2D & 3D) yang inovatif sesuai standar kebutuhan industri digital masa kini.',
                badges: [
                    { id: uid(), icon: 'fa-code', title: 'Coding &', sub: 'Programming' },
                    { id: uid(), icon: 'fa-gamepad', title: 'Game', sub: 'Development' },
                    { id: uid(), icon: 'fa-mobile-screen', title: 'Mobile', sub: 'Development' },
                    { id: uid(), icon: 'fa-database', title: 'Database', sub: '& Software Eng.' }
                ],
                karier: [
                    { id: uid(), icon: 'fa-globe', label: 'Web Developer' }, { id: uid(), icon: 'fa-mobile-screen', label: 'Mobile Developer' },
                    { id: uid(), icon: 'fa-gamepad', label: 'Game Developer' }, { id: uid(), icon: 'fa-gear', label: 'Software Engineer' },
                    { id: uid(), icon: 'fa-pen-ruler', label: 'Desain UI/UX' }
                ],
                mapel: [
                    { id: uid(), text: 'Dasar Pemrograman (HTML, CSS, JS)' }, { id: uid(), text: 'Pemrograman Berorientasi Objek (OOP)' },
                    { id: uid(), text: 'Pemrograman Web & Mobile' }, { id: uid(), text: 'Basis Data / Database (Database)' },
                    { id: uid(), text: 'Desain Grafis & UI/UX' }, { id: uid(), text: 'Pengembangan Gim (2D & 3D)' },
                    { id: uid(), text: 'Pengujian Perangkat Lunak Software' }, { id: uid(), text: 'Version Control (Git & GitHub)' }
                ],
                fasilitas: [
                    { id: uid(), text: 'Laboratorium komputer' }, { id: uid(), text: 'Lab. Pemrograman & Jaringan' },
                    { id: uid(), text: 'Perangkat PC High Spec' }, { id: uid(), text: 'Internet Berkecepatan Tinggi' }
                ],
                sertifikasi: [{ id: uid(), text: 'Lanjut ke D4/S1 Informatika' }, { id: uid(), text: 'Sertifikasi: BNSP & Oracle Academy' }]
            },
            _expanded: false
        },
        {
            id: uid(), nomor: '02', slug: 'BCF', namaLengkap: 'Broadcasting dan Perfilman (BCF)',
            subJudulDetail: 'Mencetak Talenta Industri Kreatif', link: 'detail_jurusan_bcf.html',
            gambarCard: 'img/bcfedit.jpeg', iconPojok: 'img/logobcf.png',
            deskripsi: 'Menggali kreativitas di dunia penyiaran dan perfilman, mulai dari produksi, pengambilan gambar, hingga penyuntingan.',
            checklist: [
                { id: uid(), text: 'Produksi Program TV & Radio' }, { id: uid(), text: 'Teknik Kamera & Lighting' },
                { id: uid(), text: 'Video Editing' }, { id: uid(), text: 'Film Making' }
            ],
            detail: {
                tentang1: 'Program keahlian Broadcasting dan Perfilman (BCF) membekali siswa dengan kemampuan produksi program televisi, radio, hingga karya perfilman secara profesional.',
                tentang2: 'Siswa dilatih mulai dari perencanaan produksi (pra produksi), pengambilan gambar dan tata cahaya, hingga proses penyuntingan (pasca produksi) menggunakan peralatan dan perangkat lunak standar industri kreatif.',
                badges: [
                    { id: uid(), icon: 'fa-video', title: 'Produksi', sub: 'TV & Radio' },
                    { id: uid(), icon: 'fa-camera', title: 'Kamera &', sub: 'Lighting' },
                    { id: uid(), icon: 'fa-scissors', title: 'Video', sub: 'Editing' },
                    { id: uid(), icon: 'fa-clapperboard', title: 'Film', sub: 'Making' }
                ],
                karier: [
                    { id: uid(), icon: 'fa-video', label: 'Video Grapher' }, { id: uid(), icon: 'fa-scissors', label: 'Video Editor' },
                    { id: uid(), icon: 'fa-camera', label: 'Photo Grapher' }, { id: uid(), icon: 'fa-tower-broadcast', label: 'Broadcaster' },
                    { id: uid(), icon: 'fa-pen-nib', label: 'Content Creator' }
                ],
                mapel: [
                    { id: uid(), text: 'Dasar Penyiaran & Videografi' }, { id: uid(), text: 'Teknik Kamera & Tata Cahaya' },
                    { id: uid(), text: 'Penyuntingan Audio & Video' }, { id: uid(), text: 'Produksi Program TV & Radio' },
                    { id: uid(), text: 'Manajemen Produksi Film' }
                ],
                fasilitas: [
                    { id: uid(), text: 'Studio Broadcasting & Produksi' }, { id: uid(), text: 'Kamera DSLR/Mirroless & Peralatan Videografi' },
                    { id: uid(), text: 'Laboratorium Editing Audio & Video' }, { id: uid(), text: 'Internet Berkecepatan Tinggi' }
                ],
                sertifikasi: [
                    { id: uid(), text: 'Lanjut ke D3/D4/S1 Ilmu Komunikasi' }, { id: uid(), text: 'Lanjut ke D3/D4/S1 Desain Komunikasi Visual (DKV)' },
                    { id: uid(), text: 'Sertifikasi BNSP Bidang Broadcasting & Perfilman' }
                ]
            },
            _expanded: false
        },
        {
            id: uid(), nomor: '03', slug: 'MPLB', namaLengkap: 'Manajemen Perkantoran dan Layanan Bisnis (MPLB)',
            subJudulDetail: 'Administrasi & Layanan Bisnis Profesional', link: 'detail_jurusan_mplb.html',
            gambarCard: 'img/mplbedit.jpeg', iconPojok: 'img/logomplb.png',
            deskripsi: 'Membekali keterampilan administrasi perkantoran modern dan layanan bisnis yang profesional dan berdaya saing.',
            checklist: [
                { id: uid(), text: 'Administrasi Perkantoran' }, { id: uid(), text: 'Korespondensi & Kearsipan' },
                { id: uid(), text: 'Layanan Pelanggan' }, { id: uid(), text: 'Manajemen Bisnis' }
            ],
            detail: {
                tentang1: 'Program keahlian Manajemen Perkantoran dan Layanan Bisnis (MPLB) membekali siswa dengan keterampilan administrasi perkantoran modern serta layanan bisnis yang profesional.',
                tentang2: 'Siswa dilatih mengelola surat menyurat, kearsipan digital, layanan pelanggan, hingga dasar-dasar kewirausahaan agar siap bekerja maupun membangun usaha sendiri di bidang administrasi dan bisnis.',
                badges: [
                    { id: uid(), icon: 'fa-folder-open', title: 'Administrasi', sub: 'Perkantoran' },
                    { id: uid(), icon: 'fa-envelope', title: 'Korespondensi', sub: '& Kearsipan' },
                    { id: uid(), icon: 'fa-headset', title: 'Layanan', sub: 'Pelanggan' },
                    { id: uid(), icon: 'fa-briefcase', title: 'Manajemen', sub: 'Bisnis' }
                ],
                karier: [
                    { id: uid(), icon: 'fa-file-lines', label: 'Staf Administrasi' }, { id: uid(), icon: 'fa-headset', label: 'Customer Service' },
                    { id: uid(), icon: 'fa-box-archive', label: 'Arsiparis' }, { id: uid(), icon: 'fa-briefcase', label: 'Sekretaris' },
                    { id: uid(), icon: 'fa-people-arrows', label: 'Staf HRD' }
                ],
                mapel: [
                    { id: uid(), text: 'Otomatisasi Tata Kelola Perkantoran' }, { id: uid(), text: 'Korespondensi Bisnis' },
                    { id: uid(), text: 'Kearsipan' }, { id: uid(), text: 'Layanan Bisnis' }, { id: uid(), text: 'Administrasi Kepegawaian' }
                ],
                fasilitas: [
                    { id: uid(), text: 'Laboratorium Perkantoran' }, { id: uid(), text: 'Perangkat Komputer & Mesin Kantor' },
                    { id: uid(), text: 'Ruang Praktik Layanan Bisnis' }, { id: uid(), text: 'Internet Berkecepatan Tinggi' }
                ],
                sertifikasi: [
                    { id: uid(), text: 'Lanjut ke D3/D4/S1 Administrasi Bisnis' }, { id: uid(), text: 'Sertifikasi BNSP Bidang Administrasi Perkantoran' }
                ]
            },
            _expanded: false
        }
    ];

    function renderJurusanList() {
        const wrap = document.getElementById('jurusanListWrap');
        wrap.innerHTML = '';
        jurusanList.forEach((item, idx) => {
            ensureJurusanSubManagers(item);
            const card = document.createElement('div');
            card.className = 'card-panel';
            card.style.marginBottom = '16px';
            card.innerHTML = `
                <div class="panel-header">
                    <div class="panel-header-left" style="flex:1;">
                        <div class="panel-header-icon">${item.nomor}</div>
                        <input type="text" value="${escapeHtml(item.namaLengkap)}" oninput="renameJurusanItem('${item.id}', this.value)"
                            style="border:none;font-size:15px;font-weight:700;color:#04352b;background:transparent;outline:none;width:100%;max-width:420px;">
                    </div>
                    <div style="display:flex;gap:8px;flex-shrink:0;">
                        <button class="btn btn-outline btn-sm" onclick="toggleJurusanDetail('${item.id}')"><i class="fa-solid ${item._expanded ? 'fa-chevron-up' : 'fa-chevron-down'}"></i> ${item._expanded ? 'Tutup' : 'Kelola'} Detail Halaman</button>
                        <button class="btn-icon-only danger" title="Hapus Jurusan Ini" onclick="deleteJurusanItem('${item.id}')"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="field-grid">
                        <div class="field-group">
                            <label>Gambar Kartu (thumbnail)</label>
                            <div class="upload-box">
                                <img id="jrCardImg_${item.id}" class="upload-thumb" src="${item.gambarCard || placeholderImg()}" onerror="this.src=placeholderImg();">
                                <div class="upload-info">
                                    <div class="upload-name">${escapeHtml(item.gambarCard || 'Belum ada gambar')}</div>
                                    <div class="upload-meta">Rasio 4:3, tampil di kartu & hero detail</div>
                                </div>
                                <div class="upload-actions">
                                    <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="uploadJurusanImage(event,'${item.id}','gambarCard')"></label>
                                </div>
                            </div>
                        </div>
                        <div class="field-group">
                            <label>Ikon Pojok Kartu (logo jurusan)</label>
                            <div class="upload-box">
                                <img id="jrIconImg_${item.id}" class="upload-thumb" src="${item.iconPojok || placeholderImg()}" onerror="this.src=placeholderImg();">
                                <div class="upload-info">
                                    <div class="upload-name">${escapeHtml(item.iconPojok || 'Belum ada gambar')}</div>
                                    <div class="upload-meta">PNG transparan disarankan</div>
                                </div>
                                <div class="upload-actions">
                                    <label class="btn btn-outline btn-sm file-label"><i class="fa-solid fa-arrow-up-from-bracket"></i> Ganti<input type="file" accept="image/*" hidden onchange="uploadJurusanImage(event,'${item.id}','iconPojok')"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field-grid cols-3">
                        <div class="field-group">
                            <label>Nomor Urut Badge</label>
                            <input type="text" value="${escapeHtml(item.nomor)}" onchange="updateJurusanField('${item.id}','nomor',this.value)">
                        </div>
                        <div class="field-group">
                            <label>Nama Singkat (mis. PPLG)</label>
                            <input type="text" value="${escapeHtml(item.slug)}" onchange="updateJurusanField('${item.id}','slug',this.value)">
                        </div>
                        <div class="field-group">
                            <label>File Halaman Detail</label>
                            <input type="text" value="${escapeHtml(item.link)}" onchange="updateJurusanField('${item.id}','link',this.value)">
                        </div>
                    </div>
                    <div class="field-group">
                        <label>Sub Judul di Halaman Detail (mis. "Rekayasa Perangkat Lunak Masa Depan")</label>
                        <input type="text" value="${escapeHtml(item.subJudulDetail)}" onchange="updateJurusanField('${item.id}','subJudulDetail',this.value)">
                    </div>
                    <div class="field-group">
                        <label>Deskripsi Singkat (tampil di kartu jurusan.html)</label>
                        <textarea onchange="updateJurusanField('${item.id}','deskripsi',this.value)">${escapeHtml(item.deskripsi)}</textarea>
                    </div>

                    <div style="margin-top:6px;margin-bottom:8px;display:flex;justify-content:space-between;align-items:center;">
                        <label style="font-size:12.5px;font-weight:700;color:#455a52;">Checklist Keunggulan (4 poin di kartu)</label>
                        <button class="btn btn-outline btn-sm" onclick="managers['jurusan_checklist_${item.id}'].addItem()"><i class="fa-solid fa-plus"></i> Tambah Poin</button>
                    </div>
                    <div class="list-wrap" id="jurusanChecklistList_${item.id}"></div>

                    ${item._expanded ? `
                    <div style="margin-top:20px;padding-top:20px;border-top:1px dashed #d5dcda;">
                        <p class="section-note"><i class="fa-solid fa-file-lines"></i> Bagian ini mengatur konten lengkap di halaman ${escapeHtml(item.link)}</p>

                        <div class="field-group">
                            <label>Hero Detail - Badge Kompetensi (4 kotak di bawah deskripsi hero detail)</label>
                        </div>
                        <div style="display:flex;justify-content:flex-end;margin-bottom:8px;">
                            <button class="btn btn-outline btn-sm" onclick="managers['jurusan_badges_${item.id}'].addItem()"><i class="fa-solid fa-plus"></i> Tambah Badge</button>
                        </div>
                        <div class="list-wrap" id="jurusanBadgesList_${item.id}"></div>

                        <div class="field-group" style="margin-top:14px;">
                            <label>Tentang Jurusan - Paragraf 1</label>
                            <textarea onchange="updateJurusanDetailField('${item.id}','tentang1',this.value)">${escapeHtml(item.detail.tentang1)}</textarea>
                        </div>
                        <div class="field-group">
                            <label>Tentang Jurusan - Paragraf 2</label>
                            <textarea onchange="updateJurusanDetailField('${item.id}','tentang2',this.value)">${escapeHtml(item.detail.tentang2)}</textarea>
                        </div>

                        <div style="display:flex;justify-content:space-between;align-items:center;margin:14px 0 8px 0;">
                            <label style="font-size:12.5px;font-weight:700;color:#455a52;">Peluang Karier</label>
                            <button class="btn btn-outline btn-sm" onclick="managers['jurusan_karier_${item.id}'].addItem()"><i class="fa-solid fa-plus"></i> Tambah Karier</button>
                        </div>
                        <div class="list-wrap" id="jurusanKarierList_${item.id}"></div>

                        <div style="display:flex;justify-content:space-between;align-items:center;margin:14px 0 8px 0;">
                            <label style="font-size:12.5px;font-weight:700;color:#455a52;">Mata Pelajaran Kompetensi</label>
                            <button class="btn btn-outline btn-sm" onclick="managers['jurusan_mapel_${item.id}'].addItem()"><i class="fa-solid fa-plus"></i> Tambah Mapel</button>
                        </div>
                        <div class="list-wrap" id="jurusanMapelList_${item.id}"></div>

                        <div style="display:flex;justify-content:space-between;align-items:center;margin:14px 0 8px 0;">
                            <label style="font-size:12.5px;font-weight:700;color:#455a52;">Fasilitas Pendukung</label>
                            <button class="btn btn-outline btn-sm" onclick="managers['jurusan_fasilitas_${item.id}'].addItem()"><i class="fa-solid fa-plus"></i> Tambah Fasilitas</button>
                        </div>
                        <div class="list-wrap" id="jurusanFasilitasList_${item.id}"></div>

                        <div style="display:flex;justify-content:space-between;align-items:center;margin:14px 0 8px 0;">
                            <label style="font-size:12.5px;font-weight:700;color:#455a52;">Peluang Lanjut & Sertifikasi</label>
                            <button class="btn btn-outline btn-sm" onclick="managers['jurusan_sertifikasi_${item.id}'].addItem()"><i class="fa-solid fa-plus"></i> Tambah Poin</button>
                        </div>
                        <div class="list-wrap" id="jurusanSertifikasiList_${item.id}"></div>
                    </div>` : ''}
                </div>`;
            wrap.appendChild(card);

            managers['jurusan_checklist_' + item.id].render();
            if (item._expanded) {
                managers['jurusan_badges_' + item.id].render();
                managers['jurusan_karier_' + item.id].render();
                managers['jurusan_mapel_' + item.id].render();
                managers['jurusan_fasilitas_' + item.id].render();
                managers['jurusan_sertifikasi_' + item.id].render();
            }
        });
    }
    function renameJurusanItem(id, val) {
        const item = jurusanList.find(j => j.id === id);
        if (item) item.namaLengkap = val;
    }
    function updateJurusanField(id, key, val) {
        const item = jurusanList.find(j => j.id === id);
        if (item) { item[key] = val; toast('Perubahan disimpan'); }
    }
    function updateJurusanDetailField(id, key, val) {
        const item = jurusanList.find(j => j.id === id);
        if (item) { item.detail[key] = val; toast('Perubahan disimpan'); }
    }
    function uploadJurusanImage(event, id, key) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            const item = jurusanList.find(j => j.id === id);
            if (item) { item[key] = e.target.result; renderJurusanList(); toast('Gambar diperbarui', 'fa-image'); }
        };
        reader.readAsDataURL(file);
    }
    function toggleJurusanDetail(id) {
        const item = jurusanList.find(j => j.id === id);
        if (item) { item._expanded = !item._expanded; renderJurusanList(); }
    }
    function addJurusanItem() {
        const item = emptyJurusanItem();
        jurusanList.push(item);
        renderJurusanList();
        toast('Jurusan baru ditambahkan, silakan lengkapi datanya', 'fa-plus');
        setTimeout(() => {
            const el = document.getElementById('jurusanListWrap');
            if (el && el.lastElementChild) el.lastElementChild.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 50);
    }
    function deleteJurusanItem(id) {
        const item = jurusanList.find(j => j.id === id);
        if (!item) return;
        if (!confirm(`Hapus seluruh data jurusan "${item.namaLengkap}" beserta halaman detailnya?`)) return;
        ['jurusan_checklist_', 'jurusan_badges_', 'jurusan_karier_', 'jurusan_mapel_', 'jurusan_fasilitas_', 'jurusan_sertifikasi_'].forEach(p => delete managers[p + id]);
        jurusanList = jurusanList.filter(j => j.id !== id);
        renderJurusanList();
        toast('Jurusan dihapus', 'fa-trash');
    }
    renderJurusanList();

    // --- Fitur Unggulan (bawah halaman jurusan) ---
    managers.jurusanFitur = new ListManager({
        key: 'jurusanFitur',
        data: [
            { id: uid(), icon: 'fa-user-graduate', title: 'Guru Profesional', sub: '& Kompeten' },
            { id: uid(), icon: 'fa-building', title: 'Fasilitas Lengkap', sub: 'dan Modern' },
            { id: uid(), icon: 'fa-briefcase', title: 'Siap Kerja &', sub: 'Berwirausaha' },
            { id: uid(), icon: 'fa-earth-asia', title: 'Berwawasan', sub: 'Global' },
            { id: uid(), icon: 'fa-award', title: 'Berkarakter &', sub: 'Berakhlakul Karimah' }
        ],
        containerId: 'list-jurusanFitur',
        fields: BADGE_HERO_FIELDS.map(f => f.key === 'title' ? { ...f, label: 'Baris 1' } : (f.key === 'sub' ? { ...f, label: 'Baris 2' } : f)),
        emptyItem: () => ({ icon: 'fa-star', title: 'Judul Baris 1', sub: 'Judul Baris 2' }),
        renderRow: badgeHeroRenderer,
        confirmDeleteMsg: 'Hapus fitur unggulan ini?'
    });
    managers.jurusanFitur.render();
    loadSavedJurusanData();

    /* ==========================================================================
       SIMPAN & MUAT — HALAMAN JURUSAN
       ========================================================================== */
    function collectJurusanData() {
        return {
            hero: {
                breadcrumb: val('jrBreadcrumb'), title1: val('jrTitle1'), title2: val('jrTitle2'),
                desc: val('jrDesc'), quote: val('jrQuote'), bgImage: imgSrc('jrThumbBg')
            },
            list: jurusanList.map(item => ({
                nomor: item.nomor, slug: item.slug, namaLengkap: item.namaLengkap,
                subJudulDetail: item.subJudulDetail, link: item.link,
                gambarCard: item.gambarCard, iconPojok: item.iconPojok, deskripsi: item.deskripsi,
                checklist: item.checklist.map(({ text }) => ({ text })),
                detail: {
                    tentang1: item.detail.tentang1, tentang2: item.detail.tentang2,
                    badges: item.detail.badges.map(({ icon, title, sub }) => ({ icon, title, sub })),
                    karier: item.detail.karier.map(({ icon, label }) => ({ icon, label })),
                    mapel: item.detail.mapel.map(({ text }) => ({ text })),
                    fasilitas: item.detail.fasilitas.map(({ text }) => ({ text })),
                    sertifikasi: item.detail.sertifikasi.map(({ text }) => ({ text }))
                }
            })),
            fiturUnggulan: managers.jurusanFitur.data.map(({ icon, title, sub }) => ({ icon, title, sub }))
        };
    }

    function simpanPengaturanJurusan() {
        let config = {};
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)) || {}; } catch (e) { config = {}; }
        config.jurusan = collectJurusanData();
        config.lastUpdated = new Date().toISOString();
        localStorage.setItem(LANDING_STORAGE_KEY, JSON.stringify(config));
        toast('Halaman Jurusan tersimpan & diterapkan ke halaman publik', 'fa-circle-check');
    }

    function loadSavedJurusanData() {
        let config;
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)); } catch (e) { config = null; }
        if (!config || !config.jurusan) return;
        const j = config.jurusan;

        if (j.hero) {
            setVal('jrBreadcrumb', j.hero.breadcrumb); setVal('jrTitle1', j.hero.title1); setVal('jrTitle2', j.hero.title2);
            setVal('jrDesc', j.hero.desc); setVal('jrQuote', j.hero.quote); setImgSrc('jrThumbBg', j.hero.bgImage);
            updateJurusanHeroPreview();
        }
        if (Array.isArray(j.list) && j.list.length) {
            jurusanList = j.list.map(x => ({
                id: uid(), nomor: x.nomor, slug: x.slug, namaLengkap: x.namaLengkap,
                subJudulDetail: x.subJudulDetail, link: x.link, gambarCard: x.gambarCard, iconPojok: x.iconPojok,
                deskripsi: x.deskripsi,
                checklist: (x.checklist || []).map(c => ({ id: uid(), ...c })),
                detail: {
                    tentang1: x.detail.tentang1, tentang2: x.detail.tentang2,
                    badges: (x.detail.badges || []).map(b => ({ id: uid(), ...b })),
                    karier: (x.detail.karier || []).map(k => ({ id: uid(), ...k })),
                    mapel: (x.detail.mapel || []).map(m => ({ id: uid(), ...m })),
                    fasilitas: (x.detail.fasilitas || []).map(f => ({ id: uid(), ...f })),
                    sertifikasi: (x.detail.sertifikasi || []).map(s => ({ id: uid(), ...s }))
                },
                _expanded: false
            }));
            renderJurusanList();
        }
        if (Array.isArray(j.fiturUnggulan) && j.fiturUnggulan.length) {
            managers.jurusanFitur.data = j.fiturUnggulan.map(x => ({ id: uid(), ...x }));
            managers.jurusanFitur.render();
        }
    }

    /* ==========================================================================
       PRATINJAU HERO (live preview)
       ========================================================================== */
    function onHeroInput() { updateHeroPreview(); }
    function updateHeroPreview() {
        const sub = document.getElementById('heroSub').value;
        const t1 = document.getElementById('heroTitle1').value;
        const t2 = document.getElementById('heroTitle2').value;
        const desc = document.getElementById('heroDesc').value;
        const subColor = document.getElementById('heroSubColor').value;
        const titleColor = document.getElementById('heroTitleColor').value;
        const btn1Text = document.getElementById('heroBtn1Text').value;
        const btn1Color = document.getElementById('heroBtn1Color').value;
        const btn2Text = document.getElementById('heroBtn2Text').value;
        const btn2Color = document.getElementById('heroBtn2Color').value;
        const bg = document.getElementById('thumbBg').src;

        document.getElementById('mpSub').textContent = sub;
        document.getElementById('mpSub').style.color = subColor;
        document.getElementById('mpTitle').innerHTML = `${escapeHtml(t1)}<br><span style="color:${titleColor}">${escapeHtml(t2)}</span>`;
        document.getElementById('mpDesc').textContent = desc;
        document.getElementById('mpBtn1').textContent = btn1Text || 'Tombol 1';
        document.getElementById('mpBtn1').style.background = btn1Color;
        document.getElementById('mpBtn1').style.color = '#022c22';
        document.getElementById('mpBtn2').textContent = btn2Text || 'Tombol 2';
        document.getElementById('mpBtn2').style.borderColor = btn2Color;
        document.getElementById('mpBtn2').style.color = btn2Color;

        const heroPrev = document.getElementById('heroPreview');
        if (bg && !bg.startsWith('data:image/svg')) {
            heroPrev.style.backgroundImage = `linear-gradient(to right, rgba(0,58,59,.92) 40%, rgba(0,58,59,.55) 100%), url('${bg}')`;
        } else {
            heroPrev.style.backgroundImage = 'none';
        }

        const badgeBox = document.getElementById('mpBadges');
        badgeBox.innerHTML = managers.badges.data.map(b =>
            `<div class="mp-badge-card"><i class="fa-solid ${b.icon}"></i><span>${escapeHtml(b.label)}</span></div>`
        ).join('');
    }
    updateHeroPreview();

    /* ==========================================================================
       HALAMAN INFORMASI
       ========================================================================== */
    // --- Gelombang Pendaftaran ---
    managers.gelombang = new ListManager({
        key: 'gelombang',
        data: [
            {
                id: uid(), nama: 'Gelombang 1', status: 'DIBUKA', periode: '1 Januari – 31 Maret 2026',
                step1Judul: 'Pendaftaran', step1Tanggal: '1 Jan – 31 Mar 2026',
                step2Judul: 'Tes Seleksi', step2Tanggal: '5 – 7 Apr 2026',
                step3Judul: 'Pengumuman', step3Tanggal: '12 Apr 2026',
                step4Judul: 'Daftar Ulang', step4Tanggal: '15 – 18 Apr 2026',
                tombolTeks: 'Daftar Sekarang →', tombolAktif: 'aktif'
            },
            {
                id: uid(), nama: 'Gelombang 2', status: 'AKAN DIBUKA', periode: '1 April – 31 Juli 2026',
                step1Judul: 'Pendaftaran', step1Tanggal: '1 Apr – 31 Jul 2026',
                step2Judul: 'Tes Seleksi', step2Tanggal: '2 – 4 Agu 2026',
                step3Judul: 'Pengumuman', step3Tanggal: '9 Agu 2026',
                step4Judul: 'Daftar Ulang', step4Tanggal: '11 – 14 Agu 2026',
                tombolTeks: 'Coming Soon', tombolAktif: 'nonaktif'
            }
        ],
        containerId: 'list-gelombang',
        fields: [
            { key: 'nama', label: 'Nama Gelombang', type: 'text' },
            { key: 'status', label: 'Status', type: 'select', options: [['DIBUKA', 'DIBUKA'], ['AKAN DIBUKA', 'AKAN DIBUKA'], ['DITUTUP', 'DITUTUP']] },
            { key: 'periode', label: 'Periode Tanggal', type: 'text', full: true },
            { key: 'step1Judul', label: 'Tahap 1 - Judul', type: 'text' }, { key: 'step1Tanggal', label: 'Tahap 1 - Tanggal', type: 'text' },
            { key: 'step2Judul', label: 'Tahap 2 - Judul', type: 'text' }, { key: 'step2Tanggal', label: 'Tahap 2 - Tanggal', type: 'text' },
            { key: 'step3Judul', label: 'Tahap 3 - Judul', type: 'text' }, { key: 'step3Tanggal', label: 'Tahap 3 - Tanggal', type: 'text' },
            { key: 'step4Judul', label: 'Tahap 4 - Judul', type: 'text' }, { key: 'step4Tanggal', label: 'Tahap 4 - Tanggal', type: 'text' },
            { key: 'tombolTeks', label: 'Teks Tombol', type: 'text' },
            { key: 'tombolAktif', label: 'Status Tombol', type: 'select', options: [['aktif', 'Aktif (link daftar)'], ['nonaktif', 'Nonaktif (Coming Soon)']] }
        ],
        emptyItem: () => ({
            nama: 'Gelombang Baru', status: 'AKAN DIBUKA', periode: 'Bulan – Bulan Tahun',
            step1Judul: 'Pendaftaran', step1Tanggal: '', step2Judul: 'Tes Seleksi', step2Tanggal: '',
            step3Judul: 'Pengumuman', step3Tanggal: '', step4Judul: 'Daftar Ulang', step4Tanggal: '',
            tombolTeks: 'Daftar Sekarang →', tombolAktif: 'aktif'
        }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid fa-calendar-days"></i></div><div><strong>${escapeHtml(item.nama)}</strong> <span style="font-size:11px;font-weight:700;color:${item.status === 'DIBUKA' ? '#047857' : '#64748b'};">[${escapeHtml(item.status)}]</span><div class="row-sub">${escapeHtml(item.periode)}</div></div>`,
        confirmDeleteMsg: 'Hapus gelombang pendaftaran ini?'
    });

    // --- Cara Daftar ---
    managers.caraDaftar = new ListManager({
        key: 'caraDaftar',
        data: [
            { id: uid(), icon: 'fa-user-plus', title: 'Buat Akun', desc: 'Daftar akun dengan mengisi data diri secara lengkap.' },
            { id: uid(), icon: 'fa-file-lines', title: 'Lengkapi Data', desc: 'Isi formulir pendaftaran dan unggah berkas yang diperlukan.' },
            { id: uid(), icon: 'fa-graduation-cap', title: 'Pilih Jurusan', desc: 'Pilih jurusan sesuai dengan minat dan kemampuan Anda.' },
            { id: uid(), icon: 'fa-cloud-arrow-up', title: 'Kirim Pendaftaran', desc: 'Periksa kembali data lalu kirim pendaftaran Anda.' },
            { id: uid(), icon: 'fa-circle-check', title: 'Pantau Status', desc: 'Pantau status pendaftaran melalui dashboard akun Anda.' }
        ],
        containerId: 'list-caraDaftar',
        fields: [{ key: 'icon', label: 'Ikon', type: 'icon-select' }, { key: 'title', label: 'Judul Langkah', type: 'text' }, { key: 'desc', label: 'Deskripsi', type: 'textarea', full: true }],
        emptyItem: () => ({ icon: 'fa-circle-check', title: 'Langkah Baru', desc: 'Deskripsi langkah baru.' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid ${item.icon}"></i></div><div><strong>${escapeHtml(item.title)}</strong><div class="row-sub">${escapeHtml(item.desc)}</div></div>`,
        confirmDeleteMsg: 'Hapus langkah cara daftar ini?'
    });

    // --- Jadwal MPLS & PTA ---
    managers.jadwalKegiatan = new ListManager({
        key: 'jadwalKegiatan',
        data: [
            { id: uid(), icon: 'fa-people-group', judul: 'MPLS (Masa Pengenalan Lingkungan Sekolah)', durasi: '3 Hari', tanggal: '14 – 16 Juli 2026', desc: 'Kegiatan pengenalan lingkungan sekolah bagi siswa baru.' },
            { id: uid(), icon: 'fa-campground', judul: 'PTA (Penerimaan Tamu Ambalan)', durasi: '5 Hari', tanggal: '21 – 25 Juli 2026', desc: 'Kegiatan penilaian tengah semester awal.' }
        ],
        containerId: 'list-jadwalKegiatan',
        fields: [
            { key: 'icon', label: 'Ikon', type: 'icon-select' }, { key: 'judul', label: 'Nama Kegiatan', type: 'text', full: true },
            { key: 'durasi', label: 'Durasi (mis. 3 Hari)', type: 'text' }, { key: 'tanggal', label: 'Tanggal', type: 'text' },
            { key: 'desc', label: 'Deskripsi', type: 'textarea', full: true }
        ],
        emptyItem: () => ({ icon: 'fa-calendar-check', judul: 'Kegiatan Baru', durasi: '1 Hari', tanggal: 'Tanggal', desc: 'Deskripsi kegiatan baru.' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid ${item.icon}"></i></div><div><strong>${escapeHtml(item.judul)}</strong> <span style="font-size:11px;color:#7c8a85;">(${escapeHtml(item.durasi)})</span><div class="row-sub">${escapeHtml(item.tanggal)} — ${escapeHtml(item.desc)}</div></div>`,
        confirmDeleteMsg: 'Hapus jadwal kegiatan ini?'
    });

    managers.gelombang.render();
    managers.caraDaftar.render();
    managers.jadwalKegiatan.render();

    /* ==========================================================================
       HALAMAN KONTAK
       ========================================================================== */
    // --- Badge kecil di hero ---
    managers.kontakHeroBadges = new ListManager({
        key: 'kontakHeroBadges',
        data: [
            { id: uid(), icon: 'fa-bolt', label: 'Respon Cepat' },
            { id: uid(), icon: 'fa-clock', label: '6 Hari Layanan' },
            { id: uid(), icon: 'fa-location-dot', label: 'Kajoran, Magelang' }
        ],
        containerId: 'list-kontakHeroBadges',
        fields: ICON_LABEL_FIELDS,
        emptyItem: () => ({ icon: 'fa-star', label: 'Badge Baru' }),
        renderRow: iconLabelRenderer,
        confirmDeleteMsg: 'Hapus badge hero ini?'
    });

    // --- Informasi Kontak ---
    managers.kontakList = new ListManager({
        key: 'kontakList',
        data: [
            { id: uid(), icon: 'fa-location-dot', judul: 'Alamat Sekolah', isi: 'Jl.KH.Ridwan Sidowangi Kajoran, Magelang, Jawa Tengah 56163' },
            { id: uid(), icon: 'fa-phone', judul: 'Telepon', isi: '(0293) 3195678' },
            { id: uid(), icon: 'fa-comment', judul: 'WhatsApp Admin PPDB', isi: '029-3319-5678' },
            { id: uid(), icon: 'fa-envelope', judul: 'Email', isi: 'smkmwalisongokajoran@yahoo.com' },
            { id: uid(), icon: 'fa-globe', judul: 'Website', isi: 'smkmaarifwalisongokajoran.sch.id' }
        ],
        containerId: 'list-kontakList',
        fields: [{ key: 'icon', label: 'Ikon', type: 'icon-select' }, { key: 'judul', label: 'Judul', type: 'text' }, { key: 'isi', label: 'Isi', type: 'textarea', full: true }],
        emptyItem: () => ({ icon: 'fa-circle-info', judul: 'Kontak Baru', isi: 'Isi informasi kontak.' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid ${item.icon}"></i></div><div><strong>${escapeHtml(item.judul)}</strong><div class="row-sub">${escapeHtml(item.isi)}</div></div>`,
        confirmDeleteMsg: 'Hapus informasi kontak ini?'
    });

    // --- Jam Pelayanan ---
    managers.jamPelayanan = new ListManager({
        key: 'jamPelayanan',
        data: [
            { id: uid(), hari: 'Senin - Kamis', waktu: '07.00 - 12.00 WIB' },
            { id: uid(), hari: 'Jumat', waktu: '07.00 - 11.30 WIB' },
            { id: uid(), hari: 'Sabtu', waktu: '07.00 - 12.00 WIB' },
            { id: uid(), hari: 'Minggu & Hari Libur', waktu: 'Tutup' }
        ],
        containerId: 'list-jamPelayanan',
        fields: [{ key: 'hari', label: 'Hari', type: 'text' }, { key: 'waktu', label: 'Jam / Keterangan', type: 'text' }],
        emptyItem: () => ({ hari: 'Hari Baru', waktu: 'Jam Baru' }),
        renderRow: item => `<div class="row-icon small"><i class="fa-solid fa-circle"></i></div><div><strong>${escapeHtml(item.hari)}</strong><div class="row-sub">${escapeHtml(item.waktu)}</div></div>`,
        confirmDeleteMsg: 'Hapus baris jam pelayanan ini?'
    });

    // --- Metode Kontak Cepat ---
    managers.metodeKontak = new ListManager({
        key: 'metodeKontak',
        data: [
            { id: uid(), icon: 'fa-comment', judul: 'Chat WhatsApp', desc: 'Klik untuk chat langsung', link: 'https://wa.me/02933195678' },
            { id: uid(), icon: 'fa-envelope', judul: 'Kirim Email', desc: 'Kirim pertanyaan via email', link: 'mailto:smkmwalisongokajoran@yahoo.com' },
            { id: uid(), icon: 'fa-location-dot', judul: 'Lihat Lokasi', desc: 'Temukan lokasi kami di Maps', link: 'https://maps.app.goo.gl/gfkDG7RiJBxH7sQMA' }
        ],
        containerId: 'list-metodeKontak',
        fields: [
            { key: 'icon', label: 'Ikon', type: 'icon-select' }, { key: 'judul', label: 'Judul', type: 'text' },
            { key: 'desc', label: 'Sub Teks', type: 'text' }, { key: 'link', label: 'Link Tujuan', type: 'text', full: true }
        ],
        emptyItem: () => ({ icon: 'fa-link', judul: 'Metode Baru', desc: 'Keterangan singkat', link: 'https://' }),
        renderRow: item => `<div class="row-icon"><i class="fa-solid ${item.icon}"></i></div><div><strong>${escapeHtml(item.judul)}</strong><div class="row-sub">${escapeHtml(item.desc)}</div></div>`,
        confirmDeleteMsg: 'Hapus metode kontak ini?'
    });

    // --- FAQ ---
    managers.faq = new ListManager({
        key: 'faq',
        data: [
            { id: uid(), pertanyaan: 'Bagaimana jika lupa password akun?', jawaban: 'Klik "Lupa Password" pada halaman login, lalu ikuti instruksi reset password yang dikirim melalui email terdaftar Anda.' },
            { id: uid(), pertanyaan: 'Apakah bisa daftar langsung ke sekolah?', jawaban: 'Pendaftaran hanya dilakukan secara online melalui website SPMB ini. Panitia dapat membantu jika Anda datang langsung ke sekolah.' },
            { id: uid(), pertanyaan: 'Bagaimana cara mengetahui hasil seleksi?', jawaban: 'Hasil seleksi dapat dilihat melalui dashboard akun Anda pada tanggal pengumuman sesuai gelombang pendaftaran yang diikuti.' }
        ],
        containerId: 'list-faq',
        fields: [{ key: 'pertanyaan', label: 'Pertanyaan', type: 'text', full: true }, { key: 'jawaban', label: 'Jawaban', type: 'textarea', full: true }],
        emptyItem: () => ({ pertanyaan: 'Pertanyaan baru?', jawaban: 'Jawaban untuk pertanyaan ini.' }),
        renderRow: item => `<div class="row-icon small"><i class="fa-solid fa-circle"></i></div><div><strong>${escapeHtml(item.pertanyaan)}</strong><div class="row-sub">${escapeHtml(item.jawaban)}</div></div>`,
        confirmDeleteMsg: 'Hapus FAQ ini?'
    });

    // --- Media Sosial ---
    managers.sosmed = new ListManager({
        key: 'sosmed',
        data: [
            { id: uid(), platform: 'instagram', link: 'https://www.instagram.com/officialsmkmw9' },
            { id: uid(), platform: 'facebook', link: 'https://www.facebook.com/pages/SMKS%20MA%60ARIF%20WALISONGO%20KAJORAN/1631217363784893/' },
            { id: uid(), platform: 'youtube', link: 'https://www.youtube.com/@officialsmkmaarifwalisongo1198' },
            { id: uid(), platform: 'tiktok', link: 'https://www.tiktok.com/@officialsmkmw9' }
        ],
        containerId: 'list-sosmed',
        fields: [
            { key: 'platform', label: 'Platform', type: 'select', options: [['instagram', 'Instagram'], ['facebook', 'Facebook'], ['youtube', 'YouTube'], ['tiktok', 'TikTok'], ['lainnya', 'Lainnya']] },
            { key: 'link', label: 'Link Profil', type: 'text', full: true }
        ],
        emptyItem: () => ({ platform: 'instagram', link: 'https://' }),
        renderRow: item => `<div class="row-icon"><i class="fa-brands fa-${item.platform === 'lainnya' ? 'link' : item.platform}"></i></div><div><strong>${capitalize(item.platform)}</strong><div class="row-sub">${escapeHtml(item.link)}</div></div>`,
        confirmDeleteMsg: 'Hapus akun media sosial ini?'
    });

    managers.kontakHeroBadges.render();
    managers.kontakList.render();
    managers.jamPelayanan.render();
    managers.metodeKontak.render();
    managers.faq.render();
    managers.sosmed.render();

    /* ==========================================================================
       SIMPAN & MUAT — HALAMAN LOGIN
       ========================================================================== */
    function collectLoginData() {
        return {
            logo: imgSrc('lgThumbLogo'),
            judul: val('lgJudul'), sub: val('lgSub'),
            labelUser: val('lgLabelUser'), placeholderUser: val('lgPlaceholderUser'),
            labelPass: val('lgLabelPass'), placeholderPass: val('lgPlaceholderPass'),
            btnSubmit: val('lgBtnSubmit'), lupaPasswordWa: val('lgLupaPassword'),
            separator: val('lgSeparator'),
            btnRegisterText: val('lgBtnRegisterText'), btnRegisterLink: val('lgBtnRegisterLink'),
            btnBackText: val('lgBtnBackText'), btnBackLink: val('lgBtnBackLink'),
            helpText: val('lgHelpText')
        };
    }

    function simpanPengaturanLogin() {
        let config = {};
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)) || {}; } catch (e) { config = {}; }
        config.login = collectLoginData();
        config.lastUpdated = new Date().toISOString();
        localStorage.setItem(LANDING_STORAGE_KEY, JSON.stringify(config));
        toast('Halaman Login tersimpan & diterapkan ke halaman publik', 'fa-circle-check');
    }

    function loadSavedLoginData() {
        let config;
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)); } catch (e) { config = null; }
        if (!config || !config.login) return;
        const l = config.login;
        setImgSrc('lgThumbLogo', l.logo);
        setVal('lgJudul', l.judul); setVal('lgSub', l.sub);
        setVal('lgLabelUser', l.labelUser); setVal('lgPlaceholderUser', l.placeholderUser);
        setVal('lgLabelPass', l.labelPass); setVal('lgPlaceholderPass', l.placeholderPass);
        setVal('lgBtnSubmit', l.btnSubmit); setVal('lgLupaPassword', l.lupaPasswordWa);
        setVal('lgSeparator', l.separator);
        setVal('lgBtnRegisterText', l.btnRegisterText); setVal('lgBtnRegisterLink', l.btnRegisterLink);
        setVal('lgBtnBackText', l.btnBackText); setVal('lgBtnBackLink', l.btnBackLink);
        setVal('lgHelpText', l.helpText);
    }
    loadSavedLoginData();

    /* ==========================================================================
       SIMPAN & MUAT — HALAMAN KONTAK
       ========================================================================== */
    function collectKontakData() {
        return {
            hero: {
                sub: val('kkHeroSub'), title1: val('kkHeroTitle1'), title2: val('kkHeroTitle2'),
                desc: val('kkHeroDesc'), bgImage: imgSrc('kkThumbBg'),
                badges: managers.kontakHeroBadges.data.map(({ icon, label }) => ({ icon, label }))
            },
            kontakList: managers.kontakList.data.map(({ icon, judul, isi }) => ({ icon, judul, isi })),
            form: {
                title: val('kkFormTitle'), sub: val('kkFormSub'),
                subjek: val('kkFormSubjek').split(',').map(s => s.trim()).filter(Boolean)
            },
            jamPelayanan: managers.jamPelayanan.data.map(({ hari, waktu }) => ({ hari, waktu })),
            metodeKontak: managers.metodeKontak.data.map(({ icon, judul, desc, link }) => ({ icon, judul, desc, link })),
            lokasi: {
                nama: val('kkLokasiNama'), alamat: val('kkLokasiAlamat'), embed: val('kkLokasiEmbed')
            },
            faq: managers.faq.data.map(({ pertanyaan, jawaban }) => ({ pertanyaan, jawaban })),
            sosmed: managers.sosmed.data.map(({ platform, link }) => ({ platform, link }))
        };
    }

    function simpanPengaturanKontak() {
        let config = {};
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)) || {}; } catch (e) { config = {}; }
        config.kontak = collectKontakData();
        config.lastUpdated = new Date().toISOString();
        localStorage.setItem(LANDING_STORAGE_KEY, JSON.stringify(config));
        toast('Halaman Kontak tersimpan & diterapkan ke halaman publik', 'fa-circle-check');
    }

    function loadSavedKontakData() {
        let config;
        try { config = JSON.parse(localStorage.getItem(LANDING_STORAGE_KEY)); } catch (e) { config = null; }
        if (!config || !config.kontak) return;
        const k = config.kontak;

        if (k.hero) {
            setVal('kkHeroSub', k.hero.sub); setVal('kkHeroTitle1', k.hero.title1); setVal('kkHeroTitle2', k.hero.title2);
            setVal('kkHeroDesc', k.hero.desc); setImgSrc('kkThumbBg', k.hero.bgImage);
            if (Array.isArray(k.hero.badges) && k.hero.badges.length) {
                managers.kontakHeroBadges.data = k.hero.badges.map(x => ({ id: uid(), ...x }));
                managers.kontakHeroBadges.render();
            }
        }
        if (Array.isArray(k.kontakList) && k.kontakList.length) {
            managers.kontakList.data = k.kontakList.map(x => ({ id: uid(), ...x }));
            managers.kontakList.render();
        }
        if (k.form) {
            setVal('kkFormTitle', k.form.title); setVal('kkFormSub', k.form.sub);
            if (Array.isArray(k.form.subjek) && k.form.subjek.length) setVal('kkFormSubjek', k.form.subjek.join(', '));
        }
        if (Array.isArray(k.jamPelayanan) && k.jamPelayanan.length) {
            managers.jamPelayanan.data = k.jamPelayanan.map(x => ({ id: uid(), ...x }));
            managers.jamPelayanan.render();
        }
        if (Array.isArray(k.metodeKontak) && k.metodeKontak.length) {
            managers.metodeKontak.data = k.metodeKontak.map(x => ({ id: uid(), ...x }));
            managers.metodeKontak.render();
        }
        if (k.lokasi) {
            setVal('kkLokasiNama', k.lokasi.nama); setVal('kkLokasiAlamat', k.lokasi.alamat); setVal('kkLokasiEmbed', k.lokasi.embed);
        }
        if (Array.isArray(k.faq) && k.faq.length) {
            managers.faq.data = k.faq.map(x => ({ id: uid(), ...x }));
            managers.faq.render();
        }
        if (Array.isArray(k.sosmed) && k.sosmed.length) {
            managers.sosmed.data = k.sosmed.map(x => ({ id: uid(), ...x }));
            managers.sosmed.render();
        }
    }
    loadSavedKontakData();
</script>
</body>
</html>