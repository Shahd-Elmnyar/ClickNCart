<div class="site-section block-3 site-blocks-2 bg-light">
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
                                @if ($product->img)
                                    <img src="{{ asset('storage/' . $product->img) }}"
                                         alt="{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}"
                                         class="img-fluid"
                                         style="width: 300px; height: 300px; object-fit: cover;">
                                @else
                                    <div style="width: 300px; height: 300px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                        No image
                                    </div>
                                @endif
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="{{ route('product.show', $product->id) }}">{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}</a></h3>
                                <p class="mb-0">{{ $product->content[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->content['en'] }}</p>
                                <div class="mt-3">
                                    @if($product->offer_price && $product->offer_price < $product->price)
                                        <p class="mb-0">
                                            <span class="text-muted text-decoration-line-through" style=" margin-top: 10px; font-size:0.8em;  text-decoration: line-through;  color:grey;">${{ number_format($product->price, 2) }}</span>
                                            <span class="text-danger fw-bold ms-2">${{ number_format($product->offer_price, 2) }}</span>
                                        </p>
                                    @else
                                        <p class="text-success fw-bold mb-0" style=" margin-top: 10px; font-size:0.8em;  text-decoration: line-through;  color:grey;">${{ number_format($product->price, 2) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
</div>
