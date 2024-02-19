<?php
    echo '这里是小工具索引';
// $arr=array('1','2','3');
// $file='dom.json';
// $set=file_put_contents($file,json_encode($arr));
// var_dump($set);
// $get=file_get_contents($file);
// $msg=json_decode($get);
// var_dump($msg);
// echo $msg['0'];
// fopen('dom.json','a');
    $config_file='data/shell/config.json';
    $config_json=file_get_contents($config_file);
    if($config_json==false){echo 'this page lose something!';die();}
    echo '<pre>';
    print_r(json_decode($config_json,true));
    
    $arr=array(
        'LastId' => 1
    );
    /**
     * 1000开始为周期,999~1为间隔,0为触发
     * 1002=>年 1002|6(每年6月)|06 03:05:00
     * 1001=>月 1001|1(每月1号)|03:05:00
     * 1000=>周 1000|2(每周2)|03:05:00
     * 3=>时 3|1(每隔3小时)|1*60*60
     * 2=>分 2|2(每隔2分钟)|2*60
     * 1=>秒 1|10(每隔10秒)|10
     * 0=>触发 0|0|2222-02-02 22:22:22
     */
    $arr2=array(
        1 => array(
            'Id' => 1,
            'ShellName' => '备份',
            'ShellFileUrl' => 'app/shell/files/'.'backup/MysqlForTestInfo/index.php',
            'Interval' => '2|2|120',
            'LastRunTime' => '2022-06-01 11:28:00',
            'NextRunTime' => '2022-06-01 11:30:00',
            'Memo' => '哈哈哈哈哈'
        )
    );
    echo '<br>';
    echo json_encode($arr,320);
    echo '<br>';
    echo $arr=json_encode($arr2,320);
    
    
    
    echo '<hr>';
    $pt_arr=json_decode($arr,true);
    echo '<pre>';
    print_r($pt_arr);
    
    echo '<hr>';
    $check_str='1002|6|06 23:10:15';
    $check_arr=explode('|',$check_str);
    $time='2022-06-01 11:28:00';
                // $new_month_firstday = date("Y-m-01",strtotime($time));
                // $new_time = date('Y-m-d H:i:s',strtotime(date("Y-m-",strtotime("$new_month_firstday +1 month")).$check_arr[1].' '.$check_arr[2]));
                $new_year_firstday = date("Y-01-01",strtotime($time));
                $new_time = date('Y-m-d H:i:s',strtotime(date("Y-",strtotime("$new_year_firstday +1 year")).$check_arr[1].'-'.$check_arr[2]));
                
                echo $new_time;
                
    echo '<hr>';
    // $check_arr=explode('api/','/api/hfds/index.php');
    $check_arr=substr(strrchr('/api/hfds/index','/'),1);
    var_dump($check_arr);
    
    
    
    echo '<hr>';