<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="/" class="header-logo">
            <img src="/assets/admin/images/logo.png" class="img-fluid rounded-normal" alt="">
            <div class="logo-title">
                <span class="text-primary text-uppercase">BookStoreVN</span>
            </div>
        </a>
        <div class="iq-menu-bt-sidebar">
            <div class="iq-menu-bt align-self-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="{{ $activeDash }}">
                    <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false">
                        <span class="ripple rippleEffect"></span>
                        <i class="ri-bar-chart-2-fill"></i>
                        <span>Thống kê</span>
                        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                    <ul id="dashboard" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li>
                            <a href="/admin/dashboard"><i class="ri-money-dollar-circle-line"></i>Doanh Thu Dự Kiến</a>
                        </li>
                        <li>
                            <a href="/admin/dashboard/number-product"><i class="ri-function-line"></i>Số lượt đặt Sách</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $activeUser }}">
                    <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false">
                        <span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i>
                        <span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                        <li><a href="/admin/users/add-user"><i class="las la-user-plus"></i>Thêm User</a></li>
                        <li><a href="/admin/users/list-user"><i class="las la-th-list"></i>Danh sách User</a></li>
                    </ul>
                </li>
                <li class="{{ $activeCgr }}">
                    <a href="#category" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false">
                        <span class="ripple rippleEffect"></span><i class="ri-function-line iq-arrow-left"></i>
                        <span>Danh Mục</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                    <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="/admin/menus/add-category"><i class="las la-plus-circle"></i>Thêm danh mục</a></li>
                        <li><a href="/admin/menus/list-category"><i class="las la-th-list"></i>Danh sách danh mục</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ $activePrd }}">
                    <a href="#products" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false">
                        <span class="ripple rippleEffect"></span><i class="las la-book iq-arrow-left"></i>
                        <span>Sách</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                    <ul id="products" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="/admin/products/add-product"><i class="las la-plus-circle"></i>Thêm sách</a></li>
                        <li><a href="/admin/products/list-product"><i class="las la-th-list"></i>Tất cả sách</a></li>
                    </ul>
                </li>
                <li class="{{ $activeOrder }}">
                    <a href="/admin/order/list-order" class="iq-waves-effect" aria-expanded="false">
                        <span class="ripple rippleEffect"></span>
                        <i class="ri-shopping-cart-2-line"></i>
                        <span>Danh sách đơn hàng</span>
                        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
