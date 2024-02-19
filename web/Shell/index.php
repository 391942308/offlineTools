<?php
include $_SERVER['DOCUMENT_ROOT'].'/web/public/header.html';
?>
    </head>
    <style>
body{
    margin:20px;
}
h3{
    display: inline-block;
    margin: 10px 10px 10px 12px;
}
table{
    width: 100%;
    max-width: 100%;
    background-color: transparent;
    border-spacing: 0;
    border-collapse: collapse;
    border: 1px solid #ddd;
    border-radius: 3px;
    color: #666;
    font-size: 14px;
    margin-bottom: 0;
}
th {
    border-bottom: 1px solid #e1e6eb;
    color: #999;
    font-weight: normal;
    padding: 8px;
    cursor: pointer;
}
table>thead>tr>th {
    vertical-align: bottom;
}
tbody {
    display: table-row-group;
    background-color: #fff;
    vertical-align: middle;
    border-color: inherit;
}
table>tbody>tr>td {
    vertical-align: middle;
}
td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
    display: table-cell;
}
tbody>tr:hover {
    background-color: #ECF0F1;
}
.head{
    color: #aaa;
    border-bottom: 1px solid #bbb;
    margin-bottom: 10px;
}
.content{
    padding: 20px 0;
}
.list{
    height: 36px;
    padding: 10px 20px;
    margin-bottom: 10px;
}
.list:before{
    display: table;
    content: " ";
}
.list:after{
    clear: both;
}
.list input{
    height: 34px;
    width: 260px;
    padding: 0 12px;
    border: 1px solid #ccc;
    line-height: 30px;
    border-radius: 3px;
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.list select{
    margin-right: 20px;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
.list option{
    text-align: left;
}
.interval_val_box{
    position: relative;
    margin-right: 20px;
    border: 1px solid #ccc;
    height: 30px;
    line-height: 30px;
    border-radius: 3px;
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
.interval_val_box span{
    height: 30px;
    line-height: 30px;
    position: relative;
}
.interval_val_box input{
    width: 48px;
    height: 30px;
    line-height: 30px;
    padding:0 1px 0 5px;
    border: 0;
    text-align: center;
    font-size: 12px;
    border-radius: 4px 0 0 4px;
    margin: 0;
    font: inherit;
    color: inherit;
}
.interval_val_box .name{
    border-left: 1px solid #ccc;
    padding: 0 2px;
    text-align: center;
    font-size: 13px;
}
.title{
    line-height: 34px;
    width: 80px;
    margin-right: 20px;
    color: #444;
    font-size: 14px;
    text-align: right;
}
.info{
    background-color: #eff0f2;
    border-radius: 6px;
    padding: 14px;
    margin-top: 30px;
    display:block;
    overflow-x: scroll;
}
.a{
    margin-left:10px;
    cursor: pointer;
    color: #20a53a;
}
.fl{
    float: left;
}
.fr{
    float: right;
}
.cp{
    cursor: pointer;
}
.interval_list{
    display: none;
}
.btn-1{
    background-color: #20a53a;
    border-radius: 3px;
    width: 100px;
    height: 34px;
    line-height: 34px;
    text-align: center;
    color: #fff;
    cursor: pointer;
    margin: 3px 10px;
}
.btn-3{
    background-color: #20a53a;
    border-radius: 3px;
    width: 140px;
    height: 34px;
    line-height: 34px;
    text-align: center;
    color: #fff;
    cursor: pointer;
}
.close{
    display: inline-block;
    margin: 15px 10px 15px 12px;
    font-size: 12px;
}
.add{
    display: none;
    min-width: 630px;
    position: absolute;
    top: 80px;
    left: calc(25% - 50px);
    z-index: 9999;
    border-radius: 6px;
    padding: 30px 30px 40px 30px;
}
.edit{
    display: none;
    min-width: 630px;
    position: absolute;
    top: 180px;
    left: calc(25% - 50px);
    z-index: 9999;
    border-radius: 6px;
    padding: 30px 30px 40px 30px;
}
.mask{
    display: none;
    width: 100%;
    height: 100%;
    background-color: #000;
    opacity: 0.6;
    -webkit-opacity: 0.6;
    filter: alpha(opacity=60);
    -moz-opacity: 0.6;
    position: fixed;
    z-index: 999;
    top: 0;
    left: 0;
}
.glass{
    background-color: rgba(255, 255, 255, 0.9);
    box-shadow: 8px 4px 10px rgba(0, 0, 0, 0.3);
}
    </style>
    <body onload="load_val()">
        <div class="mask"></div>
        <div class="info">
            <div class="head"><h3>Shell任务</h3><div class="fr btn-1" id="show-add" onclick="open_add()">新增</div></div>
            <table>
                <thead>
                    <tr>
                        <th>任务名称</th>
                        <th>文件路径</th>
                        <th>周期</th>
                        <th>启动时间</th>
                        <th>最新执行时间</th>
                        <th>下次执行时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody id="shell_list">
                </tbody>
            </table>
            <div class="add glass">
                <div class="head"><h3>添加</h3><span class="fr cp close" id="close_add">关闭&nbsp;X</span></div>
                <div class="content">
                    <div class="list">
                        <span class="title fl">任务名称</span>
                        <div class="fl">
                            <input type="text" name="add_name" id="add_name">
                        </div>
                    </div>
                    <div class="list">
                        <span class="title fl">文件路径</span>
                        <div class="fl">
                            <input type="text" name="add_file" id="add_file" placeholder="files目录内完整路径">
                        </div>
                    </div>
                    <div class="list" id="1st_run_time">
                        <span class="title fl">1st运行时间</span>
                        <div class="fl">
                            <input type="text" name="add_starttime" id="add_starttime" placeholder="小于当前时间则立即运行,但记录时间不变">
                        </div>
                    </div>
                    <div class="list">
                        <span class="title fl">周期</span>
                        <div class="fl">
                            <select class="fl" name="add_interval" id="add_interval" onchange="changeselect(this.value)">
                                <option value="0">触发</option>
                                <option value="1">N秒</option>
                                <option value="2">N分钟</option>
                                <option value="3">N小时</option>
                                <option value="1000">每周</option>
                                <option value="1001">每月</option>
                                <option value="1002">每年</option>
                            </select>
                            <div class="interval_list fl" id="add_interval_1">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_second" value="1" maxlength="2" max="99" min="1" oninput="if(value>99)value=99;if(value<1)value=1"></span>
                                    <span class="name">秒</span>
                                </div>
                            </div>
                            <div class="interval_list fl" id="add_interval_2">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_minute" value="1" maxlength="2" max="99" min="1" oninput="if(value>99)value=99;if(value<1)value=1"></span>
                                    <span class="name">分钟</span>
                                </div>
                            </div>
                            <div class="interval_list fl" id="add_interval_3">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_hour" value="1" maxlength="2" max="99" min="1" oninput="if(value>99)value=99;if(value<1)value=1"></span>
                                    <span class="name">小时</span>
                                </div>
                            </div>
                            <div class="interval_list fl" id="add_interval_1000">
                                <div class="interval_val_box fl">
                                    <span class="name">周</span>
                                    <span><input type="number" name="add_week" value="1" maxlength="1" max="7" min="1" oninput="if(value>7)value=7;if(value<1)value=1"></span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_hour" value="0" maxlength="2" max="23" min="0" oninput="if(value>23)value=23;if(value<0)value=0"></span>
                                    <span class="name">时</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_minute" value="0" maxlength="2" max="59" min="0" oninput="if(value>59)value=59;if(value<0)value=0"></span>
                                    <span class="name">分</span>
                                </div>
                            </div>
                            <div class="interval_list fl" id="add_interval_1001">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_day" value="1" maxlength="1" max="31" min="1" oninput="if(value>31)value=31;if(value<1)value=1"></span>
                                    <span class="name">号</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_hour" value="0" maxlength="2" max="23" min="0" oninput="if(value>23)value=23;if(value<0)value=0"></span>
                                    <span class="name">时</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_minute" value="0" maxlength="2" max="59" min="0" oninput="if(value>59)value=59;if(value<0)value=0"></span>
                                    <span class="name">分</span>
                                </div>
                            </div>
                            <div class="interval_list fl" id="add_interval_1002">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_month" value="1" maxlength="1" max="12" min="1" oninput="if(value>12)value=12;if(value<1)value=1"></span>
                                    <span class="name">月</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_day" value="1" maxlength="1" max="31" min="1" oninput="if(value>31)value=31;if(value<1)value=1"></span>
                                    <span class="name">号</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_hour" value="0" maxlength="2" max="23" min="0" oninput="if(value>23)value=23;if(value<0)value=0"></span>
                                    <span class="name">时</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="add_minute" value="0" maxlength="2" max="59" min="0" oninput="if(value>59)value=59;if(value<0)value=0"></span>
                                    <span class="name">分</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list">
                        <span class="title fl">备注</span>
                        <div class="fl">
                            <input type="text" name="add_memo" id="add_memo">
                        </div>
                    </div>
                    <div class="list">
                        <div class="fr btn-3" id="add-btn" onclick="add()">添加</div>
                    </div>
                </div>
            </div>
            <div class="edit glass">
                <div class="head"><h3>编辑</h3><span class="fr cp close" id="close_edit">关闭&nbsp;X</span></div>
                <div class="content">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="list" id="edit_nextruntime">
                        <span class="title fl">1st运行时间</span>
                        <div class="fl">
                            <input type="text" name="edit_nexttime" id="edit_nexttime" placeholder="小于当前时间则立即运行,但记录时间不变">
                        </div>
                    </div>
                    <div class="list">
                        <span class="title fl">周期</span>
                        <div class="fl">
                            <select class="fl" name="edit_interval" id="edit_interval" onchange="changeeditselect(this.value)">
                                <option value="0">触发</option>
                                <option value="1">N秒</option>
                                <option value="2">N分钟</option>
                                <option value="3">N小时</option>
                                <option value="1000">每周</option>
                                <option value="1001">每月</option>
                                <option value="1002">每年</option>
                            </select>
                            <div class="edit_interval_list fl" id="edit_interval_1">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_second" value="1" maxlength="2" max="99" min="1" oninput="if(value>99)value=99;if(value<1)value=1"></span>
                                    <span class="name">秒</span>
                                </div>
                            </div>
                            <div class="edit_interval_list fl" id="edit_interval_2">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_minute" value="1" maxlength="2" max="99" min="1" oninput="if(value>99)value=99;if(value<1)value=1"></span>
                                    <span class="name">分钟</span>
                                </div>
                            </div>
                            <div class="edit_interval_list fl" id="edit_interval_3">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_hour" value="1" maxlength="2" max="99" min="1" oninput="if(value>99)value=99;if(value<1)value=1"></span>
                                    <span class="name">小时</span>
                                </div>
                            </div>
                            <div class="edit_interval_list fl" id="edit_interval_1000">
                                <div class="interval_val_box fl">
                                    <span class="name">周</span>
                                    <span><input type="number" name="edit_week" value="1" maxlength="1" max="7" min="1" oninput="if(value>7)value=7;if(value<1)value=1"></span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_hour" value="0" maxlength="2" max="23" min="0" oninput="if(value>23)value=23;if(value<0)value=0"></span>
                                    <span class="name">时</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_minute" value="0" maxlength="2" max="59" min="0" oninput="if(value>59)value=59;if(value<0)value=0"></span>
                                    <span class="name">分</span>
                                </div>
                            </div>
                            <div class="edit_interval_list fl" id="edit_interval_1001">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_day" value="1" maxlength="1" max="31" min="1" oninput="if(value>31)value=31;if(value<1)value=1"></span>
                                    <span class="name">号</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_hour" value="0" maxlength="2" max="23" min="0" oninput="if(value>23)value=23;if(value<0)value=0"></span>
                                    <span class="name">时</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_minute" value="0" maxlength="2" max="59" min="0" oninput="if(value>59)value=59;if(value<0)value=0"></span>
                                    <span class="name">分</span>
                                </div>
                            </div>
                            <div class="edit_interval_list fl" id="edit_interval_1002">
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_month" value="1" maxlength="1" max="12" min="1" oninput="if(value>12)value=12;if(value<1)value=1"></span>
                                    <span class="name">月</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_day" value="1" maxlength="1" max="31" min="1" oninput="if(value>31)value=31;if(value<1)value=1"></span>
                                    <span class="name">号</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_hour" value="0" maxlength="2" max="23" min="0" oninput="if(value>23)value=23;if(value<0)value=0"></span>
                                    <span class="name">时</span>
                                </div>
                                <div class="interval_val_box fl">
                                    <span class="fl"><input type="number" name="edit_minute" value="0" maxlength="2" max="59" min="0" oninput="if(value>59)value=59;if(value<0)value=0"></span>
                                    <span class="name">分</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list">
                        <span class="title fl">备注</span>
                        <div class="fl">
                            <input type="text" name="edit_memo" id="edit_memo">
                        </div>
                    </div>
                    <div class="list">
                        <div class="fr btn-3" id="edit-btn" onclick="edit()">保存</div>
                    </div>
                </div>
            </div>
            <div class="msg"></div>
        </div>
    </body>
    
<script src="/public/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
// 每隔1分钟刷新一次吧
$(function(){
    setInterval(function(){
        load_val();
    }, 1000*60*1);
});
function load_val(){
    var data={'method':'get'};
    var url="/api/Update/shell.php";
    var res = api_post(data,url,'POST');
    // console.log(res);
    var html_str="";
    var pt_interval_time="";
    if(res['code']){
        $.each(res.data, function(index,value){
            switch (value.interval1){
                case '0':
                    pt_interval_time='无需设置';
                    break;
                case '1':
                    pt_interval_time=value.interval3+'秒';
                    break;
                case '2':
                    pt_interval_time=(value.interval3/60)+'分钟';
                    break;
                case '3':
                    pt_interval_time=(value.interval3/3600)+'小时';
                    break;
                case '1000':
                    pt_interval_time=value.interval3;
                    break;
                case '1001':
                    pt_interval_time=value.interval3;
                    break;
                case '1002':
                    pt_interval_time=value.interval3;
                    break;
            }
            html_str=html_str+'<tr style="white-space: nowrap;"><td>'+value.name+'</td><td>'+value.url+'</td><td>'+value.interval+'</td><td>'+pt_interval_time+'</td><td>'+value.lastruntime+'</td><td>'+value.nextruntime+'</td><td><div class="a fl" onclick="open_edit('+value.id+','+value.interval1+',&#x27;'+value.interval2+'&#x27;,&#x27;'+value.interval3+'&#x27;,&#x27;'+value.memo+'&#x27;)">编辑</div><div class="a fl" onclick="del('+value.id+')">删除</div></td></tr>';
        });
        $("#shell_list").html(html_str);
    }else{
        console.log(res.msg);
    }
}
function add(){
    var add_interval1 = $('#add_interval').val();
    // console.log(add_interval1);
    var add_interval = "";
    var add_interval2;
    var add_interval3;
    var add_name = $('#add_name').val();
    var add_file = $('#add_file').val();
    var add_starttime = $('#add_starttime').val();
    var add_memo = $('#add_memo').val();
    switch (add_interval1){
        case "0":
            add_interval='0|0|2222-02-02 22:22:22';
            break;
        case "1":
            add_interval2=$('#add_interval_'+add_interval1).find("[name='add_second']").val();
            add_interval=add_interval1+'|'+add_interval2+'|'+add_interval2;
            break;
        case "2":
            add_interval2=$('#add_interval_'+add_interval1).find("[name='add_minute']").val();
            add_interval=add_interval1+'|'+add_interval2+'|'+(add_interval2*60);
            break;
        case "3":
            add_interval2=$('#add_interval_'+add_interval1).find("[name='add_hour']").val();
            add_interval=add_interval1+'|'+add_interval2+'|'+(add_interval2*60*60);
            break;
        case "1000":
            add_interval2=$('#add_interval_'+add_interval1).find("[name='add_week']").val();
            add_interval3=$('#add_interval_'+add_interval1).find("[name='add_hour']").val() + ':' + $('#add_interval_'+add_interval1).find("[name='add_minute']").val() + ':00';
            add_interval=add_interval1+'|'+add_interval2+'|'+add_interval3;
            break;
        case "1001":
            add_interval2=$('#add_interval_'+add_interval1).find("[name='add_day']").val();
            add_interval3=$('#add_interval_'+add_interval1).find("[name='add_hour']").val() + ':' + $('#add_interval_'+add_interval1).find("[name='add_minute']").val() + ':00';
            add_interval=add_interval1+'|'+add_interval2+'|'+add_interval3;
            break;
        case "1002":
            add_interval2=$('#add_interval_'+add_interval1).find("[name='add_month']").val() + '-' + $('#add_interval_'+add_interval1).find("[name='add_day']").val();
            add_interval3=$('#add_interval_'+add_interval1).find("[name='add_hour']").val() + ':' + $('#add_interval_'+add_interval1).find("[name='add_minute']").val() + ':00';
            add_interval=add_interval1+'|'+add_interval2+'|'+add_interval3;
            break;
    }
    // console.log(add_interval);
    
    var data = {'method':'add','name':add_name,'url':add_file,'nexttime':add_starttime,'interval':add_interval,'memo':add_memo};
    var url = "/api/Update/shell.php";
    var res = api_post(data,url,'POST');
    // console.log(res);
    close_add();
    alert(res.msg);
    load_val();
}
function edit(){
    var edit_interval1 = $('#edit_interval').val();
    // console.log(edit_interval1);
    var edit_interval = "";
    var edit_interval2;
    var edit_interval3;
    var edit_id = $('#edit_id').val();
    var edit_nexttime = $('#edit_nexttime').val();
    var edit_memo = $('#edit_memo').val();
    switch (edit_interval1){
        case "0":
            edit_interval='0|0|2222-02-02 22:22:22';
            break;
        case "1":
            edit_interval2=$('#edit_interval_'+edit_interval1).find("[name='edit_second']").val();
            edit_interval=edit_interval1+'|'+edit_interval2+'|'+edit_interval2;
            break;
        case "2":
            edit_interval2=$('#edit_interval_'+edit_interval1).find("[name='edit_minute']").val();
            edit_interval=edit_interval1+'|'+edit_interval2+'|'+(edit_interval2*60);
            break;
        case "3":
            edit_interval2=$('#edit_interval_'+edit_interval1).find("[name='edit_hour']").val();
            edit_interval=edit_interval1+'|'+edit_interval2+'|'+(edit_interval2*60*60);
            break;
        case "1000":
            edit_interval2=$('#edit_interval_'+edit_interval1).find("[name='edit_week']").val();
            edit_interval3=$('#edit_interval_'+edit_interval1).find("[name='edit_hour']").val() + ':' + $('#edit_interval_'+edit_interval1).find("[name='edit_minute']").val() + ':00';
            edit_interval=edit_interval1+'|'+edit_interval2+'|'+edit_interval3;
            break;
        case "1001":
            edit_interval2=$('#edit_interval_'+edit_interval1).find("[name='edit_day']").val();
            edit_interval3=$('#edit_interval_'+edit_interval1).find("[name='edit_hour']").val() + ':' + $('#edit_interval_'+edit_interval1).find("[name='edit_minute']").val() + ':00';
            edit_interval=edit_interval1+'|'+edit_interval2+'|'+edit_interval3;
            break;
        case "1002":
            edit_interval2=$('#edit_interval_'+edit_interval1).find("[name='edit_month']").val() + '-' + $('#edit_interval_'+edit_interval1).find("[name='edit_day']").val();
            edit_interval3=$('#edit_interval_'+edit_interval1).find("[name='edit_hour']").val() + ':' + $('#edit_interval_'+edit_interval1).find("[name='edit_minute']").val() + ':00';
            edit_interval=edit_interval1+'|'+edit_interval2+'|'+edit_interval3;
            break;
    }
    // console.log(edit_id);
    
    var data = {'method':'edit','id':edit_id,'nexttime':edit_nexttime,'interval':edit_interval,'memo':edit_memo};
    var url = "/api/Update/shell.php";
    var res = api_post(data,url,'POST');
    $('#edit_nexttime').val("");
    // console.log(res);
    close_edit();
    alert(res.msg);
    load_val();
}
function del(id){
    if (confirm("删除后将不可恢复!")) {
        var data={'method':'del','id':id};
        var url="/api/Update/shell.php";
        var res = api_post(data,url,'POST');
        // console.log(res);
        alert(res.msg);
        load_val();
    } else {
    }
}
</script>
<script type="text/javascript">
function changeselect(value){
    // console.log(value);
    if (value == 0){
        $('.interval_list').css('display','none');
    }else{
        $('.interval_list').css('display','none');
        $('#add_interval_'+value).css('display','block');
        $('#add_interval_'+value).css('float','left');
    }
    if (value >= 1000){
        $('#1st_run_time').css('display','none');
    }else{
        $('#1st_run_time').css('display','block');
    }
}
function changeeditselect(value){
    // console.log(value);
    if (value == 0){
        $('.edit_interval_list').css('display','none');
    }else{
        $('.edit_interval_list').css('display','none');
        $('#edit_interval_'+value).css('display','block');
        $('#edit_interval_'+value).css('float','left');
    }
    if (value >= 1000){
        $('#edit_nextruntime').css('display','none');
    }else{
        $('#edit_nextruntime').css('display','block');
    }
}
$('#close_add').click(function(){
    close_add();
});
$('#close_edit').click(function(){
    close_edit();
});
function close_add(){
    $('.add').css('display','none');
    $('.mask').css('display','none');
}
function close_edit(){
    $('.edit').css('display','none');
    $('.mask').css('display','none');
}
function open_add(){
    $('.add').css('display','block');
    $('.edit').css('display','none');
    $('.mask').css('display','block');
}
function open_edit(id,interval1,interval2,interval3,memo){
    $('#edit_id').val(id);
    $('#edit_interval').val(interval1);
    $('#edit_memo').val(memo);
    if (interval1 == 0){
        $('.edit_interval_list').css('display','none');
    }else{
        $('.edit_interval_list').css('display','none');
        $('#edit_interval_'+interval1).css('display','block');
        $('#edit_interval_'+interval1).css('float','left');
    }
    if (interval1 >= 1000){
        $('#edit_nextruntime').css('display','none');
    }else{
        $('#edit_nextruntime').css('display','block');
    }
    
    switch (interval1){
        case 1:
            $('#edit_interval_'+interval1).find("[name='edit_second']").val(interval2);
            break;
        case 2:
            $('#edit_interval_'+interval1).find("[name='edit_minute']").val(interval2);
            break;
        case 3:
            $('#edit_interval_'+interval1).find("[name='edit_hour']").val(interval2);
            break;
        case 1000:
            var pt_time_array = interval3.split(":");
            $('#edit_interval_'+interval1).find("[name='edit_week']").val(interval2);
            $('#edit_interval_'+interval1).find("[name='edit_hour']").val(pt_time_array[0]);
            $('#edit_interval_'+interval1).find("[name='edit_minute']").val(pt_time_array[1]);
            break;
        case 1001:
            var pt_time_array = interval3.split(":");
            $('#edit_interval_'+interval1).find("[name='edit_day']").val(interval2);
            $('#edit_interval_'+interval1).find("[name='edit_hour']").val(pt_time_array[0]);
            $('#edit_interval_'+interval1).find("[name='edit_minute']").val(pt_time_array[1]);
            break;
        case 1002:
            var pt_time_array = interval3.split(":");
            var pt_month_array = interval2.split("-");
            $('#edit_interval_'+interval1).find("[name='edit_month']").val(pt_month_array[0]);
            $('#edit_interval_'+interval1).find("[name='edit_day']").val(pt_month_array[1]);
            $('#edit_interval_'+interval1).find("[name='edit_hour']").val(pt_time_array[0]);
            $('#edit_interval_'+interval1).find("[name='edit_minute']").val(pt_time_array[1]);
            break;
    }
    
    $('.add').css('display','none');
    $('.edit').css('display','block');
    $('.mask').css('display','block');
}
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/web/public/footer.html';
?>