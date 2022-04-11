<div class="mt-3 mb-3">
    @if($user->able_to_work)
    <dl class="row mb-3">
        <dt class="col-sm-4"> <span class="text-info">{{@$user->info->first_name}}</span> Work Availability</dt>
    </dl>
    <table class="table table-bordered" id="ability_table">
        <thead>
            <th>Day</th>
            <th>Sunday</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thirsday</th>
            <th>Friday</th>
            <th>Saturday</th>
        </thead>
        <tbody>
            <tr>
                <th>Time</th>
                <td>{{@$user->able_to_work->sun_start}}-{{@$user->able_to_work->sun_end}}</td>
                <td>{{@$user->able_to_work->mon_start}}-{{@$user->able_to_work->mon_end}}</td>
                <td>{{@$user->able_to_work->tue_start}}-{{@$user->able_to_work->tue_end}}</td>
                <td>{{@$user->able_to_work->wed_start}}-{{@$user->able_to_work->wed_end}}</td>
                <td>{{@$user->able_to_work->thu_start}}-{{@$user->able_to_work->tue_end}}</td>
                <td>{{@$user->able_to_work->fri_start}}-{{@$user->able_to_work->fri_end}}</td>
                <td>{{@$user->able_to_work->sat_start}}-{{@$user->able_to_work->sat_end}}</td>
            </tr>
        </tbody>
    </table>
    @else
        <p class="text-warning"><i class="fa fa-warning"></i> No Availability Information</p>
    @endif
</div>
