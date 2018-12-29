<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/25
 * Time: 11:43
 */

namespace app\lib\exception;

use think\Exception;

class BaseException extends Exception {
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