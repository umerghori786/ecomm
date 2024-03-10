<?php

namespace App\Http\Controllers;
use App\Models\{
    Privacy,
    Question,
    Contact,
    Slider,
    Subscriber
};
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function termPolicy(){
        $term = Privacy::first();
        return view('frontend.termpolicy.index',compact('term'));
    }

    public function questions(){
        $que = Question::get();
        return view('frontend.questions.index',compact('que'));
    }
    public function contacts(){
        $contact = Contact::get();
        return view('frontend.contact.index',compact('contact'));
    }

    public function slide(){
        $slide = Slider::get();
        return view('frontend.home',compact('slide'));
    }
    public function subscribe(Request $request)
    {
        Subscriber::create(['email'=>$request->email]);

        return response()->json();
    }
}
