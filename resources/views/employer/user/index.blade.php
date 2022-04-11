@extends('layouts.master')
 @push('title')
        {{@$heading}}
  @endpush
@push('head')
    <style type="text/css">
    table{
        font-size: 12px;

    }
    </style>
@endpush
@section('content')

        <div class="animated fadeIn">
            
            
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                        <div class="card-header ">
                            <h4 class="float-left">Assigned Users</h4>
                        <div id="" class="float-right">
                            <a href="#" class="float_btn text-info" data-link="" data-toggle="modal" data-target="#assigned_user">
                            <i class="ti-plus">Add New</i>
                        </a> 
                        </div>
                        </div>
                       
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">IDN</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key=>$user)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$user->id}}</td>
                                        <td>{{@$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{@$user->info->phone}}</td>
                                        
                                       <td class="text-center">
                                        <form action="{{url('employer/user/status/')}}/{{$user->id}}" method="post" class="status">
                                            @csrf
                                            <label class="switch switch-green status">
                                              <input type="checkbox" class="switch-input" {{@$user->status==1 ? 'checked' : '' }} value="1" name="status">
                                              <span class="switch-label" data-on="On" data-off="Off"></span>
                                              <span class="switch-handle"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        @if(Auth::user()->id==$user->id)
                                        -
                                       @else
                                            {!! Form::model($user, ['method' => 'delete','route' => ['employer-user-assigned-remove',@$user->id], 'class' =>'delete_btn']) !!}
                                            {!! Form::hidden('id', @$user->id) !!}
                                                 
                                            <a href="#" class="nav-link" class="delete_btn"><i class="ti-trash mr-1"></i> Remove</a>
                                       {!! Form::close() !!}
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
    {{--modal include--}}
    @include('employer.profile.assigned_user')
@endsection
@push('footer')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
    <script src="{{ asset('/admin/assets')}}/js/notifications/sweet_alert.min.js"></script>
    <script type="text/javascript">
        jQuery(function ($){
            $('.delete_btn').on('click', function(e) {
                e.preventDefault();
                $form = $(this);
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this data!",
                    type: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-light',
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel!"
                });
                $('button.swal2-confirm').on('click',function(){
                   $form.submit();
                });
            });
        });
        
    </script> 
@endpush