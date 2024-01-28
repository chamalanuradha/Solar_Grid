@extends('layouts.app')

@section('title')
    {{(isset($title)) ? ' - '.$title : ''}}
@endsection

@section('content')
    <section class="banner" style="background-image:url({{asset('theme/img/cover_knowledge_hub.jpg')}})">
        <div class="container">
            <div class="banner-text">
                <h2>Knowledge Hub</h2>
                <p>Practical renewable energy technology that reduces costs and helps the environment</p>
                <ul class="page-breadcrumb">
                    <li><a href="{{url('/')}}"><i class="fa-solid fa-house pe-2"></i>Home</a></li>
                    <li>Knowledge Hub</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
{{--                    <div class="our-blog-text">--}}
{{--                        <div class="our-blog-text-img">--}}
{{--                            <figure>--}}
{{--                                <img alt="img" src="https://via.placeholder.com/920x480">--}}
{{--                            </figure>--}}
{{--                            <div class="d-flex admin">--}}
{{--                                <img alt="img" src="https://via.placeholder.com/50x50">--}}
{{--                                <h5>By Thomas Walkar</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <span>Design Process</span>--}}
{{--                        <a href="blog-details.html"><h2>5 energy innovations revolution</h2></a>--}}
{{--                        <div class="d-flex">--}}
{{--                            <h6>December 12, 2023</h6>--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <img alt="vector" class="me-2" src="assets/img/vector.png">--}}
{{--                                <span class="pe-0">14 Comment</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <p>leading renewable energy solutions provider that is revolutionising and redefining the way sustainable energy sources are harnessed across the world. Present in 18 countries across Asia, Australia, Europe Africa and the Americas, Veztaz is powering.</p>--}}
{{--                        <a href="#"><i class="fa-solid fa-plus"></i>Read More</a>--}}
{{--                    </div>--}}

                    @foreach($allPosts as $post)
                        <div class="our-blog-text">
                            <div class="our-blog-text-img">
                                <figure>
                                    <img alt="{{$post['cover_image_alt']}}" src="{{asset('images/blog/cover/'.$post['cover_image'])}}">
                                </figure>
                                <div class="d-flex admin">
                                    <img alt="img" src="{{asset('common/images/user_logo.png')}}" style="height: 50px; width: 50px">
                                    <h5>{{$post['author']['first_name'].' '.$post['author']['last_name']}}</h5>
                                </div>
                            </div>
                            <span>{{$post['category']['name']}}</span>
                            <a href="{{url('knowledge-hub/'.$post['slug'])}}"><h2>{{$post['post_title']}}</h2></a>
                            <div class="d-flex">
                                <h6>{{date('F d, Y', strtotime($post['post_date']))}}</h6>
                            </div>
                            <div>{!! $post['section_one_text'] !!}</div>
                            <a href="{{url('knowledge-hub/'.$post['slug'])}}"><i class="fa-solid fa-plus"></i>Read More</a>
                        </div>
                    @endforeach

{{--                    {{ $allPosts->appends($data)->links() }}--}}

                    <ul class="pagination pt-3">
                        <li class="prev"><a href="{{ $allPosts->previousPageUrl() }}"><i class="fa-solid fa-chevron-left"></i></a></li>
                        @foreach(range(1, $allPosts->lastPage()) as $page)
                            <li><a href="{{ $allPosts->url($page) }}">{{ $page }}</a></li>
                        @endforeach
                        <li class="prev next"><a href="{{ $allPosts->nextPageUrl() }}"><i class="fa-solid fa-chevron-right"></i></a></li>
                    </ul>


{{--                    <ul class="pagination pt-3">--}}
{{--                        <li class="prev"><a href="#"><i class="fa-solid fa-chevron-left"></i></a></li>--}}
{{--                        <li><a href="#">1</a></li>--}}
{{--                        <li><a href="#">2</a></li>--}}
{{--                        <li><a href="#">3</a></li>--}}
{{--                        <li class="mx-2"><span></span><span></span><span></span><span></span></li>--}}
{{--                        <li><a href="#">8</a></li>--}}
{{--                        <li class="prev next"><a href="#"><i class="fa-solid fa-chevron-right"></i></a></li>--}}
{{--                    </ul>--}}
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

{{--                    <div class="posts mt-4">--}}
{{--                        <h4>Categories</h4>--}}
{{--                        <div class="line">--}}
{{--                        </div>--}}
{{--                        <ul class="categories">--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <span>Uncategorized</span>--}}
{{--                                    <span>11</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <span>Construction</span>--}}
{{--                                    <span>25</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <span>Projects</span>--}}
{{--                                    <span>12</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">--}}
{{--                                    <span>Expansion</span>--}}
{{--                                    <span>23</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </section>
@endsection
