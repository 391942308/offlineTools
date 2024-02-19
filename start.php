<?php
// netstat -nap | grep 19266
// kill PID
// screen -D -r tools
// chmod -R 777 /www/web/www/data/log/

require_once 'vendor/iyoiyo/base.php';

if(PHP_SAPI!=='cli'){logSave('Can only run in the PHP cli mode','cli',1);}

logSave('Try run web server','cli',1);
logSave('exec php -S 0.0.0.0:'.$web_config['port'].' index.php','cli');
$proc_web = startBackgroundProcess('exec php -S 0.0.0.0:'.$web_config['port'].' index.php', null, '/dev/null', '/dev/null');
if(isset(proc_get_status($proc_web)['pid'])){
    logSave('Web server started PID:['.proc_get_status($proc_web)['pid'].']','cli',1);
}else{
    logSave('(ERROR) Something wrong,check your code','cli',1);
    echo 'press Ctrl+C to exit'.PHP_EOL;
}
while(1){
    // 判断是否有需要运行的shell脚本
    $shell_RunData_config_file='data/shell/RunData.json';
    $shell_RunData_config_json=file_get_contents($shell_RunData_config_file);
    if($shell_RunData_config_json===false){logSave('(ERROR) Can not found RunData file [data/shell/RunData.json]','cli');die();}
    $shell_RunData_config_arr=json_decode($shell_RunData_config_json,true);
    foreach ($shell_RunData_config_arr as $v) {
        if(!isset($v['NextRunTime'])){logSave('(ERROR) Incomplete parameters!','cli');die();}
        if(strtotime($v['NextRunTime'])<time()){
            # 执行shell
            logSave('New task found , try to run shell script......','cli');
            logSave('exec php app/shell/index.php','cli');
            $proc_shell = startBackgroundProcess('exec php app/shell/index.php', null, '/dev/null', '/dev/null');
            logSave('Shell script started PID:['.proc_get_status($proc_shell)['pid'].']','cli');
            break;
        }
    }
    // 判断是否有需要运行的url脚本
    $url_RunData_config_file='data/url/RunData.json';
    $url_RunData_config_json=file_get_contents($url_RunData_config_file);
    if($url_RunData_config_json===false){logSave('(ERROR) Can not found RunData file [data/url/RunData.json]','cli');die();}
    $url_RunData_config_arr=json_decode($url_RunData_config_json,true);
    foreach ($url_RunData_config_arr as $v) {
        if(!isset($v['NextRunTime'])){logSave('(ERROR) Incomplete parameters!','cli');die();}
        if(strtotime($v['NextRunTime'])<time()){
            # 执行url
            logSave('New task found , try to run url script......','cli');
            logSave('exec php app/url/index.php','cli');
            $proc_url = startBackgroundProcess('exec php app/url/index.php', null, '/dev/null', '/dev/null');
            logSave('Url script started PID:['.proc_get_status($proc_url)['pid'].']','cli');
            break;
        }
    }
    sleep(1);
}
