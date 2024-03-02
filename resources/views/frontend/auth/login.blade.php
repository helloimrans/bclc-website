@extends('frontend.layouts.master')
@section('title', "$userType Login")
@section('content')

    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">{{ $userType }} Login</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start learner registraiton section -->
    <section class="learner-registration my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mx-auto">
                    <div class="article-details bg-white login-registration-box">
                        <div class="">
                            <div class="text-center">
                                <img src="{{ asset('frontend') }}/logo/logo.png" class="logo mb-3" alt="Logo" />
                            </div>
                            <h4 class="text-center m-0 mb-3">Login as a {{ $userType }} </h4>
                            <form action="{{ route('user.login.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="#">Email<strong>:</strong></label>
                                    <input type="text" name="email" placeholder="Enter email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}">

                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Password<strong>:</strong></label>
                                    <input type="password" name="password" placeholder="Enter password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        value="{{ old('password') }}">

                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn bd mt-2 mb-3 btn-block text-light"><i
                                        class="fa fa-sign-in"></i> Login</button>
                                <p class="text-center mb-0 text-15">Not registered yet? <a class="td"
                                    href="{{ route('user.registration') }}"
                                        >Register as a {{ $userType }}</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end learner registraiton section  -->

@endsection
