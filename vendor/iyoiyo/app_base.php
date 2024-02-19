<?php
namespace base\app;

// 设置中国的时区
date_default_timezone_set('Asia/Chongqing');
# 公共函数
require_once 'common.php';
# 公共函数
require_once 'cli_common.php';

class base
{
    protected $param;
    
    /**
     * 
     */
    public function __construct(){
        
        // 控制器初始化
        $this->_initialize();
        
        // 运行
        $this->run();
    }
    
    // 初始化
    protected function _initialize()
    {
    }
}