@extends('layout')

@section('content')
<main class="main__content_wrapper">
        
        

        <!-- faq page section start -->
        <section class="faq__section section--padding">
            <div class="container">
                <div class="faq__section--inner">
                    <div class="face__step one border-bottom" id="accordionExample">
                        <h3 class="face__step--title mb-30">Shipping Information</h3>
                        <div class="row">
                            <div class="col-lg-12">
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
                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>   
            </div>     
        </section>
        <!-- faq page section end -->

        

    </main>
@endsection
