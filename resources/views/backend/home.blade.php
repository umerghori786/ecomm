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
                                    <a href="#" class="single_quick_activity">
                                        <div class="count_content">
                                            <h3><span class="counter">{{$count_category}}</span></h3>
                                            <p>Category</p>
                                        </div>
                                    </a>
                                    <a href="#" class="single_quick_activity">
                                        <div class="count_content">
                                            <h3><span class="counter">{{$count_sub_category}}</span></h3>
                                            <p>Sub Category</p>
                                        </div>
                                    </a>
                                    <a href="#" class="single_quick_activity">
                                        <div class="count_content">
                                            <h3><span class="counter">{{$product_count}}</span></h3>
                                            <p>Products</p>
                                        </div>
                                    </a>

                                    <a href="#" class="single_quick_activity">
                                        <div class="count_content">
                                            <h3><span class="counter">{{$count_contactus}}</span></h3>
                                            <p>Messages</p>
                                        </div>
                                    </a>

                                    <a href="#" class="single_quick_activity">
                                        <div class="count_content">
                                            <h3><span class="counter">{{$count_reviews}}</span></h3>
                                            <p>Product Reviews</p>
                                        </div>
                                    </a>

                                    <a href="#" class="single_quick_activity">
                                        <div class="count_content">
                                            <h3><span class="counter">{{$count_orders}}</span></h3>
                                            <p>New Orders</p>
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
                                    <h3>{{config('app.currency')}} <span class="counter">{{$today_income}}</span></h3>
                                    <p>Today's Income</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="count_content">
                                    <h3>{{config('app.currency')}} <span class="counter">{{$monthly_income}}</span></h3>
                                    <p>This Month's Income</p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="count_content">
                                    <h3>{{config('app.currency')}} <span class="counter">{{$total_income}}</span></h3>
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
