@extends('layouts.app')

@section('title')
    {{(isset($obj['title_on_tab'])) ? ' - '.$obj['title_on_tab'] : ''}}
@endsection
@section('meta_keywords', $obj['meta_keywords'])
@section('meta_description', $obj['meta_description'])

@section('content')
{{--    <section class="banner" style="background-image:url(https://via.placeholder.com/1920x410)">--}}
{{--        <div class="container">--}}
{{--            <div class="banner-text">--}}
{{--                <h2>Knowledge Hub</h2>--}}
{{--                <p>Practical renewable energy technology that reduces costs and helps the environment</p>--}}
{{--                <ul class="page-breadcrumb">--}}
{{--                    <li><a href="{{url('/')}}"><i class="fa-solid fa-house pe-2"></i>Home</a></li>--}}
{{--                    <li>Knowledge Hub</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
<section class="banner banner-login"></section>
    <section class="gap pt-0 mt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="our-blog-text">
                        <div class="our-blog-text-img">
                            <figure>
                                @if(isset($obj['cover_image']))
                                    <img alt="{{$obj['cover_image_alt']}}" src="{{asset('images/blog/cover/'.$obj['cover_image'])}}">
                                @endif
                            </figure>
                            <div class="d-flex admin">
                                <img alt="img" src="{{asset('common/images/user_logo.png')}}" style="height: 50px; width: 50px">
                                <h5>{{$obj['author']['first_name'].' '.$obj['author']['last_name']}}</h5>
                            </div>
                        </div>
                        <span>{{$obj['category']['name']}}</span>
                        <h2>{{$obj['post_title']}}</h2>
                        <div class="d-flex">
                            <h6><a href="#">{{date('F d, Y', strtotime($obj['post_date']))}}</a></h6>
                        </div>
                    </div>
                    <div class="blog-details-text">
                        <div>{!! $obj['section_one_text'] !!}</div>
                        <div class="video">
                            @if(isset($obj['main_video_thumbnail']))
                                <figure><img alt="img" src="{{asset('images/blog/video_thumbnails/'.$obj['main_video_thumbnail'])}}"></figure>
                            @endif
                            @if(isset($obj['main_video_url']))
                                <a data-fancybox="" href="{{$obj['main_video_url']}}">
                                    <i>
                                        <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 8.49951L0.5 0.27227L0.5 16.7268L11 8.49951Z" fill="white"/>
                                        </svg>
                                    </i>
                                </a>
                            @endif
                        </div>
                        @if(isset($obj['main_quote']))
                            <h2>“{{$obj['main_quote']}}”</h2>
                        @endif
                        <br><br>
                        <div>{!! $obj['main_quote_description'] !!}</div>
                        <h4>{{$obj['sub_section_one_title']}}</h4>
                        <div>{!! $obj['sub_section_one_text'] !!}</div>

                        <div class="row">
                            @foreach($obj['images_array'] as $image)
                                <div class="col-lg-6">
                                    <div class="video">
                                        <figure><img alt="img" src="{{asset('images/blog/sub_images/'.$image)}}"></figure>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <h4 class="pt-0">{{$obj['sub_section_two_title']}}</h4>
                        <div>{!! $obj['sub_section_two_text'] !!}</div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="posts">
                        <h4>Recent Posts</h4>
                        <div class="line">
                        </div>
                        <ul class="recent-posts">
                            @foreach($recentPosts as $post)
                                <li>
                                    <div>
                                        <a href="{{url('knowledge-hub/'.$post['slug'])}}">
                                            {{$post['post_title']}}
                                        </a>
                                        <span>{{date('F d, Y', strtotime($post['post_date']))}}</span>
                                    </div>
                                    <div>
                                        <i class='fa-solid fa-arrow-right'></i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
@endsection
