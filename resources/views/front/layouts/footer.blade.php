<section  class="footer pt-5" style=" background-color: #0E2A47;" >
    <footer>
        <div class="container p-3" style="padding: 10px 0px 40px 0px;">
            <div class="row {{ $dir == 'rtl' ?'text-right':'text-left' }}">
                <div class="col-12 col-md-4">
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="">
                    </div>
                    <div class="contant pt-4">
                        <a style="color: #84DFFF;" href="https://www.seoera.net/">seoera.net</a><br>
                        <a style="color: #84DFFF; direction: ltr;" href="tel:+201067865053">+201067865053</a>
                    </div>
                </div>

                <div class="col-6 pt-4 col-lg-2 col-md-4">
                    <div class="head" style="color:#485D73 ;">
                        <b>{{ __('lang.services') }}</b>
                    </div>
                    <div class="contant pt-2">
                        <a style="color: #ffffff; text-decoration: none;" href="#">{{ __('lang.products') }}</a><br>
                    </div>
                </div>
                <div class="col-6 pt-4 col-lg-2 col-md-4">
                    <div class="head" style="color:#485D73 ;">
                        <b>{{ __('lang.account') }}</b>
                    </div>
                    <div class="contant pt-2">
                        <a style="color: #ffffff; text-decoration: none;" href="#">{{ __('lang.login') }}</a><br>
                        <a style="color: #ffffff; text-decoration: none; direction: ltr;" href="#">{{ __('lang.register') }}</a>
                    </div>
                </div>
                <div class="col-6 pt-4 col-lg-2 col-md-4">
                    <div class="head" style="color:#485D73 ;">
                        <b>{{ __('lang.lang') }}</b>
                    </div>
                    <div class="contant pt-2 text-white">
                        <a href="{{route('front.lang')}}?lang=en" class="{{ (App::getLocale()  == 'en') ? '' : ''}} me-3 ms-3 pt-2 "style="text-decoration: none">
                            <span class="lang {{ (App::getLocale()  == 'en') ? '' : ''}}" data-value="en"> English</span>
                        </a>
                        <br>
                        <a href="{{ route('front.lang')}}?lang=ar" class="{{ (App::getLocale()  == 'ar') ? '' : ''}} pt-1 me-3 ms-3" style="text-decoration: none">
                            <span class="lang {{ (App::getLocale()  == 'ar') ? '' : ''}}" data-value="ar"> العربية</span>
                        </a>


                    </div>
                </div>
            </div>
        </div>
        <div class="Copyright text-center p-2" style="background: #08192B;color: #fff;min-height:50px">
        </div>
    </footer>
</section>
