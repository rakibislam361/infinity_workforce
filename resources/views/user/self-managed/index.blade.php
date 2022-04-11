@extends('layouts.master')
 @push('title')
        smsf Details
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
				                        <h1>Self Managed Super Fund</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="">{{@$user->info->first_name}}</a></li>
				                            <li class="active">Self Managed Super Fund</li>
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
                            <strong class="card-title float-left">Self Managed Super Fund</strong>
                            
                        </div>
                       
                        <div class="card-body">
                           <form action="{{route('user-self-managed-fund-store')}}" method="post">
                           	@csrf
                           <div class="row">
                        		<div class="form-group col-md-4">
	                                <label for="number" class="control-label mb-1">Number{{-- <small class="text-danger">*</small> --}}</label>
	                                <input id="number" name="number" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Number" value="{{@$user->self_fund->number}}">
	                                 <span class="text-danger"> {{ $errors->first('number') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="abn" class="control-label mb-1">ABN{{-- <small class="text-danger">*</small> --}}</label>
	                                <input id="abn" name="abn" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ABN" value="{{@$user->self_fund->abn}}">
	                                 <span class="text-danger"> {{ $errors->first('abn') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="esa" class="control-label mb-1"> ESA{{-- <small class="text-danger">*</small> --}}</label>
	                                <input id="esa" name="esa" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ESA" value="{{@$user->self_fund->esa}}">
	                                 <span class="text-danger"> {{ $errors->first('esa') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="usi_code" class="control-label mb-1"> USI Code{{-- <small class="text-danger">*</small> --}}</label>
	                                <input id="usi_code" name="usi_code" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="USI 
	                                Code" value="{{@$user->self_fund->usi_code}}">
	                                 <span class="text-danger"> {{ $errors->first('usi_code') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="membership_number" class="control-label mb-1"> Membership Number{{-- <small class="text-danger">*</small> --}}</label>
	                                <input id="membership_number" name="membership_number" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Membership Number" value="{{@$user->self_fund->membership_number}}">
	                                 <span class="text-danger"> {{ $errors->first('membership_number') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="acc_name" class="control-label mb-1"> Account Name{{-- <small class="text-danger">*</small> --}}</label>
	                                <input id="acc_name" name="acc_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Account Name" value="{{@$user->self_fund->acc_name}}">
	                                 <span class="text-danger"> {{ $errors->first('acc_name') }}</span>
	                            </div>
	                            
	                            
	                           
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
