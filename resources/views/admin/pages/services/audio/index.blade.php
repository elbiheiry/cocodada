@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete audio</h5>
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
    <div id="common-modal" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit audio</h5>
                </div>
                <div class="modal-data">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="page-head">
        <i class="fa fa-user"></i> Service Audio
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Service Audio</li>
        </ul>
    </div>
    <!-- Page content
        ==========================================-->
    <div class="page-content">
        <form class="row ajax-form" action="{{ route('admin.services.audio', ['id' => $id]) }}" method="post">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Attach Audio picture</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="image" class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Image size 767*500</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Attach Audio</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="audio" class="form-control">
                        <span class="file-custom"></span>
                    </label>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-btn">
                <div class="form-group">
                    <button class="custom-btn" type="submit">
                        <span> <i class="fa fa-save"></i> save</span>
                    </button>
                </div>
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
                        <th>image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @include('admin.pages.services.audio.templates.table')
                </tbody>
            </table>
        </div>
    </div>
    <!--End Row-->
@endsection
