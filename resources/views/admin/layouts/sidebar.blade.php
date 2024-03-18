<!-- Side Menu
        ==========================================-->
<aside class="side-menu">
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <img src="{{ asset('public/admin-assets/images/logo.png') }}">
    </a>
    <ul>
        <li class="@if (request()->route()->getName() == 'admin.dashboard') {{ 'active' }} @endif">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa fa-home"></i>
                Dashboard
            </a>
        </li>

        <li class="@if (request()->route()->getName() == 'admin.settings') {{ 'active' }} @endif">
            <a href="{{ route('admin.settings') }}">
                <i class="fas fa-cog"></i>
                Site settings
            </a>
        </li>
        <li class="sub-menu @if (request()->route()->getName() == 'admin.articles' ||
            request()->route()->getName() == 'admin.testimonials' ||
            request()->route()->getName() == 'admin.clients') {{ 'active' }} @endif">
            <a rel="noreferrer" href="javascript:void(0);">
                <i class="fa fa-home"></i>
                Home page
                <i class="fa fa-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.articles') }}">
                        - Events
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.testimonials') }}">
                        - Testimonials
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.clients') }}">
                        - Our vendors
                    </a>
                </li>
            </ul>
        </li>
        <li class="@if (request()->route()->getName() == 'admin.about') {{ 'active' }} @endif">
            <a href="{{ route('admin.about') }}">
                <i class="fa fa-info"></i>
                About
            </a>
        </li>
        <li class="@if (request()->route()->getName() == 'admin.services' ||
            request()->route()->getName() == 'admin.services.info') {{ 'active' }} @endif">
            <a href="{{ route('admin.services') }}">
                <i class="fa fa-list"></i>
                Services
            </a>
        </li>
        {{-- <li class="@if (request()->route()->getName() == 'admin.videos'){{'active'}}@endif">
            <a href="{{route('admin.videos')}}">
                <i class="fa fa-video"></i>
                Videos
            </a>
        </li> --}}

        <li class="@if (request()->route()->getName() == 'admin.downloads') {{ 'active' }} @endif">
            <a href="{{ route('admin.downloads') }}">
                <i class="fa fa-download"></i>
                Downloads
            </a>
        </li>

        <li class="sub-menu @if (request()->route()->getName() == 'admin.team' ||
            request()->route()->getName() == 'admin.join') {{ 'active' }} @endif">
            <a rel="noreferrer" href="javascript:void(0);">
                <i class="fa fa-user"></i>
                Team
                <i class="fa fa-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.team') }}">
                        - Team members
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.join') }}">
                        - Requests
                    </a>
                </li>
            </ul>
        </li>
        <li class="@if (request()->route()->getName() == 'admin.blog') {{ 'active' }} @endif">
            <a href="{{ route('admin.blog') }}">
                <i class="fa fa-newspaper"></i>
                Blog
            </a>
        </li>
        <li class="sub-menu @if (request()->route()->getName() == 'admin.categories' ||
            request()->route()->getName() == 'admin.packages' ||
            request()->route()->getName() == 'admin.package_request') {{ 'active' }} @endif">
            <a rel="noreferrer" href="javascript:void(0);">
                <i class="fa fa-home"></i>
                Packages
                <i class="fa fa-angle-down"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.packages') }}">
                        - Packages
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories') }}">
                        - Categories
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.package_request') }}">
                        - Requests
                    </a>
                </li>
            </ul>
        </li>
        <li class="@if (request()->route()->getName() == 'admin.links') {{ 'active' }} @endif">
            <a href="{{ route('admin.links') }}">
                <i class="fa fa-link"></i>
                Social links
            </a>
        </li>

        <li class="@if (request()->route()->getName() == 'admin.pages') {{ 'active' }} @endif">
            <a href="{{ route('admin.pages') }}">
                <i class="fa fa-file"></i>
                Other pages
            </a>
        </li>

        <li class="@if (request()->route()->getName() == 'admin.banners') {{ 'active' }} @endif">
            <a href="{{ route('admin.banners') }}">
                <i class="fas fa-palette"></i>
                Banners color
            </a>
        </li>
        <li class="@if (request()->route()->getName() == 'admin.pages.messages') {{ 'active' }} @endif">
            <a href="{{ route('admin.pages.messages') }}">
                <i class="fas fa-envelope"></i>
                Other forms
            </a>
        </li>

    </ul>
    <!--End Ul-->
</aside>
<!--End side-menu-->
