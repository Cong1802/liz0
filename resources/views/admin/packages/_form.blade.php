<form action="{{ $url }}" method="POST" data-block enctype="multipart/form-data" id="post-form">
    @csrf
    @method($method ?? 'POST')

    <div class="d-flex align-items-start flex-column flex-md-row">

        <!-- Left content -->
        <div class="w-100 order-2 order-md-1 left-content">
            <div class="row">
                <div class="col-md-12">
                    <x-card>
                        <fieldset>
                            <legend class="font-weight-semibold text-uppercase font-size-sm">
                                {{ __('Chung') }}
                                @if($package->id)
                                    | <a href="" class="text-primary font-weight-semibold"
                                         target="_blank">{{ Str::limit($package->name, 20) }}</a>
                                @endif
                            </legend>
                            <div class="collapse show" id="general">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label text-lg-right"><span class="text-danger">*</span> {{ __('Ảnh') }}:</label>
                                    <div class="col-lg-9">
                                        <div id="thumbnail"> 
                                            <div class="single-image">
                                                <div class="image-holder" onclick="document.getElementById('image').click();">
                                                    <img id="image_url" width="170" height="170" src="{{ $package->getFirstMediaUrl('image') ?? '/backend/global_assets/images/placeholders/placeholder.jpg'}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <input type="file" name="image" id="image"
                                               class="form-control inputfile hide"
                                               onchange="document.getElementById('image_url').src = window.URL.createObjectURL(this.files[0])">
                                        @error('image')
                                        <span class="form-text text-danger">
                                                    {{ $message }}
                                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <x-text-field
                                    name="name"
                                    :placeholder="__('Tiêu đề ')"
                                    :label="__('Tiêu đề')"
                                    :value="$package->name"
                                    required
                                >
                                </x-text-field>

                                <x-textarea-field
                                    name="content"
                                    :placeholder="__('Mô tả')"
                                    :label="__('Mô tả')"
                                    :value="$package->content"
                                    class="wysiwyg"
                                    required
                                >
                                </x-textarea-field>

                                <x-text-field
                                    name="price"
                                    :placeholder="__('Giá')"
                                    :label="__('Giá')"
                                    :value="number_format($package->price)"
                                    required
                                >
                                    {!! $package->price ?? null !!}
                                </x-text-field>
 
                            </div>

                        </fieldset>

                    </x-card>
                    <div class="d-flex justify-content-center align-items-center action-div" id="action-form">
                        <a href="{{ route('admin.packages.index') }}" class="btn btn-light">{{ __('Trở lại') }}</a>
                        <div class="btn-group ml-3">
                            <button class="btn btn-primary btn-block" data-loading><i
                                    class="mi-save mr-2"></i>{{ __('Lưu') }}</button>
                            <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:void(0)" class="dropdown-item submit-type"
                                   data-redirect="{{ route('admin.packages.index') }}">{{ __('Lưu & Thoát') }}</a>
                                <a href="javascript:void(0)" class="dropdown-item submit-type"
                                   data-redirect="{{ route('admin.packages.create') }}">{{ __('Lưu & Thêm mới') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /left content -->
    </div>
</form>
@push('js')
    <script>
       
    </script>
@endpush()
