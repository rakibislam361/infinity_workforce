
@extends('layouts.master')
 @push('title')
        User Work History
    @endpush
@push('head')

@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('user-work-history-store',$user->id)}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="user_id">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <strong>What is your recent work history ?</strong>
                    </div>
                    
                    <div class="col-md-12 mt-3">
                        <div id="recent_work_history">
                                <div class="row  mt-3">
                                    <div class="col-md-3">
                                        <input type="text" name="start" id="start" class="start_date form-control" placeholder="Start Date" value="{{old('start')}}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="end" id="end" class=" form-control end_date" placeholder="End Date" value="{{old('end')}}" required>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <input type="text" name="position"  class=" form-control" placeholder="Position" value="{{old('position')}}" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="company_name"  class=" form-control" placeholder="Company Name" value="{{old('company')}}" required>
                                    </div>

                                </div>
                            </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-12 text-right">
                        <button type="reset" class="btn btn-warning mr-1"><i class="ti-reload mr-1"></i>Reset</button>
                        <button type="submit" class="btn btn-primary"><i class="ti-save-alt mr-1"></i> Update</button>
                        <a href="{{route('my-documents')}}" class="btn btn-info ml-1">Next <i class="ti-shift-right"></i></a>
                    </div>
                </div>
                </form>

              
                <div class="col-lg-12 mt-3">
                    <strong>Your recent work history</strong><br/><br/>
                    <table class="table table-bordered">
                        <thead>
                            <th>SL</th>
                            <th>Company</th>
                            <th>Position</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Action</th>
                        </thead>
                        
                        <tbody>
                            @if($user->work_history->count()>0)
                            @foreach($user->work_history as $key=>$work_history)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$work_history->company}}</td>
                                <td>{{$work_history->position}}</td>
                                <td>{{date('d M Y',strtotime($work_history->start))}}</td>
                                <td>{{date('d M Y',strtotime($work_history->end))}}</td>
                                <td class="text-center">
                                      {!! Form::model($work_history, ['method' => 'delete','route' => ['user-work-history-delete',$work_history->id], 'class' =>'delete_work']) !!}
                                          {!! Form::hidden('id', $work_history->id) !!}
                                           
                                         
                                          <a href="#" class="nav-link"><i class="ti-trash mr-1"></i></a>
                                          {!! Form::close() !!}

                                   {{--  <a href="{{route('user-work-history-delete',$work_history->id)}}" class="nav-link delete_work py-0"><i class="ti-trash mr-1"></i></a> --}}
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6">
                                    <p class="text-warning"> No Work History Found</p>
                                </td>
                            </tr>
                            @endif
                            
                        </tbody>
                    </table>    
                </div>
    
            </div>
        </div>
    </div>
</div>
@endsection
@push('footer')

<script src="{{ asset('/admin/assets')}}/js/datepicker/picker.js"></script>
<script src="{{ asset('/admin/assets')}}/js/datepicker/picker.date.js"></script>
<script type="text/javascript">
    jQuery(function ($){
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
    <script src="{{ asset('/admin/assets')}}/js/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript">
        jQuery(function ($){
            $('.delete_work').on('click', function(e) {
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
                $('button.swal2-confirm').on('click',function(){
                   $form.submit();
                });
            });
            
            
        });
        
    </script> 

@endpush
