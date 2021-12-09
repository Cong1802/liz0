@extends('shop.layouts.app')

@section('content')
<section class="bg-light">
	<div class="container">
		<div class="breadcrumb_content style2">
			<h2 class="breadcrumb_title">Đăng tin</h2>
		</div>
		<div class="my_dashboard_review">
			<div class="row">
                <div class="row g-3">
                    <div class="col-4">
                        <div>Tên dự án</div>
                        <div class="my_profile_setting_input form-group">
                            <input type="text" class="form-control" id="name" placeholder="Tên dự án">
                        </div>
                    </div>
                    <div class="col-4">
                        <div>Tỉnh/ Thành phố <span class="text-danger">*</span></div>
                        <div class="my_profile_setting_input form-group">
                            <select name="provinces" id="" class="form-control select2" > 
                            @foreach($provices as $list)
                            <option class="form-control" value="{{ $list->code }}">{{ $list->name }}</option> 
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>Quận/ Huyện <span class="text-danger">*</span></div>
                        <div class="my_profile_setting_input form-group">
                            <select name="districts" id="" class="form-control select2" > 
                            @foreach($district as $list)
                            <option class="form-control" value="{{ $list->code }}">{{ $list->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>Phường/ xã <span class="text-danger">*</span></div>
                        <div class="my_profile_setting_input form-group">
                            <select name="districts" id="" class="form-control select2" > 
                            @foreach($ward as $list)
                            <option class="form-control" value="{{ $list->code }}">{{ $list->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>Địa chỉ cụ thể</div>
                        <div class="my_profile_setting_input form-group">
                           <input type="text" class="form-control"  placeholder="Số nhà, tên tòa nhà, tên đường">
                        </div>
                    </div>
                </div>
				  
				 
			</div>
		</div>
		<div class="my_dashboard_review mt30">
		    <div>THÔNG TIN BẤT ĐỘNG SẢN</div>
                <div>
                    Đối tượng <span class="text-danger" style="margin-right:50px">*</span>
                <input type="radio" value="0" style="margin-right:10px">Tôi là môi giới
                <input type="radio" value="1" style="margin-right:10px;margin-left:50px">Chủ đầu tư
                </div>
                <br>
                <div>
                <div class="row">
                    <div class="col-6 d-flex" style="align-items: baseline;">
                        <div>Nhu cầu <span class="text-danger" style="margin-right:50px">*</span></div>
                        <div class="my_profile_setting_input form-group" style="width:300px">
                            <select name="provinces" id="" class="form-control select2" > 
                            <option class="form-control" value="0">Cần bán</option>
                            <option class="form-control" value="1">Cần mua</option>
                            <option class="form-control" value="2">Cho thuê</option>
                            <option class="form-control" value="3">Cần thuê</option>
                            <option class="form-control" value="4">Sang nhượng</option>
                            <option class="form-control" value="5">Mua Sang nhượng</option>
                            </select>
                        </div>
                    </div>
                         <div class="col-6 d-flex" style="align-items: baseline;">
                             <div>Loại nhà đất <span class="text-danger" style="margin-right:50px">*</span></div>
                            <div class="my_profile_setting_input form-group">
                                <select name="provinces" id="" class="form-control select2" style="width:300px"> 
                                <option class="form-control" value="">Chọn loại nhà đất</option>
                                <option class="form-control" value="0">Nhà ở</option>
                                <option class="form-control" value="1">Nhà cấp 4</option>
                                <option class="form-control" value="2">Đất - Đất nền - Nhà như đất</option>
                                <option class="form-control" value="3">Biệt thự - Song lập - Đơn lập</option>
                                <option class="form-control" value="4">Nhà liền kề - Song lập - Đơn lập</option>
                                <option class="form-control" value="5">Chung cư</option>
                                <option class="form-control" value="6">Chung cư mini</option>
                                <option class="form-control" value="7">Tập thể</option>
                                <option class="form-control" value="8">Căn hộ cho thuê</option>
                                <option class="form-control" value="7">Căn hộ du lịch - Condotel</option>
                                </select>
                            </div>
                        </div>
                    </div>
		        </div>
                <div class="d-flex" style="align-items: baseline;">
                <div class="label font-base text-black mr-0 ml-0" style="min-width: 140px;">
                    Diện tích đất (m2)
                </div> 
                <div>
                    <input type="text" placeholder="0" min="1" class="form-control pl-3">
                </div> 
                <div class="label font-base text-black mb-1" style="min-width: 80px;padding-left: 50px;padding-right: 20px;">
                    Sử dụng
                </div> 
                <div>
                    <input type="text" placeholder="0" min="1" class="form-control pl-3">
                </div>
                <div class="label font-base text-black mb-1" style="min-width: 80px;padding-left: 50px;padding-right: 20px;">
                    Giá bán<br>
                </div> 
                <div class="d-flex">
                    <input type="text" placeholder="0" min="1" class="form-control pl-3">
                    <input type="checkbox" id="negotiate" name="negotiate" value="0">
                    <label class="text-primary" for="negotiate"> Có thể thương lượng</label><br>
                    <input type="checkbox" id="price" name="price" value="1">
                    <label class="text-primary" for="price"> Hiển thị đơn giá trên tin đăng</label><br>
                </div>
                </div>
            </div>
	    </div>
         
	</section>
@endsection
