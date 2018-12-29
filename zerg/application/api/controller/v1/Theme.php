<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/27
 * Time: 10:48
 */

namespace app\api\controller\v1;

use app\api\validate\IDCollection;
use app\api\validate\IDMustBePostiveInt;
use app\api\model\Theme as ThemeModel;
use app\lib\exception\ThemeException;

class Theme{
    /**
     * 查询
     */
    public function getTheme($ids = ''){
        (new IDCollection())->goCheck();
        $theme = ThemeModel::getSimpleList($ids);
        if($theme->isEmpty()){
            throw new ThemeException();
        }
        return json($theme);
    }

    /**
     * 根据id获取到该主题下所有的商品
     */
    public function getProducts($id){
        (new IDMustBePostiveInt())->goCheck();
        $product = ThemeModel::getProductById($id);
        if(!$product){
            throw new ThemeException();
        }
        return json($product);
    }
}