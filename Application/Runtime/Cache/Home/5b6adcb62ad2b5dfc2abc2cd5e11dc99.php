<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>无标题文档</title>
</head>
<style>
    body,div,dl,dt,dd,ul,ol,li,h1,h2,h3,h4,h5,h6,pre,form,fieldset,input,p,blockquote,th,td{margin:0;padding:0;border:none;}
    body{font-size:12px; , serifbackground:#fff;color:#2b2b2b;}
    address,caption,cite,code,dfn,em,strong,th,var{font-style:normal;font-weight:normal;}
    select,input,img{vertical-align:middle;}
    table{border-collapse:collapse;border-spacing:0;}
    table,td,tr,th{font-size:12px;}
    a{text-decoration:none;cursor:pointer;}
    fieldset,img{border:0;}

    .main{ position:absolute;left:50%; top:50%; background:url(/Public/css/login.png) no-repeat; width:772px; height:468px; margin:-234px 0 0 -386px;}

    .input-box{ position:absolute; top:110px; left:410px;color:#0952a1;}
    .input-box input{ border:1px solid #7491b5; width:154px; height:28px; background-color:#f5fafe; padding-left:4px; line-height:28px;}
    .input-box p{ line-height:40px;}
    .input-box .check{ width:14px; height:14px; margin-left:48px;}
    .input-box .record{ margin-left:6px;}
    .input-box .link{ margin-top:14px; margin-left:70px;}
    .input-box .log{ color: #00a0e9;background-color:#c5fcff;margin-right:16px; margin-left:48px;margin-top: 30px}


</style>

<body style="background-color:#3987cf;">

<div class="main">
    <div class="login-box">
        <form action="<?php echo U('Login/checkLogin');?>" method="post">
        <div class="input-box">
            <p>用户名：<input type="text" name="username" value="" class="user"/></p>
            <p><span style=" padding-right:12px;">密</span>码：<input type="password" name="userpwd" class="password"/></p>
            <input type="submit" value="登陆"  class="log">
    </div>

        </form>

        <div style="color: red;margin-top: 280px;margin-left: 400px"><a href="http://web.exam.com/index.php/Admin/Login/login.html" style="color: red;margin-top: 500px">-------------管理员登陆点击此处-------------</a></div>
</div>
</div>


</body>
</html>