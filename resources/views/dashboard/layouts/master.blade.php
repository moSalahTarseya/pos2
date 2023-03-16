<?php
    $mode = Session::get('isDark') == true? 'dark-only' : 'light-only';
    // dd($mode);
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"
    @if (app()->getLocale() == 'ar') direction="rtl" dir="rtl" style="direction: rtl" @endif>

<head>
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugines/noty/noty.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-switch.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Tarseya | Digital Marketing" name="author" />
    <meta name="_token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <title>{{ config('app.name') }} -@yield('title')</title>

    <style>
        .page-wrapper .page-header .header-wrapper .nav-right .onhover-show-div li p {
            opacity: 1 !important;
        }

        .page-body .content .container {
            padding: 0px !important;
            max-width: 100% !important;
        }

        .fa-edit:before {
            content: "\f044";
        }

        .fa-trash-alt::before {
            content: "\f2ed";
        }

        .fa-eye::before {
            content: "\f06e";
        }

        .noty_buttons .btn-danger {
            float: right;
            margin-bottom: 8px;
        }

        .noty_buttons .btn-primary {
            float: left;
            margin-bottom: 8px;
        }

        .material-switch>input:checked+label::before {
            background: #26529b;
            opacity: 0.5;
        }

        .material-switch>input:checked+label::after {
            background: #26529b;
            left: 20px;
        }

        /*scrollbar width */
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        /*scrollbar Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px #8ac2db;
            border-radius: 10px;
        }

        /*scrollbar Handle */
        ::-webkit-scrollbar-thumb {
            background: #43b3e4;
            border-radius: 10px;
        }

        /*scrollbar Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #276f8f;
        }

    </style>

    @include('dashboard.layouts.css')
    @yield('style')
<script>

    const LANG = {
        please_select_photo         :   '{{ __("dashboard.please_select_photo") }}',
        are_you_sure_to_delete      :   "{{ __('dashboard.are_you_sure_to_delete') }}",
        yes                         :   "{{ __('dashboard.yes') }}",
        no                          :   "{{ __('dashboard.no') }}",
        this_item_has_been_deleted  :   "{{ __('dashboard.this_item_has_been_deleted') }}",
    };
</script>

</head>

<body class="light-sidebar {{ $mode }}" @if (Route::current()->getName() == 'index') onload="startTime()" @endif data-session="{{ $mode }}">
    @if (Route::current()->getName() == 'index')
        <div class="loader-wrapper">
            <div class="loader-index"><span></span></div>
            <svg>
                <defs></defs>
                <filter id="goo">
                    <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                    <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                    </fecolormatrix>
                </filter>
            </svg>
        </div>
    @endif
    @include('partials._session')
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('dashboard.layouts.header')
        <!-- Page Header Ends  -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('dashboard.layouts.sidebar')
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    @yield('breadcrumb-title')
                    <!-- Container-fluid starts-->
                    @yield('content')
                    <!-- Container-fluid Ends-->
                </div>
            </div>
            <!-- footer start-->
            @include('dashboard.layouts.footer')

        </div>
    </div>
    <!-- latest jquery-->
    @include('dashboard.layouts.script')
    <!-- Plugin used-->


    <script src="{{ asset('plugines/noty/noty.min.js') }}"></script>

</body>

</html>
