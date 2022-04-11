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
                                <h1>Quiz</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
                                    <li><a href="{{route('admin-quiz')}}">Quiz</a></li>
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
        <strong>Add New Quiz</strong>
    </div>
    <div class="card-body">
        <form action="{{url('admin/quiz/store/')}}" method="post"{{--  enctype="multipart/form-data" --}}>
                @csrf
            <div class="row">
                <div class="form-group col-md-12">
                    <strong for="question" class="control-label mb-1">Question<small class="text-danger">*</small></strong>
                    <input id="question" name="question" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Question" required="" value="{{old('question')}}">
                     <span class="text-danger"> {{ $errors->first('question') }}</span>
                </div>
                <div class="form-group col-md-6 mt-3">
                    <table class="table" style="border: 0;">
                        <tr>
                            <th>
                                <strong>Options<small class="text-danger">*</small></strong> 
                            </th>
                            <th class="text-center">
                                <strong>Correct Answer<small class="text-danger">*</small></strong> 
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input id="option_1" name="option_1" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Option 1" value="{{old('option_1')}}" required="">
                                <span class="text-danger"> {{ $errors->first('option_1') }}</span>
                            </td>
                            <td class="text-center">
                                <label><input type="radio" name="correct" value="1" class="radio" required=""></label>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="option_2" name="option_2" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Option 2" value="{{old('option_2')}}" required="">
                                <span class="text-danger"> {{ $errors->first('option_2') }}</span>
                            </td>
                            <td class="text-center">
                                <label><input type="radio" name="correct" value="2" class="radio" required=""></label>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <input id="option_3" name="option_3" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Option 3" value="{{old('option_3')}}" required="">
                                <span class="text-danger"> {{ $errors->first('option_3') }}</span>
                            </td>
                            <td class="text-center">
                                 <label><input type="radio" name="correct" value="3" class="radio" required=""></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input id="option_4" name="option_4" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Option 4" value="{{old('option_4')}}" required="">
                                <span class="text-danger"> {{ $errors->first('option_4') }}</span>
                            </td>
                            <td class="text-center">
                                 <label><input type="radio" name="correct" value="4" class="radio" required=""></label> 
                            </td>
                        </tr>
                    </table>
                   
                </div>
               
                 
                <div class="form-group col-md-6 mt-3">
                    <strong for="category" class="control-label mb-1">Select Category<small class="text-danger">*</small></strong>
                    <select class="form-control" required="" name="category">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    {{-- <div class="mt-3">
                    <strong for="category" class="control-label mb-1">Select Topic</strong>
                        <select class="form-control" name="topic">
                            <option value="0">Select Topic</option>
                            @foreach($topics as $topic)
                            <option value="{{$topic->id}}">{{$topic->name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
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