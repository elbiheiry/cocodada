<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="newsletter-form">
                <div class="col-md-6 col-sm-12">
                    <div class="head-title">
                        {{ app()->getLocale() == 'en' ? $settings->title : $settings->title_ar }}
                    </div>
                    <div class="info-text">
                        {{ app()->getLocale() == 'en' ? $settings->description : $settings->description_ar }}
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <form class="ajax-form" method="post" action="{{ route('site.subscribe') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="email" placeholder="Email Address" name="email" class="form-control">
                            <button type="submit"
                                class="custom-btn">{{ app()->getLocale() == 'en' ? 'subscribe' : 'اشترك الان' }}</button>
                        </div>
                        <ul class="dot-lists">
                            <li>{{ app()->getLocale() == 'en' ? 'We don\'t spam' : 'نحن لا ننشر رسائل غير مرغوب فيها' }}
                            </li>
                            <li>{{ app()->getLocale() == 'en' ? 'Free cancellation' : 'إلغاء مجاني' }}</li>
                            <li>{{ app()->getLocale() == 'en' ? 'Latest news' : 'اخر الاخبار' }}</li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-4 col-sm-12 widget">
                <div class="widget-title">
                    {{ app()->getLocale() == 'en' ? 'Contact Informations' : 'معلومات التواصل' }}
                </div>
                <!--End Widget-title-->
                <div class="widget-content">
                    <ul class="contact-info">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            {{ app()->getLocale() == 'en' ? $settings->address : $settings->address_ar }}
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            {{ $settings->phone }}
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            {{ $settings->email }}
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 widget">
                <div class="widget-title">
                    {{ app()->getLocale() == 'en' ? 'our services' : 'خدماتنا' }}
                </div>
                <!--End Widget-title-->
                <div class="widget-content">
                    <ul>
                        @foreach (\App\Models\Service::get() as $service)
                            <li class="col-md-6 col-sm-6"><a
                                    href="{{ route('site.services.single', ['slug' => $service->slug]) }}">{{ $service->translated()->name }}</a>
                            </li>
                        @endforeach
                        <li class="col-md-6 col-sm-6">
                            <a href="{{ route('site.retailtainment') }}">{{ app()->getLocale() == 'en' ? 'Retailtainment ' : 'اعياد الميلاد' }}
                            </a>
                        </li>
                        <li class="col-md-6 col-sm-6">
                            <a href="{{ route('site.gamification') }}">{{ app()->getLocale() == 'en' ? 'Gamification' : 'الجولات' }}
                            </a>
                        </li>
                    </ul>
                </div>
                <!--End Widget-content-->
            </div>
            <div class="col-md-4 col-sm-6 widget">
                <div class="widget-title">
                    {{ app()->getLocale() == 'en' ? 'Quick links' : 'لينكات سريعه' }}
                </div>
                <!--End Widget-title-->
                <div class="widget-content">
                    <ul>
                        <li class="col-md-6 col-sm-6">
                            <a
                                href="{{ route('site.index') }}">{{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسيه' }}</a>
                        </li>
                        <li class="col-md-6 col-sm-6">
                            <a
                                href="{{ route('site.about') }}">{{ app()->getLocale() == 'en' ? 'our story' : 'من نحن' }}</a>
                        </li>
                        <li class="col-md-6 col-sm-6">
                            <a
                                href="{{ route('site.blog') }}">{{ app()->getLocale() == 'en' ? 'Blog' : 'المدونة' }}</a>
                        </li>
                        <li class="col-md-6 col-sm-6">
                            <a
                                href="{{ route('site.services') }}">{{ app()->getLocale() == 'en' ? 'Services' : 'الخدمات' }}</a>
                        </li>
                        <li class="col-md-6 col-sm-6">
                            <a
                                href="{{ route('site.team') }}">{{ app()->getLocale() == 'en' ? 'Team' : 'فريق العمل' }}</a>
                        </li>
                        <li class="col-md-6 col-sm-6">
                            <a
                                href="{{ route('site.gallery') }}">{{ app()->getLocale() == 'en' ? 'Media' : 'معرض الصور' }}</a>
                        </li>
                        <li class="col-md-6 col-sm-6">
                            <a
                                href="{{ route('site.cards') }}">{{ app()->getLocale() == 'en' ? 'Downloads' : 'كروت الدعوات' }}</a>
                        </li>
                        <li class="col-md-6 col-sm-6">
                            <a
                                href="{{ route('site.franchising') }}">{{ app()->getLocale() == 'en' ? 'franchising' : 'حق الامتياز' }}</a>
                        </li>
                        <li class="col-md-6 col-sm-6">
                            <a
                                href="{{ route('site.contact') }}">{{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }}</a>
                        </li>
                    </ul>
                </div>
                <!--End Widget-content-->
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 copyrights">
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
                    <li>
                        <img src="{{ asset('public/site/images/ssl.png') }}" class="trust">
                    </li>
                    <li>
                        <img src="{{ asset('public/site/images/ariba.jpg') }}" class="trust">
                    </li>
                </ul>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 copyrights">
                <p>
                    {{ app()->getLocale() == 'en' ? '© Copyright 2019 cocodada.com' : '© جميع الحقوق محفوظه 2019 @ CoCoDaDa' }}
                    <a href="{{ route('site.privacy') }}">Privacy Policy </a>
                </p>

            </div>
        </div>
    </div>
</footer>
