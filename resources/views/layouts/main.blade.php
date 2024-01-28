<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

@include('components.admin.head')

<body class="">
<div class="wrapper">
    @include('components.admin.aside')
    <div class="main-panel">
        @include('components.admin.top-nav')
        @yield('content')
        @include('components.admin.footer')
    </div>
</div>

@include('components.admin.scripts')
@yield('js')
</body>
</html>
