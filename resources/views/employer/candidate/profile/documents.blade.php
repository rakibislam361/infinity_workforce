<strong>User Documents</strong>
	@if($user->documents->count()>0)
		<table class="table table-responsive mt-4">
			<thead>
				<tr>
					<th>Document Type</th>
					<th>File</th>
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
								<a href="{{asset('images/user-documents/images')}}/{{ $img_doc->file }}" target="_blank">
									<i class="ti-download" title="Dwonload"></i>
								</a>
							@endforeach
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
							<a href="{{asset('images/user-documents/visa')}}/{{$doc->file}}" target="_blank">
								<i class="ti-download" title="Dwonload"></i>
							</a>
							@endforeach
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
							<a href="{{asset('images/user-documents/resumes')}}/{{$doc->file}}" target="_blank">
								<i class="ti-download" title="Dwonload"></i>
							</a>
							@endforeach
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
							<a href="{{asset('images/user-documents/police-clearance')}}/{{$doc->file}}" target="_blank">
								<i class="ti-download" title="Dwonload"></i>
							</a>
							@endforeach
						</td>
					</tr>
				@endif

				@if($user->doc_medical_certificatee->count()>0)
					<tr>
						<td>Medical Certificatee
						</td>
						<td>
							@foreach($user->doc_medical_certificatee as $doc)
							<a href="{{asset('images/user-documents/medical-certificate')}}/{{$doc->file}}" target="_blank">
								<i class="ti-download" title="Dwonload"></i>
							</a>
							@endforeach
						</td>
						
					</tr>
				@endif

				@if($user->doc_d_license->count()>0)
					<tr>
						<td>
							Drive License
						</td>
						<td>
							@foreach($user->doc_d_license as $doc)
								<a href="{{asset('images/user-documents/d-license')}}/{{$doc->file}}" target="_blank">
								<i class="ti-download" title="Dwonload"></i>
								</a>
							@endforeach
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
								<a href="{{asset('images/user-documents/insurance')}}/{{$doc->file}}" target="_blank">
								<i class="ti-download" title="Download"></i>
								</a>
							@endforeach
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
								<a href="{{asset('images/user-documents/qualifications')}}/{{$doc->file}}" target="_blank">
								<i class="ti-download" title="Download"></i>
								</a>
							@endforeach
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
								<a  href="{{asset('images/user-documents/others')}}/{{$doc->file}}" target="_blank">
								<i class="ti-download" title="Download"></i>
								</a>
							@endforeach
						</td>
					</tr>
				@endif
			</tbody>
		</table>
	@else
		<p class="text-warning"><i class="fa fa-warning"></i> No Documents</p>
	@endif	
