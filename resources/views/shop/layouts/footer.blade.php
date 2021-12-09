<!-- Footer -->
<!-- Our Footer -->
<section class="footer_one home6 py-5 bgc-f7">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pr0 pl0">
                <div class="footer_about_widget home6">
                    <p>{!! setting('store_description', __('LAPO chuyên cung cấp các dịch vụ website như thiết kế website chuyên nghiệp, dịch vụ bán website giá rẻ, dịch vụ thuê website, thiết kế logo, bộ nhận diện thương hiệu, dịch vụ quản trị website. Hỗ trợ chủ doanh nghiệp, chủ cửa hàng, cá nhân mở rộng phát triển kinh doanh trên internet')) !!}</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_qlink_widget home6">
                    <h4>{{ __('Liên kết') }}</h4>
                    <ul class="list-unstyled">
                        @if($menuFooter1->isNotEmpty())
                            @foreach($menuFooter1 as $menu)
                                <li><a href="{{ $menu->urlMenu() }}">{{ $menu->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_qlink_widget home6">
                    <h4>{{ __('Danh mục') }}</h4>
                    <ul class="list-unstyled">
                        @if($menuFooter2->isNotEmpty())
                            @foreach($menuFooter2 as $menu)
                                <li><a href="{{ $menu->urlMenu() }}">{{ $menu->name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="footer_qlink_widget home6">
                    <h4>{{ __('Liện hệ với chúng tôi') }}</h4>
                    <ul class="list-unstyled">
                        <li><a href="">{{ setting('store_phone') }}</a></li>
                        <li><a href="mailto:{{ setting('store_email') }}">{{ setting('store_email') }}</a></li>
                        <li><a href="">{{ setting('store_address') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Footer Bottom Area -->
<section class="footer_middle_area home6 py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="footer_menu_widget home6">

                </div>
            </div>
            <div class="col-lg-8 col-xl-8">
                <div class="copyright-widget home6 text-right">
                    <p>{{ __('Bản quyển thuộc') }} &copy; {{ date('Y') }} <a href="{{ route('home') }}">{{ setting('store_name', 'LAPO.VN') }} {{ setting('store_slogan', 'Dịch vụ Website uy tín') }}.</a> {{ __('Được phát triển và duy trì bởi') }} <a
                            href="https://lapo.vn" target="_blank">LAPO.VN</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
{{--<footer class="footer-bg footer-p">--}}
{{--    <div class="overly"><img src="{{ asset('frontend/img/an-bg/footer-bg.png') }}" alt="rest"></div>--}}
{{--    <div class="footer-top pb-30" style="background-color: #ECF1FA;">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-between">--}}

{{--                <div class="col-xl-3 col-lg-3 col-sm-6">--}}
{{--                    <div class="footer-widget mb-30">--}}
{{--                        <div class="flog mb-35">--}}
{{--                            @if(setting('store_logo'))--}}
{{--                                <a href="{{ route('home') }}"><img--}}
{{--                                        src="{{ \Storage::url(setting('store_logo')) }}"--}}
{{--                                        alt="logo"></a>--}}
{{--                            @else--}}
{{--                                <a href="{{ route('home') }}">--}}
{{--                                    <span>{{ setting('store_name') }}</span>--}}
{{--                                </a>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div class="footer-text mb-20">--}}
{{--                            <p>{!! setting('store_description', __('LAPO chuyên cung cấp các dịch vụ website như thiết kế website chuyên nghiệp, dịch vụ bán website giá rẻ, dịch vụ thuê website, thiết kế logo, bộ nhận diện thương hiệu, dịch vụ quản trị website. Hỗ trợ chủ doanh nghiệp, chủ cửa hàng, cá nhân mở rộng phát triển kinh doanh trên internet')) !!}</p>--}}
{{--                        </div>--}}
{{--                        <div class="footer-social">--}}
{{--                            <a href="{{ setting('link_facebook') }}" target="_blank" title="Facebook"><i--}}
{{--                                    class="fab fa-facebook"></i></a>--}}
{{--                            <a href="{{ setting('link_youtube') }}" target="_blank" title="Youtube"><i--}}
{{--                                    class="fab fa-youtube"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="col-xl-2 col-lg-2 col-sm-6">--}}
{{--                    <div class="footer-widget mb-30">--}}
{{--                        <div class="f-widget-title">--}}
{{--                            <h5>{{ __('Liên kết') }}</h5>--}}
{{--                        </div>--}}
{{--                        <div class="footer-link">--}}
{{--                            <ul>--}}
{{--                                @if($menuFooter1->isNotEmpty())--}}
{{--                                    @foreach($menuFooter1 as $menu)--}}
{{--                                        <li>--}}
{{--                                            <a href="{{ $menu->urlMenu() }}"><i--}}
{{--                                                    class="fas fa-chevron-right"></i> {{ $menu->name }}</a>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-2 col-lg-2 col-sm-6">--}}
{{--                    <div class="footer-widget mb-30">--}}
{{--                        <div class="f-widget-title">--}}
{{--                            <h5>{{ __('Danh mục') }}</h5>--}}
{{--                        </div>--}}
{{--                        <div class="footer-link">--}}
{{--                            <ul>--}}
{{--                                @if($menuFooter2->isNotEmpty())--}}
{{--                                    @foreach($menuFooter2 as $menu)--}}
{{--                                        <li>--}}
{{--                                            <a href="{{ $menu->urlMenu() }}"><i--}}
{{--                                                    class="fas fa-chevron-right"></i> {{ $menu->name }}</a>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-3 col-sm-6">--}}
{{--                    <div class="footer-widget mb-30">--}}
{{--                        <div class="f-widget-title">--}}
{{--                            <h5>{{ __('Liện hệ với chúng tôi') }}</h5>--}}
{{--                        </div>--}}
{{--                        <div class="footer-link">--}}
{{--                            <div class="f-contact">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <i class="icon dripicons-phone"></i>--}}
{{--                                        <span>{{ setting('store_phone') }}</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <i class="icon dripicons-mail"></i>--}}
{{--                                        <span><a--}}
{{--                                                href="mailto:{{ setting('store_email') }}">{{ setting('store_email') }}</a></span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <i class="fal fa-map-marker-alt"></i>--}}
{{--                                        <span>{{ setting('store_address') }}</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="copyright-wrap">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="copyright-text text-center">--}}
{{--                        <p>{{ __('Bản quyển thuộc') }} &copy; {{ date('Y') }} <a href="{{ route('home') }}">{{ setting('store_name', 'LAPO.VN') }} {{ setting('store_slogan', 'Dịch vụ Website uy tín') }}.</a> {{ __('Được phát triển và duy trì bởi') }} <a--}}
{{--                                href="https://lapo.vn" target="_blank">LAPO.VN</a></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
<!-- Footer-end -->
