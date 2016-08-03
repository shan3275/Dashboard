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

<div class="title-user title">业务列表</div>







<table class="table" width="100%" border="0" cellspacing="5" cellpadding="0">

  <tr class="first">

    <td>业务名称</td>

    <td>英文缩写</td>

    <td width="" align="center">操作</td>

  </tr>

  <?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>

    <td width="40%" align="center"><?php echo ($list['name']); ?></td>

    <td width="40%" align="center"><?php echo ($list['title']); ?></td>

    <td width="20%" align="center"><a href="<?php echo U('edit','id='.$list['id']);?>">修改</a> </td>

  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

  

</table>



</body>
</html>