<nav class="sidebar">
<div class="logo d-flex justify-content-between">
<div>
@if(isset($logo))    
<a class="mx-auto" href="{{route('admin.dashboard')}}"><img src="{{url('logo/'.$logo->image)}}" alt=""></a>
@else
<a class="mx-auto" href="{{route('admin.dashboard')}}"><img src="{{asset('dashboard/img/logo.png')}}" alt=""></a>
@endif
    <!-- <h3 class="m-0" style="color:#2e4765">Dashboard</h3> -->
</div>
<div class="sidebar_close_icon d-lg-none">
<i class="ti-close"></i>
</div>
</div>
<ul id="sidebar_menu">

<li class="mm-active">
<a class="" href="{{route('home')}}" target="_blank" aria-expanded="false">
<svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 36 36"><path fill="currentColor" d="M28 30H16v-8h-2v8H8v-8H6v8a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2v-8h-2Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="m33.79 13.27l-4.08-8.16A2 2 0 0 0 27.92 4H8.08a2 2 0 0 0-1.79 1.11l-4.08 8.16a2 2 0 0 0-.21.9v3.08a2 2 0 0 0 .46 1.28A4.67 4.67 0 0 0 6 20.13a4.72 4.72 0 0 0 3-1.07a4.73 4.73 0 0 0 6 0a4.73 4.73 0 0 0 6 0a4.73 4.73 0 0 0 6 0a4.72 4.72 0 0 0 6.53-.52a2 2 0 0 0 .47-1.28v-3.09a2 2 0 0 0-.21-.9M30 18.13A2.68 2.68 0 0 1 27.82 17L27 15.88L26.19 17a2.71 2.71 0 0 1-4.37 0L21 15.88L20.19 17a2.71 2.71 0 0 1-4.37 0L15 15.88L14.19 17a2.71 2.71 0 0 1-4.37 0L9 15.88L8.18 17A2.68 2.68 0 0 1 6 18.13a2.64 2.64 0 0 1-2-.88v-3.08L8.08 6h19.84L32 14.16v3.06a2.67 2.67 0 0 1-2 .91" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
<span>Your Store</span>
</a>
<ul>

</ul>
</li>

<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">

<svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 2048 2048"><path fill="currentColor" d="m960 120l832 416v1040l-832 415l-832-415V536zm625 456L960 264L719 384l621 314zM960 888l238-118l-622-314l-241 120zM256 680v816l640 320v-816zm768 1136l640-320V680l-640 320z"/></svg>
<span>Product</span>
</a>
<ul>
<li><a  href="{{route('categories.index')}}">@if(config('app.language') == 'en') Category @else {{ GoogleTranslate::trans('Category', app()->getLocale()) }} @endif</a></li>
<li><a  href="{{route('subcategories.index')}}">@if(config('app.language') == 'en') Sub Category @else {{ GoogleTranslate::trans('Sub Category', app()->getLocale()) }} @endif</a></li>
<li><a  href="{{route('colors.index')}}">@if(config('app.language') == 'en') Colors @else {{ GoogleTranslate::trans('Sub Category', app()->getLocale()) }} @endif</a></li>
<li><a href="{{route('products.index')}}">@if(config('app.language') == 'en') Products @else {{ GoogleTranslate::trans('Products', app()->getLocale()) }} @endif</a></li>
<li><a href="{{route('reviews.index')}}">@if(config('app.language') == 'en') Products Reviews @else{{ GoogleTranslate::trans('Products Reviews', app()->getLocale()) }} @endif</a></li>

</ul>
</li>

<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 2048 2048"><path fill="currentColor" d="M624 832q0 36-14 68t-38 56t-56 38t-68 14t-68-14t-56-38t-38-56t-14-68t14-68t38-56t56-38t68-14t68 14t56 38t38 56t14 68m-176 80q33 0 56-23t24-57q0-33-23-56t-57-24q-33 0-56 23t-24 57q0 33 23 56t57 24m512 128q36 0 68 14t56 38t38 56t14 68t-14 68t-38 56t-56 38t-68 14t-68-14t-56-38t-38-56t-14-68t14-68t38-56t56-38t68-14m0 256q33 0 56-23t24-57q0-33-23-56t-57-24q-33 0-56 23t-24 57q0 33 23 56t57 24M842 640h108l-384 768H458zm566-256l640 640l-640 640H0V384zm-53 1152l512-512l-512-512H128v1024zm181-576q26 0 45 19t19 45t-19 45t-45 19t-45-19t-19-45t19-45t45-19"/></svg>
<span>@if(config('app.language') == 'en') Coupon @else {{ GoogleTranslate::trans('Coupon', app()->getLocale()) }} @endif</span>
</a>
<ul>
<li><a  href="{{route('coupon.index')}}">@if(config('app.language') == 'en') Coupons @else {{ GoogleTranslate::trans('Coupons', app()->getLocale()) }} @endif</a></li>
</ul>
</li>

<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 24 24"><g fill="none" stroke="currentColor"><rect width="14" height="17" x="5" y="4" rx="2"/><path stroke-linecap="round" d="M9 9h6m-6 4h6m-6 4h4"/></g></svg>
<span>@if(config('app.language') == 'en') Orders @else{{ GoogleTranslate::trans('Orders', app()->getLocale()) }} @endif</span>
</a>
<ul>
<li><a  href="{{route('order.index')}}">@if(config('app.language') == 'en') Orders @else{{ GoogleTranslate::trans('Orders', app()->getLocale()) }} @endif</a></li>
</ul>
</li>
<!--
<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 20 20"><path fill="currentColor" d="M10 0c5.342 0 10 4.41 10 9.5c0 5.004-4.553 8.942-10 8.942a11.01 11.01 0 0 1-3.43-.546c-.464.45-.623.603-1.608 1.553c-.71.536-1.378.718-1.975.38c-.602-.34-.783-1.002-.66-1.874l.4-2.319C.99 14.002 0 11.842 0 9.5C0 4.41 4.657 0 10 0m0 1.4c-4.586 0-8.6 3.8-8.6 8.1c0 2.045.912 3.928 2.52 5.33l.02.017l.297.258l-.067.39l-.138.804l-.037.214l-.285 1.658a2.79 2.79 0 0 0-.03.337v.095c0 .005-.001.007-.002.008c.007-.01.143-.053.376-.223l2.17-2.106l.414.156a9.589 9.589 0 0 0 3.362.605c4.716 0 8.6-3.36 8.6-7.543c0-4.299-4.014-8.1-8.6-8.1M5.227 7.813a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998m4.998 0a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998m4.997 0a1.5 1.5 0 1 1 0 2.998a1.5 1.5 0 0 1 0-2.998"/></svg>
<span>@if(config('app.language') == 'en') Messages @else {{ GoogleTranslate::trans('Messages', app()->getLocale()) }} @endif</span>
</a>
<ul>
<li><a  href="{{route('message.index')}}">@if(config('app.language') == 'en') Messages @else {{ GoogleTranslate::trans('Messages', app()->getLocale()) }} @endif</a></li>
</ul>
</li>

<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 256 256"><path fill="currentColor" d="M112.6 158.43a58 58 0 1 0-57.2 0a93.83 93.83 0 0 0-50.19 38.29a6 6 0 0 0 10.05 6.56a82 82 0 0 1 137.48 0a6 6 0 0 0 10-6.56a93.83 93.83 0 0 0-50.14-38.29M38 108a46 46 0 1 1 46 46a46.06 46.06 0 0 1-46-46m211 97a6 6 0 0 1-8.3-1.74A81.8 81.8 0 0 0 172 166a6 6 0 0 1 0-12a46 46 0 1 0-17.08-88.73a6 6 0 1 1-4.46-11.14a58 58 0 0 1 50.14 104.3a93.83 93.83 0 0 1 50.19 38.29A6 6 0 0 1 249 205"/></svg>
<span>@if(config('app.language') == 'en') Subscribers @else {{ GoogleTranslate::trans('Subscribers', app()->getLocale()) }} @endif</span>
</a>
<ul>
<li><a  href="{{route('admin.subscribers')}}">@if(config('app.language') == 'en') Subscribers @else {{ GoogleTranslate::trans('Subscribers', app()->getLocale()) }} @endif</a></li>
</ul>
</li>
-->



<li class="mm-active">
<a class="has-arrow" href="#" aria-expanded="false">
<svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 32 32"><path fill="currentColor" d="M27 16.76v-1.53l1.92-1.68A2 2 0 0 0 29.3 11l-2.36-4a2 2 0 0 0-1.73-1a2 2 0 0 0-.64.1l-2.43.82a11.35 11.35 0 0 0-1.31-.75l-.51-2.52a2 2 0 0 0-2-1.61h-4.68a2 2 0 0 0-2 1.61l-.51 2.52a11.48 11.48 0 0 0-1.32.75l-2.38-.86A2 2 0 0 0 6.79 6a2 2 0 0 0-1.73 1L2.7 11a2 2 0 0 0 .41 2.51L5 15.24v1.53l-1.89 1.68A2 2 0 0 0 2.7 21l2.36 4a2 2 0 0 0 1.73 1a2 2 0 0 0 .64-.1l2.43-.82a11.35 11.35 0 0 0 1.31.75l.51 2.52a2 2 0 0 0 2 1.61h4.72a2 2 0 0 0 2-1.61l.51-2.52a11.48 11.48 0 0 0 1.32-.75l2.42.82a2 2 0 0 0 .64.1a2 2 0 0 0 1.73-1l2.28-4a2 2 0 0 0-.41-2.51ZM25.21 24l-3.43-1.16a8.86 8.86 0 0 1-2.71 1.57L18.36 28h-4.72l-.71-3.55a9.36 9.36 0 0 1-2.7-1.57L6.79 24l-2.36-4l2.72-2.4a8.9 8.9 0 0 1 0-3.13L4.43 12l2.36-4l3.43 1.16a8.86 8.86 0 0 1 2.71-1.57L13.64 4h4.72l.71 3.55a9.36 9.36 0 0 1 2.7 1.57L25.21 8l2.36 4l-2.72 2.4a8.9 8.9 0 0 1 0 3.13L27.57 20Z"/><path fill="currentColor" d="M16 22a6 6 0 1 1 6-6a5.94 5.94 0 0 1-6 6m0-10a3.91 3.91 0 0 0-4 4a3.91 3.91 0 0 0 4 4a3.91 3.91 0 0 0 4-4a3.91 3.91 0 0 0-4-4"/></svg>
<span>@if(config('app.language') == 'en') Settings @else {{ GoogleTranslate::trans('Settings', app()->getLocale()) }} @endif</span>
</a>
<ul>
<li><a  href="{{url('user/settings/general')}}"> @if(config('app.language') == 'en')General setting @else {{ GoogleTranslate::trans('General setting', app()->getLocale()) }} @endif</a></li>	
<li><a  href="{{route('logos.index')}}">@if(config('app.language') == 'en') Logo @else {{ GoogleTranslate::trans('Logo', app()->getLocale()) }} @endif</a></li>
<li><a  href="{{route('slider.index')}}">@if(config('app.language') == 'en') Slider @else {{ GoogleTranslate::trans('Slider', app()->getLocale()) }} @endif</a></li>
<li><a  href="{{route('privacy.index')}}">@if(config('app.language') == 'en') Privacy Policy @else {{ GoogleTranslate::trans('Privacy Policy', app()->getLocale()) }} @endif</a></li>
<li><a  href="{{route('aboutus.index')}}">@if(config('app.language') == 'en') About Us @else {{ GoogleTranslate::trans('About Us', app()->getLocale()) }} @endif</a></li>
<li><a href="{{route('contact.index')}}">@if(config('app.language') == 'en') Address @else {{ GoogleTranslate::trans('Address', app()->getLocale()) }} @endif</a></li>
<li><a  href="{{route('question.index')}}">@if(config('app.language') == 'en')FAQ's @else {{ GoogleTranslate::trans('FAQ', app()->getLocale()) }} @endif</a></li>
</ul>
</li>







</nav>