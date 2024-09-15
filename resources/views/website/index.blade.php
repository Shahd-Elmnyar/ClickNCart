@extends('website.layout')
@section('title', __('website.title'))

@section('content')
<div class="site-blocks-cover" style="background-image: url('{{ asset('assets/images/hero_1.jpg') }}');" data-aos="fade">
    <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
            <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                <h1 class="mb-2">{{ __('website.perfect_shoes') }}</h1>
                <div class="intro-text text-center text-md-left">
                    <p class="mb-4">{{ __('website.description') }}</p>
                    <p>
                        <a href="#" class="btn btn-sm btn-primary">{{ __('website.shop_now') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section site-section-sm site-blocks-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-truck"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">{{ __('website.free_shipping') }}</h2>
                    <p>{{ __('website.description') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-refresh2"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">{{ __('website.free_returns') }}</h2>
                    <p>{{ __('website.description') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-help"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">{{ __('website.customer_support') }}</h2>
                    <p>{{ __('website.description') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-blocks-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                <a class="block-2-item" href="#">
                    <figure class="image">
                        <img src="{{ asset('assets/images/women.jpg')}}" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                        <span class="text-uppercase">{{ __('website.collections') }}</span>
                        <h3>{{ __('website.women') }}</h3>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                <a class="block-2-item" href="#">
                    <figure class="image">
                        <img src="{{ asset('assets/images/children.jpg')}}" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                        <span class="text-uppercase">{{ __('website.collections') }}</span>
                        <h3>{{ __('website.children') }}</h3>
                    </div>
                </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                <a class="block-2-item" href="#">
                    <figure class="image">
                        <img src="{{ asset('assets/images/men.jpg')}}" alt="" class="img-fluid">
                    </figure>
                    <div class="text">
                        <span class="text-uppercase">{{ __('website.collections') }}</span>
                        <h3>{{ __('website.men') }}</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="site-section block-3 site-blocks-2 bg-light">
    @include('website.components.feature-products')
</div>

<div class="site-section block-8">
    <div class="container">
        <div class="row justify-content-center  mb-5">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>{{ __('website.big_sale') }}</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 mb-5">
                <a href="#"><img src="{{ asset('assets/images/blog_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded"></a>
            </div>
            <div class="col-md-12 col-lg-5 text-center pl-md-5">
                <h2><a href="#">{{ __('website.less_items') }}</a></h2>
                <p class="post-meta mb-4">{{ __('website.by') }} <a href="#">{{ __('website.Carl_Smith') }}</a> <span class="block-8-sep">&bullet;</span> {{ __('website.date') }}</p>
                <p>{{ __('website.description') }}</p>
                <p><a href="#" class="btn btn-primary btn-sm">{{ __('website.read_more') }}</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
