<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        match(request()->type){
            'trending'   => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->where('trending',1)->latest()->paginate(40),
            'highToLow'  => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->orderBy('discount_price','Desc')->paginate(40),
            'lowToHigh'  => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->orderBy('discount_price','asc')->paginate(40),
            default      => $products = Product::query()
                            ->has('images')->with(['images','subcategory'])->latest()->paginate(40),                
        };  
        if(request()->subcategory_id){

            $products = Product::query()
                            ->where('sub_category_id',request()->get('subcategory_id'))->has('images')->with(['images','subcategory'])->latest()->paginate(40);
        }
        /*if request has subscategory_id and type*/
        if(request()->subcategory_id && request()->type){

                match(request()->type){
                'trending'   => $products = Product::query()
                                ->has('images')->where('sub_category_id',request()->get('subcategory_id'))->with(['images','subcategory'])->where('trending',1)->latest()->paginate(40),
                'highToLow'  => $products = Product::query()
                                ->has('images')->where('sub_category_id',request()->get('subcategory_id'))->with(['images','subcategory'])->orderBy('discount_price','Desc')->paginate(40),
                'lowToHigh'  => $products = Product::query()
                                ->has('images')->where('sub_category_id',request()->get('subcategory_id'))->with(['images','subcategory'])->orderBy('discount_price','asc')->paginate(40),
                default      => $products = Product::query()
                                ->has('images')->where('sub_category_id',request()->get('subcategory_id'))->with(['images','subcategory'])->latest()->paginate(40),                
            };  
        }

        /*===================================================================================*/    
        if(request()->category_id){

            $products = Product::query()
                            ->whereHas('subcategory.category',function($q){
                                $q->where('id',request()->category_id);
                            })
                            ->has('images')->with(['images','subcategory'])->latest()->paginate(40);
        }
        /*if request has category_id and type*/
        if(request()->category_id && request()->type){
                match(request()->type){
                'trending'   => $products = Product::query()
                                ->whereHas('subcategory.category',function($q){
                                    $q->where('id',request()->category_id);
                                })
                                ->has('images')->with(['images','subcategory'])->where('trending',1)->latest()->paginate(40),
                'highToLow'  => $products = Product::query()
                                 ->whereHas('subcategory.category',function($q){
                                     $q->where('id',request()->category_id);
                                 })   
                                ->has('images')->with(['images','subcategory'])->orderBy('discount_price','Desc')->paginate(40),
                'lowToHigh'  => $products = Product::query()
                                ->whereHas('subcategory.category',function($q){
                                    $q->where('id',request()->category_id);
                                })
                                ->has('images')->with(['images','subcategory'])->orderBy('discount_price','asc')->paginate(40),
                default      => $products = Product::query()
                                ->whereHas('subcategory.category',function($q){
                                    $q->where('id',request()->category_id);
                                })    
                                ->has('images')->with(['images','subcategory'])->latest()->paginate(40),                
            };  
        }

        /*===================================================================================*/    

        if(request()->has('search')){

            $products = Product::query()
                            ->where(function($query){
                                $query->where('title','LIKE','%'.request()->search.'%')->orWhere('short_description','LIKE','%'.request()->search.'%');

                            })->has('images')->with(['images','subcategory'])->latest()->paginate(40);
        }
        if(request()->has('to')){
            $products = Product::query()
                            ->where(function($query){
                                $query->whereBetween('discount_price', [request()->from ?? 0, request()->to]);

                            })->has('images')->with(['images','subcategory'])->latest()->paginate(40);
        }
        if(request()->has('to') && request()->subcategory_id){
            $products = Product::query()
                            ->where(function($query){
                                $query->whereBetween('discount_price', [request()->from ?? 0, request()->to]);

                            })->where('sub_category_id',request()->get('subcategory_id'))->has('images')->with(['images','subcategory'])->latest()->paginate(40);
        }
        if(request()->has('to') && request()->category_id){
            $products = Product::query()
                            ->where(function($query){
                                $query->whereBetween('discount_price', [request()->from ?? 0, request()->to]);

                            })
                            ->whereHas('subcategory.category',function($q){
                                    $q->where('id',request()->category_id);
                                })
                            ->has('images')->with(['images','subcategory'])->latest()->paginate(40);
        }


        $trending_products = Product::has('images')->with('images')->where('trending',1)->latest()->limit(6)->get();           
        return view('frontend.products.index',compact('products','trending_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       
        $product = Product::with(['images','subcategory.category','reviews'])->where('slug',$slug)->first();
        $similar_products = Product::query()
                            ->where('sub_category_id', $product->sub_category_id)->has('images')->with(['images','subcategory'])->latest()->get()->except([$product->slug]);
                            
        return view('frontend.products.product',compact('product','similar_products'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
