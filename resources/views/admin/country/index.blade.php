@extends('layouts.master')
@push('title')
    {{@$heading}}
@endpush
@push('css')
<link rel="stylesheet" href="{{ asset('/admin/assets')}}/css/lib/datatable/dataTables.bootstrap.min.css">

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
				                        <h1>Country</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="">Countries</a></li>
				                            <li class="active">{{@$heading}}</li>
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
                        <div class="card-header ">
                            <strong class="card-title float-left">Country List</strong>
                             <div class="text-right">
	                        	<a href="" title="Add New User" class="btn btn-info btn-sm">Add New</a>
	                        </div>
                        </div>
                       
                        <div class="card-body">
                        	<style type="text/css">
								#bootstrap-data-table_filter{display:grid !important;}
								#bootstrap-data-table_paginate{float:right !important;}
							</style>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Flag</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">ISO3</th>
                                        <th scope="col">Currency</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($countries as $key => $country)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
		                                <td><img src="{{ asset('images/flags/4x3')}}/{{strtolower($country->iso_3166_2)}}.svg" class="img-fluid" style="width: 75px; height: 35px;" alt="{{ $country->flag }}"></td>
		                                <td>{{ $country->name }}</td>
		                                <td>{{ $country->iso_3166_3 }}</td>
		                                <td>{{ $country->currency }}</td>
                                        <td class="align-middle text-center">
                                        	<form action="{{url('admin/country/status/')}}/{{$country->id}}" method="post" class="status">
												@csrf
												<label class="switch switch-green status">
											      <input type="checkbox" class="switch-input" {{@$country->status==1 ? 'checked' : '' }} value="1" name="status">
											      <span class="switch-label" data-on="On" data-off="Off"></span>
											      <span class="switch-handle"></span>
											    </label>
											</form>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
<script src="{{ asset('/admin/assets')}}/js/notifications/sweet_alert.min.js"></script>

<script src="{{ asset('/admin/assets')}}/js/lib/data-table/datatables.min.js"></script>
<script src="{{ asset('/admin/assets')}}/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('/admin/assets')}}/js/init/datatables-init.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
  } );
</script>
<script type="text/javascript">
	    $('.status').on('click',function(){
	            $form = $(this);
	           $form.submit();
	        });
		
</script> 
@endpush