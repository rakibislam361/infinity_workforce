<strong>Wish To Work</strong>

<form action="{{route('admin-user-wish-to-work-update')}}" method="post" class="mt-2" {{--  enctype="multipart/form-data" --}}>
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
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
       
        <div class="col-md-12 text-right">
            <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i>Reset</button>
            <button type="submit" class="btn btn-primary"><i class="ti-save-alt mr-1"></i> Update</button>
        </div>
    </div>
</form>