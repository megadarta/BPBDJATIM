<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Element;
// use RealRashid\SweetAlert\Facades\Alert;


class ElementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard-admin/dataelemen');
    }

    function search(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = Element::where('nama_element', 'like', '%'.$query.'%')->get();                
            }
            else
            {
                $data = Element::all();
            }
            $total_row = $data->count();
            
            if($total_row > 0)
            {
                $hapus_icon = asset('assets/delete.png');
                $edit_icon = asset('assets/edit.png');
                $i = 0;
                foreach($data as $row)
                {
                    $url_hapus = url('element/delete', $row->id);
                    $icon_element = url('assets/icon/', $row->icon);
                    $output .= '
                    <tr>
                    <th scope="row">'.++$i.'</th>
                    <td><img src="'.$icon_element.'" width="20px" style="margin-left: 13px;"></td>
                    <td>'.$row->nama_element.'</td>
                    <td>
                        <a href="'.$url_hapus.'"><img src="'.$hapus_icon.'" width="20px" ></a>
                        <a href="" id="editelemen" data-bs-toggle="modal" data-bs-target="#modaledit" data-nama="'.$row->nama_element.'" data-icon="'.$row->icon.'" data-id="'.$row->id.'"><img src="'.$edit_icon.'" width="20px" ></a>
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
            'nama_element' =>['required', 'string', 'max:255'],
            'icon' => ['required','image'],
        ]);
        
        // Cek Validasi
        if ($validated->fails()) {
            return back()->withErrors($validated); 
        } else {
            $extension = $request->file('icon')->extension();
            $icon_name = request('nama_element').'.'.$extension;
            $icon = $request->file('icon')->storeAs('icon',$icon_name, ['disk' => 'public_image']);

            // Input Data ke Database
            Element::create([
                'nama_element' => request('nama_element'),
                'icon' => $icon_name,
            ]);

            //Redirect
            return redirect()->back();
        }
        
    }

    public function update(Request $request, Element $element)
    {
        $validated = Validator::make($request->all(),[
            'nama_element' =>['required', 'string', 'max:255'],
            'icon' => ['required','image'],
        ]);
        
        // Cek Validasi
        if ($validated->fails()) {
            return back(); 
        } else {
            if($request->file('icon')){
                // Storage::disk('public_image')->delete('assets/icon/'.$element->icon);

                $extension = $request->file('icon')->extension();
                $icon_name = request('nama_element').'.'.$extension;
                $icon = $request->file('icon')->storeAs('icon',$icon_name, ['disk' => 'public_image']);
            }
            else{
                $icon_name = $element->icon;
            }
            
            // Input Data ke Database
            Element::where('id', $request->id)->update([
                'nama_element' => request('nama_element'),
                'icon' => $icon_name,
            ]);

            //Redirect
            return back();
        }
    }

    public function delete(Element $item)
    {
        Storage::disk('public_image')->delete('icon/'.$item->icon);
        $item->delete();
        // Alert::success('Success Title', 'Success Message');

        return back();
    }
}
