@extends('shop.layouts.app')
@section('title')
    {{ __('Liên hệ với chúng tôi') }}
    @if(!empty(setting('store_name')))
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
    <meta name="title" content="{{ __('Liên hệ với chúng tôi') }}">
    <meta name="description" content="{{ setting('store_description') }}">
    <meta name="keywords" content="{{ setting('store_name') }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="{{ __('Liên hệ với chúng tôi') }}">
    <meta property="og:title" content="{{ setting('store_name') }} - {{ setting('store_slogan') }}">
    <meta property="og:description" content="{{ setting('store_description') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ setting('store_logo') ? \Storage::url(setting('store_logo')) : '' }}">
    <meta property="og:site_name" content="{{ url('') }}">
@stop
@section('content')
    <!-- main-area -->
    <main>
        <!-- breadcrumb-area -->

        <!-- breadcrumb-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area contact-bg pt-100 pb-70 p-relative fix" style="background-image:url(img/an-bg/an-bg11.png); background-size: cover;background-repeat: no-repeat;">
            <div class="container">

                <div class="row">
                    <div class="col-lg-7 col-xl-8">
                        <div class="form_grid">
                            <h4 class="mb5">{{ __('Liên hệ với chúng tôi') }}</h4>
                            <form class="contact_form" id="contact_form" action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="first_name" class="form-control" required="required" type="text" placeholder="{{ __('Họ (*)') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="last_name" class="form-control" required="required" type="text" placeholder="{{ __('Tên (*)') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email" class="form-control required email" required="required" type="text" placeholder="{{ __('Email (*)') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="phone" class="form-control required phone" required="required" type="text" placeholder="{{ __('Số điện thoại (*)') }}" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="title" class="form-control required" required="required" type="text" placeholder="{{ __('Tiêu đề (*)') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea id="message" name="message" class="form-control required" rows="8" required="required" placeholder="{{ __('Nội dung (*)') }}"></textarea>
                                        </div>
                                        <div class="form-group mb0">
                                            <button type="submit" class="btn btn-lg btn-thm" data-animation="fadeInRight" data-delay=".8s">{{ __('Gửi') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- contact-area-end -->
         <!-- brand-area -->

        <!-- brand-area-end -->
    </main>
    <!-- main-area-end -->
@endsection
