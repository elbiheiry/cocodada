@extends('site.layouts.master')
@section('title')
    Privacy policy
@endsection
@section('content')
    <!-- Page Head
                ==========================================-->
    <section class="page-heading" style="background-color : {{ $colors[13]->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'Privacy policy' : 'سياسه الخصوصيه' }}</h2>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'Privacy policy' : 'سياسه الخصوصيه' }}
                        </li>
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
        <section class="section-setting section-color section-shap about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pp">
                            @if (app()->getLocale() == 'en')
                                {!! $settings->privacy_en !!}
                            @else
                                {!! $settings->privacy_ar !!}
                            @endif
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <!--End Page Content-->
@endsection
