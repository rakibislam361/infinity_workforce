<div class="col-lg-12 mt-3">
    <hr/>
    <strong>Work History</strong>
    @if($user->work_history->count()>0)
    <table class="table  mt-3" width="100%">
            <thead>
                <tr>
                    <th>
                        SL
                    </th>
                    <th>
                        Company
                    </th>
                    <th>
                        Position
                    </th>
                    <th>
                        Start
                    </th>
                    <th>
                        End
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            <tbody>
            @foreach($user->work_history as $key=>$work_history)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$work_history->company}}</td>
                    <td>{{$work_history->position}}</td>
                    <td>
                        {{date('d M Y',strtotime($work_history->start))}}
                    </td>
                    <td>
                        @if($work_history->end)
                        {{date('d M Y',strtotime($work_history->end))}}
                        @else
                        -
                        @endif
                    </td>   
                
                    <td>
                    
                      <a href="{{route('admin-user-work-history-delete',$work_history->id)}}" class="nav-link delete_work"><i class="ti-trash mr-1"></i> Delete</a>
                      
                      
                    </td>
                </tr>
            @endforeach
            <tbody>
    </thead>
        </table>

    @else
    <p class="text-warning"><i class="fa fa-warning"></i> No Work History Found</p>
    @endif
</div>
<form action="{{route('admin-user-work-history-store')}}" method="post">
    @csrf
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <div id="recent_work_history">
        <div class="row  mt-3">
            <div class="col-md-3">
                <input type="text" name="start" id="start" class="start_date form-control " placeholder="Start Date" value="{{old('start')}}">
            </div>
            <div class="col-md-3">
                <input type="text" name="end" id="end" class=" form-control end_date" placeholder="End Date" value="{{old('end')}}">
            </div>
            
            <div class="col-md-3">
                <input type="text" name="position"  class=" form-control" placeholder="Position" value="{{old('position')}}">
            </div>
            <div class="col-md-3">
                <input type="text" name="company_name"  class=" form-control" placeholder="Company Name" value="{{old('company')}}">
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
        format: 'dd-mm-yyyy',
        //formatSubmit: 'y-mm-dd'
    });
     $('.end_date').pickadate({
        selectYears: 30,
        format: 'dd-mm-yyyy',
        //formatSubmit: 'y-mm-dd'
    });
     });
</script>


@endpush