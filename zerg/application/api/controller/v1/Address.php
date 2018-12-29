<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/28
 * Time: 21:48
 */

namespace app\api\controller\v1;

use app\api\validate\AddressNew;
use \app\api\service\Token as TokenService;
use \app\api\model\User as UserModel;
use app\api\validate\UserException;
use app\lib\enum\ScopeEnum;
use app\lib\exception\NoScopeException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\TokenException;
use think\Controller;

class Address extends Controller {
    //定义前置方法
    protected $beforeActionList = [
        "checkPrimaryScope"=>["only","createOrUpdateAddress"]
    ];
    //前置方法验证权限scope
    protected function checkPrimaryScope(){
        //根据token获取缓存中的scope权限
        $scope = TokenService::getCurrentTokenVar('scope');
        //判断scope不为空 否则抛出TokenException 可能token过期
        if($scope){
            if($scope >= ScopeEnum::User){
                return true;
            }else{
                throw new NoScopeException();
            }
        }else{
            throw new TokenException();
        }
    }
    //新增或者修改地址
    public function createOrUpdateAddress(){
        //根据token获取uid
        //根据uid查询用户的信息 判断用户是否存在
        //获取用户提交的地址信息  注意:必须参数过滤
        //判断地址是否存在，是新增还是更新
        $validate = new AddressNew();
        $validate->goCheck();
        $uid = TokenService::getCurrentTokenVar('uid');
        //根据uid查询用户的信息 判断用户是否存在
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        //获取用户提交的地址信息 input('post.')可以获取所有post传递的参数
        $dataArray = $validate->getDataByRule(input('post.'));
        //判断地址是否存在，是新增还是更新
        $userAddress = $user->address;
        if(!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }
        return json($user);
        //return json(new SuccessMessage());
    }
}