@extends('layouts.master')
 @push('title')
        Add Quiz
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
                                <h1>{{$work->title}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
                                    <li><a href="{{route('admin-work')}}">Work</a></li>
                                    <li class="active">Edit</li>
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
        <strong>{{$work->title}}</strong>
    </div>
    <div class="card-body">
        <form action="{{url('admin/work/update')}}/{{$work->id}}" method="post"{{--  enctype="multipart/form-data" --}}>
                @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <strong for="question" class="control-label mb-1">Title<small class="text-danger">*</small></strong>
                    <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title" required="" value="{{$work->title}}">
                     <span class="text-danger"> {{ $errors->first('title') }}</span>
                </div>
                 <div class="form-group col-md-12">
                    <strong for="question" class="control-label mb-1">Desc</strong>
                    <input id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Desc" required="" value="{{$work->desc}}">
                     <span class="text-danger"> {{ $errors->first('desc') }}</span>
                </div>
               
               
                 
                <div class="form-group col-md-6 mt-3">
                    <strong for="category" class="control-label mb-1">Select Category<small class="text-danger">*</small></strong>
                    <select class="form-control" required="" name="category">
                        <option>Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" @if($category->id==$work->category_id) selected @endif>{{$category->name}}</option>
                        @endforeach
                    </select>
                    
                    <div class="mt-3">
                        <strong>Status</strong><br/>
                        <label class="switch switch-green status">
                          <input type="checkbox" class="switch-input" value="1" name="status" @if($work->status==1) checked @endif>
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