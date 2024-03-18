@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-envelope"></i> Requests
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Requests</li>
        </ul>
    </div>
    <!-- Page content
        ==========================================-->
    <div class="page-content ">
        <h4 class="alert-text">You have {{ \App\Models\PackageRequest::count() }} Requests</h4>
        @foreach ($messages as $message)
            <div class="item-list gray">
                <a href="{{ route('admin.package_request.single', ['id' => $message->id]) }}">
                    <img src="{{ $message->getAvatar() }}">
                    <div class="item-content">
                        {{ $message->name }}
                        <span>
                            <i class="fa fa-clock"></i> {{ $message->created_at->diffForHumans() }}
                        </span>
                        <span>
                            <i class="fa fa-envelope"></i> {{ $message->email }}
                        </span>
                        <span>
                            <i class="fa fa-phone"></i> {{ $message->phone }}
                        </span>
                        <span>
                            <i class="fa fa-map-marker"></i> {{ $message->address }}
                        </span>
                        <span>
                            <i class="fa fa-list"></i> {{ $message->job }}
                        </span>
                    </div>
                </a>
                <button class="icon-btn red-bc delete-btn"
                    data-url="{{ route('admin.package_request.delete', ['id' => $message->id]) }}">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
            <!--End Item List-->
        @endforeach
        {!! $messages->links() !!}
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
