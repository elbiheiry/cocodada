@extends('site.layouts.master')
@section('title')
    Our story
@endsection
@section('content')
    <!-- Page Head
                    ==========================================-->
    <section class="page-heading" style="background-color : {{ $colors[0]->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }}</h2>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }}</li>
                    </ul>
                </div>
                <!--End col-->
            </div>
            <!--End Row-->
        </div>
        <!--End container-->
    </section>
    <!-- Page Content
            ==========================================-->
    <div class="page-content">
        <!-- Start Section
                ==========================================-->
        <section class="section-setting section-color section-shap about">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6 col-sm-12 wow fadeInLeft">
                        <div class="about-img">
                            <video id="about-vid" controls>
                                <source src="{{ asset('storage/uploads/about/' . $abouts[0]->video) }}">
                            </video>
                            <button class="wow zoomIn play-btn">
                                <img src="{{ asset('public/site/images/play.png') }}">
                            </button>
                        </div>
                    </div>
                    <!--End Col-md-6-->
                    <div class="col-md-6 col-sm-12 wow fadeInRight">
                        <div class="about-cont">
                            <div class="head-title">{{ $abouts[0]->translated()->title }}</div>
                            <div class="info-text">{{ $abouts[0]->translated()->description }}</div>
                            <ul class="dot-lists">
                                @foreach (explode("\n", $abouts[0]->translated()->features) as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6 col-sm-12 wow fadeInLeft">
                        <div class="about-cont">
                            <div class="head-title">{{ $abouts[1]->translated()->title }}</div>
                            @foreach (explode("\n", $abouts[1]->translated()->description) as $description)
                                <div class="info-text">{{ $description }}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 wow fadeInRight">
                        <div class="about-cont">
                            <div class="head-title">{{ $abouts[2]->translated()->title }}</div>
                            @foreach (explode("\n", $abouts[2]->translated()->description) as $description)
                                <div class="info-text">{{ $description }}</div>
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
                            <span>{{ app()->getLocale() == 'en' ? 'happy vendors' : 'شركاء النجاح' }}</span>
                            <div class="title"> {{ app()->getLocale() == 'en' ? 'Our Vendors' : 'العملاء' }}
                            </div>
                        </div>
                        <!--End Section title-->
                    </div>
                    <!--End Col-md-12--->
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
