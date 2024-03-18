@extends('admin.layouts.master')
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">
        <div class="modal-dialog wide" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit banners</h5>
                </div>
                <div class="modal-data">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="page-head">
        <i class="fa fa-user"></i> Banners
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Banners</li>
        </ul>
    </div>
    <!-- Page content
        ==========================================-->
    <div class="page-content">
        <div class="table-responsive-lg-lg" style="position: relative;">
            <div class="load-spinner" style="display: none;">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            <div class="spacer-15"></div>
            <table class="table table-bordered" id="datatable" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>page name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @include('admin.pages.banners.templates.table')
                </tbody>
            </table>
        </div>
    </div>
    <!--End Row-->
@endsection
