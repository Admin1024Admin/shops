<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 23:54
 */

namespace app\lib\exception;


class CategoryException extends BaseException{
    /**
     * @var http 错误代码
     */
    public $code = 404;
    /**
     * @var 错误信息
     */
    public $msg = '获取商品类型失败！';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 40000;
}