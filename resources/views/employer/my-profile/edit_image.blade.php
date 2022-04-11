 <div class="modal fade" id="image_update" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="smallmodal">Update Basic Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('user/profile/image_update',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                                <div class="row mt-2">
                                    <div class="form-group col-md-4">
                                        <label for="image" class="control-label mb-1">New Photo</label>
                                        <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="{{old('image')}}"  accept="image/png, image/jpeg,image/jpg,image/bmp">
                                        <span class="text-danger"> {{ $errors->first('image') }}</span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        @if($user->image)
                                        <img src="{{asset('images/users')}}/{{$user->image}}" width="150" class="img-responsive img">
                                        @else
                                            <p class="mt-4"><i class="fa fa-warning text-warning"></i> No Profile Photo Found</p>
                                        @endif
                                    </div>
                                    
                                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>