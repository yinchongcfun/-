<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    body{
      text-align: center;
    }

    #d1{
      margin-top: 80px;
      font-size: 80px;
      color: gainsboro;
      letter-spacing: 30px;
    }
    #d2{
      color: lightsteelblue;
      font-size: 40px;
      margin-top: 30px;
    }
  </style>
</head>
<body>
<form action="<?php echo U('tm');?>" method="post">
  <div class="reg_div">
    <div id="d1">考试时间配置</div>
      <div>
      <div id="d2"><span>&nbsp;设定考试时间</span>&nbsp;&nbsp;<input type="text"  style="height: 40px;font-size: 40px;text-align: center;color: lightsteelblue"   value="<?php echo ($tm["timespan"]); ?>" name="timespan" placeholder="默认单位分钟">分钟</div>
      </div>

  </div>
    <input type="submit" style="height: 40px;width: 150px;margin-top: 20px" value="提交">
</form>
 <script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
 

</body>
</html>