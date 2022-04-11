 <div class="modal fade" id="work_history" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Update Work History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('user-work-history-store',$user->id)}}" enctype="multipart/form-data" method="post">
				@csrf
            <div class="modal-body">
            	<strong class="card-title text-left">What visa do you currently hold? </strong>
                            <div class="row mt-3">
                            	<div class="form-group col-md-3"> 
                                    <label for="inline-radio1" class="form-check-label ml-4">
                                        <input type="radio" id="inline-radio1" name="visa" value="1" class="form-check-input mr-1" {{@$user->info->visa==1 ? 'checked' : ''}}> Citizen
                                    </label>
                                    <div class="clearfix mt-2"></div>
                                    <label for="inline-radio5" class="form-check-label ml-4">
                                        <input type="radio" id="inline-radio5" name="visa" value="5" class="form-check-input mr-1" {{@$user->info->visa==5 ? 'checked' : ''}}> Student Visa
                                    </label>
                                </div>
                                <div class="form-group col-md-3"> 
                                    <label for="inline-radio2" class="form-check-label ml-4">
                                        <input type="radio" id="inline-radio2" name="visa" value="2" class="form-check-input mr-1" {{@$user->info->visa==2 ? 'checked' : ''}}> Permanent Resident
                                    </label>
                                    <div class="clearfix mt-2"></div>
                                    <label for="inline-radio6" class="form-check-label ml-4">
                                        <input type="radio" id="inline-radio6" name="visa" value="6" class="form-check-input mr-1" {{@$user->info->visa==6 ? 'checked' : ''}}> Dependent Visa
                                    </label>
                                </div>
                                <div class="form-group col-md-3"> 
                                    <label for="inline-radio3" class="form-check-label ml-4">
                                        <input type="radio" id="inline-radio3" name="visa" value="3" class="form-check-input mr-1" {{@$user->info->visa==3 ? 'checked' : ''}}> Temporary Resident
                                    </label>
                                    <div class="clearfix mt-2"></div>
                                    <label for="inline-radio7" class="form-check-label ml-4">
                                        <input type="radio" id="inline-radio7" name="visa" value="7" class="form-check-input mr-1" {{@$user->info->visa==7 ? 'checked' : ''}}> Holiday Visa
                                    </label>
                                </div>
                                <div class="form-group col-md-3"> 
                                    <label for="inline-radio4" class="form-check-label ml-4">
                                        <input type="radio" id="inline-radio4" name="visa" value="4" class="form-check-input mr-1" {{@$user->info->visa==4 ? 'checked' : ''}}> Briding Visa
                                    </label>
                                </div>
                                <span class="text-danger"> {{ $errors->first('visa') }}</span>
							</div>
							<div class="row">
                            	<div class="col-lg-12">
                            		<strong>What is your recent work history ?</strong>
                            	</div>
                            	
                            	<div class="col-md-12 mt-3">
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
	                            		</div>
                            	</div>
                            </div>
                            <div class="row mt-3">
                            	<div class="col-md-12"><hr/></div>
                            	<div class="col-md-6">
                            		<strong>Are you eligible to work in Australia? </strong>
                            		<div class="row">
	                            		<div class="form-group col-md-2"> 
		                                    <label for="yes" class="form-check-label ml-4">
		                                        <input type="radio" id="yes" name="eligible" value="1" class="form-check-input mr-1" {{ @$user->info->eligible_to_work === 1 ? "checked" : "" }}> Yes
		                                    </label>
		                                </div>
		                                <div class="form-group col-md-2"> 
		                                    <label for="no" class="form-check-label ml-4">
		                                        <input type="radio" id="no" name="eligible" value="0" class="form-check-input mr-1" {{ @$user->info->eligible_to_work === 0 ? "checked" : "" }}> no
		                                    </label>
		                                </div>
		                            </div>
                            	</div>
                            	<div class="col-md-6">
                            		<strong>How do you travel to work?</strong>
                            		<div class="row">

	                            		<div class="form-group col-md-6">
	                            			<input type="text" name="travel_to_work" class="form-control " placeholder="travel to work" value="{{@$user->info->travel_to_work}}">
	                            		</div>
	                            		{{-- <div class="form-group col-md-6"> 
		                                    <label for="car" class="form-check-label ml-4">
		                                        <input type="checkbox" id="car" name="car" value="car" class="form-check-input mr-1"> Yes
		                                    </label>
		                                </div>
		                                <div class="form-group col-md-6"> 
		                                    <label for="public" class="form-check-label ml-4">
		                                        <input type="checkbox" id="public" name="public" value="Public Transport" class="form-check-input mr-1"> Public Transport
		                                    </label>
		                                </div> --}}
		                            </div>
                            	</div>
                            </div>
                            <div class="row mt-3">
                            	<div class="col-md-12 mb-3">
                            		<strong>Qualities :</strong>
                            	</div>
                            	<div class="form-group col-md-6">
                                    <label for="license" class="control-label mb-1">Other Type Of License :</label>
                                    <input id="license" name="license" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Type1,Type2" value="{{@$user->info->license}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="language" class="control-label mb-1">
                                    Other Type Of Language :</label>
                                    <input id="language" name="language" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Language1,Language2" value="{{@$user->info->language}}">
                                </div>
                            	
                            </div>
            </div>
            <div class="modal-footer">
               <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i>Reset</button>
                <button type="submit" class="btn btn-primary"><i class="ti-save-alt mr-1"></i> Update</button>
                <a href="{{route('user-wish-to-work')}}" class="btn btn-info">Next <i class="ti-angle-right"></i></a>
            </div>
            </form>
        </div>
    </div>
</div>