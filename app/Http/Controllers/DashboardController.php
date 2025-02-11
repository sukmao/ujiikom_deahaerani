<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $pengaduans = Pengaduan::paginate(5);
        return view('pagesadmin.dashboard_admin',compact('pengaduans') );
    }
}
