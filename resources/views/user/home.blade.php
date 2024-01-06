@extends('user.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card-transparent iq-card-block iq-card-stretch iq-card-height rounded">
                    <div class="newrealease-contens">
                        <ul id="newrealease-slider" class="list-inline p-0 m-0 d-flex align-items-center">
                            @foreach ($sliders as $slider)
                                <li class="item">
                                    <a href="javascript:void(0);">
                                        <img src="{{ $slider->file }}" class="img-fluid w-100 rounded" alt="">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Gợi ý cho bạn</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="/san-pham/tat-ca-sach" class="btn btn-sm btn-primary view-more">Xem Thêm</a>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height browse-bookcontent">
                                        <div class="iq-card-body p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="col-6 p-0 position-relative image-overlap-shadow">
                                                    <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                                            src="{{ $product->file }}" alt="{{ $product->name }}"
                                                            title="{{ $product->name }}"></a>
                                                    <div class="view-book">
                                                        <a href="/san-pham/id-{{ $product->id }}/{{ $product->url }}"
                                                            class="btn btn-sm btn-white">
                                                            Chi tiết
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-2">
                                                        <h6 class="mb-1"><a
                                                                href="/san-pham/id-{{ $product->id }}/{{ $product->url }}"
                                                                title="{{ $product->name }}">{{ $product->name }}</a></h6>
                                                        <p class="font-size-13 line-height mb-1">{{ $product->author }}</p>
                                                        <div class="d-block line-height">
                                                            <span class="font-size-11 text-warning">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="price d-flex align-items-center" style="margin-top: 20px">
                                                        <h6><b>{!! \App\Helpers\Helper::price($product->price) !!}</b></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
