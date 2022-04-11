@extends('layouts.master')
@push('title') User Edit @endpush
@push('head')
<style>
{/*.picker__holder{min-width:0 !important;}*/}
.picker__box{padding:0 5px 0 5px;}
.picker__header{padding-top:3px;padding-bottom:3px;}
.picker__table{margin:0 !important;}
.picker__weekday{padding-top:2px !important;}
</style>
@endpush
@section('content')		
		<div class="animated fadeIn">
			<div class="row">
				<div class="breadcrumbs">
				    <div class="breadcrumbs-inner">
				        <div class="row m-0">
				            <div class="col-sm-6">
				                <div class="page-header float-left pl-1">
				                    <div class="page-title">
				                        <h1>Profile Of</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-6">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="{{route('user-profile')}}">Profile</a></li>
				                            <li class="active">Edit</li>
				                        </ol>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
			<div class="card">  
				<div class="card-body">
					@include('user.profile.parts.basic_info')
				</div>
			</div>
		{{-- <div class="row">
			<div class="col-md-12">
				<div class="card">
                        
                       
                        <div class="card-body">
                           <form action="{{route('user-basic-info-store',$user->id)}}" method="post"  enctype="multipart/form-data" class="new-user"> 
                           		@csrf
                           		<h4>Your Applicant Number is <strong>IDN #{{$user->id}}</strong> </h4>
                           		 @if ($errors->any())
								        {{ implode('', $errors->all('<div>:message</div>')) }}
								@endif
                           		<div class="row mt-2">
	                           		<div class="form-group col-md-4">
	                                    <label for="first-name" class="control-label mb-1">First Name <small class="text-danger">*</small></label>
	                                    <input id="first-name" name="first_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="First Name" required="" value="{{ @$user->info->first_name ? $user->info->first_name : old('first_name') }}">
	                                    <span class="text-danger"> {{ $errors->first('first_name') }}</span>
	                                </div>
	                               
	                                <div class="form-group col-md-4">
	                                    <label for="last_name" class="control-label mb-1">Last Name</label>
	                                    <input id="last_name" name="last_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Last Name"  value="{{ @$user->info->last_name ? $user->info->last_name : old('last_name') }}">
	                                     <span class="text-danger"> {{ $errors->first('last_name') }}</span>
	                                </div>
	                                 <div class="form-group col-md-4">
	                                    <label for="middle_name" class="control-label mb-1">Nickname</label>
	                                    <input id="middle_name" name="middle_name" type="text" class="form-control"  placeholder="Nickname"  value="{{ @$user->info->mid_name ? $user->info->mid_name : old('middle_name') }}">
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
	                                    <label for="password" class="control-label mb-1">Password </label>
	                                    <input id="password" name="password" type="password" class="form-control"  placeholder="Password" value="">
	                                    <span class="text-danger"> {{ $errors->first('password') }}</span>
	                                </div>

	                            </div>
	                            <div class="row mt-2">

	                           		
	                                <div class="form-group col-md-12">
	                                    <label for="current_address" class="control-label mb-1">Current Address</label>
	                                    <input id="current_address" name="current_address" type="text" class="form-control"  placeholder="Address" value="{{ @$user->info->address ? $user->info->address : old('current_address') }}">
	                                </div>
	                                
	                            </div>
	                            <div class="row mt-2">
	                            	<div class="form-group col-md-4">
	                                    <label for="town_city" class="control-label mb-1">Town/City</label>
	                                    <input id="town_city" name="town_city" type="text" class="form-control"  placeholder="Town/City"  value="{{@$user->info->town_city ? $user->info->town_city : old('town_city') }}">
	                                    <span class="text-danger"> {{ $errors->first('town_city') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="postcode" class="control-label mb-1">Postcode</label>
	                                    <input id="postcode" name="postcode" type="text" class="form-control" placeholder="Postcode"  value="{{@$user->info->postcode ? $user->info->postcode : old('postcode') }}">
	                                    <span class="text-danger"> {{ $errors->first('postcode') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="country" class="control-label mb-1">Country</label>
	                                    <select name="country" id="country" class="form-control">
	                                    	<option>Select Country</option>
	                                    	@foreach($countries as $country)
	                                    	<option value="{{$country->id}}" @if($country->id==@$user->info->country_id || old('country')==$country->id) selected @endif>{{@$country->name}}</option>
	                                    	@endforeach
	                                    </select>
	                                    <span class="text-danger"> {{ $errors->first('country') }}</span>
	                                </div>
	                                <div class="form-group col-md-6">
	                                    <label for="calling_code" class="control-label mb-1">Phone Number</label>
		                                    <div class="row">
		                                    	<div class="col-md-3">
		                                    		 <select name="calling_code" id="calling_code" class="form-control">
				                                    	<option>Select Country</option>
				                                    	@foreach($countries as $country)
				                                    	<option value="{{$country->id}}" @if(@$country->id==@$user->info->calling_code || $country->id==old('country')) selected @endif>{{@$country->name}} ({{@$country->calling_code}})</option>
				                                    	@endforeach
				                                    </select>
		                                    	</div>
		                                    	
		                                    	<div class="form-group col-md-9">
				                                   
				                                    <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Phone"  value="{{@$user->info->phone ? $user->info->phone : old('phone') }}">
				                                    <span class="text-danger"> {{ $errors->first('phone') }}</span>
				                                </div>
					                                   
					                                </div>
				                                    <span class="text-danger"> {{ $errors->first('phone') }}</span>
				                                </div>
	                           		
	                                
					                                <div class="form-group col-md-4">
					                                    <label for="image" class="control-label mb-1">New Photo</label>
					                                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="{{old('image')}}"  accept="image/png, image/jpeg,image/jpg,image/bmp" value="{{old('image')}}">
					                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
					                                </div>
					                                <div class="form-group col-md-4">
					                                	@if($user->image)
					                                	<img src="{{asset('images/users')}}/{{$user->image}}" width="150" class="img-responsive img" >
					                                	@else
					                                		<p class="mt-4"><i class="fa fa-warning text-warning"></i> No Profile Photo Found</p>
					                                	@endif
					                                </div>
	                                
	                            </div>

	                            <div class="row">
	                            	<div class="col-md-12 mb-3">
	                            		<strong>CHOOSE BETWEEN THE FOLLOWING OPTION BELOW:</strong>

	                            	</div>
	                            	<div class="col-md-12">
	                            		<label class="control-label mb-2">
	                            			<input type="radio" name="purpose" value="1" @if(@$user->info->purpose==1 || old('purpose')==1 ) checked @endif>
	                            			I do currently hold an AUSTRALIAN Visa or Citizenship AND
											I'm looking for a WORK in AUSTRALIA
	                            		</label>
	                            		<label class="control-label mb-2">
	                            			<input type="radio" name="purpose" value="2" @if(@$user->info->purpose==2 || old('purpose')==2)  checked @endif>
	                            			"I do currently hold an AUSTRALIAN Visa or Citizenship AND
											I'm looking for an UNIVERSITY to STUDY in AUSTRALIA"			
	                            		</label>
	                            		<label class="control-label mb-2">
	                            			<input type="radio" name="purpose" value="3" @if(@$user->info->purpose==3 || old('purpose')==3) checked @endif>
	                            			"I do currently hold an AUSTRALIAN Visa or Citizenship AND
											I'm looking for an INTERNSHIP OR TRAINING in AUSTRALIA"					
	                            		</label>
	                            		<label class="control-label mb-2">
	                            			<input type="radio" name="purpose" value="4" @if(@$user->info->purpose==4 || old('purpose')==4) checked @endif>
	                            			"Currently I do NOT hold an AUSTRALIAN Visa or Citizenship, BUT
											I'm looking for an AUSTRALIAN VISA and would like to STUDY or WORK in AUSTRALIA"			
	                            		</label>
	                            		<label class="control-label mb-2">
	                            			<input type="radio" name="purpose" value="5" @if(@$user->info->purpose==5 || old('purpose')==5) checked @endif>
	                            			"I do currently hold an AUSTRALIAN Visa or Citizenship AND
											I'm looking for DISABILITY EMPLOYMENT SERVICES in AUSTRALIA"						
	                            		</label>
	                            	</div>

	                            </div>
	                            <div class="row mt-5">
	                            	<div class="col-md-6 col-lg-6">
	                            		<label class="control-label mb-1" >What is your current AUSTRALIAN Visa or Citizenship?<small class="text-danger">*</small></label>
	                            		<select name="visa" required="" class="form-control">
	                            			<option value="" @if(@$user->info->visa==0 || old('visa')==0) selected @endif>Select Visa</option>
	                            			<option value="1" @if(@$user->info->visa==1 || old('visa')==1) selected @endif>Citizen</option>
	                            			<option value="2" @if(@$user->info->visa==2 || old('visa')==2) selected @endif>Permanent Resident</option>
	                            			<option value="3" @if(@$user->info->visa==3  || old('visa')==3) selected @endif>Temporary resident</option>
	                            			<option value="4" @if(@$user->info->visa==4  || old('visa')==4) selected @endif>Dependent visa</option>
	                            			<option value="5" @if(@$user->info->visa==5  || old('visa')==5) selected @endif>Holiday visa</option>
	                            			<option value="6" @if(@$user->info->visa==6  || old('visa')==6) selected @endif>Student visa A</option>
	                            			<option value="7" @if(@$user->info->visa==7  || old('visa')==7) selected @endif>Student visa B</option>
	                            			<option value="8" @if(@$user->info->visa==8  || old('visa')==8) selected @endif>Student visa C</option>
	                            			<option value="9" @if(@$user->info->visa==9  || old('visa')==9) selected @endif>Student visa D</option>
	                            		</select>
	                            		<span class="text-danger"> {{ $errors->first('visa') }}</span>
	                            	</div>
	                            	<div class="col-lg-6 col-md-6">
	                            		<label class="control-label mb-1" >When does your current visa expire?<small class="text-danger">*</small></label>
	                            		<input type="text" name="visa_exp" class="form-control visa_exp date" placeholder="Y-mm-dd" value="{{ @$user->info->visa_exp ? $user->info->visa_exp : old('visa_exp') }}" required="">
	                            		<span class="text-danger"> {{ $errors->first('visa_exp') }}</span>
	                            	</div>
	                            	<div class="col-lg-6 col-md-6" id="demo">
    		
            
    								</div>
	                            </div>
	                            <div class="row mt-4">
	                            	<div class="col-md-6">
	                            		<label>How many hours are you ELIGIBLE to work in AUSTRALIA?<small class="text-danger">*</small></label>
	                            		<input type="number" name="work_per_week" placeholder="8" class="form-control" value="{{ @$user->info->work_per_week ? $user->info->work_per_week : old('work_per_week') }}" required="">
	                            		<span class="text-danger"> {{ $errors->first('work_per_week') }}</span>
	                            	</div>
	                            	<div class="col-md-6">
							            <label>How do you usually travel in AUSTRALIA?<small class="text-danger">*</small></label>
							            <select class="form-control" name="travel_to_work" required="">
							                <option value="1" @if(@$user->info->travel_to_work==1 || old('travel_to_work')==1) selected @endif>Car</option>
							                <option value="2" @if(@$user->info->travel_to_work==2 || old('travel_to_work')==2) selected @endif>Public transport</option>
							               
							                <option value="3" @if(@$user->info->travel_to_work==3 || old('travel_to_work')==3) selected @endif>Scooter/bike</option>
							            </select>
							        </div>
	                            </div>
	                            <div class="row mt-4">
	                            	<div class="col-md-6">
	                            		<label>Medical check completed</label>
	                            		<input type="text" name="medical_check" placeholder="Y m d" class="form-control medical_check" value="{{ @$user->info->medical_check_date ? $user->info->medical_check_date : old('medical_check') }}">
	                            		<span class="text-danger"> {{ $errors->first('medical_check') }}</span>
	                            	</div>
	                            	<div class="col-md-6">
	                            		<label>Police check completed</label>
	                            		<input type="text" name="police_check" placeholder="Y m d" class="form-control police_check" value="{{ @$user->info->police_check_date ? $user->info->police_check_date : old('police_check') }} ">
	                            		<span class="text-danger"> {{ $errors->first('police_check') }}</span>
	                            	</div>
	                            </div>
	                            
	                            <div class="row">
	                            	<div class="col-lg-12 text-right mt-3">
	                            		<button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
	                            		<button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Update</button>
	                            	</div>
	                            </div>
	                           
                           </form>
                        </div>
                    </div>
			</div>
		</div> --}}
		
		
	</div>
@endsection
{{--SHOW PASSWORD FUNCTION--}}
@push('footer')

{{--visa onchange--}}
<script type="text/javascript">
    function select_visa() {
        var x = document.getElementById("visa").value;
        var show_field= '<label class="control-label mb-1" >When does your current visa expire?<small class="text-danger">*</small></label><input type="text" name="visa_exp" class="form-control visa_exp date" placeholder="Y-mm-dd" value="{{@$user->info->visa_exp}}">';
        var hide= '';
        if(x==1 || x==2){
           document.getElementById("demo").innerHTML = hide;
           
        }
        else{
           document.getElementById("demo").innerHTML = show_field;

           
        }
     
    }
   
</script>

<script src="{{ asset('/admin/assets')}}/js/datepicker/picker.js"></script>
<script src="{{ asset('/admin/assets')}}/js/datepicker/picker.date.js"></script>
<script type="text/javascript">
	jQuery(function ($){
    $('.visa_exp').pickadate({
        selectYears: 10,
        format: 'yyyy-mm-dd',
        //formatSubmit: 'Y-mm-dd'
    });
    $('.medical_check').pickadate({
        //selectYears: 10,
        format: 'yyyy-mm-dd',
        //formatSubmit: 'Y-mm-dd'
    });
    $('.police_check').pickadate({
        //selectYears: 10,
        format: 'yyyy-mm-dd',
        //formatSubmit: 'Y-mm-dd'
    });
     
     });
</script>
@endpush
