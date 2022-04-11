@extends('layouts.master')

@push('title') Quiz List @endpush
@section('content')	
		<div class="animated fadeIn">
			<div class="row">
				<div class="breadcrumbs">
				    <div class="breadcrumbs-inner">
				        <div class="row m-0">
				            <div class="col-sm-4">
				                <div class="page-header float-left">
				                    <div class="page-title">
				                        <h1>Certificate List</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="#">Certificate</a></li>
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
                        <div class="card-header">
                            <strong class="card-title float-left">Certificate List</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">SCORE</th>
                                        <th scope="col">RESULT</th>
                                        <!-- <th scope="col">Attempted</th> -->
                                        <th scope="col">EXAM DATE</th>
                                        
                                        <th scope="col">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($certificates as $key=>$certificate)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$certificate->id}}</td>
                                        
                                        <td>{{@$certificate->category->name}}</td>
                                        <td>{{$certificate->marks}} %</td>
                                        <td>
                                            @if($certificate->status==1)
                                            <div class="badge badge-success">Passed</div> 
                                            @else
                                            <div class="badge badge-danger">Failed</div> 
                                            @endif
                                        </td>
                                      {{--   <td>
                                          {{ $certificate->attempted }}
                                          @if($certificate->category->attempted)
                                              /{{$certificate->category->attempted}}
                                          @endif
                                      </td> --}}
                                        <td>
                                            @if($certificate->updated_at)
                                                <span title="Updated">{{date('d M Y'),strtotime($certificate->updated_at)}}</span>
                                            @else
                                                <span title="Created">{{date('d M Y'),strtotime($certificate->created_at)}}</span>
                                            @endif
                                        </td>
                                       
                                        <td>
                                            
                                            <a href="{{url('user/certificate/download')}}/{{$certificate->id}}" title="Download Certificate" class="btn btn-info" target="_blank" download><i class="ti-download"></i></a>
                                          

                                            @if(!empty($certificate->category->attempted))
                                                @if($certificate->category->attempted>$certificate->attempted)
                                                    <a href="{{url('user/quiz-details')}}/{{$certificate->category_id}}" title="Take Quizon  {{$certificate->category->name}}" class="btn btn-info"><i class="ti-share-alt"></i></a>
                                                @endif

                                            @else
                                             <a href="{{url('user/quiz-details')}}/{{$certificate->category_id}}" title="Take Quiz on {{$certificate->category->name}}" class="btn btn-info"><i class="ti-share-alt"></i></a>
                                            @endif
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
			</div>
		</div>
	</div>

@endsection
@push('footer')
<script>
jQuery(function ($){
// status 
    $('.status').on('click',function(){
            $form = $(this);
           $form.submit();
        });
});
</script>
@endpush
