@extends('layout')

@section('content')


<main class="main__content_wrapper">
    
    <!-- Start breadcrumb section -->
    <!--<section class="breadcrumb__section breadcrumb__bg">
        <div class="container-fluid">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Shopping Cart</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End breadcrumb section -->

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container-fluid">
            <div class="cart__section--inner">
                
                    <h2 class="cart__title mb-40">Shopping Cart</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart__table">
                                <table class="cart__table--inner">
                                    <thead class="cart__table--header">
                                        <tr class="cart__table--header__items">
                                            <th class="cart__table--header__list">Product</th>
                                            <th class="cart__table--header__list">Price</th>
                                            <th class="cart__table--header__list">Quantity</th>
                                            <th class="cart__table--header__list">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart__table--body">
                                    	@forelse($cart_products as $key => $cart)
                                        <tr class="cart__table--body__items remove-item-in-cart remove-item-in-cart-{{$key}}">
                                            <td class="cart__table--body__list ">
                                                <div class="cart__product d-flex align-items-center">
                                                    <button class="cart__remove--btn" onclick="deleteFromCart($(this),`{{$key}}`)" aria-label="search button" type="button"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg></button>
                                                    <div class="cart__thumbnail">
                                                        <a href="product-details.html"><img class="border-radius-5" src="{{$cart['image']}}" alt="cart-product"></a>
                                                    </div>
                                                    <div class="cart__content">
                                                        <h4 class="cart__content--title"><a href="product-details.html"> {{$cart['title']}}</a></h4>
                                                        <!--<span class="cart__content--variant">COLOR: Blue</span>
                                                        <span class="cart__content--variant">WEIGHT: 2 Kg</span> -->
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">{{config('app.currency')}}{{$cart['discount_price']}}</span>
                                            </td>
                                            <td class="cart__table--body__list update_quantity_parent">
                                                <div class="quantity__box">
                                                    <button type="button" class="quantity__value quickview__value--quantity decrease update_decrease_quantity" id="{{$key}}" aria-label="quantity value" value="Decrease Value">-</button>
                                                    <label id="update_quantity">
                                                        <input type="number" class="quantity__number update_quantity  quickview__value--number" value="{{(int)$cart['quantity']}}" />
                                                    </label>
                                                    <button type="button" class="quantity__value quickview__value--quantity increase update_increase_quantity" id="{{$key}}" aria-label="quantity value" value="Increase Value">+</button>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price cart_price_{{$key}} end">${{number_format($cart['quantity'] * $cart['discount_price'] ?? 0 ,2)}}</span>
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table> 
                                <div class="continue__shopping d-flex justify-content-between">
                                    <a class="continue__shopping--link" href="shop.html">Continue shopping</a>
                                    <!--<button class="continue__shopping--clear" type="submit">Clear Cart</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__summary border-radius-10">
                                
                                <div class="coupon__code mb-30">
                                    <h3 class="coupon__code--title">Coupon</h3>
                                    <p class="coupon__code--desc">Enter coupon code if you have one.</p>
                                    <form id="couponForm" method="post" action="{{route('applyCoupon')}}" class="d-flex" >
                                        @csrf
                                    <div class="coupon__code--field d-flex">
                                        
                                        <label>
                                            <input type="hidden" name="cart_total" value="{{$cart_total}}">
                                            <input class="coupon__code--field__input border-radius-5" placeholder="Coupon code" name="coupon_code" required type="text">
                                        </label>
                                        <button class="coupon__code--field__btn primary__btn" type="submit">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                                <!--
                                <div class="cart__note mb-20">
                                    <h3 class="cart__note--title">Note</h3>
                                    <p class="cart__note--desc">Add special instructions for your seller...</p>
                                    <textarea class="cart__note--textarea border-radius-5"></textarea>
                                </div>
                                -->
                                <div class="cart__summary--total mb-20">
                                    <table class="cart__summary--total__table">
                                        <tbody>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                                <td class="cart__summary--amount text-right update-cart-new-total">{{config('app.currency')}}{{number_format((float)$cart_total, 2, '.', '')}}</td>
                                            </tr>
                                            <tr class="cart__summary--total__list">
                                                <td class="checkout__total--title text-left">Discount</td>


                                                <td class="cart__summary--amount text-right update-cart-new-total">-{{config('app.currency')}}<span class="coupon_valid_discount">(0.00)</span></td>

                                                
                                            </tr>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                                <td class="cart__summary--amount text-right update-cart-new-total">{{config('app.currency')}}<span class="update-cart-new-grandtotal">{{number_format((float)$cart_total, 2, '.', '')}}</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart__summary--footer">
                                    <p class="cart__summary--footer__desc">Shipping & taxes calculated at checkout</p>
                                    <ul class="d-flex justify-content-between">
                                        <!--<li><button class="cart__summary--footer__btn primary__btn cart" type="submit">Update Cart</button></li> -->
                                        <li><a class="cart__summary--footer__btn primary__btn checkout" href="{{url('/checkout')}}">Check Out</a></li>
                                    </ul>
                                </div>
                            </div> 
                        </div>
                    </div> 
                
            </div>
        </div>     
    </section>
    <!-- cart section end -->

    <!-- Start product section -->
    <section class="product__section section--padding pt-0">
        <div class="container-fluid">
            <div class="section__heading text-center mb-40">
                <h2 class="section__heading--maintitle">New Products</h2>
            </div>
            
            <div class="product__section--inner product__swiper--column5 swiper">
            	
                <div class="swiper-wrapper">
                	@forelse($products as $product)
                    <div class="swiper-slide">
                        <div class="product__items ">
                            <div class="product__items--thumbnail">
                                <a class="product__items--link" href="product-details.html">
                                    <img class="product__items--img product__primary--img" src="{{$product->images[0]->url}}" alt="product-img">
                                    <img class="product__items--img product__secondary--img" src="{{$product->images[1]->url}}" alt="product-img">
                                </a>
                                <div class="product__badge">
                                    <span class="product__badge--items sale">New</span>
                                </div>
                                <ul class="product__items--action d-flex justify-content-center">
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" data-open="modal1" href="javascript:void(0)">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                            <span class="visually-hidden">Quick View</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" href="wishlist.html">
                                            <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                            </svg>
                                            <span class="visually-hidden">Wishlist</span>
                                        </a>
                                    </li>
                                    <li class="product__items--action__list">
                                        <a class="product__items--action__btn" href="compare.html">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="16.47" height="13.088" viewBox="0 0 15.47 11.088">
                                                <g  transform="translate(0 -72.508)">
                                                  <path  data-name="Path 114" d="M15.359,80.9l-2.011-2.011a.525.525,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49l1.106,1.106H10.576L8.3,78.052l2.273-2.274h1.618l-1.106,1.106a.287.287,0,0,0,.2.49h1.683a.531.531,0,0,0,.374-.155l2.011-2.011a.38.38,0,0,0,0-.535l-.859-.859a.227.227,0,1,0-.32.321l.806.806L13.027,76.9a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542h-2.04a.227.227,0,0,0-.16.066l-2.34,2.34-.544-.544,2.519-2.519a.382.382,0,0,1,.272-.112h2.293a.317.317,0,0,0,.225-.542l-1.054-1.054h1.282a.076.076,0,0,1,.053.022l.4.4a.227.227,0,1,0,.32-.321l-.4-.4a.531.531,0,0,0-.374-.155H11.291a.287.287,0,0,0-.2.49L12.194,74.1H10.229a.832.832,0,0,0-.592.245L7.118,76.867,4.6,74.349a.832.832,0,0,0-.592-.245H.378A.378.378,0,0,0,0,74.481v.92a.378.378,0,0,0,.378.378H3.66l2.273,2.274L3.66,80.326H.378A.378.378,0,0,0,0,80.7v.92A.378.378,0,0,0,.378,82H4.007a.835.835,0,0,0,.592-.245l2.519-2.519.8.8a.227.227,0,1,0,.32-.32L3.914,75.392a.227.227,0,0,0-.16-.066H.453v-.769H4.007a.382.382,0,0,1,.272.113l6.043,6.043a.227.227,0,0,0,.16.066h2.04a.317.317,0,0,0,.224-.542l-1.054-1.054h1.282a.075.075,0,0,1,.053.022l1.958,1.958-1.958,1.958a.075.075,0,0,1-.053.022H11.692l1.054-1.054a.317.317,0,0,0-.224-.542H10.229a.383.383,0,0,1-.272-.113l-.968-.968a.227.227,0,0,0-.32.32l.968.968a.833.833,0,0,0,.592.245h1.965l-1.105,1.105a.287.287,0,0,0,.2.49h1.683a.525.525,0,0,0,.374-.155l2.011-2.011A.379.379,0,0,0,15.359,80.9Zm-11.08.539a.389.389,0,0,1-.272.113H.453v-.769h3.3a.226.226,0,0,0,.16-.066l2.34-2.34.543.544Z" transform="translate(0 0)" fill="currentColor"/>
                                                </g>
                                            </svg>
                                            <span class="visually-hidden">Compare</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="product__items--content text-center">
                                <div class="product__items--color">
                                    <ul class="product__items--color__wrapper d-flex justify-content-center">
                                        <li class="product__items--color__list"><a class="product__items--color__link one" href="javascript:void(0)"><span class="visually-hidden">Color 1</span></a></li>
                                        <li class="product__items--color__list"><a class="product__items--color__link two" href="javascript:void(0)"><span class="visually-hidden">Color 2</span></a></li>
                                        <li class="product__items--color__list"><a class="product__items--color__link three" href="javascript:void(0)"><span class="visually-hidden">Color 3</span></a></li>
                                        <li class="product__items--color__list"><a class="product__items--color__link four" href="javascript:void(0)"><span class="visually-hidden">Color 4</span></a></li>
                                    </ul>
                                </div>
                                <h3 class="product__items--content__title h4"><a href="product-details.html">{{$product->title}}</a></h3>
                                <div class="product__items--price">
                                    <span class="current__price">{{config('app.currency')}}{{$product->discount_price}}</span>
                                    <span class="old__price">{{config('app.currency')}}{{$product->strike_price}}</span>
                                </div>
                                <a class="product__items--action__cart--btn primary__btn" href="cart.html">
                                    <svg class="product__items--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="13.897" height="14.565" viewBox="0 0 18.897 21.565">
                                        <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                    </svg>
                                    <span class="add__to--cart__text"> Add to cart</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
                
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
            
        </div>
    </section>
    <!-- End product section -->

   
    
</main>


@push('script')

<script type="text/javascript">
    $(document).on('click','.update_increase_quantity',function(){

        var quantity = $(this).parents('.update_quantity_parent').children().find('label :input').val();
        var product_id = $(this).attr('id')

        $.ajax({

            type : "get",
            url : "{{url('/update-cart')}}",
            data : {product_id : product_id , quantity : quantity},

            success:function(data)
            {
                if(data.success){

                    
                    $(".cart_price_"+product_id).html('$'+data.update_amount_of_product)
                    $('.update-cart-new-total').html('$'+data.cart_total)
                }
            }

        })
    })
    $(document).on('click','.update_decrease_quantity',function(){

        var quantity = $(this).parents('.update_quantity_parent').children().find('label :input').val();
        var product_id = $(this).attr('id')

        $.ajax({

            type : "get",
            url : "{{url('/update-cart')}}",
            data : {product_id : product_id , quantity : quantity},

            success:function(data)
            {
                if(data.success){

                    
                    $(".cart_price_"+product_id).html('$'+data.update_amount_of_product)
                    $('.update-cart-new-total').html('$'+data.cart_total)
                }
            }

        })
    })

    $(document).on('submit','#couponForm',function(e){

        e.preventDefault()
        var $this = $(this);
        $(':input[type="submit"]').prop('disabled', true);

        $.ajax({

            type : $this.attr('method'),
            url : $this.attr('action'),
            data : $this.serializeArray(),
            dataType: $this.data('type'),

            success:function(data)
            {   
                $(':input[type="submit"]').prop('disabled', false);
                $('#couponForm')[0].reset();
                if(data.success)
                {   
                    successmsg('Coupon Applied Successfully')
                    $('#couponForm').hide()
                    $('.coupon_valid_discount').html(`(${data.discount})`)
                    $('.update-cart-new-grandtotal').html(data.newcart_total)
                }else{
                    successmsg('Coupon Expire or Not Found')
                }
            }
        })
    })
    
</script>


@endpush
@endsection