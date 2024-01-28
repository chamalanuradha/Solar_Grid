@extends('layouts.main')
@section('css')
@endsection

@section('content')
    <div class="content">

        <div class="alert alert-success font-weight-bold text-dark" role="alert" style="border: 2px solid var(--success);">
            Welcome to SolarGridBox Admin Portal!
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="card card-stats bg-primary text-dark">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-5 col-md-4">--}}
{{--                                <div class="icon-big text-center">--}}
{{--                                    <i class="nc-icon nc-single-02"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-7 col-md-8">--}}
{{--                                <div class="numbers">--}}
{{--                                    <p class="card-category text-dark">Number of Swimmers</p>--}}
{{--                                    <p class="card-title">0<p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="card card-stats bg-warning">--}}
{{--                    <div class="card-body ">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-5 col-md-4">--}}
{{--                                <div class="icon-big text-center">--}}
{{--                                    <i class="nc-icon nc-single-02"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-7 col-md-8">--}}
{{--                                <div class="numbers">--}}
{{--                                    <p class="card-category text-dark">Number of Events</p>--}}
{{--                                    <p class="card-title">0<p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="card card-stats bg-info">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-5 col-md-4">--}}
{{--                                <div class="icon-big text-center">--}}
{{--                                    <i class="nc-icon nc-single-02"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-7 col-md-8">--}}
{{--                                <div class="numbers">--}}
{{--                                    <p class="card-category text-dark">Number of Coaches</p>--}}
{{--                                    <p class="card-title">0<p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3 col-md-6 col-sm-6">--}}
{{--                <div class="card card-stats bg-success">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-5 col-md-4">--}}
{{--                                <div class="icon-big text-center">--}}
{{--                                    <i class="nc-icon nc-globe"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-7 col-md-8">--}}
{{--                                <div class="numbers">--}}
{{--                                    <p class="card-category text-dark">Number of Squads</p>--}}
{{--                                    <p class="card-title">0<p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="mt-5">
            <div id='calendar'></div>
        </div>
    </div>

@endsection

@section('js')

@endsection
