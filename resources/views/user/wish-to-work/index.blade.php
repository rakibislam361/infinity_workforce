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
                                <h1>Wish To Work</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
                                    <li><a href="{{route('admin-work')}}">Wish To Work</a></li>
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
        <strong>Wish To Work</strong>
    </div>
    <div class="card-body">
        <form action="{{route('user-wish-to-work-update')}}" method="post"{{--  enctype="multipart/form-data" --}}>
                @csrf
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <thead>
                            <th>Working Category</th>
                            <th>Works</th>
                        </thead>
                        <tbody>
                            @foreach(@$categories as $category)
                            <tr>
                                <td><strong>{{@$category->name}}</strong></td>
                                <td>
                                    @foreach($category->works as $work)
                                    
                                    <p>
                                        <label>
                                            <input type="checkbox" name="work[]" value="{{$work->id}}" @if($work->id==$work->user_work['work_id']) checked @endif>
                                            {{@$work->title}}
                                        </label>
                                    </p>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
               
                 
               
                <div class="col-md-12 text-right">
                    <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i>Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="ti-save-alt mr-1"></i> Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>

@endsection