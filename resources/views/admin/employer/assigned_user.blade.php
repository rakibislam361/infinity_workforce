 <div class="modal fade" id="assigned_user" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title float-left" id="mediumModalLabel">Add New User for {{@$employer->company_name}}</h5>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin-user-store')}}" method="post"  enctype="multipart/form-data" class="new-user"> 
                    @csrf
                    <div class="row mt-2">
                        <div class="form-group col-md-4">
                            <label for="first-name" class="control-label mb-1">First Name <small class="text-danger">*</small></label>
                            <input id="first-name" name="first_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="First Name" required="" value="{{old('first_name')}}">
                             <span class="text-danger"> {{ $errors->first('first_name') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="middle-name" class="control-label mb-1">Middle Name</label>
                            <input id="middle-name" name="middle_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Middle Name"  value="{{old('middle_name')}}">
                            <span class="text-danger"> {{ $errors->first('middle_name') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last-name" class="control-label mb-1">Last Name</label>
                            <input id="last-name" name="last_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Last Name"  value="{{old('last_name')}}">
                             <span class="text-danger"> {{ $errors->first('last_name') }}</span>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-4">
                            <label for="phone" class="control-label mb-1">Phone</label>
                            <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Phone"  value="{{old('phone')}}">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="image" class="control-label mb-1">Photo</label>
                            <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="{{old('image')}}"  accept="image/png, image/jpeg,image/jpg,image/bmp">
                            <span class="text-danger"> {{ $errors->first('image') }}</span>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address" class="control-label mb-1">Address</label>
                            <input id="address" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Address" value="{{old('address')}}">
                        </div>
                        
                    </div>
                    <div class="row mt-2">
                        <div class="form-group col-md-6">
                            <label for="email" class="control-label mb-1">Email <small class="text-danger">*</small> </label>
                            <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Email" required="" value="{{old('email')}}">
                            <span class="text-danger"> {{ $errors->first('email') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="control-label mb-1">Password <small class="text-danger">*</small></label>
                            <input id="password" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" placeholder="" required="">
                        </div>
                        
                        <input type="hidden" value="3" name="role">
                        <input type="hidden" value="{{@$employer->id}}" name="company_id">
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-right mt-3">
                            <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
                            <button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Submit</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>