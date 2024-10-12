@extends('admin.layout')
@section('title', 'Home')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            @include('admin.components.breadcrumb', ['pageName' => 'Users'])
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('users.users') }}</h5>

                            <!-- Add Category Button -->
                            <div class="d-flex justify-content-end">

                                <a href="{{ url('admin/users/create') }}" class="btn btn-primary mb-3">{{ __('users.add_user') }}</a>
                                <a href="{{ route('users.trashed') }}" class="btn btn-secondary mb-3">{{ __('users.view_trashed_users') }}</a>
                            </div>
                            @include('messages.success')
                            <!-- Table with stripped rows -->
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>{{ __('users.id') }}</th>
                                        <th>{{ __('users.name') }}</th>
                                        <th>{{ __('users.email') }}</th>
                                        <th>{{ __('users.language') }}</th>
                                        <th>{{ __('users.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="user-row" data-href="{{ url("admin/users/$user->id") }}">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                {{$user->locale}}
                                            </td>
                                            <td>
                                                <a href="{{ url("admin/users/$user->id/edit") }}"
                                                    class="btn btn-primary">{{ svg('bi-pencil-square') }}</a>
                                                {{-- <a href="{{ url("admin/users/$user->id") }}"
                                                    class="btn btn-info">{{ svg('bi-eye-fill') }}</a> --}}
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('users.confirm_trash') }}')">{{ __('users.trash') }}</button>
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

