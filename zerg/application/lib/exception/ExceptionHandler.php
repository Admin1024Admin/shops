<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2018/12/25
 * Time: 11:42
 */

namespace app\lib\exception;

use think\exception\Handle;
use think\Request;
use think\Log;

class ExceptionHandler extends Handle {
    private $code;
    private $msg;
    private $errorCode;
    private $request_url;
    public function render(\Exception $e){
        //判断是否是自定义异常
        if($e instanceof BaseException){
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }else {
            //判断是否是debug模式。是debug模式则返回tp5自带的异常
            if (config("app_debug")) {
                return parent::render($e);
            } else {
                //服务器异常
                $this->code = 500;
                $this->msg = '服务器内部错误';
                $this->errorCode = 999;
                $this->recordErrorLog($e);
            }
        }
        //获取当前请求
        $request = Request::instance();
        $this->request_url = "http://zerg.com/" . $request->url();
        $err = [
            "msg" => $this->msg,
            "errorCode" => $this->errorCode,
            "request_url" => $this->request_url,
        ];
        return json($err,$this->code);
    }

    //输出日志
    private function recordErrorLog(\Exception $e){
        //初始化日志
        Log::init([
            'type'  => 'File',
            // 日志保存目录
            'path'  => LOG_PATH,
            // 日志记录级别
            'level' => ['error'],
        ]);
        Log::record($e->getMessage(),"error");
    }
}