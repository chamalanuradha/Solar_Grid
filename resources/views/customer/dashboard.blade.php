@extends('layouts.app')

@section('title')
    {{(isset($title)) ? '- '.$title : '- Dashboard'}}
@endsection

@section('content')
    <section class="banner banner-login"></section>
    <div class="container pb-5">
        @include('components.guest.dashboard-tab-nav')
        <div class="mt-5">

            <div class="alert alert-success" role="alert" style="border: 2px solid #0A9642">
                Welcome to Solar-GridBox customer portal!
            </div>

        </div>
    </div>
@endsection
