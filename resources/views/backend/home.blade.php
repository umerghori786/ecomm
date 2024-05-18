@extends('backend.layout') @section('content')
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="single_element">
                    <div class="quick_activity">
                        <div class="row">
                            <div class="col-12">
                                <div class="quick_activity_wrap">
                                    <a href="{{route('order.index')}}" class="single_quick_activity bg-danger">
                                        <div class="count_content">
                                            <h3><span class=" text-white">{{$count_orders}}</span></h3>
                                            <p class="text-white">New Orders</p>
                                        </div>
                                    </a>
                                    <a href="{{route('categories.index')}}" class="single_quick_activity bg-primary">
                                        <div class="count_content">
                                            <h3><span class=" text-white text-white">{{$count_category}}</span></h3>
                                            <p class="text-white">Category</p>
                                        </div>
                                    </a>
                                    <a href="{{route('subcategories.index')}}" class="single_quick_activity bg-secondary">
                                        <div class="count_content">
                                            <h3><span  class=" text-white">{{$count_sub_category}}</span></h3>
                                            <p class="text-white">Sub Category</p>
                                        </div>
                                    </a>
                                    <a href="{{route('colors.index')}}" class="single_quick_activity bg-secondary">
                                        <div class="count_content">
                                            <h3><span  class=" text-white">{{$color_count}}</span></h3>
                                            <p class="text-white">Colors</p>
                                        </div>
                                    </a>
                                    <a href="{{route('products.index')}}" class="single_quick_activity bg-warning">
                                        <div class="count_content">
                                            <h3><span class=" text-white">{{$product_count}}</span></h3>
                                            <p class="text-white">Products</p>
                                        </div>
                                    </a>

                                    <a href="{{route('message.index')}}" class="single_quick_activity bg-success">
                                        <div class="count_content">
                                            <h3><span class=" text-white">{{$count_contactus}}</span></h3>
                                            <p class="text-white">Messages</p>
                                        </div>
                                    </a>

                                    <a href="{{route('reviews.index')}}" class="single_quick_activity bg-danger">
                                        <div class="count_content">
                                            <h3><span class=" text-white">{{$count_reviews}}</span></h3>
                                            <p class="text-white">Product Reviews</p>
                                        </div>
                                    </a>
                                    <a href="{{route('coupon.index')}}" class="single_quick_activity bg-warning">
                                        <div class="count_content">
                                            <h3><span class=" text-white">{{$coupon_count}}</span></h3>
                                            <p class="text-white">Coupon</p>
                                        </div>
                                    </a>
                                    <a href="{{route('admin.subscribers')}}" class="single_quick_activity bg-secondary">
                                        <div class="count_content">
                                            <h3><span  class=" text-white">{{$subs_count}}</span></h3>
                                            <p class="text-white">Subscribers</p>
                                        </div>
                                    </a>
                                    <a href="{{route('slider.index')}}" class="single_quick_activity bg-primary">
                                        <div class="count_content">
                                            <h3><span class=" text-white text-white">{{$count_slider}}</span></h3>
                                            <p class="text-white">Slider</p>
                                        </div>
                                    </a>
                                    <a href="{{route('logos.index')}}" class="single_quick_activity bg-success">
                                        <div class="count_content">
                                            <h3><span class=" text-white">{{$count_logo}}</span></h3>
                                            <p class="text-white">Logo</p>
                                        </div>
                                    </a>
                                    <a href="{{route('admin.getGeneralSettings')}}" class="single_quick_activity bg-danger">
                                        <div class="count_content">
                                            <h3><span class=" text-white">1</span></h3>
                                            <p class="text-white">General Setting</p>
                                        </div>
                                    </a>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-12">
                <div class="white_box mb_30">
                    <div class="box_header border_bottom_1px">
                        <div class="main-title">
                            <h3 class="mb_25">Store Survey</h3>
                        </div>
                    </div>
                    <div class="income_servay">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="count_content">
                                    <h3>{{config('app.currency')}} <span class="">{{$today_income}}</span></h3>
                                    <p>Today's Income</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="count_content">
                                    <h3>{{config('app.currency')}} <span class="">{{$monthly_income}}</span></h3>
                                    <p>This Month's Income</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="count_content">
                                    <h3>{{config('app.currency')}} <span class="">{{$total_income}}</span></h3>
                                    <p>Total Income</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endsection
        </div>
    </div>
</div>
