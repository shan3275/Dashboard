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


<script>
$(function(){
	$("tr:even").css('background','#eee')
})
</script>
<div class="title-user title">管理员列表</div>



<table class="table" width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr class="first">
    <td>帐号</td>
    <td>类型</td>
    <td width="100" align="center">登录次数</td>
    <td width="100" align="center">最后登录IP</td>
    <td width="150" align="center">登录时间</td>
    <td width="120" align="center">操作</td>
  </tr>
  <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
    <td><?php echo ($list['user']); ?></td>
    <td><?php if(($list["lever"]) == "1"): ?>子账号<?php else: ?>总账号<?php endif; ?></td>
    <td width="100" align="center"><?php echo ($list['num']); ?></td>
    <td width="100" align="center"><?php echo ($list['lastip']); ?></td>
    <td width="150" align="center"><?php echo date("Y-m-d H:i:s",$list['lasttime']);?></td>
    <td width="120" align="center"><a href="<?php echo U('edit','id='.$list['id']);?>">修改</a> <a href="<?php echo U('delete','id='.$list['id']);?>" onClick="return confirm('确定要删除吗？')">删除</a></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  
</table>




</body>
</html>