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
    <div class="page-content only-message">
        <div class="message-head">
            <div class="sender-img">
                <img src="{{ $message->getAvatar() }}">
            </div>
            <div class="sender-name">
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

                @if ($message->service_id != null)
                    <span>
                        Service :
                        {{ \App\Models\Service::where('id', $message->service_id)->first()->translated()->name }}
                    </span>
                @endif
            </div>
        </div>
        <div class="message-details">{{ $message->message }}</div>
    </div>
    <!--End Page content-->
@endsection
