<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 23:41
 */

namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category{
    //查询所有的种类
    public function getCategorys(){
        $cateGorys = CategoryModel::getCategoryAll();
        if(!$cateGorys){
            throw new CategoryException();
        }
        return $cateGorys;
    }
}