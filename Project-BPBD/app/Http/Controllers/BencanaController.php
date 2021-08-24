<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use App\Models\Bantuan;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BencanaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function maps(){
        $data_bencana = Bencana::all()->where('status_bencana', '=', 'Aktif');
        $data_bantuan = DB::table('bantuan')
        ->join('bencanas', 'bantuan.bencana_id', '=', 'bencanas.id')
        ->join('users', 'bantuan.user_id', '=', 'users.id')
        ->join('elements', 'bantuan.element_id', '=', 'elements.id')
        ->select('elements.nama_element', 'elements.icon', 'bantuan.id', 'bantuan.bencana_id', 'bantuan.kuantitas', 'bencanas.nama_bencana', 'bencanas.latitude', 'bencanas.longitude', 'users.nama_instansi')
        ->where('bencanas.status_bencana', '=', 'Aktif')
        ->get();
        $tabelbantuan = Bantuan::all();
        return view('dashboard-admin.maps', ['data_bencana' => $data_bencana, 'data_bantuan' => $data_bantuan, 'tabelbantuan' => $tabelbantuan]); 
    }

    public function index()
    {
        $data_bencana = Bencana::all();
        return view('dashboard-admin/databencana', ['data_bencana' => $data_bencana]); 
    }


    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'nama_bencana' =>['required', 'string', 'max:255'],
            'tanggal' => ['required'],
            'lokasi' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
        ]);
        
        // Cek Validasi
        if ($validated->fails()) {
            return back()->withErrors($validated); 
        } else {
            // Input Data ke Database
            Bencana::create($request->all());

            //Redirect
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $bencana = Bencana::find($id);  
        $bantuan = DB::table('bantuan')
        ->join('bencanas', 'bantuan.bencana_id', '=', 'bencanas.id')
        ->join('users', 'bantuan.user_id', '=', 'users.id')
        ->join('elements', 'bantuan.element_id', '=', 'elements.id')
        ->select('elements.nama_element', 'elements.icon', 'bantuan.id', 'bantuan.bencana_id', 'bantuan.kuantitas', 'bencanas.nama_bencana', 'bencanas.latitude', 'bencanas.longitude', 'users.nama_instansi')
        ->where('bantuan.bencana_id', '=', $id)
        ->get();
        // $tampilbantuan = $bantuan::all()->where('bencana_id', '=', $bencana);
        // echo $bantuan;
        return view('dashboard-admin/detailbencana', ['bencana' => $bencana, 'bantuan' => $bantuan]);
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        
    }

    public function delete($id)
    {
        $bencana = Bencana::find($id);   
        $bencana->delete();
        return redirect()->back();
    }
    
}
