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
    <meta name="keywords" content="infinity workforce,workforce,{{ @$content->keywords }}" />
@endpush

@section('content')
    {{-- <img src="{{ asset('images/frontend/slider/' . $slides[0]->image) }}" alt="{{ @$slides[0]->sl }}"> --}}
    {{-- <div class="slider-container light rev_slider_wrapper" style="height: 700px">
        <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.8" data-plugin-revolution-slider
            data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 450, 'responsiveLevels': [4096,1200,992,500], 'navigation': {'arrows': {'enable': true, 'style': 'arrows-style-1 arrows-big arrows-dark'}}}">
            <ul>
                @foreach ($slides as $slide)
                    <li data-transition="fade">
                        <img src="{{ asset('images/frontend/slider/' . $slide->image) }}" alt="{{ @$slide->sl }}"
                            data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            class="rev-slidebg">

                        <div class="tp-caption" data-x="center" data-hoffset="['-150','-150','-150','-240']"
                            data-y="center" data-voffset="['-50','-50','-50','-75']" data-start="1000"
                            data-transform_in="x:[-300%];opacity:0;s:500;" data-transform_idle="opacity:0.8;s:500;">
                            <img src="{{ asset('frontend/img/slides/slide-title-border.png') }}" alt="">
                        </div>

                        {!! @$slide->caption !!}

                    </li>
                @endforeach

            </ul>
        </div>
    </div> --}}
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/frontend/slider/' . $slides[0]->image) }}"
                    alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/frontend/slider/' . $slides[1]->image) }}"
                    alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/frontend/slider/' . $slides[2]->image) }}"
                    alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" style="background-color: #7777772b;
                            border-radius: 18px; height: 66px; width: 70px; position: absolute;
                                         top: 50%;" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next align-items-center" href="#carouselExampleControls" style="background-color: #7777772b;
                            border-radius: 18px; height: 66px; width: 70px; position: absolute;
                                        top: 50%;" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    @if ($content->status == 1)
        <div class="container py-4">
            {!! @$content->desc !!}
        </div>
    @endif

    <section class="section section-no-background  border-0 pb-5 m-0 appear-animation" data-appear-animation="fadeIn">
        <div class="container">
            <div class="row justify-content-center recent-posts appear-animation" data-appear-animation="fadeInUpShorter"
                data-appear-animation-delay="200">
                <div class="col-md-12">
                    <h3 class="text-center">Our Services</h3>
                </div>
                @foreach ($services as $service)
                    <div class="col-sm-8 col-md-4 mb-4 mb-md-0">
                        <article>
                            <div class="row">
                                <div class="col">
                                    <a href="#" class="text-decoration-none">
                                        <img src="{{ asset('images/service') }}/{{ @$service->thumbnail }}"
                                            class="img-fluid hover-effect-2 mb-3" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    {{-- <p class="text-color-primary text-2 mb-1">LOREM IPSUM DOLOR SIT</p> --}}
                                    <h4 class="line-height-5 ls-0"><a href="{{ @$service->short_link }}"
                                            class="text-dark text-decoration-none">{{ @$service->title }}</a></h4>
                                    <p class="text-color-dark opacity-7 mb-3">
                                        {!! @$service->short_desc !!}
                                    </p>
                                    <a href="{{ route('career.index') }}"
                                        class="read-more text-color-primary font-weight-semibold text-2">VIEW MORE <i
                                            class="fas fa-chevron-right text-3 ml-2"></i></a>
                                </div>
                            </div>
                        </article>

                    </div>
                @endforeach

            </div>
        </div>
    </section>


    {{-- <section class="section bg-color-grey-scale-1 section-no-border section-center mb-0 appear-animation" data-appear-animation="fadeIn">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                        <div class="owl-carousel owl-theme nav-bottom rounded-nav mb-0" data-plugin-options="{'items': 1, 'loop': false, 'autoHeight': true}">
                            <div>
                                <div class="col">
                                    <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark mb-0">
                                        <div class="testimonial-author">
                                            <img src="{{asset('frontend')}}/img/clients/client-1.jpg" class="img-fluid
                                                rounded-circle" alt="">
                                                </div>
                                                <blockquote>
                                                    <p class="text-color-dark text-5 line-height-5">Your time is limited, so don’t waste it living someone else’s life.
                                                        Don’t be trapped by dogma - which is living with the results of other people’s thinking. Don’t let the noise of
                                                        others’ opinions drown out your own inner voice.</p>
                                                </blockquote>
                                                <div class="testimonial-author">
                                                    <p><strong class="opacity-9 font-weight-extra-bold text-2">-Steve Jobs. Apple</strong></p>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div>
                                                    <div class="col">
                                                        <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark mb-0">
                                                            <div class="testimonial-author">
                                                                <img src="{{asset('frontend')}}/img/clients/client-1.jpg" class="img-fluid rounded-circle" alt="">
                                                            </div>
                                                            <blockquote>
                                                                <p class="text-color-dark text-5 line-height-5">Your time is limited, so don’t waste it living someone
                                                                    else’s life. Don’t be trapped by dogma - which is living with the results of other people’s
                                                                    thinking. Don’t let the noise of others’ opinions drown out your own inner voice.</p>
                                                            </blockquote>
                                                            <div class="testimonial-author">
                                                                <p><strong class="opacity-9 font-weight-extra-bold text-2">-John Smith. Okler</strong></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="col">
                                                        <div class="testimonial testimonial-style-2 testimonial-with-quotes testimonial-quotes-dark mb-0">
                                                            <div class="testimonial-author">
                                                                <img src="{{asset('frontend')}}/img/clients/client-1.jpg" class="img-fluid rounded-circle" alt="">
                                                            </div>
                                                            <blockquote>
                                                                <p class="text-color-dark text-5 line-height-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                    Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor
                                                                    sit amet, consectetur adipiscing elit.</p>
                                                            </blockquote>
                                                            <div class="testimonial-author">
                                                                <p><strong class="opacity-9 font-weight-extra-bold text-2">-John Smith. Okler</strong></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                </section> --}}
@endsection

@push('footer')
@endpush
