@extends('frontend.layouts.master')
@section('title', 'Course Enroll Success')
@section('styles')
<style>
      .success_card{
        text-align: center;
        margin: 50px 0;
      }
      .success_card .card h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
      }
      .success_card .card p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size:20px;
        margin: 0;
      }
      .success_card .card i {
      color: #9ABC66;
      font-size: 100px;
      line-height: 200px;
      margin-left:-15px;
    }
    .success_card .card {
      background: white;
      padding: 60px;
      border-radius: 4px;
      box-shadow: 0 2px 3px #C8D0D8;
      display: inline-block;
      margin: 0 auto;
    }
  </style>
@endsection
@section('content')

    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Course Enroll Success</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!--start contact section-->
    <section class="success_card">
        <div class="card">
            <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
              <i class="checkmark">✓</i>
            </div>
            <h1>Success</h1> 
            <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
        </div>
    </section>
    <!--end contact section-->
@endsection
