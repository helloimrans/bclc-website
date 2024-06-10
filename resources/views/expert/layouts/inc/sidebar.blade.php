@php
$route = Route::currentRouteName();
@endphp

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a href="{{ route('expert.dashboard') }}">
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
            <li class="@if ($route == 'expert.dashboard') active @endif nav-item"><a class="d-flex align-items-center"
                    href="{{ route('expert.dashboard') }}"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Dashboard</span></a>
            </li>
            <li class="navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="@if ($route == 'expert.profile') active @endif nav-item"><a class="d-flex align-items-center" href="{{ route('expert.profile') }}"><i data-feather="user"></i><span
                        class="menu-title text-truncate" data-i18n="Email">View Profile</span></a>
            </li>
            <li class="@if ($route == 'expert.edit.profile') active @endif nav-item"><a class="d-flex align-items-center" href="{{ route('expert.edit.profile') }}"><i data-feather="edit"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Update Profile</span></a>
            </li>
            <li class="@if ($route == 'expert.security') active @endif nav-item"><a class="d-flex align-items-center" href="{{ route('expert.security') }}"><i data-feather="lock"></i><span
                        class="menu-title text-truncate" data-i18n="Email"> Security</span></a>
            </li>

        </ul>
    </div>
</div>
