@extends('admin.layout')

@section('title', __('products.trashed_products'))

@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('products.trashed_products') }}</h5>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">{{ __('products.back') }}</a>
                        @if($trashedProducts->isEmpty())
                            <p>{{ __('products.no_trashed_products') }}</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('products.name') }}</th>
                                        <th>{{ __('products.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($trashedProducts as $product)
                                        <tr>
                                            <td>{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] ?? 'N/A' }}</td>
                                            <td>
                                                <form action="{{ route('products.restore', $product->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">{{ __('products.restore') }}</button>
                                                </form>
                                                <form action="{{ route('products.forceDelete', $product->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('products.confirm_permanent_delete') }}')">{{ __('products.delete_permanently') }}</button>
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
