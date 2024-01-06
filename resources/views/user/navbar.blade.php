<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between">
                    <a href="/" class="header-logo">
                        <img src="/assets/admin/images/logo.png" class="img-fluid rounded-normal" alt="">
                        <div class="logo-title">
                            <span class="text-primary text-uppercase">img01</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="navbar-breadcrumb">
                <h5 class="mb-0">{{ $name_page }}</h5>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-list">
                    <li class="nav-item nav-icon search-content">
                        <a href="#" class="search-toggle iq-waves-effect text-gray rounded">
                            <i class="ri-search-line"></i>
                        </a>
                        <form action="#" class="search-box p-0">
                            <input type="text" class="text search-input" placeholder="Type here to search...">
                            <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                        </form>
                    </li>
                    @if (Auth::check())
                        <!-- Cart -->
                        <li class="nav-item nav-icon">
                            <a href="/gio-hang" class="iq-waves-effect text-gray rounded">
                                <i class="ri-shopping-cart-2-line"></i>
                                <span
                                    class="badge badge-danger count-cart rounded-circle">{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</span>
                            </a>
                        </li>
                    @endif
                    <li class="line-height pt-3">
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                            <div class="caption">
                                @if (Auth::check())
                                    <p class="mb-0 text-primary">Tài Khoản</p>
                                    <h6 class="mb-1 line-height">{{ Auth::user()->name }}</h6>
                                @else
                                    <h6 class="mb-1 line-height" style="margin-top: -20px">
                                        <a href="/users/login">Đăng nhập</a>
                                    </h6>
                                @endif
                            </div>
                        </a>
                        @if (Auth::check())
                            <div class="iq-sub-dropdown iq-user-dropdown">
                                <div class="iq-card shadow-none m-0">
                                    <div class="iq-card-body p-0 ">
                                        <div class="bg-primary p-3">
                                            <h5 class="mb-0 text-white line-height">Xin Chào {{ Auth::user()->name }}
                                            </h5>
                                        </div>
                                        <a href="/my-profile/{{ Auth::user()->id }}"
                                            class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-file-user-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Tài khoản của tôi</h6>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="/{{ Auth::user()->id }}/don-hang"
                                            class="iq-sub-card iq-bg-primary-hover">
                                            <div class="media align-items-center">
                                                <div class="rounded iq-card-icon iq-bg-primary">
                                                    <i class="ri-account-box-line"></i>
                                                </div>
                                                <div class="media-body ml-3">
                                                    <h6 class="mb-0 ">Đơn hàng của tôi</h6>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="d-inline-block w-100 text-center p-3">
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="bg-primary iq-sign-btn">
                                                    Đăng xuất<i class="ri-login-box-line ml-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
