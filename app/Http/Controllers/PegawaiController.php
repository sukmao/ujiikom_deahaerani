<?php

namespace App\Http\Controllers;

use App\Models\User; // Menggunakan model User sesuai tabel users
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    // Menampilkan daftar pegawai (admin & petugas)
    public function index()
    {
        $petugass = User::whereIn('role', ['admin', 'petugas'])->get();
        return view('pagesadmin.pegawai.data_pegawai', compact('petugass'));
    }

    // Menampilkan form tambah pegawai
    public function create()
    {
        return view('pagesadmin.pegawai.tambah_pegawai');
    }

    // Menyimpan pegawai baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username'      => 'required|string|max:255|unique:users,username',
            'password'      => 'required|string|min:8',
            'no_telepon'    => 'required|string|max:15|regex:/^[0-9]+$/',
            'alamat'        => 'required|string',
            'role'          => 'required|in:admin,petugas',
        ]);

        // Simpan ke tabel users
        User::create([
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username'      => $request->username,
            'password'      => Hash::make($request->password), // Hash password
            'no_telepon'    => $request->no_telepon,
            'alamat'        => $request->alamat,
            'role'          => $request->role,
        ]);

        return redirect('pegawai')->with('success', 'Pegawai berhasil ditambahkan!');
    }

    // Menampilkan form edit pegawai
    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('pagesadmin.pegawai.edit_pegawai', compact('petugas'));
    }

    // Memperbarui data pegawai
    public function update(Request $request, $id)
    {
        $petugas = User::findOrFail($id);

        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username'      => 'required|string|max:255|unique:users,username,' . $id,
            'password'      => 'nullable|string|min:8',
            'no_telepon'    => 'required|string|max:15|regex:/^[0-9]+$/',
            'alamat'        => 'required|string|max:255',
            'role'          => 'required|in:admin,petugas,masyarakat',
        ]);

        // Update data pegawai
        $petugas->nama_lengkap  = $request->nama_lengkap;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->username      = $request->username;

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $petugas->password = Hash::make($request->password);
        }

        $petugas->no_telepon = $request->no_telepon;
        $petugas->alamat     = $request->alamat;
        $petugas->role       = $request->role;

        $petugas->save();

        return redirect('pegawai')->with('success', 'Pegawai berhasil diperbarui!');
    }

    // Menghapus pegawai
    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();

        return response()->json(['success' => true, 'message' => 'Pegawai berhasil dihapus.']);
    }
}
