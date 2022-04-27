@extends('layouts.master')
 @push('title')
        Assign Candidate
    @endpush

@section('content')
		
	<div class="animated fadeIn">
		
		<div class="row">
			<div class="breadcrumbs">
			    <div class="breadcrumbs-inner">
			        <div class="row m-0">
			            <div class="col-sm-4">
			                <div class="page-header float-left">
			                    <div class="page-title">
			                        <h1>Candidate List</h1>
			                    </div>
			                </div>
			            </div>
			            <div class="col-sm-8">
			                <div class="page-header float-right">
			                    <div class="page-title">
			                        <ol class="breadcrumb text-right">
			                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
			                            <li><a href="">Candidate</a></li>
			                            <li class="active">List</li>
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
					<div class="card-body">
						<form action="{{url('admin/assigned_candidate/search')}}" method="get">
							<div class="row">
								<div class="form-group col-md-3">
								<input type="number" name="can_id" class="form-control" placeholder="Search By ID" value="{{@$data_id}}">
							</div>
							<div class="form-group col-md-3">
								<input type="text" name="name" class="form-control" placeholder="Search By Name" value="{{@$data_name}}">
							</div>
							<div class="form-group col-md-3">
								<input type="email" name="email" class="form-control" placeholder="Search By Email" value="{{@$data_email}}">
							</div>
								<div class="form-group col-md-3">
								<input type="text" name="suburb" class="form-control" placeholder="Search By Suburb" value="{{@$data_suburb}}" >
							</div>
							<div class="col-md-3">
			            		<select name="visa" required="" class="form-control">
			            			<option value="0" @if($data_visa==0) selected @endif >Select Visa Type</option>
			            			<option value="1" @if($data_visa==1) selected @endif>Citizen</option>
			            			<option value="2" @if($data_visa==2) selected @endif>Permanent Resident</option>
			            			<option value="3" @if($data_visa==3) selected @endif>Temporary resident</option>
			            			<option value="4" @if($data_visa==4) selected @endif>Dependent visa</option>
			            			<option value="5" @if($data_visa==5) selected @endif>Holiday visa</option>
			            			<option value="6" @if($data_visa==6) selected @endif>Student visa A</option>
			            			<option value="7" @if($data_visa==7) selected @endif>Student visa B</option>
			            			<option value="8" @if($data_visa==8) selected @endif>Student visa C</option>
			            			<option value="9" @if($data_visa==9) selected @endif>Student visa D</option>
			            		</select>
			            		<span class="text-danger"> {{ $errors->first('visa') }}</span>
			            	</div>
			            	
			            	{{-- <div class="col-md-3">
			            		<select name="user_type" required="" class="form-control">
			            			<option value="0">Latest User</option>
			            			<option value="0">Old User</option>
			            		</select>
			            		<span class="text-danger"> {{ $errors->first('user_type') }}</span>
			            	</div> --}}
			            	<div class="col-md-3">
			            		<button type="submit" class="btn btn-info"><i class="ti-search mr-1"></i> Search</button>
			            	</div>

		            	</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-md-12">
				<div class="card">
	                    <div class="card-header ">
	                        <strong class="card-title float-left">Candidate List</strong>
	                         <div class="text-right">
	                        	<a href="{{route('admin-user-create')}}" title="Add New User" class="btn btn-info btn-sm">Add New</a>
	                        </div>
	                    </div>
	                   
	                    <div class="card-body">
	                    	<form action="{{route('admin-assigned-candidates')}}" method="post">
	                        	@csrf
	                        	<div class="row mb-4">
	                        		<div class="col-md-12">
	                        			<label class="">Assign Employers</label>
	                        		</div>
	                        		<div class="col-md-4">
	                        			
					            		<select name="employer"  class="form-control" required>
					            			<option value="">Select Employer</option>
					            			@foreach($employers as $employer)
						            			<option value="{{$employer->id}}">
						            				{{$employer->company_name}}
						            			</option>
						            		@endforeach
					            			
					            		</select>
					            		<span class="text-danger"> {{ $errors->first('visa') }}</span>
					            	</div>
					            	<div class="col-md-3">

					            		<button type="submit" class="btn btn-info"><i class="ti-save mr-1"></i> Assign</button>
					            	</div>
					            	<div class="col-md-12">
					            		@if ($message = Session::get('error'))

					            			<p class="text-danger text-left"><i class="fa fa-warning"></i> Please select at least one candidate</p>
					            		@endif
					            	</div>
	                        	</div>

	                            <table class="table table-striped">
	                                <thead>
	                                    <tr>
	                                        <th scope="col">SN</th>
	                                        <th scope="col">IDN</th>
	                                        <th scope="col">Name</th>
	                                        <th scope="col">Email</th>
	                                        <th scope="col">Contact</th>
	                                        <th scope="col">Status</th>
	                                        <th scope="col">Assigned</th>
	                                        
	                                        <th scope="col">Action</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                	
	                                	@foreach($candidates as $key=>$candidate)
	                                    <tr>
	                                        <td scope="row"><label><input type="checkbox" value="{{@$candidate->id}}" name="assigned[]"> {{++$key}}</label></td>
	                                        <th scope="row"> #{{$candidate->id}}</th>
	                                        <td>
	                                        	{{@$candidate->info->first_name}}
	                                        	{{@$candidate->info->mid_name}}
	                                        	{{@$candidate->info->last_name}}
	                                        </td>
	                                        <td>{{@$candidate->email}}</td>
	                                        <td>
	                                        	{{@$candidate->info->call_code->calling_code}}- 
	                                        	{{@$candidate->info->phone}}
	                                        </td>
	                                        <td>
	                                        	@if(@$candidate->status==1)
	                                        		<div class="badge badge-success">Approved</div>
	                                        	@else
	                                        		<div class="badge badge-warning">Pending</div>
	                                        	@endif
	                                        </td>
	                                        
	                                       <td>
	                                      	.....
	                                       	
	                                       </td>
	                                        <td>
	                                        	<div class="dropdown">
							                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                           <i class="fa fa-list-ul"></i>
							                        </a>

							                        <div class="user-menu dropdown-menu">
							                            <a class="nav-link" href="{{route('admin-user-show',$candidate->id)}}"><i class="ti-eye mr-1"></i>View</a>
							                            <a class="nav-link" href="{{route('admin-user-edit',$candidate->id)}}"><i class="ti-pencil-alt mr-1"></i>Edit</a>
							                            
							                        </div>
							                    </div>
	                                        </td>
	                                    </tr>
	                                    @endforeach

	                                </tbody>
	                            </table>
	                        </form>
	                                        {{ $candidates->appends(['idn' => @$data_id,'name' => @$data_name,'email' => @$data_name,'suburb' => @$data_suburb,'phone' => @$data_phone,'visa' => @$data_visa]) }}

	                    </div>
	                </div>
			</div>
		</div>
		
	</div>

@endsection
@push('footer')
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