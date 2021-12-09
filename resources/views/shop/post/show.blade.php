@extends('shop.layouts.app')
@section('title')
    {{ $post->title }}
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
    <meta name="title" content="{{ $post->title }}">
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords" content="{{ $post->meta_keywords }}">
    <meta property="og:url" content="{{ request()->fullUrl() }}">
    <meta property="og:title" content="{{ $post->meta_title }}">
    <meta property="og:description" content="{{ $post->meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ $post->getFirstMediaUrl('image') }}">
    <meta property="og:site_name" content="{{ url('') }}">
@stop
@push('styles')
@endpush
@section('content')
    <!-- main-area -->
    <section class="blog_post_container bgc-f7">
        <div class="containerx px-md-3 px-sm-5 px-3">
            <div class="row">
                <div class="col-xl-6">
                    <div class="breadcrumb_content my-4 style2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Simple Listing – Grid View</li>
                        </ol>
                        <h2 class="breadcrumb_title">Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="for_blog feat_property">
                                <div class="thumb">
                                    <img class="img-whp"
                                        src="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}"
                                        alt="">
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <h4>{{ $post->title }}</h4>
                                        <ul class="bpg_meta">
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-calendar"></i></a></li>
                                            <li class="list-inline-item"><a href="#">{{ formatDate($post->created_at) }}</a></li>
                                        </ul>
                                        <p>{!! $post->body !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="terms_condition_widget">
                        @if($taxons->isNotEmpty())
                            <h4 class="title">{{ __('Danh mục bài viết') }}</h4>
                            <div class="widget_list">
                                <ul class="list_details">
                                    @foreach($taxons as $taxon)
                                        <li class="{{ count($taxon->childs) > 0 ? 'has-sub' : '' }}">
                                            <a href="{{ $taxon->urlPost() }}">{{ $taxon->name }}</a>
                                            <ul class="danhmuc">
                                                @if(count($taxon->childs) > 0)
                                                    @foreach($taxon->childs as $child)
                                                        <li>
                                                            <a href="{{ $child->urlPost() }}">{{ $child->name }}</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    @if(count($postNews) > 0)
                        <div class="sidebar_feature_listing">
                            <h4 class="title">{{ __('Bài viết mới nhất') }}</h4>
                            @foreach($postNews as $postNew)
                                <div class="media">
                                    <img class="align-self-start mr-3" src="{{ $postNew->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}" alt="fls1.jpg">
                                    <div class="media-body">
                                        <h5 class="mt-0 post_title"><a href="{{ $postNew->url() }}">{{ $postNew->title }}</a></h5>
                                        <span>
                                            <i class="far fa-clock"></i> {{ formatDate($postNew->created_at) }}
                                        </span><br/>
                                        <span>
                                            <i class="far fa-user"></i> {{ $post->user->fullname }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
{{--    <main>--}}
{{--        <!-- breadcrumb-area -->--}}
{{--    <!-- breadcrumb-area-end -->--}}
{{--        <!-- inner-blog -->--}}
{{--        <section class="inner-blog b-details-p pt-100 pb-50">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-8">--}}
{{--                        <div class="blog-details-wrap">--}}
{{--                            <div class="bsingle__post-thumb mb-30">--}}
{{--                                <img--}}
{{--                                    src="{{ $post->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}"--}}
{{--                                    alt="">--}}
{{--                            </div>--}}
{{--                            <div class="meta__info">--}}
{{--                                <ul>--}}
{{--                                    <li><a href="#"> <i--}}
{{--                                                class="far fa-calendar-alt"></i> {{ formatDate($post->created_at) }}--}}
{{--                                        </a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="details__content pb-50">--}}
{{--                                <h2>{{ $post->title }}</h2>--}}
{{--                                <p>--}}
{{--                                    {!! $post->body !!}--}}
{{--                                </p>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xl-6 col-md-7">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-xl-6 col-md-5">--}}
{{--                                        <div class="post__share text-right">--}}
{{--                                            <h5>{{ __('Mạng Xã Hội') }}</h5>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="{{ setting('link_facebook') }}" target="_blank"--}}
{{--                                                       title="Facebook"><i class="fab fa-facebook"></i></a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="{{ setting('link_youtube') }}"--}}
{{--                                                       target="_blank" title="Youtube"><i--}}
{{--                                                            class="fab fa-youtube"></i></a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="related__post mt-45 mb-85">--}}
{{--                                <div class="post-title">--}}
{{--                                    <h4>{{ __('Bài viết liên quan') }}</h4>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    @if(count($relatedPosts) > 0)--}}
{{--                                        @foreach($relatedPosts as $relatedPost)--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="related-post-wrap mb-30">--}}
{{--                                                    <div class="post-thumb">--}}
{{--                                                        <img width="80px"--}}
{{--                                                             src="{{ $relatedPost->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}"--}}
{{--                                                             alt="">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="rp__content">--}}
{{--                                                        <h3>--}}
{{--                                                            <a href="{{ $relatedPost->url() }}">{{ $relatedPost->title }}</a>--}}
{{--                                                        </h3>--}}
{{--                                                        <p>{!! $post->description !!}</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-4">--}}
{{--                        <aside>--}}
{{--                            @if($taxons->isNotEmpty())--}}
{{--                                <div class="widget mb-40">--}}
{{--                                    <div class="widget-title text-center">--}}
{{--                                        <h4>{{ __('Danh mục bài viết') }}</h4>--}}
{{--                                    </div>--}}
{{--                                    <ul class="cat__list">--}}
{{--                                        @foreach($taxons as $taxon)--}}
{{--                                            <li class="{{ count($taxon->childs) > 0 ? 'has-sub' : '' }}">--}}
{{--                                                <a href="{{ $taxon->urlPost() }}">{{ $taxon->name }}</a>--}}
{{--                                                <ul>--}}
{{--                                                    @if(count($taxon->childs) > 0)--}}
{{--                                                        @foreach($taxon->childs as $child)--}}
{{--                                                            <li>--}}
{{--                                                                <a href="{{ $child->urlPost() }}">{{ $child->name }}</a>--}}
{{--                                                            </li>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                </ul>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            @endif--}}

{{--                            @if(count($postNews) > 0)--}}
{{--                                <div class="widget mb-40">--}}
{{--                                    <div class="widget-title text-center">--}}
{{--                                        <h4>{{ __('Bài viết mới nhất') }}</h4>--}}
{{--                                    </div>--}}
{{--                                    <div class="widget__post">--}}
{{--                                        <ul>--}}
{{--                                            @foreach($postNews as $postNew)--}}
{{--                                                <li>--}}
{{--                                                    <div class="widget__post-thumb">--}}
{{--                                                        <img width="80px"--}}
{{--                                                             src="{{ $postNew->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg' }}"--}}
{{--                                                             alt="">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="widget__post-content">--}}
{{--                                                        <h6><a href="{{ $postNew->url() }}">{{ $postNew->title }}</a>--}}
{{--                                                        </h6>--}}
{{--                                                        <span><i class="far fa-clock"></i>{{ formatDate($postNew->created_at) }}</span>--}}
{{--                                                        <span><i--}}
{{--                                                                class="far fa-user"></i>{{ $post->user->fullname }}</span>--}}
{{--                                                    </div>--}}
{{--                                                </li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="widget mb-40">--}}
{{--                                    <div class="widget-title text-center">--}}
{{--                                        <h4>{{ __('Đăng ký nhận bản tin') }}</h4>--}}
{{--                                    </div>--}}
{{--                                    <form class="widget__post" action="{{ route('contact.subscribe_email') }}" method="post"--}}
{{--                                          id="subscribe-email-form">--}}
{{--                                        @csrf--}}
{{--                                        <div class="contact-field p-relative c-subject mb-20">--}}
{{--                                            <input type="email" name="email"--}}
{{--                                                   placeholder="{{ __('Nhập Email (*)') }}">--}}
{{--                                        </div>--}}
{{--                                        <div class="slider-btn text-center">--}}
{{--                                            <button type="submit" class="btn ss-btn" data-animation="fadeInRight"--}}
{{--                                                    data-delay=".8s">{{ __('Đăng ký') }}</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </aside>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <!-- inner-blog-end -->--}}
{{--    </main>--}}
    <!-- main-area-end -->
@endsection
@push('scripts')
    {!! $postSchemaMarkup->toScript() !!}
@endpush
