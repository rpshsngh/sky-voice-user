<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>

    @include('layout.style')

    @yield('individual_style')


</head>

<body>

    <div class="container-scroller">

        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container">
                    <div class="text-start navbar-brand-wrapper d-flex align-items-center justify-content-between">
                        <a class="navbar-brand brand-logo" href="index.html"><img
                                src={{ asset('assets/images/logo-white1.png' )}} alt="logo" /></a>
                        <a class="navbar-brand brand-logo-mini" href="index.html"><img
                                src={{ asset('assets/images/logo-white1.png' )}} alt="logo" /></a>
                    </div>
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                        <ul class="navbar-nav ms-lg-3">
                            <li class="nav-item  dropdown d-none align-items-center d-lg-flex d-none">
                                <a class="btn btn-outline-secondary btn-fw" href="#" data-bs-toggle="dropdown"
                                    id="pagesDropdown">
                                    <span class="nav-profile-name">00888-999-234</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown align-items-center d-lg-flex d-none">
                                <a class="btn btn-outline-secondary btn-fw" href="#" data-bs-toggle="dropdown"
                                    id="appDropdown">
                                    <span class="nav-profile-name">remaining days </span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-search d-none d-lg-flex">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="search">
                                            <i class="mdi mdi-magnify"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Type to search..."
                                        aria-label="search" aria-describedby="search">
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                                    id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                                    <i class="mdi mdi-bell-outline mx-0"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="notificationDropdown">
                                    <p class="mb-0 fw-normal float-start dropdown-header">Notifications</p>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                <i class="mdi mdi-information mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject fw-normal">Application Error</h6>
                                            <p class="fw-light small-text mb-0 text-muted">
                                                Just now
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-warning">
                                                <i class="mdi mdi-weather-sunny mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject fw-normal">Settings</h6>
                                            <p class="fw-light small-text mb-0 text-muted">
                                                Private message
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-info">
                                                <i class="mdi mdi-account-box mx-0"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject fw-normal">New user registration</h6>
                                            <p class="fw-light small-text mb-0 text-muted">
                                                2 days ago
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"
                                    id="messageDropdown" href="#" data-bs-toggle="dropdown">
                                    <i class="mdi mdi-email-outline mx-0"></i>
                                    <p class="notification-ripple notification-ripple-bg">
                                        <span class="ripple notification-ripple-bg"></span>
                                        <span class="ripple notification-ripple-bg"></span>
                                        <span class="ripple notification-ripple-bg"></span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="messageDropdown">
                                    <p class="mb-0 fw-normal float-start dropdown-header">Messages</p>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="" alt="image"
                                                class="profile-pic">
                                        </div>
                                        <div class="preview-item-content flex-grow">
                                            <h6 class="preview-subject ellipsis fw-normal">David Grey
                                            </h6>
                                            <p class="fw-light small-text text-muted mb-0">
                                                The meeting is cancelled
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="" alt="image"
                                                class="profile-pic">
                                        </div>
                                        <div class="preview-item-content flex-grow">
                                            <h6 class="preview-subject ellipsis fw-normal">Tim Cook
                                            </h6>
                                            <p class="fw-light small-text text-muted mb-0">
                                                New product launch
                                            </p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <img src="" alt="image"
                                                class="profile-pic">
                                        </div>
                                        <div class="preview-item-content flex-grow">
                                            <h6 class="preview-subject ellipsis fw-normal"> Johnson
                                            </h6>
                                            <p class="fw-light small-text text-muted mb-0">
                                                Upcoming board meeting
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item nav-user-icon">
                                <a class="nav-link" href="#">
                                    <img src="{{$profile_pic}}" alt="profile" />
                                </a>
                            </li>
                            <!-- <li class="nav-item nav-settings d-none d-lg-flex">
                                <a class="nav-link" href="#">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                </a>
                            </li> -->
                            <li class="nav-item dropdown">
                                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"
                                    id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                                    aria-labelledby="notificationDropdown">

                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                <i class="icon-login"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject fw-normal">Login</h6>

                                        </div>
                                    </a>
                                    <a class="dropdown-item preview-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-warning">
                                                <i class="icon-logout"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content">
                                            <h6 class="preview-subject fw-normal">Logout</h6>
                                        </div>
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                            data-bs-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <i class="mdi mdi-shield-check menu-icon"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item mega-menu">
                            <a href="user-managment.html" class="nav-link">
                                <i class="mdi mdi-account-circle menu-icon"></i>
                                <span class="menu-title">User Management</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="contacts.html" class="nav-link">
                                <i class="mdi mdi-comment-account menu-icon"></i>
                                <span class="menu-title">Contacts</span>
                            </a>

                        </li>
                        <li class="nav-item mega-menu">
                            <a href="system-records.html" class="nav-link">
                                <i class="mdi mdi-view-quilt menu-icon"></i>
                                <span class="menu-title">System Records</span>
                            </a>

                        </li>
                        <li class="nav-item mega-menu">
                            <a href="call-routing.html" class="nav-link">
                                <i class="mdi mdi-phone-voip menu-icon"></i>
                                <span class="menu-title">Call Routing</span>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="transactions.html" class="nav-link">
                                <i class="mdi mdi-rotate-left-variant menu-icon"></i>
                                <span class="menu-title">Transactions</span>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-file-document menu-icon"></i>
                                <span class="menu-title">Documentation</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- page title here  -->

                            <div class="page-header-tab mt-xl-4" id="pageHeader">
                                <div class="col-12 ps-0 pe-0">
                                    <div class="row ">
                                        <div class="col-12 col-sm-6 mb-xs-4  pt-2 pb-2 mb-xl-0">
                                            <ul class="nav nav-tabs tab-transparent" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" id="overview-tab" data-bs-toggle="tab"
                                                        href="#" role="tab" aria-controls="overview"
                                                        aria-selected="true">Home</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="users-tab" data-bs-toggle="tab"
                                                        href="#" role="tab" aria-controls="users"
                                                        aria-selected="false">{{$title}}</a>
                                                </li>
                                                <!-- <li class="nav-item">
                                                <a class="nav-link" id="more-tab" data-bs-toggle="tab" href="#" role="tab"
                                                    aria-controls="more" aria-selected="false">More</a>
                                                </li> -->
                                            </ul>
                                        </div>
                                        <div
                                            class="col-12 col-sm-6 mb-xs-4 mb-xl-0 pt-2 pb-2 text-md-right d-none d-md-block">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn d-flex align-items-center">
                                                    <i class="mdi mdi-map-marker-radius me-1"></i>
                                                    <span class="text-start font-weight-medium" id="last_login_ip_address">
                                                        {{$last_login_ip_address}}
                                                    </span>
                                                </button>

                                                <button class="btn d-flex align-items-center pe-0">
                                                    <i class="mdi mdi-timetable  me-1"></i>
                                                    <span class="text-start font-weight-medium" id="last_login_time">
                                                        {{$last_login_time}}
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- page title end here  -->

                            <!--  main-content  -->

                            @yield('main_content')
                            
                            <!--  main-content end here -->

                        </div>
                    </div>
                </div>



                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <div class="footer-wrapper">
                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-center text-sm-left d-block d-sm-inline-block">Copyright &copy; <span
                                    id="currentYear"></span> All rights reserved. </span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Designed by: <a
                                    href="#" target="_blank">Skyvoice</a>. </span>
                        </div>
                    </footer>
                </div>


                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    @include('layout.script')

    @yield('individual_script')

</body>

</html>
