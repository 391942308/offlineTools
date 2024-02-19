<?php
# 站点配置
$web_config=array(
    # 根目录
    'debug' => false,
    'root' => '/web', //站点根目录
    'port' => 19266, //站点端口
    'api_allowed_ip' => '', 
    'open' => true, //站点是否开启
);
# 日志配置
$log_config=array(
    'save_wide' => 0, //保存范围,以天为单位,0为永久
);
# 时区配置
// 自行搜索  函数date_default_timezone_set  修改