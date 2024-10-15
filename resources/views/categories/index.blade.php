@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add New Category</a>
    <a href="{{ route('categories.trashed') }}" class="btn btn-secondary mb-3">View Trashed Categories</a>



    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Category Image</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Parent Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        @if($category->img)
                            <img src="{{ asset('storage/' . $category->img) }}" alt="{{ $category->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->parent ? $category->parent->name : 'None' }}</td>
                    <td>{{ $category->active ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning ">Edit</a>

                        <!-- Trash Button -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                           </form>
                    </td>
                </tr>
                @if ($category->children->isNotEmpty())
                    @foreach($category->children as $child)
                        <tr>
                            <td>
                                @if($child->img)
                                    <img src="{{ asset('storage/' . $child->img) }}" alt="{{ $child->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>-- {{ $child->name }}</td>
                            <td>{{ $child->slug }}</td>
                            <td>{{ $child->parent ? $child->parent->name : 'None' }}</td>
                            <td>{{ $child->active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $child->id) }}" class="btn btn-warning">Edit</a>

                                <!-- Trash Button for Child Category -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning " onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                           </form>
                        </td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
