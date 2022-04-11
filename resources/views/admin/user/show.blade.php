@extends('layouts.master')


@section('content')

		
		<div class="animated fadeIn">
			<div class="row">
				<div class="breadcrumbs">
				    <div class="breadcrumbs-inner">
				        <div class="row m-0">
				            <div class="col-sm-4">
				                <div class="page-header float-left">
				                    <div class="page-title">
				                        <h1>{{$user->name}}</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="#">User</a></li>
				                            <li class="active">Show</li>
				                        </ol>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                        <div class="card-header ">
                            <strong class="card-title text-left">New User</strong>
                             <div class="text-right">
                        	
                        </div>
                        </div>
                       
                        <div class="card-body">
                          
                           		<h4>User Info :</h4>

                           		<div class="row mt-2">
	                           		<div class="form-group col-md-4">
	                                    <label for="first-name" class="control-label mb-1">First Name <small class="text-danger">*</small></label>
	                                    <input id="first-name" name="first_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="First Name" required="" value="{{$user->name}}">
	                                     <span class="text-danger"> {{ $errors->first('first_name') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="middle-name" class="control-label mb-1">Middle Name</label>
	                                    <input id="middle-name" name="middle_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Middle Name"  value="{{@$user->info->mid_name}}">
	                                    <span class="text-danger"> {{ $errors->first('middle_name') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="last-name" class="control-label mb-1">Last Name</label>
	                                    <input id="last-name" name="last_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Last Name"  value="{{@$user->info->last_name}}">
	                                     <span class="text-danger"> {{ $errors->first('last_name') }}</span>
	                                </div>

	                            </div>
	                            <div class="row mt-2">
	                           		<div class="form-group col-md-4">
	                                    <label for="phone" class="control-label mb-1">Phone</label>
	                                    <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Phone"  value="{{@$user->info->phone}}">
	                                    <span class="text-danger"> {{ $errors->first('phone') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="address" class="control-label mb-1">Address</label>
	                                    <input id="address" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Address" value="{{@$user->info->address}}">
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="email" class="control-label mb-1">Email <small class="text-danger">*</small> </label>
	                                    <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Email" required="" value="{{$user->email}}">
	                                    <span class="text-danger"> {{ $errors->first('email') }}</span>
	                                </div>
	                            </div>
	                            <div class="row mt-2">
	                           		{{-- <div class="form-group col-md-4">
	                                    <label for="password" class="control-label mb-1">New Password <small class="text-danger">*</small></label>
	                                    <input id="password" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" autocomplete="off">
	                                    <span class="text-danger"> {{ $errors->first('password') }}</span>
	                                    <label>
	                                    	<input type="checkbox" onclick="myFunction()"> <small> Show Password</small>
	                                    </label>
	                                    
	                                </div> --}}

	                                <div class="form-group col-md-4">
	                                    <label for="image" class="control-label mb-1">New Photo</label>
	                                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="{{old('image')}}"  accept="image/png, image/jpeg,image/jpg,image/bmp">
	                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
	                                </div>
	                                 <div class="form-group col-md-4">
	                                	@if($user->image)
	                                	<img src="{{asset('users',$user->image)}}">
	                                	@else
	                                		<small class="text-danger mt-4"><i class="fa fa-warning"></i> No Profile Photo Found</small>
	                                	@endif
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="role" class="control-label mb-1">Select Role <small class="text-danger">*</small></label>
	                                   <select class="form-control" name="role">
	                                   		<option>Select User Role</option>
	                                   		@foreach($roles as $role)
	                                   			<option value="{{$role->id}}" @if($user->role->id==$role->id) selected @endif>{{$role->name}}</option>
	                                   		@endforeach
	                                   </select>
	                                </div>
	                                
	                            </div>
	                            
	                           
                          
                        </div>
                    </div>
			</div>
		</div>
	</div>
@endsection
{{--SHOW PASSWORD FUNCTION--}}
@push('footer')
	<script>
	function myFunction() {
	    var x = document.getElementById("password");
	    if (x.type === "password") {
	        x.type = "text";
	    } else {
	        x.type = "password";
	    }
	}
	</script>
@endpush
