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
        return view('dashboard-admin/dataakun');
    }
    function search(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = User::where('nama_instansi', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%')  
                    ->orWhere('no_telepon', 'like', '%'.$query.'%')
                    ->orWhere('role', 'like', '%'.$query.'%')
                    ->get();                
            }
            else
            {
                $data = User::all();
            }
            $total_row = $data->count();
            
            if($total_row > 0)
            {
                $hapus_icon = asset('assets/delete.png');
                $edit_icon = asset('assets/edit.png');
                $i = 0;
                foreach($data as $row)
                {
                    $url_hapus = url('akun/delete', $row->id);
                    $output .= '
                    <tr>
                    <th scope="row">'.++$i.'</th>
                    <td>'.$row->nama_instansi.'</td>
                    <td>'.$row->email.'</td>
                    <td>'.$row->no_telepon.'</td>
                    <td>'.$row->role.'</td>
                    <td>
                        <a href="'.$url_hapus.'"><img src="'.$hapus_icon.'" width="20px" ></a>
                        <a href=""><img src="'.$edit_icon.'" width="20px" ></a>
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
