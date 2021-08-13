<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $data_bencana = Bencana::all()->where('status_bencana', '=', 'Aktif');
        return view('dashboard-admin.maps', ['data_bencana' => $data_bencana]);
    }
}
