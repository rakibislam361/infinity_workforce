@extends('layouts.master')
@push('title')Social Icons @endpush
@section('content')

		
		<div class="animated fadeIn">
			<div class="row">
				<div class="breadcrumbs">
				    <div class="breadcrumbs-inner">
				        <div class="row m-0">
				            <div class="col-sm-4">
				                <div class="page-header float-left">
				                    <div class="page-title">
				                        <h1>Social Icons</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="#">Social</a></li>
				                            <li class="active">Icons List</li>
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
                            <strong class="card-title float-left">Social Icons</strong>
                            <div class="text-right">
                                <a href="#" title="Add New Social" class="btn btn-info btn-sm" data-toggle="modal" data-target="#social_new">Add New</a>

                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($socials as $key=>$social)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$social->name}}</td>
                                        <td>	
                                        	<i class="{{$social->icon}}"></i>
                                        </td>
                                        <td>
                                        	<i class="{{$social->icon}}" data-toggle="tooltip" data-placement="top" title="@if($social->color){{$social->color}}@endif" style="color: @if($social->color){{$social->color}} @else Default Color @endif;"></i>
                                        </td>
                                        <td>	
                                        	<a href="{{$social->link}}">{{$social->link}}</a>
                                        </td>
                                        <td>
                                        	@if($social->status==TRUE)
                                        	<div class="badge badge-info">Published</div>
                                        	@else
                                        	<div class="badge badge-danger">Unpublished</div>
                                        	@endif
                                        </td>
                                        <td>
                                        	<div class="dropdown">
						                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						                           <i class="fa fa-list-ul"></i>
						                        </a>

						                        <div class="user-menu dropdown-menu">
						                            <a class="nav-link" href="#" data-toggle="modal" data-target="#social_view{{$social->id}}"><i class="ti-eye mr-1"></i>View</a>
                                                    {!! Form::model($socials, ['method' => 'delete','route' => ['admin-social-delete',$social->id], 'class' =>'delete_btn']) !!}
                                                      {!! Form::hidden('id', $social->id) !!}
                                                     
                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete</a>
                                                      {!! Form::close() !!}
						                        </div>
						                    </div>
                                        </td>
                                    </tr>
                                        {{--social view--}}
                                        <div class="modal fade" id="social_view{{$social->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title float-left" id="mediumModalLabel">{{$social->name}}</h5>
                                                        <button type="button text-right" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form class="" action="{{route('admin-social-update',$social->id)}}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="name" class="control-label mb-1">Title<small class="text-danger">*</small></label>
                                                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title" required="" value="{{$social->name}}">
                                                                     <span class="text-danger"> {{ $errors->first('name') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="name" class="control-label mb-1">Link<small class="text-danger">*</small></label>
                                                                    <input id="link" name="link" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Social Link" required="" value="{{$social->link}}">
                                                                     <span class="text-danger"> {{ $errors->first('link') }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                 <div class="col-md-6">
                                                                    <label for="icon" class="control-label mb-1">Icon Class <small class="text-info">Font aswome Icon</small></label>
                                                                    <input id="icon" name="icon" type="text" placeholder="fa fa-facebook" class="form-control" value="{{$social->icon}}">
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <label for="name" class="control-label mb-1">Color<small class="text-danger">*</small></label>
                                                                    <input id="color" name="color" type="color" class="form-control" value="{{$social->color}}">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="h_name" class="control-label mb-1">Hover Color<small class="text-danger">*</small></label>
                                                                    <input id="h_color" name="h_color" type="color" class="form-control" value="{{$social->hover_color}}">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="control-label mb-1">Status</label>
                                                                    @if($social->status==1)
                                                                        <input type="checkbox" name="status" value="1" checked="">
                                                                    @else
                                                                        <input type="checkbox" name="status" value="1">
                                                                    @endif
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
                                        {{--/social view--}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
			</div>
		</div>
	</div>
{{--social view--}}
<div class="modal fade" id="social_new" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title float-left" id="mediumModalLabel">Add New Social Link</h5>
                <button type="button text-right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" action="{{route('admin-social-store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name" class="control-label mb-1">Title<small class="text-danger">*</small></label>
                            <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title" required="" value="{{old('name')}}">
                             <span class="text-danger"> {{ $errors->first('name') }}</span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name" class="control-label mb-1">Link<small class="text-danger">*</small></label>
                            <input id="link" name="link" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Social Link" required="" value="{{old('link')}}">
                             <span class="text-danger"> {{ $errors->first('link') }}</span>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                            <label for="icon" class="control-label mb-1">Icon Class <small class="text-info">Font aswome Icon</small></label>
                            <input id="icon" name="icon" type="text" placeholder="fa fa-facebook" class="form-control" value="{{old('icon')}}">
                        </div>
                        <div class="col-md-1">
                            <label for="name" class="control-label mb-1">Color<small class="text-danger">*</small></label>
                            <input id="color" name="color" type="color" class="form-control" value="{{old('color')}}">
                        </div>
                        <div class="col-md-2">
                            <label for="h_color" class="control-label mb-1">Hover Color<small class="text-danger">*</small></label>
                            <input id="h_color" name="h_color" type="color" class="form-control" value="{{old('hover_color')}}">
                        </div>
                        <div class="col-md-3">
                            <label class="control-label mb-1">Status</label>
                           <input type="checkbox" name="status" value="1" checked="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--/social view--}}
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
@endpush