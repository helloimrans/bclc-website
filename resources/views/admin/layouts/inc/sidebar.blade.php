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
            <li class="nav-item @if ($route == 'associated.service.index' ||
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
            <li class="nav-item @if ($route == 'service.category.index' ||
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
            <li class="nav-item @if ($route == 'abrwn.category.index' ||
                $route == 'abrwn.category.edit' ||
                $route == 'abrwn.index' ||
                $route == 'abrwn.edit') open @endif"><a class="d-flex align-items-center"
                    href="#"><i data-feather='check-square'></i><span class="menu-title text-truncate"
                        data-i18n="Article,Blog,Others">Article,Blog,Others</span></a>
                <ul class="menu-content">
                    <li class=" @if ($route == 'abrwn.category.index' || $route == 'abrwn.category.edit') active @endif"><a class="d-flex align-items-center"
                            href="{{ route('abrwn.category.index') }}"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Roles">Category</span></a>
                    </li>
                    <li class=" @if ($route == 'abrwn.index' || $route == 'abrwn.edit') active @endif"><a class="d-flex align-items-center"
                            href="{{ route('abrwn.index') }}"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Permission">ABRWN</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if ($route == 'law.category.index' || $route == 'law.category.edit' || $route == 'law.index' || $route == 'law.edit' || $route == 'law.show' || $route == 'law.create') open @endif"><a class="d-flex align-items-center"
                    href="#"><i class="fa fa-gavel"></i><span class="menu-title text-truncate"
                        data-i18n="Laws & Rules">Laws & Rules</span></a>
                <ul class="menu-content">
                    <li class=" @if ($route == 'law.category.index' || $route == 'law.category.edit') active @endif"><a
                            class="d-flex align-items-center" href="{{ route('law.category.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Roles">Category</span></a>
                    </li>
                    <li class=" @if ($route == 'law.index' || $route == 'law.edit' || $route == 'law.show'|| $route == 'law.create') active @endif"><a
                            class="d-flex align-items-center" href="{{ route('law.index') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Permission">Laws & Rules</span></a>
                    </li>
                </ul>
            </li>
            {{-- <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="shield"></i><span
                        class="menu-title text-truncate" data-i18n="Roles &amp; Permission">Roles &amp;
                        Permission</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-access-roles.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Roles">Roles</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="app-access-permission.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="Permission">Permission</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                        data-feather="user"></i><span class="menu-title text-truncate"
                        data-i18n="User">User</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="app-user-list.html"><i
                                data-feather="circle"></i><span class="menu-item text-truncate"
                                data-i18n="List">List</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="View">View</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="app-user-view-account.html"><span
                                        class="menu-item text-truncate" data-i18n="Account">Account</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-security.html"><span
                                        class="menu-item text-truncate" data-i18n="Security">Security</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-billing.html"><span
                                        class="menu-item text-truncate" data-i18n="Billing &amp; Plans">Billing
                                        &amp; Plans</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-notifications.html"><span
                                        class="menu-item text-truncate"
                                        data-i18n="Notifications">Notifications</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="app-user-view-connections.html"><span
                                        class="menu-item text-truncate" data-i18n="Connections">Connections</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="disabled nav-item"><a class="d-flex align-items-center" href="#"><i
                        data-feather="eye-off"></i><span class="menu-title text-truncate"
                        data-i18n="Disabled Menu">Disabled Menu</span></a>
            </li> --}}

        </ul>
    </div>
</div>
