@extends('layouts.master')
@push('title') New Interview @endpush

@section('content')

<div class="animated fadeIn">
	<div class="row">
		<div class="breadcrumbs">
			<div class="breadcrumbs-inner">
				<div class="row m-0">
					<div class="col-sm-4">
						<div class="page-header float-left">
							<div class="page-title">
								<h1>New Interview</h1>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="page-header float-right">
							<div class="page-title">
								<ol class="breadcrumb text-right">
									<li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
									<li><a href="#">Interview</a></li>
									<li class="active">New</li>
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
					<strong class="card-title text-left">New Interview</strong>
				</div>

				<div class="card-body">
					<form action="#" method="post" enctype="multipart/form-data">
						@csrf
						<h4>Interview Info :</h4>

						<div class="row mt-2">
							<div class="form-group col-md-4">
								<label for="first-name" class="control-label mb-1">Name <small class="text-danger">*</small></label>
								<input id="first-name" name="first_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="First Name" required="" value="{{old('first_name')}}">
								<span class="text-danger"> {{ $errors->first('first_name') }}</span>
							</div>
							<div class="form-group col-md-4">
								<label for="middle-name" class="control-label mb-1">Found us</label>
								<input id="middle-name" name="middle_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Found us" value="{{old('middle_name')}}">
								<span class="text-danger"> {{ $errors->first('middle_name') }}</span>
							</div>
							<div class="form-group col-md-4">
								<label for="last-name" class="control-label mb-1">Car</label>
								<input id="last-name" name="last_name" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Car" value="{{old('last_name')}}">
								<span class="text-danger"> {{ $errors->first('last_name') }}</span>
							</div>
						</div>
						<div class="row mt-2">
							<div class="form-group col-md-4">
								<label for="phone" class="control-label mb-1">Lives in</label>
								<input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Lives in" value="{{old('phone')}}">
							</div>
							<div class="form-group col-md-4">
								<label for="address" class="control-label mb-1">ID</label>
								<input id="address" name="address" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="ID" value="{{old('address')}}">
							</div>
							<div class="form-group col-md-4">
								<label for="email" class="control-label mb-1">LK <small class="text-danger">*</small> </label>
								<input id="email" name="email" type="email" class="form-control" aria-required="true" aria-invalid="false" placeholder="LK" required="" value="{{old('email')}}">
								<span class="text-danger"> {{ $errors->first('email') }}</span>
							</div>
						</div>
						<div class="row mt-2">
							<div class="form-group col-md-4">
								<label for="password" class="control-label mb-1">Present <small class="text-danger">*</small></label>
								<input id="password" name="password" type="password" class="form-control" aria-required="true" aria-invalid="false" placeholder="Present" required="">
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">M/F <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Phone No <small class="text-danger">*</small></label>
								<input id="phone" name="phone" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Phone No" value="{{old('phone')}}">
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Arrived in Aus<small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Resi/Visa <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Expier <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Speaks <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Computer Skills <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Comunication <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Special Skills <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Current Work <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Qualification <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">expected rate <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Position interested in <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="role" class="control-label mb-1">Special Requirement s <small class="text-danger">*</small></label>
								<select class="form-control" name="role">

								</select>
							</div>						

						</div>
						<div class="row">
							<div class="col-lg-12 text-right mt-3">
								<button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
								<button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Submit</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection