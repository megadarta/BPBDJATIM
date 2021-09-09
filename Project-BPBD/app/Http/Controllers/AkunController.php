<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AkunController extends Controller
{
    public function index()
    {
        $data_akun = User::all();
        return view('dashboard-admin/dataakun', ['data_akun' => $data_akun]);
    }
    
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $editakun = \App\Models\User::findOrFail($request->id);   
        $editakun->update($request->all());

        return back();
    }

    public function delete($id)
    {
        $user = User::find($id);   
        $user->delete();
        return redirect()->back();
    }

    public function profile(){
        $data_akun = User::all();
        return view('dashboard-admin/profile', ['data_akun' => $data_akun]);
    }

    public function profile_update(Request $request){
        $editprofile = \App\Models\User::findOrFail($request->id);   
        $editprofile->update([
            'nama_instansi' => $request->nama_instansi,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            
        ]);

        // return back();
    }
}
