<?php

namespace App\Http\Controllers;
use App\Models\{
    Privacy,
    Question,
    Contact,
    Slider
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
        // dd($contact);
        return view('frontend.contacts.index',compact('contact'));
    }

    public function slide(){
        // dd(request()->all());
        $slide = Slider::get();
        // dd($slide);
        return view('frontend.home',compact('slide'));
    }
}
