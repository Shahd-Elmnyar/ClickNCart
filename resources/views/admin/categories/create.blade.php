@extends('admin.layout')
@section('title', 'Create Category')
@section('content')
<main id="main" class="main">
    @include('admin.components.breadcrumb',['pageName'=>'Create Category'])
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('categories.create_new_category') }}</h5>

                <!-- Include the error alert component -->
                @include('messages.errors')

                <!-- Category Creation Form -->
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">{{ __('categories.name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">{{ __('categories.description') }}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="content" id="description" required></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">{{ __('categories.image') }}</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image" id="image" accept="image/*">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">{{ __('categories.create_category') }}</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('categories.back') }}</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</main>
@endsection