<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 22:54
 */

namespace app\lib\exception;

class ProductMissException extends BaseException {
    /**
     * @var http 错误代码
     */
    public $code = 404;
    /**
     * @var 错误信息
     */
    public $msg = '查询的商品不存在！';
    /**
     * @var 自定义错误代码
     */
    public $errorCode = 30000;
}