<!-- jQuery -->
<script src="{{asset('theme/js/jquery-3.6.0.min.js')}}"></script>
<!-- Bootstrap Js -->
<script src="{{asset('theme/js/bootstrap.min.js')}}"></script>
<script src="{{asset('theme/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('theme/js/slick.min.js')}}"></script>
<!-- fancybox -->
<script src="{{asset('theme/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('theme/js/custom.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('theme-admin/vendor/toastr/js/toastr.min.js')}}"></script>

@if(session('common_msg'))
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr["{{session('common_msg')['type']}}"]("{{session('common_msg')['message']}}");
    </script>
@endif

@yield('js')
