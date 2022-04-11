@extends('frontend.layouts.master')
@push('title')
    {{ $content->name }}
@endpush
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
    {{-- <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7"  style="@if (@$content->banner) background-image: url({{asset('images/frontend/page-banner/')}}/{{@$content->banner}}); @else background-image: url({{asset('frontend')}}/img/page-header-about-us.jpg); @endif ">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-9 font-weight-bold">{{@$content->name}}</h1>
                   
                    
                </div>
            </div>
        </div>
    </section> --}}

    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-9 font-weight-bold">{{ @$content->name }}</h1>
            </div>
        </div>
    </div>

    <section class="section section-no-background  border-0 pb-5 m-0 appear-animation" data-appear-animation="fadeIn">
        <div class="container">
            <div class="row justify-content-center recent-posts appear-animation" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="200">
                @foreach ($jobs as $job)
                    <div class="col-sm-8 col-md-6 mb-4 mb-md-0">
                        <article>
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="card-body" style="padding: 1rem;">
                                        <div class="d-flex">
                                            <div class="col-md-4">
                                                @if ($job->thumbnail)
                                                    <img src="{{ asset('images/jobs/' . $job->thumbnail) }}" alt=""
                                                        class="card-img" alt="...">
                                                @else
                                                    <img src="{{ asset('images/jobs/no-img.png') }}" alt=""
                                                        class="card-img" alt="...">
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div>
                                                    <a href="{{ url('/jobs') }}/{{ @$job->slug }}">
                                                        <h3 class="card-title">{{ $job->title }}</h3>
                                                    </a>
                                                    <small
                                                        style="font-size: 12px;"><strong>{{ with($job->created_at)->format('F j, Y') }}</strong></small>
                                                </div>
                                                <p class="card-text">{{ Str::limit($job->desc, 150, $end = '...') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between" style="padding: 1rem">
                                            <a class="btn btn-light"
                                                href="{{ url('/jobs') }}/{{ @$job->slug }}">Details</a>

                                            <button id="applye-form" class="btn btn-sm btn-primary"
                                                data="{{ url('/apply-job') }}/{{ @$job->id }}">Apply
                                                Now</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
                <div class="col-md-12 text-right">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('footer')
@endpush
