<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 22:58
 */

namespace app\lib\exception;

class SuccessMessage{
    /**
     * @var http 错误代码
     */
    public $code = 201;
    /**
     * @var 信息
     */
    public $msg = 'ok！';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 0;
}