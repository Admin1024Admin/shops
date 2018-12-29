<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 10:01
 */

namespace app\api\model;


use think\Model;

class BaseModel extends Model{
    //读取器
    protected function prefixImgUrl($url,$date){
        $finalUrl = $url;
        if($date["from"]==1){
            $finalUrl = config("setting.img_prefix").$url;
        }
        return $finalUrl;
    }
}