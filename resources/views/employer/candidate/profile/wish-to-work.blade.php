<strong>Wish To Work</strong>


<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered">
            <thead>
                <th>Working Category</th>
                <th>Works</th>
            </thead>
            <tbody>
                @foreach(@$categories as $category)
                <tr>
                    <td><strong>{{@$category->name}}</strong></td>
                    <td>
                        @foreach(@$category->works as $work)
                        
                        <p>
                            <label>
                                <input type="checkbox" name="work[]" value="{{$work->id}}"
                                @foreach($user->user_to_works as $u_work)
                                    @if($work->id==$u_work->work_id) 
                                    checked
                                    @endif
                                @endforeach
                                >
                                {{@$work->title}}
                            </label>
                        </p>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
