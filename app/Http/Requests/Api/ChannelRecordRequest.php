<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChannelRecordRequest extends FormRequest
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
        $rules = [
            'record_area' => 'bail|required',
            //'record_user' => 'bail|required',
            'record_at' => 'bail|required|date_format:Y-m-d',
            'record_unit' => ['bail','required',Rule::in($this->params['record_unit'])],
            'record_aptitude' => ['bail','required',Rule::in($this->params['record_aptitude'])],
            'record_channel' => ['bail','required'],
            'url' => ['bail','required','url'],
            'record_channel_user' => ['bail','required','exists:record_channel_users,name'],
            'record_legal_person' => ['bail','required','exists:record_legal_people,name'],
            'bond_type_money' => ['bail','required'],
            'bond_submit_person' => ['bail','required','exists:bond_submit_people,name'],
            'enter_type_result' => ['bail','required',Rule::in($this->params['enter_type_result'])],
            'is_set_filiale' => ['bail','required',Rule::in($this->params['is_set_filiale'])],
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
            'id' => '记录',
            'record_area' => '备案区域',
            //'record_user' => '备案人',
            'record_at' => '备案时间',
            'record_unit' => '备案单位',
            'record_aptitude' => '备案资质',
            'record_channel' => '备案渠道及数量',
            'url' => '登入网址',
            'record_channel_user' => '备案渠道责任人',
            'record_legal_person' => '备案材料法人',
            'bond_type_money' => '保证金类型及金额',
            'bond_submit_person' => '保证金递交人',
            'enter_type_result' => '入库类型及结果',
            'is_set_filiale' => '是否设立子公司',
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
