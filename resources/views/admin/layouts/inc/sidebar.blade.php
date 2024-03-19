@php
    $route = Route::currentRouteName();
@endphp

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a href="{{ route('user.dashboard') }}">
                    <img style="margin-top: 5px" src="{{ asset('admin/new/logo.png') }}" alt="img" width="70">
                </a>
            </li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="@if ($route == 'admin.dashboard') active @endif nav-item"><a class="d-flex align-items-center"
                    href="{{ route('user.dashboard') }}"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
            </li>

            @if (Auth::user()->user_type == App\Models\User::ADMIN)
                {{-- users --}}
                <li class="nav-item @if ($route == 'profession.index' || $route == 'profession.edit' || $route == 'profession.create') open @endif"><a class="d-flex align-items-center"
                        href="#"><i class="fas fa-users"></i>
                        <span class="menu-title text-truncate" data-i18n="Roles &amp; Permission">System
                            Users</span></a>
                    <ul class="menu-content">
                        <li class=" @if ($route == 'profession.index' || $route == 'profession.edit' || $route == 'profession.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('profession.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Profession</span></a>
                        </li>
                        <li class=" @if ($route == 'users.index' || $route == 'users.edit' || $route == 'users.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('users.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Users</span></a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Legal Insights
            ------------------------------ --}}
                <li class="nav-item @if (
                    $route == 'associated.service.index' ||
                        $route == 'associated.service.edit' ||
                        $route == 'keywordss.index' ||
                        $route == 'keywordss.edit') open @endif"><a class="d-flex align-items-center"
                        href="#"><i class="far fa-eye"></i><span class="menu-title text-truncate"
                            data-i18n="Roles &amp; Permission">Legal Insights</span></a>
                    <ul class="menu-content">
                        <li class=" @if ($route == 'associated.service.index' || $route == 'associated.service.edit') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('associated.service.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Associated Service</span></a>
                        </li>
                        <li class=" @if ($route == 'keywordss.index' || $route == 'keywordss.edit') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('keywordss.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Permission">Keywords</span></a>
                        </li>
                    </ul>
                </li>
                {{-- -----------------------------
                Service & Pro-Bono
            ------------------------------ --}}
                <li class="nav-item @if (
                    $route == 'service.category.index' ||
                        $route == 'service.category.edit' ||
                        $route == 'service.index' ||
                        $route == 'service.edit' ||
                        $route == 'service.consultation.request') open @endif"><a class="d-flex align-items-center"
                        href="#"><i class="fas fa-wrench"></i><span class="menu-title text-truncate"
                            data-i18n="Roles &amp; Permission">Service &
                            Pro-Bono</span></a>
                    <ul class="menu-content">
                        <li class="@if ($route == 'service.category.index' || $route == 'service.category.edit') active @endif"><a class="d-flex align-items-center"
                                href="{{ route('service.category.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Category</span></a>
                        </li>
                        <li class=" @if ($route == 'service.index' || $route == 'service.edit') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('service.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Permission">Service & Pro-Bono</span></a>
                        </li>
                        <li class=" @if ($route == 'service.consultation.request') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('service.consultation.request') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Permission">Consultation Request</span></a>
                        </li>
                    </ul>
                </li>
                {{-- -----------------------------
                Course Management
            ------------------------------ --}}
                <li class="nav-item @if (
                    $route == 'course.suitables.index' ||
                        $route == 'course.suitables.edit' ||
                        $route == 'course.suitables.create' ||
                        $route == 'courses.index' ||
                        // $route == 'courses.edit' ||
                        $route == 'courses.create') open @endif"><a
                        class="d-flex align-items-center" href="#"><i class="fas fa-signature"></i>
                        <span class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Course
                            Management</span></a>
                    <ul class="menu-content">
                        <li class=" @if ($route == 'course.suitables.index' || $route == 'course.suitables.edit' || $route == 'course.suitables.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('course.suitables.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Suitables For Course</span></a>
                        </li>
                        <li class=" @if (
                            $route == 'courses.index' ||
                                // $route == 'courses.edit' ||
                                $route == 'courses.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('courses.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Course</span></a>
                        </li>
                        <li class=" @if ($route == 'enrolled.courses.index') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('enrolled.courses.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Enrolled Course</span></a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Articles
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-gavel"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Articles</span></a>
                    <ul class="menu-content">
                        <li class=""><a class="d-flex align-items-center"
                                href="{{ route('articles.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Articles</span></a>
                        </li>
                        <li class=""><a class="d-flex align-items-center"
                                href="{{ route('article.categories.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Blogs
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-gavel"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Blogs</span></a>
                    <ul class="menu-content">
                        <li class=""><a class="d-flex align-items-center" href="{{ route('blogs.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Blogs</span></a>
                        </li>
                        <li class=""><a class="d-flex align-items-center"
                                href="{{ route('blog.categories.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>
                {{-- -----------------------------
                Write Ups
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-gavel"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Write
                            Ups</span></a>
                    <ul class="menu-content">
                        <li class=""><a class="d-flex align-items-center"
                                href="{{ route('write_ups.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Write Ups</span></a>
                        </li>
                        <li class=""><a class="d-flex align-items-center"
                                href="{{ route('write_up.categories.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>
                {{-- -----------------------------
                News
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-gavel"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">News</span></a>
                    <ul class="menu-content">
                        <li class=""><a class="d-flex align-items-center" href="{{ route('news.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">News</span></a>
                        </li>
                        <li class=""><a class="d-flex align-items-center"
                                href="{{ route('news.categories.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Reviews
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-gavel"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Reviews</span></a>
                    <ul class="menu-content">
                        <li class=""><a class="d-flex align-items-center"
                                href="{{ route('reviews.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Reviews</span></a>
                        </li>
                        <li class=""><a class="d-flex align-items-center"
                                href="{{ route('review.categories.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Laws & Rules
            ------------------------------ --}}
                <li class="nav-item @if (
                    $route == 'law.category.index' ||
                        $route == 'law.category.edit' ||
                        $route == 'law.index' ||
                        $route == 'law.edit' ||
                        $route == 'law.show' ||
                        $route == 'law.create') open @endif"><a
                        class="d-flex align-items-center" href="#"><i class="fa fa-gavel"></i><span
                            class="menu-title text-truncate" data-i18n="Laws & Rules">Laws & Rules</span></a>
                    <ul class="menu-content">
                        <li class=" @if ($route == 'law.category.index' || $route == 'law.category.edit') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('law.category.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Category</span></a>
                        </li>
                        <li class=" @if ($route == 'law.index' || $route == 'law.edit' || $route == 'law.show' || $route == 'law.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('law.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Permission">Laws & Rules</span></a>
                        </li>
                    </ul>
                </li>



                {{-- -----------------------------
                Office & Function
            ------------------------------ --}}
                <li class="nav-item @if (
                    $route == 'of.sector.index' ||
                        $route == 'of.sector.edit' ||
                        $route == 'of.sector.create' ||
                        $route == 'office.function.index' ||
                        $route == 'office.function.create' ||
                        $route == 'office.function.edit' ||
                        $route == 'of.category.index' ||
                        $route == 'of.category.edit' ||
                        $route == 'of.category.create') open @endif"><a
                        class="d-flex align-items-center" href="#"><i class="fa fa-gavel"></i><span
                            class="menu-title text-truncate" data-i18n="Laws & Rules">Office & Function</span></a>
                    <ul class="menu-content">
                        <li class=" @if ($route == 'of.sector.index' || $route == 'of.sector.edit') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('of.sector.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Sector</span></a>
                        </li>
                        <li class=" @if ($route == 'of.category.index' || $route == 'of.category.edit') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('of.category.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Category</span></a>
                        </li>
                        <li class=" @if (
                            $route == 'office.function.index' ||
                                $route == 'office.function.edit' ||
                                $route == 'office.function.show' ||
                                $route == 'office.function.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('office.function.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Permission">Office & Function</span></a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Service & Facilitics
            ------------------------------ --}}
                <li class="nav-item @if (
                    $route == 'sf.sector.index' ||
                        $route == 'sf.sector.edit' ||
                        $route == 'sf.sector.create' ||
                        $route == 'sf.category.index' ||
                        $route == 'sf.category.edit' ||
                        $route == 'sf.category.create' ||
                        $route == 'service.facility.index' ||
                        $route == 'service.facility.edit' ||
                        $route == 'service.facility.create') open @endif"><a
                        class="d-flex align-items-center" href="#"><i class="fas fa-signature"></i>
                        <span class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Service &
                            Facilitics</span></a>
                    <ul class="menu-content">
                        <li class=" @if ($route == 'sf.sector.index' || $route == 'sf.sector.edit' || $route == 'sf.sector.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('sf.sector.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Sector</span></a>
                        </li>
                        <li class=" @if ($route == 'sf.category.index' || $route == 'sf.category.edit' || $route == 'sf.category.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('sf.category.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Categpry</span></a>
                        </li>
                        <li class=" @if ($route == 'service.facility.index' || $route == 'service.facility.edit' || $route == 'service.facility.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('service.facility.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Service & Facility</span></a>
                        </li>
                    </ul>
                </li>


                <!-- settings -->


                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-cog"></i><span class="menu-title text-truncate"
                            data-i18n="Roles &amp; Permission">Website
                            Settings</span></a>
                    <ul class="menu-content">
                        <li class=" "><a class="d-flex align-items-center"
                                href="{{ route('terms.condition.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Terms & Conditions</span></a>
                        </li>
                        <li class=""><a class="d-flex align-items-center"
                                href="{{ route('privacy.policy.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Permission">Privacy Policy</span></a>
                        </li>
                    </ul>
                </li>


                <!-- contact message -->

                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-envelope"></i><span class="menu-title text-truncate"
                            data-i18n="Roles &amp; Permission">Contact Message</span></a>
                    <ul class="menu-content">
                        <li class=" "><a class="d-flex align-items-center"
                                href="{{ route('contact.message') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">
                                    Show Contact Message</span></a>
                        </li>

                    </ul>
                </li>
            @endif


            @if (Auth::user()->user_type == App\Models\User::NORMAL_USER || Auth::user()->user_type == App\Models\User::EXPERT)
                <li class="@if ($route == 'user.profile') active @endif nav-item"><a
                        class="d-flex align-items-center" href="{{ route('user.profile') }}"><i
                            data-feather="user"></i><span class="menu-title text-truncate"
                            data-i18n="Email">Profile</span></a>
                </li>
                <li class="@if ($route == 'user.security') active @endif nav-item"><a
                        class="d-flex align-items-center" href="{{ route('user.security') }}"><i
                            data-feather="lock"></i><span class="menu-title text-truncate" data-i18n="Email">
                            Security</span></a>
                </li>
            @endif
            @if (Auth::user()->user_type == App\Models\User::NORMAL_USER)
                <li class="@if ($route == 'user.course.index') active @endif nav-item"><a
                        class="d-flex align-items-center" href="{{ route('user.course.index') }}"><i
                            class="fa fa-graduation-cap"></i> Your Courses</span></a>
                </li>
            @endif

        </ul>
    </div>
</div>
