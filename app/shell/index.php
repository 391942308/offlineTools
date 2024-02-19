<?php
require_once 'vendor/iyoiyo/base.php';
# 读取配置表
$config_file='data/shell/config.json';
$config_json=file_get_contents($config_file);
if($config_json===false){logSave('(ERROR) {shell}can not found config file [data/shell/config.json]','cli');die();}
logSave('{shell}'.$config_json,'cli');
# 读取运行数据
$rundata_file='data/shell/RunData.json';
$rundata_json=file_get_contents($rundata_file);
if($rundata_json===false){logSave('(ERROR) {shell}can not found RunData file [data/shell/RunData.json]','cli');die();}
// logSave('{shell}'.$rundata_json,'cli');

logSave('{shell}---------shell script started!---------','cli');

# 遍历运行数据
$rundata_arr=json_decode($rundata_json,true);
foreach ($rundata_arr as $k => $v) {
    $time = time();
    if(strtotime($v['NextRunTime'])<=$time){
        $pt_check=file_exists($v['ShellFileUrl']);
        # is found
        if($pt_check!==false){
            $exec_str='exec php '.$v['ShellFileUrl'];
            logSave('{shell}'.$v['ShellName'].'['.$v['Id'].'] , try to run "'.$exec_str.'"','cli');
            $new_proc_shell = startBackgroundProcess($exec_str, null, '/dev/null', '/dev/null');
            logSave('{shell}Shell script started PID:['.proc_get_status($new_proc_shell)['pid'].']','cli');
        }else{
            logSave('(ERROR) {shell}shell file not found','cli');
        }
        # update LastRunTime
        $rundata_arr[$k]['LastRunTime']=$v['NextRunTime'];
        # update NextRunTime
        $rundata_arr[$k]['NextRunTime']=updateNextRunTime($v['NextRunTime'],$v['Interval']);
        logSave('{shell}update ID:['.$k.']   ->   '.json_encode($rundata_arr[$k],320),'cli');
        // logSave('{shell}update ID:['.$k.']   ->   NextRunTime:'.$rundata_arr[$k]['NextRunTime'],'cli');
    }
}
// logSave('{shell}update json ['.json_encode($rundata_arr,320).']','cli');
# update json
file_put_contents($rundata_file,json_encode($rundata_arr,320));

logSave('{shell}---------shell script done!---------','cli');