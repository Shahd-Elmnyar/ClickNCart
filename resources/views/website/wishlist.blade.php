@extends('website.layout')
@section('title', 'Wishlist')
@section('content')
    @include('website.components.breadcrumb', ['pageName' => 'wishlist'])

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2 class="display-4 text-black">{{__('home.wishlist')}}</h2>
                </div>
            </div>
            <div class="row mb-5">
                @forelse ($wishlistItems as $item)
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                        <div class="block-4 text-center border">
                            <figure class="block-4-image">
                                <a href="{{ route('products.show', $item->id) }}">
                                    <img src="{{ asset('storage/' . $item->img) }}" alt="{{ $item->name[auth()->user()->locale] ?? $item->name['en'] }}" class="img-fluid">
                                </a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="{{ route('products.show', $item->id) }}">{{ $item->name[auth()->user()->locale] ?? $item->name['en'] }}</a></h3>
                                <p class="mb-0">{{ Str::limit($item->content[auth()->user()->locale]??$item->content['en'], 50) }}</p>
                                <p class="text-primary font-weight-bold">${{ $item->price }}</p>
                                <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="icon-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center">
                        <p class="lead mb-5">{{__('home.no_wishlist')}}</p>
                        <p><a href="{{ url('shops') }}" class="btn btn-sm btn-primary">{{__('home.add_wishlist')}}!</a></p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
