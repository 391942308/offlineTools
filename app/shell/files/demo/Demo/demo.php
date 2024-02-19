<?php
require_once 'vendor/iyoiyo/app_base.php';
require_once "vendor/public/aliyun-dysms-php-sdk-lite/SignatureHelper.php";//扩展

use Aliyun\DySDKLite\SignatureHelper;//扩展
class demo extends base\app\base
{
    private static $public_module='demoDemo-demo';//主体任务名(小写)细分任务名(首字大写)-本文件class名(小写)
/**
 * demo任务
 */
	public static function run(){
        $file_url='app/shell/files/demo/Demo/demo.txt';
        $demo_data=array(
            'demo' => '测试'
        );
        
        //读取文档
        $demo_content = file_get_contents($file_url);
        
        //保存文档
        $written_res = file_put_contents($file_url,json_encode($demo_data,320));
        if($written_res === false){cliLogSave('[app][debug]demo|demo--written faile!',self::$public_module);}
        
        $arr = self::sql($str);
        if(!empty($arr)){
            cliLogSave('[app][debug]demo|demo--strat--',self::$public_module);
            foreach ($arr as $value) {
                $res = self::doSome($v);
                cliLogSave('[app][debug]demo|demo--'.json_encode($res,true),self::$public_module);
            }
            cliLogSave('[app][debug]demo|demo--end--',self::$public_module);
        }
	}

	public static function sql($str){
        //主机名
        $db_host = '172.0.0.1';
        //用户名
        $db_user = 'demo';
        //密码
        $db_password = 'demo';
        //数据库名
        $db_name = 'demo';
        //端口
        $db_port = '3306';
         
        //连接数据库
        try{
            $conn = mysqli_connect($db_host,$db_user,$db_password,$db_name,$db_port);
        }
        catch(Exception $e){
            cliLogSave($e,self::$public_module);
            $data=array();
            return $data;
        }
        //$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name,$db_port) or die('连接数据库失败！');
        
        //查询数据库
        $result = mysqli_query($conn, "SET NAMES UTF8");
        $result = mysqli_query($conn, $str);
        cliLogSave('[sql][str]'.self::$public_module.'------------------------------',self::$public_module);
        cliLogSave('[sql][str]'.self::$public_module.'--'.$str,self::$public_module);
        cliLogSave('[sql][res]'.self::$public_module.'--'.json_encode($result,320),self::$public_module);
        cliLogSave('[sql][str]'.self::$public_module.'------------------------------',self::$public_module);
        
        //处理返回的数据集
        if(!is_bool($result)){
            $data = [];
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {//mysqli_fetch_array
                	$data[]=$row;
                }
            }else{
                $data = $result;
            }
        }else{
            $data = $result;
        }
        mysqli_close($conn);
        return $data;
	}

	public static function doSome($value){
        $content=1+$value;
        return $content;
	}
}
run();