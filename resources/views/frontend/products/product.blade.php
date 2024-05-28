@extends('layout')

@section('content')

<!-- Quickview Wrapper -->
    <main class="main__content_wrapper">
            
            <!-- Start breadcrumb section -->
            
            <!-- End breadcrumb section -->

            <!-- Start product details section -->
            <section class="product__details--section section--padding">
                <div class="container">
                    <div class="row row-cols-lg-2 row-cols-md-2">
                        <div class="col">
                            <div class="product__details--media">
                                <div class="product__media--preview  swiper">
                                    <div class="swiper-wrapper">

                                        @forelse($product->images as $image)
                                        <div class="swiper-slide">
                                            <div class="product__media--preview__items">
                                                <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{$image->url}}"><img class="product__media--preview__items--img" src="{{$image->url}}" alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox" href="{{$image->url}}" data-gallery="product-media-preview">
                                                        <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                        <span class="visually-hidden">Media Gallery</span>
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
                                        
                                    </div>
                                </div>
                                <div class="product__media--nav swiper">
                                    <div class="swiper-wrapper">
                                        @forelse($product->images as $image)
                                        <div class="swiper-slide">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img" src="{{$image->url}}" alt="product-nav-img">
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse

                                        
                                    </div>
                                    <div class="swiper__nav--btn swiper-button-next"></div>
                                    <div class="swiper__nav--btn swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>   
                        <div class="col">
                            <div class="product__details--info">
                                
                                    <h2 class="product__details--info__title mb-15">{{$product->title}}</h2>
                                    <div class="product__details--info__price mb-10">
                                        <span class="current__price">{{config('app.currency')}}{{$product->discount_price}}</span>
                                        <span class="old__price">{{config('app.currency')}}{{$product->strike_price}}</span>
                                    </div>
                                    <div class="product__details--info__rating d-flex align-items-center mb-15">
                                        <div class="rating product__list--rating d-flex">
                                            @for($i = 1 ; $i <= (int)number_format($product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                                <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                            @endfor
                                            @for($i = 1 ; $i <= (int) 5 - number_format($product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                            <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="product__details--info__desc mb-20">{{$product->short_description}}</p>
                                    
                                    
                                    
                                    
                                    
                                    
                                    <div class="product__variant">
                                        
                                        
                                        
                                        
                                        @if(isset($product->color_id))
                                        <div class="product__variant--list mb-15">
                                            <div class="product__details--info__meta">
                                                <p class="product__details--info__meta--list"><strong>Color:</strong>

                                                    @foreach($product->result(explode(',',$product->color_id)) as $key=> $color)
                                                    
                                                    
                                                    <span class="single-item @if(isset($cart) && isset($cart[$product->id]) && isset($cart[$product->id]['color'])) @if($cart[$product->id]['color']  == $color) active @endif @endif product-color" id="{{$color}}">{{$color}}</span>
                                                     
                                                    <input type="hidden" @if(isset($cart) && isset($cart[$product->id]) && isset($cart[$product->id]['color'])) value="{{$cart[$product->id]['color']}}" @endif  name="product_color"> 
                                                    
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        @if(isset($product->clothsize_id))
                                        <div class="product__variant--list mb-15">
                                            <div class="product__details--info__meta">
                                                <p class="product__details--info__meta--list"><strong>Size:</strong>
                                                    @foreach($product->result(explode(',',$product->clothsize_id)) as $key=> $cloth)
                                                    <span class="single-item @if($key == 0) active @endif cloth_size" id="{{$cloth}}">{{$cloth}}</span>
                                                    @if($key == 0)
                                                    <input type="hidden"  value="{{$cloth}}"  name="cloth_size"> 
                                                    @endif
                                                    @endforeach
                                                    
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                        @if(isset($product->shoesize_id))
                                        <div class="product__variant--list mb-15">
                                            <div class="product__details--info__meta">
                                                <p class="product__details--info__meta--list"><strong>Size:</strong>
                                                    @foreach($product->result(explode(',',$product->shoesize_id)) as $key=> $shoe)
                                                    <span class="single-item @if($key == 0) active @endif shoe_size" id="{{$shoe}}">{{$shoe}}</span>
                                                     @if($key == 0)
                                                    <input type="hidden" value="{{$shoe}}" name="shoe_size"> 
                                                    @endif
                                                    @endforeach
                                                    
                                                </p>
                                            </div>
                                        </div>
                                        @endif
                                        
                                        
                                        
                                        
                                        
                                        <br/>
                                        
                                        
                                        <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                            <div class="quantity__box">
                                                <button type="button" class="quantity__value quickview__value--quantity decreaseq" aria-label="quantity value" value="Decrease Value">-</button>
                                                <label>
                                                    @php 
                                                    $quantity = 1;
                                                    if(session('cart')){

                                                        $quantity = request()->session()->get('cart')[$product->id]['quantity'] ?? 1 ;
                                                        
                                                    }
                                                        
                                                    
                                                    @endphp
                                                    <input type="number" class="quantity__number show-product-quantity quickview__value--number" value="{{$quantity}}" name="product-quantity" />
                                                </label>
                                                <button type="button" class="quantity__value quickview__value--quantity increaseq" aria-label="quantity value" value="Increase Value">+</button>
                                            </div>
                                            <button class="quickview__cart--btn primary__btn" type="submit" onclick="addToCart(`{{$product->id}}`)">Add To Cart</button>  
                                        </div>
                                        <div class="product__variant--list mb-15">
                                            <a class="variant__wishlist--icon mb-15" onclick="addToWishlist(`{{$product->id}}`)" title="Add to wishlist">
                                                <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                Add to Wishlist
                                            </a>
                                            <!--<button class="variant__buy--now__btn primary__btn" type="submit">Buy it now</button>-->
                                        </div>
                                        <div class="product__variant--list mb-15">
                                            <div class="product__details--info__meta">
                                                <p class="product__details--info__meta--list"><strong>Type:</strong>  <span>{{$product->subcategory->category->title}}</span> </p>
                                            </div>
                                            
                                        </div>

                                        @php  $cart = request()->session()->get('cart',[]);   @endphp
                                        


                                    </div>
                                    
                                    <div class="guarantee__safe--checkout">
                                        <h5 class="guarantee__safe--checkout__title">Guaranteed Safe Checkout</h5>
                                        <img class="guarantee__safe--checkout__img" src="https://escuela-ray-bolivar-sosa.com/assets/img/banner/p-1.jpg" alt="Payment Image">
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End product details section -->

            <!-- Start product description section -->
            <section class="product__details--tab__section section--padding">
                <div class="container">
                    <div class="product__descriptions">
                        <h3 class="product__reviews--header__title mb-20">Description</h3>
                        <div class="product__tab--content">
                            <div class="product__tab--content__items mb-40 d-flex align-items-center">
                                <div class="product__tab--content__thumbnail">
                                    <img class="product__tab--content__thumbnail--img display-block" src="{{$product->images[0]->url}}" alt="product-tab">
                                </div>
                                <div class="product__tab--content__right">
                                    <div class="product__tab--content__step mb-20">
                                        <h4 class="product__tab--content__title">{{$product->title}}</h4>
                                        <p class="product__tab--content__desc">{!! $product->long_description !!}</p>
                                    </div>
                                    
                                </div>
                            </div> 
                        </div>
                    </div> 
                </div>
            </section>
            <!-- End product details tab section -->


            <!-- Start product review section -->
            <section class="section--padding">
                <div class="container">

                    <div class="product__reviews">
                        <div class="product__reviews--header">
                            <h3 class="product__reviews--header__title mb-20">Customer Reviews</h3>

                            <div class="reviews__ratting d-flex align-items-center">
                                <ul class="rating d-flex">
                                    @for($i = 1 ; $i <= (int)number_format($product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                        <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                    @endfor
                                    @for($i = 1 ; $i <= (int) 5 - number_format($product->reviews()->get()->pluck('rating')->avg() ?? 5); $i++)
                                    <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                    @endfor
                                </ul>
                                <span class="reviews__summary--caption">Based on {{$product->reviews()->count() ?? 0}} reviews</span>
                            </div>
                            <a class="actions__newreviews--btn primary__btn" >Write A Review</a>
                        </div>
                        <div id="writereview" class="reviews__comment--reply__area d-none mb-60">
                            <form id="ratingFormSubmit" action="{{route('review.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="rating" value="">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <h3 class="reviews__comment--reply__title mb-15">Add a review </h3>
                                <div class="reviews__ratting d-flex align-items-center mb-20">
                                    <div class="rating d-flex">
                                        <i class="far fa-star fa-sm mr-2 star-1 review-count" style="color: rgb(250 204 21); cursor: pointer;" id="1"></i>
                                        <i class="far fa-star fa-sm mr-2 star-2 review-count" style="color: rgb(250 204 21); cursor: pointer;" id="2"></i>
                                        <i class="far fa-star fa-sm mr-2 star-3 review-count" style="color: rgb(250 204 21); cursor: pointer;" id="3"></i>
                                        <i class="far fa-star fa-sm mr-2 star-4 review-count" style="color: rgb(250 204 21); cursor: pointer;" id="4"></i>
                                        <i class="far fa-star fa-sm mr-2 star-5 review-count" style="color: rgb(250 204 21); cursor: pointer;" id="5"></i>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-10">
                                        <textarea name="content" class="reviews__comment--reply__textarea" placeholder="Your Comments...." required ></textarea>
                                    </div> 
                                    <div class="col-lg-6 col-md-6 mb-15">
                                        <label>
                                    <input class="reviews__comment--reply__input" placeholder="Your Name...." name="name" required value="" type="text">
                                </label>
                                    </div>  
                                    <div class="col-lg-6 col-md-6 mb-15">
                                        <label>
                                    <input class="reviews__comment--reply__input" placeholder="Your Email...." name="email"  type="email">
                                </label>
                                    </div>  
                                </div>
                                <button class="text-white primary__btn" data-hover="Submit" type="submit">SUBMIT</button>
                            </form>   
                        </div> 
                        <div class="reviews__comment--area" id="reviews__comment--area">
                            @forelse($product->reviews as $review)
                            <div class="reviews__comment--list d-flex">
                                <div class="reviews__comment--thumbnail">
                                    <p class="user-short-name">
                                        {{ltrim($review->name)[0] ?? 'U'}}
                                    </p>
                                </div>
                                <div class="reviews__comment--content">
                                    <h4 class="reviews__comment--content__title">{{$review->name}}</h4>
                                    <div class="rating reviews__comment--rating d-flex mb-5">
                                        @for($i = 1 ; $i <= (int)$review->rating; $i++)
                                        <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                        @endfor
                                        @for($i = 1 ; $i <= (int) 5 - $review->rating; $i++)
                                        <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
                                        @endfor
                                    </div>
                                    <p class="reviews__comment--content__desc">{{$review->content}}</p>
                                    <span class="reviews__comment--content__date">{{$review->created_at->diffForHumans()}}</span>

                                    @if(\Auth::check() && auth()->user()->isAdmin())
                                    <div class="text-right">
                                        <button class="text-white primary__btn text-red-600">Reply</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- replay comment -->
                            <div class="reviews__comment--list reply-on-review-admin margin__left flex gap-10" style="display: none;">
                                
                                <div id="writereview" class="reviews__comment--reply__area col-10">
                                    <form id="ReplyOnReviewForm" action="{{route('review.replay')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="review_id" value="{{$review->id}}">
                                        <div class="mb-5">
                                            <textarea class="reviews__comment--reply__textarea" placeholder="Your Reply...." name="content" required></textarea>
                                        </div> 
                                        <button type="submit" class="text-white primary__btn">SUBMIT</button>
                                    </form>   
                                </div> 
                            </div>

                            @forelse($review->replys as $reply)
                            <div class="reviews__comment--list margin__left d-flex">
                                <div class="reviews__comment--thumbnail">
                                    <img src="https://cdn-icons-png.flaticon.com/128/9322/9322043.png" alt="comment-thumbnail">
                                </div>
                                <div class="reviews__comment--content">
                                    <h4 class="reviews__comment--content__title">Admin</h4>
                                    
                                    <p class="reviews__comment--content__desc">{{$reply->content}}</p>
                                    <span class="reviews__comment--content__date">{{$reply->created_at->diffForHumans()}}</span>
                                    
                                </div>
                            </div>
                            @empty
                            @endforelse

                            @empty
                            @endforelse
                            
                            

                        </div>
                        
                    </div>    

                </div>
            </section>
            <!-- End product details tab section -->




            <!-- Start product section -->
            <section class="product__section section--padding">
                <div class="container">
                    <div class="section__heading text-center mb-40">
                        <h2 class="section__heading--maintitle">You may also like</h2>
                    </div>
                    <div class="product__section--inner product__swiper--column4 swiper">

                        
                        <div class="swiper-wrapper">
                            @forelse($similar_products as $similar_product)
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
                                                <a class="product__items--action__btn" href="{{route('allproducts.show',[$similar_product->slug])}}">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                    <span class="visually-hidden">Quick View</span>
                                                </a>
                                            </li>
                                            <li class="product__items--action__list">
                                                <a class="product__items--action__btn" onclick="addToWishlist(`{{$similar_product->id}}`)">
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
       


@push('script')
<script type="text/javascript">
    

    $(document).on('mouseenter', '.review-count', function () {
    var rating = $(this).attr('id');
    addrating(rating);
    });
    $(document).on('click', '.review-count', function () {
    var rating = $(this).attr('id');
    addrating(rating);
    });
    function addrating(rating)
    {   
        var rating = rating
        $("input[name~='rating']").val(rating)
        $('.review-count').removeClass('fas').addClass('far');
        for(let i = 1 ; i <= rating ; i++)
        {
            $('.star-'+i).addClass('fas').removeClass('far')
        }
    }
    $(document).on('submit','#ratingFormSubmit',function(e){

        e.preventDefault();
        successmsg('Review Submit Successfully')
        var $this = $(this);
        $(':input[type="submit"]').prop('disabled', true);
        $.ajax({

            type : $this.attr('method'),
            url : $this.attr('action'),
            data: $this.serializeArray(),
            dataType: $this.data('type'),

            success:function(data)
            {   
                $('.reviews__comment--reply__area').addClass('d-none')
                $(':input[type="submit"]').prop('disabled', false);
                $('#ratingFormSubmit')[0].reset();
                $('.reviews__comment--area').html(data.renderHTML)
            }
        })
    })

    $(document).on('submit','#ReplyOnReviewForm',function(e){

        e.preventDefault();
        var $this = $(this);
        successmsg('Reply Submit Successfully')
        $(':input[type="submit"]').prop('disabled', true);
        $.ajax({

            type : $this.attr('method'),
            url : $this.attr('action'),
            data: $this.serializeArray(),
            dataType: $this.data('type'),

            success:function(data)
            {   
                $('.reply-on-review-admin').hide()
                $(':input[type="submit"]').prop('disabled', false);
                $('#ReplyOnReviewForm')[0].reset();
                $('.reviews__comment--area').html(data.renderHTML)
            }
        })
    })

    $('.actions__newreviews--btn').click(function(){

        $('.reviews__comment--reply__area').removeClass('d-none')
    })
    $(document).on('click','.text-red-600',function(){

        /*$(this).parents('.reviews__comment--area').sibilings('.reply-on-review-admin').removeClass('d-none')*/
        $(this).parents('.reviews__comment--list').next().toggle()
    })

    

</script>
@endpush

@endsection