@extends('site.layouts.master')
@section('title')
    franchising
@endsection
@section('content')
    <!-- Page Head
                ==========================================-->
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'MOBILE APP' : 'تطبيق الموبيل' }}</h2>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'MOBILE APP' : 'تطبيق الموبيل' }}</li>
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
        <section class="section-setting">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12">
                        <div class="coming">
                            <h3>Mobile App Is Coming Soon</h3>
                            <p>
                                NewLevelEgypt App will be The Gate To all New Level Services
                            </p>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--End Page Content-->
@endsection
