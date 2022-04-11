 <div class="modal fade" id="document" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Update Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('user-document-upload')}}" enctype="multipart/form-data" method="post">
							@csrf
            <div class="modal-body">
            	<input type="hidden" name="user_id" value="{{$user->id}}">
                                <div class="row mt-3">
								<div class="form-group col-md-4">
	                                <label for="doc_image" class="control-label mb-1">Photo ID</label>
	                                <input id="doc_image" name="doc_image" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png, image/jpeg,image/jpg,image/bmp">
	                                <span class="text-danger"> {{ $errors->first('doc_image') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="image" class="control-label mb-1">Visa Copy</label>
	                                <input id="visa_copy" name="visa_copy" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="file/pdf,image/png, image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword">
	                                <span class="text-danger"> {{ $errors->first('visa_copy') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="resume" class="control-label mb-1">Resume</label>
	                                <input id="resume" name="resume" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="file/pdf,image/png, image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword">
	                                <span class="text-danger"> {{ $errors->first('resume') }}</span>
	                            </div>
							</div>
							<div class="row mt-3">
								<div class="form-group col-md-4">
	                                <label for="police_clearance" class="control-label mb-1">Police Clearance</label>
	                                <input id="police_clearance" name="police_clearance" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="file/pdf,image/png, image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword">
	                                <span class="text-danger"> {{ $errors->first('police_clearance') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="medical_certificate" class="control-label mb-1">Fit To Medical Certificate</label>
	                                <input id="medical_certificate" name="medical_certificate" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="file/pdf,image/png, image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword">
	                                <span class="text-danger"> {{ $errors->first('medical_certificate') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="image" class="control-label mb-1">Drive License / Passport</label>
	                                <input id="d_license" name="d_license" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="file/pdf,image/png, image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword">
	                                <span class="text-danger"> {{ $errors->first('d_license') }}</span>
	                            </div>
	                             <div class="form-group col-md-4">
                                    <label for="insurance" class="control-label mb-1">Insurance</label>
                                    <input id="insurance" name="insurance" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="file/pdf,image/png, image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword">
                                    <span class="text-danger"> {{ $errors->first('insurance') }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="qualifications" class="control-label mb-1">Qualifications</label>
                                    <input id="qualifications" name="qualifications" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="file/pdf,image/png, image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword">
                                    <span class="text-danger"> {{ $errors->first('qualifications') }}</span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="others" class="control-label mb-1">Others</label>
                                    <input id="others" name="others" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="file/pdf,image/png, image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword">
                                    <span class="text-danger"> {{ $errors->first('others') }}</span>
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