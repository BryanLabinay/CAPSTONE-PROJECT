<!-- Navbar -->
<header id="header" class="header fixed-top font-web">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
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

                {{-- Team --}}
                <li><a class="nav-link scrollto {{ Route::is('doctor.staff') ? 'active' : '' }}"
                        href="{{ route('doctor.staff') }}">Team</a></li>

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
                <li><a class="nav-link scrollto {{ Route::is('user-calendar') ? 'active' : '' }}"
                        href="{{ route('user-calendar') }}">Calendar</a></li>
                <li><a href="#" class="text-decoration-none">Blog</a></li>
                <li><a class="text-decoration-none {{ Route::is('events') ? 'active' : '' }}"
                        href="{{ route('events') }}">Events</a></li>

                <!--  Dropdown Button -->
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        {{-- Notification --}}
        <div class="dropdown position-relative mx-3" id="notificationIcon">

            <a class="dropdown" role="button" id="notificationDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fa-solid fa-bell fa-lg" style="color:#012970;"></i>


                <span id="notificationBadge"
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger
                @if ($unreadCount === 0) disabled
                                                    aria-disabled="true"
                                                    style="pointer-events: none; opacity: 0;" @endif">
                    {{ $unreadCount }}
                </span>
                {{-- @endif --}}
            </a>
            <ul class="dropdown-menu dropdown-menu-end p-1" style="background-color:#012970; width: 500px;"
                href="{{ route('notification') }}">
                <!-- Notification items -->
                @forelse ($notifications->sortByDesc('created_at') as $notification)
                    <li class="px-0 mb-1 {{ $notification->read ? '' : 'unread' }}">
                        <a class="dropdown-item bg-primary-subtle px-3 rounded-2" href="#">
                            <div class="row">
                                <div class="col mb-1">
                                    <div class=" notification-title">

                                        <h6 class="fw-bolder">{{ $notification->status }}</h6>


                                    </div>
                                    <div class="notification-description text-muted">{{ $notification->appointment }}
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
                    <li>No notifications available</li>
                @endforelse
                <!-- End of notification items -->
            </ul>
        </div>

        <!-- User Profile Dropdown -->
        <div class="nav-item dropdown p-1 px-2 font-web">
            <a class="nav-link d-flex align-items-center" style="color:#012970;" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ url('assets/img/team/team-1.jpg') }}" height="35" class="me-1"
                    style="border-radius:50%;" alt="User Profile">

            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item fw-semibold " href="{{ route('profile.edit') }}" style="color:#012970;"> <b
                            class="fw-semibold">{{ auth()->user()->name }}</b></a></li>
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
