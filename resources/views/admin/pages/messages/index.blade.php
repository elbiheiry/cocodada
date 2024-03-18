@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-envelope"></i> Messages
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Messages</li>
        </ul>
    </div>
    <!-- Page content
                ==========================================-->
    <div class="page-content ">
        <h4 class="alert-text">You have {{ \App\Models\Message::count() }} Message</h4>
        <div class="col-md-12 col-lg-12 col-sm-12">
            <hr>
        </div>
        <div class="table-responsive-lg-lg" style="position: relative;">

            <div class="spacer-15"></div>
            <table class="table table-bordered" id="datatable" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td><a
                                    href="{{ route('admin.messages.single', ['id' => $message->id]) }}">{{ $message->name }}</a>
                            </td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>
                                <button class="icon-btn red-bc delete-btn"
                                    data-url="{{ route('admin.messages.delete', ['id' => $message->id]) }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!--End Page content-->
@endsection
@section('js')
    <script>
        $('.delete-btn').on('click', function() {
            var url = $(this).data('url');

            window.location.href = url;
        });
    </script>
@endsection
