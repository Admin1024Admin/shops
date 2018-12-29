<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//route 模块/控制器/操作 控制器里面有多个目录使用.
//Route::get("banner/:id","api/v1.Banner/getBanner");
//根据id查询书轮播  api/v1/banner/1
Route::get("api/:version/banner/:id","api/:version.Banner/getBanner");
// 路由使用完整匹配'route_complete_match'   => true, 这个改为true
//查询出主题 api/v1/theme?ids=1,2,3
Route::get("api/:version/theme","api/:version.Theme/getTheme");
//根据id查询出主题下的商品 api/v1/theme/1
Route::get("api/:version/theme/:id","api/:version.Theme/getProducts");
//获取前cont条最新的商品数据 api/v1/product/recent/1
Route::get("api/:version/product/recent/:count","api/:version.Product/getRecent");
//根据种类id获取所有的商品 api/v1/product/by_category?id=1
Route::get("api/:version/product/by_category","api/:version.Product/getAllInCategory");
//根据商品id获取出商品的图片和详细信息 api/v1/product/1
Route::get("api/:version/product/:id","api/:version.Product/getById",[],["id"=>"\d+"]);
//获取所有商品种类信息  api/v1/category/all
Route::get("api/:version/category/all","api/:version.Category/getCategorys");
//获取token  api/v1/token/user
Route::post("api/:version/token/user","api/:version.Token/getToken");
//新增收获地址  api/v1/address/add
Route::post("api/:version/address/add","api/:version.Address/createOrUpdateAddress");
