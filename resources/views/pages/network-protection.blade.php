@extends('layouts.app')

@section('title')
    {{(isset($title)) ? ' - '.$title : ''}}
@endsection

@section('content')
    <section class="banner" style="background-image:url({{asset('theme/img/networkprotectionbg.jpg')}})">
        <div class="container">
            <div class="banner-text">
                <h2>Network Protection</h2>
                <p>Practical renewable energy technology that reduces costs and helps the environment</p>
                <ul class="page-breadcrumb">
                    <li><a href="{{url('/')}}"><i class="fa-solid fa-house pe-2"></i>Home</a></li>
                    <li>Network Protection</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="services gap text">
        <div class="container">
            <div class="heading">
                <p>Network Protection</p>
                <div class="line"></div>
                <h2>Our popular standard NPU collection</h2>
            </div>
            <p class="text-center">We design and manufacture quality and reliable NPUs ( PVDBs) that are constructed in accordance with AS/NZS 61439.2.2016</p>

            <div class="solar-energy mb-lg-5 mt-5">
                <div class="row">

                    <div class="col-xl-5 col-lg-6">

                        <h3>Solar GridBox 110SI</h3>
                        <img class="img-fluid" alt="img" src="{{asset('theme/img/np1.png')}}">
                        <p>The perfect plan for small business</p>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <ul>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">ABB Grid protection Relay ( CM-UFD.M33) which has ability for remote monitoring and serial communication</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Schneider MCCB with motor operator</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">UVT for fail safe operation, Schneider 10A MCB for control section</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">AS 61439.2 2016 fully complied</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">IP 65 for outdoor bottom entry and IP 42 for indoor top entry</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}"> Wall mounting kit & door padlock attachment- loose supply</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}"> Bottom gland plates (this board can be used for both top and bottom entry/exit)</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Extra 3 fuses and din rails space for energy meter installation at site by installers or in-house by us</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="solar-energy mb-lg-5">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <h3>Solar GridBox 110MI</h3>
                        <img class="img-fluid" alt="img" src="https://via.placeholder.com/350x350">
                        <p>The perfect plan for small business</p>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <ul>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Multi inverter PVDB ( from 30kW up to 110kW)</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="solar-energy mb-lg-5">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">

                        <h3>Solar GridBox 110M/S</h3>
                        <img class="img-fluid" alt="img" src="{{asset('theme/img/np3.png')}}">
                        <p>The perfect plan for small business</p>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <ul>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Consists of all the inclusions as Solar GridBox 110 ( Single inverter/ Multi-inverter)</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Master PVDB ( 110M) consists of wireless transmitter </li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Slave PVDB (110S) consists of wireless receiver </li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Master and Slave PVDB communicate through wireless devices for switching ….... </li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Available with Elsema/ Moxa/ … </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="solar-energy">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">

                        <h3>Solar GridBox 110SI</h3>
                        <img class="img-fluid" alt="img" src="{{asset('theme/img/np4.png')}}">
                        <p>The perfect plan for small business</p>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <ul>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Built using n-type mono</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Crystalline cell materials</li>
                            <li><img alt="check-mark" src="{{asset('theme/img/check-mark.png')}}">Reliability and performance</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
