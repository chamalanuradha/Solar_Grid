@extends('layouts.app')

@section('title')
    {{(isset($title)) ? '- '.$title : '- Sign In'}}
@endsection

@section('content')
    <section class="banner banner-login"></section>
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="solar-energy">
                    <h3 class="text-center pt-0">{{ __('Login') }}</h3>
                    <hr class="mt-0">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>

                        <div class="mt-4 mb-0 d-flex justify-content-center">
                            <button type="submit" class="button w-50">{{ __('Log in') }}</button>

{{--                            @if (Route::has('password.request'))--}}
{{--                                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>--}}
{{--                            @endif--}}
                        </div>

                        <div class="new-account mt-5">
                            <p>Don't have an account?
                                <a href="{{url('register')}}" class="text-success">Sign up</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
