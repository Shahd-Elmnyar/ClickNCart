@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Trashed Products</h1>
    <a href="{{ route('products.index') }}" class="btn btn-primary mb-3">Back to Products</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trashedProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>
                        <!-- Restore Button -->
                        <form action="{{ route('products.restore', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                        </form>

                        <!-- Force Delete Button -->
                        <form action="{{ route('products.forceDelete', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete Permanently</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
