@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete link</h5>
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
        <i class="fa fa-user"></i> Social links
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Social links</li>
        </ul>
    </div>
    <!-- Page content
        ==========================================-->
    <div class="page-content">
        <form class="row ajax-form" action="{{ route('admin.links') }}" method="post">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-6 form-group">
                <label>Social media link</label>
                <input class="form-control" type="text" name="link">
            </div>

            <div class="col-md-6 col-sm-6 form-group">
                <label>Social media icon</label>
                <input class="form-control" type="text" name="icon">
                <span class="text-danger">Please go to this link to get your preferred icon : <a
                        href="https://fontawesome.com/icons?d=gallery" target="_blank">Click here</a> </span>
            </div>

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
                        <th>Link</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @include('admin.pages.links.templates.table')
                </tbody>
            </table>
        </div>
    </div>
    <!--End Row-->
@endsection
