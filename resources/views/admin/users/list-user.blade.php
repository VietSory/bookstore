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
                            <a href="/admin/users/add-user" class="btn btn-primary">Thêm người dùng mới</a>
                        </div>
                    </div>
                    @include('admin.alert')
                    <div class="iq-card-body">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-center">
                                <form class="form-inline" action="" role="form">
                                    <div class="col">
                                        <div class="mb-3">
                                            <input name="key" id="" class="form-control style-border" placeholder="Nhập tên người dùng">
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
                                        <th width="2%">ID</th>
                                        <th width="10%">Tên người dùng</th>
                                        <th width="20%">Email</th>
                                        <th width="20%">Mật khẩu</th>
                                        <th width="15%">Họ và tên</th>
                                        <th width="8%">Số điện thoại</th>
                                        <th width="10%">Ngày tạo</th>
                                        <th width="5%">Vai trò</th>
                                        <th width="10%">Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td width="2%" style="text-align:center">{{ $user->id }}</td>
                                        <td width="10%">{{ $user->name }}</td>
                                        <td width="20%">{{ $user->email }}</td>
                                        <td width="20%" class="shortText">{{ $user->password }}</td>
                                        <td width="15%">{{ $user->fname }}</td>
                                        <td width="8%" style="text-align:center">{{ $user->phone }}</td>
                                        <td width="10%" style="text-align:center">{{ $user->created_at->format('d-m-Y') }}</td>
                                        <td width="5%" style="text-align:center">{!! \App\Helpers\Helper::admin($user->admin) !!}</td>
                                        <td width="10%" style="text-align:center">
                                            <div class="flex align-items-center list-user-action">
                                                <a class="bg-primary" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Sửa"      
                                                    href="/admin/users/edit/{{ $user->id }}">
                                                    <i class="ri-pencil-line"></i>
                                                </a>
                                                <a class="btn-danger" data-toggle="tooltip" data-placement="top"
                                                    title="" data-original-title="Xoá" 
                                                    href="#" onclick="delRow('{{ $user->id }}', '/admin/users/delUser')">
                                                    <i class="ri-delete-bin-line"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <script>
                                        var textContainers = document.querySelectorAll(".shortText");

                                        textContainers.forEach(function(textContainer) {
                                            var fullText = textContainer.textContent;
                                            var maxLength = 20;
                                            var shortenedText = fullText.length > maxLength ? fullText.substring(0, maxLength) + "..." : fullText;

                                            textContainer.innerHTML = shortenedText;
                                        });
                                    </script>
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: center">{!! $users->appends(request()->all())->links() !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
