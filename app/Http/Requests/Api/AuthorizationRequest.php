<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AuthorizationRequest extends FormRequest
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
            'name' => 'bail|required|exists:users',
            'password' => 'bail|required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '用户名',
            'password' => '密码'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute 不能为空！',
            'exists' => ':attribute 不存在！'
        ];
    }
}
