@extends('admin.layout')
@section('title', 'Edit Product')
@section('content')


<main id="main" class="main">
    @include('admin.components.breadcrumb',['pageName'=>'Edit Product'])
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('products.edit_product') }}</h5>
                @include('messages.errors')
                @include('messages.success')

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row mb-3">
                        <label for="name_en" class="col-sm-2 col-form-label">{{ __('products.name_en') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name_en" id="name_en" value="{{ old('name_en', $product->name['en']) }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name_ar" class="col-sm-2 col-form-label">{{ __('products.name_ar') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name_ar" id="name_ar" value="{{ old('name_ar', $product->name['ar']) }}" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="content_en" class="col-sm-2 col-form-label">{{ __('products.content_en') }}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content_en" id="content_en" required>{{ old('content_en', $product->content['en']) }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="content_ar" class="col-sm-2 col-form-label">{{ __('products.content_ar') }}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content_ar" id="content_ar" required>{{ old('content_ar', $product->content['ar']) }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">{{ __('products.price') }}</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" name="price" id="price" value="{{ old('price', $product->price) }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="offer_price" class="col-sm-2 col-form-label">{{ __('products.offer_price') }}</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" name="offer_price" id="offer_price" value="{{ old('offer_price', $product->offer_price) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="discount_type" class="col-sm-2 col-form-label">{{ __('products.discount_type') }}</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="discount_type" id="discount_type" required>
                                <option value="percentage" {{ old('discount_type', $product->discount_type) == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                <option value="fixed" {{ old('discount_type', $product->discount_type) == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="discount" class="col-sm-2 col-form-label">{{ __('products.discount') }}</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" name="discount" id="discount" value="{{ old('discount', $product->discount) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label">{{ __('products.category') }}</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id" id="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sizes" class="col-sm-2 col-form-label">{{ __('products.sizes') }}</label>
                        <div class="col-sm-10">
                            @foreach($sizes as $size)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sizes[]" value="{{ $size->id }}" id="size_{{ $size->id }}"
                                        {{ (is_array(old('sizes')) && in_array($size->id, old('sizes'))) || $product->sizes->contains($size->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="size_{{ $size->id }}">
                                        {{ $size->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="img" class="col-sm-2 col-form-label">{{ __('products.image') }}</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="img" id="img" accept="image/*">
                            @if($product->img)
                                <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name['en'] }}" class="mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">
                                    {{ __('products.active') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">
                                    {{ __('products.featured') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">{{ __('products.update_product') }}</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('products.back') }}</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</main>
@endsection
