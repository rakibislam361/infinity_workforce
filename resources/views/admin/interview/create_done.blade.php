@extends('layouts.master')
@push('title') New User @endpush

@section('content')

<div class="animated fadeIn">
    <div class="row">
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>New User</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{route('admin-dashboard')}}" title="Dashboard">Dashboard</a></li>
                                    <li><a href="#">User</a></li>
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
                    <strong class="card-title text-left">New User</strong>
                </div>

                <div class="card-body">
                    <form action="{{route('admin-user-store')}}" method="post" enctype="multipart/form-data"
                        class="new-user">
                        @csrf
                        <h4>User Info :</h4>

                        <div class="row mt-2">
                            <div class="form-group col-md-4">
                                <label for="first-name" class="control-label mb-1">First Name <small
                                        class="text-danger">*</small></label>
                                <input id="first-name" name="first_name" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" placeholder="First Name" required=""
                                    value="{{old('first_name')}}">
                                <span class="text-danger"> {{ $errors->first('first_name') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="middle-name" class="control-label mb-1">Middle Name</label>
                                <input id="middle-name" name="middle_name" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" placeholder="Middle Name"
                                    value="{{old('middle_name')}}">
                                <span class="text-danger"> {{ $errors->first('middle_name') }}</span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last-name" class="control-label mb-1">Last Name</label>
                                <input id="last-name" name="last_name" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" placeholder="Last Name"
                                    value="{{old('last_name')}}">
                                <span class="text-danger"> {{ $errors->first('last_name') }}</span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-4">
                                <label for="phone" class="control-label mb-1">Phone</label>
                                <input id="phone" name="phone" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" placeholder="Phone" value="{{old('phone')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="address" class="control-label mb-1">Address</label>
                                <input id="address" name="address" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" placeholder="Address" value="{{old('address')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email" class="control-label mb-1">Email <small class="text-danger">*</small>
                                </label>
                                <input id="email" name="email" type="email" class="form-control" aria-required="true"
                                    aria-invalid="false" placeholder="Email" required="" value="{{old('email')}}">
                                <span class="text-danger"> {{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-4">
                                <label for="password" class="control-label mb-1">Password <small
                                        class="text-danger">*</small></label>
                                <input id="password" name="password" type="password" class="form-control"
                                    aria-required="true" aria-invalid="false" placeholder="" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="role" class="control-label mb-1">Select Role <small
                                        class="text-danger">*</small></label>
                                <select class="form-control" name="role">
                                    <option>Select User Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if(old('role')==$role->id) selected
                                        @endif>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="bold">Photo</label>
                                <div class="form-check form-check-inline">
                                    <input name="radio" class="form-check-input" type="radio" id="inlineRadio1" value="2">
                                    <label class="form-check-label" for="inlineRadio1">Camera</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="radio" class="form-check-input" type="radio" id="inlineRadio2" value="1">
                                    <label class="form-check-label" for="inlineRadio2">File</label>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12" id="file">
                                <label for="image" class="control-label mb-1">Photo</label>
                                <input id="image" name="image" type="file" class="form-control" aria-required="true"
                                    aria-invalid="false" placeholder="" value="{{old('image')}}"
                                    accept="image/png, image/jpeg,image/jpg,image/bmp">
                                <span class="text-danger"> {{ $errors->first('image') }}</span>
                            </div>
                            <div class="form-group col-md-8" id="web">
                                <div class="row">
                                    <input type="hidden" id="web_image" name="web_image">
                                    <div class="form-group col-md-4">
                                        <label for="exampleFormControlTextarea1">Webcam</label>
                                        <video id="video" class="border" width="200" height="200" playsinline
                                            autoplay></video>
    
                                        <button type="button" class="btn btn-sm btn-padding btn-success" id="take"
                                            onclick="takePicture()">Take Pictur</button>
                                        <button type="button" class="btn btn-sm btn-padding btn-danger float-right"
                                            id="snap">Capture</button>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleFormControlTextarea1">Picture</label>
                                        <canvas id="canvas" width="200" height="200" style="display:none;"
                                            class="border"></canvas>
                                        <img src="" alt="" id="photo">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-right mt-3">
                                <button type="reset" class="btn btn-warning mr-3"><i class="ti-reload mr-1"></i>
                                    Reset</button>
                                <button type="submit" class="btn btn-info"><i class="ti-save-alt mr-1"></i>
                                    Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $("#tableId").dataTable();
    $("#file").addClass('hide');
    $("#web").addClass('hide');
    $("#inlineRadio1").click(function () {
        $("#web").removeClass('hide');
        $("#file").addClass('hide');
    });

    $("#inlineRadio2").click(function () {
        $("#file").removeClass('hide');
        $("#web").addClass('hide');
    });

</script>
<style>
    .hide{display:none;}
</style>
<script>
	function takePicture() {
		'use strict';
		const video = document.getElementById('video');
		const snap = document.getElementById('snap');
		const canvas = document.getElementById('canvas');
		const photo = document.getElementById('photo');
		const errorMsgElement = document.getElementById('span#ErrorMsg');

		const constraints = {
			audio: false,
			video: {
				width: 200,
				height: 200
			}
		};

		async function init() {
			try {
				const stream = await navigator.mediaDevices.getUserMedia(constraints);
				handleSuccess(stream);
			} catch (e) {
				errorMsgElement.innerHTML = `navigator.getUserMedia.error:${e.toString()}`;
			}
		};


		function handleSuccess(stream) {
			window.stream = stream;
			video.srcObject = stream;
		}

		init();

		var context = canvas.getContext('2d');
		snap.addEventListener("click", function() {
			context.drawImage(video, 0, 0, 200, 200);
			photo.setAttribute('src', canvas.toDataURL('image/png'));
			var image = canvas.toDataURL('image/png');
			document.getElementById('web_image').value = image;
		});
	}
</script>
@endsection
