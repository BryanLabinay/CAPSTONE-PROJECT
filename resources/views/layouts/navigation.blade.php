<!-- Navbar -->
<style>
    /* Style for unread notifications */
    .notification-item.bg-lightblue {
        background-color: #e0f7fa !important;
        /* Light blue background */
        color: #000;
        /* Dark text color */
        font-weight: bold;
        /* Bold text */
    }

    /* Style for read notifications */
    .notification-item.bg-light {
        background-color: #f5f5f5 !important;
        /* Light gray background */
        color: #888;
        /* Lighter text color */
    }

    .dropdown-item.notification-item:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .dropdown-header {
        background-color: #f8f9fa;
        padding: 10px 15px;
        font-size: 14px;
    }

    .dropdown-item.notification-item {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
    }

    .bg-warning {
        background-color: #CED7DF !important;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    .text-bold {
        font-weight: bold;
    }

    .text-muted {
        color: #6c757d !important;
    }
</style>
<!-- Add some custom CSS to enhance the UI -->

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

                {{-- Calendar --}}
                <li><a class="nav-link scrollto {{ Route::is('user-calendar') ? 'active' : '' }}"
                        href="{{ route('user-calendar') }}">Calendar</a></li>

                {{-- News & Updates --}}
                <li><a class="text-decoration-none {{ Route::is('events') ? 'active' : '' }}"
                        href="{{ route('events') }}">News & Updates</a></li>

                <li>
                    <a class="{{ Route::is('chat.admin') ? 'active' : '' }}" href="{{ route('chat.admin') }}">
                        <i style="font-size: 19px" class="fa-solid fa-comment fa-lg"
                            style="{{ Route::is('chat.admin') ? 'color: #dc3545;' : 'color: navy;' }}"></i>
                    </a>
                </li>

                {{-- Notification --}}
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

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink1"
                        style="max-height: 300px; overflow-y: auto;">
                        @php
                            $notifications = $user->notifications ?? collect();
                            $unreadNotifications = $notifications->where('read_at', null);
                            $readNotifications = $notifications->where('read_at', '!=', null);
                        @endphp

                        {{-- Unread Notifications --}}
                        @if ($unreadNotifications->isNotEmpty())
                            <div class="dropdown-header text-center">
                                <strong>Unread Notifications</strong>
                            </div>
                            @foreach ($unreadNotifications as $notification)
                                <a class="dropdown-item notification-item bg-warning text-dark"
                                    href="javascript:void(0)" onclick="markAsRead('{{ $notification->id }}')">
                                    <i
                                        class="fas fa-exclamation-circle me-1 text-warning"></i>{{ $notification->data['message'] }}
                                </a>
                            @endforeach
                        @endif

                        {{-- Read Notifications --}}
                        @if ($readNotifications->isNotEmpty())
                            @foreach ($readNotifications as $notification)
                                <a class="dropdown-item notification-item bg-light text-muted" href="#">
                                    <i
                                        class="fas fa-check-circle me-1 text-success"></i>{{ $notification->data['message'] }}
                                </a>
                            @endforeach
                        @endif

                        {{-- Empty State --}}
                        @if ($notifications->isEmpty())
                            <a class="dropdown-item text-center text-muted px-5 py-0" href="#">No
                                Notifications</a>
                        @endif
                    </div>
                </li>





                {{-- Mobile Nav Toggle --}}
                <i class="bi bi-list mobile-nav-toggle"></i>
            </ul>
        </nav>


        {{-- <div class="d-flex align-items-center">

            <a class="{{ Route::is('chat.admin') ? 'active' : '' }}" href="{{ route('chat.admin') }}">
                <i class="fa-solid fa-comment fa-lg mx-3"
                    style="{{ Route::is('chat.admin') ? 'color: #dc3545;' : 'color: navy;' }}"></i>
            </a>



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
                    @forelse ($notifications->sortByDesc('created_at') as $notification)
                        <li class="px-0 mb-1 {{ $notification->read_at ? '' : 'unread' }}"
                            id="notification_{{ $notification->id }}">
                            <a class="dropdown-item bg-primary-subtle px-3 rounded-2" href="#"
                                onclick="markAsRead({{ $notification->id }})"
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
                </ul>
            </div>

        </div> --}}




        <!-- User Profile Dropdown -->
        <div class="nav-item dropdown font-web">
            <a class="nav-link d-flex align-items-center" style="color:#012970;" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                @if ($user_image->image === null)
                    <img src="{{ asset('default.jpg') }}" height="40" width="40"
                        class="me-1 border border-1 border-secondary" style="border-radius: 50%;" alt="User Profile">
                @else
                    <img src="{{ asset($user_image->image) }}" height="40" width="40"
                        class="me-1 border border-1 border-secondary" style="border-radius: 50%; object-fit:cover;"
                        alt="User Profile">
                @endif

            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item fw-semibold " href="{{ route('profile.edit') }}" style="color:#012970;">
                        <b class="fw-semibold">{{ auth()->user()->fname }} {{ auth()->user()->mname }}
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

<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Ensure dropdown opens on click
    $(document).ready(function() {
        $('#navbarDropdown').on('click', function(e) {
            e.preventDefault();
            $(this).next('.dropdown-menu').toggleClass('show');
        });
    });
</script>
<script>
    function markAsRead(notificationId) {
        // Send AJAX request to mark notification as read
        fetch("{{ url('/notifications') }}/" + notificationId + "/read", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Optionally, you can update the UI to show the notification as read
                    document.querySelector(`[onclick="markAsRead('${notificationId}')"]`)
                        .classList.remove('bg-lightblue');


                }
                location.reload();
            });
    }
</script>






<!-- End Header -->
