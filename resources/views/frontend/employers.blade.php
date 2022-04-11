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
    </section>   --}}


    <section class="section section-no-background  border-0 pb-5 m-0 appear-animation" data-appear-animation="fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-9 font-weight-bold">{{@$content->name}}</h1>
                </div>
            </div>
           
            <div class="row justify-content-center recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                <div class="col-md-12">
                   
                    {!!@$content->desc!!}
                </div>
                 {{-- 
                
                @if(Auth::check())
                 
                @else
                <div class="col-md-12 mt-3">
                    <a href="{{route('frontend-employer-register')}}" class="btn btn-info btn-md">Create Account</a>
                </div>
                @endif
                --}}
            </div>
        </div>
    </section>

@endsection

@push('footer')
 
        
@endpush