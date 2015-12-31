<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>爱翻爱许愿墙后台管理首页</title>
	<link rel="stylesheet" href="http://127.0.0.1/wish/Admin/Tpl/Public/css/admin.css" />
	<script type="text/javascript" src="http://127.0.0.1/wish/Admin/Tpl/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://127.0.0.1/wish/Admin/Tpl/Public/js/admin.js"></script>
<!-- 默认打开目标 -->
<base target="iframe"/>
</head>
<body>
<!-- 头部 -->
	<div id="top_box">
		<div id="top">
			<p id="top_font">爱翻爱 许愿墙后台管理首页 （V1.1）</p>
		</div>
		<div class="top_bar">
			<p class="adm">
				<span>管理员：</span>
				<span class="adm_pic">&nbsp&nbsp&nbsp&nbsp</span>
				<span class="adm_people">[<?php echo $_SESSION['username'];?>]</span>
			</p>
			<p class="now_time">
今天是；
<script language=JavaScript>
                        today=new Date();
                         function initArray(){
                         this.length=initArray.arguments.length
                         for(var i=0;i<this.length;i++)
                        this[i+1]=initArray.arguments[i] }
                        var d=new initArray(
                                  "星期日",
                                  "星期一",
                                  "星期二",
                                  "星期三",
                                  "星期四",
                                  "星期五",
                                  "星期六");
                     document.write(
                       "<font color=#333 style='font-size:9pt;font-family: 宋体'> ",
                        today.getFullYear(),"-",
                         today.getMonth()+1,"-",
                        today.getDate()," ",
                         d[today.getDay()+1],
                              "</font>" );

</script>

				位置；
				<span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp首页</span>
			</p>
			<p class="out">
				<span class="out_bg">&nbsp&nbsp&nbsp&nbsp</span>&nbsp
				<a href="<?php echo U('Login/out');?>" target="_self">退出</a>
			</p>
		</div>
	</div>
<!-- 左侧菜单 -->
		<div id="left_box">
			<p class="use">常用菜单</p>
			<div class="menu_box">
				<h2>常用菜单</h2>
				<div class="text">
					<ul class="con">
				        <li class="nav_u">
				        	<a href="http://127.0.0.1/wish" class="pos" target="__bank">前台首页</a>				        	
				        </li> 
				    </ul>
					<ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('check');?>" class="pos">查看愿望</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('copy');?>" class="pos">系统信息</a>				        	
				        </li> 
				    </ul>
				    <ul class="con">
				        <li class="nav_u">
				        	<a href="<?php echo U('passwd');?>" class="pos">密码修改</a>				        	
				        </li> 
				    </ul>
				</div>
			</div>			
		</div>
		<!-- 右侧 -->
		<div id="right">
			<iframe  frameboder="0" border="0" 	scrolling="yes" name="iframe" src="<?php echo U('copy');?>"></iframe>
		</div>
	<!-- 底部 -->
	<div id="foot_box">
		<div class="foot">
			<p>@Copyright © 2015-2015 afana.com All Rights Reserved. 晋ICP备0000000号</p>
		</div>
	</div>

</body>
</html>
<!--[if IE 6]>
    <script type="text/javascript" src="./js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('.adm_pic, #left_box .pos, .span_server, .span_people', 'background');
    </script>
<![endif]-->
