@extends('admin.main')

@section('content')
    <div class="container-fluid" style="margin-top: -20px">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                    </div>
                    @include('admin.alert')
                    <div class="iq-card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="text-lb">Họ và tên:</label>
                                <input type="text" class="form-control" name="fname" value="{{ $user->fname }}">
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Tên người dùng:</label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Số điện thoại:</label>
                                <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Mật khẩu:</label>
                                <input type="text" class="form-control" name="password" value="" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label class="d-block text-lb">Vai trò:</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="1" id="admin" name="admin"
                                        {{ $user->admin == 1 ? 'checked=""' : ''}}>
                                    <label class="custom-control-label" for="admin"> Admin </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="0" id="customer" name="admin"
                                        {{ $user->admin == 0 ? 'checked=""' : ''}}>
                                    <label class="custom-control-label" for="customer"> Khách hàng </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="font-weight: bold">Cập nhật</button>
                            <button type="reset" class="btn btn-danger new">Trở lại</button>

                            <!-- Tạo token -->
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>
<script src="/assets/admin/js/script.js"></script>
@endsection
