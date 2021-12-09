<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest  
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            // 'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg'],
            'type_user' => ['required'],
            'type_service' => ['required'],
            'type_house' => ['required'],
            'total_area' => ['required'],
            'used_area' => ['required'],
            'price_house' => ['required'],
            'name_user' => ['required', 'string', 'max:255'],
            'email_user' => ['required', 'string', 'max:255'],
            'phone_user' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
            'province' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'ward' => ['required', 'string', 'max:255'],
            'package' => ['required'],
            'start_post' => ['required'],
            'end_post' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'tên dự án',
            // 'image' => 'ảnh',
            'title' => 'tiêu đề',
            'ward' => 'phường/ Xã',
            'district' => 'quận/ Huyện ',
            'province' => 'tỉnh/ Thành phố',
            'type_user' => 'đối tượng',
            'type_service' => 'nhu cầu',
            'type_house' => 'loại nhà đất',
            'total_area' => 'diện tích đất',
            'used_area' => ' đất đã sử dụng ',
            'price_house' => 'giá nhà',
            'name_user' => 'họ và tên',
            'email_user' => 'email',
            'phone_user' => 'số điện thoại ',
            'content' => 'tiêu đề',
            'package' => 'goiws',
            'start_post' => 'ngày đăng bài',
            'end_post' => 'ngày kết thúc',
        ];
    }
}
