<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WinBidRequest extends FormRequest
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
            'area' => ['bail','required'],
            'project_name' => ['bail','required'],
            'win_bid_unit' => ['bail','required',Rule::in($this->params['win_bid_unit'])],
            'win_bid_price' => ['bail','required'],
            'contract_sign_at' => ['bail','required','date_format:Y-m-d'],
            'work_days' => ['bail','required','integer'],
            'begin_at' => ['bail','required','date_format:Y-m-d'],
            'end_at' => ['bail','required','date_format:Y-m-d'],
            'project_index' => ['bail','required'],
            'project_type' => ['bail','required',Rule::in($this->params['project_type'])],
            'project_manager' => ['bail','required'],
            'business_channel' => ['bail','required'],
            'partner' => ['bail','required'],
            'win_bid_publicity' => ['bail','required'],
            'is_end' => ['bail','required',Rule::in($this->params['is_end'])],
            'is_up_to_par' => ['bail','required',Rule::in($this->params['is_up_to_par'])],
            'remark' => ''
        ];
        switch($this->method()) {
            case 'POST':
                return $rules;
                break;
            case 'PUT':
                $rules['id'] = ['bail','required','exists:win_bids'];
                return $rules;
                break;
        }
    }

    public function attributes()
    {
        return [
            'area' => '地域',
            'project_name' => '项目名称',
            'win_bid_unit' => '中标单位',
            'win_bid_price' => '中标价格',
            'contract_sign_at' => '合同签订日期',
            'work_days' => '工期',
            'begin_at' => '合同开工日期',
            'end_at' => '合同竣工日期',
            'project_index' => '主要工程内容',
            'project_type' => '工程类型',
            'project_manager' => '项目经理',
            'business_channel' => '经营渠道',
            'partner' => '合伙人',
            'win_bid_publicity' => '中标公告',
            'is_end' => '是否竣工',
            'is_up_to_par' => '是否达标',
            'remark' => '备注'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute 不能为空！',
            'date_format' => ':attribute 格式不正确！',
            'integer' => ':attribute 需要为整数！',
            'in' => ':attribute 不存在！',
            'url' => ':attribute 不是标准的url链接！',
            'exists' => ':attribute 不存在！',
        ];
    }
}
