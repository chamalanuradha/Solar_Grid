@extends('layouts.main')
@section('css')
@endsection

@section('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">List of Inquiries</h5>
                    </div>
                    <div class="card-body">

                        <form method="get" class="mb-5">
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-0">
                                    <select name="category" class="form-control">
                                        <option value="0" selected>Category (All)</option>
                                        @foreach($allCategories as $category)
                                            <option @if(request('category') == $category['id']) selected @endif value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
{{--                                <div class="form-group col-md-3 mb-0">--}}
{{--                                    <select name="status" class="form-control">--}}
{{--                                        <option value="0" selected>Status (All)</option>--}}
{{--                                        @foreach($allStatus as $status)--}}
{{--                                            <option @if(request('status') == $status) selected @endif value="{{$status}}">{{$status}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <button type="submit" class="btn btn-secondary m-0"><i class="fa fa-search"></i></button>
                            </div>
                        </form>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Inquiry Date</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allArr as $obj)
                                <tr>
                                    <th scope="row">{{$obj['id']}}</th>
                                    <td>{{$obj['category']['name']}}</td>
                                    <td>{{date('F d, Y'), strtotime($obj['created_at'])}}</td>
                                    <td>
                                        @if($obj['status'] == 'VIEWED')<span class="badge badge-info">Viewed</span>@endif
                                        @if($obj['status'] == 'RESPONDED')<span class="badge badge-success">Responded</span>@endif
                                        @if($obj['status'] == 'PENDING')<span class="badge badge-warning">Pending</span>@endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{url('admin/inquiries/info/'.$obj['id'])}}" class="btn btn-sm btn-info mr-1"><i class="fa fa-eye"></i></a>
                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="{{'#confirmDeleteModal_'.$obj['id']}}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" id="{{'confirmDeleteModal_'.$obj['id']}}" tabindex="-1" role="dialog" aria-labelledby="{{'confirmDeleteModalLabel_'.$obj['id']}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="{{'confirmDeleteModalLabel_'.$obj['id']}}">Confirm Deletion</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Cancel</button>
                                                <a href="{{url('admin/inquiries/delete/'.$obj['id'])}}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="row justify-content-center mt-5">
                            {{ $allArr->appends($data)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
@endsection
