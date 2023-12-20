<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    SubCategory,
    Category,
    ContactUs,
    Review
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
        return view('backend.home',compact('count_category','count_sub_category','count_contactus','count_reviews'));
    }
}
