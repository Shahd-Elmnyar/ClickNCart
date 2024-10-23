@extends('admin.layout')
@section('title', 'Products')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{ __('products.products') }}</h1>
        @include('admin.components.breadcrumb', ['pageName' => __('products.products')])
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('products.products') }}</h5>
                        <div class="d-flex justify-content-end">
                            <a href="{{ url('admin/products/create') }}" class="btn btn-primary mb-3">{{ __('products.add_product') }}</a>
                            <a href="{{ route('products.trashed') }}" class="btn btn-secondary mb-3 ml-2">{{ __('products.view_trashed_products') }}</a>
                        </div>
                        @include('messages.success')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('products.id') }}</th>
                                    <th>{{ __('products.name') }}</th>
                                    <th>{{ __('products.price') }}</th>
                                    <th>{{ __('products.category') }}</th>
                                    <th>{{ __('products.sizes') }}</th>
                                    <th>{{ __('products.active') }}</th>
                                    <th>{{ __('products.featured') }}</th>
                                    <th>{{ __('products.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                                        <td>
                                            @foreach($product->sizes as $size)
                                                <span class="badge bg-primary">{{ $size->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $product->active ? 'Yes' : 'No' }}</td>
                                        <td>{{ $product->featured ? 'Yes' : 'No' }}</td>
                                        <td>
                                            <a href="{{ url("admin/products/$product->id/edit") }}" class="btn btn-primary btn-sm">{{ svg('bi-pencil-square') }}</a>
                                            <a href="{{ url("admin/products/$product->id") }}" class="btn btn-info btn-sm">{{ svg('bi-eye-fill') }}</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('products.confirm_trash') }}')">
                                                    {{ svg('bi-trash') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
