<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;

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
    /**
     * check coupon valid or not
     * 
     * 
     * @params Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function applyCoupon(Request $request)
    {
        $check = Coupon::where('title',$request->coupon_code)->first();
        if(isset($check))
        {
            $discount = number_format((int)$request->cart_total * $check->percentage / 100, 2);
            $newcart_total = (int)$request->cart_total - $discount;
            $newcart_total = number_format($newcart_total,2); 

            $request->session()->put('newcart_total', $newcart_total);
            $request->session()->put('newcart_discount', $discount);
            
            return response()->json(['success'=>true,'newcart_total'=>$newcart_total , 'discount'=>$discount]);
        }else
        {
            $newcart_total = $request->cart_total; 
            $request->session()->put('newcart_total', $newcart_total);
        }
    }

}
