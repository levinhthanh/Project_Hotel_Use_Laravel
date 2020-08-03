<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'phone' => 'required|numeric|regex:/[0][0-9]{9}/',
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'salary' => 'required|regex:/[0-9]{7,10}/',
            'address' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn cần phải nhập tên!',
            'name.min' => 'Tên ít nhất phải có 2 ký tự!',
            'name.max' => 'Tên không được quá 30 ký tự!',
            'phone.required' => 'Bạn cần phải nhập điện thoại!',
            'phone.numeric' => 'Điện thoại phải bắt đầu bằng số 0!',
            'phone.regex' => 'Điện thoại chỉ được có 10 số',
            'email.required' => 'Email là bắt buộc!',
            'email.email' => 'Email chưa đúng định dạng!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            'password.string' => 'Mật khẩu phải là 1 chuỗi!',
            'password.min' => 'Mật khẩu phải có 6 ký tự trở lên!',
            'password.regex' => 'Mật khẩu cần có chữ hoa, chữ thường, số và ký tự đặc biệt!',
            'salary.required' => 'Bạn chưa nhập tiền lương!',
            'salary.regex' => 'Tiền lương phải từ 7 đến 10 chữ số!',
            'address.required' => 'Bạn chưa nhập địa chỉ!',
        ];

        // return $messages;
    }
}
