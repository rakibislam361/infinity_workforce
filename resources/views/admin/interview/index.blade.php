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
                        <form action="{{ url('admin/candidate/interview') }}" method="get">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <strong>Search Candidate</strong>
                                </div>
                                <div class="form-group col-md-1">
                                    <input type="number" name="idn" class="form-control" placeholder="IDN">
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" name="name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>

                                <div class="form-group col-md-1">
                                    <input type="text" name="suburb" class="form-control" placeholder="Suburb">
                                </div>
                                <div class="col-md-6"></div>
                                <div class="form-group col-md-2">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone">
                                </div>

                                {{-- <div class="col-md-2">
                                    <select name="visa" required="" class="form-control visa-type">
                                        <option value="0">Select Visa Type</option>
                                        <optgroup label="New option">
                                            <option value="1">Citizen</option>
                                            <option value="6">Student Visa</option>
                                            <option value="10">PR visa</option>
                                            <option value="11">Work Holiday Visa</option>
                                            <option value="12">Protection visa</option>
                                            <option value="13">TR (Post Study Work)</option>
                                            <option value="14">Temporary Resident Visa</option>
                                            <option value="16">Work Visa</option>
                                        </optgroup>

                                        <optgroup label="Old option">
                                            <option value="0">Select Visa Type</option>
                                            <option value="1">Citizen</option>
                                            <option value="2">Permanent Resident</option>
                                            <option value="3">Temporary resident</option>
                                            <option value="4">Dependent visa</option>
                                            <option value="5">Holiday visa</option>
                                            <option value="6">Student visa A</option>
                                            <option value="7">Student visa B</option>
                                            <option value="8">Student visa C</option>
                                            <option value="9">Student visa D</option>
                                        </optgroup>
                                    </select> 
                                    <span class="text-danger"> {{ $errors->first('visa') }}</span>
                                </div> --}}

                                <div class="col-md-2">
                                    <select name="job" class="form-control">
                                        <option value="0">Applied Job</option>
                                        @foreach ($work as $val)
                                            <option value="{{ $val->id }}">{{ $val->title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger"> {{ $errors->first('user_type') }}</span>
                                </div>
                                
                                <div class="col-md-6"></div>
                                <div class="col-md-3">
                                    <a href="#" class="btn btn-warning mr-2"><i class="ti-back-right mr-1"></i> Refresh</a>
                                    <button type="submit" class="btn btn-info"><i class="ti-search mr-1"></i>
                                        Search</button>
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
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Candidate <div class="badge badge-info" title="Find Total">
                                            {{ $candidates->count() }}
                                        </div>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="{{ route('admin-dashboard') }}" title="Dashboard">Dashboard</a></li>
                                        <li><a href="">Candidate</a></li>
                                        <li class="active">Interview list</li>
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
                        <strong class="card-title" style="margin-right: 20px;">Interview list</strong>
                        <a href="{{ route('admin-user-create') }}" title="Add New User" class="btn btn-success btn-sm">Add
                            New</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Found Us</th>
                                    <th>Car</th>
                                    <th>Lives in</th>
                                    <th>ID</th>
                                    <th>LK</th>
                                    <th>M/F</th>
                                    <th>Phone no</th>
                                    <th>Arrived in Aus</th>
                                    <th>Speaks</th>
                                    <th>Computer Skills</th>
                                    <th>Communication</th>
                                    <th>Special Skills</th>
                                    <th>Current Work</th>
                                    <th>Qualification</th>
                                    <th>Expected rate</th>
                                    <th>Position interested</th>
                                    <th>Special Requirements</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($candidates as $interview)
                                <tbody>
                                    <tr>
                                        <td>{{ $interview->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $interview->info->first_name ?? 'N/A' }}</td>
                                        <td>{{ $interview->found_us ?? 'N/A' }}</td>
                                        <td>{{ $interview->car }}</td>
                                        <td>{{ $interview->lives_in }}</td>
                                        <td>{{ $interview->user->id ?? 'N/A' }}</td>
                                        <td>{{ $interview->lk }}</td>
                                        <td>{{ $interview->present }}</td>
                                        <td>{{ $interview->info->phone ?? 'N/A' }}</td>
                                        <td>{{ $interview->arrived_in_aus }}</td>

                                        <td>{{ $interview->speaks }}</td>
                                        <td>{{ $interview->computer_skill }}</td>
                                        <td>{{ $interview->communication }}</td>
                                        <td>{{ $interview->special_skills }}</td>
                                        <td>{{ $interview->current_work }}</td>
                                        <td>{{ $interview->qualification }}</td>
                                        <td>{{ $interview->expected_rate }}</td>
                                        <td>{{ $interview->position_interested }}</td>
                                        <td>{{ $interview->special_requirements }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-list-ul"></i>
                                                </a>

                                                <div class="user-menu dropdown-menu">
                                                    {{-- <a class="nav-link" href="{{route('admin-user-show',$user->id)}}"><i class="ti-eye mr-1"></i>View</a> --}}
                                                    <a class="nav-link"
                                                        href="{{ route('admin-user-edit', $interview->id) }}"
                                                        target="_blank"><i class="ti-eye mr-11"></i>View</a>
                                                    @if (Auth::user()->id == $interview->id)
                                                    @else
                                                        {!! Form::model($interviews, ['method' => 'delete', 'route' => ['admin-user-delete', $interview->id], 'class' => 'delete_btn']) !!}
                                                        {!! Form::hidden('id', $interview->id) !!}

                                                        <a href="#" class="nav-link"><i class="ti-trash mr-1"></i>
                                                            Delete</a>
                                                        {!! Form::close() !!}
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        {{-- {{ $users->appends(['idn' => @$data_id,'name' => @$data_name,'email' => @$data_name,'suburb' => @$data_suburb,'phone' => @$data_phone,'visa' => @$data_visa,'job' => @$data_job]) }} --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('footer')
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
@endpush
