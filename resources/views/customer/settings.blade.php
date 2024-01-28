@extends('layouts.app')

@section('title')
    {{(isset($title)) ? '- '.$title : '- Settings'}}
@endsection

@section('content')
    <section class="banner banner-login"></section>
    <div class="container pb-5">
        @include('components.guest.dashboard-tab-nav')
        <div class="mt-5">

            <div class="card mb-5">
                <div class="card-header">
                    <h6 class="card-title mb-0">Profile</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('update-settings-customer')}}">
                        @csrf
                        <input name="id" value="{{$obj['id']}}" type="hidden">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input value="{{$obj['first_name']}}" name="first_name" type="text" class="form-control @error('first_name')is-invalid @enderror">
                                    @error('first_name')<span class="small text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input value="{{$obj['last_name']}}" name="last_name" type="text" class="form-control @error('last_name')is-invalid @enderror">
                                    @error('last_name')<span class="small text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title mb-0">Password</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('change-password-customer') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 mb-3">
                                <label>New Password</label>
                                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group col-md-6 mb-3">
                                <label>Confirm New Password</label>
                                <input name="password_confirmation" type="password" class="form-control">
                            </div>
                        </div>

                        <div class="row align-content-end">
                            <div class="col text-right">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
