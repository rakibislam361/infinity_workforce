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
				                        <h1>{{@$user->info->first_name}} {{@$user->info->mid_name}} {{@$user->info->last_name}}</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('user-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="">User</a></li>
				                            <li class="active">Password Change</li>
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
                            <strong class="card-title float-left">{{@$user->info->first_name}} {{@$user->info->mid_name}} {{@$user->info->last_name}}</strong>
                            
                        </div>
                       
                        <div class="card-body">
                          <form action="{{route('user-password-update')}}" method="post"> 
                          	@csrf
                          	<input type="hidden" name="user_id" value="{{$user->id}}">
                           <div class="row">
                        		<div class="form-group col-md-4">
	                                <label for="password" class="control-label mb-1">New Password min(6)</label>
	                                <input id="password" name="password" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="New Password" required="" value="">
	                                 <small class="text-danger"> {{ $errors->first('password') }}</small>
	                            </div>
                           		
                           </div>
                           <div class="row">
                           	<div class="col-lg-4 text-right">
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
