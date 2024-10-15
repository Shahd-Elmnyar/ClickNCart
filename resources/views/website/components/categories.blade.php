<div class="site-section site-blocks-2">
    <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7 site-section-heading pt-4">
            <h2>Categories</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="{{ route('shop', array_merge(request()->all(), ['category' => 'Women'])) }}">
                <figure class="image">
                <img src="{{ asset('storage/' . 'categories/women.jpg') }}" alt="Women">
                </figure>
                <div class="text">
                    <span class="text-uppercase">Collections</span>
                    <h3>Women</h3>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <a class="block-2-item" href="{{ route('shop', array_merge(request()->all(), ['category' => 'Children'])) }}">
                <figure class="image">
                <img src="{{ asset('storage/' . 'categories/children.jpg') }}" alt="Children">

                </figure>
                <div class="text">
                    <span class="text-uppercase">Collections</span>
                    <h3>Children</h3>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <a class="block-2-item" href="{{ route('shop', array_merge(request()->all(), ['category' => 'Men'])) }}">
                <figure class="image">
                <img src="{{ asset('storage/' . 'categories/men.jpg') }}" alt="Men">
                </figure>
                <div class="text">
                    <span class="text-uppercase">Collections</span>
                    <h3>Men</h3>
                </div>
            </a>
        </div>
    </div>
</div>
