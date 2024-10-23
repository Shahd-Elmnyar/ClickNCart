<!DOCTYPE html>
@php
    $lang = auth()->user()->locale;
    if($lang == 'ar'){
        $adminDir = 'rtl';
    }else{
        $adminDir = 'ltr';
    }
@endphp
<html lang="{{$lang}}" dir="{{$adminDir}}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('adminAssets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('adminAssets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('adminAssets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('adminAssets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('adminAssets/css/style.css')}}" rel="stylesheet">
    @yield ('styles')

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{asset('adminAssets/img/logo.png')}}" alt="">
                <span class="d-none d-lg-block">{{__('home.dashboard')}}</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        @if(auth()->user()->image == null)
                            <img src="{{asset('adminAssets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                        @else
                            <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile" class="rounded-circle">
                        @endif
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{auth()->user()->name}}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>{{__('home.profile')}}</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>{{__('navbar.logout')}}</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                        @if($lang=='ar')
                        <a class="dropdown-item" href="{{url('lang/set/en')}}">{{__('navbar.en')}}</a>
                        @else
                        <a class="dropdown-item" href="{{url('lang/set/ar')}}">{{__('navbar.ar')}}</a>
                        @endif
                        </li>

                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->

            </ul>
        </nav>
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{route('admin')}}">
                    <i class="bi bi-grid"></i>
                    <span>{{__('home.dashboard')}}</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed"  href="{{url('')}}">
                    <i class="bi bi-globe-americas"></i><span>{{__('home.backWebsite')}}</span>
                    <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed"  href="{{url('admin/categories')}}">
                    <i class="bi bi-menu-button-wide"></i><span>{{__('home.categories')}}</span>
                    <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed"  href="{{url('admin/products')}}">
                    <i class="bi bi-box-seam"></i>

                    <span>{{__('home.products')}}</span>
                    <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
                </a>
            </li>
            <li class="nav-item">
                @if(Auth::user()->role->name == 'super_admin')
                <a class="nav-link collapsed" href="{{url('admin/users')}}">
                    <i class="bi bi-people"></i></i><span>{{__('home.users')}}</span>
                    <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
                </a>
                @endif
            </li>
            <li class="nav-item">
                @if(Auth::user()->role->name == 'super_admin')
                <a class="nav-link collapsed" href="{{url('admin/messages')}}">
                    <i class="bi bi-envelope"></i></i><span>{{__('home.messages')}}</span>
                    <!-- <i class="bi bi-chevron-down ms-auto"></i> -->
                </a>
                @endif
            </li>



            <li class="nav-heading">{{__('home.pages')}}</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('admin/profile') }}">
                    <i class="bi bi-person"></i>
                    <span>{{__('home.profile')}}</span>
                </a>
            </li>
        </ul>

    </aside>
    <!-- End Sidebar-->

    @yield('content')



    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            {{__('home.copy_rights')}}&copy;
        </div>
        <div class="credits">
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('adminAssets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/quill/quill.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('adminAssets/vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('adminAssets/js/main.js')}}"></script>

    @yield('scripts')

</body>

</html>
