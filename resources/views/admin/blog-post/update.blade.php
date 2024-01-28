@extends('layouts.main')
@section('css')
@endsection

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Post Info</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('blog-post-update')}}" enctype="multipart/form-data">
                            @csrf
                            <input name="id" value="{{$obj['id']}}" type="hidden">
                            <h6 class="mb-0 text-muted m3-5">General Info</h6>
                            <hr class="m-0 p-0 mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category <span class="text-danger">*</span></label>
                                        <select name="category" class="form-control @error('category')is-invalid @enderror">
                                            <option value="">- Select Category -</option>
                                            @foreach($categoriesArr as $category)
                                                <option @if(old('category', $obj['category_id']) == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Post Title <span class="text-danger">*</span></label>
                                        <input name="post_title" value="{{old('post_title', $obj['post_title'])}}" type="text" class="form-control @error('post_title')is-invalid @enderror">
                                        @error('post_title')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Section One Text</label>
                                        <textarea id="section_one_text" name="section_one_text" class="form-control @error('section_one_text')is-invalid @enderror" rows="6">{{old('section_one_text', $obj['section_one_text'])}}</textarea>
                                        @error('section_one_text')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Section Two Text</label>
                                        <textarea id="section_two_text" name="section_two_text" class="form-control @error('section_two_text')is-invalid @enderror" rows="6">{{old('section_two_text', $obj['section_two_text'])}}</textarea>
                                        @error('section_two_text')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Cover Image</label>
                                    <div class="custom-file">
                                        <input name="cover_image" accept="image/*" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" onchange="updateFileName(this)">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        @error('cover_image')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cover Image Alt</label>
                                        <input name="cover_image_alt" value="{{old('cover_image_alt', $obj['cover_image_alt'])}}" type="text" class="form-control @error('cover_image_alt')is-invalid @enderror">
                                        @error('cover_image_alt')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Main Video Thumbnail</label>
                                    <div class="custom-file">
                                        <input name="main_video_thumbnail" accept="image/*" type="file" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02" onchange="updateFileName(this)">
                                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        @error('main_video_thumbnail')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Main Video URL</label>
                                        <input name="main_video_url" value="{{old('main_video_url', $obj['main_video_url'])}}" type="text" class="form-control @error('main_video_url')is-invalid @enderror">
                                        @error('main_video_url')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Main Quote</label>
                                        <input name="main_quote" value="{{old('main_quote', $obj['main_quote'])}}" type="text" class="form-control @error('main_quote')is-invalid @enderror">
                                        @error('main_quote')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Main Quote Description</label>
                                        <textarea id="main_quote_description" name="main_quote_description" class="form-control @error('main_quote_description')is-invalid @enderror" rows="6">{{old('main_quote_description', $obj['main_quote_description'])}}</textarea>
                                        @error('main_quote_description')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <h6 class="mb-0 text-muted mt-5">Sub Section One</h6>
                            <hr class="m-0 p-0 mb-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Section One Title</label>
                                        <input name="sub_section_one_title" value="{{old('sub_section_one_title', $obj['sub_section_one_title'])}}" type="text" class="form-control @error('sub_section_one_title')is-invalid @enderror">
                                        @error('sub_section_one_title')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub Section One Text</label>
                                        <textarea id="sub_section_one_text" name="sub_section_one_text" class="form-control @error('sub_section_one_text')is-invalid @enderror" rows="6">{{old('sub_section_one_text', $obj['sub_section_one_text'])}}</textarea>
                                        @error('sub_section_one_text')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Images</label>
                                    <div class="custom-file">
                                        <input name="images_array[]" multiple accept="image/*" type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" onchange="updateFileName(this)">
                                        <label class="custom-file-label" for="inputGroupFile03">Choose files</label>
                                        @error('images_array')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <h6 class="mb-0 text-muted mt-5">Sub Section Two</h6>
                            <hr class="m-0 p-0 mb-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Section Two Title</label>
                                        <input name="sub_section_two_title" value="{{old('sub_section_two_title', $obj['sub_section_two_title'])}}" type="text" class="form-control @error('sub_section_two_title')is-invalid @enderror">
                                        @error('sub_section_two_title')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sub Section Two Text</label>
                                        <textarea id="sub_section_two_text" name="sub_section_two_text" class="form-control @error('sub_section_two_text')is-invalid @enderror" rows="6">{{old('sub_section_two_text', $obj['sub_section_two_text'])}}</textarea>
                                        @error('sub_section_two_text')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <h6 class="mb-0 text-muted mt-5">For SEO</h6>
                            <hr class="m-0 p-0 mb-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <input name="slug" value="{{old('slug', $obj['slug'])}}" type="text" class="form-control @error('slug')is-invalid @enderror">
                                        @error('slug')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Title on Tab</label>
                                        <input name="title_on_tab" value="{{old('title_on_tab', $obj['title_on_tab'])}}" type="text" class="form-control @error('title_on_tab')is-invalid @enderror">
                                        @error('title_on_tab')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
                                        <input name="meta_keywords" value="{{old('meta_keywords', $obj['meta_keywords'])}}" type="text" class="form-control @error('meta_keywords')is-invalid @enderror">
                                        @error('meta_keywords')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <input name="meta_description" value="{{old('meta_description', $obj['meta_description'])}}" type="text" class="form-control @error('meta_description')is-invalid @enderror">
                                        @error('meta_description')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <h6 class="mb-0 text-muted mt-5">General</h6>
                            <hr class="m-0 p-0 mb-4">
                            <div class="row">
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Post Date</label>--}}
{{--                                        <input name="post_date" value="{{old('post_date')}}" type="date" class="form-control @error('post_date')is-invalid @enderror">--}}
{{--                                        @error('post_date')<span class="small text-danger">{{ $message }}</span>@enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control @error('status')is-invalid @enderror">
                                            <option value="">- Select Status -</option>
                                            <option @if(old('status', $obj['status']) == '1') selected @endif value="1">Active</option>
                                            <option @if(old('status', $obj['status']) == '0') selected @endif value="0">Inactive</option>
                                        </select>
                                        @error('status')<span class="small text-danger">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#section_one_text' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );

        ClassicEditor
            .create( document.querySelector( '#section_two_text' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );

        ClassicEditor
            .create( document.querySelector( '#main_quote_description' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );

        ClassicEditor
            .create( document.querySelector( '#sub_section_one_text' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );

        ClassicEditor
            .create( document.querySelector( '#sub_section_two_text' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );



        function updateFileName(input) {
            const fileName = input.files[0].name;
            const label = input.nextElementSibling;
            label.innerHTML = fileName;
        }
    </script>
@endsection
