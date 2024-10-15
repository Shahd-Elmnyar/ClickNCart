<div>
    <!-- //trashed file -->
@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Trashed Categories</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Back to Categories</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trashedCategories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <!-- Restore Button -->
                        <form action="{{ route('categories.restore', $category->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                        </form>

                        <!-- Force Delete Button -->
                        <form action="{{ route('categories.forceDelete', $category->id) }}" method="POST" style="display:inline;">
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

<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div>
