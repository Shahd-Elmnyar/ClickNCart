@extends('website.layout')
@section('title', __('contact.title'))
@section('content')
@include('website.components.breadcrumb', ['pageName' => __('contact.title')])
<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="h3 mb-3 text-black d-flex justify-content-center align-items-center">{{ __('contact.get_in_touch') }}</h2>
        </div>
        <div class="col-md-7 m-auto">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ( session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
          <form action="{{ route('contact.submit') }}" method="post">
            @csrf
            <div class="p-3 p-lg-5 border ">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="first_name" class="text-black">{{ __('contact.first_name') }} <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="first_name" name="first_name">
                  @error('first_name')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6">
                  <label for="Last_name" class="text-black">{{ __('contact.last_name') }} <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="Last_name" name="Last_name">
                  @error('Last_name')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="email" class="text-black">{{ __('contact.email') }} <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="">
                  @error('email')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="subject" class="text-black">{{ __('contact.subject') }}</label>
                  <input type="text" class="form-control" id="subject" name="subject">
                  @error('subject')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_message" class="text-black">{{ __('contact.message') }}</label>
                  <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control">{{ old('c_message') }}</textarea>
                  @error('c_message')  <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="{{ __('contact.send_message') }}">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
