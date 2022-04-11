@extends('layouts.master')
@push('title') Widgets @endpush
@push('head')
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">

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
				                        <h1>Widgets</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="{{route('admin-widget')}}">Widgets</a></li>
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
                        <div class="card-header">
                            <strong class="card-title">Widget List</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($widgets as $key=>$widget)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$widget->title}}</td>
                                       
                                        <td>
                                        	@if($widget->status==1)
                                        		<div class="badge badge-info">Published</div>
                                        	@else 
                                        		<div class="badge badge-warning">Unpublished</div> 
                                        	@endif
                                        </td>
                                       
                                        
                                        
                                        <td>
                                        	 <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#widget_view{{$widget->id}}"><i class="ti-eye mr-1"></i>View</a>
                                        	
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
	@foreach($widgets as $widget)
	<div class="modal fade" id="widget_view{{$widget->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title float-left" id="mediumModalLabel">{{$widget->title}}</h5>
                    <button type="button text-right" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" action="{{route('admin-widget-update',$widget->id)}}" method="post">
                    @csrf
	                <div class="modal-body">
	                    
	                   		<div class="form-group">
	                            <label for="title" class="control-label mb-1">Title<small class="text-danger">*</small></label>
	                            <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Widget Title" required="" value="{{$widget->title}}" disabled="">
	                             <span class="text-danger"> {{ $errors->first('title') }}</span>
	                        </div>
	                        <div class="form-group">
	                            <label for="title" class="control-label mb-1">Description </label>
	                            <textarea name="desc" id="summernote" class="summer-note" class="form-control">{{$widget->desc}}</textarea>
	                             <span class="text-danger"> {{ $errors->first('desc') }}</span>
	                        </div>
	                        <div class="form-group">
	                           <label class="control-label mb-1">Status</label>
                                   
                                <input type="checkbox" name="status" value="1"  @if($widget->status==1) checked @endif>
                                   
	                        </div>
	                    

	                </div>
	                <div class="modal-footer">
	                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
	                    <button type="submit" class="btn btn-primary">Update</button>
	                </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script type="text/javascript">
    $('.summer-note').summernote();
  
</script>
@endpush