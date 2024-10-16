@extends('admin.layout')
@section('title', 'Create User')
@section('content')
<main id="main" class="main">
    @include('admin.components.breadcrumb',['pageName'=>'Create User'])
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('users.create_new_user') }}</h5>

                <!-- Include the error alert component -->
                @include('messages.errors')

                <!-- User Creation Form -->
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">{{ __('users.name') }}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">{{ __('users.email') }}</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="email" id="email" required></input>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">{{ __('users.email') }}</label>
                        <div class="col-sm-10">

                            <input type="password" name="password" class="form-control" id="yourPassword" required>
                            
                        </div>
                    </div>         
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">{{ __('users.email') }}</label>
                        <div class="col-sm-10">

                            <input type="password" name="password_confirmation" class="form-control" id="yourPasswordConfirmation" required>
                            
                        </div>
                    </div>         
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">{{ __('users.create_user') }}</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('users.back') }}</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
</main>
@endsection