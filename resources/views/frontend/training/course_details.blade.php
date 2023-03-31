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
                    <img src="{{asset($course->expert->image)}}" class="img-fluid" alt="">
                    <div class="td-img-txt">
                        <h4>{{ $course->title }}</h4>
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
                    <p>
                        {{ $course->short_description }}
                    </p>
                    <h5>Key Takeaways</h5>
                    <ul>
                        {{ $course->key_takeaways }}
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
                            <p> Date : 
                                {{date('jS, F, Y', strtotime($course->class_start_date)) }} 
                                to 
                                {{date('jS, F, Y', strtotime($course->class_end_date)) }}
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <p><i class="fa fa-calendar-o"></i></p>
                        <div class="media-body">
                            <p>Class Schedule : 
                                @forelse (json_decode($course->schedule) as $schedule)
                                    <span class="badge badge-secondary">{{ $schedule }}</span>
                                @empty
                                @endforelse
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <p><i class="fa fa-clock-o"></i> </p>
                        <div class="media-body">
                            <p>Class Time : 
                                {{\Carbon\Carbon::createFromFormat('H:i:s',$course->class_start_time)->format('h:i A')}}
                                to 
                                {{\Carbon\Carbon::createFromFormat('H:i:s',$course->class_end_time)->format('h:i A')}}
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <p><i class="fa fa-clock-o"></i></p>
                        <div class="media-body">
                            <p> Total Hours : 
                                {{ $course->duration }} 
                                Hour
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <p><i class="fa fa-map-marker"></i></p>
                        <div class="media-body">
                            <p> Venue : {{ $course->venue }}</p>
                        </div>
                    </div>
                </div>

                <div class="section-title mt-4 pt-3 mb-3 wow fadeInDown" data-wow-duration="1s">
                    <h2><span>Curriculum</span></h2>
                </div>
                <div class="td-curriculum wow fadeInDown" data-wow-duration="1s">
                    <div class="tdr-height">
                        {{ $course->curriculum }}
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
                            <span>Course ID: {{ $course->course_id }}</span>
                            <span>Registration Fee: {{ $course->fee }}/=</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="td-contact">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Contact For Training</h6>
                                </div>
                                <div class="card-body">
                                    <span>
                                        Cell: {{ $course->expert->mobile }}
                                    </span>
                                    <span>
                                        Email: {{ $course->expert->email }}
                                    </span>
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
                                <h6 class="mt-3">{{ $course->expert->name }}</h6>
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