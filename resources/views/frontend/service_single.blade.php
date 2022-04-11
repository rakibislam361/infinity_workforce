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
       
     <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"  style="@if(@$service->banner) background-image: url({{asset('images/service/')}}/{{@$content->banner}}); @else background-image: url({{asset('frontend')}}/img/page-header-about-us.jpg); @endif     padding: 4px 0 47px 0;">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-9 font-weight-bold">{{@$service->title}}</h1>
                   
                    {{-- <span class="sub-title">The perfect choice for your next project</span> --}}
                </div>
            </div>
        </div>
    </section>  

    <div class="container py-4">
        {!!@$service->long_desc!!}
    </div>

    <section class="section section-no-background  border-0 pb-5 m-0 appear-animation" data-appear-animation="fadeIn">
        <div class="container">
            <div class="row justify-content-center recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                
            </div>
        </div>
    </section>

@endsection

@push('footer')
 
		
@endpush