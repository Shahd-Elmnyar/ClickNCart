@extends('website.layout')
@section('title', __('about.title'))
@section('content')
@include('website.components.breadcrumb', ['pageName' => 'about'])

<div class="site-section border-bottom" data-aos="fade">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="block-16">
                    <figure>
                        <img src={{ asset('assets/images/blog_1.jpg')}} alt="@lang('about.image_placeholder')" class="img-fluid rounded">
                        <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span
                                class="ion-md-play"></span></a>
                    </figure>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <div class="site-section-heading pt-3 mb-4">
                    <h2 class="text-black">{{ __('about.how_we_started') }}</h2>
                </div>
                <p>{{ __('about.start_description_1') }}</p>
                <p>{{ __('about.start_description_2') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="site-section border-bottom" data-aos="fade">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>{{ __('about.the_team') }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="block-38 text-center">
                    <div class="block-38-img">
                        <div class="block-38-header">
                            <img src={{ asset('assets/images/person_1.jpg')}} alt="@lang('about.image_placeholder')" class="mb-4">
                            <h3 class="block-38-heading h4">{{ __('about.team_member_1_name') }}</h3>
                            <p class="block-38-subheading">{{ __('about.team_member_1_role') }}</p>
                        </div>
                        <div class="block-38-body">
                            <p>{{ __('about.team_member_description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="block-38 text-center">
                    <div class="block-38-img">
                        <div class="block-38-header">
                            <img src={{ asset('assets/images/person_2.jpg')}} alt="@lang('about.image_placeholder')" class="mb-4">
                            <h3 class="block-38-heading h4">{{ __('about.team_member_2_name') }}</h3>
                            <p class="block-38-subheading">{{ __('about.team_member_2_role') }}</p>
                        </div>
                        <div class="block-38-body">
                            <p>{{ __('about.team_member_description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="block-38 text-center">
                    <div class="block-38-img">
                        <div class="block-38-header">
                            <img src={{ asset('assets/images/person_3.jpg')}} alt="@lang('about.image_placeholder')" class="mb-4">
                            <h3 class="block-38-heading h4">{{ __('about.team_member_3_name') }}</h3>
                            <p class="block-38-subheading">{{ __('about.team_member_3_role') }}</p>
                        </div>
                        <div class="block-38-body">
                            <p>{{ __('about.team_member_description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="block-38 text-center">
                    <div class="block-38-img">
                        <div class="block-38-header">
                            <img src={{ asset('assets/images/person_4.jpg')}} alt="@lang('about.image_placeholder')" class="mb-4">
                            <h3 class="block-38-heading h4">{{ __('about.team_member_4_name') }}</h3>
                            <p class="block-38-subheading">{{ __('about.team_member_4_role') }}</p>
                        </div>
                        <div class="block-38-body">
                            <p>{{ __('about.team_member_description') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-truck"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">{{ __('about.free_shipping') }}</h2>
                    <p>{{ __('about.free_shipping_description') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-refresh2"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">{{ __('about.free_returns') }}</h2>
                    <p>{{ __('about.free_returns_description') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-help"></span>
                </div>
                <div class="text">
                    <h2 class="text-uppercase">{{ __('about.customer_support') }}</h2>
                    <p>{{ __('about.customer_support_description') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
