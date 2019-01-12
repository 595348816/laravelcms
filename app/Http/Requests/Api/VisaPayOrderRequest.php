<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class VisaPayOrderRequest extends FormRequest
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
            'type'=>'required|in:alipay,qqpay,wxpay',
            'remark'=>'required',
            'money'=>'required|numeric',
            'pay_time'=>'required|date|date_format:Y-m-d H:i:s'
        ];
    }

    public function messages()
    {
        return [
            'type.required'=>'缺少支付类型',
            'type.in'=>'支付类型不正确',
            'remark.required'=>'缺少支付备注',
            'money.required'=>'支付金额不正确',
            'money.numeric'=>'支付金额不正确',
            'pay_time.required'=>'缺少支付时间',
            'pay_time.date'=>'支付时间不正确',
            'pay_time.date_format'=>'时间格式不正确',
        ];
    }
}
