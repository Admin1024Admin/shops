<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 11:34
 */

namespace app\api\model;


class User extends BaseModel {
    //用户和地址的一对一
    public function address(){
        return $this->hasOne("UserAddress","user_id","id");
    }
    //根据openid查询用户
    public static function getByOpenId($openId){
        $result = self::where("openid","=",$openId)->find();
        return $result;
    }
}