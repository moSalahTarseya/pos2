<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
    rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/font-awesome.css') }}">
<!-- ico-font-->

<link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/icofont.css') }}">
<!-- Themify icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/themify.css') }}">
<!-- Flag icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/flag-icon.css') }}">
<!-- Feather icon-->
<link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/feather-icon.css') }}">
<!-- Plugins css start-->
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

@yield('css')
<link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/scrollbar.css') }}">
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/vendors/bootstrap.css') }}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/style.css') }}">
<link id="color" rel="stylesheet" href="{{ asset('cuba/assets/css/color-1.css') }}" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{ asset('cuba/assets/css/responsive.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('front') }}/assets/css/magnific-popup.css">
<link href="{{ asset('admin') }}/assets/css/style.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/iziToast.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">


<link rel="stylesheet" href="{{ asset('cuba/assets/css/vendors/select2.css') }}">
<script src="{{ asset('cuba/assets/js/jquery-3.5.1.min.js') }}"></script>


<style>
    *,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Cairo', sans-serif;
    }

    {{-- input[type=checkbox], --}} .w3-check,
    .w3-radio,
    input[type=radio] {
        width: 24px;
        height: 24px;
        position: relative;
        top: 6px;
    }

    .customizer-links,
    .modal-backdrop {
        display: none
    }

    .modal {
        background-color: rgba(0, 0, 0, 0.3);
    }

    .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-submenu li a.active {
        color: var(--theme-deafult) !important;
    }

    .select2-container {
        z-index: 999999999 !important;
    }

    .card,
    .page-header {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24) !important;
    }

    .feather-25 {
        width: 25px;
        height: 25px;
    }

    .feather-15 {
        width: 15px;
        height: 15px;
    }

    .feather-20 {
        width: 20px;
        height: 20px;
    }

    .ml-5 {
        margin-left: 5px !important
    }

    .select2-container span>img {
        width: 30px !important;
        height: 25px !important;
    }

    body.dark-only>#pageWrapper>div.page-body-wrapper>div.page-body>div>div.row>div>div>div>div>div.card-header.mb-5,
    body.dark-only>#pageWrapper>div.page-body-wrapper>div.page-body>div>div.row>div>div>div>div>form>div.card-header.mb-5,
    body.dark-only>#pageWrapper>div.page-body-wrapper>div.page-body>div>div.container-fluid>div>div>div>form>div.card-header.mb-5,
    body.dark-only>#pageWrapper>div.page-body-wrapper>div.page-body>div>div.row_>div>div>div>div>form>div.card-header.mb-5{
        background-color: #262932 !important;
    }

    .mode-dark-style {
        color: rgba(255, 255, 255, 0.6) !important;
        background-color: #262932 !important;
    }
    .form-group.zip_code .input-group-addon:first-child {
        border-right: 0;
        border-left: 1px solid #ccc;
        border-bottom-right-radius: 0!important;
        border-top-right-radius: 0!important;
        border-bottom-left-radius: 4px;
        border-top-left-radius: 4px;
    }

    input.id_number::-webkit-outer-spin-button,
    input.id_number::-webkit-inner-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
    input.id_number[type=number] {
        -moz-appearance: textfield;
    }

</style>

