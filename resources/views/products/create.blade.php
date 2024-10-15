@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Create Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="img" class="form-label">Image</label>
            <input type="file" name="img" class="form-control" id="img">
        </div>

        <div class="form-group">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" class="form-control" id="price" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="offer_price" class="form-label">Offer Price</label>
            <input type="number" name="offer_price" class="form-control" id="offer_price" step="0.01">
        </div>

        <div class="form-group">
            <label for="discount_type" class="form-label">Discount Type</label>
            <select name="discount_type" class="form-select" id="discount_type">
            <option value="">-- Select Discount Type --</option>
        <option value="percentage" >Percentage</option>
        <option value="flat" >Fixed Amount</option>
            </select>
        </div>

        <div class="form-group">
            <label for="discount" class="form-label">Discount</label>
            <input type="number" name="discount" class="form-control" id="discount" step="0.01">
        </div>

        <div class="form-group form-check">
            <input type="hidden" name="active" value="0"> <!-- This ensures that unchecked will send 0 -->
            <input type="checkbox" name="active" class="form-check-input" id="active" value="1" checked>
            <label class="form-check-label" for="active">Active</label>
        </div>

        <div class="form-group">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" class="form-select" id="category_id">
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

          <!-- Add Colors -->
          <div class="form-group">
            <label for="colors" class="form-label">Colors</label>
            <div>
                @foreach($colors as $color)
                    <label class="d-block">
                        <input type="checkbox" name="colors[]" value="{{ $color->id }}">
                        <span>{{ $color->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Add Sizes -->
        <div class="form-group">
            <label for="sizes" class="form-label">Sizes</label>
            <div>
                @foreach($sizes as $size)
                    <label class="d-block">
                        <input type="checkbox" name="sizes[]" value="{{ $size->id }}">
                        <span>{{ $size->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
