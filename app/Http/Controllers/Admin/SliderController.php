<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Slider;

// use Image;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.website-management.slider.index',
            [
                'datas' => Slider::all(),
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $validated = $request->validate([
            // 'image'=>'required|file|image|dimensions:max_width=300,max_height=250',
            'slider_image'=>'required|file|image',
        ]);

        $image = "";
        if(request()->hasFile('slider_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('slider_image')->getClientOriginalName();
            $filenameWithExt = str_replace(' ', '', $filenameWithExt);

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            // Filename to store
            $image= 'slider-images/'.$filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('slider_image')->storeAs('public', $image);
            // $resize = Image::make('storage/'.$image)->resize(360,200);
            // $resize->save();
        }

        $data = new Slider;
        $data->slider_image = $image;
        $data->save();

        $datas = Slider::latest()->get();
        if ($datas) {
            return redirect()->back()
                    ->with('datas', $datas)
                    ->with('success','Data Inserted Successfully');
    	}else{
    		return redirect()->back()->with('error','Upps!! Something Error.');
    	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.pages.website-management.slider.edit',
            [
                'item' => Slider::find($id),
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            // 'image'=>'required|file|image|dimensions:max_width=300,max_height=250',
            'slider_image'=>'required|file|image',
        ]);

        $image = $request->old_img;
        if(request()->hasFile('slider_image')){

            if($request->old_img){
                if(File::exists('storage/'.$request->old_img)) {
                    unlink('storage/'.$request->old_img);
                }
            }

            // Get filename with the extension
            $filenameWithExt = $request->file('slider_image')->getClientOriginalName();
            $filenameWithExt = str_replace(' ', '', $filenameWithExt);

            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            // Filename to store
            $image= 'slider-images/'.$filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('slider_image')->storeAs('public', $image);
            // $resize = Image::make('storage/'.$image)->resize(360,200);
            // $resize->save();
        }

        $data = Slider::find($id);
        $data->slider_image = $image;
        $data->save();

        $datas = Slider::latest()->get();
        if ($datas) {
            return redirect()->back()
                    ->with('datas', $datas)
                    ->with('success','Data Inserted Successfully');
    	}else{
    		return redirect()->back()->with('error','Upps!! Something Error.');
    	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function inactive($id)
    {

        $data = Slider::where('id', $id)->update(
            [
                'status' => 0,
            ]
        );

        if ($data) {
    		return redirect()->back()->with('success','Status Update Successfully');
    		// return redirect()->back()->with($notification);
    	}else{
    		return redirect()->back()->with('error','Upps!! Something Error.');
    	}
    }

    public function active($id)
    {
        
        $data = Slider::where('id', $id)->update(
            [
                'status' => 1,
            ]
        );

        if ($data) {
    		return redirect()->back()->with('success','Status Update Successfully');
    		// return redirect()->back()->with($notification);
    	}else{
    		return redirect()->back()->with('error','Upps!! Something Error.');
    	}
    }
}
