@extends('admin.layout')

@section('title', $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'])

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{ __('products.product_details') }}</h1>
        @include('admin.components.breadcrumb', ['pageName' => __('products.product_details')])
    </div>
    <section class="section">
        <div class="row align-items-top d-flex justify-content-center">
            <div class="col-lg-8">
                @if($product)
                    <div class="card">
                        <div class="card-body">
                            @if($product->img)
                                <div class="text-center mb-3">
                                    <img src="{{ asset('storage/' . $product->img) }}" class="img-fluid rounded" alt="{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}" style="max-width: 500px; max-height: 500px;">
                                </div>
                            @endif
                            <h5 class="card-title">{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}</h5>
                            <p class="card-text">{{ $product->content[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->content['en'] }}</p>
                            
                            <ul class="list-group list-group-flush mt-3">
                                <li class="list-group-item"><strong>{{ __('products.id') }}:</strong> {{ $product->id }}</li>
                                <li class="list-group-item"><strong>{{ __('products.price') }}:</strong> {{ $product->price }}</li>
                                <li class="list-group-item"><strong>{{ __('products.category') }}:</strong> {{ $product->category->name ?? 'N/A' }}</li>
                                <li class="list-group-item">
                                    <strong>{{ __('products.sizes') }}:</strong>
                                    @foreach($product->sizes as $size)
                                        <span class="badge bg-primary">{{ $size->name }}</span>
                                    @endforeach
                                </li>
                                <li class="list-group-item"><strong>{{ __('products.active') }}:</strong> {{ $product->active ? 'Yes' : 'No' }}</li>
                                <li class="list-group-item"><strong>{{ __('products.featured') }}:</strong> {{ $product->featured ? 'Yes' : 'No' }}</li>
                            </ul>
                            
                            <div class="mt-3">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('products.back') }}</a>
                                <a href="{{ url("admin/products/$product->id/edit") }}" class="btn btn-primary">{{ __('products.edit') }}</a>
                            </div>
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
