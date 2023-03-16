<section class="navbar-links " style="    box-shadow: 0px 15px 16px -25px;">
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light ">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse {{ $dir == 'rtl' ? 'text-right' : 'text-left' }}" id="navbarSupportedContent">
      <ul class="navbar-nav " style="padding-right:0px ">
        <li class="nav-item ">
          <a class="nav-link {{ request()->routeIs('home')?'active':'' }}" href="{{ route('home') }}">{{ __('lang.home') }}</a>
        </li>

      </ul>


    </div>

</nav>
</div>
</section>


  <!-- Modal -->

@include('front.layouts.login_modal')
