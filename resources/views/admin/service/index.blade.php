@extends('layouts.master')

@push('title') Services  @endpush
@section('content')	
		<div class="animated fadeIn">
			
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                        <div class="card-header">
                            <strong class="card-title float-left">Services</strong>
                            <div class="text-right">
	                        	<a href="{{route('admin-service-create')}}" title="Add New Service" class="btn btn-info btn-sm">New Service</a>
	                        </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" class="text-center">Short Description</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($services as $key=>$service)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$service->title}}</td>
                                        
                                        <td class="text-center">{{@$service->short_desc}}</td>
                                        
                                        <td>
                                        	<form action="{{url('admin/service/status')}}/{{$service->id}}" method="post" class="status">
												@csrf
												<label class="switch switch-green status">
											      <input type="checkbox" class="switch-input" {{@$service->status==1 ? 'checked' : '' }} value="1" name="status">
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
						                        	 <a class="nav-link" href="{{ url('admin/service/edit') }}/{{$service->id}}"><i class="ti-pencil-alt mr-1"></i>Edit</a>

						                           {!! Form::model($services, ['method' => 'delete','route' => ['admin-service-delete',$service->id], 'class' =>'delete_btn']) !!}
                                                    {!! Form::hidden('id', $service->id) !!}
                                                     
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