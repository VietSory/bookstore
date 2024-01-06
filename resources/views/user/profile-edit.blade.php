@extends('user.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-body p-0">
                        <div class="iq-edit-list">
                            <ul class="iq-edit-profile d-flex nav nav-pills">
                                <li class="col-md-6 p-0">
                                    <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                        Thông tin cá nhân
                                    </a>
                                </li>
                                <li class="col-md-6 p-0">
                                    <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                        Đổi mật khẩu
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-edit-list-data">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Thông tin cá nhân</h4>
                                    </div>
                                </div>
                                @include('admin.alert')
                                <div class="iq-card-body">
                                    <form method="POST">
                                        <div class=" row align-items-center">
                                            <div class="form-group col-sm-6">
                                                <label for="fname">Họ tên:</label>
                                                <input type="text" class="form-control border-input" id="fname"
                                                    name="fname" value="{{ $user->fname }}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="uname">Tên tài khoản:</label>
                                                <input type="text" class="form-control border-input" id="uname"
                                                    name="name" value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="mail">Email:</label>
                                                <input type="email" class="form-control border-input" id="mail"
                                                    name="email" value="{{ $user->email }}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="phone">Số điện thoại:</label>
                                                <input type="tel" class="form-control border-input" id="phone"
                                                    name="phone" value="{{ $user->phone }}">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Thay đổi</button>
                                        <button type="reset" class="btn btn-danger">Hủy bỏ</button>

                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                            <div class="iq-card">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Đổi mật khẩu</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <form action="/change-pass/{{ $user->id }}" method="POST">
                                        <div class="form-group">
                                            <label for="cpass">Mật khẩu hiện tại:</label>
                                            <input type="Password" class="form-control border-input" id="cpass"
                                                name="cpass">
                                        </div>
                                        <div class="form-group">
                                            <label for="npass">Mật khẩu mới:</label>
                                            <input type="Password" class="form-control border-input" id="npass"
                                                name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="vpass">Xác nhận lại mật khẩu:</label>
                                            <input type="Password" class="form-control border-input" id="vpass"
                                                name="vpass">
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Đổi mật khẩu</button>
                                        <button type="reset" class="btn btn-danger">Hủy bỏ</button>

                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
