<section class="header">
    <div class="top-header container">
        <div class="site-logo">
            <img src="{{ asset('images/logo.png') }}"  alt="">
        </div>
        <div class="login" style="display: flex">
          @if (!auth()->user())
            <button  type="button" class="btn " id="login" >{{ __('lang.login') }}</button>
            <button  type="button" class="btn btn-primary" id="register">{{ __('lang.register') }}</button>
          @else
          <span>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}<span data-feather="user" class="feather-20"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('front.profile') }}">{{ __('lang.profile') }} <span data-feather="user"></span></a>
                        <hr style="margin: 5px 0 !important">
                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item" href="{{ route('logout') }}">{{ __('lang.log_out') }} <span data-feather="log-out"></span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>

                    </div>
                </div>

        </span>
          @endif
            {{-- <a href="#" class="btn btn-primary"></a> --}}
            @if (App::getLocale() != 'en')
                <a href="{{route('front.lang')}}?lang=en" class="{{ (App::getLocale()  == 'en') ? '' : ''}} mr-3 ml-3 pt-2 "style="text-decoration: none">
                    <span class="lang {{ (App::getLocale()  == 'en') ? '' : ''}}" data-value="en"> <span data-feather='globe'class="feather-20"></span></span>
                </a>
            @endif
            @if (App::getLocale() != 'ar')
                <a href="{{ route('front.lang')}}?lang=ar" class="{{ (App::getLocale()  == 'ar') ? '' : ''}} pt-1 ml-3 mr-3" style="text-decoration: none">
                    <span class="lang {{ (App::getLocale()  == 'ar') ? '' : ''}}" data-value="ar"> <span data-feather='globe'class="feather-20"></span></span>
                </a>
            @endif
        </div>
    </div>
</section>
