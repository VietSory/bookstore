@extends('user.main')

@section('content')
    <div class="container-fluid checkout-content">
        <form method="POST">
            <div class="row">

                @if (count($products) != 0)
                    <div id="cart" class="card-block show p-0 col-12">
                        <div class="row align-item-center">
                            <div class="col-lg-8">
                                <div class="iq-card">
                                    <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                                        <div class="iq-header-title">
                                            <h4 class="card-title">Giỏ hàng</h4>
                                        </div>
                                        @include('admin.alert')
                                        <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <a href="/san-pham/tat-ca-sach" id="buy">Tiếp tục mua</a>
                                            <input type="submit" class="btn btn-primary" formaction="/cap-nhat-gio-hang" 
                                                value="Cập nhật giỏ hàng">
                                            @csrf
                                        </div>
                                    </div>
                                    <div class="iq-card-body">
                                        @php $totalAll = 0; @endphp
                                        <ul class="list-inline p-0 m-0">
                                            @foreach ($products as $product)
                                                @php
                                                    $price = $product->price;
                                                    $totalOnePrd = $price * $carts[$product->id];
                                                    $totalAll += $totalOnePrd;
                                                @endphp

                                                <li class="checkout-product">
                                                    <div class="row align-items-center">
                                                        <div class="col-sm-2">
                                                            <span class="checkout-product-img">
                                                                <a href="javascript:void();"><img class="img-fluid rounded"
                                                                        src="{{ $product->file }}" alt=""></a>
                                                            </span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="checkout-product-details">
                                                                <h5>{{ $product->name }}</h5>
                                                                <p class="text-success"> </p>
                                                                <div class="price">
                                                                    <h6>{{ number_format($price, 0, '', '.') }} ₫</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="row">
                                                                <div class="col-sm-10">
                                                                    <div class="row align-items-center mt-2">
                                                                        <div class="col-sm-7 col-md-6">
                                                                            <button type="button" class="fa fa-minus qty-btn" id="btn-minus"></button>
                                                                            <input type="text" id="quantity" name="qty[{{ $product->id }}]"
                                                                                value="{{ $carts[$product->id] }}">
                                                                            <button type="button" class="fa fa-plus qty-btn" id="btn-plus"></button>
                                                                        </div>
                                                                        <div class="col-sm-5 col-md-6">
                                                                            <span
                                                                                class="product-price">{{ number_format($totalOnePrd, 0, '', '.') }}
                                                                                ₫</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    <a href="/xoa-sp/{{$product->id }}"
                                                                        class="text-dark font-size-20"><i
                                                                            class="ri-delete-bin-7-fill"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="iq-card">
                                    <div class="iq-card-body">
                                        <h5>Thông tin khách hàng</h5>
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <div class="d-flex justify-content-between mt-2">
                                            <span>Họ tên</span>
                                            <input type="text" class="style-form-input" name="name" id="name" value="{{ Auth::user()->fname }}" required>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span>Số điện thoại</span>
                                            <input type="tel" class="style-form-input" name="phone" id="phone" value="0{{ Auth::user()->phone }}" required>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span>Email</span>
                                            <input type="text" class="style-form-input" name="email" id="email" value="{{ Auth::user()->email }}" required>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span>Địa chỉ</span>
                                            <input type="text" class="style-form-input" name="address" id="address" placeholder="Nhập địa chỉ giao hàng">
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-dark"><strong>Tổng</strong></span>
                                            <span class="text-dark"><strong>{{ number_format($totalAll, 0, '', '.') }}
                                                    đ</strong></span>
                                        </div>
                                        <button type="submit" class="btn btn-primary d-block mt-3">Đặt hàng</button>
                                    </div>
                                </div>
                                <div class="iq-card ">
                                    <div class="card-body iq-card-body p-0 iq-checkout-policy">
                                        <ul class="p-0 m-0">
                                            <li class="d-flex align-items-center">
                                                <div class="iq-checkout-icon">
                                                    <i class="ri-checkbox-line"></i>
                                                </div>
                                                <h6>Chính sách bảo mật (Thanh toán an toàn và bảo mật.)</h6>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <div class="iq-checkout-icon">
                                                    <i class="ri-truck-line"></i>
                                                </div>
                                                <h6>Chính sách giao hàng (Giao hàng tận nhà.)</h6>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <div class="iq-checkout-icon">
                                                    <i class="ri-arrow-go-back-line"></i>
                                                </div>
                                                <h6>Chính sách hoàn trả</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">
                        <div class="iq-card d-flex justify-content-center align-items-center">
                            <div class="iq-card-header d-flex justify-content-between iq-border-bottom mb-0">
                                <div class="iq-header-title">
                                    <h4 class="card-title" style="color: red">Giỏ hàng trống</h4>
                                    <div class="card-title">
                                        @include('admin.alert')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </form>
    </div>
@endsection
