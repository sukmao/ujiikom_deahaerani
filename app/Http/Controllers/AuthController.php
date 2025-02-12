<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form registrasi
    public function register()
    {
        return view('auth.register');
    }

    // Proses registrasi pengguna
    public function storeregister(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat'        => 'required|string',
            'no_telepon'    => 'required|string|max:15',
            'username'      => 'required|string|unique:users,username',
            'password'      => 'required|string|min:8',
            'role'          => 'required|in:admin,petugas,masyarakat',
        ]);

        // Membuat user baru di tabel users
        Admin::create([
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat'        => $request->alamat,
            'no_telepon'    => $request->no_telepon,
            'username'      => $request->username,
            'password'      => bcrypt($request->password), // Gunakan Hash::make() untuk keamanan
            'role'          => $request->role,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Menampilkan form login
    public function login()
    {
        return view('auth.login');
    }

    // Proses login
    public function storelogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8',
        ], [
            'username.required' => 'Username harus diisi.',
            'username.string' => 'Username harus berupa teks.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        // Proses autentikasi menggunakan Auth::attempt
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect berdasarkan role pengguna
            if ($user->role === 'admin') {
                return redirect('/dashboard_admin');
            } elseif ($user->role === 'petugas') {
                return redirect('/dashboard_petugas');
            } else {
                return redirect('/dashboard_masyarakat');
            }
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput($request->only('username'));
    }

    // Logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout berhasil!');
    }
}
