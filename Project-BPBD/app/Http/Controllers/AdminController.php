<?php

namespace App\Http\Controllers;
use App\Models\Bencana;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // menampilkan
    public function indexhome()
    {
        $data_bencana = \App\Models\Bencana::all();
        return view('dashboard-admin/home', ['data_bencana' => $data_bencana]); 
    }
    public function update(Request $request)
    {
        $editbencana = \App\Models\Bencana::findOrFail($request->id);   
        $editbencana->update($request->all());

        return back();
    }
}
