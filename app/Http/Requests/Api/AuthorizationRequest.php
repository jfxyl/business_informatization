<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => ['bail','required',Rule::exists('users')->where(function ($query) {
                $query->where('status', 1);
            })],
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
            'exists' => ':attribute 不存在或已禁用！'
        ];
    }
}
