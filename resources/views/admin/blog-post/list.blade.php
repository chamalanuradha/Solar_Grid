@extends('layouts.main')
@section('css')
@endsection

@section('content')
    <div class="content">

        <a href="{{url('admin/blog-posts/add')}}" class="btn btn-success">+ New Post</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h5 class="card-title">Posts List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allArr as $obj)
                                <tr>
                                    <th scope="row">{{$obj['id']}}</th>
                                    <td>{{$obj['post_title']}}</td>
                                    <td>
                                        @if($obj['status'] == 1)<span class="badge badge-success">Active</span>@endif
                                        @if($obj['status'] == 0)<span class="badge badge-warning">Inactive</span>@endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{url('admin/blog-posts/info/'.$obj['id'])}}" class="btn btn-sm btn-info mr-1"><i class="fa fa-eye"></i></a>
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
                                                <a href="{{url('admin/blog-posts/delete/'.$obj['id'])}}" class="btn btn-danger">Delete</a>
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
