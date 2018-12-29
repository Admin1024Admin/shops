<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 23:42
 */

namespace app\api\model;

/**
 * 商品种类
 * Class Category
 * @package app\api\model
 */
class Category extends BaseModel{
    protected $hidden = ['create_time','delete_time','update_time'];
    //一对一关系与图片
    public function img(){
        return $this->belongsTo("Image","topic_img_id","id");
    }
    //查询所有种类信息
    public static function getCategoryAll(){
        //$result = self::with("img")->select();
        $result = self::all([],'img');
        return $result;
    }
}