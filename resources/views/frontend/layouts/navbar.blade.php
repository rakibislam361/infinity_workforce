<header id="header" class="header-effect-shrink"
    data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-top-0">
        <div class="header-container container-fluid px-lg-4">
            <div class="header-row">
                <div class="header-column header-column-border-right flex-grow-0">
                    <div class="header-row pr-4">
                        <div class="header-logo">
                            <a href="{{ route('frontend-home') }}">
                                <img alt="Porto" width="150" height="" data-sticky-width="125" data-sticky-height="40"
                                    src="{{ asset('frontend') }}/img/logo-corporate-9.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-nav header-nav-links justify-content-center">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse header-mobile-border-top">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="">
                                            <a class="{{ request()->is('/') ? 'active' : '' }}"
                                                href="{{ route('frontend-home') }}">
                                                Home
                                            </a>
                                        </li>

                                        <li class="">
                                            <a class="{{ request()->is('/about') ? 'active' : '' }}"
                                                href="{{ route('frontend-about') }}">
                                                About Us
                                            </a>
                                        </li>
                                        {{-- @if (Auth::guest())
                                            <li class="{{ request()->is('/register-user') ? 'active' : '' }}">
                                                <a href="{{ route('frontend-register') }}">
                                                    Application
                                                </a>
                                            </li>
                                        @endif --}}

                                        <li class="{{ request()->is('/services') ? 'active' : '' }}">
                                            <a href="{{ route('frontend-service') }}">
                                                Services
                                            </a>
                                        </li>
                                        {{-- <li class="{{ request()->is('/job-listing') ? 'active' : '' }}">
                                                    <a href="{{route('frontend-joblist')}}">
                                                      Job Seekers                         
                                                    </a>
                                                </li> --}}
                                        <li class="{{ request()->is('/employer') ? 'active' : '' }}">
                                            <a href="{{ url('/employer') }}">
                                                Employers
                                            </a>
                                        </li>

                                        <li class="{{ request()->is('/career/index') ? 'active' : '' }}">
                                            <a href="{{ url('/career') }}">
                                                Career
                                            </a>
                                        </li>

                                        <li class="{{ request()->is('/contact-us') ? 'active' : '' }}">
                                            <a href="{{ route('frontend-contact') }}">
                                                Contact
                                            </a>
                                        </li>
                                        @auth
                                            <li class="">
                                                @if (Auth::user()->role_id == 1)
                                                    <a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                                @elseif(Auth::user()->role_id == 2)
                                                    <a href="{{ url('/user/dashboard') }}">Dashboard</a>
                                                @elseif(Auth::user()->role_id == 3)
                                                    <a href="{{ url('/employer/dashboard') }}">Dashboard</a>
                                                @endif
                                            </li>
                                            <li class="{{ request()->is('/login') ? 'active' : '' }}">

                                                <a class="nav-link" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                                                                     document.getElementById('logout-form').submit();">
                                                    <i class="menu-icon fa fa-power-off mr-1"></i>
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        @else
                                            <li class="{{ request()->is('/login') ? 'active' : '' }}">
                                                <a href="{{ route('login') }}">Login</a>
                                            </li>
                                        @endauth


                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-column header-column-border-left flex-grow-0 justify-content-center">
                    <div class="header-row pl-4 justify-content-end">
                        <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean m-0">
                            @foreach ($socials as $social)

                                <li class="social-icons-facebook">
                                    <a href="{{ @$social->link }}" title="{{ @$social->name }}" target="_blank">

                                        @if ($social->icon)
                                            <i class="{{ @$social->icon }}"></i>

                                        @else
                                            {{ @$social->name }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        {{-- <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul> --}}
                        <button class="btn header-btn-collapse-nav ml-0 ml-sm-3" data-toggle="collapse"
                            data-target=".header-nav-main nav">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
