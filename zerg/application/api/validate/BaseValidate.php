<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/20
 * Time: 23:39
 */

namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate {
    //验证
    public function goCheck(){
        //获取http中request所有的参数
        $request = Request::instance();
        $params = $request->param();
        $result = $this->batch()->check($params);
        if(!$result){
            $e =  new ParameterException([
                "msg" => $this->error,
            ]);
            throw $e;
//            $error = $this->error;
//            throw new Exception($error);
        }else{
            return true;
        }
    }
    //验证id是否是正整数
    protected function isPostiveInteger($value,$rule='',$data='',$field=''){
        if(is_numeric($value)&&is_int($value+0)&&($value+0)>0){
            return true;
        }else{
            return false;
        }
    }
    //验证值是否为空
    protected function isNotEmpty($value,$rule='',$data='',$field=''){
        if(empty($value)){
            return false;
        }else{
            return true;
        }
    }
    //验证手机号码
    protected function isMobile($value,$rule='',$data='',$field=''){
        $rule = '^1(3|4|5|7|7)[0-9]\d{8}$^';
        $result = preg_match($rule,$value);
        if($result){
            return true;
        }else{
            return false;
        }
    }

}