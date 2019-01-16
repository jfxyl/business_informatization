<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ConfigRequest extends FormRequest
{
    protected $types = [
            'record_channel_users',
            'record_legal_people',
            'bond_submit_people',
            'project_managers',
            'business_channels',
            'partners',
        ];
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
        if(in_array($this->type,$this->types)){
            return [
                'name' => ['bail','required',Rule::unique($this->type)]
            ];
        }else{
            return [
                'type' => ['bail','required',Rule::in($this->types)],
            ];
        }
    }

    public function attributes()
    {
        return [
            'type' => '参数',
            'name' => '参数'
        ];
    }

    public function messages()
    {
        return [
            'type.required' => '系统错误！',
            'in' => '系统错误！',
            'name.required' => '请填写参数！',
            'unique' => '参数已存在！'
        ];
    }
}
