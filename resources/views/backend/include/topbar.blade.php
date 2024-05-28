<section class="main_content dashboard_part">

<div class="container-fluid g-0">
<div class="row">
<div class="col-lg-12 p-0">
<div class="header_iner d-flex justify-content-between align-items-center">
<div class="sidebar_icon d-lg-none">
<i class="ti-menu"></i>
</div>
<div>
@if(isset($logo))    
{{-- <a class="mx-auto" href="{{route('admin.dashboard')}}"><img src="{{url('logo/'.$logo->image)}}" alt=""></a>
@else
<a class="mx-auto" href="{{route('admin.dashboard')}}"><img src="{{asset('dashboard/img/logo.png')}}" alt=""></a> --}}
@endif
    <!-- <h3 class="m-0" style="color:#2e4765">Dashboard</h3> -->
</div>
<div class="header_right d-flex justify-content-between align-items-center">

<div class="profile_info">
<img src="https://cdn-icons-png.flaticon.com/128/9322/9322043.png" alt="#">
<div class="profile_info_iner">

<h5 class="text-left" >{{auth()->user()->name}}</h5>
<div class="profile_info_details">
<form class="mb-0" method="POST" action="{{ route('logout') }}">
	@csrf
<x-dropdown-link :href="route('logout')"
        onclick="event.preventDefault();
                    this.closest('form').submit();">
    {{ __('Log Out') }}<i class="ti-shift-left"></i>
</x-dropdown-link> 
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>