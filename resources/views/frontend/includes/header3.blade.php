<!-- Start header area -->
    <header class="header__section header__transparent mb-20 color-scheme-2">
        @if($coupon)
        <div class="header__topbar border-bottom">
            <div class="container">
                <div class="header__topbar--inner header__topbar--inner2 d-flex align-items-center justify-content-between">
                    <ul class="header__info d-flex align-items-center">
                        
                    </ul>
                    <div class="header__shipping">
                        <p class="header__shipping--text">Get {{$coupon->percentage}}% Off Using Coupon <span style="font-weight:600">{{$coupon->title}}</span></p>
                    </div>
                    <div class="language__currency style2 d-none d-lg-block">
                        
                    </div>
                </div>
            </div>
        </div> 
        @endif
        <div class="main__header main__header--style2">
            <div class="container">
                <div class="main__header--inner d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                            <span class="visually-hidden">Offcanvas Menu Open</span>
                        </a>
                    </div>
                    <div class="main__logo">
                        <h1 class="main__logo--title"><a class="main__logo--link" href="{{route('home')}}"><img class="main__logo--img" src="@if(isset($logo)) {{asset('logo/'.$logo->image)}} @endif" alt="logo-img"></a></h1>
                    </div>
                    <div class="header__search--widget d-none d-lg-block">
                        <form id="searchProductFormHome" class="d-flex header__search--form" autocomplete="off">
                            <div class="header__select--categories select">
                                <select class="header__select--inner" id="category-by">
                                    <option value="all">All Categories</option>
                                    @forelse($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <svg class="header__select--categories__icon" xmlns="http://www.w3.org/2000/svg" width="20" height="10" viewBox="0 0 20 10">
                                    <g id="Group_334" data-name="Group 334" transform="translate(-436 -90)">
                                      <rect id="Rectangle_128" data-name="Rectangle 128" width="20" height="2" rx="1" transform="translate(436 90)" fill="currentColor"/>
                                      <rect id="Rectangle_130" data-name="Rectangle 130" width="20" height="2" rx="1" transform="translate(436 98)" fill="currentColor"/>
                                      <rect id="Rectangle_129" data-name="Rectangle 129" width="12" height="2" rx="1" transform="translate(440 94)" fill="currentColor"/>
                                    </g>
                                </svg>
                                  
                            </div>
                            <div class="header__search--box">
                                <label>
                                    <input name="searchProduct" class="header__search--input" placeholder="Search Products Here..." type="text">
                                </label>
                                <button class="header__search--button bg__secondary text-white" aria-label="search button" type="submit">
                                    <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="27.51" height="26.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="header__account">
                        <ul class="d-flex">
                            <li class="header__account--items  header__account--search__items">
                                <a class="header__account--btn search__open--btn" href="javascript:void(0)">
                                    <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  
                                    <span class="visually-hidden">Search</span>
                                </a>
                            </li>
                            <li class="header__account--items">
                                <a class="header__account--btn" @if(\Auth::check()) @if(\Auth::user()->isAdmin()) href="{{url('user/dashboard')}}" @else href="{{url('user_dashboard')}}" @endif @else href="{{url('login')}}" @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg"  width="26.51" height="23.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                                    <span class="visually-hidden">My Account</span>
                                </a>
                            </li>
                            <li class="header__account--items d-sm-none">
                                <a class="header__account--btn" href="{{route('wishlist')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24.526" height="21.82" viewBox="0 0 24.526 21.82">
                                        <path  d="M12.263,21.82a1.438,1.438,0,0,1-.948-.356c-.991-.866-1.946-1.681-2.789-2.4l0,0a51.865,51.865,0,0,1-6.089-5.715A9.129,9.129,0,0,1,0,7.371,7.666,7.666,0,0,1,1.946,2.135,6.6,6.6,0,0,1,6.852,0a6.169,6.169,0,0,1,3.854,1.33,7.884,7.884,0,0,1,1.558,1.627A7.885,7.885,0,0,1,13.821,1.33,6.169,6.169,0,0,1,17.675,0,6.6,6.6,0,0,1,22.58,2.135a7.665,7.665,0,0,1,1.945,5.235,9.128,9.128,0,0,1-2.432,5.975,51.86,51.86,0,0,1-6.089,5.715c-.844.719-1.8,1.535-2.794,2.4a1.439,1.439,0,0,1-.948.356ZM6.852,1.437A5.174,5.174,0,0,0,3,3.109,6.236,6.236,0,0,0,1.437,7.371a7.681,7.681,0,0,0,2.1,5.059,51.039,51.039,0,0,0,5.915,5.539l0,0c.846.721,1.8,1.538,2.8,2.411,1-.874,1.965-1.693,2.812-2.415a51.052,51.052,0,0,0,5.914-5.538,7.682,7.682,0,0,0,2.1-5.059,6.236,6.236,0,0,0-1.565-4.262,5.174,5.174,0,0,0-3.85-1.672A4.765,4.765,0,0,0,14.7,2.467a6.971,6.971,0,0,0-1.658,1.918.907.907,0,0,1-1.558,0A6.965,6.965,0,0,0,9.826,2.467a4.765,4.765,0,0,0-2.975-1.03Zm0,0" transform="translate(0 0)" fill="currentColor"/>
                                    </svg>
                                    
                                    <span class="items__count wishlist wishlist-item_count">{{session('wishlist') ? count(request()->session()->get('wishlist')) : 0}}</span> 
                                </a>
                            </li>
                            <li class="header__account--items">
                                <a class="header__account--btn " href="{{route('showCart')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.897" height="21.565" viewBox="0 0 18.897 21.565">
                                        <path  d="M16.84,8.082V6.091a4.725,4.725,0,1,0-9.449,0v4.725a.675.675,0,0,0,1.35,0V9.432h5.4V8.082h-5.4V6.091a3.375,3.375,0,0,1,6.75,0v4.691a.675.675,0,1,0,1.35,0V9.433h3.374V21.581H4.017V9.432H6.041V8.082H2.667V21.641a1.289,1.289,0,0,0,1.289,1.29h16.32a1.289,1.289,0,0,0,1.289-1.29V8.082Z" transform="translate(-2.667 -1.366)" fill="currentColor"/>
                                    </svg>
                                    <span class="items__count cart-items__count">{{session('cart') ? count(request()->session()->get('cart')) : 0}}</span> 
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header__bottom header__sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__menu position__relative d-none d-lg-block">
                            <nav class="header__menu--navigation">
                            <ul class="d-flex justify-content-center">
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{route('home')}}">Home </a>
                                    
                                </li>
                                <li class="header__menu--items mega__menu--items style3">
                                    <a class="header__menu--link" href="#">Categories <span class="menu__plus--icon">+</span></a>
                                    <ul class="header__mega--menu d-flex">
                                        @forelse($categories as $category)
                                        <li class="header__mega--menu__li">
                                            <span class="header__mega--subtitle">{{$category->title}}</span>
                                            <ul class="header__mega--sub__menu">
                                                @forelse($category->subcategories as $subcat)
                                                <li class="header__mega--sub__menu_li"><a class="header__mega--sub__menu--title" href="{{route('allproducts.index',['subcategory_id'=>$subcat->id])}}">{{$subcat->title}}</a></li>
                                                @empty
                                                @endforelse
                                            </ul>
                                        </li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{route('allproducts.index')}}">Shop </a>
                                    
                                </li>
                                
                                
                                <li class="header__menu--items style3">
                                    <a class="header__menu--link" href="{{url('contacts')}}">Contact US</a>  
                                </li>
                            </ul>
                        </nav>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <!-- Start Offcanvas header menu -->
        <div class="offcanvas-header color-scheme-2" tabindex="-1">
            <div class="offcanvas__inner">
                <div class="offcanvas__logo">
                    <a class="offcanvas__logo_link" href="{{route('home')}}">
                        <img src="@if(isset($logo)) {{asset('logo/'.$logo->image)}} @endif" alt="Furea Logo">
                    </a>
                    <button class="offcanvas__close--btn" aria-label="offcanvas close btn">close</button>
                </div>
                <nav class="offcanvas__menu">
                    <ul class="offcanvas__menu_ul">
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="{{route('home')}}">Home</a>
                            
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="#">Categories</a>
                            <ul class="offcanvas__sub_menu">
                                @forelse($categories as $category)
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">{{$category->title}}</a>
                                    <ul class="offcanvas__sub_menu">
                                        @forelse($category->subcategories as $subcat)
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="{{route('allproducts.index',['subcategory_id'=>$subcat->id])}}">{{$subcat->title}}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="{{route('allproducts.index')}}">Shop</a>
                            
                        </li>
                        
                        
                        
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="{{url('contacts')}}">Contact</a></li>
                    </ul>
                    @if(!\Auth::check())
                    <div class="offcanvas__account--items">
                        <a class="offcanvas__account--items__btn d-flex align-items-center" href="{{url('login')}}">
                        <span class="offcanvas__account--items__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                            </span>
                        <span class="offcanvas__account--items__label">Login / Register</span>
                        </a>
                    </div>
                    @endif
                    <!--
                    <div class="language__currency">
                        <ul class="d-flex align-items-center">
                            <li class="language__currency--list">
                                <a class="offcanvas__language--switcher" href="#">
                                    <img class="language__switcher--icon__img" src="{{asset('newtheme/assets/img/icon/language-icon.webp')}}" alt="currency">
                                    <span>English</span> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.797" height="9.05" viewBox="0 0 9.797 6.05">
                                        <path  d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                    </svg>
                                </a>
                                <div class="offcanvas__dropdown--language">
                                    <ul>
                                        <li class="language__items"><a class="language__text" href="#">France</a></li>
                                        <li class="language__items"><a class="language__text" href="#">Russia</a></li>
                                        <li class="language__items"><a class="language__text" href="#">Spanish</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="language__currency--list">
                                <a class="offcanvas__account--currency__menu" href="#">
                                    <img src="{{asset('newtheme/assets/img/icon/usd-icon.webp')}}" alt="currency">
                                    <span>$ US Dollar</span> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.797" height="9.05" viewBox="0 0 9.797 6.05">
                                        <path  d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                    </svg>
                                </a>
                                <div class="offcanvas__account--currency__submenu">
                                    <ul>
                                        <li class="currency__items"><a class="currency__text" href="#">CAD</a></li>
                                        <li class="currency__items"><a class="currency__text" href="#">CNY</a></li>
                                        <li class="currency__items"><a class="currency__text" href="#">EUR</a></li>
                                        <li class="currency__items"><a class="currency__text" href="#">GBP</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div> -->
                </nav>
            </div>
        </div>
        <!-- End Offcanvas header menu -->

        <!-- Start Offcanvas stikcy toolbar -->
        <div class="offcanvas__stikcy--toolbar color-scheme-2" tabindex="-1">
            <ul class="d-flex justify-content-between">
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{route('home')}}">
                    <span class="offcanvas__stikcy--toolbar__icon"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443" viewBox="0 0 22 17"><path fill="currentColor" d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z"></path></svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Home</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{route('allproducts.index')}}">
                    <span class="offcanvas__stikcy--toolbar__icon"> 
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="18.51" height="17.443" viewBox="0 0 448 512"><path d="M416 32H32A32 32 0 0 0 0 64v384a32 32 0 0 0 32 32h384a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32zm-16 48v152H248V80zm-200 0v152H48V80zM48 432V280h152v152zm200 0V280h152v152z"></path></svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Shop</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list ">
                    <a class="offcanvas__stikcy--toolbar__btn search__open--btn" href="javascript:void(0)">
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>   
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Search</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn " href="{{route('showCart')}}">
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.51" height="15.443" viewBox="0 0 18.51 15.443">
                            <path  d="M79.963,138.379l-13.358,0-.56-1.927a.871.871,0,0,0-.6-.592l-1.961-.529a.91.91,0,0,0-.226-.03.864.864,0,0,0-.226,1.7l1.491.4,3.026,10.919a1.277,1.277,0,1,0,1.844,1.144.358.358,0,0,0,0-.049h6.163c0,.017,0,.034,0,.049a1.277,1.277,0,1,0,1.434-1.267c-1.531-.247-7.783-.55-7.783-.55l-.205-.8h7.8a.9.9,0,0,0,.863-.651l1.688-5.943h.62a.936.936,0,1,0,0-1.872Zm-9.934,6.474H68.568c-.04,0-.1.008-.125-.085-.034-.118-.082-.283-.082-.283l-1.146-4.037a.061.061,0,0,1,.011-.057.064.064,0,0,1,.053-.025h1.777a.064.064,0,0,1,.063.051l.969,4.34,0,.013a.058.058,0,0,1,0,.019A.063.063,0,0,1,70.03,144.853Zm3.731-4.41-.789,4.359a.066.066,0,0,1-.063.051h-1.1a.064.064,0,0,1-.063-.051l-.789-4.357a.064.064,0,0,1,.013-.055.07.07,0,0,1,.051-.025H73.7a.06.06,0,0,1,.051.025A.064.064,0,0,1,73.76,140.443Zm3.737,0L76.26,144.8a.068.068,0,0,1-.063.049H74.684a.063.063,0,0,1-.051-.025.064.064,0,0,1-.013-.055l.973-4.357a.066.066,0,0,1,.063-.051h1.777a.071.071,0,0,1,.053.025A.076.076,0,0,1,77.5,140.448Z" transform="translate(-62.393 -135.3)" fill="currentColor"/>
                            </svg> 
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Cart</span>
                        <span class="items__count cart-items__count">{{session('cart') ? count(request()->session()->get('cart')) : 0}}</span> 
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="{{route('wishlist')}}">
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.541" height="15.557" viewBox="0 0 18.541 15.557">
                            <path  d="M71.775,135.51a5.153,5.153,0,0,1,1.267-1.524,4.986,4.986,0,0,1,6.584.358,4.728,4.728,0,0,1,1.174,4.914,10.458,10.458,0,0,1-2.132,3.808,22.591,22.591,0,0,1-5.4,4.558c-.445.282-.9.549-1.356.812a.306.306,0,0,1-.254.013,25.491,25.491,0,0,1-6.279-4.8,11.648,11.648,0,0,1-2.52-4.009,4.957,4.957,0,0,1,.028-3.787,4.629,4.629,0,0,1,3.744-2.863,4.782,4.782,0,0,1,5.086,2.447c.013.019.025.034.057.076Z" transform="translate(-62.498 -132.915)" fill="currentColor"/>
                            </svg> 
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Wishlist</span>
                        <span class="items__count wishlist__count wishlist-item_count">{{session('wishlist') ? count(request()->session()->get('wishlist')) : 0}} </span> 
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Offcanvas stikcy toolbar -->

        <!-- Start offCanvas minicart -->
        <div class="offCanvas__minicart color-scheme-2" tabindex="-1">
            <div class="minicart__header ">
                <div class="minicart__header--top d-flex justify-content-between align-items-center">
                    <h3 class="minicart__title"> Shopping Cart</h3>
                    <button class="minicart__close--btn" aria-label="minicart close btn">
                        <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
                    </button>
                </div>
                <p class="minicart__header--desc">Detail Of Your Shopping Cart</p>
            </div>
            <div class="mini-cart-append">
            <div class="minicart__product">
                @if(session('cart'))
                @forelse(collect(request()->session()->get('cart')) as $key => $cart)

                <div class="minicart__product--items d-flex remove-item-in-cart cart_price_{{$key}} remove-item-in-cart-{{$key}}">
                    <div class="minicart__thumbnail">

                        <a href="{{route('allproducts.show',[$cart['slug']])}}"><img src="{{$cart['image']}}" alt="prduct-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="{{route('allproducts.show',[$cart['slug']])}}">{{$cart['title']}}</a></h4>
                        
                        <div class="minicart__price">
                            <span class="current__price">{{config('app.currency')}}{{$cart['discount_price']}}</span>
                            <span class="old__price">{{config('app.currency')}}{{$cart['strike_price']}}</span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <button style="display: none;" type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                <label>
                                    <input type="number"  readonly class="quantity__number" value="{{$cart['quantity']}}" />
                                </label>
                                <button style="display:none;" type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</button>
                            </div>
                            <button onclick="deleteFromCart($(this),`{{$key}}`)" class="minicart__product--remove" aria-label="minicart remove btn">Remove</button>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
                @endif
            </div>
            @php 
            $cart_total = 0;
            if(session('cart')){
            foreach (request()->session()->get('cart') as $key => $product) {
                
                $cart_total+= $product['quantity'] * $product['discount_price'];
            }
            }
            @endphp
            
            <div class="minicart__amount">
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Sub Total:</span>
                    <span><b class="update-cart-new-total">{{config('app.currency')}}{{number_format($cart_total, 2)}}</b></span>
                </div>
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Total:</span>
                    <span><b class="update-cart-new-total">{{config('app.currency')}}{{number_format($cart_total, 2)}}</b></span>
                </div>
            </div>
            <div class="minicart__conditions text-center">
                <input class="minicart__conditions--input" id="accept" type="checkbox" checked>
                <label class="minicart__conditions--label" for="accept">I agree with the <a class="minicart__conditions--link" href="privacy-policy.html">Privacy And Policy</a></label>
            </div>
            <div class="minicart__button d-flex justify-content-center">
                <a class="primary__btn minicart__button--link" href="{{url('/show-cart')}}">View cart</a>
                <a class="primary__btn minicart__button--link" href="{{url('/checkout')}}">Checkout</a>
            </div>
            </div>
        </div>
        <!-- End offCanvas minicart -->

        <!-- Start serch box area -->
        <div class="predictive__search--box color-scheme-2" tabindex="-1">
            <div class="predictive__search--box__inner">
                <h2 class="predictive__search--title">Search Products</h2>
                <form id="searchProductFormHome1" autocomplete="off" class="predictive__search--form">
                    <label>
                        <input name="searchProductnew" class="predictive__search--input" placeholder="Search Here" type="text">
                    </label>
                    <button class="predictive__search--button" aria-label="search button"><svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="30.51" height="25.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  </button>
                </form>
            </div>
            <button class="predictive__search--close__btn" aria-label="search close btn">
                <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51" height="30.443"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
            </button>
        </div>
        <!-- End serch box area -->
    </header>
    <!-- End header area -->