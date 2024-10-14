@extends('website.layout')
@section('title', 'Shop')
@section('content')
    @include('website.components.breadcrumb', ['pageName' => 'wishlist'])

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="#" >
                        <i class="fa-solid  fa-heart fa-5x"></i>
                    </a>
                    <h2 class="display-3 text-black">My Wishlist</h2>
                    <p class="lead mb-5">There are no products in this wishlist.</p>
                    <p><a href="{{url('shops')}}" class="btn btn-sm btn-primary">Add items to your wishlist!</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
