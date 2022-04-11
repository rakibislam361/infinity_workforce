 <div class="modal fade" id="basic_info" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Update Basic Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('user/profile/update',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row mt-2">
	                           		<div class="form-group col-md-4">
	                                    <label for="first-name" class="control-label mb-1">First Name <small class="text-danger">*</small></label>
	                                    <input id="first-name" name="first_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="First Name" required="" value="{{$user->name}}">
	                                     <span class="text-danger"> {{ $errors->first('first_name') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="middle-name" class="control-label mb-1">Middle Name</label>
	                                    <input id="middle-name" name="middle_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Middle Name"  value="{{@$user->info->mid_name}}" required><small class="text-danger">*</small>
	                                    <span class="text-danger"> {{ $errors->first('middle_name') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="last-name" class="control-label mb-1" required><small class="text-danger">*</small>Last Name</label>
	                                    <input id="last-name" name="last_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Last Name"  value="{{@$user->info->last_name}}">
	                                     <span class="text-danger"> {{ $errors->first('last_name') }}</span>
	                                </div>

	                            </div>
	                            <div class="row mt-2">
	                           		<div class="form-group col-md-6">
	                                    <label for="phone" class="control-label mb-1">Phone</label>
	                                    <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Phone"  value="{{@$user->info->phone}}" required><small class="text-danger">*</small>
	                                    <span class="text-danger"> {{ $errors->first('phone') }}</span>
	                                </div>
	                                
	                                <div class="form-group col-md-6">
	                                    <label for="email" class="control-label mb-1">Email <small class="text-danger">*</small> </label>
	                                    <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Email" required="" value="{{$user->email}}" disabled>
	                                    <span class="text-danger"> {{ $errors->first('email') }}</span>
	                                </div>
	                            </div>
	                            <div class="row mt-2">
	                           		<div class="form-group col-md-12">
	                                    <label for="address" class="control-label mb-1" required><small class="text-danger">*</small>Address</label>
	                                    <input id="address" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Address" value="{{@$user->info->address}}">
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="image" class="control-label mb-1">New Photo</label>
	                                    <input id="image" name="image" type="file" class="form-control" placeholder="" value="{{old('image')}}"  accept="image/png, image/jpeg,image/jpg,image/bmp" @if(empty($user->image)) required @endif><small class="text-danger">*</small>
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