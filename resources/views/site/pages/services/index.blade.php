@extends('site.layouts.master')
@section('title')
    Services
@endsection
@section('content')
    <!-- Page Head
                    ==========================================-->
    <section class="page-heading" style="background-color : {{ $colors[1]->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>{{ app()->getLocale() == 'en' ? 'Services' : 'الخدمات' }}</h1>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'Services' : 'الخدمات' }}</li>
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
        <section class="section-setting section-color services">
            <div class="container">
                <div class="row text-center">
                    @foreach ($services as $service)
                        <div class="col-md-4 col-sm-6 wow fadeInUp">
                            <div class="serv-item">
                                <img src="{{ asset('storage/uploads/services/' . $service->image) }}">
                                <h2 class="name">{{ $service->translated()->name }}</h2>
                                <p>
                                    {{ \Str::limit($service->translated()->description, 50) }}
                                </p>
                                <a href="{{ route('site.services.single', ['slug' => $service->slug]) }}"
                                    class="custom-btn">{{ app()->getLocale() == 'en' ? 'more' : 'المزيد' }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--End row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
    </div>
    <!--End Page Content-->
@endsection
