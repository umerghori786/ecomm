<!-- Start slider section -->
        @if((config('setting.showslider') == 1) && (count($sliders) > 0) && (config('setting.homepage') == 1) || config('setting.homepage') == 3)
        <section class="hero__slider--section color-scheme-3">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="hero__slider3--inner hero__slider--activation swiper">
                            <div class="hero__slider3--wrapper swiper-wrapper">
                                @foreach($sliders as $slider)
                                <div class="swiper-slide ">
                                    <div class="hero__slider3--items hero__slider--bg3 slider2" style="background: url('{{url('slider/'.($slider->image))}}'">
                                        <div class="slider__content3 padding-left text-center">
                                            <h2 class="slider__content3--maintitle text-white">{{$slider->des}} </h2> 
                                            <p class="slider__content3--desc text-white mb-35">{{$slider->title_two}} </p>  
                                            <a class="slider__content3--btn primary__btn btn__style3" href="{{$slider->url}}" rel="nofollow">{{$slider->title}}</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper__nav--btn swiper-button-next"></div>
                            <div class="swiper__nav--btn swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @if((config('setting.showslider') == 1) && (count($sliders) > 0) && (config('setting.homepage') == 2))
        <!-- Start slider section -->
        <section class="hero__slider--section">
            <div class="hero__slider--inner hero__slider--activation swiper">
                <div class="hero__slider--wrapper swiper-wrapper">
                    @foreach($sliders as $slider)
                    <div class="swiper-slide ">
                        <div class="hero__slider--items hero__slider--bg slider1" style="background: url('{{url('slider/'.($slider->image))}}'">
                            <div class="container-fluid">
                                <div class="hero__slider--items__inner">
                                    <div class="row row-cols-1">
                                        <div class="col">
                                            <div class="slider__content">
                                                <p class="slider__content--desc desc1 text-white mb-15">Discover our best furniture collection from home</p> 
                                                <h2 class="slider__content--maintitle text-white h1">{{$slider->des}} </h2>
                                                <p class="slider__content--desc text-white mb-35 d-sm-2-none">{{$slider->title_two}} </p>    
                                                <a class="slider__content--btn primary__btn" href="{{$slider->url}}">{{$slider->title}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    @endforeach
                    
                </div>
                <div class="swiper__nav--btn swiper-button-next"></div>
                <div class="swiper__nav--btn swiper-button-prev"></div>
            </div>
        </section>
        @endif
        <!-- End slider section -->
        <!-- End slider section -->