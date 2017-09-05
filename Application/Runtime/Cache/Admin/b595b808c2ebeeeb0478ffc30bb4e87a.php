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
<title>考试管理系统</title>
</head>
<body>

<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">H-ui.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> <span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>

			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">

					<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">用户名：<?php echo (session('name')); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">

							<li><a href="<?php echo U('Login/exitLogin');?>">退出</a></li>
						</ul>
					</li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
        <dl id="menu-picture">
            <dt><i class="Hui-iconfont">&#xe613;</i> <a data-href="<?php echo U('Text/text_show');?>" data-title="数据导入" href="javascript:void(0)">试题导入</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

        </dl>

		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> <a data-href="<?php echo U('Text/user_show');?>" data-title="用户导入" href="javascript:void(0)">用户导入</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

	</dl>

		<dl id="menu-product">
			<dt><i class="Hui-iconfont">&#xe620;</i>  <a data-href="<?php echo U('Look/showList');?>" data-title="查看试题" href="javascript:void(0)">查看试题</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

	</dl>

		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i>  <a data-href="<?php echo U('Look/user_showList');?>" data-title="查看用户" href="javascript:void(0)">查看用户</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

	</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> <a data-href="<?php echo U('Config/config_index');?>" data-title="试卷配置" href="javascript:void(0)">试卷配置</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

	</dl>
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> <a data-href="<?php echo U('Config/config_time');?>" data-title="考试时间配置" href="javascript:void(0)">考试时间配置</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

	</dl>
		<dl id="menu-tongji">
			<dt><i class="Hui-iconfont">&#xe61a;</i> <a data-href="<?php echo U('Config/config_pici');?>" data-title="考试批次配置" href="javascript:void(0)">考试批次配置</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

	</dl>
		<dl id="menu-system">
			<dt><i class="Hui-iconfont">&#xe62e;</i>  <a data-href="<?php echo U('Grade/grade');?>" data-title="导出考试成绩" href="javascript:void(0)">导出考试成绩</a><i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>

	</dl>
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active">
					<span title="试题导入" data-href="<?php echo U('Text/text_show');?>">试题导入</span>
					<em></em></li>
		</ul>
	</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo U('Text/text_show');?>"></iframe>
	</div>
</div>
</section>

<div class="contextMenu" id="Huiadminmenu">
	<ul>
		<li id="closethis">关闭当前 </li>
		<li id="closeall">关闭全部 </li>
</ul>
</div>

<script type="text/javascript" src="/Public/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Public/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/Public/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Public/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>


</body>
</html>