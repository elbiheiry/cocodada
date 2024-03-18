@extends('site.layouts.master')
@section('meta')
    <meta NAME="keywords" CONTENT="{{ $service->translated()->meta_keywords }}" />
    <meta NAME="description" CONTENT="{{ $service->translated()->meta_description }}" />
    <meta name="title" content="{{ $service->translated()->meta_title }}">
@endsection
@section('title')
    {{ $service->translated()->name }}
@endsection
@section('content')
    <!-- Page Head
                ==========================================-->
    <section class="page-heading"
        style="background-color : {{ $colors->where('page', $service->slug)->first()->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p
                        style="font-size: 26px; line-height: 40px; letter-spacing: 3px; text-transform: uppercase; color: #fff; font-weight: 800;">
                        {{ $service->translated()->name }}</p>
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
                        <li class="active">{{ $service->translated()->name }}</li>
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
        <section class="section-setting section-color service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <h1 class="head-title">{{ $service->translated()->name }}</h1>
                        <div class="info-text">{{ $service->translated()->description }}</div>
                        <a href="{{ route('site.contact', ['id' => $service->id]) }}" class="custom-btn">
                            {{ app()->getLocale() == 'en' ? 'order service' : 'اطلب الخدمه' }}
                        </a>
                        <div class="info-text">
                            <strong>
                                {{ app()->getLocale() == 'en' ? 'See below our innovated' : 'انظر للاسفل لجديد' }}
                                {{ $service->translated()->name }} –
                                {{ app()->getLocale() == 'en' ? 'Contact us for details' : 'تواصل معنا للتفاصيل' }}!
                            </strong>
                        </div>
                        <ul class="dot-lists inline">
                            @foreach (explode("\n", $service->translated()->features) as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start Section
            ==========================================-->
        <section class="section-setting service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <p class="head-title">{{ $service->translated()->name }} </p>
                    </div>
                </div>
                @foreach ($service->types as $index => $type)
                    <div class="row">
                        @if ($index % 2 == 0)
                            <div class="col-md-7 col-sm-12 wow fadeInLeft">
                                <div class="inner-serv-cont">
                                    <h2 class="head-title"> - {{ $type->translated()->name }} </h2>
                                    <div class="info-text">{{ $type->translated()->description }}</div>
                                </div>
                            </div>
                            <!--End Col-md-7-->
                            <div class="col-md-5 col-sm-12 wow fadeInRight">
                                <div class="inner-serv-img">
                                    <img src="{{ asset('storage/uploads/services/' . $type->image) }}">
                                </div>
                            </div>
                            <!--End Col-md-5-->
                        @else
                            <div class="col-md-5 col-sm-12 wow fadeInLeft">
                                <div class="inner-serv-img">
                                    <img src="{{ asset('storage/uploads/services/' . $type->image) }}">
                                </div>
                            </div>
                            <!--End Col-md-5-->
                            <div class="col-md-7 col-sm-12 wow fadeInRight">
                                <div class="inner-serv-cont">
                                    <h2 class="head-title"> - {{ $type->translated()->name }} </h2>
                                    <div class="info-text">{{ $type->translated()->description }}</div>
                                </div>
                            </div>
                            <!--End Col-md-7-->
                        @endif
                    </div>
                @endforeach
            </div>
            <!--End Container-->
        </section><!-- End Section -->
        <!-- Start Section
            ==========================================-->
        <section class="section-setting section-color service">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-left">
                        <div class="section-title">
                            <span>{{ app()->getLocale() == 'en' ? 'Service Albums' : 'البوم الخدمه' }}</span>
                            <div class="title">{{ app()->getLocale() == 'en' ? 'gallery' : 'معرض الصور' }}</div>
                        </div>
                    </div>
                    @foreach ($service->images as $image)
                        <div class="col-md-4 col-sm-6 wow fadeInUp">
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
                <!--End Row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
    </div>
    <!--End Page Content-->
@endsection
