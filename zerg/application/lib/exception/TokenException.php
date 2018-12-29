<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 15:28
 */

namespace app\lib\exception;

class TokenException extends BaseException{
    /**
     * @var http 错误代码
     */
    public $code = 404;
    /**
     * @var 错误信息
     */
    public $msg = 'token过期或者无效！';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 10000;
}