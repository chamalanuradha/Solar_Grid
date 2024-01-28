@extends('layouts.main')
@section('css')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Update User Info</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('system-user-update')}}">
                            @csrf
                            <input name="id" value="{{$obj['id']}}" type="hidden">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input value="{{$obj['first_name']}}" name="first_name" type="text" class="form-control @error('first_name')is-invalid @enderror">
                                        @error('first_name')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input value="{{$obj['last_name']}}" name="last_name" type="text" class="form-control @error('last_name')is-invalid @enderror">
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
                                                @if(old('role', $obj['role']) == $role)
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
                                        <input disabled value="{{$obj['email']}}" name="email" type="email" class="form-control @error('email')is-invalid @enderror">
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
