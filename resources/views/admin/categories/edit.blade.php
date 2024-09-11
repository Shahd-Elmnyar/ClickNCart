
    <h1>Edit Category</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Category Name</label>
        <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        <label for="Describtion">Category Name</label>
       <textarea name="Describtion">value="{{ $category->description }}"</textarea>
        <button type="submit">Update</button>
    </form>

 <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Return to Categories</a>
