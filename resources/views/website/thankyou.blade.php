@extends('layout')
@section('title', __('thank.title'))
@section('content')
@include('components.breadcrumb', ['pageName' => __('thank.breadcrumb')])

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="icon-check_circle display-3 text-success"></span>
                <h2 class="display-3 text-black">{{ __('thank.thank_you') }}</h2>
                <p class="lead mb-5">{{ __('thank.order_success') }}</p>
                <p><a href="{{url('shop-single')}}" class="btn btn-sm btn-primary">{{ __('thank.back_to_shop') }}</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
