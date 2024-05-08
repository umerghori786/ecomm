<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\{
    SubCategory,
    Category,
    ContactUs,
    Review,
    Order,
    Subscriber,
    Product,
    Color
};

class DashboardController extends Controller
{
    /*
    * show dashboard
    */

    public function index()
    {   
        $count_category = Category::count();
        $count_sub_category = SubCategory::count();
        $count_contactus = ContactUs::count();
        $count_reviews = Review::count();
        $count_orders = Order::where('status',0)->count();
        $product_count = Product::count();
        $color_count = Color::where('status',1)->count();

        /*income*/
        $today_income  = Order::whereDate('created_at', Carbon::today())->sum('grand_total');
        $monthly_income  = Order::whereBetween('created_at', 
                                [
                                    Carbon::now()->startOfMonth(), 
                                    Carbon::now()->endOfMonth()
                                ])->sum('grand_total');
        $total_income  = Order::sum('grand_total');
        /*end*/
        return view('backend.home',compact('count_category','count_sub_category','count_contactus','count_reviews','count_orders','today_income','total_income','monthly_income','product_count','color_count'));
    }
    public function subscribers()
    {
        $subscribers = Subscriber::latest()->get();

        return view('backend.subscribers.index',compact('subscribers'));
    }
}
