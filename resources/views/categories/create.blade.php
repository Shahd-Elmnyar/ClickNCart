@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Create Category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="form-group">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" required>
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
            <label for="parent_id" class="form-label">Parent Category (Optional)</label>
            <select name="parent_id" class="form-select" id="parent_id">
                <option value="">-- Select Parent Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group form-check">
        <input type="hidden" name="active" value="0"> <!-- This ensures that unchecked will send 0 -->
        <input type="checkbox" name="active" class="form-check-input" id="active" value="1" checked>
            <label class="form-check-label" for="active">Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
