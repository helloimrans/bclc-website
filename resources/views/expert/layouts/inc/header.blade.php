<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle is-active" href="#"><svg
                            xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-menu ficon">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <span><a href="{{ url('/') }}" class=""><i class="fa fa-arrow-left"></i> Back to
                        Home</a></span>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="user-nav d-sm-flex d-none"><span
                        class="user-name fw-bolder">{{ Auth::guard('expert')->user()->name }}</span><span
                        class="user-status">expert</span></div><span class="avatar"><img class="round"
                        src="@if (Auth::guard('expert')->user()->image) {{ asset(Auth::guard('expert')->user()->image) }}
                            @else
                            {{ asset('defaults/avatar/avatar.png') }} @endif"
                        alt="avatar" height="40" width="40"><span
                        class="avatar-status-online"></span></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                <a class="dropdown-item" href="{{ route('expert.dashboard') }}"><i class="me-50"
                        data-feather="home"></i> Dashboard</a>
                <a class="dropdown-item" href="{{ route('expert.profile') }}"><i class="me-50"
                        data-feather="user"></i> Profile</a>
                <a class="dropdown-item" href="{{ route('expert.edit.profile') }}"><i class="me-50"
                        data-feather="edit"></i> Update Profile</a>
                <a class="dropdown-item" href="{{ route('expert.security') }}"><i class="me-50"
                        data-feather="lock"></i> Security</a>

                    <a
                    class="dropdown-item" href="{{ route('expert.logout') }}"><i class="me-50"
                        data-feather="power"></i> Logout</a>
            </div>
        </li>
        </ul>
    </div>
</nav>
