@extends('user.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">
                            Thông tin <br>
                            <span class="text-cgr">Danh mục sách:
                                <a href="/danh-muc/{{ $product->category->id }}/{{ $product->category->url }}.html">
                                    {{ $product->category->name_category }}
                                </a>
                            </span>
                        </h4>
                    </div>
                    <div class="iq-card-body pb-0">
                        <form action="/them-gio-hang" method="post">
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
                                            <input type="hidden" name="id_product" value="{{ $product->id }}">
                                            <div class="text-dark mb-2">Nhà xuất bản:
                                                <span class="nxb">{{ $product->nxb }}</span>
                                            </div>
                                            <div class="mb-4 text-dark">Tác giả:
                                                <span class="text-dark"
                                                    style="font-weight: bold">{{ $product->author }}</span>
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
                                            <div class="mb-4 d-flex align-items-center justify-content-center">
                                                @if ($product->price !== null)
                                                    @if (Auth::check())
                                                        <button type="submit" class="btn btn-primary view-more mr-2">
                                                            Thêm vào giỏ hàng
                                                        </button>
                                                    @else
                                                        <a href="javascript:void(0);"
                                                            onclick="showAlertAndRedirect('/users/login')"
                                                            class="btn btn-primary view-more mr-2">
                                                            Thêm vào giỏ hàng
                                                        </a>
                                                    @endif
                                                @endif
                                                <script>
                                                    function showAlertAndRedirect(url) {
                                                        var result = confirm('Vui lòng đăng nhập để tiếp tục!');
                                                        if (result) {
                                                            window.location.href = url;
                                                        }
                                                    }
                                                </script>
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
                            @csrf
                        </form>
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
                                @if (Auth::check())
                                    <form action="" method="POST" role="form">
                                        <div class="write__cmt">
                                            <label style="font-weight: bold">
                                                {{ Auth::user()->name }}
                                                <input type="hidden" name="id_user" id="id_user"
                                                    value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="id_product" id="id_product"
                                                    value="{{ $product->id }}">
                                            </label><br>
                                            <div id="rating">
                                                <input class="star-input" type="radio" id="star5" name="rating"
                                                    value="5" />
                                                <label class="full" for="star5" title="Awesome - 5 stars"></label>

                                                <input class="star-input" type="radio" id="star4" name="rating"
                                                    value="4" />
                                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                                <input class="star-input" type="radio" id="star3" name="rating"
                                                    value="3" />
                                                <label class="full" for="star3" title="Meh - 3 stars"></label>

                                                <input class="star-input" type="radio" id="star2" name="rating"
                                                    value="2" />
                                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                                <input class="star-input" type="radio" id="star1" name="rating"
                                                    value="1" />
                                                <label class="full" for="star1"
                                                    title="Sucks big time - 1 star"></label>
                                            </div>
                                            <textarea class="content__cmt" name="content" id="content" rows="3" placeholder="Viết bình luận"></textarea>
                                            <div id="notificate" style="color: green; margin-bottom: 7px">

                                            </div>
                                            <button type="submit" id="btn_submit">Gửi</button>
                                        </div>
                                    </form>
                                    <hr>
                                @endif
                                <div class="show_new_cmt">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Sản phẩm tương tự</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="/danh-muc/{{ $product->category->id }}/{{ $product->category->url }}.html"
                                class="btn btn-sm btn-primary view-more">Xem thêm</a>
                        </div>
                    </div>
                    <div class="iq-card-body single-similar-contens">
                        <ul id="single-similar-slider" class="list-inline p-0 mb-0 row">
                            @foreach ($products as $products)
                                <li class="col-md-3">
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative image-overlap-shadow">
                                                <a href="javascript:void();"><img class="img-fluid rounded w-100"
                                                        src="{{ $products->file }}" title="{{ $product->name }}"></a>
                                                <div class="view-book">
                                                    <a href="/id-{{ $products->id }}/{{ $products->url }}"
                                                        class="btn btn-sm btn-white">Xem thêm</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-7 pl-0">
                                            <h6 class="mb-1"><a href="/id-{{ $products->id }}/{{ $products->url }}"
                                                    title="{{ $products->name }}">{{ $products->name }}</a></h6>
                                            <p class="text-body">Tác giả : {{ $products->author }}</p>
                                            <a href="#" class="text-dark" tabindex="-1">Đọc ngay<i
                                                    class="ri-arrow-right-s-line"></i></a>
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

    <script>
        var _csrf = '{{ csrf_token() }}';
        $(document).ready(function() {
            load_comment();

            function load_comment() {
                var id_product = $('#id_product').val();

                $.ajax({
                    type: "POST",
                    url: "/san-pham/load-comment",
                    data: {
                        id_product: id_product,
                        _token: _csrf
                    },
                    success: function(rs) {
                        $('.show_new_cmt').html(rs);
                    }
                });

                $('#btn_submit').click(function(e) {
                    e.preventDefault();

                    var id_product = $('#id_product').val();
                    var id_user = $('#id_user').val();
                    var content = $('#content').val();
                    var star = $('input.star-input:checked').val();

                    $.ajax({
                        type: "POST",
                        url: "/san-pham/add-comment",
                        data: {
                            id_product: id_product,
                            id_user: id_user,
                            content: content,
                            star: star,
                            _token: _csrf
                        },
                        success: function(rs) {
                            $('#notificate').html('<span>Thêm bình luận thành công!</span>');
                            load_comment();
                            $('#notificate').fadeOut(3000);
                            $('#content').val('');
                            $('input[type="radio"]').prop('checked', false);
                        }
                    });
                });
            }
        });
    </script>
@endsection
