<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 11:35
 */

namespace app\api\validate;


class TokenGet extends BaseValidate{
    protected $rule = [
        "code"=>"require|isNotEmpty"
    ];
    protected $message = [
      "code"=>"没有code还想获取token！"
    ];
}