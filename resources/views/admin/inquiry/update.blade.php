@extends('layouts.main')
@section('css')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Inquiry Info</h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-9">
                                <div class="card card-user">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">
                                            {{$obj['category']['name']}}
                                            @if($obj['status'] == 'VIEWED')<span class="badge badge-info">Viewed</span>@endif
                                            @if($obj['status'] == 'RESPONDED')<span class="badge badge-success">Responded</span>@endif
                                            @if($obj['status'] == 'PENDING')<span class="badge badge-warning">Pending</span>@endif
                                        </h5>
                                        <p class="card-text text-muted mb-0">{{date('F d, Y', strtotime($obj['created_at']))}}</p>
                                    </div>
                                    <div class="card-body">
                                        <span class="card-text text-muted font-weight-bold">
                                            {{$obj['customer']['first_name'].' '.$obj['customer']['last_name']}}
                                        </span>
                                        <span class="card-text text-muted font-italic mb-0 ml-2"> - {{$obj['customer']['email']}}</span>
                                        <table class="table table-bordered mt-4">
                                            <tbody>
                                            @if(isset($obj['pv_system_size']))
                                                <tr><th scope="row">PV System Size</th><td>{{$obj['pv_system_size']}}</td></tr>
                                            @endif
                                            @if(isset($obj['inverter_combination']))
                                                <tr><th scope="row">Inverter Combination</th><td>{{$obj['inverter_combination']}}</td></tr>
                                            @endif
                                            @if(isset($obj['is_indoor']))
                                                <tr>
                                                    <th scope="row">Indoor / Outdoor</th>
                                                    <td>
                                                        {{($obj['is_indoor']) ? 'Indoor' : 'Outdoor'}}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if(isset($obj['color']))
                                                <tr><th scope="row">Color</th><td>{{$obj['color']}}</td></tr>
                                            @endif
                                            @if(isset($obj['maximum_space_available']))
                                                <tr><th scope="row">Maximum Space Available</th><td>{{$obj['maximum_space_available']}}</td></tr>
                                            @endif
                                            @if(isset($obj['dnsp']))
                                                <tr><th scope="row">DNSP</th><td>{{$obj['dnsp']}}</td></tr>
                                            @endif
                                            @if(isset($obj['sld_file']))
                                                <tr>
                                                    <th scope="row">SLD File</th>
                                                    <td>
                                                        <a href="{{url('inquiries/sld/'.$obj['sld_file'])}}" target="_blank" class="btn btn-outline-info"><i class="fa fa-file-text-o text-dark"></i></a>
                                                    </td>
                                                </tr>
                                            @endif
                                            @if(count($obj['other_document']) > 0)
                                                <tr>
                                                    <th scope="row">Other Documents</th>
                                                    <td>
                                                        @foreach($obj['other_document'] as $doc)
                                                            <a href="{{url('inquiries/other/'.$doc)}}" target="_blank" class="btn btn-outline-info"><i class="fa fa-file-text-o text-dark"></i></a>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                            @if(isset($obj['is_in_house']))
                                                <tr>
                                                    <th scope="row">In-House / On-Site</th>
                                                    <td>
                                                        {{($obj['is_in_house']) ? 'In-House' : 'On-Site'}}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if(isset($obj['test_date']))
                                                <tr><th scope="row">Test Date</th><td>{{date('F d, Y', strtotime($obj['test_date']))}}</td></tr>
                                            @endif
                                            @if(isset($obj['site_contact']))
                                                <tr><th scope="row">Site Contact</th><td>{{$obj['site_contact']}}</td></tr>
                                            @endif
                                            @if(isset($obj['site_address']))
                                                <tr><th scope="row">Site Address</th><td>{{$obj['site_address']}}</td></tr>
                                            @endif
                                            @if(isset($obj['message']))
                                                <tr><th scope="row">Message</th><td>{{$obj['message']}}</td></tr>
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <form method="post" action="{{route('update-inquiry')}}">
                                    @csrf
                                    <input name="id" value="{{$obj['id']}}" type="hidden">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" class="form-control @error('status')is-invalid @enderror">
                                                    @foreach($allStatus as $status)
                                                        <option @if(old('status', $obj['status']) == $status) selected @endif value="{{$status}}">{{$status}}</option>
                                                    @endforeach
                                                </select>
                                                @error('status')<span class="small text-danger">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-success btn-block">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
