<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="Description" content="Enter your description here" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <link rel="stylesheet" href="{{asset('newtheme/completeorder/style.css')}}" />
        <title>{{config('app.name')}}</title>
    </head>
    <body>
        <div class="container" >
            <div class="confirmation-wraper">
                <div class="row align-items-center">
                    <div class="col-md-6 left-side">
                        <div class="row align-items-center">
                            <i class="fas fa-check"></i>
                            <div class="gretings">
                                <p>Order CZ-{{$order->id}}</p>
                                <h3>Thank you, {{$order->first_name . ' '.$order->last_name}}</h3>
                            </div>
                        </div>
                        <div class="single-box">
                            <h4>Your order is confirmed</h4>
                            <p>We’ve accepted your order, and we’re getting it ready.</p>
                            
                        </div>
                        <div class="single-box">
                            <h4>Order details</h4>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <p class="title">Contact information</p>
                                    <p class="code">{{$order->email}}</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <p class="title">contact number</p>
                                    <p class="code">{{$order->phone_no}}</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <p class="title">Shipping information</p>
                                    <p class="code">{{$order->address}}</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <p class="title">Apartment no</p>
                                    <p class="code">{{$order->apartment_no}}</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <p class="title">City</p>
                                    <p class="code">{{$order->city}}</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <p class="title">Country</p>
                                    <p class="code">{{$order->country}}</p>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <p class="title">Order Note</p>
                                    <p class="code">{{$order->order_note}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 right-side">
                        @forelse($order->products as $product)
                        <div class="products mb-4">
                                <div class="image" style="width:fit-content">
                                    <p class="quantity">{{$product->pivot->quantity}}</p>
                                    <a href="{{route('allproducts.show',[$product->slug])}}">
                                    <img src="{{$product->images[0]->url}}" alt="">
                                    </a>
                                </div>
                                <p class="des">{{$product->title}}</p>
                                <p class="price">{{config('app.currency')}}{{$product->pivot->price}}</p>
                        </div>
                        @empty
                        @endforelse
                        <hr>
                        <div class="row mb-3">
                            <div class="col-6"><h5 class="total-title">Subtotal</h5></div>
                            <div class="col-6 text-right"><h5>{{config('app.currency')}}{{$order->subtotal}}</h5></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6"><h5 class="total-title">discount</h5></div>
                            <div class="col-6 text-right"><h5>-({{config('app.currency')}}{{$order->discount}})</h5></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6"><h5 class="total-title">Shipping</h5></div>
                            <div class="col-6 text-right"><h5>{{config('app.currency')}}{{config('setting.shipping')}}</h5></div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col-6"><h5 class="total-title">Total</h5></div>
                            <div class="col-6 text-right"><h3>{{config('app.currency')}} {{$order->grand_total}}</h3></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
