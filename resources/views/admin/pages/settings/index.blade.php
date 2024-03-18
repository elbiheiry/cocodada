@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-user"></i> Site settings
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Site settings</li>
        </ul>
    </div>
    <!-- Page content
        ==========================================-->
    <div class="page-content ">
        <div class="row">
            <form class="col-lg-12 col-md-12 col-sm-12 row edit-form" action="{{ route('admin.settings') }}" method="post">
                {!! csrf_field() !!}
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Upload video</label>
                        <label class="file">
                            <input type="file" id="file" aria-label="File browser example" name="video"
                                class="form-control">
                            <span class="file-custom"></span>
                        </label>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Address in english: </label>
                        <input type="text" class="form-control" placeholder="Your Name" value="{{ $settings->address }}"
                            name="address">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Address in arabic: </label>
                        <input type="text" class="form-control" placeholder="Your Name"
                            value="{{ $settings->address_ar }}" name="address_ar">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Email address : </label>
                        <input type="email" class="form-control" placeholder="Email Address" name="email"
                            value="{{ $settings->email }}">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Phone number : </label>
                        <input type="text" class="form-control" placeholder="Phone number" name="phone"
                            value="{{ $settings->phone }}">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Whatsapp number : </label>
                        <input type="text" class="form-control" placeholder="Whatsapp number" name="whatsapp"
                            value="{{ $settings->whatsapp }}">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label> Map link : </label>
                        <textarea type="text" class="form-control" placeholder="Map link" name="map">{{ $settings->map }}</textarea>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-md-12 col-lg-12 col-sm-12">
                    <hr>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Footer section title in english: </label>
                        <input type="text" class="form-control" placeholder="title" name="title"
                            value="{{ $settings->title }}">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Footer section title in arabic: </label>
                        <input type="text" class="form-control" placeholder="title" name="title_ar"
                            value="{{ $settings->title_ar }}">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Footer section description in english: </label>
                        <textarea type="text" class="form-control" placeholder="description"
                            name="description">{{ $settings->description }}</textarea>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Footer section description in arabic: </label>
                        <textarea type="text" class="form-control" placeholder="description"
                            name="description_ar">{{ $settings->description_ar }}</textarea>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Terms and conditions in english: </label>
                        <textarea type="text" class="form-control" name="terms">{{ $settings->terms_en }}</textarea>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Terms and conditions in arabic: </label>
                        <textarea type="text" class="form-control" name="terms_ar">{{ $settings->terms_ar }}</textarea>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Payment terms in english: </label>
                        <textarea type="text" class="form-control" name="payment">{{ $settings->payment_en }}</textarea>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Payment terms in arabic: </label>
                        <textarea type="text" class="form-control" name="payment_ar">{{ $settings->payment_ar }}</textarea>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <hr>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label>Meta author name : </label>
                        <input type="text" class="form-control" name="author" value="{{ $settings->author }}">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Meta keywords : </label>
                        <textarea class="form-control tags" name="keywords">{{ $settings->keywords }}</textarea>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label> Meta description : </label>
                        <textarea type="text" class="form-control" name="meta_description">{{ $settings->meta_description }}</textarea>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->

                <div class="col-md-12 col-lg-12 col-sm-12">
                    <hr>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 ">
                    <div class="form-group">
                        <label>Privacy policy in english</label>
                        <textarea class="form-control tiny-editor" name="privacy_en">{{ $settings->privacy_en }}</textarea>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 ">
                    <div class="form-group">
                        <label>Privacy policy in arabic</label>
                        <textarea class="form-control tiny-editor" name="privacy_ar">{{ $settings->privacy_ar }}</textarea>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <button class="custom-btn">save information</button>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="progress-wrap" style="display: none;">
                    <div class="progress">
                        <div class="bar"></div>
                        <div class="percent">0%</div>
                    </div>
                </div>
            </form>
            <!--End Form-->
        </div>
        <!--End Row-->
    </div>
    <!--End Page content-->
@endsection
