<?php
// 设置中国的时区
date_default_timezone_set('Asia/Chongqing');
# 路由
require_once '././route.php';
# 配置
require_once '././config.php';
# 公共函数
require_once 'common.php';

register_shutdown_function($info = 'error_handler') OR set_error_handler($info,E_ALL);
function error_handler($error_type=0 ,$error_msg=0 , $error_file=0 ,$error_line=0){
    global $web_config;
    if($error_type && $error_file){
        if(true){
            $error_arr = array();
            $error_arr['type'] = $error_type;
            $error_arr['message'] = $error_msg;
            $error_arr['file'] = $error_file;
            $error_arr['line'] = $error_line;
        }
    }else{
        $error_arr = error_get_last();
    }
    if(!empty($error_arr)){
        logSave(json_encode($error_arr,320));
        if($web_config['debug']){
            header('Content-type: text/html; charset=UTF-8',true);
            echo '<pre>';
            print_r($error_arr);
        }else{header('Content-type: text/html; charset=UTF-8',true);include '././web/404.html';}
        die();
    }
}