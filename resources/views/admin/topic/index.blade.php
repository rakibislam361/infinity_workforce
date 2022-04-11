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
				                        <h1>Topic List</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="">Topic</a></li>
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
	                        	<a href="{{ route('admin-topic-create') }}" title="Add New User" class="btn btn-info btn-sm">Add New</a>
	                        </div>
                        </div>
                       
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Question No</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($topics as $key => $topic)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$topic->name}}</td>
                                        <td>{{$topic->time}}</td>
                                        <td>{{$topic->question_no}}</td>
                                        <td class="align-middle text-center">
                                        	<form action="{{url('admin/topic/status/')}}/{{$topic->id}}" method="post" class="status">
												@csrf
												<label class="switch switch-green status">
											      <input type="checkbox" class="switch-input" {{@$topic->status==1 ? 'checked' : '' }} value="1" name="status">
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
						                            <a class="nav-link" href="{{ route('admin-topic-edit', $topic->id) }}"><i class="ti-pencil-alt mr-1"></i>Edit</a>
						                            {!! Form::model($topics, ['method' => 'delete','route' => ['admin-topic-delete',$topic->id], 'class' =>'delete_btn']) !!}
                                                    {!! Form::hidden('id', $topic->id) !!}
                                                     
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