@extends('site.layouts.master')
@section('meta')
    <meta NAME="keywords" CONTENT="{{ $article->translated()->meta_keywords }}" />
    <meta NAME="description" CONTENT="{{ $article->translated()->meta_description }}" />
    <meta name="title" content="{{ $article->translated()->meta_title }}">
@endsection
@section('title')
    {{ $article->translated()->title }}
@endsection
@section('content')
    <!-- Page Head
                    ==========================================-->
    <section class="page-heading" style="background-color : {{ $colors[15]->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p
                        style="font-size: 26px; line-height: 40px; letter-spacing: 3px; text-transform: uppercase; color: #fff; font-weight: 800;">
                        {{ app()->getLocale() == 'en' ? 'Blog' : 'الأخبار' }}</p>
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
                        <li class="active">{{ app()->getLocale() == 'en' ? 'Blog' : 'الأخبار' }}</li>
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
        <section class="blog section_color">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="news_details">
                            <h1>{{ $article->translated()->title }}</h1>
                            <ul>
                                <li><i class="fa fa-calendar-alt"></i> {{ $article->created_at->format('d-m-Y') }}</li>

                            </ul>
                            <img src="{{ asset('storage/uploads/blog/' . $article->inner_image) }}"
                                class="img_blog" />
                            {!! $article->translated()->description !!}
                        </div>
                        <div class="news_details share">
                            <h4>{{ app()->getLocale() == 'en' ? 'share this post' : 'مشاركة هذا المنشور' }}</h4>
                        </div>
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_whatsapp"></a>
                            <a class="a2a_button_linkedin"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End container-->
        </section>
        <section>
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-sm-12">
                        <div class="section-title">
                            <span> {{ app()->getLocale() == 'en' ? 'Blog' : 'الأخبار' }} </span>
                            <h2 class="title">
                                {{ app()->getLocale() == 'en' ? 'Related News' : 'الأخبار المتعلقة' }} </h2>
                        </div>
                        <!--End Section title-->
                    </div>
                    @foreach ($relates as $relate)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog_item shadow">
                                <div class="cover">
                                    <img src="{{ asset('storage/uploads/blog/' . $relate->outer_image) }}" />
                                    <a href="{{ route('site.article', ['slug' => $relate->slug]) }}"
                                        class="fa fa-long-arrow-alt-right icon_link"></a>
                                </div>
                                <div class="cont">
                                    <h3><a
                                            href="{{ route('site.article', ['slug' => $relate->slug]) }}">{{ $relate->translated()->title }}</a>
                                    </h3>
                                    <p>
                                        {{ strip_tags(\Str::limit($relate->translated()->description, 150)) }}
                                    </p>
                                </div>
                                <ul>
                                    <li><i class="fa fa-calendar-alt"></i> {{ $relate->created_at->format('d-m-Y') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--End Row-->
            </div>
            <!--End container-->
        </section>
    </div>
@endsection
