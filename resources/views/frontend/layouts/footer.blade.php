    <div class="modal fade bd-example-modal-lg" id="exampleModalScrollable" data-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Job Application form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Name *</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Full Name">
                                @if ($errors->has('name'))
                                    <p class="text-danger">
                                        <small>{{ $errors->first('name') }}</small>
                                    </p>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email *</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone"
                                    placeholder="Phone number">
                            </div>
                        </div>

                        <label class="form-label" for="">Gender</label>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                        value="Male" checked />
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                        value="Female" />
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                            </div>
                        </div>

                        <label class="form-label" for="">Address</label>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea name="address" class="form-control" id="" cols="40" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Attachment (CV)</label>
                                <input type="file" name="file" class="form-control" id="">
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="jobApplying">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer" class="mt-0" style="background:#333">
        <div class="container">
            <div class="row py-5">
                @foreach ($widgets as $widget)
                    @if ($widget->id == 1)
                        <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                            {!! $widget->desc !!}
                        </div>
                    @elseif($widget->id == 2)
                        <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                            {!! $widget->desc !!}

                        </div>
                    @elseif($widget->id == 3)
                        <div class="col-lg-3 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                            {!! $widget->desc !!}


                        </div>
                    @elseif($widget->id == 4)
                        <div class="col-lg-3 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                            {!! $widget->desc !!}

                            <p>© Copyright 2019. All Rights Reserved. Designed & Developed by <a
                                    href="http://revinr.com.au" target="_blank">revinr IT</a></p>
                        </div>

            </div>
            @endif
            @endforeach

        </div>
        </div>
        {{-- <div class="container">
                <div class="row py-2">
                    <div class="col text-center">
                        <ul class="footer-social-icons social-icons social-icons-clean social-icons-big social-icons-opacity-light social-icons-icon-light mt-1">
                            @foreach ($socials as $social)
                   
                            <li class="social-icons-facebook">
                                <a href="{{@$social->link}}" title="{{@$social->name}}" target="_blank">

                                    @if ($social->icon)
                                    <i class="{{@$social->icon}}"></i>

                                    @else
                                    {{@$social->name}}
                                    @endif
                                </a>
                            </li>
                             @endforeach


                           
                        </ul>
                    </div>
                </div>
            </div> --}}
        {{-- <div class="footer-copyright footer-copyright-style-2">
                <div class="container py-2">
                    <div class="row py-4">
                      <div class="col-lg-8 text-center text-lg-left mb-2 mb-lg-0">
                             <p>
                                <span class="pr-0 pr-md-3 d-block d-md-inline-block"><i class="far fa-dot-circle text-color-primary top-1 p-relative"></i><span class="text-color-light opacity-7 pl-1">1234 Street Name, City Name</span></span>
                                <span class="pr-0 pr-md-3 d-block d-md-inline-block"><i class="fab fa-whatsapp text-color-primary top-1 p-relative"></i><a href="tel:1234567890" class="text-color-light opacity-7 pl-1">(800) 123-4567</a></span>
                                <span class="pr-0 pr-md-3 d-block d-md-inline-block"><i class="far fa-envelope text-color-primary top-1 p-relative"></i><a href="mailto:mail@example.com" class="text-color-light opacity-7 pl-1">mail@example.com</a></span>
                            </p> 
                        </div>
                        <div class="col-lg-12 d-flex align-items-center justify-content-center justify-content-lg-end mb-4 mb-lg-0 pt-4 pt-lg-0">
                            <p>© Copyright 2019. All Rights Reserved. Designed & Developed by <a href="http://revinr.com" target="_blank">revinr IT</a></p>
                        </div>
                    </div>
                </div>
            </div> --}}
    </footer>
    </div>
