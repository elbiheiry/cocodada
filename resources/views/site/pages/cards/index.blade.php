@extends('site.layouts.master')
@section('title')
    Download
@endsection
@section('content')
    <!-- Page Head
                    ==========================================-->
    <section class="page-heading" style="background-color : {{ $colors[4]->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'Download' : 'التنزيلات' }}</h2>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'Download' : 'التنزيلات' }}</li>
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
                    <div class="col-md-12 col-sm-12 text-left">
                        <span class="media_type">
                            <i class="fa fa-music"></i>
                            {{ app()->getLocale() == 'en' ? 'Files' : 'الملفات' }}
                        </span>
                    </div>
                    <!--end col-md-12-->
                    @foreach ($downloads as $download)
                        <div class="col-md-3 col-sm-6 wow fadeInUp">
                            <div class="download-item">
                                <img src="{{ asset('storage/uploads/downloads/' . $download->image) }}">
                                <h3>{{ $download->translated()->name }}</h3>
                                <a href="{{ asset('storage/uploads/downloads/' . $download->file) }}" target="_blank"
                                    class="custom-btn"><i
                                        class="fa fa-eye"></i>{{ app()->getLocale() == 'en' ? 'view' : 'عرض' }}</a>
                                <a href="{{ asset('storage/uploads/downloads/' . $download->file) }}"
                                    class="custom-btn" download=""><i
                                        class="fa fa-download"></i>{{ app()->getLocale() == 'en' ? 'download' : 'تحميل' }}</a>
                            </div>
                            <!--End Download Item-->
                        </div>
                        <!--End Col-md-3-->
                    @endforeach
                    {{-- <div class="col-md-12 col-sm-12 wow fadeInUp"> --}}
                    {{-- <button class="custom-btn">Load more</button> --}}
                    {{-- </div> --}}
                </div>
                <div class="row text-center">
                    <div class="col-md-12 col-sm-12 text-left">
                        <span class="media_type">
                            <i class="fa fa-music"></i>
                            {{ app()->getLocale() == 'en' ? 'Audio' : 'الصوتيات' }}
                        </span>
                    </div>
                    <!--end col-md-12-->
                    @foreach ($audios as $audio)
                        <div class="col-md-3 col-sm-6">
                            <div class="download-item audio-item">
                                <img src="{{ asset('storage/uploads/services/' . $audio->image) }}">
                                <audio class="audio" controls="controls">
                                    <source type="audio/mpeg"
                                        src="{{ asset('storage/uploads/services/' . $audio->audio) }}">
                                </audio>
                            </div>
                        </div>
                        <!--End Col-md-4-->
                    @endforeach
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <ul class="app-down">
                            <li>
                                <a href="{{ route('site.mobile') }}">
                                    <img src="{{ asset('public/site/images/app-store.png') }}">
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('site.mobile') }}">
                                    <img src="{{ asset('public/site/images/google-app.png') }}">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--End Page Content-->
@endsection
