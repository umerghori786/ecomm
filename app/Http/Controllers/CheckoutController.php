<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * display the checkout page
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $cart_products = collect(request()->session()->get('cart'));

        $cart_total = 0;
        if(session('cart')){
            foreach ($cart_products as $key => $product) {
                
                $cart_total+= $product['quantity'] * $product['discount_price'];
            }
        }
        return view('frontend.checkout.index',compact('cart_products','cart_total'));
    }
}
