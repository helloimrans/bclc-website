@php
    $route = Route::currentRouteName();
@endphp

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a href="{{ route('admin.dashboard') }}">
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
                    href="{{ route('admin.dashboard') }}"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
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
                    <li class=" @if ($route == 'associated.service.index' || $route == 'associated.service.edit') active @endif"><a class="d-flex align-items-center"
                            href="{{ route('associated.service.index') }}"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Roles">Associated Service</span></a>
                    </li>
                    <li class=" @if ($route == 'keywordss.index' || $route == 'keywordss.edit') active @endif"><a class="d-flex align-items-center"
                            href="{{ route('keywordss.index') }}"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Permission">Keywords</span></a>
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
                    <li class=" @if ($route == 'service.index' || $route == 'service.edit') active @endif"><a class="d-flex align-items-center"
                            href="{{ route('service.index') }}"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Permission">Service & Pro-Bono</span></a>
                    </li>
                    <li class=" @if ($route == 'service.consultation.request') active @endif"><a class="d-flex align-items-center"
                            href="{{ route('service.consultation.request') }}"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Permission">Consultation Request</span></a>
                    </li>
                </ul>
            </li>
            {{-- -----------------------------
                Course Management
            ------------------------------ --}}
            <li class="nav-item @if ($route == 'course.suitables.index' || $route == 'course.suitables.edit' || $route == 'course.suitables.create') open @endif"><a class="d-flex align-items-center"
                    href="#"><i class="fas fa-signature"></i>
                    <span class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Course
                        Management</span></a>
                <ul class="menu-content">
                    <li class=" @if ($route == 'course.suitables.index' || $route == 'course.suitables.edit' || $route == 'course.suitables.create') active @endif"><a
                            class="d-flex align-items-center" href="{{ route('course.suitables.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Roles">Suitables For Course</span></a>
                    </li>
                </ul>
            </li>
            {{-- -----------------------------
                Article,Blog,Others
            ------------------------------ --}}
            <li class="nav-item @if (
                $route == 'abrwn.category.index' ||
                    $route == 'abrwn.category.edit' ||
                    $route == 'abrwn.index' ||
                    $route == 'abrwn.edit') open @endif"><a class="d-flex align-items-center"
                    href="#"><i data-feather='check-square'></i><span class="menu-title text-truncate"
                        data-i18n="Article,Blog,Others">Article,Blog,Others</span></a>
                <ul class="menu-content">
                    <li class=" @if ($route == 'abrwn.category.index' || $route == 'abrwn.category.edit') active @endif"><a
                            class="d-flex align-items-center" href="{{ route('abrwn.category.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Roles">Category</span></a>
                    </li>
                    <li class=" @if ($route == 'abrwn.index' || $route == 'abrwn.edit') active @endif"><a
                            class="d-flex align-items-center" href="{{ route('abrwn.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Permission">ABRWN</span></a>
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
                    $route == 'law.create') open @endif"><a class="d-flex align-items-center"
                    href="#"><i class="fa fa-gavel"></i><span class="menu-title text-truncate"
                        data-i18n="Laws & Rules">Laws & Rules</span></a>
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
                $route == 'office.function.index' ||
                    $route == 'office.function.edit' ||
                    $route == 'office.category.index' ||
                    $route == 'office.category.edit' ||
                    $route == 'office.function.create' ||
                    $route == 'office.category.create') open @endif"><a class="d-flex align-items-center"
                    href="#"><i class="fa fa-gavel"></i><span class="menu-title text-truncate"
                        data-i18n="Laws & Rules">Office & Function</span></a>
                <ul class="menu-content">
                    <li class=" @if ($route == 'office.category.index' || $route == 'office.category.edit') active @endif"><a
                            class="d-flex align-items-center" href="{{ route('office.category.index') }}"><i
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
                $route == 'sf.category.index' ||
                    $route == 'sf.category.edit' ||
                    $route == 'sf.category.create' ||
                    $route == 'service.facility.index' ||
                    $route == 'service.facility.edit' ||
                    $route == 'service.facility.create') open @endif"><a class="d-flex align-items-center"
                    href="#"><i class="fas fa-signature"></i>
                    <span class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Service &
                        Facilitics</span></a>
                <ul class="menu-content">
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

        </ul>
    </div>
</div>
