@extends('layouts.master')
 @push('title')
       Question List
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
                                <h1>{{$category->name}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
                                    <li><a href="{{route('admin-quiz')}}">Quiz</a></li>
                                    <li class="active">{{$category->name}}</li>
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
        <strong class="card-title float-left">{{$category->name}} Quiz List</strong>
        <div class="text-right">
            <a href="{{route('admin-quiz-create')}}" title="Add New Quiz" class="btn btn-info btn-sm">New Quiz</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table ">
            <thead>
                <th>
                    SN
                </th>
                <th>
                    Topic
                </th>
                <th>
                    Question
                </th>
                <th>
                    Answer
                </th>
                 <th>
                    Status
                </th>
                <th>
                    Action
                </th>
            </thead>
            <tbody>
                @foreach($questions as $key=>$question)
                    <tr>
                        <td>
                            {{++$key}}
                        </td>
                        <td>
                            @if(@$question->topic->name)
                            {{@$question->topic->name}}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            {{str_limit($question->question, 30)}}
                        </td>
                        <td>
                            @if($question->right_ans==1)
                                {{$question->option_1}}
                            @elseif($question->right_ans==2)
                                {{$question->option_2}}
                            @elseif($question->right_ans==3)
                                 {{$question->option_3}}
                            @elseif($question->right_ans==4)
                                 {{$question->option_4}}

                            @else
                            <span class="text-warning"><i class="fa fa-warning"></i> No Right Anwer</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{url('admin/quiz/status')}}/{{$question->id}}" method="post" class="status">
                                @csrf
                                <label class="switch switch-green status">
                                  <input type="checkbox" class="switch-input" {{@$question->status==1 ? 'checked' : '' }} value="1" name="status">
                                  <span class="switch-label" data-on="On" data-off="Off"></span>
                                  <span class="switch-handle"></span>
                                </label>
                            </form>
                        </td>
                        <td>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <i class="fa fa-list-ul"></i>
                                </a>

                                <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="{{route('admin-quiz-edit',$question->id)}}"><i class="ti-eye mr-1"></i>Edit</a>
                                    
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
                
    </div>
</div>
</div>

@endsection
@push('footer')
<script type="text/javascript">
jQuery(function ($){
// status 
    $('.status').on('click',function(){
            $form = $(this);
           $form.submit();
        });
        });
</script>
@endpush