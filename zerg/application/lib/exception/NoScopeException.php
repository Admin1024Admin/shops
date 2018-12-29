<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/29
 * Time: 11:15
 */

namespace app\lib\exception;


class NoScopeException extends BaseException{
    /**
     * @var http 错误代码
     */
    public $code = 400;
    /**
     * @var 错误信息
     */
    public $msg = '没有权限访问该接口！';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 10000;
}