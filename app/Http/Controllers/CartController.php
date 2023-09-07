<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {   

        $array = array();
        $array[1] = ['hola'];
        $array[2] = ['hola'];
        $array[3] = ['hola'];
        unset($array[3]);

        $product = Product::findOrFail($request->product_id);

        $cart = $request->session()->get('cart',[]);
        
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->title,
                "quantity" => 1,
                "price" => $product->discount_price,
                "image" => $product->images[0]->url
            ];
        }
        
        $request->session()->put('cart', $cart);
        
    }

    /**
     * Display the specified resource.
     *
     * 
     * 
     */
    public function showCart()
    {
        $data = request()->session()->get('cart');

        foreach ($data as $key => $value) {
            
            dd($key);
        }
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
