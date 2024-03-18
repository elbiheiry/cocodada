@extends('admin.layouts.master')
@section('models')
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center" id="delete-form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete event</h5>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit event</h5>
                </div>
                <div class="modal-data">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="page-head">
        <i class="fa fa-user"></i> Events
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Events</li>
        </ul>
    </div>
    <!-- Page content  ==========================================-->
    <div class="page-content">
        <form class="row ajax-form" action="{{ route('admin.articles') }}" method="post">
            {!! csrf_field() !!}
            <div class="col-md-6 col-sm-6 form-group">
                <label>Add video ID</label>
                <input class="form-control" type="text" name="link">
            </div>
            <div class="col-md-6 col-sm-6 form-group">
                <label>Event start date</label>
                <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy"
                    data-link-field="dtp_input2">
                    <input class="form-control" size="16" type="text" name="start_date" value="" readonly>
                    <span class="input-group-addon">
                        <span class="fa fa-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 form-group">
                <label>Event name in english</label>
                <input class="form-control" type="text" name="name_en">
            </div>
            <div class="col-md-6 col-sm-6 form-group">
                <label>Event name in arabic</label>
                <input class="form-control" type="text" name="name_ar">
            </div>
            <div class="col-md-6 col-sm-6 form-group">
                <label>Event location in english</label>
                <input class="form-control" type="text" name="location_en">
            </div>
            <div class="col-md-6 col-sm-6 form-group">
                <label>Event location in arabic</label>
                <input class="form-control" type="text" name="location_ar">
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
                        <th>name</th>
                        <th>location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @include('admin.pages.articles.templates.table')
                </tbody>
            </table>
        </div>
    </div>
    <!--End Row-->
@endsection
