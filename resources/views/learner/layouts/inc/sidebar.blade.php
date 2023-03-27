@php
$route = Route::currentRouteName();
@endphp

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a href="{{ route('learner.dashboard') }}">
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
            <li class="@if ($route == 'learner.dashboard') active @endif nav-item"><a class="d-flex align-items-center"
                    href="{{ route('learner.dashboard') }}"><i data-feather="home"></i><span
                        class="menu-title text-truncate" data-i18n="Email">Dashboard</span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item "><a class="d-flex align-items-center"
                    href="#"><i class="far fa-eye"></i><span class="menu-title text-truncate"
                        data-i18n="Roles &amp; Permission">Legal Insights</span></a>
                <ul class="menu-content">
                    <li class=""><a class="d-flex align-items-center"
                            href=""><i data-feather="circle"></i><span
                                class="menu-item text-truncate" data-i18n="Roles">Associated Service</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
