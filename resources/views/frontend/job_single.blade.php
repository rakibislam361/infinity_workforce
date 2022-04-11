@extends('frontend.layouts.master')
@push('title') {{ $content->name }} @endpush
@push('head')
    <meta property="og:title" content="{{ @$content->name }}">
    @if (@$content->og_image)
        <meta property="og:image" content="{{ asset('images/seos') }}/{{ @$content->og_image }}">
    @else
        <meta property="og:image" content="{{ asset('images/seos/default-logo.png') }}">
    @endif
    <meta name="description" content="{{ @$content->meta_desc }}">
    <meta name="og:url" content="{{ @$content->og_url }}">
@endpush

@section('content')

    {{-- <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"  style=" background-image: url({{asset('frontend')}}/img/page-header-about-us.jpg);  padding: 4px 0 47px 0;">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-9 font-weight-bold">{{@$job->title}}</h1>
                   
                   
                </div>
            </div>
        </div>
    </section> --}}



    <section class="section section-no-background  border-0 pb-5 m-0 appear-animation" data-appear-animation="fadeIn">
        <div class="container">
            <div class="row justify-content-center recent-posts appear-animation" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="200">
                <div class="col-md-12">
                    <h2 class="text-9 font-weight-bold">{{ @$job->title }}</h2>
                    <h4>Category : {{ @$job->category->name }}</h4>
                    {!! @$job->desc !!}
                </div>

                <div class="col-md-12 mt-4">
                    <a id="applye-form" class="btn btn-sm btn-primary" href="{{ url('/apply-job') }}/{{ @$job->id }}"
                        data="{{ @$job->id }}">Applye
                        Now</a>
                </div>

                {{-- <div class="col-md-12">
                    @if (Auth::check())
                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                            <a href="#" class="read-more text-color-primary font-weight-semibold text-2" title="You Can't Apply The Job">Apply Now</a>
                        @else
                            <a href="{{url('/apply-job/')}}/{{@$job->id}}" class="mt-3 btn btn-md btn-success font-weight-semibold text-2">Apply Now</a>
                        @endif
                    @else
                         <a href="{{url('/register-user')}}" class="mt-3 btn btn-md btn-success font-weight-semibold text-2">Apply Now</a>
                    @endif
                </div> --}}
            </div>
        </div>
    </section>

@endsection

@push('footer')


@endpush
