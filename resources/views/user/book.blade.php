@extends('user.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="iq-card-transparent mb-0">
                    <div class="d-block text-center">
                        <div class="w-100 iq-search-filter">
                            <ul class="list-inline p-0 m-0 row justify-content-center search-menu-options">
                                <li class="search-menu-opt">
                                    <form action="" class="searchbox" role="form">
                                        <div class="iq-search-bar search-book d-flex align-items-center">
                                            <input name="key" class="text search-input" style="font-size: 17px; border: 1px solid lightgray" placeholder="Tìm kiếm sách...">
                                            <button type="submit" class="btn btn-primary search-data ml-2"><i class="ri-search-line"></i></button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height search-bookcontent">
                                        <div class="iq-card-body p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="col-6 p-0 position-relative image-overlap-shadow">
                                                    <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                                            src="{{ $product->file }}" title="{{ $product->name }}"></a>
                                                    <div class="view-book">
                                                        <a href="/san-pham/id-{{ $product->id }}/{{ $product->url }}"
                                                            class="btn btn-sm btn-white">Chi tiết</a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-2">
                                                        <h6 class="mb-1"><a href="/san-pham/id-{{ $product->id }}/{{ $product->url }}" title="{{ $product->name }}">{{ $product->name }}</a></h6>
                                                        <p class="font-size-13 line-height mb-1">{{ $product->author }}</p>
                                                        <div class="d-block">
                                                            <span class="font-size-13 text-warning">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="price d-flex align-items-center">
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
                <div style="text-align: center">{!! $products->links() !!}</div>
            </div>

            <div class="col-lg-12" style="margin-top: 50px">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div
                        class="iq-card-header d-flex justify-content-between align-items-center position-relative mb-0 similar-detail">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Sách mới</h4>
                        </div>
                    </div>
                    <div class="iq-card-body similar-contens">
                        <ul id="similar-slider" class="list-inline p-0 mb-0 row">
                            @foreach ($newbooks as $new)
                                <li class="col-md-3">
                                    <div class="d-flex align-items-center">
                                        <div class="col-5 p-0 position-relative image-overlap-shadow">
                                            <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                                    src="{{ $new->file }}" alt=""></a>
                                            <div class="view-book">
                                                <a href="/san-pham/id-{{ $new->id }}/{{ $new->url }}"
                                                    class="btn btn-sm btn-white">Chi tiết</a>
                                            </div>
                                        </div>
                                        <div class="col-7">
                                            <div class="mb-2">
                                                <h6 class="mb-1"><a href="/san-pham/id-{{ $new->id }}/{{ $new->url }}"
                                                    title="{{ $new->name }}">{{ $new->name }}</a></h6>
                                                <p class="font-size-13 line-height mb-1">{{ $new->author }}</p>
                                                <div class="d-block">
                                                    <span class="font-size-13 text-warning">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="price d-flex align-items-center">
                                                <h6><b>{!! \App\Helpers\Helper::price($new->price) !!}</b></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
