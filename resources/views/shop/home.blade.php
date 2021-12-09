@extends('shop.layouts.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endpush
@section('title')
    {{ setting('store_name') }}
    @if(!empty(setting('store_slogan')))
        -
    @endif
    {{ setting('store_slogan') }}
@endsection
@section('seo')
    <link rel="canonical" href="{{ request()->fullUrl() }}">
    <meta name="title" content="{{ setting('store_name') }} - {{ setting('store_slogan') }}">
    <meta name="description" content="{{ setting('store_description') }}">
    <meta name="keywords" content="{{ setting('store_name') }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="{{ setting('store_name') }} - {{ setting('store_slogan') }}">
    <meta property="og:description" content="{{ setting('store_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ setting('store_logo') ? \Storage::url(setting('store_logo')) : '' }}">
    <meta property="og:site_name" content="{{ url('') }}">
@stop
@section('content')
<!-- main-area -->
    <!-- Modal -->
    <div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body container pb20">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content container" id="myTabContent">
                        <div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-lg-6 col-xl-6">
                                <div class="login_thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/resource/login.jpg" alt="login.jpg">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="login_form">
                                    <form action="#">
                                        <div class="heading">
                                            <h4>Login</h4>
                                        </div>
                                        <div class="row mt25">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-fb btn-block"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="User Name Or Email">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="input-group form-group">
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-password"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                            <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                                            <a class="btn-fpswd float-right" href="#">Lost your password?</a>
                                        </div>
                                        <button type="submit" class="btn btn-log btn-block btn-thm">Log In</button>
                                        <p class="text-center">Don't have an account? <a class="text-thm" href="#">Register</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row mt25 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col-lg-6 col-xl-6">
                                <div class="regstr_thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/resource/regstr.jpg" alt="regstr.jpg">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="sign_up_form">
                                    <div class="heading">
                                        <h4>Register</h4>
                                    </div>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-block btn-fb"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn btn-block btn-googl"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" id="exampleInputName" placeholder="User Name">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-user"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-password"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Re-enter password">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="flaticon-password"></i></div>
                                            </div>
                                        </div>
                                        <div class="form-group ui_kit_select_search mb0">
                                            <select class="selectpicker" data-live-search="true" data-width="100%">
                                                <option data-tokens="SelectRole">Single User</option>
                                                <option data-tokens="Agent/Agency">Agent</option>
                                                <option data-tokens="SingleUser">Multi User</option>
                                            </select>
                                        </div>
                                        <div class="form-group custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="exampleCheck2">
                                            <label class="custom-control-label" for="exampleCheck2">I have read and accept the Terms and Privacy Policy?</label>
                                        </div>
                                        <button type="submit" class="btn btn-log btn-block btn-thm">Sign Up</button>
                                        <p class="text-center">Already have an account? <a class="text-thm" href="#">Log In</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search Button Bacground Overlay -->
    <div class="search_overlay dn-992">
        <div class="mk-fullscreen-search-overlay" id="mk-search-overlay">
            <button class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i class="fa fa-times"></i></button>
            <div id="mk-fullscreen-search-wrapper">
                <form method="get" id="mk-fullscreen-searchform" action="{{ route('search') }}">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Tìm kiếm bài viết, trang...') }}" aria-label="{{ __('Tìm kiếm bài viết, trang...') }}" id="mk-fullscreen-search-input">
                    <i class="flaticon-magnifying-glass fullscreen-search-icon"><input value="" type="submit"></i>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Header Nav For Mobile -->
    <div id="page" class="stylehome1 h0">
        <div class="mobile-menu">
            <div class="header stylehome1">
                <div class="main_logo_home2 text-center">
                    <img class="nav_logo_img img-fluid mt20" src="/frontend/findhouse/images/header-logo2.png" alt="header-logo2.png">
                    <span class="mt20">Lizo</span>
                </div>
                <ul class="menu_bar_home2">
                    <li class="list-inline-item list_s"><a href="page-register.html"><span class="flaticon-user"></span></a></li>
                    <li class="list-inline-item">
                        <div class="search_overlay">
                            <div id="search-button-listener2" class="mk-search-trigger style2 mk-fullscreen-trigger">
                                <div id="search-button2"><i class="flaticon-magnifying-glass"></i></div>
                            </div>
                            <div class="mk-fullscreen-search-overlay" id="mk-search-overlay2">
                                <button class="mk-fullscreen-close" id="mk-fullscreen-close-button2"><i class="fa fa-times"></i></button>
                                <div id="mk-fullscreen-search-wrapper2">
                                    <form method="get" id="mk-fullscreen-searchform2">
                                        <input type="text" value="" placeholder="Search courses..." id="mk-fullscreen-search-input2">
                                        <i class="flaticon-magnifying-glass fullscreen-search-icon"><input value="" type="submit"></i>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item"><a href="#menu"><span></span></a></li>
                </ul>
            </div>
        </div><!-- /.mobile-menu -->
        <nav id="menu" class="stylehome1">
            <ul>
                <li><span>Home</span>
                    <ul>
                        <li><a href="index.html">Home 1</a></li>
                        <li><a href="index2.html">Home 2</a></li>
                        <li><a href="index3.html">Home 3</a></li>
                        <li><a href="index4.html">Home 4</a></li>
                        <li><a href="index5.html">Home 5</a></li>
                        <li><a href="index6.html">Home 6</a></li>
                        <li><a href="index7.html">Home 7</a></li>
                        <li><a href="index8.html">Home 8</a></li>
                        <li><a href="index9.html">Home 9</a></li>
                        <li><a href="index10.html">Home 10</a></li>
                    </ul>
                </li>
                <li><span>Listing</span>
                    <ul>
                        <li><span>Listing Grid</span>
                            <ul>
                                <li><a href="page-listing-grid-v1.html">Grid v1</a></li>
                                <li><a href="page-listing-grid-v2.html">Grid v2</a></li>
                                <li><a href="page-listing-grid-v3.html">Grid v3</a></li>
                                <li><a href="page-listing-grid-v4.html">Grid v4</a></li>
                                <li><a href="page-listing-grid-v5.html">Grid v5</a></li>
                                <li><a href="page-listing-full-width-grid.html">Grid Fullwidth</a></li>
                            </ul>
                        </li>
                        <li><span>Listing Style</span>
                            <ul>
                                <li><a href="page-listing-parallax.html">Parallax Style</a></li>
                                <li><a href="page-listing-slider.html">Slider Style</a></li>
                                <li><a href="page-listing-map.html">Map Header</a></li>
                            </ul>
                        </li>
                        <li><span>Listing Half</span>
                            <ul>
                                <li><a href="page-listing-half-map-v1.html">Map V1</a></li>
                                <li><a href="page-listing-half-map-v2.html">Map V2</a></li>
                                <li><a href="page-listing-half-map-v3.html">Map V3</a></li>
                                <li><a href="page-listing-half-map-v4.html">Map V4</a></li>
                            </ul>
                        </li>
                        <li><span>Agent View</span>
                            <ul>
                                <li><a href="page-listing-agent-v1.html">Agent V1</a></li>
                                <li><a href="page-listing-agent-v2.html">Agent V2</a></li>
                                <li><a href="page-listing-agent-v3.html">Agent Details</a></li>
                            </ul>
                        </li>
                        <li><span>Agencies View</span>
                            <ul>
                                <li><a href="page-agencies-list-v1.html">Agencies V1</a></li>
                                <li><a href="page-agencies-list-v2.html">Agencies V2</a></li>
                                <li><a href="page-agencies-list-v3.html">Agencies Details</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><span>Property</span>
                    <ul>
                        <li><span>Property</span>
                            <ul>
                                <li><a href="page-dashboard.html">Dashboard</a></li>
                                <li><a href="page-my-properties.html">My Properties</a></li>
                                <li><a href="page-add-new-property.html">Add New Property</a></li>
                            </ul>
                        </li>
                        <li><span>Listing Single</span>
                            <ul>
                                <li><a href="page-listing-single-v1.html">Single V1</a></li>
                                <li><a href="page-listing-single-v2.html">Single V2</a></li>
                                <li><a href="page-listing-single-v3.html">Single V3</a></li>
                                <li><a href="page-listing-single-v4.html">Single V4</a></li>
                                <li><a href="page-listing-single-v5.html">Single V5</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><span>Blog</span>
                    <ul>
                        <li><a href="page-blog-v1.html">Blog List 1</a></li>
                        <li><a href="page-blog-grid.html">Blog List 2</a></li>
                        <li><a href="page-blog-single.html">Single Post</a></li>
                    </ul>
                </li>
                <li><span>Pages</span>
                    <ul>
                        <li><span>Shop</span>
                            <ul>
                                <li><a href="page-shop.html">Shop</a></li>
                                <li><a href="page-shop-single.html">Shop Single</a></li>
                                <li><a href="page-shop-cart.html">Cart</a></li>
                                <li><a href="page-shop-checkout.html">Checkout</a></li>
                                <li><a href="page-shop-order.html">Order</a></li>
                            </ul>
                        </li>
                        <li><a href="page-about.html">About Us</a></li>
                        <li><a href="page-gallery.html">Gallery</a></li>
                        <li><a href="page-faq.html">Faq</a></li>
                        <li><a href="page-login.html">LogIn</a></li>
                        <li><a href="page-compare.html">Membership</a></li>
                        <li><a href="page-compare2.html">Membership 2</a></li>
                        <li><a href="page-register.html">Register</a></li>
                        <li><a href="page-service.html">Service</a></li>
                        <li><a href="page-error.html">404 Page</a></li>
                        <li><a href="page-terms.html">Terms and Conditions</a></li>
                        <li><a href="page-ui-element.html">UI Elements</a></li>
                    </ul>
                </li>
                <li><a href="page-contact.html">Contact</a></li>
                <li><a href="page-login.html"><span class="flaticon-user"></span> Login</a></li>
                <li><a href="page-register.html"><span class="flaticon-edit"></span> Register</a></li>
                <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-plus"></span> Create Listing</a></li>
            </ul>
        </nav>
    </div>

    <!-- 6th Home Design -->
    <section class="home-six home6-overlay">
        <div class="container">
            <div class="row posr">
                <div class="col-lg-12">
                    <div class="home_content home6">
                        <div class="home-text home6 text-center">
                            <h2 class="fz55">Enjoy The Finest Homes</h2>
                            <p class="fz18">From as low as $10 per day with limited time offer discounts.</p>
                        </div>
                        <div class="home_adv_srch_opt home6">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Buy</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Rent</a>
                                </li>
                            </ul>
                            <div class="tab-content home1_adsrchfrm" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="home1-advnc-search home6">
                                        <ul class="h1ads_1st_list mb0">
                                            <li class="list-inline-item">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter keyword...">
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <select class="selectpicker w100 show-tick">
                                                            <option>Property Type</option>
                                                            <option>Apartment</option>
                                                            <option>Bungalow</option>
                                                            <option>Condo</option>
                                                            <option>House</option>
                                                            <option>Land</option>
                                                            <option>Single Family</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
                                                    <label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="small_dropdown2 home6">
                                                    <div id="prncgs" class="btn dd_btn">
                                                        <span>Price</span>
                                                        <label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
                                                    </div>
                                                    <div class="dd_content2">
                                                        <div class="pricing_acontent">
                                                            <input type="text" class="amount" placeholder="$52,239">
                                                            <input type="text" class="amount2" placeholder="$985,14">
                                                            <div class="slider-range"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="custome_fields_520 list-inline-item">
                                                <div class="navbered">
                                                    <div class="mega-dropdown home6">
                                                        <span id="show_advbtn" class="dropbtn">Advanced <i class="flaticon-more pl10 flr-520"></i></span>
                                                        <div class="dropdown-content">
                                                            <div class="row p15">
                                                                <div class="col-lg-12">
                                                                    <h4 class="text-thm3">Amenities</h4>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                                <label class="custom-control-label" for="customCheck1">Air Conditioning</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                                                <label class="custom-control-label" for="customCheck2">Lawn</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                                                <label class="custom-control-label" for="customCheck3">Swimming Pool</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                                                <label class="custom-control-label" for="customCheck4">Barbeque</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                                                <label class="custom-control-label" for="customCheck5">Microwave</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                                                <label class="custom-control-label" for="customCheck6">TV Cable</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                                                <label class="custom-control-label" for="customCheck7">Dryer</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                                                <label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck9">
                                                                                <label class="custom-control-label" for="customCheck9">Washer</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                                                <label class="custom-control-label" for="customCheck10">Gym</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                                                <label class="custom-control-label" for="customCheck11">Refrigerator</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                                                <label class="custom-control-label" for="customCheck12">WiFi</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                                                <label class="custom-control-label" for="customCheck13">Laundry</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                                                <label class="custom-control-label" for="customCheck14">Sauna</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                                                <label class="custom-control-label" for="customCheck15">Window Coverings</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row p15 pt0-xsd">
                                                                <div class="col-lg-11 col-xl-10">
                                                                    <ul class="apeartment_area_list mb0">
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick">
                                                                                    <option>Bathrooms</option>
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                    <option>6</option>
                                                                                    <option>7</option>
                                                                                    <option>8</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick">
                                                                                    <option>Bedrooms</option>
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                    <option>6</option>
                                                                                    <option>7</option>
                                                                                    <option>8</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick">
                                                                                    <option>Year built</option>
                                                                                    <option>2013</option>
                                                                                    <option>2014</option>
                                                                                    <option>2015</option>
                                                                                    <option>2016</option>
                                                                                    <option>2017</option>
                                                                                    <option>2018</option>
                                                                                    <option>2019</option>
                                                                                    <option>2020</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick">
                                                                                    <option>Built-up Area</option>
                                                                                    <option>Adana</option>
                                                                                    <option>Ankara</option>
                                                                                    <option>Antalya</option>
                                                                                    <option>Bursa</option>
                                                                                    <option>Bodrum</option>
                                                                                    <option>Gaziantep</option>
                                                                                    <option>İstanbul</option>
                                                                                    <option>İzmir</option>
                                                                                    <option>Konya</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-2">
                                                                    <div class="mega_dropdown_content_closer">
                                                                        <h5 class="text-thm text-right mt15"><span id="hide_advbtn" class="curp">Hide</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="search_option_button">
                                                    <button type="submit" class="btn btn-thm">Search</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="home1-advnc-search home6">
                                        <ul class="h1ads_1st_list mb0">
                                            <li class="list-inline-item">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Enter keyword...">
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="search_option_two">
                                                    <div class="candidate_revew_select">
                                                        <select class="selectpicker w100 show-tick">
                                                            <option>Property Type</option>
                                                            <option>Apartment</option>
                                                            <option>Bungalow</option>
                                                            <option>Condo</option>
                                                            <option>House</option>
                                                            <option>Land</option>
                                                            <option>Single Family</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Location">
                                                    <label for="exampleInputEmail3"><span class="flaticon-maps-and-flags"></span></label>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="small_dropdown2 home6">
                                                    <div id="prncgs2" class="btn dd_btn">
                                                        <span>Price</span>
                                                        <label for="exampleInputEmail4"><span class="fa fa-angle-down"></span></label>
                                                    </div>
                                                    <div class="dd_content2">
                                                        <div class="pricing_acontent">
                                                            <input type="text" class="amount" placeholder="$52,239">
                                                            <input type="text" class="amount2" placeholder="$985,14">
                                                            <div class="slider-range"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="custome_fields_520 list-inline-item">
                                                <div class="navbered">
                                                    <div class="mega-dropdown home6">
                                                        <span id="show_advbtn2" class="dropbtn">Advanced <i class="flaticon-more pl10 flr-520"></i></span>
                                                        <div class="dropdown-content">
                                                            <div class="row p15">
                                                                <div class="col-lg-12">
                                                                    <h4 class="text-thm3">Amenities</h4>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck16">
                                                                                <label class="custom-control-label" for="customCheck16">Air Conditioning</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck17">
                                                                                <label class="custom-control-label" for="customCheck17">Lawn</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck18">
                                                                                <label class="custom-control-label" for="customCheck18">Swimming Pool</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck19">
                                                                                <label class="custom-control-label" for="customCheck19">Barbeque</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck20">
                                                                                <label class="custom-control-label" for="customCheck20">Microwave</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck21">
                                                                                <label class="custom-control-label" for="customCheck21">TV Cable</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck22">
                                                                                <label class="custom-control-label" for="customCheck22">Dryer</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck23">
                                                                                <label class="custom-control-label" for="customCheck23">Outdoor Shower</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck24">
                                                                                <label class="custom-control-label" for="customCheck24">Washer</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck25">
                                                                                <label class="custom-control-label" for="customCheck25">Gym</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck26">
                                                                                <label class="custom-control-label" for="customCheck26">Refrigerator</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck27">
                                                                                <label class="custom-control-label" for="customCheck27">WiFi</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                    <ul class="ui_kit_checkbox selectable-list">
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck28">
                                                                                <label class="custom-control-label" for="customCheck28">Laundry</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck29">
                                                                                <label class="custom-control-label" for="customCheck29">Sauna</label>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="custom-control custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="customCheck30">
                                                                                <label class="custom-control-label" for="customCheck30">Window Coverings</label>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="row p15 pt0-xsd">
                                                                <div class="col-lg-11 col-xl-10">
                                                                    <ul class="apeartment_area_list mb0">
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick">
                                                                                    <option>Bathrooms</option>
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                    <option>6</option>
                                                                                    <option>7</option>
                                                                                    <option>8</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick">
                                                                                    <option>Bedrooms</option>
                                                                                    <option>1</option>
                                                                                    <option>2</option>
                                                                                    <option>3</option>
                                                                                    <option>4</option>
                                                                                    <option>5</option>
                                                                                    <option>6</option>
                                                                                    <option>7</option>
                                                                                    <option>8</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick">
                                                                                    <option>Year built</option>
                                                                                    <option>2013</option>
                                                                                    <option>2014</option>
                                                                                    <option>2015</option>
                                                                                    <option>2016</option>
                                                                                    <option>2017</option>
                                                                                    <option>2018</option>
                                                                                    <option>2019</option>
                                                                                    <option>2020</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <div class="candidate_revew_select">
                                                                                <select class="selectpicker w100 show-tick">
                                                                                    <option>Built-up Area</option>
                                                                                    <option>Adana</option>
                                                                                    <option>Ankara</option>
                                                                                    <option>Antalya</option>
                                                                                    <option>Bursa</option>
                                                                                    <option>Bodrum</option>
                                                                                    <option>Gaziantep</option>
                                                                                    <option>İstanbul</option>
                                                                                    <option>İzmir</option>
                                                                                    <option>Konya</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-1 col-xl-2">
                                                                    <div class="mega_dropdown_content_closer">
                                                                        <h5 class="text-thm text-right mt15"><span id="hide_advbtn2" class="curp">Hide</span></h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="search_option_button">
                                                    <button type="submit" class="btn btn-thm">Search</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Properties -->
    <section id="feature-property" class="feature-property-home6 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title mb40">
                        <h2>Featured Properties</h2>
                        <p>Handpicked properties by our team. <a class="float-right" href="#">View All <span class="flaticon-next"></span></a></p>
                    </div>
                </div>
                <div class="col-lg-12" style="overflow: hidden">
                    <div class="feature_property_home6_slider">
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp10.jpg" alt="fp10.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item"><a href="#">Featured</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                        <h4>Renovated Apartment</h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp11.jpg" alt="fp11.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item"><a href="#">Featured</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$48,000<small>/mo</small></a>
                                        <h4>Gorgeous Villa Bay View</h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp12.jpg" alt="fp12.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item dn"><a href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$954,000<small>/mo</small></a>
                                        <h4> Luxury Villa Called Elvado </h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp13.jpg" alt="fp13.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item dn"><a href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$243,000<small>/mo</small></a>
                                        <h4>Luxury Family Home</h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp14.jpg" alt="fp14.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item dn"><a href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$75,000<small>/mo</small></a>
                                        <h4>Gregory Place</h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp10.jpg" alt="fp10.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item"><a href="#">Featured</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                        <h4>Renovated Apartment</h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp11.jpg" alt="fp11.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item"><a href="#">Featured</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$48,000<small>/mo</small></a>
                                        <h4>Gorgeous Villa Bay View</h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp12.jpg" alt="fp12.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item dn"><a href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$954,000<small>/mo</small></a>
                                        <h4> Luxury Villa Called Elvado </h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp13.jpg" alt="fp13.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item dn"><a href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$243,000<small>/mo</small></a>
                                        <h4>Luxury Family Home</h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="properti_city home6">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/property/fp14.jpg" alt="fp14.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item dn"><a href="#"></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <a class="fp_price" href="#">$75,000<small>/mo</small></a>
                                        <h4>Gregory Place</h4>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Whatare you looking for -->
    <section class="you-looking-for">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center py-4">
                        <h2>What are you looking for?</h2>
                        <p>We provide full service at every step.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Property Cities -->
    <section id="property-city" class="property-city pb30">
        <div class="container">
            <div class="row features_row">
                <div class="col-sm-6 col-lg-3 col-xl-3 p0">
                    <div class="why_chose_us home6">
                        <div class="icon">
                            <span class="flaticon-house-1"></span>
                        </div>
                        <div class="details">
                            <h4>Modern Villa</h4>
                            <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 col-xl-3 p0">
                    <div class="why_chose_us home6">
                        <div class="icon">
                            <span class="flaticon-house"></span>
                        </div>
                        <div class="details">
                            <h4>Family House</h4>
                            <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 col-xl-3 p0">
                    <div class="why_chose_us home6">
                        <div class="icon">
                            <span class="flaticon-house-2"></span>
                        </div>
                        <div class="details">
                            <h4>Town House</h4>
                            <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 col-xl-3 p0">
                    <div class="why_chose_us home6 bdrrn">
                        <div class="icon">
                            <span class="flaticon-building"></span>
                        </div>
                        <div class="details">
                            <h4>Apartment</h4>
                            <p>Aliquam dictum elit vitae mauris facilisis, at dictum urna.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center">
                        <h2>Find Properties in These Cities</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="property_city_home6">
                        <div class="thumb"><img class="w100" src="/frontend/findhouse/images/property/pc18.jpg" alt="pc18.jpg"></div>
                        <div class="details">
                            <h4>Miami</h4>
                            <p>24 Properties</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="property_city_home6">
                        <div class="thumb"><img class="w100" src="/frontend/findhouse/images/property/pc19.jpg" alt="pc19.jpg"></div>
                        <div class="details">
                            <h4>Los Angeles</h4>
                            <p>18 Properties</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="property_city_home6">
                        <div class="thumb"><img class="w100" src="/frontend/findhouse/images/property/pc20.jpg" alt="pc20.jpg"></div>
                        <div class="details">
                            <h4>New York</h4>
                            <p>89 Properties</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="property_city_home6">
                        <div class="thumb"><img class="w100" src="/frontend/findhouse/images/property/pc21.jpg" alt="pc21.jpg"></div>
                        <div class="details">
                            <h4>Florida</h4>
                            <p>47 Properties</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="property_city_home6">
                        <div class="thumb"><img class="w100" src="/frontend/findhouse/images/property/pc22.jpg" alt="pc22.jpg"></div>
                        <div class="details">
                            <h4>Orlando</h4>
                            <p>18 Properties</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                    <div class="property_city_home6">
                        <div class="thumb"><img class="w100" src="/frontend/findhouse/images/property/pc23.jpg" alt="pc23.jpg"></div>
                        <div class="details">
                            <h4>Atlanta</h4>
                            <p>89 Properties</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modern Apertment -->
    <section class="modern-apertment pt100 pb90">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="modern_apertment mt30">
                        <h2 class="title">Modern Apartment</h2>
                        <h4 class="subtitle">$79 at night</h4>
                        <p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a class="btn booking_btn btn-thm" href="#">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Agents -->
    <section id="our-agents" class="our-agents pt40 pb15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title mb30">
                        <h2>Our Agents</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a class="float-right" href="#">View All <span class="flaticon-next"></span></a></p>
                    </div>
                </div>
            </div>
            <div class="row" style="overflow:hidden">
                <div class="col-lg-12">
                    <div class="our_agents_home6_slider">
                        <div class="item">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/team/5.jpg" alt="5.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Jennifer Barton</h4>
                                    <p>Broker <a class="float-right" href="#">4.5 <i class="fa fa-star color-golden"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/team/6.jpg" alt="6.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Kathleen Myers</h4>
                                    <p>Agent <a class="float-right" href="#">5 <i class="fa fa-star color-golden"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/team/7.jpg" alt="7.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Mariusz Ciesla</h4>
                                    <p>Broker <a class="float-right" href="#">3.5 <i class="fa fa-star color-golden"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/team/8.jpg" alt="8.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Helene Powers</h4>
                                    <p>Broker <a class="float-right" href="#">4.5 <i class="fa fa-star color-golden"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/team/9.jpg" alt="9.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Jade Northon</h4>
                                    <p>Agent <a class="float-right" href="#">1.5 <i class="fa fa-star color-golden"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="/frontend/findhouse/images/team/10.jpg" alt="10.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Kevin Harris</h4>
                                    <p>Agent <a class="float-right" href="#">3.5 <i class="fa fa-star color-golden"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Blog -->
    <section class="our-blog bb1 py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center">
                        <h2>Articles & Tips</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="for_blog feat_property">
                        <div class="thumb">
                            <img class="img-whp" src="/frontend/findhouse/images/blog/bh1.jpg" alt="bh1.jpg">
                        </div>
                        <div class="details">
                            <div class="tc_content">
                                <p class="text-thm">Business</p>
                                <h4>Skills That You Can Learn In The Real Estate Market</h4>
                            </div>
                            <div class="fp_footer">
                                <ul class="fp_meta float-left mb0">
                                    <li class="list-inline-item"><a href="#"><img src="/frontend/findhouse/images/property/pposter1.png" alt="pposter1.png"></a></li>
                                    <li class="list-inline-item"><a href="#">Ali Tufan</a></li>
                                </ul>
                                <a class="fp_pdate float-right" href="#">7 August 2019</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="for_blog feat_property">
                        <div class="thumb">
                            <img class="img-whp" src="/frontend/findhouse/images/blog/bh2.jpg" alt="bh2.jpg">
                        </div>
                        <div class="details">
                            <div class="tc_content">
                                <p class="text-thm">Business</p>
                                <h4>Bedroom Colors You’ll Never <br class="dn-1199"> Regret</h4>
                            </div>
                            <div class="fp_footer">
                                <ul class="fp_meta float-left mb0">
                                    <li class="list-inline-item"><a href="#"><img src="/frontend/findhouse/images/property/pposter1.png" alt="pposter1.png"></a></li>
                                    <li class="list-inline-item"><a href="#">Ali Tufan</a></li>
                                </ul>
                                <a class="fp_pdate float-right" href="#">7 August 2019</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4">
                    <div class="for_blog feat_property">
                        <div class="thumb">
                            <img class="img-whp" src="/frontend/findhouse/images/blog/bh3.jpg" alt="bh3.jpg">
                        </div>
                        <div class="details">
                            <div class="tc_content">
                                <p class="text-thm">Business</p>
                                <h4>5 Essential Steps for Buying an Investment</h4>
                            </div>
                            <div class="fp_footer">
                                <ul class="fp_meta float-left mb0">
                                    <li class="list-inline-item"><a href="#"><img src="/frontend/findhouse/images/property/pposter1.png" alt="pposter1.png"></a></li>
                                    <li class="list-inline-item"><a href="#">Ali Tufan</a></li>
                                </ul>
                                <a class="fp_pdate float-right" href="#">7 August 2019</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Partners -->
    <section id="our-partners" class="our-partners py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="main-title text-center">
                        <h2>Our Partners</h2>
                        <p>We only work with the best companies around the globe</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg">
                    <div class="our_partner">
                        <img class="img-fluid" src="/frontend/findhouse/images/partners/1.png" alt="1.png">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg">
                    <div class="our_partner">
                        <img class="img-fluid" src="/frontend/findhouse/images/partners/2.png" alt="2.png">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg">
                    <div class="our_partner">
                        <img class="img-fluid" src="/frontend/findhouse/images/partners/3.png" alt="3.png">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg">
                    <div class="our_partner">
                        <img class="img-fluid" src="/frontend/findhouse/images/partners/4.png" alt="4.png">
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg">
                    <div class="our_partner">
                        <img class="img-fluid" src="/frontend/findhouse/images/partners/5.png" alt="5.png">
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- main-area-end -->
@endsection
@push('scripts')
    {!! $homeSchemaMarkup->toScript() !!}
@endpush
