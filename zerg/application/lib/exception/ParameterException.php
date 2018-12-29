<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/25
 * Time: 23:33
 */

namespace app\lib\exception;

class ParameterException extends BaseException{
    /**
     * @var http 错误代码
     */
    public $code = 400;
    /**
     * @var 错误信息
     */
    public $msg = '参数错误';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 10000;

    /**
     * 构造函数
     */
    public function __construct($params = []){
        //判断是否是数组
        if(!is_array($params)){
            return;
        }
        if(array_key_exists("code",$params)){
            $this->code = $params['code'];
        }
        if(array_key_exists("msg",$params)){
            $this->msg = $params['msg'];
        }
        if(array_key_exists("errorCode",$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}