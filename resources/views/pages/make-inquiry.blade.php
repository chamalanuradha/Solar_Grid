@extends('layouts.app')

@section('title')
    {{(isset($title)) ? '- '.$title : '- Make Inquiry'}}
@endsection

@section('content')
    @php
        $customerName = '';
        $isAuth = false;
    @endphp

    @auth()
        @php
            $customerName = Auth::user()->first_name.' '.Auth::user()->last_name;
            $isAuth = true;
        @endphp
    @endauth

    <section class="banner banner-login"></section>
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10">
                <div class="solar-energy">
                    <h3 class="text-center pt-0">Make Inquiry</h3>
                    <hr class="mt-0">

                    @if($isAuth)
                        <span class="small">
                        Please fill below requested information for faster and accurate quote.
                    </span>
                        <form class="mt-4" method="post" action="{{ route('add-inquiry-customer') }}" enctype="multipart/form-data">
                            @csrf

                            {{--                            <div class="mb-3">--}}
                            {{--                                <label>Your Name</label>--}}
                            {{--                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $customerName) }}" required autocomplete="name" autofocus>--}}
                            {{--                                @error('name')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror--}}
                            {{--                            </div>--}}

                            <div class="mb-5">
                                <label>Requirement <span class="small ms-2">(Please select your requirement from drop down)</span></label>
                                <select name="category" class="form-control @error('category')is-invalid @enderror">
                                    <option value="">- Select Requirement -</option>
                                    @foreach($categoriesArr as $category)
                                        <option @if(old('category') == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div id="divNPV">
                                <span class="small text-muted">NPU/PVDB</span>
                                <hr class="mt-0">

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>PV System Size</label>
                                        <input name="pv_system_size" type="number" class="form-control @error('pv_system_size') is-invalid @enderror" value="{{ old('pv_system_size') }}" autofocus>
                                        @error('pv_system_size')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Inverter Combination</label>
                                        <input name="inverter_combination" type="text" class="form-control @error('inverter_combination') is-invalid @enderror" value="{{ old('inverter_combination') }}" autofocus>
                                        @error('inverter_combination')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Indoor / Outdoor</label>
                                        <select name="is_indoor" class="form-control @error('is_indoor')is-invalid @enderror">
                                            <option value="">- Please Select -</option>
                                            <option @if(old('is_indoor') == '1') selected @endif value="1">Indoor</option>
                                            <option @if(old('is_indoor') == '0') selected @endif value="0">Outdoor</option>
                                        </select>
                                        @error('is_indoor')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Color</label>
                                        <input name="color" type="text" class="form-control @error('color') is-invalid @enderror" value="{{ old('color') }}" autofocus>
                                        @error('color')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label>Maximum Space Available</label>
                                        <input name="maximum_space_available" type="number" class="form-control @error('maximum_space_available') is-invalid @enderror" value="{{ old('maximum_space_available') }}" autofocus>
                                        @error('maximum_space_available')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>DNSP</label>
                                        <input name="dnsp" type="text" class="form-control @error('dnsp') is-invalid @enderror" value="{{ old('dnsp') }}" autofocus>
                                        @error('dnsp')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div id="sldDiv">
                                <span class="small text-muted">Upload your SLD and other site specific information</span>
                                <hr class="mt-0">
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label>SLD</label>
                                        <input name="sld_file" type="file" class="form-control @error('sld_file') is-invalid @enderror" value="{{ old('sld_file') }}" autofocus>
                                        @error('sld_file')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Other Documents</label>
                                        <input name="other_document[]" multiple type="file" class="form-control @error('other_document') is-invalid @enderror" value="{{ old('other_document') }}" autofocus>
                                        @error('other_document')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div id="testDiv">
                                <span class="small text-muted">Secondary Injection Test (SIT)/ Power Quality Test (PQT)</span>
                                <hr class="mt-0">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>In-House / On-Site</label>
                                        <select name="is_in_house" class="form-control @error('is_in_house')is-invalid @enderror">
                                            <option value="">- Please Select -</option>
                                            <option @if(old('is_in_house') == '1') selected @endif value="1">In-House</option>
                                            <option @if(old('is_in_house') == '0') selected @endif value="0">On-Site</option>
                                        </select>
                                        @error('is_in_house')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Required Date Test to be Conducted</label>
                                        <input name="test_date" type="date" class="form-control @error('test_date') is-invalid @enderror" value="{{ old('test_date') }}" autofocus>
                                        @error('test_date')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Site Contact Number</label>
                                        <input name="site_contact" type="number" class="form-control @error('site_contact') is-invalid @enderror" value="{{ old('site_contact') }}" autofocus>
                                        @error('site_contact')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Site Address</label>
                                        <input name="site_address" type="text" class="form-control @error('site_address') is-invalid @enderror" value="{{ old('site_address') }}" autofocus>
                                        @error('site_address')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-4">
                                <label>Message</label>
                                <textarea name="message" rows="3" class="form-control @error('message') is-invalid @enderror" autofocus>{{old('message')}}</textarea>
                                @error('message')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror
                            </div>

                            <div class="mt-3">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            </div>
                            @error('g-recaptcha-response')<span class="text-danger small font-weight-bold"><strong>{{ $message }}</strong></span>@enderror

                            <div class="mt-5 mb-0 d-flex justify-content-center">
                                <button type="submit" class="button w-50">Send</button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-warning fw-bold">
                            Please log in to the system before making an inquiry!
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
