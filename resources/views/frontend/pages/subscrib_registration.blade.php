@extends('frontend.layouts.master')
@section('title', 'Subscriber Registration')
@section('content')

<style>
  .padding{
    padding:10px;
  }
</style>

    <!-- start page header -->
    <section class="page-header-section wow fadeInDown" data-wow-duration="1s">
        <div class="page-header-box">
            <div class="page-header-img">
             
            </div>
            <div class="page-header-txt">
                <h4 class="mb-0">Subscriber Registration</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start service section -->
    <div class="article-details bg-white mt-5 container">
    <div class="panel-heading text-center bg-light padding"><i class="fa fa-user-circle"></i> Subscriber Registration</div>
        <form action="" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="" class="mt-2">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Date of Birth </label>
                    <input type="date" name="Date_Birth" id="name" placeholder="Name" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Mobile No</label>
                    <input type="text" name="mobile" id="name" placeholder="Mobile No" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="Email" id="name" placeholder="Email" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Password </label>
                    <input type="text" name="Password" id="name" placeholder="Password" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Confirm Password </label>
                    <input type="text" name="Confirm_Password" id="name" placeholder="Confirm Password" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Profile Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo">                 
                   </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Profession</label>
                    <select class="form-control" name="profession" value="">
                      <option value="">Select Your Profession</option>
                      <option value="Private Service">Private Service</option>
                      <option value="Govt. Service">Govt. Service</option>
                      <option value="Doctor">Doctor</option>
                      <option value="Lawyer">Lawyer</option>
                      <option value="Law Student">Law Student</option>
                      <option value="Businessman">Businessman</option>
                      <option value="Researcher">Researcher</option>
                      <option value="HR Professional">HR Professional</option>
                      <option value="Accounts &amp; Audits Profession">Accounts &amp; Audits Profession</option>
                      <option value="Compliance">Compliance</option>
                      <option value="Others">Others</option>
                   </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="">Address </label>
                    <textarea name="address" rows="3" id="address" placeholder="Address" class="form-control"></textarea>                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Institute/Organization</label>
                    <textarea name="Institute_Organization" rows="3" id="address" placeholder="" class="form-control"></textarea>                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Education Qualification</label>
                    <textarea name="Education" rows="3" id="address" placeholder="" class="form-control"></textarea>                  </div>
                </div>
                <div class="form-group text-center">
                   <input type="checkbox" name="terms_and_condition" id="remember_me" class="filled-in">
                   <label for="terms_and_condition"> <a target="_blank" href="#">I Agree to Terms And Condition</a></label>
                 </div>
                    <div class="col-md-12 ">
                        <div class="form-group contact-form" style="margin-top: 20px;">
                        <button class="btn btn-default" type="submit">Register</button>
                    </div>
                    </div>
            </div>
        </form>
    </div>
    <!-- end service section -->

@endsection
