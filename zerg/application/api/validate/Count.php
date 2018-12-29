<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 22:39
 */

namespace app\api\validate;

class Count extends BaseValidate {
    protected $rule = [
        "count"=>"isPostiveInteger|between:1,15"
    ];
    protected $message = [
        "count"=>"count必须是1-15内的正整数！"
    ];
}