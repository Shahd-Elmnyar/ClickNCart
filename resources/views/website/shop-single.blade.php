@extends('website.layout')
@section('title', 'Shop Single')
@section('content')
@include('website.components.breadcrumb', ['pageName' => 'Shop Single'])
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{asset('assets/images/cloth_1.jpg')}}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{ __('shop.tank_top_title') }}</h2>
          <p>{{ __('shop.product_description') }}</p>
          <p class="mb-4">{{ __('shop.product_details') }}</p>
          <p><strong class="text-primary h4">$50.00</strong></p>
          <div class="mb-1 d-flex">
            <label for="option-sm" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">{{ __('shop.size_small') }}</span>
            </label>
            <label for="option-md" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">{{ __('shop.size_medium') }}</span>
            </label>
            <label for="option-lg" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">{{ __('shop.size_large') }}</span>
            </label>
            <label for="option-xl" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black">{{ __('shop.size_extra_large') }}</span>
            </label>
          </div>
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
          <p><a href="cart.html" class="buy-now btn btn-sm btn-primary">{{ __('shop.add_to_cart') }}</a></p>

        </div>
      </div>
    </div>
  </div>
<div class="site-section block-3 site-blocks-2 bg-light">
    @include('website.components.feature-products')
</div>
@endsection
