<table>
@if($user->doc_medical_certificatee->count()>0)
		<tr>
			<td>Medical Certificatee&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td>
				@foreach($user->doc_medical_certificatee as $doc)
				<a target="_blank" href="{{asset('images/user-documents/medical-certificate/'.$doc->file)}}">
					<i class="ti-download  text-success" title="Dwonload"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</a>
				@endforeach
			</td>
			<td>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ti-trash text-danger"></i>
					</a>

					<div class="user-menu dropdown-menu">
						@foreach($user->doc_medical_certificatee as $key=>$doc)
						<a href="" onclick="deleteData('{{$doc->id}}')" class="nav-link deletebtn"> Delete {{++$key}}</a>
						@endforeach

					</div>
				</div>
			</td>
		</tr>
		@endif
</table>