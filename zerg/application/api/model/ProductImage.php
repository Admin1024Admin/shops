<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 17:37
 */

namespace app\api\model;

/**
 * 商品的详细图片
 * Class ProductImage
 * @package app\api\model
 */
class ProductImage extends BaseModel{
    protected $hidden = ['img_id','product_id','delete_time'];
    //一对一
    public function imgUrl(){
        return $this->belongsTo('Image','img_id','id');
    }
}