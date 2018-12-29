<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 11:34
 */

namespace app\api\service;

use app\api\model\User as UserModel;
use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Exception;

class UserToken extends Token{
    protected $code;
    protected $wxAppId;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    public function __construct($code){
        $this->code = $code;
        $this->wxAppId = config("wx.app_id");
        $this->wxAppSecret = config("wx.app_secret");
        $this->wxLoginUrl = sprintf(config("wx.login_url"),$this->wxAppId,$this->wxAppSecret,$this->code);
    }

    public function get(){
        $result = curl_get($this->wxLoginUrl);
        //将数据装换为数组
        $wxResult = json_decode($result,true);
        //如果为空则接口调用失败
        if(empty($wxResult)){
            throw new Exception("获取session_key及openid异常，微信内部错误！");
        }else{
            //判断是否调用成功
            $loginFail = array_key_exists("errcode",$wxResult);
            if($loginFail){
                $this->processLoginError($wxResult);
            }else{
                $token = $this->grantToken($wxResult);
                return $token;
            }
        }
    }
    //授权成功
    private function grantToken($wxResult){
        //拿到openId
        //从数据库判断openId是否存在，不存在则新增用户
        //生成token，写入缓存数据
        //返回token
        $openId = $wxResult["openid"];
        $user = UserModel::getByOpenId($openId);
        if($user){
            $uid = $user->id;
        }else{
            $uid = $this->newUser($openId);
        }
        $cacheValue = $this->prepareCacheValue($wxResult,$uid);
        $token = $this->saveToCache($cacheValue);
        return $token;
    }

    //保存缓存数据并返回token
    private function saveToCache($cacheValue){
        $key = self::generateToken();
        $value = json_encode($cacheValue);
        $expire_in = config("setting.expire_in");
        //存入缓存
        $result = cache($key,$value,$expire_in);
        if(!$result){
            throw new TokenException([
                "msg"=>"服务器缓存异常",
                "errorCode"=>1005
            ]);
        }
        return $key;
    }
    //准备缓存数据
    private function prepareCacheValue($wxResult,$uid){
        //授权成功后微信返回的session_key和openid
        $cacheValue = $wxResult;
        //用户id
        $cacheValue['uid'] = $uid;
        //权限身份 用户身份
        $cacheValue['scope'] = ScopeEnum::User;
        //管理员身份
        //$cacheValue['scope'] = ScopeEnum::Super;
        return $cacheValue;
    }
    //新增用户
    private function newUser($openId){
        $user = UserModel::create([
            "openid"=>$openId
        ]);
        return $user->id;
    }
    //授权失败的异常
    private function processLoginError($wxResult){
        throw new WeChatException([
            "msg"=>$wxResult['errmsg'],
            "errorCode"=>$wxResult['errcode']
        ]);
    }
}