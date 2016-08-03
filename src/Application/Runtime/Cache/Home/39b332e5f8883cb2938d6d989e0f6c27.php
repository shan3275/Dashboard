<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>LZH-CMS后台</title>
<meta name="robots" content="nofollow" />
<meta name=”viewport” content=”width=device-width, initial-scale=1, maximum-scale=1″>
<link href="/hybusi/Public/Home/css/admin-style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/hybusi/Public/Static/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/hybusi/Public/Home/js/admin-common.js"></script>
</head>

<body>




<div class="wel"><?php echo ($AdminUser); $h=date('G'); if ($h<11) echo '早上好'; else if ($h<13) echo '中午好'; else if ($h<17) echo '下午好'; else echo '晚上好'; ?>，欢迎使用 海妖科技业务汇总系统 <?php echo (THINK_VERSION); ?> ！</div>



<div class="time">

您上次的登录时间是 <?php echo date("Y-m-d H:i:s",$loginTime);?>

</div>



<div class="home-menu">

 <a href="<?php echo U('Index/clear');?>" class="clear">清除缓存</a>

 <a href="<?php echo U('Index/cleardata');?>" class="clear">清除记录</a>

</div>





<script>

$(function(){

	$('tr:even').css('background','#ddd')

})

</script>

<table class="table" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">

  <tr class="first">

    <td colspan="2">海妖科技业务汇总系统 <?php echo (THINK_VERSION); ?></td>

  </tr>

  

</table>




</body>
</html>