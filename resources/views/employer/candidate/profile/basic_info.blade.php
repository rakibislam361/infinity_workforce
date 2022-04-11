
		<h4>Applicant Number is <strong>IDN #{{$user->id}}</strong> </h4><br/>
		{{-- @if ($errors->any())
	        {{ implode('', $errors->all('<div>:message</div>')) }}
	@endif --}}
		<div class="row mt-2">
   		<div class="form-group col-md-4">
            <label for="first-name" class="control-label mb-1">First Name <small class="text-danger">*</small></label>
            <input id="first-name" name="first_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="First Name" required value="@if(old('first_name')){{old('first_name')}}@else{{@$user->info->first_name}}@endif" disabled>
            <span class="text-danger"> {{ $errors->first('first_name') }}</span>
             <div class="invalid-feedback" minlength="10">Name is Required</div>
        </div>
       
        <div class="form-group col-md-4">
            <label for="last_name" class="control-label mb-1">Last Name <small class="text-danger">*</small></label>
            <input id="last_name" name="last_name" type="text" class="form-control"   value="@if(old('last_name')){{old('last_name')}}@else{{@$user->info->last_name}}@endif" disabled>
             <span class="text-danger"> {{ $errors->first('last_name') }}</span>
        </div>
         <div class="form-group col-md-4">
            <label for="nickname" class="control-label mb-1">Nickname</label>
            <input id="nickname" name="nickname" type="text" class="form-control"  value="@if(old('nickname')) {{old('nickname')}}@else{{@$user->info->mid_name}} @endif" disabled>
            <span class="text-danger"> {{ $errors->first('nickname') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label class="control-label mb-1">Gender<small class="text-danger">*</small></label>
            <select name="gender" class="form-control" disabled>
            	<option value="">Select Gender</option>
            	<option value="1" @if(@$user->info->gender==1 || old('gender')==1) selected @endif>Male</option>
            	<option value="2" @if(@$user->info->gender==2 || old('gender')==2) selected @endif>Female</option>
            	<option value="3" @if(@$user->info->gender==3 || old('gender')==3) selected @endif>Other</option>
            </select>

            <span class="text-danger"> {{ $errors->first('gender') }}</span>
            <div class="invalid-feedback" >Gender Field Is Required</div>
        </div>
        <div class="form-group col-md-4">
            <label for="email" class="control-label mb-1">Email <small class="text-danger">*</small> </label>
            <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Email" required="" value="@if(old('email')){{old('email')}}@else{{$user->email}}@endif" disabled>
            <span class="text-danger"> {{ $errors->first('email') }}</span>
            <div class="invalid-feedback" >Email Field Is Required</div>
        </div>
       
       {{--  <div class="form-group col-md-4">
            <label for="password" class="control-label mb-1">Password </label>
            <input id="password" name="password" type="password" class="form-control"  placeholder="Password" value="">
            <span class="text-danger"> {{ $errors->first('password') }}</span>
        </div> --}}

    </div>
    <div class="row mt-2">

   		
        <div class="form-group col-md-12">
            <label for="current_address" class="control-label mb-1">Current Address<small class="text-danger">*</small></label>
            <input id="current_address" name="current_address" type="text" class="form-control"  value="@if(old('current_address')){{old('current_address')}}@else{{@$user->info->address}}@endif" required disabled>
             <span class="text-danger"> {{ $errors->first('current_address') }}</span>
        </div>
        
    </div>
    <div class="row mt-2">
    	<div class="form-group col-md-4">
            <label for="town_city" class="control-label mb-1">Town/City<small class="text-danger">*</small></label>
            <input id="town_city" name="town_city" type="text" class="form-control"   value="@if(old('town_city')){{old('town_city')}}@else{{@$user->info->town_city}}@endif" required disabled>
            <span class="text-danger"> {{ $errors->first('town_city') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="postcode" class="control-label mb-1">Postcode<small class="text-danger">*</small></label>
            <input id="postcode" name="postcode" type="text" class="form-control"  value="@if(old('postcode')){{old('postcode')}}@else{{@$user->info->postcode}}@endif" required disabled>
            <span class="text-danger"> {{ $errors->first('postcode') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="country" class="control-label mb-1">Country<small class="text-danger">*</small></label>
            <select name="country" id="country" class="form-control" required disabled>
            	<option value="">Select Country</option>
            	@foreach($countries as $country)
            	<option value="{{$country->id}}" @if($country->id==@$user->info->country_id || old('country')==$country->id) selected @endif>{{@$country->name}}</option>
            	@endforeach
            </select>
            <span class="text-danger"> {{ $errors->first('country') }}</span>
        </div>
        <div class="col-md-6">
            <label for="calling_code" class="control-label mb-1">Phone Number <small class="text-danger">*</small></label>
                <div class="row">
                	<div class="form-group  col-md-4">
                		 <select name="calling_code" id="calling_code" class="form-control" required disabled>
                        	<option value="">Select Country</option>
                        	@foreach($countries as $country)
                        	<option value="{{$country->id}}" @if(@$country->id==@$user->info->calling_code || old('calling_code')==$country->id) selected @endif>{{@$country->name}} ({{@$country->calling_code}})</option>
                        	@endforeach
                        </select>
                        <div class="invalid-feedback">Calling Code is Required</div>
                	</div>
                	
                	<div class="form-group col-md-8">
                       
                        <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false"  value="@if(old('phone')){{old('phone')}}@else{{@$user->info->phone}}@endif" required disabled>
                        <span class="text-danger"> {{ $errors->first('phone') }}</span>
                        <div class="invalid-feedback">Phone is Required</div>
                    </div>
                           
                </div>
            
            <span class="text-danger"> {{ $errors->first('phone') }}</span>
        </div>
   		
        
        
    </div>

    <div class="row">
    	<div class="col-md-12 mb-3">
    		<strong>CHOOSE BETWEEN THE FOLLOWING OPTION BELOW:  <small class="text-danger">*</small></strong>

    	</div>
    	<div class="form-group col-md-12">
    		<label class="control-label mb-2">
    			<input type="radio" name="purpose" value="1" @if(@$user->info->purpose==1 || old('purpose')==1) checked @endif required disabled>
    			I do currently hold an AUSTRALIAN Visa or Citizenship AND
				I'm looking for a WORK in AUSTRALIA
    		</label>
    		<label class="control-label mb-2">
    			<input type="radio" name="purpose" value="2" @if(@$user->info->purpose==2 || old('purpose')==2) checked @endif disabled>
    			"I do currently hold an AUSTRALIAN Visa or Citizenship AND
				I'm looking for an UNIVERSITY to STUDY in AUSTRALIA"			
    		</label>
    		<label class="control-label mb-2">
    			<input type="radio" name="purpose" value="3" @if(@$user->info->purpose==3 || old('purpose')==3) checked @endif disabled>
    			"I do currently hold an AUSTRALIAN Visa or Citizenship AND
				I'm looking for an INTERNSHIP OR TRAINING in AUSTRALIA"					
    		</label>
    		<label class="control-label mb-2">
    			<input type="radio" name="purpose" value="4" @if(@$user->info->purpose==4 || old('purpose')==4) checked @endif disabled>
    			"Currently I do NOT hold an AUSTRALIAN Visa or Citizenship, BUT
				I'm looking for an AUSTRALIAN VISA and would like to STUDY or WORK in AUSTRALIA"			
    		</label>
    		<label class="control-label mb-2">
    			<input type="radio" name="purpose" value="5" @if(@$user->info->purpose==5 || old('purpose')==5) checked @endif disabled>
    			"I do currently hold an AUSTRALIAN Visa or Citizenship AND
				I'm looking for DISABILITY EMPLOYMENT SERVICES in AUSTRALIA"						
    		</label>
             <div class="invalid-feedback" minlength="10">Please Select An Option</div>
             <br/>
             <p class="text-danger"> {{ $errors->first('purpose') }}</p>
    	</div>
        
    </div>
    <div class="row mt-2">
    	<div class="col-md-6 col-lg-6">
    		<label class="control-label mb-1" >What is your current AUSTRALIAN Visa or Citizenship?<small class="text-danger">*</small></label>
    		<select name="visa" required="" class="form-control" id="visa" onchange="select_visa()" disabled>
    			<option value="" @if(@$user->info->visa==0 || old('visa')==0) selected @endif>Select Visa</option>
    			<option value="1" @if(@$user->info->visa==1 || old('visa')==1) selected @endif>Citizen</option>
    			<option value="2" @if(@$user->info->visa==2 || old('visa')==2) selected @endif>Permanent Resident</option>
    			<option value="3" @if(@$user->info->visa==3 || old('visa')==3) selected @endif>Temporary resident</option>
    			<option value="4" @if(@$user->info->visa==4 || old('visa')==4) selected @endif>Dependent visa</option>
    			<option value="5" @if(@$user->info->visa==5 || old('visa')==5) selected @endif>Holiday visa</option>
    			<option value="6" @if(@$user->info->visa==6 || old('visa')==6) selected @endif>Student visa A</option>
    			<option value="7" @if(@$user->info->visa==7 || old('visa')==7) selected @endif>Student visa B</option>
    			<option value="8" @if(@$user->info->visa==8 || old('visa')==8) selected @endif>Student visa C</option>
    			<option value="9" @if(@$user->info->visa==9 || old('visa')==9) selected @endif>Student visa D</option>
    		</select>
    		<span class="text-danger"> {{ $errors->first('visa') }}</span>
    	</div>
    	
      
        
    </div>
    <div class="row mt-4">
    	<div class="col-md-6">
    		<label>How many hours are you ELIGIBLE to work in AUSTRALIA?<small class="text-danger">*</small></label>
            
    		<input type="number" name="work_per_week" class="form-control" value="{{@$user->info->work_per_week}}" disabled>
    	</div>
    	<div class="col-md-6">
            <label>How do you usually travel in AUSTRALIA?</label>
            <input type="text" value="{{ @$user->info->travel_to_work }}" class="form-control" disabled>
        </div>
    </div>
    <div class="row mt-4">
    	<div class="form-group col-md-6">
    		<label>Medical check completed</label>
    		<input type="text" name="medical_check" placeholder="Y m d" class="form-control medical_check" value="{{@$user->info->medical_check_date}}" disabled>
    	</div>
    	<div class="form-group col-md-6">
    		<label>Police check completed</label>
    		<input type="text" name="police_check" placeholder="Y m d" class="form-control police_check" value="{{@$user->info->police_check_date}}" disabled>
    	</div>
        {{-- bank table data--}}
        <div class="form-group col-md-6 mt-2">
            <label for="abn" class="control-label mb-1">ABN</label>
            <input id="abn" name="abn" type="text" class="form-control"  aria-invalid="false" value="{{@$user->bank_info->abn}}" disabled>
        </div>
        <div class="form-group col-md-6 mt-2">
            <label for="tfn" class="control-label mb-1">TFN</label>
            <input id="tfn" name="tfn" type="text" class="form-control" aria-invalid="false" value="{{@$user->bank_info->tfn}}" disabled>
        </div>
    </div>
    





