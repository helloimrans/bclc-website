@extends('frontend.layouts.master')
@section('title', "$userType Registration")
@section('content')

    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
                <img src="{{ asset('frontend') }}/images/page-header.jpg" alt="image" class="img-fluid">
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">{{ $userType }} Registration</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start User registraiton section -->
    <section class="learner-registration my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="article-details bg-white login-registration-box">
                        <div class="">
                            <div class="text-center">
                                <img src="{{ asset('frontend') }}/logo/logo.png" class="logo mb-3" alt="Logo" />
                            </div>
                            <h4 class="text-center m-0 mb-3">Register as a {{ $userType }} </h4>
                            <form action="{{ route('user.registration.store') }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="#">Full Name<strong>:</strong></label>
                                    <input type="text" name="name" placeholder="Enter name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}">

                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="#">Mobile Number<strong>:</strong></label>
                                    <input type="tel" pattern="[0-9]*" name="mobile" placeholder="Enter mobile number"
                                        class="form-control @error('mobile') is-invalid @enderror"
                                        value="{{ old('mobile') }}">

                                    @error('mobile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
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
                                <div class="form-group">
                                    <label for="#">Confirm Password<strong>:</strong></label>
                                    <input type="password" name="password_confirmation" placeholder="Enter confirm password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        value="{{ old('password_confirmation') }}">

                                    @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if ($userType == 'Expert')
                                    <div class="form-group">
                                        <label for="">Select Role</label>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="regi-expert-role">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="is_lawyer"
                                                            name="is_lawyer" value="1" @if(old('is_consultant') == '1') checked @endif>
                                                        <label class="custom-control-label" for="is_lawyer">Lawyer</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="regi-expert-role">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="is_consultant" name="is_consultant" value="1" @if(old('is_consultant') == '1') checked @endif>
                                                        <label class="custom-control-label"
                                                            for="is_consultant">Consultant</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="regi-expert-role">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="is_trainer"
                                                            name="is_trainer" value="1" @if(old('is_trainer') == '1') checked @endif>
                                                        <label class="custom-control-label" for="is_trainer">Trainer</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="regi-expert-role">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="is_writer"
                                                            name="is_writer" value="1" @if(old('is_writer') == '1') checked @endif>
                                                        <label class="custom-control-label" for="is_writer">Writer</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <button type="submit" class="btn bd mt-2 mb-3 btn-block text-light"><i
                                        class="fa fa-user-plus"></i> Registration</button>
                                <p class="text-center mb-0 text-15">Already registered? <a class="td"
                                    href="{{ route('user.login') }}"
                                        >Login as a {{ $userType }}</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end User registraiton section  -->

@endsection
