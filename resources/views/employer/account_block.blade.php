
@extends('layouts.master')
@push('head')

@section('content')

	<div class="empty-40" style="height: 50px; width: 100%;"></div>
	<div class="container">
		 <div class="row  mb-3">
        	<div class="col-md-12 text-center">
        		<div class="card">
        			<div class="card-body">
        				<h3 class="text-center text-warning"> <i class="fa fa-warning"></i></h3>
		        		<h4 class="text-center text-warning">
			             Your account currently deactivated, please contact with admin.
			            </h4>
			            {{-- <h5 class="text-center text-warning">
			            	Please wait for further notifications from the admin.
			            </h5> --}}
		        	</div>
        		</div>
        	</div>
        	
        </div>
	</div>
@endsection