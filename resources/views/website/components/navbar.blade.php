<div class="site-wrap">
    <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                        <form action="" class="site-block-top-search">
                            <span class="icon icon-search2"></span>
                            <input type="text" class="form-control border-0" placeholder="{{ __('nav.search_placeholder') }}">
                        </form>
                    </div>

                    <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                        <div class="site-logo">
                            <a href="{{ url('') }}" class="js-logo-clone">{{ __('nav.logo') }}</a>
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
                                        <a class="dropdown-item" href="{{ url('register') }}">{{ __('nav.register') }}</a>
                                        <a class="dropdown-item" href="{{ url('login') }}">{{ __('nav.login') }}</a>
                                        @endguest
                                        @auth
                                        <a class="dropdown-item" href="{{ url('profile') }}">{{ Auth::user()->name }}</a>
                                        @if(Auth::user()->role != 'user')
                                        <a class="dropdown-item" href="{{ url('admin') }}">{{ __('nav.dashboard') }}</a>
                                        @endif
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item">{{ __('nav.logout') }}</button>
                                        </form>
                                        @endauth
                                    </div>
                                </li>
                                <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                                <li>
                                    <a href="{{ url('cart') }}" class="site-cart">
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
                        <a href="{{ url('') }}">{{ __('nav.home') }}</a>
                        <ul class="dropdown">
                            <li><a href="#">{{ __('nav.menu_one') }}</a></li>
                            <li><a href="#">{{ __('nav.menu_two') }}</a></li>
                            <li><a href="#">{{ __('nav.menu_three') }}</a></li>
                            <li class="has-children">
                                <a href="#">{{ __('nav.sub_menu') }}</a>
                                <ul class="dropdown">
                                    <li><a href="#">{{ __('nav.menu_one') }}</a></li>
                                    <li><a href="#">{{ __('nav.menu_two') }}</a></li>
                                    <li><a href="#">{{ __('nav.menu_three') }}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children {{ Request::is('about') ? 'active' : '' }}">
                        <a href="{{ url('about') }}">{{ __('nav.about') }}</a>
                        <ul class="dropdown">
                            <li><a href="#">{{ __('nav.menu_one') }}</a></li>
                            <li><a href="#">{{ __('nav.menu_two') }}</a></li>
                            <li><a href="#">{{ __('nav.menu_three') }}</a></li>
                        </ul>
                    </li>
                    <li class="{{ Request::is('shop-single') ? 'active' : '' }}"><a href="{{ url('shop-single') }}">{{ __('nav.shop') }}</a></li>
                    <li class="{{ Request::is('catalogue') ? 'active' : '' }}"><a href="#">{{ __('nav.catalogue') }}</a></li>
                    <li class="{{ Request::is('new-arrivals') ? 'active' : '' }}"><a href="#">{{ __('nav.new_arrivals') }}</a></li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ url('contact') }}">{{ __('nav.contact') }}</a></li>
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
                            <h3 class="footer-heading mb-4">{{ __('nav.navigations') }}</h3>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <ul class="list-unstyled">
                                <li><a href="#">{{ __('nav.sell_online') }}</a></li>
                                <li><a href="#">{{ __('nav.features') }}</a></li>
                                <li><a href="#">{{ __('nav.shopping_cart') }}</a></li>
                                <li><a href="#">{{ __('nav.store_builder') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <ul class="list-unstyled">
                                <li><a href="#">{{ __('nav.mobile_commerce') }}</a></li>
                                <li><a href="#">{{ __('nav.dropshipping') }}</a></li>
                                <li><a href="#">{{ __('nav.website_development') }}</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <ul class="list-unstyled">
                                <li><a href="#">{{ __('nav.point_of_sale') }}</a></li>
                                <li><a href="#">{{ __('nav.hardware') }}</a></li>
                                <li><a href="#">{{ __('nav.software') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <h3 class="footer-heading mb-4">{{ __('nav.promo') }}</h3>
                    <a href="#" class="block-6">
                        <img src="{{ asset('assets/images/hero_1.jpg') }}" alt="{{ __('nav.promo_image_alt') }}" class="img-fluid rounded mb-4">
                        <h3 class="font-weight-light mb-0">{{ __('nav.finding_perfect_shoes') }}</h3>
                        <p>{{ __('nav.promo_dates') }}</p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">{{ __('nav.contact_info') }}</h3>
                        <ul class="list-unstyled">
                            <li class="address">{{ __('nav.address') }}</li>
                            <li class="phone"><a href="tel://23923929210">{{ __('nav.phone') }}</a></li>
                            <li class="email">{{ __('nav.email') }}</li>
                        </ul>
                    </div>

                    <div class="block-7">
                        <form action="#" method="post">
                            <label for="email_subscribe" class="footer-heading">{{ __('nav.subscribe') }}</label>
                            <div class="form-group">
                                <input type="text" class="form-control py-4" id="email_subscribe" placeholder="{{ __('nav.email_placeholder') }}">
                                <input type="submit" class="btn btn-sm btn-primary" value="{{ __('nav.send') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        {{ __('nav.copyright') }};<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>
                            document.write(new Date().getFullYear());
                        </script> {{ __('nav.all_rights_reserved') }} | {{ __('nav.template_info') }}<i class="icon-heart" aria-hidden="true"></i>{{ __('nav.by') }} <a href="https://colorlib.com" target="_blank" class="text-primary">{{ __('nav.Colorlib') }}</a>
                    </p>

                  
                </div>
            </div>
        </div>
    </footer>
    @endif
</div>
