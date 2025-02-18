<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'DR. MENDOZA MULTI-SPECIALIST',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    'assets' => [
        'css' => [
            'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap',
        ],
        'favicon' => '<link rel="icon" type="image/png" href="Image/logo/mendoza.png">',
    ],
    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<strong style="font-weight: 900; color: #343984;"><b style="color:#E02D2D;">DR</b>. MENDOZA</strong>',
    'logo_img' => 'vendor/adminlte/dist/img/mendoza.png',
    'logo_img_class' => 'brand-image',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/mendoza.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration. Currently, two
    | modes are supported: 'fullscreen' for a fullscreen preloader animation
    | and 'cwrapper' to attach the preloader animation into the content-wrapper
    | element and avoid overlapping it with the sidebars and the top navbar.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => false,
        'mode' => 'fullscreen',
        'img' => [
            'path' => 'vendor/adminlte/dist/img/mendozalogo.png',
            'alt' => 'Mendoza Preloader Image',
            'effect' => 'animation__shake',
            'width' => 250,
            'height' => 250,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-danger',
    'classes_auth_header' => 'bg-gradient-navy',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-navy elevation-2',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => true,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => true,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin/dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    // 'profile_url' => '/Admin/profile/edit',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [

        // Navbar items:
        // [
        //     'type' => 'navbar-search',
        //     'text' => 'search',          // Placeholder for the underlying input.
        //     'topnav_right' => true,      // Or "topnav => true" to place on the left.
        //     'url' => 'navbar/search',    // The url used to submit the data ('#' by default).
        //     'method' => 'post',          // 'get' or 'post' ('get' by default).
        //     'input_name' => 'searchVal', // Name for the underlying input ('adminlteSearch' by default).
        //     'id' => 'navbarSearch'       // ID attribute for the underlying input (optional).
        // ],
        [
            'type' => 'navbar-notification',
            'id' => 'my-messenger',
            'icon' => 'fa-sharp fa-solid fa-comment-dots',
            'icon_color' => 'primary',
            'url' => '/chat/list',
            'topnav_right' => true,
            // 'dropdown_mode' => true,
            // 'dropdown_flabel' => 'All messages',
            // 'update_cfg' => [
            //     'url' => '/Message',
            //     'period' => 30,
            // ],
        ],
        [
            'type' => 'navbar-notification',
            'id' => 'my-notification',
            'icon' => 'fas fa-bell',
            'icon_color' => 'blue',
            'url' => 'notifications/show', // Adjust this to your desired route
            'topnav_right' => true,
            'dropdown_mode' => true,
        ],
        // [
        //     'type' => 'navbar-notification',
        //     'id' => 'my-notification',
        //     'icon' => 'fas fa-bell',
        //     'icon_color' => 'blue',
        //     'url' => 'notifications/show', // Adjust this to your desired route
        //     'topnav_right' => true,
        //     'dropdown_mode' => true,
        //     'dropdown_flabel' => 'All notifications',
        //     'update_cfg' => [
        //         'url' => 'notifications/get', // Adjust this to your desired route
        //         'period' => 30, // Refresh period in seconds
        //     ],
        // ],


        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],




        // Sidebar items:
        // [
        //     'type' => 'sidebar-menu-search',
        //     'text' => 'Search',
        // ],
        ['header' => 'NAVIGATION'],
        [
            'text' => 'Dashboard',
            'url' => '/admin/dashboard',
            'icon' => 'fas fa-fw fa-home',
            'label' => '',
            'label_color' => '',
        ],
        // [
        //     'text' => 'profile',
        //     'url' => '/Admin/profile/edit',
        //     'icon' => 'fas fa-fw fa-user',
        // ],
        [
            'text' => 'Appointment',
            'icon' => 'fa-regular fa-calendar-check',
            'submenu' => [
                [
                    'text' => 'All',
                    'icon_color' => 'blue',
                    'icon' => 'fas fa-fw fa-calendar-check',
                    'url' => '/Appointment-List/All',
                ],
                [
                    'text' => 'Pending',
                    'icon_color' => 'yellow',
                    'icon' => 'fas fa-fw fa-clock',
                    'url' => '/Appointment-List/Pending',
                ],
                [
                    'text' => 'Approved',
                    'icon_color' => 'green',
                    'icon' => 'fas fa-fw fa-check',
                    'url' => '/Appointment-List/Approved',
                ],
                [
                    'text' => 'Follow Up',
                    'icon_color' => 'blue',
                    'icon' => 'fa-solid fa-repeat',
                    'url' => '/Appointment-List/Follow-Up',
                ],
                [
                    'text' => 'Rejected',
                    'icon_color' => 'red',
                    'icon' => 'fas fa-fw fa-times',
                    'url' => '/Appointment-List/Cancelled',
                ],
            ],
        ],
        [
            'text' => 'Close Appointment',
            'url' => 'Close-Appointment/Close/Appointment',
            'icon' => 'fa-solid fa-square-xmark',
            'icon_color' => 'danger'
        ],
        [
            'text' => 'Set Appointment',
            'url' => 'Set-Appointment/Set/Appointment',
            'icon' => 'fa-duotone fa-solid fa-calendar-plus',
            'icon_color' => 'success'
        ],

        [
            'text' => 'Patients Record',
            'url' => '/Patients-Record/List',
            'icon' => 'fa-solid fa-user-group',
        ],
        [
            'text' => 'Calendar',
            'url' => '/Admin/Calendars',
            'icon' => 'fa-regular fa-calendar-days',
        ],
        [
            'text' => 'Consultation',
            'icon' => 'fa-regular fa-calendar-plus',
            'icon_color' => 'primary',
            'url' => 'Add-Activity/Index/Consultation',
        ],
        [
            'text' => 'Upload',
            'icon' => 'fas fa-fw fa-plus',
            'submenu' => [
                [
                    'text' => 'Service',
                    'icon' => 'fa-solid fa-hand-holding-heart',
                    'icon_color' => 'success',
                    'url' => 'Add-Activity/Service',
                ],
                [
                    'text' => 'Event',
                    'icon' => 'fas fa-fw fa-calendar-plus',
                    'icon_color' => 'blue',
                    'url' => '/Add-Activity/Event',
                ],
                [
                    'text' => 'Doctor',
                    'icon' => 'fas fa-fw fa-users',
                    'icon_color' => 'red',
                    'url' => 'Add-Activity/Employee/Doctor',
                ],
                [
                    'text' => 'Blog',
                    'icon' => 'fa-solid fa-image',
                    'icon_color' => 'blue',
                    'url' => 'Add-Activity/Blog',
                ],

                [
                    'text' => 'Contact',
                    'icon' => 'fa-solid fa-address-book',
                    'icon_color' => 'blue',
                    'url' => 'Add-Activity/Contact',
                ],
            ],
        ],
        [
            'text' => 'Medical Certificate',
            'url' => '/Medical-Certificate',
            'icon' => 'fa-solid fa-certificate',
            'icon_color' => 'red',
        ],
        [
            'text' => 'Activity Log',
            'icon' => 'fa-solid fa-list-check',
            'url' => '/Activity-Logs',
        ],
        // [
        //     'text' => 'Email',
        //     'icon' => 'fa-solid fa-list-check',
        //     'url' => '/email',
        // ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'FontAwesome' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
