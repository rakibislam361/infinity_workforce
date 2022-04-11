

@extends('frontend.layouts.master')
@push('title') {{$content->name}} @endpush
@push('head')
    <meta property="og:title" content="{{@$content->name}}">
    @if(@$content->og_image)
     <meta property="og:image" content="{{asset('images/seos')}}/{{@$content->og_image}}">
    @else
        <meta property="og:image" content="{{asset('images/seos/default-logo.png')}}">
    @endif
     <meta name="description" content="{{@$content->meta_desc}}">
     <meta name="og:url" content="{{@$content->og_url}}"> 
@endpush

@section('content')
{{-- <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"  style="@if(@$content->banner) background-image: url({{asset('images/frontend/page-banner/')}}/{{@$content->banner}}); @else background-image: url({{asset('frontend')}}/img/page-header-about-us.jpg); @endif ">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="text-9 font-weight-bold">{{@$content->name}}</h1>
               
            </div>
        </div>
    </div>
</section> --}}

<div class="container">
  <div class="row">
        <div class="col-md-12 mt-3">
            <h1 class="text-9 font-weight-bold">{{@$content->name}}</h1>
        </div>
    </div>
  <div class="row py-4">
    <div class="col-lg-7 appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="650" style="animation-delay: 650ms;">
       @if ($message = Session::get('success'))
       <div class="alert alert-success fade in alert-dismissible show" style="margin-top:18px;">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="font-size:20px">×</span>
          </button>    
          {{$message}}
        </div>
      @endif 
     
      <form id="contactFormAdvanced" action="{{route('frontend-contact-mail')}}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label class="required font-weight-bold text-dark text-2">Full Name</label>
            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required="">
          </div>
          <div class="form-group col-md-6">
            <label class="required font-weight-bold text-dark text-2">Email Address</label>
            <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required="">
          </div>
          <div class="form-group col-md-6">
            <label class="font-weight-bold text-dark text-2">Phone</label>
            <input type="text" value="" data-msg-required="Please enter your phone" data-msg-email="Please enter a valid phone" maxlength="100" class="form-control" name="phone" id="phone" required="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label class="required font-weight-bold text-dark text-2">Subject</label>
            <input type="text" value="" data-msg-required="Please enter your subject" data-msg-email="Please enter a valid Subject" maxlength="100" class="form-control" name="subject" id="subject" required="">
          </div>
        </div>
       
       {{--  <div class="form-row">
          <div class="form-group col-md-12">
            <label class="font-weight-bold text-dark text-2">Attachment</label>
            <input class="d-block" type="file" name="attachment" id="attachment">
          </div>
        </div> --}}
        <div class="form-row">
          <div class="form-group col-md-12 mb-4">
            <label class="required font-weight-bold text-dark text-2">Message</label>
            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="6" class="form-control" name="message" id="message" required=""></textarea>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12 mb-5">
            <input type="submit" id="contactFormSubmit" value="Send Message" class="btn btn-primary btn-modern pull-right" data-loading-text="Loading...">
          </div>
        </div>
      </form>

    </div>
    <div class="col-lg-5">
       {!!@$content->desc!!}
    </div>

  </div>

</div>

@endsection

@push('footer')

@endpush