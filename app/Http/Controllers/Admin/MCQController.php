<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SlugController;
use App\Models\Lecture;
use App\Models\MCQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MCQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        if ($type == 'all') {
            $datas = MCQ::with('lecture')->get();
        }else if($type == 'active'){
            $datas = MCQ::where('status', 1)->with('lecture')->get();
        }else {
            $datas = MCQ::where('status', 0)->with('lecture')->get();
        }
        
        return view('admin.pages.mcq-management.index',
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
        return view('admin.pages.mcq-management.create',
            [
                'lectures' => Lecture::where('status', 1)->get()
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
        // return $request->all();
        $this->validate($request, [
            'lecture' => 'required',
            'question' => 'required',
            'options' => 'required',
            'answer' => 'required',
        ]);
        $options = implode(', ', $request->options);

        try {

            $data = New MCQ;
            $data->lecture_id = $request->lecture;
            $data->question = $request->question;
            $data->options = $options;
            $data->answer = $request->answer;
            $data->save();

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
        return view('admin.pages.mcq-management.edit',
            [
                'lectures' => Lecture::where('status', 1)->get(),
                'data' => MCQ::with('lecture')->find($id),
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
        // return $request->all();
        $this->validate($request, [
            'lecture' => 'required',
            'question' => 'required',
            'options' => 'required',
            'answer' => 'required',
        ]);
        $options = implode(', ', $request->options);

        try {

            $data = MCQ::find($id);
            $data->lecture_id = $request->lecture;
            $data->question = $request->question;
            $data->options = $options;
            $data->answer = $request->answer;
            $data->save();

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

    public function status_change($id)
    {
        $row = MCQ::find($id);
        if ($row->status == 1) {
            $row->status = 0;
        }elseif ($row->status == 0) {
            $row->status = 1;
        }
        $row->save();
        return redirect()->back()->with('success', 'Data Updated successfully!');
    }
}
