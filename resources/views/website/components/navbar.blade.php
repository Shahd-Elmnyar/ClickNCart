<div class="site-wrap">
    <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                        <form action="" class="site-block-top-search">
                            <span class="icon icon-search2"></span>
                            <input type="text" class="form-control border-0" placeholder="{{__('navbar.search')}}">
                        </form>
                    </div>

                    <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                        <div class="site-logo">
                            <a href="{{url('')}}" class="js-logo-clone">Shoppers</a>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                        <div class="site-top-icons">
                            <ul>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon icon-person"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                        @guest
                                        <a class="dropdown-item" href="{{ url('register') }}">{{ __('navbar.register') }}</a>
                                        <a class="dropdown-item" href="{{ url('login') }}">{{ __('navbar.login') }}</a>
                                        @endguest
                                        @auth
                                        <a class="dropdown-item" href="{{ url('profile') }}">{{Auth::user()->name}}</a>
                                        @if(Auth::user()->role != 'user')
                                        <a class="dropdown-item" href="{{ url('admin') }}">{{ __('navbar.dashboard') }}</a>
                                        @endif
                                        <!-- <a class="dropdown-item" href="{{ url('logout') }}">Logout</a> -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">{{ __('navbar.logout') }}</button>
                                        </form>
                                        @endauth
                                        @if($lang=='ar')
                                        <a class="dropdown-item" href="{{url('lang/set/en')}}">En</a>
                                        @else
                                        <a class="dropdown-item" href="{{url('lang/set/ar')}}">ع</a>
                                        @endif
                                    </div>
                                </li>
                            <li>
                                <a href="#"><span class="icon icon-heart-o"></span></a>
                            </li>
                            <li>
                                <a href="{{url('cart')}}" class="site-cart">
                                <span class="icon icon-shopping_cart"></span>
                                <span class="count">2</span>
                            </a>
                        </li>
                        <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
<nav class="site-navigation text-right text-md-center" role="navigation">
    <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="has-children {{ Request::is('/') ? 'active' : '' }}">
                <a href="{{url('')}}">{{__('navbar.home')}}</a>
                <ul class="dropdown">
                    <li><a href="#">{{__('navbar.menu_one')}}</a></li>
                    <li><a href="#">{{__('navbar.menu_two')}}</a></li>
                    <li><a href="#">{{__('navbar.menu_three')}}</a></li>
                    <li class="has-children">
                        <a href="#">{{__('navbar.sub_menu')}}</a>
                        <ul class="dropdown">
                            <li><a href="#">{{__('navbar.menu_one')}}</a></li>
                            <li><a href="#">{{__('navbar.menu_two')}}</a></li>
                            <li><a href="#">{{__('navbar.menu_three')}}</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-children {{ Request::is('about') ? 'active' : '' }}">
                <a href="{{url('about')}}">{{__('navbar.about')}}</a>
                <ul class="dropdown">
                    <li><a href="#">{{__('navbar.menu_one')}}</a></li>
                    <li><a href="#">{{__('navbar.menu_two')}}</a></li>
                    <li><a href="#">{{__('navbar.menu_three')}}</a></li>
                </ul>
            </li>
            <li class="{{ Request::is('shop-single') ? 'active' : '' }}"><a href="{{url('shop-single')}}">{{__('navbar.shop')}}</a></li>
            <li class="{{ Request::is('catalogue') ? 'active' : '' }}"><a href="#">{{__('navbar.catalogue')}}</a></li>
            <li class="{{ Request::is('new-arrivals') ? 'active' : '' }}"><a href="#">{{__('navbar.new_arrivals')}}</a></li>
            <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{url('contact')}}">{{__('navbar.contact')}}</a></li>
        </ul>
    </div>
</nav>
</header>
@yield('content')


@if (!Request::is('/'))
<footer class="site-footer border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4">{{ __('navbar.navigations') }}</h3>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">{{ __('navbar.sell_online') }}</a></li>
                            <li><a href="#">{{ __('navbar.features') }}</a></li>
                            <li><a href="#">{{ __('navbar.shopping_cart') }}</a></li>
                            <li><a href="#">{{ __('navbar.store_builder') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">{{ __('navbar.mobile_commerce') }}</a></li>
                            <li><a href="#">{{ __('navbar.dropshipping') }}</a></li>
                            <li><a href="#">{{ __('navbar.website_development') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">{{ __('navbar.point_of_sale') }}</a></li>
                            <li><a href="#">{{ __('navbar.hardware') }}</a></li>
                            <li><a href="#">{{ __('navbar.software') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h3 class="footer-heading mb-4">{{ __('navbar.promo') }}</h3>
                <a href="#" class="block-6">
                    <img src="{{ asset('assets/images/hero_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
                    <h3 class="font-weight-light  mb-0">{{ __('navbar.finding_perfect_shoes') }}</h3>
                    <p>{{ __('navbar.promo_date') }}</p>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">{{ __('navbar.contact_info') }}</h3>
                    <ul class="list-unstyled">
                        <li class="address">{{ __('navbar.address') }}</li>
                        <li class="phone"><a href="tel://23923929210">{{ __('navbar.phone') }}</a></li>
                        <li class="email">{{ __('navbar.email') }}</li>
                    </ul>
                </div>

                <div class="block-7">
                    <form action="#" method="post">
                        <label for="email_subscribe" class="footer-heading">{{ __('navbar.subscribe') }}</label>
                        <div class="form-group">
                            <input type="text" class="form-control py-4" id="email_subscribe" placeholder="{{ __('navbar.email') }}">
                            <input type="submit" class="btn btn-sm btn-primary" value="{{ __('navbar.send') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    {{ __('navbar.copyright') }} &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script>
                        document.write(new Date().getFullYear());
                    </script> {{ __('navbar.all_rights_reserved') }} | {{ __('navbar.template_made_by') }} <i class="icon-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
@endif
</div>