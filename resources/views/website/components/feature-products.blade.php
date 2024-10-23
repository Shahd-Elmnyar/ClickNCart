<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>{{ __('products.featured_products') }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
                @foreach($featuredProducts as $product)
                    <div class="item">
                        <div class="block-4 text-center">
                            <figure class="block-4-image">
                                <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}" class="img-fluid">
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="{{ route('product.show', $product->id) }}">{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}</a></h3>
                                <p class="mb-0"><a href="{{ route('product.show', $product->id) }}">{{ $product->content[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->content['en'] }}</p>
                                <p class="text-primary font-weight-bold">${{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
