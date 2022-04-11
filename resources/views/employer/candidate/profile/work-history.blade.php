@if(@$user->work_history)
<div class="col-lg-12 mt-3">
    <strong><span class="text-info">{{@$user->info->first_name}}</span> Recent work history</strong><br/><br/>
    <table class="table table-bordered">
        <thead>
            <th>SL</th>
            <th>Company</th>
            <th>Position</th>
            <th>Start</th>
            <th>End</th>
        </thead>
        
        <tbody>
            @foreach($user->work_history as $key=>$work_history)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$work_history->company}}</td>
                <td>{{$work_history->position}}</td>
                <td>{{date('d M Y',strtotime($work_history->start))}}</td>
                <td>{{date('d M Y',strtotime($work_history->end))}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>
@endif
