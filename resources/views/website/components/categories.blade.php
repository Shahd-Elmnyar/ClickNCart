<div class="site-section site-blocks-2">
    <div class="container">
        <div class="row">

            {{-- checking if there are categories to show or not --}}
            @if(isset($categories))
                @foreach ($categories as $category)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                        <a class="block-2-item" href="{{url("showCategory/$category->id")}}">
                            <figure class="image">
                                @if ($category->img)
                                    <img src="{{ asset('storage/' . $category->img) }}"
                                         alt="{{ $category->name }}"
                                         class="img-fluid"
                                         style="width: 300px; height: 300px; object-fit: cover;">
                                @else
                                    <div style="width: 300px; height: 300px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                                        No image
                                    </div>
                                @endif
                            </figure>
                            <div class="text">
                                <span class="text-uppercase">{{$category->name}}</span>
                                <h3>{{$category->content}}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
