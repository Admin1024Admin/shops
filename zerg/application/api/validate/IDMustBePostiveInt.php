<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/20
 * Time: 23:33
 */

namespace app\api\validate;

/**
 * 验证id是否是正整数
 * Class IDMustBePostiveInt
 * @package app\api\validate
 */
class IDMustBePostiveInt extends BaseValidate {
    protected $rule = [
      'id'=>"require|isPostiveInteger"
    ];
    protected $message = [
        "id"=>"id必须是正整数！"
    ];
}