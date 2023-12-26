@extends('layout')

@section('content')

<main class="main__content_wrapper">

    

    <!-- Start checkout page area -->
    <div class="checkout__page--area section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="main checkout__mian">
                        <form method="post" action="{{route('stripeCheckoutCharge')}}" id="payment-form">
                                @csrf
                            <div class="checkout__content--step section__contact--information">
                                <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                    <h2 class="section__header--title h3">Contact information</h2>
                                    
                                </div>
                                <div class="customer__information">

                                    <div class="checkout__email--phone mb-12">
                                        <label class="checkout__input--label mb-5" for="input1">Email <span class="checkout__input--label__star">*</span></label>
                                        <input class="checkout__input--field border-radius-5" placeholder="Email" required type="email" name="email">
                                    </div>
                                    <div class="checkout__email--phone mb-12">
                                        <label class="checkout__input--label mb-5" for="input1">Phone Number <span class="checkout__input--label__star">*</span></label>
                                        <input class="checkout__input--field border-radius-5" placeholder="mobile phone number" required type="text" name="phone_no">
                                    </div>
                                </div>
                            </div>

                            <div class="checkout__content--step section__shipping--address">
                                <div class="section__header mb-25">
                                    <h2 class="section__header--title h3">Personal Details</h2>
                                </div>
                                <div class="section__shipping--address__content">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 mb-20">
                                            <div class="checkout__input--list ">
                                                <label class="checkout__input--label mb-5" for="input1">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" required name="first_name" id="input1"  type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input2">Last Name </label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Last name" id="input2" name="last_name"  type="text">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input4">Address <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Address1" required name="address" id="input4" type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)" name="apartment_no"  type="text">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input5">Town/City <span class="checkout__input--label__star">*</span></label>
                                                <input class="checkout__input--field border-radius-5" placeholder="City" id="input5" name="city" required type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input5">Country/Region <span class="checkout__input--label__star">*</span></label>
                                                
                                                <input class="checkout__input--field border-radius-5" placeholder="Country" id="input5" name="country" required type="text">
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <div class="checkout__input--list">
                                                <label class="checkout__input--label mb-5" for="input6">Postal Code </label>
                                                <input class="checkout__input--field border-radius-5" placeholder="Postal code" name="postal_code" id="input6" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="order-notes mb-20">
                                <label class="checkout__input--label mb-5" for="order">Order Notes </label>
                               <textarea class="checkout__notes--textarea__field border-radius-5" id="order" placeholder="Notes about your order, e.g. special notes for delivery." spellcheck="false" name="order_note"></textarea>
                            </div>
                            <div class="checkout__content--step__footer d-flex align-items-center">
                                <a class="continue__shipping--btn primary__btn border-radius-5" href="{{route('allproducts.index')}}">Continue To Shipping</a>
                                <a class="previous__link--content" href="{{url('/show-cart')}}">Return to cart</a>
                            </div>

                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <aside class="checkout__sidebar sidebar border-radius-10">
                        <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                        <div class="cart__table checkout__product--table">
                            <table class="cart__table--inner">
                                <tbody class="cart__table--body">
                                	@forelse($cart_products as $key => $cart)
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="product__image two  d-flex align-items-center">
                                                <div class="product__thumbnail border-radius-5">
                                                	<a href="product-details.html">
                                                    <img class="display-block border-radius-5" src="{{$cart['image']}}" alt="cart-product">
                                                    <span class="product__thumbnail--quantity">{{(int)$cart['quantity']}} x {{$cart['discount_price']}}</span>
                                                	</a>
                                                </div>
                                                <div class="product__description">
                                                    <h4 class="product__description--name"><a href="product-details.html">{{$cart['title']}}</a></h4>
                                                    <!--<span class="product__description--variant">COLOR: Blue</span>-->
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price">{{config('app.currency')}}{{number_format($cart['quantity'] * $cart['discount_price'] ?? 0 ,2)}}</span>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table> 
                        </div>
                        
                        <div class="checkout__total">
                            <table class="checkout__total--table">
                                <tbody class="checkout__total--body">
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Subtotal </td>
                                        <!--<td class="checkout__total--amount text-right">$860.00</td> -->
                                        <td class="cart__summary--amount checkout__total--amount text-right text-right update-cart-new-total">{{config('app.currency')}}{{number_format((float)$cart_total, 2, '.', '')}}</td>
                                    </tr>
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Shipping</td>

                                        <td class="checkout__total--calculated__text text-right">{{config('app.currency')}}0.00</td>


                                    </tr>
                                    
                                    <tr class="checkout__total--items">
                                        <td class="checkout__total--title text-left">Discount</td>

                                        <td class="checkout__total--calculated__text text-right">{{config('app.currency')}}<span class="coupon_valid_discount">({{session('newcart_discount') ? session('newcart_discount') : '0.00'}})</span></td>

                                        
                                    </tr>
                                </tbody>
                                <tfoot class="checkout__total--footer">
                                    <tr class="checkout__total--footer__items">
                                        <td class="checkout__total--footer__title checkout__total--footer__list text-left">Grand Total </td>
                                        <?php $grand_total = session('newcart_total') ? session('newcart_total') :  number_format((float)$cart_total, 2, '.', '');
                                        request()->session()->put('charged_price', $grand_total);
                                        ?>
                                        <td class="checkout__total--footer__amount checkout__total--footer__list text-right cart__summary--amount text-right update-cart-new-total ">{{config('app.currency')}}<span class="update-cart-new-grandtotal">{{$grand_total}}</span></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment__history mb-30">
                            <h3 class="payment__history--title mb-20">Payment</h3>
                            <ul class="payment__history--inner d-flex">
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Credit Card</button></li>
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Bank Transfer</button></li>
                                <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Paypal</button></li>
                            </ul>
                        </div>
                        <div>
                            
                            
                            <label for="" class="mt-3">Card details *</label>
                            <div class="row mt-3">
                                <div id="card-element" class="col" style="border: 1px solid #e7e2e2; padding: 10px; margin-left: 14px; margin-right: 10px;">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                               
                                <!-- Used to display form errors. -->
                                
                            </div>
                            <div class="mt-2" id="card-errors" role="alert"></div>
                            
                            
                            
                        </div>
                        <button class="checkout__now--btn primary__btn stripe_button" type="submit">Checkout Now</button>
                        </form>
                        <a href="{{ route('paypal.payment') }}" class="checkout__now--btn primary__btn stripe_button" type="submit">Checkout With Paypal</a>
                    </aside>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End checkout page area -->

    
</main>


<script type="text/javascript">
    @include('frontend.includes.stripe-script')
</script>

@endsection