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
				                        <h1>Select Quiz</h1>
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
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category</th>
                                        
                                        
                                        <th scope="col">Questions</th>
                                        <th scope="col">Time</th>
                                        
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
                                        	<a href="{{url('user/quiz-details')}}/{{$category->id}}" title="Take Quiz" class="btn btn-info">Start Quiz</a>
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