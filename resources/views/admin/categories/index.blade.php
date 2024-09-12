@extends('admin.layout')
@section('title', 'Home')
@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        @include('admin.component.breadcrumb',['pageName'=>'Categories'])
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{$category->name}} </td>
                                    <td>{{$category->content}}</td>
                                    <td>
                                        <a href="{{url("admin/categories/$category->id/edit")}}" class="btn btn-primary">{{ svg('bi-pencil-square') }}</a>
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
