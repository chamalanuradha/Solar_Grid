@extends('layouts.app')

@section('title')
    {{(isset($title)) ? '- '.$title : '- Inquiries'}}
@endsection

@section('content')
    <section class="banner banner-login"></section>
    <div class="container pb-5">
        @include('components.guest.dashboard-tab-nav')
        <div class="mt-5">

            <div class="card ">
                <div class="card-header ">
                    <h6 class="card-title">Inquiries List</h6>
                </div>
                <div class="card-body ">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Inquiry Date</th>
{{--                            <th scope="col"></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allArr as $obj)
                            <tr>
                                <th scope="row">{{$obj['id']}}</th>
                                <td>{{$obj['category']['name']}}</td>
                                <td>{{date('F d, Y', strtotime($obj['created_at']))}}</td>
{{--                                <td class="text-right">--}}
{{--                                    <a href="{{url('customer/inquiry/info/'.$obj['id'])}}" class="btn btn-sm btn-info mr-1"><i class="fa fa-eye"></i></a>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                {{ $allArr->appends($data)->links() }}
            </div>

        </div>
    </div>
@endsection
