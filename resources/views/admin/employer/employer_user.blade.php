@extends('layouts.master')
 @push('title')
        Employer List
    @endpush

@push('head')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<style type="text/css">
	.card{
		font-size: 14px;
	}
</style>
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
				                        <h1>Employer User List</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="">Employer</a></li>
				                            <li class="active">Users</li>
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
                            <strong class="card-title float-left">Company Users</strong>
                             <div class="text-right">
	                        	<a href="{{route('admin-user-create')}}" title="Add New User" class="btn btn-info btn-sm">Add New</a>
	                        </div>
                        </div>
                       
                        <div class="card-body">
                            <table class="table table-striped" id="employer_user">
                                <thead>
                                    <tr>
                                        <th scope="col">IDN</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">email</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($employers as $employer)
                                    <tr>
                                        <th scope="row">#{{$employer->id}}</th>
                                        <td>{{@$employer->info->first_name}}</td>
                                        <td>{{@$employer->info->phone}}</td>
                                        <td>{{@$employer->email}} </td>
                                       
                                        <td>{{@$employer->office->company_name}} </td>
                                        <td>
                                        	<form action="{{url('admin/user/status/')}}/{{$employer->id}}" method="post" class="status">
												@csrf
												<label class="switch switch-green status">
											      <input type="checkbox" class="switch-input" {{@$employer->status==1 ? 'checked' : '' }} value="1" name="status">
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
						                            <a class="nav-link" href="{{url('admin/users/edit',$employer->id)}}"><i class="ti-eye mr-1"></i>Profile</a>
						                            
						                            @if(Auth::user()->id==$employer->id)
						                            	
						                            @else

						                             {!! Form::model($employer, ['method' => 'delete','route' => ['admin-user-delete',$employer->id], 'class' =>'delete_btn']) !!}
                                                      {!! Form::hidden('id', $employer->id) !!}
                                                     
                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete</a>
                                                      {!! Form::close() !!}
						                           @endif
						                        </div>
						                    </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
			</div>
		</div>
	</div>

@endsection
@push('footer')
{{--data tables--}}
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$('#employers').DataTable();
		$('#employer_user').DataTable();
	</script>
{{--data tables--}}
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
	<script>
	jQuery(function ($){
	// status 
		    $('.status').on('click',function(){
		            $form = $(this);
		           $form.submit();
		        });
		});
	</script>


@endpush