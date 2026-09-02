<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - SPMB SMK Ma'arif Walisongo Kajoran</title>
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
<link rel="icon" type="image/png" href="{{ asset('img/logo.smk.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ==========================================================================
           1. RESET & GLOBAL STYLES
           ========================================================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #02403f;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* ==========================================================================
           2. KARTU CONTAINER INTERN
           ========================================================================== */
        .login-container {
            width: 100%;
            max-width: 440px;
            background-color: #ffffff;
            border-radius: 20px;
            padding: 40px 35px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            text-align: center;
        }

        .logo-sekolah {
            height: 70px;
            width: auto;
            margin-bottom: 15px;
        }

        .login-container h1 {
            font-size: 26px;
            font-weight: 700;
            color: #02403f;
            margin-bottom: 5px;
        }

        .login-container p {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 25px;
            line-height: 1.4;
        }

        /* ==========================================================================
           3. STYLING FORM & INPUT DUAL MODE
           ========================================================================== */
        .form-group {
            text-align: left;
            margin-bottom: 18px;
        }

        /* Animasi Transisi Halus Saat Muncul/Sembunyi */
        .dynamic-field {
            display: none; 
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #007a53;
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper input {
            width: 100%;
            padding: 12px 14px 12px 14px;
            background: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 13px;
            color: #1e293b;
            outline: none;
            transition: all 0.2s;
        }
        .input-wrapper.has-left-icon input {
            padding-left: 42px;
        }

        .input-wrapper input:focus {
            border-color: #02403f;
            box-shadow: 0 0 0 4px rgba(2, 64, 63, 0.1);
        }

        .input-icon-left {
            position: absolute;
            left: 14px;
            width: 18px;
            height: 18px;
            color: #64748b;
        }

        .input-icon-right-toggle {
            position: absolute;
            right: 14px;
            width: 18px;
            height: 18px;
            color: #64748b;
            cursor: pointer;
        }

        .forgot-password-link {
            display: block;
            text-align: right;
            font-size: 12px;
            color: #007a53;
            text-decoration: none;
            font-weight: 600;
            margin-top: 8px;
        }

        /* Styling Khusus Dropdown Pilihan Status */
        .status-select {
            width: 100%;
            padding: 12px 14px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 13px;
            color: #1e293b;
            outline: none;
            cursor: pointer;
            font-family: inherit;
        }
        .status-select:focus {
            border-color: #02403f;
        }

        /* ==========================================================================
           4. BUTTONS & SEPARATOR STYLES
           ========================================================================== */
        .btn-submit {
            width: 100%;
            background-color: #007a53;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 25px;
            transition: background 0.2s;
        }
        .btn-submit:hover { background-color: #02403f; }
        .btn-submit svg { width: 18px; height: 18px; }

        .login-separator {
            display: flex;
            align-items: center;
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            margin: 25px 0;
        }
        .login-separator::before, .login-separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        .login-separator:not(:empty)::before { margin-right: .5em; }
        .login-separator:not(:empty)::after { margin-left: .5em; }

        .btn-register-link {
            width: 100%;
            background: transparent;
            border: 1px solid #007a53;
            color: #007a53;
            padding: 11px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
            margin-bottom: 20px;
        }
        .btn-register-link:hover { background-color: #f0fdf4; }
        .btn-register-link svg { width: 18px; height: 18px; }
         /* Tautan Bantuan di paling bawah */
        .help-center-wrapper {
            margin-top: 35px;
        }
        .help-center-link {
            font-size: 12px;
            color: #64748b;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .help-center-link span {
            color: #007a53;
            font-weight: 600;
        }
        .help-center-link svg {
            width: 16px;
            height: 16px;
            color: #64748b;
        }
        .btn-text-back {
            width: 100%;
            background: transparent;
            border: 1px solid #cbd5e1;
            color: #64748b;
            padding: 11px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
        }
        .btn-text-back:hover {
            background-color: #f8fafc;
            border-color: #64748b;
            color: #334155;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <img src="img/logo.smk.png" alt="Logo SMK" class="logo-sekolah">
        
        <h1>Selamat Datang</h1>
        <p>Masuk untuk melanjutkan ke sistem penerimaan peserta didik baru</p>
        <form action="{{ url('/login') }}" method="POST">
    @csrf
            <div class="form-group dynamic-field" id="field-nama-lengkap">
        <label>Nama Lengkap</label>
        <div class="input-wrapper">
            <input type="text" id="input_nama" placeholder="Masukkan Nama Lengkap">
        </div>
    </div>

    <div class="form-group">
        <label id="label-username">Email</label>
        <div class="input-wrapper has-left-icon">
            <svg class="input-icon-left" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
            </svg>
            <!-- TAMBAHKAN name="email" DI SINI -->
            <input type="email" name="email" id="input_user_credential" placeholder="Masukkan email" required>
        </div>
    </div>
    
    <div class="form-group">
        <label>Password</label>
        <div class="input-wrapper has-left-icon">
            <svg class="input-icon-left" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
            </svg>
            <!-- TAMBAHKAN name="password" DI SINI -->
            <input type="password" name="password" id="login-password" placeholder="Masukkan password" required>
            <svg class="input-icon-right-toggle" id="toggle-password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228A3 3 0 0 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
            </svg>
        </div>
    </div>
            <div class="form-group" style="margin-top: 20px;">
                <a href="https://wa.me/02933195678" target="_blank" class="forgot-password-link">Lupa Password?</a>
            </div>
            
            <button type="submit" class="btn-submit">
                Log in
            </button>
        </form>

        <div class="login-separator">Belum punya akun?</div>

        <a href="{{ url('/buat-akun') }}"class="btn-register-link">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0zM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
            </svg>
            Daftar Sekarang
        </a>

        <a href="{{ url('/home') }}" class="btn-text-back">
            ← Kembali ke Halaman Sebelumnya
        </a>

        <div class="help-center-wrapper">
            <a href="#" class="help-center-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                </svg>
                Butuh bantuan? <span>Hubungi kami</span>
            </a>
        </div>
    </div>


    <script>
    const selectStatus = document.getElementById('select-status');
    const fieldNamaLengkap = document.getElementById('field-nama-lengkap');
    const inputNama = document.getElementById('input_nama');
    const labelUsername = document.getElementById('label-username');
    const inputCredential = document.getElementById('input_user_credential');

    // Fungsi Pendeteksi Perubahan Dropdown Status
    if (selectStatus) {
        selectStatus.addEventListener('change', function() {
            if (this.value === 'siswa') {
                if (fieldNamaLengkap) fieldNamaLengkap.style.display = 'block';
                if (inputNama) inputNama.setAttribute('required', 'true');
                
                labelUsername.textContent = 'Username / Email';
                inputCredential.setAttribute('placeholder', 'Masukkan username atau email');
            } else {
                if (fieldNamaLengkap) fieldNamaLengkap.style.display = 'none';
                if (inputNama) inputNama.removeAttribute('required');
                
                labelUsername.textContent = 'Username';
                inputCredential.setAttribute('placeholder', 'Masukkan username');
            }
        });
    }

    // Fitur klik intip mata password
    const togglePassword = document.getElementById('toggle-password');
    const passwordInput = document.getElementById('login-password');
    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.style.opacity = type === 'text' ? '0.5' : '1';
        });
    }

    // Fungsi Proses Login via API
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const data = {
                email: document.getElementById('input_user_credential').value,
                password: document.getElementById('login-password').value
            };

            try {
                const response = await fetch('/api/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    // Simpan token ke localStorage dengan benar
                    localStorage.setItem('auth_token', result.token);
                    
                    alert('Login berhasil sebagai ' + result.user.role);
                    
                    // Arahkan otomatis berdasarkan role
                       if (result.user.role === 'admin') {
    window.location.replace('/dashboard_admin'); 
} else {
    window.location.replace('/dashboard_siswa'); 
}
                } else {
                    alert('Login gagal: ' + (result.message || 'Periksa kembali data Anda.'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan pada sistem.');
            }
        });
    }
</script>
</body>
</html>