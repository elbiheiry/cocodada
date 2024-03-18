@extends('site.layouts.master')
@section('title')
    Team
@endsection
@section('content')
    <!-- Page Head
                ==========================================-->
    <section class="page-heading" style="background-color : {{ $colors[2]->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'Team' : 'فريق العمل' }}</h2>
                </div>
                <!--End col-->
                <div class="w-100"></div>
                <div class="col">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{ route('site.index') }}">
                                <i class="fa fa-home"></i>{{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسيه' }}
                            </a>
                        </li>
                        <li class="active">{{ app()->getLocale() == 'en' ? 'Team' : 'فريق العمل' }}</li>
                    </ul>
                </div>
                <!--End col-->
            </div>
            <!--End Row-->
        </div>
        <!--End container-->
    </section>
    <div class="page-content">
        <!-- Start Section
            ==========================================-->
        <section class="section-setting section-color team section-icons">
            <div class="container">
                <div class="row text-center">
                    @foreach ($members as $member)
                        <div class="col-md-4 col-sm-6 wow fadeInUp">
                            <div class="team-item">
                                <div class="team-img">
                                    <img src="{{ asset('storage/uploads/team/' . $member->image) }}">
                                    <div class="bio">
                                        {{ $member->translated()->description }}
                                        <ul class="social_link">
                                            @foreach ($member->social_links as $link)
                                                <li>
                                                    <a target="_blank" href="{{ $link->link }}">
                                                        {!! $link->icon !!}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-content">
                                    <div class="title">{{ $member->translated()->name }}</div>
                                    <span>{{ $member->translated()->position }}</span>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <button type="button" class="custom-btn" data-toggle="modal" data-target="#join_team">
                            {{ app()->getLocale() == 'en' ? 'Join Team' : 'انضم الينا' }}
                        </button>
                    </div>
                </div>
                <!--End row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
    </div>
    <!--End Page Content-->
@endsection
