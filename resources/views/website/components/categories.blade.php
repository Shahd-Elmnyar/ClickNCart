<div class="site-section site-blocks-2">
    <div class="container">
        <div class="row">

            {{-- checking if there are categories to show or not --}}
            @if(isset($categories))
                @foreach ($categories as $category)
                    <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                        <a class="block-2-item" href="{{url("showCategory/$category->id")}}">
                            <figure class="image">
                                <img src="{{asset('uploads/'.$category->img)}}" alt="" class="img-fluid">
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
