@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
    <a href="{{ route('products.trashed') }}" class="btn btn-secondary mb-3">View Trashed Products</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Content</th>
                <th>Price</th>
                <th>Offer Price</th>
                <th>Discount Type</th>
                <th>Discount</th>
                <th>Status</th>
                <th>Category</th>
                <th>Colors</th>
                <th>Sizes</th>
                <th>Created By</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->img)
                            <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->content }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>{{ number_format($product->offer_price, 2) }}</td>
                    <td>{{ $product->discount_type }}</td>
                    <td>{{ $product->discount }}%</td>
                    <td>{{ $product->active ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $product->category ? $product->category->name : 'None' }}</td>

                    <!-- Display product colors -->
                    <td>
                        @if($product->colors->isNotEmpty())
                            <span class="badge bg-primary">{{ implode(', ', $product->colors->pluck('name')->toArray()) }}</span>
                        @else
                            No Colors
                        @endif
                    </td>

                    <!-- Display product sizes -->
                    <td>
                        @if($product->sizes->isNotEmpty())
                            <span class="badge bg-secondary">{{ implode(', ', $product->sizes->pluck('name')->toArray()) }}</span>
                        @else
                            No Sizes
                        @endif
                    </td>
                    <td>{{ $product->created_by }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Trash Button -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
