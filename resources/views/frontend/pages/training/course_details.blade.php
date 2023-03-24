@extends('frontend.layouts.master')
@section('title', 'Course Details | '.@$service->title.'')
@section('content')
<!-- start page header -->
<section class="page-header-section wow fadeInDown" data-wow-duration="1s">
    <div class="page-header-box">
        <div class="page-header-img">
            <img src="{{asset('frontend')}}/images/training-details.png" alt="image" class="img-fluid">
        </div>
        <div class="page-header-txt">
            <h4 class="mb-0">Course Details</h4>
        </div>
    </div>
</section>
<!-- end page header -->

<!-- start training details section -->
<section class="course-details-section py-5 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="td-image">
                    <img src="{{asset('frontend')}}/images/training1.png" class="img-fluid" alt="">
                    <div class="td-img-txt">
                        <h4>Fundamentals of Labour Law & Rules</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="td-text">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="mt-4 mt-md-0">Program Overview</h5>
                        </div>
                        <div class="col-lg-6">
                            <div class="td-share">
                                <a href=""><i class="fa fa-heart"></i></a>
                                <a href=""><i class="fa fa-share-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <p>This Fundamentals of Labour Law & Rules training program is designed to give the young
                        learner an immersive, transformational experience, equipping him/her with the practical
                        skills to deliver on the ground. It not only familiarizes you with the art and science of
                        project management and global best practices but also affirms your ability to participate,
                        lead, and manage complex projects.
                    </p>
                    <h5>Key Takeaways</h5>
                    <ul>
                        <li>Understand the Project Management Life Cycle and its relevance to practice </li>
                        <li>Get insights to world class Project Management practices</li>
                        <li>Helps you get a holistic view of business and not just technical aspects</li>
                        <li>Understand the concepts of each of Project Management knowledge areas</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-5">
                <div class="course-features wow fadeInDown" data-wow-duration="1s">
                    <h5>Courses Features</h5>
                    <div class="media">
                        <p><i class="fa fa-calendar-o"></i></p>
                        <div class="media-body">
                            <p> Date : 6 August 2021 to 10 August 2021</p>
                        </div>
                    </div>
                    <div class="media">
                        <p><i class="fa fa-calendar-o"></i></p>
                        <div class="media-body">
                            <p>Class Schedule : Saturday, Sunday, Monday, Tuesday, Friday</p>
                        </div>
                    </div>
                    <div class="media">
                        <p><i class="fa fa-clock-o"></i> </p>
                        <div class="media-body">
                            <p>Class Time : 8:00PM - 11:00 PM</p>
                        </div>
                    </div>
                    <div class="media">
                        <p><i class="fa fa-clock-o"></i></p>
                        <div class="media-body">
                            <p> Total Hours : 15 Hour</p>
                        </div>
                    </div>
                    <div class="media">
                        <p><i class="fa fa-map-marker"></i></p>
                        <div class="media-body">
                            <p> Venue : Virtual Platform</p>
                        </div>
                    </div>
                </div>

                <div class="section-title mt-4 pt-3 mb-3 wow fadeInDown" data-wow-duration="1s">
                    <h2><span>Curriculum</span></h2>
                </div>
                <div class="td-curriculum wow fadeInDown" data-wow-duration="1s">
                    <div class="tdr-height">
                        <p>Synopsis of the Training:</p>
                        <p><strong>Abc</strong></p>
                        <p> Interective discussion sessions
                            ; Practical examples and experience sharing
                            ; Relevant Case Study and possible solutions
                            ; Assignment</p>

                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, illo aut modi
                            cupiditate iusto iste quisquam dolorem ullam esse maxime! Voluptatum distinctio
                            blanditiis voluptatem nulla officia, repellendus odio, nihil sint necessitatibus, enim
                            assumenda quod itaque beatae laudantium optio qui magnam illum. Quam, tenetur aut ut
                            quos consequatur cupiditate excepturi in deleniti consequuntur alias laborum itaque id
                            illo modi amet omnis magnam impedit doloribus corporis nemo. A nulla animi, itaque quod,
                            voluptatibus voluptatem dicta delectus quasi ad quibusdam, reprehenderit illo
                            temporibus. Accusamus quo, qui, aliquid, animi porro sed aut alias at corrupti vel natus
                            nesciunt eligendi laborum. Porro esse quam minima.</p>
                    </div>
                    <a href="javascript:;" class="mt-2 tdr-show">Show More</a>
                </div>

                <div class="td-accordions wow fadeInDown" data-wow-duration="1s">
                    <div id="accordion" class="service-accordion">
                        <div class="card">
                            <div class="card-header" id="heading-1">
                                <h5 class="mb-0">
                                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="false"
                                        aria-controls="collapse-1" class="collapsed">
                                        Our Training offering
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-1" class="collapse" data-parent="#accordion"
                                aria-labelledby="heading-1" style="">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa perspiciatis excepturi, vel porro nam aperiam ad molestiae iusto recusandae officiis saepe quis repellendus illo sint quam laboriosam a animi placeat!
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading-2">
                                <h5 class="mb-0">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2"
                                        aria-expanded="false" aria-controls="collapse-2">
                                        Our Consulting Offering
                                    </a>
                                </h5>
                            </div>
                            <div id="collapse-2" class="collapse" data-parent="#accordion"
                                aria-labelledby="heading-2">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum beatae vel, inventore quasi dolor earum officia eum cum aliquid molestiae esse, expedita maxime commodi voluptatum in deleniti tempore consequuntur eos!
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="row mt-4 mt-md-0 wow fadeInDown" data-wow-duration="1s">
                    <div class="col-lg-6">
                        <div class="td-course-id">
                            <span>Course ID: 2108FLLR01</span>
                            <span>Registration Fee: BDT 5,000/=</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="td-contact">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Contact For Training</h6>
                                </div>
                                <div class="card-body">
                                    <span>Cell: +880 1886 456688</span>
                                    <span>Email: training@bclcbd.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-title mt-4 mb-4 wow fadeInDown" data-wow-duration="1s">
                    <h2 style="margin-right:240px;"><span>Resource Person</span></h2>
                </div>

                <div class="td-resource wow fadeInDown" data-wow-duration="1s">
                    <div class="tdr-person">
                        <div class="media">
                            <div class="mda-img">
                                <img src="{{asset('frontend')}}/images/resource-peron.png" alt="image">
                            </div>
                            <div class="media-body">
                                <h6 class="mt-3">Md. Niamul Kabir</h6>
                                <span>Advocate</span>
                                <span>Supreme Court of Bangladesh</span>
                            </div>
                        </div>
                        <div class="tdr-desc">
                            <p>Mr. Niamul Kabir is empirically experienced as a Law Practitioner at court,
                                Consultant of employment law and regulatory compliance affairs, In-house Legal
                                Counsel, Trainer and Facilitator in Legal and Compliance arena, Accredited Mediator,
                                Negotiator & Arbitrator, Head of Legal and Compliance in nongovernmental
                                organization for a significant time with remarkable track record of legal activities
                                for more than twelve years. Mr. Niamul Kabir is empirically experienced as a Law
                                Practitioner at court, Consultant of employment law and regulatory compliance
                                affairs, In-house Legal Counsel, Trainer and Facilitator in Legal and Compliance
                                arena, Accredited Mediator, Negotiator & Arbitrator, Head of Legal and Compliance in
                                nongovernmental organization for a significant time with remarkable track record of
                                legal activities for more than twelve years. Mr. Niamul Kabir is empirically
                                experienced as a Law Practitioner at court, Consultant of employment law and
                                regulatory compliance affairs, In-house Legal Counsel, Trainer and Facilitator in
                                Legal and Compliance arena, Accredited Mediator, Negotiator & Arbitrator, Head of
                                Legal and Compliance in nongovernmental organization for a significant time with
                                remarkable track record of legal activities for more than twelve years.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end training details section -->
  <!-- end service section -->
{{-- @section('scripts')
  <script>
  </script>
@endsection --}}

@endsection