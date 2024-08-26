@extends('layout')

@section('content')
<main class="main__content_wrapper">
        
      

              <!-- Start privacy policy section -->
        <div class="privacy__policy--section section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="privacy__policy--content">
                            <h2 class="privacy__policy--content__title">Privacy Policy</h2>
                            
                        </div>
                        
                        <div class="privacy__policy--content section_3">
                            
                            <p class="privacy__policy--content__desc">
                                @if($term)
                                {{ strip_tags($term->privacy) }}
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