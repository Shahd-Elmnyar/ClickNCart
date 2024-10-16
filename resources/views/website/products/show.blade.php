@extends('website.layout')
@section('title', $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] )
@section('content')
@include('website.components.breadcrumb', ['pageName' => $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en']])

<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2 class="text-black">{{ $product->name[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->name['en'] }}</h2>
            <p>{{ $product->content[auth()->check() ? auth()->user()->locale : 'en'] ?? $product->content['en'] }}</p>
            <p><strong class="text-primary h4">${{ $product->price }}</strong></p>
            
            <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 120px;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                    </div>
                    <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" id="quantity">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                </div>
            </div>
            <p>
                <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-primary">
                        <i class="icon-heart-o"></i>
                    </button>
                </form>
                <button id="addToCartBtn" class="btn btn-sm btn-primary"><i class="icon-shopping-cart"></i></button>
            </p>
        </div>
      </div>
    </div>
  </div>
<div class="site-section block-3 site-blocks-2 bg-light">
    @include('website.components.feature-products')
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInput = document.getElementById('quantity');
        const minusBtn = document.querySelector('.js-btn-minus');
        const plusBtn = document.querySelector('.js-btn-plus');
        const addToCartBtn = document.getElementById('addToCartBtn');

        console.log('DOM Content Loaded');
        console.log('Add to Cart Button:', addToCartBtn);

        minusBtn.addEventListener('click', function() {
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });

        plusBtn.addEventListener('click', function() {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });

        addToCartBtn.addEventListener('click', function() {
            const quantity = parseInt(quantityInput.value);
            const productId = {{ $product->id }};

            fetch('{{ route('cart.add', '') }}/' + productId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ quantity: quantity })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                window.location.reload();
            })
            .catch((error) => {
                console.error('Error:', error);
                // Handle error (e.g., show an error message)
            });
        });
    });
</script>
@endsection
