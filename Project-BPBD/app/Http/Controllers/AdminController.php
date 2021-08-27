<?php

namespace App\Http\Controllers;
use App\Models\Bencana;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // menampilkan
    public function login2()
    {
        // $data_bencana = \App\Models\Bencana::all();
        return view('auth2/layout/main'); 
    }
    public function indexhome()
    {
        $data_akun = User::all();
        return view('dashboard-admin/home', ['data_akun' => $data_akun]); 
    }

    function homesearch(Request $request)
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
                    ->get();                
            }
            else
            {
                $data = Bencana::all();
            }
            $total_row = $data->count();
            
            if($total_row > 0)
            {
                $i = 0;
                foreach($data as $row)
                {
                    $url_detail = url('admin/data/detail-bencana', $row->id);
                    $output .= '
                    <a href="'.$url_detail.'" style="text-decoration: none;">
                    <div class="col card-home">
                        <div class="card-text1">'.$row->nama_bencana.'</div>
                        <div class="card-text2">'.$row->tanggal.'</div>
                        <div class="card-text3">'.mb_strimwidth($row->lokasi, 0, 30, "...").'</div>
                    </div>
                    </a>
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

    public function update(Request $request)
    {
        $editbencana = \App\Models\Bencana::findOrFail($request->id);   
        $editbencana->update($request->all());

        return back();
    }
}
