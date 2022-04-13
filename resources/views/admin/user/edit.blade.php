@extends('layouts.master')
@push('title')
    User Profile
@endpush
@push('head')
    <style type="text/css">
        {
            /*.picker__holder{min-width:0 !important;}*/
        }

        .picker__box {
            padding: 0 5px 0 5px;
        }

        .picker__header {
            padding-top: 3px;
            padding-bottom: 3px;
        }

        .picker__table {
            margin: 0 !important;
        }

        .picker__weekday {
            padding-top: 2px !important;
        }

        .card .nav-tabs a {
            border-radius: 0;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            padding: 9px 13px;
            text-transform: uppercase;
            background: #99abb4;
            border-right: 1px solid #6a6b6d;
        }

    </style>
@endpush
@section('content')
    <div class="animated fadeIn">
        @if ($user->role_id == 2)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="profile">
                            <div class="row  mx-auto">
                                <div class="col-md-3 mt-3 mb-3">
                                    <div class="profile-image-box">
                                        <div class="d-inline-block mb-3" style="position:relative;">
                                            @if (@$user->image)
                                                <img class="img-responsive"
                                                    src="{{ asset('images/users') }}/{{ $user->image }}"
                                                    alt="Profile Image" height="136">
                                            @else
                                                <img class="img-responsive"
                                                    src="{{ asset('images/users/default-user1.png') }}"
                                                    alt="Profile Image" height="136">
                                            @endif
                                        </div>
                                    </div>
                                    @include('admin.interview.create')
                                </div>
                                <div class="col-md-9 mt-3 mb-3">
                                    <div class="">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">Name</dt>
                                            <dd class="col-sm-8">:&nbsp; {{ @$user->info->first_name }}
                                                {{ @$user->info->mid_name }}
                                                {{ @$user->info->last_name }}</dd>
                                        </dl>
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">Phone</dt>
                                            <dd class="col-sm-8">
                                                :&nbsp; {{ @$user->info->phone }}
                                            </dd>
                                        </dl>
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4 text-truncate">Email Address</dt>
                                            <dd class="col-sm-8">
                                                :&nbsp; {{ @$user->email }}
                                            </dd>
                                        </dl>
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4 text-truncate">Date of birth</dt>
                                            <dd class="col-sm-8">
                                                :&nbsp;
                                                {{ $user->info->dob ? date('F m Y', strtotime($user->info->dob)) : 'N/A' }}
                                            </dd>
                                        </dl>
                                        <dl class="row mb-2">
                                            <dt class="col-sm-4 text-truncate">Address</dt>
                                            <dd class="col-sm-8">
                                                :&nbsp;
                                                @if (@$user->info->address)
                                                    {{ @$user->info->address }}
                                                @else
                                                    <span class="text-warning ml-2"><i class="fa fa-warning"></i></span>
                                                @endif
                                            </dd>
                                        </dl>
                                        <dl class="row mb-2">
                                            <dt class="col-sm-4 text-truncate">Candidate Status </dt>
                                            <dd class="col-sm-8">
                                                <form action="{{ url('admin/user/status/') }}/{{ $user->id }}"
                                                    method="post" class="status">
                                                    @csrf
                                                    <label class="switch switch-green status">
                                                        <input type="checkbox" class="switch-input"
                                                            {{ $user->status == 1 ? 'checked' : '' }} value="1"
                                                            name="status">
                                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </form>
                                            </dd>
                                        </dl>
                                        <dl class="row mb-2">
                                            <dt class="col-sm-4 text-truncate">Profile Complete</dt>
                                            <dd class="col-sm-8">
                                                @php
                                                    //info
                                                    if (!empty(@$user->info)) {
                                                        $point = 12.5;
                                                    } else {
                                                        $point = 0;
                                                    }
                                                    //bank info
                                                    if (!empty(@$user->bank)) {
                                                        $point = $point + 12.5;
                                                    } else {
                                                        $point = $point + 0;
                                                    }
                                                    //work_history
                                                    if (!empty(@$user->work_history)) {
                                                        $point = $point + 12.5;
                                                    } else {
                                                        $point = $point + 0;
                                                    }
                                                    //documents
                                                    if (!empty(@$user->documents)) {
                                                        $point = $point + 12.5;
                                                    } else {
                                                        $point = $point + 0;
                                                    }
                                                    //work_abilities
                                                    if (!empty(@$user->work_abilities)) {
                                                        $point = $point + 12.5;
                                                    } else {
                                                        $point = $point + 0;
                                                    }
                                                    //wish_to_works
                                                    if (!empty(@$user->wish_to_works)) {
                                                        $point = $point + 12.5;
                                                    } else {
                                                        $point = $point + 0;
                                                    }
                                                    
                                                    //self_fund
                                                    if (!empty(@$user->self_fund)) {
                                                        $point = $point + 12.5;
                                                    } else {
                                                        $point = $point + 0;
                                                    }
                                                    //certificates
                                                    if (!empty(@$user->certificates)) {
                                                        $point = $point + 12.5;
                                                    } else {
                                                        $point = $point + 0;
                                                    }
                                                    echo ': <strong> ' . $point . '%</strong>';
                                                @endphp
                                            </dd>
                                        </dl>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header ">
	                            <strong class="card-title float-left">{{$user->name}}</strong>

            </div> --}}

                        <div class="card-body">
                            <div class="custom-tab">

                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active show" id="custom-nav-home-tab" data-toggle="tab"
                                            href="#custom-nav-home" role="tab" aria-controls="custom-nav-home"
                                            aria-selected="false">Basic Info</a>
                                        <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab"
                                            href="#custom-nav-work" role="tab" aria-controls="custom-nav-profile"
                                            aria-selected="false">Work History</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#custom-nav-documents" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="true">Documents</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#availablity" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="true">Availablity To Work</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#wish-to-work" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="true">Wish to Work</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#smsf" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="true">SMSF</a>

                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#bank_info" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="true">Bank Info</a>
                                        <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab"
                                            href="#certificate" role="tab" aria-controls="custom-nav-contact"
                                            aria-selected="true">Certificates</a>
                                    </div>
                                </nav>
                                <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                    <div class="tab-pane fade active show" id="custom-nav-home" role="tabpanel"
                                        aria-labelledby="custom-nav-home-tab">
                                        <br />
                                        @include('admin.user.profile.basic_info')
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-work" role="tabpanel"
                                        aria-labelledby="custom-nav-profile-tab">
                                        <br />
                                        @include('admin.user.profile.work-history')
                                    </div>
                                    <div class="tab-pane fade" id="custom-nav-documents" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <br />
                                        @include('admin.user.profile.documents')
                                    </div>
                                    {{-- availablity --}}
                                    <div class="tab-pane fade" id="availablity" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        <br />
                                        @include('admin.user.profile.work-ability')
                                    </div>
                                    {{-- Wish To Work --}}
                                    <div class="tab-pane fade" id="wish-to-work" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">
                                        @include('admin.user.profile.wish-to-work')
                                    </div>
                                    {{-- smsf --}}
                                    <div class="tab-pane fade" id="smsf" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">

                                        @include('admin.user.profile.smsf')
                                    </div>
                                    {{-- bank_info --}}
                                    <div class="tab-pane fade" id="bank_info" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">

                                        @include('admin.user.profile.bank-info')
                                    </div>
                                    {{-- certificate --}}
                                    <div class="tab-pane fade" id="certificate" role="tabpanel"
                                        aria-labelledby="custom-nav-contact-tab">

                                        @include('admin.user.profile.certificate')
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- admin & employer user profile --}}
        @elseif($user->role_id == 3 || $user->role_id == 1)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="profile">
                            <div class="row  mx-auto">
                                <div class="col-md-3 mt-3 mb-3">
                                    <div class="profile-image-box">
                                        <div class="d-inline-block mb-3" style="position:relative;">
                                            @if (@$user->image)
                                                <img class="img-responsive"
                                                    src="{{ asset('images/users') }}/{{ $user->image }}"
                                                    alt="Profile Image" height="136">
                                            @else
                                                <img class="img-responsive"
                                                    src="{{ asset('images/users/default-user1.png') }}"
                                                    alt="Profile Image" height="136">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 mt-3 mb-3">
                                    <div class="">
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">Name</dt>
                                            <dd class="col-sm-8">:&nbsp; {{ @$user->name }}
                                                {{ @$user->info->mid_name }}
                                                {{ @$user->info->last_name }}</dd>
                                        </dl>
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4">Phone</dt>
                                            <dd class="col-sm-8">
                                                :&nbsp; {{ @$user->info->phone }}
                                            </dd>
                                        </dl>
                                        <dl class="row mb-0">
                                            <dt class="col-sm-4 text-truncate">Email Address</dt>
                                            <dd class="col-sm-8">
                                                :&nbsp; {{ @$user->email }}
                                            </dd>
                                        </dl>
                                        <dl class="row mb-2">
                                            <dt class="col-sm-4 text-truncate">Address</dt>
                                            <dd class="col-sm-8">
                                                :&nbsp;
                                                @if (@$user->info->address)
                                                    {{ @$user->info->address }}
                                                @else
                                                    <span class="text-warning ml-2"><i class="fa fa-warning"></i></span>
                                                @endif
                                            </dd>
                                        </dl>
                                        <dl class="row mb-2">
                                            <dt class="col-sm-4 text-truncate">Profile Status </dt>
                                            <dd class="col-sm-8">
                                                <form action="{{ url('admin/user/status/') }}/{{ $user->id }}"
                                                    method="post" class="status">
                                                    @csrf
                                                    <label class="switch switch-green status">
                                                        <input type="checkbox" class="switch-input"
                                                            {{ $user->status == 1 ? 'checked' : '' }} value="1"
                                                            name="status">
                                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                                        <span class="switch-handle"></span>
                                                    </label>
                                                </form>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @include(
                                'admin.user.profile.employer_user_basic_info'
                            )
                        </div>

                    </div>
                </div>
            </div>
        @else
            <p>Admin Profile</p>
        @endif
    </div>
@endsection
{{-- SHOW PASSWORD FUNCTION --}}
@push('footer')
    <script src="{{ asset('/admin/assets') }}/js/datepicker/picker.js"></script>
    <script src="{{ asset('/admin/assets') }}/js/datepicker/picker.date.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('.start_date').pickadate({
                selectYears: 30,
                yearRange: '-30:+0',
                format: 'yyyy-mm-dd',
                //formatSubmit: 'y-mm-dd'
            });
            $('.end_date').pickadate({
                selectYears: 30,
                format: 'yyyy-mm-dd',
                //formatSubmit: 'y-mm-dd'
            });
        });
    </script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
    <script src="{{ asset('/admin/assets') }}/js/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('.delete_btn').on('click', function(e) {
                e.preventDefault();
                $form = $(this);
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this data!",
                    type: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-light',
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel!"
                });
                $('button.swal2-confirm').on('click', function() {
                    $form.submit();
                });
            });


        });
    </script>
    <script>
        jQuery(function($) {
            // status 
            $('.status').on('click', function() {
                $form = $(this);
                $form.submit();
            });
        });
    </script>
@endpush
