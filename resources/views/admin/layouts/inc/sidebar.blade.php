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
            <li class="@if ($route == 'user.dashboard') active @endif nav-item"><a class="d-flex align-items-center"
                    href="{{ route('user.dashboard') }}"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
            </li>

            @if (Auth::user()->user_type == App\Models\User::ADMIN)
                {{-- users --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-users"></i>
                        <span class="menu-title text-truncate" data-i18n="Roles &amp; Permission">System
                            Users</span></a>
                    <ul class="menu-content">
                        {{-- <li class=" @if ($route == 'profession.index' || $route == 'profession.edit' || $route == 'profession.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('profession.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Profession</span></a>
                        </li> --}}
                        <li class="@if (request()->query('user_type') == App\Models\User::NORMAL_USER &&
                                in_array($route, ['users.index', 'users.edit', 'users.create'])) active @endif">
                            <a class="d-flex align-items-center"
                                href="{{ route('users.index', ['user_type' => App\Models\User::NORMAL_USER]) }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Roles">Normal User</span>
                            </a>
                        </li>

                        <li class="@if (request()->query('user_type') == App\Models\User::EXPERT &&
                                in_array($route, ['users.index', 'users.edit', 'users.create'])) active @endif">
                            <a class="d-flex align-items-center"
                                href="{{ route('users.index', ['user_type' => App\Models\User::EXPERT]) }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Roles">Expert</span>
                            </a>
                        </li>

                        <li class="@if (request()->query('user_type') == App\Models\User::ADMIN &&
                                in_array($route, ['users.index', 'users.edit', 'users.create'])) active @endif">
                            <a class="d-flex align-items-center"
                                href="{{ route('users.index', ['user_type' => App\Models\User::ADMIN]) }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate" data-i18n="Roles">Admin</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Legal Insights
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i class="far fa-eye"></i><span
                            class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Legal
                            Insights</span></a>
                    <ul class="menu-content">
                        <li class="@if (in_array($route, ['associated.service.index', 'associated.service.edit', 'associated.service.create'])) active @endif"><a class="d-flex align-items-center"
                                href="{{ route('associated.service.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Associated Service</span></a>
                        </li>
                        <li class="@if (in_array($route, ['keywordss.index', 'keywordss.edit', 'keywordss.create'])) active @endif"><a class="d-flex align-items-center"
                                href="{{ route('keywordss.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Permission">Keywords</span></a>
                        </li>
                    </ul>
                </li>
                {{-- -----------------------------
                Service & Pro-Bono
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fas fa-wrench"></i><span class="menu-title text-truncate"
                            data-i18n="Roles &amp; Permission">Service &
                            Pro-Bono</span></a>
                    <ul class="menu-content">
                        <li class="@if (in_array($route, ['service.category.index', 'service.category.edit', 'service.category.create'])) active @endif"><a class="d-flex align-items-center"
                                href="{{ route('service.category.index') }}"><i data-feather="circle"></i><span
                                    class="menu-item text-truncate" data-i18n="Roles">Category</span></a>
                        </li>
                        <li class=" @if ($route == 'service.index' || $route == 'service.edit' || $route == 'service.create') active @endif"><a
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
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fas fa-graduation-cap"></i>
                        <span class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Manage
                            Courses</span></a>
                    <ul class="menu-content">
                        <li class=" @if ($route == 'course.suitables.index' || $route == 'course.suitables.edit' || $route == 'course.suitables.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('course.suitables.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Suitables For Course</span></a>
                        </li>
                        <li class=" @if ($route == 'courses.index' || $route == 'courses.edit' || $route == 'courses.show' || $route == 'courses.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('courses.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Course</span></a>
                        </li>
                        <li class=" @if ($route == 'enrolled.courses.index' || $route == 'enrolled.courses.details') active @endif"><a
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
                            class="fa fa-file-alt"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Articles</span></a>
                    <ul class="menu-content">
                        <li class="@if (in_array($route, ['articles.index', 'articles.edit', 'articles.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('articles.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Articles</span></a>
                        </li>
                        <li class="@if (in_array($route, ['article.categories.index', 'article.categories.edit', 'article.categories.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('article.categories.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Blogs
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-blog"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Legal Blogs</span></a>
                    <ul class="menu-content">
                        <li class="@if (in_array($route, ['blogs.index', 'blogs.edit', 'blogs.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('blogs.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Blogs</span></a>
                        </li>
                        <li class="@if (in_array($route, ['blog.categories.index', 'blog.categories.edit', 'blog.categories.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('blog.categories.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>
                {{-- -----------------------------
                Write Ups
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-pen-nib"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Legal Write
                            Ups</span></a>
                    <ul class="menu-content">
                        <li class="@if (in_array($route, ['write_ups.index', 'write_ups.edit', 'write_ups.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('write_ups.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Write Ups</span></a>
                        </li>
                        <li class="@if (in_array($route, ['write_up.categories.index', 'write_up.categories.edit', 'write_up.categories.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('write_up.categories.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>
                {{-- -----------------------------
                News
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-newspaper"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Legal News</span></a>
                    <ul class="menu-content">
                        <li class="@if (in_array($route, ['news.index', 'news.edit', 'news.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('news.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">News</span></a>
                        </li>
                        <li class="@if (in_array($route, ['news.categories.index', 'news.categories.edit', 'news.categories.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('news.categories.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Reviews
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-comments"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Legal Reviews</span></a>
                    <ul class="menu-content">
                        <li class="@if (in_array($route, ['reviews.index', 'reviews.edit', 'reviews.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('reviews.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Reviews</span></a>
                        </li>
                        <li class="@if (in_array($route, ['review.categories.index', 'review.categories.edit', 'review.categories.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('review.categories.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Category</span></a>
                        </li>
                    </ul>
                </li>

                {{-- -----------------------------
                Laws & Rules
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-gavel"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Laws & Rules</span></a>
                    <ul class="menu-content">
                        <li class=" @if ($route == 'law.category.index' || $route == 'law.category.edit' || $route == 'law.category.create') active @endif"><a
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
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-building"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Office & Function</span></a>
                    <ul class="menu-content">
                        <li class=" @if ($route == 'of.sector.index' || $route == 'of.sector.edit' || $route == 'of.sector.create') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('of.sector.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Sector</span></a>
                        </li>
                        <li class=" @if ($route == 'of.category.index' || $route == 'of.category.edit' || $route == 'of.category.create') active @endif"><a
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
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fas fa-industry"></i>
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

                {{-- -----------------------------
                Documents
            ------------------------------ --}}
                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-blog"></i><span class="menu-title text-truncate"
                            data-i18n="Laws & Rules">Documents Hub</span></a>
                    <ul class="menu-content">
                        <li class="@if (in_array($route, ['document.index', 'document.edit', 'document.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('document.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Documents</span></a>
                        </li>
                        <li class="@if (in_array($route, ['document.categories.index', 'document.categories.edit', 'document.categories.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('document.categories.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Category</span></a>
                        </li>
                        <li class="@if (in_array($route, ['document.subcategories.index', 'document.subcategories.edit', 'document.subcategories.create'])) active @endif"><a
                                class="d-flex align-items-center" href="{{ route('document.subcategories.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Sub Category</span></a>
                        </li>
                    </ul>
                </li>


                <!-- settings -->


                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-cog"></i><span class="menu-title text-truncate"
                            data-i18n="Roles &amp; Permission">Website
                            Settings</span></a>
                    <ul class="menu-content">
                        <li class="@if ($route == 'terms.condition.index') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('terms.condition.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">Terms & Conditions</span></a>
                        </li>
                        <li class="@if ($route == 'privacy.policy.index') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('privacy.policy.index') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Permission">Privacy Policy</span></a>
                        </li>
                    </ul>
                </li>


                <!-- contact message -->

                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i
                            class="fa fa-envelope"></i><span class="menu-title text-truncate"
                            data-i18n="Roles &amp; Permission">Contact Message</span></a>
                    <ul class="menu-content">
                        <li class="@if ($route == 'contact.message') active @endif"><a
                                class="d-flex align-items-center" href="{{ route('contact.message') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Roles">
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
