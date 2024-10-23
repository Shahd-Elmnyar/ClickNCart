@extends('admin.layout')
@section('title', 'Messages')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            @include('admin.components.breadcrumb', ['pageName' => 'Messages'])
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('messages.messages') }}</h5>

                            <!-- Add Category Button -->
                            <div class="d-flex justify-content-end">
                            </div>
                            {{-- @include('messages.success') --}}
                            <!-- Table with stripped rows -->
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>{{ __('messages.id') }}</th>
                                        <th>{{ __('messages.user') }}</th>
                                        <th>{{ __('messages.title') }}</th>
                                        <th>{{ __('messages.content') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr class="message-row" data-href="{{ url("admin/messages/$message->id") }}">
                                            <td>{{ $message->id }}</td>
                                            <td>{{ $message->user->name }}</td> 
                                            <td>{{ $message->title }}</td>
                                            <td>{{ $message->content }}</td>
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
