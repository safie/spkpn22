<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'SPKPNReport_v2',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>SPKPN</b>Report<sup>  2.0</sup>',
    'logo_img' => 'vendor/adminlte/dist/img/JataNegaraLogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'SPKPNReport',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => true,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'light',
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [

        [
            'text' => 'search',
            'search' => false,
            'topnav' => false,
        ],

        [
            'text'        => 'Cari Kampung',
            'url'         => '/kampung/cari',
            'icon'        => 'fas fa-fw fa-search',
            //'label'       => 4,
            //'label_color' => 'success',
        ],

        ['header' => 'STATUS PENGISIAN'],
        [
            'text'    => 'MODUL A',
            'icon'    => 'fas fa-fw fa-id-badge',
            'url'     => '/modul_a/index',
        ],
        [
            'text'    => 'MODUL B',
            'icon'    => 'fas fa-fw fa-monument',
            'url'     => '/modul_b/index',
        ],
        [
            'text'    => 'MODUL C',
            'icon'    => 'fas fa-fw fa-map-marked-alt',
            'url'     => '/modul_c/index',
        ],
        [
            'text'    => 'MODUL D',
            'icon'    => 'fas fa-fw fa-user',
            'submenu' => [
                [
                    'text' => 'Penduduk',
                    'url'  => '/modul_d/penduduk',
                ],
                [
                    'text' => 'Umur',
                    'url'  => '/modul_d/umur',
                ],
                [
                    'text' => 'Tahap Pendidikan',
                    'url'  => '/modul_d/pendidikan',
                ],
                [
                    'text' => 'Pendapatan Kasar',
                    'url'  => '/modul_d/pendapatan',
                ],
                [
                    'text' => 'Pekerjaan',
                    'url'  => '/modul_d/pekerjaan',
                ],
                [
                    'text' => 'Golongan Khas',
                    'url'  => '/modul_d/golongankhas',
                ],
            ],
        ],
        [
            'text'    => 'MODUL E',
            'icon'    => 'fas fa-fw fa-layer-group',
            'submenu' => [
                [
                    'text' => 'Tanah',
                    'url'  => '/modul_e/tanah',
                ],
                [
                    'text' => 'Jenis Hak Milik',
                    'url'  => '/modul_e/hakmilik',
                ],
                [
                    'text' => 'Tanah Diusahakan',
                    'url'  => '/modul_e/tanahusaha',
                ],
                [
                    'text' => 'Tanah Terbiar',
                    'url'  => '/modul_e/tanahterbiar',
                ],
            ],
        ],
        [
            'text'    => 'MODUL F',
            'icon'    => 'fas fa-fw fa-industry',
            'submenu' => [
                [
                    'text' => 'Kemudahan Perniagaan',
                    'url'  => '/modul_f/kemudahanniaga',
                ],
                [
                    'text' => 'Pertanian',
                    'url'  => '/modul_f/pertanian',
                ],
                [
                    'text' => 'Penternakan / Perikanan',
                    'url'  => '/modul_f/ternakperikanan',
                ],
                [
                    'text' => 'Perniagaan',
                    'url'  => '/modul_f/perniagaan',
                ],
                [
                    'text' => 'Premis Niaga',
                    'url'  => '/modul_f/premisniaga',
                ],
                [
                    'text' => 'Stesen Pam Minyak',
                    'url'  => '/modul_f/pamminyak',
                ],
                [
                    'text' => 'Koperasi',
                    'url'  => '/modul_f/koperasi',
                ],
            ],
        ],
        [
            'text'    => 'MODUL G',
            'icon'    => 'fas fa-fw fa-car',
            'submenu' => [
                [
                    'text' => 'Rumah',
                    'url'  => '#',
                ],
                [
                    'text' => 'Kenderaan',
                    'url'  => '#',
                ],
            ],
        ],
        [
            'text'    => 'MODUL H',
            'icon'    => 'fas fa-fw fa-faucet',
            'submenu' => [
                [
                    'text' => 'Infrastruktur',
                    'url'  => '#',
                ],
                [
                    'text' => 'Bekalan Air',
                    'url'  => '#',
                ],
                [
                    'text' => 'Bekalan Elektrik',
                    'url'  => '#',
                ],
                [
                    'text' => 'Sistem Pembentungan',
                    'url'  => '#',
                ],
                [
                    'text' => 'Pusat Pendidikan',
                    'url'  => '#',
                ],
                [
                    'text' => 'Capaian / Akses Liputan',
                    'url'  => '#',
                ],
                [
                    'text' => 'Kemudahan Masyarakat',
                    'url'  => '#',
                ],
                [
                    'text' => 'Rumah / Pusat Jagaan',
                    'url'  => '#',
                ],
                [
                    'text' => 'Sampah',
                    'url'  => '#',
                ],
                [
                    'text' => 'Pengangkutan Awam',
                    'url'  => '#',
                ],
            ],
        ],
        [
            'text'    => 'MODUL I',
            'icon'    => 'fas fa-fw fa-people-carry',
            'submenu' => [
                [
                    'text' => 'Penganjuran Aktiviti',
                    'url'  => '#',
                ],
                [
                    'text' => 'Wabak Penyakit',
                    'url'  => '#',
                ],
                [
                    'text' => 'Kualiti Alam Sekitar',
                    'url'  => '#',
                ],
                [
                    'text' => 'Isu & Masalah Sosial',
                    'url'  => '#',
                ],
                [
                    'text' => 'Kursus / Latihan',
                    'url'  => '#',
                ],
                [
                    'text' => 'Projek Ekonomi',
                    'url'  => '#',
                ],
            ],
        ],
        [
            'text'    => 'MODUL J',
            'icon'    => 'fas fa-fw fa-people-arrows',
            'url'     => '#',
        ],
        [
            'text'    => 'MODUL K',
            'icon'    => 'fas fa-fw fa-user-tie',
            'submenu' => [
                [
                    'text' => 'Individu',
                    'url'  => '#',
                ],
                [
                    'text' => 'Kampung',
                    'url'  => '#',
                ],
                [
                    'text' => 'Potensi',
                    'url'  => '#',
                ],
            ],
        ],
        [
            'text'    => 'MODUL L',
            'icon'    => 'fas fa-fw fa-exclamation-triangle',
            'url'     => '#',
        ],
        [
            'text'    => 'MODUL M',
            'icon'    => 'fas fa-fw fa-chalkboard-teacher',
            'url'     => '#',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
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
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => false,
];
