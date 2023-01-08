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
    
                if (!empty($data)) {
                    if(File::exists('storage/'.$data->image)) {
                        unlink('storage/'.$data->image);
                    }
                }

                // Get filename with the extension
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filenameWithExt = str_replace(' ', '', $filenameWithExt);
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('image')->getClientOriginalExtension();
                // Filename to store
                $image= 'about-us/'.$slug.'.'.$extension;
                // Upload Image
                $path = $request->file('image')->storeAs('public', $image);
                // $resize = Image::make('storage/'.$image)->resize(360,200);
                // $resize->save();
    
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
