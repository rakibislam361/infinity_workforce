@extends('layouts.master')

@push('title') Slider @endpush
@section('content')

		
		<div class="animated fadeIn">
			<div class="row">
				<div class="breadcrumbs">
				    <div class="breadcrumbs-inner">
				        <div class="row m-0">
				            <div class="col-sm-4">
				                <div class="page-header float-left">
				                    <div class="page-title">
				                        <h1>Slider</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="#">Slider</a></li>
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
                            <strong class="card-title float-left">Slide List</strong>
                            <div class="text-right">
	                        	<a href="#" title="Add New User" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_slide">Add New</a>
	                        </div>

                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Caption</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col" class="text-center">Serial</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($slides as $key=>$slide)
                                    <tr>
                                        <th scope="row"  class="align-middle">{{++$key}}</th>
                                        <td  class="align-middle">
                                        {{str_limit($slide->caption, 15)}}                                        	
                                        </td>
                                        <td class="text-center">
                                        	@if($slide->image)
                                        	<img src="{{ asset('images/frontend/slider') }}/{{$slide->image}}" class="img img-responsive" width="200">
                                        	
                                        	@else
                                        	<p class="text-warning"> <i class="fa fa-warning"></i> No Slider Image</p>
                                        	@endif
                                        </td>
                                        <td class="align-middle text-center">
                                        	{{$slide->sl}}
                                        </td>
                                        <td  class="align-middle text-center">
                                        	
                                        	<form action="{{url('admin/slider/staus/')}}/{{$slide->id}}" method="post" class="status">
												@csrf
												<label class="switch switch-green status">
											      <input type="checkbox" class="switch-input" {{@$slide->status==1 ? 'checked' : '' }} value="1" name="status">
											      <span class="switch-label" data-on="On" data-off="Off"></span>
											      <span class="switch-handle"></span>
											    </label>


											</form>
                                        </td>
                                        <td  class="align-middle text-center">
                                        	<div class="dropdown">
						                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						                           <i class="fa fa-list-ul"></i>
						                        </a>

						                        <div class="user-menu dropdown-menu">
						                            
						                            <a class="nav-link" href="#" data-toggle="modal" data-target="#edit_slide{{$slide->id}}">
						                            	<i class="ti-pencil-alt mr-1"></i>Edit
						                            </a>
						                             {!! Form::model($slide, ['method' => 'delete','route' => ['admin-slider-delete',$slide->id], 'class' =>'delete_btn']) !!}
                                                      {!! Form::hidden('id', $slide->id) !!}
                                                     
                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete</a>
                                                      {!! Form::close() !!}
						                        </div>
						                    </div>
                                        </td>
                                    </tr>

                                    {{--Edit Slide modal--}}
                                    <div class="modal fade" id="edit_slide{{$slide->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
						                <div class="modal-dialog modal-lg" role="document">
						                    <div class="modal-content">
						                        <div class="modal-header">
						                            <h5 class="modal-title float-left" id="mediumModalLabel">Slide Edit</h5>
						                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                                <span aria-hidden="true">&times;</span>
						                            </button>
						                        </div>
						                        <form action="{{route('admin-slider-update',$slide->id)}}" method="post" enctype="multipart/form-data">
						                        	@csrf
							                        <div class="modal-body">
							                        	<div class="row">
							                        		<div class="col-md-12 mt-3">
									                        	<label>Slider Caption</label>
									                            <textarea class="form-control" name="caption" style="min-height: 250px;">@if(old('caption')){{old('caption')}}@else{{$slide->caption}}@endif</textarea>
								                            </div>
								                            <div class="col-md-12 mt-3">
									                            <label>Image</label>
									                            <input type="file" name="image" accept="image/png, image/jpeg,image/jpg,image/bmp" class="form-control">
								                            </div>
								                            <div class="col-md-6 mt-3">
								                            	<label>Serial</label>
								                            	<select class="form-control" name="serial">
								                            		<option>Select Serial</option>
								                            		<option value="1" {{$slide->sl==1 ? 'selected' : ''}}>1</option>
								                            		<option value="2" {{$slide->sl==2 ? 'selected' : ''}}>2</option>
								                            		<option value="3" {{$slide->sl==3 ? 'selected' : ''}}>3</option>
								                            		<option value="4" {{$slide->sl==4 ? 'selected' : ''}}>4</option>
								                            		<option value="5" {{$slide->sl==5 ? 'selected' : ''}}>5</option>
								                            		<option value="6" {{$slide->sl==6 ? 'selected' : ''}}>6</option>
								                            		<option value="7" {{$slide->sl==7 ? 'selected' : ''}}>7</option>
								                            		<option value="8" {{$slide->sl==8 ? 'selected' : ''}}>8</option>
								                            		<option value="9" {{$slide->sl==9 ? 'selected' : ''}}>9</option>
								                            		<option value="10" {{$slide->sl==10 ? 'selected' : ''}}>10</option>
								                            	</select>
								                            </div>
								                            <div class="col-md-6 mt-3">
								                            	<label>Status
								                            	<br/>
								                            	<input type="radio" name="status" value="1" {{$slide->status==1 ? 'checked' : ''}}> Show
								                            	</label>
								                            	<label>
								                            		<input type="radio" name="status" value="0" {{$slide->status==0 ? 'checked' : ''}}> Hide

								                            	</label>
								                            	
								                            </div>
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

                                    {{--/Edit Slide modal--}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
			</div>
		</div>
	</div>
	{{--add Slide modal--}}
	<div class="modal fade" id="add_slide" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		        <div class="modal-header">
		            <h5 class="modal-title float-left" id="mediumModalLabel">Add New Slide</h5>
		            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		            </button>
		        </div>
		        <form action="{{route('admin-slider-store')}}" method="post" enctype="multipart/form-data">
		        	@csrf
		            <div class="modal-body">
		            	<div class="row">
		            		<div class="col-md-12 mt-3">
		                    	<label>Slider Caption</label>
		                        <textarea class="form-control" name="caption" style="min-height: 250px;"></textarea>
		                    </div>
		                    <div class="col-md-12 mt-3">
		                        <label>Image</label>
		                        <input type="file" name="image" accept="image/png, image/jpeg,image/jpg,image/bmp" class="form-control">
		                    </div>
		                    <div class="col-md-6 mt-3">
		                    	<label>Serial</label>
		                    	<select class="form-control" name="serial">
		                    		<option>Select Serial</option>
		                    		<option value="1">1</option>
		                    		<option value="2">2</option>
		                    		<option value="3">3</option>
		                    		<option value="4">4</option>
		                    		<option value="5">5</option>
		                    		<option value="6">6</option>
		                    		<option value="7">7</option>
		                    		<option value="8">8</option>
		                    		<option value="9">9</option>
		                    		<option value="10">10</option>
		                    	</select>
		                    </div>
		                    <div class="col-md-6 mt-3">
		                    	<label>Status
		                    	<br/>
		                    	<input type="radio" name="status" value="1"> Show
		                    	</label>
		                    	<label>
		                    		<input type="radio" name="status" value="0"> Hide

		                    	</label>
		                    	
		                    </div>
		                </div>

		            </div>
		            <div class="modal-footer">
		                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		                <button type="submit" class="btn btn-primary">Save</button>
		            </div>
		        </form>
		    </div>
		</div>
	</div>

	{{--/Edit Slide modal--}}
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