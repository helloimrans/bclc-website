  <!-- start footer section -->
  <footer class="footer-section wow fadeInDown" data-wow-duration="1s">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="footer-title">
            <h5>Contact Us</h5>
          </div>
          <div class="footer-contact">
            <div class="media">
              <img src="{{asset('frontend')}}/images/phone-fot.png" alt="img">
              <div class="media-body">
                <a href="#"> +880 1886 456688</a>
              </div>
            </div>
            <div class="media">
              <img src="{{asset('frontend')}}/images/email-fot.png" alt="img">
              <div class="media-body">
                <a href="#"> bclcbd@gmail.com</a>
              </div>
            </div>
            <div class="media">
              <img src="{{asset('frontend')}}/images/location-fot.png" alt="img">
              <div class="media-body">
                <a href="#"> 357/C-13, Modhubag, Mogbazar, Dhaka-1217, Bangladesh</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="footer-title">
            <h5>Useful Links</h5>
          </div>
          <div class="footer-links">
            <!-- footer link -->
            <div class="media">
              <img src="{{asset('frontend')}}/images/footer-linik.png" alt="img">
              <div class="media-body">
                <a href="{{ route('blog') }}"> Legal Blog</a>
              </div>
            </div>
            <!-- footer link -->
            <div class="media">
              <img src="{{asset('frontend')}}/images/footer-linik.png" alt="img">
              <div class="media-body">
                <a href="{{ route('news') }}">Legal News</a>
              </div>
            </div>
            <!-- footer link -->
            <div class="media">
              <img src="{{asset('frontend')}}/images/footer-linik.png" alt="img">
              <div class="media-body">
                <a href="{{ route('laws.rules') }}">Laws & Rules</a>
              </div>
            </div>
            <!-- footer link -->
            <div class="media">
              <img src="{{asset('frontend')}}/images/footer-linik.png" alt="img">
              <div class="media-body">
                <a href="#">Legal Updates</a>
              </div>
            </div>
            <!-- footer link -->
            <div class="media">
              <img src="{{asset('frontend')}}/images/footer-linik.png" alt="img">
              <div class="media-body">
                <a href="#">Convention & Treaty</a>
              </div>
            </div>
            <!-- footer link -->
            <div class="media">
              <img src="{{asset('frontend')}}/images/footer-linik.png" alt="img">
              <div class="media-body">
                <a href="#">Office and Functions</a>
              </div>
            </div>
            <!-- footer link -->
            <div class="media">
              <img src="{{asset('frontend')}}/images/footer-linik.png" alt="img">
              <div class="media-body">
                <a href="#">Services and Facilities</a>
              </div>
            </div>
            <!-- footer link -->
            <div class="media">
              <img src="{{asset('frontend')}}/images/footer-linik.png" alt="img">
              <div class="media-body">
                <a href="#">Career in Legal Sector</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="footer-title">
            <h5>Newsletter</h5>
          </div>
          <div class="footer-newsletter">
            <p>Signup for our newsletter to get the latest news, updates and special offers in your inbox.</p>
            <form action="">
              <div class="input-group">
                <input class="form-control" type="text" name="keyword" placeholder="Enter your email">
                <div class="input-group-prepend">
                  <button type="submit" class="btn ftr-nsbtn">Send</button>
                </div>
              </div>
            </form>
            <span class="d-block">Your email is safe with us. We don't spam.</span>
          </div>
        </div>
      </div>
  </footer>
  <!-- end footer section -->

  <!-- start copyright section -->
  <section class="copyright-section wow fadeInDown" data-wow-duration="1s">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="copyright-txt text-center text-md-left mb-3 mb-md-0">
            <span>© 2021 Copyright Bangladesh Centre for Legal Compliance. All Rights Reserved</span>
          </div>
        </div>
        <div class="col-md-6 align-self-center">
          <div class="copyright-developed text-center text-md-right">
            <span>Design and Develop by <a href="#!">Zaimah Technologies Ltd.</a></span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end copyright section -->

  <div class="fix-form">
    <div class="media">
      <div class="fix-form-img">
        <img src="{{asset('frontend')}}/images/fix-img.png" alt="img">
      </div>
      <div class="media-body" style="background: #fff; padding: 0;">
        <div class="useful-links">
          <ul>
            <li>
              <h5>Useful Links</h5>
            </li>
            <li><a href="{{ route('blog') }}"><img src="{{asset('frontend')}}/images/footer-linik.png" alt="img"> Legal Blog</a></li>
            <li><a href="{{ route('news') }}"><img src="{{asset('frontend')}}/images/footer-linik.png" alt="img"> Legal News</a></li>
            <li><a href="{{ route('laws.rules') }}"><img src="{{asset('frontend')}}/images/footer-linik.png" alt="img"> Laws & Rules</a></li>
            <li><a href="#"><img src="{{asset('frontend')}}/images/footer-linik.png" alt="img"> Legal Updates</a></li>
            <li><a href="#"><img src="{{asset('frontend')}}/images/footer-linik.png" alt="img"> Convention & Treaty</a></li>
            <li><a href="{{ route('office.function') }}"><img src="{{asset('frontend')}}/images/footer-linik.png" alt="img"> Office and Functions</a></li>
            <li><a href="#"><img src="{{asset('frontend')}}/images/footer-linik.png" alt="img"> Services and Facilities</a></li>
            <li><a href="#"><img src="{{asset('frontend')}}/images/footer-linik.png" alt="img"> Career in Legal Sector</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
