<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kartu Ucapan Pendaftaran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<style>
  :root{
    --dark-green: #0b3d2e;
    --brand-green: #1f7a4d;
    --brand-green-light: #e6f4ec;
    --text-dark: #0b3d2e;
    --text-muted: #4a5b54;
  }
  *{box-sizing:border-box; margin:0; padding:0;}
  body{
    min-height:100vh;
    background: var(--dark-green);
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    display:flex;
    align-items:center;
    justify-content:center;
    padding: 40px 16px;
  }
  .wrap{
    width:100%;
    max-width:460px;
    text-align:center;
  }
  .badge-zone{
    position:relative;
    height:96px;
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .check-circle{
    width:72px;
    height:72px;
    border-radius:50%;
    background: var(--brand-green);
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow: 0 0 0 6px #ffffff;
    z-index:2;
  }
  .check-circle svg{ width:32px; height:32px; }
  .confetti{ position:absolute; border-radius:2px; }
  .card{
    background:#ffffff;
    border-radius:20px;
    padding: 28px 24px 24px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.25);
  }
  h1{
    font-size:22px;
    font-weight:700;
    color: var(--text-dark);
    margin-bottom:4px;
  }
  h2{
    font-size:16px;
    font-weight:700;
    color: var(--brand-green);
    margin-bottom:14px;
    line-height:1.3;
  }
  .desc{
    font-size:13px;
    color: var(--text-muted);
    line-height:1.5;
    max-width:400px;
    margin: 0 auto 20px;
  }
  .number-box{
    background: #f3faf6;
    border: 1px solid #d7ede0;
    border-radius:14px;
    padding:14px 18px;
    margin-bottom:18px;
  }
  .number-label{
    font-size:12px;
    font-weight:600;
    color: var(--brand-green);
    margin-bottom:6px;
  }
  .number-row{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:12px;
    flex-wrap:wrap;
  }
  .reg-number{
    font-size:24px;
    font-weight:800;
    letter-spacing:0.5px;
    color: var(--text-dark);
  }
  .copy-btn{
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:2px;
    background:#ffffff;
    border:1px solid #d7ede0;
    border-radius:10px;
    padding:6px 14px;
    cursor:pointer;
    font-size:12px;
    font-weight:600;
    color: var(--brand-green);
    transition: background .15s ease;
  }
  .copy-btn:hover{ background:#eef8f2; }
  .copy-btn svg{ width:16px; height:16px; }
  .steps-box{
    display:flex;
    gap:12px;
    text-align:left;
    background:#f7f8f5;
    border-radius:14px;
    padding:14px 16px;
    margin-bottom:18px;
  }
  .hourglass-circle{
    flex:none;
    width:36px;
    height:36px;
    border-radius:50%;
    background: var(--brand-green-light);
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .hourglass-circle svg{ width:18px; height:18px; }
  .steps-title{
    font-size:13px;
    font-weight:700;
    color: var(--text-dark);
    margin-bottom:4px;
  }
  .steps-list{
    font-size:12px;
    color: var(--text-muted);
    line-height:1.6;
  }
  .cta{
    width:100%;
    background: var(--dark-green);
    color:#fff;
    border:none;
    border-radius:12px;
    padding:12px;
    font-size:14px;
    font-weight:700;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    margin-bottom:14px;
    text-decoration: none;
  }
  .cta:hover{ background:#0f4f3a; }
  .footer-text{
    font-size:12px;
    color: var(--text-muted);
    line-height:1.5;
  }
  .footer-school{
    font-weight:700;
    color: var(--brand-green);
  }
</style>
</head>
<body>

<div class="wrap">
  <div class="badge-zone">
    <svg class="confetti" style="left:22%; top:20px; width:8px; height:8px; background:#f2b705; transform:rotate(20deg);"></svg>
    <svg class="confetti" style="left:30%; top:55px; width:6px; height:6px; background:#3fae6a; border-radius:50%;"></svg>
    <svg class="confetti" style="left:14%; top:70px; width:10px; height:4px; background:#f2b705; transform:rotate(-25deg);"></svg>
    <svg class="confetti" style="right:22%; top:15px; width:8px; height:8px; background:#3fae6a; transform:rotate(-15deg);"></svg>
    <svg class="confetti" style="right:16%; top:60px; width:6px; height:6px; background:#f2b705; border-radius:50%;"></svg>
    <svg class="confetti" style="right:30%; top:80px; width:10px; height:4px; background:#3fae6a; transform:rotate(25deg);"></svg>
    <div class="check-circle">
      <svg viewBox="0 0 24 24" fill="none"><path d="M4 12.5L9.5 18L20 6" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
    </div>
  </div>

  <div class="card">
    <h1>Selamat!</h1>
    <h2>Anda berhasil menyelesaikan pendaftaran</h2>
    <p class="desc">
      Terima kasih telah menyelesaikan proses pendaftaran<br>
      SPMB SMK Ma'arif Walisongo Kajoran Tahun Ajaran 2027/2028.
    </p>

    <div class="number-box">
    <div class="number-label">Nomor Pendaftaran Anda</div>
    <div class="number-row">
        <div class="reg-number" id="regNumber">{{ $pendaftar->no_pendaftaran }}</div>
        
        <button class="copy-btn" id="copyBtn" onclick="copyNumber()">
            <svg viewBox="0 0 24 24" fill="none" stroke="#1f7a4d" stroke-width="2">
                <rect x="9" y="9" width="11" height="11" rx="2"/>
                <path d="M5 15V5a2 2 0 0 1 2-2h10"/>
            </svg>
            <span id="copyLabel">Salin</span>
        </button>
    </div>
</div>

    <div class="steps-box">
      <div class="hourglass-circle">
        <svg viewBox="0 0 24 24" fill="none" stroke="#1f7a4d" stroke-width="2"><path d="M6 2h12M6 22h12M6 2c0 6 6 6 6 10s-6 4-6 10M18 2c0 6-6 6-6 10s6 4 6 10"/></svg>
      </div>
      <div>
        <div class="steps-title">Langkah Selanjutnya</div>
        <div class="steps-list">
          Pendaftaran Anda telah kami terima dan akan diproses oleh panitia.
          Silakan menunggu proses verifikasi berkas yang telah Anda unggah.
          Pengumuman hasil seleksi akan diinformasikan melalui dashboard siswa.
          Pastikan Anda selalu memantau informasi terbaru.
        </div>
      </div>
    </div>

    <a href="{{ url('/dashboard_siswa') }}" class="cta">
      <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" width="18" height="18"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
      Masuk ke Dashboard Siswa
    </a>

    <p class="footer-text">
      Terima kasih telah mendaftar di<br>
      <span class="footer-school">SMK Ma'arif Walisongo Kajoran</span>
    </p>
  </div>
</div>

<script>
function copyNumber() {
    // Mengambil teks nomor pendaftaran
    const regNumber = document.getElementById('regNumber').innerText;
    
    // Menyalin ke clipboard
    navigator.clipboard.writeText(regNumber).then(() => {
        // Mengubah teks label menjadi "Tersalin" sementara
        const copyLabel = document.getElementById('copyLabel');
        copyLabel.innerText = 'Tersalin!';
        
        setTimeout(() => {
            copyLabel.innerText = 'Salin';
        }, 2000);
    });
}
</script>

</body>
</html>