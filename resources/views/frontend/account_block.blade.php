@extends('frontend.layouts.master')
@push('title') Account Block @endpush
@push('head')
   
@endpush

@section('content')

<div class="container">
  <div class="row">
        <div class="col-md-12 mt-3 mb-3">
        	<div class="card">
        		<div class="card-body text-center">
        			<img src="{{asset('frontend/img/warning.png')}}" width="100">
		            <h4 class="text-9 font-weight-bold text-center text-warning">Your Account Currently Deactivated</h4>
		        </div>
        	</div>
        </div>
    </div>
  
</div>



@endsection

@push('footer')

@endpush