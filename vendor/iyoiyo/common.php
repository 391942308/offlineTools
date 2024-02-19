<?php
/**
 * 记录log
 * @param $content 内容
 * @param $print 1:在cli输出 2:不输出
 * @param $module 模块 cli/web
 * @param $type rewrite:覆盖 / append:继续写入
 * @param $url 保存的地址
 * @return bool
 */
function logSave($content,$module = 'web',$print = 2,$type = 'append',$url = '')
{
    $pt_content=is_array($content)?json_encode($content,320):$content;
    $content='['.date('Y-m-d H:i:s',time()).']'.$pt_content.PHP_EOL;
    if($print==1){
        echo $content;
    }
    
    $logSize = 10000000; //日志大小
    // $log = "log.txt";
    $date=date('Y-m-d',time());
    if($url==''){
        $log = "data/log/".$module.'/'.$date.'.log';
    }else{
        $log = "data/log/".$module.'/'.$url;
    }
    
    //验证路径文件夹是否存在
    $position = strrpos($log,'/');
    $path = substr($log,0,$position);
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    
    //验证文件是否存在
    if(!file_exists($log)){touch($log);}
    //验证文件是否已经超过大小限制
    if(file_exists($log) && filesize($log) > $logSize){
        unlink($log);
    }
    switch($type){
        case 'rewrite':
            file_put_contents($log,$content);
            break;
        case 'append':
            file_put_contents($log,$content,FILE_APPEND);
            break;
    }
}

/**
 * cli运行记录log,目的在于简化
 * @param $content 内容
 * @param $module 模块 demo-offline
 * @return bool
 */
function cliLogSave($content,$module = 'web',$url = '',$print = 2,$type = 'append')
{
    $pt_content=is_array($content)?json_encode($content,320):$content;
    $content='['.date('Y-m-d H:i:s',time()).']'.$pt_content.PHP_EOL;
    if($print==1){
        echo $content;
    }
    
    $logSize = 10000000; //日志大小
    // $log = "log.txt";
    $date=date('Y-m-d',time());
    if($url==''){
        $log = "data/log/cli/".$module.'/'.$date.'.log';
    }else{
        $log = "data/log/cli/".$url;
    }
    
    //验证路径文件夹是否存在
    $position = strrpos($log,'/');
    $path = substr($log,0,$position);
    if(!file_exists($path)){
        mkdir($path,0777,true);
    }
    
    //验证文件是否存在
    if(!file_exists($log)){touch($log);}
    //验证文件是否已经超过大小限制
    if(file_exists($log) && filesize($log) > $logSize){
        unlink($log);
    }
    switch($type){
        case 'rewrite':
            file_put_contents($log,$content);
            break;
        case 'append':
            file_put_contents($log,$content,FILE_APPEND);
            break;
    }
}

/**
 * $interval => 
 * 1000开始为周期,999~1为间隔,0为触发
 * 1002=>年 1002|6-6(每年6月6号)|03:05:00
 * 1001=>月 1001|1(每月1号)|03:05:00
 * 1000=>周 1000|2(每周2)|03:05:00
 * 3=>时 3|1(每隔3小时)|1*60*60
 * 2=>分 2|2(每隔2分钟)|2*60
 * 1=>秒 1|10(每隔10秒)|10
 * 0=>触发 0|0|2222-02-02 22:22:22
 */
function updateNextRunTime($time,$interval){
    $timestamp=strtotime($time);
    $week_arr=array(
        1 => date("Y-m-d", strtotime('next monday')),
        2 => date("Y-m-d", strtotime('next tuesday')),
        3 => date("Y-m-d", strtotime('next wednesday')),
        4 => date("Y-m-d", strtotime('next thursday')),
        5 => date("Y-m-d", strtotime('next friday')),
        6 => date("Y-m-d", strtotime('next saturday')),
        7 => date("Y-m-d", strtotime('next sunday'))
    );
    $new_time='';
    $check_arr=explode('|',$interval);
    if($check_arr[0]==0){
        $new_time=$check_arr[2];
    }
    elseif($check_arr[0]<1000 && $check_arr[0]>0){
        $new_time=date('Y-m-d H:i:s',($timestamp+$check_arr[2]));
    }else{
        switch ($check_arr[0]) {
            case 1000:
                $new_time=$week_arr[$check_arr[1]].' '.$check_arr[2];
                break;
            case 1001:
                $new_month_firstday = date("Y-m-01",$timestamp);
                $new_time = date('Y-m-d H:i:s',strtotime(date("Y-m-",strtotime("$new_month_firstday +1 month")).$check_arr[1].' '.$check_arr[2]));
                break;
            case 1002:
                $new_year_firstday = date("Y-01-01",$timestamp);
                $new_time = date('Y-m-d H:i:s',strtotime(date("Y-",strtotime("$new_year_firstday +1 year")).$check_arr[1].' '.$check_arr[2]));
                break;
        }
    }
    return $new_time;
}



/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv  是否进行高级模式获取（有可能被伪装）
 * @return mixed
 */
function getRealIP($type = 0, $adv = true){
    $type = $type ? 1 : 0;
    static $ip = null;
    if (null !== $ip) {
        return $ip[$type];
    }
    
    if ($adv) {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos = array_search('unknown', $arr);
            if (false !== $pos) {
                unset($arr[$pos]);
            }
            $ip = trim(current($arr));
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    } elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u", ip2long($ip));
    $ip   = $long ? [$ip, $long] : ['0.0.0.0', 0];
    return $ip[$type];
}


/**
 * 加密方式
 * $operation => E:加密 D:解密
 * $string 的构成为 唯一标识参数+'_'+date('H:i',time())
 * 举例:6091_12:52  或  1D56AS1D6A_12:52
 */
function enDeString($string,$operation){
    $key=md5('iyoiyo_65dsf1');
    $key_length=strlen($key);
    $string=$operation=='D'?base64_decode($string):substr(md5($string.$key),0,1).$string;
    $string_length=strlen($string);
    $rndkey=$box=array();
    $result='';
    for($i=0;$i<=255;$i++){
        $rndkey[$i]=ord($key[$i%$key_length]);
        $box[$i]=$i;
    }
    for($j=$i=0;$i<256;$i++){   
        $j=($j+$box[$i]+$rndkey[$i])%256;
        $tmp=$box[$i];
        $box[$i]=$box[$j];
        $box[$j]=$tmp;
    }
    for($a=$j=$i=0;$i<$string_length;$i++){   
        $a=($a+1)%256;
        $j=($j+$box[$a])%256;
        $tmp=$box[$a];
        $box[$a]=$box[$j];
        $box[$j]=$tmp;
        $result.=chr(ord($string[$i])^($box[($box[$a]+$box[$j])%256]));
    }
    if($operation=='D'){
        if(substr($result,0,1)==substr(md5(substr($result,1).$key),0,1)){   
            return substr($result,1);
        }else{
            return'';
        }
    }else{   
        return str_replace('=','',base64_encode($result));
    }
}