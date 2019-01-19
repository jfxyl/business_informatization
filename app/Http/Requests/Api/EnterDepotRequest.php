<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnterDepotRequest extends FormRequest
{
    protected $params;
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
        $this->params = config('params');
        $rules =  [
            'company_name' => ['bail','required'],
            'record_at' => ['bail','required','date_format:Y-m-d'],
            'record_unit' => ['bail','required',Rule::in($this->params['record_unit'])],
            'record_aptitude' => ['bail','required',Rule::in($this->params['record_aptitude'])],
            'url' => ['bail','required','url'],
            'record_channel_user' => ['bail','required'],
            'special_demand' => ['bail'],
            'bond_type_money' => ['bail','required'],
            'bond_submit_person' => ['bail','required'],
            'enter_type_result' => ['bail','required',Rule::in($this->params['enter_type_result'])],
            'is_annual_review' => ['bail','required',Rule::in($this->params['is_annual_review'])],
            'remark' => ''
        ];
        switch($this->method()) {
            case 'POST':
                return $rules;
                break;
            case 'PUT':
                $rules['id'] = ['bail','required','exists:channel_records'];
                return $rules;
                break;
        }
    }

    public function attributes()
    {
        return [
            'company_name' => '单位名称',
            'record_at' => '备案时间',
            'record_unit' => '备案单位',
            'record_aptitude' => '备案资质',
            'url' => '登入网址',
            'record_channel_user' => '备案渠道责任人',
            'special_demand' => '特殊要求',
            'bond_type_money' => '保证金类型及金额',
            'bond_submit_person' => '保证金递交人',
            'enter_type_result' => '入库类型及结果',
            'is_annual_review' => '是否需要年审',
            'remark' => '备注'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute 不能为空！',
            'date_format' => ':attribute 格式不正确！',
            'in' => ':attribute 不存在！',
            'url' => ':attribute 不是标准的url链接！',
            'exists' => ':attribute 不存在！',
        ];
    }
}
