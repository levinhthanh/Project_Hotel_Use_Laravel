<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'fullname' => 'required|min:2|max:30',
            'phone' => ['numeric', 'regex:/[0][0-9]{9}/'],
            'email' => 'required|email',
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
            'password_repeat' => 'required|same:password'
        ];
    }

    public function messages()
    {
        $messages = [
            'fullname.required' => 'Bạn cần phải nhập tên!',
            'fullname.min' => 'Tên ít nhất phải có 2 ký tự!',
            'fullname.max' => 'Tên không được quá 30 ký tự!',
            'phone.numeric' => 'Điện thoại phải bắt đầu bằng số 0!',
            'phone.regex' => 'Điện thoại chỉ được có 10 số',
            'email.require' => 'Email là bắt buộc!',
            'email.email' => 'Email chưa đúng định dạng!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            'password.string' => 'Mật khẩu phải là 1 chuỗi!',
            'password.min' => 'Mật khẩu phải có 6 ký tự trở lên!',
            'password.regex' => 'Mật khẩu cần có chữ hoa, chữ thường, số và ký tự đặc biệt!',
            'password_repeat.required' => 'Bạn chưa nhập mật khẩu xác nhận!',
            'password_repeat.same' => 'Mật khẩu xác nhận chưa khớp!'
        ];

        return $messages;
    }
}
