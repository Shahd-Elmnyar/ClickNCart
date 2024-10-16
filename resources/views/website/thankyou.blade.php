@extends('website.layout')
@section('title', 'Thank You')
@section('content')
@include('website.components.breadcrumb', ['pageName' => 'Thank You'])


<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="icon-check_circle display-3 text-success"></span>
                <h2 class="display-3 text-black">{{__('home.Thank You')}}</h2>
                <p class="lead mb-5">You order was successfuly completed.</p>
                <p><a href="{{url('shop-single')}}" class="btn btn-sm btn-primary">Back to shop</a></p>
            </div>
        </div>
    </div>
</div>
@endsection


