<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1/wish/Index/Tpl/Public/css/index.css">
	<script type="text/javascript" src="http://127.0.0.1/wish/Index/Tpl/Public/js/jquery-1.7.2.min.js"></script>
	<script type='text/javascript'>
		HOST = 'http://127.0.0.1';
		ROOT = 'http://127.0.0.1/wish';
		WEB = 'http://127.0.0.1/wish/index.php';
		URL = 'http://127.0.0.1/wish';
		HDPHP = 'http://127.0.0.1/wish/hdphp/hdphp';
		HDPHPDATA = 'http://127.0.0.1/wish/hdphp/hdphp/Data';
		HDPHPTPL = 'http://127.0.0.1/wish/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://127.0.0.1/wish/hdphp/hdphp/Extend';
		APP = 'http://127.0.0.1/wish/index.php';
		CONTROL = 'http://127.0.0.1/wish/index.php/Index';
		METH = 'http://127.0.0.1/wish/index.php/Index/index';
		TPL = 'http://127.0.0.1/wish/Index/Tpl';
		CONTROLTPL = 'http://127.0.0.1/wish/Index/Tpl/Index';
		STATIC = 'http://127.0.0.1/wish/Index/Tpl/Static';
		PUBLIC = 'http://127.0.0.1/wish/Index/Tpl/Public';
		COMMON = 'http://127.0.0.1/wish/Common';
		TEMPLATE = 'http://127.0.0.1/wish/Template';
</script>
	<script type="text/javascript" src="http://127.0.0.1/wish/Index/Tpl/Public/js/index.js"></script>
	<title>爱翻爱许愿墙</title>
</head>
<body>
	<div id="top">
		<div id="top_box">
			<div class="logo">
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/logo.png" alt="" />
			</div>
			<div class="send_wish">
				<a href="javascript:void(0)" id="send"><img src="http://127.0.0.1/wish/Index/Tpl/Public/images/index_06.png" alt="" /></a>
				<span id="send_span">我要许愿</span>
			</div>
		</div>
	</div>
	<div id="wrap"></div>
	<div id="main">
	<?php $hd["list"]["n"]["total"]=0;if(isset($wish) && !empty($wish)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($wish));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($wish,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

		<dl class='paper a<?php echo mt_rand(1,3) ?>'>
			<dt>
				<a href="javascript:void(0)" class='close_wish'>关闭</a>
			</dt>
			<dd class='content'>
				<span class='num'>幸运号【<?php echo $n['wid'];?>】</span>
				<p class='content'><?php echo $n['content'];?></p>
				<span class='username'>许愿人：<?php echo $n['nickname'];?></span>
				<p class='time'><?php echo date('Y-m-d H:i',$n['time']);?></p>
			</dd>
			<dd class='bottom'>
				
			</dd>
		</dl>
<?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	</div>

	<div id="send_form">
		<p class="title"><a class="close" href="javascript:void(0)"></a></p>
		<p class="nickname">昵称：</p>
		<form action="" name="send_wish">
			<input type="input" name="nickname" class="nick_input"/>
			<p class="wish">愿望：（您还可以输入<b>50</b>个字）</p>
			<textarea name="content"></textarea>
			<div id='phiz'>
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/baobao.gif" alt="baobao" />
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/haixiu.gif" alt="haixiu" />
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/hehe.gif" alt="hehe" />
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/ku.gif" alt="ku" />
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/qinqin.gif" alt="qinqin" />
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/weiqu.gif" alt="weiqu" />
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/zhuakuang.gif" alt="zhuakuang" />
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/wabisi.gif" alt="wabisi" />
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/xiu.gif" alt="xiu" />
				<img src="http://127.0.0.1/wish/Index/Tpl/Public/images/phiz/xin.gif" alt="xin" />
			</div>
			<span class="submit"></span>
		</form>
	</div>

</body>
</html>