<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * http请求 连接微信
 * @param $url
 * @param int $httpCode
 * @return mixed
 */
function curl_get($url,&$httpCode=0){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    //不做证书验证  在linu下部署改为true
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
    $file_contents = curl_exec($ch);
    $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $file_contents;
}
//随机生成指定长度的字符串
function getRandChar($length){
    $str = null;
    $strPol = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890zxcvbnmlkjhgfdsaqwertyuiop";
    $max = strlen($strPol)-1;
    for($i=0;$i<$length;$i++){
        $str.=$strPol[rand(0,$max)];
    }
    return $str;
}