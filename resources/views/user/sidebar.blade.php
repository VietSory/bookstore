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
                <li class="{{ $activeHome }}">
                    <a href="/" class="iq-waves-effect" aria-expanded="false">
                        <span class="ripple rippleEffect"></span>
                        <i class="las la-home iq-arrow-left"></i>
                        <span>Trang chủ</span>
                        <i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                </li>
                <li class="{{ $activeCgr }}">
                    <a href="#category" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false">
                        <span class="ripple rippleEffect"></span><i class="lab la-elementor iq-arrow-left"></i>
                        <span>Danh Mục Sách</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                    <ul id="category" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        {!! \App\Helpers\Helper::setCgr($categories) !!}
                    </ul>
                </li>
                <li class="{{ $activePrd }}">
                    <a href="/san-pham/tat-ca-sach" class="iq-waves-effect" aria-expanded="false">
                        <span class="ripple rippleEffect"></span><i class="ri-book-line iq-arrow-left"></i>
                        <span>Tất cả sách</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
