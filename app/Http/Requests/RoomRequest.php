<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'name' => 'required|regex:/^[A-Z]{1}[0-9]{3}$/',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn cần phải nhập tên!',
            'name.regex' => 'Tên phải bắt đầu bằng 1 chữ cái in hoa và 3 chữ số!',
        ];
    }
}
