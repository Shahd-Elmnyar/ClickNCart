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
        <nav class="site-navigation text-right text-md-center" role="navigation">
            <div class="container">
                <ul class="site-menu js-clone-nav d-none d-md-block">
                    <li class="has-children {{ Request::is('/') ? 'active' : '' }}">
                        <a href="{{url('')}}">{{__('navbar.home')}}</a>
                    </li>
                    <li class="has-children {{ Request::is('about') ? 'active' : '' }}">
                        <a href="{{url('about')}}">{{__('navbar.about')}}</a>
                    </li>
                    <li class="{{ Request::is('shop') ? 'active' : '' }}"><a href="{{url('shop')}}">{{__('navbar.shop')}}</a></li>
                    {{-- <li class="{{ Request::is('catalogue') ? 'active' : '' }}"><a href="#">{{__('navbar.catalogue')}}</a></li> --}}
                    {{-- <li class="{{ Request::is('new-arrivals') ? 'active' : '' }}"><a href="#">{{__('navbar.new_arrivals')}}</a></li> --}}
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{url('contact')}}">{{__('navbar.contact')}}</a></li>
                </ul>
            </div>
        </nav>
    </header>
</div>


