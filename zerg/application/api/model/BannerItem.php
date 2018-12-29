<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/26
 * Time: 14:36
 */

namespace app\api\model;
/**
 * 轮播子项
 * Class BannerItem
 * @package app\api\model
 */
class BannerItem extends BaseModel {
    //隐藏字段
    protected $hidden = ['id','img_id','banner_id','delete_time','update_time'];
    //一对一
    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }
}