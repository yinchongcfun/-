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
            letter-spacing: 30px;
            color: darkgray;
            font-size: 80px;
        }
        #h1 {
            font-size: 40px;
            color: lightgrey;
        }
        #h2 {
            font-size: 40px;
            color: lightgrey;
        }
        #h3 {
            font-size: 40px;
                color: lightgrey;
            }
      .dd{
          color: slategray;
          font-size: 20px;
      }
        #d5{
            font-size: 30px;
        }
    </style>
</head>
<body>
<form action="<?php echo U('sv');?>" method="post">
  <div class="reg_div">
    <div id="d1">试卷配置</div>
      <div id="d2"><div id="h1">单项选择</div>
          <input type="hidden" name="tixingid[]" value="1">
          <div class="dd">
      <div><span>&nbsp;数量</span>&nbsp;&nbsp;<input type="text" name="amount[]" value="<?php echo ($result[0]["amount"]); ?>" id="amount_1"></div>
      <div><span>&nbsp;分数</span>&nbsp;&nbsp;<input type="text" name="score[]" value="<?php echo ($result[0]["score"]); ?>" id="score_1"></div>
      </div>   </div>
      <div id="d3"><div id="h2">多项选择</div>
          <input type="hidden" name="tixingid[]" value="2">
          <div class="dd">
          <div><span>&nbsp;数量</span>&nbsp;&nbsp;<input type="text" name="amount[]" value="<?php echo ($result[1]["amount"]); ?>" id="amount_2"></div>
          <div><span>&nbsp;分数</span>&nbsp;&nbsp;<input type="text" name="score[]" value="<?php echo ($result[2]["score"]); ?>" id="score_2"></div>
      </div> </div>
      <div id="d4"><div id="h3">判断题</div>
          <input type="hidden" name="tixingid[]" value="3">
          <div class="dd">
          <div><span>&nbsp;数量</span>&nbsp;&nbsp;<input type="text" name="amount[]" value="<?php echo ($result[1]["amount"]); ?>" id="amount_3"></div>
          <div><span>&nbsp;分数</span>&nbsp;&nbsp;<input type="text" name="score[]" value="<?php echo ($result[2]["score"]); ?>" id="score_3"></div>
      </div> </div>
  </div>
    <div id="d5"><input type="button" onclick="show()" style="margin-top: 20px" value="计算总分">
    <span id="span"></span>
    <input type="submit" style="margin-top: 10px" value="提交配置">
    </div>
</form>
 <script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<script>
    function  show() {
        var  a1=$("#amount_1").val();
        var  a2=$("#amount_2").val();
        var  a3=$("#amount_3").val();
        var  s1=$("#score_1").val();
        var  s2=$("#score_2").val();
        var  s3=$("#score_3").val();

        var  count=parseInt(a1*s1)+parseInt(a2*s2)+parseInt(a3*s3);
        $("#span").html(count);

    }
</script>

</body>
</html>