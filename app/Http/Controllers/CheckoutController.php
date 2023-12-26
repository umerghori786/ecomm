<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Omnipay\Omnipay;
use App\Models\Order;

class CheckoutController extends Controller
{
    public $gateway;
    
    public function __construct()
    {
        $this->gateway = Omnipay::create('Stripe\PaymentIntents');
        $this->gateway->setApiKey('sk_tes_123');
    }
    
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

    /**
     * 
     * checkout payment
     * 
     * */
    public function stripeCheckoutCharge(Request $request)
    {   
        $request->session()->put('reqeustData',$request->all());
        $charged_price = request()->session()->get('charged_price');
        if($request->input('stripeToken'))
        {
            $token = $request->input('stripeToken');
            $currency = 'eur';
            $amount = $charged_price;
    
            $response = $this->gateway->authorize([
                'amount' => $amount,
                'currency' => $currency,
                'description' => "new oreder recieved by {$request->email}",
                'token' => $token,
                'returnUrl' => route('stripeCheckoutConfirm',['cart_amount'=>$amount]),
                'confirm' => true,
            ])->send();
            
            if($response->isSuccessful())
            {
                $response = $this->gateway->capture([
                    'amount' => $amount,
                    'currency' => $currency,
                    'paymentIntentReference' => $response->getPaymentIntentReference(),
                ])->send();
                
                $arr_payment_data = $response->getData();

                $this->storeOrder($amount, $request->session()->get('reqeustData'));
                dd('payment done');
                 
    
                
            }
            elseif($response->isRedirect())
            {
                
                $response->redirect();
            }
            else
            {
                return redirect()->back()->with('message', 'error');
            
        }
    }
    }
    
    public function stripeCheckoutConfirm(Request $request)
    {
        $response = $this->gateway->confirm([
            'paymentIntentReference' => $request->input('payment_intent')
            
        ])->send();
        $currency = 'eur'; 
        if($response->isSuccessful())
        {   
            $response = $this->gateway->capture([
                'amount' => $request->cart_amount,
                'currency' => $currency,
                'paymentIntentReference' => $request->input('payment_intent'),
            ])->send();
    
            $arr_payment_data = $response->getData();
            $email = $arr_payment_data['description'];
            $this->storeOrder($request->cart_amount, $request->session()->get('reqeustData'));
    
            dd('3d done');
         
        }
        else
        {
            return redirect()->back()->with('message', 'error');
        }
    }

    /**
     * store order
     * 
     */
    public function storeOrder($amount , $request)
    {
        $cart_products = collect(request()->session()->get('cart'));
        $order = Order::create($request);
        $order->update(['grand_total'=>$amount]);

        //order product store
        foreach ($cart_products as $id => $product) {
            
            $order->products()->attach([$id],['quantity'=>$product['quantity'],'price'=>$product['discount_price']]);
        }
        
    }

}
