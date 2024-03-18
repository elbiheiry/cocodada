@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete item</h5>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="custom-btn red-bc">
                        <i class="fa fa-trash"></i> delete
                    </button>
                    <button type="button" class="custom-btn" data-dismiss="modal">
                        <i class="fa fa-times"></i>close
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
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
        <form class="row ajax-form" action="{{ route('admin.services') }}" method="post">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Service name in english</label>
                    <input class="form-control" type="text" name="name_en">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Service name in arabic</label>
                    <input class="form-control" type="text" name="name_ar">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Service description in english</label>
                    <textarea class="form-control" name="description_en"></textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Service description in arabic</label>
                    <textarea class="form-control" name="description_ar"></textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Service features in english</label>
                    <textarea class="form-control" name="features_en"></textarea>
                    <span class="text-danger">Please press enter after each feature</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Service features in arabic</label>
                    <textarea class="form-control" name="features_ar"></textarea>
                    <span class="text-danger">Please press enter after each feature</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Attach Service picture</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="image" class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Image size 64*64</span>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <hr />
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Meta title in english : </label>
                    <input type="text" class="form-control" name="meta_title_en">
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Meta title in arabic : </label>
                    <input type="text" class="form-control" name="meta_title_ar">
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta keywords in english: </label>
                    <textarea class="form-control tags" name="meta_keywords_en"></textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta keywords in arabic: </label>
                    <textarea class="form-control tags" name="meta_keywords_ar"></textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta description in english: </label>
                    <textarea type="text" class="form-control" name="meta_description_en"></textarea>
                </div>
                <!--End Form Group-->
            </div>
            <!--End Col-md-6-->
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group">
                    <label> Meta description in arabic: </label>
                    <textarea type="text" class="form-control" name="meta_description_ar"></textarea>
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
        </form>
        <!--End Form-->
        <div class="col-md-12 col-lg-12 col-sm-12">
            <hr>
        </div>
        <div class="table-responsive-lg-lg" style="position: relative;">
            <div class="load-spinner" style="display: none;">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            <div class="spacer-15"></div>
            <table class="table table-bordered" id="datatable" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @include('admin.pages.services.templates.table')
                </tbody>
            </table>
        </div>
    </div>
    <!--End Row-->
@endsection
