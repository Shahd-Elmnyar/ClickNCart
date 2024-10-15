@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $products->name }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" rows="3" required>{{ $products->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="img" class="form-label">Image</label>
            <input type="file" name="img" class="form-control" id="img">
            <small>Leave blank if you don't want to change the image.</small>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ $products->price }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="offer_price" class="form-label">Offer Price</label>
            <input type="number" name="offer_price" class="form-control" id="offer_price" value="{{ $products->offer_price }}" step="0.01">
        </div>

        <div class="mb-3">
            <label for="discount_type" class="form-label">Discount Type</label>
            <select name="discount_type" class="form-select" id="discount_type">
                <option value="">-- Select Discount Type --</option>
                <option value="percentage" {{ $products->discount_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                <option value="fixed" {{ $products->discount_type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="discount" class="form-label">Discount</label>
            <input type="number" name="discount" class="form-control" id="discount" value="{{ $products->discount }}" step="0.01">
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="active" value="0"> <!-- This ensures that unchecked will send 0 -->
            <input type="checkbox" name="active" class="form-check-input" id="active" value="1" {{ $products->active ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Active</label>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-select" id="category_id">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Add Colors Section -->
        <div class="mb-3">
            <label for="colors" class="form-label">Colors</label>
            @foreach($colors as $color)
                <div class="form-check">
                    <input type="checkbox" name="colors[]" class="form-check-input" id="color_{{ $color->id }}" value="{{ $color->id }}"
                        {{ $products->colors->contains($color->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="color_{{ $color->id }}">{{ $color->name }}</label>
                </div>
            @endforeach
        </div>

        <!-- Add Sizes Section -->
        <div class="mb-3">
            <label for="sizes" class="form-label">Sizes</label>
            @foreach($sizes as $size)
                <div class="form-check">
                    <input type="checkbox" name="sizes[]" class="form-check-input" id="size_{{ $size->id }}" value="{{ $size->id }}"
                        {{ $products->sizes->contains($size->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="size_{{ $size->id }}">{{ $size->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
