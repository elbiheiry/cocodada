@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-user"></i> Services
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Services</li>
        </ul>
    </div>
    <!-- Page content
        ==========================================-->
    <div class="page-content">
        <form class="row edit-form" action="{{ route('admin.services.edit', ['id' => $service->id]) }}" method="post"
            enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <img src="{{ asset('storage/uploads/services/' . $service->image) }}" class="img-view">
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Attach service picture</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="image" class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Image size 64*64</span>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Service name in english</label>
                    <input class="form-control" type="text" name="name_en" value="{{ $service->english()->name }}">
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label>Service name in arabic</label>
                    <input class="form-control" type="text" name="name_ar" value="{{ $service->arabic()->name }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Service description in english</label>
                    <textarea class="form-control" name="description_en">{{ $service->english()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Service description in arabic</label>
                    <textarea class="form-control" name="description_ar">{{ $service->arabic()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Service features in english</label>
                    <textarea class="form-control" name="features_en">{{ $service->english()->features }}</textarea>
                    <span class="text-danger">Please press enter after each feature</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Service features in arabic</label>
                    <textarea class="form-control" name="features_ar">{{ $service->arabic()->features }}</textarea>
                    <span class="text-danger">Please press enter after each feature</span>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <hr />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Meta title in english : </label>
                    <input type="text" class="form-control" name="meta_title_en"
                        value="{{ $service->english()->meta_title }}">
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Meta title in arabic : </label>
                    <input type="text" class="form-control" name="meta_title_ar"
                        value="{{ $service->arabic()->meta_title }}">
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta keywords in english: </label>
                    <textarea class="form-control tags" name="meta_keywords_en">{{ $service->english()->meta_keywords }}</textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta keywords in arabic: </label>
                    <textarea class="form-control tags" name="meta_keywords_ar">{{ $service->arabic()->meta_keywords }}</textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta description in english: </label>
                    <textarea type="text" class="form-control"
                        name="meta_description_en">{{ $service->english()->meta_description }}</textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta description in arabic: </label>
                    <textarea type="text" class="form-control"
                        name="meta_description_ar">{{ $service->arabic()->meta_description }}</textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->

            <div class="col-md-12 col-sm-12 form-group">
                <button class="custom-btn" type="submit">
                    <span> <i class="fa fa-save"></i> save</span>
                </button>
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
@endsection
