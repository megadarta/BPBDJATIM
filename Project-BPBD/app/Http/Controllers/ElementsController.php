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
 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_elemen = Element::all();
        return view('dashboard-admin/dataelemen',compact('data_elemen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'nama_element' =>['required', 'string', 'max:255'],
            'icon' => ['required','image'],
        ]);
        
        // Cek Validasi
        if ($validated->fails()) {
            return back(); 
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
            return back();
        }
        
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Element $element
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Element $element)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Element $element
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Element $element)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Element $element
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Element $element
     * @return \Illuminate\Http\Response
     */
    public function delete(Element $item)
    {
        Storage::disk('public_image')->delete('icon/'.$item->icon);
        $item->delete();
        // Alert::success('Success Title', 'Success Message');

        return back();
    }
}
