@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog wide" role="document">
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
    <div id="common-modal" class="modal fade" role="dialog">
        <div class="modal-dialog wide" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit link</h5>
                </div>
                <div class="modal-data">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="page-head">
        <i class="fa fa-user"></i> Team members
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Team members</li>
        </ul>
    </div>
    <!-- Page content
            ==========================================-->
    <div class="page-content">
        <form class="row ajax-form" action="{{ route('admin.team') }}" method="post">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Attach Member picture</label>
                    <label class="file">
                        <input type="file" id="file" aria-label="File browser example" name="image" class="form-control">
                        <span class="file-custom"></span>
                    </label>
                    <span class="text-danger">Image size 460*540</span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Member name in english</label>
                    <input class="form-control" type="text" placeholder="Member name in english" name="name_en">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Member name in arabic</label>
                    <input class="form-control" type="text" placeholder="Member name in arabic" name="name_ar">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Member position in english</label>
                    <input class="form-control" type="text" placeholder="Member position in english" name="position_en">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Member position in arabic</label>
                    <input class="form-control" type="text" placeholder="Member position in arabic" name="position_ar">
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12"></div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Member description in english</label>
                    <textarea class="form-control" placeholder="Member position in english" name="description_en"></textarea>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Member description in arabic</label>
                    <textarea class="form-control" placeholder="Member position in arabic" name="description_ar"></textarea>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
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
                        <th>Name</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @include('admin.pages.team.templates.table')
                </tbody>
            </table>
        </div>
    </div>
    <!--End Row-->
@endsection
