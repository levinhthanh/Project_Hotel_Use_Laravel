<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:2|max:30',
            'price_hour' => 'required|regex:/^[0-9]{5,10}$/',
            'price_day' => 'required|regex:/^[0-9]{5,10}$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn cần phải nhập tên!',
            'name.min' => 'Tên ít nhất phải có 2 ký tự!',
            'name.max' => 'Tên không được quá 30 ký tự!',

            'price_hour.required' => 'Bạn chưa nhập giá phòng theo giờ!',
            'price_hour.regex' => 'Giá phòng phải từ 5 đến 10 chữ số!',

            'price_day.required' => 'Bạn chưa nhập giá phòng theo ngày!',
            'price_day.regex' => 'Giá phòng phải từ 5 đến 10 chữ số!',

        ];

    }
}
