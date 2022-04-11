
@extends('frontend.layouts.master')
@push('title')Register @endpush
@push('head')
    <meta property="og:title" content="Register">
    <meta property="og:image" content="{{asset('images/seos/default-logo.png')}}">
    <meta name="description" content="">
    <meta name="og:url" content="">
@endpush

@section('content')

<div class="empty-40" style="height: 50px; width: 100%;"></div>
<div class="container">
	@if ($message = Session::get('success'))
       <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
          </button>    
          {{$message}}
        </div>
      @endif 
	<form method="POST" action="{{ route('frontend-employer-store') }}">
	                @csrf

	                <div class="row  mb-3">
	                	<div class="col-md-12 text-center">
	                		<h4>
				               	INFINITY WORKFORCE EMPLOYER REGISTATION
				            </h4>
	                	</div>
	                </div>
	                <div class="form-group row">
	                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

	                    <div class="col-md-6">
	                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

	                        @if ($errors->has('email'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('email') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} <small class="text-info">Password length minimum 6</small></label>

	                    <div class="col-md-6">
	                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password" placeholder="Password">

	                        @if ($errors->has('password'))
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $errors->first('password') }}</strong>
	                            </span>
	                        @endif
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

	                    <div class="col-md-6">
	                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
	                    </div>
	                </div>
	                <input type="hidden" name="role" value="3">
	                <div class="form-group row mb-5 mt-3">
	                    <div class="col-md-6 offset-md-4">
	                        <button type="submit" class="btn btn-modern btn-quaternary rounded-0">
	                            {{ __('Register') }}
	                            <i class="ti-arrow-right"></i>
	                        </button>
	                        <p class="ml-3 float-right">Already Have an Account? <a href="/login" title="Login">Login Here</a></p>
	                    </div>
	                </div>
	</form>
	
</div>


@endsection