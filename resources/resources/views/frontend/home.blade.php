@extends('layout')

@section('content')



<main class="main__content_wrapper">
        
        @include('frontend.includes.slider')
        
        <!-- Start product section -->
        <section class="product__section section--padding color-scheme-3">
            <div class="container">
                <div class="section__heading text-center mb-40">
                    <h2 class="section__heading--maintitle">Most Latest Items</h2>
                </div>
                <div class="product__section--inner product__swiper--column4 swiper">
                    <div class="swiper-wrapper">
                        @forelse($latest_products as $product)
                        <div class="swiper-slide">
                            <div class="product__items ">
                                <div class="product__items--thumbnail">
                                    <a class="product__items--link" href="{{route('allproducts.show',[$product->slug])}}">
                                        <img class="product__items--img product__primary--img" src="{{$product->images[0]->url}}" alt="product-img">
                                        @if(isset($product->images[1]))
                                        <img class="product__items--img product__secondary--img" src="{{$product->images[1]->url}}" alt="product-img">
                                        @endif
                                    </a>
                                    <div class="product__badge style3">
                                        <span class="product__badge--items style3 sale">New</span>
                                    </div>
                                    <ul class="product__items--action d-flex justify-content-center">
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" href="{{route('allproducts.show',[$product->slug])}}">
                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                <span class="visually-hidden">Quick View</span>
                                            </a>
                                        </li>
                                        
                                        <li class="product__items--action__list">
                                            <a class="product__items--action__btn" onclick="addToWishlist(`{{$product->id}}`)">
                                                <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                    <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Wishlist</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__items--content text-center">
                                    <div class="product__details--info__rating d-flex justify-content-center align-items-center mb-15">
                                        <div class="rating product__list--rating d-flex">
                                            @for($i = 1 ; $i <= (int)number_format($product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                            @endfor
                                            @for($i = 1 ; $i <= (int) 5 - number_format($product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                            <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <h3 class="product__items--content__title h4"><a href="{{route('allproducts.show',[$product->slug])}}">{{$product->title}}</a></h3>
                                    <div class="product__items--price">
                                        <span class="current__price">{{config('app.currency')}}{{$product->discount_price}}</span>
                                        <span class="old__price">{{config('app.currency')}}{{$product->strike_price}}</span>
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

    <!-- Start product section -->
    <section class="product__section section--padding pt-0">
            <div class="container-fluid">
                <div class="section__heading text-center mb-30">
                    <h2 class="section__heading--maintitle">Most Popular Items</h2>
                </div>
                
                <div class="tab_content">
                    <div id="chair" class="tab_pane active show">
                        <div class="product__section--inner">
                            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                                @if(count($popular_products) > 0)
                                @foreach($popular_products as $popular)
                                <div class="col mb-30">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="{{route('allproducts.show',[$popular->slug])}}">
                                                <img class="product__items--img product__primary--img" src="{{$popular->images[0]->url}}" alt="product-img">
                                                @if(isset($popular->images[1]))
                                                <img class="product__items--img product__secondary--img" src="{{$popular->images[1]->url}}" alt="product-img">
                                                @endif
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">New</span>
                                            </div>
                                            <ul class="product__items--action d-flex justify-content-center">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="{{route('allproducts.show',[$popular->slug])}}">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" onclick="addToWishlist(`{{$popular->id}}`)">
                                                        <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                            <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <div class="product__details--info__rating d-flex justify-content-center align-items-center mb-15">
                                                <div class="rating product__list--rating d-flex">
                                                    @for($i = 1 ; $i <= (int)number_format($popular->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                        <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                    @endfor
                                                    @for($i = 1 ; $i <= (int) 5 - number_format($popular->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                    <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <h3 class="product__items--content__title h4"><a href="{{route('allproducts.show',[$popular->slug])}}">{{$popular->title}}</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">{{config('app.currency')}}{{$popular->discount_price}}</span>
                                                <span class="old__price">{{config('app.currency')}}{{$popular->strike_price}}</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    <!-- End product section -->






    <!-- Start product section -->
    <section class="product__section section--padding pt-0">
            <div class="container-fluid">
                <div class="section__heading text-center mb-30">
                    <h2 class="section__heading--maintitle">Most Trending Items</h2>
                </div>
                
                <div class="tab_content">
                    <div id="chair" class="tab_pane active show">
                        <div class="product__section--inner">
                            <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-2 mb--n30">
                                @if(count($trending_products) > 0)
                                @foreach($trending_products as $popular)
                                <div class="col mb-30">
                                    <div class="product__items ">
                                        <div class="product__items--thumbnail">
                                            <a class="product__items--link" href="{{route('allproducts.show',[$popular->slug])}}">
                                                <img class="product__items--img product__primary--img" src="{{$popular->images[0]->url}}" alt="product-img">
                                                @if(isset($popular->images[1]))
                                                <img class="product__items--img product__secondary--img" src="{{$popular->images[1]->url}}" alt="product-img">
                                                @endif
                                            </a>
                                            <div class="product__badge">
                                                <span class="product__badge--items sale">Sale</span>
                                            </div>
                                            <ul class="product__items--action d-flex justify-content-center">
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" href="{{route('allproducts.show',[$popular->slug])}}">
                                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                        <span class="visually-hidden">Quick View</span>
                                                    </a>
                                                </li>
                                                
                                                <li class="product__items--action__list">
                                                    <a class="product__items--action__btn" onclick="addToWishlist(`{{$popular->id}}`)">
                                                        <svg class="product__items--action__btn--svg"  xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 24.526 21.82">
                                                            <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"></path>
                                                        </svg>
                                                        <span class="visually-hidden">Wishlist</span>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        <div class="product__items--content text-center">
                                            <div class="product__details--info__rating d-flex justify-content-center align-items-center mb-15">
                                                <div class="rating product__list--rating d-flex">
                                                    @for($i = 1 ; $i <= (int)number_format($popular->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                        <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                    @endfor
                                                    @for($i = 1 ; $i <= (int) 5 - number_format($popular->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                    <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <h3 class="product__items--content__title h4"><a href="{{route('allproducts.show',[$popular->slug])}}">{{$popular->title}}</a></h3>
                                            <div class="product__items--price">
                                                <span class="current__price">{{config('app.currency')}}{{$popular->discount_price}}</span>
                                                <span class="old__price">{{config('app.currency')}}{{$popular->strike_price}}</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    <!-- End product section -->
    


    <!-- Start testimonial section -->
    <section class="testimonial__section position__relative testimonial__bg--two section--padding color-scheme-2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="testimonial__section--inner">
                        <div class="section__heading text-center mb-40">
                            <h2 class="section__heading--maintitle">What Say Our Top Clients</h2>
                        </div>
                        <div class=" testimonial__swiper--column3 testimonial__padding swiper">
                            <div class="swiper-wrapper">

                                @forelse($reviews as $review)
                                <div class="swiper-slide">
                                    <div class="testimonial__items--style2 position__relative border-radius-5 d-flex align-items-center">
                                        
                                        <div class="testimonial__content--style2">
                                            <h3 class="testimonial__items--author__title h4">{{$review->name}}</h3>
                                            
                                            <p class="testimonial__items--desc style2"><svg xmlns="http://www.w3.org/2000/svg" width="8.101" height="6.481" viewBox="0 0 8.101 6.481">
                                                <path  data-name="Icon metro-quote" d="M5.57,9.667v3.24H8.81V9.667H7.19a1.587,1.587,0,0,1,1.62-1.62V6.427A3.174,3.174,0,0,0,5.57,9.667Zm8.1-1.62V6.427a3.174,3.174,0,0,0-3.24,3.24v3.24h3.24V9.667h-1.62A1.587,1.587,0,0,1,13.671,8.047Z" transform="translate(-5.57 -6.427)" fill="currentColor"/>
                                            </svg>
                                                {{$review->content}} <svg xmlns="http://www.w3.org/2000/svg" width="7.774" height="6.803" viewBox="0 0 7.774 6.803">
                                                    <path  data-name="Icon awesome-quote-right" d="M7.046,1.5H5.1a.729.729,0,0,0-.729.729V4.172A.729.729,0,0,0,5.1,4.9H6.317v.972a.973.973,0,0,1-.972.972H5.223a.364.364,0,0,0-.364.364v.729a.364.364,0,0,0,.364.364h.121a2.429,2.429,0,0,0,2.43-2.43V2.229A.729.729,0,0,0,7.046,1.5Zm-4.373,0H.729A.729.729,0,0,0,0,2.229V4.172A.729.729,0,0,0,.729,4.9H1.944v.972a.973.973,0,0,1-.972.972H.85a.364.364,0,0,0-.364.364v.729A.364.364,0,0,0,.85,8.3H.972A2.429,2.429,0,0,0,3.4,5.873V2.229A.729.729,0,0,0,2.672,1.5Z" transform="translate(0 -1.5)" fill="currentColor"/>
                                                    </svg>
                                            </p>
                                            <ul class="rating testimonial__rating d-flex">
                                                @for($i = 1 ; $i <= (int)number_format($review->rating ?? 5); $i++)
                                                    <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                @endfor
                                                @for($i = 1 ; $i <= (int) 5 - number_format($review->rating ?? 5); $i++)
                                                <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                @endfor
                                                
                                            </ul>   
                                        </div>
                                        <div class="testimonial__quote--icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25.599" height="22.572" viewBox="0 0 25.599 22.572">
                                                <g  data-name="Group 382" transform="translate(-164 -5399)">
                                                    <path  data-name="Path 131" d="M10.284,11.81a1.231,1.231,0,0,0,.62-1.652L9.892,8.031a1.235,1.235,0,0,0-1.611-.6A14.227,14.227,0,0,0,3.82,10.324,10.79,10.79,0,0,0,.826,15.052,25.936,25.936,0,0,0,0,22.321v6.34A1.243,1.243,0,0,0,1.239,29.9H9.355a1.243,1.243,0,0,0,1.239-1.239V20.545a1.243,1.243,0,0,0-1.239-1.239H5.472a8.707,8.707,0,0,1,1.446-5.018A7.849,7.849,0,0,1,10.284,11.81Z" transform="translate(164 5391.672)" fill="#f1f1f1"/>
                                                    <path  data-name="Path 132" d="M80.963,11.89a1.231,1.231,0,0,0,.62-1.652L80.571,8.132a1.235,1.235,0,0,0-1.611-.6,14.959,14.959,0,0,0-4.44,2.87,11.021,11.021,0,0,0-3.015,4.75A25.587,25.587,0,0,0,70.7,22.4v6.34a1.243,1.243,0,0,0,1.239,1.239h8.116a1.243,1.243,0,0,0,1.239-1.239V20.625a1.243,1.243,0,0,0-1.239-1.239h-3.9A8.709,8.709,0,0,1,77.6,14.368,7.848,7.848,0,0,1,80.963,11.89Z" transform="translate(107.9 5391.592)" fill="#f1f1f1"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="testimonial__pagination swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img class="testimonial__bg--shape1" src="assets/img/other/testimonial-shape.webp" alt="">
        <img class="testimonial__bg--shape2" src="assets/img/other/testimonial-shape2.webp" alt="">

    </section>
    <!-- End testimonial section -->



    <!-- Start shipping section -->
    <section class="shipping__section shipping__style2 section--padding color-scheme-2">
        <div class="container">
            <div class="shipping__style2--inner border-radius-10 d-flex justify-content-between">
                <div class="shipping__style2--items d-flex align-items-center">
                    <div class="shipping__style2--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29.867" height="35.022" viewBox="0 0 29.867 35.022">
                            <g transform="translate(-37.681 0)">
                                <g data-name="Group 117" transform="translate(37.681 0)">
                                    <g data-name="Group 116" transform="translate(0 0)">
                                        <path
                                            id="Path_75"
                                            data-name="Path 75"
                                            d="M67.006,6.047A58.257,58.257,0,0,1,52.989.1a.736.736,0,0,0-.749,0A56.662,56.662,0,0,1,38.223,6.047a.737.737,0,0,0-.542.711v7.527a21.655,21.655,0,0,0,6.576,15.822c3.23,3.165,6.992,4.915,8.358,4.915s5.128-1.75,8.358-4.915a21.655,21.655,0,0,0,6.576-15.822V6.758A.737.737,0,0,0,67.006,6.047Zm-.931,8.238a20.211,20.211,0,0,1-6.134,14.769c-3.176,3.112-6.572,4.494-7.326,4.494s-4.151-1.382-7.327-4.494a20.211,20.211,0,0,1-6.134-14.769V7.317A58.019,58.019,0,0,0,52.615,1.59a59.855,59.855,0,0,0,13.46,5.727Z"
                                            transform="translate(-37.681 0)"
                                            fill="currentColor"
                                        />
                                        <path
                                            id="Path_76"
                                            data-name="Path 76"
                                            d="M85.814,99.41a.737.737,0,0,0-.956-.415c-1.316.519-2.667,1-4.015,1.419a.737.737,0,0,0-.516.7v2.845a.737.737,0,1,0,1.473,0v-2.307c1.209-.391,2.417-.824,3.6-1.289A.736.736,0,0,0,85.814,99.41Z"
                                            transform="translate(-77.41 -92.175)"
                                            fill="currentColor"
                                        />
                                        <path
                                            id="Path_77"
                                            data-name="Path 77"
                                            d="M170.941,87.683a.737.737,0,0,0,.3-.062l.014-.006a.737.737,0,1,0-.595-1.348l-.012.005a.736.736,0,0,0,.3,1.411Z"
                                            transform="translate(-161.138 -80.308)"
                                            fill="currentColor"
                                        />
                                        <path
                                            id="Path_78"
                                            data-name="Path 78"
                                            d="M308.871,345.648a.737.737,0,0,0-1.02.214,17.933,17.933,0,0,1-2.117,2.644,18.818,18.818,0,0,1-2.113,1.88.737.737,0,1,0,.893,1.172,20.3,20.3,0,0,0,2.279-2.028,19.388,19.388,0,0,0,2.291-2.863A.737.737,0,0,0,308.871,345.648Z"
                                            transform="translate(-285.16 -321.893)"
                                            fill="currentColor"
                                        />
                                        <path
                                            id="Path_79"
                                            data-name="Path 79"
                                            d="M276.974,432.067l-.042.025a.737.737,0,1,0,.738,1.275l.049-.029a.737.737,0,1,0-.745-1.271Z"
                                            transform="translate(-260.223 -402.419)"
                                            fill="currentColor"
                                        />
                                        <path
                                            id="Path_80"
                                            data-name="Path 80"
                                            d="M126.909,160.031a2.4,2.4,0,1,0-3.388,3.388l4.35,4.35a2.4,2.4,0,0,0,3.388,0l9.081-9.081a2.4,2.4,0,0,0-3.388-3.388l-7.387,7.387Zm11.085-3.689a.922.922,0,1,1,1.3,1.3l-9.081,9.081a.923.923,0,0,1-1.3,0l-4.35-4.35a.922.922,0,0,1,1.3-1.3l3.177,3.177a.737.737,0,0,0,1.042,0Z"
                                            transform="translate(-116.997 -144.024)"
                                            fill="currentColor"
                                        />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="shipping__style2--content">
                        <h2 class="shipping__style2--content__title">SECURE SHOPPING</h2>
                        {{-- <p class="shipping__style2--content__desc">Free order over $300</p> --}}
                    </div>
                </div>
                <div class="shipping__style2--items d-flex align-items-center">
                    <div class="shipping__style2--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32.65" height="25.024" viewBox="0 0 32.65 25.024">
                            <g id="fast-delivery" transform="translate(0 -59.798)">
                                <g id="Group_120" data-name="Group 120" transform="translate(6.111 65.92)">
                                    <g id="Group_119" data-name="Group 119" transform="translate(0 0)">
                                        <path
                                            id="Path_103"
                                            data-name="Path 103"
                                            d="M97.921,160.126l-1.113-1.1-.018-2.754a.478.478,0,0,0-.478-.475h0a.478.478,0,0,0-.475.481l.019,2.952a.478.478,0,0,0,.142.337l1.253,1.238a.478.478,0,0,0,.672-.68Z"
                                            transform="translate(-95.834 -155.798)"
                                            fill="currentColor"
                                        />
                                    </g>
                                </g>
                                <g id="Group_122" data-name="Group 122" transform="translate(12.594 71.137)">
                                    <g id="Group_121" data-name="Group 121" transform="translate(0 0)">
                                        <path
                                            id="Path_104"
                                            data-name="Path 104"
                                            d="M205.993,240.415s0-.008,0-.012,0-.026-.007-.039l0-.013c0-.012-.006-.024-.01-.036l-.005-.014c0-.011-.009-.022-.013-.033l-.007-.014-.016-.03-.009-.015-.019-.028-.01-.014-.025-.028-.009-.01a.465.465,0,0,0-.038-.034h0l-2.915-2.377a.478.478,0,0,0-.6.741l1.874,1.528h-6.2a.478.478,0,0,0,0,.957h6.2l-1.874,1.528a.478.478,0,1,0,.6.741l2.915-2.377h0a.488.488,0,0,0,.038-.034l.009-.009.025-.028.01-.014.019-.028.009-.015.016-.03.007-.014c0-.011.009-.022.013-.033l.005-.014c0-.012.007-.024.01-.036l0-.013c0-.013,0-.026.007-.039s0-.008,0-.012a.479.479,0,0,0,0-.052A.494.494,0,0,0,205.993,240.415Z"
                                            transform="translate(-197.501 -237.611)"
                                            fill="currentColor"
                                        />
                                    </g>
                                </g>
                                <g id="Group_124" data-name="Group 124" transform="translate(0 59.798)">
                                    <g id="Group_123" data-name="Group 123" transform="translate(0 0)">
                                        <path
                                            id="Path_105"
                                            data-name="Path 105"
                                            d="M11.259,64.655a6.708,6.708,0,0,0-.705-.607l.681-.826a.478.478,0,0,0-.738-.609l-.755.916a6.552,6.552,0,0,0-2.655-.77v-.431h.962a.888.888,0,0,0,.887-.887v-.756a.888.888,0,0,0-.887-.887H5.13a.888.888,0,0,0-.887.887v.756a.888.888,0,0,0,.887.887h1v.432a6.555,6.555,0,0,0-2.682.784l-.767-.93a.478.478,0,0,0-.738.609l.7.844a6.707,6.707,0,0,0-.726.635A6.609,6.609,0,0,0,6.608,75.959H6.64a6.609,6.609,0,0,0,4.619-11.3ZM5.2,61.371v-.616h2.78v.616Zm5.425,11.957A5.615,5.615,0,0,1,6.636,75H6.608a5.652,5.652,0,0,1-.026-11.3h.028a5.652,5.652,0,0,1,4.015,9.63Z"
                                            transform="translate(0 -59.798)"
                                            fill="currentColor"
                                        />
                                    </g>
                                </g>
                                <g id="Group_126" data-name="Group 126" transform="translate(1.535 64.277)">
                                    <g id="Group_125" data-name="Group 125" transform="translate(0 0)">
                                        <path
                                            id="Path_106"
                                            data-name="Path 106"
                                            d="M29.147,130.033h-.025a5.074,5.074,0,0,0,.024,10.147h.025a5.074,5.074,0,0,0-.024-10.147ZM32.072,138a4.09,4.09,0,0,1-2.905,1.22h-.02a4.117,4.117,0,0,1-.019-8.234h.02A4.117,4.117,0,0,1,32.072,138Z"
                                            transform="translate(-24.073 -130.033)"
                                            fill="currentColor"
                                        />
                                    </g>
                                </g>
                                <g id="Group_128" data-name="Group 128" transform="translate(6.889 80.101)">
                                    <g id="Group_127" data-name="Group 127" transform="translate(0 0)">
                                        <path
                                            id="Path_107"
                                            data-name="Path 107"
                                            d="M110.1,378.274a1.439,1.439,0,0,0-1.176.073,1.648,1.648,0,0,0-.79.891,1.551,1.551,0,0,0,.833,2.024,1.415,1.415,0,0,0,.5.092,1.481,1.481,0,0,0,.673-.165,1.648,1.648,0,0,0,.79-.891A1.551,1.551,0,0,0,110.1,378.274Zm-.061,1.685a.693.693,0,0,1-.329.378.5.5,0,0,1-.4.031.6.6,0,0,1-.278-.791.693.693,0,0,1,.329-.378.531.531,0,0,1,.24-.06.457.457,0,0,1,.163.03A.6.6,0,0,1,110.039,379.959Z"
                                            transform="translate(-108.024 -378.181)"
                                            fill="currentColor"
                                        />
                                    </g>
                                </g>
                                <g id="Group_130" data-name="Group 130" transform="translate(25.315 80.103)">
                                    <g id="Group_129" data-name="Group 129">
                                        <path
                                            id="Path_108"
                                            data-name="Path 108"
                                            d="M399.045,378.292a1.6,1.6,0,0,0-1.132,2.988,1.415,1.415,0,0,0,.5.092,1.481,1.481,0,0,0,.673-.165,1.648,1.648,0,0,0,.79-.891A1.551,1.551,0,0,0,399.045,378.292Zm-.061,1.685a.693.693,0,0,1-.329.378.5.5,0,0,1-.4.031.6.6,0,0,1-.278-.791.64.64,0,0,1,.568-.438.459.459,0,0,1,.164.03A.6.6,0,0,1,398.984,379.977Z"
                                            transform="translate(-396.969 -378.2)"
                                            fill="currentColor"
                                        />
                                    </g>
                                </g>
                                <g id="Group_132" data-name="Group 132" transform="translate(3.238 67.033)">
                                    <g id="Group_131" data-name="Group 131" transform="translate(0 0)">
                                        <path
                                            id="Path_109"
                                            data-name="Path 109"
                                            d="M79.88,179.659h0c-.7-.793-1.424-1.62-2.211-2.528a1.265,1.265,0,0,0-.959-.426l-4.02-.005c.122-.756.24-1.509.349-2.246A1.03,1.03,0,0,0,72,173.259l-7.971,0H62.226a.478.478,0,0,0,0,.957h1.806l7.971,0a.1.1,0,0,1,.075.025.1.1,0,0,1,.015.074c-.232,1.579-.508,3.234-.779,4.844-.394,2.324-.8,4.708-1.1,7.033l0,.028h-3.35l-.98,0h-.2l-2.3,0h-.1l-2.374-.005-2.421-.005a2.779,2.779,0,0,0-.972-1.02l-.038-.023-.065-.037-.057-.031-.057-.029-.074-.035L57.178,185c-.041-.018-.083-.035-.125-.051s-.087-.031-.131-.046l-.072-.021-.057-.016-.1-.024-.027-.006c-.04-.009-.08-.016-.121-.023h0a2.772,2.772,0,0,0-1.31.1h0l-.1.035-.04.014-.08.031-.034.013-.032.014-.048.021-.1.046-.022.011-.006,0q-.059.03-.116.062l-.047.028-.063.038-.064.041-.037.025a3.248,3.248,0,0,0-.888.9H51.917l.41-2.53a.478.478,0,0,0-.944-.153c-.286,1.77-.5,3.085-.5,3.085v.007l-.1.651A1.232,1.232,0,0,0,52,188.662h1.031a3.156,3.156,0,0,0,.167.585,2.791,2.791,0,0,0,1.611,1.618,2.705,2.705,0,0,0,.961.176,3.159,3.159,0,0,0,2.888-2.1c.035-.091.065-.183.091-.275l10.406.013,1.294,0h1.012a3.152,3.152,0,0,0,.163.564,2.791,2.791,0,0,0,1.611,1.618,2.724,2.724,0,0,0,.967.178,2.887,2.887,0,0,0,1.311-.322,3.283,3.283,0,0,0,1.571-1.778c.032-.084.059-.168.084-.253h.6a1.429,1.429,0,0,0,1.39-1.181c.353-2.3.723-4.722,1.015-6.853A1.25,1.25,0,0,0,79.88,179.659Zm-26.77,7.5c-.005.019-.01.038-.015.058s-.015.056-.022.085-.011.048-.016.072-.01.045-.014.068-.011.06-.016.091-.005.031-.008.047c-.006.037-.01.074-.015.112l0,.014H52a.275.275,0,0,1-.272-.316l.036-.242h1.345Zm4.787.953s0,.005,0,.008a2.483,2.483,0,0,1-.129.482,2.1,2.1,0,0,1-2.616,1.367,1.846,1.846,0,0,1-1.06-1.074,2.223,2.223,0,0,1-.151-.712c0-.006,0-.012,0-.018a2.379,2.379,0,0,1,.013-.361v0c0-.036.009-.071.015-.107l0-.022c0-.029.011-.058.017-.087l.007-.034c.006-.026.012-.051.019-.077l.01-.039c.007-.025.015-.051.023-.076l.011-.037c.012-.037.025-.074.039-.111v0c.018-.048.038-.095.059-.141l.013-.03c.022-.047.045-.094.07-.139l.006-.01a2.126,2.126,0,0,1,2.08-1.141l.047.006.06.011c.039.008.077.016.115.026l.027.008c.046.013.091.028.136.045l.087.036.053.025.03.014.071.038.009,0a1.876,1.876,0,0,1,.786.9A2.267,2.267,0,0,1,57.9,188.114Zm12.128-.389H69.16l-10.276-.013a3.228,3.228,0,0,0-.053-.553l2.076,0,4.295.009h4.887Q70.056,187.452,70.026,187.725Zm6.3.408v.006a2.487,2.487,0,0,1-.126.465,2.328,2.328,0,0,1-1.11,1.264,1.809,1.809,0,0,1-2.565-.972,2.221,2.221,0,0,1-.151-.7s0-.007,0-.01a2.37,2.37,0,0,1,.011-.362l0-.018q.005-.047.013-.093l.006-.036c0-.025.009-.05.014-.075l.009-.045c.005-.023.011-.046.017-.069s.008-.031.012-.047.014-.048.021-.072l.012-.041c.012-.037.025-.075.039-.112a2.328,2.328,0,0,1,1.11-1.264c.033-.017.067-.033.1-.048l.033-.014.069-.028.039-.014.065-.022.04-.012.065-.018.039-.01.07-.015.034-.007.092-.014.012,0c.035,0,.07-.007.1-.01h.028l.076,0h.026c.047,0,.095,0,.142.006h0c.048,0,.1.011.142.019l.026,0q.068.013.136.031L75,185.8c.046.013.093.028.138.045l.082.034.049.023.027.013A2.069,2.069,0,0,1,76.321,188.133Zm2.905-7.605c-.291,2.124-.66,4.542-1.012,6.837a.479.479,0,0,1-.445.37h-.458a3.187,3.187,0,0,0-.221-1.163,2.805,2.805,0,0,0-1.384-1.519l-.056-.026L75.6,185c-.039-.017-.079-.033-.119-.049a2.762,2.762,0,0,0-2,.02q-.14.055-.278.125a3.283,3.283,0,0,0-1.571,1.778c-.023.062-.044.124-.064.186l-.017.054q-.023.076-.042.152l-.01.04c-.015.063-.028.126-.039.19,0,.013,0,.027-.006.04q-.014.087-.024.174c0,.005,0,.011,0,.016h-.438c.037-.325.076-.652.1-.834.008-.063.015-.126.023-.19.3-2.318.706-4.763,1.1-7.128l.04-.238.014-.08q.137-.807.27-1.6l4.171.006a.307.307,0,0,1,.238.1c.789.91,1.514,1.739,2.216,2.535A.29.29,0,0,1,79.226,180.528Z"
                                            transform="translate(-50.773 -173.254)"
                                            fill="currentColor"
                                        />
                                    </g>
                                </g>
                                <g id="Group_134" data-name="Group 134" transform="translate(24.791 72.095)">
                                    <g id="Group_133" data-name="Group 133" transform="translate(0 0)">
                                        <path
                                            id="Path_110"
                                            data-name="Path 110"
                                            d="M394.788,254.861c-.576-.657-1.147-1.312-1.7-1.946a.8.8,0,0,0-.609-.274l-2.277,0h0a.931.931,0,0,0-.9.763l-.069.422c-.155.953-.316,1.939-.469,2.909h0a.791.791,0,0,0,.176.638.807.807,0,0,0,.616.278l4.313,0h0a.924.924,0,0,0,.9-.772c.08-.552.12-.828.2-1.381A.794.794,0,0,0,394.788,254.861Zm-.953,1.834-4.094,0c.144-.907.293-1.825.438-2.715l.062-.382,2.178,0c.518.6,1.056,1.216,1.6,1.835C393.946,255.924,393.907,256.2,393.835,256.695Z"
                                            transform="translate(-388.755 -252.638)"
                                            fill="currentColor"
                                        />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="shipping__style2--content">
                        <h2 class="shipping__style2--content__title">ACCEPT PAYMENT</h2>
                        <p class="shipping__style2--content__desc">Visa, Paypal, Master</p>
                    </div>
                </div>
                <div class="shipping__style2--items d-flex align-items-center">
                    <div class="shipping__style2--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30.014" height="35.242" viewBox="0 0 30.014 35.242">
                            <g id="refund" transform="translate(-37.974)">
                                <path
                                    id="Path_100"
                                    data-name="Path 100"
                                    d="M155.458,167.212h.952a.345.345,0,1,1,0,.69H154.9a.516.516,0,0,0,0,1.032h.6v.24a.516.516,0,0,0,1.032,0v-.246a1.378,1.378,0,0,0-.121-2.75h-.953a.345.345,0,0,1,0-.69h1.51a.516.516,0,1,0,0-1.032h-.436v-.24a.516.516,0,0,0-1.032,0v.24h-.041a1.378,1.378,0,1,0,0,2.755Z"
                                    transform="translate(-108.115 -152.432)"
                                    fill="currentColor"
                                />
                                <path
                                    id="Path_101"
                                    data-name="Path 101"
                                    d="M121.421,135.894a3.96,3.96,0,0,0,3.163-1.722,6.966,6.966,0,0,0,0-7.941,3.765,3.765,0,0,0-6.325,0,6.966,6.966,0,0,0,0,7.941A3.96,3.96,0,0,0,121.421,135.894Zm-3.372-5.693c0-2.57,1.513-4.661,3.372-4.661s3.373,2.091,3.373,4.661-1.513,4.66-3.373,4.66S118.049,132.771,118.049,130.2Z"
                                    transform="translate(-73.601 -115.938)"
                                    fill="currentColor"
                                />
                                <path
                                    id="Path_102"
                                    data-name="Path 102"
                                    d="M60.618,11.692h-.646v-1.31a.759.759,0,0,0-1.2-.616l-1.1.795V6.373l5.621,1.5a4.639,4.639,0,0,0,2.92,5.015.516.516,0,0,0,1.015.124l.69-2.59A2.306,2.306,0,0,0,66.276,7.6L64.023,7h0L57.665,5.3v-3A2.309,2.309,0,0,0,55.359,0H40.28a2.309,2.309,0,0,0-2.306,2.306V7.124a.516.516,0,1,0,1.032,0v-2A4.646,4.646,0,0,0,43.1,1.032h9.442a4.646,4.646,0,0,0,4.092,4.092V11.3l-2.84,2.045a1.168,1.168,0,0,0,0,1.9l2.84,2.045V23.4a4.646,4.646,0,0,0-4.092,4.092H43.1A4.646,4.646,0,0,0,39.007,23.4V9.189a.516.516,0,1,0-1.032,0V26.22a2.3,2.3,0,0,0,2.306,2.306h2.431a2.288,2.288,0,0,0,.249,1.684,2.315,2.315,0,0,0,.362.473l.04.039.02.019a2.291,2.291,0,0,0,.979.54l2.252.6.018,0,12.3,3.277q.112.03.225.048a2.306,2.306,0,0,0,2.6-1.683l.6-2.252,0-.011.9-3.374a.516.516,0,0,0-1-.266l-.776,2.914a4.639,4.639,0,0,0-5.008,2.9l-9.124-2.43a4.635,4.635,0,0,0-.311-2.484h8.319a2.3,2.3,0,0,0,2.306-2.306V18.033l1.1.795a.759.759,0,0,0,1.2-.616V16.9h.646a2.879,2.879,0,0,1,2.323,1.278,4.991,4.991,0,0,1,.92,2.905,4.3,4.3,0,0,1-4.5,4.3.542.542,0,0,0-.131,1.074,7.179,7.179,0,0,0,5.978-1.518,7.469,7.469,0,0,0,2.723-5.8A7.39,7.39,0,0,0,60.618,11.692Zm3.674-3.554L66.01,8.6a1.273,1.273,0,0,1,.9,1.558l-.458,1.718A3.613,3.613,0,0,1,64.292,8.138ZM39.007,4.084V2.306A1.275,1.275,0,0,1,40.28,1.032h1.778A3.613,3.613,0,0,1,39.007,4.084Zm17.626,0a3.613,3.613,0,0,1-3.051-3.051h1.811a1.275,1.275,0,0,1,1.24,1.273ZM40.28,27.494a1.273,1.273,0,0,1-1.273-1.273V24.443a3.613,3.613,0,0,1,3.051,3.051H40.28Zm6.066,3.248-1.718-.458a1.272,1.272,0,0,1-.9-1.558l.053-.2H45.89A3.606,3.606,0,0,1,46.346,30.742Zm12.644,1.264a3.576,3.576,0,0,1,2.226-.462l-.458,1.719a1.263,1.263,0,0,1-.592.774,1.264,1.264,0,0,1-.966.129l-1.718-.458A3.577,3.577,0,0,1,58.989,32.006Zm-2.356-5.786a1.273,1.273,0,0,1-1.273,1.273H53.582a3.613,3.613,0,0,1,3.051-3.051v1.778Zm7.92-2.081A6.286,6.286,0,0,1,63.186,25l.055-.052a5.286,5.286,0,0,0,1.652-3.859c0-2.508-1.635-5.216-4.275-5.216h-.712a.967.967,0,0,0-.966.966v.843l-1.49-1.073h0l-3.051-2.2a.135.135,0,0,1,0-.22l3.048-2.195.014-.01,1.481-1.067v.843a.967.967,0,0,0,.966.966h.712A6.357,6.357,0,0,1,66.9,19.141,6.44,6.44,0,0,1,64.553,24.14Z"
                                    fill="currentColor"
                                />
                            </g>
                        </svg>
                    </div>
                    <div class="shipping__style2--content">
                        <h2 class="shipping__style2--content__title">RETURN POLICY</h2>
                        
                    </div>
                </div>
                <div class="shipping__style2--items d-flex align-items-center">
                    <div class="shipping__style2--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30.326" height="33.112" viewBox="0 0 30.326 33.112">
                            <g id="support" transform="translate(-17.756)">
                                <g id="Group_118" data-name="Group 118" transform="translate(17.756)">
                                    <path
                                        id="Path_81"
                                        data-name="Path 81"
                                        d="M44.886,13.687H44.8V11.679a11.679,11.679,0,0,0-23.359,0v2.008h-.492a3.337,3.337,0,0,0-3.2,3.442v5.122a3.237,3.237,0,0,0,3.154,3.319h3.075a.779.779,0,0,0,.741-.814c0-.015,0-.031,0-.046V14.671c0-.492-.287-.984-.738-.984h-.9V11.679a10.04,10.04,0,0,1,20.08,0v2.008h-.9c-.451,0-.738.492-.738.984v10.04a.779.779,0,0,0,.691.857l.046,0h.943l-.082.123a6.475,6.475,0,0,1-5.2,2.582,4.057,4.057,0,0,0-8.032.779,4.1,4.1,0,0,0,4.1,4.057,4.221,4.221,0,0,0,2.951-1.27,3.606,3.606,0,0,0,.984-1.967,8.114,8.114,0,0,0,6.516-3.237l.779-1.147a2.79,2.79,0,0,0,2.869-2.828V17.539C48.083,15.777,46.771,13.687,44.886,13.687Zm-21.8,10.245H20.954A1.6,1.6,0,0,1,19.4,22.3c0-.015,0-.029,0-.044V17.13a1.7,1.7,0,0,1,1.557-1.8h2.131Zm12.663,6.762a2.418,2.418,0,0,1-1.762.779,2.5,2.5,0,0,1-2.459-2.418,2.418,2.418,0,1,1,4.836,0v0A2.172,2.172,0,0,1,35.748,30.694Zm10.7-8.032c0,1.106-1.065,1.27-1.557,1.27H43.165V15.326h1.721c.9,0,1.557,1.27,1.557,2.213Z"
                                        transform="translate(-17.756)"
                                        fill="currentColor"
                                    />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="shipping__style2--content">
                        <h2 class="shipping__style2--content__title">24/7 SUPPORT</h2>

                        <p class="shipping__style2--content__desc">Support every time</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->

    <!-- Start Newsletter banner section -->
    <section class="newsletter__banner--section color-scheme-2">
        <div class="container-fluid">
            <div class="newsletter__banner--thumbnail position__relative">
                <img class="newsletter__banner--thumbnail__img" src="https://images.pexels.com/photos/4022121/pexels-photo-4022121.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="newsletter-banner" />
                <div class="newsletter__content style2 newsletter__subscribe">
                    <h5 class="newsletter__content--subtitle text-white">Want to offer regularly ?</h5>
                    <h2 class="newsletter__content--title text-white h3 mb-25">
                        Subscribe Our Newsletter <br />
                        for Get Daily Update
                    </h2>
                    <form class="newsletter__subscribe--form position__relative newsletter_subscribe" action="{{url('subcribe_email')}}" autocomplete="off">
                        @csrf
                        <label>
                            <input class="newsletter__subscribe--input border-radius-20" placeholder="Enter your email address" value="" name="email" type="email" / required>
                        </label>
                        <button class="newsletter__subscribe--button primary__btn btn__style2" type="submit">
                            Subscribe
                            <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg" width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                <path data-name="Icon material-send" d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z" transform="translate(-3 -4.5)" fill="currentColor" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Newsletter banner section -->



</main>



@endsection