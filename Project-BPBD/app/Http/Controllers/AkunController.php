<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_akun = User::all();
        return view('dashboard-admin/dataakun',compact('data_akun'));
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
        $user = User::find($id);   
        $user->delete();
        return redirect()->back();
    }
}
