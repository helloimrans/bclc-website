@extends('frontend.layouts.master')
@section('title', 'Courses | '.@$service->title.'')
@section('content')
  <!-- start page header -->
  <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
    <div class="page-header-box">
      <div class="page-header-img">
        <img src="{{asset('frontend')}}/images/article-section.png" alt="image" class="img-fluid">
      </div>
      <div class="page-header-txt">
        <h4 class="mb-0">Training Courses</h4>
      </div>
    </div>
  </section>
  <!-- end page header -->

  <!-- start service section -->
  <section class="course-page-section py-5 my-5 wow fadeInDown" data-wow-duration="1s">
    <div class="container">
    <div class="row">
      @foreach ($courses as $course)
      <div class="col-lg-4 col-md-6">
        <div class="course-box mt-3">
            <div class="course-img">
              <img class="img-fluid" src="{{ asset($course->image) }}" alt="image">
            </div>
            <div class="course-desc">
              <div class="course-author">
                <div class="ta-img">
                  <div class="ta-img-main">
                    <img src="{{asset($course->expert->image)}}" alt="image">
                  </div>
                  <a href="#">{{ $course->expert->name }}</a>
                </div>
              </div>
              <h5><a href="{{ route('training.course.details',$course->slug) }}">{{ $course->title }}</a></h5>
              <span>{{ $course->serviceCategory->name }}</span>
              <p><i class="fa fa-calendar"></i> {{date('jS, F, Y', strtotime($course->class_start_date)) }} ({{ $course->duration }}) Hours</p>
              <p><img src="{{asset('frontend')}}/images/trached.png" alt="image">{{ $course->boarding }}</p>
            </div>
          </div>
    </div>
      @endforeach
      {{-- <div class="col-lg-4 col-md-6">
          <div class="course-box mt-3">
              <div class="course-img">
                <img class="img-fluid" src="{{asset('frontend')}}/images/training3.png" alt="image">
              </div>
              <div class="course-desc">
                <div class="course-author">
                  <div class="ta-img">
                    <div class="ta-img-main">
                      <img src="{{asset('frontend')}}/images/tauthor1.png" alt="image">
                    </div>
                    <a href="#">Md. Niamul Kabir</a>
                  </div>
                </div>
                <h5><a href="#!">Disciplinary Action & Separation of Employment</a></h5>
                <span>Labour Law & Service Matters</span>
                <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                <p><img src="{{asset('frontend')}}/images/trached.png" alt="image"> Virtual Platform</p>
              </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6">
          <div class="course-box mt-3">
              <div class="course-img">
                <img class="img-fluid" src="{{asset('frontend')}}/images/training3.png" alt="image">
              </div>
              <div class="course-desc">
                <div class="course-author">
                  <div class="ta-img">
                    <div class="ta-img-main">
                      <img src="{{asset('frontend')}}/images/tauthor1.png" alt="image">
                    </div>
                    <a href="#">Md. Niamul Kabir</a>
                  </div>
                </div>
                <h5><a href="#!">Disciplinary Action & Separation of Employment</a></h5>
                <span>Labour Law & Service Matters</span>
                <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                <p><img src="{{asset('frontend')}}/images/trached.png" alt="image"> Virtual Platform</p>
              </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6">
          <div class="course-box mt-3">
              <div class="course-img">
                <img class="img-fluid" src="{{asset('frontend')}}/images/training3.png" alt="image">
              </div>
              <div class="course-desc">
                <div class="course-author">
                  <div class="ta-img">
                    <div class="ta-img-main">
                      <img src="{{asset('frontend')}}/images/tauthor1.png" alt="image">
                    </div>
                    <a href="#">Md. Niamul Kabir</a>
                  </div>
                </div>
                <h5><a href="#!">Disciplinary Action & Separation of Employment</a></h5>
                <span>Labour Law & Service Matters</span>
                <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                <p><img src="{{asset('frontend')}}/images/trached.png" alt="image"> Virtual Platform</p>
              </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6">
          <div class="course-box mt-3">
              <div class="course-img">
                <img class="img-fluid" src="{{asset('frontend')}}/images/training3.png" alt="image">
              </div>
              <div class="course-desc">
                <div class="course-author">
                  <div class="ta-img">
                    <div class="ta-img-main">
                      <img src="{{asset('frontend')}}/images/tauthor1.png" alt="image">
                    </div>
                    <a href="#">Md. Niamul Kabir</a>
                  </div>
                </div>
                <h5><a href="#!">Disciplinary Action & Separation of Employment</a></h5>
                <span>Labour Law & Service Matters</span>
                <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                <p><img src="{{asset('frontend')}}/images/trached.png" alt="image"> Virtual Platform</p>
              </div>
            </div>
      </div>
      <div class="col-lg-4 col-md-6">
          <div class="course-box mt-3">
              <div class="course-img">
                <img class="img-fluid" src="{{asset('frontend')}}/images/training3.png" alt="image">
              </div>
              <div class="course-desc">
                <div class="course-author">
                  <div class="ta-img">
                    <div class="ta-img-main">
                      <img src="{{asset('frontend')}}/images/tauthor1.png" alt="image">
                    </div>
                    <a href="#">Md. Niamul Kabir</a>
                  </div>
                </div>
                <h5><a href="#!">Disciplinary Action & Separation of Employment</a></h5>
                <span>Labour Law & Service Matters</span>
                <p><i class="fa fa-calendar"></i> 6 Aug 2022 (5 Day Long)</p>
                <p><img src="{{asset('frontend')}}/images/trached.png" alt="image"> Virtual Platform</p>
              </div>
            </div>
      </div> --}}
    </div>
    
    </div>
  </section>
  <!-- end service section -->
{{-- @section('scripts')
  <script>
  </script>
@endsection --}}

@endsection