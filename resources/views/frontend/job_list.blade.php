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
                @foreach($jobs as $job)

                <div class="col-sm-8 col-md-12 mb-4 mb-md-0 mt-3">
                    <article>
                        <div class="row">
                            <div class="col">
                                <a href="#" class="text-decoration-none">
                                    <img src="{{asset('images/service')}}/{{@$job->thumbnail}}" class="img-fluid hover-effect-2 mb-3" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                               
                                {{-- <p class="text-color-primary text-2 mb-1">LOREM IPSUM DOLOR SIT</p> --}}
                                <h4 class="line-height-5 ls-0"><a href="{{url('/jobs')}}/{{@$job->slug}}" class="text-dark text-decoration-none">{{@$job->title}}</a></h4>
                                <h5 class="text-bold">{{@$job->category->name}}</h5>
                                <p class="text-color-dark opacity-7 mb-3">
                                    {{-- {!! str_limit($job->desc, $limit = 100, $end = '...') !!} --}}
                                    {!! $job->desc !!}
                                </p>
                                @if(Auth::check())
                                    @if(Auth::user()->role_id==1 || Auth::user()->role_id==3)
                                        <a href="#" class="read-more text-color-primary font-weight-semibold text-2">Apply Now</a>
                                    @else
                                        <a href="{{url('/apply-job/')}}/{{@$job->id}}" class="read-more text-color-primary font-weight-semibold text-2">Apply Now</a>
                                    @endif
                                @else
                                     <a href="{{url('/register-user')}}" class="read-more text-color-primary font-weight-semibold text-2">Apply Now</a>
                                @endif

                            </div>
                        </div>
                    </article>
                   
                </div>
                @endforeach
                <div class="col-md-12 text-right">
                    {{$jobs->links()}}
                </div>
            </div>
        </div>
    </section>

@endsection

@push('footer')
 
        
@endpush