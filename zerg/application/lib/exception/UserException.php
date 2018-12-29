<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 22:55
 */

namespace app\lib\exception;

class UserException extends BaseException{
    /**
     * @var http 错误代码
     */
    public $code = 404;
    /**
     * @var 错误信息
     */
    public $msg = '用户不存在！';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 10000;
}