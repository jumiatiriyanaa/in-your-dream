<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>In Your Dream - @yield('title')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" />
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon" />
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/quill/quill.snow.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/vendor/simple-datatables/style.css') }}" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" alt="Logo POLBENG" class="me-3" />
                <span class="d-none d-lg-block">In Your Dream</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- End Search Icon-->

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">1</span> </a>
                    <!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 1 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>
                    </ul>
                    <!-- End Notification Dropdown Items -->
                </li> --}}
                <!-- End Notification Nav -->

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('img/logo.png') }}" alt="Profile" class="rounded-circle" />
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a>
                    <!-- End Profile Image Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->email }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? '' : 'collapsed' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Reservation -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.reservations.index') ? '' : 'collapsed' }}"
                    href="{{ route('admin.reservations.index') }}">
                    <i class="bi bi-credit-card-2-back"></i>
                    <span>Reservation</span>
                </a>
            </li>

            <!-- Gallery -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.galleries.index') ? '' : 'collapsed' }}"
                    href="{{ route('admin.galleries.index') }}">
                    <i class="bi bi-image"></i>
                    <span>Gallery</span>
                </a>
            </li>

            <!-- Photographer -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.photographers.index') ? '' : 'collapsed' }}"
                    href="{{ route('admin.photographers.index') }}">
                    <i class="bi bi-person-gear"></i>
                    <span>Photographer</span>
                </a>
            </li>

            <!-- Users -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users.index') ? '' : 'collapsed' }}"
                    href="{{ route('admin.users.index') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Users</span>
                </a>
            </li>

            <!-- Heading -->
            <li class="nav-heading">Master Data</li>

            <!-- Studio -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.backgrounds.index') ? '' : 'collapsed' }}"
                    href="{{ route('admin.backgrounds.index') }}">
                    <i class="bi bi-images"></i>
                    <span>Background</span>
                </a>
            </li>

            <!-- Package -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.packages.index') ? '' : 'collapsed' }}"
                    href="{{ route('admin.packages.index') }}">
                    <i class="bi bi-plus-square"></i>
                    <span>Package</span>
                </a>
            </li>

            <!-- About Us -->
            {{-- <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.about-us.index') ? '' : 'collapsed' }}"
                    href="{{ route('admin.about-us.index') }}">
                    <i class="bi bi-info-circle"></i>
                    <span>About Us</span>
                </a>
            </li> --}}

            {{-- <!-- Heading -->
            <li class="nav-heading">Studio</li>

            <!-- Selfphoto / Photobox -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-camera"></i>
                    <span>Selfphoto / Photobox</span>
                </a>
            </li>

            <!-- Weeding -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-camera"></i>
                    <span>Weeding Package</span>
                </a>
            </li>

            <!-- Marriage Proposal / Aqiqah -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="">
                    <i class="bi bi-camera"></i>
                    <span>Other Package</span>
                </a>
            </li> --}}
        </ul>
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>In Your Dream</span></strong>. All Rights
            Reserved
        </div>
        <div class="credits">
            Designed by
            <a href="#">In Your Dream</a>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('admin/js/main.js') }}"></script>
</body>

</html>
