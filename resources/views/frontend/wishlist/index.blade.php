@extends('layout')

@section('content')


<main class="main__content_wrapper">
    
    
    

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container">
            <div class="cart__section--inner">
                <form action="#"> 
                    <h2 class="cart__title mb-40">Wishlist</h2>
                    <div class="cart__table">
                        <table class="cart__table--inner">
                            <thead class="cart__table--header">
                                <tr class="cart__table--header__items">
                                    <th class="cart__table--header__list">Product</th>
                                    <th class="cart__table--header__list">Price</th>
                                    <th class="cart__table--header__list text-center">STOCK STATUS</th>
                                    <th class="cart__table--header__list text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody class="cart__table--body">
                            	@if(count($wishlist_products) > 0)
                            	@foreach($wishlist_products as $key => $wishlist)
                                <tr class="cart__table--body__items remove-item-in-wishlist">
                                    <td class="cart__table--body__list">
                                        <div class="cart__product d-flex align-items-center">
                                            <button onclick="deleteFromWishlist($(this),`{{$key}}`)" class="cart__remove--btn" aria-label="search button" type="button"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg></button>
                                            <div class="cart__thumbnail">
                                                <a href="{{route('allproducts.show',[$wishlist['slug']])}}"><img class="border-radius-5" src="{{$wishlist['image']}}" alt="cart-product"></a>
                                            </div>
                                            <div class="cart__content">
                                                <h4 class="cart__content--title"><a href="{{route('allproducts.show',[$wishlist['slug']])}}">{{$wishlist['title']}}</a></h4>
                                                <!--<span class="cart__content--variant">COLOR: Blue</span>
                                                <span class="cart__content--variant">WEIGHT: 2 Kg</span> -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__table--body__list">
                                        <span class="cart__price">{{config('app.currency')}}{{$wishlist['discount_price']}}</span>
                                    </td>
                                    <td class="cart__table--body__list text-center">
                                        <span class="in__stock text__secondary">in stock</span>
                                    </td>
                                    <td class="cart__table--body__list text-right">
                                        <a class="wishlist__cart--btn primary__btn" href="{{route('allproducts.show',[$wishlist['slug']])}}">View Product</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table> 
                        <div class="continue__shopping d-flex justify-content-between">
                            <a class="continue__shopping--link" href="{{route('showCart')}}">View Cart</a>
                            <a class="continue__shopping--clear" href="{{route('allproducts.index')}}">View All Products</a>
                        </div>
                    </div> 
                </form> 
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
                    	@forelse($products as $similar_product)
                        <div class="swiper-slide">
                                <div class="product__items ">
                                    <div class="product__items--thumbnail">
                                        <a class="product__items--link" href="{{route('allproducts.show',[$similar_product->slug])}}">
                                            <img class="product__items--img product__primary--img" src="{{$similar_product->images[0]->url}}" alt="product-img">
                                            @if(isset($similar_product->images[1]))
                                            <img class="product__items--img product__secondary--img" src="{{$similar_product->images[1]->url}}" alt="product-img">
                                            @endif
                                        </a>
                                        <div class="product__badge">
                                            <span class="product__badge--items sale">New</span>
                                        </div>
                                        <ul class="product__items--action d-flex justify-content-center">
                                            <li class="product__items--action__list">
                                                <a class="product__items--action__btn"  href="{{route('allproducts.show',[$similar_product->slug])}}">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                    <span class="visually-hidden">Quick View</span>
                                                </a>
                                            </li>
                                            <!--
                                            <li class="product__items--action__list">
                                                <a class="product__items--action__btn" onclick="addToWishlist(`{{$similar_product->id}}`)">
                                                    <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                        <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                    </svg>
                                                    <span class="visually-hidden">Wishlist</span>
                                                </a>
                                            </li> -->
                                            
                                        </ul>
                                    </div>
                                    <div class="product__items--content text-center">
                                    <div class="product__details--info__rating justify-content-center d-flex align-items-center mb-15">
                                        <div class="rating product__list--rating d-flex">
                                        @for($i = 1 ; $i <= (int)number_format($similar_product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                        <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                        @endfor
                                        @for($i = 1 ; $i <= (int) 5 - number_format($similar_product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                        <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                        @endfor
                                        </div>
                                    </div>
                                        <h3 class="product__items--content__title h4"><a href="{{route('allproducts.show',[$similar_product->slug])}}">{{$similar_product->title}}</a></h3>
                                        <div class="product__items--price">
                                            <span class="current__price">{{config('app.currency')}}{{$similar_product->discount_price}}</span>
                                            <span class="old__price">{{config('app.currency')}}{{$similar_product->strike_price}}</span>
                                        </div>
                                        
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


@endsection