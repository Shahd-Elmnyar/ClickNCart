@extends('admin.layout')
@section('title', 'Edit Categories')
@section('content')


<main id="main" class="main">
    @include('admin.components.breadcrumb',['pageName'=>'Edit Categories'])
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('categories.edit_category') }}</h5>
                @include('messages.errors')
                @include('messages.success')

                <!-- General Form Elements -->
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">{{ __('categories.name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="content" class="col-sm-2 col-form-label">{{ __('categories.content') }}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content" id="content" required>{{ $category->content }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">{{ __('categories.image') }}</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image" id="image" accept="image/*">
                            @if($category->img)
                                <img src="{{ asset('storage/' . $category->img) }}" alt="{{ $category->name }}" class="mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">{{ __('categories.update_category') }}</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('categories.back') }}</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</main>
@endsection
