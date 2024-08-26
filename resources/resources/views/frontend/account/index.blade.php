@extends('layout')

@section('content')


<main class="main__content_wrapper">

   
    
    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">
            <p class="account__welcome--text">Hello, welcome to your dashboard!</p>
            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h3 class="account__content--title mb-20">My Profile</h3>
                    <ul class="account__menu">
                        <li class="account__menu--list active"><a href="my-account.html">Dashboard</a></li>
                        <!--<li class="account__menu--list"><a href="my-account-2.html">Addresses</a></li> -->
                        <li class="account__menu--list"><a href="{{url('show-wishlist')}}">Wishlist</a></li>
                        <li class="account__menu--list"><a href="{{url('show-cart')}}">Cart</a></li>
                        <li class="account__menu--list">
                        	<form method="POST" action="{{ route('logout') }}">
                        		@csrf
                        		<x-dropdown-link :href="route('logout')"
                        		        onclick="event.preventDefault();
                        		                    this.closest('form').submit();">
                        		    {{ __('Log Out') }}<i class="ti-shift-left"></i>
                        		</x-dropdown-link> 
                        	</form>
                        </li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <h3 class="account__content--title mb-20">Orders History</h3>
                        <div class="account__table--area">
                            <table class="account__table">
                                <thead class="account__table--header">
                                    <tr class="account__table--header__child">
                                        <th class="account__table--header__child--items">Order</th>
                                        <th class="account__table--header__child--items">Date</th>
                                        <th class="account__table--header__child--items">Payment Status</th>
                                        <th class="account__table--header__child--items">Status</th>
                                        <th class="account__table--header__child--items">Total</th>	 	 	 	
                                    </tr>
                                </thead>
                                <tbody class="account__table--body mobile__none">
                                	@forelse($orders as $order)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">{{$order->id}}</td>
                                        <td class="account__table--body__child--items">{{$order->created_at->toDateString()}}</td>
                                        <td class="account__table--body__child--items">Paid</td>
                                        <td class="account__table--body__child--items">
                                        @if($order->status == 0)	
                                        Unfulfilled
                                        @else
                                        Complete
                                        @endif
                                    	</td>
                                        <td class="account__table--body__child--items">{{config('app.currency')}}{{$order->grand_total}}</td>
                                    </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                                <tbody class="account__table--body mobile__block">
                                	@forelse($orders as $order)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">
                                            <strong>Order</strong>
                                            <span>{{$order->id}}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Date</strong>
                                            <span>{{$order->created_at->toDateString()}}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Payment Status</strong>
                                            <span>Paid</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Fulfillment Status</strong>
                                            <span>
                                            	@if($order->status == 0)	
                                            	Unfulfilled
                                            	@else
                                            	Complete
                                            	@endif
                                            </span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Total</strong>
                                            <span>{{config('app.currency')}}{{$order->grand_total}}</span>
                                        </td>
                                    </tr>
                                    @empty

                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->

    
</main>


@endsection