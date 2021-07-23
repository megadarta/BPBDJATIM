<?php

namespace App\Http\Controllers;

use App\Models\Bencana;
use Illuminate\Http\Request;

class BencanaController extends Controller
{
    public function __construct(){
        $this->Bencana = new Bencana();
    }
    public function index(){
        return view('dashboard-admin/maps');
    }

    public function titik(){
        $results=$this->Bencana->allData();
        return json_encode($results);
    }
}
