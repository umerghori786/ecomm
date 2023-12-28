<?php
  
namespace App\Http\Controllers;
  
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use App\Models\Order;
  
class PayPalController extends Controller
{   
    public $order_id;


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('paypal');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function payment(Request $request)
    {   
        $request->session()->put('reqeustData',$request->all());
        $charged_price = request()->session()->get('charged_price');

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
  
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.payment.success',['amount'=>$charged_price]),
                "cancel_url" => route('paypal.payment/cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => config('setting.currencycode'),
                        "value" => $charged_price
                    ]
                ]
            ]
        ]);
  
        if (isset($response['id']) && $response['id'] != null) {
  
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
  
            return redirect()
                ->route('checkout')
                ->with('error', 'Something went wrong.');
  
        } else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentCancel()
    {
        return redirect()
              ->route('checkout')
              ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $this->storeOrder($request->amount, $request->session()->get('reqeustData'));

            $request->session()->put('cart',[]);
            $request->session()->put('newcart_discount',0);
            $request->session()->put('newcart_total',0);
            request()->session()->put('charged_price',0);
            
            return redirect()
                ->route('orderComplete',$this->order_id)
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
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
        $this->order_id = $order->id;


        $cart_total = 0;
        if(session('cart')){
            foreach ($cart_products as $key => $product) {
                
                $cart_total+= $product['quantity'] * $product['discount_price'];
            }
        }

        $order->update(['grand_total'=>$amount,'subtotal'=>$cart_total,'discount'=>session('newcart_discount') ?? 0]);

        //order product store
        foreach ($cart_products as $id => $product) {
            
            $order->products()->attach([$id],['quantity'=>$product['quantity'],'price'=>$product['discount_price']]);
        }
        
    }
}