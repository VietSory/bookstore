@extends('admin.main')

@section('content')
    <div class="container-fluid" style="margin-top: -20px">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">
                            Thông tin <br>
                            <span class="text-cgr">Danh mục sách: {{ $product->category->name_category }}</span>
                        </h4>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="/admin/products/edit-product/{{ $product->id }}" class="btn btn-primary">
                                Sửa thông tin
                            </a>
                        </div>
                    </div>
                    <div class="iq-card-body pb-0">
                        <div class="description-contens align-items-top row">
                            <div class="col-md-6">
                                <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                        <div class="row align-items-center">
                                            <div class="col-1"></div>
                                            <div class="col-9">
                                                <a href="javascript:void(0);">
                                                    <img src="{{ $product->file }}" class="img-fluid w-100 rounded"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height">
                                    <div class="iq-card-body p-0">
                                        <h3 class="mb-3">{{ $product->name }}</h3>
                                        <div class="text-dark mb-2">Nhà xuất bản:
                                            <span class="nxb">{{ $product->nxb }}</span>
                                        </div>
                                        <div class="mb-4 text-dark">Tác giả:
                                            <span class="text-dark" style="font-weight: bold">{{ $product->author }}</span>
                                        </div>
                                        <div class="mb-3 d-block">
                                            <span class="font-size-20 text-warning">
                                                <i class="fa fa-star mr-1"></i>
                                                <i class="fa fa-star mr-1"></i>
                                                <i class="fa fa-star mr-1"></i>
                                                <i class="fa fa-star mr-1"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                        <div class="price d-flex align-items-center font-weight-500 mb-2">
                                            <span class="text-red">
                                                {!! \App\Helpers\Helper::price($product->price) !!}
                                            </span>
                                        </div>
                                        <hr style="border: none; border-top: 1px solid lightgray">

                                        <div class="text-dark mb-4 pb-4 d-block product-description">
                                            <b>Mô tả sản phẩm: </b><br>
                                            {!! $product->description !!}
                                            <button class="read-more-btn">Xem thêm</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('.product-description').each(function() {
                                        var $description = $(this);
                                        var content = $description.html();

                                        if (content.length > 700) {
                                            var shortCont = content.substr(0, 700) + '...';
                                            $description.html(shortCont);

                                            var $readMoreBtn = $('<button class="read-more-btn">Xem thêm</button>');
                                            $description.append($readMoreBtn);

                                            $readMoreBtn.on('click', function() {
                                                $description.html(content);
                                                $('.read-more-btn').css('display', 'none');
                                            });
                                        } else {
                                            $readMoreBtn.css('display', 'none');
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Bình luận</h4>
                    </div>
                    <div class="iq-card-body pb-0">
                        <div class="description-contens align-items-top row">
                            <div class="col-md-12">
                                @foreach ($comments as $cmt)
                                    @php
                                        $createdDate = \Carbon\Carbon::parse($cmt->created_at)->setTimezone('Asia/Ho_Chi_Minh');
                                        $formattedDate = $createdDate->format('d-m-Y H:i');
                                    @endphp
                                    <div class="all__cmt ">
                                        <label style="font-weight: bold">{{ $cmt->user->name }}</label>
                                        <span style="font-size: 15px; color: #7F8487">{{ $formattedDate }}</span>
                                        <p>{{ $cmt->star }} <i class="ri-star-fill"></i></p>
                                        <p style="color: black">{{ $cmt->content }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div style="text-align: center; margin-bottom: 20px">{!! $comments->appends(request()->all())->links() !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
