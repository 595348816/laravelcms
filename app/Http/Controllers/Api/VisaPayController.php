<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\VisaPayOrderRequest;
use App\Models\VisaOrder;
use App\Serializer\CustomSerializer;
use App\Transformers\VisaOrderTransformers;
use App\Transformers\VisaUserTransformers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisaPayController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:visa_pay',['except'=>'login']);
    }

    public function login(Request $request)
    {
        $this->validate($request,[
           'mobile'=>'required|string',
           'password'=>'required|string|min:6',
        ],[
            'mobile.required'=>'请输入手机号',
            'password.required'=>'请输入密码',
            'password.min'=>'密码不能少于6位',
        ]);
        $credentials=[
            'mobile'=>$request->mobile,
            'password'=>$request->password
        ];
        if (!$token = Auth::guard('visa_pay')->attempt($credentials)) {
            return $this->response->errorUnauthorized('用户名或密码错误');
        }
        return $this->returnArray([
            'access_token' => $token,
            'token_type' => 'Bearer',
//            'expires_in' => \Auth::guard('visa_pay')->factory()->getTTL() * 60
        ],200);
    }

    public function me()
    {
        return $this->response->item(Auth::guard('visa_pay')->user(),new VisaUserTransformers());
    }

    public function VisaPayOrder(VisaPayOrderRequest $request,VisaOrder $visaOrder)
    {
        $visaOrder->fill($request->all());
        $visaOrder->user_id=Auth::guard('visa_pay')->id();
        $visaOrder->save();
        return $this->response->item($visaOrder,new VisaOrderTransformers());
    }
}
