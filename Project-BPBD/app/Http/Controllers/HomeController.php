<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\User;
use App\Models\Bantuan;
use Illuminate\Support\Facades\DB;
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
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_akun = User::all();
        $data_bencana = Bencana::all()->where('status_bencana', '=', 'Aktif');
        $data_bantuan = DB::table('bantuan')
        ->join('bencanas', 'bantuan.bencana_id', '=', 'bencanas.id')
        ->join('users', 'bantuan.user_id', '=', 'users.id')
        ->join('elements', 'bantuan.element_id', '=', 'elements.id')
        ->select('elements.nama_element', 'elements.icon', 'bantuan.id', 'bantuan.bencana_id', 'bantuan.kuantitas', 'bencanas.nama_bencana', 'bencanas.latitude', 'bencanas.longitude', 'users.nama_instansi')
        ->where('bencanas.status_bencana', '=', 'Aktif')
        ->get();
        $tabelbantuan = Bantuan::all();
        return view('dashboard-user/maps', ['data_bencana' => $data_bencana, 'data_bantuan' => $data_bantuan, 'tabelbantuan' => $tabelbantuan, 'data_akun' => $data_akun]);
    }
    public function profile(){
        $data_akun = User::all();
        return view('dashboard-user/profile', ['data_akun' => $data_akun]);
    }
}
