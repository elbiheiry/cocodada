@extends('site.layouts.master')
@section('title')
    Conatct us
@endsection
@section('content')
    <!-- Page Head
                    ==========================================-->
    <section class="page-heading" style="background-color : {{ $colors[6]->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }}</h2>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }}</li>
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
        <section class="section-setting section-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 wow fadeInUp">
                        <form class="contact-form ajax-form" method="post" action="{{ route('site.contact') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="service_id" value="{{ request()->service_id }}">
                            <div class="form-title">{{ app()->getLocale() == 'en' ? 'Get In touch' : 'تواصل معنا' }}
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <label> {{ app()->getLocale() == 'en' ? 'Name' : 'الاسم' }} :</label>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <label> {{ app()->getLocale() == 'en' ? 'Email address' : 'البريد الالكتروني' }} :</label>
                                <input class="form-control" type="email" name="email">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <label> {{ app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف' }}: </label>
                                <input class="form-control" type="text" name="phone">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <label>{{ app()->getLocale() == 'en' ? 'Subject' : 'عنوان الرساله' }}:</label>
                                <input class="form-control" type="text" name="subject">
                            </div>
                            <div class="col-md-12 col-sm-12 form-group">
                                <label> {{ app()->getLocale() == 'en' ? 'Message' : 'الرساله' }} :</label>
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                            <div class="col-md-12 col-sm-12 form-group">
                                <div class="g-recaptcha" data-sitekey="6LcbPKkfAAAAAP6f-FCfuleFy4liK2d5ogUxCyQL"
                                    style="width:100px;">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 form-group text-right">
                                <button class="custom-btn" id="SubmitBTN">
                                    <i class="fas fa-envelope"></i>{{ app()->getLocale() == 'en' ? 'Send' : 'ارسال' }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 col-sm-12 wow fadeInUp">
                        <iframe src="{{ $settings->map }}" width="100%" height="505" frameborder="0" style="border:0;"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </section>
        <!--End Section-->
    </div>
    <!--End Page Content-->
@endsection
@section('js')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
