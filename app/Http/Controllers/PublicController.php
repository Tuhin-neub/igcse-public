<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Chapter;
use App\Models\AboutUs;
use App\Models\Lecture;
use App\Models\Contact_us;

class PublicController extends Controller
{
    public function welcome()
    {
        // dd(Chapter::select('id','title','slug', 'status')->where('status', 1)->get());
        // dd();
        return view('welcome',
            [
                'sliders' => Slider::where('status', 1)->get(),
                'chapters' => Chapter::latest()->where('status', 1)->get(),
                'about_us' => AboutUs::first(),
                'lectures' => Lecture::latest()->take(5)->with('ppt_images')->where('status', 1)->get(),
            ]
        );
    }

    public function about_us()
    {
        // dd(Chapter::select('id','title','slug', 'status')->where('status', 1)->get());
        // dd();
        return view('website.pages.about',
            [
                'about_us' => AboutUs::first(),
            ]
        );
    }

    public function contact()
    {
        // dd(Chapter::select('id','title','slug', 'status')->where('status', 1)->get());
        // dd();
        return view('website.pages.contact');
    }

    public function contact_us_submit(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:255|string',
            'email' => 'required|email|max:255|string',
            'subject' => 'required|max:255|string',
            'message' => 'required|max:500|string'
        ]);

        $data = New Contact_us;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->subject = $request->subject;
        $data->message = $request->message;
        $data->save();

        if ($data) {
            return redirect()->back()->with('success','Message Sent Successfully');
    	}else{
    		return redirect()->back()->with('error','Upps!! Something Error.');
    	}
    }
}
