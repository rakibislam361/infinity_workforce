 <div class="modal fade" id="basic_info" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">{{{@$employer->company_name}}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('employer/basic-info-update/')}}/{{@$employer->id}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                   <div class="form-group col-md-6">
                        <label for="name" class="control-label mb-1">Company Name<small class="text-danger">*</small></label>
                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company Name" required="" value="{{@$employer->office->company_name}}">
                         <span class="text-danger"> {{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone" class="control-label mb-1">Company Phone</label>
                        <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company Phone" value="{{@$employer->office->phone}}">
                         <span class="text-danger"> {{ $errors->first('phone') }}</span>
                    </div>
                </div>
                <div class="row">
                   <div class="form-group col-md-6">
                        <label for="email" class="control-label mb-1">Email</label>
                        <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company email" required="" value="{{@$employer->office->email}}">
                         <span class="text-danger"> {{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="license" class="control-label mb-1">Company License</label>
                        <input id="license" name="license" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company license" value="{{@$employer->office->license}}">
                         <span class="text-danger"> {{ $errors->first('license') }}</span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="address" class="control-label mb-1">Company Address</label>
                        <input id="address" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company address" value="{{@$employer->office->address}}">
                         <span class="text-danger"> {{ $errors->first('address') }}</span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="details" class="control-label mb-1">Company Details</label>
                        <textarea class="form-control" name="details">{{@$employer->office->details}}</textarea>
                         <span class="text-danger"> {{ $errors->first('details') }}</span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="logo" class="control-label mb-1">Company Logo</label>
                        <input id="logo" type="file" name="logo" accept="images/jpg,images/png,image/jpeg,image/bmp">
                         <span class="text-danger"> {{ $errors->first('image') }}</span>
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