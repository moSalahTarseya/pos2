

<!-- Bootstrap js-->
<script src="{{asset('cuba/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('cuba/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('cuba/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('cuba/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('cuba/assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('cuba/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script id="menu" src="{{asset('cuba/assets/js/sidebar-menu.js')}}"></script>


<script  src="{{asset('cuba/assets/js/select2/select2.full.min.js')}}"></script>

@if(Route::current()->getName() != 'popover')
	<script src="{{asset('cuba/assets/js/tooltip-init.js')}}"></script>
@endif

<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('cuba/assets/js/script.js')}}"></script>
<script src="{{asset('cuba/assets/js/theme-customizer/customizer.js')}}"></script>

<script src="{{asset('/js/functions.js')}}"></script>
<script>
    var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
</script>

<script src="{{ asset('admin') }}/assets/plugins/global/plugins.bundle.js"></script>
<script src="{{ asset('admin') }}/assets/js/scripts.bundle.js"></script>
<script src="{{ asset('front') }}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/pages/widgets.js"></script>
<script src="{{ asset('admin') }}/assets/js/pages/crud/file-upload/image-input.js"></script>
<script src="{{ asset('admin') }}/assets/js/pages/crud/forms/widgets/select2.js"></script>
{{-- <script src="{{ asset('admin') }}/assets/plugins/custom/tinymce/tinymce.bundle.js"></script>
<script src="{{ asset('admin') }}/assets/js/pages/crud/forms/editors/tinymce.js"></script> --}}
<script src="{{ asset('admin') }}/assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js"></script>
<script src="{{ asset('/js/iziToast.js') }}"></script>
<script src="{{ asset('/js/myscript.js') }}"></script>
<script src="{{ asset('/js/formajax.js') }}"></script>
<script src="{{ asset('admin/assets') }}/js/tinymce/tinymce.min.js"></script>
<script src="{{ asset('admin/assets') }}/js/tinymce/tiny-init.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('admin') }}/assets/js/script.js"></script>

@stack('js')
@yield('js')
@yield('script')
<script>
    $(".image").change(function () {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
});
    $(".image2").change(function () {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-preview2').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
});

</script>
<script>
    $("form").each(function() {
        var self = this;
        $(this).find("button[type=submit]").click(function() {
            var showMsg = false;

            $(self).find("input, select").each(function() {
                if ($(this).attr("required")) {
                    if ($(this).val().length <= 0) {
                        showMsg = true;
                    }
                }
            });

            if (showMsg) {
                error("{{ __('lang.fill_all_required_data') }}");
            }
        });
    });

</script>

