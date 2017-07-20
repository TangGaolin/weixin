<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 封装数据合法性校验
     * @param $param
     * @param $rule
     * @throws ValidationException
     */
    protected function validation($param, $rule, $message = [])
    {
        $validator = Validator::make($param, $rule, $message);

        if ($validator->fails()) {
            throw new ValidationException($validator->messages());
        }
    }

    protected function success($data = null)
    {
        $returnData = [
            'statusCode' => config('response_code.STATUSCODE_SUCCESS'),
            'msg'        => config('response_code.MSG_OK'),
            'success'    => true
        ];
        $data && $returnData['data'] = $data;

        return response()->json($returnData);
    }


}
