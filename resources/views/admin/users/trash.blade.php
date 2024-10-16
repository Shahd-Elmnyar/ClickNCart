@extends('admin.layout')

@section('title', __('users.trashed_users'))

@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('users.trashed_users') }}</h5>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">{{ __('users.back') }}</a>
                        @if($trashedUsers->isEmpty())
                            <p>{{ __('users.no_trashed_users') }}</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('users.name') }}</th>
                                        <th>{{ __('users.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trashedUsers as $user)
                                        <tr>
                                            <td>{{ $user->name ?? 'N/A' }}</td>
                                            <td>
                                                <form action="{{ route('users.restore', $user->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">{{ __('users.restore') }}</button>
                                                </form>
                                                <form action="{{ route('users.forceDelete', $user->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('users.confirm_permanent_delete') }}')">{{ __('users.delete_permanently') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
