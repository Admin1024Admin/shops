<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/25
 * Time: 11:45
 */

namespace app\lib\exception;

/**
 * Banner不存在的处理的异常
 */
class BannerMissException extends BaseException {
    /**
     * @var http 错误代码
     */
    public $code = 404;
    /**
     * @var 错误信息
     */
    public $msg = '请求的Banner不存在';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 40000;
}