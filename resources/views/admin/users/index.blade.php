@extends('admin.layout')
@section('title', 'Users')
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
                                        <th>{{ __('users.role') }}</th>
                                        <th>{{ __('users.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="user-row" data-href="{{ url("admin/users/$user->id") }}">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->locale }}</td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url("admin/users/$user->id/edit") }}" class="btn btn-primary btn-sm">{{ svg('bi-pencil-square') }}</a>
                                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Change Role
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        @foreach(['user', 'admin', 'super_admin'] as $role)
                                                            @if($user->role->name !== $role)
                                                                <li>
                                                                    <form action="{{ route('users.change-role', ['id' => $user->id, 'role' => $role]) }}" method="POST">
                                                                        @csrf
                                                                        <button type="submit" class="dropdown-item">Make {{ ucfirst($role) }}</button>
                                                                    </form>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
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
