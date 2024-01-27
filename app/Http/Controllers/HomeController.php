<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\{
    Product,
    Slider
};

class HomeController extends Controller
{
    /*
    home page
    */
    public function index()
    {   
        $popular_products = Product::has('images')->with('images')->where('popular',1)->latest()->limit(20)->get();

        $trending_products = Product::has('images')->with('images')->where('trending',1)->latest()->limit(6)->get();

        $topthree_products = Product::has('images')->with('images')->inRandomOrder()->limit(3)->get();
        $latest_products = Product::has('images')->with('images')->latest()->get();

        $slides = Slider::get();

        return view('frontend.home',compact('popular_products','trending_products','topthree_products','slides','latest_products'));
    }

    public function destroy(Request $request)
    {
        // dd('hello');
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/new');
    }
    
}
