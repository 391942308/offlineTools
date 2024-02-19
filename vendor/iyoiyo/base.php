<?php
// 设置中国的时区
date_default_timezone_set('Asia/Chongqing');
// 开始 内存量记录
define('MEM_INFO', memory_get_usage());
// 公共函数
require_once 'common.php';
// cli公共函数
require_once 'cli_common.php';
// 配置
require_once '././config.php';

if(version_compare(PHP_VERSION,'5.5.0','<')){
    logSave('(ERROR) PHP version is too low, at least PHP5.5 is needed. Please upgrade PHP version','cli',1);
    die();
}
// 扩展验证