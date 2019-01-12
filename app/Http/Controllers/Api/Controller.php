<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as BaseController;
use Dingo\Api\Routing\Helpers;

class Controller extends BaseController
{
    use Helpers;

    public function returnArray($data='',$code=200,$message='success')
    {
        $res = [
            'message' => $message,
            'status_code' => $code,
            'data' => $data
        ];
        return $this->response->array($res)->setStatusCode($code);
    }
}
