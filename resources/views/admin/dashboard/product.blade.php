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
                        <div class="table-responsive">
                            <div class="d-flex justify-content-center">
                                <form class="form-inline" action="" role="form">
                                    <div class="col">
                                        <div class="mb-3">
                                            <strong style="color: black">Thống kê theo tháng: </strong>
                                            <input type="month" name="month" id="findDate"
                                                class="form-control style-border">
                                            <input name="namePrd" id="" class="form-control style-border"
                                                placeholder="Tìm kiếm sách">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ri-search-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table class="table table-striped table-bordered table-db" style="width:100%">
                                <thead>
                                    <tr style="text-align:center">
                                        <th width="10%">ID Sách</th>
                                        <th width="20%">Ảnh</th>
                                        <th width="35%">Tên sách</th>
                                        <th width="14%">Số lượng đặt</th>
                                        <th width="20%">Doanh thu dự kiến (VNĐ)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach ($incomes as $income)
                                        <tr>
                                            <td style="text-align:center">{{ $income->id }}</td>
                                            <td style="text-align:center"><img Src="{{ $income->imgPrd }}" width="150px">
                                            </td>
                                            <td>{{ $income->namePrd }}</td>
                                            <td style="text-align:center">{{ $income->qtyBuy }}</td>
                                            <td style="text-align:center; color: #0d9d87; font-weight: bold">
                                                {{ number_format($income->total, 0, '', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center">{!! $incomes->appends(request()->all())->links() !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
