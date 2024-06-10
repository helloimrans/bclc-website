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



            {{-- notification --}}
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                <a class="nav-link dropdown-toggle hide-arrow show" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="true">
                  <i class="fa fa-bell"></i>
                  <span class="badge bg-danger rounded-pill badge-notifications">{{ count(Auth::user()->unreadNotifications)}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0 show" data-bs-popper="static">
                  <li class="dropdown-menu-header border-bottom">
                        <span class="dropdown-item dropdown-header">
                            Notifications
                            @if (count(Auth::user()->unreadNotifications) > 0)
                            <a href="javascript:;" class="mark-all-as-read"><i class="fa fa-circle mr-1"></i> Mark all
                                as read</a>
                            @endif
                        </span>
                        {{-- <div class="dropdown-divider"></div>  --}}
                  </li>


                  <li class="dropdown-notifications-list scrollable-container ps">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                            @forelse(Auth::user()->notifications as $notification)
                            <div class="media notifications-box">
                                <button type="button" data-notification-id="{{ $notification->id }}"
                                    class="notification-close remove-notification"><span aria-hidden="true">&times;</span></button>
                                <img src="{{ asset('frontend/images/notifications.svg') }}" class="mr-3" alt="">
                                <div class="media-body">
                                    <a href="javascript:;" data-notification-id="{{ $notification->id }}" class="mark-and-view">
                                        <p>{{ $notification->data['heading'] }} @if (!$notification->read_at)
                                                <i class="fa fa-circle custom-color-danger ml-1 fs-10"></i>
                                            @endif
                                        </p>
                                        <h6>{{ $notification->data['text'] }}</h6>
                                        <span>{{ $notification->created_at->diffForHumans() }}</span>
                                    </a>
                                </div>
                            </div>
                            @empty
                                <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">No notifications found.</a>
                            @endforelse
                        
                      </li>
                      
                    </ul>


                </ul>
            </li>

            
            






            {{-- user deshbord --}}


            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                    id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name fw-bolder">{{ Auth::user()->name }}</span><span class="user-status">
                            @if (Auth::user()->user_type == App\Models\User::NORMAL_USER)
                                User
                            @elseif(Auth::user()->user_type == App\Models\User::EXPERT)
                                Expert
                            @elseif(Auth::user()->user_type == App\Models\User::ADMIN)
                                Admin
                            @endif
                        </span></div><span class="avatar"><img class="round"
                            src="@if (Auth::user()->photo) {{ Storage::url(Auth::user()->photo) }}
                            @else
                            {{ asset('defaults/avatar/avatar.png') }} @endif"
                            alt="avatar" height="40" width="40"><span
                            class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="me-50"
                            data-feather="home"></i> Dashboard</a>
                    <a class="dropdown-item" href="{{ route('user.profile') }}"><i class="me-50"
                            data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('user.security') }}"><i class="me-50"
                            data-feather="lock"></i> Security</a>

                    <a class="dropdown-item" href="{{ route('user.logout') }}"><i class="me-50"
                            data-feather="power"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
