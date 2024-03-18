@extends('site.layouts.master')
@section('title')
    Media
@endsection
@section('content')
    <!-- Page Head
                    ==========================================-->
    <section class="page-heading" style="background-color : {{ $colors[3]->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'Media' : 'الميديا' }}</h2>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'Media' : 'الميديا' }}</li>
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
        <section class="section-setting section-color section-icons gallery-fliter">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <ul class="nav nav-tabs">
                            @foreach ($services as $index => $service)
                                @if (sizeof($service->images) > 0)
                                    <li class="@if ($index == 0) {{ 'active' }} @endif">
                                        <a href="#tab{{ $index + 1 }}"
                                            data-toggle="tab">{{ $service->translated()->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($services as $index => $service)
                                @if (sizeof($service->images) > 0)
                                    <div class="tab-pane fade in {{ $index == 0 ? 'active' : '' }}"
                                        id="tab{{ $index + 1 }}">
                                        <div class="col-md-12 col-sm-12">
                                            <span class="media_type"><i
                                                    class="fa fa-image"></i>{{ app()->getLocale() == 'en' ? 'Photos' : 'الصور' }}</span>
                                        </div>
                                        <!--end col-md-12-->
                                        @foreach ($service->images as $image)
                                            <div class="col-md-4 col-sm-6">
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
                                        <div class="col-md-12 col-sm-12">
                                            <span class="media_type"><i
                                                    class="fa fa-video"></i>{{ app()->getLocale() == 'en' ? 'Videos' : 'الفيديوهات' }}</span>
                                        </div>
                                        <!--end col-md-12-->
                                        @foreach ($service->videos as $video)
                                            <div class="col-md-4 col-sm-6">
                                                <div class="video-item">
                                                    <div class="video-img">
                                                        <img
                                                            src="http://img.youtube.com/vi/{{ $video->link }}/maxresdefault.jpg">
                                                        <a class="popup-video"
                                                            href="https://www.youtube.com/watch?v={{ $video->link }}">
                                                            <img src="{{ asset('public/site/images/play.png') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Col-md-4-->
                                        @endforeach
                                        <div class="col-md-12 col-sm-12">
                                            <span class="media_type">
                                                <i class="fa fa-music"></i>
                                                {{ app()->getLocale() == 'en' ? 'Audio' : 'الصوتيات' }}
                                            </span>
                                        </div>
                                        <!--end col-md-12-->
                                        @foreach ($service->audios as $audio)
                                            <div class="col-md-4 col-sm-6">
                                                <div class="audio-item">
                                                    <img src="{{ asset('storage/uploads/services/' . $audio->image) }}">
                                                    <audio class="audio" controls="controls">
                                                        <source type="audio/mpeg"
                                                            src="{{ asset('storage/uploads/services/' . $audio->audio) }}">
                                                    </audio>
                                                </div>
                                                <!--End Gall Item-->
                                            </div>
                                            <!--End Col-md-4-->
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!--End Co-md-12-->
                </div>
                <!--End row-->
            </div>
            <!--End Container-->
        </section><!-- End Section -->
    </div>
    <!--End Page Content-->
@endsection
