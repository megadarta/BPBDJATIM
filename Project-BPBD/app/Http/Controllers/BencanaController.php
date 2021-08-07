<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BencanaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function maps(){
        $data_bencana = Bencana::all();
        return view('dashboard-admin.maps', ['data_bencana' => $data_bencana]); 
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
        return view('dashboard-admin/detailbencana', ['bencana' => $bencana]);
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function delete($id)
    {
        $bencana = Bencana::find($id);   
        $bencana->delete();
        return redirect()->back();
    }
    
}
