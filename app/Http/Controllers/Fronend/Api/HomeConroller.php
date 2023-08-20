<?php

namespace App\Http\Controllers\Fronend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeConroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $popular_products = Product::has('images')->with('images')->where('popular',1)->latest()->limit(15)->get();
        $trending_products = Product::has('images')->with('images')->where('trending',1)->latest()->limit(6)->get();
        return response()->json(['popular_products'=>$popular_products,'trending_products'=>$trending_products],200);
    }
}
