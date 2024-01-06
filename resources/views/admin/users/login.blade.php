<!doctype html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body>
    <section class="sign-in-page">
        <div class="container p-0">
            <div class="row no-gutters height-self-center">
                <div class="col-sm-12 align-self-center page-content rounded">
                    <div class="row m-0">
                        <div class="col-sm-12 sign-in-page-data">
                            <div class="sign-in-from rounded bg__form">
                                <h3 class="mb-0 text-center">Login</h3>

                                @include('admin.alert')
                                <form class="mt-4 form-text" method="POST" action="/users/login/handle_login">
                                    <div class="form-group">
                                        <label for="mail">Email</label>
                                        <input type="email" class="form-control mb-0" id="mail" name="email"
                                            placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="pass">Password</label>
                                        <a href="#" class="float-right text-dark">Forgot password?</a>
                                        <input type="password" class="form-control mb-0" id="pass" name="password"
                                            placeholder="Password">
                                    </div>
                                    <div class="d-inline-block w-100">
                                        <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                                            <label class="custom-control-label" for="remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="sign-info text-center">
                                        <button type="submit" class="btn d-block w-100 mb-2 btn_submit">Sign
                                            in</button>
                                        <span class="text-dark dark-color d-inline-block line-height-2">Don't have an
                                            account? <a href="/users/sign-up" class="text-blue">Sign up</a></span>
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
    <!-- Sign in END -->

    @include('admin.footer');
</body>

</html>