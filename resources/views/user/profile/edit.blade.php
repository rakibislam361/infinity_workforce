@extends('layouts.master')
@push('title') User Profile @endpush
@push('head')
<style>
{/*.picker__holder{min-width:0 !important;}*/}
.picker__box{padding:0 5px 0 5px;}
.picker__header{padding-top:3px;padding-bottom:3px;}
.picker__table{margin:0 !important;}
.picker__weekday{padding-top:2px !important;}

.profile_active{
	position: absolute;
	width: 10px;
	height: 10px;
	background: green;
}
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
				                        <h1>Edit Profile Of &nbsp;<span style="text-transform: uppercase;color: #20c997;">{{@$user->info->first_name}} {{@$user->info->mid_name}} {{@$user->info->last_name}}</span></h1>
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
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                        {{--<div class="card-header ">
                            <strong class="card-title float-left">{{$user->name}}</strong>
                             
                        </div> --}}
                       
                        <div class="card-body">
                           <form action="{{url('user/profile/update',$user->id)}}" method="post"  enctype="multipart/form-data" class="new-user"> 
                           		@csrf
                           		<h4>Basic Info </h4>
                           		{{-- @if ($errors->any())
								        {{ implode('', $errors->all('<div>:message</div>')) }}
								@endif --}}
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
	                           		<div class="form-group col-md-6">
	                                    <label for="phone" class="control-label mb-1">Phone</label>
	                                    <input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Phone"  value="{{@$user->info->phone}}">
	                                    <span class="text-danger"> {{ $errors->first('phone') }}</span>
	                                </div>
	                                
	                                <div class="form-group col-md-6">
	                                    <label for="email" class="control-label mb-1">Email <small class="text-danger">*</small> </label>
	                                    <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Email" required="" value="{{$user->email}}">
	                                    <span class="text-danger"> {{ $errors->first('email') }}</span>
	                                </div>
	                            </div>
	                            <div class="row mt-2">
	                           		<div class="form-group col-md-12">
	                                    <label for="address" class="control-label mb-1">Address</label>
	                                    <input id="address" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Address" value="{{@$user->info->address}}">
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
		</div>
		@if($user->role_id==2)
			<div class="row">
			<div class="col-md-12">
				<div class="card">
                    <div class="card-body">
                       <form action="{{route('user-work-history-store',$user->id)}}" method="post"  enctype="multipart/form-data" class="new-user"> 
                       		@csrf
                       		<strong class="card-title text-left">What visa do you currently hold? </strong>

                       		<div class="row mt-2">
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

                            	<div class="col-lg-12 mt-3">

                            		<hr/>
                            		<strong>Work History of {{$user->name}}</strong>
                            		@if($user->work_history->count()>0)
                            		<table class="table table-responsive mt-3" width="100%">
	                            			<thead>
                            					<tr>
                            						<th>
		                            					SL
		                            				</th>
		                            				<th>
		                            					Company
		                            				</th>
		                            				<th>
		                            					Position
		                            				</th>
		                            				<th>
		                            					Start
		                            				</th>
		                            				<th>
		                            					End
		                            				</th>
		                            				<th>
		                            					Action
		                            				</th>
                            					</tr>
                            				<tbody>
	                            			@foreach($user->work_history as $key=>$work_history)
	                            				<tr>
	                            					<td>{{++$key}}</td>
	                            					<td>{{$work_history->company}}</td>
	                            					<td>{{$work_history->position}}</td>
	                            					<td>
	                            						{{date('d M Y',strtotime($work_history->start))}}
	                            					</td>
	                            					<td>
	                            						{{date('d M Y',strtotime($work_history->end))}}
	                            					</td>	
	                            				
	                            					<td>
	                            					
                                                      <a href="{{route('user-work-history-delete',$work_history->id)}}" class="nav-link delete_work"><i class="ti-trash mr-1"></i> Delete</a>
                                                      
                                                      
	                            					</td>
	                            				</tr>
	                            			@endforeach
	                            			<tbody>
	                            	</thead>
	                            		</table>

	                            	@else
	                            	<p class="text-warning"><i class="fa fa-warning"></i> No Work History Found</p>
	                            	@endif
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
			{{-- Work Time--}}
			<div class="col-md-12">
				<div class="card">	
					<div class="card-body">
						<strong>Able to work</strong>
						

						<form action="{{route('user-able-to-work',$user->id)}}" method="post">
							@csrf
							<label for="work_per_week" class="control-label mb-1">How many hours per week are you able to work ?</label>
							<input id="work_per_week" type="number" name="work_per_week" class="form-control col-md-6" placeholder="15" value="{{@$user->info->work_per_week}}">
							<span class="text-danger"> {{ $errors->first('work_per_week') }}</span>

							<div class="clearfix mt-3"></div>
							<strong>What days and/or time are you able to work?</strong>
							<table class="mt-3 table table-responsive table-bordered">
									<thead>
										<tr>
											<th>Day</th>
											<th>Sun</th>
											<th>Mon</th>
											<th>Tue</th>
											<th>Wed</th>
											<th>Thu</th>
											<th>Fri</th>
											<th>Sat</th>
										</tr>
										<tbody>
											<tr>
												<th>Time</th>
												<td>
													<input id="sun" type="text" name="sun" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->sun}}">
													<span class="text-danger"> {{ $errors->first('sun') }}</span>
												</td>
												<td>
													<input id="mon" type="text" name="mon" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->mon}}">
													<span class="text-danger"> {{ $errors->first('mon') }}</span>
												</td>
												<td>
													<input type="text" name="tue" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->tue}}">
													<span class="text-danger"> {{ $errors->first('tue') }}</span>
												</td>
												<td>
													<input  type="text" name="wed" class="form-control" placeholder="10am-5pm"  value="{{@$user->able_to_work->wed}}">
													<span class="text-danger"> {{ $errors->first('wed') }}</span>
												</td>
												<td>
													<input  type="text" name="thu" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->thu}}">
													<span class="text-danger"> {{ $errors->first('thu') }}</span>
												</td>
												<td>
													<input  type="text" name="fri" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->fri}}">
													<span class="text-danger"> {{ $errors->first('fri') }}</span>
												</td>
												<td>
													<input  type="text" name="sat" class="form-control" placeholder="10am-5pm" value="{{@$user->able_to_work->sat}}">
													<span class="text-danger"> {{ $errors->first('sat') }}</span>
												</td>
												

											</tr>

										</tbody>
									</thead>								
							</table>
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
			<div class="col-md-12">
				<div class="card">
					
					<div class="card-body">
						<strong>Upload Document</strong>
						<form action="{{route('user-document-upload')}}" enctype="multipart/form-data" method="post">
							@csrf
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
							</div>
							<div class="row">
				            	<div class="col-lg-12 text-right mt-3">
				            		<button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
				            		<button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Update</button>
				            	</div>
				            </div>
				        </form>
					</div>
					<div class="card-body">
						<strong>User Documents</strong>
						@if($user->documents->count()>0)
							<table class="table table-responsive mt-4">
								<thead>
									<tr>
										<th>Document Type</th>
										<th>File</th>
										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if($user->doc_images->count()>0)
										<tr>
											<td>
												Images
											</td>
											<td class="text-center">
												@foreach($user->doc_images as $doc)
													<a href="{{url('/images/user-documents/images',$doc->file)}}" target="_blank">
														<i class="ti-download" title="Dwonload"></i>
													</a>
												@endforeach
											</td>
											<td>
												<div class="dropdown">
							                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                           <i class="ti-trash" ></i>
							                        </a>

							                        <div class="user-menu dropdown-menu">
							                           @foreach($user->doc_images as $key=>$doc)				                            
							                          {!! Form::model($doc, ['method' => 'delete','route' => ['user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
	                                                      {!! Form::hidden('id', $doc->id) !!}
															{!! Form::hidden('type', $doc->type) !!}
	                                                     
	                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
	                                                      {!! Form::close() !!}
	                                                      @endforeach
							                        </div>
							                   </div>
											</td>	
										</tr>
									@endif

									@if($user->doc_visas->count()>0)
										<tr>
											<td>
												Visa
											</td>
											<td>
												@foreach($user->doc_visas as $doc)
												<a href="{{asset('images/user-documents/visa')}}/{{$doc->file}}" target="_blank">
													<i class="ti-download" title="Dwonload"></i>
												</a>
												@endforeach
											</td>
											<td>
												<div class="dropdown">
							                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                           <i class="ti-trash"></i>
							                        </a>

							                        <div class="user-menu dropdown-menu">
							                           @foreach($user->doc_visas as $key=>$doc)				                            
							                          {!! Form::model($doc, ['method' => 'delete','route' => ['user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
	                                                      {!! Form::hidden('id', $doc->id) !!}
															{!! Form::hidden('type', $doc->type) !!}
	                                                     
	                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
	                                                      {!! Form::close() !!}
	                                                      @endforeach
							                           
							                        </div>
							                   </div>
											</td>
										</tr>
									@endif

									@if($user->doc_resumes->count()>0)
										<tr>
											<td>
												Resumes
											</td>
											<td>
												@foreach($user->doc_resumes as $doc)
												<a href="{{asset('images/user-documents/resumes')}}/{{$doc->file}}" target="_blank">
													<i class="ti-download" title="Dwonload"></i>
												</a>
												@endforeach
											</td>
											<td>
												<div class="dropdown">
							                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                           <i class="ti-trash"></i>
							                        </a>

							                        <div class="user-menu dropdown-menu">
							                           @foreach($user->doc_resumes as $key=>$doc)				                            
							                          {!! Form::model($doc, ['method' => 'delete','route' => ['user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
	                                                      {!! Form::hidden('id', $doc->id) !!}
															{!! Form::hidden('type', $doc->type) !!}
	                                                     
	                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
	                                                      {!! Form::close() !!}
	                                                      @endforeach
							                           
							                        </div>
							                   </div>
											</td>
										</tr>
									@endif

									@if($user->doc_police_clearance->count()>0)
										<tr>
											<td>
												Police Clearance
											</td>
											<td>
												@foreach($user->doc_police_clearance as $doc)
												<a href="{{asset('images/user-documents/police-clearance')}}/{{$doc->file}}" target="_blank">
													<i class="ti-download" title="Dwonload"></i>
												</a>
												@endforeach
											</td>
											<td>
												<div class="dropdown">
							                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                           <i class="ti-trash"></i>
							                        </a>

							                        <div class="user-menu dropdown-menu">
							                           @foreach($user->doc_police_clearance as $key=>$doc)				                            
							                          {!! Form::model($doc, ['method' => 'delete','route' => ['user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
	                                                      {!! Form::hidden('id', $doc->id) !!}
															{!! Form::hidden('type', $doc->type) !!}
	                                                     
	                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
	                                                      {!! Form::close() !!}
	                                                      @endforeach
							                           
							                        </div>
							                   </div>
											</td>
										</tr>
									@endif

									@if($user->doc_medical_certificatee->count()>0)
										<tr>
											<td>Medical Certificatee
											</td>
											<td>
												@foreach($user->doc_medical_certificatee as $doc)
												<a href="{{asset('images/user-documents/medical-certificate')}}/{{$doc->file}}">
													<i class="ti-download" title="Dwonload"></i>
												</a>
												@endforeach
											</td>
											<td>
												<div class="dropdown">
							                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                           <i class="ti-trash"></i>
							                        </a>

							                        <div class="user-menu dropdown-menu">
							                           @foreach($user->doc_medical_certificatee as $key=>$doc)				                            
							                          {!! Form::model($doc, ['method' => 'delete','route' => ['user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
	                                                      {!! Form::hidden('id', $doc->id) !!}
														{!! Form::hidden('type', $doc->type) !!}
	                                                     
	                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
	                                                      {!! Form::close() !!}
	                                                      @endforeach
							                           
							                        </div>
							                   </div>
											</td>
										</tr>
									@endif

									@if($user->doc_d_license->count()>0)
										<tr>
											<td>
												Drive License
											</td>
											<td>
												@foreach($user->doc_d_license as $doc)
													<a href="{{asset('images/user-documents/d-license')}}/{{$doc->file}}">
													<i class="ti-download" title="Dwonload"></i>
													</a>
												@endforeach
											</td>
											<td>
												<div class="dropdown">
							                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                           <i class="ti-trash"></i>
							                        </a>

							                        <div class="user-menu dropdown-menu">
							                           @foreach($user->doc_d_license as $key=>$doc)				                            
							                          {!! Form::model($doc, ['method' => 'delete','route' => ['user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
	                                                      {!! Form::hidden('id', $doc->id) !!}
	                                                      {!! Form::hidden('type', $doc->type) !!}
	                                                     
	                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
	                                                      {!! Form::close() !!}
	                                                      @endforeach
							                           
							                        </div>
							                   </div>
											</td>
										</tr>
									@endif
								</tbody>
							</table>
						@else
							<p class="text-warning"><i class="fa fa-warning"></i> No Documents</p>
						@endif
					</div>
				</div>
			</div>

		</div>
		@endif
	</div>
@endsection
{{--SHOW PASSWORD FUNCTION--}}
@push('footer')

<script src="{{ asset('/admin/assets')}}/js/datepicker/picker.js"></script>
<script src="{{ asset('/admin/assets')}}/js/datepicker/picker.date.js"></script>
<script type="text/javascript">
	jQuery(function ($){
     $('.start_date').pickadate({
        selectYears: 10,
        format: 'yyyy-mm-dd',
        formatSubmit: 'Y-mm-dd'
    });
     $('.end_date').pickadate({
        selectYears: 10,
        format: 'yyyy-mm-dd',
        formatSubmit: 'Y-mm-dd'
    });
     });
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
	<script src="{{ asset('/admin/assets')}}/js/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript">
		jQuery(function ($){
			$('.delete_btn').on('click', function(e) {
		        e.preventDefault();
		        $form = $(this);
		        swal({
		            title: "Are you sure?",
		            text: "You will not be able to recover this data!",
		            type: "warning",
		            showCancelButton: true,
		            buttonsStyling: false,
		            confirmButtonClass: 'btn btn-primary',
		            cancelButtonClass: 'btn btn-light',
		            confirmButtonText: "Yes, delete!",
		            cancelButtonText: "No, cancel!"
		        });
		        $('button.swal2-confirm').on('click',function(){
		           $form.submit();
		        });
		    });
		    
		    
		});
		
	</script> 

@endpush
