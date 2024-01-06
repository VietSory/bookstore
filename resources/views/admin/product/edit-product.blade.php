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
                                <label class="text-lb">Tên sách:</label>
                                <input type="text" class="form-control" name="name" 
                                    value="{{ $product->name }}" placeholder="Nhập tên sách">
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Danh mục sách:</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_category">
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}" {{ $product->id_category == $menu->id ? 'selected' : ''}}>
                                            {{ $menu->name_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Tác giả sách:</label>
                                <input type="text" class="form-control" name="author" 
                                    value="{{ $product->author }}" placeholder="Nhập tên tác giả">
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Nhà xuất bản:</label>
                                <input type="text" class="form-control" name="nxb" 
                                    value="{{ $product->nxb }}" placeholder="Nhập tên Nhà xuất bản">
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Hình ảnh:</label>
                                <div>
                                    <input type="file" id="upload">
                                    <div id="showImg" style="margin-top: 10px">
                                        <a href="{{ $product->file }}" target="_blank">
                                            <img src="{{ $product->file }}" width="200px">
                                        </a>
                                    </div>
                                    <input type="hidden" name="file" id="file" value="{{ $product->file }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Giá sách:</label>
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                            </div>
                            <div class="form-group">
                                <label class="text-lb">Nội dung:</label>
                                <textarea class="form-control" id="editor" name="description">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="d-block text-lb">Trạng thái:</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="1" id="show" name="status"
                                        {{ $product->status == 1 ? 'checked=""' : ''}}>
                                    <label class="custom-control-label" for="show"> Còn </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" value="0" id="hide" name="status"
                                        {{ $product->status == 0 ? 'checked=""' : ''}}>
                                    <label class="custom-control-label" for="hide"> Hết </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="font-weight: bold">Cập nhật</button>

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
