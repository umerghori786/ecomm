@extends('layout')

@section('content')
<main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">Frequently</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Frequently</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- faq page section start -->
        <section class="faq__section section--padding">
            <div class="container">
                <div class="faq__section--inner">
                    <div class="face__step one border-bottom" id="accordionExample">
                        <h3 class="face__step--title mb-30">Shipping Information</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        @foreach($que as $que)
                                        <button class="faq__accordion--btn accordion__items--button">{{$que->question}}
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">{{$que->answer}}</p>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How Long Will it Take To Get My Package??
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What payment types can I use?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Do you ship internationally??
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How will my parcel be delivered?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How do I know if something is organic?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="face__step one border-bottom" id="accordionExample2">
                        <h3 class="face__step--title mb-30">Payment Information</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What payment types can I use?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Can I pay by Gift Card?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">can't make a payment
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Has my payment gone through?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Tracking my order
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Haven’t received my order
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="face__step one" id="accordionExample3">
                        <h3 class="face__step--title mb-30">Orders and Returns</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How can I return an item?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class=" accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What Shipping Methods Are Available?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">How can i make refund from your website?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">I am a new user. How should I start?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">What payment methods are accepted?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                                <div class="accordion__items">
                                    <h2 class="accordion__items--title">
                                        <button class="faq__accordion--btn accordion__items--button">Do you ship internationally?
                                            <svg class="accordion__items--button__icon" xmlns="http://www.w3.org/2000/svg" width="20.355" height="13.394" viewBox="0 0 512 512"><path d="M98 190.06l139.78 163.12a24 24 0 0036.44 0L414 190.06c13.34-15.57 2.28-39.62-18.22-39.62h-279.6c-20.5 0-31.56 24.05-18.18 39.62z" fill="currentColor"/></svg>
                                        </button>
                                    </h2>
                                    <div class="accordion__items--body">
                                        <p class="accordion__items--body__desc">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim felis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>     
        </section>
        <!-- faq page section end -->

        <!-- Start Newsletter banner section -->
        <section class="newsletter__banner--section section--padding pt-0">
            <div class="container">
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
@endsection
