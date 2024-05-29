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
                                
                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="account__login--inner">
                                    <label>
                                        
                                        <x-input id="email" class="block mt-1 w-full account__login--input" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                    </label>
                                    <label>
                                        
                                        <x-input id="password" class="block mt-1 w-full account__login--input"
                                                        type="password"
                                                        name="password"
                                                        placeholder="Password"
                                                        required  />
                                    </label>
                                    <label>
                                        
                                        <x-input id="password_confirmation" class="block mt-1 w-full account__login--input"
                                                        type="password"
                                                        placeholder="Confirm Password"
                                                        name="password_confirmation" required  />
                                    </label>
                                    
                                    <button class="account__login--btn primary__btn" type="submit">{{ __('Reset Password') }}</button>
                                    
                                    
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
