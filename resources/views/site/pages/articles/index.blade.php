@extends('site.layouts.master')
@section('title')
    Blog
@endsection
@section('content')
    <!-- Page Head
                    ==========================================-->
    <section class="page-heading" style="background-color : {{ $colors[15]->color }} !important;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>{{ app()->getLocale() == 'en' ? 'Blog' : 'الأخبار' }}</h1>
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
                    @if (sizeof($articles) > 0)
                        @foreach ($articles as $article)
                            <div class="col-lg-4 col-md-6">
                                <div class="blog_item shadow">
                                    <div class="cover">
                                        <img src="{{ asset('storage/uploads/blog/' . $article->outer_image) }}" />
                                        <a href="{{ route('site.article', ['slug' => $article->slug]) }}"
                                            class="fa fa-long-arrow-alt-right icon_link"></a>
                                    </div>
                                    <div class="cont">
                                        <h2><a
                                                href="{{ route('site.article', ['slug' => $article->slug]) }}">{{ $article->translated()->title }}</a>
                                        </h2>
                                        <p>
                                            {!! strip_tags(\Str::limit($article->translated()->description, 150)) !!}
                                        </p>
                                    </div>
                                    <ul>
                                        <li><i class="fa fa-calendar-alt"></i> {{ $article->created_at->format('d-m-Y') }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert-danger alert text-center">
                            {{ app()->getLocale() == 'en' ? 'No articles added yet' : 'لم يتم إضافة مقالات حتي الآن' }}
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>

@endsection
