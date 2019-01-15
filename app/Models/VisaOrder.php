<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaOrder extends Model
{
    protected $fillable = [
        'type', 'money', 'remark','pay_time'
    ];

    /**
     * 支付金额入库*100 单位分
     * @param $value 支付金额
     */
    public function setMoneyAttribute($value)
    {
        $this->attributes['money']=$value*100;
    }

    public function getMoneyAttribute($value)
    {
        return $value/100;
    }
}
