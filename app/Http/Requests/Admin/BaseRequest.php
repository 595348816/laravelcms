<?php

namespace App\Http\Requests\Admin;

use App\traits\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    use ApiResponse;

    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        //获得错误
        $errors = $validator->errors()->first();
        //如果有错误就获取到所有错误
        throw new HttpResponseException(
            $this->failed($errors,400)
        );
    }
}
