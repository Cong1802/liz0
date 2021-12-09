@extends('shop.layouts.app')
@section('title')
    {{ __('Không tìm thấy trang') }} @if(!empty(setting('store_name')))
        -
    @endif
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
    <meta property="og:site_name" content="{{ route('home') }}">
@stop
@section('content')
{{--    <main>--}}
{{--        <div class="container">--}}
{{--            <div class="mt-5 mb-3">--}}
{{--                <h1>{{ __('404') }}</h1>--}}
{{--                <h2>{{ __('Rất tiếc, không tìm thấy trang này!') }}</h2>--}}
{{--                <div class="text">{{ __('Không thể tìm thấy những gì bạn cần. Vui lòng quay lại ') }} <a href="{{ route('home') }}">{{ __('Trang chủ') }}</a> !</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}
    <section class="our-error bgc-f7">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="error_page footer_apps_widget">
                        <img class="img-fluid" src="{{ asset('frontend/findhouse/images/resource/error.png')}}" alt="error.png">
                        <div class="erro_code"><h1>{{ __('Rất tiếc, không tìm thấy trang này!') }}</h1></div>
                        <p>{{ __('Không thể tìm thấy những gì bạn cần. Vui lòng quay lại ') }}</p>
                    </div>
                    <a class="btn btn_error btn-thm" href="{{ route('home') }}">{{ __('Trang chủ') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
