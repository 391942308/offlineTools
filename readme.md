当前文件所在位置为运行根目录，请在本目录下运行php start.php

# 目录结构
├─api                                       api目录[还没写完]
│  └─Update                                 更新接口部分
│     ├─shell.php                           shell更新
│     └─url.php                             url更新
├─app                                       app目录
│  ├─backup                                 备份[弃用]
│  ├─shell                                  shell脚本部分
│  │  └─index.php                           唯一入口执行文件
│  │  └─files                               shell各模块目录
│  │     ├─demo                             demo模块目录
│  │     │  └─demo.php                      demo执行文件(请确保class名和文件名一致)
│  │     │  └─savedata.json                 demo需要保存的数据
│  │     │  └─ ...                          更多文件
│  │     └─ ...                             更多模块目录
│  └─url                                    url访问部分
│     └─index.php                           唯一入口执行文件
│     └─files                               shell各模块目录
│        ├─demo                             demo模块目录
│        │  └─demo.php                      demo执行文件(请确保class名和文件名一致)
│        │  └─savedata.json                 demo需要保存的数据
│        │  └─ ...                          更多文件
│        └─ ...                             更多模块目录
├─data                                      data目录
│  ├─backup                                 备份
│  │  ├─MySQL                               MySQL部分
│  │  │  └─Id                               info表内的数字ID编号
│  │  │     └─TableName                     该库内需要备份的表名
│  │  │        └─1980-01-01T00:00:00.csv    备份文件名
│  │  │        └─ ...                       更多备份文件
│  │  └─ ...                                更多类型数据库
│  ├─log                                    log目录
│  │  └─cli                                 cli执行日志目录
│  │  └─web                                 web执行日志目录
│  ├─shell                                  shell目录
│  │  └─config.json                         shell模块配置
│  │  └─RunData.json                        shell模块运行数据
│  ├─url                                    url目录
│  │  └─config.json                         url模块配置
│  │  └─RunData.json                        url模块运行数据
│  └─sql                                    sql目录
│     └─config.json                         sql模块配置
│     └─info.json                           sql模块信息
├─vendor                                    公共组件目录
│  ├─iyoiyo                                 框架核心
│  │  ├─base.php                            基础"继承"
│  │  ├─web_base.php                        web基础"继承"
│  │  ├─api_base.php                        api核心继承
│  │  ├─cli_common.php                      cli公共函数
│  │  └─common.php                          公共函数
│  └─ ...                                   更多文件
├─web                                       web目录
│  ├─public                                 公共资源目录
│  │  └─css                                 css目录
│  │  └─js                                  js目录
│  │  └─fonts                               字体目录
│  │  └─images                              图片目录
│  │  └─ ...                                更多模块目录
│  ├─BackupAndReduction                     备份和还原目录
│  │  └─index.php                           备份和还原首页
│  │  └─ ...                                更多web文件
│  ├─Shell                                  Shell目录
│  │  └─index.php                           shell首页
│  │  └─ ...                                更多web文件
│  ├─Index                                  小工具索引目录(包含接口get快捷调用)
│  │  └─index.php                           小工具索引首页
│  │  └─ ...                                更多web文件
│  ├─Url                                    Url目录
│  │  └─index.php                           Url首页
│  │  └─ ...                                更多web文件
│  ├─404.html                               404页面
│  └─index.php                              web首页
├─route.php                                 web页面路由配置
├─index.php                                 web页面唯一入口
├─config.php                                环境配置文件
└─start.php                                 cli唯一执行文件


# data内json结构说明
> RunData.json中的Interval部分
     * 1000开始为周期,999~1为间隔,0为触发
     * 1002=>年 1002|6-6(每年6月6号)|03:05:00
     * 1001=>月 1001|1(每月1号)|03:05:00
     * 1000=>周 1000|2(每周星期2)|03:05:00
     * 3=>时 3|1(每隔3小时)|1*60*60
     * 2=>分 2|2(每隔2分钟)|2*60
     * 1=>秒 1|10(每隔10秒)|10
     * 0=>触发 0|0|2222-02-02 22:22:22


# 当前还没有的部分
> mongodb扩展不做要求