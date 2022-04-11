@extends('layouts.master')
 @push('title')
        Bank Details
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
				                        <h1>Bank Details</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="">User</a></li>
				                            <li class="active">Bank Details</li>
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
                            <strong class="card-title float-left">Bank Details</strong>
                            
                        </div>
                       
                        <div class="card-body">
                           <form action="{{route('user-bank-store',$user->id)}}" method="post">
                           	@csrf
                           <div class="row">
                        		<div class="form-group col-md-4">
	                                <label for="account_name" class="control-label mb-1">Account Name {{-- <small class="text-danger">*</small> --}}</label>
	                                <input id="account_name" name="account_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Account Name" required="" value="{{@$user->user_bank_info->ac_name}}">
	                                 <span class="text-danger"> {{ $errors->first('account_name') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="bsb" class="control-label mb-1">BSB {{-- <small class="text-danger">*</small> --}}</label>
	                                <input id="bsb" name="bsb" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="BSB" value="{{@$user->user_bank_info->bsb}}">
	                                 <span class="text-danger"> {{ $errors->first('bsb') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="ac_no" class="control-label mb-1">Acc No.<small class="text-danger">*</small></label>
	                                <input id="ac_no" name="ac_no" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ACC NO" required="" value="{{@$user->user_bank_info->ac_no}}">
	                                 <span class="text-danger"> {{ $errors->first('ac_no') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="abn" class="control-label mb-1">ABN<small class="text-danger">*</small></label>
	                                <input id="abn" name="abn" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ABN" required="" value="{{@$user->user_bank_info->abn}}">
	                                 <span class="text-danger"> {{ $errors->first('abn') }}</span>
	                            </div>
	                            <div class="form-group col-md-4">
	                                <label for="tfn" class="control-label mb-1">TFN<small class="text-danger">*</small></label>
	                                <input id="tfn" name="tfn" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="TFN" required="" value="{{@$user->user_bank_info->tfn}}">
	                                 <span class="text-danger"> {{ $errors->first('tfn') }}</span>
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
