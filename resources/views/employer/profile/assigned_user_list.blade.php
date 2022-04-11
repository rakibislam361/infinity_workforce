@extends('layouts.master')
 @push('title')
        {{@$heading}}
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
				                        <h1>Assigned User</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="">Assigned User</a></li>
				                            <li class="active">{{@$heading}}</li>
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
                            <strong class="card-title float-left">{{@$heading}}</strong>
                             <div class="text-right">
	                        	<a href="" title="Add New User" class="btn btn-info btn-sm">Add New</a>
	                        </div>
                        </div>
                       
                        <div class="card-body">
                        	@if($users->count()>0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($users as $user)
								<tr>
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
	    $('.status').on('click',function(){
	            $form = $(this);
	           $form.submit();
	        });
	});
		
</script> 
@endpush