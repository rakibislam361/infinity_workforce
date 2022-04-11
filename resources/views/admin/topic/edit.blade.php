@extends('layouts.master')
@push('title')New User@endpush

@section('content')

		
	<div class="animated fadeIn">
		<div class="row">
			<div class="breadcrumbs">
			    <div class="breadcrumbs-inner">
			        <div class="row m-0">
			            <div class="col-sm-4">
			                <div class="page-header float-left">
			                    <div class="page-title">
			                        <h1>Edit Topic</h1>
			                    </div>
			                </div>
			            </div>
			            <div class="col-sm-8">
			                <div class="page-header float-right">
			                    <div class="page-title">
			                        <ol class="breadcrumb text-right">
			                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
			                            <li><a href="{{route('admin-category')}}">Topic</a></li>
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
                            <strong class="card-title text-left">Edit Topic</strong>
                             <div class="text-right">
                        	<a href="{{route('admin-topic')}}" title="Add New Category" class="btn btn-info btn-sm"> <i class="ti-list mr-2"></i> Topic List</a>
                        </div>
                        </div>
                       
                        <div class="card-body">
                           <form action="{{ route('admin-topic-update', $topic->id) }}" method="post"  enctype="multipart/form-data" class="new-user"> 
                           		@csrf

                           		<div class="row mt-2">
	                           		<div class="form-group col-md-4">
	                                    <label for="name" class="control-label mb-1">Topic Name </label>
	                                    <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Topic Name" required="" value="{{ $topic->name }}">
	                                     <span class="text-danger"> {{ $errors->first('name') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="time" class="control-label mb-1">Time</label>
	                                    <input id="time" name="time" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Time"  value="{{ $topic->time }}">
	                                    <span class="text-danger"> {{ $errors->first('time') }}</span>
	                                </div>
	                                <div class="form-group col-md-4">
	                                    <label for="question_no" class="control-label mb-1">Question No</label>
	                                    <input id="question_no" name="question_no" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Question Number"  value="{{ $topic->question_no }}">
	                                    <span class="text-danger"> {{ $errors->first('question_no') }}</span>
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