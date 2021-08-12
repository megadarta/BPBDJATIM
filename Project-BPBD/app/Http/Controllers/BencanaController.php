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
        $data_bencana = Bencana::all()->where('status_bencana', '=', 'Aktif');
        return view('dashboard-admin.maps', ['data_bencana' => $data_bencana]); 
    }

    public function index()
    {
        $data_bencana = Bencana::all();
        return view('dashboard-admin/databencana'); 
    }

    function search(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = Bencana::where('nama_bencana', 'like', '%'.$query.'%')
                    ->orWhere('tanggal', 'like', '%'.$query.'%')  
                    ->orWhere('lokasi', 'like', '%'.$query.'%')
                    ->orWhere('status_bencana', 'like', '%'.$query.'%')
                    ->get();                
            }
            else
            {
                $data = Bencana::all();
            }
            $total_row = $data->count();
            
            if($total_row > 0)
            {
                $hapus_icon = asset('assets/delete.png');
                $edit_icon = asset('assets/edit.png');
                $i = 0;
                foreach($data as $row)
                {
                    $url_hapus = url('bencana/delete', $row->id);
                    $output .= '
                    <tr>
                    <th scope="row">'.++$i.'</th>
                    <td>'.$row->nama_bencana.'</td>
                    <td>'.$row->tanggal.'</td>
                    <td>'.$row->tanggal.'</td>
                    <td>'.$row->lokasi.'</td>
                    <td>'.$row->status_bencana.'</td>
                    <td>
                        <a href="'.$url_hapus.'"><img src="'.$hapus_icon.'" width="20px" ></a>
                        <a id="buttonedit" data-bs-toggle="modal" data-bs-target="#modaledit" data-mynama="'.$row->nama_bencana.'" data-lokasi="'.$row->lokasi.'" data-tanggal="'.$row->tanggal.'" data-status="'.$row->status_bencana.'" data-longitude="'.$row->longitude.'" data-latitude="'.$row->latitude.'" data-id="'.$row->id.'"><img src="'.$edit_icon.'" width="20px" ></a>
                    </td>
                    </tr>
                    ';
                }
            }
            else
            {
            $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
            }
            $data = array(
            'table_data'  => $output
            );

            echo json_encode($data);
        }
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
        
    }

    public function delete($id)
    {
        $bencana = Bencana::find($id);   
        $bencana->delete();
        return redirect()->back();
    }
    
}
