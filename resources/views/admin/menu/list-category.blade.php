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
                            <a href="/admin/menus/add-category" class="btn btn-primary">Thêm danh mục mới</a>
                        </div>
                    </div>
                    @include('admin.alert')
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-center">
                                <form class="form-inline" action="" role="form">
                                    <div class="col">
                                        <div class="mb-3">
                                            <input name="key" id="" class="form-control style-border" placeholder="Tìm kiếm danh mục">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="ri-search-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr style="text-align:center">
                                        <th width="5%">STT</th>
                                        <th width="30%">Tên danh mục</th>
                                        <th width="15%">Số sách</th>
                                        <th width="20%">URL</th>
                                        <th width="15%">Trạng thái</th>
                                        <th width="15%">Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- dấu {!!  !!} dùng để biên dịch ra html --}}
                                    {!! \App\Helpers\Helper::showListCgr($lists) !!}
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center">{!! $lists->appends(request()->all())->links() !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
