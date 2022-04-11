<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
        </div>
        @if (Auth::check() && Auth::user()->role->id == 1)
            <ul class="nav navbar-nav">
                <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin-dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Users</li><!-- /.menu-title -->
                {{-- <li class="menu-item-has-children dropdown {{ request()->is('admin/pages*') ? 'show active' : '' }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ request()->is('admin/pages*') ? 'true' : 'false' }} "> <i class="menu-icon ti-layout-grid2"></i>Pages</a>
            <ul class="sub-menu children dropdown-menu {{ request()->is('admin/pages*') ? 'show' : '' }}">
                <li><i class="ti-home"></i><a href="#">Home</a></li>
                <li class="{{ request()->is('admin/pages') ? 'active' : '' }}">
                    <i class="ti-book"></i>
                    <a href="{{route('admin-pages')}}">Pages</a>
                </li>
                <li><i class="fa fa-puzzle-piece"></i><a href="#">Application</a></li>
                <li><i class="fa fa-puzzle-piece"></i><a href="#">Job Seekers</a></li>
                <li><i class="ti-comments-smiley"></i><a href="#">Contact</a></li>

            </ul>
            </li> --}}

                <li class="menu-item-has-children dropdown {{ request()->is('admin/users*') ? 'show active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="{{ request()->is('admin/users*') ? 'true' : 'false' }} "> <i
                            class="menu-icon ti-user"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu {{ request()->is('admin/users*') ? 'show' : '' }}">

                        <li class="{{ request()->is('admin/users/admin*') ? 'active' : '' }}">
                            <i class="ti-user"></i>
                            <a href="{{ route('admin-list') }}">Admin</a>
                        </li>
                        {{-- -
                            <li class="{{ request()->is('admin/employer*') ? 'active' : '' }}">
                    <i class="ti-user"></i>
                    <a href="{{route('admin-employer')}}">Employer</a>
            </li> --}}
                        <li class="{{ request()->is('admin/users/general*') ? 'active' : '' }}">
                            <i class="ti-user"></i>
                            <a href="{{ route('admin-general-user') }}">Candidate</a>
                        </li>
                        {{-- <li class="{{ request()->is('admin/users/new*') ? 'active' : '' }}">
            <i class="ti-user"></i>
            <a href="{{route('admin-user-create')}}">Add New User</a>
            </li> --}}

                    </ul>
                </li>
                <!-- interview -->
                <li class="{{ request()->is('admin/candidate/interview') ? 'active' : '' }}">
                    <a href="{{ url('admin/candidate/interview') }}" title="Manage Role"> <i
                            class="menu-icon ti-user"></i>Interview</a>
                </li>
                <li
                    class="menu-item-has-children dropdown {{ request()->is('admin/employer', 'admin/employer/users') ? 'show active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="{{ request()->is('/admin/employer*') ? 'true' : 'false' }} "> <i
                            class="menu-icon ti-user"></i>Employer</a>
                    <ul
                        class="sub-menu children dropdown-menu {{ request()->is('admin/employer', 'admin/employer/users') ? 'show' : '' }}">
                        <li class="{{ request()->is('admin/employer') ? 'active' : '' }}">
                            <i class="ti-user"></i>
                            <a href="{{ route('admin-employer') }}">Employer</a>
                        </li>
                        <li class="{{ request()->is('admin/employer/users*') ? 'active' : '' }}">
                            <i class="ti-user"></i>
                            <a href="{{ route('admin-employer-users') }}">Employer Users</a>
                        </li>
                        {{-- <li class="{{ request()->is('admin/users/new*') ? 'active' : '' }}">
                <i class="ti-user"></i>
                <a href="{{route('admin-user-create')}}">Add New User</a>
        </li> --}}

                    </ul>
                </li>
                {{-- <li class="{{ request()->is('admin/banks') ? 'active' : '' }}">
        <a href="{{route('admin-banks')}}" title="Manage Role"> <i class="menu-icon ti-server"></i>Bank</a>
        </li> --}}
                <li class="{{ request()->is('admin/employer/assigned_candidate') ? 'active' : '' }}">
                    <a href="{{ url('admin/employer/assigned_candidate') }}" title="Manage Role"> <i
                            class="menu-icon ti-server"></i>Assign Candidate</a>
                </li>



                {{-- work category --}}
                <li class="menu-item-has-children dropdown {{ request()->is('admin/work*') ? 'show active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="{{ request()->is('admin/work*') ? 'true' : 'false' }} "> <i
                            class="menu-icon fa fa-wrench"></i>Jobs</a>
                    <ul
                        class="sub-menu children dropdown-menu {{ request()->is('admin/countries*') ? 'show' : '' }}">
                        <li class="{{ request()->is('admin/work') ? 'active' : '' }}">
                            <i class="fa fa-flag-o"></i>
                            <a href="{{ route('admin-work') }}">Jobs</a>
                        </li>
                        <li class="{{ request()->is('admin/work-category') ? 'active' : '' }}">
                            <i class="fa fa-flag-o"></i>
                            <a href="{{ route('admin-work-categories') }}">Job Category</a>
                        </li>
                        <li class="{{ request()->is('admin/job-applicant') ? 'active' : '' }}">
                            <i class="fa fa-flag-o"></i>
                            <a href="{{ route('job-applicant.index') }}">Job Applicant</a>
                        </li>
                    </ul>
                </li>
                {{-- work category end --}}
                <li class="{{ request()->is('admin/roles') ? 'active' : '' }}">
                    <a href="{{ route('admin-role') }}" title="Manage Role"> <i
                            class="menu-icon ti-announcement"></i>Manage Role </a>
                </li>

                <li
                    class="menu-item-has-children dropdown {{ request()->is('admin/categories*', 'admin/topic*', 'admin/quiz*') ? 'show' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"> <i class="menu-icon ti-layout-grid2"></i>Quiz</a>
                    <ul
                        class="sub-menu children dropdown-menu {{ request()->is('admin/categories*', 'admin/topic*', 'admin/quiz*') ? 'show active' : '' }}">
                        <li class="{{ request()->is('admin/quiz*') ? 'active' : '' }}">
                            <i class="ti-home"></i><a href="{{ route('admin-quiz') }}">Quiz List</a>
                        </li>
                        <li class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
                            <i class="ti-book"></i>
                            <a href="{{ route('admin-category') }}">Categories</a>
                        </li>
                        <li class="{{ request()->is('admin/topic*') ? 'active' : '' }}">
                            <i class="ti-book"></i>
                            <a href="{{ route('admin-topic') }}">Topics</a>
                        </li>

                    </ul>
                </li>

                <li class="menu-title">General</li><!-- /.menu-title -->
                {{-- <li class="menu-item-has-children dropdown {{ request()->is('admin/pages*') ? 'show active' : '' }}">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ request()->is('admin/pages*') ? 'true' : 'false' }} "> <i class="menu-icon ti-layout-grid2"></i>Pages</a>
        <ul class="sub-menu children dropdown-menu {{ request()->is('admin/pages*') ? 'show' : '' }}">
            <li><i class="ti-home"></i><a href="#">Home</a></li>
            <li class="{{ request()->is('admin/pages') ? 'active' : '' }}">
                <i class="ti-book"></i>
                <a href="{{route('admin-pages')}}">Pages</a>
            </li>
            <li><i class="fa fa-puzzle-piece"></i><a href="#">Application</a></li>
            <li><i class="fa fa-puzzle-piece"></i><a href="#">Job Seekers</a></li>
            <li><i class="ti-comments-smiley"></i><a href="#">Contact</a></li>

        </ul>
        </li> --}}
                {{-- <li class="">
                        <a href="#" title="General Settings"> <i class="menu-icon ti-settings"></i>General Settings</a>
                    </li> --}}

                <li class="{{ request()->is('admin/pages*') ? 'active' : '' }}">
                    <a href="{{ route('admin-pages') }}" title="Manage Pages"> <i
                            class="menu-icon ti-view-grid"></i>Pages</a>
                </li>
                <li class="{{ request()->is('admin/socials*') ? 'active' : '' }}">
                    <a href="{{ route('admin-socials') }}" title="Manage Social"> <i
                            class="menu-icon ti-view-grid"></i>Manage Social</a>
                </li>
                <li class="{{ request()->is('admin/widgets*') ? 'active' : '' }}">
                    <a href="{{ route('admin-widget') }}" title="Manage Widget"> <i
                            class="menu-icon ti-view-grid"></i>Manage Widget</a>
                </li>
                <li class="{{ request()->is('admin/messages*') ? 'active' : '' }}">
                    <a href="{{ route('admin-message') }}"> <i class="menu-icon ti-email"></i>Message Box</a>
                </li>
                <li class="{{ request()->is('admin/slider*') ? 'active' : '' }}">
                    <a href="{{ route('admin-slider') }}"> <i class="menu-icon ti-layout-slider"></i>Header
                        Slider</a>
                </li>
                <li class="{{ request()->is('admin/services*') ? 'active' : '' }}">
                    <a href="{{ route('admin-service') }}"> <i class="menu-icon ti-layout-slider"></i>Services</a>
                </li>
                <li
                    class="menu-item-has-children dropdown {{ request()->is('admin/countries*') ? 'show active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="{{ request()->is('admin/countries*') ? 'true' : 'false' }} "> <i
                            class="menu-icon fa fa-wrench"></i>Settings</a>
                    <ul
                        class="sub-menu children dropdown-menu {{ request()->is('admin/countries*') ? 'show' : '' }}">
                        <li class="{{ request()->is('admin/countries') ? 'active' : '' }}">
                            <i class="fa fa-flag-o"></i>
                            <a href="{{ route('admin-countries') }}">Countries</a>
                        </li>

                    </ul>
                </li>


            </ul>
        @elseif(Auth::check() && Auth::user()->role->id == 2)
            <ul class="nav navbar-nav">
                {{-- <li class="{{ request()->is('user/dashboard') ? 'active' : '' }}" >
            <a href="{{route('user-dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li> --}}
                <li class="{{ request()->is('user/profile*') ? 'active' : '' }}">
                    <a href="{{ route('user-profile') }}" title="Manage Role"> <i
                            class="menu-icon ti-light-bulb"></i>Profile </a>
                </li>

                <li class="{{ request()->is('user/quizzes*') ? 'active' : '' }}">
                    <a href="{{ route('user-quiz-index') }}" title="Quiz List"> <i
                            class="menu-icon ti-layout-grid2"></i>Take Quiz </a>
                </li>
                <li class="{{ request()->is('user/certificate*') ? 'active' : '' }}">
                    <a href="{{ route('user-certificate') }}" title="Certificate"> <i
                            class="menu-icon ti-briefcase"></i> My Certificate</a>
                </li>
                {{-- <li class="{{ request()->is('user/register-form*') ? 'active' : '' }}">
            <a href="{{route('user-register-form')}}" title="Manage Role"> <i class="menu-icon ti-light-bulb"></i>Register </a>
            </li>
            <li class="{{ request()->is('user/bank*') ? 'active' : '' }}">
                <a href="{{route('user-bank')}}" title="Manage Role"> <i class="menu-icon ti-hand-point-right"></i>Bank Details</a>
            </li>
            <li class="{{ request()->is('user/my-work-history*') ? 'active' : '' }}">
                <a href="{{route('my-work-history')}}" title="my-work-history"> <i class="menu-icon ti-hand-point-right"></i>My Work History</a>
            </li>
            <li class="{{ request()->is('user/my-documents*') ? 'active' : '' }}">
                <a href="{{route('my-documents')}}" title="my-work-history"> <i class="menu-icon ti-hand-point-right"></i>My Documents</a>
            </li>
            <li class="{{ request()->is('user/available-to-work*') ? 'active' : '' }}">
                <a href="{{route('my-available-to-work')}}" title="my-available-to-work"> <i class="menu-icon ti-hand-point-right"></i>Availablity To Work</a>
            </li>
            <li class="">
                <a href="{{route('user-wish-to-work') ? 'active' : ''}}" title="user-wish-to-work"> <i class="menu-icon ti-hand-point-right"></i>Wish to Work</a>
            </li>
            <li class="{{request()->is('user/self-managed-super-fund/*') ? 'active' : ''}}">
                <a href="{{route('user-self-managed-fund')}}" title="self-managed-super-fund"> <i class="menu-icon ti-hand-point-right"></i>Self Managed Super F</a>
            </li> --}}
                <li class="{{ request()->is('user/password*') ? 'active' : '' }}">
                    <a href="{{ route('user-password-change') }}" title="Manage Role"> <i
                            class="menu-icon ti-pencil-alt"></i>Change Password</a>
                </li>
                <li class="">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="menu-icon fa fa-power-off"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


            </ul>

        @elseif(Auth::check() && Auth::user()->role->id == 3)
            <ul class="nav navbar-nav">
                <li class="{{ request()->is('employer/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('employer-dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="{{ request()->is('employer/profile') ? 'active' : '' }}">
                    <a href="{{ route('employer-profile') }}"><i class="menu-icon ti-palette"></i>Company Profile</a>
                </li>
                <li class="{{ request()->is('employer/user/profile') ? 'active' : '' }}">
                    <a href="{{ route('employer-user-profile') }}"><i class="menu-icon ti-palette"></i>My Profile</a>
                </li>
                {{-- <li class="{{ request()->is('employer/users') ? 'active' : '' }}" >
            <a href="{{route('employer-users')}}"><i class="menu-icon ti-user"></i>Company Users</a>
            </li> --}}
                <li class="{{ request()->is('employer/assigned-candidate*') ? 'active' : '' }}">
                    <a href="{{ route('employer-assigned-candidate') }}"><i class="menu-icon ti-user"></i>Assigned
                        Candidate </a>
                </li>
                <li class="">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="menu-icon fa fa-power-off"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

        @endif


        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
