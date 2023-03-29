@extends('frontend.layouts.master')
@section('title', 'Expert Registration')
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
                <h4 class="mb-0">Expert Registration</h4>
            </div>
        </div>
    </section>
    <!-- end page header -->

    <!-- start service section -->
    <div class="article-details bg-white mt-5 container">
    <div class="panel-heading text-center bg-light padding mb-4"><i class="fa fa-user-circle"></i> Personal Details</div>
        <form action="" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-3 text-center">
                  <div class="form-group ">
                      <label class="control-label" for="lawyer">Lawyer</label>
                      <input type="checkbox" name="lawyer" id="lawyer" value="1">
                    </div>
               </div>
              <div class="col-md-3 text-center">
                   <div class="form-group ">
                       <label class="control-label" for="consultant">Consultant</label>
                      <input type="checkbox" name="consultant" id="consultant" value="1">
                     </div>
               </div>
              <div class="col-md-3 text-center">
                  <div class="form-group ">
                    <label class="control-label" for="trainer">Trainer</label>
                      <input type="checkbox" name="trainer" id="trainer" value="1">
                     </div>
               </div>
              <div class="col-md-3 text-center">
                <div class="form-group ">
                      <label class="control-label" for="trainer">Writer</label>
                      <input type="checkbox" name="writer" id="writer" value="1">
                      </div>
                     </div>
                     </div>
                <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="" class="mt-2">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Father/ Husband Name </label>
                    <input type="date" name="Father_name" id="name" placeholder="Father/ Husband Name" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Mobile No</label>
                    <input type="text" name="mobile-no" id="name" placeholder="Mobile No" value="" class="form-control">
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
                    <label for="">Date of Birth </label>
                    <input type="date" name="Date_Birth" id="name" placeholder="Date of Birth" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" name="profession" value="">
                      <option value="">Select Gender</option>
                      <option value="Private Service">Male</option>
                      <option value="Govt. Service">Female</option>
                     
                   </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Nationality </label>
                    <select class="form-control" name="profession" value="">
                      <option value="">Select Country</option>
                      <option value="Private Service">Bangladesh</option>
                      <option value="Govt. Service">Other</option>
                     
                   </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">NID/Passport Number </label>
                    <input type="text" name="NID_Passport" id="name" placeholder="NID/Passport Number" value="" class="form-control">
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label for="">NID/ Passport Document</label>
                    <input type="file" class="form-control" name="Passport_Document" id="nid">                 
                   </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Division </label>
                    <select class="form-control" name="Division" value="">
                      <option value="">Select Division</option>
                      <option value="Private Service">Rangpur</option>
                      <option value="Govt. Service">Dhaka</option>
                      <option value="Private Service">Khulna</option>
                      <option value="Govt. Service">Sylhet</option>
                      <option value="Private Service">Rajshahi</option>
                      <option value="Govt. Service">Barisal</option>
                      <option value="Govt. Service">Chattagram</option>
                      <option value="Govt. Service">Mymensingh</option>
                   </select>
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="">District </label>
                    <select class="form-control" name="District" value="">
                      <option value="">Select Division</option>
                      <option value="Private Service">Rangpur</option>
                    </select>
                  </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <label for="">Profile Photo</label>
                    <input type="file" class="form-control" name="Profile_Photo" id="photo">                 
                   </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Address </label>
                    <textarea name="address" rows="3" id="address" placeholder="Address" class="form-control"></textarea>                  </div>
                </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Key Profile</label>
                    <textarea name="Key_Profile" rows="3" id="address" placeholder="" class="form-control"></textarea>                  </div>
                </div>
                </div>
            </div>
         </form>
      </div>
    </div>
    
<!-- Education Qualification Details -->

<div class="article-details bg-white mt-5 container">
    <div class="panel-heading text-center bg-light padding mb-4"><i class="fa fa-user-circle"></i> Education Qualification Details</div>
        <form action="" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="" class="mt-2">Latest Education </label>
                    <input type="text" name="Latest_Education " id="name" placeholder="Latest Education " value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">College/ Institution </label>
                    <input type="text" name="College_Institution" id="name" placeholder="College/ Institution" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">University</label>
                    <input type="text" name="University" id="name" placeholder="University" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Subject/Course Name</label>
                    <input type="text" name="Subject_Name" id="name" placeholder="Subject/Course Name" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Passing Year </label>
                    <input type="text" name="Passing_Year" id="name" placeholder="Passing Year" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Other Degree</label>
                    <textarea name="Education" rows="3" id="address" placeholder="" class="form-control"></textarea>                  </div>
                </div>
               </div>

               <div class="col-md-12">
                                     <p><strong>Field of Specialization: </strong></p>
                                     <div class="row">
                                         <div class="col-md-3">
                                            <label class="control-label" for="speciality0">
                                                <input type="checkbox" name="speciality[]" value="Civil Litigation" id="speciality0">
                                                 Civil Litigation </label>
                                         </div>

                                        <div class="col-md-3">
                                            <label class="control-label" for="speciality1">
                                                <input type="checkbox" name="speciality[]" value="Criminal Litigation" id="speciality1">
                                                Criminal Litigation </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality2">
                                                <input type="checkbox" name="speciality[]" value="Banking &amp; Financial" id="speciality2">
                                                 Banking &amp; Financial </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality3">
                                                <input type="checkbox" name="speciality[]" value="Corporate &amp; Commercial" id="speciality3">
                                                 Corporate &amp; Commercial </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality4">
                                                <input type="checkbox" name="speciality[]" value="Tax &amp; VAT" id="speciality4">
                                                Tax &amp; VAT </label>
                                         </div>

                                     <div class="col-md-3">
                                             <label class="control-label" for="speciality5">
                                                <input type="checkbox" name="speciality[]" value="Land Law" id="speciality5">
                                                Land Law </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality6">
                                                <input type="checkbox" name="speciality[]" value="ADR Consultant" id="speciality6">
                                                ADR Consultant </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality7">
                                                <input type="checkbox" name="speciality[]" value="Family Law" id="speciality7">
                                                 Family Law </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality8">
                                                <input type="checkbox" name="speciality[]" value="Labour &amp; Employment Law" id="speciality8">
                                                 Labour &amp; Employment Law </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality9">
                                                <input type="checkbox" name="speciality[]" value="HR Policy Consultant" id="speciality9">
                                                 HR Policy Consultant </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality10">
                                                <input type="checkbox" name="speciality[]" value="Regulatory Compliance Expert" id="speciality10">
                                                 Regulatory Compliance Expert </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality11">
                                                <input type="checkbox" name="speciality[]" value="Income Tax Practitioner" id="speciality11">
                                                 Income Tax Practitioner </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality12">
                                                <input type="checkbox" name="speciality[]" value="Intellectual Property Lawyer" id="speciality12">
                                                 Intellectual Property Lawyer </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality13">
                                                <input type="checkbox" name="speciality[]" value="Real Estate" id="speciality13">
                                                 Real Estate </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality14">
                                                <input type="checkbox" name="speciality[]" value="Compliance Auditor" id="speciality14">
                                                 Compliance Auditor </label>
                                         </div>

                                        <div class="col-md-3">
                                             <label class="control-label" for="speciality15">
                                                <input type="checkbox" name="speciality[]" value="Construction Lawyer" id="speciality15">
                                                 Construction Lawyer </label>
                                        </div>

                                      
                                     </div>
                                 </div>
            </div>

        </form>
    </div>

<!-- Leaner Registration -->

    
<div class="article-details bg-white mt-5 container mb-4">
    <div class="panel-heading text-center bg-light padding"><i class="fa fa-user-circle"></i> Leaner Registration</div>
        <form action="" enctype="multipart/form-data">
          @csrf
            <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="" class="mt-2">Profession </label>
                    <input type="text" name="Profession " id="name" placeholder="Profession " value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Designation  </label>
                    <input type="text" name="Designation " id="name" placeholder="Designation " value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Company/Organization Name</label>
                    <input type="text" name="Company_Name" id="name" placeholder="Company Or Organization Name" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Job From</label>
                    <input type="date" name="Job_From" id="name" placeholder="Job From" value="" class="form-control">
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Profession Document</label>
                    <input type="file" class="form-control display-inline" name="photo" id="photo">                 
                   </div>
                </div>
                <div class="col-6"></div>
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

             