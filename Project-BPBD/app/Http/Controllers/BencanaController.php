<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use Illuminate\Http\Request;

class BencanaController extends Controller
{
    public function index(){
        return view('dashboard-admin/maps');
    }

    // public function titik(){
    //     $results=$this->Bencana->allData();
    //     return json_encode($results);
    // }

    public function create(Request $request)
    {
        \App\Models\Bencana::create($request->all());  
        return redirect('/maps');
    }
}
