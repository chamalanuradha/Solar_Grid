@extends('layouts.app')

@section('title')
    {{(isset($title)) ? '- '.$title : '- Sign Up'}}
@endsection

@section('content')
    <section class="banner banner-login"></section>
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="solar-energy">
                    <h3 class="text-center pt-0">{{ __('Register') }}</h3>
                    <hr class="mt-0">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="first_name">First Name</label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                            @error('last_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirmation">{{ __('Confirm Password') }}</label>
                            <input id="password-confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <!-- <div class="mb-3">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        @error('g-recaptcha-response')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror -->


                        <div class="mt-4 mb-0 d-flex justify-content-center">
                            <button type="submit" class="button w-50">{{ __('Register') }}</button>
                        </div>

                        <div class="new-account mt-5">
                            <p>Already have an account?
                                <a href="{{url('login')}}" class="text-success">Sign in</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
