
@extends('layouts.master')
 @push('title')
        Employer Profile
    @endpush
@push('head')
<style type="text/css">
	.profile-image-box {

    -webkit-clip-path: polygon(0 9%, 100% 0, 100% 94%, 0% 100%);
    clip-path: polygon(0 9%, 100% 0, 100% 94%, 0% 100%);
    border: 0;
    background: #fff;
    text-align: center;
    min-height: 137px;

}
.nav-sidebar .nav-item{
	width: 100%;
}
</style>
@endpush
@section('content')
	<div class="profile-box">
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
					<div class="row" style="display:flex;">
					<div class="col-lg-12">
						<h4 class="font-weight-bold mb-0 float-left">{{@$employer->company_name}} </h4>
						{{-- <div id="detail_btn" class="float-right">
							<a class="btn btn-default modal_view" style="display:contents;" type="button" data-link="#">
							<i class="ti-pencil-alt"></i></a> 
						</div> --}}
						<div class="float-right">
							@if(@$employer->employer_info->status==1)
		                	<div class="badge badge-info">Active</div>
		                	@else
		                	<div class="badge badge-warning">Inactive</div>
		                	@endif
						</div>
					</div> 
					</div>
			    		
				    </div>
					<div class="profile-image-box">
							<div class="d-inline-block mb-3" style="position:relative;">
								@if(@$employer->user->image)
								<img class="img-responsive" src="{{asset('images/employer')}}/{{$employer->user->image}}" alt="Profile Image" height="136">

								@else
								<img class="img-responsive" src="{{asset('images/employer/company-default.png')}}" alt="Profile Image" height="136">
								@endif

								<div id="change_pic_btn" style="position:absolute;right:10px;bottom:10px;">
								<a class="btn btn-default modal_view_img_edit" style="display:contents;" type="button" data-link="#">
								<i class="ti-camera"></i></a>
								</div>
							</div>
				    </div>
			    	<div class="card-body p-0">
						<ul class="nav nav-sidebar mb-2">
							
							<li class="nav-item">
								<a href="#" class="nav-link active" data-toggle="tab">
									<i class="ti-email mr-2"></i>
									{{@$employer->email}}
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link" data-toggle="tab">
									<i class="ti-mobile"></i>
									{{@$employer->phone}}
								</a>
							</li>
							
							<li class="nav-item">
								<a href="#" class="nav-link" data-toggle="tab">
									<i class="ti-id-badge"></i>
									@if(@$employer->employer_info->address)
									{{@$employer->address}}
									@else
									<span class="text-warning ml-2"><i class="fa fa-warning"></i></span>
									@endif
								</a>
									
							</li>

							
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="card">

					<div class="card-body">
						<div class="row  mx-auto">
							<div class="col-lg-12">
								<h4 class="float-left">Basic Information #{{@$employer->id}}</h4>
								<div id="" class="float-right">
									<a href="#" class="float_btn" data-link="" data-toggle="modal" data-target="#basic_info">
									<i class="ti-pencil-alt"></i></a> 
	                      
								</div>
							</div>
							<div class="col-md-12 mt-3 mb-3">
								<div class="card card-body bg-light mb-0">
									<dl class="row mb-0">
										<dt class="col-sm-4">Company Name</dt>
										<dd class="col-sm-8">:&nbsp; {{@$employer->company_name}}</dd>
									</dl>
									<dl class="row mb-2">
										<dt class="col-sm-4">Phone</dt>
										<dd class="col-sm-8">
											:&nbsp; {{@$employer->phone}}
										</dd>
									</dl>
									<dl class="row mb-0">
										<dt class="col-sm-4 text-truncate">Email Address</dt>
										<dd class="col-sm-8">
											:&nbsp; {{@$employer->email}}
										</dd>
									</dl>
									<dl class="row mb-0">
										<dt class="col-sm-4 text-truncate">License</dt>
										<dd class="col-sm-8">
											:&nbsp; {{@$employer->license}}
										</dd>
									</dl>
									<dl class="row mb-2">
										<dt class="col-sm-4 text-truncate">Address</dt>
										<dd class="col-sm-8">
											:&nbsp; 
											@if(@$employer->employer_info->address)
											{{@$employer->address}}
											@else
											<span class="text-warning ml-2"><i class="fa fa-warning"></i></span>
											@endif
										</dd>
									</dl>
									<dl class="row mb-0">
										<dt class="col-sm-4 text-truncate">Description</dt>
										<dd class="col-sm-8">
											:&nbsp; {{@$employer->details}}
										</dd>
									</dl>
									<dl class="row mb-0">
										<div class="col-md-4">
										   
										</div>
										<div class="col-md-8">
										    
										    <form action="{{url('admin/employer/status')}}/{{$employer->id}}" method="post" class="status">
												@csrf
											
												<label class="switch switch-green status">
											      <input type="checkbox" class="switch-input" {{@$employer->status==1 ? 'checked' : '' }} value="1" name="status">
											      <span class="switch-label" data-on="On" data-off="Off"></span>
											      <span class="switch-handle"></span>
											    </label>
											</form>
										</div>
									</dl>
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
					<div class="card-body row">
						<div class="col-lg-12">
							<h4 class="float-left">Assigned Users</h4>
							<div id="" class="float-right">
								<a href="#" class="float_btn text-info" data-link="" data-toggle="modal" data-target="#assigned_user">
								<i class="ti-plus"></i>
							</a> 
							</div>
						</div>
						<div class="col-lg-12 mt-3">
							@if($users->count()>0)
							<table class="table table-bordered">
								<thead>
								    <th>IDN</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th class="text-center">Status</th>
									<th class="text-center">Action</th>
								</thead>
								
								<tbody>
									@foreach($users as $user)
									<tr>
									    <td>
											#{{@$user->id}}
										</td>
										<td>
											{{@$user->name}}
										</td>
										<td>
											{{@$user->info->phone}}
										</td>
										<td>
											{{@$user->email}}
										</td>
										<td class="text-center">
											<form action="{{url('admin/user/status/')}}/{{$user->id}}" method="post" class="status">
												@csrf
												<label class="switch switch-green status">
											      <input type="checkbox" class="switch-input" {{@$user->status==1 ? 'checked' : '' }} value="1" name="status">
											      <span class="switch-label" data-on="On" data-off="Off"></span>
											      <span class="switch-handle"></span>
											    </label>
											</form>
											
										</td>
										<td>
										
											


	                                       <div class="dropdown">
                                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   <i class="fa fa-list-ul"></i>
                                                </a>

                                                <div class="user-menu dropdown-menu">
                                                    <a class="nav-link" href="{{url('admin/users/edit')}}/{{$user->id}}"><i class="ti-pencil-alt mr-1"></i>Profile</a>

                                                    {!! Form::model($user, ['method' => 'delete','route' => ['admin-assigned-user-delete',@$user->id], 'class' =>'delete_user nav-link']) !!}
			                                            {!! Form::hidden('id', @$user->id) !!}
			                                                 
			                                            <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Remove</a>
			                                       {!! Form::close() !!}
                                                </div>
                                            </div>

										</td>
									</tr>

									@endforeach
								</tbody>
								
							</table>
							@else
								<p class="text-warning"><i class="fa fa-warning"></i> No Assigned User</p>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body row">
						<div class="col-lg-12">
							<h4 class="float-left">Assigned Candidates</h4>
							<div id="" class="float-right">
								<a href="{{ url('admin/employer/assigned_candidate') }}" class="float_btn">
								<i class="ti-pencil-alt"></i></a> 
							</div>
						</div>
						<div class="col-lg-12 mt-3">
							@if($assigned_candidates->count()>0)
							<table class="table table-bordered" id="datatable">
								<thead>
								    <th>IDN</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Work Per Week</th>
									<th>Action</th>
								</thead>
								
								<tbody>
									@foreach($assigned_candidates as $candidate)
									<tr>
									    <td>#{{$candidate->user_id}}</td>
										<td>

											{{@$candidate->user_info->first_name}}
											{{@$candidate->user_info->mid_name}}
											{{@$candidate->user_info->last_name}}
										</td>
										<td>
											{{@$candidate->user_info->phone}}
										</td>
										<td>
											{{@$candidate->user_basic_info->email}}
										</td>
										<td class="text-center">
											@if(@$candidate->user->info->work_per_week)
											{{@$candidate->user_info->work_per_week}}
											@else
												<span class="text-warning"><i class="fa fa-warning"></i></span>
											@endif
										</td>
										<td>
										    <a href="{{url('admin/users/edit')}}/{{$candidate->user_id}}" class="nav-link" target="_blank"><i class="ti-user mr-1" ></i> Profile</a>
											{!! Form::model($candidate, ['method' => 'delete','route' => ['admin-assigned-delete',@$candidate->id], 'class' =>'delete_btn']) !!}
	                                            {!! Form::hidden('id', @$candidate->id) !!}
	                                                 
	                                            <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete</a>
	                                       {!! Form::close() !!}
	                                       
										</td>
									</tr>

									@endforeach
								</tbody>
								
							</table>
							@else
								<p class="text-warning"><i class="fa fa-warning"></i> No Assigned Candidates</p>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- ASSIGNED USER--}}
	</div>					

{{-- modals--}}
@include('admin.employer.edit_basic_info')
@include('admin.employer.edit_assigned_candidates')
@include('admin.employer.assigned_user')

{{--/ modals--}}


@endsection
@push('footer')
<!--<script src="{{asset('admin')}}/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="{{asset('admin')}}/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
          $('#datatable').DataTable();
      } );
  </script>-->

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
		    $('.delete_user').on('click', function(e) {
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
		    // status 
		    $('.status').on('click',function(){
		            $form = $(this);
		           $form.submit();
		        });
		});
		
	</script> 
@endpush
