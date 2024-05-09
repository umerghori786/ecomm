@extends('layout')

@section('content')


 <main class="main__content_wrapper"> 
    
    <!-- Start breadcrumb section -->
    <!--<section class="breadcrumb__section breadcrumb__bg">
        <div class="container-fluid">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Shop Left</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Shop Left Sidebar</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End breadcrumb section -->
    <!-- Start offcanvas filter sidebar -->
    <div class="offcanvas__filter--sidebar widget__area">
        <button type="button" class="offcanvas__filter--close">
            <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path></svg> <span class="offcanvas__filter--close__text">Close</span>
        </button>
        <div class="offcanvas__filter--sidebar__inner">
            <div class="single__widget widget__bg">
                <h2 class="widget__title position__relative h3">Search</h2>
                <form id="searchProductFormSmallScreen" autocomplete="off" class="widget__search--form" >
                    <label>
                        <input name="searchProductindexSmallScreen" class="widget__search--form__input border-0" placeholder="Search by" type="text">
                    </label>
                    <button class="widget__search--form__btn"  type="submit">
                        Search 
                    </button>
                </form>
            </div>
            <div class="single__widget widget__bg">
                <h2 class="widget__title position__relative h3">Categories</h2>
                <ul class="widget__categories--menu">
                    @forelse($categories as $category)
                    <li class="widget__categories--menu__list">
                        <label class="widget__categories--menu__label d-flex align-items-center">
                            <img class="widget__categories--menu__img" src="{{asset('newtheme/assets/img/product/small-product1.webp')}}" alt="categories-img">
                            <span class="widget__categories--menu__text">{{$category->title}}</span>
                            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                            </svg>
                        </label>
                        <ul class="widget__categories--sub__menu">
                            @forelse($category->subcategories as $subcat)
                            <li class="widget__categories--sub__menu--list">
                                <a class="widget__categories--sub__menu--link d-flex align-items-center" href="{{route('allproducts.index',['subcategory_id'=>$subcat->id])}}">
                                    <img class="widget__categories--sub__menu--img" src="{{asset('newtheme/assets/img/product/small-product2.webp')}}" alt="categories-img">
                                    <span class="widget__categories--sub__menu--text">{{$subcat->title}}</span>
                                </a>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="single__widget price__filter widget__bg">
                <h2 class="widget__title position__relative h3">Filter By Price</h2>
                <form id="fromToPriceSmallScreen" class="price__filter--form" autocomplete="off"> 
                    <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                        <div class="price__filter--group">
                            <label class="price__filter--label" for="Filter-Price-GTE2">From</label>
                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                <span class="price__filter--currency">$</span>
                                <input class="price__filter--input__field border-0" id="Filter-Price-GTE2" name="fromSmallScreen" value="0"  type="number" placeholder="0" min="0" >
                            </div>
                        </div>
                        <div class="price__divider">
                            <span>-</span>
                        </div>
                        <div class="price__filter--group">
                            <label class="price__filter--label" for="Filter-Price-LTE2">To</label>
                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                <span class="price__filter--currency">$</span>
                                <input class="price__filter--input__field border-0" id="Filter-Price-LTE2" name="toSmallScreen" value="" required  type="number" min="0" placeholder="250.00" > 
                            </div>  
                        </div>
                    </div>
                    <button class="price__filter--btn primary__btn" type="submit">Filter</button>
                </form>
            </div>
            
            <div class="single__widget widget__bg">
                <h2 class="widget__title position__relative h3">Top Rated Product</h2>
                <div class="product__grid--inner">
                    @if(count($trending_products) > 0)
                    @foreach($trending_products as $trending)
                    <div class="product__items product__items--grid d-flex align-items-center">
                        <div class="product__items--grid__thumbnail position__relative">
                            <a class="product__items--link" href="{{route('allproducts.show',[$trending->slug])}}">
                                <img class="product__items--img product__primary--img" src="{{$trending->images[0]->url}}" alt="product-img">
                                <img class="product__items--img product__secondary--img" src="{{$trending->images[1]->url}}" alt="product-img">
                            </a>
                        </div>
                        <div class="product__items--grid__content">
                            <h3 class="product__items--content__title h4"><a href="{{route('allproducts.show',[$trending->slug])}}">{{$trending->title}}</a></h3>
                            <div class="product__items--price">
                                <span class="current__price">{{config('app.currency')}}{{$trending->discount_price}}</span>
                            </div>
                            <div class="product__details--info__rating d-flex align-items-center mb-15">
                                <div class="rating product__list--rating d-flex">
                                @for($i = 1 ; $i <= (int)number_format($trending->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                    <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                @endfor
                                @for($i = 1 ; $i <= (int) 5 - number_format($trending->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                @endfor
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
    <!-- End offcanvas filter sidebar -->

    <!-- Start shop section -->
    <section class="shop__section section--padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="shop__sidebar--widget widget__area d-md-none">
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title position__relative h3">Search</h2>
                            <form id="searchProductForm" class="widget__search--form" autocomplete="off">
                                <label>
                                    <input name="searchProductindex" class="widget__search--form__input border-0" value="" placeholder="Search by" type="text" required>
                                </label>
                                <button class="widget__search--form__btn searchProductButton"  type="submit">
                                    Search 
                                </button>
                            </form>
                        </div>
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title position__relative h3">Categories</h2>
                            <ul class="widget__categories--menu">
                                @forelse($categories as $category)
                                <li class="widget__categories--menu__list">
                                    <label class="widget__categories--menu__label d-flex align-items-center">
                                        <img class="widget__categories--menu__img" src="{{asset('newtheme/assets/img/product/small-product1.webp')}}" alt="categories-img">
                                        <span class="widget__categories--menu__text">{{$category->title}}</span>
                                        <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                            <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                        </svg>
                                    </label>
                                    <ul class="widget__categories--sub__menu">
                                        @forelse($category->subcategories as $subcat)
                                        <li class="widget__categories--sub__menu--list">
                                            <a class="widget__categories--sub__menu--link d-flex align-items-center" href="{{route('allproducts.index',['subcategory_id'=>$subcat->id])}}">
                                                <img class="widget__categories--sub__menu--img" src="{{asset('newtheme/assets/img/product/small-product2.webp')}}" alt="categories-img">
                                                <span class="widget__categories--sub__menu--text">{{$subcat->title}}</span>
                                            </a>
                                        </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </li>
                                @empty
                                @endforelse
                                
                            </ul>
                        </div>
                        <div class="single__widget price__filter widget__bg">
                            <h2 class="widget__title position__relative h3">Filter By Price</h2>
                            <form id="fromToPrice" class="price__filter--form"> 
                                <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                    <div class="price__filter--group">
                                        <label class="price__filter--label" for="Filter-Price-GTE1">From</label>
                                        <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                            <span class="price__filter--currency">$</span>
                                            <input name="from" value="0" class="price__filter--input__field border-0" id="Filter-Price-GTE1"  type="number" placeholder="0" min="0" >
                                        </div>
                                    </div>
                                    <div class="price__divider">
                                        <span>-</span>
                                    </div>
                                    <div class="price__filter--group">
                                        <label class="price__filter--label" for="Filter-Price-LTE1">To</label>
                                        <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                            <span class="price__filter--currency">$</span>
                                            <input name="to" value="" required class="price__filter--input__field border-0" id="Filter-Price-LTE1"  type="number" min="0" placeholder="250.00" > 
                                        </div>	
                                    </div>
                                </div>
                                <button class="price__filter--btn primary__btn" type="submit">Filter</button>
                            </form>
                        </div>
                        
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title position__relative h3">Top Rated Product</h2>
                            <div class="product__grid--inner">
                                @if(count($trending_products) > 0)
                                @foreach($trending_products as $trending)
                                <div class="product__items product__items--grid d-flex align-items-center">
                                    <div class="product__items--grid__thumbnail position__relative">
                                        <a class="product__items--link" href="{{route('allproducts.show',[$trending->slug])}}">
                                            <img class="product__items--img product__primary--img" src="{{$trending->images[0]->url}}" alt="product-img">
                                            <img class="product__items--img product__secondary--img" src="{{$trending->images[1]->url}}" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product__items--grid__content">
                                        <h3 class="product__items--content__title h4"><a href="{{route('allproducts.show',[$trending->slug])}}">{{$trending->title}}</a></h3>
                                        <div class="product__items--price">
                                            <span class="current__price">{{config('app.currency')}}{{$trending->discount_price}}</span>
                                        </div>
                                        <div class="product__details--info__rating d-flex align-items-center mb-15">
                                            <div class="rating product__list--rating d-flex">
                                                @for($i = 1 ; $i <= (int)number_format($trending->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                        <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                @endfor
                                                @for($i = 1 ; $i <= (int) 5 - number_format($trending->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                @endfor
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
                <div class="col-xl-9 col-lg-8">
                    <div class="shop__header bg__gray--color d-flex align-items-center justify-content-between mb-30">
                        <button class="widget__filter--btn d-none d-md-flex align-items-center">
                            <svg  class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"/><circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/><circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"/></svg> 
                            <span class="widget__filter--btn__text">Filter</span>
                        </button>
                        <div class="product__view--mode d-flex align-items-center">
                            
                            <div class="product__view--mode__list product__short--by align-items-center d-none d-lg-flex">
                                <label class="product__view--label">Sort By :</label>
                                <div class="select shop__header--select">
                                    <select id="sortBy" class="product__view--select">
                                        <option selected value="latest">Sort by latest</option>
                                        <option value="trending">Sort by trending</option>
                                        <option value="highToLow">Sort by price high to low</option>
                                        <option value="lowToHigh">Sort by  price low to high </option>
                                    </select>
                                </div>
                            </div>
                            <div class="product__view--mode__list">
                                <div class="product__grid--column__buttons d-flex justify-content-center">
                                    <button class="product__grid--column__buttons--icons active" data-toggle="tab" aria-label="product grid btn" data-target="#product_grid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                            <g  transform="translate(-1360 -479)">
                                              <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4" transform="translate(1360 479)" fill="currentColor"/>
                                              <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4" transform="translate(1360 484)" fill="currentColor"/>
                                              <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4" transform="translate(1365 479)" fill="currentColor"/>
                                              <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4" transform="translate(1365 484)" fill="currentColor"/>
                                            </g>
                                          </svg>
                                    </button>
                                    <button class="product__grid--column__buttons--icons" data-toggle="tab" aria-label="product list btn" data-target="#product_list">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 13 8">
                                            <g id="Group_14700" data-name="Group 14700" transform="translate(-1376 -478)">
                                              <g  transform="translate(12 -2)">
                                                <g id="Group_1326" data-name="Group 1326">
                                                  <rect id="Rectangle_5729" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"/>
                                                  <rect id="Rectangle_5730" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"/>
                                                </g>
                                                <g id="Group_1328" data-name="Group 1328" transform="translate(0 -3)">
                                                  <rect id="Rectangle_5729-2" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"/>
                                                  <rect id="Rectangle_5730-2" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"/>
                                                </g>
                                                <g id="Group_1327" data-name="Group 1327" transform="translate(0 -1)">
                                                  <rect id="Rectangle_5731" data-name="Rectangle 5731" width="3" height="2" transform="translate(1364 487)" fill="currentColor"/>
                                                  <rect id="Rectangle_5732" data-name="Rectangle 5732" width="9" height="2" transform="translate(1368 487)" fill="currentColor"/>
                                                </g>
                                              </g>
                                            </g>
                                          </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <p class="product__showing--count">Showing 1–{{$products->count()}} of {{$products->total()}} results</p>
                    </div>
                    <div class="shop__product--wrapper">
                        <div class="tab_content">
                            <div id="product_grid" class="tab_pane active show">
                                <div class="product__section--inner product__grid--inner">
                                    <div class="row row-cols-xxl-4 row-cols-xl-3 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--n30">

                                        @forelse($products as $product)
                                        <div class="col mb-30">
                                            <div class="product__items ">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="{{route('allproducts.show',[$product->slug])}}">
                                                        <img class="product__items--img product__primary--img" src="{{$product->images[0]->url}}" alt="product-img">
                                                        <img class="product__items--img product__secondary--img" src="{{$product->images[1]->url}}" alt="product-img">
                                                    </a>
                                                    <div class="product__badge">
                                                        <span class="product__badge--items sale">New</span>
                                                    </div>
                                                    <ul class="product__items--action d-flex justify-content-center">
                                                        <li class="product__items--action__list">
                                                            <a class="product__items--action__btn"  href="{{route('allproducts.show',[$product->slug])}}">
                                                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                                <span class="visually-hidden">Quick View</span>
                                                            </a>
                                                        </li>
                                                        <li class="product__items--action__list">
                                                            <a class="product__items--action__btn"  onclick="addToCart(`{{$product->id}}`)">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.51" height="15.443" viewBox="0 0 18.897 21.565">
                                                                    <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"/>
                                                                </svg>
                                                                <span class="visually-hidden">Add to cart</span>
                                                            </a>
                                                        </li>
                                                        <li class="product__items--action__list">
                                                            <a class="product__items--action__btn"  onclick="addToWishlist(`{{$product->id}}`)">
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
                                                    <a class="product__items--action__cart--btn primary__btn" onclick="addToCart(`{{$product->id}}`)">
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
                                </div>
                            </div>
                            <div id="product_list" class="tab_pane">
                                <div class="product__section--inner">
                                    <div class="row row-cols-1 mb--n30">
                                        @forelse($products as $product)
                                        <div class="col mb-30">
                                            <div class="product__items product__list--items border-radius-5 d-flex align-items-center">
                                                <div class="product__list--items__left d-flex align-items-center">
                                                    <div class="product__items--thumbnail product__list--items__thumbnail">
                                                        <a class="product__items--link" href="{{route('allproducts.show',[$product->slug])}}">
                                                            <img class="product__items--img product__primary--img" src="{{$product->images[0]->url}}" alt="product-img">
                                                            <img class="product__items--img product__secondary--img" src="{{$product->images[1]->url}}" alt="product-img">
                                                        </a>
                                                        <div class="product__badge">
                                                            <span class="product__badge--items sale">New</span>
                                                        </div>
                                                    </div>
                                                    <div class="product__list--items__content">
                                                        <span class="product__items--content__subtitle mb-5">{{$product->subcategory->title}}</span>
                                                        <h4 class="product__list--items__content--title mb-15"><a href="{{route('allproducts.show',[$product->slug])}}">{{$product->title}}</a></h4>
                                                        <p class="product__list--items__content--desc m-0">{!! \Illuminate\Support\Str::limit($product->short_description , 155) !!}</p>
                                                    </div>
                                                </div>
                                                <div class="product__list--items__right">
                                                    <span class="product__list--current__price">{{config('app.currency')}}{{$product->discount_price}}</span>
                                                    <ul class="rating product__list--rating d-flex">
                                                        @for($i = 1 ; $i <= (int)number_format($product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                            <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                        @endfor
                                                        @for($i = 1 ; $i <= (int) 5 - number_format($product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                        <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                                        @endfor
                                                    </ul>
                                                    <div class="product__list--action">
                                                        <a class="product__list--action__cart--btn primary__btn" onclick="addToCart(`{{$product->id}}`)">
                                                            <svg class="product__list--action__cart--btn__icon" xmlns="http://www.w3.org/2000/svg" width="16.897" height="17.565" viewBox="0 0 18.897 21.565">
                                                                <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"></path>
                                                            </svg>
                                                            <span class="product__list--action__cart--text"> Add To Cart</span>
                                                        </a>
                                                        <ul class="product__list--action__wrapper d-flex align-items-center">
                                                            <li class="product__list--action__child">
                                                                
                                                            </li>
                                                            
                                                            <li class="product__list--action__child">
                                                                <a class="product__list--action__btn"  onclick="addToWishlist(`{{$product->id}}`)">
                                                                    <svg class="product__list--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="24.403" height="20.204" viewBox="0 0 24.403 20.204">
                                                                        <g  transform="translate(0)">
                                                                          <g  data-name="Group 473" transform="translate(0 0)">
                                                                            <path  data-name="Path 242" d="M17.484,35.514h0a6.858,6.858,0,0,0-5.282,2.44,6.765,6.765,0,0,0-5.282-2.44A6.919,6.919,0,0,0,0,42.434c0,6.549,11.429,12.943,11.893,13.19a.556.556,0,0,0,.618,0c.463-.247,11.893-6.549,11.893-13.19A6.919,6.919,0,0,0,17.484,35.514ZM12.2,54.388C10.41,53.338,1.236,47.747,1.236,42.434A5.684,5.684,0,0,1,6.919,36.75a5.56,5.56,0,0,1,4.757,2.564.649.649,0,0,0,1.05,0,5.684,5.684,0,0,1,10.441,3.12C23.168,47.809,13.993,53.369,12.2,54.388Z" transform="translate(0 -35.514)" fill="currentColor"/>
                                                                          </g>
                                                                        </g>
                                                                    </svg>
                                                                    <span class="visually-hidden">Wishlist</span>
                                                                </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination__area bg__gray--color">
                            @if ($products->hasPages())
                            <nav class="pagination">
                                <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                                    @if (!$products->onFirstPage())
                                    <li class="pagination__list"><a href="{{$products->previousPageUrl()}}" class="pagination__item--arrow  link ">
                                        <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg></a>
                                    <li>
                                    @endif

                                    @foreach($products->getUrlRange(1 , $products->lastPage()) as $key => $url)
                                    @if($key <= 6)
                                    <a href="{{$url}}"><li class="pagination__list"><span class=" @if(($key == 1 && !request()->has('page')) || request()->get('page') == $key) pagination__item pagination__item--current @else pagination__item link @endif" >{{$key}}</span></li></a>
                                    @endif
                                    @endforeach
                                    
                                    @if (!$products->onLastPage())
                                    <li class="pagination__list"><a href="{{$products->nextPageUrl()}}" class="pagination__item--arrow  link ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"/></svg></a>
                                    <li>
                                    @endif    
                                </ul>
                            </nav>
                            @endif
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shop section -->

   <!-- Start Newsletter banner section -->
    <section class="newsletter__banner--section section--padding pt-0">
        <div class="container-fluid">
            <div class="newsletter__banner--thumbnail position__relative">
                <img class="newsletter__banner--thumbnail__img" src="{{asset('newtheme/assets/img/banner/banner-bg2.webp')}}" alt="newsletter-banner">
                <div class="newsletter__content newsletter__subscribe">
                    <h5 class="newsletter__content--subtitle text-white">Want to offer regularly ?</h5>
                    <h2 class="newsletter__content--title text-white h3 mb-25">Subscribe Our Newsletter <br>
                        for Get Daily Update</h2>
                    <form class="newsletter__subscribe--form position__relative" action="#">
                        <label>
                            <input class="newsletter__subscribe--input" placeholder="Enter your email address" type="email">
                        </label>
                        <button class="newsletter__subscribe--button primary__btn" type="submit">Subscribe
                            <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg" width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                <path  data-name="Icon material-send" d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z" transform="translate(-3 -4.5)" fill="currentColor"/>
                            </svg>
                        </button>
                    </form>   
                </div>
            </div>
        </div>
    </section>
    <!-- End Newsletter banner section -->
</main> 


@push('script')

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','#sortBy',function(){

            var subcategory_id = `{{request('subcategory_id')}}`;
            var category_id = `{{request('category_id')}}`;
            location.href = '{{url()->current()}}?type=' + $(this).val()+'&subcategory_id='+subcategory_id + '&category_id='+category_id;
        })
        @if(request('type') != "")
        $('#sortBy').find('option[value="' + "{{request('type')}}" + '"]').attr('selected', true);
        @endif
    })

    $('#searchProductForm').submit(function(e){
        e.preventDefault()
        var search = $('input[name~="searchProductindex"]').val()
        location.href = '{{url()->current()}}?search=' + search;
    })
    
    $('#searchProductFormSmallScreen').submit(function(e){
        e.preventDefault()
        var search = $('input[name~="searchProductindexSmallScreen"]').val()
        location.href = '{{url()->current()}}?search=' + search;
    })

    $("#fromToPrice").submit(function(e){

        e.preventDefault()
        var from = $('input[name~="from"]').val()
        var to = $('input[name~="to"]').val()

        var subcategory_id = `{{request('subcategory_id')}}`;
        var category_id = `{{request('category_id')}}`;

        location.href = '{{url()->current()}}?from=' + from + '&to=' + to+'&subcategory_id='+subcategory_id + '&category_id='+category_id;;
    })
    $("#fromToPriceSmallScreen").submit(function(e){

        e.preventDefault()
        var from = $('input[name~="fromSmallScreen"]').val()
        var to = $('input[name~="toSmallScreen"]').val()

        var subcategory_id = `{{request('subcategory_id')}}`;
        var category_id = `{{request('category_id')}}`;

        location.href = '{{url()->current()}}?from=' + from + '&to=' + to+'&subcategory_id='+subcategory_id + '&category_id='+category_id;;
    })

    
    

    
</script>
@endpush

@endsection