<strong>Upload Document <small class="text-success">(Maximum 5MB with doc,docx,pdf,jpeg,bmp,png,jpg)</small></strong>
<form action="{{route('admin-user-document-upload')}}" enctype="multipart/form-data" method="post">
	@csrf
	<input type="hidden" name="user_id" value="{{$user->id}}">
	<div class="row mt-3">
		<div class="form-group col-md-4">
			<label for="d_license" class="control-label mb-1">Photo ID (Drive License / Passport) <small class="text-success"></small></label>
			<input id="d_license" name="d_license" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">
			<span class="text-danger"> {{ $errors->first('d_license') }}</span><br>
			@include('admin.user.profile.document-parts.photoid')
		</div>
		<!-- <div class="form-group col-md-4">-->
		<!--	<label for="doc_image" class="control-label mb-1" title="jpeg,bmp,png,jpg">Photo ID  <small class="text-success"></small></label>-->
		<!--	<input id="doc_image" name="doc_image" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">-->
		<!--	<span class="text-danger"> {{ $errors->first('doc_image') }}</span><br>-->
		<!--	@include('admin.user.profile.document-parts.photoid')-->
		<!--</div>-->
		<div class="form-group col-md-4">
			<label for="visa_copy" class="control-label mb-1">Visa Copy <small class="text-success"></small></label>
			<input id="visa_copy" name="visa_copy" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">
			<span class="text-danger"> {{ $errors->first('visa_copy') }}</span><br>
			@include('admin.user.profile.document-parts.visa-copy')
		</div>
		<div class="form-group col-md-4">
			<label for="resume" class="control-label mb-1">Resume <small class="text-success"></small></label>
			<input id="resume" name="resume" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">
			<span class="text-danger"> {{ $errors->first('resume') }}</span><br>
			@include('admin.user.profile.document-parts.resume')
		</div>
	</div>
	<div class="row mt-3">
		<div class="form-group col-md-4">
			<label for="police_clearance" class="control-label mb-1">Police Clearance <small class="text-success"></small></label>
			<input id="police_clearance" name="police_clearance" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">
			<span class="text-danger"> {{ $errors->first('police_clearance') }}</span><br>
			@include('admin.user.profile.document-parts.police-clearance')
		</div>
		<div class="form-group col-md-4">
			<label for="medical_certificate" class="control-label mb-1">Fit To Medical Certificate <small class="text-success"></small></label>
			<input id="medical_certificate" name="medical_certificate" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">
			<span class="text-danger"> {{ $errors->first('medical_certificate') }}</span><br>
			@include('admin.user.profile.document-parts.f-to-medical-certi')
		</div>
		<!-- <div class="form-group col-md-4">
			<label for="image" class="control-label mb-1">Drive License / Passport <small class="text-success">(doc,docx,pdf,jpeg,bmp,png,jpg)</small></label>
			<input id="d_license" name="d_license" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">
			<span class="text-danger"> {{ $errors->first('d_license') }}</span><br>
		</div> -->
		<div class="form-group col-md-4">
			<label for="insurance" class="control-label mb-1">Insurance <small class="text-success"></small></label>
			<input id="insurance" name="insurance" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">
			<span class="text-danger"> {{ $errors->first('insurance') }}</span><br>
			@include('admin.user.profile.document-parts.insurance')
		</div>
		<div class="form-group col-md-4">
			<label for="qualifications" class="control-label mb-1">Qualifications <small class="text-success"></small></label>
			<input id="qualifications" name="qualifications" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">
			<span class="text-danger"> {{ $errors->first('qualifications') }}</span><br>
			@include('admin.user.profile.document-parts.qualifications')
		</div>
		<div class="form-group col-md-4">
			<label for="others" class="control-label mb-1">Others <small class="text-success"></small></label>
			<input id="others" name="others" type="file" class="form-control" aria-required="true" aria-invalid="false" placeholder="" value="" accept="image/png,image/jpeg,image/jpg,image/bmp,.doc,.docx,application/msword,.pdf">
			<span class="text-danger"> {{ $errors->first('others') }}</span><br>
			@include('admin.user.profile.document-parts.others')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 text-right mt-3">
			<button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i> Reset</button>
			<button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i> Update</button>
		</div>
	</div>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
	
	function deleteData(value) {
		console.log('mytest Data', $('meta[name="csrf-token"]').attr('content'));
		
		$.ajax({
			url: "/admin/users/doc-delete/" + value,
			type: 'DELETE',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data: {
				'id': value
			},
			success: function(data) {
				console.log(data);
				location.reload();
			},
			error: function(request, error) {
				console.log('error', error);
				//$(".doc").addClass("active show");
				location.reload();
			}
		});


	}

</script>


	<!--
<strong>User Documents</strong>
@if($user->documents->count()>0)
<table class="table table-responsive mt-4">
	<thead>
		<tr>
			<th>Document Type</th>
			<th>File</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@if($user->doc_images->count()>0)
		<tr>
			<td>
				Images
			</td>
			<td class="text-center">

				@foreach($user->doc_images as $img_doc)
				<a target="_blank" href="{{asset('images/user-documents/images/'.$img_doc->file)}}">
					<i class="ti-download" title="Dwonload"></i>
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->doc_images as $key=>$doc)
						{!! Form::model($doc, ['method' => 'delete','route' => ['admin-user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
						{!! Form::hidden('id', $doc->id) !!}
						{!! Form::hidden('type', $doc->type) !!}

						<a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
						{!! Form::close() !!}
						@endforeach
					</div>
				</div>
			</td>
		</tr>
		@endif-->
	<!--	@if($user->doc_d_license->count()>0)
		<tr>
			<td>
				Photo ID
			</td>
			<td>
				@foreach($user->doc_d_license as $doc)
				<a target="_blank" href="{{asset('images/user-documents/d-license/'.$doc->file)}}">
					<i class="ti-download" title="Dwonload"></i>
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->doc_d_license as $key=>$doc)
						{!! Form::model($doc, ['method' => 'delete','route' => ['admin-user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
						{!! Form::hidden('id', $doc->id) !!}
						{!! Form::hidden('type', $doc->type) !!}

						<a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
						{!! Form::close() !!}
						@endforeach

					</div>
				</div>
			</td>
		</tr>
		@endif

		@if($user->doc_visas->count()>0)
		<tr>
			<td>
				Visa
			</td>
			<td>
				@foreach($user->doc_visas as $doc)
				<a target="_blank" href="{{asset('images/user-documents/visa/'.$doc->file)}}">
					<i class="ti-download" title="Dwonload"></i>
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->doc_visas as $key=>$doc)
						{!! Form::model($doc, ['method' => 'delete','route' => ['admin-user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
						{!! Form::hidden('id', $doc->id) !!}
						{!! Form::hidden('type', $doc->type) !!}

						<a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
						{!! Form::close() !!}
						@endforeach

					</div>
				</div>
			</td>
		</tr>
		@endif

		@if($user->doc_resumes->count()>0)
		<tr>
			<td>
				Resumes
			</td>
			<td>
				@foreach($user->doc_resumes as $doc)
				<a target="_blank" href="{{asset('images/user-documents/resumes/'.$doc->file)}}">
					<i class="ti-download" title="Dwonload"></i>
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->doc_resumes as $key=>$doc)
						{!! Form::model($doc, ['method' => 'delete','route' => ['admin-user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
						{!! Form::hidden('id', $doc->id) !!}
						{!! Form::hidden('type', $doc->type) !!}

						<a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
						{!! Form::close() !!}
						@endforeach

					</div>
				</div>
			</td>
		</tr>
		@endif

		@if($user->doc_police_clearance->count()>0)
		<tr>
			<td>
				Police Clearance
			</td>
			<td>
				@foreach($user->doc_police_clearance as $doc)
				<a target="_blank" href="{{asset('images/user-documents/police-clearance/'.$doc->file)}}">
					<i class="ti-download" title="Dwonload"></i>
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->doc_police_clearance as $key=>$doc)
						{!! Form::model($doc, ['method' => 'delete','route' => ['admin-user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
						{!! Form::hidden('id', $doc->id) !!}
						{!! Form::hidden('type', $doc->type) !!}

						<a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
						{!! Form::close() !!}
						@endforeach

					</div>
				</div>
			</td>
		</tr>
		@endif

		@if($user->doc_medical_certificatee->count()>0)
		<tr>
			<td>Medical Certificatee
			</td>
			<td>
				@foreach($user->doc_medical_certificatee as $doc)
				<a target="_blank" href="{{asset('images/user-documents/medical-certificate/'.$doc->file)}}">
					<i class="ti-download" title="Dwonload"></i>
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->doc_medical_certificatee as $key=>$doc)
						{!! Form::model($doc, ['method' => 'delete','route' => ['admin-user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
						{!! Form::hidden('id', $doc->id) !!}
						{!! Form::hidden('type', $doc->type) !!}

						<a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
						{!! Form::close() !!}
						@endforeach

					</div>
				</div>
			</td>
		</tr>
		@endif


		@if($user->insurance->count()>0)
		<tr>
			<td>
				Insurance
			</td>
			<td>
				@foreach($user->insurance as $doc)
				<a target="_blank" href="{{asset('images/user-documents/insurance/'.$doc->file)}}">
					<i class="ti-download" title="Download"></i>
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->insurance as $key=>$doc)
						{!! Form::model($doc, ['method' => 'delete','route' => ['admin-user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
						{!! Form::hidden('id', $doc->id) !!}
						{!! Form::hidden('type', $doc->type) !!}

						<a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
						{!! Form::close() !!}
						@endforeach

					</div>
				</div>
			</td>
		</tr>
		@endif
		@if($user->qualifications->count()>0)
		<tr>
			<td>
				Qualifications
			</td>
			<td>
				@foreach($user->qualifications as $doc)
				<a target="_blank" href="{{asset('images/user-documents/qualifications/'.$doc->file)}}">
					<i class="ti-download" title="Download"></i>
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->qualifications as $key=>$doc)
						{!! Form::model($doc, ['method' => 'delete','route' => ['admin-user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
						{!! Form::hidden('id', $doc->id) !!}
						{!! Form::hidden('type', $doc->type) !!}

						<a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
						{!! Form::close() !!}
						@endforeach

					</div>
				</div>
			</td>
		</tr>
		@endif
		@if($user->others->count()>0)
		<tr>
			<td>
				Others
			</td>
			<td>
				@foreach($user->others as $doc)
				<a target="_blank" href="{{asset('images/user-documents/others/'.$doc->file)}}">
					<i class="ti-download" title="Download"></i>
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->others as $key=>$doc)
						{!! Form::model($doc, ['method' => 'delete','route' => ['admin-user-document-delete',$doc->id], 'class' =>'delete_btn']) !!}
						{!! Form::hidden('id', $doc->id) !!}
						{!! Form::hidden('type', $doc->type) !!}

						<a href="#" class="nav-link"><i class="ti-trash mr-1"></i> Delete {{++$key}}</a>
						{!! Form::close() !!}
						@endforeach

					</div>
				</div>
			</td>
		</tr>
		@endif
	</tbody>
</table>
@else
<p class="text-warning"><i class="fa fa-warning"></i> No Documents</p>
@endif  -->