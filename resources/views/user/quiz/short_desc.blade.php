@extends('layouts.master')

@push('title') Quiz Test @endpush
@push('head') 
<style type="text/css">
	.panel-body p{
		color: #333;

	}
	.question{
		color: #333;
		font-size: 16px;
	}
.question label{
		cursor: pointer;
	}
	.carousel-control-prev span,.carousel-control-next span{
		color: black !important;
    font-weight: 900;
    font-size: 35px;
	}
	.carousel-control-next, .carousel-control-prev{
		width: 30%;
	}
</style>
@endpush
@section('content')	
		<div class="animated fadeIn">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
                        <div class="card-header">
                            <strong class="card-title float-left">{{@$category->name}}</strong>
                        </div>
                        <div class="card-body">
                           	<table>
                           		{{-- <tr>
                           			<th>Quiz Topic</th>
                           			<td style="text-align: center;;width: 20px;">:</td>
                           			<td>{{@$category->topic_id}}</td>
                           		</tr> --}}
                           		<tr>
                           			<th>Quiz Time</th>
                           			<td style="text-align: center;;width: 20px;">:</td>
                           			<td>{{@$category->time}} Minutes</td>
                           		</tr>
                           		<tr>
                           			<th>Total Questions</th>
                           			<td style="text-align: center;;width: 20px;">:</td>
                           			<td>{{@count($category->questions)}}</td>
                           		</tr>
                           		<tr>
                           			<th>Pass Mark</th>
                           			<td style="text-align: center;;width: 20px;">:</td>
                           			<td>{{@$category->pass_mark}}%</td>
                           		</tr>
                           		@if(@$category->description)
                           		<tr>
                           			<th>Quiz Guideline</th>
                           			<td style="text-align: center;;width: 20px;">:</td>
                           			<td>{{@$category->description}}</td>
                           		</tr>
                           		@endif
                           		<tr>
                           			<th colspan='2'>
                           				<br/>
                           				<a href="{{url('user/take-quiz')}}/{{@$category->id}}" title="Take Quiz" class="btn btn-info">Start</a> 
                           			</th>
                           		</tr>
                           	</table>
                           
                        </div>
                    </div>
			</div>
		</div>
	</div>

		
  
@endsection
@push('footer2')

@endpush