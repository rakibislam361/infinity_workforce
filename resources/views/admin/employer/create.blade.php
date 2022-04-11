@extends('layouts.master')
 @push('title')
        Employer List
    @endpush

@push('head')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<style type="text/css">
	.card{
		font-size: 14px;
	}
</style>
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
				                        <h1>New Employer</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="{{route('admin-employer')}}">Employer</a></li>
				                            <li class="active">New</li>
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
                            <strong class="card-title float-left">Employer</strong>
                             <div class="text-right">
	                        	<a href="{{route('admin-employer')}}" title="Add New User" class="btn btn-info btn-sm">Employer List</a>
	                        </div>
                        </div>
                       
                        <div class="card-body">
                            <form action="{{route('admin-employer-store')}}" method="post">
                                   @csrf
				            
				                <div class="row">
				                   <div class="form-group col-md-6">
				                        <label for="name" class="control-label mb-1">Company Name<small class="text-danger">*</small></label>
				                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company Name" required="" value="{{old('name')}}" required="">
				                         <span class="text-danger"> {{ $errors->first('name') }}</span>
				                    </div>
				                    <div class="form-group col-md-6">
				                        <label for="phone" class="control-label mb-1">Company Phone</label>
				                        <input id="phone" name="phone" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company Phone" value="{{old('phone')}}" required="">
				                         <span class="text-danger"> {{ $errors->first('phone') }}</span>
				                    </div>
				                </div>
				                <div class="row">
				                   <div class="form-group col-md-6">
				                        <label for="email" class="control-label mb-1">Email</label>
				                        <input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company email" required="" value="{{old('email')}}">
				                        <span class="text-danger"> {{ $errors->first('email') }}</span>
				                    </div>
				                    <div class="form-group col-md-6">
				                        <label for="license" class="control-label mb-1">Company License</label>
				                        <input id="license" name="license" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company license" value="{{old('license')}}">
				                         <span class="text-danger"> {{ $errors->first('license') }}</span>
				                    </div>
				                    <div class="form-group col-md-12">
				                        <label for="address" class="control-label mb-1">Company Address</label>
				                        <input id="address" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Company address" value="{{old('address')}}">
				                         <span class="text-danger"> {{ $errors->first('address') }}</span>
				                    </div>
				                    <div class="form-group col-md-12">
				                        <label for="details" class="control-label mb-1">Company Details</label>
				                        <textarea class="form-control" name="details">{{old('details')}}</textarea>
				                         <span class="text-danger"> {{ $errors->first('details') }}</span>
				                    </div>
				                    <div class="form-group col-md-6">
				                        <label for="logo" class="control-label mb-1">Company Logo</label>
				                        <input id="logo" type="file" name="logo" accept="images/jpg,images/png,image/jpeg,image/bmp">
				                         <span class="text-danger"> {{ $errors->first('image') }}</span>
				                    </div>
				                    <div class="form-group col-md-12 mt-2">
				                        <label class="control-label mb-1">Status</label><br/>
				                       	<label class="switch switch-green status">
									      <input type="checkbox" class="switch-input" checked value="1" name="status">
									      <span class="switch-label" data-on="On" data-off="Off"></span>
									      <span class="switch-handle"></span>
									    </label>
				                    </div>
				                </div>
				            
				            <div class="row">
				            	<div class="col-lg-12 text-right mt-3">
                            		<button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
                            		<button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Submit</button>
                            	</div>
				            </div>
				            </form>
                           
                        </div>
                    </div>
			</div>
		</div>
		
	</div>

@endsection
@push('footer')



@endpush