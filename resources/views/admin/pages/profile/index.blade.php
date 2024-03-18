@extends('admin.layouts.master')
@section('content')
    <div class="page-head">
        <i class="fa fa-user"></i> Profile
        <ul class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i>home</a></li>
            <li class="active">Profile</li>
        </ul>
    </div>
    <!-- Page content
        ==========================================-->
    <div class="page-content ">
        <div class="row">
            <form class="col-lg-12 col-md-12 col-sm-12 row edit-form" action="{{ route('admin.profile') }}" method="post">
                {!! csrf_field() !!}
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Your name : </label>
                        <input type="text" class="form-control" placeholder="Your Name" value="{{ $user->name }}"
                            name="name">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Email address : </label>
                        <input type="email" class="form-control" placeholder="Email Address" name="email"
                            value="{{ $user->email }}">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group">
                        <label> Password : </label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <button class="custom-btn">save information</button>
                    </div>
                    <!--End Form Group-->
                </div>
                <!--End Col-md-6-->
                <div class="progress-wrap" style="display: none;">
                    <div class="progress">
                        <div class="bar"></div>
                        <div class="percent">0%</div>
                    </div>
                </div>
            </form>
            <!--End Form-->
        </div>
        <!--End Row-->
    </div>
    <!--End Page content-->
@endsection
