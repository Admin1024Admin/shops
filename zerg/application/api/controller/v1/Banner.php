<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/20
 * Time: 21:56
 */
namespace app\api\controller\v1;
use app\api\validate\IDMustBePostiveInt;
use app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
class Banner{
    /**
     * 获取指定id的Banner信息
     * @url:/banner/:id
     * @http:get
     * @id:banner的id号
     * $banner = BannerModel::with(['items','items.img'])->find($id);写在model中
     */
    public function getBanner($id){
        (new IDMustBePostiveInt())->goCheck();
        $banner = BannerModel::getBannerById($id);
        //隐藏字段
        //$banner->hidden(['delete_time','update_time']);
        //显示字段
       // $banner->validate(['id','name']);
        // database.php数据集返回类型 array数组
        //'resultset_type'  => 'collection',返回数据集
        if(!$banner){
            throw new BannerMissException();
        }
        return json($banner);
    }
}