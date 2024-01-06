@extends('user.main')

@section('content')
    <div class="container-fluid" style="margin-top: -20px">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            @php
                                $createdDate = \Carbon\Carbon::parse($date)->setTimezone('Asia/Ho_Chi_Minh');
                                $date_format = $createdDate->format('H:i d/m/Y');
                            @endphp
                            <h4 class="card-title">
                                Thời gian đặt hàng: 
                                <strong style="color: lightseagreen">{{ $date_format }}</strong>
                            </h4>
                        </div>
                        <div class="iq-header-title">
                            
                        </div>
                    </div>
                    @include('admin.alert')
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="customer mt-2" style="color: black">
                                <ul>
                                    <li>Họ tên: <strong>{{ $customer->fname }}</strong></li>
                                    <li>Email: <strong>{{ $customer->email }}</strong></li>
                                    <li>Số điện thoại: <strong>0{{ $customer->phone }}</strong></li>
                                    <li>Địa chỉ giao hàng: <strong>{{ $customer->address }}</strong></li>
                                </ul>
                            </div>
                            <table class="table table-striped table-bordered text-align:center" style="width:100%">
                                <thead>
                                    <tr style="text-align:center">
                                        <th style="width: 10%;">STT</th>
                                        <th style="width: 25%;">Ảnh</th>
                                        <th style="width: 25%;">Tên sách</th>
                                        <th style="width: 15%;">Giá (1 quyển)</th>
                                        <th style="width: 10%;">Số lượng</th>
                                        <th style="width: 15%;">Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                        $total = 0; 
                                    @endphp

                                    @foreach ($carts as $cart)
                                        @php
                                            $price = $cart->price * $cart->qty;
                                            $total += $price;
                                        @endphp
                                        <tr>
                                            <td style="text-align:center">{{ $stt++ }}</td>
                                            <td style="text-align:center"><img src="{{ $cart->product->file }}" width="150px"></td>
                                            <td>{{ $cart->product->name }}</td>
                                            <td style="text-align:center">{{ number_format($cart->price, 0, '', '.') }}</td>
                                            <td style="text-align:center">{{ $cart->qty }}</td>
                                            <td style="text-align:center">{{ number_format($price, 0, '', '.') }}</td>
                                        </tr>
                                    @endforeach
                                    <tr style="background: #c5f3e9;" class="style-total-order">
                                        <td colspan="5">Tổng Tiền</td>
                                        <td style="text-align:center">{{ number_format($total, 0, '', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
