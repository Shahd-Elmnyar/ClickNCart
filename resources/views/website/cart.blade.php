@extends('website.layout')
@section('title', __('cart.title'))
@section('content')
@include('website.components.breadcrumb', ['pageName' => __('cart.page_name')])

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">{{ __('cart.image') }}</th>
                                <th class="product-name">{{ __('cart.product') }}</th>
                                <th class="product-price">{{ __('cart.price') }}</th>
                                <th class="product-quantity">{{ __('cart.quantity') }}</th>
                                <th class="product-total">{{ __('cart.total') }}</th>
                                <th class="product-remove">{{ __('cart.remove') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-thumbnail">
                                    <img src="{{ asset('assets/images/cloth_1.jpg')}}" alt="{{ __('cart.image') }}" class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">{{ __('cart.top_up_tshirt') }}</h2>
                                </td>
                                <td>{{ __('cart.price_value') }}</td>
                                <td>
                                    <div class="input-group mb-3" style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ __('cart.price_value') }}</td>
                                <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                            </tr>

                            <tr>
                                <td class="product-thumbnail">
                                    <img src="{{ asset('assets/images/cloth_2.jpg')}}" alt="{{ __('cart.image') }}" class="img-fluid">
                                </td>
                                <td class="product-name">
                                    <h2 class="h5 text-black">{{ __('cart.polo_shirt') }}</h2>
                                </td>
                                <td>{{ __('cart.price_value') }}</td>
                                <td>
                                    <div class="input-group mb-3" style="max-width: 120px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                        </div>
                                        <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ __('cart.price_value') }}</td>
                                <td><a href="#" class="btn btn-primary btn-sm">X</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-primary btn-sm btn-block">{{ __('cart.update_cart') }}</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary btn-sm btn-block">{{ __('cart.continue_shopping') }}</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">{{ __('cart.coupon') }}</label>
                        <p>{{ __('cart.coupon_description') }}</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="{{ __('cart.coupon_placeholder') }}">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-sm">{{ __('cart.apply_coupon') }}</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">{{ __('cart.cart_totals') }}</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">{{ __('cart.subtotal') }}</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">{{ __('cart.subtotal_value') }}</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">{{ __('cart.total') }}</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">{{ __('cart.total_value') }}</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='{{ url('checkout') }}'">{{ __('cart.proceed_to_checkout') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
