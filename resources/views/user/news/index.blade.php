@extends('shop.layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/findhouse/css/news.css') }}">
@endpush
@section('content')
<div class="create-article">
    <div class="container   position-relative">
        <div class="breadcrumb-block px-2 py-4">
            <ul class="breadcrumb justify-content-between align-items-center list-unstyled mb-0">
                <Div class="d-flex">
                    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="">Quản lý tin đăng</a></li>
                </Div>
                <li class="float-right"><a href="{{ route('news.create') }}" class="btn btn-add-news">Thêm mới</a></li>
            </ul>
        </div>

    </div>

    <div class=" container">
        <div class="my_dashboard_review mb40">
            <div class="favorite_item_list">
            @if(!count($news))
                <div class="text-center py-4">Bạn chưa đăng bài viết nào</div>
            @endif
                @foreach($news as $key => $list)
                <div class="feat_property justify-content-between mb-0 p-4 align-items-center list favorite_page" data-new="{{ $list->id }}">
                    <div class="thumb ">
                        <img class="img-whp" src="{{ $list->getFirstMediaUrl('image') ?? 'https://file4.batdongsan.com.vn/crop/350x232/2021/12/03/20211203145149-d8c0_wm.jpg' }}" alt="fp3.jpg">
                        <div class="thmb_cntnt">
                            <ul class="tag mb0">
                                <li class="list-inline-item dn"></li>
                                <li class="list-inline-item"><a href="#">{{ $list->type_service }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="details">
                        <div class="tc_content px-3">
                            <h4>{{ $list->name }}</h4>
                            <p><span class="flaticon-placeholder"></span>
                            @if($list->address)
                                {{ $list->address }}
                            @else
                                {{ $list->province }},{{ $list->district }},{{ $list->ward }}
                            @endif
                            </p>
                            <p><span class="flaticon-placeholder"></span> {{ $list->total_area }} m<sup>2</sup> </p>
                            <a class="fp_price text-thm" href="#">{{ number_format($list->price_house) }}<small> {{ $list->currency }}</small></a>
                        </div>
                    </div>
                    <ul class="view_edit_delete_list  d-flex justify-content-center mb0">
                    
                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="Edit"><a href="{{ route('news.update',$list->id) }}"><span class="flaticon-edit"></span></a></li>
                        <li class="list-inline-item" onclick="deletes({{ $list->id }})" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="Delete"><span class="flaticon-garbage"></span></li>
                    </ul>
                </div>
                @endforeach
                @if(count($news))
                <div style="text-align: center;width: 100%" id="searchpagi"><br>
                    <nav aria-label="..." style="display: inline-block;">
                        {!! $news->appends(request()->input())->links() !!}
                    </nav>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>
    <script>
    function deletes(id){
        var url = "{{ route('news.delete') }}";
        $.ajax({
            type : 'DELETE',
            data:{id:id},
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            success:function(){
                $('div[data-new='+id+']').remove();
            }
        })
    }
    
    </script>
@endsection