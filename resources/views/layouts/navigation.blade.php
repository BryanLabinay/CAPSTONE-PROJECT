<!-- Navbar -->
<style>
    /* Style for unread notifications */
    .notification-item.bg-lightblue {
        background-color: #e0f7fa !important;
        color: #000;
        font-weight: bold;
    }

    /* Style for read notifications */
    .notification-item.bg-light {
        background-color: #f5f5f5 !important;
        color: #888;
    }

    .dropdown-item.notification-item:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    /* Mobile Navigation Toggle Button */
    .mobile-nav-toggle {
        font-size: 1.5rem;
        color: #012970;
        cursor: pointer;
        margin-left: auto;
        /* Pushes the toggle to the right */
    }

    /* Mobile Menu */
    #mobile-menu {
        overflow-y: auto;
        transition: all 0.3s ease;
    }
</style>

<header id="header" class="header fixed-top py-1 font-web shadow-sm">
    <div class="container-fluid px-5 d-flex align-items-center justify-content-between">
        <!-- Logo -->
        <a href="{{ url('/dashboard') }}" class="logo d-flex align-items-center text-decoration-none">
            <img src="{{ url('assets/img/mendoza.png') }}" alt="Mendoza Logo" />
            <span class="d-none d-sm-inline">
                <b class="text-danger">DR</b>. MENDOZA
            </span>
        </a>

        <!-- Main Navigation -->
        <nav id="navbar" class="navbar justify-content-center">
            <ul>
                <li><a class="nav-link scrollto {{ Route::is('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">Home</a></li>

                <!-- Services -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Route::is('services') ? 'active' : '' }}" href="#"
                        id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Services
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        @foreach ($services as $data)
                            <li><a class="dropdown-item"
                                    href="{{ route('services', $data->service) }}">{{ $data->service }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <!-- Appointment -->
                <li class="dropdown">
                    <a href="#"
                        class="text-decoration-none dropdown-toggle {{ Route::is('Add-Appointment') ? 'active' : '' }} {{ Route::is('Appointment-List') ? 'active' : '' }} {{ Route::is('Edit-Appointment') ? 'active' : '' }}">
                        <span>Appointment</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a href="{{ route('Add-Appointment') }}"
                                class="{{ Route::is('Add-Appointment') ? 'active' : '' }}">Add Appointment</a></li>
                        <li><a href="{{ route('Appointment-List') }}"
                                class="{{ Route::is('Appointment-List') ? 'active' : '' }}">Appointment List</a></li>
                    </ul>
                </li>

                <!-- Calendar -->
                <li><a class="nav-link scrollto {{ Route::is('user-calendar') ? 'active' : '' }}"
                        href="{{ route('user-calendar') }}">Calendar</a></li>

                <li>
                    <a class="text-decoration-none {{ in_array(Route::currentRouteName(), ['events', 'event.view']) ? 'active' : '' }}"
                        href="{{ route('events') }}">News & Updates</a>
                </li>

                <li>
                    <a class="{{ Route::is('chat.admin') ? 'active' : '' }}" href="{{ route('chat.admin') }}">
                        <i style="font-size: 19px" class="fa-solid fa-comment fa-lg"></i>
                    </a>
                </li>

                <!-- Notifications -->
                @php
                    $unreadCount = $user->notifications->whereNull('read_at')->count();
                @endphp

                <li class="nav-item dropdown">
                    <a id="navbarDropdownMenuLink1" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" class="nav-link messages-toggle position-relative">
                        <i style="font-size: 19px" class="fa-solid fa-bell"></i>
                        <span id="notificationBadge"
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger
            @if ($unreadCount === 0) disabled" aria-disabled="true" style="pointer-events: none; opacity: 0;" @endif">
                            {{ $unreadCount }}
                        </span>
                    </a>
                </li>

                <!-- Profile Dropdown Inside Navbar -->
                <li class="nav-item dropdown">
                    <a class="nav-link d-flex align-items-center" style="color:#012970;" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if ($user_image->image === null)
                            <img src="{{ asset('default.jpg') }}" height="40" width="40"
                                class="me-1 border border-1 border-secondary" style="border-radius: 50%;"
                                alt="User Profile">
                        @else
                            <img src="{{ asset($user_image->image) }}" height="40" width="40"
                                class="me-1 border border-1 border-secondary"
                                style="border-radius: 50%; object-fit:cover;" alt="User Profile">
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item fw-semibold" href="{{ route('profile.edit') }}"
                                style="color:#012970;">
                                <b class="fw-semibold">{{ auth()->user()->fname }} {{ auth()->user()->mname }}
                                    {{ auth()->user()->lname }}</b></a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item fw-semibold text-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Mobile Navigation Toggle (Moved to the Right) -->
        <button class="mobile-nav-toggle d-md-none border-0 bg-transparent">
            <i class="fa-solid fa-bars fa-lg"></i>
        </button>
    </div>
</header>
