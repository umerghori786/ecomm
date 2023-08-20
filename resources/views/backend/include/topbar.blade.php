<section class="main_content dashboard_part">

<div class="container-fluid g-0">
<div class="row">
<div class="col-lg-12 p-0">
<div class="header_iner d-flex justify-content-between align-items-center">
<div class="sidebar_icon d-lg-none">
<i class="ti-menu"></i>
</div>
<div class="serach_field-area">
<div class="search_inner">
<form action="#">
<div class="search_field">
<input type="text" placeholder="Search here...">
</div>
<button type="submit"> <img src="{{asset('dashboard/img/icon/icon_search.svg')}}" alt=""> </button>
</form>
</div>
</div>
<div class="header_right d-flex justify-content-between align-items-center">
<div class="header_notification_warp d-flex align-items-center">
<li>
<a href="#"> <img src="{{asset('dashboard/img/icon/bell.svg')}}" alt=""> </a>
</li>
<li>
<a href="#"> <img src="{{asset('dashboard/img/icon/msg.svg')}}" alt=""> </a>
</li>
</div>
<div class="profile_info">
<img src="{{asset('dashboard/img/client_img.png')}}" alt="#">
<div class="profile_info_iner">

<h5>{{auth()->user()->name}}</h5>
<div class="profile_info_details">
{{-- <a href="#">My Profile <i class="ti-user"></i></a>
<a href="#">Settings <i class="ti-settings"></i></a> --}}
<form method="POST" action="{{ route('logout') }}">
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