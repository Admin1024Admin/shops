<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/20
 * Time: 21:56
 */
namespace app\api\controller\v2;
class Banner{
    /**
     * @param $id
     * @return string
     * v2 版本 测试
     */
    public function getBanner($id){
        return "this is V2 version";
    }
}