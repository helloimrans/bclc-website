@php
$route = Route::currentRouteName();
@endphp

  <!--start header top-->
  <section class="header-top wow fadeInDown" data-wow-duration="1s">
    <div class="container">
      <div class="row">
        <div class="col-md-6 align-self-center">
          <div class="ht-email">
            <span class="mr-3">
              <i class="fa fa-clock-o mr-1"></i>
              {{date('d M Y')}}  <span class="ml-1" id="time"></span>
            </span>
            <span>
              <i class="fa fa-phone mr-1"></i>
              +880 1886 456688
            </span>
          </div>
        </div>
        <div class="col-md-6">
          <div class="ht-social">
            <select name="language" id="language">
              <option value="">Select Language</option>
              <option value="Bangla">Bangla</option>
              <option value="English">English</option>
            </select>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-whatsapp"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end header top-->

  <!--start header-->
  <header class=" wow fadeInDown" data-wow-duration="1s" @if ($route == 'laws.rules')
  style="position:inherit;"
  @endif>
    <nav class="navbar">
      <div class="container">
        <a class="navbar-brand align-self-center" href="{{url('/')}}">
          <img src="{{asset('frontend')}}/logo/logo.png" class="logo" alt="Logo" />
        </a>

        <div class="menu-area mx-auto">
          <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{route('service')}}">Service</a></li>
            <li><a href="{{ route('training.courses') }}">Training</a></li>
            <li class="dd-btn1">
              <a href="#!">
                Legal Knowledge
                <i class="fa fa-angle-down"></i>
              </a>

              <div class="dropdown-menu1">
                <ul>
                  <li><a href="{{route('articles')}}">Articles</a></li>
                  <li><a href="{{route('blog')}}">Legal Blog</a></li>
                  <li><a href="{{route('review')}}">Legal Review</a></li>
                  <li><a href="{{route('insights')}}">Legal Insights</a></li>
                  <li><a href="{{route('writeup')}}">Legal Write Up</a></li>
                  <li><a href="legal-sector.html">Career In Legal Sector</a></li>
                </ul>
              </div>
            </li>
            <li><a href="#!">Find an Experts</a></li>
            <li class="dd-btn1 dd-btn1-left">
              <a href="#!"><i class="fa fa-bars"></i></a>

              <div class="dropdown-menu1 dropdown-menu1-left">
                <ul>
                  <li><a href="document-hub.html">Document Hub</a></li>
                  <li><a href="publcation.html">Publication</a></li>
                  <li><a href="adr.html">ADR Ways</a></li>
                  <li><a href="{{route('probono')}}">Pro-Bono</a></li>
                  <li><a href="gallery.html">Gallery</a></li>
                  <li><a href="video.html">Video</a></li>
                  <li><a href="career.html">Career</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                </ul>
              </div>
            </li>
            <li><a href="#!">|</a></li>
            <li><i class="fa fa-search web-search"></i>
              <div class="search-mega-content search-item">
                <div style="margin-right:0px;margin-left:0px;" class="row">
                  <div class="col">
                    <form action="#" method="Post">
                      <div class="input-group">
                        <input class="form-control" type="text" name="keyword" placeholder="What are you looking for?">
                        <div class="input-group-prepend">
                          <button type="submit" class="btn bd text-light">Search</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </li>
            <li>
              <a href="#!" class="pr-1" data-toggle="modal" data-target="#exampleModalLogin"><span class="nav-login-btn">Login</span></a>
            </li>
            <li>
              <a href="#" class="pl-0"><span class="nav-login-btn">Register</span></a>
            </li>
          </ul>
        </div>
        <div class="icon-div">
          <ul>
            <li>
              <i class="fa fa-search web-search"></i>
              <div class="search-mega-content search-item">
                <div style="margin-right:0px;margin-left:0px;" class="row">
                  <div class="col">
                    <form action="">
                      <div class="input-group">
                        <input class="form-control" type="text" placeholder="What are you looking for?">
                        <div class="input-group-prepend">
                          <button type="submit" class="btn bd text-light">Search</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <div class="menu-icon">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!--end header-->

   <!--Login Modal -->
   <div class="service-cunsult-modal">
    <div class="modal fade" id="exampleModalLogin" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pt-0">
            <div class="sm-body">
              <h5>Login Options</h5>
              <div class="nav-login-options">
                <a href="#"><i class="fa fa-sign-in mr-2"></i> Login as a General User</a><a href="#"><i class="fa fa-sign-in mr-2"></i> Login as a Subscriber</a>
                <a href="#"><i class="fa fa-sign-in mr-2"></i> Login as a Lerner</a>
                <a href="#"><i class="fa fa-sign-in mr-2"></i> Login as a Expert</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--start mobile menu-->
  <div class="mobile-menu">
    <div class="mm-logo" style="background: #fff; padding: 11px 18px;">
      <a href="#">
        <img style="width: 55px;" src="{{asset('frontend')}}/logo/logo.png" alt="logo" />
      </a>
    </div>
    <div class="mm-menu">
      <div class="accordion" id="accordionExample">
        <div class="menu-box">
          <div class="menu-link">
            <a href="{{url('/')}}">
              Home
            </a>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="{{route('service')}}">
              Service
            </a>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="{{ route('training.courses') }}">
              Training
            </a>
          </div>
        </div>

        <style>
          .scroll-div-dist {
            background: #ececec !important;
          }
        </style>

        <div class="menu-box">
          <div class="menu-link" id="headingFour">
            <a class="mmenu-btn" type="button" data-toggle="collapse" data-target="#collapseFour">
              Legal Knowledge
              <i class="fa fa-angle-down float-right mt-1"></i>
            </a>
          </div>
          <div id="collapseFour" class="collapse menu-body" aria-labelledby="headingFour"
            data-parent="#accordionExample">
            <div class="card-body">
              <ul>
                <li><a href="{{route('articles')}}">Articles</a></li>
                <li><a href="{{route('blog')}}">Legal Blog</a></li>
                <li><a href="{{route('review')}}">Legal Review</a></li>
                <li><a href="{{route('insights')}}">Legal Insights</a></li>
                <li><a href="{{route('writeup')}}">Legal Write Up</a></li>
                <li><a href="legal-sector.html">Career In Legal Sector</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="#!">Find an Experts</a>
          </div>
        </div>

        <div class="menu-box">
          <div class="menu-link">
            <a href="document-hub.html">Document Hub</a>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="publication.html">Publication</a>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="adr.html">ADR Ways</a>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="{{route('probono')}}">Pro-Bono</a>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="gallery.html">Gallery</a>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="video.html">Video</a>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="career.html">Career</a>
          </div>
        </div>
        <div class="menu-box">
          <div class="menu-link">
            <a href="contact.html">Contact Us</a>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!--end mobile menu-->
