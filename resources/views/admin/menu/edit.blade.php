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
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" class="form-control" value="{{ $menu->name_category }}" name="name_category">
                            </div>
                            <div class="form-group">
                                <label class="d-block">Trạng thái:</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="1" id="show" name="status" 
                                    {{ $menu->status == 1 ? 'checked=""' : ''}}>
                                    <label class="custom-control-label" for="show"> Hiện </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="0" id="hide" name="status"
                                    {{ $menu->status == 0 ? 'checked=""' : ''}}>
                                    <label class="custom-control-label" for="hide"> Ẩn </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="font-weight: bold">Cập nhật danh mục</button>
                            <button type="reset" class="btn btn-danger" style="font-weight: bold">Trở lại</button>

                            <!-- Tạo token -->
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
