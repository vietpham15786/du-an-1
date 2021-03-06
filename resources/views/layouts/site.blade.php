<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title id="title">Hello</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    {{--    GoongMap--}}
    <script src="https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.css" rel="stylesheet"/>
    <link
        rel="icon"
        href="{{asset('images/favicon/cropped-favicon-32x32.png')}}"
        sizes="32x32"
    />
    <!--- JQuery --->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!--- Notilfix --->
    <script src="{{asset('js/notiflix/notiflix-aio.js')}}"></script>

    <!-- All CSS is here -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor/pe-icon-7-stroke.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor/themify-icons.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/vendor/font-awesome.min.css')}}"/>

    <link rel="stylesheet" href="{{ asset('css/alert.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/index.css')}}"/>
    <link rel="stylesheet" href="{{ asset('css/plugins/swiper.min.css')}} "/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
          integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>
<div class="main-wrapper main-wrapper-2">
    <header class="header-area header-responsive-padding">
        <div class="header-bottom sticky-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="logo">
                            <a href="{{url('/')}}"><img id="logoImage" src="{{asset('/images/logo/logo4.png')}}"
                                                        alt="logo"/></a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block d-flex justify-content-center">
                        <div class="main-menu text-center">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{url(' ')}}">TRANG CH???</a>
                                    </li>
                                    <li>
                                        <a href="{{url('shop')}}">C???A H??NG</a>
                                        <ul class="mega-menu-style mega-menu-mrg-1">
                                            <li>
                                                <ul>
                                                    <li>
                                                        <a class="dropdown-title" href="#">Danh m???c s???n ph???m</a>
                                                        <ul>
                                                            @foreach($category as $cat)
                                                                <li>
                                                                    <a href="{{asset('category/'.$cat->CategorySlug)}}">{{$cat->CategoryName}}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        {{--                                                        <a href="shop.html"><img src="assets/images/banner/menu.png" alt=""/></a>--}}
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{url('blog')}}">TIN T???C</a></li>
                                    <li><a href="{{url('about-us')}}">GI???I THI???U</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="header-action-wrap">
                            <div class="header-action-style header-search-1">
                                <a class="search-toggle" href="#">
                                    <i class="pe-7s-search s-open"></i>
                                    <i class="pe-7s-close s-close"></i>
                                </a>
                                <div class="search-wrap-1">
                                    <form action="#">
                                        <input placeholder="T??m ki???m s???n ph???m???" type="text"/>
                                        <button class="button-search">
                                            <i class="pe-7s-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="header-action-style  ">
                                <ul>
                                    <li>
                                        <a title="????ng nh???p/ ????ng k??" href="
                                @if (Session()->has('LoggedUser'))
                                        {{route('buyer.profile')}}
                                        @else
                                        {{route('buyer.login')}}
                                        @endif
                                            "><i class="pe-7s-user"></i></a>
                                        <ul class="mega-menu-style mega-menu-mrg-1 login-drop">
                                            <li>
                                                <a class="" href="#">Th??ng tin t??i kho???n</a>
                                                <a class="" href="#">?????i m???t kh???u</a>
                                                <a class="" href="#">L???ch s??? ????n h??ng</a>
                                                <a class="" href="#">????ng xu???t</a>
                                            </li>
                                        </ul>
                            </div>
                            <div class="header-action-style header-action-cart">
                                @if (!strpos(url()->current(), '/cart'))
                                    <a class="cart-active" href="#"><i class="pe-7s-shopbag"></i>
                                        <span class="product-count bg-black">
                                        @if (Session::has('Cart') != null)
                                                <span
                                                    id="total-quantity-show">{{Session::get('Cart')->totalQuantity}}</span>
                                            @else
                                                <span id="total-quantity-show">0</span>
                                            @endif
                                    </span>
                                    </a>
                                @endif
                            </div>
                            <div class="header-action-style d-block d-lg-none">
                                <a class="mobile-menu-active-button" href="#"><i class="pe-7s-menu"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="sidebar-cart-active">
        <div class="sidebar-cart-all">
            <a class="cart-close" href="#"><i class="pe-7s-close"></i></a>
            <div class="cart-content">
                <h3>Gi??? H??ng</h3>
                <div id="list-cart">
                    @if (Session::has('LoggedUser') == null)
                        <p style="text-align: center">B???n c???n ????ng nh???p ????? mua h??ng!</p>
                    @elseif (Session::has('Cart') == null)
                        <p style="text-align: center">Gi??? h??ng hi???n ??ang tr???ng!</p>
                    @else
                        <ul>
                            @foreach(Session::get('Cart')->products as $item)
                                <li>
                                    <div class="cart-img">
                                        <a href="/products/{{$item['productInfo']->Slug}}"><img
                                                src="{{asset('images/product/'.$item['productInfo']->Color)}}" alt=""/></a>
                                    </div>
                                    <div class="cart-title">
                                        <h4>
                                            <a href="/products/{{$item['productInfo']->Slug}}">{{$item['productInfo']->VariantName}}</a>
                                        </h4>
                                        <span> {{number_format($item['productInfo']->ProductPrice + ($item['productInfo']->ProductPrice * $item['productInfo']->VariantPrice))}} ?? {{$item['quantity']}} </span>
                                    </div>
                                    <div class="cart-delete">
                                        <a style="display: block; cursor: pointer;"
                                           data-id="{{$item['productInfo']->ProductId}}"
                                           data-variant="{{$item['productInfo']->VariantId}}"
                                           data-slug="{{$item['productInfo']->Slug}}"
                                           slug="{{$item['productInfo']->Slug}}" class="btn-delete-item-cart">x</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="cart-total">
                            <h4>Th??nh ti???n: <span>{{number_format(Session::get('Cart')->totalPrice)}} ??</span></h4>
                        </div>
                        <div class="cart-btn btn-hover">
                            <a class="theme-color" href="{{route('cart')}}">Xem gi??? h??ng</a>
                        </div>
                        <div class="checkout-btn btn-hover">
                            <a class="theme-color" href="/checkout">Thanh to??n</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @yield('main')
    <footer class="footer-area">
        <div class="bg-gray-2">
            <div class="container">
                <div class="footer-top pt-80 pb-35">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-about mb-40">
                                <div class="footer-logo">
                                    <a href="{{url('')}}"
                                    ><img id="footerLogo" src="{{asset('/images/logo/logo3.png')}}" alt="logo"
                                        /></a>
                                </div>
                                <p>
                                    L???a ch???n c???a gia ????nh
                                </p>
                                <div class="payment-img">
                                    <a href="#"><img src="{{asset('/images/icon-img/payment.png')}}" alt="logo"/></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-widget-margin-1 footer-list mb-40">
                                <h3 class="footer-title">Th??ng tin</h3>
                                <ul>
                                    <li><a href="{{url('about-us')}}">V??? ch??ng t??i</a></li>
                                    <li><a href="#">Th??ng tin giao h??ng</a></li>
                                    <li><a href="#">Ch??nh s??ch b???o m???t</a></li>
                                    <li><a href="#">??i???u kho???n & ??i???u ki???n</a></li>
                                    <li><a href="#">D???ch v??? kh??ch h??ng</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget footer-list mb-40">
                                <h3 class="footer-title">T??i Kho???n</h3>
                                <ul>
                                    <li><a href="#">T??i kho???n c???a t??i</a></li>
                                    <li><a href="#">L???ch s??? ?????t h??ng</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div
                                class="footer-widget footer-widget-margin-2 footer-address mb-40">
                                <h3 class="footer-title">Th??ng tin li??n h???</h3>
                                <ul>
                                    <li><span>?????a ch???: </span><span id="address">loading...</span></li>
                                    <li><span>??i???n tho???i: </span><span id="phone">loading...</span></li>
                                    <li><span>Email: </span><span id="email">loading.../span></li>
                                </ul>
                                <div class="open-time">
                                    <p>
                                        M??? c???a: <span id="open">loading...</span> - ????ng c???a:
                                        <span id="close">loading...</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-3">
            <div class="container">
                <div class="footer-bottom copyright text-center bg-gray-3">
                    <p>
                        Copyright ??2021 | T???o b???i <i class="fa fa-heart"></i>
                        <a href="#" id="brandName">Loading...</a>.
                    </p>
                </div>
            </div>
        </div>

        {{--        alert --}}
        <?php
        if (session('status')) {
            $arr = explode('/', session('status'));
            $statu = $arr[0];
            $message = $arr[1];
            session()->forget('status');
        }


        ?>
        @if (isset($statu))
            <section id="alert" class="{{$statu}} ">
                <div class="content-alert ">
                    @if($statu === 'success')
                        <i class="fas fa-check-circle"></i>
                    @else
                        <i class="fas fa-exclamation-triangle"></i>
                    @endif
                    <div class="text">
                        <h4 class="title">{{$statu==='success'?'Th??nh c??ng':'Th???t b???i'}}</h4>
                        <span class="details">{{$message}}</span>
                    </div>
                    <a class="close" id="btn-ok">&times;</a>
                    <div id="ease"></div>
                </div>
            </section>
    @endif
    <!-- Mobile Menu start -->
        <div class="off-canvas-active">
            <a class="off-canvas-close"><i class="ti-close"></i></a>
            <div class="off-canvas-wrap">
                <div class="welcome-text off-canvas-margin-padding">
                    <p>Ch??o m???ng ?????n v???i <span id="mobileName"></span></p>
                </div>
                <div class="mobile-menu-wrap off-canvas-margin-padding-2">
                    <div id="mobile-menu" class="slinky-mobile-menu text-left">
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Trang Ch???</a>
                            </li>
                            <li>
                                <a href="{{route('shop')}}">C???a H??ng</a>
                                <ul>
                                    @foreach($category as $cat)
                                        <li>
                                            <a href="{{asset('category/'.$cat->CategorySlug)}}">{{$cat->CategoryName}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('blog')}}">Tin t???c</a>
                            </li>
                            <li>
                                <a href="{{route('about-us')}}">Gi???i Thi???u</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- Javascript c?? th??? d???a v??o ????y custom l???i-->
<script src="{{asset('js/vendor/modernizr-3.11.2.min.js')}} "></script>
<script src="{{asset('js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('js/vendor/popper.min.js')}}"></script>
<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('js/vendor/jquery-validate-1.15.1.js')}}"></script>

<script src="{{asset('js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('js/plugins/swiper.min.js')}}"></script>
<script src="{{asset('js/plugins/scrollup.js')}}"></script>
<script src="{{asset('js/plugins/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('js/plugins/counterup.min.js')}}"></script>
<script src="{{asset('js/plugins/select2.min.js')}}"></script>
<script src="{{asset('js/plugins/easyzoom.js')}}"></script>
<script src="{{asset('js/plugins/slinky.min.js')}}"></script>

{{--Alertify--}}
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
{{--Craftpip--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<style>
    .alertify-notifier .ajs-message.ajs-success {
        background-color: #d0011b;
    }

    .jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-title-c {
        font-size: 15px;
    }

    .jconfirm.jconfirm-my-theme .jconfirm-box .jconfirm-buttons button {
        background-color: #d0011b;
    }
</style>
<!-- JS ch??nh -->
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/checkout.js')}}"></script>
<script src="{{asset('js/plugins/search.js')}}"></script>
<script src="{{asset('js/plugins/login.js')}}"></script>
{{--JS Cart--}}
<script type="text/javascript">
    $(document).ready(function () {
        $("#btn-ok").click(function () {
            $("#alert").fadeOut();
        });
    })

    function AddToCart(slug) {
        var quantity = $(".quantity-add-cart").val();
        var variant = $('input[name="emotion"]:checked');

        if (variant.val()) {
            // var data = {slug: slug, variant: variant.data('id'), quantity: quantity};
            if (quantity && Number(quantity) && quantity % 1 === 0 && quantity > 0) {
                $.ajax({
                    type: 'GET',
                    // url  : '../cart/check-quantity'+'/'+slug+'/'+variant.data('id')+'/'+quantity+'/'+1,
                    url: "{{url('/cart/check-quantity')}}/" + slug + '/' + variant.data('id') + '/' + quantity + '/' + 1,
                }).done(function (res) {
                    if (res) {
                        $.alert({
                            title: 'Th??ng b??o!',
                            content: 'S??? l?????ng s???n ph???m kh??ng ?????!',
                        });
                    } else {
                        $.ajax({
                            type: 'GET',
                            url: "{{url('/cart/add-cart')}}/" + slug + '/' + variant.data('id') + '/' + quantity,
                        }).done(function (response) {
                            if (response) {
                                RenderCart(response);
                                alertify.success('Th??m th??nh c??ng!');
                            }
                        });
                    }
                })
            } else {
                $.confirm({
                    title: 'L???i!',
                    content: 'Vui l??ng nh???p v??o s??? nguy??n v?? l???n h??n 0!',
                    buttons: {
                        'Ok': function () {
                            $(".quantity-add-cart").val(1);
                        },
                    }
                });
            }
        } else {
            $.alert({
                title: 'Th??ng b??o!',
                content: 'Vui l??ng ch???n "m??u"',
            });
        }
    }

    $('#list-cart').on("click", ".btn-delete-item-cart", function () {
        $.ajax({
            type: 'GET',
            url: "{{url('/cart/delete-item-cart')}}/" + $(this).data('slug') + '/' + $(this).data('variant'),
        }).done(function (response) {
            if (response) {
                RenderCart(response);
            }
        });
    });

    function RenderCart(response) {
        $('#list-cart').empty();
        $('#list-cart').html(response)
        $('#total-quantity-show').text($('#total-quantity-cart').val());
    }
</script>

{{-- get infomation from server --}}
<script>
    $(document).ready(function () {
        $.ajax({
            url: "{{url('api/getInfomation')}}",
            context: document.body,
            success: function (res) {
                $('#title').html(res.name + ' - M?? u???c c???a m???i nh??');
                $("#logoImage").attr("src", res.logoUrl);
                $("#footerLogo").attr("src", res.logoUrl);
                $("#email").text(res.email);
                $("#address").text(res.address);
                $("#phone").text(res.phone);
                $("#open").text(res.openTime);
                $("#close").text(res.closeTime);
                $("#mobileName").text(res.name);
                $("#brandName").text(res.name);
            }
        });
    });
</script>
@yield('scripts')
</body>
</html>
