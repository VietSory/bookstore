<!doctype html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body>

    <!-- Sign in Start -->
    <section class="sign-in-page">
        <div class="container p-0">
            <div class="row no-gutters height-self-center">
                <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                        <div class="col-sm-12 sign-in-page-data">
                            <div class="sign-in-from bg__form rounded">
                                <h3 class="mb-0 text-center">Sign Up</h3>
                                @include('admin.alert')
                                <form class="mt-4 form-text" method="POST" action="/users/sign-up/handle_signup">
                                    <div class="form-group">
                                        <label for="fullname">Họ tên</label>
                                        <input type="text" class="form-control mb-0" id="fullname" name="fname"
                                            value="{{ old('fname') }}" placeholder="Nhập họ tên">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control mb-0" id="username" name="name"
                                            value="{{ old('name') }}" placeholder="Nhập username">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone-nb">Số điện thoại</label>
                                        <input type="number" class="form-control mb-0" id="phone-nb" name="phone"
                                            value="{{ old('phone') }}" placeholder="Nhập số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label for="mail">Email</label>
                                        <input type="email" class="form-control mb-0" id="mail" name="email"
                                            value="{{ old('email') }}" placeholder="Nhập email">
                                    </div>
                                    <div class="form-group">
                                        <label for="pass">Mật khẩu</label>
                                        <input type="text" class="form-control mb-0" id="pass" name="password"
                                            value="{{ old('password') }}" placeholder="Nhập mật khẩu">
                                    </div>
                                    <div class="sign-info text-center">
                                        <button type="submit" class="btn btn_submit d-block w-100 mb-2">Đăng ký</button>
                                        <span class="text-dark dark-color d-inline-block line-height-2">Đã có tài khoản?
                                            <a href="/users/login" class="text-blue">Đăng nhập</a>
                                        </span>
                                    </div>
                                    <div class="sign-info text-center">
                                        <a href="/" class="text-home">Về trang chủ</a>
                                    </div>

                                    <!-- Tạo ra token cho form -->
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sign up END -->

    @include('admin.footer');
</body>

</html>
