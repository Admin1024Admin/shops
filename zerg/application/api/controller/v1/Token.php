<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 11:33
 */

namespace app\api\controller\v1;
use app\api\service\UserToken;
use app\api\validate\TokenGet;

/**
 * 令牌
 * Class Token
 * @package app\api\controller\v1
 */
class Token{

    /**
     * 获取token
     * @param $code
     * @return array
     * @throws \app\lib\exception\ParameterException
     * @throws \think\Exception
     */
    public function getToken($code){
        (new TokenGet())->goCheck();
        $u = new UserToken($code);
        $token = $u->get();
        return json([
            "token"=>$token
        ]);
    }
}