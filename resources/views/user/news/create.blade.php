@extends('shop.layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/findhouse/css/news.css') }}">
@endpush

@push('scripts')
<script>
function initSelect2(wards, district, city, dropdownParent) {
    let registerWardSelect = wards.select2({
        placeholder: 'Chọn phường:',
        width: '100%',
        dropdownParent: dropdownParent
    });
    let registerDistrictSelect = district.select2({
        placeholder: 'Chọn quận',
        width: '100%',
        dropdownParent: dropdownParent
    }).on("change", function(e) {
        var data = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/search-ward?q=' + data,
            success: function(data) {
                registerWardSelect.empty();
                data.forEach(function(option) {
                    let opt = new Option(option.text, option.id, false, false);
                    registerWardSelect.append(opt);
                });
                registerWardSelect.trigger('change');
            },
            error: function() {
                toastr.error('Có lỗi xảy ra');
            }
        });

    });

    city.select2({
        placeholder: 'Chọn thành phố',
        width: '100%',
        dropdownParent: dropdownParent
    }).on("select2:select", function(e) {
        var data = e.params.data;
        $.ajax({
            type: 'GET',
            url: '/search-district?q=' + data.id,
            success: function(data) {
                registerDistrictSelect.empty();
                registerWardSelect.empty();
                data.forEach(function(option) {
                    let opt = new Option(option.text, option.id, false, false);
                    registerDistrictSelect.append(opt);
                });
                registerDistrictSelect.trigger('change');
            },
            error: function() {
                toastr.error('Có lỗi xảy ra');
            }
        });
    });
}

initSelect2($('#wards'), $('#district'), $('#city'), $('#add-address-form'));
</script>
@endpush
@section('content')
<div class="create-article">
    <div class="container px-lg-0">
        <div class="breadcrumb-block py-4 col-xl-9 col-12">
            <ul class="breadcrumb list-unstyled mb-0">
                <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="">Đăng tin</a></li>
            </ul>
        </div>

        <form method="post">
            @csrf
            <div class="article-form">
                <div id="article_location" class="row mb-3 justify-content-center">
                    <div class="col-xl-9 col-12">
                        <div class="content-block" style="padding-left: 28px; padding-right: 9px;">
                            <div class="article-location">
                                <div class="justify-content-between align-items-center mb-12">
                                    <div
                                        class="header_title font-lg py-2 border-header text-uppercase text-black font-extra-bold w-100 text-left">
                                        <ion-icon name="paper-plane"></ion-icon> Chọn vị trí
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="font-base mb-2"><span class="text-black">Tên dự án</span></div>
                                            <div class="my_profile_setting_input form-group">
                                                <input type="text" class="form-control" name="name"
                                                    placeholder="Tên dự án">
                                                @error('name')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div id="cityIdLabel" class="font-base mb-2"><span class="text-black">Tỉnh/
                                                    Thành phố <span class="text-danger">*</span></span></div>
                                            <div class="my_profile_setting_input form-group">
                                                <select class="form-control select2" id="city" name="province" required>
                                                    <option value="">Vui lòng chọn tỉnh / thành phố</option>
                                                    @foreach($provices as $city)
                                                    <option value="{{ $city->code }}">
                                                        {{ $city->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('province')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div id="districtIdLabel" class="font-base mb-2"><span
                                                    class="text-black">Quận/
                                                    Huyện <span class="color-required">*</span></span></div>
                                            <div class="my_profile_setting_input form-group">
                                                <select class="form-control select2" id="district" name="district" required><option value="">Vui lòng chọn quận / huyện</option></select>
                                                @error('district')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="font-base mb-2"><span class="text-black">Phường/ Xã</span></div>
                                            <div class="my_profile_setting_input form-group">
                                                <select class="form-control select2" id="wards" name="ward" required><option value="">Vui lòng chọn phường / xã</option></select>
                                                @error('ward')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="font-base mb-2"><span class="text-black">Địa chỉ cụ thể</span>
                                            </div>
                                            <div class="my_profile_setting_input form-group">
                                                <input type="text" class="form-control" name="address"
                                                    placeholder="Số nhà, tên tòa nhà, tên đường">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="article_info" class="row mb-3 justify-content-center">
                    <div class="col-xl-9 col-12">
                        <div class="content-block">
                            <div class="article-info">
                                <div
                                    class="font-lg text-uppercase border-header py-2 text-black font-extra-bold w-100 text-left">
                                    <ion-icon name="logo-buffer"></ion-icon> Thông tin bất động sản
                                </div>
                                <div class="info-bds-detail">
                                    <div class="wrap-users-type">
                                        <div class="d-md-flex my-3 d-block align-items-baseline">
                                            <div id="creatorTypeLabel" class="label-object font-base text-black">
                                                Đối tượng <span class="text-danger">*</span></div>
                                            <div class="users-type d-md-flex d-inline select-create-article">
                                                <div>
                                                    <label class="custom-radio mb-0 d-flex align-items-center"
                                                        for="tyqk7uxkms">
                                                        <input type="radio" name="type_user" class="radio__input"
                                                            value="0" id="tyqk7uxkms">
                                                        <div class="radio__radio"></div>
                                                        <span class="text">Tôi là môi giới</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="custom-radio mb-0 d-flex align-items-center"
                                                        for="9jkqw32ar4">
                                                        <input type="radio" name="type_user" class="radio__input"
                                                            value="1" id="9jkqw32ar4">
                                                        <div class="radio__radio"></div>
                                                        <span class="text">Tôi là chính chủ</span>
                                                    </label>

                                                </div>

                                            </div>
                                        </div> @error('type_user')
                                        <span class="form-text text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="row wrap-type-house">
                                        <div class="col-md-6 col-12">
                                            <div>Nhu cầu <span class="text-danger" style="margin-right:50px">*</span>
                                            </div>
                                            <div class="my_profile_setting_input form-group">
                                                <select name="type_service" class="form-control select2">
                                                    <option class="form-control" value="Cần bán">Cần bán</option>
                                                    <option class="form-control" value="Cần mua">Cần mua</option>
                                                    <option class="form-control" value="Cho thuê">Cho thuê</option>
                                                    <option class="form-control" value="Cần thuê">Cần thuê</option>
                                                    <option class="form-control" value="Sang nhượng">Sang nhượng
                                                    </option>
                                                    <option class="form-control" value="Mua sang nhượng">Mua sang nhượng
                                                    </option>
                                                </select>
                                                @error('type_service')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div>Loại nhà đất <span class="text-danger"
                                                    style="margin-right:50px">*</span>
                                            </div>
                                            <div class="my_profile_setting_input form-group">
                                                <select name="type_house" id="" class="form-control select2">
                                                    <option class="form-control" value="">Chọn loại nhà đất</option>
                                                    <option class="form-control" value="0">Nhà ở</option>
                                                    <option class="form-control" value="1">Nhà cấp 4</option>
                                                    <option class="form-control" value="2">Đất - Đất nền - Nhà như đất
                                                    </option>
                                                    <option class="form-control" value="3">Biệt thự - Song lập - Đơn lập
                                                    </option>
                                                    <option class="form-control" value="4">Nhà liền kề - Song lập - Đơn
                                                        lập
                                                    </option>
                                                    <option class="form-control" value="5">Chung cư</option>
                                                    <option class="form-control" value="6">Chung cư mini</option>
                                                    <option class="form-control" value="7">Tập thể</option>
                                                    <option class="form-control" value="8">Căn hộ cho thuê</option>
                                                    <option class="form-control" value="7">Căn hộ du lịch - Condotel
                                                    </option>
                                                </select>
                                                @error('type_house')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div><br>
                                    <div class="row wrap-area-price align-items-baseline">
                                        <div class="col-lg-6 p-0 col-12">
                                            <div class="d-flex flex-wrap align-items-center">
                                                <div class="col-sm-6 col-12">
                                                    <div class="font-base text-black mr-0 ml-0"
                                                        style="min-width: 136px;">
                                                        Diện tích đất (m2)
                                                    </div>
                                                    <div><input type="text" name="total_area" placeholder="0" min="1"
                                                            class="custom-input pl-3">
                                                        @error('total_area')
                                                        <span class="form-text text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <div class="font-base text-black">
                                                        Sử dụng&nbsp;
                                                    </div>
                                                    <div><input type="text" name="used_area" placeholder="0" min="1"
                                                            class="custom-input pl-3">
                                                        @error('used_area')
                                                        <span class="form-text text-danger">
                                                            {{ $message }}
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                                            <div>
                                                <div class="title-price text-black mb-1">
                                                    Đơn giá:
                                                    <span>0 đ/m2</span>
                                                </div>
                                                <div class="d-flex">
                                                    <div
                                                        class="my_profile_setting_input w-100 align-items-end d-flex form-group">
                                                        <input type="number" name="price_house" step="any"
                                                            placeholder="0" min="0"
                                                            style="width:60px;margin-right:-10px"
                                                            class="custom-input pl-3 input-price">
                                                        <select id="" name="currency" class="form-control select2"
                                                            style=" width: 250px;">
                                                            <option class="form-control" value="Tỷ">Tỷ</option>
                                                            <option class="form-control" value="Triệu">Triệu</option>
                                                        </select>

                                                    </div>

                                                </div>
                                                @error('price_house')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="negotiate d-sm-flex d-block">
                                                <label
                                                    class="custom-checkbox d-flex align-items-center mr-2 pl-20 font-sm">
                                                    <input type="checkbox" class="checkbox_input far fa-check"
                                                        name="negotiate">
                                                    <span class="text ml-2" style="font-size:12px"> Có thể thương
                                                        lượng</span>
                                                    <div class="checkbox_checkbox "></div>
                                                </label>
                                                <label
                                                    class="custom-checkbox d-flex align-items-center pl-sm-4 pl-0 font-sm">
                                                    <input type="checkbox" class="checkbox_input far fa-check"
                                                        name="showPrice">
                                                    <span class="text ml-2" style="font-size:12px"> Hiển thị đơn giá
                                                        trên tin
                                                        đăng</span>
                                                    <div class="checkbox_checkbox"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="article-content" user="[object Object]">
                                    <div class="d-flex justify-content-between mt-3 align-items-center mb-12">
                                        <div class="text-danger">Tiêu đề <span class="text-danger">*</span>
                                        </div>
                                        <div class="text-desc">0/100 ký tự</div>
                                    </div>
                                    <div class="mb-24">
                                        <textarea name="title" class="form-control" style="height:100px"
                                            placeholder="Tôi cần bán căn hộ chung cư 80m2 tại khu vực Thanh Xuân HN"
                                            class="w-100"></textarea>
                                        @error('title')
                                        <span class="form-text text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-between mt-3 align-items-center mb-12">
                                        <div id="contentLabel" class="text-title text-danger">Mô tả <span
                                                class="text-danger">*</span>
                                        </div>
                                        <div class="text-desc">
                                            0/5000 ký tự
                                        </div>
                                    </div>

                                </div>
                                <div class="mb-24">
                                    <textarea class="form-control" style="height:100px" name="content" maxlength="100"
                                        class="w-100"></textarea>
                                    @error('content')
                                    <span class="form-text text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group my-3 row">
                                    <label class="col-lg-2 text-danger col-form-label text-lg-right"><span
                                            class="text-danger">*</span> {{ __('Ảnh') }}:</label>
                                    <div class="col-lg-9">
                                        <div id="thumbnail">
                                            <div class="single-image">
                                                <div class="image-holder"
                                                    onclick="document.getElementById('image').click();">
                                                    <img id="image_url" width="170" height="170"
                                                        src="/backend/global_assets/images/placeholders/placeholder.jpg" />
                                                </div>
                                            </div>
                                        </div>
                                        <input type="file" name="image" id="image" class="form-control inputfile d-none"
                                            onchange="document.getElementById('image_url').src = window.URL.createObjectURL(this.files[0])">
                                        @error('image')
                                        <span class="form-text text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex my-3 align-items-center">
                                    <span class="mr-3">Tag</span>
                                    <input type="text" data-role="tagsinput" class="form-control" name="tag">
                                </div>
                                <hr class="hr-1 mb-24">
                                
                                <div class="contact-info">
                                    <div class="text-danger">
                                        Thông tin liên hệ
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 col-12">
                                            <div>
                                                <div>Họ và tên <span class="text-danger">*</span></div>
                                                <input type="text" placeholder="Nhập họ tên" name="name_user"
                                                    maxlength="50" class="form-control">
                                                @error('name_user')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="my-2">
                                                <div>Email</div>
                                                <input type="text" placeholder="Email" name="email_user" maxlength="50"
                                                    class="form-control">
                                                @error('email_user')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="my-2" style="margin-bottom:50px">
                                                <Div>Ghi chú</Div>
                                                <textarea class="form-control" style="height:52px"
                                                    placeholder="Liên hệ trước 30 phút khi đến xem nhà" name="note_user"
                                                    id="" cols="10"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div>
                                                <Div>Số điện thoại <span class="text-danger">*</span></Div>
                                                <input type="text" placeholder="Nhập số di động" name="phone_user"
                                                    class="form-control">
                                                @error('phone_user')
                                                <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="d-sm-flex my-2 align-items-center d-block">
                                                <div class="mb-2 mb-sm-0" style="padding-right:40px">Lịch xem nhà </div>
                                                <label
                                                    class="custom-checkbox  mb-0 d-flex align-items-center mr-3 font-bold">
                                                    <input type="checkbox"
                                                        class="far fa-check checkbox_input far fa-check"
                                                        name="seeHouseDirectly" value="true">
                                                    <span class="text  pl-1" style="font-size:14px">Xem trực tiếp</span>
                                                </label>
                                                <label
                                                    class="custom-checkbox mb-0  d-flex align-items-center font-bold "><input
                                                        type="checkbox" class="far fa-check checkbox_input"
                                                        name="seeHouseByVideo" value="true"> <span class="text pl-1"
                                                        style="font-size:14px">Xem live video</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="article_package" class="row justify-content-center">
                    <div class="col-xl-9 col-12">
                        <div class="content-block">
                            <div class="article-package" user="[object Object]">
                                <div class="d-flex justify-content-between article-attribute-title">
                                    <div
                                        class="font-extra-bold border-header py-2 article-package-kind_title text-uppercase w-100">
                                        <ion-icon name="clipboard"></ion-icon> Chọn gói tin đăng
                                    </div>
                                </div>
                                <ul class="list-unstyled my-3 no-wrap d-flex list-radio">
                                    @foreach($package as $key => $list)
                                    @php
                                    $count = ++$key;
                                    @endphp
                                    <li class="mr-2 position-relative choose-package vip{{ $count }} checked-vip{{ $count }}">
                                        <label class="custom-radio m-0 d-flex align-items-center" for="{{ $list->id }}"class="mb-0 font-lg font-extra-bold cusor-pointer">
                                            <input type="radio" class="radio__input d-none" id="{{ $list->id }}" name="package" @if($count==1) checked @endif value="{{ $list->id }}"> 
                                            <div class="radio__radio mr-2"></div>
                                            {{ $list->name }}
                                        </label>
                                        @error('package')
                                        <span class="form-text text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </li>
                                    <script>
                                    $(function() {
                                        $('.vip{{ $count }}').on('click', function() {
                                            $('.ul-tab .tab').addClass("d-none");
                                            $('li.tab{{ $count}}').removeClass("d-none");
                                            $('.name').text("{{ $list->name }}");
                                        })
                                    })
                                    </script>
                                    @endforeach
                                </ul>

                                <!---->

                                <ul class="ul-tab ">
                                    @foreach($package as $key => $list)
                                    @php
                                    $count = ++$key;
                                    @endphp
                                    <li class="tab{{ $count }} @if($count != 1 ) d-none @endif tab">
                                        <div class="article-package-type mb-4">
                                            <div class="row">
                                                <div class="article-package-info m-0 col-md-6 col-12">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="font-lg font-base text-black">
                                                            {!! $list->content !!}
                                                        </li>

                                                        <li class="text-gray font-base"><label
                                                                class="custom-checkbox d-flex align-items-center"><input
                                                                    type="checkbox" name="package_id_later" class="checkbox_input far fa-check"
                                                                    value="{{ $list->id }}"> <span class="ml-2"
                                                                    style="font-size:14px">
                                                                    Chọn
                                                                    <span class="font-bold text-uppercase"
                                                                        style="color: rgb(153, 51, 147);">
                                                                        {{ $list->name }}</span>
                                                                    cho lần đăng tin sau
                                                                </span> <span class="checkmark"></span></label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="article-package-image col-md-6 col-12">
                                                    <div class="img-description-package"><img alt=""
                                                            src="{{ $list->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg'}}"
                                                            style="height:190px;width:465px"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                                <div id="article_package_type"></div>
                                <div class="d-lg-flex d-block mb-20">
                                    <div class="info_package_time"> Số ngày đăng tin
                                        <select name="day_post" id="" class="form-control select-day">
                                            <option value="7">7</option>
                                            <option value="15">15</option>
                                            <option value="30">30</option>
                                            <option value="90">90</option>
                                        </select>
                                        <script>
                                        $('.select-day').on('change', function() {
                                            $('.day').text($(this).val());
                                        })
                                        </script>
                                    </div>
                                    <div class="info_package_time">Ngày đăng bài
                                        <input name="start_post" type="datetime-local" autocomplete="off"
                                            class="form-control">
                                        @error('start_post')
                                        <span class="form-text text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="info_package_time mr-0">Ngày kết thúc
                                        <input name="end_post" type="datetime-local" autocomplete="off"
                                            class="form-control">
                                        @error('end_post')
                                        <span class="form-text text-danger">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div
                                class="d-flex justify-content-between align-items-center info_package_select background-purple-light">
                                <div class="d-flex">
                                    <div class="ml-2">
                                        <div class="font-base font-bold" style="color: rgb(153, 51, 147);">
                                            - Gói <span class="day"> Tin Vip 1 </span> ngày
                                        </div>
                                        <div class="font-sm text-black" style="color: rgb(153, 51, 147);">Từ ngày
                                            26/11/2021</div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-base text-black font-bold">532,000 đ</div>
                                    <div class="font-sm text-black"><span class="text-line-through"
                                            style="margin-right: 4px;">560,000 đ</span>
                                        (-5%)
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex mb-1 justify-content-between">
                                <div class="d-flex">
                                    <div class="mr-2 btn-auto-push-article" style="width: 175px;">Đẩy tin tự động</div>
                                    <div class="custom-control custom-switch custom-control-inline m-0 cusor-pointer">
                                        <input type="checkbox" name="auto_post" id="customSwitchUptin"
                                            class="custom-control-input">
                                        <label for="customSwitchUptin" class="custom-control-label"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="font-base text-black mb-14">
                                Giúp tin của bạn được đẩy lên vị trí mới nhất trong gói tin đã đăng ký, tin đăng sẽ được
                                nhiều người nhìn thấy và BĐS sẽ được giao dịch nhanh hơn.
                                <span class="text-blue text-underline cusor-pointer">Bảng giá đẩy tin</span>
                                <!---->
                            </div>
                            <!---->
                            <!---->
                            <ul class="list-unstyled article-package-price">
                                <li class="font-base text-black mb-2">
                                    Thành tiền (gồm VAT)<span class="float-right">532,000 đ</span></li>
                                <li class="font-base text-black mb-2">
                                    Khuyến mại<span class="float-right">0 đ</span></li>
                                <hr class="my-2">
                                <li class="font-base text-black font-bold">
                                    Thanh toán<span class="float-right">532,000 đ</span></li>
                                <input type="hidden" value="532000" name="price">
                            </ul>
                            <div id="button_post_article" class="text-center justify-content-between article-button">
                                <button class="btn button_post btn-primary">
                                    Đăng tin
                                </button>
                            </div>
                        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
<!---->
<!---->
<!---->
<!---->
<!---->
</div>
@endsection
@push('js')

@endpush