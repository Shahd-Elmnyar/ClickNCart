@extends('admin.layout')
@section('title', 'Create Product')
@section('content')
<main id="main" class="main">
    @include('admin.components.breadcrumb',['pageName'=>'Create Product'])
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('products.create_new_product') }}</h5>

                <!-- Include the error alert component -->
                @include('messages.errors')

                <!-- Product Creation Form -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row mb-3">
                        <label for="name_en" class="col-sm-2 col-form-label">{{ __('products.name_en') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name_en" id="name_en" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name_ar" class="col-sm-2 col-form-label">{{ __('products.name_ar') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name_ar" id="name_ar" required>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="content_en" class="col-sm-2 col-form-label">{{ __('products.description_en') }}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content_en" id="content_en" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="content_ar" class="col-sm-2 col-form-label">{{ __('products.description_ar') }}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content_ar" id="content_ar" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">{{ __('products.price') }}</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" name="price" id="price" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="offer_price" class="col-sm-2 col-form-label">{{ __('products.offer_price') }}</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" name="offer_price" id="offer_price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="img" class="col-sm-2 col-form-label">{{ __('products.image') }}</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="img" id="img" accept="image/*" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="discount_type" class="col-sm-2 col-form-label">{{ __('products.discount_type') }}</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="discount_type" id="discount_type" required>
                                <option value="percentage">Percentage</option>
                                <option value="fixed">Fixed Amount</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="discount" class="col-sm-2 col-form-label">{{ __('products.discount') }}</label>
                        <div class="col-sm-10">
                            <input type="number" step="0.01" class="form-control" name="discount" id="discount">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label">{{ __('products.category') }}</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id" id="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="sizes" class="col-sm-2 col-form-label">{{ __('products.sizes') }}</label>
                        <div class="col-sm-10">
                            @foreach($sizes as $size)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sizes[]" value="{{ $size->id }}" id="size_{{ $size->id }}">
                                    <label class="form-check-label" for="size_{{ $size->id }}">
                                        {{ $size->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">
                                    {{ __('products.active') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">
                                    {{ __('products.featured') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">{{ __('products.create_product') }}</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">{{ __('products.back') }}</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</main>
@endsection
