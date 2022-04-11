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
       
    {{--  <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"  style="@if(@$content->banner) background-image: url({{asset('images/frontend/page-banner/')}}/{{@$content->banner}}); @else background-image: url({{asset('frontend')}}/img/page-header-about-us.jpg); @endif ">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-9 font-weight-bold">{{@$content->name}}</h1>
                   
                    
                </div>
            </div>
        </div>
    </section>   --}}

    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-9 font-weight-bold">{{@$content->name}}</h1>
             </div>
        </div> 
        {!!@$content->desc!!}
    </div>

    <section class="section section-no-background  border-0 pb-5 m-0 appear-animation" data-appear-animation="fadeIn">
        <div class="container">
            <div class="row justify-content-center recent-posts appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                @foreach($services as $service)
                <div class="col-sm-8 col-md-4 mb-4 mb-md-0">
                        <article>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="text-decoration-none">
                                        <img src="{{asset('images/service')}}/{{@$service->thumbnail}}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{-- <p class="text-color-primary text-2 mb-1">LOREM IPSUM DOLOR SIT</p> --}}
                                    <h4 class="line-height-5 ls-0"><a href="{{@$service->short_link}}" class="text-dark text-decoration-none">{{@$service->title}}</a></h4>
                                    <p class="text-color-dark opacity-7 mb-3">
                                        {!!@$service->short_desc!!}
                                    </p>
                                    <a href="{{@$service->short_link}}" class="read-more text-color-primary font-weight-semibold text-2">VIEW MORE <i class="fas fa-chevron-right text-3 ml-2"></i></a>
                                </div>
                            </div>
                        </article>
                       
                    </div>
                @endforeach
                <div class="col-md-12 text-right">
                    {{$services->links()}}
                </div>
            </div>
        </div>
    </section>

@endsection

@push('footer')
 
		
@endpush