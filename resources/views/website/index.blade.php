@extends('website.layout')
@section('title', __('home.home'))
@section('content')
@php
    if(!auth()->check()){
        $lang = 'en';
        $Dir = 'ltr';
    }else{
        $lang = auth()->user()->locale;
        if($lang == 'ar'){
            $Dir = 'rtl';
        }else{
            $Dir = 'ltr';
        }
    }
@endphp
{{-- <a href="{{ route('admin.index') }}">View Admin Dashboard</a> --}}
@if ($lang == 'ar')
    <div class="site-blocks-cover" style="background-image: url('{{ asset('assets/images/rtlHero.png') }}');" data-aos="fade">
@else
    <div class="site-blocks-cover" style="background-image: url('{{ asset('assets/images/hero_1.jpg') }}');" data-aos="fade">
@endif
    <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
            <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
                <h1 class="mb-2">{{ __('home.finding_perfect_shoes') }}</h1>
                <div class="intro-text text-center text-md-left">
                    <p class="mb-4">{{ __('home.hero_description') }}</p>
                    <p>
                        <a href="#" class="btn btn-sm btn-primary">{{ __('home.shop_now') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section site-blocks-1">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-truck"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">{{ __('home.free_shipping') }}</h2>
                    <p>{{ __('home.free_shipping_description') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-refresh2"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">{{ __('home.free_returns') }}</h2>
                    <p>{{ __('home.free_returns_description') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-help"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">{{ __('home.customer_support') }}</h2>
                    <p>
                        <a href="{{url('shops')}}" class="btn btn-sm btn-primary">{{ __('home.shop_now') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

    @include('website.components.categories')

<div class="site-section block-3 site-blocks-2 bg-light">
    @include('website.components.feature-products')
</div>

<div class="site-section block-8">
    <div class="container">
        <div class="row justify-content-center  mb-5">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>{{__('home.bigSale')}}</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-7 mb-5">
                <a href="#"><img src="{{ asset('assets/images/blog_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded"></a>
            </div>
            <div class="col-md-12 col-lg-5 text-center pl-md-5">
                <h2><a href="#">{{ __('home.sale_discount') }}</a></h2>
                <p class="post-meta mb-4">{!! __('home.sale_meta', ['author' => '<a href="#">Carl Smith</a>', 'date' => 'September 3, 2018']) !!}</p>
                <p>{{ __('home.sale_description') }}</p>
                <p><a href="{{url('shops')}}" class="btn btn-primary btn-sm">{{ __('home.shop_now') }}</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
