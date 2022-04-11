
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
#ability_table td{padding-left: 9px;padding-right: 9px;}
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
					<h4 class="font-weight-bold mb-0 float-left">{{$user->name}} </h4>
					{{-- <div id="detail_btn" class="float-right">
						<a class="btn btn-default modal_view" style="display:contents;" type="button" data-link="#">
						<i class="ti-pencil-alt"></i></a> 
					</div> --}}
					<div class="float-right">
	                	<a href="{{ route('user-profile-edit') }}" class="float_btn text-info">
							<i class="ti-pencil-alt"></i>
						</a>
					</div>
				</div> 
				</div>
		    		
			    </div>
				<div class="profile-image-box">
					<div class="d-inline-block mb-3" style="position:relative;">
						@if(@$user->image)
						<img class="img-responsive" src="{{asset('images/users')}}/{{$user->image}}" alt="Profile Image" height="136">

						@else
						<img class="img-responsive" src="{{asset('images/users/default-user1.png')}}" alt="Profile Image" height="136">
						@endif

						<div id="change_pic_btn" style="position:absolute;right:2px;bottom:2px;">
						<a href="#" class="float_btn" data-link="" data-toggle="modal" data-target="#image_update">
								<i class="fa fa-camera"></i></a>
						</div>
					</div>
			    </div>
		    	<div class="card-body p-0">
					<ul class="nav nav-sidebar mb-2">
						
						<li class="nav-item">
							<a href="#" class="nav-link active pb-0" data-toggle="tab">
								<i class="ti-email mr-2"></i>
								{{@$user->email}}
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link pb-0" data-toggle="tab">
								<i class="fa fa-phone mr-2"></i>
								{{@$user->info->phone}}
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link pb-0" data-toggle="tab">
								<i class="ti-id-badge"></i>
								@if(@$user->info->address)
								{{@$user->info->address}}
								@else
								<span class="text-warning ml-2"><i class="fa fa-warning"></i></span>
								@endif
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link" data-toggle="tab">
								@if(@$employer=Auth::user()->status==1)
			                	<div class="badge badge-success">Active</div>
			                	@else
			                	<div class="badge badge-danger">Inactive</div>
			                	@endif
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card" style="min-height:358px;">
				<div class="card-body">
					<div class="row  mx-auto">
						<div class="col-lg-12">
							<h4 class="float-left">Basic Information</h4>
							<div id="" class="float-right">
								<a href="#" class="float_btn text-info" data-link="" data-toggle="modal" data-target="#basic_info">
								<i class="ti-pencil-alt"></i></a>
							</div>
						</div>
						<div class="col-md-12 mt-3 mb-3">
							<div class="card card-body bg-light mb-0">
								<dl class="row mb-0">
									<dt class="col-sm-4">Name</dt>
									<dd class="col-sm-8">:&nbsp; {{@$user->name}} {{@$user->info->mid_name}} {{@$user->info->last_name}}</dd>
								</dl>
								<dl class="row mb-0">
									<dt class="col-sm-4">Phone</dt>
									<dd class="col-sm-8">
										:&nbsp; {{@$user->info->phone}}
									</dd>
								</dl>
								<dl class="row mb-0">
									<dt class="col-sm-4 text-truncate">Email Address</dt>
									<dd class="col-sm-8">
										:&nbsp; {{@$user->email}}
									</dd>
								</dl>
								<dl class="row mb-2">
									<dt class="col-sm-4 text-truncate">Address</dt>
									<dd class="col-sm-8">
										:&nbsp; 
										@if(@$user->info->address)
										{{@$user->info->address}}
										@else
										<span class="text-warning ml-2"><i class="fa fa-warning"></i></span>
										@endif
									</dd>
								</dl><hr>
								
							</div>
						</div>
										
					</div>
				</div>
			</div>
		</div>
	</div>

	
	

	</div>
						

{{-- modals--}}
@include('employer.my-profile.edit_basic_info')
@include('employer.my-profile.edit_image')


{{--/ modals--}}


@endsection
@push('footer')
<script src="{{asset('admin')}}/assets/js/lib/data-table/datatables.min.js"></script>
<script src="{{asset('admin')}}/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
          $('#datatable').DataTable();
      } );
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
