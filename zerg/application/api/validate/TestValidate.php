<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/20
 * Time: 23:45
 */

namespace app\api\validate;


use think\Validate;

/**
 * 自定义验证器
 * 调用 $validate = new TestValidate();
 *  $result = $validate->batch()->check($data);
 */
class TestValidate extends Validate{
    protected $rule = [
        "name"=>"require|max:10",
        "email"=>"email"
    ];
}