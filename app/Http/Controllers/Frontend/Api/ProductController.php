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
        $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->latest()->get();
        if(request()->has('subcategory_id') && $request->subcategory_id != 'null'){

            $products = Product::query()
                            ->where('sub_category_id',request()->get('subcategory_id'))->has('images')->with(['images','subcategory'])->latest()->get();
        }
        return response()->json(['products'=>$products],200);
    }
}
