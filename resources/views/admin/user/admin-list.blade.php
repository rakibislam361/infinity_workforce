@extends('layouts.master')
 @push('title')
        {{@$heading}}
  @endpush
@push('head')
	<style type="text/css">
	table{
		font-size: 12px;

	}
	</style>
@endpush
@section('content')

		<div class="animated fadeIn">
            
			
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                        <div class="card-header ">
                            <strong class="card-title float-left">{{@$heading}}</strong>
                             <div class="text-right">
	                        	<a href="{{route('admin-user-create')}}" title="Add New User" class="btn btn-info btn-sm">Add New</a>
	                        </div>
                        </div>
                       
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key=>$user)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{@$user->role->name}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   <i class="fa fa-list-ul"></i>
                                                </a>

                                                <div class="user-menu dropdown-menu">
                                                   {{--  <a class="nav-link" href="{{route('admin-user-show',$user->id)}}"><i class="ti-eye mr-1"></i>View</a> --}}
                                                    <a class="nav-link" href="{{route('admin-user-edit',$user->id)}}"><i class="ti-pencil-alt mr-1"></i>View</a>
                                                    @if(Auth::user()->id==$user->id)
                                                        
                                                    @else

                                                     {!! Form::model($users, ['method' => 'delete','route' => ['admin-user-delete',$user->id], 'class' =>'delete_btn']) !!}
                                                      {!! Form::hidden('id', $user->id) !!}
                                                     
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