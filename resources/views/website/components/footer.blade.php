@if (!Request::is('/'))
<footer class="site-footer border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="footer-heading mb-4">{{ __('navbar.navigations') }}</h3>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">{{ __('navbar.sell_online') }}</a></li>
                            <li><a href="#">{{ __('navbar.features') }}</a></li>
                            <li><a href="#">{{ __('navbar.shopping_cart') }}</a></li>
                            <li><a href="#">{{ __('navbar.store_builder') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">{{ __('navbar.mobile_commerce') }}</a></li>
                            <li><a href="#">{{ __('navbar.dropshipping') }}</a></li>
                            <li><a href="#">{{ __('navbar.website_development') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <ul class="list-unstyled">
                            <li><a href="#">{{ __('navbar.point_of_sale') }}</a></li>
                            <li><a href="#">{{ __('navbar.hardware') }}</a></li>
                            <li><a href="#">{{ __('navbar.software') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h3 class="footer-heading mb-4">{{ __('navbar.promo') }}</h3>
                <a href="#" class="block-6">
                    <img src="{{ asset('assets/images/hero_1.jpg')}}" alt="Image placeholder" class="img-fluid rounded mb-4">
                    <h3 class="font-weight-light  mb-0">{{ __('navbar.finding_perfect_shoes') }}</h3>
                    <p>{{ __('navbar.promo_date') }}</p>
                </a>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="block-5 mb-5">
                    <h3 class="footer-heading mb-4">{{ __('navbar.contact_info') }}</h3>
                    <ul class="list-unstyled">
                        <li class="address">{{ __('navbar.address') }}</li>
                        <li class="phone"><a href="tel://23923929210">{{ __('navbar.phone') }}</a></li>
                        <li class="email">{{ __('navbar.email') }}</li>
                    </ul>
                </div>

                {{-- <div class="block-7">
                    <form method="POST" action="/newsletter" >
                        @csrf
                        <label for="email_subscribe" class="footer-heading">{{ __('navbar.subscribe') }}</label>
                        <div class="form-group">
                            <input name ="email" type="text" class="form-control py-4" id="email_subscribe" placeholder="{{ __('navbar.email') }}">
                            <input type="submit" class="btn btn-sm btn-primary" value="{{ __('navbar.send') }}">
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    {{ __('navbar.copyright') }} &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script>
                        document.write(new Date().getFullYear());
                    </script> {{ __('navbar.all_rights_reserved') }} | {{ __('navbar.template_made_by') }} <i class="icon-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
@endif
</div>