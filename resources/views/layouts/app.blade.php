@include('components.guest.head')
<body>
@include('components.guest.preloader')
@include('components.guest.top-nav')

@yield('content')

<!-- progress -->
<div id="progress">
    <span id="progress-value"><i class="fa-solid fa-arrow-up"></i></span>
</div>

@include('components.guest.footer')

{{--@include('components.guest.modals.make-inquiry')--}}

@include('components.guest.scripts')
</body>
