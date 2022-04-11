@extends('layouts.master')

@push('title') Pages @endpush

@push('head')
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">

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
				                        <h1>{{@$content->name}}</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="{{route('admin-pages')}}">Pages</a></li>
				                            <li class="active">{{@$content->name}}</li>
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
                            <strong class="card-title">Basic Contents</strong>
                            <a href="#" class="btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#basic_edit"><i class="fa fa-edit"></i></a>
                      </button>
                        </div>
                        <div class="card-body">
                        	<div class="row">
                        		<div class="col">
                        			<h4>{{@$content->name}}</h4>
                        		</div>
                        		<div class="col text-right">
                        			@if($content->status==TRUE)
		                            		<div class="badge badge-primary">Published</div>
		                            	@else
		                            		<div class="badge badge-danger">Unpublished</div>
		                            	@endif
                        		</div>
                        	</div>
                        	
                        	
                        	<p class="mt-3">
                        		{!!$content->desc!!}
                        	</p>
                        </div>
                        <div class="card-header">
                            <strong class="card-title">SEO</strong>
                            <a href="#" class="btn btn-primary btn-rounded float-right" data-toggle="modal" data-target="#seo_edit"><i class="fa fa-edit"></i></a>
                        </div>
                        <div class="card-body">
                        	<p>
                        		<strong>OG Url : </strong>
                        		@if($content->og_url)
                        			{{$content->og_url}}
                        		@else
                        			<span class="text-danger"><i class="fa fa-warning"></i>No OG Url</span>
                        		@endif
                        	</p>
                        	<p>
                        		<strong>Meta Description : </strong>
                        		@if($content->meta_desc)
                        			{{$content->meta_desc}}
                        		@else
                        			<span class="text-danger"><i class="fa fa-warning"></i>No Meta Desc</span>
                        		@endif
                        	</p>
                        	<p>
                        		<strong>Meta Keywords : </strong>
                        		@if($content->keywords)
                        			{{$content->keywords}}
                        		@else
                        			<span class="text-danger"><i class="fa fa-warning"></i>No Keywords</span>
                        		@endif
                        	</p>
                        	<span>OG Image : </span>
                        	@if($content->og_image)
                        		<img src="{{asset('images/seos')}}/{{$content->og_image}}" class="img img-responsive">
                        	@else
                        		<span class="text-danger"><i class="fa fa-warning"></i>No OG Image</span>
                        	@endif

                        </div>
                        <div class="card-header">
                        	@if($content->id==1)
                        		<strong class="card-title">Slider</strong>
                            <a href="{{route('admin-slider')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-edit"></i></a>
                        	@else
                            <strong class="card-title">Banner</strong>
                            
                            @endif
                        </div>
                        <div class="card-body">
                            
                        	@if($content->id==1)
                        		Header Slider
                        	@else
                        		@if($content->banner)
                        			<img src="{{asset('images/frontend/page-banner')}}/{{$content->banner}}" alt="Banner Image" class="img img-responsive mx-auto" width="400px">
                        		@else
                        			<span class="text-danger"><i class="fa fa-warning"></i>No Banner Image</span>
                        		@endif
                        	@endif
                        </div>

                    </div>
			</div>
		</div>
	</div>
    @include('admin.pages.edit')
@endsection

@push('footer')

@if ($errors->any())
     @foreach ($errors->all() as $error)
        <script src="{{ asset('/admin/assets')}}/js/notifications/jgrowl.min.js"></script>
        <script type="text/javascript">
            var msg = '{{$error}}';   
            $.jGrowl(msg, {
                header: 'Error',
                theme: 'alert-bordered alert-styled-left alert-danger'
            });
        </script>
        @endforeach
    @endif
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote();
      
    </script>
@endpush