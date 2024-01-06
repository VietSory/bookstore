<!doctype html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body>
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('admin.sidebar')
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
                <nav class="navbar navbar-expand-lg navbar-light p-0">
                    <div class="iq-menu-bt d-flex align-items-center">
                        <div class="wrapper-menu">
                            <div class="main-circle"><i class="las la-bars"></i></div>
                        </div>
                        <div class="iq-navbar-logo d-flex justify-content-between">
                            <a href="index.html" class="header-logo">
                                <img src="/assets/admin/images/logo.png" class="img-fluid rounded-normal"
                                    alt="">
                                <div class="logo-title">
                                    <span class="text-primary text-uppercase">NhasachTV</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="navbar-breadcrumb">
                        <h5 class="mb-0" style="margin-top: 5px">Admin</h5>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-list">
                            <li class="line-height">
                                <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                                    <div class="caption">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-primary iq-sign-btn" style="margin-top: -10px">
                                                Sign out<i class="ri-login-box-line ml-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- TOP Nav Bar END -->
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            @yield('content')
        </div>
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" style="text-align: right">
                    Copyright 2023 - <a href="#">BookStoreVN</a> - Bich & Viet
                </div>
            </div>
        </div>
    </footer>

    @include('admin.footer')
</body>

</html>
