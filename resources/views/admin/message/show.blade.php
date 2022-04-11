@extends('layouts.master')
@push('head')
<style type="text/css">
		.single-mail{

}
	.single-mail h3{
		color: #333;
	    font-weight: 600;
	    line-height: 27px;
	    font-size: 20px;
	}.single-mail h4{
		    color: #333;
    font-weight: 500;
    line-height: 27px;
    font-size: 15px;
	}
	.single-mail p{
		  color: #333;
    font-weight: 500;
    line-height: 27px;
    font-size: 15px;
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
				                        <h1>Message</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="{{route('admin-message')}}">Messages</a></li>
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
					<div class="single-mail">
                        <div class="card-body text-bold">
                            <h3>{{$message->name}}</h3>
                            <h4><i class="ti-email"></i> {{$message->email}}</h4>
                            <h4><i class="ti-mobile"></i> {{$message->phone}}</h4>
                            <h4><i class="ti-calendar"></i> {{$message->created_at->format('d M y')}} at {{$message->created_at->format('h:m a')}}</h4>
                            <h4 style="font-weight: 600">Subject: {{$message->subject}}</h4>
                            <p>
                            	Message: {{$message->message}}
                            </p>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection