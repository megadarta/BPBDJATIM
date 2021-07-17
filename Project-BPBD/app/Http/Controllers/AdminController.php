<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // menampilkan
    public function indexhome()
    {
        return view('dashboard-admin/home');
    }
    public function indexdatabencana()
    {
        return view('dashboard-admin/databencana');
    }
    public function indexdataelemen()
    {
        return view('dashboard-admin/dataelemen');
    }
    public function indexdataakun()
    {
        return view('dashboard-admin/dataakun');
    }
    public function indexdetailbencana()
    {
        return view('dashboard-admin/detailbencana');
    }
}
