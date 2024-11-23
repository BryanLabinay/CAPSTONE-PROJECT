<!-- Navbar -->
<header id="header" class="header fixed-top py-1 font-web shadow-sm">
    <div class="container-fluid px-5 d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <a href="{{ url('/dashboard') }}" class="logo d-flex align-items-center text-decoration-none">
            <img src="{{ url('assets/img/mendoza.png') }}" alt="Mendoza Logo" />
            <span><b class="text-danger">DR</b>. MENDOZA</span>
        </a>
        <!-- Main Navigation -->
        <nav id="navbar" class="navbar justify-content-center">
            <ul>
                {{-- Dashboard --}}
                <li><a class="nav-link scrollto {{ Route::is('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">Home</a></li>

                {{-- Services --}}
                <li><a class="nav-link scrollto {{ Route::is('services') ? 'active' : '' }}"
                        href="{{ route('services') }}">Services</a></li>


                {{-- Appointment --}}
                <li class="dropdown">
                    <a href="#"
                        class="text-decoration-none {{ Route::is('Add-Appointment') ? 'active' : '' }} {{ Route::is('Appointment-List') ? 'active' : '' }} {{ Route::is('Edit-Appointment') ? 'active' : '' }}"><span>Appointment</span>
                        <i class="bi bi-chevron-down"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end ">
                        <li><a href="{{ route('Add-Appointment') }}"
                                class="{{ Route::is('Add-Appointment') ? 'active' : '' }}">Add Appointment</a></li>
                        <li><a href="{{ route('Appointment-List') }}"
                                class="{{ Route::is('Appointment-List') ? 'active' : '' }}">Appointment List</a></li>
                    </ul>
                </li>
                {{-- Messenger --}}
                {{-- <li><a class="nav-link scrollto {{ Route::is('user.chat') ? 'active' : '' }}"
                        href="{{ route('user.chat') }}">Messenger</a></li> --}}
                {{-- Calendar --}}
                <li><a class="nav-link scrollto {{ Route::is('user-calendar') ? 'active' : '' }}"
                        href="{{ route('user-calendar') }}">Calendar</a></li>
                {{-- <li><a href="#" class="text-decoration-none">Blog</a></li> --}}
                <li><a class="text-decoration-none {{ Route::is('events') ? 'active' : '' }}"
                        href="{{ route('events') }}">News & Updates</a></li>

                {{-- <li><a class="text-decoration-none {{ Route::is('chat.admin') ? 'active' : '' }}"
                        href="{{ route('chat.admin') }}">Chat</a></li> --}}

                <!--  Dropdown Button -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

        <div class="d-flex align-items-center">
            {{-- Message --}}
            {{-- <i class="fa-solid fa-comment fa-lg mx-3" style="color:#012970;"></i> --}}
            <a class="{{ Route::is('chat.admin') ? 'active' : '' }}" href="{{ route('chat.admin') }}">
                <i class="fa-solid fa-comment fa-lg mx-3"
                    style="{{ Route::is('chat.admin') ? 'color: #dc3545;' : 'color: navy;' }}"></i>
            </a>



            {{-- Notification --}}
            <div class="dropdown position-relative" id="notificationIcon">
                <a class="dropdown" role="button" id="notificationDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="fa-solid fa-bell fa-lg" style="color:#012970;"></i>

                    <span id="notificationBadge"
                        class="position-absolute top-3 start-100 translate-middle badge rounded-pill bg-danger
                        @if ($unreadCount === 0) disabled
                        aria-disabled="true"
                        style="pointer-events: none; opacity: 0;" @endif">
                        {{ $unreadCount }}
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-1"
                    style="background-color: #1a2b4d; width: 500px; max-height: 300px; overflow-y: auto;">
                    <!-- Notification items -->
                    @forelse ($notifications->sortByDesc('created_at') as $notification)
                        <li class="px-0 mb-1 {{ $notification->read ? '' : 'unread' }}">
                            <a class="dropdown-item bg-primary-subtle px-3 rounded-2" href="#"
                                style="background-color: #2d3e5d; color: #ffffff;">
                                <div class="row">
                                    <div class="col mb-1">
                                        <div class="notification-title">
                                            <h6 class="fw-bolder"
                                                style="color:
                                                    @if ($notification->status === 'Approved') green
                                                    @elseif($notification->status === 'Cancelled') red
                                                    @else #ffffff @endif;">
                                                {{ $notification->status }}
                                            </h6>
                                        </div>

                                        <div class="notification-description text-muted">
                                            {{ $notification->appointment }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="notification-date text-muted">
                                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li class="text-white">No notifications available</li>
                    @endforelse
                    <!-- End of notification items -->
                </ul>
            </div>
        </div>




        <!-- User Profile Dropdown -->
        <div class="nav-item dropdown font-web">
            <a class="nav-link d-flex align-items-center" style="color:#012970;" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                @if ($user_image->image === null)
                    <img src="{{ asset('default.jpg') }}" height="40" width="40"
                        class="me-1 border border-1 border-secondary" style="border-radius: 50%;" alt="User Profile">
                @else
                    <img src="{{ asset($user_image->image) }}" height="40" width="40"
                        class="me-1 border border-1 border-secondary" style="border-radius: 50%;" alt="User Profile">
                @endif

            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item fw-semibold " href="{{ route('profile.edit') }}" style="color:#012970;"> <b
                            class="fw-semibold">{{ auth()->user()->fname }} {{ auth()->user()->mname }}
                            {{ auth()->user()->lname }}</b></a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item fw-semibold text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- .navbar -->
    </div>
</header>

<!-- End Header -->
