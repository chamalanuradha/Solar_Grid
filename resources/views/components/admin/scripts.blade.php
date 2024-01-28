<!--   Core JS Files   -->
<script src="{{asset('theme-admin/js/core/jquery.min.js')}}"></script>
<script src="{{asset('theme-admin/js/core/popper.min.js')}}"></script>
<script src="{{asset('theme-admin/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('theme-admin/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('theme-admin/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('theme-admin/js/plugins/bootstrap-notify.js')}}"></script>

<!-- Toastr -->
<script src="{{asset('theme-admin/vendor/toastr/js/toastr.min.js')}}"></script>
<script src="{{asset('theme-admin/vendor/full_calender/lib/main.min.js')}}"></script>

<!-- CK Editor -->
<script src="{{asset('theme-admin/vendor/ckeditor5-build-classic/ckeditor.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var BASE = '{{url('/')}}';
</script>

@if(session('common_msg'))
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
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
