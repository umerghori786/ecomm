<nav class="sidebar">
<div class="logo d-flex justify-content-between">
<a href="{{route('admin.dashboard')}}"><img src="{{asset('dashboard/img/logo.png')}}" alt=""></a>
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
<li><a href="{{route('message.index')}}">Messages</a></li>

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
<span>Contact Us</span>
</a>
<ul>
<li><a  href="{{route('contact.index')}}">Contact Us</a></li>
</ul>
</li>
<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<img src="{{asset('dashboard/img/menu-icon/1.svg')}}" alt="">
<span>Setting</span>
</a>
<ul>
<li><a  href="{{route('logos.index')}}">Logo</a></li>
<li><a  href="{{route('privacy.index')}}">Privacy Policy</a></li>
<li><a  href="{{route('question.index')}}">Questions</a></li>
</ul>
</li>







</nav>