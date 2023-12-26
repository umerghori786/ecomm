@extends('layout')

@section('content')

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="account__login--inner">
                                        <label for="name" :value="__('Name')" >
                                            <input class="account__login--input" placeholder="Username"  id="name"  type="text" name="name" :value="old('name')" required autofocus>
                                        </label>
                                        <label for="email" :value="__('Email')">
                                            <input class="account__login--input" placeholder="Email Addres" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required>
                                        </label>
                                        <label for="password" :value="__('Password')">
                                            <input class="account__login--input" placeholder="Password"  id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password">
                                        </label>
                                        <label>
                                            <input class="block mt-1 w-full  account__login--input" placeholder="Confirm Password" id="password_confirmation" 
                                                type="password"
                                                name="password_confirmation" required>
                                        </label>
                                        <label>
                                            <button class="account__login--btn primary__btn mb-10" type="submit">{{ __('Register') }}</button>
                                        </label>
                                       
                                       
                                        <p class="account__login--signup__text">Don,t Have an Account? <button type="submit"> {{ __('Already registered?') }}</button></p>
                                    </div>
        </form>
        @endsection
