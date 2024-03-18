@extends('site.layouts.master')
@section('title')
    Home
@endsection
@section('modals')
    <div class="modal fade" id="choose_plan" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content text-center ajax-form" method="post" action="{{ route('site.choose.plan') }}">
                {!! csrf_field() !!}
                <input type="hidden" name="package_id" id="PackageID">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ app()->getLocale() == 'en' ? 'Insert you information please' : 'ادخل بياناتك رجاء' }}</h5>
                </div>
                <div class="modal-body row">
                    <div class="col-md-12 col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab1"
                                    data-toggle="tab">{{ app()->getLocale() == 'en' ? 'terms and conditions' : 'الشروط والاحكام' }}</a>
                            </li>
                            <li>
                                <a href="#tab2"
                                    data-toggle="tab">{{ app()->getLocale() == 'en' ? 'Book Now' : 'احجز الان' }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1">
                                <ul class="dot-lists" id="package-terms">

                                </ul>
                            </div>
                            <div class="tab-pane fade in" id="tab2">
                                <div class="col-md-12 col-sm-6 form-group">
                                    <label> {{ app()->getLocale() == 'en' ? 'Name' : 'الاسم' }} :</label>
                                    <input class="form-control" type="text" name="name">
                                </div>
                                <div class="col-md-6 col-sm-6 form-group">
                                    <label> {{ app()->getLocale() == 'en' ? 'Email address' : 'البريد الالكتروني' }}
                                        :</label>
                                    <input class="form-control" type="email" name="email">
                                </div>
                                <div class="col-md-6 col-sm-6 form-group">
                                    <label> {{ app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف' }}: </label>
                                    <input class="form-control" type="text" name="phone">
                                </div>
                                <div class="col-md-12 col-sm-12 form-group">
                                    <label> {{ app()->getLocale() == 'en' ? 'Notes' : 'الملاحظات' }} :</label>
                                    <textarea class="form-control" name="notes"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="custom-btn green-bc">
                                        {{ app()->getLocale() == 'en' ? 'Send' : 'ارسال' }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">

                    <button type="button" class="custom-btn" data-dismiss="modal">
                        <i class="fa fa-times"></i>{{ app()->getLocale() == 'en' ? 'close' : 'اغلاق' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('content')
    <!-- Home Section
                        ==========================================-->
    <div class="welcome">
        <div class="video-wrap">
            <video loop id="myVideo">
                <source src="{{ asset('storage/uploads/videos/' . $settings->video) }}">
            </video>
            <img class="mute mute-video" src="{{ asset('public/site/images/speaker.png') }}" data-status="run" width="50"
                height="50">
        </div>
        <div class="container">
            <div class="row">
                <ul class="home-works">
                    <li>
                        <a href="{{ route('site.retailtainment') }}" class="custom-btn">
                            <img
                                src="{{ asset('public/site/images/7.png') }}">{{ app()->getLocale() == 'en' ? 'Retailtainment ' : 'اعياد الميلاد' }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('site.packages') }}" class="custom-btn">
                            {{ app()->getLocale() == 'en' ? 'Get instant offer' : 'الحصول على عرض فوري' }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('site.gamification') }}" class="custom-btn">
                            <img
                                src="{{ asset('public/site/images/9.png') }}">{{ app()->getLocale() == 'en' ? 'Gamification' : 'الجولات' }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Home Section-->
    <!-- Page Content
                ==========================================-->
    <div class="page-content">
        <!-- Start Section
                    ==========================================-->
        <section class="section-setting section-shap">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6 col-sm-12 wow fadeInLeft">
                        <div class="about-img">
                            <video id="about-vid" controls>
                                <source src="{{ asset('storage/uploads/about/' . $about->video) }}">
                            </video>
                            <button class="wow zoomIn play-btn">
                                <img src="{{ asset('public/site/images/play.png') }}">
                            </button>
                        </div>
                    </div>
                    <!--End Col-md-6-->
                    <div class="col-md-6 col-sm-12 wow fadeInRight">
                        <div class="about-cont">
                            <div class="head-title">{{ $about->translated()->title }}</div>
                            <div class="info-text">{{ $about->translated()->description }}</div>
                            <ul class="dot-lists">
                                @foreach (explode("\n", $about->translated()->features) as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                            <a href="{{ route('site.about') }}" class="custom-btn">read more</a>
                        </div>
                    </div>
                </div>
                <!--End row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
        <!-- Start Section
                    ==========================================-->
        <section class="section-setting img-sec services">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="section-title">

                            <div class="title">
                                {{ app()->getLocale() == 'en' ? 'client\'s testimonial ' : 'آراء العملاء' }}</div>
                        </div>
                        <!--End Section title-->
                    </div>
                    <!--End Col-md-12-->
                    <div class="col-md-6 col-sm-12 wow fadeInUp">
                        <div class="owl-carousel owl-theme opin-lists-slide">
                            @foreach ($testimonials as $testimonial)
                                @if ($testimonial->translated()->name)
                                    <div class="item">
                                        <div class="opin-item">
                                            <div class="opin-item-content">
                                                <i class="fa fa-quote-left"></i>
                                                <span>{{ $testimonial->translated()->description }}</span>
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                            <!--End Opin-item-content-->
                                            <div class="opin-item-img">
                                                @if ($testimonial->image)
                                                    <img
                                                        src="{{ asset('storage/uploads/testimonials/' . $testimonial->image) }}">
                                                @endif
                                                <span>{{ $testimonial->translated()->name }}</span>
                                            </div>
                                            <!--End Opin-item-img-->
                                        </div>
                                        <!--End Opin-item-->
                                    </div>
                                    <!--End Carousel item-->
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 wow fadeInUp">
                        <div class="owl-carousel owl-theme clients-slid">
                            @foreach ($logos->chunk(2) as $chunk)
                                <div class="carousel-item">
                                    @foreach ($chunk as $testimonial)
                                        <div class="client-item">
                                            <img
                                                src="{{ asset('storage/uploads/testimonials/' . $testimonial->image) }}">
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--End row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
        <!-- Start Section
                    ==========================================-->
        <section class="section-setting section-shap">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="section-title">
                            <span>{{ app()->getLocale() == 'en' ? 'Awesome events' : 'فعاليات رائعة' }}</span>
                            <div class="title">
                                {{ app()->getLocale() == 'en' ? 'latest events' : 'اخر الفعاليات' }}</div>
                        </div>
                        <!--End Section title-->
                    </div>
                    <!--End Col-md-12-->
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="owl-carousel owl-theme events-slid">
                            @foreach ($events as $event)
                                <div class="carousel-item">
                                    <div class="event-item">
                                        <div class="event-img">
                                            <img src="http://img.youtube.com/vi/{{ $event->link }}/maxresdefault.jpg">
                                            <div class="date">
                                                <span>{{ \Carbon\Carbon::parse($event->start_date)->format('d') }}</span>
                                                {{ \Carbon\Carbon::parse($event->start_date)->format('M') }}
                                            </div>
                                            <a class="popup-video"
                                                href="https://www.youtube.com/watch?v={{ $event->link }}">
                                                <img src="{{ asset('public/site/images/play.png') }}">
                                            </a>
                                        </div>
                                        <div class="event-cont">
                                            <div class="title">{{ $event->translated()->name }}</div>
                                            <span>
                                                <i class="fa fa-map-marker"></i>
                                                {{ $event->translated()->location }}
                                            </span>
                                        </div>
                                    </div>
                                    <!--End Evednt Item-->
                                </div>
                                <!---End Carousel item-->
                            @endforeach
                        </div>
                    </div>
                    <!--End Col-md-12-->
                </div>
                <!--End row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
        <!-- Start Section
                    ==========================================-->
        <section class="section-setting section-color section-icons">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="section-title">
                            <span>{{ app()->getLocale() == 'en' ? 'awesome moments' : 'لحظات رائعة' }}</span>
                            <div class="title">{{ app()->getLocale() == 'en' ? 'Gallery' : 'معرض الصور' }}</div>
                        </div>
                        <!--End Section title-->
                    </div>
                    <!--End Col-md-12-->
                    <div class="col-md-12 col-sm-12 gallery-fliter wow fadeInUp">
                        <div class="gallery-fliter-items">
                            @foreach ($images as $image)
                                <div class="col-md-4 col-sm-6 mix {{ $image->service['slug'] }}">
                                    <div class="gall-item">
                                        <img src="{{ asset('storage/uploads/services/' . $image->image) }}">
                                        <div class="hover">
                                            <div class="hover-cont">
                                                <a href="{{ asset('storage/uploads/services/' . $image->image) }}"
                                                    class="popup-gallery">
                                                    +
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Gall Item-->
                                </div>
                                <!--End Col-md-4-->
                            @endforeach
                        </div>
                    </div>
                    <!--End Co-md-12-->
                    <div class="col-md-12 col-sm-12">
                        <a href="{{ route('site.gallery') }}" class="custom-btn">
                            {{ app()->getLocale() == 'en' ? 'load more' : 'تحميل المزيد' }}
                        </a>
                    </div>
                </div>
                <!--End row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
        <!-- Start Section
                    ==========================================-->
        <section class="section-setting pricing section-shap">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="section-title">
                            <span>{{ app()->getLocale() == 'en' ? 'best price' : 'أفضل الأسعار' }}</span>
                            <div class="title">
                                {{ app()->getLocale() == 'en' ? 'Our packages' : 'الباقات والاسعار' }}</div>
                        </div>
                        <!--End Section title-->
                    </div>
                    <!--End Col-md-12-->
                    @foreach ($packages as $package)
                        <div class="col-md-4 col-sm-12 wow fadeInUp">
                            <div class="pricing-item">
                                <div class="pricing-deco">
                                    <svg class="pricing-deco-img" enable-background='new 0 0 300 100' height='100px'
                                        id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100'
                                        width='300px' x='0px' xml:space='preserve'
                                        xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg'
                                        y='0px'>
                                        <path class='deco-layer deco-layer--1'
                                            d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z'
                                            fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--2'
                                            d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z'
                                            fill='#FFFFFF' opacity='0.6'></path>
                                        <path class='deco-layer deco-layer--3'
                                            d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z'
                                            fill='#FFFFFF' opacity='0.7'></path>
                                        <path class='deco-layer deco-layer--4'
                                            d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z'
                                            fill='#FFFFFF'></path>
                                    </svg>
                                    <h3 class='pricing-title'>{{ $package->translated()->name }}</h3>
                                </div>
                                <ul class='dot-lists'>
                                    @foreach (explode("\n", $package->translated()->description) as $description)
                                        <li>{{ $description }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" data-terms="{{ $package->translated()->terms }}"
                                    class="custom-btn PackageBTN" data-toggle="modal" data-target="#choose_package"
                                    data-id="{{ $package->id }}">
                                    {{ app()->getLocale() == 'en' ? 'read more' : 'اختر الباقه' }}
                                </button>
                            </div>
                            <!--End Pricing-item-->
                        </div>
                        <!--End Col-md-4-->
                    @endforeach
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <a href="{{ route('site.packages') }}" class="custom-btn more">
                            {{ app()->getLocale() == 'en' ? 'customize your package' : 'تخصيص باقه معينه' }}
                        </a>
                    </div>
                </div>
                <!--End row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
        <!-- Start Section
                    ==========================================-->
        <section class="section-setting section-color team section-icons">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="section-title">
                            <span>{{ app()->getLocale() == 'en' ? 'best team' : 'أفضل فريق' }}</span>
                            <div class="title"> {{ app()->getLocale() == 'en' ? 'Our team' : 'فريق العمل' }}
                            </div>
                        </div>
                        <!--End Section title-->
                    </div>
                    <!--End Col-md-12-->
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="owl-carousel owl-theme team-slid">
                            @foreach ($members as $member)
                                <div class="carousel-item">
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
                        </div>
                        <!--End OWL-->
                    </div>
                    <!--End Col-md-12-->
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
        <!-- Start Section
                    ==========================================-->
        <section class="section-setting section-shap">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="section-title">
                            <span>{{ app()->getLocale() == 'en' ? 'happy vendors ' : 'الموردين' }}</span>
                            <div class="title"> {{ app()->getLocale() == 'en' ? 'our vendors ' : 'الموردين' }}
                            </div>
                        </div>
                        <!--End Section title-->
                    </div>
                    <!--End Col-md-12-->
                    <div class="col-md-12 col-sm-12 wow fadeInUp">
                        <div class="owl-carousel owl-theme vendors-slid">
                            @foreach ($clients as $client)
                                <div class="carousel-item">
                                    <div class="client-item">
                                        <img src="{{ asset('storage/uploads/clients/' . $client->image) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--End Col-md-12-->
                </div>
                <!--End row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
    </div>
    <!--End Page Content-->
@endsection
@section('js')
    <script>
        $('.PackageBTN').on('click', function() {
            var packageID = $(this).data('id');
            var terms = $(this).data('terms').split('\n');
            $('#package-terms').html('');
            $.each(terms, function(term, value) {
                $('#package-terms').append('<li>' + value + '</li>')
            });

            $('#PackageID').val(packageID);
            $('#choose_plan').modal('show');
        });
    </script>
@endsection
