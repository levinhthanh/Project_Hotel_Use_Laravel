<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'phone' => 'required|regex:/^[0][0-9]{9}$/',
            'salary' => 'required|regex:/^[0-9]{7,10}$/',
            'address' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Bạn cần phải nhập điện thoại!',
            'phone.regex' => 'Điện thoại phải gồm 10 số và bắt đầu bằng 0',
            'salary.required' => 'Bạn chưa nhập tiền lương!',
            'salary.regex' => 'Tiền lương phải từ 7 đến 10 chữ số!',
            'address.required' => 'Bạn chưa nhập địa chỉ!',
        ];

    }
}
