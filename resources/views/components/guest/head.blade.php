<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Solar Grid Box @yield('title')</title>
    <meta name="keywords" content="@yield('meta_keywords')">
    <meta name="description" content="@yield('meta_description')">

    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('common/images/favicon.png')}}">
    <link rel="icon" href="{{asset('common/images/favicon.png')}}">

    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/slick.css')}}">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="{{asset('theme/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/css/slick-theme.css')}}">
    <!-- fancybox -->
    <link rel="stylesheet" href="{{asset('theme/css/jquery.fancybox.min.css')}}">
    <!-- style -->
    <link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{asset('theme/css/responsive.css')}}">
    <!-- color -->
    <link rel="stylesheet" href="{{asset('theme/css/color.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('theme-admin/vendor/toastr/css/toastr.min.css')}}">

    <style>
        .navbar-links li.navbar-dropdown.active a,
        #mobile-nav li.active a,
        .btn-link {
            color: #0A9642 !important;
        }

        .top-bar-text p, .top-bar-text a {
            font-weight: 400;
            text-transform: inherit;
            color: white;
        }

        .form-control:focus,
        .form-check-input:focus {
            border-color: #0A9642;
            box-shadow: 0 0 0 0.25rem rgba(10,150,66,.25);
        }

        .form-check-input:checked {
            background-color: #0A9642;
            border-color: #0A9642;
        }

        .btn-check:focus+.btn, .btn:focus {
            box-shadow: 0 0 0 0.25rem rgba(10,150,66,.25);
        }

        .banner-login {
            padding-top: 120px;
        }
        .banner-login:before {
            height: 50%;
        }

        ul.pagination li a {
            height: 40px;
            width: 40px;
        }

        .nav-tabs .nav-link {
            font-weight: 600;
            color: var(--dark);
        }
        .nav-tabs .nav-link.active {
            color: #0A9642;
        }

        .cus-mobile-nav-li .btn-success {
            background-color: #0A9642 !important;
        }
    </style>
</head>
