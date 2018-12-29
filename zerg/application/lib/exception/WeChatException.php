<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 14:10
 */

namespace app\lib\exception;


class WeChatException extends BaseException {
    /**
     * @var http 错误代码
     */
    public $code = 404;
    /**
     * @var 错误信息
     */
    public $msg = '异常提示信息';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 10000;
}