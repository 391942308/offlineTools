<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    
<style>
body{
    display: block;
    margin: 0;
    color: #34495e;
    font: 14px/1.231 "Lato", sans-serif;
    background-color: #ffffff;
}
div {
    display: block;
}
.row {
    *zoom: 1;
}
.row:before, .row:after {
    display: table;
    line-height: 0;
    content: "";
}
.row:after {
    clear: both;
}
.span3 {
    width: 220px;
}
[class*="span"] {
    float: left;
    min-height: 1px;
    margin-left: 20px;
    margin-top: 20px;
}
.tile {
    background-color: #ecf0f5;
    border-radius: 6px;
    padding: 14px;
    position: relative;
    text-align: center;
}
.tile-title {
    font-size: 20px;
    margin: 0;
}
.tile p {
    font-size: 15px;
    margin: 10px 0 15px 0;
}
.tile-image.big-illustration {
    height: 111px;
    margin-top: 20px;
    width: 112px;
}
.tile-image {
    height: 100px;
    margin: 31px 0 27px;
    vertical-align: bottom;
}
.btn.btn-primary {
    background-color: #1abc9c;
}
.btn.btn-large {
    padding-bottom: 12px;
    padding-top: 13px;
}
.btn {
    border: none;
    background: #34495e;
    color: white;
    font-size: 16.5px;
    text-decoration: none;
    text-shadow: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    -webkit-transition: 0.25s;
    -moz-transition: 0.25s;
    -o-transition: 0.25s;
    transition: 0.25s;
    -webkit-backface-visibility: hidden;
}
.btn-primary {
    color: #ffffff;
    text-shadow: 0 -1px 0 rgb(0 0 0 / 25%);
    background-repeat: repeat-x;
    border-color: #0044cc #0044cc #002a80;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0044cc', GradientType=0);
    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
}
.btn-block {
    display: block;
    width: 100%;
    padding-right: 0;
    padding-left: 0;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.btn-large {
    padding: 11px 19px;
    font-size: 17.5px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
}
@media screen and (min-width: 959px) { 
    .box{
        position: absolute;
        left: calc((100vw - 960px) / 2);
        top: calc((100vh - 316px) / 2);
    }
}
@media screen and (max-width: 479px) { 
    .box{
        position: absolute;
        left: calc((100vw - 250px) / 2);
    }
}
@media screen and (max-width: 719px) and (min-width: 480px) { 
    .box{
        position: absolute;
        left: calc((100vw - 500px) / 2);
        top: calc((100vh - 632px) / 2);
    }
}
@media screen and (max-width: 959px) and (min-width: 720px) { 
    .box{
        position: absolute;
        left: calc((100vw - 750px) / 2);
        top: calc((100vh - 632px) / 2);
    }
}
img {
    width: auto\9;
    height: auto;
    max-width: 100%;
    vertical-align: middle;
    border: 0;
    -ms-interpolation-mode: bicubic;
}
h3 {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 4px;
    margin-top: 2px;
}
h1, h2, h3, h4, h5, h6 {
    margin: 10px 0;
    font-family: inherit;
    font-weight: bold;
    line-height: 20px;
    color: inherit;
    text-rendering: optimizelegibility;
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    margin: 0 0 10px;
}
a {
    color: #1abc9c;
    text-decoration: underline;
    -webkit-transition: 0.25s;
    -moz-transition: 0.25s;
    -o-transition: 0.25s;
    transition: 0.25s;
    -webkit-backface-visibility: hidden;
}
</style>
    <!--type from https://designmodo.com/flat/-->
    <body>
        <div class="row">
            <div class="box">
            <div class="span3">
                <div class="tile">
                    <img class="tile-image big-illustration" alt="" src="/public/images/book.png">
                    <h3 class="tile-title">备份与替换</h3>
                    <p>sql特定表的备份与批量替换.</p>
                    <a class="btn btn-primary btn-large btn-block" href="/BackupAndReduction/index.php">前往</a>
                </div>
            </div>
            
            <div class="span3">
                <div class="tile">
                    <img class="tile-image" alt="" src="/public/images/calendar.png">
                    <h3 class="tile-title">定时任务</h3>
                    <p>脚本shell的定时执行.</p>
                    <a class="btn btn-primary btn-large btn-block" href="/Shell/index.php">前往</a>
                </div>
            </div>
            
            <div class="span3">
                <div class="tile">
                    <img class="tile-image" alt="" src="/public/images/clipboard.png">
                    <h3 class="tile-title">索引目录</h3>
                    <p>小工具地址的索引.</p>
                    <a class="btn btn-primary btn-large btn-block" href="/Index/index.php">前往</a>
                </div>
            </div>
            
            <div class="span3">
                <div class="tile tile-hot">
                    <img class="tile-image big-illustration" alt="" src="/public/images/time.png">
                    <h3 class="tile-title">URL</h3>
                    <p>提前访问.</p>
                    <a class="btn btn-primary btn-large btn-block" href="/Url/index.php">前往</a>
                </div>
            
            </div>
            </div>
        </div>
    </body>
</html>
