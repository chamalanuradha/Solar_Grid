@extends('layouts.main')
@section('css')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Add New</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('system-user-add')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="first_name" value="{{old('first_name')}}" type="text" class="form-control @error('first_name')is-invalid @enderror">
                                        @error('first_name')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="last_name" value="{{old('last_name')}}" type="text" class="form-control @error('last_name')is-invalid @enderror">
                                        @error('last_name')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control @error('role')is-invalid @enderror">
                                            <option value="">- Select Role -</option>
                                            @foreach($roleArr as $role)
                                                @if(old('role') == $role)
                                                    <option selected value="{{$role}}">{{($role == 'EXAM') ? 'EXAMINER' : $role}}</option>
                                                @else
                                                    <option value="{{$role}}">{{($role == 'EXAM') ? 'EXAMINER' : $role}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('role')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" value="{{old('email')}}" type="email" class="form-control @error('email')is-invalid @enderror">
                                        @error('email')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" class="form-control @error('password')is-invalid @enderror">
                                        @error('password')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Re-Enter Password</label>
                                        <input name="password_confirmation" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="update ml-auto mr-auto">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
