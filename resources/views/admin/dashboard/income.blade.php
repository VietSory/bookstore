<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/user/img/logo.png">
    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/admin/images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/admin/css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="/assets/admin/css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/admin/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/assets/admin/css/responsive.css">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                    <span class="text-primary text-uppercase">BookStoreVN</span>
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
                                            <button type="submit" class="bg-primary iq-sign-btn"
                                                style="margin-top: -10px">
                                                Đăng xuất <i class="ri-login-box-line ml-2"></i>
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
            <div class="container-fluid" style="margin-top: -20px">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title">{{ $title }}</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <span class="lb__year">Nhập năm : </span><input type="number" id="income_year"
                                    class="input__year" name="year">
                                <button type="button" class="btn btn-primary" style="font-weight: bold;"
                                    onclick="getInfo()">Thống kê
                                </button>
                            </div>
                            <div id="chart" style="font-weight: bold;"></div>
                        </div>
                    </div>
                </div>
                @csrf
            </div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/assets/admin/js/jquery.min.js"></script>
    <script src="/assets/admin/js/popper.min.js"></script>
    <script src="/assets/admin/js/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="/assets/admin/js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="/assets/admin/js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="/assets/admin/js/waypoints.min.js"></script>
    <script src="/assets/admin/js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="/assets/admin/js/wow.min.js"></script>
    <!-- lottie JavaScript -->
    <script src="/assets/admin/js/lottie.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="/assets/admin/js/apexcharts.js"></script>
    <!-- Slick JavaScript -->
    <script src="/assets/admin/js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="/assets/admin/js/select2.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="/assets/admin/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="/assets/admin/js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="/assets/admin/js/smooth-scrollbar.js"></script>
    <!-- Style Customizer -->
    <script src="/assets/admin/js/style-customizer.js"></script>
    <!-- Custom JavaScript -->
    <script src="/assets/admin/js/custom-dash.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="/assets/admin/js/dashboardIncome.js"></script>
</body>

</html>
