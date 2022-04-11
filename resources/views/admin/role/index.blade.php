@extends('layouts.master')

@push('title') Roles @endpush
@section('content')
		<div class="animated fadeIn">
			<div class="row">
				<div class="breadcrumbs">
				    <div class="breadcrumbs-inner">
				        <div class="row m-0">
				            <div class="col-sm-4">
				                <div class="page-header float-left">
				                    <div class="page-title">
				                        <h1>User Role</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="#">Role</a></li>
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
                            <strong class="card-title">Role List</strong>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">ID</th>
                                        <th scope="col" class="text-center">Total user</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($roles as $key=>$role)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->id}}</td>
                                        <td class="text-center">{{$role->users->count()}}</td>
                                        {{-- <td>
                                        	<div class="dropdown">
						                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						                           <i class="fa fa-list-ul"></i>
						                        </a>

						                        <div class="user-menu dropdown-menu">
						                            <a class="nav-link" href="#"><i class="ti-eye mr-1"></i>View</a>
						                            <a class="nav-link" href="#"><i class="ti-pencil-alt mr-1"></i>Edit</a>
						                            <a class="nav-link" href="#"><i class="ti-trash mr-1"></i>Delete</a>
						                           
						                        </div>
						                    </div>
                                        </td> --}}
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