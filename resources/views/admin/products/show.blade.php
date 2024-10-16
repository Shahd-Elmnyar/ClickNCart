@extends('admin.layout')

@section('title',  $product->name['en'])

@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row align-items-top d-flex justify-content-center">
            <div class="col-lg-8">
                @if($product)
                    <div class="card">
                        @if($product->img)
                            <img src="{{ asset('storage/' . $product->img) }}" class="card-img-top" alt="{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}</h5>
                            <p class="card-text">{{ $product->content[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->content['en'] }}</p>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('products.back') }}</a>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        {{ __('products.product_not_found') }}
                    </div>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection