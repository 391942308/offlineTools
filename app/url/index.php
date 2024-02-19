<?php
require_once 'app/base.php';
# 读取配置表
$config_file='data/url/config.json';
$config_json=file_get_contents($config_file);
if($config_json===false){logSave('(ERROR) {url}can not found config file [data/url/config.json]','cli');die();}
logSave('{url}'.$config_json,'cli');
# 读取运行数据
$rundata_file='data/url/RunData.json';
$rundata_json=file_get_contents($rundata_file);
if($rundata_json===false){logSave('(ERROR) {url}can not found RunData file [data/url/RunData.json]','cli');die();}
logSave('{url}'.$rundata_json,'cli');

logSave('{url}url script started!','cli');

# 遍历运行数据
$rundata_arr=json_decode($rundata_json,true);
foreach ($rundata_arr as $k => $v) {
    if(strtotime($v['NextRunTime'])<=time()){
        $pt_check=file_get_contents($v['UrlFileUrl']);
        # is found
        if($pt_check!==false){
            $exec_str='exec php '.$v['UrlFileUrl'];
            logSave('{url}'.$v['UrlName'].'['.$v['Id'].'] , try to run "'.$exec_str.'"','cli');
            $new_proc_url = startBackgroundProcess($exec_str, null, '/dev/null', '/dev/null');
            logSave('{url}Url script started PID:['.proc_get_status($new_proc_url)['pid'].']','cli');
        }else{
            logSave('(ERROR) {url}url file not found','cli');
        }
        # update NextRunTime
        $rundata_arr[$k]['NextRunTime']=updateNextRunTime($v['NextRunTime'],$v['Interval']);
    }
}
logSave('{url}update json ['.json_encode($rundata_arr,320).']','cli');
# update json
file_put_contents($rundata_file,json_encode($rundata_arr,320));

logSave('{url}url script done!','cli');