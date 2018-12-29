<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 16:13
 */

namespace app\lib\exception;

class ThemeException extends BaseException{
    /**
     * @var http 错误代码
     */
    public $code = 404;
    /**
     * @var 错误信息
     */
    public $msg = '请求的主题不存在';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 40000;
}