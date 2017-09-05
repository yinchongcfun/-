<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/lib/html5shiv.js"></script>
<script type="text/javascript" src="/Public/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/Public/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>图片列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 查看试题
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
                                              href="javascript:location.replace(location.href);" title="刷新"><i
        class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <form action="" method="post">

        <input type="radio" value="1" name="radio" id="radio"/> <label for="radio">单选题</label>
        <input type="radio" value="2" name="radio" id="check"/> <label for="check">多选题</label>
        <input type="radio" value="3" name="radio" id="judge"/> <label for="judge">判断题</label>
        &nbsp; &nbsp; &nbsp; &nbsp;选择批次

        <select name="pici" id="sel">
            <?php if(is_array($result)): foreach($result as $key=>$vo): ?><option value="<?php echo ($vo["pici"]); ?>"><?php echo ($vo["pici"]); ?></option><?php endforeach; endif; ?>

        </select>

        <input type="button" onclick="search('/index.php/Admin/Look/search')" value="查看"/>

    </form>
    <span id="remind"></span>

    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover table-sort">
            <thead>
            <tr class="text-c" id="tr1">
                <th>ID</th>
                <th>题目</th>
                <th>选项1</th>
                <th>选项2</th>
                <th>选项3</th>
                <th>选项4</th>
                <th>选项5</th>
                <th>选项6</th>
                <th>答案</th>
                <th>批次</th>
            </tr>
            </thead>
            <tbody id="body">

            </tbody>
        </table>
    </div>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->

<script type="text/javascript" src="/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">


    function search(url) {

        var radio = $('input:radio:checked').val();
        var option = $("#sel option:selected").val();
        if (!radio) {
            $("#remind").html('<font color="red">题型不能为空</font>');

        }
        if (radio==1){
            $('tr  >th:nth-child(8)').css('display','none');
            $('tr  >th:nth-child(7)').css('display','none');

        }
       if(radio==3){
            $('tr  >th:nth-child(3)').css('display','none');
            $('tr  >th:nth-child(4)').css('display','none');
            $('tr  >th:nth-child(5)').css('display','none');
            $('tr  >th:nth-child(6)').css('display','none');
            $('tr  >th:nth-child(7)').css('display','none');
            $('tr  >th:nth-child(8)').css('display','none');
        }if (radio==2){
            $('tr >th').css('display','');
        }


        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {radio: radio, option: option},
            url: url,
            success: function (data) {
                var str = '';
                var obj = eval('(' + data + ')');

                for (var i in obj) {
                    str += " <tr class='text-c' >" +
                            "<td>" + obj[i]['id'] + "</td >" +
                            "<td>" + obj[i]['title'] + "</td >"
                            + "<td>" + obj[i]['op1'] + "</td >"
                            + "<td>" + obj[i]['op2'] + "</td >"
                            + "<td>" + obj[i]['op3'] + "</td >" +
                            "<td>" + obj[i]['op4'] + "</td >" +
                            "<td>" + obj[i]['op5'] + "</td >" +
                            "<td>" + obj[i]['op6'] + "</td >" +
                            "<td>" + obj[i]['answer'] + "</td >" +
                            "<td>" + obj[i]['pici'] + "</td >" +
                            "<tr/>"

                }





                $("#body").empty();
                $("#body").append(str);
                if (radio==1){
                    $('tr >td:nth-child(8)').css('display','none');
                    $('tr >td:nth-child(7)').css('display','none');

                }
                if(radio==3){
                    $('tr  >td:nth-child(3)').css('display','none');
                    $('tr  >td:nth-child(4)').css('display','none');
                    $('tr  >td:nth-child(5)').css('display','none');
                    $('tr  >td:nth-child(6)').css('display','none');
                    $('tr  >td:nth-child(7)').css('display','none');
                    $('tr  >td:nth-child(8)').css('display','none');
                }
            },
            error: function () {
                alert('wrong');
            }
        })

    }


</script>
</body>
</html>