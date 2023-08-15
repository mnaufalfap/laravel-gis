<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Web Gis Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description"
        content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
    <meta name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard" />
    <link rel="canonical" href="https://themesberg.com/product/admin-dashboard/volt-premium-bootstrap-5-dashboard">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('volt/src/assets/img/favicon/apple-touch-icon.png') }}">
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('volt/src/assets/img/favicon/favicon-32x32.png') }}"> --}}
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('volt/src/assets/img/favicon/favicon-16x16.png') }}"> --}}
    <link rel="manifest" href="{{ asset('volt/src/assets/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('volt/src/assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('volt/html&css/vendor/sweetalert2/dist/sweetalert2.min.css') }}"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('volt/html&css/vendor/notyf/notyf.min.css') }}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('volt/html&css/css/volt.css') }}" rel="stylesheet">

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    @yield('css')
</head>

<body>

    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="../">
            <span class="sidebar-icon">
                <i class="fas fa-solid fa-pager"></i>
            </span>
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">

            <!--SIDEBAR NAV-->
            <ul class="nav flex-column pt-3 pt-md-0">

                <li class="nav-item">
                    <a href="../" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <i class="fas fa-solid fa-pager"></i>
                        </span>
                        <span class="sidebar-text">Landing Page View</span>
                    </a>
                </li>

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

                <!--SIDEBAR MENU-->
                <div class="nav item">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nav-link">
                                <span class="sidebar-icon">
                                    <i class="fas fa-home"></i>
                                </span>
                                <span class="sidebar-text">Dashboard</span>
                            </a>
                        </li>
                        <div class="nav-menu-heading mb-3 mt-3 font-small" style="color: grey">View Maps</div>
                        {{-- <li class="nav-item {{ Request::is('simple-map') ? 'active' : '' }}">
                            <a href="{{ route('simple-map') }}" class="nav-link ">
                                <span class="sidebar-icon ">
                                    <i class="fas fa-map"></i>
                                </span>
                                <span class="sidebar-text">Simple Map</span>
                            </a>
                        </li> --}}

                        <li class="nav-item 
                        {{ Request::is('markers') ? 'active' : '' }}
                        ">
                            <a href="{{ route('markers') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-map"></i>
                                </span>
                                <span class="sidebar-text">Maps</span>
                            </a>
                        </li>
        
                        {{-- <li class="nav-item 
                        {{ Request::is('layer') ? 'active' : '' }}
                        ">
                            <a href="{{ route('layer') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-draw-polygon"></i>
                                </span>
                                <span class="sidebar-text">Layer Control</span>
                            </a>
                        </li> --}}
        
                        {{-- <li
                            class="nav-item 
                        {{ Request::is('layer-group') ? 'active' : '' }}
                        ">
                            <a href="{{ route('layer-group') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-draw-polygon"></i>
                                </span>
                                <span class="sidebar-text">Layer Group</span>
                            </a>
                        </li>
         --}}
                        {{-- <li class="nav-item 
                        {{ Request::is('geojson') ? 'active' : '' }}
                        ">
                            <a href="{{ route('geojson') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-draw-polygon"></i>
                                </span>
                                <span class="sidebar-text">Geojson</span>
                            </a>
                        </li> --}}
        
                        {{-- <li
                            class="nav-item 
                        {{ Request::is('getCoordinate') ? 'active' : '' }}
                        ">
                            <a href="{{ route('getCoordinate') }}" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fas fa-draw-polygon"></i>
                                </span>
                                <span class="sidebar-text">Get Coordinate</span>
                            </a>
                        </li> --}}
                        <div class="nav-menu-heading mb-3 font-small" style="color: grey">Data</div>
                    </ul>
                </div>
                
                <li class="nav-item">
                    <span
                      class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                      data-bs-toggle="collapse" data-bs-target="#submenu-components">
                      <span>
                        <span class="sidebar-icon">
                          <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                        </span> 
                        <span class="sidebar-text">Manage Data</span>
                      </span>
                      <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      </span>
                    </span>
                    <div class="multi-level collapse " role="list"
                      id="submenu-components" aria-expanded="false">
                      <ul class="flex-column nav">
                        {{-- <li class="nav-item">
                          <a class="nav-link"
                            href="{{ route('centre-point.index') }}">
                            <span class="sidebar-text">Center Point</span>
                          </a>
                        </li> --}}
                        <li class="nav-item ">
                          <a class="nav-link" href="{{ route('locations.index') }}">
                            <span class="sidebar-text">Data Lokasi</span>
                          </a>
                        </li>
                        
                      </ul>
                    </div>
                  </li>
                <!--SIDEBAR MENU-->

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
            </ul>
            <!--HEADER NAV-->

        </div>
    </nav>

    <main class="content">

        <!--HEADER NAV-->
        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Search form -->
                        <form class="navbar-search form-inline" id="navbar-search-main">
                            <div class="input-group input-group-merge search-bar">
                                <span class="input-group-text" id="topbar-addon">
                                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control" id="topbarInputIconLeft"
                                    placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
                            </div>
                        </form>
                        <!-- / Search form -->
                    </div>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <img class="avatar rounded-circle" alt="Image placeholder"
                                        src="{{ asset('volt/html&css/assets/img/team/profile-picture-3.jpg') }}">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <span class="mb-0 font-small fw-bold text-gray-900">{{ $user }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">

                                    <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--HEADER NAV-->

        <!--DROPDOWN MENU-->
        <div class="py-4">
            
        </div>
        <!--DROPDOWN MENU-->

        <!--DISPLAY CONTENT-->
        <div class="row">

            @yield('content')
        </div>
        <!--DISPLAY CONTENT-->


        <footer class="bg-white rounded shadow p-3 mb-4 mt-4">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                    <p class="mb-0 text-center text-lg-start">Copyright © {{ date("Y") }}<span class="current-year"></span></p>
                </div>
            </div>
        </footer>
    </main>

    <!-- Core -->
    <script src="{{ asset('volt/html&css/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('volt/html&css/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('volt/html&css/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

    <!-- Slider -->
    <script src="{{ asset('volt/html&css/vendor/nouislider/dist/nouislider.min.js') }}"></script>

    <!-- Smooth scroll -->
    <script src="{{ asset('volt/html&css/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

    <!-- Charts -->


    <!-- Datepicker -->
    <script src="{{ asset('volt/html&css/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{ asset('volt/html&css/vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="{{ asset('volt/html&css/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

    <!-- Notyf -->
    <script src="{{ asset('volt/html&css/vendor/notyf/notyf.min.js') }}"></script>

    <!-- Simplebar -->
    <script src="{{ asset('volt/html&css/vendor/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/fontawesome.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @stack('javascript')
    <!-- Volt JS -->
    {{-- <script src="{{ asset('volt/hmtl&css/assets/js/volt.js') }}"></script> --}}


</body>

</html>
