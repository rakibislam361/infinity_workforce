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
                                <h1>Work Category</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
                                    <li><a href="{{route('admin-work-categories')}}">Work Category</a></li>
                                    <li class="active">New</li>
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
        <strong>Add New Work Category</strong>
    </div>
    <div class="card-body">
        <form action="{{url('admin/work-category/store')}}" method="post"{{--  enctype="multipart/form-data" --}}>
                @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <strong for="question" class="control-label mb-1">Title<small class="text-danger">*</small></strong>
                    <input id="title" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Title" required="" value="{{old('title')}}">
                     <span class="text-danger"> {{ $errors->first('title') }}</span>
                </div>
                <div class="form-group col-md-6 mt-3">
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