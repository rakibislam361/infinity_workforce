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
				                        <h1>Employer List</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="">Employer</a></li>
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
	                        	<a href="{{route('admin-employer-create')}}" title="Add New User" class="btn btn-info btn-sm">Add New</a>
	                        </div>
                        </div>
                       
                        <div class="card-body">
                            <table class="table table-striped" id="employers">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">email</th>
                                        
                                        <th scope="col">Address</th>
                                        <th scope="col">License</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($companies as $key=>$company)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{@$company->company_name}}</td>
                                        <td>{{@$company->phone}}</td>
                                        <td>{{@$company->email}} </td>
                                        <td>{{@$company->address}} </td>
                                        <td>{{@$company->license}} </td>
                                        <td>
                                        	<form action="{{url('admin/employer/status')}}/{{$company->id}}" method="post" class="status">
												@csrf
												<label class="switch switch-green status">
											      <input type="checkbox" class="switch-input" {{@$company->status==1 ? 'checked' : '' }} value="1" name="status">
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
						                            <a class="nav-link" href="{{route('admin-employer-profile',$company->id)}}"><i class="ti-eye mr-1"></i>Profile</a>
						                            
						                           

						                             {!! Form::model($company, ['method' => 'delete','route' => ['admin-employer-delete',$company->id], 'class' =>'delete_btn']) !!}
                                                      {!! Form::hidden('id', $company->id) !!}
                                                     
                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete</a>
                                                      {!! Form::close() !!}
						                           
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