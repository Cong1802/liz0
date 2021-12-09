<!-- HEADER -->
<div class="wrapper">
    <div class="preloader"></div>
<header class="header-nav menu_style_home_one style2 style3 navbar-scrolltofixed stricky main-menu">
    <div class="container-fluid p0">
        <!-- Ace Responsive Menu -->
        <nav class="d-flex align-items-center">
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
                <img class="nav_logo_img img-fluid" src="/frontend/findhouse/images/header-logo.png" alt="header-logo.png">
                <button type="button" id="menu-btn">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <a href="#" class="navbar_brand float-left dn-smd">
                @if(setting('store_logo'))
                        <a href="{{ route('home') }}"><img class="logo1 img-fluid"
                        src="{{ \Storage::url(setting('store_logo')) }}" width="100px" alt="header-logo.png"></a>
                @else
                    <a href="{{ route('home') }}" title="{{ setting('store_name') }}">
                        <span>{{ mb_strimwidth(setting('store_name'), 0, 15) }}</span>
                    </a>
                @endif
                <span class="d-none">Lizo</span>
            </a>
            <!-- Responsive Menu Structure-->
            <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
            <div class="">
                <ul class="m-0">
                    <li class="list-inline-item dn-1440">
                        <div class="ht_search_widget">
                            <div class="header_search_widget">
                                <form class="form-inline mailchimp_form">
                                    <input type="text" class="form-control" id="inlineFormInputName2" placeholder="What are you looking for?">
                                    <button type="submit" class="btn btn-primary"><span class="flaticon-magnifying-glass"></span></button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item list_s button-listener dib-1440 dn">
                        <div class="search_overlay">
                            <a id="search-button-listener" class="mk-search-trigger mk-fullscreen-trigger" href="#">
                                <span id="search-button"><i class="flaticon-magnifying-glass"></i></span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>


            <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                <li>
                    <a href="{{ route('home') }}">{{ __('Trang chủ') }}</a>
                </li>
                @if($menuHeaders->isNotEmpty())
                    @foreach($menuHeaders as $menu)
                        <li class="{{ $menu->childs->count() > 0 ? 'has-sub' : '' }}">
                            <a href="{{ $menu->urlMenu() }}"
                               class="@if(request()->fullUrl() == $menu->urlMenu())
                                   active @endif">{{ $menu->name }}</a>

                            @if($menu->childs->count() > 0)
                            <ul>
                                <style>
                                    .ace-responsive-menu > li > a > .arrow:before {
                                        display: inline-block;
                                    }
                                </style>
                                    @foreach($menu->childs as $child)
                                        <li>
                                            <a href="{{ $child->urlMenu() }}"
                                               class="@if(request()->fullUrl() == ($child->urlMenu()))
                                                   active @endif">{{ $child->name }}</a>
                                        </li>
                                    @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
                @auth('web')
                <li>
                    <a href="{{ route('news.index') }}">{{ __('Quản lý tin đăng') }}</a>
                </li>
                <li>
                    <div class="dropdown show">
                        <a class="btn" href="javascript:void(0);" class="header-login" >
                            {{ currentUser()->name}} <ion-icon style="vertical-align:middle" name="arrow-dropdown"></ion-icon>
                        </a>
                      
                        <ul class=" option-account p-0" aria-labelledby="dropdownMenuLink" style="border:none;box-shadow:0 0 6px #ccc">
                          <li><a class="dropdown-item" href="#"><ion-icon name="clipboard"></ion-icon> Quản lý đăng tin</a></li>
                          <li><a class="dropdown-item" href="#"><ion-icon name="contact"></ion-icon> Thông tin cá nhân</a></li>
                          <li><a class="dropdown-item" href="#"><ion-icon name="sync"></ion-icon> Thay đổi mật khẩu</a></li>
                          <li><a class="dropdown-item" href="#"><ion-icon name="notifications-outline"></ion-icon> Thông báo</a></li>
                          <li><a class="dropdown-item" href="#"><ion-icon name="call"></ion-icon> Liên hệ</a></li>
                          <li><a class="dropdown-item" href="#"><ion-icon name="paper"></ion-icon> Đánh giá</a></li>
                          <li><a class="dropdown-item" href="#"><ion-icon name="log-out"></ion-icon> Đăng xuất</a></li>
                        </ul>
                    </div>
                </li> 
                @else
                <li>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#login" class="header-login" >Đăng nhập</a>
                </li> 
                @endauth
                
            </ul>
        </nav>
    </div>
</header>
 <!-- Modal Login -->
 <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="font-size: 12px;">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header align-items-center">
                            <h3 class="modal-title">Đăng nhập</h3>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="background:transparent;border:none"><ion-icon name="close"></ion-icon></button>
                        </div>
                        <div class="modal-body">
                            <form class="login login-form" method="post" action="" id="loginform" name="login">
                                @csrf
                                <p id="error" class="text-danger"></p>
                                <p>Tài khoản</p>
                                <p><input class="form-control" value="{{ Cookie::get('email') }}" name="username" placeholder="Nhập tài khoản"></p>
                                <p>Mật khẩu:</p>
                                <p><input class="form-control"  name="password" value="{{ Cookie::get('password') }}"  type="password" placeholder="Nhập mật khẩu"></p>
                               <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" class=" checkbox_input far fa-check" name="remember" id="remember">
                                    <label for="remember" class="m-0">
                                       &nbsp; Nhớ mật khẩu
                                    </label>
                                </div>
                                <p>@if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" style="color:#e03c31;">
                                        {{ __('Quên mật khẩu') }}
                                    </a>
                                @endif</p>
                               </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-login">Đăng nhập</button>
                                </div>
                                <p class="text-center">Nếu chưa có tài khoản , đăng ký tại <a href="{{ route('register') }}" class="text-success" style="text-decoration:underline">đây</a></p>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
{{--<header class="header-area">--}}
{{--    <div class="header-top second-header d-none d-md-block">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-3 col-md-3 d-none d-lg-block">--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-8 d-none  d-md-block">--}}
{{--                    <div class="header-cta">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <i class="icon dripicons-mail"></i>--}}
{{--                                <span>{{ setting('store_email') }}</span>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <i class="icon dripicons-phone"></i>--}}
{{--                                <span>{{ setting('store_phone') }}</span>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 col-md-3 d-none d-lg-block">--}}
{{--                    <form class="input-group float-left w-75" method="get" action="{{ route('search') }}">--}}
{{--                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="{{ __('Tìm kiếm bài viết, trang...') }}"--}}
{{--                               aria-label="{{ __('Tìm kiếm bài viết, trang...') }}" aria-describedby="basic-addon2">--}}
{{--                        <div class="input-group-append" style="height: calc(1.5em + 0.75rem + 0.2rem);">--}}
{{--                            <button class="btn btn-outline-secondary" type="submit" style="line-height: 25%;">{{ __('Tìm kiếm') }}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                    <div class="header-social text-right">--}}
{{--                        <span>--}}
{{--                            <a href="{{ setting('link_facebook', '') }}" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>--}}
{{--                            <a href="{{ setting('link_youtube', '') }}" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a>--}}
{{--                       </span>--}}
{{--                        <!--  /social media icon redux -->--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div id="header-sticky" class="menu-area">--}}
{{--        <div class="container">--}}
{{--            <div class="second-menu">--}}
{{--                <div class="row align-items-center">--}}
{{--                    <div class="col-xl-2 col-lg-2">--}}
{{--                        <div class="logo">--}}
{{--                            @if(setting('store_logo'))--}}
{{--                                    <a href="{{ route('home') }}"><img--}}
{{--                                    src="{{ \Storage::url(setting('store_logo')) }}"--}}
{{--                                    alt="logo"></a>--}}
{{--                            @else--}}
{{--                                <a href="{{ route('home') }}" title="{{ setting('store_name') }}">--}}
{{--                                    <span>{{ mb_strimwidth(setting('store_name'), 0, 15) }}</span>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-8 col-lg-8">--}}
{{--                        <div class="main-menu text-right pr-15">--}}
{{--                            <nav id="mobile-menu">--}}
{{--                                <ul>--}}
{{--                                    <li class="has-sub">--}}
{{--                                        <a href="{{ route('home') }}">{{ __('Trang chủ') }}</a>--}}
{{--                                    </li>--}}
{{--                                    @if($menuHeaders->isNotEmpty())--}}
{{--                                        @foreach($menuHeaders as $menu)--}}
{{--                                            <li class="{{ $menu->childs->count() > 0 ? 'has-sub' : '' }}">--}}
{{--                                                <a href="{{ $menu->urlMenu() }}"--}}
{{--                                                   class="@if(request()->fullUrl() == $menu->urlMenu())--}}
{{--                                                       active @endif">{{ $menu->name }}</a>--}}
{{--                                                <ul>--}}
{{--                                                    @if($menu->childs->count() > 0)--}}
{{--                                                        @foreach($menu->childs as $child)--}}
{{--                                                            <li>--}}
{{--                                                                <a href="{{ $child->urlMenu() }}"--}}
{{--                                                                   class="@if(request()->fullUrl() == ($child->urlMenu()))--}}
{{--                                                                       active @endif">{{ $child->name }}</a>--}}
{{--                                                            </li>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </ul>--}}
{{--                            </nav>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-2 col-lg-2 d-none d-lg-block">--}}
{{--                        <a href="{{ route('page.contact') }}" class="top-btn">{{ __('Liên hệ') }} <i--}}
{{--                                class="fas fa-chevron-right"></i></a>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="mobile-menu"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}
<!-- Header-end -->

@push('scripts')
    <script !src="">
        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false,
            ignore: "",
            lang: "en",
            rules: {
                username: {
                    required: true,
                },
                password: {
                    required: true,
                },
                remember: {
                    required: false
                }
            },
            messages: {
                username: {
                    required: "Hãy nhập tài khoản",
                },
                password: {
                    required: "Hãy nhập mật khẩu",
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                $('.alert-danger', $('.login-form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            submitHandler: function (form) {
                var validator = this;
                var submitButton = $(form).find('button[type="submit"]')
                submitButton.addClass('m-loader').prop('disabled', true);
                $.ajax({
                    type: "POST",
                    url: "/logins",
                    data: $(form).serialize(),
                    headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                    dataType: "JSON",
                    success: function (res) {
                        if (res.status == 300) {
                            window.location.reload();
                        }else if (res.status == 400) {
                            $('#error').text('Tài khoản của bạn đã bị khóa');
                            submitButton.addClass('m-loader').prop('disabled', false);
                        }else{
                             $('#error').text('Sai tài khoản hoặc mật khẩu');
                            submitButton.addClass('m-loader').prop('disabled', false);
                        }
                    },
                    error: function (e) {
                        submitButton.removeClass('m-loader').prop('disabled', false);
                        if (e.status == 422) {
                            $.each(Object.keys(e.responseJSON.errors), function (key, value) {
                                validator.showErrors({
                                    [value]: e.responseJSON.errors[value][0]
                                });
                            });
                        }
                    }
                });
                return false;
            }
        });
        $('.login-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });
        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false,
            ignore: "",
            lang: "en",
            rules: {
            },
            messages: {

            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                $('.alert-danger', $('.register-form')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            submitHandler: function (form) {
                var validator = this;
                var submitButton = $(form).find('button[type="submit"]')
                submitButton.addClass('m-loader').prop('disabled', true);
                $.ajax({
                    type: "POST",
                    url: "/register",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    success: function (res) {
                        if (res.status) {
                            toastr.success(res.message, 'Thành Công');
                            setTimeout(location.reload.bind(location), 2000);
                        }
                    },
                    error: function (e) {
                        submitButton.removeClass('m-loader').prop('disabled', false);
                        if (e.status == 422) {
                            $.each(Object.keys(e.responseJSON.errors), function (key, value) {
                                validator.showErrors({
                                    [value]: e.responseJSON.errors[value][0]
                                });
                            });
                        }
                    }
                });
                return false;
            }
        });
        $('.register-form input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    $('.register-form').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });

        $('.change-password').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false,
            ignore: "",
            lang: "en",
            rules: {

            },
            messages: {
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                $('.alert-danger', $('.change-password')).show();
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function (label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            submitHandler: function (form) {
                var validator = this;
                var submitButton = $(form).find('button[type="submit"]')
                submitButton.addClass('m-loader').prop('disabled', true);
                $.ajax({
                    type: "POST",
                    url: "/change-password",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    success: function (res) {
                        if (res.status) {
                            toastr.success(res.message, 'Thành Công');
                            setTimeout(location.reload.bind(location), 2000);
                        }
                    },
                    error: function (e) {
                        submitButton.removeClass('m-loader').prop('disabled', false);
                        if (e.status == 422) {
                            $.each(Object.keys(e.responseJSON.errors), function (key, value) {
                                validator.showErrors({
                                    [value]: e.responseJSON.errors[value][0]
                                });
                            });
                        }
                    }
                });
                return false;
            }
        });
        $('.change-password input').keypress(function (e) {
            if (e.which == 13) {
                if ($('.change-password').validate().form()) {
                    $('.change-password').submit(); //form validation success, call ajax form submit
                }
                return false;
            }
        });

    </script>
@endpush
