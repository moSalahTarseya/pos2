

<div class="sidebar-wrapper">
    <div>
        <div class="  logo-wrapper">
            <a href="#">
                <img class="img-fluid for-light " src="{{asset('images/logo.png')}}" alt="" style="width: 100px">
                <img class="img-fluid for-dark" src="{{asset('images/logo.png')}}" alt="" style="width: 100px">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="#"><img class="img-fluid" src="{{asset('images/logo.png')}}" alt="" style="width: 100px"></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="#"><img class="img-fluid" src="{{asset('images/logo.png')}}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    {{---------------------------- home  ----------------------------------------}}
                        <li class="sidebar-list">
                            <a class="sidebar-link    mt-5  sidebar-title link-nav {{request()->routeIs('dashboard') || request()->routeIs('dashboard') ? 'active' : ''}} " href="{{route('dashboard')}}">
                                <i data-feather="home"class="feather-25"> </i>
                                <span style="font-family:  'Tajawal', sans-serif;">{{ trans('dashboard.home') }}</span>
                            </a>
                        </li>




                        <li class="sidebar-list">
                            <a class="sidebar-link   sidebar-title link-nav {{request()->routeIs('dashboard.languages.*')? 'active' : ''}} "
                                href="{{route('dashboard.languages.index')}}">
                                <i data-feather="globe"> </i>
                                <span style="font-family:  'Tajawal', sans-serif;">{{ trans('dashboard.languages') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link   sidebar-title link-nav {{request()->routeIs('dashboard.admins.*')? 'active' : ''}} "
                                href="{{route('dashboard.admins.index')}}">
                                <i data-feather="users"> </i>
                                <span style="font-family:  'Tajawal', sans-serif;">{{ trans('dashboard.admins') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link   sidebar-title link-nav {{request()->routeIs('dashboard.users.*')? 'active' : ''}} "
                                href="{{route('dashboard.users.index')}}">
                                <i data-feather="users"> </i>
                                <span style="font-family:  'Tajawal', sans-serif;">{{ trans('dashboard.users') }}</span>
                            </a>
                        </li>

                        <li class="sidebar-list">
                            <a class="sidebar-link   sidebar-title link-nav {{request()->routeIs('dashboard.products.*')? 'active' : ''}} "
                                href="{{route('dashboard.products.index')}}">
                                <i data-feather="shopping-cart"> </i>
                                <span style="font-family:  'Tajawal', sans-serif;">{{ trans('dashboard.products') }}</span>
                            </a>
                        </li>



                </ul>

                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>


