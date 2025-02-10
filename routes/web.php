<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// dashboard masyarakat
Route::get('/dashboard_masyarakat',function(){
    return view('pagesmasyarakat.dashboard_masyarakat');
});
// dashboard admin
Route::get('/dashboard',function(){
    return view('pagesadmin.dashboard_admin');
});

// pegawai
Route::get('/pegawai',function(){
    return view('pagesadmin.pegawai.data_pegawai');
});
Route::get('/tambah_pegawai',function(){
    return view('pagesadmin.pegawai.tambah_pegawai');
});
Route::get('/edit_pegawai',function(){
    return view('pagesadmin.pegawai.edit_pegawai');
});


// pengaduan /laporan
Route::get('/laporan',function(){
    return view('pagesadmin.laporan.data_laporan');
});
Route::get('/tambah_laporan',function(){
    return view('pagesadmin.laporan.tambah_laporan');
});
Route::get('/edit_laporan',function(){
    return view('pagesadmin.laporan.edit_laporan');
});


// masyarakat
Route::get('/masyarakat',function(){
    return view('pagesadmin.masyarakat.data_masyarakat');
});
Route::get('/tambah_masyarakat',function(){
    return view('pagesadmin.masyarakat.tambah_masyarakat');
});
Route::get('/edit_masyarakat',function(){
    return view('pagesadmin.masyarakat.edit_masyarakat');
});




// kategori
Route::get('/kategori',function(){
    return view('pagesadmin.kategori.data_kategori');
});
Route::get('/tambah_kategori',function(){
    return view('pagesadmin.kategori.tambah_ategroi');
});
Route::get('/edit_kategori',function(){
    return view('pagesadmin.kategori.edit_kategori');
});


// profile
Route::get('/profile',function(){
    return view('pagesadmin.profile.data_profile');
});
