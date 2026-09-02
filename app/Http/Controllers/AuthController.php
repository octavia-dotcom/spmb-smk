<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // REGISTER CALON SISWA
    public function registerSiswa(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'no_hp' => 'required|string|min:10|max:15',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // udah auto hash karena casts di User.php
            'role' => 'siswa',
            'no_hp' => $request->no_hp
        ]);

        Auth::login($user);

        // 4. Redirect ke halaman selanjutnya (Isi Formulir / Biodata)
       return redirect('/formulir');
    }

public function login(Request $request)
{
    // 1. Validasi input
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // 2. Cari user berdasarkan email
    $user = User::where('email', $request->email)->first();

    // 3. Cek apakah user ada DAN passwordnya cocok (mendukung teks biasa / ter-hash)
    if ($user && ($request->password === $user->password || \Illuminate\Support\Facades\Hash::check($request->password, $user->password))) {
        
        // Login-kan user secara manual
        Auth::login($user);
        $request->session()->regenerate();

        // Cek role admin
        if ($user->role == 'admin') {
            return redirect('/dashboard_admin');
        } 
        
        // Cek apakah sudah isi formulir
        $sudahDaftar = Pendaftar::where('id_user', $user->id_user)->exists(); 

        if (!$sudahDaftar) {
            return redirect('/formulir')->with('warning', 'Silakan lengkapi formulir pendaftaran terlebih dahulu!');
        }

        return redirect('/dashboard_siswa');
    }

    // 4. Kalau gagal
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}
    // 2. Tambahkan fungsi BARU ini di bawahnya khusus untuk API/Postman
    public function loginApi(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Membuat token Sanctum secara otomatis saat login sukses
            $token = $user->createToken('api_token')->plainTextToken;
            
            return response()->json([
                'status' => 'success',
                'message' => 'Login berhasil',
                'access_token' => $token, // Token inilah yang nanti dipakai di Postman
                'user' => $user
            ], 200);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Email atau password salah'
        ], 401);
    }

    public function userProfile(Request $request)
{
    $user = $request->user();

    return response()->json([
        'name' => $user->name,
        'email' => $user->email,
    ], 200);
}
    
    public function lupaPassword(Request $request)
{
    // Validasi input email atau username yang dipakai login
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password_baru' => 'required|min:6'
    ]);

    // Cari user berdasarkan email
    $user = User::where('email', $request->email)->first();

    // Update password baru (di-hash dulu agar aman)
    $user->password = Hash::make($request->password_baru);
    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Password berhasil diubah. Silakan login kembali dengan password baru.'
    ], 200);
}
    public function showLoginForm()
    {
        // Ganti 'register' dengan nama file view blade kamu (misalnya register.blade.php)
        return view('/login');
    }
    // LOGOUT
    public function logout(Request $request)
    {
        // Logout session web (bukan token API/Sanctum) — ini yang dipakai
        // karena login() di atas pakai Auth::login(), berbasis session.
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout berhasil']);
    }
    public function showRegisterForm()
{
    return view('daftar'); 
}
}