@extends('admin.layout')

@section('title', __('categories.trashed_categories'))

@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('categories.trashed_categories') }}</h5>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3">{{ __('categories.back') }}</a>
                        @if($trashedCategories->isEmpty())
                            <p>{{ __('categories.no_trashed_categories') }}</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('categories.name') }}</th>
                                        <th>{{ __('categories.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trashedCategories as $category)
                                        <tr>
                                            <td>{{ $category->name ?? 'N/A' }}</td>
                                            <td>
                                                <form action="{{ route('categories.restore', $category->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">{{ __('categories.restore') }}</button>
                                                </form>
                                                <form action="{{ route('categories.forceDelete', $category->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('categories.confirm_permanent_delete') }}')">{{ __('categories.delete_permanently') }}</button>
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
