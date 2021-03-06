<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 15:10
 */

namespace app\api\validate;

/**
 * 验证ids是否是正整数
 * Class IDCollection
 * @package app\api\validate
 */
class IDCollection extends BaseValidate {
    protected $rule = [
        "ids"=>"require|checkIDs"
    ];
    protected $message = [
        "ids"=>"ids必须是以逗号分隔的一个或多个正整数！"
    ];
    protected function checkIDs($value){
        $values = explode(",",$value);
        if(empty($values)){
            return false;
        }
        foreach ($values as $id){
            if(!$this->isPostiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}