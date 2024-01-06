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
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="/admin/products/add-product" class="btn btn-primary">Thêm sách</a>
                        </div>
                    </div>
                    @include('admin.alert')
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-center">
                                <form class="form-inline" action="" role="form">
                                    <div class="col">
                                        <div class="mb-3">
                                            <input name="key" id="" class="form-control style-border" placeholder="Tìm kiếm sản phẩm">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ri-search-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 2%; text-align:center">STT</th>
                                        <th style="width: 12%; text-align:center">Hình ảnh</th>
                                        <th style="width: 11%;">Tên sách</th>
                                        <th style="width: 11%;">Thể loại sách</th>
                                        <th style="width: 11%;">Tác giả sách</th>
                                        <th style="width: 20%;">Mô tả sách</th>
                                        <th style="width: 7%; text-align:center">Giá</th>
                                        <th style="width: 12%; text-align:center">Nhà xuất bản</th>
                                        <th style="width: 7%; text-align:center">Trạng thái</th>
                                        <th style="width: 7%; text-align:center">Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {!! \App\Helpers\Helper::showListPrd($products) !!}
                                    <script>
                                        var textContainers = document.querySelectorAll(".shortenedText");

                                        textContainers.forEach(function(textContainer) {
                                            var fullText = textContainer.textContent;
                                            var maxLength = 70;
                                            var shortenedText = fullText.length > maxLength ? fullText.substring(0, maxLength) + "..." : fullText;

                                            textContainer.innerHTML = shortenedText;
                                        });
                                    </script>
                                </tbody>
                            </table>
                        </div>
                        {{-- Tạo liên kết phân trang --}}
                        <div style="text-align: center">{!! $products->appends(request()->all())->links() !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
