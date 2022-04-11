@extends('layouts.master')

@push('title') Quiz List @endpush
@section('content')	
		<div class="animated fadeIn">
			<div class="row">
				<div class="breadcrumbs">
				    <div class="breadcrumbs-inner">
				        <div class="row m-0">
				            <div class="col-sm-4">
				                <div class="page-header float-left">
				                    <div class="page-title">
				                        <h1>Quiz</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="#">Quiz</a></li>
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
                            <strong class="card-title float-left">Quiz List</strong>
                            <div class="text-right">
	                        	<a href="{{route('admin-quiz-create')}}" title="Add New Quiz" class="btn btn-info btn-sm">New Quiz</a>
	                        </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category</th>
                                        
                                        
                                        <th scope="col" class="text-center">Questions</th>
                                        <th scope="col" class="text-center">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($categories as $key=>$category)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$category->name}}</td>
                                        
                                        <td>{{$category->questions->count()}}/{{$category->question_no}}</td>
                                        <td>{{$category->time}}</td>
                                        <td>
                                        	<form action="{{url('admin/categories/status/')}}/{{$category->id}}" method="post" class="status">
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
						                            <a class="nav-link" href="{{route('admin-quiz-show',$category->id)}}"><i class="ti-eye mr-1"></i>View</a>
						                            
						                        </div>
						                    </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$categories->links()}}
                        </div>
                    </div>
			</div>
		</div>
	</div>

@endsection
@push('footer')
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