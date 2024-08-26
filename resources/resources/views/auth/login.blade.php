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
                                <div class="account__login--header mb-25">
                                    <h3 class="account__login--header__title mb-10">Login</h3>
                                    <p class="account__login--header__desc">Login if you area a returning customer.</p>
                                </div>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4 mb-5" :errors="$errors" />
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                <div class="account__login--inner">
                                    <label>
                                        
                                        <x-input id="email" class="block mt-1 w-full account__login--input" type="email" name="email" :value="old('email')" placeholder="Email Addres" required autofocus />
                                    </label>
                                    <label>
                                        
                                        <x-input id="password" class="block mt-1 w-full account__login--input"
                                                        type="password"
                                                        name="password"
                                                        placeholder="Password"
                                                        required autocomplete="current-password" />
                                    </label>
                                    <div class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="check1 remember_me" type="checkbox" name="remember">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check1">
                                                Remember me</label>
                                        </div>
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="account__login--forgot">Forgot Your Password?</a>
                                        @endif
                                    </div>
                                    <button class="account__login--btn primary__btn" type="submit">Login</button>
                                    
                                    <p class="account__login--signup__text" style="margin-top: 20px;"><a href="{{url('register')}}" type="submit">Don,t Have an Account?</a> <a href="{{url('register')}}" type="submit">Click here for Sign Up</a></p>
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
