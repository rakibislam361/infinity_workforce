@if(@$user->work_history)
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
            @foreach($user->work_history as $key=>$work_history)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$work_history->company}}</td>
                <td>{{$work_history->position}}</td>
                <td>
                    @if($work_history->start)
                    {{date('d M Y',strtotime($work_history->start))}}
                    @else
                    -
                    @endif
                </td>
                <td>
                    @if($work_history->end)
                    {{date('d M Y',strtotime($work_history->end))}}
                    @else
                        -
                    @endif
                </td>
                <td class="text-center">
                    {{-- <a href="{{route('user-work-history-delete',$work_history->id)}}" class="nav-link delete_work py-0"><i class="ti-trash mr-1"></i></a> --}}
                    {!! Form::model($work_history, ['method' => 'delete','route' => ['user-work-history-delete',$work_history->id], 'class' =>'delete_work']) !!}
                      {!! Form::hidden('id', $work_history->id) !!}
                       
                     
                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i></a>
                      {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>
@endif
 <div class="row mt-3">
     <div class="col-md-12">
         <h4>Please Fill Up The Form Below to add Work Experience</h4>
     </div>
 </div>
<form action="{{route('user-work-history-store',$user->id)}}" enctype="multipart/form-data" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <div id="recent_work_history">
        <div class="row  mt-3">
            <div class="form-group col-md-6 mt-3">
                <label for="company_name">Company Name <small class="text-danger">*</small></label>
                <input id="company_name" type="text" name="work_experience_company_name"  class=" form-control" placeholder="Company Name" value="{{old('work_experience_company_name')}}" required="">
                <div class="invalid-feedback">Company Name Field is Required</div>
                <span class="text-danger">{{$errors->first('work_experience_company_name')}}</span>
            </div>
             <div class="form-group col-md-6 mt-3">
                <label for="position">Position <small class="text-danger">*</small></label>
                <input id="position" type="text" name="work_experience_position"  class=" form-control" placeholder="Position" value="{{old('work_experience_position')}}" required>
                <div class="invalid-feedback">Position Field is Required</div>
                <span class="text-danger">{{$errors->first('work_experience_position')}}</span>
            </div>
            <div class="form-group col-md-6 mt-3">
                <label for="start">Start Date  <small class="text-danger">*</small></label>
                <input type="text" name="work_experience_start_date" id="start" class="start_date form-control " placeholder="Start Date" value="{{old('work_experience_start_date')}}" required>
                <div class="invalid-feedback">Start Date Field is Required</div>
                <span class="text-danger">{{$errors->first('work_experience_start_date')}}</span>
            </div>
            <div class="col-md-6 mt-3">
                <label for="end"> End Date</label>
                <input type="text" name="end" id="work_experience_end_date" class=" form-control end_date" placeholder="End Date" value="{{old('work_experience_end_date')}}">
                <span class="text-danger">{{$errors->first('work_experience_end_date')}}</span>
            </div>
            
           
            

        </div>
        <div class="row">
            <div class="col-lg-12 text-right mt-3">
                <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
                <button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Update</button>
            </div>
        </div>
    </div>
    </form>



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