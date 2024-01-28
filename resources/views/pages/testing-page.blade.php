@extends('layouts.app')

@section('title')
    {{(isset($title)) ? ' - '.$title : ''}}
@endsection

@section('content')
    <section class="banner" style="background-image:url({{asset('theme/img/testingbg.jpg')}})">
        <div class="container">
            <div class="banner-text">
                <h2>Testing</h2>
                <p>Practical renewable energy technology thatreduces costs and helps the environment</p>
                <ul class="page-breadcrumb">
                    <li><a href="{{url('/')}}"><i class="fa-solid fa-house pe-2"></i>Home</a></li>
                    <li>Testing</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="services gap text-center">

        <div class="container">
            <div class="heading">
                <p>Testing Plans</p>
                <div class="line"></div>
                <h2>We conduct below testing for commercial solar sector</h2>
            </div>
            <p>We design and manufacture quality and reliable NPUs ( PVDBs) that are constructed in accordance with AS/NZS 61439.2.2016</p>
            <div class="row justify-content-center mt-4">
                <div class="col-xl-5 col-lg-6">
                    <div class="solar-energy">
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <img class="img-fluid" alt="img" src="{{asset('theme/img/sti.png')}}">
                            </div>

                            <h3>secondary injection testing</h3>
                        </div>
                        <ul>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Built using n-type mono</li>
                        </ul>
{{--                        <a href="#" class="button">INQUIRE FOR TESTING</a>--}}
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="solar-energy">
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <img class="img-fluid" alt="img" src="{{asset('theme/img/pq.png')}}">
                            </div>
                            <h3>Power quality testing</h3>
                        </div>

                        <ul>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Built using n-type mono</li>
                        </ul>
{{--                        <a href="#" class="button">INQUIRE FOR TESTING</a>--}}
                    </div>
                </div>
                <p class="mt-4">
                    our testings are conducted by DNSP approved, high tech testing equipment with high quality machine generated testing reports.
                </p>
            </div>
        </div>
    </section>
@endsection
