<?php

namespace App\Http\Controllers;

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

        $slides = Slider::get();

        return view('frontend.home',compact('popular_products','trending_products','topthree_products','slides'));
    }
    
}
