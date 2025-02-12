<?php

namespace App\Http\Controllers;

use App\Models\Admin; // Model yang digunakan tetap Admin karena tabelnya 'users'
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function show($id = null)
    {
        $admins = Admin::where('role', 'admin')->get();
        $adminss = $id ? Admin::findOrFail($id) : null;
        return view('pagesadmin.pegawai.data_pegawai', compact('admins', 'adminss'));
    }

    public function create()
    {
        return view('admin.profile.tambah_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username'      => 'required|string|max:255|unique:users,username',
            'password'      => 'required|string|min:8',
            'no_telepon'    => 'required|string|max:15|regex:/^[0-9]+$/',
            'alamat'        => 'required|string|max:255',
            'role'          => 'required|in:admin,masyarakat',
        ]);

        Admin::create([
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username'      => $request->username,
            'password'      => bcrypt($request->password),
            'no_telepon'    => $request->no_telepon,
            'alamat'        => $request->alamat,
            'role'          => $request->role,
        ]);

        return redirect('admin')->with('success', 'Admin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $admins = Admin::findOrFail($id);
        return view('admin.profile.edit_admin', compact('admins'));
    }

    public function update(Request $request, $id)
    {
        $admins = Admin::findOrFail($id);

        $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'username'      => 'required|string|max:255|unique:users,username,' . $id,
            'password'      => 'nullable|string|min:8',
            'no_telepon'    => 'required|string|max:15|regex:/^[0-9]+$/',
            'alamat'        => 'required|string|max:255',
            'role'          => 'required|in:admin,masyarakat',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $admins->update([
            'nama_lengkap'  => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username'      => $request->username,
            'no_telepon'    => $request->no_telepon,
            'alamat'        => $request->alamat,
            'role'          => $request->role,
            'password'      => $request->filled('password') ? bcrypt($request->password) : $admins->password,
        ]);

        if ($request->hasFile('foto')) {
            if ($admins->foto && Storage::exists('public/' . $admins->foto)) {
                Storage::delete('public/' . $admins->foto);
            }
            $path = $request->file('foto')->store('foto_admin', 'public');
            $admins->update(['foto' => $path]);
        }

        return redirect('admin')->with('success', 'Admin berhasil diperbarui.');
    }

    public function detailprofile($id)
    {
        $adminss = Admin::findOrFail($id);
        return view('admin.profile.detail_profile', compact('adminss'));
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->foto && Storage::exists('public/' . $admin->foto)) {
            Storage::delete('public/' . $admin->foto);
        }

        $admin->delete();

        return redirect('admin')->with('success', 'Admin berhasil dihapus.');
    }
}
