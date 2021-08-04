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
    public function indexdatabencana()
    {   
        $data_bencana = \App\Models\Bencana::all();
        return view('dashboard-admin/databencana', ['data_bencana' => $data_bencana]); 
    }
    public function indexdataelemen()
    {
        return view('dashboard-admin/dataelemen');
    }
    public function indexdataakun()
    {
        return view('dashboard-admin/dataakun');
    }
    public function indexdetailbencana($id)
    {
        $bencana = \App\Models\Bencana::find($id);  
        return view('dashboard-admin/detailbencana', ['bencana' => $bencana]);
    }
    public function delete($id)
    {
        $bencana = \App\Models\Bencana::find($id);   
        $bencana->delete();
        return redirect('/admin/data/history/data-bencana');
    
    }

    public function update(Request $request)
    {
        $editbencana = \App\Models\Bencana::findOrFail($request->id);   
        $editbencana->update($request->all());

        return back();
    }
}
