<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/25
 * Time: 10:58
 */

namespace app\api\model;
/**
 * 轮播
 * Class Banner
 * @package app\api\model
 */
class Banner extends BaseModel {
    //隐藏字段
    protected $hidden = ['id','delete_time','update_time'];
    /**
     * @return \think\model\relation\HasMany
     * 关联查询 第一个参数 关联模型的名字 第二个参数 外建名  第三个参数 主键
     */
    public function items(){
        //一对多
        return $this->hasMany('BannerItem','banner_id','id');
    }
    public static function getBannerById($id){
        $banners = self::with(['items','items.img'])->find($id);
//        $result = Db::query("select * from banner_item where banner_id=?",[$id]);
        return $banners;
    }
}