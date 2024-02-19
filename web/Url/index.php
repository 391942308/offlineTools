<?php
$str='{"1":{"Id":1,"Host":"127.0.0.1","Port":"3306","User":"root","Pwd":"16d5sad","DatabaseName":"6f54ds6f4e","TableList":"device|person","Memo":"哈哈哈哈哈"}}';

$arr=array();
$arr['mysql']=json_decode($str,true);

echo json_encode($arr,320);

echo '<hr>';


echo getRealIP();

echo '<br>';
echo floor(1675/7).'<br>';