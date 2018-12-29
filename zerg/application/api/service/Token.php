<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 15:24
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token{
    //返回随机生成的token
    public function generateToken(){
        //获取到随机生成的字符串
        $randChars = getRandChar(32);
        //获取当前访问的时间
        $timestamp = $_SERVER['REQUEST_TIME'];
        //md5盐值
        $salt =config("secure.token_salt");
        return md5($randChars.$timestamp.$salt);
    }
    //从head里面获取token从缓存中获取值
    public static function getCurrentTokenVar($key){
        $token = Request::instance()->header("token");
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }else{
            if(!is_array($vars)){
                $vars = json_decode($vars,true);
            }
            if(array_key_exists($key,$vars)){
                return $vars[$key];
            }else{
                throw new Exception("尝试获取的Token变量不存在");
            }
        }
    }
}