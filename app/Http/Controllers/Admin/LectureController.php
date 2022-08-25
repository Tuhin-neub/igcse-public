<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SlugController;
use App\Models\Chapter;
use App\Models\Lecture;
use App\Models\PPTSlider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use COM;
use Illuminate\Support\Facades\Storage;
use File;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        if ($type == 'all') {
            $datas = Lecture::with('chapter')->get();
        }else if($type == 'active'){
            $datas = Lecture::where('status', 1)->with('chapter')->get();
        }else {
            $datas = Lecture::where('status', 0)->with('chapter')->get();
        }
        
        return view('admin.pages.lecture-management.index',
            [
                'datas' => $datas
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
        // $sourcePath=public_path('images/test.png');
        // $storageDestinationPath='storage/movedimages/test.png';

        // $storageDestinationPath='storage/slider--2-1661330533/';

        // // Storage::disk('public')->makeDirectory('slider--2-1661330533');//make directory
        // $dirFiles = File::files('slider--2-1661330533');
        // foreach ($dirFiles as $dirFile) {
        //     $filename = basename($dirFile);
        //     $sourcePath=public_path('slider--2-1661330533/'.$filename);
        //     File::move($sourcePath,$storageDestinationPath.$filename);
        // }



        // return "Folder moved successfully";
        
        return view('admin.pages.lecture-management.create',
            [
                'chapters' => Chapter::where('status', 1)->get()
            ]
        );
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
            'file' => 'required',
            'chapter' => 'required|max:255|string',
            'title' => 'required|max:255|string',
            'cover_type' => 'required',
            'description' => 'required|string',
        ]);

        try {

            $slug = app('App\Http\Controllers\Admin\SlugController')->making_slug($request->title);
            $file = '';
            if ($request->cover_type == 1) {
                $file = $request->file;
            } 
            elseif($request->cover_type == 2){
                if(request()->hasFile('file') ){
                    $to_store_name = $slug; //give a unique name that will be the stored file name
                    $file = $request->file('file'); // orginal file
                    $to_store_folder_path = 'lecture-cover'; //path to store the file
                    $type = 'store'; //store or update
                    $old_file_path = ''; // old_file_path woulb be null or request variable
        
                    $image = app('App\Http\Controllers\Admin\ImageController')->image($to_store_name, $file, $to_store_folder_path, $type, $old_file_path); 
                    //declare controller top like use App\Http\Controllers\ImageController;
        
                    $file = $image;
                }
            }else {
                $ppApp = new COM("PowerPoint.Application");
                $ppApp->Visible = True;

                $strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp

                $ppName = $request->file('file');
                $FileName = $slug;;
                
                //*** Open Document ***//
                $ppApp->Presentations->Open(realpath($ppName));

                //*** Save Document ***//
                // $ppApp->ActivePresentation->SaveAs($strPath."/".$FileName,17);  //'*** 18=PNG, 19=BMP **'
                $ppApp->ActivePresentation->SaveAs($strPath."/".$FileName,17);  //'*** 18=PNG, 19=BMP **'
                //$ppApp->ActivePresentation->SaveAs(realpath($FileName),17);

                $ppApp->Quit;
                $ppApp = null;

                $file = $FileName;
                
            }

            $data = New Lecture;
            $data->file = $file;
            $data->chapter_id = $request->chapter;
            $data->title = $request->title;
            $data->cover_type = $request->cover_type;
            $data->description = $request->description;
            $data->slug = $slug;
            $data->save();

            if ($request->cover_type == 3) {
                $imagecount = count(glob($FileName."/*.JPG"));
    
                for ($i=1; $i <= $imagecount; $i++) { 
                    $file = $FileName.'/Slide'.$i.'.JPG'; // orginal file
                    $to_store_folder_path = $FileName; //path to store the file
        
        
                    // $file = $image;
                    $ppt_slider = New PPTSlider;
                    $ppt_slider->lecture_id = $data->id;
                    $ppt_slider->file = $file;
                    $ppt_slider->save();
                }

                //move folder
                $storageDestinationPath='storage/'.$FileName.'/';

                Storage::disk('public')->makeDirectory($FileName);//make directory
                $dirFiles = File::files($FileName);
                foreach ($dirFiles as $dirFile) {
                    $filename = basename($dirFile);
                    $sourcePath=public_path($FileName.'/'.$filename);
                    File::move($sourcePath,$storageDestinationPath.$filename);
                }

                File::deleteDirectory(public_path($FileName));


            }

            if ($data) {
                return redirect()->back()->with('success', 'Data Inserted successfully');
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
        return view('admin.pages.lecture-management.edit',
            [
                'data' => Lecture::find($id),
                'chapters' => Chapter::where('status', 1)->get()
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
        $this->validate($request, [
            'file' => $request->cover_type == 1 ? 'required|max:255|string' : 'nullable',
            'chapter' => 'required|max:255|string',
            'title' => 'required|max:255|string',
            'cover_type' => 'required',
            'description' => 'required|string',
        ]);
        
        try {
            
            $old_data = Lecture::find($id);

            $slug = app('App\Http\Controllers\Admin\SlugController')->making_slug($request->title);

            $file = $request->old_file;
            if ($request->cover_type == 1) {
    
                $file = $request->file;
            } 
            elseif($request->cover_type == 2){
                
                if(request()->hasFile('file') ){
                    $to_store_name = $slug; //give a unique name that will be the stored file name
                    $file = $request->file('file'); // orginal file
                    $to_store_folder_path = 'lecture-cover'; //path to store the file
                    $type = $old_data->cover_type == 2 ? 'update' : 'store'; //store or update
                    $old_file_path = $old_data->cover_type == 2 ? $request->old_file : ''; // old_file_path woulb be null or request variable
        
                    $image = app('App\Http\Controllers\Admin\ImageController')->image($to_store_name, $file, $to_store_folder_path, $type, $old_file_path); 
                    //declare controller top like use App\Http\Controllers\ImageController;
        
                    $file = $image;
                }
            }else {
                
                if(request()->hasFile('file')){
                    $ppApp = new COM("PowerPoint.Application");
                    $ppApp->Visible = True;
    
                    $strPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"]))); // C:/AppServ/www/myphp
    
                    $ppName = $request->file('file');
                    $FileName = $slug;;
                    
                    //*** Open Document ***//
                    $ppApp->Presentations->Open(realpath($ppName));
    
                    //*** Save Document ***//
                    // $ppApp->ActivePresentation->SaveAs($strPath."/".$FileName,17);  //'*** 18=PNG, 19=BMP **'
                    $ppApp->ActivePresentation->SaveAs($strPath."/".$FileName,17);  //'*** 18=PNG, 19=BMP **'
                    //$ppApp->ActivePresentation->SaveAs(realpath($FileName),17);
    
                    $ppApp->Quit;
                    $ppApp = null;
    
                    $file = $FileName;
                }
            }

            $data = Lecture::find($id);
            if ($request->cover_type == 3 && request()->hasFile('file')) {
                File::deleteDirectory('storage/'.$data->file);
                PPTSlider::where('lecture_id', $data->id)->delete();
            }
            if ($data->cover_type == 3 && ($request->cover_type == 1 || $request->cover_type == 2)) {
                File::deleteDirectory('storage/'.$data->file);
                PPTSlider::where('lecture_id', $data->id)->delete();
            }
            $data->slug = $data->title == $request->title ? $data->slug : $slug;
            $data->file = $file;
            $data->chapter_id = $request->chapter;
            $data->title = $request->title;
            $data->cover_type = $request->cover_type;
            $data->description = $request->description;
            $data->save();

            if ($request->cover_type == 3 && request()->hasFile('file')) {

                $imagecount = count(glob($FileName."/*.JPG"));
    
                for ($i=1; $i <= $imagecount; $i++) { 
                    $file = $FileName.'/Slide'.$i.'.JPG'; // orginal file
                    $to_store_folder_path = $FileName; //path to store the file
        
        
                    // $file = $image;
                    $ppt_slider = New PPTSlider;
                    $ppt_slider->lecture_id = $data->id;
                    $ppt_slider->file = $file;
                    $ppt_slider->save();
                }

                //move folder
                $storageDestinationPath='storage/'.$FileName.'/';

                Storage::disk('public')->makeDirectory($FileName);//make directory
                $dirFiles = File::files($FileName);
                foreach ($dirFiles as $dirFile) {
                    $filename = basename($dirFile);
                    $sourcePath=public_path($FileName.'/'.$filename);
                    File::move($sourcePath,$storageDestinationPath.$filename);
                }

                File::deleteDirectory(public_path($FileName));

            }

            if ($data) {
                return redirect()->back()->with('success', 'Data Updated successfully');
            }else{
                return redirect()->back()->with('error','Upps!! Something Error.');
            }
        }catch (\Exception $e) {
            // return $e->getMessage();
            return redirect()->back()->with('error',$e->getMessage());
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
}
