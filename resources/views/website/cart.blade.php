@extends('website.layout')
@section('title', 'cart')
@section('content')
@include('website.components.breadcrumb', ['pageName' => 'cart'])

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
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
                            @forelse ($cart->items as $item)
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{ asset('storage/' . $item->product->img) }}" alt="{{ $item->product->name[auth()->user()->locale] ?? $item->product->name['en'] }}" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $item->product->name[auth()->user()->locale] ?? $item->product->name['en'] }}</h2>
                                    </td>
                                    <td>${{ $item->price }}</td>
                                    <td>
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3" >
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="decrementQuantity(this)">-</button>
                                                </div>
                                                <input type="number" name="quantity" class="form-control text-center" value="{{ $item->quantity }}" min="1" style="width: 60px;">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" onclick="incrementQuantity(this)">+</button>
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-primary btn-sm" type="submit">{{ __('cart.update') }}</button>
                                        </form>
                                    </td>
                                    <td>${{ $item->total }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary btn-sm">X</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Your cart is empty</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-primary btn-sm btn-block">{{ __('cart.update_cart') }}</button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{url('shops')}}" class="btn btn-outline-primary btn-sm btn-block">{{ __('cart.continue_shopping') }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">{{ __('cart.coupon') }}</label>
                        <p>{{ __('cart.coupon_instruction') }}</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="{{ __('cart.coupon_code') }}">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-sm">{{ __('cart.apply_coupon') }}</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">

            <div class="col-md-12 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">{{ __('cart.cart_totals') }}</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <span class="text-black">{{ __('cart.subtotal') }}</span>
                            </div>
                            <div class="col-md-12 text-right">
                                <strong class="text-black"> ${{$cart->total_price}} </strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <span class="text-black">{{ __('cart.total') }}</span>
                            </div>
                            <div class="col-md-12 text-right">
                                <strong class="text-black"> ${{$cart->total_price}} </strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.html'">{{ __('cart.proceed_to_checkout') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function incrementQuantity(button) {
    var input = button.closest('.input-group').querySelector('input[type=number]');
    input.stepUp();
}

function decrementQuantity(button) {
    var input = button.closest('.input-group').querySelector('input[type=number]');
    input.stepDown();
}
</script>
@endsection
