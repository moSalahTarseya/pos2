@extends('front.layouts.master')
@php $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr'; @endphp

@section('title')
    {{ __('lang.home') }}
@endsection

@section('css')
    <style>
        .home {
            position: relative;
            text-align: center;
            color: white;
        }

       .bg-sec-color{
        background: transparent linear-gradient(81deg, #374BAA 0%, #647CF3 100%) 0% 0% no-repeat padding-box;
       }


        .box-body {
            background: #ffffff6b 0% 0% no-repeat padding-box;
            border-radius: 8px;
            color: black;
            padding: 20px;
        }


        .card-img-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            /* padding: 6rem 11rem !important; */
            border-radius: calc(0.25rem - 1px);
}
.nav-pills .nav-link.active{
        background: #5EDB9D 0% 0% no-repeat padding-box;
        border-radius: 21px;
    }
    </style>
@endsection

@section('content')

<section class="home-content">
    <div class="home-section-box">

    <div class="centered">
        <div class="content-box ">
            <div class="header text-center">
                <img src="{{ asset('front/images/b.png') }}"
                class="{{ App\Models\Helper::isMobile() ? 'img-30' : 'img-50' }}" alt=""><br>
            </div>
            <div class="content-body text-center pt-4 fw-bold">
                <p>
                    {{ __('lang.welcome_to_our_store') }}
                </p>
            </div><br>
        </div>
        <br><br>
        <br>

    </div>

    </div>
</section>

@endsection




@section('js')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: false,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            smartSpeed: 2000,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 5,
                }
            }
        })
    </script>
@endsection
