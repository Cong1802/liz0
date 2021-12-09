@extends('shop.layouts.app')
@section('title')
    {{ $page->title }} @if(!empty(setting('store_name')))
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
    <meta name="title" content="{{ $page->title }}">
    <meta name="description" content="{{ $page->meta_description }}">
    <meta name="keywords" content="{{ $page->meta_keywords }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="{{ $page->meta_title }}">
    <meta property="og:description" content="{{ $page->meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ setting('store_logo') ? \Storage::url(setting('store_logo')) : '' }}">
    <meta property="og:site_name" content="{{ url('') }}">
@stop
@section('content')
    <!-- main-area -->
    <div class="wrapper mm-page mm-slideout" id="mm-0">
        <section class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="main-title text-center">
                            <h2 class="mt0">{{ $page->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-xl-7">
                        <div class="about_content">
                            {!! $page->body !!}--}}
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-5">
                        <div class="about_thumb">
                            <img class="img-fluid w100" src="images/about/1.jpg" alt="1.jpg">
                            <a class="popup-iframe popup-youtube color-white" href="https://www.youtube.com/watch?v=R7xbhKIiw4Y"><i class="flaticon-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    {!! $pageSchemaMarkup->toScript() !!}
@endpush
