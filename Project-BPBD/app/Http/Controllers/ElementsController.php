<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Element;
use App\Models\Bantuan;
// use RealRashid\SweetAlert\Facades\Alert;


class ElementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_elemen = Element::all();
        return view('dashboard-admin/dataelemen', ['data_elemen' => $data_elemen]);
    }



    // search maps side bar 
    function mapssearch(Request $request)
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
                $i=0;
                while($i<$total_row)
                {
                    // echo $key->nama_element;
                    // $url_hapus = url('element/delete', $row->id);
                    $icon_element = url('assets/icon/', $data[$i]->icon);
                    $output .= '
                    <div class="kotak-icon-elemen d-flex">
                        <div>
                            <img src="'.$icon_element.'" class="icon-elemen"></img>
                        </div>
                        <div class="nama-elemen">
                            <input id="'.$data[$i]->id.'" value="'.$data[$i]->nama_element.'" onclick="tambahbantuan(this.value, this.id)" type="button" class="nama-elemen klikelemen">
                        </div>
                    </div>
                    ';
                    $i++;
                }
            }
            else
            {
            $output = '
            <p> Tidak ditemukan </p>
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

    public function update(Request $request)
    {

            
            echo($request->id);
          

        
    }

    public function delete(Element $item)
    {
        Storage::disk('public_image')->delete('icon/'.$item->icon);
        $item->delete();
        // Alert::success('Success Title', 'Success Message');

        return back();
    }

    public function deletebantuan(Bantuan $item)
    {
        $item->delete();

        return back();
    }

    public function bantuan(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'bencana_id' =>['required', 'int', 'max:20'],
            'user_id' => ['required','int'],
            'element_id' => ['required','int'],
            'kuantitas' => ['required','int'],
        ]);
        
    
        // Input Data ke Database
        Bantuan::create([
            'bencana_id' => request('id_bencana'),
            'user_id' =>  request('id_instansi'),
            'element_id' =>  request('id_element'),
            'kuantitas' =>  request('kuantitas')
        ]);

        //Redirect
        return redirect()->back();
    }

}
