<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'store_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg','max:2048'],
            'store_favicon' => ['nullable', 'image', 'mimes:jpeg,png,jpg','max:2048'],
            'store_name' => ['required','nullable', 'string', 'max:255'],
            'store_description' => ['required','nullable', 'string'],
            'store_slogan' => ['required','nullable', 'string'],
            'store_phone' => ['required', 'numeric', 'digits_between:10,11'],
            'store_email' => ['required', 'email', 'max:255'],
            'store_address' => ['required', 'string', 'max:255'],
            'post_taxonomy' => ['nullable'],
            'menu_header' => ['nullable'],
            'menu_footer_1' => ['nullable'],
            'menu_footer_2' => ['nullable'],
            'link_facebook' => ['nullable', 'url', 'max:255'],
            'link_google' => ['nullable', 'url', 'max:255'],
            'link_twitter' => ['nullable', 'url', 'max:255'],
            'link_instagram' => ['nullable', 'url', 'max:255'],
            'link_youtube' => ['nullable', 'url', 'max:255'],
            'link_zalo' => ['nullable', 'url', 'max:255'],
            'mail_from_address' => ['nullable', 'string'],
            'mail_from_name' => ['nullable', 'string'],
            'mail_host' => ['nullable', 'string'],
            'mail_port' => ['nullable', 'string'],
            'mail_username' => ['nullable', 'string'],
            'mail_password' => ['nullable', 'string'],
            'mail_encryption' => ['nullable', 'string'],
            'store_banner' => ['nullable'],
            'language' => ['nullable'],
            'date_format' => ['required'],
            'custom_styles' => ['nullable'],
            'custom_scripts' => ['nullable'],
            'store_taxon_level' => ['required', 'numeric', 'min:1'],
            'store_menu_level' => ['required', 'numeric', 'min:1'],
            'analytics' => ['nullable'],
        ];
    }

    public function attributes()
    {
        return [
            'store_logo' => 'Logo',
            'store_favicon' => 'Favicon',
            'store_name' => 't??n c???a h??ng',
            'store_description' => 'm?? t??? c???a h??ng',
            'store_slogan' => 'kh???u hi???u',
            'store_phone' => 'Hotline li??n h???',
            'store_email' => 'Email li??n h???',
            'store_address' => '?????a ch??? li??n h???',
            'post_taxonomy' => 'danh m???c b??i vi???t',
            'menu_header' => 'menu ?????u trang',
            'menu_footer_1' => 'menu cu???i trang 1',
            'menu_footer_2' => 'menu cu???i trang 2',
            'link_facebook' => '???????ng d???n facebook',
            'link_google' => '???????ng d???n google',
            'link_twitter' => '???????ng d???n twitter',
            'link_instagram' => '???????ng d???n instagram',
            'link_youtube' => '???????ng d???n youtube',
            'link_zalo' => '???????ng d???n zalo',
            'mail_from_address' => '?????a ch??? g???i email',
            'mail_from_name' => 't??n ng?????i g???i email',
            'mail_host' => 'm??y ch??? mail',
            'mail_port' => 'c???ng ch??? mail',
            'mail_username' => 't??i kho???n mail',
            'mail_password' => 'M???t kh???u mail',
            'mail_encryption' => 'M?? h??a Mail',
            'store_banner' => 'banner',
            'language' => 'ng??n ng???',
            'date_format' => '?????nh d???ng th???i gian',
            'custom_styles' => 't??y ch???nh giao di???n',
            'custom_scripts' => 't??y ch???nh script',
            'store_taxon_level' => 't??y ch???nh s??? c???p danh m???c',
            'store_menu_level' => 't??y ch???nh s??? c???p menu',
        ];
    }

    public function messages()
    {
        return [
            'store_phone.numeric' => 'S??? ??i???n tho???i kh??ng h???p l???',
            'store_phone.max' => 'S??? ??i???n tho???i kh??ng h???p l???',
            'store_email.email' => 'Nh???p email h???p l???',
            'store_email.regex' => 'Nh???p email h???p l???',
        ];
    }
}
