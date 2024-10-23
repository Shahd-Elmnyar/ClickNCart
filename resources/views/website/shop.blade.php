@extends('website.layout')
@section('title', 'Shop')
@section('content')
    @include('website.components.breadcrumb', ['pageName' => 'shop'])

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 order-2">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">{{ __('shop.shop_all') }}</h2>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                        id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        {{ __('shop.latest') }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}">{{ __('shop.latest') }}</a>
                                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'name_asc']) }}">{{ __('shop.name_a_to_z') }}</a>
                                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'name_desc']) }}">{{ __('shop.name_z_to_a') }}</a>
                                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">{{ __('shop.price_low_to_high') }}</a>
                                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">{{ __('shop.price_high_to_low') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        @foreach ($products as $product)
                            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">
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
                                        <p class="mb-0">{{ Str::limit($product->content[auth()->check() ? auth()->user()->locale : 'en']??$product->content['en'], 50) }}</p>
                                        @if($product->offer_price && $product->offer_price < $product->price)
                                        <p class="mb-0">
                                            <span class="text-muted text-decoration-line-through" style=" margin-top: 10px; font-size:0.8em;  text-decoration: line-through;  color:grey;">${{ number_format($product->price, 2) }}</span>
                                            <span class="text-danger fw-bold ms-2">${{ number_format($product->offer_price, 2) }}</span>
                                        </p>
                                    @else
                                        <p class="text-success fw-bold mb-0" style=" margin-top: 10px; font-size:0.8em;  text-decoration: line-through;  color:grey;">${{ number_format($product->price, 2) }}</p>
                                    @endif
                                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                                <i class="icon-heart-o"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="icon-shopping-cart"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.categories') }}</h3>
                        <ul class="list-unstyled mb-0">
                            @foreach($categories as $category)
                                <li class="mb-1">
                                    <a href="{{ request()->fullUrlWithQuery(['category' => $category->id]) }}" class="d-flex">
                                        <span>{{ $category->name}}</span>
                                        <span class="text-black ml-auto">({{ $category->products_count }})</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.filter_by_price') }}</h3>
                            <div id="slider-range" class="border-primary"></div>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">{{ __('shop.size') }}</h3>
                            @foreach($sizes as $size)
                                <label for="s_{{ $size->id }}" class="d-flex">
                                    <input type="checkbox" id="s_{{ $size->id }}" name="sizes[]" value="{{ $size->name }}" class="mr-2 mt-1">
                                    <span class="text-black">{{ $size->name }}</span>
                                </label>
                            @endforeach
                        </div>

                        <div class="mb-4">
                            <button id="apply-filters" class="btn btn-primary btn-sm">{{ __('shop.apply_filters') }}</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="site-section site-blocks-2">
                        <div class="row justify-content-center text-center mb-5">
                            <div class="col-md-7 site-section-heading pt-4">
                                <h2>{{ __('shop.categories') }}</h2>
                            </div>
                        </div>

                        @include('website.components.categories')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        var minPrice = {{ request('min_price', 0) }};
        var maxPrice = {{ request('max_price', 5000) }};

        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 5000,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });

        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));

        $('#apply-filters').click(function() {
            var minPrice = $("#slider-range").slider("values", 0);
            var maxPrice = $("#slider-range").slider("values", 1);
            var sizes = $('input[name="sizes[]"]:checked').map(function() {
                return this.value;
            }).get();

            var url = new URL(window.location.href);
            url.searchParams.set('min_price', minPrice);
            url.searchParams.set('max_price', maxPrice);
            if (sizes.length > 0) {
                url.searchParams.set('sizes', sizes.join(','));
            } else {
                url.searchParams.delete('sizes');
            }

            window.location.href = url.toString();
        });

        // Set checkboxes based on URL parameters
        var sizesParam = new URLSearchParams(window.location.search).get('sizes');
        if (sizesParam) {
            var selectedSizes = sizesParam.split(',');
            selectedSizes.forEach(function(size) {
                $('input[name="sizes[]"][value="' + size + '"]').prop('checked', true);
            });
        }
    });
</script>

@endsection
