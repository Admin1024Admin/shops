<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 21:49
 */

namespace app\api\validate;

use app\lib\exception\ParameterException;

class AddressNew extends BaseValidate {
    protected $rule = [
        'name'=>'require|isNotEmpty',
        'mobile'=>'require|isMobile',
        'province'=>'require|isNotEmpty',
        'city'=>'require|isNotEmpty',
        'country'=>'require|isNotEmpty',
        'detail'=>'require|isNotEmpty',
    ];
    protected $message = [
        'name'=>'姓名不可以为空！',
        'mobile'=>'请输入正确的手机号！',
        'province'=>'省不可以为空！',
        'city'=>'市不可以为空！',
        'country'=>'区不可以为空！',
        'detail'=>'详细地址不可以为空！',
    ];

    //提交地址的时候过滤多的参数或者非法参数
    public function getDataByRule($arrays){
        //过滤到非法参数
        if(array_key_exists('user_id',$arrays)||array_key_exists('uid',$arrays)){
            throw new ParameterException([
                "msg"=>"参数中包含非法的参数名user_id或者uid！"
            ]);
        }
        $newArray = [];
        //遍历过滤的参数，避免用户多传递值
        foreach ($this->rule as $key=>$value){
            //根据过滤字段从当做key从用户传递过来的数组中获取值
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }

}