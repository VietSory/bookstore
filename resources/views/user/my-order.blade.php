@extends('user.main')

@section('content')
    <div class="container-fluid" style="margin-top: -20px">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-center">
                                <form class="form-inline" action="" role="form">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="findDate" class=""><b>Tìm kiếm</b></label>
                                            <input type="date" name="date" id="findDate"
                                                class="form-control style-border">
                                            <input name="keyInfor" id="findInfor" class="form-control style-border"
                                                placeholder="Tìm thông tin ...">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ri-search-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table class="table table-striped table-bordered text-align:center" style="width:100%">
                                <thead>
                                    <tr style="text-align:center">
                                        <th style="width: 5%;">STT</th>
                                        <th style="width: 20%;">Họ tên</th>
                                        <th style="width: 25%;">Email</th>
                                        <th style="width: 10%;">Số điện thoại</th>
                                        <th style="width: 15%">Tổng tiền</th>
                                        <th style="width: 20%;">Ngày đặt</th>
                                        <th style="width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp

                                    @foreach ($orders as $order)
                                        @php
                                            $createdDate = \Carbon\Carbon::parse($order->created_at)->setTimezone('Asia/Ho_Chi_Minh');
                                            $formattedDate = $createdDate->format('H:i d/m/Y');
                                        @endphp
                                        <tr>
                                            <td style="text-align:center">{{ $stt++ }}</td>
                                            <td>{{ $order->fname }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td style="text-align:center">0{{ $order->phone }}</td>
                                            <td style="text-align:center">
                                                {{ number_format($order->total_price, 0, '', '.') }}</td>
                                            <td style="text-align:center">{{ $formattedDate }}</td>
                                            <td style="text-align:center">
                                                <div class="flex align-items-center list-user-action">
                                                    <a class="bg-primary" data-toggle="tooltip" data-placement="top"
                                                        data-original-title="Xem"
                                                        href="/chi-tiet/{{ Auth::user()->id }}/{{ $order->created_at }}">
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center">{!! $orders->appends(request()->all())->links() !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
