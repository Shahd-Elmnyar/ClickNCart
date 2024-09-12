@extends('admin.layout')
@section('title', 'Edit Categories')
@section('content')


<main id="main" class="main">
    @include('admin.component.breadcrumb',['pageName'=>'Edit Categories'])
    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">General Form Elements</h5>

                <!-- General Form Elements -->
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">{{__('name')}}</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">{{__('content')}}</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" id="description" required>{{ $category->content }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit Form</button>
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        </div>
        </div>
        @endsection

        <!-- <h1>Edit Category</h1> -->

        {{-- @if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
        @endforeach
        </ul>
        @endif --}}
        <!--
<form action="{{ url("admin.categories.update , $category->id") }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Category Name</label>
    <input type="text" name="name" id="name" value="{{ $category->name }}" required>
    <label for="description">Category Description</label>
    <textarea name="description" id="description" required>{{ $category->description }}</textarea>
    <button type="submit">Update</button>
</form>

<a href="{{ url('admin.categories.index') }}" class="btn btn-secondary">Return to Categories</a> -->
