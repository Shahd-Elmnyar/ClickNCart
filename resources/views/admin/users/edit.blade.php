@extends('admin.layout')
@section('title', 'Edit Users')
@section('content')


<main id="main" class="main">
    @include('admin.components.breadcrumb',['pageName'=>'Edit Users'])
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('users.edit_user') }}</h5>
                @include('messages.errors')

                <!-- General Form Elements -->
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">{{ __('users.name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">{{ __('users.email') }}</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="email" required value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">{{ __('users.image') }}</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="image" id="image">
                            @if($user->image)
                                <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" class="mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">{{ __('users.update_user') }}</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('users.back') }}</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</main>
@endsection
