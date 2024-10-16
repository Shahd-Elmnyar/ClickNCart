@extends('admin.layout')

@section('title', $category ? __('categories.show_category', ['name' => $category->name]) : __('categories.category_not_found'))

@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row align-items-top d-flex justify-content-center">
            <div class="col-lg-8">
                @if($category)
                    <div class="card">
                        @if($category->img)
                            <img src="{{ asset('storage/' . $category->img) }}" class="card-img-top" alt="{{ $category->name }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{{ $category->content }}</p>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('categories.back') }}</a>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        {{ __('categories.category_not_found') }}
                    </div>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection