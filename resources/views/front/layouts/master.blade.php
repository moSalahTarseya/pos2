
@php $dir = app()->getLocale() == 'ar' ? 'rtl' : 'ltr'; @endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" direction="{{ $dir }}" dir="{{ $dir }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('front.layouts.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .hide{
            display: none
        }

        .btn-outline-primary,.btn-outline-primary:hover{
            color: #070913;
            background: #FCFCFC 0% 0% no-repeat padding-box;
            border: none
        }
        .btn-outline-primary:not(:disabled):not(.disabled).active{
            background: #F5F7FD 0% 0% no-repeat padding-box;
            border: 1px solid #070913;
            color: #070913
        }
    </style>
    @yield('css')
</head>
<body>
   @include('front.layouts.header')
   @include('front.layouts.navbar')

  @yield('content')
    @include('partials._session')
   @include('front.layouts.footer')
   @include('front.layouts.script')

  @yield('js')

  <script>
    $(function() {
    // handle submit event of form
      $(document).on("click", "#btn-check-logout", function() {
            $('#form-register').removeClass('hide');
            $('#form-login').addClass('hide');

      });

      $(document).on("click", "#btn-check-login", function() {
        $('#form-register').addClass('hide');
        $('#form-login').removeClass('hide');
      });

      $(document).on("click", "#login", function() {
        $('.form-modal').modal('show');
        $('#btn-check-login').attr('checked', 'checked')
        $('#label-login').addClass('active');

      });
      $(document).on("click", "#register", function() {
        $('.form-modal').modal('show');
        $('#btn-check-register').attr('checked', 'checked')
        $('#label-register').addClass('active');
        $('#form-register').removeClass('hide');
        $('#form-login').addClass('hide');

      });
      @if ($errors->any())
        $('.form-modal').modal('show');
      @endif
    });

  </script>

<script>
    $('.delete').click(function(e) {
            var that = $(this)
            e.preventDefault();
            var n = new Noty({
                text: "Are You Sure ?",
                type: "warning",
                layout: 'center',
                killer: true,
                buttons: [
                    Noty.button("Yes", 'btn btn-success mr-2', function() {
                        that.closest('form').submit();
                    }),
                    Noty.button("No", 'btn btn-primary mr-2', function() {
                        n.close();
                    })
                ]
            });
            n.show();
        });
</script>
</body>
</html>
