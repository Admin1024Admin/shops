<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 17:38
 */

namespace app\api\model;

/**
 * 商品的详细信息
 * Class ProductProperty
 * @package app\api\model
 */
class ProductProperty extends BaseModel {
    protected $hidden = ['product_id','delete_time','update_time'];
}