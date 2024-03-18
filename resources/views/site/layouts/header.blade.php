<!-- Top Header
        ==========================================-->
<div class="top-header @if (Request::route()->getName() == 'site.index') {{ 'main-header' }} @endif">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-5">
                <ul class="top-contact-info">
                    <li>

                        <a href="mailto:{{ $settings->email }}">
                            <i class="fa fa-envelope"></i>
                            {{ $settings->email }}
                        </a>
                    </li>
                    <li class="whats-web">
                        <a href="https://web.whatsapp.com/send?phone={{ $settings->whatsapp }}/" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                            {{ $settings->whatsapp }}
                        </a>
                    </li>
                    <li class="whats-mob">
                        <a href="https://wa.me/{{ $settings->whatsapp }}" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </li>
                    <li>
                        <a href="tel:{{ $settings->phone }}">
                            <i class="fa fa-phone"></i>
                            {{ $settings->phone }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-xs-7">
                <ul class="social-links">
                    @foreach ($links as $link)
                        <li>
                            <a href="{{ $link->link }}" target="_blank">
                                <i class="{{ $link->icon }}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@if (Request::route()->getName() == 'site.index')
    <header class="main-header header">
    @else
        <header class="header">
@endif
<div class="container">
    <a href="{{ route('site.index') }}" class="logo">
        <img src="{{ asset('public/site/images/logo.png') }}">
    </a>
    <button class="icon-btn btn-responsive-nav" data-toggle="collapse" data-target=".nav-main-collapse">
        <i class="fa fa-bars"></i>
    </button>
</div>
<!--End Logo-->
<div class="navbar-collapse nav-main-collapse collapse">
    <div class="container">
        <nav class="nav-main">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('site.index') }}">{{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسيه' }}</a>
                </li>
                <li class="{{ Request::route()->getName() == 'site.about' ? 'active' : '' }}"><a
                        href="{{ route('site.about') }}">{{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }}</a>
                </li>
                <li
                    class="{{ Request::route()->getName() == 'site.blog' || Request::route()->getName() == 'site.article' ? 'active' : '' }}">
                    <a href="{{ route('site.blog') }}">{{ app()->getLocale() == 'en' ? 'Blog' : 'المدونة' }}</a>
                </li>
                <li
                    class="dropdown {{ Request::route()->getName() == 'site.services' || Request::route()->getName() == 'site.services.single' ? 'active' : '' }}">
                    <a href="#" class="extra" data-toggle="dropdown">
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <a href="{{ route('site.services') }}">

                        {{ app()->getLocale() == 'en' ? 'Services' : 'الخدمات' }}
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach (\App\Models\Service::orderBy('order', 'ASC')->get() as $service)
                            <li>
                                <a href="{{ route('site.services.single', ['slug' => $service->slug]) }}">
                                    <img
                                        src="{{ asset('storage/uploads/services/' . $service->image) }}">{{ $service->translated()->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="{{ Request::route()->getName() == 'site.team' ? 'active' : '' }}"><a
                        href="{{ route('site.team') }}">{{ app()->getLocale() == 'en' ? 'Team' : 'فريق العمل' }}</a>
                </li>
                <li class="{{ Request::route()->getName() == 'site.gallery' ? 'active' : '' }}"><a
                        href="{{ route('site.gallery') }}">{{ app()->getLocale() == 'en' ? 'Media' : 'الميديا' }}</a>
                </li>
                <li class="{{ Request::route()->getName() == 'site.cards' ? 'active' : '' }}"><a
                        href="{{ route('site.cards') }}">{{ app()->getLocale() == 'en' ? 'Download' : 'التنزيلات' }}</a>
                </li>
                <li class="{{ Request::route()->getName() == 'site.franchising' ? 'active' : '' }}"><a
                        href="{{ route('site.franchising') }}">{{ app()->getLocale() == 'en' ? 'franchising' : 'حق الامتياز' }}</a>
                </li>
                <li class="{{ Request::route()->getName() == 'site.contact' ? 'active' : '' }}"><a
                        href="{{ route('site.contact') }}">{{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }}</a>
                </li>
                <li class="lang">
                    @if (app()->getLocale() == 'en')
                        <a href="{{ route('lang') }}" class="langSwitch " data-lang="ar" title="Arabic">
                            <!--<i class="fas fa-language"></i>-->
                            العربية
                        </a>
                    @else
                        <a href="{{ route('lang') }}" class="langSwitch " data-lang="en" title="English">
                            <!--<i class="fas fa-language"></i>-->
                            English
                        </a>
                    @endif
                </li>
            </ul>
            <!--End .nav navbar-nav -->
        </nav>
    </div>
    <!--End Container-->
</div>
<!--End navbar-collapse-->
</header>
<!--End Header-->
