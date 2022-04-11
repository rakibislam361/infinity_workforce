@extends('layouts.master')
@push('title') Category Edit @endpush

@section('content')

		
	<div class="animated fadeIn">
		<div class="row">
			<div class="breadcrumbs">
			    <div class="breadcrumbs-inner">
			        <div class="row m-0">
			            <div class="col-sm-4">
			                <div class="page-header float-left">
			                    <div class="page-title">
			                        <h1>Edit Category</h1>
			                    </div>
			                </div>
			            </div>
			            <div class="col-sm-8">
			                <div class="page-header float-right">
			                    <div class="page-title">
			                        <ol class="breadcrumb text-right">
			                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
			                            <li><a href="{{route('admin-category')}}">Category</a></li>
			                            <li class="active">Edit</li>
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
                            <strong class="card-title text-left">Edit Category</strong>
                             <div class="text-right">
                        	<a href="{{route('admin-category')}}" title="Add New Category" class="btn btn-info btn-sm"> <i class="ti-list mr-2"></i> Category List</a>
                        </div>
                        </div>
                       
                        <div class="card-body">
                           <form action="{{route('admin-category-update', $category->id)}}" method="post"  enctype="multipart/form-data" class="new-user"> 
                           		@csrf

                           		<div class="row mt-2">
	                           		<div class="form-group col-md-4">
	                                    <label for="name" class="control-label mb-1">Category Name</label>
	                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Category Name" required="" value="{{ $category->name }}">
	                                     <span class="text-danger"> {{ $errors->first('name') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="time" class="control-label mb-1">Time</label>
	                                    <input id="time" name="time" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Time"  value="{{ $category->time }}">
	                                    <span class="text-danger"> {{ $errors->first('time') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="question_no" class="control-label mb-1">Question No</label>
	                                    <input id="question_no" name="question_no" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Question Number"  value="{{ $category->question_no }}">
	                                    <span class="text-danger"> {{ $errors->first('question_no') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="passed" class="control-label mb-1">Passed (%) <small class="text-info">Default 100%</small></label>
	                                    <input id="passed" name="passed" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="100"  value="{{@$category->pass_mark}}">
	                                    <span class="text-danger"> {{ $errors->first('passed') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="topic" class="control-label mb-1">Topic </label>
	                                   	<select class="form-control">
	                                   		<option value="">Select Topic</option>
	                                   		@foreach($topics as $topic)
	                                   		<option value="{{$topic->id}}" @if($topic->id == @$category->topic->id) selected @endif>{{$topic->name}}</option>
	                                   		@endforeach
	                                   	</select>
	                                    <span class="text-danger"> {{ $errors->first('topic') }}</span>
	                                </div>
	                                 <div class="form-group col-md-4">
	                                    <label for="topic" class="control-label mb-1" title="How Many Times Candidate Take This Quiz">Attempted</label>
	                                   	<input type="number" name="attempted" class="form-control" value="@if(@$category->attempted) {{ $category->attempted }} @else {{ old('attempted') }} @endif">
	                                    <span class="text-danger"> {{ $errors->first('attempted') }}</span>
	                                </div>
	                            </div>
	                            
								<div class="row mt-2">
	                            	<div class="col-md-12">
		                            	<label for="desc" id="desc" class="control-label mb-1">Quiz Description </label>
		                            	<textarea name="desc" class="form-control">{{@$category->description}}</textarea>
		                            </div>
		                            <div class="col-md-12 mt-2">
		                            	<label class="control-label mb-1">Quiz Status </label>
		                            	<br/>
		                            	<label class="switch switch-green status">
									      <input type="checkbox" class="switch-input" {{@$category->status==1 ? 'checked' : '' }} value="1" name="status">
									      <span class="switch-label" data-on="On" data-off="Off"></span>
									      <span class="switch-handle"></span>
									    </label>
		                            </div>
	                            </div>
	                            <div class="row">
	                            	<div class="col-lg-12 text-right mt-3">
	                            		<button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
	                            		<button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Update</button>
	                            	</div>
	                            </div>
	                           
                           </form>
                        </div>
                    </div>
			</div>
		</div>
	</div>
@endsection