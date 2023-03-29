@extends('frontend.layouts.master')
@section('title', "Contact Us")
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
                                <form id="contactUs" method="post">

                                    <input class="form-control mb-3" type="text" name="name" placeholder="Name">

                                    <input class="form-control mb-3" type="text" name="phone" placeholder="Phone">

                                    <input class="form-control mb-3" type="text" name="email" placeholder="Email">

                                    <input class="form-control mb-3" type="text" name="subject" placeholder="Subject">

                                    <textarea class="form-control mb-3" name="message" placeholder="Your message" rows="5"></textarea>

                                    <button class=" btn btn-primary mt-2" style="font-size: 14px;"><i class="fa fa-paper-plane mr-1"></i>SEND MESSAGE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-us-details mt-4 mt-md-0">
                            <div class="office-address mb-5">
                                <p style="font-size: 16px;"><strong>Bangladesh (Head Office) :</strong></p>
                                <p>House # 63, Road # 13, Sector # 10, Uttara, Dhaka-1230, Bangladesh.</p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-hotline mr-1"></i> Hotline - +8801755430927</p>

                                <p><i class="fa fa-phone text-custom ad-icons ad-phone mr-1"></i> Phone - +8801755430927</p>

                                <p><i class="fa fa-envelope text-custom ad-icons ad-email mr-1"></i> Email - imranahmed.developer@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end contact section-->

@endsection
