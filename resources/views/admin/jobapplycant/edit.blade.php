@extends('layouts.master')
@push('title') Application List @endpush
@section('content')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('job-applicant.update', $jobapplicant->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Applicant Name</label>
                                        <input class="form-control" name="name" value="{{ $jobapplicant->name ?? '' }}"
                                            type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input class="form-control" name="email"
                                            value="{{ $jobapplicant->email ?? '' }}" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Phone</label>
                                        <input class="form-control" name="phone"
                                            value="{{ $jobapplicant->phone ?? '' }}" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Full_address</label>
                                        <textarea name="full_address" id="" cols="30" class="form-control"
                                            rows="5">{{ $jobapplicant->full_address ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">State</label>
                                        <input class="form-control" name="state"
                                            value="{{ $jobapplicant->state ?? '' }}" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">City</label>
                                        <input class="form-control" name="city" value="{{ $jobapplicant->city ?? '' }}"
                                            type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Applying For</label>
                                        <select name="application_for" id="" class="form-control">
                                            @foreach ($works as $work)
                                                <option value="{{ $work->id }}" @if ($jobapplicant->application_for == $work->id) selected @endif>
                                                    {{ $work->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary ml-3">Save</button>
                                </div>
                            </div>
                        </form>
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
