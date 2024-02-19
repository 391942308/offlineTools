<?php
# web核心
require_once 'vendor/iyoiyo/web_base.php';

# ip白名单
/**
 * 有需要自己写
 */
# 登录验证
/**
 * 有需要自己写
 */

# 初始化
$is_err=0;
$ip=getRealIP();
# 默认路径
if($_SERVER['REQUEST_URI']=='/'){$_SERVER['REQUEST_URI']='/index.php';}
# 拆解路径
$check_url=explode('api/',$_SERVER['REQUEST_URI']);
if($check_url[0]=='/' && isset($check_url[1])){
    $file_url=explode('?',$_SERVER['REQUEST_URI'])[0];
    $class_name=substr(strrchr(explode('.php',$_SERVER['REQUEST_URI'])[0],'/'),1);
    // api
    if(in_array($file_url, $routeFiles)){
        logSave('-------------------------------------');
        logSave('[api][url]['. $ip . ']' . __DIR__ . $_SERVER['REQUEST_URI']);
        include __DIR__ . $file_url;
        new $class_name;
    }else{
        $is_err=1;
    }
}else{
    // web
    # 站点是否开启
    if(!$web_config['open']){exit(404);}
    # 验证登录
    if(in_array($_SERVER['REQUEST_URI'], $routeFiles) or preg_match('/\.(?:png|jpg|jpeg|gif|json|ico|js|css)$/', $_SERVER["REQUEST_URI"])){
        logSave('-------------------------------------');
        logSave('[web][url]['. $ip . ']' . __DIR__ . $web_config['root'] . $_SERVER['REQUEST_URI']);
        include __DIR__ . $web_config['root'] . $_SERVER['REQUEST_URI'];
    }else{
        $is_err=1;
    }
}

if($is_err){
    logSave('[waring]['. $ip . '] ' . $_SERVER['REQUEST_URI'] . ' not found!');
    include __DIR__ . '/web/404.html';
}