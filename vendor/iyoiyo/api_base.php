<?php
namespace base\api;

class base
{
    protected $param;
    // header参数
    protected $header = array(
        'Content-Type' => 'application/json; charset=utf-8',
        'access-control-allow-headers' => 'X-Requested-With,Content-Type,XX-Device-Type,XX-Token',
        'access-control-allow-methods' => 'GET,POST,PATCH,PUT,DELETE,OPTIONS',
        'access-control-allow-origin' => '*'
    );
    
    /**
     * @param string $method 前置操作方法名
     * @param array $options 调用参数
     */
    public function __construct(Request $request = null){
        if(is_null($request)){
            if(!is_array($_POST)){
                $pt_post = (array) json_decode($_POST, true);
            }else{
                $pt_post=$_POST;
            }
            $request = array_merge($_GET,$pt_post);
        }
        
        $method='';
        $param=array();
        foreach ($request as $k => $v) {
            if($k=='method'){
                $method=$v;
            }else{
                $param[$k]=$v;
            }
        }
        
        $this->param = $param;
        $this->ip = getRealIP();
        
        $header = $this->header;
        foreach ($header as $k => $v) {
            header($k.':'.$v);
        }
        
        // 控制器初始化
        $this->_initialize();
        
        // 调用方法
        if($method!=''){
            $this->$method();
        }else{
            $this->res_error('Missing required parameters');
        }
    }
    
    // 初始化
    protected function _initialize()
    {
    }

    protected function res_success($msg = '', $data = [], array $header = [])
    {
        $result = array();
        $code   = 1;
        $result = [
            'code' => $code,
            'msg'  => $msg
        ];
        foreach ($data as $key => $value) {
            $result['data'][$key]=$value;
        }
        
        logSave('[api][return]['.$this->ip.']'.json_encode($result,320));
        exit(json_encode($result,320));
    }
    
    protected function res_error($msg = '',$code = 0, array $header = [])
    {
        $result = array();
        // $code   = 0;
        $result = [
            'code' => $code,
            'msg'  => $msg
        ];
        logSave('[api][return]['.$this->ip.']'.json_encode($result,320));
        exit(json_encode($result,320));
    }
}