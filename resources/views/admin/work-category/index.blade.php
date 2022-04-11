@extends('layouts.master')

@push('title') Work Category  @endpush
@section('content')	
		<div class="animated fadeIn">
			
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                        <div class="card-header">
                            <strong class="card-title float-left">Work Category</strong>
                            <div class="text-right">
	                        	<a href="{{route('admin-work-category-create')}}" title="Add New Work Category" class="btn btn-info btn-sm">New Work Category</a>
	                        </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col" class="text-center">Category</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($categories as $key=>$category)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$category->name}}</td>
                                        <td class="text-center">{{$category->slug}}</td>
                                        <td>
                                        	<form action="{{url('admin/work-category/status')}}/{{$category->id}}" method="post" class="status">
												@csrf
												<label class="switch switch-green status">
											      <input type="checkbox" class="switch-input" {{@$category->status==1 ? 'checked' : '' }} value="1" name="status">
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
						                        	 <a class="nav-link" href="{{ route('admin-work-category-edit', $category->id) }}"><i class="ti-pencil-alt mr-1"></i>Edit</a>

						                           {!! Form::model($categories, ['method' => 'delete','route' => ['admin-work-category-delete',$category->id], 'class' =>'delete_btn']) !!}
                                                    {!! Form::hidden('id', $category->id) !!}
                                                     
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