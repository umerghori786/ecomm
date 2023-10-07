<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    
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
        
        if (isset($cart[$product->id]) && isset($request->add_or_update_product) && $request->quantity > 0) {
            $cart[$product->id]['quantity'] = $request->quantity;
        }
        elseif(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "title" => $product->title,
                "quantity" => $request->quantity,
                "discount_price" => $product->discount_price,
                "strike_price" => $product->strike_price,
                "image" => $product->images[0]->url
            ];
        }
        
        $request->session()->put('cart', $cart);

        $cart_products = collect(request()->session()->get('cart'));
        $cart_total = 0;
        foreach ($cart_products as $key => $product) {
            
            $cart_total+= $product['quantity'] * $product['discount_price'];
        }

        $renderHTML = view('frontend.cart.mini-cart-render',compact('cart_products','cart_total'))->render();
        $total_products_count = count(request()->session()->get('cart'));
        return response()->json(['renderHTML'=>$renderHTML,'total_products_count'=>$total_products_count],200);
    }

    /**
     * Display the specified resource.
     *
     * 
     * 
     */
    public function showCart()
    {
        $cart_products = collect(request()->session()->get('cart'));

        $cart_total = 0;
        if(session('cart')){
            foreach ($cart_products as $key => $product) {
                
                $cart_total+= $product['quantity'] * $product['discount_price'];
            }
        }
        
        /*dd($cart_total);*/
        $products = Product::has('images')->with('images')->latest()->limit(10)->get();        
        $total_products_count = request()->session()->get('cart') ? count(request()->session()->get('cart')) : 0;
        return view('frontend.cart.cart',compact('products','cart_products','cart_total','total_products_count'));
        //return view('frontend.cart.mini-cart-render',compact('cart_products'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   

        if(isset($request->product_id) && isset($request->quantity))
        {
            $cart = $request->session()->get('cart');

            $cart[$request->product_id]['quantity'] = $request->quantity;
            $request->session()->put('cart', $cart);

            $update_amount_of_product = number_format($cart[$request->product_id]['quantity'] * $cart[$request->product_id]['discount_price'],2);

            $cart_products = collect(request()->session()->get('cart'));
            $cart_total = 0;
            if(session('cart')){
                foreach ($cart_products as $key => $product) {
                    
                    $cart_total+= $product['quantity'] * $product['discount_price'];
                }
            }

            return response()->json(['success'=>true,'update_amount_of_product'=>$update_amount_of_product,'cart_total'=>number_format($cart_total,2)]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->product_id;

        $cart = $request->session()->get('cart');
        if (isset($cart[$id])) {
            
            unset($cart[$id]);
        }
        $request->session()->put('cart',$cart);
        $cart_products = collect(request()->session()->get('cart'));
        $cart_total = 0;
        if(session('cart')){
            foreach ($cart_products as $key => $product) {
                
                $cart_total+= $product['quantity'] * $product['discount_price'];
            }
        }
        $cart_quantity = count($cart_products);
        return response()->json(['success'=>true,'cart_total'=>number_format($cart_total,2),'cart_quantity'=>$cart_quantity],200);
    }
}
