<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SlugController;
use App\Models\AboutUs;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AboutUs::first();
        return view('admin.pages.about-management.create',
            [
                'data' => $data
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
        $this->validate($request, [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'details' => 'required|string',
        ]);

        try {
            $data = AboutUs::first();

            $slug = app('App\Http\Controllers\Admin\SlugController')->making_slug('about-us');

            $image = empty($data) ? '' : $data->image;
            if(request()->hasFile('image') ){
                $to_store_name = $slug; //give a unique name that will be the stored file name
                $file = $request->file('image'); // orginal file
                $to_store_folder_path = 'about-us'; //path to store the file
                $type = empty($data) ? 'store' : 'update'; //store or update
                $old_file_path = empty($data) ? '' : $data->image; // old_file_path woulb be null or request variable
    
                $image = app('App\Http\Controllers\Admin\ImageController')->image($to_store_name, $file, $to_store_folder_path, $type, $old_file_path); 
                //declare controller top like use App\Http\Controllers\ImageController;
    
                $image = $image;
            }

            $data = empty($data) ? new AboutUs : AboutUs::first();
            $data->image = $image;
            $data->details = $request->details;
            $data->save();

            if ($data) {
                return redirect()->back()->with('success', 'Data '.(empty($data) ? 'Inserted' : 'Updated').' successfully');
            }else{
                return redirect()->back()->with('error','Upps!! Something Error.');
            }
        }catch (\Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with('error',$e->getMessage());
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
        //
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
        //
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
}
