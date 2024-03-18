@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-envelope"></i> Subscribers
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Subscribers</li>
        </ul>
    </div>
    <!-- Page content
            ==========================================-->
    <div class="page-content ">
        <h4 class="alert-text">You have {{ \App\Models\Subscriber::count() }} Subscriber</h4>
        <div class="col-md-12 col-lg-12 col-sm-12">
            <hr>
        </div>
        <div class="table-responsive-lg-lg" style="position: relative;">

            <div class="spacer-15"></div>
            <table class="table table-bordered" id="datatable" style="width:100%">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $subscriber)
                        <tr>
                            <td>{{ $subscriber->email }}</td>
                            <td>
                                <button class="icon-btn red-bc delete-btn"
                                    data-url="{{ route('admin.subscribers.delete', ['id' => $subscriber->id]) }}">
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
