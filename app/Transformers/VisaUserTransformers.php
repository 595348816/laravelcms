<?php
/**
 * Created by PhpStorm.
 * User: zhangxupeng
 * Date: 2019/1/12
 * Time: 下午1:54
 */

namespace App\Transformers;


use App\Models\VisaUser;
use League\Fractal\TransformerAbstract;

class VisaUserTransformers extends TransformerAbstract
{
    public function transform(VisaUser $visaUser)
    {
        return [
            'mobile'=>$visaUser->mobile,
            'appid'=>$visaUser->appid,
        ];
    }
}