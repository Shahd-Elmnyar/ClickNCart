@extends('auth.layout')
@section('title', __('login.app_name'))
@section('content')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="assets/img/logo.png" alt="">
                        <span class="d-none d-lg-block">{{ __('login.app_name') }}</span>
                    </a>
                </div><!-- End Logo -->

                <div class="card mb-3">

                    <div class="card-body">

                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">{{ __('login.login_title') }}</h5>
                            <p class="text-center small">{{ __('login.login_message') }}</p>
                        </div>

                        <form class="row g-3 needs-validation" novalidate action="{{ url('login') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="email" class="form-label">{{ __('login.email') }}</label>
                                <div class="input-group has-validation">
                                    <input type="text" name="email" class="form-control" id="email" required>
                                    <div class="invalid-feedback">{{ __('login.enter_email') }}</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">{{ __('login.password') }}</label>
                                <input type="password" name="password" class="form-control" id="yourPassword" required>
                                <div class="invalid-feedback">{{ __('login.enter_password') }}</div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">{{ __('login.remember_me') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit" value="login">{{ __('login.login_button') }}</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">{{ __('login.no_account') }} <a href="pages-register.html">{{ __('login.create_account') }}</a></p>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="credits">
                    {{ __('login.designed_by') }} <a href="https://bootstrapmade.com/">{{ __('login.bootstrapmade') }}</a>
                </div>

            </div>
        </div>
    </div>

</section>

@endSection
