@extends('dashboard.layouts.master')
@section('title')
    {{ __('dashboard.home') }}
@stop
@section('css')
<style>


    .icon{
    padding: 10px 10px 5px;
    border-radius: 8px;
    transition: .5s !important
    }
    .counter{
        padding: 2px 8px ;
        border-radius: 50px;
        position: absolute;
        top: 0px;
        color: #fff;
        background: #7366ff;
    }
</style>
@stop
@section('content')

    <!-- Start Top Bar -->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <span class="text-muted"><i data-feather="home" class="feather-15"></i>
                            {{ __('dashboard.dashboard') }}</span>
                    </li>
                </ul>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!-- End Top bar -->


    <section class="home">
        <div class="row">


            <div class="col-sm-6 col-xl-3 col-lg-6 pt-3">
                <a href="{{ route('dashboard.admins.index') }}">
                    <div class="card o-hidden static-top-widget-card">
                        <div class="card-body"style="position: relative">
                          <div class="media static-top-widget">
                            <div class="media-body" >
                              <h6 class="font-roboto text-bold">{{ trans('dashboard.admins') }}</h6>
                              <span style="{{ app()->getLocale() == 'ar' ? ' right: 1px':' left: 1px' }}" class="mb-0 counter ">{{ $admins['count'] }}</span>
                            </div>
                           <span class="icon" style="color: #51a5ef; background: #ecf9ff">  <i style="font-size: 50px" data-feather="briefcase"> </i></span>
                          </div>

                        </div>
                    </div>
                </a>
            </div>


            <div class="col-sm-6 col-xl-3 col-lg-6 pt-3">
                <a href="{{ route('dashboard.users.index') }}">
                    <div class="card o-hidden static-top-widget-card">
                        <div class="card-body"style="position: relative">
                          <div class="media static-top-widget">
                            <div class="media-body" >
                              <h6 class="font-roboto text-bold">{{ trans('dashboard.users') }}</h6>
                              <span style="{{ app()->getLocale() == 'ar' ? ' right: 1px':' left: 1px' }}" class="mb-0 counter ">{{ $usersCount }}</span>
                            </div>
                           <span class="icon" style="color: #51a5ef; background: #ecf9ff">  <i style="font-size: 50px" data-feather="users"> </i></span>
                          </div>

                        </div>
                    </div>
                </a>
            </div>





        </div>
    </section>
@stop



@section('js')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <script>
        var w = window.innerWidth;
        let startPosition = w >550
            ? new Date().getDate() - 4 : w  < 550
                ? new Date().getDate() - 2
                : new Date().getDate() - 1
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            dots: false,
            startPosition: startPosition,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 6
                },
                1000: {
                    items: 7
                }
            }
        })
    </script>

@stop
