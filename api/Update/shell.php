<?php
# web核心
require_once 'vendor/iyoiyo/web_base.php';
require_once 'vendor/iyoiyo/api_base.php';

class shell extends base\api\base
{
    public function _initialize(){
        # 读取运行数据
        $rundata_file='data/shell/RunData.json';
        $rundata_json=file_get_contents($rundata_file);
        $this->rundata_json=$rundata_json;
        # 读取配置表
        $config_file='data/shell/config.json';
        $config_json=file_get_contents($config_file);
        $this->config_json=$config_json;
    }
    
    public function get(){
        // 初始化
        $res=array();
        
        $rundata_arr=json_decode($this->rundata_json,true);
        foreach ($rundata_arr as $v) {
            $pt_interval=explode('|',$v['Interval']);
            $pt_interval_str='';
            switch ($pt_interval[0]) {
                case 1000:
                    $pt_interval_str='每周'.$pt_interval[1];
                    break;
                case 1001:
                    $pt_interval_str='每月'.$pt_interval[1].'号';
                    break;
                case 1002:
                    $pt_interval_str='每年'.$pt_interval[1];
                    break;
                case 1:
                    $pt_interval_str='每隔'.$pt_interval[1].'秒';
                    break;
                case 2:
                    $pt_interval_str='每隔'.$pt_interval[1].'分';
                    break;
                case 3:
                    $pt_interval_str='每隔'.$pt_interval[1].'小时';
                    break;
                default:
                    $pt_interval_str='触发类型';
                    break;
            }
            $res[]=array(
                'id' => $v['Id'],
                'name' => $v['ShellName'],
                'url' => explode('app/shell/files/',$v['ShellFileUrl'])[1],
                'interval' => $pt_interval_str,
                'interval1' => $pt_interval[0],
                'interval2' => $pt_interval[1],
                'interval3' => $pt_interval[2],
                'lastruntime' => $v['LastRunTime'],
                'nextruntime' => $v['NextRunTime'],
                'memo' => $v['Memo']
            );
        }
        $this->res_success('run',$res);
    }
    
    public function add(){
        $param=$this->param;
        //验证传回数据
        // $pt_check=file_exists('app/shell/files/'.$param['url']);
        // if($pt_check===false){$this->res_error('该文件不存在！');}
        
        //初始化
        $run_data=json_decode($this->rundata_json,true);
        $next_id=json_decode($this->config_json,true)['LastId']+1;
        $check_time=strtotime($param['nexttime']);
        if($check_time !== FALSE && $check_time != -1){
            $nextruntime = date('Y-m-d H:i:s',$check_time);
        }else{
            $nextruntime = updateNextRunTime(date('Y-m-d H:i:s',time()),$param['interval']);
        }
        
        //保存结果
        $run_data[$next_id]=array(
            'Id' => $next_id,
            'ShellName' => $param['name'],
            'ShellFileUrl' => 'app/shell/files/'.$param['url'],
            'Interval' => $param['interval'],
            'LastRunTime' => date('Y-m-d H:i:s',time()),
            'NextRunTime' => $nextruntime,
            'Memo' => $param['memo']
        );
        $config_data=array(
            'LastId' => $next_id
        );
        
        //更新文件内容
        file_put_contents('data/shell/RunData.json',json_encode($run_data,320));
        file_put_contents('data/shell/config.json',json_encode($config_data,320));
        
        $this->res_success('新任务添加成功!');
    }
    
    public function edit(){
        $param=$this->param;
        
        //初始化
        $run_data=json_decode($this->rundata_json,true);
        
        if(isset($run_data[$param['id']])){
            //计算下次运行时间
            $check_time=strtotime($param['nexttime']);
            if($check_time !== FALSE && $check_time != -1){
                $nextruntime = date('Y-m-d H:i:s',$check_time);
            }else{
                $nextruntime = updateNextRunTime(date('Y-m-d H:i:s',time()),$param['interval']);
            }
            $run_data[$param['id']]['Interval']=$param['interval'];
            $run_data[$param['id']]['NextRunTime']=$nextruntime;
            $run_data[$param['id']]['Memo']=$param['memo'];
            
            file_put_contents('data/shell/RunData.json',json_encode($run_data,320));
            $this->res_success('更新完成!');
        }else{
            $this->res_error('该shell记录不存在!');
        }
    }
    
    public function del(){
        $param=$this->param;
        
        //初始化
        $run_data=json_decode($this->rundata_json,true);
        
        if(isset($run_data[$param['id']])){
            unset($run_data[$param['id']]);
            file_put_contents('data/shell/RunData.json',json_encode($run_data,320));
            $this->res_success('已删除');
        }else{
            $this->res_error('该shell记录不存在!');
        }
    }
}