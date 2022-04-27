@extends('layouts.master')
@push('title')
    {{ @$heading }}
@endpush
@push('head')
    <style type="text/css">
        table {
            font-size: 12px;
        }

        td.large {
            min-width: 150px;
        }

        td.medium {
            min-width: 100px;
        }

        .assign_candidate {
            background: #e5eff7;
        }

    </style>
@endpush
@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('admin/users/general/search') }}" method="get">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <strong>Search Candidate</strong>

                                </div>
                                <div class="form-group col-md-1">
                                    <input type="number" name="idn" class="form-control" placeholder="IDN"
                                        value="{{ @$data_id }}">
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="text" name="name" class="form-control" placeholder="First Name"
                                        value="{{ @$data_name }}">
                                </div>
                                <!--<div class="form-group col-md-1">
                                                                                                            <select name="assigned" class="form-control">
                                                                                                                <option value="">All</option>
                                                                                                                <option value="1">Assigned</option>
                                                                                                                <option value="2">Not Assigned</option>
                                                                                                            </select>
                                                                                                        </div>-->
                                <div class="form-group col-md-2">
                                    <input type="text" name="email" class="form-control" placeholder="Email"
                                        value="{{ @$data_email }}">
                                </div>

                                <div class="form-group col-md-1">
                                    <input type="text" name="suburb" class="form-control" placeholder="Suburb"
                                        value="{{ @$data_suburb }}">
                                </div>
                                <div class="col-md-6"></div>
                                <div class="form-group col-md-2">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone"
                                        value="{{ @$data_phone }}">
                                </div>

                                <div class="col-md-2">
                                    <select name="visa" required="" class="form-control visa-type">
                                        <option value="0">Select Visa Type</option>
                                        <option value="1">Citizen</option>
                                        <option value="6">Student Visa</option>
                                        <option value="10">PR visa</option>
                                        <option value="11">Work Holiday Visa</option>
                                        <option value="12">Protection visa</option>
                                        <option value="13">TR (Post Study Work)</option>
                                        <option value="14">Temporary Resident Visa</option>
                                        <option value="16">Work Visa</option>
                                    </select>
                                    <span class="text-danger"> {{ $errors->first('visa') }}</span>
                                </div>

                                {{-- <div class="col-md-2">
                                    <select name="job" class="form-control">
                                        <option value="0">Applied Job</option>
                                        @foreach ($jobs as $job)
                                            <option value="{{ $job->id }}">{{ $job->title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger"> {{ $errors->first('user_type') }}</span>
                                </div> --}}

                                <div class="col-md-6"></div>
                                <div class="col-md-3">
                                    <a href="{{ url('admin/users/general/search') }}" class="btn btn-warning mr-2"><i
                                            class="ti-back-right mr-1"></i> Refresh</a>
                                    <button type="submit" class="btn btn-info"><i class="ti-search mr-1"></i>
                                        Search</button>
                                    <!-- <button type="submit" name="exportExcel" class="btn btn-info"><i class="ti-search mr-1"></i> ExportCsv</button> -->
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-1">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Candidate <div class="badge badge-info" title="Find Total">{{ $total_found }}
                                        </div>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <form action="{{ url('admin/candidate') }}" method="POST" class="pt-2">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" name="from" class="form-control start_date"
                                            placeholder="Start Date">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="to" class="form-control end_date" placeholder="End Date">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success btn-sm" name="exportExcel"><i
                                                class="ti-download mr-1"></i> DownloadCsv</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="{{ route('admin-dashboard') }}" title="Dashboard">Dashboard</a></li>
                                        <li><a href="">Candidate</a></li>
                                        <li class="active">{{ @$heading }}</li>
                                    </ol>
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
                    <div class="card-header float-left ">
                        <strong class="card-title" style="margin-right: 20px;">{{ @$heading }}</strong>
                        <a href="{{ route('admin-user-create') }}" title="Add New User"
                            class="btn btn-success btn-sm">Add
                            New</a>
                        {{-- <a href="{{url('admin/candidate')}}" name="exportExcel" title="Download" class="btn btn-success btn-sm">Download Csv</a> --}}

                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2">Work Location (Assign)</th>
                                    <th scope="col" rowspan="2">ID</th>
                                    <th scope="col" colspan="3">Applicant Name</th>
                                    <th scope="col" rowspan="2">Gender</th>
                                    <th scope="col" rowspan="2">Phone number</th>
                                    <th scope="col" rowspan="5">Date of birth</th>
                                    <th scope="col" rowspan="2">Email Address</th>
                                    <th scope="col" colspan="2">VISA/Citizenship</th>
                                    <th scope="col" colspan="3">Address</th>
                                    <th scope="col" colspan="2">Bank Details</th>

                                    <th scope="col" rowspan="2">Medical Check completed the:</th>
                                    <th rowspan="2">Police Check completed the:</th>
                                    <th rowspan="2">ABN</th>
                                    <th rowspan="2">(employee) TFN</th>
                                    <th colspan="6">Self Managed Super Fund (SMSF)</th>
                                    <th rowspan="2">Assigned Emp</th>
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <td>First Name</td>
                                    <td>Middle Name</td>
                                    <td>Last Name</td>
                                    {{-- Visa --}}
                                    <td>VISA Expire</td>
                                    <td>VISA Status</td>
                                    {{-- address --}}
                                    <td>Full Address</td>
                                    <td>Suburb/Town</td>
                                    <td>Poscode</td>
                                    {{-- bank details --}}
                                    <td>BSB</td>
                                    <td>Account Number</td>
                                    <td>Number</td>
                                    <td>ABN for SMSF</td>
                                    <td>ESA for SMSF</td>
                                    <td>USI code</td>
                                    <td>Memberhip Number</td>
                                    <td>Super FundAcc Name</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="@if (!empty($user->assignedTo->count() > 0)) assign_candidate @endif">
                                        <td>Au</td>
                                        <td>{{ $user->id }}</td>
                                        <td><a href="{{ route('admin-user-edit', $user->id) }}" target="_blank"
                                                class="text-success"> {{ @$user->info->first_name }}</a></td>
                                        <td>{{ @$user->info->mid_name }}</td>
                                        <td>{{ @$user->info->last_name }}</td>
                                        <td>
                                            @if (@$user->info->gender == 1)
                                                Male
                                            @elseif(@$user->info->gender == 2)
                                                Female
                                            @elseif(@$user->info->gender == 3)
                                                Other
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            <a href="tel:{{ @$user->info->call_code->calling_code }}{{ @$user->info->phone }}"
                                                class="text-dark">
                                                {{ @$user->info->call_code->calling_code }}-
                                                {{ @$user->info->phone }}
                                            </a>
                                        </td>
                                        <td colspan="1">
                                            {{ $user->info ? date('m.d.y', strtotime($user->info->dob)) : 'N/A' }}
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}" title="Send Mail" class="text-dark">
                                                {{ $user->email }}
                                            </a>
                                        </td>
                                        <td class="medium">
                                            @if (@$user->info->visa == 1 || @$user->info->visa == 2)
                                                -
                                            @else
                                                @if (@$user->info->visa_exp)
                                                    {{ date('d M Y', strtotime(@$user->info->visa_exp)) }}
                                                @endif

                                                @php
                                                    $visa_exp = @$user->info->visa_exp;
                                                    
                                                    if ($visa_exp) {
                                                        $today = Carbon\Carbon::today();
                                                        $today = date('Y-m-d', strtotime($today));
                                                    
                                                        $exp = date('Y-m-d', strtotime($user->info->visa_exp));
                                                        if ($today > $exp) {
                                                            echo "<div class='badge badge-danger'>Expired</div>";
                                                        }
                                                    }
                                                @endphp
                                            @endif
                                        </td>
                                        <td>
                                            {{-- visa type --}}
                                            @php
                                                if (@$user->info->visa != null) {
                                                    if (@$user->info->visa == 1) {
                                                        echo 'Citizen';
                                                    } elseif (@$user->info->visa == 2) {
                                                        echo 'Permanent Resident';
                                                    } elseif (@$user->info->visa == 3) {
                                                        echo 'Temporary resident';
                                                    } elseif (@$user->info->visa == 4) {
                                                        echo 'Dependent visa';
                                                    } elseif (@$user->info->visa == 5) {
                                                        echo 'Holiday visa';
                                                    } elseif (@$user->info->visa == 6) {
                                                        echo 'Student visa A';
                                                    } elseif (@$user->info->visa == 7) {
                                                        echo 'Student visa B';
                                                    } elseif (@$user->info->visa == 8) {
                                                        echo 'Student visa C';
                                                    } elseif (@$user->info->visa == 9) {
                                                        echo 'Student visa D';
                                                    }
                                                } else {
                                                    echo '-';
                                                }
                                                
                                            @endphp
                                            {{-- end visa type --}}

                                        </td>
                                        <td class="large">
                                            {{ @$user->info->address }}
                                        </td>
                                        <td>
                                            {{ @$user->info->town_city }}
                                        </td>
                                        <td>
                                            {{ @$user->info->postcode }}
                                        </td>
                                        {{-- bank info --}}
                                        <td>
                                            {{ @$user->bank_info['bsb'] }}
                                        </td>
                                        <td>
                                            {{ @$user->bank_info->ac_no }}
                                        </td>

                                        <td class="text-center">

                                            @if (@$user->info->medical_check_date)
                                                {{ date('d M Y', strtotime(@$user->info->medical_check_date)) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            @if (@$user->info->police_check_date)
                                                {{ date('d M Y', strtotime(@$user->info->police_check_date)) }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            {{ @$user->bank_info->abn }}
                                        </td>
                                        <td>
                                            {{ @$user->bank_info->tfn }}
                                        </td>
                                        {{-- self managed fund --}}
                                        <td>
                                            {{ @$user->self_fund->number }}
                                        </td>
                                        <td>
                                            {{ @$user->self_fund->abn }}
                                        </td>
                                        <td>
                                            {{ @$user->self_fund->esa }}
                                        </td>
                                        <td>
                                            {{ @$user->self_fund->usi_code }}
                                        </td>
                                        <td>
                                            {{ @$user->self_fund->membership_number }}
                                        </td>
                                        <td>
                                            {{ @$user->self_fund->acc_name }}
                                        </td>
                                        <td>
                                            @if (@$user->assignedTo->count() > 0)
                                                @foreach ($user->assignedTo as $assigned)
                                                    <div class="badge badge-success"
                                                        title="Aggigned to {{ @$assigned->employer_info->company_name }}">
                                                        {{ @$assigned->employer_info->company_name }}</div>
                                                @endforeach
                                            @else
                                                <div class="badge badge-warning">Not Assigned</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-list-ul"></i>
                                                </a>

                                                <div class="user-menu dropdown-menu">
                                                    {{-- <a class="nav-link" href="{{route('admin-user-show',$user->id)}}"><i class="ti-eye mr-1"></i>View</a> --}}
                                                    <a class="nav-link"
                                                        href="{{ route('admin-user-edit', $user->id) }}"
                                                        target="_blank"><i class="ti-eye mr-11"></i>View</a>
                                                    @if (Auth::user()->id == $user->id)
                                                    @else
                                                        {!! Form::model($users, ['method' => 'delete', 'route' => ['admin-user-delete', $user->id], 'class' => 'delete_btn']) !!}
                                                        {!! Form::hidden('id', $user->id) !!}

                                                        <a href="#" class="nav-link"><i class="ti-trash mr-1"></i>
                                                            Delete</a>
                                                        {!! Form::close() !!}
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->appends(['idn' => @$data_id,'name' => @$data_name,'email' => @$data_name,'suburb' => @$data_suburb,'phone' => @$data_phone,'visa' => @$data_visa,'job' => @$data_job]) }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
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
            // {{ url('admin/candidate') }}
            // $("#exportExcel").on('click', function(e){
            //     e.preventDefault();
            //     var formdata = {
            //         _token : $('meta[name="csrf-token"]').attr('content'),
            //         start_date : $('input[name="start_date"]').val(),
            //         end_date : $('input[name="end_date"]').val(),
            //     }
            //     $.ajax({
            //         url: "{{ url('admin/candidate') }}",
            //         type: "GET",
            //         data: formdata,
            //         xhrFields: {
            //             responseType: 'blob',
            //         },
            //         success: function(response, status, xhr){
            //         $filename = 'candidate.xlsx';
            //         var disposition = xhr.getResponseHeader('content-disposition');
            //         var matches = /"([^"]*)"/.exec(disposition);
            //         var filename = (matches != null && matches[1] ? matches[1] : $filename);

            //             // The actual download
            //             var blob = new Blob([response], {
            //             type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            //             });
            //             var link = document.createElement('a');
            //             link.href = window.URL.createObjectURL(blob);
            //             link.download = filename;

            //             document.body.appendChild(link);

            //             link.click();
            //             document.body.removeChild(link);

            //         }

            //     });


            // });
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
@endpush
