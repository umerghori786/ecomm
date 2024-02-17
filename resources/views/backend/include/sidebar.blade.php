<nav class="sidebar">
<div class="logo d-flex justify-content-between">
@if(isset($logo))    
<a href="{{route('admin.dashboard')}}"><img src="{{url('logo/'.$logo->image)}}" alt=""></a>
@else
<a href="{{route('admin.dashboard')}}"><img src="{{asset('dashboard/img/logo.png')}}" alt=""></a>
@endif
<div class="sidebar_close_icon d-lg-none">
<i class="ti-close"></i>
</div>
</div>
<ul id="sidebar_menu">
<li class="side_menu_title">
<span>Dashboard</span>
</li>
<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">

<img src="{{asset('dashboard/img/menu-icon/1.svg')}}" alt="">
<span>Product</span>
</a>
<ul>
<li><a  href="{{route('categories.index')}}">Category</a></li>
<li><a  href="{{route('subcategories.index')}}">Sub Category</a></li>
<li><a href="{{route('products.index')}}">Products</a></li>
<li><a href="{{route('products.index')}}">Products Reviews</a></li>

</ul>
</li>

<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<img src="{{asset('dashboard/img/menu-icon/1.svg')}}" alt="">
<span>Coupon</span>
</a>
<ul>
<li><a  href="{{route('coupon.index')}}">Coupon</a></li>
</ul>
</li>

<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<img src="{{asset('dashboard/img/menu-icon/1.svg')}}" alt="">
<span>Orders</span>
</a>
<ul>
<li><a  href="{{route('order.index')}}">Orders</a></li>
</ul>
</li>

<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<img src="{{asset('dashboard/img/menu-icon/1.svg')}}" alt="">
<span>Messages</span>
</a>
<ul>
<li><a  href="{{route('message.index')}}">Messages</a></li>
</ul>
</li>

<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<img src="{{asset('dashboard/img/menu-icon/1.svg')}}" alt="">
<span>Subscribers</span>
</a>
<ul>
<li><a  href="{{route('admin.subscribers')}}">Subscribers</a></li>
</ul>
</li>




<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<img src="{{asset('dashboard/img/menu-icon/1.svg')}}" alt="">
<span>Setting</span>
</a>
<ul>
<li><a  href="{{url('user/settings/general')}}">General setting</a></li>	
<li><a  href="{{route('logos.index')}}">Logo</a></li>
<li><a  href="{{route('slider.index')}}">Slider</a></li>
<li><a  href="{{route('privacy.index')}}">Privacy Policy</a></li>
<li><a  href="{{route('aboutus.index')}}">About Us</a></li>
<li><a href="{{route('contact.index')}}">Address</a></li>
<li><a  href="{{route('question.index')}}">FAQ's</a></li>
</ul>
</li>







</nav>