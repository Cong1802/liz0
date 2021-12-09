<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'content' => ['required', 'string'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'tiêu đề',
            'content' => 'mô tả',
            'image' => 'ảnh',
        ];
    }

    public function messages()
    {
        return [
        ];
    }
}
