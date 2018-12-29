<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 22:35
 */

namespace app\api\controller\v1;

use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductMissException;

class Product{
    //查询最新商品 默认是15条
    public function getRecent($count=15){
        (new Count())->goCheck();
        $products = ProductModel::getMostRecent($count);
        if($products->isEmpty()){
            throw new ProductMissException();
        }
        return json($products);
    }
    //根据类型id查询出商品
    public function getAllInCategory($id){
        (new IDMustBePostiveInt())->goCheck();
        $products = ProductModel::getProductByCategoryId($id);
        if($products->isEmpty()){
            throw new ProductMissException();
        }
        return json($products);
    }

    //根据商品id查询书商品的所有信息
    public function getById($id){
        (new IDMustBePostiveInt())->goCheck();
        $product = ProductModel::getById($id);
        if(!$product){
            throw new ProductMissException();
        }
        return json($product);
    }
}