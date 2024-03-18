@extends('site.layouts.master')
@section('title')
    videos
@endsection
@section('content')
    <!-- Page Head
                    ==========================================-->
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>{{ app()->getLocale() == 'en' ? 'Videos' : 'الفيديوهات' }}</h2>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'Videos' : 'الفيديوهات' }}</li>
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
        <section class="section-setting videos">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="tab-wrapper">
                            <ul class="nav nav-tabs home-works">
                                <li class="active">
                                    <a href="#videos_birthdays" data-toggle="tab">
                                        <img
                                            src="{{ asset('public/site/images/services/7.png') }}">{{ app()->getLocale() == 'en' ? 'birthdays' : 'اعياد الميلاد' }}
                                    </a>
                                </li>
                                <li>
                                    <a href="#videos_events" data-toggle="tab">
                                        <img
                                            src="{{ asset('public/site/images/services/8.png') }}">{{ app()->getLocale() == 'en' ? 'events' : 'انشطه' }}
                                    </a>
                                </li>

                                <li>
                                    <a href="#videos_roadshows" data-toggle="tab">
                                        <img
                                            src="{{ asset('public/site/images/services/9.png') }}">{{ app()->getLocale() == 'en' ? 'roadshows' : 'الجولات' }}
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="videos_birthdays">
                                    @foreach ($videos as $video)
                                        @if ($video->type == 'birthdays')
                                            <div class="col-md-4 col-sm-6 wow fadeInUp">
                                                <div class="event-item">
                                                    <div class="event-img">
                                                        <img
                                                            src="http://img.youtube.com/vi/{{ $video->link }}/maxresdefault.jpg">
                                                        <a class="popup-video"
                                                            href="https://www.youtube.com/watch?v={{ $video->link }}">
                                                            <img src="{{ asset('public/site/images/play.png') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--End Event ITem-->
                                            </div>
                                            <!--End Col-md-4-->
                                        @endif
                                    @endforeach
                                    {{-- <div class="col-md-12 col-sm-12 text-center"> --}}
                                    {{-- <button class="custom-btn more"> --}}
                                    {{-- load more --}}
                                    {{-- </button> --}}
                                    {{-- </div><!--End Col-md-12--> --}}
                                </div>
                                <!--End Tab Pane-->
                                <div class="tab-pane fade in" id="videos_events">
                                    @foreach ($videos as $video)
                                        @if ($video->type == 'events')
                                            <div class="col-md-4 col-sm-6 wow fadeInUp">
                                                <div class="event-item">
                                                    <div class="event-img">
                                                        <img
                                                            src="http://img.youtube.com/vi/{{ $video->link }}/maxresdefault.jpg">
                                                        <a class="popup-video"
                                                            href="https://www.youtube.com/watch?v={{ $video->link }}">
                                                            <img src="{{ asset('public/site/images/play.png') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--End Event ITem-->
                                            </div>
                                            <!--End Col-md-4-->
                                        @endif
                                    @endforeach
                                    {{-- <div class="col-md-12 col-sm-12 text-center"> --}}
                                    {{-- <button class="custom-btn more"> --}}
                                    {{-- load more --}}
                                    {{-- </button> --}}
                                    {{-- </div><!--End Col-md-12--> --}}
                                </div>
                                <div class="tab-pane fade in" id="videos_roadshows">
                                    @foreach ($videos as $video)
                                        @if ($video->type == 'roadshows')
                                            <div class="col-md-4 col-sm-6 wow fadeInUp">
                                                <div class="event-item">
                                                    <div class="event-img">
                                                        <img
                                                            src="http://img.youtube.com/vi/{{ $video->link }}/maxresdefault.jpg">
                                                        <a class="popup-video"
                                                            href="https://www.youtube.com/watch?v={{ $video->link }}">
                                                            <img src="{{ asset('public/site/images/play.png') }}">
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--End Event ITem-->
                                            </div>
                                            <!--End Col-md-4-->
                                        @endif
                                    @endforeach
                                    {{-- <div class="col-md-12 col-sm-12 text-center"> --}}
                                    {{-- <button class="custom-btn more"> --}}
                                    {{-- load more --}}
                                    {{-- </button> --}}
                                    {{-- </div><!--End Col-md-12--> --}}
                                </div>
                            </div>
                            <!--End tab Content-->
                        </div>
                        <!--End Tab Wrapper-->
                    </div>
                    <!--End Col-md-12-->
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
    <script>
        var url = window.location.href;
        var activeTab = url.substring(url.indexOf("#") + 1);
        $('a[href="#' + activeTab + '"]').tab('show');
    </script>
@endsection
