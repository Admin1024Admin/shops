<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/26
 * Time: 19:39
 */

namespace app\api\model;

use think\Model;

/**
 * 图片
 * Class Image
 * @package app\api\model
 */
class Image extends BaseModel {
    //隐藏字段
    protected $hidden = ['id','from','delete_time','update_time'];

    //读取器
    protected function getUrlAttr($url,$date){
       return $this->prefixImgUrl($url,$date);
    }
}