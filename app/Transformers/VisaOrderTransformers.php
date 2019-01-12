<?php
/**
 * Created by PhpStorm.
 * User: zhangxupeng
 * Date: 2019/1/12
 * Time: 下午10:26
 */

namespace App\Transformers;


use App\Models\VisaOrder;
use League\Fractal\TransformerAbstract;

class VisaOrderTransformers extends TransformerAbstract
{
    public function transform(VisaOrder $visaOrder)
    {
        return [
            'type'=>$visaOrder->type,
            'money'=>$visaOrder->money,
            'remark'=>$visaOrder->remark
        ];
    }
}