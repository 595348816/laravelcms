<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CaptchaRequest;
use Gregwar\Captcha\CaptchaBuilder;

class CaptchasController extends BaseController
{
    /**
     * 创建图片验证码
     * @param CaptchaRequest $request
     * @param CaptchaBuilder $captchaBuilder
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CaptchaRequest $request,CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-'.str_random(15);
        $type = $request->type;
        $captcha = $captchaBuilder->build(148,48);
        $expiredAt = now()->addMinutes(2);
        \Cache::put($key, ['type' => $type, 'code' => $captcha->getPhrase()], $expiredAt);
        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt->toDateTimeString(),
            'captcha_image_content' => $captcha->inline()
        ];
        return $this->success($result);
    }
}
