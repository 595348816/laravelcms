<?php
/**
 * Created by PhpStorm.
 * User: zhangxupeng
 * Date: 2019/1/12
 * Time: 下午5:08
 */

namespace App\Serializer;


use League\Fractal\Serializer\ArraySerializer;

class CustomSerializer extends ArraySerializer
{
    public function collection($resourceKey, array $data)
    {
        return ['data' => $data,'status_code'=>200,'message'=>'success'];
    }

    public function item($resourceKey, array $data)
    {
        return ['data' => $data,'status_code'=>200,'message'=>'success'];
    }
}