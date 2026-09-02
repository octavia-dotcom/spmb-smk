<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
public function handle(Request $request, Closure $next, $role)
{
    // Cek apakah user sudah login dan rolenya cocok
    if (!$request->user() || $request->user()->role !== $role) {
        // Jika untuk web, arahkan kembali ke halaman login dengan pesan error
        return redirect('/login')->with('error', 'Akses ditolak. Anda tidak memiliki hak akses.');
    }

    return $next($request);
}
}