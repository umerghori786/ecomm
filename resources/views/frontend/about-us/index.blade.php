@extends('layout')

@section('content')
<main class="main__content_wrapper">
        
        <!-- Start breadcrumb section -->
        {{-- <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content">
                            <h1 class="breadcrumb__content--title text-white mb-10">Privacy Policy</h1>
                            <ul class="breadcrumb__content--menu d-flex">
                                <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span class="text-white">Privacy Policy</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- End breadcrumb section -->

              <!-- Start privacy policy section -->
        <div class="privacy__policy--section section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="privacy__policy--content">
                            <h2 class="privacy__policy--content__title">About Us</h2>
                            
                        </div>
                        
                        <div class="privacy__policy--content section_3">
                            
                            <p class="privacy__policy--content__desc">
                                @if($about)
                                {{ strip_tags($about->content) }}
                                @endif
                            </p>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End privacy policy section -->

        
    </main>
@endsection