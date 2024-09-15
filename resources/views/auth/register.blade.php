@extends('auth.layout')
@section('title', __('register.register_title'))
@section('content')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <!-- <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="{{ asset('adminassets/img/logo.png') }}" alt="">
                        <span class="d-none d-lg-block">{{ __('register.app_name') }}</span>
                    </a>
                </div>End Logo -->

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">{{ __('register.register_title') }}</h5>
                            <!-- <p class="text-center small">{{ __('register.register_message') }}</p> -->
                        </div>

                        <form class="row g-3 needs-validation" novalidate action="{{ url('register') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="yourName" class="form-label">{{ __('register.your_name') }}</label>
                                <input type="text" name="name" class="form-control" id="yourName" required>
                                <div class="invalid-feedback">{{ __('register.enter_name') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="yourEmail" class="form-label">{{ __('register.your_email') }}</label>
                                <input type="email" name="email" class="form-control" id="yourEmail" required>
                                <div class="invalid-feedback">{{ __('register.enter_email') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">{{ __('register.password') }}</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" required>
                                <div class="invalid-feedback">{{ __('register.enter_password') }}</div>
                            </div>

                            <div class="col-12">
                                <label for="yourPasswordConfirmation" class="form-label">{{ __('register.password_confirmation') }}</label>
                                <input type="password" name="password_confirmation" class="form-control" id="yourPasswordConfirmation" required>
                                <div class="invalid-feedback">{{ __('register.enter_password_confirmation') }}</div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">{{ __('register.create_account') }}</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">{{ __('register.already_have_account') }} <a href="{{ url('login') }}">{{ __('register.log_in') }}</a></p>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="credits">
                    <!-- {{ __('register.designed_by') }} <a href="https://bootstrapmade.com/">{{ __('register.bootstrapmade') }}</a> -->
                </div>

            </div>
        </div>
    </div>

</section>

@endSection
