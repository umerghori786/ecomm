@extends('layout')

@section('content')

<main class="main__content_wrapper">
    
   

    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
           
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1">
                        

                        <form method="POST" action="{{ route('register') }}">
                                    @csrf
                        <div class="col">

                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h3 class="account__login--header__title mb-10">Create an Account</h3>
                                    <p class="account__login--header__desc">Register here if you are a new customer</p>
                                </div>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-5" :errors="$errors" />
                                <div class="account__login--inner">
                                    <label>
                                        <input class="account__login--input " placeholder="Username"  id="name"  type="text" name="name" :value="old('name')" required autofocus>
                                    </label>
                                    <label>
                                        <input class="account__login--input block mt-1 w-full" placeholder="Email Addres" id="email"  type="email" name="email" :value="old('email')" required>
                                    </label>
                                    <label>
                                        <input class="account__login--input" placeholder="Password"  id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password">
                                    </label>
                                    <label>
                                        <input class="account__login--input" placeholder="Confirm Password" id="password_confirmation" 
                                                type="password"
                                                name="password_confirmation" required>
                                    </label>
                                    <label>
                                        <button class="account__login--btn primary__btn mb-10" type="submit">Register</button>
                                    </label>
                                </form>
                                    <div class="account__login--remember position__relative">
                                        <input class="checkout__checkbox--input" id="check2" type="checkbox" checked>
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label login__remember--label" for="check2">
                                            I have read and agree to the terms & conditions</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>     
    </div>
    <!-- End login section  -->

    
</main>


@endsection
