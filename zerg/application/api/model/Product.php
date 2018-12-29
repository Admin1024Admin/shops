<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 10:47
 */

namespace app\api\model;

/**
 * 商品
 * Class Product
 * @package app\api\model
 */
class Product extends BaseModel{
    //隐藏字段
    protected $hidden = ['img_id','from','pivot','category_id','delete_time','update_time','create_time'];
    //读取器
    protected function getMainImgUrlAttr($url,$date){
        return $this->prefixImgUrl($url,$date);
    }
    //与商品图片的一对多
    public function imgs(){
        return $this->hasMany("ProductImage","product_id","id");
    }
    //与商品详细信息 一对多
    public function propertys(){
        return $this->hasMany("ProductProperty","product_id","id");
    }
    //查询最新15条商品数据
    public static function getMostRecent($count){
        $result = self::limit($count)->order("create_time desc")->select();
        return $result;
    }
    //根据分类的id查询出所属的商品
    public static function getProductByCategoryId($id){
        $result = self::where("category_id","=",$id)->select();
        return $result;
    }
    //根据商品的id查询出商品的图片和所有信息
    public static function getById($id){
        //$result = self::with(['imgs.imgUrl','propertys'])->find($id);
        //使用闭包函数来解决关联模型下排序的问题
        $result = self::with([
            'imgs'=>function($query){
                $query->with(['imgUrl'])->order('order','asc');
            }
        ])->with(['propertys'])->find($id);
        return $result;
    }
}