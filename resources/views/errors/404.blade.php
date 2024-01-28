@extends('layouts.error')

@section('title')
    {{(isset($title)) ? '- '.$title : '- 404 NOT FOUND'}}
@endsection

@section('content')
    <section class="banner banner-login"></section>
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="solar-energy">

                    <div class="alert alert-warning fw-bold" role="alert">
                        404 NOT FOUND!
                    </div>

                    <img class="w-100" src="{{asset('common/images/404.png')}}" alt="404">


                </div>
            </div>
        </div>
    </div>
@endsection
