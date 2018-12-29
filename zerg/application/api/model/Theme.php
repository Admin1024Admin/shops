<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 10:47
 */

namespace app\api\model;

/**
 * 主题
 * Class Theme
 * @package app\api\model
 */
class Theme extends BaseModel{
    //与img一对一
    public function topImg(){
        return $this->belongsTo("Image","topic_img_id","id");
    }
    public function headImg(){
        return $this->belongsTo("Image","head_img_id","id");
    }
    //与product多对多
    public function products(){
        return $this->belongsToMany("Product","theme_product","product_id","theme_id");
    }

    /**
     * 根据ids查询说theme
     */
    public static function getSimpleList($ids){
        $values = explode(",",$ids);
        $result = self::with(['topImg','headImg'])->select($values);
        return $result;
    }

    /**
     * 根据主题id查询出主题下的所有商品
     */
    public static function getProductById($id){
        $result = self::with(['products','topImg','headImg'])->find($id);
        return $result;
    }
}