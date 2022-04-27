<div class="row">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach 

</div>
<form action="{{route('admin-user-update',$user->id)}}" method="post"  enctype="multipart/form-data" class="new-user"> 
		@csrf
		<h4>User Number is <strong>IDN{{$user->id}}</strong> </h4><br/>
		{{-- @if ($errors->any())
	        {{ implode('', $errors->all('<div>:message</div>')) }}
	@endif --}}
		<div class="row mt-2">
   		<div class="form-group col-md-4">
            <label for="first-name" class="control-label mb-1">First Name <small class="text-danger">*</small></label>
            <input id="first-name" name="first_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="First Name" required="" value="@if(@$user->info->first_name){{@$user->info->first_name}}@else{{old('first_name')}}@endif">
            <span class="text-danger"> {{ $errors->first('first_name') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="last_name" class="control-label mb-1">Last Name</label>
            <input id="last_name" name="last_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Last Name"  value="@if(@$user->info->last_name){{@$user->info->last_name}}@else{{old('last_name')}}@endif">
             <span class="text-danger"> {{ $errors->first('last_name') }}</span>
        </div>
        
        <div class="form-group col-md-4">
            <label for="middle_name" class="control-label mb-1">Nickname</label>
            <input id="middle_name" name="middle_name" type="text" class="form-control"  placeholder="Nickname"  value="@if(@$user->info->mid_name){{@$user->info->mid_name}}@else{{old('mid_name')}}@endif">
            <span class="text-danger"> {{ $errors->first('middle_name') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="last-name" class="control-label mb-1">Gender</label>
            <select name="gender" class="form-control" required="">
                
                <option value="0" @if(@$user->info->gender==0 || old('gender')==0) selected @endif>Select Gender</option>
                <option value="1" @if(@$user->info->gender==1 || old('gender')==1) selected @endif>Male</option>
                <option value="2" @if(@$user->info->gender==2 || old('gender')==2) selected @endif>Female</option>
                <option value="3" @if(@$user->info->gender==3 || old('gender')==3) selected @endif>Other</option>
            </select>
            <span class="text-danger"> {{ $errors->first('gender') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="email" class="control-label mb-1">Email <small class="text-danger">*</small> </label>
            <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Email" required="" value="{{$user->email}}">
            <span class="text-danger"> {{ $errors->first('email') }}</span>
        </div>
          <div class="form-group col-md-4">
            <label for="password" class="control-label mb-1">Password <small class="text-info">Password length minimum 6</small></label>
            <input id="password" name="password" type="password" class="form-control"  placeholder="Password" value="">
            <span class="text-danger"> {{ $errors->first('password') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="role" class="control-label mb-1">Role <small class="text-danger">*</small> </label>
            <select name="role" class="form-control">
                <option value="">Select Role</option>
                @foreach($roles as $role)
                <option value="{{$role->id}}" @if($role->id==@$user->role_id || $role->id==old('role')) selected @endif> {{$role->name}}</option>
                @endforeach
            </select>
            <span class="text-danger"> {{ $errors->first('role') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="role" class="control-label mb-1">Assign Company </label>
            <select name="company" class="form-control">
                <option value="">Select Company</option>
                @foreach($companies as $company)
                <option value="{{$company->id}}" @if($company->id==@$user->company_id || $company->id==old('company')) selected @endif> {{$company->company_name}}</option>
                @endforeach
            </select>
            <span class="text-danger"> {{ $errors->first('company') }}</span>
        </div>
       {{--  <div class="form-group col-md-4">
            <label for="password" class="control-label mb-1">Password </label>
            <input id="password" name="password" type="password" class="form-control"  placeholder="Password" value="">
            <span class="text-danger"> {{ $errors->first('password') }}</span>
        </div> --}}

    </div>
    <div class="row mt-2">

   		
        <div class="form-group col-md-12">
            <label for="current_address" class="control-label mb-1">Current Address</label>
            <input id="current_address" name="current_address" type="text" class="form-control"  placeholder="Address" value="{{@$user->info->address}}">
        </div>
        
    </div>
    <div class="row mt-2">
    	<div class="form-group col-md-4">
            <label for="town_city" class="control-label mb-1">Town/City</label>
            <input id="town_city" name="town_city" type="text" class="form-control"  placeholder="Town/City"  value="{{@$user->info->town_city}}">
            <span class="text-danger"> {{ $errors->first('town_city') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="postcode" class="control-label mb-1">Postcode</label>
            <input id="postcode" name="postcode" type="text" class="form-control" placeholder="Postcode"  value="{{@$user->info->postcode}}">
            <span class="text-danger"> {{ $errors->first('postcode') }}</span>
        </div>
        <div class="form-group col-md-4">
            <label for="country" class="control-label mb-1">Country</label>
            <select name="country" id="country" class="form-control">
            	<option value="">Select Country</option>
            	@foreach($countries as $country)
            	<option value="{{$country->id}}" @if($country->id==@$user->info->country_id) selected @endif>{{@$country->name}}</option>
            	@endforeach
            </select>
            <span class="text-danger"> {{ $errors->first('country') }}</span>
        </div>
        <div class="form-group col-md-6">
            <label for="calling_code" class="control-label mb-1">Phone Number <small class="text-danger">*</small></label>
                <div class="row">
                	<div class="col-md-4">
                		 <select name="calling_code" id="calling_code" class="form-control" required="">
                        	<option value="">Select Country</option>
                        	@foreach($countries as $country)
                        	<option value="{{$country->id}}" @if(@$country->id==@$user->info->calling_code) selected @endif>{{@$country->name}} ({{@$country->calling_code}})</option>
                        	@endforeach
                        </select>
                	</div>
                	
                	<div class="form-group col-md-8">
                       
                        <input id="phone" name="phone" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Phone"  value="@if(@$user->info->phone){{@$user->info->phone}}@else{{old('phone')}}@endif" required="">
                        <span class="text-danger"> {{ $errors->first('phone') }}</span>
                    </div>
                           
                        </div>
                        <span class="text-danger"> {{ $errors->first('phone') }}</span>
                    </div>
   		
        
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
            <input type="hidden" name="purpose" value="1">
            <input type="hidden" name="visa" value="1">
            <input type="hidden" name="work_per_week" value="20">
            <input type="hidden" name="travel_to_work" value="Scooter/bike">
            <input type="hidden" name="visa_exp" value="1970-01-01">
            <input type="hidden" name="medical_check" value="1970-01-01">
            <input type="hidden" name="police_check" value="1970-01-01">
    </div>

    <div class="row mb-4">
    	<div class="col-lg-12 text-right">
    		<button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
    		<button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Update</button>
    	</div>
    </div>
   
</form>
@push('footer')




@endpush
