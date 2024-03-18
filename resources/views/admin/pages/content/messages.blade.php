@extends('admin.layouts.master')
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">
        <div class="modal-dialog wide" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                </div>
                <div class="modal-data">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="page-head">
        <i class="fa fa-user"></i> Other pages
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Other pages</li>
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
                        <th>Name</th>
                        <th>Organization name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>location</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->organization_name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>{{ $message->date }}</td>
                            <td>{{ $message->description }}</td>
                            <td>{{ $message->location }}</td>
                            <td>{{ $message->type }}</td>
                            <td>
                                <button class="icon-btn red-bc delete-btn"
                                    data-url="{{ route('admin.pages.messages.delete', ['id' => $message->id]) }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--End Row-->
@endsection
@section('js')
    <script>
        $('.delete-btn').on('click', function() {
            var url = $(this).data('url');

            window.location.href = url;
        });
    </script>
@endsection
