<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('common/images/favicon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('common/images/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Solar Grid Box</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('theme-admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('theme-admin/css/paper-dashboard.css')}}?v=2.0.1" rel="stylesheet" />
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('theme-admin/vendor/toastr/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme-admin/vendor/full_calender/lib/main.min.css')}}">

    <style>
        .sidebar li a p,
        form label,
        form .form-control {
            font-weight: bold;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }

        .navbar.navbar-transparent .nav-item.active .nav-link:not(.btn), .navbar.navbar-transparent .nav-item .nav-link:not(.btn):focus, .navbar.navbar-transparent .nav-item .nav-link:not(.btn):hover, .navbar.navbar-transparent .nav-item .nav-link:not(.btn):focus:hover, .navbar.navbar-transparent .nav-item .nav-link:not(.btn):active {
            color: #6BD098;
        }
    </style>
    @yield('css')
</head>
