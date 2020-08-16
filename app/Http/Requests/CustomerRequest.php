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
            'name' => 'required|min:2|max:30',
            'phone' => ['numeric', 'regex:/[0][0-9]{9}/'],
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'Bạn cần phải nhập tên!',
            'name.min' => 'Tên ít nhất phải có 2 ký tự!',
            'name.max' => 'Tên không được quá 30 ký tự!',
            'phone.numeric' => 'Điện thoại phải bắt đầu bằng số 0!',
            'phone.regex' => 'Điện thoại gồm 10 số',
            'email.require' => 'Email là bắt buộc!',
            'email.email' => 'Email chưa đúng định dạng!'
        ];

        return $messages;
    }
}
