@extends('site.layouts.master')
@section('title')
    {{ app()->getLocale() == 'en' ? 'Gamification' : 'الجولات' }}
@endsection
@section('content')
    <!-- Page Head
                ==========================================-->
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'Gamification' : 'الجولات' }}</h2>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'Gamification' : 'الجولات' }}</li>
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
        <section class="section-setting inner">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="info-text">
                            {{ $content->translated()->description }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="contact-form ajax-form" method="post" action="{{ route('site.other_form') }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="type" value="gamification">
                            <div class="form-title">{{ app()->getLocale() == 'en' ? 'Get In touch' : 'تواصل معنا' }}
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="form-control" type="text" name="name"
                                    placeholder="{{ app()->getLocale() == 'en' ? 'Name' : 'الاسم' }}">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="form-control" type="text" name="organization_name"
                                    placeholder="{{ app()->getLocale() == 'en' ? 'Organization name' : 'اسم المنظمه' }}">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="form-control" type="email" name="email"
                                    placeholder="{{ app()->getLocale() == 'en' ? 'Business email' : 'البريد الالكتروني' }}">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="form-control" type="text" name="phone"
                                    placeholder="{{ app()->getLocale() == 'en' ? 'Phone number' : 'رقم الهاتف' }}">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="form-control" type="date" name="date"
                                    placeholder="{{ app()->getLocale() == 'en' ? 'Desired date to make your project done' : 'الموعد المطلوب للبدا بالمشروع' }}">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <input class="form-control" type="text" name="location"
                                    placeholder="{{ app()->getLocale() == 'en' ? 'Where is the location of this job?' : 'اين هو موقع المشروع ؟' }}">
                            </div>
                            <div class="col-md-12 col-sm-12 form-group">
                                <textarea class="form-control" name="description"
                                    placeholder=" {{ app()->getLocale() == 'en' ? 'Tell us more about your product identity and target audience' : 'اخبرنا المزيد عن هويه المنتج الخاص بك والجمهور المستهدف' }} "></textarea>
                            </div>
                            <div class="col-md-12 col-sm-12 form-group text-right">
                                <button class="custom-btn" type="submit">
                                    <i class="fas fa-envelope"></i>{{ app()->getLocale() == 'en' ? 'Send' : 'ارسال' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="spacer-30"></div>
                <div class="row text-center">
                    @foreach ($content->images as $image)
                        <div class="col-md-4 col-sm-6 ">
                            <div class="gall-item">
                                <img src="{{ asset('storage/uploads/pages/' . $image->image) }}">
                                <div class="hover">
                                    <div class="hover-cont">
                                        <a href="{{ asset('storage/uploads/pages/' . $image->image) }}"
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
        </section>
    </div>
@endsection
