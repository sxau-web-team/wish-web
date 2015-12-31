<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_WARNING",false);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://127.0.0.1/wish/Admin/Tpl/Public/css/public.css" />
	<script type="text/javascript" src="http://127.0.0.1/wish/Admin/Tpl/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://127.0.0.1/wish/Admin/Tpl/Public/js/public.js"></script>	
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="10">查看愿望</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>内容</td>
			<td class="tdLtitle4">发布者</td>
			<td class="tdLtitle4">发布时间</td>
			<td class="tdLittle2">操作</td>
		</tr>
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

		   <tr>
			<td><?php echo $n['wid'];?></td>
			<td><?php echo $n['content'];?></td>
			<td><?php echo $n['nickname'];?></td>
			<td><?php echo date('Y-m-d H:i',$n['time']);?></td>
			<td>
				<a href="<?php echo U('del', array('wid'=>$n['wid']));?>" class="del">[删除]</a>
			</td>
		  </tr>
	  <?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
	</table>
	<div class="page">
		<?php echo $page;?>
	</div>
</body>
</html>