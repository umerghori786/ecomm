<?php

namespace App\Http\Controllers\Frontend\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {   

        match(request()->type){
            'trending'   => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->where('trending',1)->latest()->get(),
            'highToLow'  => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->orderBy('discount_price','Desc')->get(),
            'lowToHigh'  => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->orderBy('discount_price','asc')->get(),
            default      => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->latest()->get(),                
        };
        
        if(request()->has('subcategory_id') && $request->subcategory_id != 'null'){

            $products = Product::query()
                            ->where('sub_category_id',request()->get('subcategory_id'))->has('images')->with(['images','subcategory'])->latest()->get();
        }
        if(request()->has('subcategory_id') && $request->subcategory_id != 'null' && isset($request->type)){

            match(request()->type){
            'trending'   => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->where('sub_category_id',request()->get('subcategory_id'))->where('trending',1)->latest()->get(),
            'highToLow'  => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->where('sub_category_id',request()->get('subcategory_id'))->orderBy('discount_price','Desc')->get(),
            'lowToHigh'  => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->where('sub_category_id',request()->get('subcategory_id'))->orderBy('discount_price','asc')->get(),
            default      => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->where('sub_category_id',request()->get('subcategory_id'))->latest()->get(),
        };
    }
        return response()->json(['products'=>$products],200);
    }
}
