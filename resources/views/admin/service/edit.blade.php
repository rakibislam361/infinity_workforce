@extends('layouts.master')
 @push('title')
        Service Edit
    @endpush
    @push('head') 
        <style type="text/css">
            .form-control{
                margin-top: 10px;
                border-radius: 0;
                border: 0;
                border-bottom: 1px solid #ddd;
            }
            .form-control:focus{
                margin-top: 10px;
                border-radius: 0;
                border: 0;
                border-bottom: 1px solid #007bff;
                border-outline: none;
                box-shadow: none;
            }
            .table td, .table th {
                 padding: unset; 
                vertical-align: top;
               border-top: 1px solid #fff;
            }
            .radio{
                margin-top: 20px;
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
                                <h1>{{@$service->title}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
                                    <li><a href="{{route('admin-service')}}">Service</a></li>
                                    <li class="active">{{@$service->title}}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        <strong>{{@$service->title}}</strong>
    </div>
    <div class="card-body">
        <form action="{{url('admin/service/update')}}/{{$service->id}}" method="post" enctype="multipart/form-data">
            @csrf
               @if (count($errors) > 0)
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="row">
                <div class="form-group col-md-12">
                    <strong for="question" class="control-label mb-1">Title <small class="text-warning">*</small><small class="text-danger">*</small></strong>
                    <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title" required="" value="{{@$service->title}}">
                     <span class="text-danger"> {{ $errors->first('title') }}</span>
                </div>
                
                <div class="col-md-12">
                    <strong for="question" class="control-label mb-1">Long Description</strong>
                    <textarea name="desc" class="form-control">{{@$service->long_desc}}</textarea>
                    <span class="text-danger"> {{ $errors->first('desc') }}</span>
                </div>
                <div class="col-md-12 mt-3">
                    <strong for="short_desc" class="control-label mb-1">Short Description</strong>
                    <textarea name="short_desc" class="form-control">{{@$service->short_desc}}</textarea>
                    <span class="text-danger"> {{ $errors->first('short_desc') }}</span>
                </div>
                <div class="form-group col-md-12 mt-3">
                    <strong for="question" class="control-label mb-1">Short Description Link</strong>
                    <input id="link" name="link" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Link" value="{{@$service->short_link}}">
                     <span class="text-danger"> {{ $errors->first('link') }}</span>
                </div>
                <div class="form-group col-md-4 mt-3">
                    <strong for="question" class="control-label mb-1">Thumbnail</strong>
                    <input name="thumbnail" type="file" class="form-control">
                     <span class="text-danger"> {{ $errors->first('thumbnail') }}</span>
                </div>
                <div class="form-group col-md-4 mt-3">
                    <strong for="question" class="control-label mb-1">Banner</strong>
                    <input name="banner" type="file" class="form-control">
                     <span class="text-danger"> {{ $errors->first('banner') }}</span>
                </div>
               
                 
                <div class="form-group col-md-4 mt-3">
                    <div class="mt-3">
                        <strong>Status</strong><br/>
                        <label class="switch switch-green status">
                          <input type="checkbox" class="switch-input" checked value="1" name="status">
                          <span class="switch-label" data-on="On" data-off="Off"></span>
                          <span class="switch-handle"></span>
                        </label>
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Refresh</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection