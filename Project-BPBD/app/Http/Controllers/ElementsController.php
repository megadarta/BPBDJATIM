<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Element;

class ElementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_elemen = Element::all();
        return view('dashboard-admin/dataelemen',compact('data_elemen'));
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

        return back();
    }
}
