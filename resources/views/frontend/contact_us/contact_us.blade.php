@extends('frontend.layouts.master')
@section('title', 'Contact Us')
@section('content')

    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Contact Us</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!--start contact section-->
    <section class="contact-us py-5">
        <div class="container">
            <div class="article-details bg-white p-sm-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="contact-us-form">
                            <div class="contact-form">
                                <h5 class="mb-3 font-weight-bold">GET IN TOUCH</h5>

                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{$message}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                <form id="contactUs" action="{{ route('contact.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text"
                                            name="name" placeholder="Full name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('mobile') is-invalid @enderror" type="tel"
                                            pattern="[0-9]*" name="mobile" placeholder="Mobile number"
                                            value="{{ old('mobile') }}">
                                        @error('mobile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                                            name="email" placeholder="Email address" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control @error('subject') is-invalid @enderror" type="text"
                                            name="subject" placeholder="Subject" value="{{ old('subject') }}">
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control @error('name') is-invalid @enderror" name="message" placeholder="Your message"
                                            rows="2">{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>





                                    <button class="sub-btn mt-2" type="submit"><i class="fa fa-paper-plane mr-1"></i>Send
                                        Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-us-details mt-4 mt-md-0">
                            <div class="office-address mb-5">
                                <p style="font-size: 16px;"><strong>Bangladesh (Head Office) :</strong></p>
                                <p>House # 63, Road # 13, Sector # 10, Uttara, Dhaka-1230, Bangladesh.</p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-hotline mr-1"></i> Hotline - +8801755430927
                                </p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-phone mr-1"></i> Phone - +8801755430927</p>

                                <p><i class="fa fa-envelope text-custom ad-icons ad-email mr-1"></i> Email -
                                    imranahmed.developer@gmail.com</p>
                            </div>
                            <div class="contact-social">
                                <a href=""><i class="fa fa-facebook"></i></a>
                                <a href=""><i class="fa fa-linkedin"></i></a>
                                <a href=""><i class="fa fa-whatsapp"></i></a>
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end contact section-->

@endsection
