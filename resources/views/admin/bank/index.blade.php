@extends('layouts.master')
@push('title') Bank List @endpush
@section('content')

		
		<div class="animated fadeIn">
			<div class="row">
				<div class="breadcrumbs">
				    <div class="breadcrumbs-inner">
				        <div class="row m-0">
				            <div class="col-sm-4">
				                <div class="page-header float-left">
				                    <div class="page-title">
				                        <h1>Bank</h1>
				                    </div>
				                </div>
				            </div>
				            <div class="col-sm-8">
				                <div class="page-header float-right">
				                    <div class="page-title">
				                        <ol class="breadcrumb text-right">
				                            <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
				                            <li><a href="#">Bank</a></li>
				                            <li class="active">bank List</li>
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
                            <strong class="card-title float-left">Bank List</strong>
                            <div class="text-right">
                                <a href="#" title="Add New Social" class="btn btn-info btn-sm" data-toggle="modal" data-target="#bank_new">Add New</a>

                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Account Name</th>
                                        <th scope="col">Account No</th>
                                        <th scope="col">User</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($banks as $key=>$bank)
                                    <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>{{$bank->ac_name}}</td>
                                        <td>	
                                        	{{$bank->ac_no}}
                                        </td>
                                        <td>
                                        	<a href="" target="_blank" title="View User Profile">{{@$bank->user->name}}</a>
                                        </td>
                                       
                                       
                                        <td class="text-center">
                                        	<div class="dropdown">
						                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						                           <i class="fa fa-list-ul"></i>
						                        </a>

						                        <div class="user-menu dropdown-menu">
						                            <a class="nav-link" href="#" data-toggle="modal" data-target="#bank_view{{$bank->id}}"><i class="ti-eye mr-1"></i>Edit</a>
                                                    {!! Form::model($bank, ['method' => 'delete','route' => ['admin-bank-delete',$bank->id], 'class' =>'delete_btn']) !!}
                                                      {!! Form::hidden('id', $bank->id) !!}
                                                     
                                                      <a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete</a>
                                                      {!! Form::close() !!}
						                        </div>
						                    </div>
                                        </td>
                                    </tr>
                                        {{--social view--}}
                                        <div class="modal fade" id="bank_view{{$bank->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title float-left" id="mediumModalLabel">{{@$bank->user->name}}'s Bank Details</h5>
                                                        <button type="button text-right" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                     <form class="" action="{{route('admin-banks-store')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="user" value="{{$bank->user_id}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <label for="account_name" class="control-label mb-1">Account Name <small class="text-danger">*</small></label>
                                                                    <input id="account_name" name="account_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Account Name" required="" value="{{$bank->ac_name}}">
                                                                     <span class="text-danger"> {{ $errors->first('account_name') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="bsb" class="control-label mb-1">BSB {{-- <small class="text-danger">*</small> --}}</label>
                                                                    <input id="bsb" name="bsb" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="BSB" value="{{$bank->bsb}}">
                                                                     <span class="text-danger"> {{ $errors->first('bsb') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="ac_no" class="control-label mb-1">Acc No.<small class="text-danger">*</small></label>
                                                                    <input id="ac_no" name="ac_no" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ACC NO" required=""value="{{$bank->ac_no}}" >
                                                                     <span class="text-danger"> {{ $errors->first('ac_no') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="abn" class="control-label mb-1">ABN</label>
                                                                    <input id="abn" name="abn" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ABN" value="{{$bank->abn}}">
                                                                     <span class="text-danger"> {{ $errors->first('abn') }}</span>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <label for="tfn" class="control-label mb-1">TFN</label>
                                                                    <input id="tfn" name="tfn" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="TFN" value="{{$bank->tfn}}">
                                                                     <span class="text-danger"> {{ $errors->first('tfn') }}</span>
                                                                </div>
                                                                
                                                           </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{--/social view--}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
			</div>
		</div>
	</div>
{{--social view--}}
<div class="modal fade" id="bank_new" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title float-left" id="mediumModalLabel">Add New Bank Info</h5>
                <button type="button text-right" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="" action="{{route('admin-banks-store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="account_name" class="control-label mb-1">Account Name <small class="text-danger">*</small></label>
                            <input id="account_name" name="account_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Account Name" required="" >
                             <span class="text-danger"> {{ $errors->first('account_name') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bsb" class="control-label mb-1">BSB {{-- <small class="text-danger">*</small> --}}</label>
                            <input id="bsb" name="bsb" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="BSB" >
                             <span class="text-danger"> {{ $errors->first('bsb') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ac_no" class="control-label mb-1">Acc No.<small class="text-danger">*</small></label>
                            <input id="ac_no" name="ac_no" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ACC NO" required="" >
                             <span class="text-danger"> {{ $errors->first('ac_no') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="abn" class="control-label mb-1">ABN</label>
                            <input id="abn" name="abn" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ABN">
                             <span class="text-danger"> {{ $errors->first('abn') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tfn" class="control-label mb-1">TFN</label>
                            <input id="tfn" name="tfn" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="TFN">
                             <span class="text-danger"> {{ $errors->first('tfn') }}</span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="user" class="control-label mb-1">Select User<small class="text-danger">*</small></label>
                            <select id="user" name="user" class="form-control" required="">
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{@$user->id}}">{{@$user->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"> {{ $errors->first('user') }}</span>
                        </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{--/social view--}}
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