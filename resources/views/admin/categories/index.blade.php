@extends('admin.layout')
@section('title', 'Categories')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ __('categories.categories') }}</h1>
            @include('admin.components.breadcrumb', ['pageName' => __('categories.categories')])
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('categories.categories') }}</h5>

                            <!-- Add Category Button -->
                            <div class="d-flex justify-content-end">

                                <a href="{{ url('admin/categories/create') }}" class="btn btn-primary mb-3">{{ __('categories.add_category') }}</a>
                                <a href="{{ route('categories.trashed') }}" class="btn btn-secondary mb-3">{{ __('categories.view_trashed_categories') }}</a>
                            </div>
                            @include('messages.success')
                            <!-- Table with stripped rows -->
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>{{ __('categories.id') }}</th>
                                        <th>{{ __('categories.name') }}</th>
                                        <th>{{ __('categories.content') }}</th>
                                        <th>{{ __('categories.image') }}</th>
                                        <th>{{ __('categories.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="category-row" data-href="{{ url("admin/categories/$category->id") }}">
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ Str::limit($category->content, 50) }}</td>
                                            <td>
                                                @if ($category->img)
                                                    <img src="{{ asset('storage/' . $category->img) }}"
                                                        alt="{{ $category->name }}"
                                                        style="max-width: 100px; max-height: 100px;">
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url("admin/categories/$category->id/edit") }}"
                                                    class="btn btn-primary">{{ svg('bi-pencil-square') }}</a>
                                                <a href="{{ url("admin/categories/$category->id") }}"
                                                    class="btn btn-info">{{ svg('bi-eye-fill') }}</a>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('categories.confirm_trash') }}')">{{ __('categories.trash') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection

