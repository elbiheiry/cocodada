@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-user"></i> Blog
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Blog</li>
        </ul>
    </div>
    <!-- Page content
        ==========================================-->
    <div class="page-content">
        <form class="row edit-form" action="{{ route('admin.blog.edit', ['id' => $article->id]) }}" method="post"
            enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <img src="{{ asset('storage/uploads/blog/' . $article->outer_image) }}" class="table-img">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <img src="{{ asset('storage/uploads/blog/' . $article->inner_image) }}" class="table-img">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Article outer image</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="outer_image"
                            class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Image size 767 * 500</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Article inner image</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="inner_image"
                            class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Image size 1120 * 730</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>article title in english</label>
                    <input class="form-control" type="text" name="title_en" value="{{ $article->english()->title }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>article title in arabic</label>
                    <input class="form-control" type="text" name="title_ar" value="{{ $article->arabic()->title }}">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>article description in english</label>
                    <textarea class="form-control tiny-editor" name="description_en">{{ $article->english()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>article description in arabic</label>
                    <textarea class="form-control  tiny-editor" name="description_ar">{{ $article->arabic()->description }}</textarea>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <hr />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Meta title in english : </label>
                    <input type="text" class="form-control" name="meta_title_en"
                        value="{{ $article->english()->meta_title }}">
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Meta title in arabic : </label>
                    <input type="text" class="form-control" name="meta_title_ar"
                        value="{{ $article->arabic()->meta_title }}">
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta keywords in english: </label>
                    <textarea class="form-control tags" name="meta_keywords_en">{{ $article->english()->meta_keywords }}</textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta keywords in arabic: </label>
                    <textarea class="form-control tags" name="meta_keywords_ar">{{ $article->arabic()->meta_keywords }}</textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta description in english: </label>
                    <textarea type="text" class="form-control"
                        name="meta_description_en">{{ $article->english()->meta_description }}</textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta description in arabic: </label>
                    <textarea type="text" class="form-control"
                        name="meta_description_ar">{{ $article->arabic()->meta_description }}</textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-md-12 col-sm-12 form-group">
                <div class="form-group">
                    <button class="custom-btn" type="submit">
                        <span> <i class="fa fa-save"></i> save</span>
                    </button>
                </div>
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
