<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ url('/cuba/assets') }}/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="{{ url('/cuba/assets') }}/images/favicon.png" type="image/x-icon">
    <title>لوحة التحكم | تسجيل الدخول</title>
    <!-- Google font-->
    <link href="https:/fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https:/fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/cuba/assets') }}/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ url('/cuba/assets') }}/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/cuba/assets') }}/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/cuba/assets') }}/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/cuba/assets') }}/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/cuba/assets') }}/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/cuba/assets') }}/css/style.css">
    <link id="color" rel="stylesheet" href="{{ url('/cuba/assets') }}/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/cuba/assets') }}/css/responsive.css">
    {{-- recaptha api --}}


</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 b-center bg-size"
                style="background-image: url(&quot;{{ asset('images/login_bg2.jpg') }}&quot;); background-size: cover; background-position: center center; display: block;">
                <img class="bg-img-cover bg-center" src="{{ asset('images/login_bg2.jpg') }}" alt="looginpage" style="display: none;"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div>
                            <a class="logo text-center" href="index.html">
                                <img class="img-fluid for-light"src="{{ asset('images/logo.png') }}" alt="looginpage" style="width: 165px">
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="form" method="POST" action="{{ route('dashboard.login') }}">
                                @include('dashboard.layouts.includes.flash_msg')
                                @csrf
                                <h4>تسجيل الدخول</h4>
                                <p>أدخل البريد الالكترونى وكلمة المرور الخاصة بك</p>
                                <div class="form-group {{ $errors->has('identify') ? ' has-error' : '' }}">
                                    <label class="col-form-label">البريد الالكترونى او رقم الهاتف</label>
                                    <input
                                    class="form-control h-auto  placeholder-dark-75 input-login"
                                    type="email"
                                    placeholder="البريد الالكترونى او رقم الهاتف" name="email" value="{{ old('identify') }}" required autocomplete="off" />
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="col-form-label">أدخل كلمة المرور</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control"   autocomplete="off" id="password" type="password" name="password" required placeholder="*********">

                                    </div>
                                </div>
                                <br>

                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" name="remember" value="1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">تذكرنى</label>
                                    </div>
                                    <button class="btn btn-primary btn-block w-100" type="submit">تسجيل الدخول</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="{{ url('/cuba/assets') }}/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="{{ url('/cuba/assets') }}/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="{{ url('/cuba/assets') }}/js/icons/feather-icon/feather.min.js"></script>
        <script src="{{ url('/cuba/assets') }}/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="{{ url('/cuba/assets') }}/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="{{ url('/cuba/assets') }}/js/script.js"></script>
        <!-- login js-->
        <!-- Plugin used-->
    </div>

</body>

</html>
