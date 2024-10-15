@extends('website.layout')
@section('title', $product->name)
@section('content')
@include('website.components.breadcrumb', ['pageName' => $product->name])

<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2 class="text-black">{{ $product->name }}</h2>
            <p>{{ $product->content }}</p>
            <p><strong class="text-primary h4">${{ $product->price }}</strong></p>
            
            <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 120px;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                    </div>
                    <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                </div>
            </div>
            <p>
                <button class="buy-now btn btn-sm btn-primary">Add To Cart</button>
                <button class="btn-sm btn-outline-primary add-to-favorites" data-product-id="{{ $product->id }}">
                    <i class="icon-heart-o"></i> Add to Favorites
                </button>
            </p>
        </div>
      </div>
    </div>
  </div>
<div class="site-section block-3 site-blocks-2 bg-light">
    @include('website.components.feature-products')
</div>
@endsection
