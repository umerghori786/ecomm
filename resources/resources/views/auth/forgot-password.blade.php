@extends('layout')

@section('content')

<main class="main__content_wrapper">
    
   

    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
            
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1 justify-content-center">
                        {{-- login --}}
                        
                        <div class="col">
                            <div class="account__login">
                                <div class="mb-4 text-sm text-gray-600">
                                            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                        </div>

                                        <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                        <!-- Validation Errors -->
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                        <form method="POST" action="{{ route('password.email') }}">
                                            @csrf

                                            <!-- Email Address -->
                                            <div>
                                                <x-label for="email" :value="__('Email')" />

                                                <x-input id="email" class="block mt-1 w-full account__login--input" type="email" name="email" :value="old('email')" required autofocus />
                                            </div>

                                            <div class="flex items-center justify-end mt-4 ">
                                                
                                                <button class="account__login--btn primary__btn" type="submit">Email Password Reset Link</button>
                                            </div>
                                        </form>
                            </div>
                        </div> 
                        {{-- endlogin --}}
                        
                    </div>
                </div>
            
        </div>     
    </div>
    <!-- End login section  -->

    
</main>


@endsection
