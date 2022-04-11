@extends('layouts.master')
@push('title')
    Application List
@endpush
@section('content')
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('admin/job-applicant') }}" method="get">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <strong>Search Candidate</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <input type="text" name="applicant_id" class="form-control"
                                        placeholder="Applicant's ID" value="{{ @$applicant_id }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="text" name="name" class="form-control" placeholder="First Name"
                                        value="{{ @$data_name }}">
                                </div>

                                <div class="form-group col-md-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email"
                                        value="{{ @$data_email }}">
                                </div>

                                <div class="col-md-3">
                                    <select name="job" class="form-control">
                                        <option value="0">Applied Job</option>
                                        @foreach ($work as $val)
                                            <option value="{{ $val->id }}"
                                                @if ($data_job == $val->id) selected @endif>{{ $val->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger"> {{ $errors->first('user_type') }}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone"
                                        value="{{ @$data_phone }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <a href="{{ url('admin/job-applicant') }}" class="btn btn-warning mr-2"><i
                                            class="ti-back-right mr-1"></i> Refresh</a>
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
                        <div class="col-sm-2 col-md-3">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Candidate <div class="badge badge-info" title="Find Total">
                                            {{ $jobapplicant->count() }}
                                        </div>
                                    </h1>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <form action="{{ url('admin/job-applicant') }}" method="get" class="pt-2">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="date" name="from" value="{{ @$data_startdate }}"
                                            class="form-control start_date" placeholder="Start Date">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" name="to" value="{{ @$data_enddate }}"
                                            class="form-control end_date" placeholder="End Date">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-success btn-sm" name="exportExcel"><i
                                                class=" mr-1"></i>Search</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="cord-title">
                            <h4>All Application List</h4>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Candidate Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Applying for</th>
                                    <th scope="col">Download</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobapplicant as $key => $jobapp)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $jobapp->applicant_id }}</td>

                                        <td>{{ $jobapp->name }} </td>
                                        <td>{{ $jobapp->email }} </td>
                                        <td>{{ $jobapp->work->title ?? 'N/A' }} </td>
                                        <td><a href="{{ asset('images/cv/' . $jobapp->attachment) }}" download><i
                                                    class="fa fa-download"></i></a></td>

                                        <td class="text-center">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-list-ul"></i>
                                                </a>

                                                <div class="user-menu dropdown-menu">
                                                    <a class="nav-link"
                                                        href="{{ route('job-applicant.edit', $jobapp->id) }}"><i
                                                            class="ti-pencil mr-1"></i> Edit</a>
                                                    {!! Form::model($jobapp, ['method' => 'delete', 'route' => ['job-applicant.destroy', $jobapp->id], 'class' => 'delete_btn']) !!}
                                                    {!! Form::hidden('id', $jobapp->id) !!}

                                                    <a href="#" class="nav-link"><i class="ti-trash mr-1"></i>
                                                        Delete</a>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $jobapplicant->appends(['applicant_id' => @$applicant_id,'name' => @$data_name,'email' => @$data_name,'phone' => @$data_phone,'job' => @$data_job,'from' => @$data_startdate,'to' => @$data_enddate]) }}
                        </div>
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
