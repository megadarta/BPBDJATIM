<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use Illuminate\Http\Request;

class BencanaController extends Controller
{
    public function maps(){
        
        $data_bencana = \App\Models\Bencana::all();
        return view('dashboard-admin.maps', ['data_bencana' => $data_bencana]); 
    }



    public function create(Request $request)
    {
        \App\Models\Bencana::create($request->all());  
        return redirect('/maps');
    }
}
