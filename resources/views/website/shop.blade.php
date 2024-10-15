@extends('website.layout')
@section('title','Shop')
@section('content')

<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                <form action="{{ route('shop') }}" method="GET" id="filterForm">
    <div class="d-flex">
        <!-- Category Filter Dropdown -->
        <div class="dropdown mr-1 ml-md-auto">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ request('category') ? ucfirst(request('category')) : 'Category' }}
            </button>
            <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                <a href="{{ route('shop', ['category' => 'men', 'sort' => request('sort')]) }}" class="dropdown-item">Men</a>
                <a href="{{ route('shop', ['category' => 'women', 'sort' => request('sort')]) }}" class="dropdown-item">Women</a>
                <a href="{{ route('shop', ['category' => 'children', 'sort' => request('sort')]) }}" class="dropdown-item">Children</a>
            </div>
        </div>

        <!-- Sort by Price or Name Filter -->
        <div class="btn-group">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="priceDropdown" data-toggle="dropdown">Reference</button>
            <div class="dropdown-menu" aria-labelledby="priceDropdown">
                <a href="{{ route('shop', ['category' => request('category'), 'sort' => 'name_asc']) }}" class="dropdown-item">Name, A to Z</a>
                <a href="{{ route('shop', ['category' => request('category'), 'sort' => 'name_desc']) }}" class="dropdown-item">Name, Z to A</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('shop', ['category' => request('category'), 'sort' => 'price_low_high']) }}" class="dropdown-item">Price, low to high</a>
                <a href="{{ route('shop', ['category' => request('category'), 'sort' => 'price_high_low']) }}" class="dropdown-item">Price, high to low</a>
            </div>
        </div>
    </div>
</form>
              </div>
            </div>
            <div class="row mb-5">

            @foreach($activeProducts as $product)
<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
   <div class="block-4 text-center border">
      <figure class="block-4-image">
         <a href="{{ route('shop.single', $product->id) }}">
            <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}" class="img-fluid">
         </a>
      </figure>
      <div class="block-4-text p-4">
         <h3><a href="{{ route('shop.single', $product->id) }}">{{ $product->name }}</a></h3>
         <p class="mb-0">{{ $product->content }}</p>
         @if($product->offer_price)
            <p class="text-primary font-weight-bold">
               <span class="text-danger">${{ $product->offer_price }}</span>
               <span class="text-muted" style="text-decoration: line-through;">${{ $product->price }}</span>
            </p>
         @else
            <p class="text-primary font-weight-bold">${{ $product->price }}</p>
         @endif
      </div>
   </div>
</div>
@endforeach

            </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    <li><a href="#">&lt;</a></li>
                    <li class="active"><span>1</span></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
    <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
    <ul class="list-unstyled mb-0">
        <li class="mb-1">
            <a href="{{ route('shop') }}" class="d-flex">
                <span>All</span>
                <span class="text-black ml-auto">({{ $allCount }})</span>
            </a>
        </li>
        <li class="mb-1">
            <a href="{{ route('shop', array_merge(request()->all(), ['category' => 'Men'])) }}" class="d-flex">
                <span>Men</span>
                <span class="text-black ml-auto">({{ $menCount }})</span>
            </a>
        </li>
        <li class="mb-1">
            <a href="{{ route('shop', array_merge(request()->all(), ['category' => 'Women'])) }}" class="d-flex">
                <span>Women</span>
                <span class="text-black ml-auto">({{ $womenCount }})</span>
            </a>
        </li>
        <li class="mb-1">
            <a href="{{ route('shop', array_merge(request()->all(), ['category' => 'Children'])) }}" class="d-flex">
                <span>Children</span>
                <span class="text-black ml-auto">({{ $childrenCount }})</span>
            </a>
        </li>
    </ul>
</div>



            <div class="border p-4 rounded mb-4">
    <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>

    <!-- List of clickable price ranges -->
    <ul class="list-unstyled">
        <li><a href="{{ route('shop', ['min_price' => 0, 'max_price' => 50]) }}">  Under $50</a></li>
        <li><a href="{{ route('shop', ['min_price' => 50, 'max_price' => 100]) }}">$50 - $100</a></li>
        <li><a href="{{ route('shop', ['min_price' => 100, 'max_price' => 200]) }}">$100 - $200</a></li>
        <li><a href="{{ route('shop', ['min_price' => 200, 'max_price' => 500]) }}">$200 - $500</a></li>
        <li><a href="{{ route('shop', ['min_price' => 500]) }}">Above $500</a></li>
    </ul>
</div>



<!-- Size Filter -->
<div class="mb-4">
    <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
    <ul class="list-unstyled">
        <li><a href="{{ route('shop', array_merge(request()->all(), ['sizes' => ['Small']])) }}" class="{{ in_array('Small', request()->input('sizes', [])) ? 'text-bold' : '' }}">Small </a></li>
        <li><a href="{{ route('shop', array_merge(request()->all(), ['sizes' => ['Medium']])) }}" class="{{ in_array('Medium', request()->input('sizes', [])) ? 'text-bold' : '' }}">Medium </a></li>
        <li><a href="{{ route('shop', array_merge(request()->all(), ['sizes' => ['Large']])) }}" class="{{ in_array('Large', request()->input('sizes', [])) ? 'text-bold' : '' }}">Large </a></li>
    </ul>
</div>

<!-- Color Filter -->
<div class="mb-4">
    <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
    <ul class="list-unstyled">
        <li><a href="{{ route('shop', array_merge(request()->all(), ['colors' => ['Red']])) }}" class="{{ in_array('Red', request()->input('colors', [])) ? 'text-bold' : '' }}">Red </a></li>
        <li><a href="{{ route('shop', array_merge(request()->all(), ['colors' => ['Green']])) }}" class="{{ in_array('Green', request()->input('colors', [])) ? 'text-bold' : '' }}">Green </a></li>
        <li><a href="{{ route('shop', array_merge(request()->all(), ['colors' => ['Blue']])) }}" class="{{ in_array('Blue', request()->input('colors', [])) ? 'text-bold' : '' }}">Blue </a></li>
        <li><a href="{{ route('shop', array_merge(request()->all(), ['colors' => ['Purple']])) }}" class="{{ in_array('Purple', request()->input('colors', [])) ? 'text-bold' : '' }}">Purple </a></li>
    </ul>
</div>


            </div>
          </div>
        </div>
    @include('website.components.categories')
</div>
</div>

@endsection
