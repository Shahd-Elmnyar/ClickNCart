@extends('admin.layout')
@section('title', 'Profile')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>{{ __('profile.profile') }}</h1>
        @include('admin.components.breadcrumb', ['pageName' => 'Profile'])
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                @if(auth()->user()->image == null)
                <img src="{{asset('adminAssets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
                @else
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile" class="rounded-circle">
                @endif
              <h2>{{auth()->user()->name}}</h2>
              <h3>{{auth()->user()->email}}</h3>
              <h3>{{ __('profile.your_role_is') }}: {{auth()->user()->role->name}}</h3>
              @if(auth()->user()->role->name == 'super_admin')
              <p>{{__('profile.super_admin_description')}}</p>
              @endif
              @if(auth()->user()->role->name == 'admin')
              <p>{{__('profile.admin_description')}}</p>
              @endif
            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->


@endsection
