<?php

namespace App\Http\Controllers;
use App\Models\{
    Privacy,
    Question,
    Contact
};
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function termPolicy(){
        $term = Privacy::first();
        return view('frontend.policy.index',compact('term'));
    }

    public function question(){
        $que = Question::get();
        return view('frontend.question.index',compact('que'));
    }
    public function contact(){
        $contact = Contact::get();
        // dd($contact);
        return view('frontend.contact.index',compact('contact'));
    }
}
