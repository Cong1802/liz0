<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackageUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'max:255'],
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
