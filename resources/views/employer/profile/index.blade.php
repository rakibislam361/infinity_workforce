
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
	@if(Auth::user() && @$employer->office->status==1)
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body">
					<div class="row" style="display:flex;">
					<div class="col-lg-12">
						<h4 class="font-weight-bold mb-0 float-left">{{@$employer->office->company_name}} </h4>
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
								<img class="img-responsive" src="{{asset('images/employer')}}/{{$employer->office->image}}" alt="Profile Image" height="136">

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
									{{@$employer->office->email}}
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link" data-toggle="tab">
									<i class="ti-mobile"></i>
									{{@$employer->office->phone}}
								</a>
							</li>
							
							<li class="nav-item">
								<a href="#" class="nav-link" data-toggle="tab">
									<i class="ti-id-badge"></i>
									@if(@$employer->employer_info->address)
									{{@$employer->office->address}}
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
								<h4 class="float-left">Basic Information  #{{@$employer->office->id}}</h4>
								<div id="" class="float-right">
									<a href="#" class="float_btn" data-link="" data-toggle="modal" data-target="#basic_info">
									<i class="ti-pencil-alt"></i></a> 
	                      
								</div>
							</div>
							<div class="col-md-12 mt-3 mb-3">
								<div class="card card-body bg-light mb-0">
									<dl class="row mb-0">
										<dt class="col-sm-4">Company Name</dt>
										<dd class="col-sm-8">:&nbsp; {{@$employer->office->company_name}}</dd>
									</dl>
									
									<dl class="row mb-2">
										<dt class="col-sm-4">Phone</dt>
										<dd class="col-sm-8">
											:&nbsp; {{@$employer->office->phone}}
										</dd>
									</dl>
									<dl class="row mb-0">
										<dt class="col-sm-4 text-truncate">Email Address</dt>
										<dd class="col-sm-8">
											:&nbsp; {{@$employer->office->email}}
										</dd>
									</dl>
									<dl class="row mb-0">
										<dt class="col-sm-4 text-truncate">License</dt>
										<dd class="col-sm-8">
											:&nbsp; {{@$employer->office->license}}
										</dd>
									</dl>
									<dl class="row mb-2">
										<dt class="col-sm-4 text-truncate">Address</dt>
										<dd class="col-sm-8">
											:&nbsp; 
											@if(@$employer->employer_info->address)
											{{@$employer->office->address}}
											@else
											<span class="text-warning ml-2"><i class="fa fa-warning"></i></span>
											@endif
										</dd>
									</dl>
									<dl class="row mb-0">
										<dt class="col-sm-4 text-truncate">Description</dt>
										<dd class="col-sm-8">
											:&nbsp; {{@$employer->office->details}}
										</dd>
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
						<h4 class="float-left">Company Users</h4>
						<div id="" class="float-right">
							<a href="#" class="float_btn text-info" data-link="" data-toggle="modal" data-target="#assigned_user">
							<i class="ti-plus"></i>
						</a> 
						</div>
					</div>
					<div class="col-lg-12 mt-3">
						@if($users)
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
										{{@$user->id}}
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
										<form action="{{url('employer/user/status/')}}/{{$user->id}}" method="post" class="status">
											@csrf
											<label class="switch switch-green status">
										      <input type="checkbox" class="switch-input" {{@$user->status==1 ? 'checked' : '' }} value="1" name="status">
										      <span class="switch-label" data-on="On" data-off="Off"></span>
										      <span class="switch-handle"></span>
										    </label>
										</form>
									</td>
									<td>
										
										{!! Form::model($user, ['method' => 'delete','route' => ['employer-user-assigned-remove',@$user->id], 'class' =>'delete_btn']) !!}
                                            {!! Form::hidden('id', @$user->id) !!}
                                                 
                                            <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Remove</a>
                                       {!! Form::close() !!}
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
	@else
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
							<h3 class="text-center text-warning">
								<i class="fa fa-warning"></i> Your company is deactived
							</h3>
							<p class="text-center">
								Please Contact With Admin
							</p>
					</div>
				</div>
			</div>
		</div>
	@endif
						

{{-- modals--}}


{{--/ modals--}}

@include('employer.profile.assigned_user')
@include('employer.profile.edit_basic_info')
@endsection
@push('footer')
{{-- <script src="{{asset('admin')}}/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="{{asset('admin')}}/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
          $('#datatable').DataTable();
      } );
  </script> --}}

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
		    // status 
		    $('.status').on('click',function(){
		            $form = $(this);
		           $form.submit();
		        });
		});
		
	</script> 
@endpush
