<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        // dd('hello haseeb');
        return view('frontend.policy.index');
    }
}
