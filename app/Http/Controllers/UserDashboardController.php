<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class UserDashboardController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {   
        $orders = Order::where('email',auth()->user()->email)->latest()->get();
        return view('frontend.account.index',compact('orders'));
    }
}
